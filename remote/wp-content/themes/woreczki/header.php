<!DOCTYPE html>
<html lang="pl">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>
      <?php if(is_front_page()):
                  echo "Woreczki24";
            elseif(is_shop()):
               echo "Sklep | Woreczki24";
            else:
               echo get_the_title() . " | Woreczki24";
            endif;
         ?>
   </title>
   <?php wp_head(); ?>
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&display=swap" rel="stylesheet">
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
      <?php if(get_field('contact', 58)): ?>
         <?php while(have_rows('contact', 58)): the_row(); ?>
            <div class="header__contact">
               <div class="container">
                  <a href="mailto:<?php the_sub_field('mail'); ?>" class="header__contact-item"><span class="icon icon--mail"></span><?php the_sub_field('mail'); ?></a>
                  <?php $phone = get_sub_field('phone'); ?>
                  <a href="tel://<?= preg_replace('/\s+/', '', $phone); ?>" class="header__contact-item" ><span class="icon icon--phone"></span><?= $phone; ?></a>
               </div>
            </div>
         <?php endwhile; ?>
      <?php endif; ?>

      <div class="header__main">
         <div class="container flexbox flexbox--sbet flexbox--nowrap">
            <div class="logo">
               <h1 class="logo__header">
                  <a href="<?= get_home_url(); ?>">
                     <img src="<?= getPath(); ?>/img/logo.svg" alt="Kofeina bezwodna" class="logo__img">
                  </a>
               </h1>
            </div>
            <?php //if ( is_active_sidebar( 'search' ) ) : ?>
               <?php //dynamic_sidebar( 'search' ); ?>
            <?php //endif; ?>

            <?php get_search_form(); ?>

            <div class="account">
               <span class="account__item account__item--mobile">
                  <span id="search-btn" class="icon icon--search icon--big"></span>
               </span>
               <a href="<?= get_permalink( wc_get_page_id( 'cart' ) ) ?>" class="account__item">
                  <span class="icon icon--cart icon--big"></span>
                  <?php if($woocommerce->cart->cart_contents_count > 0){ ?>
                     <span class="cart-header__count text-center"><?php echo $woocommerce->cart->cart_contents_count; ?></span>
                  <?php } ?>
                  <span class="account__item-text">Koszyk</span>
               </a>
               <a href="<?= get_permalink( wc_get_page_id( 'myaccount' ) ) ?>" class="account__item">
                  <span class="icon icon--user icon--big"></span>
                  <span class="account__item-text">
                     <?php if(is_user_logged_in()){
                        echo "Moje konto";
                     }else {
                        echo "Zaloguj się";
                     }?></span>
               </a>
            </div>

            <div class="burger">
               <div class="burger__bar"></div>
            </div>
         </div>
      </div>

      <nav class="navbar">
         <?php wp_nav_menu(array(
            'theme_location' => 'nav-main',
            'menu_class' => 'nav flexbox flexbox--sbet',
            'menu_id' => '',
            'container' => ''
         )); ?>
      </nav>
   </header>
