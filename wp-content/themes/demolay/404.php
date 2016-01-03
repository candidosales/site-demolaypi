<?php get_header(); ?>
<div class="row">
  	<div class="eight columns">
    <article class="post" id="post-<?php the_ID(); ?>"> 
		<hgroup>
			<h2>
				Isso é um pouco constrangedor, não é?
			</h2>
				<div class="entry-content">
					<p>Parece que não consegue encontrar o que você está procurando. Talvez a busca, ou em um dos links abaixo, pode ajudá-lo.</p>

					<?php get_search_form(); ?>

					<?php the_widget( 'WP_Widget_Recent_Posts', array( 'number' => 10 ), array( 'widget_id' => '404' ) ); ?>

					<div class="widget">
						<h2 class="widgettitle"><?php _e( 'Categorias mais usadas', 'twentyeleven' ); ?></h2>
						<ul>
						<?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 10 ) ); ?>
						</ul>
					</div>

					<?php
					/* translators: %1$s: smilie */
					$archive_content = '<p>' . sprintf( __( 'Tente procurar nos arquivos mensais. %1$s', 'twentyeleven' ), convert_smilies( ':)' ) ) . '</p>';
					the_widget( 'WP_Widget_Archives', array('count' => 0 , 'dropdown' => 1 ), array( 'after_title' => '</h2>'.$archive_content ) );
					?>

					<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>

				</div><!-- .entry-content -->
			</article><!-- post -->
	</div><!-- eight columns-->
	<div class="four columns">
		<?php get_sidebar("post"); ?>
	</div>
</div><!-- row-->
<?php get_footer(); ?>