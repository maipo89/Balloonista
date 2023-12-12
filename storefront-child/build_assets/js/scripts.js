
$ = jQuery
$(document).ready(function() {

    // Hamburger Menu

    $('.header__wrapper__hamburger').on('click', function() {
        $('body').toggleClass('modal-open');
        $('.mobile-menu').toggleClass('open');
        $('.close').toggleClass('show');
        $('.hamburger').toggleClass('hide');
        $('.header').toggleClass('menu-mobile');
    });

    // Menu Mobile 

    $('.menu-item-has-children svg').on('click', function(e) {
        e.preventDefault();
        var $parentElement = $(this).closest('.menu-item-has-children');

        $('.menu-item-has-children').not($parentElement).each(function() {
            $(this).removeClass('open');
        });

        $parentElement.toggleClass('open');
    });

    // Form Footer

    $('.footer__form .name, .footer__form  .email').on('input', function() {
        const nameValue = $('.footer__form .name').val().trim();
        const emailValue = $('.footer__form .email').val().trim();

        console.log(nameValue, emailValue)
        
        if (nameValue !== '' && emailValue !== '') {
            $('.footer__form button').addClass('active');
        } else {
            $('.footer__form button').removeClass('active');
        }
    });

    // Search Header

    // Function to show products based on search input

    function preventBodyScroll() {
        $('body').addClass('modal-open'); // Add a class to the body to disable scrolling
    }
    
    // Function to enable scrolling
    function enableBodyScroll() {
        $('body').removeClass('modal-open'); // Remove the class to enable scrolling
    }

    $('.search-icon').on('click', function() {
        $('.background-search').addClass('open');
        $('.search').addClass('open');
        preventBodyScroll(); // Call the function to prevent scrolling when modal opens
    });

    $('.search-option').on('click', function() {
        $('.background-search').addClass('open');
        $('.search').addClass('open');
        preventBodyScroll(); // Call the function to prevent scrolling when modal opens
    });

    $('.search__container .close-icon').on('click', function() {
        $('.background-search').removeClass('open');
        $('.search').removeClass('open');
        $('.mobile-menu').removeClass('open');
        $('.close').removeClass('show');
        $('.hamburger').removeClass('hide');
        enableBodyScroll(); // Call the function to enable scrolling when modal closes
    });


    $('#search-input').on('input', function() {
        var searchText = $(this).val().toLowerCase().trim();

        if (searchText.length > 0) {

            $('.pages-container p').each(function() {
                var pageText = $(this).text().toLowerCase();

                if (pageText.includes(searchText)) {
                    $(this).addClass('open');
                } else {
                    $(this).removeClass('open');
                }
            });

        }else{
            $('.pages-container p').each(function() {
                $(this).removeClass('open');
            });
        };
    });

    function showProducts(numToShow) {
        var products = document.querySelectorAll('.header .product-container .product-name');
        products.forEach(function(product, index) {
            if (index < numToShow) {
                product.style.display = 'block';
            } else {
                product.style.display = 'none';
            }
        });
    }
    
    function checkShowMoreVisibility() {

        var screenWidth = window.innerWidth;
        var searchText = document.getElementById('search-input').value.trim().toLowerCase();
        var showMoreButton = document.getElementById('show-more-btn');
        var numToShow = 0;
    
        if (searchText.length > 0) {
    
            if (screenWidth > 768) {
                numToShow = 0;
                showProducts(0);
                document.querySelectorAll('.header .product-container .product-name').forEach(function(product) {
                    var title = product.querySelector('h2').textContent.toLowerCase();
                    console.log(title.includes(searchText))
                    if (title.includes(searchText)) {
                        if (numToShow < 3) {
                            product.style.display = 'block';
                            numToShow++;
                        }
                    } else {
                        product.style.display = 'none';
                    }
                });
                if (numToShow > 0 && numToShow <= 3) {
                    showMoreButton.style.display = 'block';
                } else {
                    showMoreButton.style.display = 'none';
                }
            } else if (screenWidth <= 768 && screenWidth >= 480) {
                numToShow = 0;
                showProducts(0);
                document.querySelectorAll('.header .product-container .product-name').forEach(function(product) {
                    var title = product.querySelector('h2').textContent.toLowerCase();
                    if (title.includes(searchText)) {
                        if(numToShow < 2) {
                            product.style.display = 'block';
                            numToShow++;
                        }
                    } else {
                        product.style.display = 'none';
                    }
                });
                if (numToShow > 0 && numToShow <= 2) {
                    showMoreButton.style.display = 'block';
                } else {
                    showMoreButton.style.display = 'none';
                }
            } else if (screenWidth < 480) {
                numToShow = 0;
                showProducts(0);
                document.querySelectorAll('.header .product-container .product-name').forEach(function(product) {
                    var title = product.querySelector('h2').textContent.toLowerCase();
                    if (title.includes(searchText)) {
                        if (numToShow < 1) {
                        product.style.display = 'block';
                        numToShow++;
                        }
                    } else {
                        product.style.display = 'none';
                    }
                });
                if (numToShow > 0 && numToShow <= 1) {
                    showMoreButton.style.display = 'block';
                } else {
                    showMoreButton.style.display = 'none';
                }
            }
        } else {
            numToShow = 0;
            showProducts(0); // Reset to 0 initially
            showMoreButton.style.display = 'none';
        }
    }
    
    // Hide the 'Show More' button initially
    document.getElementById('show-more-btn').style.display = 'none';
    
    // Initial check when the page loads
    checkShowMoreVisibility();
    
    // Check screen width and search input changes
    window.addEventListener('resize', checkShowMoreVisibility);
    document.getElementById('search-input').addEventListener('input', checkShowMoreVisibility);

    // Category Search

    const $input = $('#search-input');
    const $viewMoreLink = $('#show-more-btn');

    $input.on('input', function() {
        const inputValue = $input.val().toLowerCase();
        let categoryFound = '';

        $.each(productCategories, function(index, category) {
            if (category.toLowerCase().includes(inputValue)) {
                categoryFound = category;
                return false; // Break the loop once a match is found
            }
        });

        if (categoryFound !== '') {
            $viewMoreLink.attr('href', window.location.origin + '/product-category/' + categoryFound.toLowerCase());
        } else {
            $viewMoreLink.attr('href', window.location.origin + '/shop');
        }
    });


    // Carousel Hero

    $('.hero__gallery').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: true,
    });


    // Carousel Testimonials

    $('.featured-products__testimonial__slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: true,
        adaptiveHeight: true
    });


    // Slider Featured

    $(window).on('load resize orientationchange', function() {
        $('.featured-products__container-products').each(function(){
            var $carousel = $(this);
            /* Initializes a slick carousel only on mobile screens */
            // slick on mobile
            if ($(window).width() > 1000) {
                if ($carousel.hasClass('slick-initialized')) {
                    $carousel.slick('unslick');
                }
            }
            else {
                if (!$carousel.hasClass('slick-initialized')) {
                    $carousel.slick({
                        infinite: true,
                        dots: true,
                        variableWidth: true,
                        slidesToShow: 5,
                        slidesToScroll: 1,
                        centerMode: true
                    });
                }
            }
        });
    });

    //Baloon Columns

    $('.baloon-colums__slider__main').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        adaptiveHeight: true,
        asNavFor: '.baloon-colums__slider__gallery'
    });
    $('.baloon-colums__slider__gallery').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.baloon-colums__slider__main',
        dots: true,
        infinite: false,
        pauseOnFocus: true,
        centerMode: false,
        focusOnSelect: true,
        variableWidth: true,
        nextArrow: '<svg class="next-arrow" width="22" height="26" viewBox="0 0 22 26" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 24L19.3019 13.4266C19.6209 13.2317 19.6209 12.7683 19.3019 12.5734L2 2" stroke="#70B095" stroke-width="4" stroke-linecap="round"/></svg>',
        prevArrow: '<svg class="prev-arrow" width="22" height="26" viewBox="0 0 22 26" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 2L2.69814 12.5734C2.37911 12.7683 2.37911 13.2317 2.69814 13.4266L20 24" stroke="#70B095" stroke-width="4" stroke-linecap="round"/></svg>',
    });

    // Accordion Environment Block

    function initializeAccordion() {
        $(".environment__text-mobile").accordion({
            collapsible: true,
            active: false,
            heightStyle: 'content',
        });
    }

    // Check screen width on document ready
    var screenWidth = $(window).width();
    if (screenWidth <= 768) {
        initializeAccordion();
    }

    // Resize event handler
    $(window).on('resize', function () {
        var screenWidth = $(window).width();

        // Check if the screen width is less than 768 pixels
        if (screenWidth <= 768) {
            // Reinitialize accordion
            initializeAccordion();
        } else {
            // Destroy accordion if the screen width is 768 pixels or more
            var accordionElement = $(".environment__text-mobile");

            // Check if the accordion is initialized before calling destroy
            if (accordionElement.hasClass("ui-accordion")) {
                accordionElement.accordion("destroy");
            }
        }
    });

    $('#product_info').accordion();

    // Slider Clients

    $('.baloon-colums__slider-clients').slick({
        dots: false,
        infinite: true,
        autoplay: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: false,
        variableWidth: true,
        // "centerMode": true,
        autoplaySpeed: 0,
        speed: 6000,
        cssEase: "linear",
        loop: true
    });

    // Faq Accordion

    $(".faq__text").accordion({
        collapsible: true,
        active: false,
        heightStyle: 'content',
    });    
    $('.product-image__feature-slider').slick({
        // options...
        asNavFor: '.product-image__controls',
        arrows: false
    });
    $('.product-image__controls').slick({
        // options...
        asNavFor: '.product-image__feature-slider',
        variableWidth: true,
        slidesToShow: 4,
        focusOnSelect: true,
        prevArrow: '<button type="button" class="slick-prev"> <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16" fill="none"> <g id="Chevron Left"> <path id="Chevron Left_2" d="M13 1L1.74038 7.56811C1.40963 7.76105 1.40963 8.23895 1.74038 8.43189L13 15" stroke="#70B095" stroke-width="2" stroke-linecap="round"/></g></svg> </button>',
        nextArrow: '<button type="button" class="slick-next"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16" fill="none"><g id="Chevron Right"><path id="Chevron Right_2" d="M1 15L12.2596 8.43189C12.5904 8.23895 12.5904 7.76105 12.2596 7.56811L1 0.999999" stroke="#70B095" stroke-width="2" stroke-linecap="round"/></g></svg></button>'
        // other options such as vertical:true, centerMode:true, etc.
    });
    // Forms Contacts 

    $('.getInTouchBtn').on('click',function() {
        $('.getAQuoteBtn').removeClass('active');
        $(this).addClass('active');

        $('.contact-form__get-a-quote-title').removeClass('active');
        $('.contact-form__get-in-touch-title').addClass('active');

        $('.contact-form__get-a-quote').hide();
        $('.contact-form__get-in-touch').show();
    });

    $('.getAQuoteBtn').on('click',function() {
        $('.getInTouchBtn').removeClass('active');
        $(this).addClass('active');

        $('.contact-form__get-in-touch-title').removeClass('active');
        $('.contact-form__get-a-quote-title').addClass('active');

        $('.contact-form__get-in-touch').hide();
        $('.contact-form__get-a-quote').show();
    });

    // Custom Dropdown 

    $('.select-wrapper').on('click', function() {
        $(this).children('.select').toggleClass('open');
    })

    // Input Custom Dropdown

    $('.contact-form .custom-option').on("click", function() {
        var inputData = $(this).data('value');
        console.log(inputData);
        $('.dropdown-contact').val(inputData);
        $('.contact-form .select__trigger span').html(inputData);
    });
    
    $(document).on("click", function(event) {
        var ContactFormDropdownList = $(".contact-form .custom-options .custom-option");
        var ContactFormDropdownListA = $(".contact-form .custom-options a");
        var ContactFormSelect = $(".contact-form .select");
        var ContactFormSelectTrigger = $(".contact-form .select__trigger");
        var ContactFormSelectTriggerSpan = $(".contact-form .select__trigger span");
        var ContactFormSelectTriggerArrow = $(".contact-form .select__trigger .arrow");
        var BlogsDropdownList = $(".blogs .custom-options .custom-option");
        var BlogsDropdownListA = $(".blogs .custom-options a");
        var BlogsSelect = $(".blogs .select");
        var BlogsSelectTrigger = $(".blogs .select__trigger");
        var BlogsSelectTriggerSpan = $(".blogs .select__trigger span");
        var BlogsSelectTriggerArrow = $(".blogs .select__trigger .arrow");
        var LegalDropdownList = $(".legal-categories .custom-options .custom-option");
        var LegalDropdownListA = $(".legal-categories .custom-options a");
        var LegalSelect = $(".legal-categories .select");
        var LegalSelectTrigger = $(".legal-categories .select__trigger");
        var LegalSelectTriggerSpan = $(".legal-categories .select__trigger span");
        var LegalSelectTriggerArrow = $(".legal-categories .select__trigger .arrow");

        if (!ContactFormDropdownList.is(event.target) && !ContactFormDropdownListA.is(event.target) && !ContactFormSelectTrigger.is(event.target) && !ContactFormSelectTriggerArrow.is(event.target) && !ContactFormSelectTriggerSpan.is(event.target)) {
            ContactFormSelect.removeClass("open");
        }

        if (!BlogsDropdownList.is(event.target) && !BlogsDropdownListA.is(event.target) && !BlogsSelectTrigger.is(event.target) && !BlogsSelectTriggerArrow.is(event.target) && !BlogsSelectTriggerSpan.is(event.target)) {
            BlogsSelect.removeClass("open");
        }

        if (!LegalDropdownList.is(event.target) && !LegalDropdownListA.is(event.target) && !LegalSelectTrigger.is(event.target) && !LegalSelectTriggerArrow.is(event.target) && !LegalSelectTriggerSpan.is(event.target)) {
            LegalSelect.removeClass("open");
        }
    });

    // Slider Clients
    function initSlick() {
        $('.baloon-colums__swiper').slick({
            dots: false,
            slidesToShow: 5,
            slidesToScroll: 1,
            arrows: true,
            variableWidth: true,
            infinite: false,
            waitForAnimate: true,
            cssEase: 'ease',
            nextArrow: '<svg class="next-arrow" width="22" height="26" viewBox="0 0 22 26" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 24L19.3019 13.4266C19.6209 13.2317 19.6209 12.7683 19.3019 12.5734L2 2" stroke="#70B095" stroke-width="4" stroke-linecap="round"/></svg>',
            prevArrow: '<svg class="prev-arrow" width="22" height="26" viewBox="0 0 22 26" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 2L2.69814 12.5734C2.37911 12.7683 2.37911 13.2317 2.69814 13.4266L20 24" stroke="#70B095" stroke-width="4" stroke-linecap="round"/></svg>',
        });
    }

    initSlick();

    // Reinitialize slick on window resize if the width is between 1000px and 1400px

    $(window).on('resize', function() {
        console.log('res')
        var windowWidth = $(window).width();
        
        if (windowWidth === 1000 ) {
            console.log('resize1')
            // Destroy the existing slick slider
            $('.baloon-colums__swiper').slick('unslick');
            // Initialize slick again with specific settings
            initSlick();
            // Go to the first slide
            $('.baloon-colums__swiper').slick('slickGoTo', 0);
        }

        if (windowWidth === 758) {
            console.log('resize2')
            // Destroy the existing slick slider
            $('.baloon-colums__swiper').slick('unslick');
            // Initialize slick again with specific settings
            initSlick();
            $('.baloon-colums__swiper').slick('slickGoTo', 0);
        }
    });

    $('.baloon-colums__swiper__slide').on('mouseenter', function() {
        // On hover, remove slick-current class from all slides
        $('.baloon-colums__swiper__slide.slick-current').removeClass('width');
        $('.baloon-colums__swiper__slide').removeClass('slick-current');
        // Add slick-current class to the hovered slide
        $(this).addClass('slick-current');
    }).on('mouseleave', function () {
        $(this).removeClass('width slick-current');
        // Add 'width' class to the first visible slide on mouse leave
        $('.baloon-colums__swiper__slide.slick-active').first().addClass('width slick-current');
    });

    $('.baloon-colums__swiper').on('beforeChange', function(event, slick, currentSlide, nextSlide){
  
        // Add the class to the next slide
        if (nextSlide > currentSlide) {
            // Remove the class from all slides
            $('.baloon-colums__swiper .slick-slide[data-slick-index="' + currentSlide + '"]').addClass('width');
            $('.baloon-colums__swiper .slick-slide[data-slick-index="' + nextSlide + '"]').addClass('width');
        }else{
            $('.baloon-colums__swiper .slick-slide[data-slick-index="' + currentSlide + '"]').removeClass('width');
        }

    });

    //Cookie Banner

    var cookieBanner = $('#cookie-banner');
    var functionalCookies = $('#functional-cookies');
    var performanceCookies = $('#performance-cookies');
    var closeCookies = $('#cookie-svg');

    // Function to set a cookie with an expiration date
    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + "; " + expires + "; path=/";
    }

    // Function to get a cookie value by name
    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    
    // Hide empty p tags
    
    $('p').each(function() {
        if ($.trim($(this).text()) === "" && $(this).children().length === 0) {
            $(this).hide();
        }
    });


    // Check if the user has previously accepted cookies
    var cookiesAccepted = getCookie('cookiesAccepted');
    var performanceCookiesAccepted = getCookie('performanceCookiesAccepted');

    closeCookies.on('click', function () {
        cookieBanner.hide();
        
        // Set a cookie to remember that the user closed the banner
        setCookie('cookiesAccepted', 'true', 365); // 365 days expiration (adjust as needed)
    });

    // If cookies have not been accepted, show the banner
    // Check if cookies are accepted
if (!localStorage.getItem('cookiesAccepted')) {
    // Show the cookie banner
    cookieBanner.show();
    cookieBanner.addClass('show');
    functionalCookies.prop('checked', true);
    performanceCookies.prop('checked', true);
    if (functionalCookies.prop('checked') || performanceCookies.prop('checked')) {
        // Set cookiesAccepted to true in local storage for 365 days
        localStorage.setItem('cookiesAccepted', 'true', 365);

        // Check if performance cookies are checked and not already accepted
        if (performanceCookies.prop('checked') && !localStorage.getItem('performanceCookiesAccepted')) {
            // Set performanceCookiesAccepted to true in local storage for 365 days
            localStorage.setItem('performanceCookiesAccepted', 'true', 365);

            // Load Hotjar script
            var script = document.createElement('script');
            script.id = "hotjar-script"
            script.innerHTML = `(function(h,o,t,j,a,r){
                h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
                h._hjSettings={hjid:3605603,hjsv:6};
                a=o.getElementsByTagName('head')[0];
                r=o.createElement('script');r.async=1;
                r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
                a.appendChild(r);
            })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');`;

            // Append the script element to the head of the document
            $('head').append(script);
        }
    }

    // Handle changes in functional and performance cookies
    performanceCookies.on('change', function () {
        if (performanceCookies.prop('checked')) {
            // Set performanceCookiesAccepted to true in local storage for 365 days
            localStorage.setItem('performanceCookiesAccepted', 'true', 365);

            // Load Hotjar script
            var script = document.createElement('script');
            script.id = "hotjar-script"
            script.innerHTML = `(function(h,o,t,j,a,r){
                h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
                h._hjSettings={hjid:3605603,hjsv:6};
                a=o.getElementsByTagName('head')[0];
                r=o.createElement('script');r.async=1;
                r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
                a.appendChild(r);
            })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');`;

            // Append the script element to the head of the document
            $('head').append(script);
        
        }else{
        // Check if either functional or performance cookies are checked
        // Remove Hotjar script if either functional or performance cookies are unchecked
            $('#hotjar-script').remove();
        }
    });

    } else {
        cookieBanner.hide();
        if (performanceCookiesAccepted) {
            // Load Hotjar script
            var script = document.createElement('script');
            script.innerHTML = `(function(h,o,t,j,a,r){
                h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
                h._hjSettings={hjid:3605603,hjsv:6};
                a=o.getElementsByTagName('head')[0];
                r=o.createElement('script');r.async=1;
                r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
                a.appendChild(r);
            })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');`;
            // Append the script element to the head of the document
            $('head').append(script);
        }
    }
    
    // Gsap animations

    var timeline = gsap.timeline();

    var blocksTextImage = gsap.utils.toArray(".text-image");

    blocksTextImage.forEach((block) => {
        gsap.set(block, { opacity: 0, y: 50 });
    });

    blocksTextImage.forEach((block) => {
        gsap.to(block, {
            scrollTrigger: {
                trigger: block,
                start: "-200px center",
                end: "800px 50%",
                onEnter: () => { gsap.to(block, { opacity: 1, y: 0 }); },
                onLeave: () => { gsap.to(block, { opacity: 0, y: -50 }); },
                onEnterBack: () => { gsap.to(block, { opacity: 1, y: 0 }); },
            }
        })
    });

    var blocksBalloonColumns = gsap.utils.toArray(".baloon-colums");

    blocksBalloonColumns.forEach((block) => {
        gsap.set(block, { opacity: 0, y: 50 });
    });

    blocksBalloonColumns.forEach((block) => {
        gsap.to(block, {
            scrollTrigger: {
                trigger: block,
                start: "-200px center",
                end: "400px 10%",
                onEnter: () => { gsap.to(block, { opacity: 1, y: 0 }); },
                onLeave: () => { gsap.to(block, { opacity: 0, y: -50 }); },
                onEnterBack: () => { gsap.to(block, { opacity: 1, y: 0 }); },
            }
        })
    });

    var blocksEnvironment = gsap.utils.toArray(".environment");

    blocksEnvironment.forEach((block) => {
        gsap.set(block, { opacity: 0, y: 50 });
    });

    blocksEnvironment.forEach((block) => {
        gsap.to(block, {
            scrollTrigger: {
                trigger: block,
                start: "-200px center",
                end: "1000px 50%",
                onEnter: () => { gsap.to(block, { opacity: 1, y: 0 }); },
                onLeave: () => { gsap.to(block, { opacity: 0, y: -50 }); },
                onEnterBack: () => { gsap.to(block, { opacity: 1, y: 0 }); },
            }
        })
    });

    var getQuotes = gsap.utils.toArray(".get-a-quote");

    getQuotes.forEach((block) => {
        gsap.set(block, { opacity: 0, y: 50 });
    });

    getQuotes.forEach((block) => {
        gsap.to(block, {
            scrollTrigger: {
                trigger: block,
                start: "-250px center",
                end: "800px 50%",
                onEnter: () => { gsap.to(block, { opacity: 1, y: 0 }); },
                onLeave: () => { gsap.to(block, { opacity: 0, y: -50 }); },
                onEnterBack: () => { gsap.to(block, { opacity: 1, y: 0 }); },
            }
        })
    });

    var contactForms = gsap.utils.toArray(".contact-form");

    contactForms.forEach((block) => {
        gsap.set(block, { opacity: 0, y: 50 });
    });

    contactForms.forEach((block) => {
        gsap.to(block, {
            scrollTrigger: {
                trigger: block,
                start: "-200px center",
                end: "800px 50%",
                onEnter: () => { gsap.to(block, { opacity: 1, y: 0 }); },
                onLeave: () => { gsap.to(block, { opacity: 0, y: -50 }); },
                onEnterBack: () => { gsap.to(block, { opacity: 1, y: 0 }); },
            }
        })
    });

    var faqsBlock = gsap.utils.toArray(".faq");

    faqsBlock.forEach((block) => {
        gsap.set(block, { opacity: 0, y: 50 });
    });

    faqsBlock.forEach((block) => {
        gsap.to(block, {
            scrollTrigger: {
                trigger: block,
                start: "-200px center",
                end: "800px 50%",
                onEnter: () => { gsap.to(block, { opacity: 1, y: 0 }); },
                onLeave: () => { gsap.to(block, { opacity: 0, y: -50 }); },
                onEnterBack: () => { gsap.to(block, { opacity: 1, y: 0 }); },
            }
        })
    });

    var titleParagraphs = gsap.utils.toArray(".title-paragraph");

    titleParagraphs.forEach((block) => {
        gsap.set(block, { opacity: 0, y: 50 });
    });

    titleParagraphs.forEach((block) => {
        gsap.to(block, {
            scrollTrigger: {
                trigger: block,
                start: "-200px center",
                end: "500px 50%",
                onEnter: () => { gsap.to(block, { opacity: 1, y: 0 }); },
                onLeave: () => { gsap.to(block, { opacity: 0, y: -50 }); },
                onEnterBack: () => { gsap.to(block, { opacity: 1, y: 0 }); },
            }
        })
    });


    var ProductTestimonial = gsap.utils.toArray(".featured-products__testimonial");

    ProductTestimonial.forEach((block) => {
        gsap.set(block, { opacity: 0, y: 50 });
    });

    ProductTestimonial.forEach((block) => {
        gsap.to(block, {
            scrollTrigger: {
                trigger: block,
                start: "-200px center",
                end: "500px 50%",
                onEnter: () => { gsap.to(block, { opacity: 1, y: 0 }); },
                onLeave: () => { gsap.to(block, { opacity: 0, y: -50 }); },
                onEnterBack: () => { gsap.to(block, { opacity: 1, y: 0 }); },
            }
        })
    });


    var BlogCards = gsap.utils.toArray(".blogs__card");

    BlogCards.forEach((block, index) => {
        setTimeout(function () { 
            gsap.to(block,{
                scrollTrigger: {
                    trigger: block,
                    start: "top bottom",
                    end: "bottom top",
                    scrub: true,
                    toggleClass: "active",
                    // addName: 'active',
                },
            });
        }, 500 * index);
    });


    if ($('body').hasClass('home')) {

        var HeroWrapper = gsap.utils.toArray(".hero__wrapper");
        HeroWrapper.forEach((block) => {
            timeline.fromTo(block, { x: -1000, opacity: 0 }, { x: 0, opacity: 1, duration: 1 });
        });

        var ProductsContainer = gsap.utils.toArray(".featured-products__general-container");
        ProductsContainer.forEach((block) => {
            timeline.fromTo(block, { x: -1000, opacity: 0 }, { x: 0, opacity: 1, duration: 1 });
        });

        var HeroSliders = gsap.utils.toArray(".hero__gallery");
        HeroSliders.forEach((block) => {
            timeline.fromTo(block, { x: 1372, opacity: 0 }, { x: 0, opacity: 1, duration: 1 }, '+=0.2');
        });

        var HeroImages = gsap.utils.toArray(".hero__image");
        HeroImages.forEach((block) => {
            timeline.fromTo(block, { x: 1372, opacity: 0 }, { x: 0, opacity: 1, duration: 1 }, '+=0.2');
        });

    }


    $(".product-image .prev").click(function () {
		$(".slick-list").slick("slickPrev");
	});

	$(".product-image .next").click(function () {
		$(".slick-list").slick("slickNext");
	});


    $('.variations').addClass('active');
    $('.product__option-buttons .options').addClass('active');
    var stepCount = 0;
    $('.product-next-step').on('click', function() {
        stepCount++;
        $('.variations,.wc-pao-addon-container,.wc-pao-addon-container, .wc-pao-addon-container, .product_meta,#product-addons-total, .single_variation_wrap, .woocommerce-variation-add-to-cart').removeClass('active');
        console.log(stepCount);
        if(stepCount == 1){
            $('.wc-pao-addon-container').addClass('active');
            $('.product__option-buttons button').removeClass('active');
            $('.extras').addClass('active');
            $('.addons-slider-button.slick-prev').click();
            $('.addons-slider-button.slick-next').click();
        }
        if(stepCount == 2){
            $('#product-addons-total, .woocommerce-variation-add-to-cart').addClass('active');
            $('.product__option-buttons button').removeClass('active');
            $('.summary').addClass('active');
            $('.product-next-step').hide();
        }
    });

    $('.wc-pao-addon-wrap').each(function() {
        console.log('this o0', $(this));
        if ($(this).has('a').length > 0) {
            console.log('this', $(this));
            $(this).addClass('addon-slider');
        }
    });
    $('.product__option-buttons button').on('click', function() {
        stepCount = $(this).data('count');

        $(this).siblings().removeClass('active');
        $(this).addClass('active');
        $('.variations,.wc-pao-addon-container,.wc-pao-addon-container, .wc-pao-addon-container,#product-addons-total, .product_meta, .single_variation_wrap,.woocommerce-variation-add-to-cart').removeClass('active');
        if(stepCount == 0){
            $('.variations').addClass('active');
            $('.product-next-step').show();
        }
        if(stepCount == 1){
            $('.wc-pao-addon-container').addClass('active');
            $('.addons-slider-button.slick-prev').click();
            $('.addons-slider-button.slick-next').click();
            $('.product-next-step').show();
        }
        if(stepCount == 2){
            $('#product-addons-total, .woocommerce-variation-add-to-cart, .price').addClass('active');
            $('.product-next-step').hide();
            
        }
    });
    // $('.addon-slider').slick({
    //     slidesToShow: 3,
    //     slidesToScroll: 1,
    //     dots: true,
    //     prevArrow: '<button type="button" class="addons-slider-button slick-prev"> <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16" fill="none"> <g id="Chevron Left"> <path id="Chevron Left_2" d="M13 1L1.74038 7.56811C1.40963 7.76105 1.40963 8.23895 1.74038 8.43189L13 15" stroke="#70B095" stroke-width="2" stroke-linecap="round"/></g></svg> </button>',
    //     nextArrow: '<button type="button" class="addons-slider-button"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16" fill="none"><g id="Chevron Right"><path id="Chevron Right_2" d="M1 15L12.2596 8.43189C12.5904 8.23895 12.5904 7.76105 12.2596 7.56811L1 0.999999" stroke="#70B095" stroke-width="2" stroke-linecap="round"/></g></svg></button>',
    //     customPaging: function(slider, i) {
    //         return (i + 1); // Display numbers starting from 1
    //         // If you want to start from 0, you can use: return i;
    //       },
    // });

    // Filter shop page
    
    $('.filter-button__button').on('click', function () {
        $('.filter-button').toggleClass('open');
        $('.shadow').toggleClass('open');
    });

    $('.filter-button__filters svg').on('click', function () {
        $('.filter-button').removeClass('open');
        $('.shadow').removeClass('open');
    });
});