<?php $footer_id = 58; ?>

<footer>
      <div class="container">
         <?php if(!is_singular( 'product' )): ?>
            <?php if(get_field('about', $footer_id)): ?>
               <?php while(have_rows('about', $footer_id)): the_row(); ?>
                  <div class="about row mgtb-80 flexbox">
                     <div class="col-md-5">
                        <?php $img = get_sub_field('image'); ?>
                        <img src="<?= $img['url']; ?>" alt="<?= $img['alt']; ?>" class="img">
                     </div>
                     <div class="col-md-7">
                        <h2 class="about__header"><?php the_sub_field('header'); ?></h2>
                        <?php the_sub_field('content'); ?>
                     </div>
                  </div>
               <?php endwhile; ?>
            <?php endif;?>
         <?php endif; ?>

         <?php if(get_field('profits', $footer_id)): ?>
            <div class="grid grid--col-4 grid--gap-30 adventages mgtb-80 row">
               <?php while(have_rows('profits', $footer_id)): the_row(); ?>
                  <div class="grid__item adventages__item stretchbox flexbox--nowrap col-md-3">
                     <div class="adventages__icon" style="background-image: url('<?php the_sub_field('icon'); ?>');"></div>
                     <div>
                        <h3><?php the_sub_field('header'); ?></h3>
                        <?php the_sub_field('text'); ?>
                     </div>
                  </div>
               <?php endwhile; ?>
            </div>
         </div>
      <?php endif; ?>

      <div class="footer">
         <div class="container flexbox flexbox--sbet flexbox--baseline">
            <div class="footer__col">
               <h2 class="footer__header">Kategorie</h2>
               <?php wp_nav_menu(array(
                  'theme_location' => 'nav-footer-category',
                  'menu_class' => 'footer__nav',
                  'menu_id' => '',
                  'container' => ''
               )); ?>
            </div>
            <div class="footer__col">
               <h2 class="footer__header">Konto</h2>
               <?php wp_nav_menu(array(
                  'theme_location' => 'nav-footer-acc',
                  'menu_class' => 'footer__nav',
                  'menu_id' => '',
                  'container' => ''
               )); ?>
            </div>
            <div class="footer__col">
               <h2 class="footer__header">Sklep</h2>
               <?php wp_nav_menu(array(
                  'theme_location' => 'nav-footer',
                  'menu_class' => 'footer__nav',
                  'menu_id' => '',
                  'container' => ''
               )); ?>
            </div>
            <div class="footer__col">
               <h2 class="footer__header">Dostarczamy przez</h2>
               <img src="./img/DPD_logo(red)2015.svg" alt="" class="footer__services-img">
               <img src="./img/DPD_logo(red)2015.svg" alt="" class="footer__services-img">
               <img src="./img/DPD_logo(red)2015.svg" alt="" class="footer__services-img">
               <h2 class="footer__header">Płatność</h2>
               <img src="./img/dotpay.svg" alt="" class="footer__services-img footer__services-img--small">
               <img src="./img/paypal-logo-1.svg" alt="" class="footer__services-img footer__services-img--small">
            </div>
            <div class="footer__col">
               <h2 class="footer__header">Kontakt</h2>
               <a href="mailto:sklep@woreczki24.pl" class="footer__contact-item"><span class="icon icon--mail-red icon--big"></span><span>sklep@woreczki24.pl</span></a>
               <a href="" class="footer__contact-item" ><span class="icon icon--phone-green icon--big"></span>732 324 970</a>
            </div>
         </div>
      </div>

      <div class="container rights flexbox flexbox--sbet">
         <p>
            Wszelkie prawa zastrzeżone
         </p>
         <img src="./img/mr_logo.png" alt="" class="author">
      </div>
   </footer>

   <!-- <footer class="footer">
      <div class="text-center">
         <img src="<?= get_template_directory_uri(); ?>/images/dotpay_przelew.png" alt="DotPay" class="footer__payment">
      </div>
      <div class="footer__credits">
         <div class="container row">
            <div class="col-md-6 footer__credits-text">
               Jeśli masz problem, skontaktuj się z nami: <strong><a href="mailto:kofeina24sklep@gmail.com">kofeina24sklep@gmail.com</a></strong>, kom: <strong>732 324 670</strong>
            </div>
            <div class="col-md-6 text-right">
               <a href="https://www.facebook.com/Kofeina24-194877994389851/" class="footer__social">
                  <img src="<?= get_template_directory_uri(); ?>/images/fb.png" alt="Facebook">
               </a>
               <img src="<?= get_template_directory_uri(); ?>/images/app.png" alt="WhatssUp" class="footer__social">
            </div>
         </div>
      </div>
   </footer> -->

   <?php wp_footer(); ?>
   <!-- <link property="stylesheet" rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/cookies/divante.cookies.css">
   <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/cookies/divante.cookies.min.js"></script>
   <script>window.jQuery.cookie || document.write('<script src="<?php echo get_template_directory_uri(); ?>/cookies/jquery.cookie.min.js"><\/script>')</script>
   <script>
    jQuery(function($) {
      $.divanteCookies.render({
      privacyPolicy : true,
      cookiesPageURL : '<?php echo get_site_url(); ?>/polityka-prywatnosci/'
      });
    });
   </script> -->
   </body>
</html>
