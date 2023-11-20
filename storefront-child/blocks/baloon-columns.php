<?php $title = get_sub_field('title'); ?>
<?php $text = get_sub_field('text'); ?>
<?php $buttonText = get_sub_field('button_text'); ?>
<?php $buttonLink = get_sub_field('button_link'); ?>

<div class="baloon-colums">
        <h2 class="baloon-colums__title-mobile"><?php echo $title ?></h2>
        <div class="baloon-colums__slider">

            <div class="baloon-colums__slider__main">
                <?php if( have_rows('slider') ): ?>
                    <?php while( have_rows('slider') ): the_row(); 
                        $image = get_sub_field('image');
                        ?>
                        <div class="baloon-colums__slider__main__slider">
                            <img class="baloon-colums__slider__main__image" src="<?php echo esc_url($image['sizes']['onqor-large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="baloon-colums__slider__gallery">
                <?php if( have_rows('slider') ): ?>
                    <?php while( have_rows('slider') ): the_row(); 
                        $image = get_sub_field('image');
                        ?>
                        <div class="baloon-colums__slider__gallery__slide">
                            <img src="<?php echo esc_url($image['sizes']['onqor-large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>

        </div>
        <div class="baloon-colums__text">
            <h2><?php echo $title ?></h2>
            <p><?php echo $text ?></p>
            <div class="baloon-colums__text__button">
                <a class="primary-button" href="<?php echo $buttonLink ?>"><?php echo $buttonText ?></a>
            </div>
        </div>
    </div>
</div>

