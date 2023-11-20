<?php ?>

<div class="product-infos">
    qdqwdqwdqw
    <?php
    if( have_rows('informations') ): ?>
        <div class="product-infos__informations" id="product_info">
        <?php while( have_rows('informations') ) : the_row();

            $title = get_sub_field('title');
            $text = get_sub_field('text');
        ?>
        <div class="product-infos__button">
            <h3><?php echo $title ?></h3>
            <div class="product-infos__button-ui">
                <div class="line"></div>
                <div class="circle">
                    <svg width="20" height="2" viewBox="0 0 20 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="20" height="2" rx="1" fill="white"/>
                    </svg>
                </div>
                <div class="line"></div>
            </div>
        </div>
        <div>
            <p><?php echo $text ?></p>
        </div>
        <?php
        endwhile;
        ?>
        </div>
    <?php
    endif;
    ?>

</div>