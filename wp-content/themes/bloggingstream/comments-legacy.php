<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p>This post is password protected. Enter the password to view comments.<p>

			<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$oddcomment = 'comment';
?>

<!-- You can start editing here. -->

<?php if ($comments) : ?>

<div id="comments_wrap">
	
	<span class="heading"><?php comments_number('No Responses', 'One Response', '% Responses' );?> to &#8220;<?php the_title(); ?>&#8221;</span>

	<ol class="commentlist">
		
		<?php foreach ($comments as $comment) : ?>
	
		<li class="comment " id="comment-<?php comment_ID() ?>">

			<div class="text">
				<?php comment_text() ?>
				<?php if ($comment->comment_approved == '0') : ?>
					<p><em>Your comment is awaiting moderation.</em></p>
				<?php endif; ?>
			</div><!-- /text -->
			<div class="gravatar">
				<img src="<?php gravatar('X', '50'); ?>" alt="<?php //_e('Gravatar'); ?>" />
			</div><!-- /gravatar -->
			<div class="meta">
				<p><?php comment_author_link() ?><br /> on <?php comment_date('d. M, Y'); ?></p>
			</div><!-- /meta -->

		</li>
		
		<?php /* Changes every other comment to a different class */
		if ('comment' == $oddcomment) $oddcomment = 'alt';
		else $oddcomment = 'comment';
		?>
		
		<?php endforeach; /* end for each comment */ ?>
		
	</ol>
	
</div> <!-- end #comments_wrap -->

<?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<!--<p class="nocomments">Comments are closed.</p>-->

	<?php endif; ?>
<?php endif; ?>
 

<?php if ('open' == $post->comment_status) : ?>

<div id="respond">
<div id="form_wrap">

<span class="heading">Comente</span>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
	<h3>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</h3>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" onsubmit="if (url.value == 'Website (optional)') {url.value = '';}">

<?php if ( $user_ID ) : ?>

<p>Logado como <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Sair</a></p>

<div class="textarea">
	<textarea rows="10" cols="50" name="comment" tabindex="4" onfocus="if (this.value == 'Type your comment here...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Type your comment here...';}">Comente aqui...</textarea>
</div><!-- /textarea -->

<div class="details">
<p><input name="submit" type="submit" id="submit" tabindex="5" value="Enviar" /></p>
</div><!-- /.details -->
<?php else : ?>

<div class="textarea">
	<textarea rows="10" cols="50" name="comment" tabindex="4" onfocus="if (this.value == 'Type your comment here...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Type your comment here...';}">Comente aqui...</textarea>
</div><!-- /textarea -->

<div class="details">
					
<p>
	<input class="txt" type="text" name="author" id="author" tabindex="1" value="Name <?php if ($req) echo "(required)"; ?>" onfocus="if (this.value == 'Name (required)') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Name (required)';}" />
	<label for="author">Nome</label>
</p>

<p>
	<input class="txt" type="text" name="email" id="email" tabindex="2" value="Email <?php if ($req) echo "(required)"; ?>" onfocus="if (this.value == 'Email (required)') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Email (required)';}" />
	<label for="email">E-mail</label>
</p>

<p>
	<input class="txt" type="text" name="url" id="url" tabindex="3" value="Website (optional)" onfocus="if (this.value == 'Website (optional)') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Website (optional)';}" />
	<label for="url">Website</label>
</p>
								
<p><input name="submit" type="submit" id="submit" tabindex="5" value="Enviar" /></p>

</div><!-- /details -->

<?php endif; // If logged in ?>

<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />

<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>


<?php endif; // if you delete this the sky will fall on your head ?>
<div class="clear"></div>
</div> <!-- end #form_wrap -->
</div> <!-- end #respond -->