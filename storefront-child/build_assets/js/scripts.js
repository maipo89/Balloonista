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
    

});