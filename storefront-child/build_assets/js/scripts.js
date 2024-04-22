
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

    $('.mobile-menu__overlay').on('click', function(){
        $('body').removeClass('modal-open');
        $('.mobile-menu').removeClass('open');
        $('.close').removeClass('show');
        $('.hamburger').removeClass('hide');
        $('.header').removeClass('menu-mobile');
    });

    // Menu Mobile 

    $('.menu-item-has-children .svg-container').on('click', function(e) {
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
        const input = document.getElementById('search-input');
        input.focus();
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

    // Get the Data from PHP functions.php to retrieve productCategories

    var productCategories = dataFromPHP.productCategories;
    var productData = dataFromPHP.productData;
    var pageData = dataFromPHP.pageData;

    console.log(productCategories)
    console.log(productData)
    console.log(pageData)


    $('#search-input').on('input', function() {
        var searchText = $(this).val().toLowerCase().trim();
        var matchFound = false;

        if (searchText.length > 0) {

            $('.pages-container p').each(function() {
                var pageText = $(this).text().toLowerCase();

                if (pageText.includes(searchText)) {
                    $(this).addClass('open');
                    matchFound = true;
                } else {
                    $(this).removeClass('open');
                }
            });

            if (matchFound) {
                $('.search__container__searching .heading-pages').addClass('open');
                $('.search__container__searching .pages-container').addClass('open');
            } else {
                $('.search__container__searching .heading-pages').removeClass('open');
                $('.search__container__searching .pages-container').removeClass('open');
            }

        }else{
            $('.pages-container p').each(function() {
                $(this).removeClass('open');
            });
            $('.search__container__searching .heading-pages').removeClass('open');
            $('.search__container__searching .pages-container').removeClass('open');
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
        var hasImageMatch = false
    
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
            document.querySelectorAll('.header .product-container .product-name').forEach(function(product) {
                var title = product.querySelector('h2').textContent.toLowerCase();
                if (title.includes(searchText)) {
                    hasImageMatch = true;
                }
            });
            if (hasImageMatch) {
                $('.search__container__searching .heading-products').addClass('open');
            } else {
                $('.search__container__searching .heading-products').removeClass('open');
            }
            
        } else {
            numToShow = 0;
            showProducts(0); // Reset to 0 initially
            showMoreButton.style.display = 'none';
            $('.search__container__searching .heading-products').removeClass('open');
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
            $viewMoreLink.attr('href', window.location.origin + '/shop/product-category/' + categoryFound.toLowerCase());
        } else {
            $viewMoreLink.attr('href', window.location.origin + '/shop');
        }
    });


    // Carousel Hero

    if ($(window).width() > 450) {
        $('.hero__gallery__container').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            dots: true,
            variableWidth: true,
            autoplay: true,
            autoplaySpeed: 4000,
        });
    }else{
        $('.hero__gallery__container').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            dots: true,
            autoplay: true,
            autoplaySpeed: 4000,
        });
    }

    $(window).on('resize orientationchange', function () {
        // Adjust Slick slider on resize or orientation change
        if ($(window).width() > 450) {
            $('.hero__gallery__container').slick('unslick');
            $('.hero__gallery__container').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                dots: true,
                autoplay: true,
                autoplaySpeed: 4000,
            });
        } else {
            $('.hero__gallery__container').slick('unslick');
            $('.hero__gallery__container').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                dots: true,
                autoplay: true,
                autoplaySpeed: 4000,
            });
        }
    });


    // Carousel Testimonials

    $('.featured-products__testimonial__slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: true,
        autoplay: true,
        autoplaySpeed: 4000,
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
        infinite: true,
        pauseOnFocus: true,
        centerMode: false,
        focusOnSelect: true,
        variableWidth: true,
        nextArrow: '<svg class="next-arrow" width="22" height="26" viewBox="0 0 22 26" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 24L19.3019 13.4266C19.6209 13.2317 19.6209 12.7683 19.3019 12.5734L2 2" stroke="#70B095" stroke-width="4" stroke-linecap="round"/></svg>',
        prevArrow: '<svg class="prev-arrow" width="22" height="26" viewBox="0 0 22 26" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 2L2.69814 12.5734C2.37911 12.7683 2.37911 13.2317 2.69814 13.4266L20 24" stroke="#70B095" stroke-width="4" stroke-linecap="round"/></svg>',
    });

    // Accordion Environment Block

    function initializeAccordion() {
        $(".environment__text__option-mobile").accordion({
            collapsible: true,
            active: false,
            heightStyle: 'content',
        });
    }

    initializeAccordion();

    $('.environment__text__title p a').on('click', function(event) {

        event.stopPropagation();
    });


    // Accordion Product Infos

    $(".product-infos__informations").each(function(index, element) {
        if (index === 0) {
            console.log(true)
            $(element).accordion({
                collapsible: true,
                active: 0,
                heightStyle: 'content'
            });
        }else{
            console.log(false)
            $(element).accordion({
                collapsible: true,
                active: false,
                heightStyle: 'content'
            });
        }

    });

    // Slider Clients

    $(window).on('load resize orientationchange', function() {
        console.log('orientation')

        const recalculateSlider = function() {

            const $wrapper = $('.baloon-colums__slider-clients__wrapper');
            const $inner = $('.baloon-colums__slider-clients__inner');
            const $items = $('.baloon-colums__slider-clients__image');
            
            let wrapWidth = 0;
            let viewWidth = 0;
            let widths = [];
            
            // Check if wrapper exists before accessing its width
            if ($wrapper.length > 0) {
                viewWidth = $wrapper.width();
            }
            
            // get total wrap width, and set items at initial positions
            $items.each(function() {
                const $item = $(this);
                const width = $item.width();
                const widthBefore = wrapWidth;
                widths.push(width);
                
                $item.css('transform', 'translateX(' + widthBefore + 'px)');
                
                wrapWidth += width;
            });
            
            // get longest width of item widths and set inner position based off value
            const longestWidth = Math.max(...widths);
            $inner.css('left', -longestWidth);
            
            // setup animation
            const animation = gsap.to($items, 60, {
                x: "+=" + wrapWidth,
                ease: 'none',
                paused: false,
                repeat: -1, // Infinite repeat
                modifiers: {
                    x: function(x, target) {
                        x = parseFloat(x) % wrapWidth;
                        
                        $(target).css('visibility', x - longestWidth > viewWidth ? 'hidden' : 'visible');
                        
                        return x + 'px';
                    }
                }
            });

        };

        recalculateSlider();

    });

    $(window).on('load resize orientationchange', function() {
        console.log('orientation')

        const recalculateSlider = function() {

            const $wrapper = $('.hero__slider-clients__wrapper');
            const $inner = $('.hero__slider-clients__inner');
            const $items = $('.hero__slider-clients__image');
            
            let wrapWidth = 0;
            let viewWidth = 0;
            let widths = [];
            
            // Check if wrapper exists before accessing its width
            if ($wrapper.length > 0) {
                viewWidth = $wrapper.width();
            }
            
            // get total wrap width, and set items at initial positions
            $items.each(function() {
                const $item = $(this);
                const width = $item.width();
                const widthBefore = wrapWidth;
                widths.push(width);
                
                $item.css('transform', 'translateX(' + widthBefore + 'px)');
                
                wrapWidth += width;
            });
            
            // get longest width of item widths and set inner position based off value
            const longestWidth = Math.max(...widths);
            $inner.css('left', -longestWidth);
            $inner.addClass('opacity');
            
            // setup animation
            const animation = gsap.to($items, 60, {
                x: "+=" + wrapWidth,
                ease: 'none',
                paused: false,
                repeat: -1, // Infinite repeat
                modifiers: {
                    x: function(x, target) {
                        x = parseFloat(x) % wrapWidth;
                        
                        $(target).css('visibility', x - longestWidth > viewWidth ? 'hidden' : 'visible');
                        
                        return x + 'px';
                    }
                }
            });

        };

        recalculateSlider();

    });

    // Faq Accordion

    $(".faq__text__container").each(function(index, element) {
        // Get the value of the data-value attribute
        var dataValue = $(element).data('value');

        // Convert the data-value to a boolean
        var isActive = (dataValue === true);

        // Initialize accordion with collapsible, heightStyle, and set the active option
        $(element).accordion({
            collapsible: true,
            active: isActive ? 0 : false,
            heightStyle: 'content'
        });
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

    var swiperCarousel;
    function initSlick() {
        swiperCarousel = $('.baloon-colums__swiper').slick({
            dots: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            variableWidth: true,
            infinite: true,
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
    
    var isiPadOrTablet = navigator.userAgent.match(/iPad|iPhone|Android|Touch/i) !== null || navigator.platform === 'MacIntel' && navigator.maxTouchPoints > 1;
    console.log(isiPadOrTablet, 'detectedddd')

    if (!isiPadOrTablet) {
        
        $('.baloon-colums__swiper__slide').on('mouseenter', function() {
            // On hover, remove slick-current class from all slides
            $('.baloon-colums__swiper__slide.slick-current').removeClass('width');
            $('.baloon-colums__swiper__slide').removeClass('slick-current');
            // Add slick-current class to the hovered slide
            $(this).addClass('width slick-current');
        
            // Check if the current slide's index matches the data-index of the corresponding baloon-colums__text__item
            if ($(this).hasClass('slick-cloned')) {
                var currentSlideIndex = $(this).data('slick-index');
                $('.baloon-colums__text__item').each(function() {
                    var totalSlides = swiperCarousel.slick('getSlick').slideCount;
                    var dataIndex = $(this).data('index');
                    var clonedSlides = currentSlideIndex - totalSlides;
                    console.log(clonedSlides, 'data')
                    if (clonedSlides === dataIndex) {
                        $(this).show();
                    }else{
                        $(this).hide();
                    }
                });
            } else {
                var currentSlideIndex = $(this).data('slick-index');
                $('.baloon-colums__text__item').each(function() {
                    var dataIndex = $(this).data('index');
                    console.log(dataIndex)
                    console.log(currentSlideIndex)
                    if (currentSlideIndex === dataIndex) {
                        $(this).show();
                    }else{
                        $(this).hide();
                    }
                });
            }
        });

    }

    if (!isiPadOrTablet) {

        $('.baloon-colums__slider-container').on('mouseleave ', function (e) {
            // Check if the mouse leave event is triggexred by the slider container,
            // not the next or prev arrows inside baloon-colums__swiper
            if (!$(e.target).hasClass('next-arrow') && !$(e.target).hasClass('prev-arrow')) {
                // On mouse leave baloon-colums__slider-container, remove class width slick-current
                $('.baloon-colums__swiper__slide.slick-current').removeClass('width slick-current');

                var visibleSlideIndex = $('.baloon-colums__swiper__slide.slick-active').first().data('slick-index');
        
                // Add 'width' class to the first visible slide on mouse leave
                $('.baloon-colums__swiper__slide.slick-active').first().addClass('width slick-current');
        
                // Check if the first visible slide's index matches the data-index of the corresponding baloon-colums__text__item
                // $('.baloon-colums__text__item').each(function () {

                //     var dataIndex = $(this).data('index');

                //     if (visibleSlideIndex === dataIndex) {
                //         $(this).show();
                //         console.log(true)
                //     } else {
                //         $(this).hide();
                //     }
                // });
                $('.baloon-colums__text__item').hide();
                $('.baloon-colums__text__item[data-index="' + visibleSlideIndex + '"]').show();
            }
        });

    }

    $('.baloon-colums__swiper').on('beforeChange', function(event, slick, currentSlide, nextSlide){
        // Add the class to the next slidex
        if (nextSlide > currentSlide || (nextSlide === 0 && (slick.slideCount - 1) === currentSlide)) {
            // Remove the class from all slides
                $('.baloon-colums__swiper .slick-slide[data-slick-index="' + currentSlide + '"]').addClass('width');
                $('.baloon-colums__swiper .slick-slide[data-slick-index="' + nextSlide + '"]').addClass('width');
                console.log(nextSlide, 'nextslide')
                console.log(currentSlide, 'currentslide')
                // if(nextSlide >= slick.slideCount - 5) {
                //     console.log(true)
                //     $('.baloon-colums__swiper .slick-slide[data-slick-index="' + currentSlide + '"]').removeClass('width');
                //     $('.baloon-colums__swiper .slick-slide[data-slick-index="' + nextSlide + '"]').addClass('width');
                // }
                if (nextSlide === 0 && ((slick.slideCount - 1) === currentSlide)) {
                    $('.baloon-colums__swiper .slick-slide[data-slick-index="' + nextSlide + '"]').removeClass('width');
                    $('.baloon-colums__swiper .slick-slide[data-slick-index="' + nextSlide + '"]').addClass('target');
                    $('.baloon-colums__swiper .slick-list').addClass('opacity');
              
                }
                
        }else{
            // var currentElement = $('.baloon-colums__swiper .slick-current');
            // var firstActive = document.querySelectorAll(".baloon-colums__swiper .slick-active")[0];
            // console.log(currentElement)
            $('.baloon-colums__swiper .slick-slide[data-slick-index="' + currentSlide + '"]').removeClass('width');
        }

    });

    $('.baloon-colums__swiper').on('afterChange', function(event, slick, currentSlide){
        if(currentSlide === 0) {
            $('.baloon-colums__swiper .slick-slide').not('[data-slick-index="' + currentSlide + '"]').removeClass('width');
            $('.slick-slide').removeClass('target');
            setTimeout(function() {
                $('.baloon-colums__swiper .slick-list').removeClass('opacity');
            }, 600);
        }
        var firstActive = document.querySelectorAll(".baloon-colums__swiper .slick-active")[0];
        if (!firstActive.classList.contains('slick-current')) {
            $('.baloon-colums__swiper .slick-slide.slick-current').removeClass('width');
            $('.baloon-colums__swiper .slick-slide.slick-current').removeClass('slick-current');

            // Add 'slick-current' class to firstActive
            var firstActive = $('.baloon-colums__swiper .slick-active').eq(0);
            firstActive.addClass('width');
            firstActive.addClass('slick-current');
            
        }
        var slickCurrentIndex = currentSlide;
        
        // Assuming baloon-colums__text__item has a common class, adjust the selector accordingly
        $('.baloon-colums__text__item').each(function() {
            var dataIndex = $(this).data('index');
            
            if (slickCurrentIndex === dataIndex) {
                $(this).show(); // Show the baloon-colums__text__item
            } else {
                $(this).hide(); // Hide the baloon-colums__text__item if not matching
            }
        });
    });

    $('.baloon-colums__no-slider__image').on('mouseenter', function() {
        // Remove active class from all images
        $('.baloon-colums__no-slider__image').removeClass('active');
        // Add active class to hovered image
        $(this).addClass('active');
        console.log('red')
        var currentSlideIndex = $(this).data('index');
        $('.baloon-colums__text__item').each(function() {
            var dataIndex = $(this).data('index');
            if (currentSlideIndex === dataIndex) {
                $(this).addClass('active');
            }else{
                $(this).removeClass('active');
            }
        });
        // $('.baloon-colums__slider-container__top-title').each(function() {
        //     var dataIndex = $(this).data('index');
        //     if (currentSlideIndex === dataIndex) {
        //         $(this).show();
        //     }else{
        //         $(this).hide();
        //     }
        // });
    })
    // $('.baloon-colums__no-slider').on('mouseleave', function() {
    //     $('.baloon-colums__slider-container__top-title').hide();
    //     $('.baloon-colums__slider-container__top-title[data-index="0"]').show();
    // });
    // $('.baloon-colums__slider-container').on('mouseleave', function() {
    //     // Add active class to the first image on mouse leave
    //     $('.baloon-colums__no-slider__image').removeClass('active');
    //     $('.baloon-colums__no-slider__image:first-child').addClass('active');
    //     $('.baloon-colums__text__item[data-index="0"]').show();
    // });

    $('.baloon-colums__slider__gallery').on('afterChange', function(event, slick, currentSlide){
        var slickCurrentIndex = currentSlide;
        
        // Assuming baloon-colums__text__item has a common class, adjust the selector accordingly
        $('.baloon-colums__text__item').each(function() {
            var dataIndex = $(this).data('index');
            
            if (slickCurrentIndex === dataIndex) {
                $(this).show(); // Show the baloon-colums__text__item
            } else {
                $(this).hide(); // Hide the baloon-colums__text__item if not matching
            }
        });

        if ($(window).width() <= 758) {

            $('.baloon-colums__title-mobile').each(function() {
                var dataIndex = $(this).data('index');
                
                if (slickCurrentIndex === dataIndex) {
                    $(this).show(); // Show the baloon-colums__text__item
                } else {
                    $(this).hide(); // Hide the baloon-colums__text__item if not matching
                }
            });

            // $('.baloon-colums__slider-container__top-title').each(function() {
            //     var dataIndex = $(this).data('index');
                
            //     if (slickCurrentIndex === dataIndex) {
            //         $(this).show(); // Show the baloon-colums__text__item
            //     } else {
            //         $(this).hide(); // Hide the baloon-colums__text__item if not matching
            //     }
            // });

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
                start: "top bottom",
                end: "1300px 50%",
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
                start: "top bottom",
                end: "1100px 10%",
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
                start: "top bottom",
                end: "1500px 50%",
                onEnter: () => { gsap.to(block, { opacity: 1, y: 0 }); },
                onLeave: () => { gsap.to(block, { opacity: 0, y: -50 }); },
                onEnterBack: () => { gsap.to(block, { opacity: 1, y: 0 }); },
            }
        })
    });

    // var getQuotes = gsap.utils.toArray(".get-a-quote");

    // getQuotes.forEach((block) => {
    //     gsap.set(block, { opacity: 1, y: 0 });
    // });

    // getQuotes.forEach((block) => {
    //     gsap.to(block, {
    //         scrollTrigger: {
    //             trigger: block,
    //             start: "-250px center",
    //             onLeave: () => { gsap.to(block, { opacity: 0, y: -50 }); },
    //             onEnterBack: () => { gsap.to(block, { opacity: 1, y: 0 }); },
    //         }
    //     })
    // });

    // var contactForms = gsap.utils.toArray(".contact-form");

    // contactForms.forEach((block) => {
    //     gsap.set(block, { opacity: 1, y: 50 });
    // });

    // contactForms.forEach((block) => {
    //     gsap.to(block, {
    //         scrollTrigger: {
    //             trigger: block,
    //             start: "-200px center",
    //             onEnter: () => { gsap.to(block, { opacity: 1, y: 0 }); },
    //             onLeave: () => { gsap.to(block, { opacity: 0, y: -50 }); },
    //             onEnterBack: () => { gsap.to(block, { opacity: 1, y: 0 }); },
    //         }
    //     })
    // });

    var faqsBlock = gsap.utils.toArray(".faq");

    faqsBlock.forEach((block) => {
        gsap.set(block, { opacity: 0, y: 50 });
    });

    faqsBlock.forEach((block) => {
        gsap.to(block, {
            scrollTrigger: {
                trigger: block,
                start: "top bottom",
                end: "1000px 50%",
                onEnter: () => { gsap.to(block, { opacity: 1, y: 0 }); },
                onLeave: () => { gsap.to(block, { opacity: 0, y: -50 }); },
                onEnterBack: () => { gsap.to(block, { opacity: 1, y: 0 }); },
            }
        })
    });

    // var titleParagraphs = gsap.utils.toArray(".title-paragraph");

    // titleParagraphs.forEach((block) => {
    //     gsap.set(block, { opacity: 0, y: 50 });
    // });

    // titleParagraphs.forEach((block) => {
    //     gsap.to(block, {
    //         scrollTrigger: {
    //             trigger: block,
    //             start: "-200px center",
    //             onEnter: () => { gsap.to(block, { opacity: 1, y: 0 }); },
    //             onLeave: () => { gsap.to(block, { opacity: 0, y: -50 }); },
    //             onEnterBack: () => { gsap.to(block, { opacity: 1, y: 0 }); },
    //         }
    //     })
    // });


    var ProductTestimonial = gsap.utils.toArray(".featured-products__testimonial");

    ProductTestimonial.forEach((block) => {
        gsap.set(block, { opacity: 0, y: 50 });
    });

    ProductTestimonial.forEach((block) => {
        gsap.to(block, {
            scrollTrigger: {
                trigger: block,
                start: "-200px center",
                end: "600px 50%",
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


    // Balloons Columns text hide or show
    $(window).on('load', function() {
        var slickCurrentIndex = $('.slick-current').data('slickIndex');
        $('.baloon-colums__text__item').each(function() {
            var dataIndex = $(this).data('index');
            
            if (slickCurrentIndex === dataIndex) {
                $(this).show(); // Show the baloon-colums__text__item
            } else {
                $(this).hide(); // Hide the baloon-colums__text__item if not matching
            }
        });
    });

    // $(window).on('load', function() {
    //     $('.baloon-colums__slider-container__top-title').each(function() {
    //         var dataIndex = $(this).data('index');
    //         var activeImageIndex = $('.baloon-colums__no-slider__image.active').data('index');
    //         if (activeImageIndex === dataIndex) {
    //             $(this).show();
    //         } else {
    //             $(this).hide();
    //         }
    //     });
    // });

    $(window).on('load resize', function() {

        if ($(window).width() <= 758) {

            $('.baloon-colums__title-mobile').each(function() {
                var dataIndex = $(this).data('index');
                
                if (dataIndex === 0) {
                    $(this).show(); // Show the baloon-colums__text__item
                } else {
                    $(this).hide(); // Hide the baloon-colums__text__item if not matching
                }
            });

        }

    });
    
    


    if ($('body').hasClass('home')) {

        var HeroWrapper = gsap.utils.toArray(".hero__wrapper");
        HeroWrapper.forEach((block) => {
            timeline.fromTo(block, { x: -1000, opacity: 0 }, { x: 0, opacity: 1, duration: 0.6 });
        });

        var ProductsContainer = gsap.utils.toArray(".featured-products__general-container");
        ProductsContainer.forEach((block) => {
            timeline.fromTo(block, { x: -1000, opacity: 0 }, { x: 0, opacity: 1, duration: 0.6 }, 0);
        });

        var HeroSliders = gsap.utils.toArray(".hero__gallery");
        HeroSliders.forEach((block) => {
            timeline.fromTo(block, { x: 1372, opacity: 0 }, { x: 0, opacity: 1, duration: 0.6 }, 0);
        });

        var HeroImages = gsap.utils.toArray(".hero__image");
        HeroImages.forEach((block) => {
            timeline.fromTo(block, { x: 1372, opacity: 0 }, { x: 0, opacity: 1, duration: 0.6 }, 0);
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
            // $('.product__option-buttons button').removeClass('active');
            $('.extras').addClass('active');
            $('.addons-slider-button.slick-prev').click();
            $('.addons-slider-button.slick-next').click();
        }
        if(stepCount == 2){
            $('#product-addons-total, .woocommerce-variation-add-to-cart').addClass('active');
            // $('.product__option-buttons button').removeClass('active');
            $('.summary').addClass('active');
            $('.product-next-step').hide();
        }
    });

    console.log( 'find:' +  $(".summary").length );


    if($(".summary").length === 0){
            $('#product-addons-total, .woocommerce-variation-add-to-cart').addClass('active');
            $('.product__option-buttons button').removeClass('active');
    };

    $('.wc-pao-addon-wrap').each(function() {
        console.log('this o0', $(this));
        if ($(this).has('a').length > 0) {
            console.log('this', $(this));
            $(this).addClass('addon-slider');
        }
    });
    $('.product__option-buttons button').on('click', function() {
        stepCount = $(this).data('count');

        // $(this).siblings().removeClass('active');
        $(this).addClass('active');
        $('.variations,.wc-pao-addon-container,.wc-pao-addon-container, .wc-pao-addon-container,#product-addons-total, .product_meta, .single_variation_wrap,.woocommerce-variation-add-to-cart').removeClass('active');
        if(stepCount == 0){
            $('.variations').addClass('active');
            $('.product-next-step').show();
            $('.product-next-step--summary').show();
            $('.product__option-buttons .extras').removeClass('active');
            $('.product__option-buttons .summary').removeClass('active');
        }
        if(stepCount == 1){
            $('.wc-pao-addon-container').addClass('active');
            $('.addons-slider-button.slick-prev').click();
            $('.addons-slider-button.slick-next').click();
            $('.product-next-step').show();
            $('.product_option-buttons').removeClass('active');
            $('.product__option-buttons .summary').removeClass('active');
        }
        if(stepCount == 2){
            $('#product-addons-total, .woocommerce-variation-add-to-cart, .price').addClass('active');
            $('.product-next-step').hide();
            $('.product-next-step--summary').hide();
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
        $('.filter-button').addClass('open');
        $('.shop__container__buttons').toggleClass('open');
        $('.shadow').toggleClass('open');
    });

    $('.filter-button__filters svg').on('click', function () {
        $('.filter-button').removeClass('open');
        $('.shop__container__buttons').removeClass('open');
        $('.shadow').removeClass('open');
    });
    

    // Custom button Sort in shop page

    $('.custom-option').on('click', function () {
        // Get the data-vaslue of the clicked option
        var selectedValue = $(this).data('value');

        // Update sort-input with the new value
        $('.sort-input').val(selectedValue);

        // Update the span inside select__trigger with the new value
        var formattedValue = selectedValue.replace(/_/g, ' ');
        $('.select__trigger span').text(formattedValue);
        console.log(selectedValue)

    });

    // Filters shop Page

    // Function to update the URL parameters
    function updateUrlParameter(key, value, url) {
        var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
        var separator = url.indexOf('?') !== -1 ? "&" : "?";

        if (url.match(re)) {
            return url.replace(re, '$1' + key + "=" + value + '$2');
        } else {
            return url + separator + key + "=" + value;
        }
    }

    // Click event for sorting options
    $('.shop .custom-option').on('click', function() {
        var selectedOption = $(this).data('value');
        
        if (selectedOption) {
            var shopUrl = window.location.href;
            

            var newUrl = updateUrlParameter('orderby', selectedOption, shopUrl);

            window.location.href = newUrl;
        }
    });

    // Change event for category checkboxes
    $('.shop__filter input[type="checkbox"]').on('change', function() {
        var selectedCategories = [];

        // Retrieve existing categories from the URL
        var currentUrl = window.location.origin + '/shop/';
        var existingCategories = getParameterByName('category', currentUrl);
        if (existingCategories) {
            selectedCategories = existingCategories.split(',');
        }

        // Update the selected categories based on the checked checkboxes
        $('.shop__filter input[type="checkbox"]:checked').each(function() {
            var category = $(this).attr('id');
            if (selectedCategories.indexOf(category) === -1) {
                selectedCategories.push(category);
            }
        });

        // Remove the unchecked categories from the selectedCategories array
        $('.shop__filter input[type="checkbox"]:not(:checked)').each(function() {
            var category = $(this).attr('id');
            var index = selectedCategories.indexOf(category);
            if (index !== -1) {
                selectedCategories.splice(index, 1);
            }
        });

        // Update the URL with the selected categories
        var newUrl = updateUrlParameter('category', selectedCategories.join(','), currentUrl);
        window.location.href = newUrl;
    });



    $('.filter-button__filters input[type="checkbox"]').on('change', function() {
        var selectedCategories = [];

        // Retrieve existing categories from the URL
        var currentUrl = window.location.origin + '/shop/';
        var existingCategories = getParameterByName('category', currentUrl);
        if (existingCategories) {
            selectedCategories = existingCategories.split(',');
        }

        // Update the selected categories based on the checked checkboxes
        $('.filter-button__filters input[type="checkbox"]:checked').each(function() {
            var category = $(this).attr('id');
            if (selectedCategories.indexOf(category) === -1) {
                selectedCategories.push(category);
            }
        });

        // Remove the unchecked categories from the selectedCategories array
        $('.filter-button__filters input[type="checkbox"]:not(:checked)').each(function() {
            var category = $(this).attr('id');
            var index = selectedCategories.indexOf(category);
            if (index !== -1) {
                selectedCategories.splice(index, 1);
            }
        });

        // Update the URL with the selected categories
        console.log('currentUrl',currentUrl);
        var newUrl = updateUrlParameter('category', selectedCategories.join(','), currentUrl);
        window.location.href = newUrl;
    });

    // Helper function to get URL parameters
    function getParameterByName(name, url) {
        var match = RegExp('[?&]' + name + '=([^&]*)').exec(url);
        return match && decodeURIComponent(match[1].replace(/\+/g, ' '));
    }

    // Filter Button Category

    $('#categoryButton').on('click', function () {
        // Get the category slug and path from the data attributes
        var categorySlug = $(this).data('value');
    
        // Build the new URL with base URL, path, and category parameter
        var baseUrl = window.location.origin;
        var newUrl = baseUrl + '/' + 'shop' + '/?category=' + categorySlug;
    
        // Redirect to the new URL
        window.location.href = newUrl;
    });

    $('#categoryButtonMobile').on('click', function () {
        // Get the category slug and path from the data attributes
        var categorySlug = $(this).data('value');
    
        // Build the new URL with base URL, path, and category parameter
        var baseUrl = window.location.origin;
        var newUrl = baseUrl + '/' + 'shop' + '/?category=' + categorySlug;
    
        // Redirect to the new URL
        window.location.href = newUrl;
    });
    
    // Function to update query parameters in the URL
    function updateQueryStringParameter(uri, key, value) {
        var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
        var separator = uri.indexOf('?') !== -1 ? "&" : "?";
        if (uri.match(re)) {
            return uri.replace(re, '$1' + key + "=" + value + '$2');
        } else {
            return uri + separator + key + "=" + value;
        }
    }

    $('form.variations_form').on('change', 'select', function() {

        console.log($(this).attr('name'));
        var selectedText = $(this).find("option:selected").text();
        
        var selectedValue = $(this).val();

        $('#' + $(this).attr('name') + '-' + selectedValue.toLowerCase()).click();
        console.log('Selected text:', selectedValue);
    });

    var numItems = $('.global-featured-products__item').length;

    if(numItems > 5 && $(window).width() > 1260){
        $('.global-featured-products__container').slick({
            infinite: true,
            slidesToShow: 5,
            slidesToScroll: 1,
            dots: true,       
            arrows: true,
            autoplay: true,
            autoplaySpeed: 4000, 
            nextArrow: '<svg class="prev-arrow" width="71" height="72" viewBox="0 0 71 72" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.00001 68L67.1056 36.4472C67.4741 36.2629 67.4741 35.737 67.1056 35.5528L4.00001 4" stroke="#70B095" stroke-width="7" stroke-linecap="round"/></svg>',
            prevArrow: '<svg class="next-arrow" width="71" height="72" viewBox="0 0 71 72" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M67 4L3.89443 35.5528C3.5259 35.737 3.5259 36.263 3.89443 36.4472L67 68" stroke="#70B095" stroke-width="7" stroke-linecap="round"/></svg>',       
        });
    }
    if($(window).width() < 1260 ){
        if(numItems > 3) {
            $('.global-featured-products__container').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                centerMode: true,
                variableWidth: true,
                dots: true,       
                arrows: true,
                autoplay: true,
                autoplaySpeed: 4000,
                nextArrow: '<svg class="prev-arrow" width="71" height="72" viewBox="0 0 71 72" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.00001 68L67.1056 36.4472C67.4741 36.2629 67.4741 35.737 67.1056 35.5528L4.00001 4" stroke="#70B095" stroke-width="7" stroke-linecap="round"/></svg>',
                prevArrow: '<svg class="next-arrow" width="71" height="72" viewBox="0 0 71 72" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M67 4L3.89443 35.5528C3.5259 35.737 3.5259 36.263 3.89443 36.4472L67 68" stroke="#70B095" stroke-width="7" stroke-linecap="round"/></svg>',             
            });
        } else {
            $('.global-featured-products__container').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                centerMode: true,
                variableWidth: true,
                dots: true,       
                arrows: true,
                autoplay: true,
                autoplaySpeed: 4000,
                nextArrow: '<svg class="prev-arrow" width="71" height="72" viewBox="0 0 71 72" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.00001 68L67.1056 36.4472C67.4741 36.2629 67.4741 35.737 67.1056 35.5528L4.00001 4" stroke="#70B095" stroke-width="7" stroke-linecap="round"/></svg>',
                prevArrow: '<svg class="next-arrow" width="71" height="72" viewBox="0 0 71 72" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M67 4L3.89443 35.5528C3.5259 35.737 3.5259 36.263 3.89443 36.4472L67 68" stroke="#70B095" stroke-width="7" stroke-linecap="round"/></svg>',      
            });
        }
    }
    function debounce(func, wait, immediate) {
        var timeout;
        return function() {
            var context = this, args = arguments;
            var later = function() {
                timeout = null;
                if (!immediate) func.apply(context, args);
            };
            var callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args);
        };
    }
    
    var handleResize = debounce(function() {
        var screenWidth = $(window).width();
        console.log("Screen resized to: " + screenWidth);
        var slider = $('.global-featured-products__container');
        var sliderInitialized = slider.hasClass('slick-initialized');
        // Add your resize-dependent code here
        if (screenWidth < 1260) {
            if (sliderInitialized) {
                slider.slick('unslick');
                if(numItems > 3) {
                    $('.global-featured-products__container').slick({
                        infinite: true,
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        centerMode: true,
                        variableWidth: true,
                        dots: true,       
                        arrows: true,
                        autoplay: true,
                        autoplaySpeed: 4000,
                        nextArrow: '<svg class="prev-arrow" width="71" height="72" viewBox="0 0 71 72" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.00001 68L67.1056 36.4472C67.4741 36.2629 67.4741 35.737 67.1056 35.5528L4.00001 4" stroke="#70B095" stroke-width="7" stroke-linecap="round"/></svg>',
                        prevArrow: '<svg class="next-arrow" width="71" height="72" viewBox="0 0 71 72" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M67 4L3.89443 35.5528C3.5259 35.737 3.5259 36.263 3.89443 36.4472L67 68" stroke="#70B095" stroke-width="7" stroke-linecap="round"/></svg>',         
                    });
                } else {
                    $('.global-featured-products__container').slick({
                        infinite: true,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        centerMode: true,
                        variableWidth: true,
                        dots: true,       
                        arrows: true,
                        autoplay: true,
                        autoplaySpeed: 4000,
                        nextArrow: '<svg class="prev-arrow" width="71" height="72" viewBox="0 0 71 72" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.00001 68L67.1056 36.4472C67.4741 36.2629 67.4741 35.737 67.1056 35.5528L4.00001 4" stroke="#70B095" stroke-width="7" stroke-linecap="round"/></svg>',
                        prevArrow: '<svg class="next-arrow" width="71" height="72" viewBox="0 0 71 72" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M67 4L3.89443 35.5528C3.5259 35.737 3.5259 36.263 3.89443 36.4472L67 68" stroke="#70B095" stroke-width="7" stroke-linecap="round"/></svg>',      
                    });
                }
            }else{
                if(numItems > 3) {
                    $('.global-featured-products__container').slick({
                        infinite: true,
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        centerMode: true,
                        variableWidth: true,
                        dots: true,       
                        arrows: true,
                        autoplay: true,
                        autoplaySpeed: 4000,
                        nextArrow: '<svg class="prev-arrow" width="71" height="72" viewBox="0 0 71 72" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.00001 68L67.1056 36.4472C67.4741 36.2629 67.4741 35.737 67.1056 35.5528L4.00001 4" stroke="#70B095" stroke-width="7" stroke-linecap="round"/></svg>',
                        prevArrow: '<svg class="next-arrow" width="71" height="72" viewBox="0 0 71 72" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M67 4L3.89443 35.5528C3.5259 35.737 3.5259 36.263 3.89443 36.4472L67 68" stroke="#70B095" stroke-width="7" stroke-linecap="round"/></svg>',                        });
                } else {
                    $('.global-featured-products__container').slick({
                        infinite: true,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        centerMode: true,
                        variableWidth: true,
                        dots: true,       
                        arrows: true,
                        autoplay: true,
                        autoplaySpeed: 4000,
                        nextArrow: '<svg class="prev-arrow" width="71" height="72" viewBox="0 0 71 72" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.00001 68L67.1056 36.4472C67.4741 36.2629 67.4741 35.737 67.1056 35.5528L4.00001 4" stroke="#70B095" stroke-width="7" stroke-linecap="round"/></svg>',
                        prevArrow: '<svg class="next-arrow" width="71" height="72" viewBox="0 0 71 72" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M67 4L3.89443 35.5528C3.5259 35.737 3.5259 36.263 3.89443 36.4472L67 68" stroke="#70B095" stroke-width="7" stroke-linecap="round"/></svg>',                        });
                }
            }
        } else {
            if (sliderInitialized && numItems <= 5) {
                slider.slick('unslick');
            }
        }
    }, 250); // 250 milliseconds
    
    $(window).on('resize', handleResize);

    // Change Title Basket Checkout

    var orderReviewHeading = document.getElementById("order_review_heading");
    console.log(orderReviewHeading)

    // orderReviewHeading.innerHTML = "Basket";

    // Privacy Page
    $('.legal .custom-option').on('click', function(){
        // Get the clicked pageName
        var clickedPage = $(this).data('value');
        console.log(clickedPage);
        
        // Check if the clickedPage matches any of the section titles
        if (clickedPage === $('.legal__privacy__title').text()) {
            // Show the corresponding legal section
            $('.legal__privacy').show();
            $('.legal__terms, .legal__sustainable, .legal__sales').hide();
        } else if (clickedPage === $('.legal__terms__title').text()) {
            // Show the corresponding legal section
            $('.legal__terms').show();
            $('.legal__privacy, .legal__sustainable, .legal__sales').hide();
        } else if (clickedPage === $('.legal__sustainable__title').text()) {
            // Show the corresponding legal section
            $('.legal__sustainable').show();
            $('.legal__privacy, .legal__terms, .legal__sales').hide();
        } else if (clickedPage === $('.legal__sales__title').text()) {
            // Show the corresponding legal section
            $('.legal__sales').show();
            $('.legal__privacy, .legal__terms, .legal__sustainable').hide();
        }
    });

    // Hero text overflowing
    
    $(window).on('resize load', function() {
        if ($(window).width() > 1000) {
            if ($('.hero').hasClass('child-pages')) {
                var heroWrapperHeight = $('.hero__wrapper').height();
                var heroElement = $('.hero');
                $('.hero__wrapper').css('padding-bottom', '40px');
        
                if (heroWrapperHeight > 425) {
                heroElement.css('height', 'fit-content');
                } else {
                // Set a default height or any other style if needed
                heroElement.css('height', '590px');
                }
            }else{
                var heroWrapperHeight = $('.hero__wrapper').height();
                var heroElement = $('.hero');
        
                if (heroWrapperHeight > 385) {
                    heroElement.css('height', 'fit-content');
                    if ($(window).width() > 1280) {
                        $('.hero__wrapper').css('padding-bottom', '125px');
                    } else {
                        $('.hero__wrapper').css('padding-bottom', '98px');
                    }
                } else {
                // Set a default height or any other style if needed
                   heroElement.css('height', '696px');
                   $('.hero__wrapper').css('padding-bottom', '40px');
                }
            }
        }else{
            var heroElement = $('.hero');
            heroElement.css('height', 'fit-content');
            $('.hero__wrapper').css('padding-bottom', '0px');
        }
    });
    $(document).on('click', '.onqor-qty-btn-pluss', function() {
        var $input = $(this).closest('.cart_item').find('.qty');
        var value = $input.val();
        $input.val(parseInt(value, 10) + 1);
        $(this).closest('.cart_item').find('.onqor-qty-number').html('');
        $(this).closest('.cart_item').find('.onqor-qty-number').html($input.val());

        // alert('goop');
    });  
    $(document).on('click', '.onqor-qty-btn-minus', function() {
        var $input = $(this).closest('.cart_item').find('.qty');
        var value = $input.val();
        $input.val(parseInt(value, 10) - 1);
        $(this).closest('.cart_item').find('.onqor-qty-number').html('');
        $(this).closest('.cart_item').find('.onqor-qty-number').html($input.val());
        // alert('goop');

    });
    document.querySelectorAll('.woocommerce-cart-form__cart-item').forEach((element) => {
        var $input = $(element).closest('.cart_item').find('.qty');
        var value = $input.val();
        console.log(value);
        $(element).closest('.cart_item').find('.onqor-qty-number').html($input.val());
    });  
    $(document.body).on('updated_wc_div', function() {
        document.querySelectorAll('.woocommerce-cart-form__cart-item').forEach((element) => {
            var $input = $(element).closest('.cart_item').find('.qty');
            var value = $input.val();
            $(element).closest('.cart_item').find('.onqor-qty-number').html($input.val());
        }); 
    });
    var optionNumber = document.querySelectorAll('.product__option-buttons button').length;
    console.log('optionNumber',optionNumber);
    if(optionNumber == 1){
        $('.product__option-buttons button').addClass('im-disabled');
    }

    // Contact Form 7
    $('.contact-form__get-a-quote .custom-option').on('click', function() {
        // Get the value of the clicked option
        var selectedOption = $(this).data('value');
        
        // Update the input field with the selected option value
        $('.contact-form__get-a-quote #dropdown-quote').val(selectedOption);
    });
    $('.get-a-quote__get-a-quote .custom-option').on('click', function() {
        // Get the value of the clicked option
        var selectedOption = $(this).data('value');
        
        // Update the input field with the selected option value
        $('.get-a-quote__get-a-quote #dropdown-quote').val(selectedOption);
    });

    // detect IE8 and above, and edge
if (document.documentMode || /Edge/.test(navigator.userAgent)) {
    alert('Hello Microsoft User!');
}

});