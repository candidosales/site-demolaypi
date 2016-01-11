

<?php get_header(); ?>
<div class="row content-main">
  	<div id="news" class="large-8 columns">
        <div class="row">  
  		<?php if ( have_posts() ) { ?>
  		  <h2>Resultados da pesquisa para: <span><?php echo get_search_query()?></span></h2>
	   	  <div class="large-12 columns">

	  		<?php while (have_posts()) { the_post(); ?>
      									

	   	  	<article>
	   	  		<div class="large-4 columns">
	   	  			<ul class="post-date">
	   	  				<li class="date">
						<a title="Permanent Link to <?php the_title_attribute(); ?>" rel="bookmark" href="<?php the_permalink(); ?>">
							<span><?php the_time('d'); ?></span><?php the_time('m/Y'); ?></a>
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
			<?php }else { ?>

				 <h2>Nada foi encontrado</h2>
				 <div class="large-12 columns">
					<div class="entry-content">
						<p>Desculpe, mas nada foi encontrado. Tente novamente outro termo.</p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
	   	 	<?php }?>
	   	  </div>

        </div>             
	</div><!-- large-8 columns-->
	<div class="large-4 columns">
		<?php get_sidebar("cavalaria"); ?>
	</div>
</div><!-- row-->
<?php get_footer(); ?>