<?php $title = get_sub_field('title');
      $paragraph = get_sub_field('paragraph');
      $higherMargins = get_sub_field('higher_margin_bottom');
?>

<div class="title-paragraph <?php echo($higherMargins ? 'higher-margins' : '') ?>" >
    <?php if($title): ?>
        <h2><?php echo($title) ?></h2>
    <?php endif; ?>
    <?php echo($paragraph) ?>
</div>