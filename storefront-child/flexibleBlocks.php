<?php

// Get the current post ID dynamically
$post_id = get_the_ID();

if( have_rows('flexible_content', $post_id) ):

    while ( have_rows('flexible_content', $post_id) ) : the_row();

        if( get_row_layout() == 'features' ): ?>
            <?php include 'blocks/features.php'; ?>
        <?php endif; 

        if( get_row_layout() == 'hero' ): ?>
            <?php include 'blocks/hero.php'; ?>
        <?php endif; 

        if( get_row_layout() == 'featured_products' ): ?>
            <?php include 'blocks/featured-products.php'; ?>
        <?php endif; 

        if( get_row_layout() == 'product_infos' ): ?>
            <?php include 'blocks/product-infos.php'; ?>
        <?php endif; 

        if( get_row_layout() == 'baloon_columns' ): ?>
            <?php include 'blocks/baloon-columns.php'; ?>
        <?php endif; 


        if( get_row_layout() == 'environment' ): ?>
            <?php include 'blocks/environment.php'; ?>
        <?php endif; 

        
    endwhile;

endif;


?>