<?php
/*
Template Name: Sitemap
*/
?>

<?php get_header(); ?>

<div id="single_content">
	
		<div id="left_single">
		
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<div class="post">
			
				<h2 class="title"><?php the_title(); ?></h2>
				
				<div class="entry sitemap">
			
					<h3>Pages</h3>
					
					<ul><?php wp_list_pages('sort_column=menu_order&depth=0&title_li='); ?></ul>

					<h3>Blog / News Categories</h3>
						
					<ul><?php wp_list_categories('depth=0&title_li=&show_count=1'); ?></ul>

					<h3>Blog / News Monthly Archives</h3>
					
					<ul><?php wp_get_archives('type=monthly&limit=12'); ?> </ul>
		
				</div><!-- /entry -->	
			
			</div><!-- /post -->
			
			<?php endwhile; endif; ?>
			
		</div><!-- /left_single -->

		<?php get_sidebar(); ?>

	</div><!-- /single_content -->
	
	<div class="clear"></div>	

<?php get_footer(); ?>