<?php get_header(); ?>

<div id="single_content">
	
		<div id="left_single">

			<span class="heading">
					Buscar por "<?php the_search_query() ?>"	
			</span>	
		
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<div class="post">
			
				<h2 class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" ><?php the_title(); ?></a></h2>
				
				<span class="meta">
					<span class="date">Postado <?php the_time('d F Y') ;?> | </span>
					<span class="author">Por <?php  the_author_posts_link(); ?> | </span>
					<span class="category">Categorias: <?php the_category(', ') ?> | </span>
					<span class="comments"><?php comments_popup_link('Sem comentários', '1 Comentário', '% Comentários'); ?></span>
				</span>
				
				<div class="entry">
				
					<?php the_excerpt(); ?>
				
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
