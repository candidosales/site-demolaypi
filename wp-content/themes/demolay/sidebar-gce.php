<aside id="sidebar_1">
 <ul>
	<li class="widget calendar">
		<h2 class="widgettitle">Calendário</h2>
		<?php get_template_part('inc/cal-gme'); ?>
	</li>
	<li class="widget calendar">
		<h2 class="widgettitle">Twitter</h2>
	</li>
	<li class="widget calendar">
		<h2 class="widgettitle">Atos</h2>
	</li>
	<li class="widget calendar">
		<h2 class="widgettitle">Vídeos</h2>
	</li>
	<li class="widget calendar">
		<h2 class="widgettitle">Álbum</h2>
	</li>
	<li class="widget" >
		<?php get_template_part('inc/publicidade'); ?>
	</li>
  <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar()) { ?>
   <li><!-- stuff shown here in case no widgets active --></li>
  <?php } ?>
 </ul>
</aside> 