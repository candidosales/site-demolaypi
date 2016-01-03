<div id="full_article">
			
	<div class="image">
		<?php woo_get_image('image',get_option('woo_image_width'),get_option('woo_image_height'),''); ?>
	</div>
			
	<div class="text">
		<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>	
		<span class="meta"><span class="date">Posted <?php the_time('d F Y'); ?></span> | <a class="comments" href="<?php comments_link(); ?>" title="Comment on this post"><?php comments_number('0 Comments','1 Comment','% Comments'); ?></a></span>
			
		<p><?php the_excerpt(); ?> <a class="read_more" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read more &rarr;</a></p>
	</div>
			
</div><!--full_article-->