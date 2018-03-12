<?php
/**
 * The template for displaying 404 pages (not found).
 */
get_header();
?>

<!-- Page Content -->
    <div class="main-content fullpage-content" data-with-nav="false" data-fp-atw="true" data-fp-paddingtop="60px" id="404-content">
        <div class="section">
            <div class="container k-full-width k-full-height">
                <div class="row k-full-height">
                    <div class="col-lg-12 text-center section-dark covered-bg k-full-height" style="background-image: url(<?php echo esc_url( home_url( '/wp-content/uploads/2017/10/Kinesis_KN304_ATL_TN08.jpg' ) ); ?>);">
                        <div class="k-table k-full-height">
                            <div class="k-table-row">
                                <div class="k-table-cell k-top k-with-padding">
                                    <div class="section-info-wrap">
                                        <h1 class="section-header">¡ 404 !</h1>
                                        <p class="section-sub-header ssh-xl-thin text-uppercase">No Wheels Here</p>
                                    </div>
                                </div>
                            </div>
                            <div class="k-table-row">
                                <div class="k-table-cell k-bottom k-with-padding">
                                    <div class="section-info-wrap">
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn k-btn-transparent k-btn-extra-long text-uppercase k-btn-red">Return Home</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </div>
    </div>
    <!-- /.container -->

<?php get_footer(); ?>
