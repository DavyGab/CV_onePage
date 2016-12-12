$(document).ready( function() {
    // PAGE TABS
    $('#tab-container').easytabs({
        updateHash		: false,
        animate			: false,
        transitionIn	:'fadeIn',
        transitionOut	:'fadeOut',
        tabActiveClass	:'active',
        transitionInEasing: 'linear',
        transitionOutEasing: 'linear'
    });

    $('.contact-footer').click(function() {
        $("#contact-menu").click();
    });

    //PAGE SMOOTH SCROLL
    $(function() {

        $('a.page-scroll').bind('click', function(event) {
            if ($(window).width() < 750 ) {
                $('.top-menu li').slideUp();
                var $anchor = $(this);
                $('html, body').stop().animate({
                    scrollTop: $($anchor.attr('href')).offset().top - 91
                }, 1000);
                event.preventDefault();
            };
        });
    });


    // TOP MENU ACTIVE

    $('ul.top-menu li a').click(function(){
        $('ul.top-menu li a').removeClass("selected");
        $(this).addClass("selected");

    });


});