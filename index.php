<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php the_content(); ?>
    <?php get_template_part( 'template-parts/content', 'sections'); ?>

<?php endwhile; else: ?>

    <h1>Oh no!</h1>
    <p>No content is appearing for this page!</p>

<?php endif; ?>

<?php get_footer(); ?>
