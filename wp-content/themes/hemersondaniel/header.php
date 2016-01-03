<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>
		<?php if (function_exists('is_tag') && is_tag()) {
	   single_tag_title('Tag Archive for &quot;'); echo '&quot; - ';
	  } elseif (is_archive()) {
	   wp_title(''); echo ' Archive - ';
	  } elseif (is_search()) {
	   echo 'Search for &quot;'.wp_specialchars($s).'&quot; - ';
	  } elseif (!(is_404()) && (is_single()) || (is_page())) {
	   wp_title(''); echo ' - ';
	  } elseif (is_404()) {
	   echo 'Not Found - ';
	  }
	  if (is_home()) {
	   bloginfo('name'); echo ' - '; bloginfo('description');
	  } else {
	   bloginfo('name');
	  }
	  if ($paged > 1) {
	   echo ' - page '. $paged;
	  } ?></title>
	<meta name="description" content="">
	<meta name="author" content="">

	<meta name="viewport" content="width=device-width">

	<link rel="stylesheet/less" href="<?php bloginfo('template_url'); ?>/less/style.less">
	<script src="<?php bloginfo('template_url'); ?>/js/libs/less-1.3.0.min.js"></script>
	
	<!-- Use SimpLESS (Win/Linux/Mac) or LESS.app (Mac) to compile your .less files
	to style.css, and replace the 2 lines above by this one:

	<link rel="stylesheet" href="less/style.css">
	 -->
	 
  <!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"> </script>
  <![endif]-->

	<script src="<?php bloginfo('template_url'); ?>/js/libs/modernizr-2.5.3.min.js"></script>
</head>
<body>
<!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
<header>
	<section id="header-main" class="container">
		<a href="#">
			<img src="<?php bloginfo('template_url'); ?>/img/logomarca.png"></img>
		</a>
		<a id="donate" class="hidden-phone" href="#" title="Contribua com o melhor para Teresina">
			Contribua com o melhor para Teresina
		</a>
	</section>
</header>
<nav>
	<div class="navbar navbar-top">
      <div class="navbar-inner">
        <div class="container">
          <button data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar" type="button">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="">
                <a href="#">SOBRE</a>
              </li>
              <li class="">
                <a href="#">#MOVIMENTOPINTE</a>
              </li>
              <li class="">
                <a href="#">CONTRIBUA</a>
              </li>
              <li class="active">
                <a href="#">AGENDA</a>
              </li>
              <li class="">
                <a href="#">FOTOS</a>
              </li>
              <li class="">
                <a href="#">VÍDEOS</a>
              </li>
			  <li class="">
                <a href="#">CONTATO</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
</nav>