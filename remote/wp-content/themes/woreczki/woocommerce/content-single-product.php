<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
   <div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'shop-item__content flexbox mgt-70', $product ); ?>>
      <div class="shop-item__img">

         <?php
         /**
         * Hook: woocommerce_before_single_product_summary.
         *
         * @hooked woocommerce_show_product_sale_flash - 10
         * @hooked woocommerce_show_product_images - 20
         */
         do_action( 'woocommerce_before_single_product_summary' );
         ?>
      </div>

      <div class="summary entry-summary shop-item__description">
         <?php
         /**
         * Hook: woocommerce_single_product_summary.
         *
         * @hooked woocommerce_template_single_title - 5
         * @hooked woocommerce_template_single_rating - 10
         * @hooked woocommerce_template_single_price - 10
         * @hooked woocommerce_template_single_excerpt - 20
         * @hooked woocommerce_template_single_add_to_cart - 30
         * @hooked woocommerce_template_single_meta - 40
         * @hooked woocommerce_template_single_sharing - 50
         * @hooked WC_Structured_Data::generate_product_data() - 60
         */
         do_action( 'woocommerce_single_product_summary' );
         ?>
      </div>

      <?php
      /**
      * Hook: woocommerce_after_single_product_summary.
      *
      * @hooked woocommerce_output_product_data_tabs - 10
      * @hooked woocommerce_upsell_display - 15
      * @hooked woocommerce_output_related_products - 20
      */
      do_action( 'woocommerce_after_single_product_summary' );
      ?>
   </div>

<?php do_action( 'woocommerce_after_single_product' ); ?>

	<?php if(have_rows('profits')): ?>
	   <div class="shop-item__profit flexbox flexbox--lg ">
			<?php while(have_rows('profits')): the_row(); ?>
		      <div class="shop-item__profit-item mglr-70 flexbox flexbox--nowrap flexbox--fstart">
		         <span class="shop-item__profit-icon" style="background-image: url('<?php the_sub_field('icon'); ?>');"></span>
		         <div class="text-bold text-f20"><?php the_sub_field('text'); ?></div>
		      </div>
			<?php endwhile; ?>
	   </div>
	<?php endif; ?>

   <div class="shop-item__details flexbox flexbox--fstart flexbox--astart mgtb-60">
      <div class="shop-item__details-col">
			<?php the_field('left_content'); ?>
      </div>

      <div class="shop-item__details-col">
			<?php the_field('right_content'); ?>
      </div>
   </div>

	<?php
		//////////////////////// PODOBNE PRODUKTY

		$defaults = array(
			'posts_per_page' => 5,
			'orderby'        => 'rand', // @codingStandardsIgnoreLine.
			'order'          => 'desc',
		);
		$args['related_products'] = array_filter( array_map( 'wc_get_product', wc_get_related_products( $product->get_id(), $args['posts_per_page'], $product->get_upsell_ids() ) ), 'wc_products_array_filter_visible' );

		// Handle orderby.
		$args['related_products'] = wc_products_array_orderby( $args['related_products'], $args['orderby'], $args['order'] );

		// Set global loop values.
		wc_set_loop_prop( 'name', 'related' );
		wc_set_loop_prop( 'columns', apply_filters( 'woocommerce_related_products_columns', $args['columns'] ) );
		?>
		<?php if($args['related_products']): ?>
			<ul class='shop__category-row mgtb-80 row grid grid--col-6 grid--gap-15'>
				<li class="shop__category-btn grid__item flexbox text-center"><div class="shop__category-header">Podobne produkty</div></li>
				<?php foreach ( $args['related_products'] as $related_product ) : ?>

					<?php
					$post_object = get_post( $related_product->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found
					global $product;
					?>
					<li class="grid__item shop__item text-center flexbox flexbox--col flexbox--sbet">
						<?= woocommerce_get_product_thumbnail(array('class' => ' shop__product-img')); ?>
						<div>
							<?= custom_variation_price(0, $product); ?>
							<h2 class="shop__product-name mgtb-20">
								<?= $product->get_title(); ?>
							</h2>
							<div class="mgt-10">
								<a href="<?= get_permalink(); ?>" class="btn btn--gray">Zobacz</a>
								<a href="<?= esc_url( get_home_url()).'/?add-to-cart='.custom_default_variation_id(0, $product); ?>" class="btn">Do koszyka</a>
							</div>
						</div>
					</li>

				<?php endforeach; ?>

				<?php woocommerce_product_loop_end(); ?>
			<?php endif; ?>
