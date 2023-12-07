<?php ?>

<div class="product-infos">
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
                    <div class="line"></div>
                </div>
            </div>
        </div>
        <div>
            <?php echo $text ?>
        </div>
        <?php
        endwhile;
        ?>
        </div>
    <?php
    endif;
    ?>

</div>