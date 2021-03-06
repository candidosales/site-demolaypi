<?php get_header(); ?>
<div class="row content-main">
  	<div id="documents" class="large-8 columns">
	  <h2>Atas</h2>
	   <div class="large-12 columns">
	   	   	<ul>
	   	<?php 
	   	if (have_posts()){ 
	   		while (have_posts()) {
				the_post();
				 ?>
	
	   		<li>
		   		<div class="large-1 columns">
		   			<?php $doc = get_post_meta(get_the_ID(), 'wp_custom_attachment', true);  
					if(strlen(trim($doc['url'])) > 0) { 
					 ?>
					    <a target="_blank" href="<?php echo $doc['url']; ?>"> 
							<i class="foundicon-down-arrow"></i>
						</a>
					<?	}?>
		  			 
		   		</div>
		   		<div class="large-11 columns">
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

	</div><!-- large-8 columns-->
	<div class="large-4 columns">
		<?php get_sidebar("cavalaria"); ?>
	</div>
</div><!-- row-->
<?php get_footer(); ?>


