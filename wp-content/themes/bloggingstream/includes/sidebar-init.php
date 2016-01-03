<?php

// Register widgetized areas

function the_widgets_init() {
    if ( !function_exists('register_sidebars') )
        return;

    register_sidebars(1,array('name' => 'Homepage','before_widget' => '<div id="%1$s" class="box widget %2$s">','after_widget' => '</div>','before_title' => '<span class="heading">','after_title' => '</span>'));
    register_sidebars(1,array('name' => 'Sidebar','before_widget' => '<div id="%1$s" class="box widget %2$s">','after_widget' => '</div>','before_title' => '<span class="heading">','after_title' => '</span>'));    

}

add_action( 'init', 'the_widgets_init' );


    
?>