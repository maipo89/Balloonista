<?php $title = get_sub_field('title'); ?>
<?php $paragraph = get_sub_field('paragraph'); ?>
<?php $button = get_sub_field('button'); ?>
<?php $buttonText = get_sub_field('button_text'); ?>
<?php $buttonLink = get_sub_field('button_link'); ?>
<?php $gallery = get_sub_field('gallery'); ?>
<?php $childPages = get_sub_field('child_pages'); ?>
<?php $staticImage = get_sub_field('image'); ?>
<?php $heroImage = get_sub_field('hero_image'); ?>
<?php $breadcrumb = get_sub_field('breadcrumb'); ?>
<?php $blogPage = get_sub_field('blog_page'); ?>
<?php $title = get_the_title(); ?>
<?php $author = get_the_author(); ?>
<?php $longText = get_sub_field('long_text'); ?>

<div class="hero <?php echo($childPages ? 'child-pages' : '')?> <?php echo($blogPage ? 'blog-pages' : '')?> <?php echo($longText ? 'long-text' : '')?>">
    <div class="hero__wrapper">
        <?php if($breadcrumb): ?>
            <div class="hero__wrapper__breadcrumb">
                <a href="<?php echo get_home_url(); ?>">Home</a>
                <a href="<?php echo get_home_url(); ?>/shop">Shop</a>
                <p><?php echo $title ?></p>
            </div>
        <?php 
        endif;
        ?>
        <div class="hero__wrapper__text">
            <h1><?php echo($title) ?></h1>
            <?php if($paragraph) : ?><p><?php echo($paragraph) ?></p><?php endif; ?>
            <?php if($blogPage): ?>
                <p class="author"><?php echo $author ?></p>
                <p class="date">
                <?php
                    $post_id = get_the_ID(); // Get the current post ID
                    $publish_date = get_the_time('d/m/Y', $post_id); // Format the date
                    echo $publish_date;
                ?>
                </p>
            <?php 
            endif;
            ?>
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
    <?php if( $staticImage ): ?>
        <div class="hero__image" style="background-image: url(<?php echo($heroImage["sizes"]["onqor-large"]) ?>)" >
        </div>
    <?php 
    endif;
    ?>
    
</div>