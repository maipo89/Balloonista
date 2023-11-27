<?php $title = get_sub_field('title');
      $paragraph = get_sub_field('paragraph');
?>

<div class="title-paragraph">
    <?php if($title): ?>
        <h2><?php echo($title) ?></h2>
    <?php endif; ?>
    <?php echo($paragraph) ?>
</div>