<?php $image = get_sub_field('image'); ?>
<?php $linkEnvironmentalPolicy = get_sub_field('link_environmental_policy'); ?>
<?php $textEnvironmentalPolicy = get_sub_field('text_environmental_policy'); ?>
<?php $title = get_sub_field('title'); ?>
<?php $marginBottom = get_sub_field('higher_margin_bottom'); ?>

<div class="environment <?php echo($marginBottom ? 'higher-margins' : '') ?>">
    <?php if( $image ): ?>
        <div class="environment__image" style="background-image: url(<?php echo($image["sizes"]["onqor-large"]) ?>)"></div>
    <?php endif; ?>
    <h3><?php echo $title ?></h3>
    <div class="environment__text__container">
        <?php if( have_rows('text_section_left') ): ?>
            <div class="environment__text">
                <?php while( have_rows('text_section_left') ): the_row(); 
                    $logo = get_sub_field('image');
                    $title = get_sub_field('title');
                    $text = get_sub_field('text');
                    ?>
                    <div class="environment__text__option-mobile">
                        <div class="environment__text__title">
                            <div class="environment__text__title__icon">
                                <img src="<?php echo($logo["sizes"]["onqor-large"]) ?>" alt="<?php echo esc_attr($logo['alt']); ?>" class="environment__text__option__image" />
                                <p><?php echo $title ?></p>
                            </div>
                            <div class="icon">
                                <svg width="15" height="9" viewBox="0 0 15 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.5 1L7.12037 7.5571C7.31992 7.78991 7.68008 7.78991 7.87963 7.5571L13.5 1" stroke="#70B095" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </div>
                        </div>
                        <div class="environment__text__text"><p><?php echo $text ?></p></div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        <?php if( have_rows('text_section_right') ): ?>
            <div class="environment__text">
                <?php while( have_rows('text_section_right') ): the_row(); 
                    $logo = get_sub_field('image');
                    $title = get_sub_field('title');
                    $text = get_sub_field('text');
                    ?>
                    <div class="environment__text__option-mobile">
                        <div class="environment__text__title">
                            <div class="environment__text__title__icon">
                                <img src="<?php echo($logo["sizes"]["onqor-large"]) ?>" alt="<?php echo esc_attr($logo['alt']); ?>" class="environment__text__option__image" />
                                <p><?php echo $title ?></p>
                            </div>
                            <div class="icon">
                                <svg width="15" height="9" viewBox="0 0 15 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.5 1L7.12037 7.5571C7.31992 7.78991 7.68008 7.78991 7.87963 7.5571L13.5 1" stroke="#70B095" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </div>
                        </div>
                        <div class="environment__text__text"><p><?php echo $text ?></p></div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
    <a class="environment__policy tertiary-button" href="<?php echo($linkEnvironmentalPolicy["url"]) ?>">
        <p><?php echo($textEnvironmentalPolicy) ?></p>
    </a>
</div>

