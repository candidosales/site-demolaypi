<?php get_header(); ?>
<div class="row content-main">
  	<div id="documents" class="large-8 columns">
	  <h2><span class="icon-file" aria-hidden="true"></span>GELJ Legislação</h2>
      <div class="row">
	       <?php get_template_part( 'inc/content-taxonomy-documents' );?>
      </div>
	</div><!-- large-8 columns-->
	<div class="large-4 columns">
		<?php get_sidebar("cavalaria"); ?>
	</div>
</div><!-- row-->
<?php get_footer(); ?>


