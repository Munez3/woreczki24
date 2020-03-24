<?php
/*
Template name: Zamówienie
*/
get_header(); ?>

<div class="page-header">
    <div class="page-header__title"><?php the_title(); ?></div>
</div>
<div class="breadcrumb container mgtb-30">

    <?php
    $args = array(
        'delimiter' => '<span class="arrow arrow--right"></span>',
    );
    woocommerce_breadcrumb($args);
    ?>
</div>
<main>
    <div class="shop-checkout container">
        <?php echo do_shortcode('[woocommerce_checkout]'); ?>
    </div>
</main>

<?php get_footer(); ?>
