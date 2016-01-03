<?php get_header(); ?>
<div class="row">
  	<div id="calendario" class="eight columns">
	 <h2> <span class="icon-calendar" aria-hidden="true"></span>Calendário GELJ</h2>
	   <div class="twelve columns">

	   		   	<?php 				 
					  /* $args = array(
					        'post_type' => 'events',
					        'orderby'   => 'event_date',
					        'meta_key'  => 'event_date',
					        'order'     => 'DESC',
					        'tax_query' => array(
								array(
									'taxonomy' => 'tipo_event',
									'field' => 'slug',
									'terms' => 'calendario_gelj'
								)
							)
					    );
					 
					    query_posts( $args );*/

					if(have_posts()) {
					  $ymdate = '';

					   while (have_posts()) {
						the_post();

						 $event_date = get_post_meta($post->ID, 'event_date', true);
						 $event_date = date('Y-m-d h:i:s', strtotime($event_date));

						 $ympost = mysql2date("M Y", $event_date);
							 if ( $ympost != $ymdate) {
							   $ymdate = $ympost;

							   echo '</ul></div> 
								<div class="month">
									<h3>' . $ympost . '</h2>
									<ul>';
							 }
						 ?>
							<li>
								<div class="two columns details">
									<p class="date"><span class="icon-calendar" aria-hidden="true"></span> <?php 
										echo date('d/m', strtotime($event_date));
									?></p>
									<p><span class="icon-clock" aria-hidden="true"></span> <?php echo get_post_meta(get_the_ID(), 'event_start_time', true);?></p>
								</div>
								<div class="ten columns">
									<p class="title">
										<a href="<?php the_permalink() ?>" rel="bookmark" title="link para <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
									</p>
									<p class="location">
										<span class="icon-location" aria-hidden="true"></span><?php echo get_post_meta(get_the_ID(), 'event_location', true);?>, <?php echo get_post_meta(get_the_ID(), 'event_city', true);?> 
									</p>
									<p>
										<? the_excerpt(); ?>
									</p>
								</div>
								
							</li>
					   <?php } 
					    } ?>

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


