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

function enqueue_slick_script() {
    // Enqueue Slick Slider script
    wp_enqueue_script('slick-js', get_template_directory_uri() . '/path/to/slick.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_slick_script');



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

function remove_image_zoom_support() {
    remove_theme_support( 'wc-product-gallery-zoom' );
}
add_action( 'wp', 'remove_image_zoom_support', 100 );