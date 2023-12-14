<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

?>
<div class="shop-page">
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
            <?php
                global $product;
            ?>
            <a href="<?php echo get_home_url(); ?>">Home</a>
            <a href="<?php echo get_home_url(); ?>/shop">Shop</a>
            <p>All Products</p>
        </div>
    </div>
    <?php

        $args = array(
            'post_type'      => 'product',
            'posts_per_page' => 12,
            'paged' => ( get_query_var('page') ? get_query_var('page') : 1),
        );

        // Check if the orderby parameter is set to 'popularity'
        if (isset($_GET['orderby']) && $_GET['orderby'] === 'popularity') {
            $args['orderby']  = 'meta_value_num';
            $args['meta_key'] = 'total_sales';
            $args['order']    = 'desc';
        }

        else if (isset($_GET['orderby']) && $_GET['orderby'] === 'price_low_to_high') {
            $args['orderby']  = 'meta_value_num';
            $args['meta_key'] = '_price';
            $args['order']    = 'asc';
        }

        else if (isset($_GET['orderby']) && $_GET['orderby'] === 'price_high_to_low') {
            $args['orderby']  = 'meta_value_num';
            $args['meta_key'] = '_price';
            $args['order']    = 'desc';
        }

        else if (isset($_GET['orderby']) && $_GET['orderby'] === 'best_selling') {
            $args['orderby']  = 'meta_value_num';
            $args['meta_key'] = 'total_sales';
            $args['order']    = 'desc';
        }

        else if (isset($_GET['orderby']) && $_GET['orderby'] === 'featured') {
            $args['meta_key']   = '_featured';
            $args['meta_value'] = 'yes';
            $args['order']      = 'desc';
        }

        else if (isset($_GET['orderby']) && $_GET['orderby'] === 'name_a_to_z') {
            $args['orderby']  = 'title';
            $args['order']    = 'asc';
        }

        if (isset($_GET['category'])) {
            // Get the category parameter from the URL
            $category_param = $_GET['category'];
        
            // Split the category parameter into an array of category slugs
            $category_slugs = explode(',', $category_param);
        
            // Use tax_query to filter products by category
            $tax_query = array(
                'relation' => 'AND', // Use AND for filtering by multiple categories
            );
        
            foreach ($category_slugs as $category_slug) {
                if ($category_slug) {
                    $tax_query[] = array(
                        'taxonomy' => 'product_cat',
                        'field'    => 'slug',
                        'terms'    => $category_slug,
                        'operator' => 'IN',
                    );
                }
            }
        
            $args['tax_query'] = $tax_query;
        }
        

        $query = new WP_Query($args);

        $product_categories = get_terms(array(
            'taxonomy'   => 'product_cat',
            'hide_empty' => true, // Exclude empty categories
            'object_ids' => $query->posts ? wp_list_pluck($query->posts, 'ID') : array(),

        ));
    ?>

    <div class="shop">
        <div class="shop__filter">
            <?php
                if (!empty($product_categories) && !is_wp_error($product_categories)) {
                    // Loop through each category
                    foreach ($product_categories as $category) {
                ?>
                        <div>
                            <input type="checkbox" id="<?php echo $category->slug ?>" name="<?php echo $category->slug ?>" <?php echo strpos($_SERVER['REQUEST_URI'], $category->slug) !== false ? 'checked' : ''; ?>>
                            <label for="<?php echo $category->slug ?>"><?php echo $category->name ?></label>            
                        </div>
            <?php
                    }
                }
            ?>
            <!-- <p class="subtitle">Balloon Type:</p> -->
            <div>
                <input type="checkbox" id="helium-balloons" name="helium-balloons">
                <label for="helium-balloons">Helium Balloons</label>            
            </div>
            <!-- <p class="subtitle">Occasion:</p>
            <p class="subtitle">By Product:</p> -->
        </div>
        <div class="shop__container">
            <div class="shop__container__top">
                <?php $image = get_field('image', 'option'); ?>
                <?php $title = get_field('title', 'option'); ?>
                <?php $text = get_field('text', 'option'); ?>
                <?php $button = get_field('button', 'option'); ?>
                <?php $buttonText = get_field('button_text', 'option'); ?>
                <?php $buttonLink = get_field('button_link', 'option'); ?>
                <div class="shop__container__top__image" style="background-image: url(<?php echo($image["sizes"]["onqor-large"]) ?>">
                </div>
                <div class="shop__container__top__text-button">
                    <div class="shop__container__top__text-button__text">
                        <h1><?php echo $title ?></h1>
                        <p><?php echo $text ?></p>
                    </div>
                    <?php if($button): ?>
                        <div class="shop__container__top__text-button__button">
                            <a class="primary-button" href="<?php echo $buttonLink ?>" ><?php echo $buttonText ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php if($button): ?>
                <div class="shop__container__button-mobile">
                    <a class="primary-button" href="<?php echo $buttonLink ?>" ><?php echo $buttonText ?></a>
                </div>
            <?php endif; ?>
            <div class="shadow"></div>
            <div class="shop__container__buttons">
                <div class="filter-button">
                    <div class="filter-button__button">
                        <span>
                            Filter
                        </span>
                        <svg class="filter-icon" width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect y="1.63672" width="20" height="1.63636" rx="0.818182" fill="#D9E7E1"/>
                            <rect y="8.18262" width="20" height="1.63636" rx="0.818182" fill="#D9E7E1"/>
                            <rect y="14.7275" width="20" height="1.63636" rx="0.818182" fill="#D9E7E1"/>
                            <path d="M5.91602 2.45455C5.91602 3.38303 5.14555 4.15909 4.16602 4.15909C3.18648 4.15909 2.41602 3.38303 2.41602 2.45455C2.41602 1.52607 3.18648 0.75 4.16602 0.75C5.14555 0.75 5.91602 1.52607 5.91602 2.45455Z" fill="white" stroke="#D9E7E1" stroke-width="1.5"/>
                            <path d="M17.584 9.00044C17.584 9.92892 16.8135 10.705 15.834 10.705C14.8545 10.705 14.084 9.92892 14.084 9.00044C14.084 8.07196 14.8545 7.2959 15.834 7.2959C16.8135 7.2959 17.584 8.07196 17.584 9.00044Z" fill="white" stroke="#D9E7E1" stroke-width="1.5"/>
                            <path d="M5.91602 15.5454C5.91602 16.4738 5.14555 17.2499 4.16602 17.2499C3.18648 17.2499 2.41602 16.4738 2.41602 15.5454C2.41602 14.6169 3.18648 13.8408 4.16602 13.8408C5.14555 13.8408 5.91602 14.6169 5.91602 15.5454Z" fill="white" stroke="#D9E7E1" stroke-width="1.5"/>
                        </svg>
                        <svg class="close-button" width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="18.9684" height="1.89684" rx="0.948422" transform="matrix(0.746936 -0.664896 0.746936 0.664896 0.414062 12.6123)" fill="#70B095"/>
                            <rect width="18.9684" height="1.89684" rx="0.948422" transform="matrix(0.746936 0.664896 -0.746936 0.664896 1.41797 0.126953)" fill="#70B095"/>
                        </svg>
                    </div>
                </div>
                <div class="filter-button__filters">
                    <!-- <p class="subtitle">Balloon Type:</p> -->
                    <div class="filter-button__filters__filter">
                    <?php
                            if (!empty($product_categories) && !is_wp_error($product_categories)) {
                                // Loop through each category
                                foreach ($product_categories as $category) {
                            ?>
                                    <div>
                                        <input type="checkbox" id="<?php echo $category->slug ?>" name="<?php echo $category->slug ?>" <?php echo strpos($_SERVER['REQUEST_URI'], $category->slug) !== false ? 'checked' : ''; ?>>
                                        <label for="<?php echo $category->slug ?>"><?php echo $category->name ?></label>            
                                    </div>
                        <?php
                                }
                            }
                        ?>
                    </div>
                    <!-- <p class="subtitle">Occasion:</p>
                    <div class="filter-button__filters__filter">
                        <div>
                            <input type="checkbox" id="helium-balloons" name="helium-balloons">
                            <label for="helium-balloons">Helium Balloons</label>            
                        </div>
                    </div>
                    <p class="subtitle">By Product:</p>
                    <div class="filter-button__filters__filter product">
                        <div>
                            <input type="checkbox" id="helium-balloons" name="helium-balloons">
                            <label for="helium-balloons">Helium Balloons</label>            
                        </div>
                    </div> -->
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="25.2641" height="2.52641" rx="1.2632" transform="matrix(0.701006 -0.713155 0.701006 0.713155 0.519531 18.0176)" fill="#70B095"/>
                        <rect width="25.2641" height="2.52641" rx="1.2632" transform="matrix(0.701006 0.713155 -0.701006 0.713155 1.77148 0.180664)" fill="#70B095"/>
                    </svg>
                </div>
                <div class="select-wrapper">
                    <div class="select">
                        <input class="sort-input" type="text" name="sort-input" value=""/>
                        <div class="select__trigger">
                            <span>
                                <?php
                                if (isset($_GET['orderby']) && $_GET['orderby'] === 'popularity') {
                                    echo 'Popularity';
                                }
                        
                                else if (isset($_GET['orderby']) && $_GET['orderby'] === 'price_low_to_high') {
                                    echo 'Low to High';
                                }
                        
                                else if (isset($_GET['orderby']) && $_GET['orderby'] === 'price_high_to_low') {
                                    echo 'High to Low';
                                }
                        
                                else if (isset($_GET['orderby']) && $_GET['orderby'] === 'best_selling') {
                                    echo 'Best Selling';
                                }
                        
                                else if (isset($_GET['orderby']) && $_GET['orderby'] === 'featured') {
                                    echo 'Featured';
                                }
                        
                                else if (isset($_GET['orderby']) && $_GET['orderby'] === 'name_a_to_z') {
                                    echo 'Name: A to Z';
                                }
                                else {
                                    echo 'Sort';
                                }
                                ?>
                            </span>
                            <div class="arrow"></div>
                        </div>
                            <div class="custom-options">
                                <a>
                                    <span class="custom-option" data-value="popularity">Popularity</span>
                                </a>
                                <a>
                                    <span class="custom-option" data-value="best_selling">Best Selling</span>
                                </a>
                                <a>
                                    <span class="custom-option" data-value="featured">Featured</span>
                                </a>
                                <a>
                                    <span class="custom-option" data-value="price_low_to_high">Price: Low to High</span>
                                </a>
                                <a>
                                    <span class="custom-option" data-value="price_high_to_low">Price: High to Low</span>
                                </a>
                                <a>
                                    <span class="custom-option" data-value="name_a_to_z">Name: A to Z</span>
                                </a>
                            </div>
                    </div>
                </div>
            </div>
            <div class="shop__container__content">
                <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                
                    <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'single-post-thumbnail'); 
                        $product_id = $post->ID;
                        $badge_terms = wp_get_post_terms($product_id, 'badge_taxonomy');?>
                    
                    <div class="shop__card">
                        <a href="<?php the_permalink() ?>">
                            <div class="shop__card__image" style="background-image: url('<?php echo esc_url($image[0]); ?>');">
                                <ul>
                                    <?php
                                        // Display only the first two badges
                                        $badge_counter = 0;
                                        foreach ($badge_terms as $badge_term):
                                            if ($badge_counter >= 2) {
                                                break;
                                            }
                                            ?>
                                            <li><?php echo $badge_term->name; ?></li>
                                            <?php
                                            $badge_counter++;
                                        endforeach;
                                    ?>
                                </ul>
                            </div>
                        </a>
                        <div class="shop__card__description">
                            <h2><?php the_title(); ?></h2>
                            <p>From £<?php echo number_format($product->get_price(), 2); ?></p>
                        </div>
                    </div>

                <?php endwhile; ?>

                <?php else : ?>
                    <p>No products found</p>
                <?php endif; ?>
            </div>

            <!-- Pagination links outside the container -->
            <div class="pagination">
                <?php
                echo paginate_links(array(
                    'total'      => $query->max_num_pages,
                    'prev_text'  => '<svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 1L1.78885 6.10557C1.05181 6.4741 1.05181 7.5259 1.78885 7.89443L12 13" stroke="#D9E7E1" stroke-width="2" stroke-linecap="round"/></svg>',
                    'next_text'  => '<svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.999999 13L11.2111 7.89443C11.9482 7.5259 11.9482 6.4741 11.2111 6.10557L1 0.999999" stroke="#D9E7E1" stroke-width="2" stroke-linecap="round"/></svg>',
                ));
                ?>
            </div>
        </div>
    </div>
</div>

<?php wp_reset_postdata(); // Reset post data after the loop ?>


<?php

get_footer();
