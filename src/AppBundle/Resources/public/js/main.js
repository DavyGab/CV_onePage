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
        for (var marginBetweenBox = 25,
                 totalHeightBoxLeftMargin = 0,
                 totalHeightBoxRightMargin = 70,
                 totalHeightBoxLeft = 0,
                 totalHeightBoxRight = 0,
                 a = 0,
                 r = 0,
                 timelineBar = $(this).find(".timeline-bar"),
                 timelineInner = $(this).find(".timeline-inner"),
                 boxLeft = $(this).find(".timeline-box-left"),
                 boxRight = $(this).find(".timeline-box-right"),
                 boxLeftIndex = 0;
             boxLeftIndex < boxLeft.length;
             boxLeftIndex++) {
            $(boxLeft[boxLeftIndex]).css({
                position: "absolute",
                left: "0",
                top: totalHeightBoxLeftMargin + "px"
            });
            totalHeightBoxLeftMargin = totalHeightBoxLeftMargin + $(boxLeft[boxLeftIndex]).height() + marginBetweenBox;
            totalHeightBoxLeft = $(boxLeft[boxLeftIndex]).height();
        }

        for (var boxRightIndex = 0; boxRightIndex < boxRight.length; boxRightIndex++) {
            $(boxRight[boxRightIndex]).css({
                position: "absolute",
                right: "0",
                top: totalHeightBoxRightMargin + "px"
            });
            totalHeightBoxRightMargin = totalHeightBoxRightMargin + $(boxRight[boxRightIndex]).height() + marginBetweenBox;
            totalHeightBoxRight = $(boxRight[boxRightIndex]).height();
        }
        if (totalHeightBoxLeftMargin > totalHeightBoxRightMargin) {
            a = totalHeightBoxLeftMargin - marginBetweenBox;
            r = a - totalHeightBoxLeft
        } else {
            a = totalHeightBoxRightMargin - marginBetweenBox;
            r = a - totalHeightBoxRight;
        }
        timelineInner.height(a);
        timelineBar.css({
            top: "136px",
            height: r + "px"
        });


    }) : ($(".timeline-bar").attr("style", ""), $(".timeline-box").attr("style", ""), $(".timeline-inner").attr("style", ""))
}
l();

