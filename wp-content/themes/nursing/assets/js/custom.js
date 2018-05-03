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

    // jQuery(function($) {
    //
    //     // Set all variables to be used in scope
    //     var frame,
    //         metaBox = $('#meta-box-id.postbox'), // Your meta box id here
    //         addImgLink = metaBox.find('.upload-custom-img'),
    //         delImgLink = metaBox.find('.delete-custom-img'),
    //         imgContainer = metaBox.find('.custom-img-container'),
    //         imgIdInput = metaBox.find('.custom-img-id');
    //
    //     // ADD IMAGE LINK
    //     $(".upload-custom-img").on('click', function (event) {
    //
    //         event.preventDefault();
    //
    //         // If the media frame already exists, reopen it.
    //         if (frame) {
    //             frame.open();
    //             return;
    //         }
    //
    //         // Create a new media frame
    //         frame = wp.media({
    //             title: 'Select or Upload Media Of Your Chosen Persuasion',
    //             button: {
    //                 text: 'Use this media'
    //             },
    //             multiple: false  // Set to true to allow multiple files to be selected
    //         });
    //
    //
    //         // When an image is selected in the media frame...
    //         frame.on('select', function () {
    //
    //             // Get media attachment details from the frame state
    //             var attachment = frame.state().get('selection').first().toJSON();
    //
    //             // Send the attachment URL to our custom image input field.
    //             imgContainer.append('<img src="' + attachment.url + '" alt="" style="max-width:100%;"/>');
    //
    //             // Send the attachment id to our hidden input
    //             imgIdInput.val(attachment.id);
    //
    //             // Hide the add image link
    //             addImgLink.addClass('hidden');
    //
    //             // Unhide the remove image link
    //             delImgLink.removeClass('hidden');
    //         });
    //
    //         // Finally, open the modal on click
    //         frame.open();
    //     });
    // });

});