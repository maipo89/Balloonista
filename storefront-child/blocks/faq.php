<?php $image = get_sub_field('image'); ?>
<?php $title = get_sub_field('title'); ?>
<?php $higherMargins = get_sub_field('higher_margins_bottom'); ?>

<div class="faq <?php echo($higherMargins ? 'higher-margins' : '') ?>">
    <h3><?php echo $title ?></h3>
    <?php if( have_rows('faqs') ): ?>
        <div class="faq__text">
        <?php while( have_rows('faqs') ): the_row(); 
            $title = get_sub_field('title');
            $text = get_sub_field('text');
            ?>
            <!-- <div class="environment__text__option-mobile"> -->
                <div class="faq__text__title">
                    <div class="faq__text__title__icon">
                        <p><?php echo $title ?></p>
                    </div>
                    <div class="icon">
                        <svg width="15" height="9" viewBox="0 0 15 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.5 1L7.12037 7.5571C7.31992 7.78991 7.68008 7.78991 7.87963 7.5571L13.5 1" stroke="#70B095" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                </div>
                <div class="faq__text__text"><p><?php echo $text ?></p></div>
            <!-- </div> -->
        <?php endwhile; ?>
    </div>
    <?php endif; ?>
</div>

