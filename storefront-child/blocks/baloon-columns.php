<?php $mainTitle = get_sub_field('title'); ?>
<?php $text = get_sub_field('text'); ?>
<?php $button = get_sub_field('button'); ?>
<?php $buttonText = get_sub_field('button_text'); ?>
<?php $buttonLink = get_sub_field('button_link'); ?>
<?php $titleTop = get_sub_field('title_top'); ?>
<?php $sliderClients = get_sub_field('slider_clients'); ?>
<?php $marginBottom = get_sub_field('higher_margin_bottom'); ?>

<div class="baloon-colums <?php echo($titleTop ? 'title-top' : '')?> <?php echo($marginBottom ? 'higher-margins' : '') ?>">
        <?php if( have_rows('slider') ) : $index = 0;  ?>
            <?php while( have_rows('slider') ): the_row(); 
                $title = get_sub_field('title');
        ?>
                <h2 data-index="<?php echo $index; ?>" class="baloon-colums__title-mobile"><?php echo $title ?></h2>
            <?php $index++; ?>
           <?php endwhile; ?>
        <?php endif; ?>
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

        <div class="baloon-colums__slider-container">

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
                    <?php if( have_rows('slider') ) : $index = 0;  ?>
                        <?php while( have_rows('slider') ): the_row(); 
                            $title = get_sub_field('title');
                            $text = get_sub_field('text');
                            $button = get_sub_field('button');
                            $buttonLink = get_sub_field('button_link');
                            $buttonText = get_sub_field('button_text');
                            ?>
                        <div class="baloon-colums__text__item" data-index="<?php echo $index; ?>">
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
                        <?php $index++; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
            </div>

        </div>
    </div>
</div> 
<?php if($sliderClients) : ?>
    <?php if( have_rows('clients') ): ?>
        <div class="baloon-colums__slider-clients__wrapper">
            <div class="baloon-colums__slider-clients__inner">
                <?php while( have_rows('clients') ): the_row(); 
                    $image = get_sub_field('image');
                    ?>
                    <div class="baloon-colums__slider-clients__image">
                        <img src="<?php echo esc_url($image['sizes']['onqor-large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>

