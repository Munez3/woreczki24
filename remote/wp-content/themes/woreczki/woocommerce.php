<?php get_header(); ?>

<?php
if ( is_singular( 'product' ) ) { ?>
   <?php woocommerce_content(); ?>
<?php }else{ ?>
   <div class="page-header">
      <h1 class="page-header__title">Produkty</h1>
   </div>

   <div class="breadcrumb container mgtb-30">
      <div class="breadcrumb__row flexbox flexbox--fstart">
         <a class="breadcrumb__item">
            Home
         </a>
         <a class="breadcrumb__item">
            Produkty
         </a>
         <a class="breadcrumb__item">
            Papierowe
         </a>
         <a class="breadcrumb__item breadcrumb__item--active">
            Z oknem
         </a>
      </div>
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
         <h2>Pojemności</h2>
      </aside>
      <main class="shop">
         <?php woocommerce_content(); ?>
      </main>
   </div>
   <!-- <div class="section section--pad shop stretchbox">
      <div class="section__half section__img text-center" style="background-image: url('<?php the_field('image', 10); ?>')"></div>
      <div class="section__half section__content shop__item flexbox flexbox--col flexbox--baseline">
         <h1>
            <?php the_field('header', 10); ?>
         </h1>
      </div>
      <div class="container mgt-md-0">
      </div>
   </div> -->
<?php } ?>

<?php get_footer(); ?>
