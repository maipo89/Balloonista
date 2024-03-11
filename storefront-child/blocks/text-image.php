<?php $image = get_sub_field('image'); ?>
<?php $title = get_sub_field('title'); ?>
<?php $text = get_sub_field('text'); ?>
<?php $button = get_sub_field('button'); ?>
<?php $buttonText = get_sub_field('button_text'); ?>
<?php $buttonLink = get_sub_field('button_link'); ?>
<?php $leftImage = get_sub_field('left_image'); ?>
<?php $centralImageMobile = get_sub_field('central_image_mobile'); ?>
<?php $higherMarginsBottom = get_sub_field('higher_margins_bottom'); ?>
<?php $customLink = get_sub_field('custom_link'); ?>
<?php $linkSlug = get_sub_field('link_slug'); ?>

<div class="text-image<?php echo ($leftImage ? ' left' : ''); ?><?php echo ($centralImageMobile ? ' central-image-mobile' : ''); ?><?php echo ($higherMarginsBottom ? ' higher-margins' : ''); ?>">
      <div class="text-image__text">
          <h2><?php echo $title ?></h2>
          <p><?php echo $text ?></p>
          <?php if($button) : ?>
            <div class="text-image__text__button">
                <a class="primary-button" href="<?php echo $customLink ? $linkSlug["url"] : $buttonLink; ?>"><?php echo $buttonText ?></a>
            </div>
          <?php endif; ?>
      </div>
      <div class="text-image__image" style="background-image: url(<?php echo($image["sizes"]["onqor-large"]) ?>)"></div>
</div>

