		<div class="row">
				<div class="twelve columns">
					<div id="featured">
						<?
						$args = array(
							'post_type' => 'advertising',
							'showposts' => 4,
							'tax_query' => array(
								array(
									'taxonomy' => 'tipo_advertising',
									'field' => 'slug',
									'terms' => 'slide'
								)
							)
						);

						$slide = new WP_Query( $args );		
						if($slide->have_posts()){ 
							
							while($slide->have_posts()) { 
								$slide->the_post(); 
								$url =	get_post_meta($post->ID, 'advertising_url', true);
								$image = get_post_meta($post->ID, 'wp_custom_attachment_advertising', true);  

							if(strlen(trim($image['url'])) > 0) { 
						?>
						    <a href="<?php echo $url; ?>" target="_blank">
								<img src="<?php echo $image['url']; ?>" width="280" height="200" />
							</a>
						<?	}
					}
				}?>
					</div>
				</div>

				<?
						$args = array(
							'post_type' => 'advertising',
							'showposts' => 4,
							'tax_query' => array(
								array(
									'taxonomy' => 'tipo_advertising',
									'field' => 'slug',
									'terms' => 'normal'
								)
							)
						);

						$normal = new WP_Query( $args );		
						if($normal->have_posts()){ 
							
							while($normal->have_posts()) { 
								$normal->the_post(); 
								$url =	get_post_meta($post->ID, 'advertising_url', true);
								$image = get_post_meta($post->ID, 'wp_custom_attachment_advertising', true);  

							if(strlen(trim($image['url'])) > 0) { 
						?>

							<div class="large-6 columns">
								<a href="<?php echo $url; ?>" target="_blank">
									<img title="<?php the_title(); ?>" class="has-tip tip-top useful" src="<?php echo $image['url']; ?>"/>
								</a>
							</div>
				<?	}
					}
				}?>
			</div>
