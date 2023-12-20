<div class="global-featured-products" >
    <?php
    $featuredProducts = get_field('featured_products', 'option');
    // var_dump($featuredProducts);
    $prods = $featuredProducts['products'];
    // var_dump($prods[0]);
    
    ?>
    <h3>Featured</h3>
    <div class="global-featured-products__container">
        <?php if (have_rows('global_featured_products_repeater', 'option')): ?>
            <?php while (have_rows('global_featured_products_repeater', 'option')): the_row(); 
                $product_post_object = get_sub_field('product');
                $product = wc_get_product( $product_post_object->ID ); // This should be the post object if set correctly in ACF.
                $price = $product->get_price();
                $link = get_permalink( $product_post_object->ID );
                ?> 
                <!-- <?php var_dump($product_post_object); ?> -->
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
                </div>
                <?php
            endwhile; ?>
        <?php endif; ?>
    </div>
</div>