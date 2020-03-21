<?php get_header(); ?>

<?php
if ( is_singular( 'product' ) ) { ?>
   <?php woocommerce_content(); ?>
<?php }else{ ?>
   <div class="section section--pad shop stretchbox">
      <div class="section__half section__img text-center" style="background-image: url('<?php the_field('image', 10); ?>')"></div>
      <div class="section__half section__content shop__item flexbox flexbox--col flexbox--baseline">
         <h1>
            <?php the_field('header', 10); ?>
         </h1>
      </div>
      <div class="container mgt-md-0">
         <?php woocommerce_content(); ?>
      </div>
   </div>
<?php } ?>

<?php get_footer(); ?>
