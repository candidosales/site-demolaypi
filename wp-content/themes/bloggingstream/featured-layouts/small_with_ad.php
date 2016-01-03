<div id="article">
			
	<div id="title">
		<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>	
		<span class="meta"><span class="date">Posted <?php the_time('d F Y'); ?></span> <br /> <a class="comments" href="<?php comments_link(); ?>" title="Comment on this post"><?php comments_number('0 Comments','1 Comment','% Comments'); ?></a></span>
	</div>
			
	<div class="text">
		<p><?php the_excerpt(); ?> <a class="read_more" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read more &rarr;</a></p>
	</div>
			
	<div class="thumb">
		<?php woo_get_image('image',get_option('woo_feat_alt_width'),get_option('woo_feat_alt_height'),''); ?>
	</div>
		
</div><!--/article-->
		
<div id="feat_ad">
		
	<?php if (get_option('woo_ad_block_adsense') <> "") { echo stripslashes(get_option('woo_ad_block_adsense')); ?>
	
	<?php } else { ?>
	
		<a href="<?php echo get_option('woo_ad_block_url'); ?>"><img src="<?php echo get_option('woo_ad_block_image'); ?>" width="300" height="250" alt="advert" /></a>
		
	<?php } ?>	
		
</div>