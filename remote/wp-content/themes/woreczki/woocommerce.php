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
            'before'      => '<span class="breadcrumb__item">',
            'after'       => '</span>',
         );
         woocommerce_breadcrumb($args);
      ?>
   </div>
   <div class="shop-item container">
      <?php woocommerce_content(); ?>
   </div>
<?php }else{ ?>
   <div class="page-header">
      <h1 class="page-header__title">Produkty</h1>
   </div>

   <div class="breadcrumb container mgtb-30">
      <?php
         $args = array(
            'delimiter' => '<span class="arrow arrow--right"></span>',
            'before'      => '<span class="breadcrumb__item">',
            'after'       => '</span>',
         );
         woocommerce_breadcrumb($args);
      ?>
   </div>
   <div class="container flexbox flexbox flexbox--nowrap flexbox--astart">

      <?php get_template_part('sidebar'); ?>
      <main class="shop">
         <?php woocommerce_content(); ?>
      </main>
   </div>
<?php } ?>

<?php get_footer(); ?>
