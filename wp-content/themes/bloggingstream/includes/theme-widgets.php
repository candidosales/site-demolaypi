<?php

// =============================== Twitter widget ======================================
function widget_Twidget_init() {

	if ( !function_exists('register_sidebar_widget') )
		return;

	function widget_Twidget($args) {

		// "$args is an array of strings that help widgets to conform to
		// the active theme: before_widget, before_title, after_widget,
		// and after_title are the array keys." - These are set up by the theme
		extract($args);

		// These are our own options
		$options = get_option('widget_Twidget');
		$account = $options['account'];  // Your Twitter account name
		$title = $options['title'];  // Title in sidebar for widget
		$show = $options['show'];  // # of Updates to show

        // Output

		// start
		echo '<div id="twitter_widget" class="box">';
		echo '<span class="heading">Twitter</span>';              
		echo '<ul id="twitter_update_list"><li></li></ul>
		      <script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>';
		echo '<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/'.$account.'.json?callback=twitterCallback2&amp;count='.$show.'"></script>';
		echo '<span class="website"><a class="followus" href="http://www.twitter.com/'.$account.'/" title="Follow us on Twitter">Follow us on Twitter</a></span></div>';


		// echo widget closing tag
	}

	// Settings form
	function widget_Twidget_control() {

		// Get options
		$options = get_option('widget_Twidget');
		// options exist? if not set defaults
		if ( !is_array($options) )
			$options = array('account'=>'woothemes', 'title'=>'Twitter Updates', 'show'=>'3');

        // form posted?
		if ( $_POST['Twitter-submit'] ) {

			// Remember to sanitize and format use input appropriately.
			$options['account'] = strip_tags(stripslashes($_POST['Twitter-account']));
			$options['title'] = strip_tags(stripslashes($_POST['Twitter-title']));
			$options['show'] = strip_tags(stripslashes($_POST['Twitter-show']));
			update_option('widget_Twidget', $options);
		}

		// Get options for form fields to show
		$account = htmlspecialchars($options['account'], ENT_QUOTES);
		$title = htmlspecialchars($options['title'], ENT_QUOTES);
		$show = htmlspecialchars($options['show'], ENT_QUOTES);

		// The form fields
		echo '<p style="text-align:right;">
				<label for="Twitter-account">' . __('Account:') . '
				<input style="width: 200px;" id="Twitter-account" name="Twitter-account" type="text" value="'.$account.'" />
				</label></p>';
		echo '<p style="text-align:right;">
				<label for="Twitter-title">' . __('Title:') . '
				<input style="width: 200px;" id="Twitter-title" name="Twitter-title" type="text" value="'.$title.'" />
				</label></p>';
		echo '<p style="text-align:right;">
				<label for="Twitter-show">' . __('Show:') . '
				<input style="width: 200px;" id="Twitter-show" name="Twitter-show" type="text" value="'.$show.'" />
				</label></p>';
		echo '<input type="hidden" id="Twitter-submit" name="Twitter-submit" value="1" />';
	}


	// Register widget for use
	register_sidebar_widget(array('Woo - Twitter', 'widgets'), 'widget_Twidget');

	// Register settings for use, 300x200 pixel form
	register_widget_control(array('Woo - Twitter', 'widgets'), 'widget_Twidget_control', 300, 200);
}

// Run code and init
add_action('widgets_init', 'widget_Twidget_init');

// =============================== Video Player widget ======================================
function videoWidget()
{
	$number = 5;
	$title = "Latest Videos";
	$settings = get_option("widget_videowidget");
	if ($settings['number']) $number = $settings['number'];
	if ($settings['title']) $title = $settings['title'];
?>

			<div id="video" class="box">

				<span class="heading">Vídeo destaque</span>
				
				<div class="video_container">
					
					<?php query_posts('showposts=1&tag=video'); ?>
					
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
						<div class="player">
								 <?php echo woo_get_embed('embed','260','215'); ?> 
						</div><!-- /player -->
					
							<h3 class="playing"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
					
					<?php endwhile; endif; ?>
					
					<span>Veja mais vídeos:</span>
					
					<ul>

					<?php query_posts('offset=1&showposts='.$number.'&tag=video'); ?>
					
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
						<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>

					<?php endwhile; endif; ?>
		
					</ul>
				
				</div><!-- /video_containter -->
			
			</div><!-- /video -->

<?php 
}
register_sidebar_widget('Woo - Video Player', 'videoWidget');

function videoWidgetAdmin() {

	$settings = get_option("widget_videowidget");

	// check if anything's been sent
	if (isset($_POST['update_video'])) {
		$settings['number'] = strip_tags(stripslashes($_POST['video_number']));
		$settings['title'] = strip_tags(stripslashes($_POST['video_title']));
		update_option("widget_videowidget",$settings);
	}

	echo '<p>
			<label for="video_number">Number of videos (default = 5):
			<input id="video_number" name="video_number" type="text" class="widefat" value="'.$settings['number'].'" /></label></p>';
	echo '<p>
			<label for="video_title">Title
			<input id="video_title" name="video_title" type="text" class="widefat" value="'.$settings['title'].'" /></label></p>';
	echo '<label>NOTE: Setup the video category in the theme Options Panel';
	echo '<input type="hidden" id="update_video" name="update_video" value="1" /></label>';


}
register_widget_control('Woo - Video Player', 'videoWidgetAdmin', 200, 200);

// =============================== Ad 125x125 widget ======================================
function adsWidget()
{
$settings = get_option("widget_adswidget");
$number = $settings['number'];
if ($number == 0) $number = 1;
$img_url = array();
$dest_url = array();

$numbers = range(1,$number); 
$counter = 0;

if ( get_option('woo_ads_rotate') == 'true' ) {
	shuffle($numbers);
}
?>

			<div id="ads" class="box">
			
				<span class="heading">Advertisement</span>
				
				<div class="adblock">

					<?php
						foreach ($numbers as $number) {	
						
							$counter++;
							$img_url[$counter] = get_option('woo_ad_image_'.$number);
							$dest_url[$counter] = get_option('woo_ad_url_'.$number);
	
					?>				

					<a href="<?php echo "$dest_url[$counter]"; ?>" title="Support our sponsor"><img src="<?php echo "$img_url[$counter]"; ?>" alt="Sponsor" /></a>

					<?php } ?>					

				</div><!-- /adblock -->
			
			</div><!-- /ads -->

<?php

}
register_sidebar_widget('Woo - Ads 125x125', 'adsWidget');

function adsWidgetAdmin() {

	$settings = get_option("widget_adswidget");

	// check if anything's been sent
	if (isset($_POST['update_ads'])) {
		$settings['number'] = strip_tags(stripslashes($_POST['ads_number']));

		update_option("widget_adswidget",$settings);
	}

	echo '<p>
			<label for="ads_number">Number of ads (1-4):
			<input id="ads_number" name="ads_number" type="text" class="widefat" value="'.$settings['number'].'" /></label></p>';
	echo '<input type="hidden" id="update_ads" name="update_ads" value="1" />';

}
register_widget_control('Woo - Ads 125x125', 'adsWidgetAdmin', 200, 200);

// =============================== Popular (Home) ======================================
function pop_homeWidget()
{
$settings = get_option("widget_pop_homewidget");
$number = $settings['number'];
?>

			<div id="popular" class="box">
			
				<span class="heading">Artigos populares</span>
				
				<ul>

				<?php

					global $wpdb;
					
					if (empty($pop_posts) || $pop_posts < 1) $pop_posts = $number;
					
					$now = gmdate("Y-m-d H:i:s",time());
					$lastmonth = gmdate("Y-m-d H:i:s",gmmktime(date("H"), date("i"), date("s"), date("m")-12,date("d"),date("Y")));
					$popularposts = "SELECT ID, post_title, comment_count, COUNT($wpdb->comments.comment_post_ID) AS 'stammy' FROM $wpdb->posts, $wpdb->comments WHERE comment_approved = '1' AND $wpdb->posts.ID=$wpdb->comments.comment_post_ID AND post_status = 'publish' AND post_date < '$now' AND post_date > '$lastmonth' AND comment_status = 'open' GROUP BY $wpdb->comments.comment_post_ID ORDER BY stammy DESC LIMIT ".$pop_posts;
					$posts = $wpdb->get_results($popularposts);
					$popular = '';
					
					foreach($posts as $post) {
		
						$post_title = stripslashes($post->post_title);
						$guid = get_permalink($post->ID);
						$comms = $post->comment_count;
						
				?>
				
					<li>
						<h3><a href="<?php echo $guid; ?>" title="<?php echo $post_title; ?>"><?php echo $post_title; ?></a></h3>
						<span class="comments"><a href="<?php echo $guid; ?>#comments" title="<?php echo $post_title; ?>"><?php echo $comms; ?> <?php if ( $comms == 1 ) { echo 'Comment'; } else { echo 'Comments'; } ?></a></span>
					</li>

				<?php } ?>
					
				</ul>					
			
			</div><!-- /popular -->

<?php

}
register_sidebar_widget('Woo - Popular (Home)', 'pop_homeWidget');

function pop_homeWidgetAdmin() {

	$settings = get_option("widget_pop_homewidget");

	// check if anything's been sent
	if (isset($_POST['update_pop_home'])) {
		$settings['number'] = strip_tags(stripslashes($_POST['pop_home_number']));

		update_option("widget_pop_homewidget",$settings);
	}

	echo '<p>
			<label for="pop_home_number">Number of popular posts:
			<input id="pop_home_number" name="pop_home_number" type="text" class="widefat" value="'.$settings['number'].'" /></label></p>';
	echo '<input type="hidden" id="update_pop_home" name="update_pop_home" value="1" />';

}
register_widget_control('Woo - Popular (Home)', 'pop_homeWidgetAdmin', 200, 200);


// =============================== Recent Comments (Home) ======================================
function comments_homeWidget()
{
$settings = get_option("widget_comments_homewidget");
$number = $settings['number'];
?>

			<div id="recent_comments" class="box">
			
				<span class="heading">Comentários recentes</span>
				
				<ul>
					
				<?php
	
					if (empty($comment_posts) || $comment_posts < 1) $comment_posts = $number;

					global $wpdb;
 
					$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID,comment_post_ID, comment_author, comment_author_email, comment_date_gmt, comment_approved,comment_type,comment_author_url,
									 SUBSTRING(comment_content,1,50) AS com_excerpt
									 FROM $wpdb->comments
									 LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID)
									 WHERE comment_approved = '1' AND comment_type = '' AND post_password = ''
									 ORDER BY comment_date_gmt DESC LIMIT ".$comment_posts;

					$comments = $wpdb->get_results($sql);
					$output = $pre_HTML;

					foreach ($comments as $comment) {

				?>					
					
					<li><a href="<?php echo get_permalink($comment->ID); ?>#comment-<?php echo $comment->comment_ID; ?>" title=" <?php echo $comment->post_title; ?>"><span class="author"><?php echo strip_tags($comment->comment_author); ?>:</span> <?php echo strip_tags($comment->com_excerpt); ?>...</a></li>
				
				<?php } ?>

				</ul>
			
			</div><!-- /recent_comments -->

<?php

}
register_sidebar_widget('Woo - Recent Comments (Home)', 'comments_homeWidget');

function comments_homeWidgetAdmin() {

	$settings = get_option("widget_comments_homewidget");

	// check if anything's been sent
	if (isset($_POST['update_comments_home'])) {
		$settings['number'] = strip_tags(stripslashes($_POST['comments_home_number']));

		update_option("widget_comments_homewidget",$settings);
	}

	echo '<p>
			<label for="comments_home_number">Number of recent comments):
			<input id="comments_home_number" name="comments_home_number" type="text" class="widefat" value="'.$settings['number'].'" /></label></p>';
	echo '<input type="hidden" id="update_comments_home" name="update_comments_home" value="1" />';

}
register_widget_control('Woo - Recent Comments (Home)', 'comments_homeWidgetAdmin', 200, 200);


// =============================== Tags (Home) ======================================
function tags_homeWidget()
{
?>

			<div id="tags" class="box">
			
				<span class="heading">Tags</span>
				
				<?php if (function_exists('wp_tag_cloud')) { wp_tag_cloud('smallest=10&largest=18'); } ?>
			
			</div><!-- /tags -->

<?php

}
register_sidebar_widget('Woo - Tags (Home)', 'tags_homeWidget');

// =============================== Stay Updated ======================================
function updatedWidget()
{
?>

			<div id="subscribe" class="box">
			
				<span class="heading">Stay Updated</span>
				
				<ul>
					<li><a href="<?php if ( get_option('woo_feedburner_url') <> "" ) { echo get_option('woo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>" title="Posts RSS">Posts</a></li>
					<li><a href="<?php bloginfo('comments_rss2_url'); ?>" title="Comments RSS">Comments</a></li>
				</ul>
			
			</div><!-- /subscribe -->
			
			<div class="clear"></div>

<?php

}
register_sidebar_widget('Woo - Stay Updated', 'updatedWidget');


?>