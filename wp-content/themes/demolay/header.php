<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js" lang="pt-br" > <!--<![endif]-->
<head>

	<meta charset="<?php bloginfo('charset'); ?>">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() )  ?>/dist/img/favicon.jpg"/>

	<!-- default-->
	<link rel="apple-touch-icon" href="<?php echo esc_url( get_template_directory_uri() )  ?>/dist/img/apple-touch-icon-72x72.png" />
	<!-- ipad -->
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_url( get_template_directory_uri() )  ?>/dist/img/apple-touch-icon-72x72-precomposed.png" />
	<!-- iphone4 -->
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_url( get_template_directory_uri() )  ?>/dist/img/apple-touch-icon-114x114-precomposed.png" />

	<!-- high-resolution -->
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo esc_url( get_template_directory_uri() )  ?>/dist/img/apple-touch-icon-144x144-precomposed.png" />

	<meta name="apple-mobile-web-app-status-bar-style" content="red" />
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,900,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() )  ?>/dist/css/style.css" />

	<?php wp_head(); ?>	

	<title><?php wp_title(); ?></title>
</head>
<php flush(); ?>
<body class="example">
    <?php get_template_part( 'inc/nav' );?>
    <?php get_template_part( 'inc/banner-page' ); ?>
    <?php if(function_exists('rdfa_breadcrumb')){ ?>
	<nav id="breadcrumb">
		<div class="row">
			<div class="large-12 columns">
				<?php rdfa_breadcrumb(); ?>
			</div>
		</div>
	</nav>
    <?php } ?>