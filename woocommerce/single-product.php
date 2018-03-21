<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$product = new WC_Product(get_the_ID());

// Gallery photos
$galleryImages = $product->get_gallery_image_ids();

// Add Featured Image
array_unshift($galleryImages, $product->get_image_id());

// Get color values for attribute color swatches
$colorVals = [];
$productAttributes = wc_get_attribute_taxonomies();
foreach($productAttributes as $attr){
    $colorVals[$attr->attribute_name] = [];
    foreach(get_terms('pa_'.$attr->attribute_name) as $term){
        $term_meta = get_term_meta($term->term_id);
        if(isset($term_meta['swatch_color'])){
            $colorVals[$attr->attribute_name][$term->slug] = $term_meta['swatch_color'][0];
        }
    }
}

get_header( 'shop' ); ?>

<!--
PLOKI

// COLOR VALS

<?php print_r($colorVals); ?>

-->

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		//do_action( 'woocommerce_before_main_content' );
	?>

		<?php while ( have_posts() ) : the_post(); ?>

                // Add Featured Image
                if($product->get_image_id()){
                    array_unshift($galleryImages, $product->get_image_id());
                }

                // Cart data
                global $woocommerce;
                $wc_cart_items = $woocommerce->cart->get_cart();
                $wc_notices = wc_get_notices();

            ?>
            
            <!--
            PLOKI

                // NOTICES
                <?php print_r($wc_notices); ?>

                // CART COUNT
                <?php print_r(count($wc_cart_items)); ?>

            -->

			<?php //wc_get_template_part( 'content', 'single-product' ); ?>

            <div class="container-fluid no-banner">
                <div class="row product-pairing-wrapper product-wrapper">
                    
                  <?php
                    // PRINT NOTICES

                        $all_notices  = WC()->session->get( 'wc_notices', array() );
                        $notice_types = apply_filters( 'woocommerce_notice_types', array( 'error', 'success', 'notice' ) );

                        foreach ( $notice_types as $notice_type ) {
                            if ( wc_notice_count( $notice_type ) > 0 ) {
                                wc_get_template( "notices/{$notice_type}.php", array(
                                    'messages' => array_filter( $all_notices[ $notice_type ] ),
                                ) );
                            }
                        }

                        wc_clear_notices();
                    ?>
                    
                  <p class="product-pairing" style="display: none;"><a href="#">ADD A TIRE PAIRING <span><i class="fal fa-plus"></i></span></a></p>
                  <div class="col-sm-5 col-sm-push-5 col-md-6 col-md-push-5 col-lg-7 col-lg-push-4">
                    <div class="product-image-height" id="product-image-carousel">
                        <?php foreach( $galleryImages as $attachment_id ) { ?>
                            <img src="<?= wp_get_attachment_url( $attachment_id ) ?>" alt="">
                        <?php } ?>
                    </div>
                  </div>

                  <div class="col-sm-5 col-sm-pull-5 col-md-5 col-md-pull-6 col-lg-4 col-lg-pull-7">
                    <div class="product-options">
                      <h3 class="no-margin-top-desktop">M25 BANDIT</h3>
                                <div class="container-fluid product-tabs">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <div class="product-tabs-option">
                                                <a href="#configure" class="productTabsHeight text-uppercase active" data-toggle="tab">Configure</a>
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class="product-tabs-option text-center">
                                                <a href="#description" class="productTabsHeight text-uppercase" data-toggle="tab">Description</a>
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class="product-tabs-option text-right">
                                                <a href="#specs" class="productTabsHeight active-skip text-uppercase">Specs</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="configure">
                                        <div class="product-customization">
                                            <div class="p-size border-bottom">
                                                <span class="product-customization-label">Size:</span>
                                                <a href="#">17</a>
                                                <a href="#">16</a>
                                                <a href="#">15</a>
                                                <a href="#">14</a>
                                            </div>
                                            <div class="p-finish border-bottom">
                                                <span class="product-customization-label">Finish:</span>
                                                <a href="#"><i class="myCircle"></i></a>
                                                <a href="#"><i class="myCircle"></i></a>
                                                <a href="#"><i class="myCircle"></i></a>
                                                <a href="#"><i class="myCircle"></i></a>
                                            </div>
                                            <div class="p-custom">
                                                <a href="#">Additional Customizations
                                            <span><i class="fal fa-plus"></i></span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="description">
                                        <p class="pad-top"><?php the_content(); ?></p>
                                    </div>
                                </div>
                      <h5 class="pad-top-sm pad-bottom-sm h-grey">BASE MODEL: $2000</h5>
                      <p class=""><a href="#" class="btn wp-btn-extra-long text-uppercase wp-btn-red" data-sidenav="sidenav-cart">ADD TO CART <i class="fal fa-long-arrow-right fa-lg pin-right" aria-hidden="true"></i></a></p>
                    </div>
                  </div>


                  <div id="product-thumbs-outer" class="col-sm-2 col-md-1 hidden-xs">
                    <div id="product-thumbs-wrapper">
                        <div class="product-image-height product-thumbs-table">
                            <div class="product-thumbs-cell">
                                <div id="product-thumbs">
                                    <?php foreach( $galleryImages as $attachment_id ) { ?>
                                        <div class="product-thumb"><img class="img-responsive" src="<?= wp_get_attachment_url( $attachment_id ) ?>" alt=""></div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>

                </div>
              </div>

                <!-- 3 split photos -->
              <div class="container-fluid row-section texture-section">
                <div class="texture-top" style="background-image: url('<?= content_url('uploads/2018/03/texture-home-2.png'); ?>');"></div>
                <div class="row">
                  <div class="col-sm-4 dark-bg v-center-section-lg scroll-effect" style="background-image: url('<?= content_url('uploads/2018/03/blue-truck.jpg'); ?>');"></div>
                  <div class="col-sm-4 dark-bg v-center-section-lg scroll-effect" style="background-image: url('<?= content_url('uploads/2018/03/blue-truck.jpg'); ?>');"></div>
                  <div class="col-sm-4 dark-bg v-center-section-lg scroll-effect" style="background-image: url('<?= content_url('uploads/2018/03/blue-truck.jpg'); ?>');"></div>
                </div>
                <div class="texture-bottom" style="background-image: url('<?= content_url('uploads/2018/03/texture-home-3.png'); ?>');"></div>
                </div>
                <!-- /3 split photos -->

                <div class="container product-specs-wrapper">
                    <div id="specs" class="product-specs">
                        <div class="product-specs-title">
                            <h3 class="text-center pad-bottom">SPECS</h3>
                        </div>
                        <!-- product-specs-carousel -->
                        <div id="product-specs-carousel" class="clearfix">
                            <div class="product-specs-carousel-slide">
                                <div class="product-specs-carousel-head">
                                    <h5 class="h-grey text-uppercase">Part#</h5>
                                </div>
                                <div class="product-specs-carousel-row">
                                    M36-018756M
                                </div>
                                <div class="product-specs-carousel-row">
                                    M36-018756M
                                </div>
                                <div class="product-specs-carousel-row">
                                    M36-018756M
                                </div>
                                <div class="product-specs-carousel-row">
                                    M36-018756M
                                </div>
                            </div>
                            <div class="product-specs-carousel-slide">
                                <div class="product-specs-carousel-head">
                                    <h5 class="h-grey text-uppercase">Finish</h5>
                                </div>
                                <div class="product-specs-carousel-row">
                                    Matte Black
                                </div>
                                <div class="product-specs-carousel-row">
                                    Matte Black
                                </div>
                                <div class="product-specs-carousel-row">
                                    Matte Black
                                </div>
                                <div class="product-specs-carousel-row">
                                    Matte Black
                                </div>
                            </div>
                            <div class="product-specs-carousel-slide">
                                <div class="product-specs-carousel-head">
                                    <h5 class="h-grey text-uppercase">Size</h5>
                                </div>
                                <div class="product-specs-carousel-row">
                                    18x7
                                </div>
                                <div class="product-specs-carousel-row">
                                    18x7
                                </div>
                                <div class="product-specs-carousel-row">
                                    18x7
                                </div>
                                <div class="product-specs-carousel-row">
                                    18x7
                                </div>
                            </div>
                            <div class="product-specs-carousel-slide">
                                <div class="product-specs-carousel-head">
                                    <h5 class="h-grey text-uppercase">Offset</h5>
                                </div>
                                <div class="product-specs-carousel-row">
                                    +0mm
                                </div>
                                <div class="product-specs-carousel-row">
                                    +0mm
                                </div>
                                <div class="product-specs-carousel-row">
                                    +0mm
                                </div>
                                <div class="product-specs-carousel-row">
                                    +0mm
                                </div>
                            </div>
                            <div class="product-specs-carousel-slide">
                                <div class="product-specs-carousel-head">
                                    <h5 class="h-grey text-uppercase">Backspace</h5>
                                </div>
                                <div class="product-specs-carousel-row">
                                    4+3
                                </div>
                                <div class="product-specs-carousel-row">
                                    4+3
                                </div>
                                <div class="product-specs-carousel-row">
                                    4+3
                                </div>
                                <div class="product-specs-carousel-row">
                                    4+3
                                </div>
                            </div>
                            <div class="product-specs-carousel-slide">
                                <div class="product-specs-carousel-head">
                                    <h5 class="h-grey text-uppercase">Bolt Pat.</h5>
                                </div>
                                <div class="product-specs-carousel-row">
                                    4x110
                                </div>
                                <div class="product-specs-carousel-row">
                                    4x110
                                </div>
                                <div class="product-specs-carousel-row">
                                    4x110
                                </div>
                                <div class="product-specs-carousel-row">
                                    4x110
                                </div>
                            </div>
                            <div class="product-specs-carousel-slide">
                                <div class="product-specs-carousel-head">
                                    <h5 class="h-grey text-uppercase">Load</h5>
                                </div>
                                <div class="product-specs-carousel-row">
                                    1250lbs
                                </div>
                                <div class="product-specs-carousel-row">
                                    1250lbs
                                </div>
                                <div class="product-specs-carousel-row">
                                    1250lbs
                                </div>
                                <div class="product-specs-carousel-row">
                                    1250lbs
                                </div>
                            </div>
                            <div class="product-specs-carousel-slide">
                                <div class="product-specs-carousel-head">
                                    <h5 class="h-grey text-uppercase">Weight</h5>
                                </div>
                                <div class="product-specs-carousel-row">
                                    13.9lbs
                                </div>
                                <div class="product-specs-carousel-row">
                                    13.9lbs
                                </div>
                                <div class="product-specs-carousel-row">
                                    13.9lbs
                                </div>
                                <div class="product-specs-carousel-row">
                                    13.9lbs
                                </div>
                            </div>
                        </div>
                        <!-- /product-specs-carousel -->
                    </div>
                </div>


              <div class="dark-bg bg-top texture-section" style="background-image: url('<?= content_url('uploads/2018/03/blog-header.png'); ?>');">
                    <div class="texture-top" style="background-image: url('<?= content_url('uploads/2018/03/texture-home-2.png'); ?>');"></div>
                <div class="container-fluid v-center-section-xl dark-overlay">
                  <div class="section-info-wrap">
                    <h2 class="text-center pad-bottom">1 YEAR WARRANTY</h2>
                    <p class="text-center"><a href="#" class="btn wp-btn-extra-long text-uppercase wp-btn-red">DETAILS<i class="fal fa-long-arrow-right fa-lg pin-right" aria-hidden="true"></i></a></p>
                  </div>
                </div>
                    <div class="texture-bottom" style="background-image: url('<?= content_url('uploads/2018/03/texture-home-3.png'); ?>');"></div>
              </div>
              <div class="light-bg v-center-section-xl bg-top" style="background-image: url('<?= content_url('uploads/2018/03/quad-layer.png'); ?>');">
                <div class="container">
                  <div class="section-info-wrap restricted-width spaced-section spaced-section-xtra">
                    <h4 class="text-center">take the path less</h4>
                    <h4 class="text-center">travelled lorem</h4>
                    <h4 class="text-center">ipsum dolor</h4>
                  </div>
                </div>
              </div>
              <div class="dark-bg v-center-section-lg texture-section" style="background-image: url('<?= content_url('uploads/2018/03/wheels-ad-bg.jpg'); ?>');">
                    <div class="texture-top" style="background-image: url('<?= content_url('uploads/2018/03/texture-home-2.png'); ?>');"></div>
                <div class="container">
                  <div class="section-info-wrap spaced-section">
                    <h2 class="text-center pad-bottom">NEED WHEELS?</h2>
                    <p class="text-center"><a href="#" class="btn wp-btn-extra-long text-uppercase wp-btn-red">BROWSE<i class="fal fa-long-arrow-right fa-lg pin-right" aria-hidden="true"></i></a></p>
                  </div>
                </div>
                    <div class="texture-bottom" style="background-image: url('<?= content_url('uploads/2018/03/texture-home-3.png'); ?>');"></div>
              </div>
              <div class="light-bg v-center-section p-similar" style="background-image: url('<?= content_url('uploads/2018/03/dirt-wheels-collection-1.png'); ?>');">
                <div class="container">
                        <h3 class="text-center pad-bottom-md">YOU MIGHT LIKE</h3>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="row">
                        <div class="col-xs-6">
                          <div class="center text-center">
                            <a href="#">
                            <img src="<?= content_url('uploads/2018/03/rim-1.png'); ?>" alt="" class="img-responsive">
                            <h4>M35</h4>
                            <p>Lorem ipsum dolor sit</p>
                          </a>
                          </div>
                        </div>
                        <div class="col-xs-6">
                          <div class="center text-center">
                            <a href="#">
                            <img src="<?= content_url('uploads/2018/03/rim-1.png'); ?>" alt="" class="img-responsive">
                            <h4>M35</h4>
                            <p>Lorem ipsum dolor sit</p>
                          </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="row">
                        <div class="col-xs-6">
                          <div class="center text-center">
                            <a href="#">
                          <img src="<?= content_url('uploads/2018/03/rim-1.png'); ?>" alt="" class="img-responsive">
                          <h4>M35</h4>
                          <p>Lorem ipsum dolor sit</p>
                        </a>
                          </div>
                        </div>
                        <div class="col-xs-6">
                          <div class="center text-center">
                            <a href="#">
                          <img src="<?= content_url('uploads/2018/03/rim-1.png'); ?>" alt="" class="img-responsive">
                          <h4>M35</h4>
                          <p>Lorem ipsum dolor sit</p>
                        </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		//do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		//do_action( 'woocommerce_sidebar' );
	?>

<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
