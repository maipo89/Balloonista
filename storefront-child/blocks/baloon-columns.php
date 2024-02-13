<?php $mainTitle = get_sub_field('title'); ?>
<?php $text = get_sub_field('text'); ?>
<?php $button = get_sub_field('button'); ?>
<?php $buttonText = get_sub_field('button_text'); ?>
<?php $buttonLink = get_sub_field('button_link'); ?>
<?php $sliderClients = get_sub_field('slider_clients'); ?>
<?php $slider = get_sub_field('slider'); ?>
<?php $marginBottom = get_sub_field('higher_margin_bottom'); ?>

<div class="baloon-colums <?php echo($marginBottom ? 'higher-margins' : '') ?>">
        <!-- title mobile !-->
        <?php if( have_rows('slider') ) : $index = 0;  ?>
            <?php while( have_rows('slider') ): the_row(); 
                $title = get_sub_field('title');
        ?>      <?php if($title) : ?>
                    <h2 data-index="<?php echo $index; ?>" class="baloon-colums__title-mobile"><?php echo $title ?></h2>
                <?php endif; ?>
            <?php $index++; ?>
           <?php endwhile; ?>
        <?php endif; ?>

        <!-- title top !-->
        <?php if( have_rows('slider') ) : $index = 0;  ?>
            <?php while( have_rows('slider') ): the_row(); 
                $titleTop = get_sub_field('title_top');
            ?>
                <?php if ($titleTop) : ?>
                    <h2 data-index="<?php echo $index; ?>" class="baloon-colums__slider-container__top-title"><?php echo $titleTop ?></h2>
                <?php endif; ?>
            <?php $index++; ?>
            <?php endwhile; ?>
        <?php endif; ?>

        <!-- slider gallery mobile !-->
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
        

        <!-- slider desktop !-->
        <div class="baloon-colums__slider-container">

        <!-- < or = 5 no slider !-->

        <?php $slider_length = count($slider);
        if($slider_length <= 5) : ?>
            <div class="baloon-colums__no-slider">

                <?php if( have_rows('slider') ):
                    $index = 0;
                ?>
                    <?php while( have_rows('slider') ): the_row(); 
                        $image = get_sub_field('image');
                        ?>
                        <div class="baloon-colums__no-slider__image <?php echo ($index === 0) ? 'active' : ''; ?>" data-index="<?php echo $index; ?>">
                            <img src="<?php echo esc_url($image['sizes']['onqor-large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                        </div>
                    <?php $index++; ?>
                    <?php endwhile; ?>
                <?php endif; ?>

            </div>
        <?php endif; ?>

        <!-- slider desktop !-->

        <?php if($slider_length > 5) : ?>
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
        <?php endif; ?>

        <!-- text and title sliders !-->

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

<!-- slider clients !-->
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

