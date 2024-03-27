<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package storefront
 */

get_header(); 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$category_name = get_query_var('category_name');
$post_name = get_query_var('name');

$args = array(
    'post_type' => 'post',
    'posts_per_page' => 12, // Display 12 posts per page
    'order' => 'DESC',
    'orderby' => 'date',
    'paged' => $paged,
);

if (!empty($category_name)) {
    $args['category_name'] = $category_name;
}

if (!empty($post_name)) {
    $args['name'] = $post_name;
}

$query = new WP_Query($args);
?>
		<div class="blogs">
			<h1>HELLLOOO</h1>
			<p><?php var_dump($query->max_num_pages) ?></p>
			<div class="blogs__inputs">
			    <div class="blogs__inputs__container">

						<div class="select-wrapper">
							<div class="select">
								<input class="category-input" type="text" name="referral" value=""/>
								<div class="select__trigger">
									<span>
									<?php
										$categories = get_the_category();
										$current_url = home_url($_SERVER['REQUEST_URI']);

										foreach ($categories as $category) {
											$category_slug = $category->slug;

											if (strpos($current_url, $category_slug) !== false) {
												echo($category->name);
											}
										}
									?>
									</span>
									<svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M0.999999 1.5L6.62037 8.0571C6.81992 8.28991 7.18008 8.28991 7.37963 8.0571L13 1.5" stroke="#D9E7E1" stroke-width="2" stroke-linecap="round"/>
									</svg>
								</div>
									<div class="custom-options">
										<?php $categories = get_categories(); ?>
										<?php foreach ($categories as $category) { ?>
											<a href="<?php echo get_home_url(); ?>/blogs/<?php echo($category->slug) ?>">
												<span class="custom-option" data-value="<?php echo($category->name) ?>"><?php echo($category->name) ?></span>
											</a>
										<?php } ?>
										<a href="<?php echo get_home_url(); ?>/blogs/">
											<span class="custom-option">All Filters</span>
										</a>
									</div>
							</div>
						</div>
				</div>
			</div>
			<div class="blogs__container">
        <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>

            <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'single-post-thumbnail'); ?>

            <div class="blogs__card">
                <a href="<?php the_permalink() ?>">
                    <div class="blogs__card__image" style="background-image: url('<?php echo ($image[0]) ?>');"></div>
                </a>
                <div class="blogs__card__description">
                    <h2><?php the_title(); ?></h2>
                    <p><?php echo get_the_excerpt() ?></p>
                </div>
                <div class="blogs__card__button">
                    <a class="button primary-button" href="<?php the_permalink() ?>">Read More</a>
                </div>
            </div>

        <?php endwhile; ?>

        <?php else : ?>
            <p>No posts found</p>
        <?php endif; ?>
    </div>

    <!-- Pagination links outside the container -->
    <div class="pagination">
        <?php
        echo paginate_links(array(
            'total' => $query->max_num_pages,
			'prev_text' => '<svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 1L1.78885 6.10557C1.05181 6.4741 1.05181 7.5259 1.78885 7.89443L12 13" stroke="#D9E7E1" stroke-width="2" stroke-linecap="round"/></svg>',
            'next_text' => '<svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.999999 13L11.2111 7.89443C11.9482 7.5259 11.9482 6.4741 11.2111 6.10557L1 0.999999" stroke="#D9E7E1" stroke-width="2" stroke-linecap="round"/></svg>',
        ));
        ?>
    </div>
</div>


<?php
get_footer();
