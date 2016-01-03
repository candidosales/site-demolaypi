<?php

// THIS IS THE DIFFERENT FIELDS
$options[] = array(	"name" => "General Settings",
					"type" => "heading");
						
$options[] = array(	"name" => "Theme Stylesheet",
					"desc" => "Please select your colour scheme here.",
					"id" => $shortname."_alt_stylesheet",
					"std" => "",
					"type" => "select",
					"options" => $alt_stylesheets);

$options[] = array(	"name" => "Custom Logo",
					"desc" => "Paste the full URL of your custom logo image, should you wish to replace our default logo e.g. 'http://www.yoursite.com/logo-trans.png'. <br />NOTE: You need to name the logo 'logoname-trans.png' to make it transparent in IE6 .",
					"id" => $shortname."_logo",
					"std" => "",
					"type" => "text");					 							    

$options[] = array(	"name" => "Google Analytics",
					"desc" => "Please paste your Google Analytics (or other) tracking code here.",
					"id" => $shortname."_google_analytics",
					"std" => "",
					"type" => "textarea");		

$options[] = array(	"name" => "Feedburner RSS URL",
					"desc" => "Enter your Feedburner URL here.",
					"id" => $shortname."_feedburner_url",
					"std" => "",
					"type" => "text");					
					
$options[] = array(	"name" => "Header Settings",
					"type" => "heading");
					
$options[] = array(	"name" => "Header Layout",
					"desc" => "Select the layout of your header here.",
					"id" => $shortname."_header_layout",
					"std" => "",
					"type" => "select",
					"options" => $header_layout);			

$options[] = array(	"name" => "About - Bio",
					"desc" => "Include a short biography of yourself here, which will be displayed if you selected the about.php header layout above.",
					"id" => $shortname."_about_bio",
					"std" => "",
					"type" => "textarea");					
					
$options[] = array(	"name" => "About - Gravatar",
					"desc" => "Type your e-mail address here, associated with your <a href='http://gravatar.com'>Gravatar</a>. This will be displayed if you selected the about.php header layout above.",
					"id" => $shortname."_about_gravatar",
					"std" => "",
					"type" => "text");	

$options[] = array(	"name" => "About - Read More (Optional)",
					"desc" => "Include a read more URL for the bio section. This will be displayed if you selected the about.php header layout above.",
					"id" => $shortname."_about_readmore",
					"std" => "",
					"type" => "text");				

$options[] = array(	"name" => "468x60 Banner Ad - Adsense code",
					"desc" => "Enter your adsense code here. (Note: This will be displayed if you selected the ad468x60.php header layout.)",
					"id" => $shortname."_ad_header_adsense",
					"std" => "",
					"type" => "textarea");

$options[] = array(	"name" => "468x60 Banner Ad Content - Image Location",
					"desc" => "Enter the URL for this banner ad. (Note: This will be displayed if you selected the ad468x60.php header layout.)",
					"id" => $shortname."_ad_header_image",
					"std" => "http://www.woothemes.com/ads/woothemes-468x60-2.gif",
					"type" => "text");

$options[] = array(	"name" => "468x60 Banner Ad Content - Destination",
					"desc" => "Enter the URL where this banner ad points to. (Note: This will be displayed if you selected the ad468x60.php header layout.)",
					"id" => $shortname."_ad_header_url",
					"std" => "http://www.woothemes.com",
					"type" => "text");																																										

$options[] = array(	"name" => "Navigation Settings",
					"type" => "heading");	

$options[] = array(	"name" => "Exclude pages from top navigation",
					"desc" => "Enter a comma-separated list of the <a href='http://support.wordpress.com/pages/8/'>Page ID's</a> that you'd like to exclude from the main / top navigation (e.g. 1,2,3,4).",
					"id" => $shortname."_exclude_pages_main",
					"std" => "",
					"type" => "text");								

$options[] = array(	"name" => "Add blog categories as a drop-down to top navigation link?",
					"desc" => "If checked, this option will add a drop-down menu - with all your blog categories - to a Categories link in the top navigation.",
					"id" => $shortname."_blog_subnavigation",
					"std" => "false",
					"type" => "checkbox");	

$options[] = array(	"name" => "Exclude pages from footer navigation",
					"desc" => "Enter a comma-separated list of the <a href='http://support.wordpress.com/pages/8/'>Page ID's</a> that you'd like to exclude from the footer navigation (e.g. 1,2,3,4).",
					"id" => $shortname."_exclude_pages_footer",
					"std" => "",
					"type" => "text");								

$options[] = array(	"name" => "Homepage Settings",
					"type" => "heading");
					
$options[] = array(	"name" => "Featured Layout",
					"desc" => "Select the layout of your header here.",
					"id" => $shortname."_featured_layout",
					"std" => "",
					"type" => "select",
					"options" => $feat_layouts);			

$options[] = array(	"name" => "300x250 Block Ad - Adsense code",
					"desc" => "Enter your adsense code here. (Note: This will be displayed if you selected the small_with_ad.php featured layout.)",
					"id" => $shortname."_ad_block_adsense",
					"std" => "",
					"type" => "textarea");

$options[] = array(	"name" => "300x250 Block Ad - Image Location",
					"desc" => "Enter the URL for this banner ad. (Note: This will be displayed if you selected the small_with_ad.php featured layout.)",
					"id" => $shortname."_ad_block_image",
					"std" => "http://www.woothemes.com/ads/woothemes-300x250-1.gif",
					"type" => "text");

$options[] = array(	"name" => "300x250 Block Ad - Destination",
					"desc" => "Enter the URL where this banner ad points to. (Note: This will be displayed if you selected the small_with_ad.php featured layout.)",
					"id" => $shortname."_ad_block_url",
					"std" => "http://www.woothemes.com",
					"type" => "text");								

$options[] = array(	"name" => "General Post Settings",
					"type" => "heading");						

$options[] = array(	"name" => "Show related posts?",
					"desc" => "Check this to display to display related articles on a single post page",
					"id" => $shortname."_related",
					"std" => "true",
					"type" => "checkbox");			

$options[] = array(	"name" => "Archive Posts",
					"desc" => "If checked, this section will display the full post content. If unchecked it will display the excerpt only.",
					"id" => $shortname."_content_archives",
					"std" => "false",
					"type" => "checkbox");							

$options[] = array(	"name" => "Image Resizer",
					"type" => "heading");

$options[] = array(	"name" => "Featured Image Width",
					"desc" => "<strong>Default: 430px</strong>. Enter an integer value i.e. 250 for the desired width which will be used when dynamically creating the images.",
					"id" => $shortname."_image_width",
					"std" => "",
					"type" => "text");

$options[] = array(	"name" => "Featured Image Height",
					"desc" => "<strong>Default: 170px</strong>. Enter an integer value i.e. 150 for the desired height which will be used when dynamically creating the images.",
					"id" => $shortname."_image_height",
					"std" => "",
					"type" => "text");																			    								

$options[] = array(	"name" => "Featured (Alt) Image Width",
					"desc" => "<strong>Default: 130px</strong>. Enter an integer value i.e. 150 for the desired width which will be used when dynamically creating the images. ",
					"id" => $shortname."_feat_alt_width",
					"std" => "",
					"type" => "text");

$options[] = array(	"name" => "Featured (Alt) Image Height",
					"desc" => "<strong>Default: 85px</strong>. Enter an integer value i.e. 150 for the desired height which will be used when dynamically creating the images. ",
					"id" => $shortname."_feat_alt_height",
					"std" => "",
					"type" => "text");																			    								

$options[] = array(	"name" => "Thumbnail Width",
					"desc" => "<strong>Default: 64px</strong>. Enter an integer value i.e. 150 for the desired width which will be used when dynamically creating the images. ",
					"id" => $shortname."_thumb_width",
					"std" => "",
					"type" => "text");

$options[] = array(	"name" => "Thumbnail Height",
					"desc" => "<strong>Default: 64px</strong>. Enter an integer value i.e. 150 for the desired height which will be used when dynamically creating the images. ",
					"id" => $shortname."_thumb_height",
					"std" => "",
					"type" => "text");																			    								

$options[] = array(	"name" => "Disable Single Post",
					"desc" => "Check this if you don't want to display the thumbnail on the single posts.",
					"id" => $shortname."_image_single",
					"std" => "false",
					"type" => "checkbox");																

$options[] = array(	"name" => "Single Width",
					"desc" => "<strong>Default: 180px</strong>. Enter an integer value i.e. 150 for the desired height which will be used when dynamically creating the images. ",
					"id" => $shortname."_single_width",
					"std" => "",
					"type" => "text");

$options[] = array(	"name" => "Single Height",
					"desc" => "<strong>Default: 120px</strong>. Enter an integer value i.e. 150 for the desired height which will be used when dynamically creating the images. ",
					"id" => $shortname."_single_height",
					"std" => "",
					"type" => "text");																								

$options[] = array(	"name" => "Banner Ad Content (468x60px)",
					"type" => "heading");

$options[] = array(	"name" => "Disable Ad",
					"desc" => "Disable the ad space",
					"id" => $shortname."_ad_content_disable",
					"std" => "false",
					"type" => "checkbox");	

$options[] = array(	"name" => "Adsense code",
					"desc" => "Enter your adsense code here.",
					"id" => $shortname."_ad_content_adsense",
					"std" => "",
					"type" => "textarea");

$options[] = array(	"name" => "Banner Ad Content - Image Location",
					"desc" => "Enter the URL for this banner ad.",
					"id" => $shortname."_ad_content_image",
					"std" => "http://www.woothemes.com/ads/woothemes-468x60-2.gif",
					"type" => "text");

$options[] = array(	"name" => "Banner Ad Content - Destination",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_content_url",
					"std" => "http://www.woothemes.com",
					"type" => "text");						

$options[] = array(	"name" => "Banner Ads Sidebar - Widget (125x125)",
					"type" => "heading");

$options[] = array(	"name" => "Rotate banners?",
					"desc" => "Check this to randomly rotate the banner ads.",
					"id" => $shortname."_ads_rotate",
					"std" => "true",
					"type" => "checkbox");	

$options[] = array(	"name" => "Banner Ad #1 - Image Location",
					"desc" => "Enter the URL for this banner ad.",
					"id" => $shortname."_ad_image_1",
					"std" => "http://www.woothemes.com/ads/woothemes-125x125-1.gif",
					"type" => "text");
						
$options[] = array(	"name" => "Banner Ad #1 - Destination",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_url_1",
					"std" => "http://www.woothemes.com",
					"type" => "text");						

$options[] = array(	"name" => "Banner Ad #2 - Image Location",
					"desc" => "Enter the URL for this banner ad.",
					"id" => $shortname."_ad_image_2",
					"std" => "http://www.woothemes.com/ads/woothemes-125x125-2.gif",
					"type" => "text");
						
$options[] = array(	"name" => "Banner Ad #2 - Destination",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_url_2",
					"std" => "http://www.woothemes.com",
					"type" => "text");

$options[] = array(	"name" => "Banner Ad #3 - Image Location",
					"desc" => "Enter the URL for this banner ad.",
					"id" => $shortname."_ad_image_3",
					"std" => "http://www.woothemes.com/ads/woothemes-125x125-3.gif",
					"type" => "text");
						
$options[] = array(	"name" => "Banner Ad #3 - Destination",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_url_3",
					"std" => "http://www.woothemes.com",
					"type" => "text");

$options[] = array(	"name" => "Banner Ad #4 - Image Location",
					"desc" => "Enter the URL for this banner ad.",
					"id" => $shortname."_ad_image_4",
					"std" => "http://www.woothemes.com/ads/woothemes-125x125-4.gif",
					"type" => "text");
						
$options[] = array(	"name" => "Banner Ad #4 - Destination",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_url_4",
					"std" => "http://www.woothemes.com",
					"type" => "text");																																																	

?>