<?php

/**
 * Register Custom Navigation Walkers
 */
require_once('inc/wp-bootstrap-navwalker.php');
//require_once('inc/sidenav-navwalker.php');
require_once('inc/footer-navwalker.php');

/**
 * Add theme support for customizing
 */
add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-logo' );
add_theme_support( 'title-tag' );
add_theme_support( 'customize-selective-refresh-widgets' );

/**
 * Disable Wordpress from adding empty paragraph tags
 */
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

/**
 * Enable shortcodes in text widgets
 */
add_filter('widget_text','do_shortcode');

/**
 * Enqueue styles
 */
function msawheels_theme_styles() {
    wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css' );
    wp_enqueue_style( 'googlefont_css', 'https://fonts.googleapis.com/css?family=Barlow+Condensed:300,400,500|Open+Sans:300' );

    if ( is_archive( 'gallery' ) ) {
        wp_enqueue_style( 'gallery_css', get_template_directory_uri() . '/gallery.css' );
        wp_enqueue_style( 'chosen_css', get_template_directory_uri() . '/inc/chosen/chosen.customized.css' );
    }

    if ( is_page_template( 'page-locator.php' ) ) {
        wp_enqueue_style( 'locator_css', get_template_directory_uri() . '/locator.css' );
    }

    wp_enqueue_style( 'slick_css', get_template_directory_uri() . '/js/slick/slick.css' );
    wp_enqueue_style( 'slick-theme_css', get_template_directory_uri() . '/js/slick/slick-theme.css' );
    wp_enqueue_style( 'fontawesome_css', get_template_directory_uri() . '/css/fontawesome-all.min.css' );
    wp_enqueue_style( 'msa-wheels-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'msawheels_theme_styles' );

/**
 * Enqueue scripts
 */
function msawheels_theme_js() {
    global $wp_scripts;

    wp_register_script( 'html5_shiv', 'https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js', '', '', false );
    wp_register_script( 'respond_js', 'https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js', '', '', false );

    $wp_scripts->add_data( 'html_shiv', 'conditional', 'lt IE 9' );
    $wp_scripts->add_data( 'respond_js', 'conditional', 'lt IE 9' );

    wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true );

    if ( is_archive( 'gallery' ) ) {
        wp_enqueue_script( 'chosen_js', get_template_directory_uri() . '/inc/chosen/chosen.jquery.min.js', array('jquery'), '', true );
    }

    if ( is_archive( 'gallery' ) || is_home() ) {
        wp_enqueue_script( 'masonryimages_js', get_template_directory_uri() . '/inc/masonry/imagesloaded.pkgd.min.js', array('jquery'), '', true );
        wp_enqueue_script( 'masonry_js', get_template_directory_uri() . '/inc/masonry/masonry.pkgd.min.js', array('jquery', 'masonryimages_js'), '', true );
    }

    wp_enqueue_script( 'matchHeight_js', get_template_directory_uri() . '/js/jquery.matchHeight-min.js', '', '', true );

    wp_enqueue_script( 'slick_js', get_template_directory_uri() . '/js/slick/slick.min.js', '', '', true );

    wp_enqueue_script( 'msa_js', get_template_directory_uri() . '/js/msa-min.js', array('jquery', 'matchHeight_js', 'slick_js' ), '', true );

    if ( is_post_type_archive( 'gallery' ) ) {
        wp_enqueue_script( 'gallery_js', get_template_directory_uri() . '/js/gallery.js', array('jquery', 'bootstrap_js', 'msa_js'), '', true );
    }
    if ( is_home() ) {
        wp_enqueue_script( 'blog_js', get_template_directory_uri() . '/js/blog-min.js', array('jquery', 'bootstrap_js', 'msa_js'), '', true );
    }

    if ( is_product() ) {
        wp_enqueue_script( 'product_js', get_template_directory_uri() . '/js/product-min.js', array('jquery'), '', true );
    }
    
    if ( is_product_category() ) {
        wp_enqueue_script( 'collection_js', get_template_directory_uri() . '/js/collection-min.js', array('jquery'), '', true );
    }
    
    if ( is_checkout() ) {
        wp_enqueue_script( 'checkout_js', get_template_directory_uri() . '/js/checkout-min.js', array('jquery'), '', true );
    }

    if ( get_post_type() == 'legacy' || get_post_type() == 'monoblock' ) {
        wp_enqueue_script( 'product_js', get_template_directory_uri() . '/js/product-min.js', array('jquery', 'chosen_js'), '', true );
    }

}
add_action( 'wp_enqueue_scripts', 'msawheels_theme_js' );

/**
 * Register Menus & Widgets
 */
function register_theme_menus() {
    register_nav_menus(
        array(
            'primary' => __( 'Primary Menu' ),
            'sidenav' => __( 'Side Menu' ),
            'footer' => __( 'Footer Menu' )
        )
    );
}
add_action( 'init', 'register_theme_menus');

function msawheels_widgets_init() {
    // register_sidebar( array(
    //   'name'          => __( 'Social Links' ),
    //   'id'            => 'social-links',
    //   'description'   => 'Widget area below sidebar',
    //   'before_widget' => '<div class="side-nav-social row">',
    //   'after_widget'  => '</div>',
    //   'before_title'  => '',
    //   'after_title'   => '',
    // ) );
    
    register_sidebar( array(
       'name'          => __( 'Shop Filters' ),
       'id'            => 'shop-filters',
       'description'   => 'Widget area in "Filter By" modal.',
       'before_widget' => '<div class="shop-filters-widget-area">',
       'after_widget'  => '</div>',
       'before_title'  => '',
       'after_title'   => '',
     ) );
}
add_action( 'widgets_init', 'msawheels_widgets_init' );

/**
 * Custom function to set uploaded gallery image as the featured image
 */
function acf_set_featured_image( $value, $post_id, $field  ) {
    if ($value != '') {
	    //Add the value which is the image ID to the _thumbnail_id meta data for the current post
	    update_post_meta($post_id, '_thumbnail_id', $value);
    }
    return $value;
}
// acf/update_value/name={$field_name} - filter for a specific field based on it's name
add_filter( 'acf/update_value/name=gallery_image', 'acf_set_featured_image', 10, 3 );


/**
 * ACF to REST API Plugin Settings
 */
// Enable the option show in rest
add_filter( 'acf/rest_api/field_settings/show_in_rest', '__return_true' );

// Enable the option edit in rest
add_filter( 'acf/rest_api/field_settings/edit_in_rest', '__return_true' );

// Enable the custom fields filter for gallery posts
add_filter( 'rest_gallery_query', function( $args ) {
  $args['meta_query'] = array();

  if (!empty($_GET['terrain'])) {
    array_push($args['meta_query'], array(
      'key'   => 'terrain',
      'value' => esc_sql( $_GET['terrain'] ),
    ));
  }

  if (!empty($_GET['finish'])) {
    array_push($args['meta_query'], array(
      'key'   => 'finish',
      'value' => esc_sql( $_GET['finish'] ),
    ));
  }

  return $args;
} );


/**
 * Enable Pagination on Gallery Page
 */
// add_action( 'pre_get_posts', function ( $q ) {
//     if ( !is_admin() && $q->is_main_query() && $q->is_post_type_archive( 'gallery' ) ) {
//         $q->set( 'posts_per_page', 2 );
//     }
// });


/**
 * Add Location search
 */

/**
 * Calculates the great-circle distance between two points, with
 * the Vincenty formula.
 * @param float $latitudeFrom Latitude of start point in [deg decimal]
 * @param float $longitudeFrom Longitude of start point in [deg decimal]
 * @param float $latitudeTo Latitude of target point in [deg decimal]
 * @param float $longitudeTo Longitude of target point in [deg decimal]
 * @param float $earthRadius Mean earth radius in [mile]
 * @return float Distance between points in [mile] (same as earthRadius)
 */
function vincentyGreatCircleDistance (
  $latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 3959)
{
  // convert from degrees to radians
  $latFrom = deg2rad($latitudeFrom);
  $lonFrom = deg2rad($longitudeFrom);
  $latTo = deg2rad($latitudeTo);
  $lonTo = deg2rad($longitudeTo);

  $lonDelta = $lonTo - $lonFrom;
  $a = pow(cos($latTo) * sin($lonDelta), 2) +
    pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
  $b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);

  $angle = atan2(sqrt($a), $b);
  return $angle * $earthRadius;
}

/**
 * Validates a given latitude $lat
 *
 * @param float|int|string $lat Latitude
 * @return bool `true` if $lat is valid, `false` if not
 */
function validateLatitude($lat) {
  return preg_match('/^(\+|-)?(?:90(?:(?:\.0{1,6})?)|(?:[0-9]|[1-8][0-9])(?:(?:\.[0-9]{1,32})?))$/', $lat);
}

/**
 * Validates a given longitude $long
 *
 * @param float|int|string $long Longitude
 * @return bool `true` if $long is valid, `false` if not
 */
function validateLongitude($long) {
  return preg_match('/^(\+|-)?(?:180(?:(?:\.0{1,6})?)|(?:[0-9]|[1-9][0-9]|1[0-7][0-9])(?:(?:\.[0-9]{1,32})?))$/', $long);
}

function locations_endpoint_func() {
  $args = array(
      'post_type' => 'locations',
      'posts_per_page' => -1
  );
  $query = new WP_Query($args);
  $posts = $query->posts;

  // Get requested starting lat and lng
  $lat = $_GET['lat'];
  $lng = $_GET['lng'];
  $radius = empty($_GET['radius']) ? 25 : floatval($_GET['radius']);

  if (empty($lat) || empty($lng) || !validateLongitude($lng) || !validateLatitude($lat) || !$radius) {
    return array(
      'error' => 'Missing or invalid parameters.'
    );
  }

  $outPosts = array();

  foreach ($posts as $key => $post) {
    $acfFields = get_fields($post->ID);
    //$posts[$key]->acf = $acfFields;

    $destLat = $acfFields['dealer_lat'];
    $destLng = $acfFields['dealer_lng'];

    $distance = vincentyGreatCircleDistance($lat, $lng, $destLat, $destLng);
    $acfFields['location_distance'] = $distance;
    $acfFields['ID'] = $posts[$key]->ID;
    $acfFields['post_name'] = $posts[$key]->post_name;
    if ($distance <= $radius) {
      array_push($outPosts, $acfFields);
    }
  }

  if ( empty( $outPosts ) ) {
    return array(
      'error' => 'No results returned.'
    );
  }

  return $outPosts;
}

add_action( 'rest_api_init', function () {
  register_rest_route( 'msa/v1', '/locations', array(
    'methods' => 'GET',
    'callback' => 'locations_endpoint_func',
  ));
});

function geo_ip_endpoint_func(){
  $thisIp = $_GET['ip'];
  $userInfo = empty($thisIp) ? geoip_detect2_get_info_from_current_ip() : geoip_detect2_get_info_from_ip($thisIp, $locales = array('en'));
  //$city = $userInfo->city;

  return $userInfo;
}

add_action( 'rest_api_init', function () {
  register_rest_route( 'msa/v1', '/geo-ip', array(
    'methods' => 'GET',
    'callback' => 'geo_ip_endpoint_func',
  ));
});

// WooCommerce support declaration
function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce', array(
		'thumbnail_image_width' => 150,
		'single_image_width'    => 300,

        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 4,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
	) );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

// Display variation's price even if min and max prices are the same
// MIGHT NOT BE NEEDED
add_filter('woocommerce_available_variation', function ($value, $object = null, $variation = null) {
  if ($value['price_html'] == '') {
    $value['price_html'] = '<span class="price">' . $variation->get_price_html() . '</span>';
  }
  return $value;
}, 10, 3);

// Change variation prices to be just the minimum price
add_filter('woocommerce_variable_price_html', 'custom_variation_price', 10, 2);
function custom_variation_price( $price, $product ) {
    //if ( ! empty($product->min_variation_price) ) {
        $price = '<span class="from">' . _x('BASE MODEL: ', 'min_price', 'woocommerce') . ' </span>';
        $price .= woocommerce_price($product->get_price());
    //}

    return $price;
}

// Override WooCommerce attributes html
add_filter( 'woocommerce_dropdown_variation_attribute_options_html', 'override_color_variation_display', 10, 2);
function override_color_variation_display( $html, $args ) {
    $html_orig = $html;
    
    /* Example $html values:
       
         1) <select id="wheel-size" class="" name="attribute_wheel-size" data-attribute_name="attribute_wheel-size" data-show_option_none="yes"><option value="">Choose an option</option><option value="14x7 0mm" >14x7 0mm</option><option value="15x7 0mm" >15x7 0mm</option></select>
         
         2) <select id="bolt-pattern" class="" name="attribute_bolt-pattern" data-attribute_name="attribute_bolt-pattern" data-show_option_none="yes"><option value="">Choose an option</option><option value="4x110" >4x110</option><option value="4x137" >4x137</option><option value="4x156" >4x156</option></select>
         
         3) <select id="ring-color" class="" name="attribute_ring-color" data-attribute_name="attribute_ring-color" data-show_option_none="yes"><option value="">Choose an option</option><option value="Satin Black" >Satin Black</option></select>
    */
    
    $html = str_replace('class="', 'style="display: none;" class="hidden ', $html);
    
    $html .= "\n\n".'<!--'."\n".'==============';
    
    //global $product;
    //$html .= "\n".'$product->ID = '.$product->id."\n";
    
    $html .= "\n".'$html = '.$html_orig."\n";
    $html .= "\n".'$args = '.json_encode($args)."\n";
    
    // Attribute name
    $attrSlug = $args['attribute'];
    $html .= "\n".'$attrSlug = '.$attrSlug."\n";

    // Attribute options
    $options = $args['options'];
    $html .= "\n".'$options = '.json_encode($options)."\n";
    
    // Attribute names
    $attrTerms = get_the_terms( get_the_id(), $attrSlug );
    $options_more = [];
    foreach($options as $attrValue){
        $term_found = false;
        foreach($attrTerms as $currTerm){
            if($currTerm->slug == $attrValue){
                $term_found = true;
                $term_meta = get_term_meta($currTerm->term_id);
                if(isset($term_meta['swatch_color']) && is_array($term_meta['swatch_color']) && count($term_meta['swatch_color']) > 0 && strlen($term_meta['swatch_color'][0]) > 0){
                    $options_more[] = ['name' => $currTerm->name, 'value' => $attrValue, 'swatch_color' => $term_meta['swatch_color'][0]];
                }else{
                    $options_more[] = ['name' => $currTerm->name, 'value' => $attrValue];
                }
            }
        }
        if(!$term_found){
            $options_more[] = ['name' => $attrValue, 'value' => $attrValue];
        }
    }
    $html .= "\n".'$options_more = '.json_encode($options_more)."\n";
    
    $html .= '============== -->'."\n\n";
    
    foreach($options_more as $attr){
        if(isset($attr['swatch_color'])){
            $html .= '<a href="#" class="pa-option pa-color-swatch hover-tooltip-trigger" data-attrslug="'.$attrSlug.'" data-attrvalue="'.$attr['value'].'" data-tooltip="'.$attr['name'].'"><i class="myCircle" style="background-color:'.$attr['swatch_color'].';"></i></a>';
        }else{
            $html .= '<a href="#" class="pa-option" data-attrslug="'.$attrSlug.'" data-attrvalue="'.$attr['value'].'">'.$attr['name'].'</a>';
        }
    }

    return $html;
}


// Render fields at the bottom of variations - does not account for field group order or placement.
add_action( 'woocommerce_product_after_variable_attributes', function( $loop, $variation_data, $variation ) {
    global $abcdefgh_i; // Custom global variable to monitor index
    $abcdefgh_i = $loop;
    // Add filter to update field name
    add_filter( 'acf/prepare_field', 'acf_prepare_field_update_field_name' );
    
    // Loop through all field groups
    $acf_field_groups = acf_get_field_groups();
    foreach( $acf_field_groups as $acf_field_group ) {
        foreach( $acf_field_group['location'] as $group_locations ) {
            foreach( $group_locations as $rule ) {
                // See if field Group has at least one post_type = Variations rule - does not validate other rules
                if( $rule['param'] == 'post_type' && $rule['operator'] == '==' && $rule['value'] == 'product_variation' ) {
                    // Render field Group
                    acf_render_fields( $variation->ID, acf_get_fields( $acf_field_group ) );
                    break 2;
                }
            }
        }
    }
    
    // Remove filter
    remove_filter( 'acf/prepare_field', 'acf_prepare_field_update_field_name' );
}, 10, 3 );

// Filter function to update field names
function  acf_prepare_field_update_field_name( $field ) {
    global $abcdefgh_i;
    $field['name'] = preg_replace( '/^acf\[/', "acf[$abcdefgh_i][", $field['name'] );
    return $field;
}
    
// Save variation data
add_action( 'woocommerce_save_product_variation', function( $variation_id, $i = -1 ) {
    // Update all fields for the current variation
    if ( ! empty( $_POST['acf'] ) && is_array( $_POST['acf'] ) && array_key_exists( $i, $_POST['acf'] ) && is_array( ( $fields = $_POST['acf'][ $i ] ) ) ) {
        foreach ( $fields as $key => $val ) {
            update_field( $key, $val, $variation_id );
        }
    }
}, 10, 2 );


/**
 * Custom Add To Cart Messages HTML
 **/
function filter_wc_add_to_cart_message_html( $message, $products ) {
    $orig_message = $message;
    foreach($products as $product_id => $product_qty){
        $message = 'ADDED_TO_CART::'.$product_id.'::'.$product_qty.'::'.$orig_message;
    }
    return $message;
}
add_filter( 'wc_add_to_cart_message_html', 'filter_wc_add_to_cart_message_html', 10, 2 );
/* /Custom Add To Cart Messages */


/* SET MOST RECENT CART ITEM */
function filter_woocommerce_add_cart_item_data( $cart_item_data, $product_id, $variation_id ) { 
    
    global $woo_added_variation_id;
    $woo_added_variation_id = $variation_id;
    
    return $cart_item_data;
}
add_filter( 'woocommerce_add_cart_item_data', 'filter_woocommerce_add_cart_item_data', 10, 3 );

/* GET MOST RECENT CART ITEM */
add_filter( 'woo_added_variation_id', 'return_added_variation_id' );
function return_added_variation_id( $arg = '' ) {
    global $woo_added_variation_id;
    return $woo_added_variation_id;
}


/**
 * Custom Variable in Cart Item Data
 **/
//Store the custom field
add_filter( 'woocommerce_add_cart_item_data', 'add_cart_item_custom_data_vase', 10, 2 );
function add_cart_item_custom_data_vase( $cart_item_meta, $product_id ) {
  global $woocommerce;
  //$cart_item_meta['test_field'] = $_POST['test_field'];
  $cart_item_meta['install_kit'] = false;
  return $cart_item_meta; 
}

//Get it from the session and add it to the cart variable
function get_cart_items_from_session( $item, $values, $key ) {
    if ( array_key_exists( 'install_kit', $values ) )
        $item[ 'install_kit' ] = $values['install_kit'];
    
    // Not sure if this is better or worse
    //$item[ 'install_kit' ] = (array_key_exists( 'install_kit', $values ))? $values['install_kit'] : false;
    
    return $item;
}
add_filter( 'woocommerce_get_cart_item_from_session', 'get_cart_items_from_session', 1, 3 );
/* /Custom Variable in Cart Item Data */


/* CART LINK / NUM OF ITEMS IN NAV MENU */
add_filter( 'wp_nav_menu_items', 'add_cart_to_primary_nav', 10, 2 );
function add_cart_to_primary_nav ( $items, $args ) {
    
    if ($args->theme_location == 'primary') {
        $items .= '<li id="menu-item-cart" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-cart"><a title="Cart" href="'.get_permalink( wc_get_page_id( 'cart' ) ).'">Cart <span class="nav-cart-box">'.WC()->cart->get_cart_contents_count().'</span></a></li>';
        /* MAKE SURE THIS HTML MATCHES BELOW (woocommerce_header_add_to_cart_fragment) */
    }
    return $items;
}

/* MAKE SURE CART NUMBER UPDATES WITH AJAX CHANGES */
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
function woocommerce_header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;

    ob_start();

    ?>
    <li id="menu-item-cart" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-cart"><a title="Cart" href="<?= get_permalink( wc_get_page_id( 'cart' ) ) ?>">Cart <span class="nav-cart-box"><?= WC()->cart->get_cart_contents_count() ?></span></a></li>
    <?php
        /* MAKE SURE THIS HTML MATCHES ABOVE (add_cart_to_primary_nav) */

    $fragments['li.menu-item-cart'] = ob_get_clean();

    return $fragments;

}


/* ADD PLACEHOLDERS TO INPUTS */
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
function custom_override_checkout_fields( $fields ) {
    foreach($fields as $field_grp => $fields_arr){
        foreach($fields_arr as $field_key => $field_data){
            echo '<!-- $field_data ('.$field_grp.') = ';
            print_r($field_data);
            echo 'PLACEHOLDER = '.$field_data['label'].((isset($field_data['required']) && ($field_data['required'] == true || $field_data['required'] == 1))? ' *' : '' );
            echo '-->';
            if(isset($field_data['label']) && strlen($field_data['label']) > 0) {
                $fields[$field_grp][$field_key]['placeholder'] = $field_data['label'].((isset($field_data['required']) && ($field_data['required'] == true || $field_data['required'] == 1))? ' *' : '' );
            }
        }
    }
    return $fields;
}
add_filter('woocommerce_default_address_fields', 'override_address_fields');
function override_address_fields( $address_fields ) {
    foreach($address_fields as $field_slug => $field_data){
        if(isset($field_data['label']) && strlen($field_data['label']) > 0) {
            $address_fields[$field_slug]['placeholder'] = $field_data['label'].((isset($field_data['required']) && ($field_data['required'] == true || $field_data['required'] == 1))? ' *' : '' );
        }
    }
    return $address_fields;
}
/* /ADD PLACEHOLDERS TO INPUTS */

/**
 * Extend get terms with post type parameter.
 *
 * @global $wpdb
 * @param string $clauses
 * @param string $taxonomy
 * @param array $args
 * @return string
 */
/*
function df_terms_clauses( $clauses, $taxonomy, $args ) {
	if ( isset( $args['post_type'] ) && ! empty( $args['post_type'] ) && $args['fields'] !== 'count' ) {
		global $wpdb;

		$post_types = array();

		if ( is_array( $args['post_type'] ) ) {
			foreach ( $args['post_type'] as $cpt ) {
				$post_types[] = "'" . $cpt . "'";
			}
		} else {
			$post_types[] = "'" . $args['post_type'] . "'";
		}

		if ( ! empty( $post_types ) ) {
			$clauses['fields'] = 'DISTINCT ' . str_replace( 'tt.*', 'tt.term_taxonomy_id, tt.taxonomy, tt.description, tt.parent', $clauses['fields'] ) . ', COUNT(p.post_type) AS count';
			$clauses['join'] .= ' LEFT JOIN ' . $wpdb->term_relationships . ' AS r ON r.term_taxonomy_id = tt.term_taxonomy_id LEFT JOIN ' . $wpdb->posts . ' AS p ON p.ID = r.object_id';
			$clauses['where'] .= ' AND (p.post_type IN (' . implode( ',', $post_types ) . ') OR p.post_type IS NULL)';
			$clauses['orderby'] = 'GROUP BY t.term_id ' . $clauses['orderby'];
		}
	}
	return $clauses;
}

add_filter( 'terms_clauses', 'df_terms_clauses', 10, 3 );
*/

