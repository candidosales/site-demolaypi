    <?php get_header(); ?>

            <script type="text/javascript" src="https://maps.google.com/maps/api/js?libraries=drawing&sensor=false"></script>
            <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/regioes.js"></script>
            <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/api-google-maps.regioes.js"></script>
            
    <div class="row content-main">
        <div class="large-12 columns">
            <h2>Diretoria GELJ</h2>
            <div class="row gce">
            <?php
                $args = array(
                    'posts_per_page' => 20,
                    'post_type' => 'membro-diretoria',
                    'orderby' => 'date',
                    'order'   => 'ASC',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'tipo-diretoria',
                            'field'    => 'slug',
                            'terms'    => 'gelj',
                        ),
                    ),
                );
                
                query_posts( $args );
                while (have_posts()) { 
                    the_post();
                    $custom_fields = get_post_custom();
            ?>
            <div class="large-3 columns">
                <article itemscope itemtype="http://schema.org/Person" class="direction ">
                        <img itemprop="image" src="https://graph.facebook.com/yuri.p.valente/picture?type=large"></img>
                        <hgroup>
                            <h2 itemprop="name"><?php echo $custom_fields['wpcf-nome-completo'][0] ?> 
                                <a href="<?php echo $custom_fields['wpcf-facebook'][0] ?>" target="_blank" title="Conheça o facebook">
                                    <span class="icon-facebook " aria-hidden="true"></span>
                                </a>
                            </h2>
                            <p>
                                <span class="responsability left" itemprop="jobTitle"><?php echo $custom_fields['wpcf-funcao'][0] ?> </span>				
                            </p>
                            <p class="cid">
                                <span class="left"><?php echo $custom_fields['wpcf-cid'][0] ?> </span>	
                            </p>
                            <p>
                                <span class="left" itemprop="email">
                                    <a href="mailto:<?php echo $custom_fields['wpcf-e-mail'][0] ?> " target="_blank">
                                        <span class="icon-mail " aria-hidden="true"></span><?php echo $custom_fields['wpcf-e-mail'][0] ?> 
                                    </a>
                                </span>
                            </p>
                            <p>
                                <span class="left" itemprop="telephone">
                                    <a href="tel:<?php echo $custom_fields['wpcf-telefone'][0] ?> ">
                                        <span class="icon-phone " aria-hidden="true"></span><?php echo $custom_fields['wpcf-telefone'][0] ?> 
                                    </a>
                                </span>
                            </p>
                        </hgroup>
                </article>
        </div>
        <?php } ?>

    </div>
 <!--
        <div class="row gce">
        <div class="large-6 columns">
        <section id="mestres-regionais">
            <h3>Administração Regional</h3>
            <ul>
               
                <li id="norte" itemscope itemtype="http://schema.org/Person">
                    <img src="<?php bloginfo('template_url'); ?>/img/diretoria/gce/oernorte.jpg" itemprop="image"></img>
                    <hgroup>
                        <h4 itemprop="name">
                            Antônio Calixto S. da Rocha
                        </h4>
                            <p>
                                <span class="responsability left" itemprop="jobTitle">Oficial Executivo Regional Norte</span>				
                            </p>
                            <p class="cid">
                                <span class="left">85109</span>	
                            </p>
                            <p>
                                <span class="left" itemprop="email">
                                    <a href="mailto:oernorte@demolaypi.org.br" target="_blank">
                                        <span class="icon-mail " aria-hidden="true"></span>oernorte@demolaypi.org.br
                                    </a>
                                </span>
                            </p>
                            <p>
                                <span class="left" itemprop="telephone">
                                    <a href="tel:8699127227">
                                        <span class="icon-phone " aria-hidden="true"></span>(86) 9912-7227
                                    </a>
                                </span>
                            </p>
                    </hgroup>	
                </li>
                <li id="centroNorte" itemscope itemtype="http://schema.org/Person">
                    <img src="https://graph.facebook.com/fernandogad/picture?type=large" itemprop="image"></img>	
                    <hgroup>
                        <h4 itemprop="name">
                            Fernando Guilherme Alves Delgado
                            <a href="http://www.facebook.com/fernandogad"  title="Conheça o facebook " target="_blank">
                                <span class="icon-facebook " aria-hidden="true"></span>
                            </a>
                        </h4>
                            <p>
                                <span class="responsability left" itemprop="jobTitle">Oficial Executivo Regional Centro-Norte</span>				
                            </p>
                            <p class="cid">
                                <span class="left">72174</span>	
                            </p>
                            <p>
                                <span class="left" itemprop="email">
                                    <a href="mailto:oercentronorte@demolaypi.org.br" target="_blank">
                                        <span class="icon-mail " aria-hidden="true"></span>oercentronorte@demolaypi.org.br
                                    </a>
                                </span>
                            </p>
                            <p>
                                <span class="left" itemprop="telephone">
                                    <a href="tel:8699028500">
                                        <span class="icon-phone " aria-hidden="true"></span>(86) 9902-8500
                                    </a>
                                </span>
                            </p>
                    </hgroup>	
                </li>
                <li id="centroSul" itemscope itemtype="http://schema.org/Person">
                    <img src="https://graph.facebook.com//picture?type=large" itemprop="image"></img>	
                    <hgroup>
                        <h4 itemprop="name">
                            Joaquim Francisco Guedes Neto
                            <a href="http://www.facebook.com/"  title="Conheça o facebook " target="_blank">
                                <span class="icon-facebook " aria-hidden="true"></span>
                            </a>
                        </h4>
                            <p>
                                <span class="responsability left" itemprop="jobTitle">Oficial Executivo Regional Centro-Sul</span>				
                            </p>
                            <p class="cid">
                                <span class="left">85364</span>	
                            </p>
                            <p>
                                <span class="left" itemprop="email">
                                    <a href="mailto:oercentrosul@demolaypi.org.br" target="_blank">
                                        <span class="icon-mail " aria-hidden="true"></span>oercentrosul@demolaypi.org.br
                                    </a>
                                </span>
                            </p>
                            <p>
                                <span class="left" itemprop="telephone">
                                    <a href="tel:8999876969">
                                        <span class="icon-phone " aria-hidden="true"></span>(89) 9987-6969
                                    </a>
                                </span>
                            </p>
                    </hgroup>	
                </li>
                <!--
                <li id="sul" itemscope itemtype="http://schema.org/Person">
                    <img src="<?php bloginfo('template_url'); ?>/img/diretoria/gce/jose.jpg" itemprop="image"></img>	
                    <hgroup>
                        <h4 itemprop="name">
                            José Batista da Silva
                        </h4>
                            <p>
                                <span class="responsability left" itemprop="jobTitle">Oficial Executivo Regional Sul</span>				
                            </p>
                            <p class="cid">
                                <span class="left">66741</span>	
                            </p>
                            <p>
                                <span class="left" itemprop="email">
                                    <a href="mailto:oersul@demolaypi.org.br" target="_blank">
                                        <span class="icon-mail " aria-hidden="true"></span>oersul@demolaypi.org.br
                                    </a>
                                </span>
                            </p>
                            <p>
                                <span class="left" itemprop="telephone">
                                    <a href="tel:8999218668">
                                        <span class="icon-phone " aria-hidden="true"></span>(89) 9921-8668
                                    </a>
                                </span>
                            </p>
                    </hgroup>	
                </li>
            </ul>
        </section>
        </div>
        <div class="large-6 columns">
        <section id="regioes">
            <h3>Regiões</h3>
            <div id="map_canvas" style="height: 422px;"></div>
        </section>
        </div><!-- large-6 columns-->
    </div>
    </div><!-- large-12 columns-->
    </div><!-- row-->
    <?php get_footer(); ?>


