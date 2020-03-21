<!DOCTYPE html>
<html lang="pl">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>
      <?php if(is_front_page()):
                  echo "Kofeina24 - suplementy w dobrej cenie";
            elseif(is_shop()):
               echo "Sklep | Kofeina24 - suplementy w dobrej cenie";
            else:
               echo get_the_title() . " | Kofeina24 - suplementy w dobrej cenie";
            endif;
         ?>
   </title>
   <?php wp_head(); ?>
   <link href="https://fonts.googleapis.com/css?family=Muli:300,400,600,900&display=swap" rel="stylesheet">
</head>
<body>
   <!-- <header class="header flexbox">
      <div class="logo">
         <a href="<?= get_home_url(); ?>">
            <img src="<?= get_template_directory_uri(); ?>/img/logo_kofeina.png" alt="" class="logo__img">
         </a>
      </div>

      <div class="burger-wrapper">
         <div class="burger flexbox">
            <div class="burger__bar"></div>
         </div>
      </div>

      <nav class="navbar flexbox">
         <?php wp_nav_menu(array(
                'theme_location' => 'nav-main',
                'menu_class' => 'nav text-center',
                'menu_id' => '',
                'container' => ''
               )); ?>
      </nav>

      <div class="cart-header text-right">
         <?php
            global $woocommerce;
            $cart_url = $woocommerce->cart->get_cart_url();
         ?>
         <a href="<?= get_permalink( wc_get_page_id( 'cart' ) ) ?>" class="cart-header__icon">
            <?php if($woocommerce->cart->cart_contents_count > 0){ ?>
               <span class="cart-header__count text-center"><?php echo $woocommerce->cart->cart_contents_count; ?></span>
            <?php } ?>
         </a>
      </div>
   </header> -->

   <header class="header">
      <div class="header__contact">
         <div class="container">
            <a href="mailto:sklep@woreczki24.pl" class="header__contact-item"><span class="icon icon--mail"></span>sklep@woreczki24.pl</a>
            <a href="" class="header__contact-item" ><span class="icon icon--phone"></span>732 324 970</a>
         </div>
      </div>

      <div class="header__main">
         <div class="container flexbox flexbox--sbet flexbox--nowrap">
            <div class="logo">
               <h1 class="logo__header">
                  <a href="<?= get_home_url(); ?>">
                     <img src="<?= getPath(); ?>/img/woreczki-logo.svg" alt="Woreczki 24" class="logo__img">
                  </a>
               </h1>
            </div>

            <div id="search" class="search">
               <form class="" action="" method="post">
                  <input type="text" placeholder="Szukaj w sklepie" class="search__input">
               </form>
            </div>

            <div class="account">
               <span class="account__item account__item--mobile">
                  <span id="search-btn" class="icon icon--search icon--big"></span>
               </span>
               <span class="account__item">
                  <span class="icon icon--cart icon--big"></span>
                  <span class="account__item-text">Koszyk</span>
               </span>
               <span class="account__item">
                  <span class="icon icon--user icon--big"></span>
                  <span class="account__item-text">Zaloguj się</span>
               </span>
            </div>

            <div class="burger">
               <div class="burger__bar"></div>
            </div>
         </div>
      </div>

      <nav class="navbar">
         <ul class="nav flexbox flexbox--sbet">
            <li class="nav__item nav__item--inactive"><a href="">Kategorie:</a></li>
            <li class="nav__item"><a href="">Doypack</a></li>
            <li class="nav__item"><a href="">Fałdowe</a></li>
            <li class="nav__item"><a href="">Aluminiowe</a></li>
            <li class="nav__item"><a href="">Bezbarwne</a></li>
            <li class="nav__item"><a href="">Kolorowe</a></li>
            <li class="nav__item"><a href="">Papierowe</a></li>
            <li class="nav__item"><a href="">Saszetki</a></li>
         </ul>
      </nav>
   </header>
