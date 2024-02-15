<?php
// Your opening PHP tag

// Thumbnail sizes
add_image_size( 'bones-thumb-600', 600, 150, true );
add_image_size( 'bones-thumb-300', 300, 100, true );
add_image_size( 'onqor-xl', 2000 );
add_image_size( 'onqor-hd', 1500 );
add_image_size( 'onqor-large', 1000 );
add_image_size( 'onqor-logo', 600 );
add_image_size( 'onqor-small', 100 );
add_image_size( 'onqor-xs', 80 );


function my_child_theme_enqueue_styles() {
    $parent_style = 'storefront-style'; // This is 'storefront-style' for the Storefront theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'storefront-child-style',
        get_stylesheet_directory_uri() . '/dist/styles/all.min.min.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
    if ( ! is_checkout() ) {
        wp_enqueue_script( 'storefront-child-script',
            get_stylesheet_directory_uri() . '/dist/scripts/all.min.min.js',
            array(), // Add any script dependencies here, for example, array('jquery')
            wp_get_theme()->get('Version'),
            true // Set to true to load the script in the footer
        );
    }
}
add_action( 'wp_enqueue_scripts', 'my_child_theme_enqueue_styles' );

function vc_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
    }
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );


// Slick

function enqueue_slick_scripts() {
    wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
    wp_enqueue_script('slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '', true);
}
add_action('wp_enqueue_scripts', 'enqueue_slick_scripts');


// Menu

function wpb_custom_new_menu() {
    register_nav_menu('my-custom-menu',__( 'My Custom Menu' ));
  }
  add_action( 'init', 'wpb_custom_new_menu' );
  
  if( function_exists('acf_add_options_page') ) {
      
    acf_add_options_page();
    
}

// Accept SVGs uploads

function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');


// Badges

function badge_taxonomy() {
    $labels = array(
        'name' => 'Badge',
        'singular_name' => 'Badge',
        'menu_name' => 'Badge',
    );
  
    $args = array(
        'hierarchical' => true, // Set to true if it should have parent-child relationships.
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'badge'),
    );
  
    register_taxonomy('badge_taxonomy', 'product', $args);
}
  
add_action('init', 'badge_taxonomy');


// Categories 

// wp_enqueue_script('my-scripts', get_template_directory_uri() . 'build_assets/js/scripts.js', array('jquery'), '1.0', true);


add_action('wp_enqueue_scripts', 'add_categories_to_js');

function add_categories_to_js() {
    // Retrieve product categories
    $product_categories = get_terms(array(
        'taxonomy' => 'product_cat',
        'hide_empty' => false,
    ));

    // Extract category names to create a JavaScript array
    $category_slugs = array();
    foreach ($product_categories as $category) {
        $category_slugs[] = $category->slug;
    }

    // Localize the script with the array of category names
    wp_localize_script('my-scripts', 'productCategories', $category_slugs);
}

// Add arrows in product gallery

add_filter( 'woocommerce_single_product_carousel_options', 'sf_update_woo_flexslider_options' );
/** 
 * Filer WooCommerce Flexslider options - Add Navigation Arrows
 */
function sf_update_woo_flexslider_options( $options ) {

    $options['directionNav'] = true;

    return $options;
}

// Remove zoom support

// function custom_remove_all_quantity_fields( $return, $product ) {return true;}
// add_filter( 'woocommerce_is_sold_individually','custom_remove_all_quantity_fields', 10, 2 );



// Customize the display of multiple-choice addons in WooCommerce.
// Add this code to your theme's functions.php file or a custom plugin

// Hook into WooCommerce to modify the display of multiple choice fields


add_filter('woocommerce_cart_item_thumbnail', 'custom_cart_item_thumbnail_size', 10, 3);

function custom_cart_item_thumbnail_size($thumbnail, $cart_item, $cart_item_key) {
    $_product = $cart_item['data'];
    return $_product->get_image('medium'); // Replace 'medium' with your desired size
}

function remove_image_zoom_support() {
    remove_theme_support( 'wc-product-gallery-zoom' );
}
add_action( 'wp', 'remove_image_zoom_support', 100 );


// function custom_remove_quantity_selector() {
//     remove_action( 'woocommerce_before_add_to_cart_button', 'woocommerce_quantity_input', 10 );
// }
// add_action( 'woocommerce_before_single_product', 'custom_remove_quantity_selector', 1 );

// function custom_quantity_selector() {
//     // [Custom code for the quantity selector]
// }
// add_action( 'woocommerce_single_product_summary', 'custom_quantity_selector', 30 );

// Google Map

function my_acf_init() {
    acf_update_setting('google_api_key', 'AIzaSyDMqSLoDfBqzu0bVuT1USXebfMK83OX42M');
}
add_action('acf/init', 'my_acf_init');

// Gsap

function enqueue_gsap() {
    wp_enqueue_script('gsap', 'https://cdn.jsdelivr.net/npm/gsap@3.9.0/dist/gsap.min.js', array(), null, true);
    wp_enqueue_script('gsap-scrolltrigger', 'https://unpkg.com/gsap@3.9.0/dist/ScrollTrigger.min.js', array('gsap'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_gsap');

// Add custom sorting options

function custom_woocommerce_catalog_orderby($sortby)
{
    $sortby['popularity'] = __('Popularity', 'woocommerce');
    $sortby['best_selling'] = __('Best Selling', 'woocommerce');
    $sortby['featured'] = __('Featured', 'woocommerce');
    $sortby['price_low_to_high'] = __('Price: Low to High', 'woocommerce');
    $sortby['price_high_to_low'] = __('Price: High to Low', 'woocommerce');
    $sortby['name_a_to_z'] = __('Name: A to Z', 'woocommerce');

    return $sortby;
}
add_filter('woocommerce_default_catalog_orderby_options', 'custom_woocommerce_catalog_orderby');
add_filter('woocommerce_catalog_orderby', 'custom_woocommerce_catalog_orderby');


/*
Code Purpose : Remove woocommerce product-category slug
*/

add_filter('request', function( $vars ) {
    global $wpdb;
    if( ! empty( $vars['pagename'] ) || ! empty( $vars['category_name'] ) || ! empty( $vars['name'] ) || ! empty( $vars['attachment'] ) ) {
        $slug = ! empty( $vars['pagename'] ) ? $vars['pagename'] : ( ! empty( $vars['name'] ) ? $vars['name'] : ( !empty( $vars['category_name'] ) ? $vars['category_name'] : $vars['attachment'] ) );
        $exists = $wpdb->get_var( $wpdb->prepare( "SELECT t.term_id FROM $wpdb->terms t LEFT JOIN $wpdb->term_taxonomy tt ON tt.term_id = t.term_id WHERE tt.taxonomy = 'product_cat' AND t.slug = %s" ,array( $slug )));
        if( $exists ){
            $old_vars = $vars;
            $vars = array('product_cat' => $slug );
            if ( !empty( $old_vars['paged'] ) || !empty( $old_vars['page'] ) )
                $vars['paged'] = ! empty( $old_vars['paged'] ) ? $old_vars['paged'] : $old_vars['page'];
            if ( !empty( $old_vars['orderby'] ) )
                    $vars['orderby'] = $old_vars['orderby'];
                if ( !empty( $old_vars['order'] ) )
                    $vars['order'] = $old_vars['order'];    
        }
    }
    return $vars;
});



// CART HOOKS

add_action( 'wp_print_scripts', 'custom_cart_script' );
function custom_cart_script() {
    if ( is_cart() ) {
        ?>
        <script type="text/javascript">
            // Check if jQuery is loaded
            if (typeof jQuery !== 'undefined') {
                // jQuery is loaded, run your script
                jQuery(function($){
                    console.log('condolllllll');
                });
            } else {
                // jQuery is not loaded, handle the error or load jQuery
                console.error('jQuery is not loaded');
            }
        </script>
        <?php
    }
}


add_action('woocommerce_before_checkout_form', 'custom_content_before_checkout');

function custom_content_before_checkout() {
    echo '<div class="delivery-banner">';
    echo    '<div class="delivery-banner__wrapper">';
    echo        '<svg width="65" height="66" viewBox="0 0 65 66" fill="none" xmlns="http://www.w3.org/2000/svg">';
    echo            '<path d="M18.1261 41.7811C19.6052 41.5575 21.08 41.5989 22.4899 41.8741L22.5672 42.1506L18.5374 43.2523L18.1261 41.7811ZM23.6657 42.3657C23.6656 42.3656 23.6656 42.3656 23.6656 42.3655L23.6036 42.1438C26.5949 43.0118 29.2012 44.9536 30.795 47.6469L29.2078 48.0546L28.7205 48.1798L28.8487 48.6664L29.3746 50.6614L27.8164 51.0874C26.9024 48.4868 24.643 46.5918 21.9595 45.9723C22.182 45.8727 22.3924 45.7472 22.5861 45.5979C22.9062 45.351 23.1743 45.044 23.3749 44.6941C23.5755 44.3442 23.7046 43.9584 23.7545 43.5587C23.7835 43.3266 23.7855 43.0925 23.7607 42.861L23.801 42.85L23.6657 42.3657ZM28.0853 52.0505L29.6295 51.6284L30.1543 53.6195L30.281 54.0999L30.7622 53.9763L32.4265 53.5487C32.4397 58.7026 28.9567 63.3978 23.7047 64.9625L22.6555 60.9716C26.5995 59.7115 28.8813 55.854 28.0853 52.0505ZM21.687 61.2207L22.736 65.2109C16.5016 66.5574 10.1529 63.0961 8.21655 57.1535L12.2518 56.0503C13.554 59.7555 17.5874 62.0285 21.687 61.2207ZM11.9828 55.0871L7.94709 56.1905C6.514 50.0867 10.236 44.0038 16.3636 42.1786L17.4126 46.1661C13.4686 47.4262 11.1869 51.2836 11.9828 55.0871ZM19.0955 45.8069C18.858 45.8334 18.6197 45.8699 18.3812 45.9169L18.1047 44.8654C18.1508 44.9348 18.1998 45.0024 18.2517 45.0681C18.4852 45.3638 18.7713 45.6141 19.0955 45.8069ZM22.1917 40.8071C20.7808 40.5841 19.3183 40.5771 17.8551 40.8114L11.3736 17.6237L15.4034 16.5219L22.1917 40.8071ZM11.0768 16.6681C10.6096 15.5217 9.6615 14.5848 8.43402 14.1092L9.54716 10.1223C10.8375 10.5465 12.0133 11.2594 12.9819 12.2075C13.9464 13.1517 14.676 14.3005 15.1174 15.5634L11.0768 16.6681ZM29.9439 48.898L31.2798 48.5548C31.4991 49.0132 31.6906 49.4901 31.8516 49.9842L30.3392 50.3976L29.9439 48.898ZM30.5941 51.3646L32.1208 50.9473C32.2446 51.4754 32.3298 52.0035 32.3782 52.5286L30.9947 52.8841L30.5941 51.3646ZM32.8173 49.7202C32.6601 49.2313 32.4757 48.758 32.266 48.3015L60.3309 41.0916L61.3814 45.0769L33.3588 52.2767C33.3029 51.7475 33.2125 51.2156 33.0861 50.6834L33.0957 50.6807L32.9607 50.1979C32.9606 50.1975 32.9605 50.197 32.9604 50.1966L32.9603 50.1965L32.8267 49.7176L32.8173 49.7202ZM62.3394 44.7867L61.3133 40.8836C61.4269 40.8784 61.541 40.8824 61.6545 40.8956C61.9328 40.928 62.2014 41.0151 62.4445 41.1517C62.6876 41.2882 62.9002 41.4713 63.0698 41.6898C63.2394 41.9083 63.3628 42.1578 63.4328 42.4236C63.5029 42.6894 63.5183 42.9663 63.4783 43.238C63.4382 43.5096 63.3434 43.7709 63.1992 44.0063C63.055 44.2417 62.8643 44.4465 62.638 44.6085C62.5435 44.6762 62.4436 44.7357 62.3394 44.7867ZM2.35676 8.29685C2.46596 8.28475 2.57568 8.28117 2.68492 8.28604L1.59555 12.156C1.4978 12.1039 1.40422 12.044 1.31578 11.977C1.09623 11.8105 0.912698 11.6029 0.775549 11.3664C0.638408 11.13 0.550301 10.8692 0.516108 10.5994C0.481915 10.3295 0.502277 10.0556 0.576074 9.79342C0.649873 9.53124 0.775712 9.28582 0.946575 9.07147C1.11745 8.8571 1.32999 8.67804 1.57209 8.54494C1.8142 8.41184 2.08092 8.32744 2.35676 8.29685ZM2.54599 12.4701L3.66357 8.49995L8.58503 9.84722L7.4702 13.8202L2.54599 12.4701ZM18.8675 44.1987L22.7772 43.1299C22.7799 43.2315 22.7749 43.3334 22.7622 43.4348C22.7288 43.7026 22.6423 43.9615 22.5074 44.1967C22.3725 44.432 22.1918 44.6391 21.9754 44.8059L22.2807 45.2019L21.9754 44.806C21.759 44.9728 21.5111 45.0962 21.2458 45.1687C20.9805 45.2413 20.7033 45.2615 20.43 45.2281C20.1567 45.1948 19.893 45.1086 19.6538 44.9747C19.4147 44.8408 19.205 44.6618 19.0365 44.4484C18.974 44.3691 18.9175 44.2857 18.8675 44.1987Z" fill="#70B095" stroke="#70B095" />';
    echo            '<path d="M25.3025 21.5591C23.6273 15.5683 22.7915 12.5712 24.2145 10.2124C25.6341 7.85019 28.76 7.048 35.0117 5.4402L41.6433 3.74024C47.895 2.13586 51.0209 1.33026 53.4836 2.69227C55.9463 4.05771 56.7856 7.05141 58.4573 13.0457L60.2361 19.4017C61.9113 25.3926 62.7506 28.3897 61.3276 30.7519C59.9046 33.1107 56.7787 33.9163 50.527 35.5207L43.8953 37.224C37.6436 38.8284 34.5178 39.6306 32.0551 38.2686C29.5924 36.9032 28.7565 33.9094 27.0813 27.9186L25.3025 21.5591Z" stroke="#70B095" stroke-width="4"/>';
    echo        '</svg>';
    echo        '<p>Same-day delivery available, select the option in the checkout!</p>';
    echo    '</div>';
    echo '</div>';
    echo '<div class="checkout-header">';
        echo '<h1>Checkout</h1>';
        // echo '<div class="checkout-header__options">';
        // echo '<p>Delivery Type</p>';
        // echo '<p>Delivery Option</p>';
        // echo '<p>Billing Address</p>';
        // echo '<p>Payment</p>';
        // echo '</div>';
    echo '</div>';
}

function custom_content_inside_review_order() {
    // Get the current order
    $order = wc_get_order();

    // Loop through order items
    foreach ($order->get_items() as $item_id => $item) {
        // Get the product ID
        $product_id = $item->get_product_id();

        // Get the product object
        $product = wc_get_product($product_id);

        // Get the product image
        $product_image = $product->get_image();

        // Output the custom content with product image
        echo '<tr class="custom-row">';
        echo '<td class="product-thumbnail">' . $product_image . '</td>';
        echo '<td class="product-name" data-title="' . esc_attr__('Product') . '">' . esc_html($item->get_name()) . '</td>';
        echo '<td class="product-quantity" data-title="' . esc_attr__('Quantity') . '">' . esc_html($item->get_quantity()) . '</td>';
        echo '<td class="product-total" data-title="' . esc_attr__('Total') . '">' . $order->get_formatted_line_subtotal($item) . '</td>';
        echo '</tr>';
    }
}
add_action('woocommerce_checkout_review_order', 'custom_content_inside_review_order');


function custom_excerpt_length( $length ) {
    return 8; 
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more($more) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

function custom_cart_page_title() {
    echo '<div class="delivery-banner">';
    echo    '<div class="delivery-banner__wrapper">';
    echo        '<svg width="65" height="66" viewBox="0 0 65 66" fill="none" xmlns="http://www.w3.org/2000/svg">';
    echo            '<path d="M18.1261 41.7811C19.6052 41.5575 21.08 41.5989 22.4899 41.8741L22.5672 42.1506L18.5374 43.2523L18.1261 41.7811ZM23.6657 42.3657C23.6656 42.3656 23.6656 42.3656 23.6656 42.3655L23.6036 42.1438C26.5949 43.0118 29.2012 44.9536 30.795 47.6469L29.2078 48.0546L28.7205 48.1798L28.8487 48.6664L29.3746 50.6614L27.8164 51.0874C26.9024 48.4868 24.643 46.5918 21.9595 45.9723C22.182 45.8727 22.3924 45.7472 22.5861 45.5979C22.9062 45.351 23.1743 45.044 23.3749 44.6941C23.5755 44.3442 23.7046 43.9584 23.7545 43.5587C23.7835 43.3266 23.7855 43.0925 23.7607 42.861L23.801 42.85L23.6657 42.3657ZM28.0853 52.0505L29.6295 51.6284L30.1543 53.6195L30.281 54.0999L30.7622 53.9763L32.4265 53.5487C32.4397 58.7026 28.9567 63.3978 23.7047 64.9625L22.6555 60.9716C26.5995 59.7115 28.8813 55.854 28.0853 52.0505ZM21.687 61.2207L22.736 65.2109C16.5016 66.5574 10.1529 63.0961 8.21655 57.1535L12.2518 56.0503C13.554 59.7555 17.5874 62.0285 21.687 61.2207ZM11.9828 55.0871L7.94709 56.1905C6.514 50.0867 10.236 44.0038 16.3636 42.1786L17.4126 46.1661C13.4686 47.4262 11.1869 51.2836 11.9828 55.0871ZM19.0955 45.8069C18.858 45.8334 18.6197 45.8699 18.3812 45.9169L18.1047 44.8654C18.1508 44.9348 18.1998 45.0024 18.2517 45.0681C18.4852 45.3638 18.7713 45.6141 19.0955 45.8069ZM22.1917 40.8071C20.7808 40.5841 19.3183 40.5771 17.8551 40.8114L11.3736 17.6237L15.4034 16.5219L22.1917 40.8071ZM11.0768 16.6681C10.6096 15.5217 9.6615 14.5848 8.43402 14.1092L9.54716 10.1223C10.8375 10.5465 12.0133 11.2594 12.9819 12.2075C13.9464 13.1517 14.676 14.3005 15.1174 15.5634L11.0768 16.6681ZM29.9439 48.898L31.2798 48.5548C31.4991 49.0132 31.6906 49.4901 31.8516 49.9842L30.3392 50.3976L29.9439 48.898ZM30.5941 51.3646L32.1208 50.9473C32.2446 51.4754 32.3298 52.0035 32.3782 52.5286L30.9947 52.8841L30.5941 51.3646ZM32.8173 49.7202C32.6601 49.2313 32.4757 48.758 32.266 48.3015L60.3309 41.0916L61.3814 45.0769L33.3588 52.2767C33.3029 51.7475 33.2125 51.2156 33.0861 50.6834L33.0957 50.6807L32.9607 50.1979C32.9606 50.1975 32.9605 50.197 32.9604 50.1966L32.9603 50.1965L32.8267 49.7176L32.8173 49.7202ZM62.3394 44.7867L61.3133 40.8836C61.4269 40.8784 61.541 40.8824 61.6545 40.8956C61.9328 40.928 62.2014 41.0151 62.4445 41.1517C62.6876 41.2882 62.9002 41.4713 63.0698 41.6898C63.2394 41.9083 63.3628 42.1578 63.4328 42.4236C63.5029 42.6894 63.5183 42.9663 63.4783 43.238C63.4382 43.5096 63.3434 43.7709 63.1992 44.0063C63.055 44.2417 62.8643 44.4465 62.638 44.6085C62.5435 44.6762 62.4436 44.7357 62.3394 44.7867ZM2.35676 8.29685C2.46596 8.28475 2.57568 8.28117 2.68492 8.28604L1.59555 12.156C1.4978 12.1039 1.40422 12.044 1.31578 11.977C1.09623 11.8105 0.912698 11.6029 0.775549 11.3664C0.638408 11.13 0.550301 10.8692 0.516108 10.5994C0.481915 10.3295 0.502277 10.0556 0.576074 9.79342C0.649873 9.53124 0.775712 9.28582 0.946575 9.07147C1.11745 8.8571 1.32999 8.67804 1.57209 8.54494C1.8142 8.41184 2.08092 8.32744 2.35676 8.29685ZM2.54599 12.4701L3.66357 8.49995L8.58503 9.84722L7.4702 13.8202L2.54599 12.4701ZM18.8675 44.1987L22.7772 43.1299C22.7799 43.2315 22.7749 43.3334 22.7622 43.4348C22.7288 43.7026 22.6423 43.9615 22.5074 44.1967C22.3725 44.432 22.1918 44.6391 21.9754 44.8059L22.2807 45.2019L21.9754 44.806C21.759 44.9728 21.5111 45.0962 21.2458 45.1687C20.9805 45.2413 20.7033 45.2615 20.43 45.2281C20.1567 45.1948 19.893 45.1086 19.6538 44.9747C19.4147 44.8408 19.205 44.6618 19.0365 44.4484C18.974 44.3691 18.9175 44.2857 18.8675 44.1987Z" fill="#70B095" stroke="#70B095" />';
    echo            '<path d="M25.3025 21.5591C23.6273 15.5683 22.7915 12.5712 24.2145 10.2124C25.6341 7.85019 28.76 7.048 35.0117 5.4402L41.6433 3.74024C47.895 2.13586 51.0209 1.33026 53.4836 2.69227C55.9463 4.05771 56.7856 7.05141 58.4573 13.0457L60.2361 19.4017C61.9113 25.3926 62.7506 28.3897 61.3276 30.7519C59.9046 33.1107 56.7787 33.9163 50.527 35.5207L43.8953 37.224C37.6436 38.8284 34.5178 39.6306 32.0551 38.2686C29.5924 36.9032 28.7565 33.9094 27.0813 27.9186L25.3025 21.5591Z" stroke="#70B095" stroke-width="4"/>';
    echo        '</svg>';
    echo        '<p>Same-day delivery available, select the option in the checkout!</p>';
    echo    '</div>';
    echo '</div>';
}

add_action('woocommerce_before_cart', 'custom_cart_page_title');


function custom_content_after_proceed_to_checkout() {
    // Add images of credit cards
    echo '<div class="go-to-store">';
        echo '<a href="' . esc_url(home_url('/')) . 'shop">Continue Shopping</a>';
    echo '</div>';
    echo '<div class="credit-card-images">';
    echo '<img src="' . esc_url(get_stylesheet_directory_uri() . '/assets/images/credit-cards/amex.svg') . '" alt="Amex">';
    echo '<img src="' . esc_url(get_stylesheet_directory_uri() . '/assets/images/credit-cards/mastercard.svg') . '" alt="MasterCard">';
    echo '<img src="' . esc_url(get_stylesheet_directory_uri() . '/assets/images/credit-cards/paypal.svg') . '" alt="PayPal">';
    echo '<img src="' . esc_url(get_stylesheet_directory_uri() . '/assets/images/credit-cards/visa.svg') . '" alt="Visa">';
    echo '<img src="' . esc_url(get_stylesheet_directory_uri() . '/assets/images/credit-cards/maestro.svg') . '" alt="Maestro">';
    // Add more credit card images as needed
    echo '</div>';

    // Add "Edit Basket" button
    echo '<div class="edit-basket-container"><a href="' . esc_url(wc_get_shop_url()) . '" class="button">Edit Basket</a></div>';

    // Add additional content
    echo '<p>Your additional content after the "Proceed to Checkout" button.</p>';
}

add_action('woocommerce_after_cart_totals', 'custom_content_after_proceed_to_checkout');

// Add the following code to your theme's functions.php file or a custom plugin

function custom_display_products_in_cart_totals() {
    // Get the products in the cart
    $cart_items = WC()->cart->get_cart();

    // Check if there are products in the cart
    if (!empty($cart_items)) {
        echo '<h2 class="le-form">Summary</h2>';

        // Display a table with product details
        echo '<table class="shop_table_products">';
        echo '<thead><tr><th>Product</th><th>Quantity</th><th>Total</th></tr></thead>';
        echo '<tbody>';

        foreach ($cart_items as $cart_item_key => $cart_item) {
            $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);

            echo '<tr>';
            echo '<th>' . $_product->get_name() . '</th>';
            echo '<th>' . $cart_item['quantity'] . '</th>';
            echo '<td>' . wc_price($cart_item['line_total']) . '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
        echo '<p class="delivery-checkout">Delivery options at checkout</p>';
        echo '<div class="line">';
        echo '</div>';
    }
}

add_action('woocommerce_before_cart_totals', 'custom_display_products_in_cart_totals');

// Add variations after the price in the basket page
function add_variations_after_price_in_basket( $item_data, $cart_item ) {
    // Get the product ID
    $product_id = $cart_item['product_id'];
    
    // Check if the product is a variation
    if ( $cart_item['variation_id'] ) {
        $product_id = $cart_item['variation_id'];
    }
    
    // Get the product
    $product = wc_get_product( $product_id );

    // Check if the product is variable
    if ( $product && $product->is_type( 'variable' ) ) {
        // Get variations
        $variations = $product->get_available_variations();

        // Loop through variations
        foreach ( $variations as $variation ) {
            // Get variation attributes
            $attributes = array();
            foreach ( $variation['attributes'] as $key => $value ) {
                $attributes[] = ucfirst( str_replace( 'attribute_', '', $key ) ) . ': ' . $value;
            }

            // Get variation price
            $variation_price = wc_price( $variation['display_price'] );

            // Add variation to item data
            $item_data[] = array(
                'key'     => __('Variation', 'woocommerce'),
                'value'   => implode(', ', $attributes) . ' (' . $variation_price . ')'
            );
        }
    }
    return $item_data;
}
add_filter( 'woocommerce_get_item_data', 'add_variations_after_price_in_basket', 10, 2 );



// CHECKOUT HOOKS

add_filter( 'wp_footer', 'custom_checkout_script' );
function custom_checkout_script( ){
    if( ! is_checkout() ) return;
    ?>
    <script type="text/javascript">
    jQuery(function($){
        $('.title-billing-address').addClass('open');
        $('.woocommerce-billing-fields__field-wrapper').addClass('open');
        $('#view-billing').text('Hide');
        $('#view-billing').click(function() {
           $('#view-billing').toggleClass('hide');
           if ($('#view-billing').hasClass('hide')) {
            $('#view-billing').text('View');
           }else{
            $('#view-billing').text('Hide');
           }
           $('.woocommerce-billing-fields__field-wrapper').toggleClass('open');
           $('.title-billing-address').toggleClass('open');
        });
        var deliveryAccordion = $('<div class="delivery-address-accordion"><h3>Delivery option</h3><p id="view-delivery">View</p></div><div class="title-delivery-address"><h3>Delivery option</h3><p>Please select a day for delivery:</p></div>');

        // Insert the deliveryAccordion element before the orddd-checkout-fields section
        $('.orddd-checkout-fields').before(deliveryAccordion);

        var additionalAccordion = $('<div class="additional-accordion"><h3>Additional option</h3><p id="view-additional">View</p></div>');
        $('.woocommerce-additional-fields').before(additionalAccordion);

        $('#view-delivery').click(function() {
           $('#view-delivery').toggleClass('open');
           if ($('#view-delivery').hasClass('open')) {
            $('#view-delivery').text('Hide');
           }else{
            $('#view-delivery').text('View');
           }
           $('.orddd-checkout-fields').toggleClass('open');
           $('.title-delivery-address').toggleClass('open');
        });

        $('#view-payment').click(function() {
           $('#view-payment').toggleClass('open');
           if ($('#view-payment').hasClass('open')) {
            $('#view-payment').text('Hide');
           }else{
            $('#view-payment').text('View');
           }
           $('#payment').toggleClass('open');
           $('.title-payment').toggleClass('open');
        });

        $('#view-additional').click(function() {
           $('#view-additional').toggleClass('open');
           if ($('#view-additional').hasClass('open')) {
            $('#view-additional').text('Hide');
           }else{
            $('#view-additional').text('View');
           }
           $('.woocommerce-additional-fields').toggleClass('open');
        });
    });
    </script>
    <?php
}

function add_content_before_billing_fields() {
    echo '<div class="billing-address-accordion">';
        echo '<h3>Billing details</h3>';
        echo '<p id="view-billing">View</p>';
    echo '</div>';
    echo '<div class="title-billing-address">';
        echo '<h3>Billing details</h3>';
        echo '<p>Please fill out your billing address:</p>';
    echo '</div>';

}
add_action( 'woocommerce_before_checkout_billing_form', 'add_content_before_billing_fields' );

add_action('woocommerce_before_checkout_form', 'add_review_order_section_with_images_after_submit');

function add_review_order_section_with_images_after_submit() {
    // Output a heading for the review order section
    echo '<div class="checkout-review-order">';
    echo '<div class="checkout-review-order__container">';
    echo '<h2>Basket</h2>';
    
    // Get cart items
    $cart_items = WC()->cart->get_cart();
    
    // Loop through cart items
    foreach ($cart_items as $cart_item_key => $cart_item) {
        // Get product object
        $product = $cart_item['data'];
        
        // Output product name
        echo '<div class="checkout-review-order__container__product">';

        // Output product image
        echo $product->get_image();
        echo '<div>';
            echo '<p class="name-checkout-product">' . $product->get_name() . '</p>';
            
            // Output product quantity
            echo '<p>' . $cart_item['quantity'] . '</p>';
        echo '</div>';

        echo '<p class="price-checkout-product">£' . number_format($product->get_price() * $cart_item['quantity'], 2) . '</p>';

        echo '</div>';
    }
    
    // Output total amount
    echo '<div class="line"></div>';
    echo '<div class="total-checkout-product">';
        echo '<p>Basket Total:</p>';
        echo '<p>' . WC()->cart->get_cart_total() . '</p>';
    echo '</div>';
    
    // Output "Back to Basket" button
    echo '<div class="button-container">';
        echo '<a href="' . wc_get_cart_url() . '" class="button wc-backward">Edit Basket</a>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}

// Add a payment heading before the payment section in WooCommerce checkout page
function custom_payment_heading_before_payment() {
    echo '<div class="payment-accordion">';
        echo '<h3>Payment details</h3>';
        echo '<p id="view-payment">View</p>';
    echo '</div>';
    echo '<div class="title-payment">';
        echo '<h3>Payment details</h3>';
        echo '<p>Please fill out your payment address:</p>';
    echo '</div>';
}
add_action('woocommerce_review_order_before_payment', 'custom_payment_heading_before_payment');

function add_basket_info_and_view_button() {
    // Get the number of items in the cart
    $cart_count = WC()->cart->get_cart_contents_count();
    // Get the cart URL
    $cart_url = wc_get_cart_url();
    $item_text = ($cart_count == 1) ? 'item' : 'items';

    // Output the basket info and view button
    echo '<div class="back-to-cart-mobile">';
        echo '<p class="basket-info">Basket (<span class="basket-quantity">' . $cart_count . '</span> ' . $item_text . ')</p>';
        echo '<a href="' . $cart_url . '" class="tertiary-button">View</a>';
    echo '</div>';
}

add_action( 'woocommerce_before_checkout_form', 'add_basket_info_and_view_button', 10 );

