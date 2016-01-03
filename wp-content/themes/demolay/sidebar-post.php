<aside id="sidebar_1">
 <ul>
	<li class="widget" >
		<? require_once('ext/publicidade.php'); ?>
	</li>
  <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar()) { ?>
   <li><!-- stuff shown here in case no widgets active --></li>
  <?php } ?>
 </ul>
</aside> 