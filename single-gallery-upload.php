<?php
/**
 * Gallery Upload Page using the Featured Image from the Gallery Image post titled "Upload"
 *
 *
 */
?>
<?php acf_form_head(); ?>
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
                                <p class="section-header text-uppercase sh-smaller">SHARE YOUR IMAGE</p>
                                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                                    <div class="full-width-form">
                                        <?php
                                            acf_form(array(
                                    					'post_id'		=> 'new_post',
                                                      'updated_message' => __('Thank you for uploading your image to our gallery'),
                                    					'new_post'		=> array(
                                    						'post_type'		=> 'gallery',
                                    						'post_status'	=> 'pending',
                                                          'post_title'    => 'user-upload-' . time(),
                                    					),
                                    					'submit_value'		=> 'Upload to Gallery',
                                                      'html_submit_button'	=> '<input type="submit" class="btn k-btn-transparent k-btn-extra-long text-uppercase k-btn-red" value="%s" />',
                                    				));
                                        ?>
                                    </div>
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
