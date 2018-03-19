<?php
/**
 * Template Name: WooCommerce System
 */
?>
<?php get_header(); ?>

<div class="container no-banner">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
        <div class="text-center pad-bottom"><h1 class="fw-300 text-uppercase"><?php the_title(); ?></h1></div>
        <?php the_content(); ?>

    <?php endwhile; else: ?>

      <h1>Oh no!</h1>
      <p>No content is appearing for this page!</p>

    <?php endif; ?>
</div>

<?php get_footer(); ?>
