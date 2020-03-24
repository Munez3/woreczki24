<?php
   function renderList($id, $exclude){
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
      <ul>
      <?php
      foreach ($res as $category) {
         $category_id = $category->term_id;
         if(!in_array($category->slug, $exclude)){
            ?>
            <li>
               <a href="<?= get_term_link($category->slug, 'product_cat'); ?>"><?= $category->name.' ('.$category->category_count.')' ?></a>
               <?php
               if(get_term_children($category_id, 'product_cat')){
                  echo renderList($category_id, []);
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
      <h2>Kategorie</h2>
      <?php echo renderList(0, ['bez-kategorii', 'pojemnosc']); ?>
   </div>
   <div class="shop-sidebar__item">
      <h2>Pojemności</h2>
      <?php echo renderList(22, []); ?>
   </div>
</aside>
