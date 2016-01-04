	<aside id="sidebar_1">
	 <ul>
		<li class="widget leadership" id="recent-posts-2">
				
			<?php 
			$gce = new WP_Query('category_name=blog-gme&showposts=1');								
			if($gce->have_posts()){ ?>
			  <?php 
					while($gce->have_posts()) { 
					$gce->the_post();
				?>		
				<div class="row">
					<div class="large-4 columns">
						<a itemprop="title" href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
							<img src="<?php echo esc_url( get_template_directory_uri() )  ?>/dist/img/gme-tratada-thumb.jpg"/>
						</a>
					</div>
					<div class="large-8 columns">
						<h4 class="gme">
								<a itemprop="title" href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						</h4>
						<?php the_excerpt();?>
					</div>
				</div>		
			<?} 
			}?>
			<?php 
			$mce = new WP_Query('category_name="blog-mce"&showposts=1');								
			if($mce->have_posts()){ ?>
			  <?php 
					while($mce->have_posts()) { 
					$mce->the_post();
				?>		
				<div class="row">
					<div class="large-4 columns">
						<a itemprop="title" href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
							<img src="<?php echo esc_url( get_template_directory_uri() )  ?>/dist/img/mce-tratada-thumb.jpg"/>
						</a>
					</div>
					<div class="large-8 columns">
						<h4 class="mce">
								<a itemprop="title" href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						</h4>
						<?php the_excerpt();?>
					</div>
					
				</div>		
			<?php } 
			}?>
		
		</li>
		<li class="widget calendar">
			<h2 class="widgettitle">Calendário</h2>
			<?php get_template_part('inc/cal-gme'); ?>
			<?php get_template_part('inc/cal-mce'); ?>
		</li>
		<li class="widget" id="webmail">
	 		<?php get_template_part('inc/webmail'); ?>
	 	</li>
		<li class="widget" >	
			<?php get_template_part('inc/publicidade'); ?>
		</li>
		
	  <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar()) { ?>
	   <li><!-- stuff shown here in case no widgets active --></li>
	  <?php } ?>
	 </ul>
	</aside> 