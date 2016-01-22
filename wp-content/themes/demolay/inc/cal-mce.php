		<div class="cal-mce">
			<a href="<?php bloginfo('url')?>/tipo_event/calendario_gelj/">
				<img width="50" height="50" src="<?php bloginfo('template_url'); ?>/dist/img/glej-mini.png"/>
			</a>
			<?
				$args = array(
					'post_type' => 'events',
					'orderby'   => 'event_date',
					'meta_key'  => 'event_date',
					'order'     => 'DESC',
					'showposts' => 6,
					'tax_query' => array(
						array(
							'taxonomy' => 'tipo_event',
							'field' => 'slug',
							'terms' => 'calendario_gelj'
						)
					)
				);

				$query = new WP_Query( $args );		
				?>
			<ul>

				<?php 
                    if ($query->have_posts()) { 
					
					while ($query->have_posts()) { 
					$query->the_post();
					$event_date = get_post_meta($post->ID, 'event_date', true);				
					$todays_date = date("Y-m-d");
					$today = strtotime($todays_date);
					
					$i = 0;			
					
					if (strtotime($event_date) >= $today) {
			     ?>		
						<li>
							<a itemprop="title" href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
								<?php echo date('d/m', strtotime($event_date));?> - <?php the_title(); ?></a>
						</li>
					<?
							$i++;
						} 
                        else {
							$i--;
						}
					} 
					if ($i <= 0) {
							?>

							<li>
								<a href="#">Sem eventos no momento.</a>
							</li>
					<?}
			} 
            else {?>

				<li>
					<a href="#">Sem eventos no momento.</a>
				</li>
			<?php }?>
                <li class="cal-full">
                    <a href="<?php bloginfo('url')?>/tipo_event/calendario_gelj/">Veja a agenda do GELJ</a>
                </li>
			</ul>
		</div>