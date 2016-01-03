<div class="fixed">
<nav class="top-bar nav-background-white show-nav paused" data-topbar role="navigation" data-options="back_text: Voltar">
  <ul class="title-area">
    <li class="name">
      <h1><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url( get_template_directory_uri() )  ?>/dist/img/site-gce.png" alt=""></a></h1>
    </li>
    <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>

  <section class="top-bar-section">

    <!-- Left Nav Section -->
    <?php get_template_part('inc/menu-pages'); ?>

    <!-- Right Nav Section -->
    <ul class="right">
      <li class="has-form">
        <div class="row collapse search">
          <?php get_template_part('inc/search-form'); ?>
        </div>
      </li>
    </ul>
  </section>
</nav>
</div>