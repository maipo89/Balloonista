<?php $title = get_sub_field('title'); ?>
<?php $text = get_sub_field('text'); ?>
<?php $button = get_sub_field('button'); ?>
<?php $buttonText = get_sub_field('button_text'); ?>
<?php $buttonLink = get_sub_field('button_link'); ?>
<?php $titleTop = get_sub_field('title_top'); ?>
<?php $sliderClients = get_sub_field('slider_clients'); ?>
<?php $marginBottom = get_sub_field('higher_margin_bottom'); ?>

<div class="baloon-colums <?php echo($titleTop ? 'title-top' : '')?> <?php echo($marginBottom ? 'higher-margins' : '') ?>">
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

        <div class="baloon-colums__swiper">

                <?php if( have_rows('slider') ): ?>
                    <?php while( have_rows('slider') ): the_row(); 
                        $image = get_sub_field('image');
                        ?>
                        <div class="baloon-colums__swiper__slide">
                            <img src="<?php echo esc_url($image['sizes']['onqor-large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>

        </div>
        
        <div class="baloon-colums__text">
            <?php if($title) : ?>
                <h2><?php echo $title ?></h2>
            <?php endif; ?>
            <?php if($text) : ?>
                <p><?php echo $text ?></p>
            <?php endif; ?>
            <?php if($button) : ?>
                <div class="baloon-colums__text__button">
                    <a class="primary-button" href="<?php echo $buttonLink ?>"><?php echo $buttonText ?></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php if($sliderClients) : ?>
    <?php if( have_rows('clients') ): ?>
        <div class="baloon-colums__slider-clients">
            <?php while( have_rows('clients') ): the_row(); 
                $image = get_sub_field('image');
                ?>
                <div class="baloon-colums__slider-clients__image">
                    <img src="<?php echo esc_url($image['sizes']['onqor-large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
<?php endif; ?>

