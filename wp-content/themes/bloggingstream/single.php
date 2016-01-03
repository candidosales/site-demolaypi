<?php get_header(); ?>

<div id="single_content">
	
		<div id="left_single">
		
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<div class="post">
			
				<h2><?php the_title(); ?></h2>
				
				<div class="entry">
					
					<?php if ( get_option('woo_image_single') == 'true' )  woo_get_image('image',get_option('woo_single_width'),get_option('woo_single_height'),'alignright'); ?>
				
					<?php the_content(); ?>
				
				</div><!-- /entry -->
			
			</div><!-- /post -->
			
			<?php endwhile; endif; ?>
			
			<div id="comments">
				<?php comments_template(); ?>    	
			</div><!-- /comments -->
			
		</div><!-- /left_single -->

		<?php get_sidebar(); ?>

	</div><!-- /single_content -->
	
	<div class="clear"></div>	

<?php get_footer(); ?>