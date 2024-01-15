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
<div class="product" id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

	<?php 
	
	$product_id = $product->get_id();
	$product = wc_get_product($product_id);
	
	$title = $product->get_name();
    $price = $product->get_price_html(); 

	?>

	<div class="product-image">
		<div class="product-image__feature">
			<div class="badges">
				<?php 
					$product_id = get_the_ID();
					$terms = wp_get_post_terms($product_id, 'badge_taxonomy');

					if (!is_wp_error($terms) && !empty($terms)) {
						foreach ($terms as $term) { ?>
							<div class="badges__item">
								<p><?php echo $term->name; ?></p>
							</div>
						<?php
						}
					} else {
						echo 'No terms found for this product.';
					}
				?>
			</div>
			<div class="product-image__feature-slider">
				<?php
					// Check rows exists.
					if( have_rows('product_gallery', $product_id) ):
						// Loop through rows.
						while( have_rows('product_gallery', $product_id) ) : the_row();
							// Load sub field value.
							$sub_value = get_sub_field('product_image');
							
							// Do something...
							?>
							<div class="product-image__feature-image">
								<img src="<?php echo $sub_value['url'] ?>" />
							</div>

						<?php // End loop.
						endwhile;
					endif; 
				?>
			</div>
		</div>
		<div class="product-image__controls">
			<?php
				// Check rows exists.
				if( have_rows('product_gallery', $product_id) ):
					// Loop through rows.
					while( have_rows('product_gallery', $product_id) ) : the_row();
						// Load sub field value.
						$sub_value = get_sub_field('product_image');
						$imageId = get_sub_field('link_to_variation');
							
						?>
						<div class="product-image__controls-item" id="<?php echo 'attribute_' . $imageId ?>">
							<img src="<?php echo $sub_value['url'] ?>" alt="">';
						</div>
					<?php // End loop.
					endwhile;
				endif; 
			?>
		</div>
	</div>
	<div class="product__options">
		<div class="product__options-head">
			<h1><?php echo $title; ?></h1>
			<p><?php echo $price; ?></p>
	
			<div class="product__option-buttons">
				<?php 

				// Get add-ons data from the product meta
				$add_ons = get_post_meta($product_id, '_product_addons', true);

				// Check if there are any add-ons
				if (!empty($add_ons)) { ?>
					<button class="options" data-count="0">
						<p>Options</p>
					</button>
					<button class="extras" data-count="1">
						<p>Extras</p>
					</button>
					<button class="summary" data-count="2">
						<p>Summry</p>
					</button>
				<?php } else { ?>
					<button class="options" data-count="0">
						<p>Options</p>
					</button>
				<?php } ?> 
			</div>
		</div>
		<?php
			/**
			 * Hook: woocommerce_single_product_summary.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
			do_action( 'woocommerce_single_product_summary' );
		?>
		<!-- <?php echo woocommerce_quantity_input(); ?> -->
		<?php if (!empty($add_ons)) { ?>
			<button class="product-next-step">
				<p>Next</p>
			</button>
		<?php }else{ ?>

		<?php } ?>
	</div>

	<?php
		// do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>




<?php include get_stylesheet_directory() . '/flexibleBlocks.php'; ?>


