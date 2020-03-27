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
      // print_r($res);
      ?>
      <ul class="shop-sidebar-category <?php echo $isSubcategory == true ? 'shop-sidebar-category-sub' : '' ?>">
      <?php
      foreach ($res as $category) {
         $category_id = $category->term_id;
         if(!in_array($category->slug, $exclude)){
            ?>
            <li class="shop-sidebar-category__item <?php echo get_term_children($category_id, 'product_cat') ? 'shop-sidebar-category__item--has-sub' : '' ?>">
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
