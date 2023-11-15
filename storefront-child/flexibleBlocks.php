<?php

if( have_rows('flexible_content') ):

    while ( have_rows('flexible_content') ) : the_row();

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

        
    endwhile;

endif;


?>