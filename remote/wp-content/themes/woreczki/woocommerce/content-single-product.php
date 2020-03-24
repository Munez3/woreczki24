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




         <div class="shop-item__img">
            <img src="./img/product2.png" alt="Produkt" class="shop__product-img">
         </div>
         <div class="shop-item__description">
            <h1 class="shop-item__title text-f20">Torebka doypack PREMIUM SILVER, 100 ml, 85x50x145 mm,
               PET12/ALU8/PE75 + easy
               open</h1>
            <div class="shop-item__info">
               <div class="shop-item__availability pdtb-5">Dostępność: <span class="text-bold">w magazynie</span>
               </div>
               <div class="shop-item__shipping-cost pdtb-5">Kosz wysyłki: <span class="text-bold">od 9zł</span>
               </div>
               <div class="shop-item__inventory pdtb-5 flexbox flexbox--nowrap flexbox--fstart">Stan magazynowy:
                  <span class="shop-item__inventory-available flexbox"></span> <span class="text-bold"> 20
                     kpl/100szt.</span></div>
            </div>
            <div class="shop-item__price mgtb-30 flexbox flexbox--lg flexbox--fstart flexbox--astart">
               <div class="flexbox flexbox--astart flexbox--fstart">
                  <div class="shop__price shop-item__price-box">
                     <div class="shop__price--big">27 zł <span class="text-f16">brutto</span></div>
                     <div class="shop__price--medium shop__price--dark">22 zł <span class="text-f12">netto</span>
                     </div>
                  </div>
                  <select class="shop-item__items-number">
                     <option>100 szt</option>
                  </select>
                  <a href="" class="btn btn--min-w150 shop-item__price-add">Do koszyka</a>
               </div>
               <div class="shop-item__not-available flexbox flexbox--xxl">
                  <span class="shop-item__not-available-arrow arrow arrow--right mglr-15"></span>
                  <span class="shop-item__not-available-info">Brak</span>
                  <a href="" class="btn shop-item__not-available-notify">Powiadom o dostępności</a>
               </div>
            </div>

         </div>
      </div>

      <div class="shop-item__profit flexbox flexbox--lg ">
         <div class="shop-item__profit-item mglr-70 flexbox flexbox--nowrap flexbox--fstart">
            <span class="shop-item__profit-icon"
               style="background-image: url('./img/ico_szybka-przesylka.svg');"></span>
            <div class="text-bold text-f20">Szybka przesyłka</div>
         </div>
         <div class="shop-item__profit-item mglr-70 flexbox flexbox--nowrap flexbox--fstart">
            <span class="shop-item__profit-icon"
               style="background-image: url('./img/ico_szybka-przesylka.svg');"></span>
            <div class="text-bold text-f20">Bezpieczne transakcje</div>
         </div>
         <div class="shop-item__profit-item mglr-70 flexbox flexbox--nowrap flexbox--fstart">
            <span class="shop-item__profit-icon"
               style="background-image: url('./img/ico_wysoka-jakosc.svg');"></span>
            <div class="text-bold text-f20">Wysoka jakość</div>
         </div>
      </div>

      <div class="shop-item__details flexbox flexbox--fstart flexbox--astart mgtb-60">
         <div class="shop-item__details-col">
            <h2 class="shop-item__details-title mgt-20">Zalety woreczka:</h2>
            <ul>
               <li>wielokrotne zamykanie/otwieranie</li>
               <li>ochrona przed czynnikami zewnętrznymi
               </li>
               <li>chroni przed zawilgoceniem produktu
               </li>
               <li>najlepsza prezentacja na półce
                  sklepowej </li>
               <li>zapobiega rozsypywaniu/rozlewaniu się
                  produktu </li>
               <li>duża powierzchnia zadruku</li>
            </ul>

            <h2 class="shop-item__details-title mgt-40">Szczegóły opakowania:</h2>
            <ul>
               <li>Rozmar: <span class="text-bold">
                     160x80x260mm</span></li>
               <li>Pojemność: <span class="text-bold">
                     750 ml</span></li>
               <li>Materiał: <span class="text-bold">
                     PET/PE</span> </li>
               <li>Grubość: <span class="text-bold">
                     12/100um</span> </li>
               <li>Kolor: <span class="text-bold">
                     kolorowy</span> </li>
               <li>Wysposażenie: <span
                     class="text-bold"> laserowa linia, nacinka „easy-open”, okno, struna, zabezpieczający,
                     niewidoczny znak UV, zaokrąglone narożniki</span></li>
            </ul>
         </div>

         <div class="shop-item__details-col">
            <h2 class="shop-item__details-title mgtb-20">Opis produktu:</h2>
            <div class="shop-item__details-desc">
               <p>Stojące opakowanie foliowe z oknem, wykonane z bezbarwnej folii barierowej zadrukowanej
                  zadrukowanej w
                  stylistyce papieru, pokrytej lakierem matowym. Struna umożliwia wielokrotne otwieranie i zamykanie
                  worka. Nacinka służy do łatwego otwierania. Dodatkowo worek posiada zaokrąglone narożniki. </p>

               <p>Worek pokryty jest lakierem "paper touch", który sprawia, że opakowanie foliowe w dotyku przypomina
                  fakturę
                  papieru. </p>

               <p>Worek wyposażony jest w innowacyjne rozwiązania dostępne tylko i wyłącznie u nas - laserową
                  linię służącą do otwierania worka po prostej linii oraz niewidoczny znak UV w dnie, zabezpieczający
                  przed próbami fałszowania produktu. </p>

               <p>Specyfikację produktu znajdą Państwo w zakładce "Szczegóły Produktu".</p>
            </div>
         </div>
      </div>

      <!-- <section class="shop__category-row mgtb-80 row grid grid--col-6 grid--gap-15">
         <a href="" class="shop__category-cta">zobacz wszystkie</a>
         <a href="" class="shop__category-btn grid__item flexbox text-center">
            <h1 class="shop__category-header">Podobne produkty</h1>
         </a>
         <div class="grid__item shop__item text-center flexbox flexbox--col flexbox--sbet">
            <div>
               <img src="./img/product2.png" alt="Produkt" class="shop__product-img">
               <div class="shop__price">27zł / 100 szt.</div>
            </div>
            <h2 class="shop__product-name mgtb-20">
               Torebka doypack PREMIUM SILVER100 ml 85x50x145 mm PET12/ALU8/PE75 + easy open
            </h2>
            <div class="mgt-10">
               <a href="" class="btn btn--gray">Zobacz</a>
               <a href="" class="btn">Do koszyka</a>
            </div>
         </div>
         <div class="grid__item shop__item text-center flexbox flexbox--col flexbox--sbet">
            <div>
               <img src="./img/product2.png" alt="Produkt" class="shop__product-img">
               <div class="shop__price">27zł / 100 szt.</div>
            </div>
            <h2 class="shop__product-name mgtb-20">
               Torebka doypack PREMIUM SILVER100 ml 85x50x145 mm PET12/ALU8/PE75 + easy open
            </h2>
            <div class="mgt-10">
               <a href="" class="btn btn--gray">Zobacz</a>
               <a href="" class="btn">Do koszyka</a>
            </div>
         </div>
         <div class="grid__item shop__item text-center flexbox flexbox--col flexbox--sbet">
            <div>
               <img src="./img/product2.png" alt="Produkt" class="shop__product-img">
               <div class="shop__price">27zł / 100 szt.</div>
            </div>
            <h2 class="shop__product-name mgtb-20">
               Torebka doypack PREMIUM SILVER100 ml 85x50x145 mm PET12/ALU8/PE75 + easy open
            </h2>
            <div class="mgt-10">
               <a href="" class="btn btn--gray">Zobacz</a>
               <a href="" class="btn">Do koszyka</a>
            </div>
         </div>
         <div class="grid__item shop__item text-center flexbox flexbox--col flexbox--sbet">
            <div>
               <img src="./img/product2.png" alt="Produkt" class="shop__product-img">
               <div class="shop__price">27zł / 100 szt.</div>
            </div>
            <h2 class="shop__product-name mgtb-20">
               Torebka doypack PREMIUM SILVER100 ml 85x50x145 mm PET12/ALU8/PE75 + easy open
            </h2>
            <div class="mgt-10">
               <a href="" class="btn btn--gray">Zobacz</a>
               <a href="" class="btn">Do koszyka</a>
            </div>
         </div>
         <div class="grid__item shop__item text-center flexbox flexbox--col flexbox--sbet">
            <div>
               <img src="./img/product2.png" alt="Produkt" class="shop__product-img">
               <div class="shop__price">27zł / 100 szt.</div>
            </div>
            <h2 class="shop__product-name mgtb-20">
               Torebka doypack PREMIUM SILVER100 ml 85x50x145 mm PET12/ALU8/PE75 + easy open
            </h2>
            <div class="mgt-10">
               <a href="" class="btn btn--gray">Zobacz</a>
               <a href="" class="btn">Do koszyka</a>
            </div>
         </div>
      </section> -->
