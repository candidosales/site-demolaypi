<?php



function woo_options(){
// VARIABLES
$themename = "Bloggingstream";
$manualurl = 'http://www.woothemes.com/support/theme-documentation/bloggingstream/';
$shortname = "woo";



$GLOBALS['template_path'] = get_bloginfo('template_directory');

//Access the WordPress Categories via an Array
$woo_categories = array();  
$woo_categories_obj = get_categories('hide_empty=0');
foreach ($woo_categories_obj as $woo_cat) {
    $woo_categories[$woo_cat->cat_ID] = $woo_cat->cat_name;}
$categories_tmp = array_unshift($woo_categories, "Select a category:");    
       
//Access the WordPress Pages via an Array
$woo_pages = array();
$woo_pages_obj = get_pages('sort_column=post_parent,menu_order');    
foreach ($woo_pages_obj as $woo_page) {
    $woo_pages[$woo_page->ID] = $woo_page->post_name; }
$woo_pages_tmp = array_unshift($woo_pages, "Select a page:");       


//Testing 
$options_select = array("one","two","three","four","five"); 
$options_radio = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five"); 

//Stylesheets Reader
$alt_stylesheet_path = TEMPLATEPATH . '/styles/';
$alt_stylesheets = array();

if ( is_dir($alt_stylesheet_path) ) {
    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) { 
        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
            if(stristr($alt_stylesheet_file, ".css") !== false) {
                $alt_stylesheets[] = $alt_stylesheet_file;
            }
        }    
    }
}

//More Options
$all_uploads_path = get_bloginfo('home') . '/wp-content/uploads/';
$all_uploads = get_option('woo_uploads');
$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
$header_layout = array("about.php","ad468x60.php");
$feat_layouts = array("large_no_ad.php","small_with_ad.php");

// THIS IS THE DIFFERENT FIELDS
$options = array();   

// THIS IS THE DIFFERENT FIELDS
$options[] = array(	"name" => "General Settings",
					"type" => "heading");
						
$options[] = array( "name" => "Theme Stylesheet",
					"desc" => "Select your themes alternative color scheme.",
					"id" => $shortname."_alt_stylesheet",
					"std" => "default.css",
					"type" => "select",
					"options" => $alt_stylesheets);

$options[] = array( "name" => "Custom Logo",
					"desc" => "Upload a logo for your theme, or specify the image address of your online logo. (http://yoursite.com/logo.png)",
					"id" => $shortname."_logo",
					"std" => "",
					"type" => "upload");    
                                                                                     
$options[] = array( "name" => "Custom Favicon",
					"desc" => "Upload a 16px x 16px Png/Gif image that will represent your website's favicon.",
					"id" => $shortname."_custom_favicon",
					"std" => "",
					"type" => "upload"); 
                                               
$options[] = array( "name" => "Tracking Code",
					"desc" => "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
					"id" => $shortname."_google_analytics",
					"std" => "",
					"type" => "textarea");        

$options[] = array( "name" => "RSS URL",
					"desc" => "Enter your preferred RSS URL. (Feedburner or other)",
					"id" => $shortname."_feedburner_url",
					"std" => "",
					"type" => "text");
                    
$options[] = array( "name" => "Custom CSS",
                    "desc" => "Quickly add some CSS to your theme by adding it to this block.",
                    "id" => $shortname."_custom_css",
                    "std" => "",
                    "type" => "textarea");					
					
$options[] = array(	"name" => "Header Settings",
					"type" => "heading");
					
$options[] = array(	"name" => "Header Layout",
					"desc" => "Select the layout of your header here.",
					"id" => $shortname."_header_layout",
					"std" => "about.php",
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
					"std" => "large_no_ad.php",
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

$options[] = array(	"name" => "Dynamic Images",
					"type" => "heading");
					
$options[] = array( "name" => "Enable Dynamic Image Resizer",
					"desc" => "This will enable the thumb.php script. It dynamicaly resizes images on your site.",
					"id" => $shortname."_resize",
					"std" => "true",
					"type" => "checkbox");    
                    
$options[] = array( "name" => "Automatic Image Thumbs",
					"desc" => "If no image is specified in the 'image' custom field then the first uploaded post image is used.",
					"id" => $shortname."_auto_img",
					"std" => "false",
					"type" => "checkbox");    

$options[] = array( "name" => "Featured Images",
					"desc" => "Enter an integer value i.e. 250 for the desired size which will be used when dynamically creating the images.",
					"id" => $shortname."_image_dimensions",
					"std" => "",
					"type" => array( 
									array(  'id' => $shortname. '_image_width',
											'type' => 'text',
											'std' => 430,
											'meta' => 'Width'),
									array(  'id' => $shortname. '_image_height',
											'type' => 'text',
											'std' => 170,
											'meta' => 'Height')
								  ));

$options[] = array( "name" => "Featured (Alt Layout) Images",
					"desc" => "Enter an integer value i.e. 250 for the desired size which will be used when dynamically creating the images.",
					"id" => $shortname."_image_dimensions",
					"std" => "",
					"type" => array( 
									array(  'id' => $shortname. '_feat_alt_width',
											'type' => 'text',
											'std' => 130,
											'meta' => 'Width'),
									array(  'id' => $shortname. '_feat_alt_height',
											'type' => 'text',
											'std' => 85,
											'meta' => 'Height')
								  ));																	    								

$options[] = array( "name" => "Post Thumbnails",
					"desc" => "Enter an integer value i.e. 250 for the desired size which will be used when dynamically creating the images.",
					"id" => $shortname."_image_dimensions",
					"std" => "",
					"type" => array( 
									array(  'id' => $shortname. '_thumb_width',
											'type' => 'text',
											'std' => 64,
											'meta' => 'Width'),
									array(  'id' => $shortname. '_thumb_height',
											'type' => 'text',
											'std' => 64,
											'meta' => 'Height')
								  ));																	    																											    								

$options[] = array(	"name" => "Disable Single Post",
					"desc" => "Check this if you don't want to display the thumbnail on the single posts.",
					"id" => $shortname."_image_single",
					"std" => "false",
					"type" => "checkbox");																

$options[] = array( "name" => "Single Post Thumbnails",
					"desc" => "Enter an integer value i.e. 250 for the desired size which will be used when dynamically creating the images.",
					"id" => $shortname."_image_dimensions",
					"std" => "",
					"type" => array( 
									array(  'id' => $shortname. '_single_width',
											'type' => 'text',
											'std' => 180,
											'meta' => 'Width'),
									array(  'id' => $shortname. '_single_height',
											'type' => 'text',
											'std' => 120,
											'meta' => 'Height')
								  ));																								

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

update_option('woo_template',$options);      
update_option('woo_themename',$themename);   
update_option('woo_shortname',$shortname);
update_option('woo_manual',$manualurl);

                                     
// Woo Metabox Options

$woo_metaboxes = array(

		"image" => array (
			"name"		=> "image",
			"default" 	=> "",
			"label" 	=> "Image",
			"type" 		=> "upload",
			"desc"      => "Enter the URL for image to be used by the Dynamic Image resizer (the image resizer WILL NOT work for featured images (slider)).."
		),
		"embed" => array (
			"name"		=> "embed",
			"default" 	=> "",
			"label" 	=> "Video Embed Code",
			"type" 		=> "textarea",
			"desc"      => "Paste the embed code for your video here. Video will be resized automatically. Note: You need to tag this post with 'video' in order to work with the Woo - Video Player widget.",
			"input"     => "textarea"
		),
		
    );
    
update_option('woo_custom_template',$woo_metaboxes);      

/*
function woo_update_options(){
        $options = get_option('woo_template',$options);  
        foreach ($options as $option){
            update_option($option['id'],$option['std']);
        }   
}

function woo_add_options(){
        $options = get_option('woo_template',$options);  
        foreach ($options as $option){
            update_option($option['id'],$option['std']);
        }   
}


//add_action('switch_theme', 'woo_update_options'); 
if(get_option('template') == 'wooframework'){       
    woo_add_options();
} // end function 
*/


}

add_action('init','woo_options');  

?>