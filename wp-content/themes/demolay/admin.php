<?php 
// DiW Theme Options Panel




$themename = "DeMolay";
$shortname = "demolay";
$options = array ( // Array variable to define all the options we'll need
	);
 
function demolay_add_admin() {
  global $themename, $shortname, $options;
  // Code for saving, updating, and deleting theme options goes here
  add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'demolay_admin');
}
 
function demolay_admin() {
  global $themename, $shortname, $options;
  // User feedback for saving, etc, goes here
?> 
<!-- HTML goes here for displaying the theme options panel -->
 
<?php } 
add_action('admin_menu', 'demolay_add_admin'); 

function digwp_custom_taxonomies() {  
  register_taxonomy(
   'wordpress_books', // internal name = machine-readable taxonomy name
   'post',            // object type = post, page, link, or custom post-type
    array(
    'hierarchical' => true, // true for hierarchical like cats, false for flat like tags
    'label' => 'WP Books',  // the human-readable taxonomy name
    'query_var' => true,    // enable taxonomy-specific querying
    'rewrite' => true       // pretty permalinks for your taxonomy?
   )
  );
}  
add_action('init', 'digwp_custom_taxonomies', 0);


function digwp_post_type_multimedia() {
	  register_post_type('Multimedia', array('label' => __('Multimedia'),
			'public' => true, 'show_ui' => true));  
	  register_taxonomy_for_object_type('post_tag', 'Multimedia');  
	}
add_action('init', 'digwp_post_type_multimedia');

// add links/menus to the admin bar
function mytheme_admin_bar_render() {
	global $wp_admin_bar;
	$wp_admin_bar->add_menu( array(
		'parent' => 'new-content', // use 'false' for a root menu, or pass the ID of the parent menu
		'id' => 'new_media', // link ID, defaults to a sanitized title value
		'title' => __('Media'), // link title
		'href' => admin_url( 'media-new.php'), // name of file
		'meta' => false, // array of any of the following options:	array( 'html' => '', 'class' => '', 'onclick' => '', target => '', title => '' );

	));
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );

function register_menus() {
  register_nav_menus(
   array(
    'primary-menu'   => __('Primary Menu'),
    'secondary-menu' => __('Secondary Menu'),
    'tertiary-menu'  => __('Tertiary Menu')
   )
  );
}
add_action('init', 'register_menus');

?>