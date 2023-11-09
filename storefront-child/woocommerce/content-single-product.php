<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

<div id="product-<?php the_ID(); ?>" class="product" >

	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="product__info">

		<?php
			global $product;
        ?>
		<h1><?php echo $product->get_name() ?></h1>
		<div class="product__info__price"><?php echo $product->get_price_html(); ?></div>

		<div class="product__info__select">
			<div class="product__info__select__step"><p>Colours</p></div>
			<svg width="7" height="8" viewBox="0 0 7 8" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M1 7L6.10557 4.44721C6.4741 4.26295 6.4741 3.73705 6.10557 3.55279L1 1" stroke="#D9E7E1" stroke-linecap="round"/>
			</svg>
			<div class="product__info__select__step"><p>Quantity</p></div>
			<svg width="7" height="8" viewBox="0 0 7 8" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M1 7L6.10557 4.44721C6.4741 4.26295 6.4741 3.73705 6.10557 3.55279L1 1" stroke="#D9E7E1" stroke-linecap="round"/>
			</svg>
			<div class="product__info__select__step"><p>Extras</p></div>
			<svg width="7" height="8" viewBox="0 0 7 8" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M1 7L6.10557 4.44721C6.4741 4.26295 6.4741 3.73705 6.10557 3.55279L1 1" stroke="#D9E7E1" stroke-linecap="round"/>
			</svg>
			<div class="product__info__select__step"><p>Overview</p></div>
</div>

<?php global $product; 

// Get product attributes
$attributes = $product->get_attributes();

if ( ! $attributes ) {
    echo "No attributes";
}

foreach ( $attributes as $attribute ) {

        echo $attribute['name'] . ": ";
        $product_attributes = array();
        $product_attributes = explode('|',$attribute['value']);

        $attributes_dropdown = '<select>';

        foreach ( $product_attributes as $pa ) {
            $attributes_dropdown .= '<option value="' . $pa . '">' . $pa . '</option>';
        }

        $attributes_dropdown .= '</select>';

        echo $attributes_dropdown;
} ?>


	</div>

</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
