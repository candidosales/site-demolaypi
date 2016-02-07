<?php get_header(); ?>
<div class="row content-main">
  	<div class="large-12 columns">
<?php if (have_posts()){ ?>
  <?php while (have_posts()) {
	the_post(); ?>
    <article class="post" id="post-<?php the_ID(); ?>"> 
		<hgroup>
			<h2>
				<?php the_title(); ?>
			</h2>
		  <?php echo get_post_meta($post->ID, 'PostThumb',true); ?>
		  <p class="meta">
			<span>Por</span> <?php the_author_meta("first_name"); ?> <span>em</span> <?php the_time('d/m/Y'); ?> | <?php the_category(', '); ?> 
		  </p>
	  </hgroup>
      <?php the_content('Read Full Article'); ?>
      <p><?php the_tags('Tags: ', ', ', '<br />'); ?>   
      <?php disqus_embed('demolaypi'); ?>
    </article>
  <?php } ?>
  <?php next_posts_link('Older Entries'); ?>
  <?php previous_posts_link('Newer Entries'); ?>    
<?php }else { ?>
  <h2>Nothing Found</h2>
<?php } ?>
	</div><!-- large-12 columns-->
</div><!-- row-->
<?php get_footer(); ?>