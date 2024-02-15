<?php ?>

<div class="product-infos">
    <?php
    if( have_rows('informations') ): ?>
        <?php while( have_rows('informations') ) : the_row();

            $title = get_sub_field('title');
            $text = get_sub_field('text');

            if ($title === "Delivery") {
                // If it matches, set the default text
                $default_text = "Every package is hand-delivered by courier anywhere in mainland UK, ensuring your celebrations start without a hitch. We have a variety of delivery options that you can select on the checkout page. Alternatively, take advantage of our Balloonista Click & Collect service, available free of charge from our HQ in South East London/Kent.";
                // If the text is empty, use the default text
                $text = !empty($text) ? $text : $default_text;
            }
        ?>
            <div class="product-infos__informations">
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
            </div>
        <?php
        endwhile;
        ?>
    <?php
    endif;
    ?>

</div>