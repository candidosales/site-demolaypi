<?php if (have_posts()){ ?>
  <?php while (have_posts()) {
	the_post(); ?>
    <article class="post" id="post-<?php the_ID(); ?>"> 
		<hgroup>
			<h2>
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			</h2>
		  <?php echo get_post_meta($post->ID, 'PostThumb',true); ?>
		  <p class="meta">
			<span>Posted on</span> <?php the_time('F jS, Y'); ?> <span>by</span> <?php the_author(); ?>
		  </p>
	  </hgroup>
      <?php the_content('Read Full Article'); ?>
      <p><?php the_tags('Tags: ', ', ', '<br />'); ?>   
      Posted in <?php the_category(', '); ?>   <?php comments_popup_link('No Comments;','1 Comment', '% Comments'); ?></p>
    </article>
  <?php } ?>
  <?php next_posts_link('Older Entries'); ?>
  <?php previous_posts_link('Newer Entries'); ?>    
<?php }else { ?>
  <h2>Nothing Found</h2>
<?php } ?>