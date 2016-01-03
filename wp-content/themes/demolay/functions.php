<?php

require ('library/custom_post_advertising.php'); 
require ('library/custom_post_document.php'); 
require ('library/custom_post_event.php'); 

show_admin_bar(false);

add_filter('https_ssl_verify', '__return_false');
add_filter('https_local_ssl_verify', '__return_false');

if (function_exists('register_sidebar')) {
  register_sidebar(array(
   'before_widget' => '<li id="%1$s" class="widget %2$s">',
   'after_widget' => '</li>',
   'before_title' => '<h2 class="widgettitle">',
   'after_title' => '</h2>',
  ));
}

//Limitar o resumo em 20 caracteres
function custom_excerpt_length( $length ) {
	return 12;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

if (function_exists('add_theme_support')) { 
	add_theme_support( 'post-formats', array( 'aside', 'gallery','audio','video' ) );	
	add_theme_support('post-thumbnails'); 
	add_image_size( 'thumb-2', 90, 9999 );
	add_image_size( 'thumb-3', 190, 9999 );
}

add_theme_support('menus');

function get_youtube_screen( $url = '', $type = 'default', $echo = true ) {
    if( empty( $url ) )
        return false;

    if( !isset( $type ) )
        $type = '';

    $url = esc_url( $url );

    preg_match("|[\\?&]v=([^&#]*)|",$url,$vid_id);

    if( !isset( $vid_id[1] ) )
        return false;

    $img_server_num =  'i'. rand(1,4);

    switch( $type ) {
        case 'large':
            $img = "<img src=\"http://{$img_server_num}.ytimg.com/vi/{$vid_id[1]}/0.jpg\" />";
            break;
        case 'first':
            // Thumbnail of the first frame
            $img = "<img src=\"http://{$img_server_num}.ytimg.com/vi/{$vid_id[1]}/1.jpg\" />";
            break;
        case 'small':
            // Thumbnail of a later frame(i'm not sure how they determine this)
            $img = "<img src=\"http://{$img_server_num}.ytimg.com/vi/{$vid_id[1]}/2.jpg\" />";
            break;
        case 'default':
        case '':
        default:
            $img = "<img src=\"http://{$img_server_num}.ytimg.com/vi/{$vid_id[1]}/default.jpg\" />";
            break;
    }
    if( $echo )
        echo $img;
    else
        return $img;
}

//------ WP menus ------//
  register_nav_menu( 'header', __( 'Navegação principal' ) );
  register_nav_menu( 'footer', __( 'Navegação rodapé') );



// Remove height/width attributes on images so they can be responsive
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );
function remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

/**
 * Top Bar Walker
 *
 * @since 1.0.0
 */
class Top_Bar_Walker extends Walker_Nav_Menu {
  /**
    * @see Walker_Nav_Menu::start_lvl()
   * @since 1.0.0
   *
   * @param string $output Passed by reference. Used to append additional content.
   * @param int $depth Depth of page. Used for padding.
  */
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= "\n<ul class=\"sub-menu dropdown\">\n";
    }

    /**
     * @see Walker_Nav_Menu::start_el()
     * @since 1.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item Menu item data object.
     * @param int $depth Depth of menu item. Used for padding.
     * @param object $args
     */

    function start_el( &$output, $object, $depth = 0, $args = array(), $current_object_id = 0 ) {
        $item_html = '';
        parent::start_el( $item_html, $object, $depth, $args );

        //$output .= ( $depth == 0 ) ? '<li class="divider"></li>' : '';

        $classes = empty( $object->classes ) ? array() : ( array ) $object->classes;

        if ( in_array('label', $classes) ) {
            $item_html = preg_replace( '/<a[^>]*>( .* )<\/a>/iU', '<label>$1</label>', $item_html );
        }

    if ( in_array('divider', $classes) ) {
      $item_html = preg_replace( '/<a[^>]*>( .* )<\/a>/iU', '', $item_html );
    }

        $output .= $item_html;
    }

  /**
     * @see Walker::display_element()
     * @since 1.0.0
   *
   * @param object $element Data object
   * @param array $children_elements List of elements to continue traversing.
   * @param int $max_depth Max depth to traverse.
   * @param int $depth Depth of current element.
   * @param array $args
   * @param string $output Passed by reference. Used to append additional content.
   * @return null Null on failure with no changes to parameters.
   */
    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
        $element->has_children = !empty( $children_elements[$element->ID] );
        $element->classes[] = ( $element->current || $element->current_item_ancestor ) ? 'active' : '';
        $element->classes[] = ( $element->has_children ) ? 'has-dropdown' : '';

        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }

}


function modify_footer_admin () {
  echo 'Criado por <a href="http://about.me/candidosales">Cândido Sales Gomes</a>';
  echo ' | <a href="http://WordPress.org">WordPress</a>.';
}

add_filter('admin_footer_text', 'modify_footer_admin');

add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
    return 'class="secondary small radius button"';
}

function disqus_embed($disqus_shortname) {
    global $post;
    wp_enqueue_script('disqus_embed','http://'.$disqus_shortname.'.disqus.com/embed.js');
    echo '<div id="disqus_thread"></div>
    <script type="text/javascript">
        var disqus_shortname = "'.$disqus_shortname.'";
        var disqus_title = "'.$post->post_title.'";
        var disqus_url = "'.get_permalink($post->ID).'";
        var disqus_identifier = "'.$disqus_shortname.'-'.$post->ID.'";
    </script>';
}

function my_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/dist/img/logo-login.png);
            padding-bottom: 30px;
            background-size: 230px;
            width: 230px;
            height: 76px;
            margin: 0 auto 5px;

        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );
