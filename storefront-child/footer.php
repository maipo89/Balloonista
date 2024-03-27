<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>

		</div><!-- .col-full -->
	</div><!-- #content -->

	<?php do_action( 'storefront_before_footer' ); ?>

	<footer class="footer">

	   <div class="footer__wrapper">

	        <div class="footer__infos">

			    <div class="footer__infos__column">

				    <?php $logo = get_field('logo', 'option'); ?>

					<img src="<?php echo($logo["sizes"]["onqor-large"]) ?>" alt="<?php echo($logo["alt"]) ?>" />

					<?php wp_nav_menu(array(
    					'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
    					'container_class' => 'footer-links cf',         // class of container (should you choose to use it)
    					'menu' => __( 'Footer Contact', 'bonestheme' ),   // nav name
    					'menu_class' => 'nav footer-nav cf address-menu',            // adding custom nav class
    					'theme_location' => 'footer-links',             // where it's located in the theme
    					'before' => '',                                 // before the menu
    					'after' => '',                                  // after the menu
    					'link_before' => '',                            // before each link
    					'link_after' => '',                             // after each link
    					'depth' => 0,                                   // limit the depth of the nav
    					'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
					)); ?>

				</div>

				<div class="footer__infos__center__column">

					<div class="column">
						<?php wp_nav_menu(array(
							'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
							'container_class' => 'footer-links cf',         // class of container (should you choose to use it)
							'menu' => __( 'Footer Pages First', 'bonestheme' ),   // nav name
							'menu_class' => 'nav footer-nav cf address-menu',            // adding custom nav class
							'theme_location' => 'footer-links',             // where it's located in the theme
							'before' => '',                                 // before the menu
							'after' => '',                                  // after the menu
							'link_before' => '',                            // before each link
							'link_after' => '',                             // after each link
							'depth' => 0,                                   // limit the depth of the nav
							'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
						)); ?>
					</div>

					<div class="column">
						<?php wp_nav_menu(array(
							'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
							'container_class' => 'footer-links cf',         // class of container (should you choose to use it)
							'menu' => __( 'Footer Pages Second', 'bonestheme' ),   // nav name
							'menu_class' => 'nav footer-nav cf address-menu',            // adding custom nav class
							'theme_location' => 'footer-links',             // where it's located in the theme
							'before' => '',                                 // before the menu
							'after' => '',                                  // after the menu
							'link_before' => '',                            // before each link
							'link_after' => '',                             // after each link
							'depth' => 0,                                   // limit the depth of the nav
							'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
						)); ?>
					</div>

				</div>

				<div class="footer__infos__column">
					<?php wp_nav_menu(array(
						'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
						'container_class' => 'footer-links cf',         // class of container (should you choose to use it)
						'menu' => __( 'Footer Socials', 'bonestheme' ),   // nav name
						'menu_class' => 'nav footer-nav cf address-menu',            // adding custom nav class
						'theme_location' => 'footer-links',             // where it's located in the theme
						'before' => '',                                 // before the menu
						'after' => '',                                  // after the menu
						'link_before' => '',                            // before each link
						'link_after' => '',                             // after each link
						'depth' => 0,                                   // limit the depth of the nav
						'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
					)); ?>
				</div>

			</div>

			<div class="footer__social__mobile" >
				<?php $badge_image = get_field('badge', 'option'); ?>
				<?php $badge_url = get_field('badge_url', 'option'); ?>

				<?php while ( have_rows( 'social', 'options' ) ) : the_row(); ?>
				<?php $linkSocial = get_sub_field( 'link' ); ?>
				<?php $imageSocial = get_sub_field( 'image' ); ?>
					<a target="_blank" href="<?php echo($linkSocial) ?>">
						<img alt="<?php echo($imageSocial["alt"]) ?>" src="<?php echo($imageSocial["sizes"]["onqor-large"]) ?>" />
					</a>
				<?php endwhile; ?>
				<a class="badge" href="<?php echo($badge_url) ?>">
					<img alt="<?php echo($badge_image["alt"]) ?>" src="<?php echo($badge_image["sizes"]["onqor-large"]) ?>"/>
				</a>
			</div>

			<div class="footer__form">
				<p>Sign up to our newsletter:</p>
				<div id="form3" class="_form_3"></div>
				<script src="https://balloonista.activehosted.com/f/embed.php?id=3" charset="utf-8"></script>
			</div>

			<div class="footer__legal">

                <a href="<?php echo($badge_url) ?>">
					<img alt="<?php echo($badge_image["alt"]) ?>" src="<?php echo($badge_image["sizes"]["onqor-large"]) ?>"/>
				</a>
				<div class="footer__legal__text" >
					<p>Copyright © 2023 Balloonista Ltd | Company Registration Number: 10395529 | VAT Registration No: GB345125323 | <a href="<?php echo get_home_url(); ?>/privacy-policy">Legals</a>
					</p>
					<p>Registered Address: Balloonista Ltd, 1 Kingfisher House, Crayfields Business Park, New Mill Road, London, BR5 3QG</p>
				</div>
				
			</div>

			<div id="cookie-banner" class="cookie-banner">
				<div class="cookie-banner__container">
					<div class="cookie-banner__content">
						<div>
							<h5>Our use of cookies</h5>
							<p>ballonista.com uses cookies, some are necessary for the operation of the website and some are designed to improve your experience. For more information, <a href="<?php echo get_home_url(); ?>/cookie-policy">click here</a>.</p>
						</div>
						<div>
							<h5>Necessary cookies</h5>
							<p>Are essential to move around ballonista.com and use its core functionality and enhanced features. Without these cookies, services you have asked for cannot be provided.</p>
						</div>
					</div>
					<div class="cookie-banner__content">
						<div>
							<h5>Functional cookies</h5>
							<p>Allow ballonista.com to remember choices you make to give you better functionality and personal features.</p>
							<label class="switch">
								<input id="functional-cookies" type="checkbox">
								<span class="slider round"></span>
							</label>
						</div>
						<div>
							<h5>Performance cookies</h5>
							<p>Help improve the performance of ballonista.com by collecting and reporting information about how you use the website.</p>
							<label class="switch">
								<input id="performance-cookies" type="checkbox">
								<span class="slider round"></span>
							</label>
						</div>
					</div>
					<svg id="cookie-svg" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
						<rect width="3.64861" height="24.3241" rx="1.82431" transform="matrix(0.699152 -0.714973 0.699152 0.714973 0 2.6084)" fill="#FFFFFF"/>
						<rect width="3.64861" height="24.3241" rx="1.82431" transform="matrix(0.699152 0.714973 -0.699152 0.714973 17.449 0)" fill="#FFFFFF"/>
					</svg>
				</div>
			</div>

		</div>
		
	</footer><!-- #colophon -->

	<?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
