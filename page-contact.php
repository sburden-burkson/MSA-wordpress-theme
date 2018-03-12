<?php
/**
 * Contact Page Template
 *
 * INCLUDE these definitions in wp-config.php to avoid styling conflicts:
 * define('WPCF7_LOAD_CSS', false);
 * define( 'WPCF7_AUTOP', false );
 */
?>

<?php get_header(); ?>

<!-- Page Content -->
<div class="main-content fullpage-content single-full-page" data-with-nav="false" data-fp-paddingtop="60px" id="contact-content">
    <div class="section">
        <div class="container k-full-width k-full-height">
            <div class="row k-full-height">
                <div class="col-sm-6 hidden-xs covered-bg" style="background-image: url(<?php the_post_thumbnail_url( 'full' ); ?>);">
                </div>
                <div class="col-sm-6 text-center section-light">
                    <div class="k-table k-full-height">
                        <div class="k-table-cell">
                            <div class="section-info-wrap top-center-redline section-info-wider">

                                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                                  <?php the_content(); ?>

                                <?php endwhile; else: ?>

                                  <h1>Oh no!</h1>
                                  No content is appearing for this page!

                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.row -->
        </div>
    </div>
</div>
<!-- /.container -->

<?php get_footer(); ?>
