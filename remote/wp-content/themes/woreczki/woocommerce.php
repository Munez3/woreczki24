<?php get_header(); ?>

<?php
if ( is_singular( 'product' ) ) { ?>
   <div class="page-header">
      <div class="page-header__title">Produkty</div>
   </div>
   <div class="breadcrumb container mgtb-30">

      <?php
         $args = array(
            'delimiter' => '<span class="arrow arrow--right"></span>',
         );
         woocommerce_breadcrumb($args);
      ?>
      <!-- <div class="breadcrumb__row flexbox flexbox--fstart">
         <a class="breadcrumb__item">
            Home
            <span class="arrow arrow--right"></span>
         </a>
         <a class="breadcrumb__item">
            Produkty
            <span class="arrow arrow--right"></span>
         </a>
         <a class="breadcrumb__item">
            Papierowe
            <span class="arrow arrow--right"></span>
         </a>
         <a class="breadcrumb__item breadcrumb__item--active">
            TOREBKA DOYPACK PREMIUM SILVER, 100 ML, 85X50X145 MM, PET12/ALU8/PE75 + EASY OPEN
         </a>
      </div> -->
   </div>
   <div class="shop-item container">
         <div class="shop-item__content flexbox  mgt-70">
   <?php woocommerce_content(); ?>
</div>
</div>
<?php }else{ ?>
   <div class="page-header">
      <h1 class="page-header__title">Produkty</h1>
   </div>

   <div class="breadcrumb container mgtb-30">
      <?php
         $args = array(
            'delimiter' => '<span class="arrow arrow--right"></span>',
         );
         woocommerce_breadcrumb($args);
      ?>
   </div>
   <div class="container flexbox flexbox flexbox--nowrap flexbox--astart">
      <aside class="shop-sidebar">
         <h2>Kategorie</h2>
         <ul>
         <?php
            $args = array(
               'taxonomy' => 'product_cat',
               'order' => 'ASC',
               'orderby' => 'menu_order'
            );

            $res = get_categories($args);
            foreach ($res as $category) {
               if($category->category_parent == 0) {
                  $category_id = $category->term_id;
               ?>
               <li>
                  <a href="<?= get_term_link($category->slug, 'product_cat'); ?>"><?= $category->name ?></a>
               </li>
            <?php } ?>
         <?php } ?>
         </ul>
      </aside>
      <main class="shop">
         <?php woocommerce_content(); ?>
      </main>
   </div>
<?php } ?>

<?php get_footer(); ?>
