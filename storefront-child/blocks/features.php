
<?php $title = get_sub_field('title'); 
      $features = get_sub_field('features');
?>

<div class="features">
   <h2><?php echo($title) ?></h2>
   <?php
        if( $features ):
    ?>
    <div class="features__container">
        <div class="features__container__feature">
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.75 1H21M21 1V12.25M21 1L1 21M1 21H11.625M1 21V10.375" stroke="#70B095" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <?php if (!empty($features['size'])): ?>
                <p><?php echo($features['size']) ?></p>
            <?php else: ?>
                <p><?php echo($features['size_options']) ?></p>
            <?php endif; ?>
         </div>
        <div class="features__container__feature">
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11 21C16.523 21 21 16.523 21 11C21 5.477 16.523 1 11 1C5.477 1 1 5.477 1 11C1 16.523 5.477 21 11 21Z" stroke="#70B095" stroke-width="1.5" stroke-linejoin="round"/>
                <path d="M11 17C14.3135 17 17 14.3135 17 11" stroke="#70B095" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <?php if (!empty($features['material'])): ?>
                <p><?php echo($features['material']) ?></p>
            <?php else: ?>
                <p><?php echo($features['material_options']) ?></p>
            <?php endif; ?>
        </div>
        <div class="features__container__feature">
           <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19.9424 0.840678C19.9305 0.636825 19.8441 0.44444 19.6997 0.300049C19.5553 0.155657 19.3629 0.0693125 19.1591 0.0574078C11.2292 -0.408179 4.87735 1.97913 2.16913 6.45793C1.23038 7.99001 0.767784 9.76635 0.840013 11.5617C0.899386 13.2199 1.3827 14.8947 2.27641 16.5457L0.244204 18.5767C0.0878426 18.7331 -5.20995e-09 18.9452 0 19.1663C5.20995e-09 19.3874 0.0878426 19.5995 0.244204 19.7558C0.400565 19.9122 0.612635 20 0.833763 20C1.05489 20 1.26696 19.9122 1.42332 19.7558L3.45449 17.7237C5.10443 18.6163 6.7804 19.0996 8.43762 19.159C8.55359 19.1631 8.66921 19.1652 8.78449 19.1652C10.4633 19.1697 12.1103 18.7074 13.5416 17.8299C18.0206 15.1218 20.409 8.77128 19.9424 0.840678ZM12.6822 16.405C10.3125 17.8403 7.50745 17.8633 4.69194 16.4852L13.9239 7.25474C14.0013 7.17732 14.0627 7.08541 14.1046 6.98426C14.1465 6.88311 14.1681 6.77469 14.1681 6.6652C14.1681 6.55572 14.1465 6.4473 14.1046 6.34615C14.0627 6.245 14.0013 6.15309 13.9239 6.07567C13.8464 5.99825 13.7545 5.93684 13.6534 5.89494C13.5522 5.85304 13.4438 5.83147 13.3343 5.83147C13.2248 5.83147 13.1164 5.85304 13.0152 5.89494C12.9141 5.93684 12.8222 5.99825 12.7447 6.07567L3.51386 15.3114C2.13996 12.4991 2.15975 9.68683 3.59407 7.3214C5.89502 3.52275 11.3646 1.44271 18.3133 1.69061C18.5622 8.63379 16.4811 14.1042 12.6822 16.405Z" fill="#70B095"/>
            </svg>
            <?php if (!empty($features['eco_credentials'])): ?>
                <p><?php echo($features['eco_credentials']) ?></p>
            <?php else: ?>
                <p><?php echo($features['eco_credentials_options']) ?></p>
            <?php endif; ?>
        </div>
        <div class="features__container__feature">
            <svg width="24" height="20" viewBox="0 0 24 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 7.10451L16.6316 7.10439C18.9474 7.10439 19.8325 5.08742 19.5263 3.51149C19.1406 1.52602 16.0526 -0.67642 13.7368 2.91421" stroke="#70B095" stroke-width="1.5" stroke-linecap="round"/>
                <path d="M1 14.1698H12.3065C16.6316 14.1691 14.3158 21.9509 9.68421 17.7614" stroke="#70B095" stroke-width="1.5" stroke-linecap="round"/>
                <path d="M1 10.5789H20.1881C22.244 10.5801 23.2917 12.5568 22.9293 14.1021C22.4727 16.0491 21.2632 16.5645 21.2632 16.5645" stroke="#70B095" stroke-width="1.5" stroke-linecap="round"/>
            </svg>
            <?php if (!empty($features['inflated'])): ?>
                <p><?php echo($features['inflated']) ?></p>
            <?php else: ?>
                <p><?php echo($features['inflated_options']) ?></p>
            <?php endif; ?>
        </div>
        <div class="features__container__feature">
            <svg width="27" height="18" viewBox="0 0 27 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.5588 12.3333L3.69772 16.292C3.09929 16.6373 2.33936 16.2861 2.21445 15.6066L1.73115 12.9775C1.24777 10.3479 1.24777 7.65215 1.73115 5.02253L2.21445 2.39339C2.33936 1.71388 3.09929 1.36274 3.69772 1.70802L10.5588 5.66667M16.4412 5.66667L23.3023 1.70802C23.9007 1.36274 24.6606 1.71388 24.7855 2.39339L25.2688 5.02253C25.7522 7.65215 25.7522 10.3479 25.2688 12.9775L24.7855 15.6066C24.6606 16.2861 23.9007 16.6373 23.3023 16.292L16.4412 12.3333" stroke="#70B095" stroke-width="1.5"/>
                <ellipse cx="13.5007" cy="9" rx="3.67647" ry="4" stroke="#70B095" stroke-width="1.5"/>
            </svg>
            <?php if (!empty($features['bow_ribbon'])): ?>
                <p><?php echo($features['bow_ribbon']) ?></p>
            <?php else: ?>
                <p><?php echo($features['bow_ribbon_options']) ?></p>
            <?php endif; ?>
        </div>
        <div class="features__container__feature">
            <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.99025 18C7.07995 18 3.98668 15.5067 3.98668 10.8868C3.98668 7.82002 5.91068 5.11546 8.32698 3.16989C6.78434 2.35116 5.27659 1.88646 4.27256 1.88646C2.72421 1.88646 1.12841 2.46121 1.1124 2.46686C0.897984 2.54021 0.665968 2.51816 0.466179 2.40544C0.26639 2.29272 0.114765 2.09832 0.0438697 1.864C-0.0270254 1.62969 -0.0115355 1.37413 0.0870123 1.15224C0.18556 0.930341 0.359305 0.759799 0.570931 0.67724C0.646404 0.649572 2.4389 0 4.27256 0C5.81348 0 7.9599 0.728175 9.99597 1.98833C12.0286 0.728175 14.1699 0 15.7079 0C17.5416 0 19.2655 0.980332 19.3352 1.02183C19.7818 1.2872 20.0854 1.46138 19.9785 1.81792C19.8744 2.1644 19.469 2.02417 18.9779 1.96507C18.9613 1.96318 17.7452 1.7192 15.7257 1.7192C14.7239 1.7192 13.2042 2.3499 11.6661 3.168C14.0761 5.10666 15.9933 7.79612 15.9933 10.8472C15.9938 15.4935 12.9006 18 9.99025 18ZM9.99768 4.19486C7.69346 5.82037 5.70198 8.18473 5.70198 10.8868C5.70198 14.6949 8.33212 16.1135 9.99025 16.1135C11.6478 16.1135 14.2785 14.6842 14.2785 10.8472C14.2785 8.1621 12.2956 5.81345 9.99768 4.19486Z" fill="#70B095"/>
            </svg>
            <?php if (!empty($features['tail'])): ?>
                <p><?php echo($features['tail']) ?></p>
            <?php else: ?>
                <p><?php echo($features['tail_options']) ?></p>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>
</div>
