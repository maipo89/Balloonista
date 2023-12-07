<div class="legal-categories">
    <div class="select-wrapper">
        <div class="select">
            <input class="category-input" type="text" name="referral" value=""/>
            <div class="select__trigger">
                <span>
                    Category
                </span>
                <div class="arrow"></div>
            </div>
                <div class="custom-options">
                    <?php if( have_rows('pages') ): ?>
                        <?php while( have_rows('pages') ): the_row(); 
                            $page = get_sub_field('page');
                            $pageName = get_sub_field('page_name');
                            ?>
                            <a href="<?php echo $page ?>">
                                <span class="custom-option" data-value="<?php echo $pageName ?>"><?php echo $pageName ?></span>
                            </a>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
        </div>
    </div>
</div>