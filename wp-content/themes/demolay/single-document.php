<?php get_header(); ?>
<div class="row">
  	<div id="documents" class="eight columns">
	  <h2>Atas</h2>
	   <div class="twelve columns">
	   	   	<ul>
	   	<?php 
	   	if (have_posts()){ 
	   		while (have_posts()) {
				the_post();
				 ?>
	
	   		<li>
		   		<div class="one columns">
		   			<?php $doc = get_post_meta(get_the_ID(), 'wp_custom_attachment', true);  
					if(strlen(trim($doc['url'])) > 0) { 
					 ?>
					    <a target="_blank" href="<?php echo $doc['url']; ?>"> 
							<i class="foundicon-down-arrow"></i>
						</a>
					<?	}?>
		  			 
		   		</div>
		   		<div class="eleven columns">
		   			<hgroup>
		   				<h3>
		   					<a target="_blank" href="<?php echo $doc['url']; ?>"> 
		   						<?php the_title(); ?>
		   					</a>
		   				</h3>
		   				<p class="meta">
							<span>Por</span> <?php the_author_meta("first_name"); ?> <span>em</span> <?php the_time('j.m.Y'); ?> 
		 				</p>
		   			</hgroup>
		   			<? the_excerpt(); ?>
		   		</div>
	   		</li>
	   		<? } 
	   	}?>
	   	</ul>
	   </div>

	</div><!-- eight columns-->
	<div class="four columns">
		<?php get_sidebar("cavalaria"); ?>
	</div>
</div><!-- row-->
<?php get_footer(); ?>


