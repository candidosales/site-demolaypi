    <?php get_header(); ?>
    <div class="row content-main">
        <div id="direction" class="large-12 columns">
            <h2>Diretoria GELJ</h2>
            <div class="row gce">
            <?php
                $type = 'gelj';
                
                $args = args_diretoria(array('type' => $type, 'posts_per_page' => 20));
                get_template_diretoria($args);
             ?>
            </div>
        </div><!-- large-12 columns-->
    </div>
    <?php get_footer(); ?>


