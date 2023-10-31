<?php
// Your opening PHP tag

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
