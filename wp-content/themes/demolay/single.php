<?php get_header(); ?>
<div class="row">
  	<div class="large-8 columns">
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
			<span>Por</span> <?php the_author_meta("first_name"); ?> <span>em</span> <?php the_time('j.m.Y'); ?> | <?php the_category(', '); ?> 
		  </p>
	  </hgroup>
	  <div class="social">
			<div class="twitter">
				<a href="https://twitter.com/share" class="twitter-share-button" data-text="<?php the_title_attribute(); ?>" data-url="<?php the_permalink(); ?>" data-via="demolay_pi" data-lang="pt" data-size="medium" data-count="none">Tweet</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			</div>
			<div class="facebook">
				<div id="fb-root"></div>
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1&appId=103220779753447";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>
				<div class="fb-like" data-send="false" data-layout="button_count" data-width="auto" data-show-faces="true" data-font="arial" data-href="<?php the_permalink(); ?>"></div>
			</div>
		</div>
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
	</div><!-- eight columns-->
	<div class="large-4 columns">
		<?php get_sidebar("post"); ?>
	</div>
</div><!-- row-->
<?php get_footer(); ?>