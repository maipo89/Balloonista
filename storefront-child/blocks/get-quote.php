<?php $titleForm = get_sub_field('title_form'); ?>
<?php $dataText = get_sub_field('data_text'); ?>
<?php $dataLink = get_sub_field('data_link'); ?>

<div class="get-a-quote">
    <h2 class="get-a-quote__title"><?php echo($titleForm) ?></h2>
    <div class="get-a-quote__get-a-quote">
        <?php echo do_shortcode('[contact-form-7 id="08dcb33" title="Get a Quote"]'); ?>
        <p class="policy"><?php echo($dataText) ?> <a href="<?php echo($dataLink)?>"><?php echo($dataLink) ?></a></p>
    </div>
</div>

