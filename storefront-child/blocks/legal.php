<?php $title = get_sub_field('title');
      $cookieTitle = get_sub_field('cookie_title');
      $termsTitle = get_sub_field('terms_title');
      $privacyTitle = get_sub_field('privacy_title');
      $paragraph = get_sub_field('paragraph');
      $higherMargins = get_sub_field('higher_margin_bottom');
?>

<div class="legal <?php echo($higherMargins ? 'higher-margins' : '') ?>">
    <div class="legal__categories">
        <div class="select-wrapper">
            <div class="select">
                <input class="category-input" type="text" name="referral" value=""/>
                <div class="select__trigger">
                    <span>
                        Category
                    </span>
                    <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.999999 1.5L6.62037 8.0571C6.81992 8.28991 7.18008 8.28991 7.37963 8.0571L13 1.5" stroke="#D9E7E1" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>
                    <div class="custom-options">
                        <?php if( have_rows('pages') ): ?>
                            <?php while( have_rows('pages') ): the_row(); 
                                $pageName = get_sub_field('page_name');
                                ?>
                                <span class="custom-option" data-value="<?php echo $pageName ?>"><?php echo $pageName ?></span>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
            </div>
        </div>
    </div>
    <div class="legal__privacy">
        <h2 class="legal__privacy__title"><?php echo $privacyTitle ?></h2>
        <?php if( have_rows('privacy') ): ?>
                <?php while( have_rows('privacy') ): the_row(); 
                    $title = get_sub_field('title');
                    $text = get_sub_field('text');
                    ?>
                    <div class="legal__privacy__text">
                        <?php if($title): ?>
                            <h2><?php echo($title) ?></h2>
                        <?php endif; ?>
                        <?php if($text): ?>
                            <?php echo($text) ?>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
        <?php endif; ?>
    </div>
    <div class="legal__terms">
        <h2 class="legal__terms__title"><?php echo $termsTitle ?></h2>
        <?php if( have_rows('terms') ): ?>
            <?php while( have_rows('terms') ): the_row(); 
                $title = get_sub_field('title');
                $text = get_sub_field('text');
                ?>
                <div class="legal__terms__text">
                    <?php if($title): ?>
                        <h2><?php echo($title) ?></h2>
                    <?php endif; ?>
                    <?php if($text): ?>
                        <?php echo($text) ?>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
    <div class="legal__cookie">
       <h2 class="legal__cookie__title"><?php echo $cookieTitle ?></h2>
        <?php if( have_rows('cookie') ): ?>
            <?php while( have_rows('cookie') ): the_row(); 
                $title = get_sub_field('title');
                $text = get_sub_field('text');
                ?>
                <div class="legal__cookie__text">
                    <?php if($title): ?>
                        <h2><?php echo($title) ?></h2>
                    <?php endif; ?>
                    <?php if($text): ?>
                        <?php echo($text) ?>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>