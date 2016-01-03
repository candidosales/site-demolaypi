<?php

add_action( 'init', 'create_post_type' );
function create_post_type() {
    register_post_type( 'document',
        array(
            'labels' =>  array(
                'name' => _x('Documento Oficial', 'post type general name'),
                'singular_name' => _x('Documento Oficial', 'post type singular name'),
                'add_new' => _x('Adicionar Novo', 'document'),
                'add_new_item' => __('Adicionar Novo Documento'),
                'edit_item' => __('Editar Documento'),
                'new_item' => __('Novo Documento'),
                'all_items' => __('Todos os Documentos'),
                'view_item' => __('Ver Documento'),
                'search_items' => __('Pesquisar documentos'),
                'not_found' =>  __('Nenhum documento encontrado'),
                'not_found_in_trash' => __('Nenhum documento encontrado na lixeira'),
                'parent_item_colon' => '',
                'menu_name' => 'Documentos Oficiais'
            ),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'has_archive' => 'document',
            'rewrite' =>  array( 'slug'=>'document',  
                                'with_front'=> true,  
                                'feed'=> true,  
                                'pages'=> true),
            'capability_type' => 'post',
            'hierarchical' => true,
            'menu_position' => null,
            'supports' => array('title','excerpt', 'revisions'),
            'menu_icon'           => 'dashicons-book-alt'
        )
    );
    flush_rewrite_rules(false);
}


add_action( 'init', 'create_taxonomy' );
function create_taxonomy() {
    register_taxonomy( 'tipo', array( 'document' ), array(
        'hierarchical' => true,
        'label' => 'Tipos de Documentos',
        'show_ui' => true,
        'show_in_tag_cloud' => true,
        'query_var' => true,
        "rewrite" =>  array('slug'=>'tipo',  
                            'with_front'=> false)
        )
    );
    flush_rewrite_rules(false);
}

    function add_custom_meta_boxes() {  
        // Define the custom attachment for posts  
       add_meta_box(
          'wp_custom_attachment',
          'Envie seu documento',
          'wp_custom_attachment',
          'document'
      ); 

      add_meta_box(
          'post_inner_meta_video',
          'Envie seu vídeo colocando o seu link',
          'post_inner_meta_video',
          'post'
      ); 
    } // end add_custom_meta_boxes  
    add_action('add_meta_boxes', 'add_custom_meta_boxes');  
 

add_action( 'save_post', 'save_post_meta_video');
function save_post_meta_video( $post_id) {
   // Verificar se os dados foram enviados, neste caso se a metabox existe, garantindo-nos que estamos a guardar valores da página de filmes.
   if ( ! $_POST['link_video'] ) return;
 
   // Fazer a saneação dos inputs e guardá-los
   update_post_meta( $post_id, 'link_video',  $_POST['link_video'] );
   return true;
}


function post_inner_meta_video( $post ) {
?>
<p>
  <label for="realizador">Link do vídeo:</label>
  <br />
  <input type="text" name="link_video" size="70" value="<?php echo get_post_meta( $post->ID, 'link_video', true ); ?>" />
</p>

<?php
}

function wp_custom_attachment() {  
    wp_nonce_field(plugin_basename(__FILE__), 'wp_custom_attachment_nonce');
    $doc = get_post_meta(get_the_ID(), 'wp_custom_attachment', true); 
       ?>
    <p>
      <label for="realizador">Somente documentos: PDF, DOC, DOCx, XLS ou XLSx</label>
      <br />
     <input id="wp_custom_attachment" name="wp_custom_attachment" value="" size="50" type="file">
     <input type="text" id="wp_custom_attachment_url" name="wp_custom_attachment_url" value=" <?php echo $doc['url'] ?>" size="30" />
     <?
     
        if(strlen(trim($doc['url'])) > 0) {  ?>
        <a href="javascript:;" id="wp_custom_attachment_delete">Deletar documento</a>
    <?  }?>
    </p>
<?php }

    function save_custom_meta_data($id) {  
        /* --- security verification --- */  
        if(!wp_verify_nonce($_POST['wp_custom_attachment_nonce'], plugin_basename(__FILE__))) {  
          return $id;  
        } // end if  
        if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {  
          return $id;  
        } // end if  
        if(!current_user_can('edit_page', $id)) {  
            return $id;  
        } // end if  
        /* - end security verification - */  
        // Make sure the file array isn't empty  
        if(!empty($_FILES['wp_custom_attachment']['name'])) { 
            // Setup the array of supported file types. In this case, it's just PDF, DOC e DOCx.  
            $supported_types = array('application/pdf', 'application/msword','application/vnd.ms-excel','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' ,'application/vnd.openxmlformats-officedocument.wordprocessingml.document');  
            // Get the file type of the upload  
            $arr_file_type = wp_check_filetype(basename($_FILES['wp_custom_attachment']['name']));  
            $uploaded_type = $arr_file_type['type'];  
            // Check if the type is supported. If not, throw an error.  
            if(in_array($uploaded_type, $supported_types)) {  
                // Use the WordPress API to upload the file  
                $upload = wp_upload_bits($_FILES['wp_custom_attachment']['name'], null, file_get_contents($_FILES['wp_custom_attachment']['tmp_name']));  
                if(isset($upload['error']) && $upload['error'] != 0) {  
                    wp_die('There was an error uploading your file. The error is: ' . $upload['error']);  
                } else {  
                    $upload['file'] = str_replace('\\', '/', $upload['file']);
                    add_post_meta($id, 'wp_custom_attachment', $upload);  
                    update_post_meta($id, 'wp_custom_attachment', $upload);
                    add_post_meta($id, 'wp_custom_attachment_url', $_POST['wp_custom_attachment_url']);      
                    update_post_meta($id, 'wp_custom_attachment_url', $_POST['wp_custom_attachment_url']);     
                } // end if/else  
            } else {  
                wp_die("The file type that you've uploaded is not a PDF.");  
            } // end if/else  
        } else {  
            // Grab a reference to the file associated with this post  
            $doc = get_post_meta($id, 'wp_custom_attachment', true); 
            // Grab the value for the URL to the file stored in the text element 
            $delete_flag = $_POST['wp_custom_attachment_url'];  
            // Determine if a file is associated with this post and if the delete flag has been set (by clearing out the input box) 
           


            if(strlen(trim($doc['url'])) > 0 && strlen(trim($delete_flag)) == 0) { 
                // Attempt to remove the file. If deleting it fails, print a WordPress error. 
                if(unlink($doc['file'])) { 
                    // Delete succeeded so reset the WordPress meta data 
                    update_post_meta($id, 'wp_custom_attachment', null); 
                    update_post_meta($id, 'wp_custom_attachment_url', ''); 
                } else { 
                    wp_die('There was an error trying to delete your file.'); 
                } // end if/el;se 
            } // end if 
        } // end if/else 
    } // end save_custom_meta_data 
    add_action('save_post', 'save_custom_meta_data');   

function add_custom_attachment_script() {  

    wp_register_script('maskedinput', get_template_directory_uri() . '/js/jquery.maskedinput-1.3.min.js');
    wp_enqueue_script('maskedinput');

    wp_register_script('admin', get_template_directory_uri() . '/js/admin.js');  
    wp_enqueue_script('admin');  
} // end add_custom_attachment_script  
add_action('admin_enqueue_scripts', 'add_custom_attachment_script'); 

function update_edit_form() {  
    echo ' enctype="multipart/form-data"';  
} // end update_edit_form  
add_action('post_edit_form_tag', 'update_edit_form'); 


add_filter( 'manage_edit-document_columns', 'document_list' );
function document_list( $columns ) {
    // relabel title column
    $columns['title'] = 'Título';
    $columns['documento'] = 'Documento';
    $columns['date'] = 'Data';
    $columns['tipo'] = 'Tipo';
  
    
    return $columns;
}
add_action('manage_document_posts_custom_column', 'document_column', 5, 2);
function document_column($column, $id){
     $doc = get_post_meta($id, 'wp_custom_attachment', true);
     $term = get_the_term_list( $id, 'tipo', " " ) ;
    switch($column){
    case 'documento':?>
            <a href="<? echo $doc['url'];?>" target="_blank"><? echo $doc['url'];?></a>
            <?
        break;
    case 'tipo':
        echo $term;
        break;
    }
}

add_action('init', 'my_custom_init');
function my_custom_init() {
    remove_post_type_support( 'post', 'custom-fields');
}