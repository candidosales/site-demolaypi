<?php get_header(); ?>
<div class="row content-main">
  	<div id="calendario" class="large-8 columns">
	 <h2>
         <span class="icon-calendar" aria-hidden="true"></span>Calendário GCE
     </h2>
       <?php get_template_part( 'inc/content-taxonomy-events' );?>
    </div>
	<div class="large-4 columns">
		<?php get_sidebar(); ?>
	</div>
</div><!-- row-->
<?php get_footer(); ?>