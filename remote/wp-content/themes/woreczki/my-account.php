<?php
/*
Template name: Moje konto
*/
get_header(); ?>

<div class="page-header">
    <div class="page-header__title"><?php the_title(); ?></div>
</div>
<main>
    <div class="shop-account container">
        <?php echo do_shortcode('[woocommerce_my_account]'); ?>
    </div>
</main>

<?php get_footer(); ?>
