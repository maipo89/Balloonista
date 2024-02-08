<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<?php do_action( 'storefront_before_site' ); ?>

<div id="page" class="hfeed site">
	<?php do_action( 'storefront_before_header' ); ?>

	<header class="header">

	<div class="mobile-menu">
		<div class="mobile-menu__scrollable">

			<?php $arrow_svg = '<svg width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.999999 1L6.62037 7.5571C6.81992 7.78991 7.18008 7.78991 7.37963 7.5571L13 1" stroke="#70B095" stroke-width="2" stroke-linecap="round"/></svg>'; ?>

			<?php

				wp_nav_menu(array(
					'menu' => __( 'Header', 'bonestheme' ),
					'theme_location' => 'header', // Name of the menu location
					'menu_id' => 'header', // Menu ID that can be targeted with CSS
					'after' => $arrow_svg, 
				));
				

			?>
			<a class="search-option">Search</a>
		</div>
	</div>

	<div class="header__wrapper">
		
        <div class="header__wrapper__hamburger">
			<svg class="close" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
				<rect width="25.2641" height="2.52641" rx="1.2632" transform="matrix(0.701006 -0.713155 0.701006 0.713155 0.518799 18.0171)" fill="black"/>
				<rect width="25.2641" height="2.52641" rx="1.2632" transform="matrix(0.701006 0.713155 -0.701006 0.713155 1.77124 0.181152)" fill="black"/>
			</svg>
			<svg class="hamburger" width="24" height="18" viewBox="0 0 24 18" fill="none" xmlns="http://www.w3.org/2000/svg">
				<rect width="24" height="2" rx="1" fill="black"/>
				<rect y="8" width="24" height="2" rx="1" fill="black"/>
				<rect y="16" width="24" height="2" rx="1" fill="black"/>
			</svg>
		</div>
        <a href="<?php echo get_home_url(); ?>" class="header__wrapper__logo">
		<?php $logo = get_field('logo', 'option'); ?>

		<img src="<?php echo($logo["sizes"]["onqor-large"]) ?>" alt="<?php echo($logo["alt"]) ?>" />

		</a>

		<nav class="header__wrapper__menu">
			<?php

			wp_nav_menu(array(
				'menu' => __( 'Header', 'bonestheme' ),
				'theme_location' => 'header', // Name of the menu location
				'menu_id' => 'header', // Menu ID that can be targeted with CSS
			));

			?>
		</nav>

		<div class="header__wrapper__right-container">
			<svg class="search-icon" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M17.7473 16.4825L14.4102 13.17C15.7056 11.5537 16.3329 9.50215 16.1631 7.43721C15.9934 5.37227 15.0396 3.45088 13.4978 2.06813C11.9559 0.685379 9.94333 -0.0536394 7.87376 0.00303437C5.80419 0.0597081 3.83498 0.907766 2.37103 2.37283C0.907077 3.83789 0.0596628 5.8086 0.00303206 7.87974C-0.0535986 9.95088 0.684859 11.965 2.06656 13.508C3.44826 15.051 5.36819 16.0056 7.43156 16.1754C9.49493 16.3453 11.5449 15.7175 13.16 14.4212L16.47 17.7337C16.5536 17.8181 16.6531 17.8851 16.7627 17.9308C16.8723 17.9765 16.9899 18 17.1086 18C17.2274 18 17.3449 17.9765 17.4546 17.9308C17.5642 17.8851 17.6636 17.8181 17.7473 17.7337C17.9094 17.5659 18 17.3416 18 17.1081C18 16.8747 17.9094 16.6504 17.7473 16.4825ZM8.11399 14.4212C6.8687 14.4212 5.65139 14.0516 4.61597 13.3593C3.58056 12.6669 2.77355 11.6828 2.297 10.5315C1.82045 9.38009 1.69577 8.11316 1.93871 6.89088C2.18165 5.6686 2.78131 4.54586 3.66186 3.66464C4.54241 2.78343 5.66429 2.18331 6.88565 1.94018C8.107 1.69706 9.37297 1.82184 10.5235 2.29875C11.674 2.77566 12.6573 3.58328 13.3491 4.61948C14.041 5.65568 14.4102 6.87392 14.4102 8.12015C14.4102 9.79129 13.7469 11.394 12.5661 12.5757C11.3853 13.7573 9.78386 14.4212 8.11399 14.4212Z" fill="black"/>
			</svg>
			<a href="<?php echo get_home_url(); ?>/basket">
				<svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M12.8583 11.4389V17.5995C12.8583 17.8329 12.768 18.0568 12.6072 18.2218C12.4465 18.3869 12.2285 18.4796 12.0011 18.4796C11.7738 18.4796 11.5558 18.3869 11.3951 18.2218C11.2343 18.0568 11.144 17.8329 11.144 17.5995V11.4389C11.144 11.2054 11.2343 10.9816 11.3951 10.8165C11.5558 10.6515 11.7738 10.5588 12.0011 10.5588C12.2285 10.5588 12.4465 10.6515 12.6072 10.8165C12.768 10.9816 12.8583 11.2054 12.8583 11.4389ZM23.9861 9.03071L22.5011 20.473C22.446 20.8959 22.2433 21.2839 21.9305 21.5647C21.6177 21.8456 21.2163 22.0003 20.8008 22H3.20153C2.78602 22.0003 2.38454 21.8456 2.07177 21.5647C1.759 21.2839 1.55624 20.8959 1.50118 20.473L0.015115 9.03181C-0.017269 8.78307 0.0025221 8.53009 0.0731608 8.28985C0.1438 8.04961 0.263653 7.82765 0.424682 7.63887C0.585712 7.45008 0.784194 7.29884 1.00682 7.19527C1.22944 7.09171 1.47106 7.03822 1.71547 7.03839H5.61224L11.3583 0.297967C11.4387 0.204319 11.5376 0.129317 11.6485 0.0779429C11.7593 0.0265692 11.8795 0 12.0011 0C12.1228 0 12.243 0.0265692 12.3538 0.0779429C12.4646 0.129317 12.5636 0.204319 12.644 0.297967L18.39 7.03839H22.2868C22.5309 7.03855 22.7722 7.09225 22.9945 7.19588C23.2168 7.29952 23.4149 7.45071 23.5757 7.63933C23.7365 7.82795 23.8562 8.04966 23.9268 8.28961C23.9974 8.52957 24.0172 8.78223 23.985 9.03071H23.9861ZM7.89009 7.03839H16.1122L12.0011 2.21437L7.89009 7.03839ZM22.2868 8.79858H1.71547L3.20153 20.2398H20.8008L22.2868 8.79858ZM16.8054 11.3509L16.2054 17.5115C16.1936 17.6269 16.204 17.7435 16.2362 17.8546C16.2684 17.9658 16.3217 18.0694 16.393 18.1593C16.4642 18.2493 16.5521 18.3239 16.6516 18.3789C16.7511 18.4338 16.8602 18.4681 16.9726 18.4796C17.0015 18.4812 17.0304 18.4812 17.0593 18.4796C17.2716 18.4794 17.4763 18.3982 17.6337 18.2519C17.791 18.1055 17.8899 17.9044 17.9111 17.6875L18.5111 11.5269C18.5339 11.2946 18.4658 11.0626 18.3219 10.8819C18.1781 10.7012 17.9702 10.5865 17.744 10.5632C17.5178 10.5398 17.2918 10.6097 17.1158 10.7574C16.9398 10.9051 16.8281 11.1186 16.8054 11.3509ZM7.19688 11.3509C7.17414 11.1186 7.06249 10.9051 6.88647 10.7574C6.71046 10.6097 6.4845 10.5398 6.25831 10.5632C6.03212 10.5865 5.82422 10.7012 5.68035 10.8819C5.53649 11.0626 5.46843 11.2946 5.49117 11.5269L6.09116 17.6875C6.11248 17.9054 6.21212 18.1072 6.37061 18.2537C6.52911 18.4002 6.73508 18.4807 6.9483 18.4796C6.97721 18.4812 7.00618 18.4812 7.03509 18.4796C7.14709 18.4681 7.25577 18.434 7.35494 18.3793C7.45411 18.3246 7.54181 18.2504 7.61305 18.1609C7.68428 18.0714 7.73765 17.9684 7.77011 17.8577C7.80257 17.7471 7.81349 17.6309 7.80223 17.5159L7.19688 11.3509Z" fill="black"/>
				</svg>
				<?php $cartTotal = WC()->cart->get_cart_contents_count(); ?>
				<?php if($cartTotal > 0){ ?>
					<p><?php echo $cartTotal ?></p>
				<?php } ?>
			</a>
		</div>
	</div>
    
	<div class="background-search"></div>
	<div class="search">

		<p>What are you looking for?</p>
		<div class="search__container">

			<svg class="close-icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
				<rect width="20.2112" height="2.02112" rx="1.01056" transform="matrix(0.701006 -0.713155 0.701006 0.713155 0.415039 14.4137)" fill="black"/>
				<rect width="20.2112" height="2.02112" rx="1.01056" transform="matrix(0.701006 0.713155 -0.701006 0.713155 1.41699 0.144775)" fill="black"/>
			</svg>

            <div class="search-input">
			    <label for="search-input"></label>
				<input id="search-input" type="text"/>
			</div>
            
			<div class="search__container__searching">
				<p class="heading">Related Pages</p>
				<div class="pages-container">
					<?php
						$args = array(
							'post_type' => 'page', // Retrieve pages
							'posts_per_page' => -1, // Retrieve all pages
						);

						$pages = new WP_Query($args);

						if ($pages->have_posts()) {
							while ($pages->have_posts()) {
								$pages->the_post();
								// Output or manipulate page data as needed
						?>
						<p><a href="<?php echo get_permalink() ?>"><?php echo get_the_title() ?></a></p>
						<?php
								// You can access other page data using WordPress functions like get_permalink(), get_the_content(), etc.
							}
							wp_reset_postdata(); // Reset the query
						}
					?>
				</div>
				<p class="heading">Related Products</p>
				<div class="product-container">
					<?php
					$args = array(
						'post_type'      => 'product',
						'posts_per_page' => -1, // Retrieve all products
					);

					$products = new WP_Query($args);

					if ($products->have_posts()) {
						while ($products->have_posts()) : $products->the_post();
							global $product;
							?>
							<div class="product-name">
							<a href="<?php echo get_permalink(); ?>">
								<?php
								$image_id = $product->get_image_id();
								if ($image_id) {
									$image_url = wp_get_attachment_image_url($image_id, 'medium'); // Change 'medium' to the desired image size
									if ($image_url) {
										?>
										<div class="product-name__image">
											<div style="background-image: url('<?php echo esc_url($image_url); ?>')" class="product-name__image__img"></div>
											<?php
												// Get the badges for the current product
												$product_terms = get_the_terms(get_the_ID(), 'badge_taxonomy');

												if ($product_terms && ! is_wp_error($product_terms)) {
													?>
													<div class="badge-container">
														<?php
														$count = 0;
														foreach ($product_terms as $term) {
															if ($count < 2) { // Display only the first two badges
																echo '<span class="badge">' . $term->name . '</span>';
																$count++;
															}
														}
														?>
													</div>
													<?php
												}
												?>
										</div>
										<?php
									}
								}
								?>
								<h2><?php echo get_the_title(); ?></h2>
								<span class="product-name__price">
									<?php
										$price = $product->get_price();

										if ($price) {
											echo 'from £' . number_format($price, 2);
										}
									?>
                                </span>
							</a>
							</div>
							<?php
						endwhile;

						wp_reset_postdata();
					}
					?>
					<div class="button-container"><a href="<?php echo get_home_url(); ?>/basket">
						<a href="<?php echo get_home_url(); ?>/shop" class="tertiary-button" id="show-more-btn">View More</a>
					</div>
				</div>
			</div>

		</div>
	</div>

	</header><!-- #masthead -->

	<?php
	/**
	 * Functions hooked in to storefront_before_content
	 *
	 * @hooked storefront_header_widget_region - 10
	 * @hooked woocommerce_breadcrumb - 10
	 */
	do_action( 'storefront_before_content' );
	?>

	<div id="content" class="site-content" tabindex="-1">
		<div>
		<?php
		do_action( 'storefront_content_top' );
