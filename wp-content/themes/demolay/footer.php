	<div class="large-12 columns footer">
		<div class="row">
			<div class="large-12 columns">
			<footer role="contentinfo">
				<div class="large-6 columns">
					<p>Rua Magalhães Filho, 1270 Marquês<br/>64002-450<br/>Teresina-PI</p>
				</div>
				<div class="large-6 columns">
					<div id="site-info">
						<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
							<?php bloginfo( 'name' ); ?>
						</a>
					</div><!-- #site-info -->

					<div id="site-generator">
						<p><strong>Criação e Desenvolvimento</strong></p>
						<a title="Conheça o desenvolvedor" href="http://about.me/candidosales" target="_blank"> Cândido Sales Gomes</a>
						<a title="Conheça o Zurb Foundation" href="http://foundation.zurb.com/"><span class="icon-mobile" aria-hidden="true"></span></a>
						<a title="Conheça o WordPress" href="http://wordpress.org/"><span class="icon-wordpress" aria-hidden="true"></span></a>
						<a title="Conheça as tecnologias utilizadas" href="http://www.w3.org/html/logo/"><span class="icon-html5" aria-hidden="true"></span></a>
					</div><!-- #site-generator -->
				</div>
			</footer><!-- #footer -->
			</div>
		</div>
	</div>
	<?php wp_footer(); ?>
    
    

	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-15472644-5']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();


	  //UserVoice	
//   var uvOptions = {};
//   (function() {
//     var uv = document.createElement('script'); uv.type = 'text/javascript'; uv.async = true;
//     uv.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'widget.uservoice.com/Vn6eFgEE0do3tmHgCMdYOg.js';
//     var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(uv, s);
//   })();



	</script>
    
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,900,700' rel='stylesheet' type='text/css'>
    <script src="<?php echo esc_url( get_template_directory_uri() ) ?>/dist/js/main.min.js"></script>
</body>
</html>
