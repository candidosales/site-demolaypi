<div id="header_ad">

	<?php if (get_option('woo_ad_header_adsense') <> "") { echo stripslashes(get_option('woo_ad_header_adsense')); ?>
	
	<?php } else { ?>
	
		<a href="<?php echo get_option('woo_ad_header_url'); ?>"><img src="<?php echo get_option('woo_ad_header_image'); ?>" width="468" height="60" alt="advert" /></a>
		
	<?php } ?>	
		
</div>