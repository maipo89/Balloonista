<?php $heroTitle = get_sub_field('hero_title'); ?>
<?php $paragraph = get_sub_field('paragraph'); ?>
<?php $button = get_sub_field('button'); ?>
<?php $buttonText = get_sub_field('button_text'); ?>
<?php $buttonLink = get_sub_field('button_link'); ?>
<?php $gallery = get_sub_field('gallery'); ?>
<?php $staticImage = get_sub_field('image'); ?>
<?php $heroImage = get_sub_field('hero_image'); ?>
<?php $breadcrumb = get_sub_field('breadcrumb'); ?>
<?php $blogPage = get_sub_field('blog_page'); ?>
<?php $title = get_the_title(); ?>
<?php $author = get_the_author(); ?>
<?php $featuredProducts = get_sub_field('featured_products'); ?>
<?php $testimonialSection = get_sub_field('testimonial_section'); ?>
<?php $testimonialTitle = get_sub_field('testimonial_title'); ?>
<?php $productsTitle = get_sub_field('products_title'); ?>
<?php $buttonTextProducts = get_sub_field('button_text_products'); ?>
<?php $buttonLinkProducts = get_sub_field('button_link_products'); ?>

<div class="hero__container">
    <div class="hero <?php echo($featuredProducts ? '' : 'child-pages')?> <?php echo($blogPage ? 'blog-pages' : '')?>">
        <div class="hero__wrapper">
            <?php if($breadcrumb): ?>
                <div class="hero__wrapper__breadcrumb">
                    <a href="<?php echo get_home_url(); ?>">Home</a>
                    <a href="<?php echo get_home_url(); ?>/blogs">Blogs</a>
                    <p><?php echo $title ?></p>
                </div>
            <?php 
            endif;
            ?>
            <div class="hero__wrapper__text">
                <h1><?php echo($heroTitle) ?></h1>
                <?php if($paragraph) : ?><p><?php echo($paragraph) ?></p><?php endif; ?>
                <?php if($blogPage): ?>
                    <p class="author"><?php echo $author ?></p>
                    <p class="date">
                    <?php
                        $post_id = get_the_ID(); // Get the current post ID
                        $publish_date = get_the_time('d/m/Y', $post_id); // Format the date
                        echo $publish_date;
                    ?>
                    </p>
                <?php 
                endif;
                ?>
            </div>
            <?php if($button): ?>
                <div class="hero__wrapper__button">
                    <a class="primary-button" href="<?php echo($buttonLink) ?>"><?php echo($buttonText) ?></a>
                </div>
            <?php 
            endif;
            ?>
        </div>
        <!-- <div class="hero__space"></div> -->
        <?php if( !$staticImage ): ?>
            <?php if( have_rows('gallery') ): ?>
                <div class="hero__gallery">
                    <div class="hero__gallery__container">
                        <?php 
                        while( have_rows('gallery') ) : the_row();
                        $image = get_sub_field('image');
                        ?>
                            <div class="hero__gallery__image" style="background-image: url(<?php echo($image["sizes"]["onqor-large"]) ?>)">
                            </div>
                        <?php 
                        endwhile;
                        ?>
                    </div>
                </div>
            <?php 
            endif;
            ?>
        <?php 
        endif;
        ?>
        <?php if( $staticImage ): ?>
            <div class="hero__image" style="background-image: url(<?php echo($heroImage["sizes"]["onqor-large"]) ?>)" >
            </div>
        <?php 
        endif;
        ?>
        
    </div>
    <?php if( $featuredProducts ): ?>
        <div class="featured-products">
            
            <div class="featured-products__general-container">
            <?php
                if (have_rows('products')):
            ?> 
                <p class="featured-products__title"><?php echo $productsTitle ?></p>
                <div class="featured-products__container-products">
                    <?php
                    while (have_rows('products')) : the_row();

                        $product_post = get_sub_field('product');

                        if ($product_post instanceof WP_Post): // Check if it's a WP_Post object

                            $product_id = $product_post->ID;

                            // Get product image URL (assuming it's a featured image)
                            $image_url = get_the_post_thumbnail_url($product_id);

                            // Get product title
                            $title = get_the_title($product_id);

                            // Get product permalink
                            $product_permalink = get_permalink($product_id);

                            // Get product price (replace 'price' with your actual custom field name)
                            $price = get_post_meta($product_id, '_price', true);

                            // Get product badge (replace 'badge_taxonomy' with your actual taxonomy name)
                            // Get all badges associated with the product (replace 'badge_taxonomy' with your actual taxonomy name)
                            $badge_terms = wp_get_post_terms($product_id, 'badge_taxonomy');

                            // Output HTML with product information
                            ?>
                            <a class="featured-products__product" href="<?php echo $product_permalink ?>" >
                                <div>
                                    <div class="featured-products__product__image">
                                        <div class="featured-products__product__image__img" style="background-image: url(<?php echo $image_url; ?>);"></div>
                                        <p class="primary-button">View</p>
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
                                    <div class="featured-products__product__title">
                                        <p><?php echo $title; ?></p>
                                        <p>
                                            <?php 										
                                                if ($price) {
                                                    echo 'from £' . number_format($price, 2);
                                                }
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <?php
                        endif;

                    endwhile;
                    ?>
                </div>
                <div class="featured-products__button">
                    <a class="primary-button" href="<?php echo $buttonLinkProducts ?>"><?php echo $buttonTextProducts ?></a>
                </div>
                <?php
                endif;
                ?>
                <?php
                    if ($testimonialSection) :
                ?>
                <div class="featured-products__testimonial">
                    <h2><?php echo $testimonialTitle ?></h2>
                        <?php

                            if( have_rows('testimonials') ):
                        ?>

                        <div class="featured-products__testimonial__slider">
                        <?php

                                while( have_rows('testimonials') ) : the_row();

                                    $author = get_sub_field('author');
                                    $paragraph = get_sub_field('paragraph');
                                    $logo = get_sub_field('logo');
                                    $rating = get_sub_field('rating');
                        ?>
                            <div class="featured-products__testimonial__slider__slide">
                                <div class="featured-products__testimonial__slider__author"> 
                                    <h3><?php echo $author ?></h3>
                                    <img src="<?php echo($logo["sizes"]["onqor-large"]) ?>" alt="<?php echo($logo["alt"]) ?>"/>
                                    <img class="rating" src="<?php echo($rating["sizes"]["onqor-large"]) ?>" alt="<?php echo($rating["alt"]) ?>"/>
                                </div>
                                <p><?php echo $paragraph ?></p>
                            </div>
                        <?php

                                endwhile;
                        ?>
                        </div>
                        <?php

                            endif;

                        ?>
                    </div>
                </div>
                <?php
                    endif;
                ?>
                <?php
                
            ?>
            </div>

        </div>
    <?php 
    endif;
    ?>
</div>