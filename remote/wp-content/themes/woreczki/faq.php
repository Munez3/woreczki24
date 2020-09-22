<?php
/*
Template name: FAQ
*/
get_header(); ?>

<div class="section section--pad stretchbox">
   <div class="section__half section__img text-center" style="background-image: url('<?php the_field('image'); ?>')"></div>
   <div class="section__half section__content shop__item flexbox flexbox--col flexbox--baseline">
      <h1>
         <?php the_field('header'); ?>
      </h1>
   </div>
</div>
<main>
   <div class="container faq mgtb-80">
      <?php while(have_rows('faq')): the_row(); ?>
         <article class="faq__item">
            <h2 class="faq__header"><?php the_sub_field('header'); ?></h2>
            <div class="faq__content">
               <?php the_sub_field('content'); ?>
            </div>
         </article>
      <?php endwhile; ?>
   </div>
</main>

<?php get_footer(); ?>
