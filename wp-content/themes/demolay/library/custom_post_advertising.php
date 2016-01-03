<?php

add_action('init', 'advertising_register');
 
function advertising_register() {
 
    $labels = array(
        'name' => _x('Publicidades', 'post type general name'),
        'singular_name' => _x('Publicidade', 'post type singular name'),
        'add_new' => _x('Adicionar Novo', 'event'),
        'add_new_item' => __('Adicionar Nova Publicidade'),
        'edit_item' => __('Editar Publicidade'),
        'all_items' => __('Todos as Publicidades'),
        'new_item' => __('Nova Publicidade'),
        'view_item' => __('Ver Publicidade'),
        'search_items' => __('Buscar Publicidades'),
        'not_found' =>  __('Nenhuma publicidade encontrado'),
        'not_found_in_trash' => __('Nenhum publicidade encontrado na lixeira'),
        'parent_item_colon' => ''
    );
 
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'has_archive' => 'advertising',
        'rewrite' =>  array( 'slug'=>'advertising',  
                            'with_front'=> true,  
                            'feed'=> true,  
                            'pages'=> true),
        'capability_type' => 'post',
        'hierarchical' => true,
        'menu_position' => null,
        'supports' => array('title', 'revisions'),
   		'menu_icon'           => 'dashicons-pressthis'

      );
 
    register_post_type( 'advertising' , $args );
}

add_action( 'init', 'create_taxonomy_advertising' );
function create_taxonomy_advertising() {
    register_taxonomy( 'tipo_advertising', array( 'advertising' ), array(
        'hierarchical' => true,
        'label' => 'Tipos de Publicidade',
        'show_ui' => true,
        'show_in_tag_cloud' => true,
        'query_var' => true,
        'rewrite' =>  array('slug'=>'tipo_advertising',  
                            'with_front'=> false)
        )
    );
    flush_rewrite_rules(false);
}

function advertising_details_meta() {  
    wp_nonce_field(plugin_basename(__FILE__), 'wp_custom_attachment_advertising');
    $doc = get_post_meta(get_the_ID(), 'wp_custom_attachment_advertising', true); 
       ?>
    <p>
      <label for="realizador">Somente documentos: JPEG, PNG. <br/> <strong>Slide: 280x200 e Normal: 120x120</strong></label>
      <br />
     <input id="wp_custom_attachment_advertising" name="wp_custom_attachment_advertising" value="" size="50" type="file">
     <input type="text" id="wp_custom_attachment_url_advertising" name="wp_custom_attachment_url_advertising" value=" <?php echo $doc['url'] ?>" size="30" />
     <?
     
        if(strlen(trim($doc['url'])) > 0) {  ?>
        <a href="javascript:;" id="wp_custom_attachment_delete_advertising">Deletar imagem</a>
    <?  }?>
    </p>
<?php
    echo '<p><label>Link (É o local para onde o usuário será redirecionado quando clicar): </label><input type="text" size="70" name="advertising_url" value="' .get_advertising_field("advertising_url"). '" /></p>';

}

function get_advertising_field($advertising_field) {
    global $post;
 
    $custom = get_post_custom($post->ID);
 
    if (isset($custom[$advertising_field])) {
        return $custom[$advertising_field][0];
    }
}

add_action("admin_init", "advertising_admin_init");
function advertising_admin_init(){
  add_meta_box("advertising_meta",
               "Detalhes da Publicidade", 
               "advertising_details_meta", 
               "advertising", 
               "normal", 
               "default");
}
 

add_filter( 'manage_edit-advertising_columns', 'advertising_list' );
function advertising_list( $columns ) {
    // relabel title column
    $columns['title'] = 'Título';
    $columns['image'] = 'Imagem';
    $columns['advertising_url'] = 'Link';
    $columns['date'] = 'Data';
    $columns['tipo'] = 'Tipo';
    
    return $columns;
}


add_action('manage_advertising_posts_custom_column', 'advertising_column', 5, 2);
function advertising_column($column, $id){
     $doc = get_post_meta($id, 'wp_custom_attachment_advertising', true); 
     $url = get_post_meta($id, 'advertising_url', true);
     $term = get_the_term_list( $id, 'tipo_advertising', " " ) ;
    switch($column){
    case 'image':
            ?>
                <a href="<? echo $doc['url'];?>" target="_blank"><? echo $doc['url'];?></a>
            <?
        break;
    case 'advertising_url':
            ?>
                <a href="<? echo $url;?>" target="_blank"><? echo $url;?></a>
            <?
        break;
    case 'tipo':
        echo $term;
        break;
    }
}


function save_advertising_field($advertising_field) {
    global $post;
 
    if(isset($_POST[$advertising_field])) {
        update_post_meta($post->ID, $advertising_field, $_POST[$advertising_field]);
    }
}


    function save_custom_meta_data_advertising($id) {  
        /* --- security verification --- */  
        if(!wp_verify_nonce($_POST['wp_custom_attachment_advertising'], plugin_basename(__FILE__))) {  
          return $id;  
        } // end if  
        if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {  
          return $id;  
        } // end if  
        if(!current_user_can('edit_page', $id)) {  
            return $id;  
        } // end if  

        save_advertising_field("advertising_url"); 

        /* - end security verification - */  
        // Make sure the file array isn't empty  
        if(!empty($_FILES['wp_custom_attachment_advertising']['name'])) { 
            // Setup the array of supported file types. In this case, it's just PDF, DOC e DOCx.  
            $supported_types = array('image/jpeg', 'image/pjpeg', 'image/png');  
            // Get the file type of the upload  
            $arr_file_type = wp_check_filetype(basename($_FILES['wp_custom_attachment_advertising']['name']));  
            $uploaded_type = $arr_file_type['type'];  
            // Check if the type is supported. If not, throw an error.  
            if(in_array($uploaded_type, $supported_types)) {  
                // Use the WordPress API to upload the file  
                $upload = wp_upload_bits($_FILES['wp_custom_attachment_advertising']['name'], null, file_get_contents($_FILES['wp_custom_attachment_advertising']['tmp_name']));  
                if(isset($upload['error']) && $upload['error'] != 0) {  
                    wp_die('There was an error uploading your file. The error is: ' . $upload['error']);  
                } else {  
                    $upload['file'] = str_replace('\\', '/', $upload['file']);
                    add_post_meta($id, 'wp_custom_attachment_advertising', $upload);  
                    update_post_meta($id, 'wp_custom_attachment_advertising', $upload);
                    add_post_meta($id, 'wp_custom_attachment_url_advertising', $_POST['wp_custom_attachment_url_advertising']);      
                    update_post_meta($id, 'wp_custom_attachment_url_advertising', $_POST['wp_custom_attachment_url_advertising']);                       
                } // end if/else  
            } else {  
                wp_die("The file type that you've uploaded is not a image.");  
            } // end if/else  

        } else {  
            // Grab a reference to the file associated with this post  
            $doc = get_post_meta($id, 'wp_custom_attachment_advertising', true); 
            // Grab the value for the URL to the file stored in the text element 
            $delete_flag = $_POST['wp_custom_attachment_url_advertising'];  
            // Determine if a file is associated with this post and if the delete flag has been set (by clearing out the input box) 
           


            if(strlen(trim($doc['url'])) > 0 && strlen(trim($delete_flag)) == 0) { 
                // Attempt to remove the file. If deleting it fails, print a WordPress error. 
                if(unlink($doc['file'])) { 
                    // Delete succeeded so reset the WordPress meta data 
                    update_post_meta($id, 'wp_custom_attachment_advertising', null); 
                    update_post_meta($id, 'wp_custom_attachment_url_advertising', ''); 
                } else { 
                    wp_die('There was an error trying to delete your file.'); 
                } // end if/el;se 
            } // end if 
        } // end if/else 
    } // end save_custom_meta_data 
    add_action('save_post', 'save_custom_meta_data_advertising');   
