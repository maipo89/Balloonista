<?php $titleFirstForm = get_sub_field('title_first_form'); ?>
<?php $titleSecondForm = get_sub_field('title_second_form'); ?>
<?php $firstButtonText = get_sub_field('first_button_text'); ?>
<?php $secondButtonText = get_sub_field('second_button_text'); ?>
<?php $firstFormDetailsTitle = get_sub_field('first_form_details_title'); ?>
<?php $dataText = get_sub_field('data_text'); ?>
<?php $dataLink = get_sub_field('data_link'); ?>

<div class="contact-form">
    <h2 class="contact-form__get-in-touch-title active"><?php echo($titleFirstForm) ?></h2>
    <h2 class="contact-form__get-a-quote-title"><?php echo($titleSecondForm ) ?></h2>
    <div class="contact-form__buttons">
        <button class="getInTouchBtn secondary-button active"><?php echo($firstButtonText) ?></button>
        <button class="getAQuoteBtn secondary-button"><?php echo($secondButtonText) ?></button>
    </div>
    <div class="contact-form__get-in-touch">
        <h3><?php echo($firstFormDetailsTitle) ?></h3>
        <?php echo do_shortcode('[contact-form-7 id="033a0d8" title="Get in touch"]'); ?>
        <p><?php echo($dataText) ?> <a href="<?php echo($dataLink)?>"><?php echo($dataLink) ?></a></p>
        
    </div>
    <div class="contact-form__get-a-quote">
        <?php echo do_shortcode('[contact-form-7 id="08dcb33" title="Get a Quote"]'); ?>
        <p class="policy"><?php echo($dataText) ?> <a href="<?php echo($dataLink)?>"><?php echo($dataLink) ?></a></p>
    </div>
</div>

