// SIDEBAR SCROLL
$(function(){
    $('.widget-out').perfectScrollbar({
        wheelSpeed:50
    });
});

//SLIDE MENU
(function($){
    $(".right-menu").on('click', function(){
        $("body").hasClass("slidemenu-opened") ? k() : T()
    });
})(jQuery);
function T() {
    $("body").addClass("slidemenu-opened")
}

function k() {
    $("body").removeClass("slidemenu-opened")
}

// RESPONSIVE MENU
$('.responsive-menu').click(function(){
    $('.top-menu li').slideToggle();
});

function l() {
    $(window).width() > 600 ? $(".timeline").each(function() {
        for (var t = 25, i = 0, n = 70, o = 0, s = 0, a = 0, r = 0, l = $(this).find(".timeline-bar"), d = $(this).find(".timeline-inner"), c = $(this).find(".timeline-box-left"), u = $(this).find(".timeline-box-right"), h = 0; h < c.length; h++) $(c[h]).css({
            position: "absolute",
            left: "0",
            top: i + "px"
        }), i = i + $(c[h]).height() + t, o = $(c[h]).height();
        for (var h = 0; h < u.length; h++) $(u[h]).css({
            position: "absolute",
            right: "0",
            top: n + "px"
        }), n = n + $(u[h]).height() + t, s = $(u[h]).height();
        i > n ? (a = i - t, r = a - o) : (a = n - t, r = a - s), d.height(a), l.css({
            top: "136px",
            height: r + "px"
        })

    }) : ($(".timeline-bar").attr("style", ""), $(".timeline-box").attr("style", ""), $(".timeline-inner").attr("style", ""))
}
l();

