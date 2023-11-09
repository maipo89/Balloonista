<?php $title = get_sub_field('title'); ?>
<div class="features">
    <h2><?php echo($title) ?></h2>
    <?php if( have_rows('features') ): ?>
        <div class="features__container">
            <?php while( have_rows('features') ): the_row(); 
                $image = get_sub_field('image');
                $option = get_sub_field('option');
                ?>
                <div class="feature">
                    <div class="feature__image" style="'background-image: url('<?php echo($image) ?>);"></div>
                    <p><?php echo($option) ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</div>