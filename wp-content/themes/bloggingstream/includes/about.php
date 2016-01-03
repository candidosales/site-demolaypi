<div id="about">

	<?php $grav_url = "http://www.gravatar.com/avatar.php?gravatar_id=".md5( strtolower( get_option( 'woo_about_gravatar' ) ) )."&size=58"; ?>
		
	<?php if ( get_option( 'woo_about_gravatar' ) <> "" ) { ?><img src="<?php echo $grav_url; ?>" alt="Author Gravatar" /><?php } ?>
			
	<p><?php echo stripslashes ( get_option( 'woo_about_bio' ) ); ?> <a class="more" href="<?php echo get_option( 'woo_about_readmore' ); ?>" title="Leia mais...">Mais &rarr;</a></p>
		
</div>
