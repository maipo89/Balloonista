<?php $title = get_sub_field('title'); 
      $features = get_sub_field('features');
?>

<div class="features">
    <h2><?php echo($title) ?></h2>




    <div class="features__container">
        <?php

            // Check rows exists.
            if( have_rows('features') ):

                // Loop through rows.
                while( have_rows('features') ) : the_row();

                    // Load sub field value.
                    $featureIcon = get_sub_field('icon');
                    $featureName = get_sub_field('feature');
                    // Do something...
                    ?> 
                        <div class="features__item">
                            <img src="<?php echo $featureIcon['sizes']['thumbnail'] ?>" >
                            <div class="features__container__feature">
                                <p><?php echo $featureName ?></p>
                            </div>
                        </div>
                    <?php 
                // End loop.
                endwhile;

            // No value.
            else :
                // Do something...
            endif 
        ?>
    </div>

</div>