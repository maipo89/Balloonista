<?php ?>

<div class="product-infos">
    <?php
    if( have_rows('informations') ): ?>
        <div class="product-infos__informations">
        <?php while( have_rows('informations') ) : the_row();

            $title = get_sub_field('title');
            $text = get_sub_field('text');
        ?>
        <h3><?php echo $title ?></h3>
        <div class="separator">
           <div class="line"></div>
           <div class="circle">
              <svg width="20" height="2" viewBox="0 0 20 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="20" height="2" rx="1" fill="white"/>
              </svg>
           </div>
           <div class="line"></div>
        </div>
        <p><?php echo $text ?></p>
        <?php
        endwhile;
        ?>
        </div>
    <?php
    endif;
    ?>

</div>