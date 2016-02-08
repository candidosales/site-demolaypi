<?php if (is_page() && have_posts()){ ?>
  <?php while (have_posts()) { the_post(); ?>
    <?php if (has_post_thumbnail()) { ?>
    <div class="large-12 columns banner-page">
       <?php the_post_thumbnail(); ?>
    </div>
    <?php } ?>
  <?php }
      }
   ?>