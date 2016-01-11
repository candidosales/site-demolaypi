<div class="large-12 columns">
	   	   	<ul>
	   	<?php 
	   	if (have_posts()){ 
	   		while (have_posts()) {
				the_post();
				 ?>
	
	   		<li>
		   		<div class="large-2 columns">
		   			<?php $doc = get_post_meta(get_the_ID(), 'wp_custom_attachment', true);  
					if(strlen(trim($doc['url'])) > 0) { 
					 ?>
					    <a class="icon-switch" target="_blank" href="<?php echo $doc['url']; ?>"> 
							<span class="icon-file-word " aria-hidden="true"></span>
						</a>
					<?	}?>
		  			 
		   		</div>
		   		<div class="large-10 columns">
		   			<hgroup>
		   				<h3>
		   					<a target="_blank" href="<?php echo $doc['url']; ?>"> 
		   						<?php the_title(); ?>
		   					</a>
		   				</h3>
		   				<p class="meta">
							<span>Por</span> <?php the_author_meta("first_name"); ?> <span>em</span> <?php the_time('d/m/Y'); ?> 
		 				</p>
		   			</hgroup>
		   			<? the_excerpt(); ?>
		   		</div>
	   		</li>
	   		<? } 
	   	}?>
	   	</ul>
	   	<div class="navigation">
		        	<div class="alignleft"><?php previous_posts_link('&laquo; Anterior') ?></div>
		        	<div class="alignright"><?php next_posts_link('Próximo página &raquo;') ?></div>
		       	</div>
	   </div>