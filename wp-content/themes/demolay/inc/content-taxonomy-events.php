
        <div class="large-12 columns">
                    <?php 				 
                        if(have_posts()) {
                        $array_month = array();
                        $ymdate = '';

                        while (have_posts()) {
                            the_post();
                            $event_date = get_post_meta($post->ID, 'event_date', true);
                            $event_date = date('Y-m-d h:i:s', strtotime($event_date));
                            $ympost = mysql2date("M Y", $event_date);
                            
                            if (!isset($array_month[$ympost])) {
                                $array_month[$ympost] = array();
                            }
                            
                            array_push($array_month[$ympost], array('date' => date('d/m', strtotime($event_date)),
                                                                    'hour' => get_post_meta(get_the_ID(), 'event_start_time', true),
                                                                    'link' => get_the_permalink(),
                                                                    'title' => get_the_title(),
                                                                    'location' => get_post_meta(get_the_ID(), 'event_location', true),
                                                                    'city' => get_post_meta(get_the_ID(), 'event_city', true),
                                                                    'description' => get_the_excerpt()
                                                                ));
                        }
                        
                        }                                    
                        
                        foreach ($array_month as $key => $value) {
                            echo '<div class="month">
                                        <h3>' . $key . '</h3>
                                        <ul>';
                                        
                            // Ordernar DESC array multidimentsional por key
                            sksort($value, 'date');
  
                            foreach ($value as $a) { ?>
                                <li>
                                    <div class="large-2 columns details">
                                        <p class="date"><span class="icon-calendar" aria-hidden="true"></span> <?php echo $a['date'] ?></p>
                                        <p><span class="icon-clock" aria-hidden="true"></span> <?php echo $a['hour']; ?></p>
                                    </div>
                                    <div class="large-10 columns">
                                        <p class="title">
                                            <a href="<?php echo $a['link'] ?>" rel="bookmark" title="link para <?php echo $a['link']; ?>"><?php echo $a['title']; ?></a>
                                        </p>
                                        <p class="location">
                                            <span class="icon-location" aria-hidden="true"></span>
                                                <?php echo $a['location']; ?>, 
                                                <?php echo $a['city']; ?> 
                                        </p>
                                        <p>
                                            <?php echo $a['description']; ?> 
                                        </p>
                                    </div>
                                </li>
                            <?php }
                            echo '</ul>
                                    </div>'; 
                        } ?>

                    <div class="navigation">
                        <div class="alignleft"><?php previous_posts_link('&laquo; Anterior') ?></div>
                        <div class="alignright"><?php next_posts_link('Próximo página &raquo;') ?></div>
                    </div>
    </div>