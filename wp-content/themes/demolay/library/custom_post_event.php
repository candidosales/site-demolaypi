<?php

add_action('init', 'event_register');
 
function event_register() {
 
    $labels = array(
        'name' => _x('Eventos', 'post type general name'),
        'singular_name' => _x('Evento', 'post type singular name'),
        'add_new' => _x('Adicionar Novo', 'event'),
        'add_new_item' => __('Adicionar Novo Evento'),
        'edit_item' => __('Editar Evento'),
        'all_items' => __('Todos os Eventos'),
        'new_item' => __('Novo Evento'),
        'view_item' => __('Ver Evento'),
        'search_items' => __('Buscar Eventos'),
        'not_found' =>  __('Nenhum evento encontrado'),
        'not_found_in_trash' => __('Nenhum evento encontrado na lixeira'),
        'parent_item_colon' => ''
    );
 
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'has_archive' => 'events',
        'rewrite' =>  array( 'slug'=>'event',  
                            'with_front'=> true,  
                            'feed'=> true,  
                            'pages'=> true),
        'capability_type' => 'post',
        'hierarchical' => true,
        'menu_position' => null,
        'supports' => array('title','excerpt', 'revisions'),
        'menu_icon'           => 'dashicons-calendar-alt'
      );
 
    register_post_type( 'events' , $args );
}

add_action( 'init', 'create_taxonomy_event' );
function create_taxonomy_event() {
    register_taxonomy( 'tipo_event', array( 'events' ), array(
        'hierarchical' => true,
        'label' => 'Tipos de Eventos',
        'show_ui' => true,
        'show_in_tag_cloud' => true,
        'query_var' => true,
        "rewrite" =>  array('slug'=>'tipo_event',  
                            'with_front'=> false)
        )
    );
    flush_rewrite_rules(false);
}
add_action('manage_events_posts_custom_column', 'events_custom_columns', 5, 2);
add_filter("manage_events_posts_columns", "events_edit_columns");
 
function events_edit_columns($columns){
    $columns = array(
        "cb" => "<input type=\"checkbox\" />",
        "title" => "Evento",
        "event_date" => "Data",
        "event_location" => "Local",
        "event_city" => "Cidade",
        "tipo_event" => "Tipo",
  );
  return $columns;
}
 
 
function events_custom_columns($column, $id){
    $date = get_post_meta($id, 'event_date', true); 
    $hour = get_post_meta($id, 'event_start_time', true); 
    $location = get_post_meta($id, 'event_location', true);
    $city = get_post_meta($id, 'event_city', true);
    $term = get_the_term_list( $id, 'tipo_event', " " ) ;
 
    switch ($column) {
    case "event_date":
            echo  date('d/m/Y', strtotime($date)). '<br /><em>'.$hour.'</em>';
            break;
 
    case "event_location":
            echo $location;
            break;
 
    case "event_city":
            echo $city;
            break;

    case "tipo_event":
            echo $term;
            break;
    }
}

add_filter("manage_edit-events_sortable_columns", "event_date_column_register_sortable");
add_filter("request", "event_date_column_orderby" );
 
function event_date_column_register_sortable( $columns ) {
        $columns['event_date'] = 'event_date';
        return $columns;
}
 
function event_date_column_orderby( $vars ) {
    if ( isset( $vars['orderby'] ) && 'event_date' == $vars['orderby'] ) {
        $vars = array_merge( $vars, array(
            'meta_key' => 'event_date',
            'orderby' => 'meta_value_num'
        ) );
    }
    return $vars;
}

add_action("admin_init", "events_admin_init");
 
function events_admin_init(){
  add_meta_box("event_meta", "Detalhes do Evento", "event_details_meta", "events", "normal", "default");
}
 
function event_details_meta() {
 
    $ret = '<p><label>Data: </label><input id="event_date" type="text" name="event_date" value="'.date('d/m/Y', strtotime(get_event_field("event_date"))). '" /><em>(dd/mm/aaaa)</em>';
    $ret = $ret . '</p><p><label>Horário: </label><input id="event_start_time" type="text" name="event_start_time" value="' .get_event_field("event_start_time"). '" /><em>(hh:mm)</em></p>';
    $ret = $ret . '<p><label>Local: </label><input type="text" size="70" name="event_location" value="' .get_event_field("event_location"). '" /></p>';
    $ret = $ret . '<p><label>Cidade: </label><input type="text" size="50" name="event_city" value="' .get_event_field("event_city"). '" /></p>';
    $ret = $ret . '<p><label>Link do Local: </label><input type="text" size="70" name="event_location_url" value="' .get_event_field("event_location_url"). '" /></p>'; 
    echo $ret;
}

function get_event_field($event_field) {
    global $post;
 
    $custom = get_post_custom($post->ID);
 
    if (isset($custom[$event_field])) {
        return $custom[$event_field][0];
    }
}

add_action('save_post', 'save_event_details');
 
function save_event_details(){
   global $post;
 
   if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
      return;
 
   if ( get_post_type($post) == 'event')
      return;
 
   if(isset($_POST["event_date"])) {

      $data = implode("-",array_reverse(explode("/",$_POST["event_date"])));
      update_post_meta($post->ID, "event_date", $data);
   }
 
   save_event_field("event_start_time");
   save_event_field("event_location");
   save_event_field("event_city");
   save_event_field("event_location_url");
}

function save_event_field($event_field) {
    global $post;
 
    if(isset($_POST[$event_field])) {
        update_post_meta($post->ID, $event_field, $_POST[$event_field]);
    }
}