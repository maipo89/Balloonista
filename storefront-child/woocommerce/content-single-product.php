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
<?php 

	$product_id = $product->get_id();
	$product = wc_get_product($product_id);

	$title = $product->get_name();
	$price = $product->get_price_html(); 

?>
<div class="delivery-banner">
	<div class="delivery-banner__wrapper">
		<svg width="65" height="66" viewBox="0 0 65 66" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M18.1261 41.7811C19.6052 41.5575 21.08 41.5989 22.4899 41.8741L22.5672 42.1506L18.5374 43.2523L18.1261 41.7811ZM23.6657 42.3657C23.6656 42.3656 23.6656 42.3656 23.6656 42.3655L23.6036 42.1438C26.5949 43.0118 29.2012 44.9536 30.795 47.6469L29.2078 48.0546L28.7205 48.1798L28.8487 48.6664L29.3746 50.6614L27.8164 51.0874C26.9024 48.4868 24.643 46.5918 21.9595 45.9723C22.182 45.8727 22.3924 45.7472 22.5861 45.5979C22.9062 45.351 23.1743 45.044 23.3749 44.6941C23.5755 44.3442 23.7046 43.9584 23.7545 43.5587C23.7835 43.3266 23.7855 43.0925 23.7607 42.861L23.801 42.85L23.6657 42.3657ZM28.0853 52.0505L29.6295 51.6284L30.1543 53.6195L30.281 54.0999L30.7622 53.9763L32.4265 53.5487C32.4397 58.7026 28.9567 63.3978 23.7047 64.9625L22.6555 60.9716C26.5995 59.7115 28.8813 55.854 28.0853 52.0505ZM21.687 61.2207L22.736 65.2109C16.5016 66.5574 10.1529 63.0961 8.21655 57.1535L12.2518 56.0503C13.554 59.7555 17.5874 62.0285 21.687 61.2207ZM11.9828 55.0871L7.94709 56.1905C6.514 50.0867 10.236 44.0038 16.3636 42.1786L17.4126 46.1661C13.4686 47.4262 11.1869 51.2836 11.9828 55.0871ZM19.0955 45.8069C18.858 45.8334 18.6197 45.8699 18.3812 45.9169L18.1047 44.8654C18.1508 44.9348 18.1998 45.0024 18.2517 45.0681C18.4852 45.3638 18.7713 45.6141 19.0955 45.8069ZM22.1917 40.8071C20.7808 40.5841 19.3183 40.5771 17.8551 40.8114L11.3736 17.6237L15.4034 16.5219L22.1917 40.8071ZM11.0768 16.6681C10.6096 15.5217 9.6615 14.5848 8.43402 14.1092L9.54716 10.1223C10.8375 10.5465 12.0133 11.2594 12.9819 12.2075C13.9464 13.1517 14.676 14.3005 15.1174 15.5634L11.0768 16.6681ZM29.9439 48.898L31.2798 48.5548C31.4991 49.0132 31.6906 49.4901 31.8516 49.9842L30.3392 50.3976L29.9439 48.898ZM30.5941 51.3646L32.1208 50.9473C32.2446 51.4754 32.3298 52.0035 32.3782 52.5286L30.9947 52.8841L30.5941 51.3646ZM32.8173 49.7202C32.6601 49.2313 32.4757 48.758 32.266 48.3015L60.3309 41.0916L61.3814 45.0769L33.3588 52.2767C33.3029 51.7475 33.2125 51.2156 33.0861 50.6834L33.0957 50.6807L32.9607 50.1979C32.9606 50.1975 32.9605 50.197 32.9604 50.1966L32.9603 50.1965L32.8267 49.7176L32.8173 49.7202ZM62.3394 44.7867L61.3133 40.8836C61.4269 40.8784 61.541 40.8824 61.6545 40.8956C61.9328 40.928 62.2014 41.0151 62.4445 41.1517C62.6876 41.2882 62.9002 41.4713 63.0698 41.6898C63.2394 41.9083 63.3628 42.1578 63.4328 42.4236C63.5029 42.6894 63.5183 42.9663 63.4783 43.238C63.4382 43.5096 63.3434 43.7709 63.1992 44.0063C63.055 44.2417 62.8643 44.4465 62.638 44.6085C62.5435 44.6762 62.4436 44.7357 62.3394 44.7867ZM2.35676 8.29685C2.46596 8.28475 2.57568 8.28117 2.68492 8.28604L1.59555 12.156C1.4978 12.1039 1.40422 12.044 1.31578 11.977C1.09623 11.8105 0.912698 11.6029 0.775549 11.3664C0.638408 11.13 0.550301 10.8692 0.516108 10.5994C0.481915 10.3295 0.502277 10.0556 0.576074 9.79342C0.649873 9.53124 0.775712 9.28582 0.946575 9.07147C1.11745 8.8571 1.32999 8.67804 1.57209 8.54494C1.8142 8.41184 2.08092 8.32744 2.35676 8.29685ZM2.54599 12.4701L3.66357 8.49995L8.58503 9.84722L7.4702 13.8202L2.54599 12.4701ZM18.8675 44.1987L22.7772 43.1299C22.7799 43.2315 22.7749 43.3334 22.7622 43.4348C22.7288 43.7026 22.6423 43.9615 22.5074 44.1967C22.3725 44.432 22.1918 44.6391 21.9754 44.8059L22.2807 45.2019L21.9754 44.806C21.759 44.9728 21.5111 45.0962 21.2458 45.1687C20.9805 45.2413 20.7033 45.2615 20.43 45.2281C20.1567 45.1948 19.893 45.1086 19.6538 44.9747C19.4147 44.8408 19.205 44.6618 19.0365 44.4484C18.974 44.3691 18.9175 44.2857 18.8675 44.1987Z" fill="#70B095" stroke="#70B095"/>
			<path d="M25.3025 21.5591C23.6273 15.5683 22.7915 12.5712 24.2145 10.2124C25.6341 7.85019 28.76 7.048 35.0117 5.4402L41.6433 3.74024C47.895 2.13586 51.0209 1.33026 53.4836 2.69227C55.9463 4.05771 56.7856 7.05141 58.4573 13.0457L60.2361 19.4017C61.9113 25.3926 62.7506 28.3897 61.3276 30.7519C59.9046 33.1107 56.7787 33.9163 50.527 35.5207L43.8953 37.224C37.6436 38.8284 34.5178 39.6306 32.0551 38.2686C29.5924 36.9032 28.7565 33.9094 27.0813 27.9186L25.3025 21.5591Z" stroke="#70B095" stroke-width="4"/>
		</svg>
		<p>Same-day delivery available, select the option in the checkout!</p>
	</div>
</div>
<div class="breadcrumb">
	<div class="breadcrumb__wrapper">
		<a href="<?php echo get_home_url(); ?>">Home</a>
		<a href="<?php echo get_home_url(); ?>/shop">Shop</a>
		<p><?php echo $title; ?></p>
	</div>
</div>
<div class="product" id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

    <div class="product__mobile-title">
		<h2><?php echo $title; ?></h2>
        <p><?php echo $price; ?></p>
	</div>
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
				// Check if rows exist.
				if (have_rows('product_gallery', $product_id)):
					// Count the number of rows.
					$row_count = count(get_field('product_gallery', $product_id));

					// Check if there's more than one row.
					if ($row_count > 1):
						// Loop through rows.
						while (have_rows('product_gallery', $product_id)) : the_row();
							// Load sub field value.
							$sub_value = get_sub_field('product_image');
							$imageId = get_sub_field('link_to_variation');
			?>
							<div class="product-image__controls-item" id="<?php echo 'attribute_' . $imageId ?>">
								<img src="<?php echo $sub_value['url'] ?>" alt="">
							</div>
			<?php
						// End loop.
						endwhile;
					endif;
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
						<p>Summary</p>
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


