<?php get_header(); ?>

	<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
	<?php if (have_posts()) : $count = 0; ?>

	<?php if ( $paged == 1 ) { ?>
	
	<div id="featured">
		
		<?php while (have_posts()) : the_post(); $count++;?>
		
		<span class="heading">Últimos artigos</span>
		
		<?php if ( get_option( 'woo_featured_layout'  ) <> "" ) { include_once( TEMPLATEPATH . '/featured-layouts/' . get_option( 'woo_featured_layout'  ) ); } else { include_once( TEMPLATEPATH . '/featured-layouts/large_no_ad.php' ); } ?>
		
		<?php if ( $count == 1 ) { break; } ?>
		
		<?php endwhile; ?>
	
	</div><!-- /featured -->
	
	<?php } ?>
	
	<div id="home_content">
	
		<div id="left">
		
			<div id="more_posts" class="box">
			
				<span class="heading">Mais artigos</span>
				
				<div class="clear"></div>
				
				<?php $count = 0; ?>
				
				<?php while (have_posts()) : the_post(); $count++;?>
				
				<div class="item <?php if ( $count == 1 ) { ?>left<?php } ?>">
					
					<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					
					<p><?php woo_get_image('image',get_option('woo_thumb_width'),get_option('woo_thumb_height'),''); ?> <?php the_excerpt(); ?> <a class="read_more" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Leia &rarr;</a></p>
					
				</div><!-- /item -->
				
				<?php if ( $count == 2 ) { $count = 0; ?><div class="clear"></div><?php } ?>
				
				<?php endwhile; ?>
				
				<div class="clear"></div>
				
					<div class="pagenavi">
						<?php if (function_exists('wp_pagenavi')) { ?><?php wp_pagenavi(); ?><?php } ?>
					</div>
			
			</div><!-- /more_posts -->
			
			<?php include_once( TEMPLATEPATH . '/ads/content_ad.php' ); ?>
			
			<div id="lifestream" class="box">
			
				<span class="heading">Lifestream</span>
				
				<?php if (function_exists('lifestream')) { lifestream(); } ?>
			
			</div><!-- /lifestream -->
		
		</div><!-- /left -->
		
		<div id="middle">
		
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(1) ) : ?>
			
			<?php endif; ?>			
		
		</div><!-- /middle -->

		<?php get_sidebar(); ?>

	</div><!-- /home_content -->
	
	<?php endif; ?>
	
	<div class="clear"></div>		

<?php get_footer(); ?>
