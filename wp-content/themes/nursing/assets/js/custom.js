jQuery(document).ready(function ($) {

    if ($(window).width() < 768) {
        var y = $(window).height();
        var h = y - 120;
        $("#navbar1 ul").css("max-height", h);
    }
    $(window).resize(function () {
        var y = $(window).height();
        var h = y - 120;
        $("#navbar1 ul").css("max-height", h);
    });

    $(".close").on("click", function () {
        $(".errorMsg").css({'display': 'none'});
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

    // mobile search
    jQuery(".mobile-search").on("click", function () {
        $(".popups").css("display", 'block');
    });

    //    application form
    jQuery("#applicationForm").validate({
        ignore: '.ignore',
        // Specify validation rules
        rules: {
            applicant_name: "required",
            email: {
                required: true,
                // Specify that email should be validated
                // by the built-in "email" rule
                email: true
            },
            address: "required",
            ptitle: "required",
            // photoupload: {
                // extension : "png|jpg|jpeg",
                // maxFileSize: {
                //         "unit": "KB",
                //         "size": 100
                //     }
            // },
            resumeupload: {
                required: true,
                // extension: "pdf|docx",
                // maxFileSize: {
                    // "unit": "MB",
                    // "size": 2
                // }
            },
            hiddenRecaptcha: {
                required: function () {
                    if (grecaptcha.getResponse() == '') {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
        },
        // Specify validation error messages
        messages: {
            applicant_name: "Please enter your firstname",
            email: "Please enter a valid email address",
            address: "Please enter address",
            ptitle: "Please enter professional title",
            // photoupload: "Incorrect file selected.",
            resumeupload: "Resume is required",
            hiddenRecaptcha: "Captcha is required"
        },
        // Make sure the form is submitted to the destination defined
        submitHandler: function (form) {
            form.submit();
        }
    });
});