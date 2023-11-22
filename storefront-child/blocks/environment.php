<?php $image = get_sub_field('image'); ?>
<?php $title = get_sub_field('title'); ?>

<div class="environment">
    <div class="environment__image" style="background-image: url(<?php echo($image["sizes"]["onqor-large"]) ?>)"></div>
    <h3><?php echo $title ?></h3>
    <?php if( have_rows('text_section') ): ?>
        <div class="environment__text">
        <?php while( have_rows('text_section') ): the_row(); 
            $logo = get_sub_field('image');
            $title = get_sub_field('title');
            $text = get_sub_field('text');
            ?>
            <div class="environment__text__option">
                <img src="<?php echo($logo["sizes"]["onqor-large"]) ?>" alt="<?php echo esc_attr($logo['alt']); ?>" class="environment__text__option__image" />
                <div class="environment__text__option__paragraph">
                    <p><?php echo $title ?> <?php echo $text ?></p>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
    <?php endif; ?>
    <?php if( have_rows('text_section') ): ?>
        <div class="environment__text-mobile">
        <?php while( have_rows('text_section') ): the_row(); 
            $logo = get_sub_field('image');
            $title = get_sub_field('title');
            $text = get_sub_field('text');
            ?>
            <!-- <div class="environment__text__option-mobile"> -->
                <div class="environment__text-mobile__title">
                    <div class="environment__text-mobile__title__icon">
                        <img src="<?php echo($logo["sizes"]["onqor-large"]) ?>" alt="<?php echo esc_attr($logo['alt']); ?>" class="environment__text__option__image" />
                        <p><?php echo $title ?></p>
                    </div>
                    <div class="icon">
                        <svg width="15" height="9" viewBox="0 0 15 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.5 1L7.12037 7.5571C7.31992 7.78991 7.68008 7.78991 7.87963 7.5571L13.5 1" stroke="#70B095" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                </div>
                <div class="environment__text-mobile__text"><p><?php echo $text ?></p></div>
            <!-- </div> -->
        <?php endwhile; ?>
    </div>
    <?php endif; ?>
</div>

