<?php get_header(); ?>

<div id="single_content">
	
		<div id="left_single">

			<span class="heading">
					<?php if (is_category()) { ?>Archive for '<?php echo single_cat_title(); ?>'
					<?php } elseif (is_day()) { ?>Archive for <?php the_time('F jS, Y'); ?>
					<?php } elseif (is_month()) { ?>Archive for <?php the_time('F, Y'); ?>
					<?php } elseif (is_year()) { ?>Archive for the year <?php the_time('Y'); ?>
					<?php } elseif (is_author()) { ?>Archive by Author
					<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>Archives
					<?php } elseif (is_tag()) { ?>Tag Archives: <?php echo single_tag_title('', true); ?>
					<?php } ?>				
			</span>	
		
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<div class="post">
				
				<?php woo_get_image('image',get_option('woo_thumb_width'),get_option('woo_thumb_height'),''); ?>
			
				<h2 class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" ><?php the_title(); ?></a></h2>
				
				<span class="meta">
					<span class="date">Posted <?php the_time('d F Y') ;?> | </span>
					<span class="author">By <?php  the_author_posts_link(); ?> | </span>
					<span class="category">Categories: <?php the_category(', ') ?> | </span>
					<span class="comments"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></span>
				</span>
				
				<div class="entry">
	
					<?php

						if ( get_option('woo_content_archives') == 'true' ) 
							the_content('[...]'); 
						else 
							the_excerpt(); 					
									
					?>
				
				</div><!-- /entry -->
			
			</div><!-- /post -->
			
			<?php endwhile; endif; ?>
			
			<div class="pagenavi">
				<?php if (function_exists('wp_pagenavi')) { ?><?php wp_pagenavi(); ?><?php } ?>
			</div>			
			
		</div><!-- /left_single -->

		<?php get_sidebar(); ?>

	</div><!-- /single_content -->
	
	<div class="clear"></div>	

<?php get_footer(); ?>