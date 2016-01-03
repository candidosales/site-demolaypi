		<aside class="span4">
			<div id="calendar" class="widget">
				<h4>AGENDA</h4>
				<section>
					<?
						$cal_hd = new WP_Query('cat=11&showposts=3');								
						if($cal_hd->have_posts()){ ?>
					<ul>	
						<?php 
							while($cal_hd->have_posts()) { 
							$cal_hd->the_post();
						?>		
						<li>
							<a itemprop="title" href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						</li>
						<?}
					}?>
					</ul>
				</section>
				<footer>
					<a class="btn btn-danger">ACOMPANHE</a>
				</footer>
			</div>
			<div id="twitter" class="widget">
				<h4>TWITTER</h4>
				<section>
					<script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
						<script>
						new TWTR.Widget({
						  version: 2,
						  type: 'profile',
						  rpp: 4,
						  interval: 30000,
						  width: 'auto',
						  height: 300,
						  theme: {
							shell: {
							  background: 'none',
							  color: '#ffffff'
							},
							tweets: {
							  background: 'none',
							  color: '#ffffff',
							  links: '#0a99de'
							}
						  },
						  features: {
							scrollbar: false,
							loop: false,
							live: false,
							behavior: 'all'
						  }
						}).render().setUser('hemersondaniel').start();
						</script>
				</section>
				<footer>
					<p>
						<a href="http://twitter.com/hemersondaniel">@HEMERSONDANIEL</a>
					</p>
				</footer>
			</div>
			<div id="youtube" class="widget">
				<h4>YOUTUBE</h4>
				<section>
					<iframe width="330" height="186" src="https://www.youtube.com/embed/DOJJGb6KMXE" frameborder="0" allowfullscreen></iframe>
				</section>
				<footer>
				</footer>
			</div>
		</aside>