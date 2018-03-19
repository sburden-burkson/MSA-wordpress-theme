<?php
/**
 * Show messages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/notices/success.php.
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

if ( ! $messages ) {
	return;
}

$foundAddedToCart = false;
?>

<?php foreach ( $messages as $message ) {
        $addToCartArr = explode('::', $message);
        if(count($addToCartArr) == 4){
            $product_id = $addToCartArr[1];
            $variation_id = apply_filters( 'woo_added_variation_id', '' );
            $_qty = $addToCartArr[2];
            $_product = wc_get_product( $product_id );
            
            $orig_message = $addToCartArr[3];
        } ?>
    <?php if ($_product && $_product->exists() && !$foundAddedToCart) {
            $foundAddedToCart = true; ?>
        <!-- SIDENAV ADDED TO CART -->
        <div id="sidenav-added-to-cart" class="sidenav auto-show">
            <div class="sidenav-inner">
                <div class="sidenav-left hidden-xs hidden-sm col-md-6 col-lg-8" data-sidenav="sidenav-added-to-cart"></div>
                <div class="sidenav-right col-sm-12 col-md-6 col-lg-4">
                    <div class="sidenav-right-inner">
                        <h3 class="h-light text-center pad-bottom">ADDED TO CART</h3>
                        <hr>
                        <div class="container-fluid">
                            <?php
                                // Cart data
                                $_cart = WC()->cart->get_cart();
                                // Find product in cart based on variation_id
                                foreach($_cart as $_cart_item_key => $_cart_item){
                                    if($_cart_item['product_id'] == $product_id && $_cart_item['variation_id'] == $variation_id){ // Probably just need variation_id here
                                        $cart_item_key = $_cart_item_key;
                                        $cart_item = $_cart_item;
                                    }
                                }
            
                                // Product data
                                $_product          = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                $product_id        = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
                                $product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
                                $thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                                $product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                                $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                            ?>
                            
                            <div class="cart-item row pad-top text-center-mobile">
                                <div class="col-sm-4 cart-item-left no-pad-left">
                                    <?= str_replace( array( 'http:', 'https:' ), '', $thumbnail ) ?>
                                </div>
                                <div class="col-sm-8 cart-item-right no-pad-left no-pad-right">
                                    <h5 class="no-margin-bottom"><?= $product_name ?></h5>
                                    <div class="sidenav-cart-total-price h-grey pad-bottom-sm"><?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ), $cart_item, $cart_item_key ); ?></div>
                                    <div class="cart-item-variation">
                                        <?= wc_get_formatted_cart_item_data( $cart_item ) ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                            // Install kit check
                            $terms = wp_get_post_terms( $product_id, 'product_cat' );
                            foreach ( $terms as $term ) $categories[] = $term->slug;
                            if(in_array( 'wheels', $categories )){ ?>
                                <div class="row"><hr></div>
                                <div class="install-kit-warning row no-gutter">
                                    <div class="col-sm-1 text-center-mobile"><i class="fal fa-exclamation-triangle"></i></div>
                                    <div class="col-sm-9 text-center-mobile">You'll need an install kit for these.</div>
                                    <div class="col-sm-2 text-right text-center-mobile"><a href="#">ADD</a></div>
                                </div>
                            <?php } ?>
                        </div>
                        <hr>
                        <div class="text-center pad-top">
                            <div>Cart Subtotal: <span><?= WC()->cart->get_cart_subtotal() ?></span></div>
                            <a href="<?= get_permalink( wc_get_page_id( 'cart' ) ) ?>" class="btn wp-btn-extra-long text-uppercase wp-btn-red">VIEW CART <i class="fal fa-long-arrow-right fa-lg pin-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <div class="toggle-wrapper">
                    <button type="button" class="navbar-toggle side-nav-close" data-sidenav="sidenav-added-to-cart">
                        <span class="sr-only">Toggle navigation</span>
                        <div class="close-icon"></div>
                    </button>
                </div>
            </div>
        </div>
        <!-- /SIDENAV ADDED TO CART -->
    <?php } else { ?>
        <div class="woocommerce-message" role="alert"><?php echo wp_kses_post( ($_product)? $orig_message : $message ); ?></div>
    <?php } ?>
	
<?php } ?>

