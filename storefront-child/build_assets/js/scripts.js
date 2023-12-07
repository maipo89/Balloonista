
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
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.baloon-colums__slider__main',
        dots: false,
        centerMode: false,
        focusOnSelect: true,
        variableWidth: true,
        infinite: true,
        nextArrow: '<svg class="next-arrow" width="22" height="26" viewBox="0 0 22 26" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 24L19.3019 13.4266C19.6209 13.2317 19.6209 12.7683 19.3019 12.5734L2 2" stroke="#70B095" stroke-width="4" stroke-linecap="round"/></svg>',
        prevArrow: '<svg class="prev-arrow" width="22" height="26" viewBox="0 0 22 26" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 2L2.69814 12.5734C2.37911 12.7683 2.37911 13.2317 2.69814 13.4266L20 24" stroke="#70B095" stroke-width="4" stroke-linecap="round"/></svg>',
        responsive: [
            {
                breakpoint: 758,
                settings: {
                    slidesToShow: 4,
                    dots: true,
                    infinite: false,
                    pauseOnFocus: true

                }
            },
        ]
    });

    // Accordion Environment Block

    $(".environment__text").accordion({
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

    $('#product_info').accordion();

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
});