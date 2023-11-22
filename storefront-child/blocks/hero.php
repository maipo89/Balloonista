<?php $title = get_sub_field('title'); ?>
<?php $paragraph = get_sub_field('paragraph'); ?>
<?php $button = get_sub_field('button'); ?>
<?php $buttonText = get_sub_field('button_text'); ?>
<?php $buttonLink = get_sub_field('button_link'); ?>
<?php $gallery = get_sub_field('gallery'); ?>
<?php $childPages = get_sub_field('child_pages'); ?>

<div class="hero <?php echo($childPages ? 'child-pages' : '')?>">
    <div class="hero__wrapper">
        <div class="hero__wrapper__text">
            <h1><?php echo($title) ?></h1>
            <p><?php echo($paragraph) ?></p>
        </div>
        <?php if($button): ?>
            <div class="hero__wrapper__button">
                <a class="primary-button" href="<?php echo($buttonLink) ?>"><?php echo($buttonText) ?></a>
            </div>
        <?php 
        endif;
        ?>
    </div>
    <div class="hero__space"></div>
    <?php if( have_rows('gallery') ): ?>
        <div class="hero__gallery">
            <?php 
            while( have_rows('gallery') ) : the_row();
            $image = get_sub_field('image');
            ?>
                <img class="hero__gallery__image" src="<?php echo($image["sizes"]["onqor-large"]) ?>" alt="<?php echo($image["alt"]) ?>"/>
            <?php 
            endwhile;
            ?>
        </div>
    <?php 
    endif;
    ?>
</div>