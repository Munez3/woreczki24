<?php
/*
Template name: Strona Główna
*/
get_header(); ?>

   <div class="slider slick-slider" data-slider="">
      <?php while(have_rows('slider')): the_row(); ?>
         <div class="slider__item" style="background-image: url('<?php the_sub_field('image'); ?>')">
            <div class="container flexbox flexbox--col slider__100 text-center">
               <div class="slider__title"><?php the_sub_field('header'); ?></div>
               <div class="slider__line"></div>
               <?php the_sub_field('content'); ?>
               <a class="btn slider__btn" href="<?php the_sub_field('link'); ?>">
                  <?php the_sub_field('link_text'); ?>
               </a>
            </div>
         </div>
      <?php endwhile; ?>
   </div>

   <main>
      <div class="shop container">
         <section class="shop__category-row mgtb-80 row grid grid--col-6 grid--gap-15">
            <a href="" class="shop__category-cta">zobacz wszystkie</a>
            <a href="<?= get_permalink( wc_get_page_id( 'shop' ) ) ?>" class="shop__category-btn grid__item flexbox text-center"><h1 class="shop__category-header">Najczęściej kupowane</h1></a>
            <?php
               $args = array(
                  'post_type' => 'product',
                  'posts_per_page' => 5,
                  'order' => 'DESC',
                  'orderby' => 'meta_value_num',
                  'meta_key' => 'total_sales',
                  // 'tax_query'      => array( array(
                  //    'taxonomy'        => 'pa_amount',
                  //    'field'           => 'slug',
                  //    'terms'           =>  array('100'),
                  //    'operator'        => 'IN',
                  // ))
               );
               $res = new WP_Query( $args );
               while ($res->have_posts()) : $res->the_post();
                  global $product; ?>
                  <div class="grid__item shop__item text-center flexbox flexbox--col flexbox--sbet">
                     <?= woocommerce_get_product_thumbnail(array('class' => ' shop__product-img')); ?>
                     <div>
                        <?= custom_variation_price(0, $product); ?>
                        <h2 class="shop__product-name mgtb-20">
                           <?= $product->get_title(); ?>
                        </h2>

                        <?php /*
                        <?php if($product->get_short_description()): ?>
                           <p>
                              <?php echo $product->get_short_description(); ?>
                           </p>
                        <?php endif; ?>
                        */ ?>

                        <div class="mgt-10">
                           <a href="<?= get_permalink(); ?>" class="btn btn--gray">Zobacz</a>
                           <a href="<?= esc_url( get_home_url()).'/?add-to-cart='.custom_default_variation_id(0, $product); ?>" class="btn">Do koszyka</a>
                        </div>
                     </div>
                  </div>
               <?php
                  endwhile;
                  wp_reset_query();
            ?>
         </section>


         <?php  $args = array(
               'taxonomy' => 'product_cat',
               'order' => 'ASC',
               'orderby' => 'menu_order'
            );

            $res = get_categories($args);
            foreach ($res as $category) {
               if($category->category_parent == 0) {
                  $category_id = $category->term_id;
               ?>
                  <section class="shop__category-row mgtb-80 row grid grid--col-6 grid--gap-15">
                     <a href="" class="shop__category-cta">zobacz wszystkie</a>
                     <a href="<?= get_term_link($category->slug, 'product_cat'); ?>" class="shop__category-btn grid__item flexbox text-center"><h1 class="shop__category-header"><?= $category->name ?></h1></a>
                     <?php  $args = array(
                           'post_type' => 'product',
                           'posts_per_page' => 5,
                           'order' => 'ASC',
                           'orderby' => 'menu_order',
                           'product_cat' => $category->slug
                        );

                     $res = new WP_Query( $args );
                     while ($res->have_posts()) : $res->the_post();
                        global $product; ?>
                        <div class="grid__item shop__item text-center flexbox flexbox--col flexbox--sbet">
                           <?= woocommerce_get_product_thumbnail(array('class' => ' shop__product-img')); ?>
                           <div>
                              <div class="shop__price">27zł / 100 szt.</div>
                              <h2 class="shop__product-name mgtb-20">
                                 <?= $product->get_title(); ?>
                              </h2>
                              <!-- <p>
                                 Torebki PAPIEROWE ECO z wysoką barierą zapachu, wilgoci i światła. Opakowanie z wielokrotnym zamknięciem strunowym ZIP. Torebki wykonane z laminatu PAP/AL/PE powlekane od środka folią. Opakowania te służą do przechowywania produktów sypkich lub półsypkich, które wymagają wysokiej bariery.
                              </p> -->
                              <!-- <div class="shop__price">27zł / 100 szt.</div> -->
                              <div class="mgt-10">
                                 <a href="<?= get_permalink(); ?>" class="btn">Zobacz</a>
                                 <!-- <a href="<?= get_permalink(); ?>" class="btn btn--gray">Zobacz</a> -->
                                 <!-- <a href="<?= get_home_url().'?add-to-cart='.$product->get_id(); ?>" class="btn">Do koszyka</a> -->
                              </div>
                           </div>
                        </div>
                     <?php
                        endwhile;
                        wp_reset_query();
                     ?>
                  </section>
               <?php
               }
            }
         ?>
      </div>
   </main>

<?php get_footer(); ?>
