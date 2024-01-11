<div class="global-featured-products" >
    <?php

    // var_dump($prods[0]);
    $title = get_sub_field('title');
    $CTAlink = get_sub_field('cta');
    
    ?>
    <h3><?php echo $title ?></h3>
    <div class="global-featured-products__container">
        <?php if (have_rows('products')): ?>
            <?php while (have_rows('products')): the_row(); 
                $isCustom = get_sub_field('create_custom_item');
                if ($isCustom) {
                    $customItem = get_sub_field('custom_item');
                    ?>
                    <div class="global-featured-products__item global-featured-products__item--custom">
                        <div class="global-featured-products__image">
                            <img src="<?php echo $customItem["image"]["sizes"]["medium"]; ?>" />
                        </div>
                        <p><?php echo $customItem['title'] ?></p>
                        <a href="<?php echo $customItem["page"] ?>"></a>
                    </div> <?php
                } else { 
                    $product_post_object = get_sub_field('products');
                    $product = wc_get_product( $product_post_object->ID ); // This should be the post object if set correctly in ACF.
                    $price = $product->get_price();
                    $link = get_permalink( $product_post_object->ID );
                    ?> 
                 
                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $product_post_object->ID ), 'single-post-thumbnail' );?>
                    <div class="global-featured-products__item">
                        <div class="global-featured-products__image">
                            <img src="<?php echo $image[0] ?>" />
                            <div class="global-featured-products__terms">
                            <?php 
                                $termsTwo = get_the_terms( $product_post_object->ID , 'badge_taxonomy' ); 
                                if (!is_wp_error($terms) && !empty($terms)) {
                                    foreach ( $termsTwo as $term ) {
                                        echo '<p>' . $term->name . '</p>';
                                    } 
                                }
                            ?>
                        </div>
                        </div>
                        <p><?php echo $product_post_object->post_title ?> <span>From £<?php echo $price ?></span> </p>
                        <a href="<?php echo $link ?>"></a>
                    </div> <?php
                }
            endwhile; ?>
        <?php endif; ?>
    </div>
    <?php if($CTAlink['title']){ ?>
        <div class="global-featured-products__button-container" >
            <a class="global-featured-products__CTA" href=" <?php echo $CTAlink['url']; ?>">
                <?php echo $CTAlink['title']; ?>
            </a>
        </div>
    <?php } ?>
</div>