<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">

<title>
<?php if ( is_home() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php bloginfo('description'); ?><?php } ?>
<?php if ( is_search() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Search Results<?php } ?>
<?php if ( is_author() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Author Archives<?php } ?>
<?php if ( is_single() ) { ?><?php wp_title(''); ?>&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?>
<?php if ( is_page() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php wp_title(''); ?><?php } ?>
<?php if ( is_category() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Archive&nbsp;|&nbsp;<?php single_cat_title(); ?><?php } ?>
<?php if ( is_month() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Archive&nbsp;|&nbsp;<?php the_time('F'); ?><?php } ?>
<?php if (function_exists('is_tag')) { if ( is_tag() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Tag Archive&nbsp;|&nbsp;<?php  single_tag_title("", true); } } ?>
</title>

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( get_option('woo_feedburner_url') <> "" ) { echo get_option('woo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_directory'); ?>/css/reset.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_directory'); ?>/css/960.css" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
	
	<!--[if IE 7]>
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_directory'); ?>/ie7.css" />
	<![endif]-->

	<!--[if IE 6]>
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_directory'); ?>/ie6.css" />
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/includes/js/pngfix.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/includes/js/menu.js"></script>
	<![endif]-->

<?php if ( is_single() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>

</head>

<body class="custom">

<div id="container" class="container_16">

	<div id="topbar">
		
		<div id="nav" class="grid_11 alpha">
			
			<ul id="pagenav">
				
				<li class="<?php if ( is_home() ) { echo 'current_page_item'; } ?>"><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><span class="left"></span>Home<span class="right"></span></a></li>

				 <?php if ( get_option('woo_blog_subnavigation') == 'true' ) { wp_list_categories('hide_empty=true&title_li=<a href="#" title="Blog Categories">Categories</a>'); } ?>
		
				<?php $exclude = woo_exclude_pages(); ?>
				<?php wp_list_pages('sort_column=menu_order&depth=0&title_li=&exclude=' . $exclude . ',' . get_option( 'woo_exclude_pages_main' ) ); ?>
				
				<li class="rss"><a href="<?php if ( get_option('woo_feedburner_url') <> "" ) { echo get_option('woo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>" title="RSS Subscription">Inscrever-se RSS</a></li>
				
			</ul>
			
		</div><!-- /nav -->
		
		<div id="search">
		
			<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/" class="search-form">
			
				<label for="search">Buscar</label>	<input type="text" value="Buscar por..." name="s" id="s" class="field" onfocus="if (this.value == 'Buscar por...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Buscar por...';}" />
			
			</form>
		
		</div><!-- /search -->
	
	</div><!-- /topbar -->
	
	<div id="header">
	
		<div id="logo">
		
			<h1><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
			<h2><?php bloginfo('description'); ?></h2>
			
			<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><img class="logo" src="<?php if ( get_option('woo_logo') <> "" ) { echo get_option( 'woo_logo' ); } else { bloginfo('stylesheet_directory'); ?>/img/logo.png<?php } ?>" /></a>
			
		</div><!-- /logo -->
	</div><!-- /header -->
