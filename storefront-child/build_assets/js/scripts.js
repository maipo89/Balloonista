$(document).ready(function() {

    // Hamburger Menu

    $('.header__wrapper__hamburger').on('click', function() {
        $('.mobile-menu').toggleClass('open');
        $('.close').toggleClass('show');
        $('.hamburger').toggleClass('hide');
        $('.header').toggleClass('menu-mobile');
    });

    // Menu Mobile 

    $('.menu-item-has-children svg').on('click', function(e) {
        e.preventDefault();
        var $parentElement = $(this).closest('.menu-item-has-children');
        console.log($parentElement, 'hhhhhhhhhhhhhhh')

        $('.menu-item-has-children').not($parentElement).each(function() {
            $(this).removeClass('open');
        });

        $parentElement.toggleClass('open');
    });

});