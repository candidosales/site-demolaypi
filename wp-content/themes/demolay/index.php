<?php get_header(); ?>
<div class="row content-main">
  	<div id="main" class="large-8 columns">
	   <?php 
	   
		$highlights = new WP_Query(array(
										'showposts' => 2,
										'category_name ' => 'noticia',
										'tax_query' => array(
											array(
											  'taxonomy' => 'post_format',
											  'field' => 'slug',
											  'terms' => array('post-format-video','post-format-audio','post-format-gallery'),
											  'operator' => 'NOT IN'
											)
										  )
										));
										
		if($highlights->have_posts()){ ?>
		  <?php 
			while($highlights->have_posts()) { 
				$highlights->the_post();
				?>

					<div class="large-6 columns">
						<article class="post-highlights" id="post-<?php the_ID(); ?>"> 
		
						<ul class="post-date">
							<li class="date">
								<a title="Permanent Link to <?php the_title_attribute(); ?>" rel="bookmark" href="<?php the_permalink(); ?>">
								<span><?php the_time('j'); ?></span><?php the_time('m. Y'); ?></a>
							</li>
						</ul>
						<a itemprop="photo" href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
							<?php 
							if ( function_exists( 'the_post_thumbnail' ) ){
								the_post_thumbnail( array(300,200) );
								}else{?>
							<img class="thumbnail" src="<?php bloginfo('template_url'); ?>/img/1.jpg"></img>
								<?	}?>
							
						</a>
						<hgroup>
							<h2>
								<a itemprop="title" href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
							</h2>
							  <p class="meta" itemprop="name">
								<span>Por</span> <?php the_author_meta('first_name');  the_tags('Tags: ', ', ', '<br />'); ?></p>
				
						  </hgroup>
					  <?php the_excerpt();?>
					</article>
					</div>			
					<?php }  //next_posts_link('Older Entries');  //previous_posts_link('Newer Entries'); 

						}else { ?>
					  <h2>Nothing Found</h2>
					<?php } ?>
		
		<div class="large-12 columns">
			<section id="twitter">
				<span class="icon-twitter" aria-hidden="true"></span>
				<div class="tweets-pulled-listing">
					  <h2>Em tempo real<br><span>@DeMolay_Pi</span></h2>
				  </div>
			</section>
		</div>

		<div class="large-12 columns">
		<div class="large-6 columns">
			<section id="recent">
				<h3>Recente</h3>
				<?php 
					$recent = new WP_Query(array(
											'showposts' => 3,
										    'category_name ' => 'noticia',
											'offset' => 2,
											'tax_query' => array(
												array(
												  'taxonomy' => 'post_format',
												  'field' => 'slug',
												  'terms' => array('post-format-video','post-format-audio','post-format-gallery'),
												  'operator' => 'NOT IN'
												)
											  )
											));
											
					while($recent->have_posts()) {	
					$recent->the_post();
				?>
				<article>
					<ul class="post-date">
						<li class="date">
							<a title="Permanent Link to <?php the_title_attribute(); ?>" rel="bookmark" href="<?php the_permalink(); ?>">
								<span><?php the_time('j'); ?></span><?php the_time('m. Y'); ?></a>
						</li>
					</ul>
					<a itemprop="photo" href="<?php the_permalink(); ?>" rel="bookmark" title="Clique aqui para <?php the_title_attribute(); ?>">
					<?php 
						if ( function_exists( 'the_post_thumbnail' ) ){
							the_post_thumbnail( 'thumb-2' );
						}else{?>
							<img class="thumbnail" src="<?php bloginfo('template_url'); ?>/img/1.jpg"></img>
						<?	}?>
					
					</a>
					<hgroup>
						<h4>
							<a itemprop="title" href="<?php the_permalink(); ?>" rel="bookmark" title="Clique aqui para <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						</h4>
						<p class="meta" itemprop="name">
							<span>Por</span> <?php the_author_meta('first_name'); the_tags('Tags: ', ', ', '<br />'); ?>
						</p>
					</hgroup>	
				</article>
				<?php } ?>
					<div class="more"  >
						<a class="secondary small radius button" href="<?php bloginfo('url')?>/noticia">veja mais notícias</a>
					</div>
			</section>
		</div><!-- large-6 columns -->
		<div class="large-6 columns">
			<section id="recent" class="cavalry">
				<h3>Cavalaria</h3>
				<?php 
					$recent = new WP_Query(array(
										'showposts' => 3,
										'category_name ' => 'noticia-cavalaria',
										'tax_query' => array(
											array(
											  'taxonomy' => 'post_format',
											  'field' => 'slug',
											  'terms' => array('post-format-video','post-format-audio','post-format-gallery'),
											  'operator' => 'NOT IN'
											)
										  )
										));
											
					while($recent->have_posts()) {	
					$recent->the_post();
				?>
				<article>
					<ul class="post-date">
						<li class="date">
							<a title="Permanent Link to <?php the_title_attribute(); ?>" rel="bookmark" href="<?php the_permalink(); ?>">
								<span><?php the_time('j'); ?></span><?php the_time('m. Y'); ?></a>
						</li>
					</ul>
					<a itemprop="photo" href="<?php the_permalink(); ?>" rel="bookmark" title="Clique aqui para <?php the_title_attribute(); ?>">
					<?php 
						if ( function_exists( 'the_post_thumbnail' ) ){
							the_post_thumbnail( 'thumb-2' );
						}else{?>
							<img class="thumbnail" src="<?php bloginfo('template_url'); ?>/dist/img/1.jpg"></img>
						<?	}?>
					
					</a>
					<hgroup>
						<h4>
							<a itemprop="title" href="<?php the_permalink(); ?>" rel="bookmark" title="Clique aqui para <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						</h4>
						<p class="meta" itemprop="name">
							<span>Por</span> <?php the_author_meta('first_name'); ?>
						</p>
					</hgroup>	
				</article>
				<?php } ?>
					<div class="more"  >
						<a class="secondary small radius button" href="<?php bloginfo('url')?>/cavalaria/noticia-cavalaria">veja mais cavalaria</a>
					</div>
			</section>
		</div><!-- large-6 columns -->
		<!--<div class="large-6 columns">
			<section id="videos" >
				<h3>Vídeos</h3>
				<?php 		
					$video = new WP_Query(array(
											'showposts' => 3,
										    'category_name ' => 'noticia',
											'tax_query' => array(
												array(
												  'taxonomy' => 'post_format',
												  'field' => 'slug',
												  'terms' => 'post-format-video'
												)
											  )
											));
					
					while($video->have_posts()) {	
					$video->the_post();
					
					$imgvideo = get_post_meta($post->ID, 'link_video', true);
					$url_youtube = array('https' , 'httpv', 'http');

					foreach ($url_youtube as $url) {

						$imgvideo_compare = strtolower($imgvideo);
						$pos = stripos($imgvideo_compare, $url);

						if($pos !== false ){
							$imgvideo = str_replace($url.'://www.youtube.com/watch?v=','http://img.youtube.com/vi/',$imgvideo);
							
						}
					}
					$imgvideo .= "/2.jpg";
				?>
				<article>
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Clique aqui para <?php the_title(); ?>">
						<img width="90" hlarge-8="60" src="<?=$imgvideo?>" alt="<?php the_title(); ?> Thumbnail" />
					</a>
					<hgroup>
						<h4>
							<a itemprop="title" href="<?php the_permalink(); ?>" rel="bookmark" title="Clique aqui para <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						</h4>
						<p class="meta" itemprop="name">
							<span>Enviado por</span> <?php the_author_meta('first_name'); ?>
						</p>
					</hgroup>	
				</article>
			
				<?php } ?>
				<div class="more"  >
						<a class="secondary small radius button" href="<?php bloginfo('url')?>/video">veja mais vídeos</a>
					</div>
			</section>
		</div><!-- large-6 columns -->
		</div><!-- large-12 columns -->
		<!--<div class="large-4 columns">
			<section id="cavalry">
			<h3>Cavalaria</h3>
			<?php 
				$recent = new WP_Query(array(
										'showposts' => 2,
										'cat' => 33,
										'tax_query' => array(
											array(
											  'taxonomy' => 'post_format',
											  'field' => 'slug',
											  'terms' => array('post-format-video','post-format-audio','post-format-gallery'),
											  'operator' => 'NOT IN'
											)
										  )
										));
				$i=0;						
				while($recent->have_posts()) {	
				$recent->the_post();
				
			?>
			<article>
			<?php if($i<=0){?>
				<ul class="post-date">
					<li class="date">
						<a title="Permanent Link to <?php the_title_attribute(); ?>" rel="bookmark" href="<?php the_permalink(); ?>">
							<span><?php the_time('j'); ?></span><?php the_time('m. Y'); ?></a>
					</li>
				</ul>
				<a itemprop="photo" href="<?php the_permalink(); ?>" rel="bookmark" title="Clique aqui para <?php the_title_attribute(); ?>">
				<?php 
					if ( function_exists( 'the_post_thumbnail' ) ){
						the_post_thumbnail('thumb-3');
					}
				?>
				</a>
				<hgroup>
					<h4>
						<a itemprop="title" href="<?php the_permalink(); ?>" rel="bookmark" title="Clique aqui para <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
					</h4>
					<p class="meta" itemprop="name">
						<span>Por</span> <?php the_author_meta('first_name'); ?>
					</p>
				</hgroup>	
			
				<?}else{?>
				<hgroup>
					<h4 class="sub">
						<a itemprop="title" href="<?php the_permalink(); ?>" rel="bookmark" title="Clique aqui para <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
					</h4>
				</hgroup>	
				
				<? } $i++;?>
			</article>
			<? } ?>		
					<div class="more"  >
						<a class="secondary small radius button" href="<?php bloginfo('url')?>/cavalaria/noticia-cavalaria">veja mais cavalaria</a>
					</div>	
			</section>
		</div>
		<div class="large-4 columns">
		<section id="alumni">
			<h3>Alumni</h3>
					<?php 
				$recent = new WP_Query(array(
										'showposts' => 2,
										'cat' => 7,
										'tax_query' => array(
											array(
											  'taxonomy' => 'post_format',
											  'field' => 'slug',
											  'terms' => array('post-format-video','post-format-audio','post-format-gallery'),
											  'operator' => 'NOT IN'
											)
										  )
										));
				$i=0;						
				while($recent->have_posts()) {	
				$recent->the_post();
				
			?>
			<article>
			<?php if($i<=0){?>
				<ul class="post-date">
					<li class="date">
						<a title="Permanent Link to <?php the_title_attribute(); ?>" rel="bookmark" href="<?php the_permalink(); ?>">
							<span><?php the_time('j'); ?></span><?php the_time('m. Y'); ?></a>
					</li>
				</ul>
				<a itemprop="photo" href="<?php the_permalink(); ?>" rel="bookmark" title="Clique aqui para <?php the_title_attribute(); ?>">
				<?php 
					if ( function_exists( 'the_post_thumbnail' ) ){
						the_post_thumbnail('thumb-3');
					}
				?>
				</a>
				<hgroup>
					<h4>
						<a itemprop="title" href="<?php the_permalink(); ?>" rel="bookmark" title="Clique aqui para <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
					</h4>
					<p class="meta" itemprop="name">
						<span>Por</span> <?php the_author_meta('first_name'); ?>
					</p>
				</hgroup>	
			
				<?}else{?>
				<hgroup>
					<h4 class="sub">
						<a itemprop="title" href="<?php the_permalink(); ?>" rel="bookmark" title="Clique aqui para <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
					</h4>
				</hgroup>	
				
				<? } $i++;?>
			</article>
			<? } ?>
				<div class="more"  >
						<a class="secondary small radius button" href="#">veja mais alumni</a>
					</div>	
		</section>
	
		</div>
		<div class="large-4 columns">
		<section id="court">
			<h3>Corte</h3>
					<?php 
				$recent = new WP_Query(array(
										'showposts' => 2,
										'cat' => 8,
										'tax_query' => array(
											array(
											  'taxonomy' => 'post_format',
											  'field' => 'slug',
											  'terms' => array('post-format-video','post-format-audio','post-format-gallery'),
											  'operator' => 'NOT IN'
											)
										  )
										));
				$i=0;						
				while($recent->have_posts()) {	
				$recent->the_post();
				
			?>
			<article>
			<?php if($i<=0){?>
				<ul class="post-date">
					<li class="date">
						<a title="Permanent Link to <?php the_title_attribute(); ?>" rel="bookmark" href="<?php the_permalink(); ?>">
							<span><?php the_time('j'); ?></span><?php the_time('m. Y'); ?></a>
					</li>
				</ul>
				<a itemprop="photo" href="<?php the_permalink(); ?>" rel="bookmark" title="Clique aqui para <?php the_title_attribute(); ?>">
				<?php 
					if ( function_exists( 'the_post_thumbnail' ) ){
						the_post_thumbnail('thumb-3');
					}
				?>
				</a>
				<hgroup>
					<h4>
						<a itemprop="title" href="<?php the_permalink(); ?>" rel="bookmark" title="Clique aqui para <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
					</h4>
					<p class="meta" itemprop="name">
						<span>Por</span> <?php the_author_meta('first_name'); ?>
					</p>
				</hgroup>	
			
				<?}else{?>
				<hgroup>
					<h4 class="sub">
						<a itemprop="title" href="<?php the_permalink(); ?>" rel="bookmark" title="Clique aqui para <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
					</h4>
				</hgroup>	
				
				<? } $i++;?>
			</article>
			<? } ?>
					<div class="more"  >
						<a class="secondary small radius button" href="#">veja mais corte</a>
					</div>	
		</section>

		</div>-->
	</div><!-- large-8 columns-->
	<div class="large-4 columns">
		<?php get_sidebar(); ?>
	</div>
</div><!-- row-->
<?php get_footer(); ?>


