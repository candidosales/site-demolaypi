<?php get_header(); ?>
<div class="row">
  	<div id="blog" class="large-8 columns">
  		  <h2><span class="icon-play" aria-hidden="true"></span>Vídeos</h2>
	   	  <div class="large-12 columns">

	  		<?php 


	  			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				query_posts('cat=4&paged=' . $paged);

			while (have_posts()) { the_post(); 

					$imgvideo = get_post_meta($post->ID, 'link_video', true);
					$url_youtube = array('https' , 'httpv', 'http');

					foreach ($url_youtube as $url) {

						$imgvideo_compare = strtolower($imgvideo);
						$pos = stripos($imgvideo_compare, $url);

						if($pos !== false ){
							$imgvideo = str_replace($url.'://www.youtube.com/watch?v=','http://img.youtube.com/vi/',$imgvideo);
							
						}
					}
					$imgvideo .= "/0.jpg";

				?>
      									

	   	  	<article>
	   	  		<div class="large-4 columns">
	   	  			<ul class="post-date">
	   	  				<li class="date">
						<a title="Permanent Link to <?php the_title_attribute(); ?>" rel="bookmark" href="<?php the_permalink(); ?>">
							<span><?php the_time('j'); ?></span><?php the_time('m. Y'); ?></a>
						</li>
					</ul>
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Clique aqui para <?php the_title(); ?>">
						<img src="<?=$imgvideo?>" alt="<?php the_title(); ?> Thumbnail" />
					</a>
	   	  		</div>
	   	  		<div class="large-8 columns">
	   	  			<hgroup>
						<h4>
							<a itemprop="title" href="<?php the_permalink(); ?>" rel="bookmark" title="Clique aqui para <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						</h4>
						<p class="meta" itemprop="name">
							<span>Por</span> <?php the_author_meta('first_name'); the_tags('Tags: ', ', ', '<br />'); ?>
						</p>
					</hgroup>
					<? the_excerpt(); ?>
	   	  		</div>
	   	 	</article>
	   	 	<?php }	?>
			
				<div class="navigation">
		        	<div class="alignleft"><?php previous_posts_link('&laquo; Anterior') ?></div>
		        	<div class="alignright"><?php next_posts_link('Próximo página &raquo;') ?></div>
		       	</div>
			
	   	  </div>

	</div><!-- large-8 columns-->
	<div class="large-4 columns">
		<?php get_sidebar("cavalaria"); ?>
	</div>
</div><!-- row-->
<?php get_footer(); ?>