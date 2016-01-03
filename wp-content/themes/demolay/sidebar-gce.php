<aside id="sidebar_1">
 <ul>
	<li class="widget calendar">
		<h2 class="widgettitle">Calendário</h2>
		<? require_once('ext/cal-gme.php'); ?>
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
		<? require_once('ext/publicidade.php'); ?>
	</li>
  <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar()) { ?>
   <li><!-- stuff shown here in case no widgets active --></li>
  <?php } ?>
 </ul>
</aside> 