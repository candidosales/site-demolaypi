<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url(home_url('/')); ?>">
  <div class="large-10 small-10 no-padding columns">
    <input class="search__field" name="s" id="s" type="search" placeholder="<?php _e('Procurando algo?', 'vikstar'); ?>" value="<?php echo get_search_query(); ?>">
  </div>
  <div class="large-2 small-2 no-padding columns">
    <button type="submit" class="button expand search__button no-padding"><i class="search__icon icon-search"></i></button>
  </div>
</form>