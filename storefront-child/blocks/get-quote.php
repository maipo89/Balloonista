<?php $titleForm = get_sub_field('title_form'); ?>
<?php $formDetailsTitle = get_sub_field('form_details_title'); ?>
<?php $dataText = get_sub_field('data_text'); ?>
<?php $dataLink = get_sub_field('data_link'); ?>
<?php $eventDetailsTitle = get_sub_field('event_details_title'); ?>
<?php $requirementsTitle = get_sub_field('requirements_title'); ?>
<?php $requirementsText = get_sub_field('requirements_text'); ?>
<?php $hearAboutText = get_sub_field('hear_about_text'); ?>

<div class="get-a-quote">
    <h2 class="get-a-quote__title"><?php echo($titleForm) ?></h2>
    <div class="get-a-quote__get-a-quote">
        <form>
            <h3><?php echo($formDetailsTitle) ?></h3>
            <div class="name">
                <input type="text" placeholder="Name..."/>
                <input type="text" placeholder="Surname..."/>
                <input type="text" placeholder="Email..."/>
                <input type="text" placeholder="Number..."/>
            </div>
            <h3><?php echo($eventDetailsTitle) ?></h3>
            <div class="event">
                <div class="select-wrapper">
                    <div class="select">
                        <input class="dropdown-contact" type="text" name="dropdown-contact" value=""/>
                        <div class="select__trigger"><span>Lorem Ipsum</span>
                            <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.999999 1.5L6.62037 8.0571C6.81992 8.28991 7.18008 8.28991 7.37963 8.0571L13 1.5" stroke="#D9E7E1" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <div class="custom-options">
                            <span data-value="Option 1" class="custom-option">Option 1</span>
                            <span data-value="Option 2" class="custom-option">Option 2</span>
                            <span data-value="Option 3" class="custom-option">Option 3</span>
                        </div>
                    </div>
                </div>
                <input type="text" placeholder="Event Venue/Postcode..." />
            </div>
            <h3><?php echo($requirementsTitle) ?></h3>
            <p class="requirements"><?php echo($requirementsText) ?></p>
            <textarea placeholder="Answer..."></textarea>
            <div class="newsletter">
                <p><?php echo($hearAboutText) ?></p>
                <div class="newsletter__checkbox">
                    <input type="checkbox" id="google" name="google"/>
                    <label for="google">Google</label>
                </div>
                <div class="newsletter__checkbox">
                    <input type="checkbox" id="instagram" name="instagram"/>
                    <label for="instagram">Instagram</label>
                </div>
                <div class="newsletter__checkbox">
                    <input type="checkbox" id="facebook" name="facebook"/>
                    <label for="facebook">Facebook</label>
                </div>
                <div class="newsletter__checkbox">
                    <input type="checkbox" id="advert" name="advert"/>
                    <label for="advert">Advert</label>
                </div>
                <div class="newsletter__checkbox">
                    <input type="checkbox" id="recommendation" name="recommendation"/>
                    <label for="recommendation">Recommendation</label>
                </div>
                <div class="newsletter__checkbox">
                    <input type="checkbox" id="other" name="other"/>
                    <label for="other">Other</label>
                </div>
                <div class="newsletter__checkbox">
                    <input type="checkbox" id="newsletter" name="newsletter"/>
                    <label for="newsletter">If you would not like to receive the Balloonista newsletter, then please ticket here</label>
                </div>
            </div>            
            <p class="policy"><?php echo($dataText) ?> <a href="<?php echo($dataLink)?>"><?php echo($dataLink) ?></a></p>
            <button type="submit" class="primary-button">Send</button>
        </form>
    </div>
</div>

