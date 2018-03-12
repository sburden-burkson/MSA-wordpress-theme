<?php
/**
 * Template Name: Dealer Locator Template
 */
?>

<?php get_header(); ?>

<!-- Page Content -->
<div class="main-content fullpage-content single-full-page" data-with-nav="false" data-fp-paddingtop="60px" id="locator-content">
    <div class="section">

        <div class="container k-full-width k-full-height">
            <div id="locator-search-top">
                <form class="wps-locator-search-wrap" autocomplete="off">
                    <div class="wps-input-group">
                        <span class="wps-input-group-addon"><img src="http://54.215.177.217/kinesis_wp/wp-content/plugins/wps-locator/frontend/icons/search.svg"></span>
                        <input type="text" class="wps-form-control" autocomplete="off" placeholder="ENTER ZIP" name="location" aria-label="Seach Location">
                        <a href="javascript:void(0);" class="wps-input-group-addon wps-use-location-btn"><i class="wps-use-location-icon"></i></a>
                    </div>
                </form>
            </div>
            <div class="row k-full-height" id="locator-row">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                  <?php // the_content(); ?>
                <div class="col-sm-8">
                    <?php the_field('dealer_map'); ?>
                </div>
                <div class="col-sm-4 text-center section-light locator-scroll">
                    <div class="k-table k-full-height">
                                <?php the_field('dealer_list'); ?>
                    </div>
                </div>
                <?php endwhile; else: ?>

                    <h1>Oh no!</h1>
                    <p>No content is appearing for this page!</p>

                <?php endif; ?>
            </div><!-- /.row -->
        </div>

    </div>
</div>
<!-- /.container -->

<?php get_footer(); ?>
