<?php
/**
 * Template Name: Full Page Slides Template
 */
?>
<?php get_header(); ?>

<div class="main-content fullpage-content" data-fp-paddingtop="60px">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <?php the_content(); ?>
      <?php get_template_part( 'template-parts/content', 'slides'); ?>

    <?php endwhile; else: ?>

      <h1>Oh no!</h1>
      <p>No content is appearing for this page!</p>

    <?php endif; ?>
</div>

<?php get_footer(); ?>
