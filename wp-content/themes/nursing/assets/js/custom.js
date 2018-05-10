jQuery(document).ready(function ($) {

    if ($(window).width() < 768){
        var y = $( window ).height();
        var h = y - 120;
        $("#navbar1 ul").css("max-height", h);
    }
    $( window ).resize(function() {
        var y = $( window ).height();
        var h = y - 120;
        $("#navbar1 ul").css("max-height", h);
    });

    $(".close").on("click",function()
    {
       $(".errorMsg").css({'display':'none'});
    });
    //slick slider
    jQuery('.slider').slick({
        dots: false,
        infinite: true,
        speed: 2000,
        slidesToShow: 4,
        slidesToScroll: 4,
        autoplay: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: false
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
});