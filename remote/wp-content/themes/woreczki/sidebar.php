<?php
   function renderList($id, $exclude, $isSubcategory){
      $args = array(
         'taxonomy' => 'product_cat',
         'order' => 'ASC',
         'orderby' => 'name',
         'hide_empty' => false,
         'parent' => $id
      );

      $res = get_categories($args);
      ?>
      <ul class="shop-sidebar-category <?php echo $isSubcategory == true ? 'shop-sidebar-category-sub' : '' ?>">
      <?php
      $query = get_query_var('term');
      foreach ($res as $category) {
         $category_id = $category->term_id;

         if(!in_array($category->slug, $exclude)){
            $class = $query == $category->slug ? 'shop-sidebar-category__item--active' : '';

            ?>
            <li class="shop-sidebar-category__item <?php echo get_term_children($category_id, 'product_cat') ? 'shop-sidebar-category__item--has-sub' : '' ?> <?php echo $class; ?>">
                <?php if(get_term_children($category_id, 'product_cat')){
                    echo '<span class="arrow arrow--sidebar"></span>';
                } ?>
               <a href="<?= get_term_link($category->slug, 'product_cat'); ?>"><?= $category->name.' ('.$category->category_count.')' ?></a>
               <?php
               if(get_term_children($category_id, 'product_cat')){
                  echo renderList($category_id, [], true);
               }
               ?>
            </li>
            <?php } ?>
         <?php } ?>
      </ul>
   <?php
   }
?>

<aside class="shop-sidebar">
   <div class="shop-sidebar__item">
      <h2 class="shop-sidebar__title">Kategorie</h2>
      <?php echo renderList(0, ['bez-kategorii', 'pojemnosc'], false); ?>
   </div>
   <div class="shop-sidebar__item">
      <h2 class="shop-sidebar__title">Pojemności</h2>
      <?php echo renderList(22, [], false); ?>
   </div>
</aside>
