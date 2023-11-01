$(document).ready(function() {

    // Hamburger Menu

    $('.header__wrapper__hamburger').on('click', function() {
        $('.mobile-menu').toggleClass('open');
        $('.close').toggleClass('show');
        $('.hamburger').toggleClass('hide');
        $('.header').toggleClass('menu-mobile');
    });

    // Menu Mobile 

    $('.menu-item-has-children').on('click', function(e) {
        e.preventDefault();
        var $clicked = $(this);

        $('.menu-item-has-children').not($clicked).each(function() {
            $(this).removeClass('open');
        });

        $clicked.toggleClass('open');
    });

});