<div id="search" class="search">
   <form id="searchform" method="get" action="<?php echo home_url('/'); ?>">
      <input type="text" placeholder="Szukaj w sklepie" class="search__input" name="s" value="<?php the_search_query(); ?>">
      <input type="hidden" name="post_type" value="product" />
   </form>
</div>
