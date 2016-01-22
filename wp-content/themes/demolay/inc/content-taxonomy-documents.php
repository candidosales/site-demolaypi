    <div class="large-12 columns">
                <ul>
            <?php 
            if (have_posts()){ 
                while (have_posts()) {
                    the_post();
                    $doc = get_post_meta(get_the_ID(), 'wp_custom_attachment', true);  
                    ?>
        
                <li>
                    <a class="icon-switch" target="_blank" href="<?php echo $doc['url']; ?>"> 
                        <div class="large-1 small-1 columns no-padding">
                            <?php if(strlen(trim($doc['url'])) > 0) { ?>
                                <span class="icon " aria-hidden="true"></span>
                            <?	} ?>
                        </div>
                        <div class="large-11 small-11 columns">
                            <hgroup>
                                <h3>
                                    <?php the_title(); ?>
                                </h3>
                                <p class="meta">
                                    <span>Por</span> <?php the_author_meta('user_login'); ?> <span>em</span> <?php the_time('d/m/Y'); ?> 
                                </p>
                            </hgroup>
                            <? the_excerpt(); ?>
                        </div>
                    </a>
                </li>
                <? } 
            }?>
            </ul>
            <div class="navigation">
                <div class="alignleft"><?php previous_posts_link('&laquo; Anterior') ?></div>
                <div class="alignright"><?php next_posts_link('Próximo página &raquo;') ?></div>
            </div>
        </div>