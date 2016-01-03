<?php

// Enqueue for header and footer, thanks to flickapix on Github.
// // Enqueue css files
// function candido_css() {
//   if ( !is_admin() ) {

//      wp_register_style( 'foundation',get_template_directory_uri() . '/css/foundation.min.css', false );
//      wp_enqueue_style( 'foundation');

//      wp_register_style( 'less',get_template_directory_uri() . '/css/cssCommon.less', false );
//      wp_enqueue_style( 'less');
//      add_filter('style_loader_tag', 'tag_less');
     
//   }
// }
// add_action( 'init', 'candido_css' );


// function tag_less ($tag){
//   //do stuff here to find and replace the rel attribute    
//   return preg_replace("/='stylesheet' id='less-css'/", "='stylesheet/less' id='less-css'", $tag);
// }



// Enqueue js files
// function candido_scripts() {

// global $is_IE;

//   if ( !is_admin() ) {
  
//   // Enqueue to header
 
//     wp_deregister_script( 'jquery' );
//     /*wp_register_script( 'foundation', get_template_directory_uri() . '/js/foundation.min.js',array() );
//     wp_enqueue_script( 'foundation' );

//     wp_register_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.foundation.js', array( ) );
//     wp_enqueue_script( 'modernizr' );*/

//     wp_register_script( 'foundation', get_template_directory_uri() . '/js/foundation.modernizr.min.js',array() );
//     wp_enqueue_script( 'foundation' );

//     wp_register_script( 'less', get_template_directory_uri() . '/js/less-1.3.0.min.js', array() );
//     wp_enqueue_script( 'less' );

//   // Enqueue to footer

//     wp_register_script( 'tweetable', get_template_directory_uri() . '/js/tweetable.jquery.min.js', array(), false, true );
//     wp_enqueue_script( 'tweetable' );

//     wp_register_script( 'app', get_template_directory_uri() . '/js/app.js', array(), false, true );
//     wp_enqueue_script( 'app' );

      
//      if ($is_IE) {
//         wp_register_script( 'html5shiv', "http://html5shiv.googlecode.com/svn/trunk/html5.js" , false, true);
//         wp_enqueue_script ( 'html5shiv' );
//      }
     
//   }
// }
// add_action( 'init', 'candido_scripts' );