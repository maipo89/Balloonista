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

	wp_enqueue_script( 'storefront-child-script',
		get_stylesheet_directory_uri() . '/dist/scripts/all.min.min.js',
		array(), // Add any script dependencies here, for example, array('jquery')
		wp_get_theme()->get('Version'),
		true // Set to true to load the script in the footer
	);
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

wp_enqueue_script('my-scripts', get_template_directory_uri() . 'build_assets/js/scripts.js', array('jquery'), '1.0', true);


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

