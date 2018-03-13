<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
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
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
//do_action( 'woocommerce_before_main_content' );

?>
<?php /*
<header class="woocommerce-products-header">
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
	<?php endif; ?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 *\/
	//do_action( 'woocommerce_archive_description' );
	?>
</header>
*/ ?>

<div class="section dark-bg texture-section" id="top-section-sm" style="background-image: url('<?= content_url('uploads/2018/03/install-bg.jpg'); ?>');">
    <div class="texture-top" style="background-image: url('<?= content_url('uploads/2018/03/top-gradient.png'); ?>');"></div>
    <div class="container-fluid">
      <div class="section-info-wrap text-center">
        <h4 class="fw-300">COLLECTION</h4>
        <h1 class="fw-300 text-uppercase"><?php woocommerce_page_title(); ?></h1>
        <div class="down-arrows">
          <a href="javascript:void(0)" class="trans-white-md">
            <img src="<?= content_url('uploads/2018/03/chevron-white.png'); ?>" alt="">
          </a>
        </div>
      </div>
    </div>
    <div class="texture-bottom" style="background-image: url('<?= content_url('uploads/2018/03/texture-wheels-collection-1.png'); ?>');"></div>
</div>

<!-- Filter Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <div class="text-right modal-close">
            <a href="javascript:void(0)" data-dismiss="modal"><img src="<?= content_url('uploads/2018/03/x-icon.png'); ?>" alt="" style="width: 35px;"></a>
          </div>
          <h4 class="modal-title">FILTER</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
          <p>Some text in the modal.</p>
          <p>Some text in the modal.</p>
          <p>Some text in the modal.</p>
          <p>Some text in the modal.</p>
          <p>Some text in the modal.</p>
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <a href="javascript:void(0)" class="btn text-uppercase pad-top wp-btn-white wp-btn-no-icon">CLEAR</a>
          <a href="javascript:void(0)" class="btn wp-btn-extra-long text-uppercase wp-btn-red pad-top">APPLY <i class="fal fa-long-arrow-right fa-lg"></i></a>
        </div>
      </div>
    </div>
</div>
<!-- /modal -->


<div class="section collection-wrapper container-fluid" style="background-image: url('<?= content_url('uploads/2018/03/dirt-wheels-collection-1.png'); ?>');">
      <div class="collection-item-container" style="">
          
        <div class="filter-container2" style="">
          <div class="row">
            <div class="col-xs-7">
              <h5 class="">FILTER BY:
              <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal">VEHICLE
                <i class="fal fa-plus fa-sm"></i>
              </a>
              <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal">WHEEL SPECS
                <i class="fal fa-plus fa-sm"></i>
              </a>
          </h5>
            </div>
            <div class="col-xs-5">
              <h5 class="text-right" style="">208 RESULTS</h5>
            </div>
          </div>
        </div>
          

<?php

if ( have_posts() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked wc_print_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );

	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 *
			 * @hooked WC_Structured_Data::generate_product_data() - 10
			 */
			do_action( 'woocommerce_shop_loop' );

			//wc_get_template_part( 'content', 'product' );
            ?>
          
        <div class="collection-item">
            <div class="row">
                <div class="col-xs-6 col-sm-12 collection-col">
                  <div class="collection-img-wrap">
                    <a href="javascript:void(0)"><img src="<?= content_url('uploads/2018/03/rim-1.png'); ?>" alt=""></a>
                  </div>
                </div>
                <div class="col-xs-6 col-sm-12 collection-col">
                  <div class="collection-info-wrap">
                    <div class="new-collection">
                        <span class="new-box">NEW</span>
                    </div>
                    <h5 class="collectionHeight"><a href="javascript:void(0)">M38 CHROME</a></h5>
                    <p class="collection-sizes">Black & Chrome
                      <span>
                        <a href="javascript:void(0)">
                          <i class="fal fa-long-arrow-right fa-lg"></i>
                        </a>
                      </span>
                    </p>
                  </div>
                </div>
            </div>
        </div>
          
          <?php  
		}
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
} ?>
          
      </div>
      <div class="down-arrows center pad-top-bottom">
        <a href="javascript:void(0)" class="trans-white-md">
          <img src="<?= content_url('uploads/2018/03/chevron-grey.png'); ?>" alt="">
        </a>
      </div>
    </div>




  <!-- Warranty  -->
  <div class="dark-bg v-center-section-xl texture-section" style="background-image: url('<?= content_url('uploads/2018/03/warranty-panel.jpg'); ?>');">
    <div class="texture-top" style="background-image: url('<?= content_url('uploads/2018/03/texture-wheels-collection-2.png'); ?>');">
    </div>
    <div class="texture-bottom" style="background-image: url('<?= content_url('uploads/2018/03/texture-home-1.png'); ?>');">
    </div>
    <div class="container">
      <div class="section-info-wrap text-center">
        <h2 class="">1 YEAR WARRANTY</h2>
        <p class="pad-top-bottom"><a href="javascript:void(0)" class="btn wp-btn-extra-long text-uppercase wp-btn-red">DETAILS <i class="fal fa-long-arrow-right fa-lg"></i></a></p>
      </div>
    </div>
  </div>
<!-- /Warranty  -->

<!-- INSTA -->

<div class="section instagram-section">
  <div class="container">
    <h3 class="text-center pad-top-bottom">#MSA ON INSTAGRAM</h3>
    <div class="row">

      <div class="col-sm-4 no-padding">
        <img src="<?= content_url('uploads/2018/03/insta.png'); ?>" alt="">
      </div>

      <div class="col-sm-4" style="">
        <div class="row">
          <div class="col-xs-6 no-padding">
            <img src="<?= content_url('uploads/2018/03/insta.png'); ?>" alt="">
            <img src="<?= content_url('uploads/2018/03/insta.png'); ?>" alt="">
          </div>
          <div class="col-xs-6 no-padding">
            <img src="<?= content_url('uploads/2018/03/insta.png'); ?>" alt="">
            <img src="<?= content_url('uploads/2018/03/insta.png'); ?>" alt="">
          </div>
        </div>
      </div>

      <div class="col-sm-4" style="">
        <div class="row">
          <div class="col-xs-6 no-padding">
            <img src="<?= content_url('uploads/2018/03/insta.png'); ?>" alt="">
            <img src="<?= content_url('uploads/2018/03/insta.png'); ?>" alt="">
          </div>
          <div class="col-xs-6 no-padding">
            <img src="<?= content_url('uploads/2018/03/insta.png'); ?>" alt="">
            <img src="<?= content_url('uploads/2018/03/insta.png'); ?>" alt="">
          </div>
        </div>
      </div>

    </div>

    <p class="text-center pad-top-bottom"><a href="javascript:void(0)" class="btn wp-btn-extra-long text-uppercase wp-btn-red">VIEW <i class="fal fa-long-arrow-right fa-lg"></i></a></p>
  </div>

</div>
<!--/ INSTA -->
          
<?php

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
//do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
//do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );
