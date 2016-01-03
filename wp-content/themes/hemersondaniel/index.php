<?php get_header(); ?>
<section id="ribbon" class="hidden-phone">
	<div class="container">
	</div>
</section>
<section id="main">
	<div class="container">
		<div class="row-fluid">
			<aside id="photo" class="span5">
				<img src="<?php bloginfo('template_url'); ?>/img/hemerson-daniel-2.png"></img>
			</aside>
			<section id="slide" class="span7">
			   <div class="carousel slide" id="myCarousel">
				<div class="carousel-inner">
				  <div class="item">
					<img alt="" src="<?php bloginfo('template_url'); ?>/img/bootstrap-mdo-sfmoma-01.jpg">
					<div class="carousel-caption">
					  <h4>First Thumbnail label</h4>
					  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
					</div>
				  </div>
				  <div class="item">
					<img alt="" src="<?php bloginfo('template_url'); ?>/img/bootstrap-mdo-sfmoma-02.jpg">
					<div class="carousel-caption">
					  <h4>Second Thumbnail label</h4>
					  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
					</div>
				  </div>
				</div>
				<a data-slide="prev" href="#myCarousel" class="left carousel-control">‹</a>
				<a data-slide="next" href="#myCarousel" class="right carousel-control">›</a>
			  </div>
			</section>
		</div>
	</div>
</section>

<div class="container">
	<nav id="breadcrumb">
			<ul>
				<li><a>Home</a></li>
			</ul>
	</nav>
	<div class="row-fluid">
	  <?php 
	   
		$news = new WP_Query(array(
										'showposts' => 4,
										'tax_query' => array(
											array(
											  'taxonomy' => 'post_format',
											  'field' => 'slug',
											  'operator' => 'NOT IN'
											)
										  )
										));
										
		if($news->have_posts()){ ?>
		  <?php 
			$i=0;
			while($news->have_posts()) { 
				$news->the_post();?>
	
	
		<section id="news" class="span8">
		   <article id="post-<?php the_ID(); ?> itemscope itemtype="http://schema.org/Article">
						<a itemprop="photo" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
							<?php 
							if ( function_exists( 'the_post_thumbnail' ) ){
								the_post_thumbnail( array(728,180) );
							}
							?>
						</a>
				<ul class="post-date">
					<li class="date" itemprop="dateCreated">
							<a title="<?php the_title_attribute(); ?>" rel="bookmark" href="<?php the_permalink(); ?>"><span><?php the_time('j'); ?></span><?php the_time('m. Y'); ?></a>
					</li>
				</ul>
				<hgroup>
					<a itemprop="title" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
						<h2 itemprop="name"><?php the_title(); ?></h2>
					</a>
					<p class="author" itemprop="author">escrito por <?php the_author(); ?></p>
				</hgroup>
				<div class="social">
					<h3>Compartilhe: </h3>
					<div class="twitter">
						<a href="https://twitter.com/share" class="twitter-share-button" data-text="<?php the_title_attribute(); ?>" data-url="<?php the_permalink(); ?>" data-via="hemersondaniel" data-lang="pt" data-size="medium" data-count="none">Tweet</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
					</div>
					<div class="facebook">
						<div class="fb-like" data-send="false" data-layout="button_count" data-width="auto" data-show-faces="true" data-font="arial"></div>
					</div>
				</div>
				<p>	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
				<p> 	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
		   </article> 
			<?php }	
			
				next_posts_link('Older Entries');  previous_posts_link('Newer Entries'); 
			
			}else{ ?>
			  <h2>Nothing Found</h2>
			<?php } ?>
		</section>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>