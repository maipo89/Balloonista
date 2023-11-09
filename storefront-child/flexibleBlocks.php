<?php

if( have_rows('flexible_content') ):

    while ( have_rows('flexible_content') ) : the_row();

        if( get_row_layout() == 'features' ): ?>
            <?php include 'blocks/features.php'; ?>
        <?php endif; 

        if( get_row_layout() == 'hero' ): ?>
            <?php include 'blocks/hero.php'; ?>
        <?php endif; 
        
    endwhile;

endif;


?>