<?php
add_theme_support( 'post-thumbnails' );
add_theme_support( 'wc-product-gallery-lightbox' );

function starter_scripts() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', false, NULL, true );
    wp_enqueue_script( 'jquery' );
}
add_action( 'wp_enqueue_scripts', 'starter_scripts' );

function reset_query(){
   wp_reset_query();
}
add_action( 'admin_init', 'reset_query' );

add_action('wp_enqueue_scripts', 'load_styles_and_scripts');
function load_styles_and_scripts() {
  wp_enqueue_style('style-main', get_template_directory_uri() . '/stylesheets/screen.css');
  wp_enqueue_style('slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');

  wp_enqueue_script('slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', false, '1.0', true);
  wp_enqueue_script('main', get_template_directory_uri().'/js/main.js', false, '1.0', true);
}

function getPath() {
   return get_template_directory_uri();
}

//menu
add_action( 'init', 'register_menu' );
function register_menu() {
  register_nav_menus(array(
    'nav-main' => 'Menu Główne',
    'nav-footer' => 'Menu w stopce'
  ));
}

function my_search_sidebar() {
    register_sidebar(
        array (
            'name' => __( 'Szukaj', 'woreczki' ),
            'id' => 'search',
            'description' => __( 'Szukaj', 'woreczki' ),
            'before_widget' => '<div id="search" class="search">',
            'after_widget' => "</div>",
            'before_title' => '',
            'after_title' => '',
        )
    );
}
add_action( 'widgets_init', 'my_search_sidebar' );

function my_custom_sidebar() {
    register_sidebar(
        array (
            'name' => __( 'Sklep', 'woreczki' ),
            'id' => 'filters',
            'description' => __( 'Sklep', 'woreczki' ),
            'before_widget' => '<aside class="shop-sidebar">',
            'after_widget' => "</aside>",
            'before_title' => '<h2>',
            'after_title' => '</h2>',
        )
    );
}
add_action( 'widgets_init', 'my_custom_sidebar' );

add_filter('nav_menu_css_class', 'atg_menu_classes', 1, 3);
function atg_menu_classes($classes, $item, $args) {
  if($args->theme_location == 'nav-main') {
    $classes[] = 'nav__item';
  }
  return $classes;
}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

//sklep - archive product

add_shortcode('wc_sorting', 'woocommerce_catalog_ordering');

//overwrite class to shop product list wrapper (ul)
function woocommerce_product_loop_start( $echo = true ) {
   echo "<ul class='grid grid--col-5 grid--gap-15'>";
   // ob_start();
   // wc_get_template( 'loop/loop-start.php' );
   // if ( $echo )
   //    echo ob_get_clean();
   // else
   //    return ob_get_clean();
}

// add class to each product box
add_filter('post_class', 'loop_classes', 1, 3);
function loop_classes($classes, $class, $category){
   if(is_shop()){
      $classes[] = 'grid__item shop__item text-center flexbox flexbox--col flexbox--sbet';
   }
   return $classes;
}

// change default home page title in breadcrumbs

add_filter( 'woocommerce_breadcrumb_defaults', 'ts_change_breadcrumb_home_text',20);
function ts_change_breadcrumb_home_text( $defaults ) {
   $defaults['home'] = 'Home';
   return $defaults;
}

// --------------------------------------------------------

add_filter( 'woocommerce_show_page_title', 'not_a_shop_page' );
function not_a_shop_page() {
    return boolval(!is_shop() && !is_product_category());
}

remove_action('woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
// remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
// remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
//
// remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
// add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail_with_box', 10);
function woocommerce_template_loop_product_thumbnail_with_box(){
   echo '<div class="shop__thumbnail text-center">'.woocommerce_get_product_thumbnail().'</div>'; // WPCS: XSS ok.
}

// custom product title in shop loop
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title');
add_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title_custom');
function woocommerce_template_loop_product_title_custom() {
   echo '<h2 class="shop__product-name mgtb-20 ' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title' ) ) . '">' . get_the_title() . '</h2>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

// Add back to store button on WooCommerce cart page
add_action('woocommerce_cart_actions', 'themeprefix_back_to_store');
function themeprefix_back_to_store() { ?>
<a class="button wc-backward floatleft" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
   <?php esc_html_e( 'Return to shop', 'woocommerce' ); ?>
</a>
<?php
}


// remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price');
// add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price_custom');
function woocommerce_template_loop_price_custom(){
   global $product;
   $price = get_field('price', $product->get_id());
   echo '<div class="shop__price">'.$price.'</div>';
}

//produkt
// remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
//
// remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
// remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
// remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);
// remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
//
// remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
// remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
// remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
//
//
// remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
//
//
//
// remove_action('woocommerce_single_variation', 'woocommerce_single_variation_add_to_cart_button', 20);
// add_action('woocommerce_after_single_variation', 'woocommerce_single_variation_add_to_cart_button', 1);
//
//
// add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );    // 2.1 +

function woo_custom_cart_button_text() {
      //   return 'Add to cart';
        return __( 'Add to cart', 'woocommerce' );

}

// add_filter( 'woocommerce_checkout_fields' , 'remove_postcode_validation', 99 );

function remove_postcode_validation( $fields ) {

    unset($fields['billing']['billing_postcode']['validate']);
    unset($fields['shipping']['shipping_postcode']['validate']);

    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_company']);
    unset($fields['shipping']['shipping_company']);

	return $fields;
}


// add_filter( 'woocommerce_currencies', 'add_my_currency' );

function add_my_currency( $currencies ) {
     $currencies['PLN'] = __( 'PLN', 'woocommerce' );
     return $currencies;
}

// add_filter('woocommerce_currency_symbol', 'add_my_currency_symbol', 10, 2);

function add_my_currency_symbol( $currency_symbol, $currency ) {
     switch( $currency ) {
          case 'PLN': $currency_symbol = 'PLN'; break;
     }
     return $currency_symbol;
}

 // add_filter('woocommerce_show_variation_price',      function() { return TRUE;});

// add_action('woocommerce_check_cart_items','check_cart_weight');

function check_cart_weight(){
    global $woocommerce;
    $weight = $woocommerce->cart->cart_contents_weight;
    if( $weight > 4 ){
        wc_add_notice( sprintf( __( 'You have %s kg weight and we allow only 4 kg of weight per order.', 'woocommerce' ), $weight ), 'error' );
        remove_action( 'woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 20 );
    }else{
      add_action( 'woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 20 );

   }
}

function hide_shipping_when_class_is_in_cart( $rates, $package ) {
   // shipping class IDs that need the method removed
   $shipping_classes = array('20kg', '10kg', '20Karton');
   $if_exists = false;

   // print_r($rates);
   foreach( $package['contents'] as $key => $values ) {
   // print_r($values[ 'data' ]->get_shipping_class());
      if( in_array( $values[ 'data' ]->get_shipping_class(), $shipping_classes ) )
         $if_exists = true;
   }

   //inpost zwykły
   if( $if_exists ) unset( $rates['flat_rate:3'] );
   //inpost pobranie
   if( $if_exists ) unset( $rates['flat_rate:5'] );

   return $rates;
}
// add_filter( 'woocommerce_package_rates', 'hide_shipping_when_class_is_in_cart', 10, 2 );


function alter_shipping_methods($list){
    $chosen_titles = array();
    $available_methods = WC()->shipping->get_packages();

    $chosen_rates = ( isset( WC()->session ) ) ? WC()->session->get( 'chosen_shipping_methods' ) : array();

    foreach ($available_methods as $method){
      foreach ($chosen_rates as $chosen) {
         if( isset( $method['rates'][$chosen] ) ) $chosen_titles[] = $method['rates'][ $chosen ]->label;
      }
   }
   //  if( in_array( 'Pobranie DPD', $chosen_titles ) ) {
   //      $array_diff = array('WC_Gateway_Przelewy24');
   //      $list = array_diff( $list, $array_diff );
   //  }

   // if($chosen_rates[0] != 'flat_rate:4' && $chosen_rates[0] != 'flat_rate:5'){
   if($chosen_rates[0] != 'flexible_shipping_6_2' && $chosen_rates[0] != 'flexible_shipping_6_4' && $chosen_rates[0] != 'flexible_shipping_6_6'){
      $array_diff = array('WC_Gateway_COD');
      $list = array_diff( $list, $array_diff );
   }
    return $list;
}
// add_action('woocommerce_payment_gateways', 'alter_shipping_methods');



// add_action( 'template_redirect', 'woo_custom_redirect_after_purchase' );
function woo_custom_redirect_after_purchase() {
	global $wp;
	if ( $wp->query_vars['pagename'] == 'sprawdzanie-statusu-platnosci') {
		wp_redirect( 'http://kofeina24.pl/zamowienie/order-received/' );
		exit;
	}
}

/**
 * Show cart contents / total Ajax
 */
// add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
      <a href="<?= get_permalink( wc_get_page_id( 'cart' ) ) ?>" class="account__item">
         <span class="icon icon--cart icon--big"></span>
         <span class="account__item-text">Koszyk</span>
         <?php if($woocommerce->cart->cart_contents_count > 0){ ?>
            <span class="cart-header__count text-center">(<?php echo $woocommerce->cart->cart_contents_count; ?>)</span>
         <?php } ?>
      </a>
	<?php
	$fragments['a.cart-header__icon'] = ob_get_clean();
	return $fragments;
}


/**
 * @snippet       Add privacy policy tick box at checkout
 * @how-to        Watch tutorial @ https://businessbloomer1.com/?p=19055
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 3.6.3
 * @donate $9     https://businessbloomer1.com/bloomer-armada/
 */

// add_action( 'woocommerce_review_order_before_submit', 'bbloomer_add_checkout_privacy_policy', 9 );

function bbloomer_add_checkout_privacy_policy() {

woocommerce_form_field( 'privacy_policy', array(
   'type'          => 'checkbox',
   'class'         => array('form-row privacy'),
   'label_class'   => array('woocommerce-form__label woocommerce-form__label-for-checkbox checkbox'),
   'input_class'   => array('woocommerce-form__input woocommerce-form__input-checkbox input-checkbox'),
   'required'      => true,
   'label'         => 'Wyrażam zgodę na przetwarzanie moich danych osobowych zawartych w formularzu w celu i zakresie niezbędnym do realizacji usługi i tylko takim celu.',
));

}

// Show notice if customer does not tick

// add_action( 'woocommerce_checkout_process', 'bbloomer_not_approved_privacy' );

function bbloomer_not_approved_privacy() {
    if ( ! (int) isset( $_POST['privacy_policy'] ) ) {
        wc_add_notice( __( 'Proszę zaakceptować zgodę na przetwarzanie danych osobowych aby móc sfinalizować zamówienie.' ), 'error' );
    }
}

//Przeczytałem/am i akceptuję [terms]
