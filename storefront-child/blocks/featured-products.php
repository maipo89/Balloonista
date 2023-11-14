<?php $testimonialSection = get_sub_field('testimonial_section'); ?>
<div class="featured-products">

<?php
$related_post_id = get_field('related_post'); // Replace 'related_post' with your actual ACF field name

if ($related_post_id) {
    // Get the title of the related post
    $related_post_title = get_the_title($related_post_id);
    echo '<h2>' . esc_html($related_post_title) . '</h2>';

    // Get the price from a custom field (replace 'price' with your actual custom field name)
    $related_post_price = get_field('price', $related_post_id);
    echo '<p>Price: ' . esc_html($related_post_price) . '</p>';

    // Get the featured image of the related post
    $related_post_thumbnail = get_the_post_thumbnail($related_post_id, 'thumbnail'); // Replace 'thumbnail' with your desired image size
    echo $related_post_thumbnail;
}
?>


</div>