<?php get_header(); ?>
<div class="row">
  	<div id="blog" class="eight columns">
  		  <h2>Notícias da Cavalaria</h2>
	   	  <div class="twelve columns">

	  		<?php 


	  			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				query_posts('cat=33&paged=' . $paged);

			while (have_posts()) { the_post(); ?>
      									

	   	  	<article>
	   	  		<div class="four columns">
	   	  			<ul class="post-date">
	   	  				<li class="date">
						<a title="Permanent Link to <?php the_title_attribute(); ?>" rel="bookmark" href="<?php the_permalink(); ?>">
							<span><?php the_time('j'); ?></span><?php the_time('m. Y'); ?></a>
						</li>
					</ul>
					<a itemprop="photo" href="<?php the_permalink(); ?>" rel="bookmark" title="Clique aqui para <?php the_title_attribute(); ?>">

					<?php 
							if(has_post_thumbnail()){
									the_post_thumbnail('thumb-3');
								}else{?>
								<img class="thumbnail" src="<?php bloginfo('template_url'); ?>/img/1.jpg"></img>
							<?	}?>
					</a>
	   	  		</div>
	   	  		<div class="eight columns">
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

	</div><!-- eight columns-->
	<div class="four columns">
		<?php get_sidebar("cavalaria"); ?>
	</div>
</div><!-- row-->
<?php get_footer(); ?>