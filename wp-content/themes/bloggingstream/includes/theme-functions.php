<?php
//-----------------------------------------------------------------------------
/*
Plugin Name: Related Posts
Version: 0.1
Plugin URI: http://www.rene-ade.de/inhalte/wordpress-plugin-relatedposts.html
Description: This wordpress plugin provides tagcloud that shows the related posts of a post, and can replace a keyword within a post to a list of related posts.
Author: Ren&eacute; Ade
Author URI: http://www.rene-ade.de
Min WP Version: 2.3
*/
//-----------------------------------------------------------------------------
?>
<?php

/*
PUBLIC FUNCTIONS:
  rp_related_posts( $args ) displays related posts of the current post
ARGS:
  'limit' => 5, // limit number of related posts to display
  'title' => '',  // the title
  'beforeposts' => '', 'afterposts' => '', // text before and after the list 
  'eachpost' => '<li><a href="%permalink%">%title%</a></li>', // for each related post
  'noposts' => '' // can be a string to display if there are no related posts
*/

//-----------------------------------------------------------------------------

// get related posts
function rp_get_related_posts( $post, $limit ) {
  global $wpdb; // wordpress database access
  
  // limit has to be a number
  $limit = (int)$limit;
  
  // get tags of the post
  $tags = wp_get_post_tags( $post->ID );
  if( is_wp_error($tags) )
    return false; // error
  if( count($tags)<=0 ) // we cannot get related posts without tags
    return array(); // no related posts

  // get term ids
  $termids = array();
  foreach( $tags as $tag ) {
    $termids[ $tag->term_id ] = $tag->term_id;
  }
  if( count($termids)<=0 ) // we cannot get related posts without the termids
    return array(); // no related posts
  
  // the query to get the related posts
  $query = "SELECT DISTINCT $wpdb->posts.*, COUNT( tr.object_id) AS cnt " // get posts and count
          ."FROM $wpdb->term_taxonomy tt, $wpdb->term_relationships tr, $wpdb->posts "
          ."WHERE 1 "
            ."AND tt.taxonomy = 'post_tag' " // search for tags
            ."AND tt.term_taxonomy_id = tr.term_taxonomy_id " // get relations
            ."AND tr.object_id = $wpdb->posts.ID " // get posts
            ."AND tt.term_id IN( ".implode(',',$termids)." ) " // only with the same tags
            ."AND $wpdb->posts.ID != $post->ID " // only other posts, not the post selfe
            ."AND $wpdb->posts.post_status = 'publish' " // only published posts
          ."GROUP BY tr.object_id " // group by relation
          ."ORDER BY cnt DESC, $wpdb->posts.post_date_gmt DESC " // order by count best matches first, if same order by date
          ."LIMIT $limit "; // get only the top x
  
  // run the query and return the result
  return $wpdb->get_results( $query );
}

//-----------------------------------------------------------------------------

// replace placeholders
function rp_replace_placeholders( $post, $string ) {

  // replace placeholders
  $string = str_replace( '%title%',
    get_the_title($post->ID), $string );
  $string = str_replace( '%permalink%',
    get_permalink($post->ID), $string );

  // return 
  return $string;
}

//-----------------------------------------------------------------------------

// get related posts of a post as string
function rp_getstring_related_posts( $post, $args ) {
 
  // args
  $defaults = array(
    'limit' => 3, // limit number of related posts to display
    'title' => '',  // the title
    'beforeposts' => '', 'afterposts' => '', // text before and after the list 
    'eachpost' => '<li><a href="%permalink%">%title%</a></li>', // for each related post
    'noposts' => '' // can be a string to display if there are no related posts
  );
  $args = wp_parse_args( $args, $defaults );
  
  // no posts string
  $noposts = '';
  if( strlen($args['noposts'])>0 ) {
    $noposts = rp_replace_placeholders( $post, $args['title'] )
              .rp_replace_placeholders( $post, $args['noposts'] );
  }
  
  // get related posts
  $relatedposts = rp_get_related_posts( $post, $args['limit'] );
  if( is_wp_error($relatedposts) || !is_array($relatedposts) )
    return $noposts;

  // print only if there are related posts
  if( count($relatedposts)<=0 )  
    return $noposts;
    
  // the string
  $string = '';
	// print title and before
  $string.= rp_replace_placeholders( $post, $args['title'] );
  $string.= rp_replace_placeholders( $post, $args['beforeposts'] );
  // print related posts
  foreach( $relatedposts as $relatedpost ) {
    $string.= rp_replace_placeholders( $relatedpost, $args['eachpost'] );
  }
  // print after
  $string.= rp_replace_placeholders( $post, $args['afterposts'] );

  // return string
  return $string;  
}
// output related posts of post
function rp_print_related_posts( $post, $args ) {
  
  // display if there is something to display
  $string = rp_getstring_related_posts( $post, $args );
  if( strlen($string)>0 )
    echo $string;
  
  // output done
  return;
}

//-----------------------------------------------------------------------------

// output related posts for the current post
function rp_related_posts( $title, $args=null ) {
  global $post;
  
  if( !is_array($args) ) 
    $args = array();
  $args['title'] = $title;
  
  rp_print_related_posts( $post, $args );
}

//-----------------------------------------------------------------------------

// find the post content relatedposts placeholder
function rp_filter_the_content( $content ) {
  global $post; // the current post
 
  // replace placeholders
  $content = str_replace( '%RELATEDPOSTS%', rp_getstring_related_posts($post,array()), $content );
   
  return $content;
}

//-----------------------------------------------------------------------------

// the sidebar widget
function rp_widget( $args ) {
  global $post; // the current post
  
  // check if viewing a post
  if( !is_single() ) // show widget only on post page
    return;
  
  // comment // if you dont like this comment, you may remove it :-(
  echo '<!-- ';
  echo 'WordPress Plugin RelatedPosts by RenŽ Ade';
  echo ' - ';
  echo 'http://www.rene-ade.de/inhalte/wordpress-plugin-relatedposts.html';
  echo ' -->';

  // args
  extract( $args ); // extract args
  
  // options
  $options = get_option( 'rp_widget' ); // get options

  // get related posts string
  $relatedposts_string = rp_getstring_related_posts( $post, $options['args'] );
  if( strlen($relatedposts_string)<=0 )
    return; // nothing to display
    
  echo $before_widget;
  echo $before_title . $options['title'] . $after_title;
  echo $relatedposts_string;
  echo $after_widget;
  
  // output done
  return;  
}

function rp_widget_control() {

  // options
  $options = $newoptions = get_option('rp_widget'); // get options
  
  // set new options
  if( $_POST['rp-widget-submit'] ) {
    $newoptions['title'] = strip_tags( stripslashes($_POST['rp-widget-title']) );
    $newoptions['args']['beforeposts'] = stripslashes( $_POST['rp-widget-args-beforeposts'] );
    $newoptions['args']['afterposts'] = stripslashes( $_POST['rp-widget-args-afterposts'] );
    $newoptions['args']['eachpost'] = stripslashes( $_POST['rp-widget-args-eachpost'] );
    $newoptions['args']['noposts'] = stripslashes( $_POST['rp-widget-args-noposts'] );
    $newoptions['args']['limit'] = (int) $_POST['rp-widget-args-limit'];
  }
  
  // update options if needed
  if( $options != $newoptions ) {
    $options = $newoptions;
    update_option('rp_widget', $options);
  }
  
  // output  
  echo '<p>'._e('This widget only appears on post pages!').'</p>';
  echo '<p>'._e('Title');
    echo '<input type="text" style="width:300px" id="rp-widget-title" name="rp-widget-title" value="'.attribute_escape($options['title']).'" />'.'<br />';
  echo '</p>';
  echo '<p>'._e('Postlist');
    echo '<input type="text" style="width:300px" id="rp-widget-args-limit" name="rp-widget-args-limit" value="'.$options['args']['limit'].'" />'._e('Number of related posts to display').'<br />';
    echo '<input type="text" style="width:300px" id="rp-widget-args-beforeposts" name="rp-widget-args-beforeposts" value="'.attribute_escape($options['args']['beforeposts']).'" />'._e('Output before postlist').'<br />';
    echo '<input type="text" style="width:300px" id="rp-widget-args-afterposts" name="rp-widget-args-afterposts" value="'.attribute_escape($options['args']['afterposts']).'" />'._e('Output after postlist').'<br />';
    echo '<input type="text" style="width:300px" id="rp-widget-args-eachpost" name="rp-widget-args-eachpost" value="'.attribute_escape($options['args']['eachpost']).'" />'._e('Output for each related post').'<br />';
  echo '</p>';        
  echo '<p>'._e('Widget');
    echo '<input type="text" style="width:300px" id="rp-widget-args-noposts" name="rp-widget-args-noposts" value="'.attribute_escape($options['args']['noposts']).'" />'._e('Output if there are no related posts. Leave blank to hide the Widget if there are no posts to display.').'<br />';
  echo '</p>';
  echo '<input type="hidden" name="rp-widget-submit" id="rp-widget-submit" value="1" />';
}

//-----------------------------------------------------------------------------

// activate and deactivate plugin
function rp_activate() {

  // options, defaultvalues
  $options = array( 
    'widget' => array( 
      'title' => 'Related Posts',
      'args' => array(
        'limit' => 3,
        'beforeposts' => '<ul>', 'afterposts' => '</ul>',
        'eachpost' => '<li><a href="%permalink%">%title%</a></li>',
        'noposts' => ''
      )
    )
  );
  
  // register option
  add_option( 'rp_widget', $options['widget'] );
  
  // activeted
  return;
}
function rp_deactivate() {

  // unregister option
  delete_option('rp_widget'); 
  
  // deactivated
  return;
}

// initialization
function rp_init() {  

  // register widget
  $class['classname'] = 'rp_widget';
  wp_register_sidebar_widget('related_posts', __('Related Posts'), 'rp_widget', $class);
  wp_register_widget_control('related_posts', __('Related Posts'), 'rp_widget_control', 'width=300&height=500');
  
  // initialization done
  return;  
}

//-----------------------------------------------------------------------------

// actions
add_action( 'activate_'.plugin_basename(__FILE__),   'rp_activate' );
add_action( 'deactivate_'.plugin_basename(__FILE__), 'rp_deactivate' );
add_action( 'init', 'rp_init');

// filter text to replace relatedposts placeholder
add_filter( 'the_content',     'rp_filter_the_content', 5 );
add_filter( 'the_content_rss', 'rp_filter_the_content', 5 );
add_filter( 'the_excerpt',     'rp_filter_the_content', 5 );
add_filter( 'the_excerpt_rss', 'rp_filter_the_content', 5 );
add_filter( 'widget_text',     'rp_filter_the_content', 5 );

//-----------------------------------------------------------------------------

/*
Plugin Name: WP-PageNavi 
Plugin URI: http://www.lesterchan.net/portfolio/programming.php 
*/ 

function wp_pagenavi($before = '', $after = '') {
	global $wpdb, $wp_query;
	if (!is_single()) {
		$request = $wp_query->request;
		$posts_per_page = intval(get_query_var('posts_per_page'));
		$paged = intval(get_query_var('paged'));
		$pagenavi_options = get_option('pagenavi_options');
		$numposts = $wp_query->found_posts;
		$max_page = $wp_query->max_num_pages;
		/*
		$numposts = 0;
		if(strpos(get_query_var('tag'), " ")) {
		    preg_match('#^(.*)\sLIMIT#siU', $request, $matches);
		    $fromwhere = $matches[1];			
		    $results = $wpdb->get_results($fromwhere);
		    $numposts = count($results);
		} else {
			preg_match('#FROM\s*+(.+?)\s+(GROUP BY|ORDER BY)#si', $request, $matches);
			$fromwhere = $matches[1];
			$numposts = $wpdb->get_var("SELECT COUNT(DISTINCT ID) FROM $fromwhere");
		}
		$max_page = ceil($numposts/$posts_per_page);
		*/
		if(empty($paged) || $paged == 0) {
			$paged = 1;
		}
		$pages_to_show = intval($pagenavi_options['num_pages']);
		$pages_to_show_minus_1 = $pages_to_show-1;
		$half_page_start = floor($pages_to_show_minus_1/2);
		$half_page_end = ceil($pages_to_show_minus_1/2);
		$start_page = $paged - $half_page_start;
		if($start_page <= 0) {
			$start_page = 1;
		}
		$end_page = $paged + $half_page_end;
		if(($end_page - $start_page) != $pages_to_show_minus_1) {
			$end_page = $start_page + $pages_to_show_minus_1;
		}
		if($end_page > $max_page) {
			$start_page = $max_page - $pages_to_show_minus_1;
			$end_page = $max_page;
		}
		if($start_page <= 0) {
			$start_page = 1;
		}
		if($max_page > 1 || intval($pagenavi_options['always_show']) == 1) {
			$pages_text = str_replace("%CURRENT_PAGE%", number_format_i18n($paged), $pagenavi_options['pages_text']);
			$pages_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pages_text);
			echo $before.'<div class="wp-pagenavi">'."\n";
			switch(intval($pagenavi_options['style'])) {
				case 1:
					if(!empty($pages_text)) {
						echo '<span class="pages">&#8201;'.$pages_text.'&#8201;</span>';
					}					
					if ($start_page >= 2 && $pages_to_show < $max_page) {
						$first_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['first_text']);
						echo '<a href="'.clean_url(get_pagenum_link()).'" title="'.$first_page_text.'">&#8201;'.$first_page_text.'&#8201;</a>';
						if(!empty($pagenavi_options['dotleft_text'])) {
							echo '<span class="extend">&#8201;'.$pagenavi_options['dotleft_text'].'&#8201;</span>';
						}
					}
					previous_posts_link($pagenavi_options['prev_text']);
					for($i = $start_page; $i  <= $end_page; $i++) {						
						if($i == $paged) {
							$current_page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['current_text']);
							echo '<span class="current">&#8201;'.$current_page_text.'&#8201;</span>';
						} else {
							$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
							echo '<a href="'.clean_url(get_pagenum_link($i)).'" title="'.$page_text.'">&#8201;'.$page_text.'&#8201;</a>';
						}
					}
					next_posts_link($pagenavi_options['next_text'], $max_page);
					if ($end_page < $max_page) {
						if(!empty($pagenavi_options['dotright_text'])) {
							echo '<span class="extend">&#8201;'.$pagenavi_options['dotright_text'].'&#8201;</span>';
						}
						$last_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['last_text']);
						echo '<a href="'.clean_url(get_pagenum_link($max_page)).'" title="'.$last_page_text.'">&#8201;'.$last_page_text.'&#8201;</a>';
					}
					break;
				case 2;
					echo '<form action="'.htmlspecialchars($_SERVER['PHP_SELF']).'" method="get">'."\n";
					echo '<select size="1" onchange="document.location.href = this.options[this.selectedIndex].value;">'."\n";
					for($i = 1; $i  <= $max_page; $i++) {
						$page_num = $i;
						if($page_num == 1) {
							$page_num = 0;
						}
						if($i == $paged) {
							$current_page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['current_text']);
							echo '<option value="'.clean_url(get_pagenum_link($page_num)).'" selected="selected" class="current">'.$current_page_text."</option>\n";
						} else {
							$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
							echo '<option value="'.clean_url(get_pagenum_link($page_num)).'">'.$page_text."</option>\n";
						}
					}
					echo "</select>\n";
					echo "</form>\n";
					break;
			}
			echo '</div>'.$after."\n";
		}
	}
}

add_action('init', 'pagenavi_init');
function pagenavi_init() {
	// Add Options
	$pagenavi_options = array();
	$pagenavi_options['current_text'] = '%PAGE_NUMBER%';
	$pagenavi_options['page_text'] = '%PAGE_NUMBER%';
	$pagenavi_options['first_text'] = __('&laquo; First','wp-pagenavi');
	$pagenavi_options['last_text'] = __('Last &raquo;','wp-pagenavi');
	$pagenavi_options['next_text'] = __('&raquo;','wp-pagenavi');
	$pagenavi_options['prev_text'] = __('&laquo;','wp-pagenavi');
	$pagenavi_options['dotright_text'] = __('...','wp-pagenavi');
	$pagenavi_options['dotleft_text'] = __('...','wp-pagenavi');
	$pagenavi_options['style'] = 1;
	$pagenavi_options['num_pages'] = 5;
	$pagenavi_options['always_show'] = 0;
	add_option('pagenavi_options', $pagenavi_options, 'PageNavi Options');
}

// Show menu in header.php
// Exlude the pages from the slider
function woo_exclude_pages() {

	$exclude = '';
	$exclude = $exclude . get_option( 'woo_tabber_pages' ) . ',' . get_option( 'woo_intro_page' ) . ',' . get_option( 'woo_intro_page_left' ) . ',' . get_option( 'woo_intro_page_right' );
	return $exclude;

}

?>