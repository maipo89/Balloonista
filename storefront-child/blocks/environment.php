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
</div>

