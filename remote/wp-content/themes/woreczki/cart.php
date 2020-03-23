<?php
/*
Template name: Koszyk
*/
get_header(); ?>

<div class="page-header">
    <div class="page-header__title"><?php the_title(); ?></div>
</div>
<main>
    <div class="shop-account container">
        <?php echo do_shortcode('[woocommerce_cart]'); ?>
    </div>
</main>

<?php get_footer(); ?>
