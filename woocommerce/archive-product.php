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

<?php
    if(is_product_category('wheels')){
        $headerPhoto = 'uploads/2018/03/wheels-header.jpg';
    }else if(is_product_category('accessories')){
        $headerPhoto = 'uploads/2018/03/install-bg.jpg';
    }else{
        $headerPhoto = 'uploads/2018/03/wheels-header.jpg';
    }
?>

<div class="section dark-bg texture-section" id="top-section-sm" style="background-image: url('<?= content_url($headerPhoto); ?>');">
    <div class="texture-top" style="background-image: url('<?= content_url('uploads/2018/03/top-gradient.png'); ?>');"></div>
    <div class="container-fluid">
      <div class="section-info-wrap text-center">
        <h4 class="fw-300">COLLECTION</h4>
        <h1 class="fw-300 text-uppercase"><?php woocommerce_page_title(); ?></h1>
        <div class="down-arrows">
          <a href="#" class="trans-white-md">
            <img src="<?= content_url('uploads/2018/03/chevron-white.png'); ?>" alt="">
          </a>
        </div>
      </div>
    </div>
    <div class="texture-bottom" style="background-image: url('<?= content_url('uploads/2018/03/texture-wheels-collection-1.png'); ?>');"></div>
</div>

<!-- Filter Modals -->
<?php
    // Get current page URL
    global $wp;
    $current_url = home_url( $wp->request );
?>
<div id="wheel-filter-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <div class="modal-close">
            <a href="#" data-dismiss="modal"><img src="<?= content_url('uploads/2018/03/close.png'); ?>"></a>
          </div>
          <h4 class="modal-title">FILTER</h4>
        </div>
        <div class="modal-body">
          <?php if(is_product_category('wheels')){
                    if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('shop-filters') ) :
                    endif;
                } ?>
        </div>
        <div class="modal-footer">
          <a href="<?= $current_url ?>" class="btn text-uppercase pad-top wp-btn-white wp-btn-no-icon">CLEAR</a>
          <div id="wheel_filter_apply" class="btn wp-btn-extra-long text-uppercase wp-btn-red pad-top">APPLY <i class="fal fa-long-arrow-right fa-lg"></i></div>
        </div>
      </div>
    </div>
</div>
<div id="vehicle-filter-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <div class="modal-close">
            <a href="#" data-dismiss="modal"><img src="<?= content_url('uploads/2018/03/close.png'); ?>"></a>
          </div>
          <h4 class="modal-title modal-title-center">ENTER YOUR VEHICLE TO SEE WHEELS THAT FIT</h4>
        </div>
        <div class="modal-body">
          <label for="vehicle-filter-year" class="select-wrapper centered pad-bottom">
              <select id="vehicle-filter-year" class="form-control border-bottom">
                <option>year</option>  
              </select>
          </label>
          <label for="vehicle-filter-make" class="select-wrapper centered pad-bottom">
              <select id="vehicle-filter-make" class="form-control border-bottom">
                <option>make</option>  
              </select>
          </label>
          <label for="vehicle-filter-model" class="select-wrapper centered pad-bottom">
              <select id="vehicle-filter-model" class="form-control border-bottom">
                <option>model</option>  
              </select>
          </label>
        </div>
        <div class="modal-footer">
          <a href="<?= $current_url ?>" class="btn text-uppercase pad-top wp-btn-white wp-btn-no-icon">CLEAR</a>
          <div id="vehicle_filter_apply" class="btn wp-btn-extra-long text-uppercase wp-btn-red pad-top">APPLY <i class="fal fa-long-arrow-right fa-lg"></i></div>
        </div>
      </div>
    </div>
</div>
<!-- /modals -->

<?php
    /* GET RESULTS COUNT */
    $resultsCount = wc_get_loop_prop( 'total' );
?>

<div class="section collection-wrapper container-fluid" style="background-image: url('<?= content_url('uploads/2018/03/dirt-wheels-collection-1.png'); ?>');">
  <div class="collection-item-container" style="">

    <div class="filter-container2" style="">
      <div class="row">
        <div class="col-xs-7">
          <?php if(is_product_category('wheels')){ ?>
          <h5 class="">FILTER BY:
          <a href="#" data-toggle="modal" data-target="#vehicle-filter-modal">VEHICLE
            <i class="fal fa-plus fa-sm"></i>
          </a>
          <a href="#" data-toggle="modal" data-target="#wheel-filter-modal">WHEEL SPECS
            <i class="fal fa-plus fa-sm"></i>
          </a>
          <?php } ?>
      </h5>
        </div>
        <div class="col-xs-5">
          <h5 class="text-right" style=""><?= $resultsCount ?> RESULT<?= ($resultsCount > 1)? 'S' : '' ?></h5>
        </div>
      </div>
    </div>
          

<?php

if ( have_posts() ) {
    /* Added to get post ID for meta values */
    global $post;

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked wc_print_notices - 10 (DO WE NEED THIS??)
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	//do_action( 'woocommerce_before_shop_loop' );

	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) { ?>
      
        <ul class="products">
      <?php  
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 *
			 * @hooked WC_Structured_Data::generate_product_data() - 10
			 */
			do_action( 'woocommerce_shop_loop' );

			//wc_get_template_part( 'content', 'product' );
            
            /* Get the product object */
            global $product;
            //print_r($product);
            
            // Is "NEW"
            $isNewMeta = get_post_meta($post->ID, 'is_new', true);
            $isNew = ( in_array($isNewMeta, array('true','True',true,'1',1), true ) )? true : false;
            
            // Photo
            $thumbnailURL = get_the_post_thumbnail_url();
            
            // Sizes, etc
            if(is_product_category('wheels')){
                $details = str_replace(' | ', ', ', $product->get_attribute( 'Wheel Size' ));
            }else if(is_product_category('accessories')){
                $details = $product->get_price_html();
            }else{
                $details = strip_tags(wc_price($product->get_price()));
            }
            ?>
          
            <li class="collection-item">
                <div class="row">
                    <div class="col-xs-6 col-sm-12 collection-col">
                      <div class="collection-img-wrap">
                        <a href="<?php echo esc_url( get_permalink() ); ?>"><img src="<?= $thumbnailURL ?>" alt=""></a>
                      </div>
                    </div>
                    <div class="col-xs-6 col-sm-12 collection-col">
                      <div class="collection-info-wrap">
                        <div class="new-collection">
                            <?php if($isNew) { ?><span class="new-box">NEW</span><?php } ?>
                        </div>
                        <h5 class="collectionHeight"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title() ?></a></h5>
                        <p class="collection-sizes"><?= $details ?>
                          <span class="product-link">
                            <a href="<?php echo esc_url( get_permalink() ); ?>">
                              <i class="fal fa-long-arrow-right fa-lg"></i>
                            </a>
                          </span>
                        </p>
                      </div>
                    </div>
                </div>
            </li>

        <?php } ?>
        </ul>      
        <?php
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
	//do_action( 'woocommerce_no_products_found' );
    ?>
    <div class="no-product-found clearfix">
        <h5 class="pad-top-lg pad-bottom-lg text-center grey">No products were found matching your selection.</h5>
    </div>
    <?php
} ?>
          
      </div>
      <div class="down-arrows center pad-top-bottom">
        <a href="#" class="trans-white-md">
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
        <p class="pad-top-bottom"><a href="#" class="btn wp-btn-extra-long text-uppercase wp-btn-red">DETAILS <i class="fal fa-long-arrow-right fa-lg"></i></a></p>
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

    <p class="text-center pad-top-bottom"><a href="#" class="btn wp-btn-extra-long text-uppercase wp-btn-red">VIEW <i class="fal fa-long-arrow-right fa-lg"></i></a></p>
  </div>

</div>
<!--/ INSTA -->


<script type="application/javascript">
    
    // COLOR VALUES
    <?php
        // Get color values for JS
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
    ?>
    var colorVals = JSON.parse('<?= json_encode($colorVals) ?>');
    
    // PAGE URL INFO
    var pageURL = '<?= $current_url ?>';
    var queryString = '<?= $_SERVER['QUERY_STRING'] ?>';
    
</script>
          
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
