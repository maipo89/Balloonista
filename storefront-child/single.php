<?php
/**
 * The template for displaying all single posts.
 *
 * @package storefront
 */

get_header(); ?>
<div class="hero  blog-pages ">
    <div class="hero__wrapper">
        <div class="hero__wrapper__breadcrumb">
            <a href="<?php echo esc_url( home_url( '/blogs' ) ); ?>">blogs</a>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
            <!-- Additional breadcrumbs can be dynamically generated here -->

            <p><?php the_title(); ?></p>
        </div>
        <div class="hero__wrapper__text">
            <h1><?php the_title(); ?></h1>
            <p class="author"><?php the_author(); ?></p>
            <p class="date">
                <?php echo get_the_date(); ?>
            </p>
        </div>
    </div>
    <div class="hero__space"></div>
    <div class="hero__image" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'onqor-large'); ?>)">
    </div>
</div>
<div class="title-paragraph">
    <?php the_content(); ?>
</div>
<?php include 'flexibleBlocks.php'; ?>

<?php get_footer();
