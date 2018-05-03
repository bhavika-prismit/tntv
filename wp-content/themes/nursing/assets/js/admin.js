
jQuery(document).ready(function () {
    jQuery(function ($) {

        // Set all variables to be used in scope
        var frame, avatar, x = 1;

        // ADD IMAGE LINK
        $(".upload-custom-img").on('click', function (event) {
            event.preventDefault();
            avatar = $(this).attr("data-id");
            // If the media frame already exists, reopen it.
            if (frame) {
                frame.open();
                return;
            }

            // Create a new media frame
            frame = wp.media({
                title: 'Select or Upload Media Of Your Chosen Persuasion',
                button: {
                    text: 'Use this media'
                },
                multiple: false  // Set to true to allow multiple files to be selected
            });

            // When an image is selected in the media frame...
            frame.on('select', function () {
                // Get media attachment details from the frame state
                var attachment = frame.state().get('selection').first().toJSON();

                // Send the attachment URL to our custom image input field.
                $('.' + avatar).replaceWith('<div class="' + avatar + '"><img src="' + attachment.url + '" alt="" style="max-width:100%;"/></div>');
                // Send the attachment id to our hidden input
                $('#' + avatar).val(attachment.id);
            });

            // Finally, open the modal on click
            frame.open();
        });
        //add new functionality
        $("#add_new_eligibility").on("click", function (e) {
            e.preventDefault();
            var html = "";
            html += '<tr><td><a class="remove_button" href="javaScript:void(0)">Remove</a></td>'
                + '<td><input type="text" name="course_req[count][' + 'program' + ']" value=""></td>'
                + '<td><input type="text" name="course_req[count][' + 'eligibility' + ']" value=""></td>'
                + '<td><input type="text" name="course_req[count][' + 'age' + ']" value=""></td>'
                + '<td><input type="text" name="course_req[count][' + 'duration' + ']" value=""></td>'
                + '<td><input type="text" name="course_req[count][' + 'examination' + ']" value=""></td>'
                + '<td><input type="text" name="course_req[count][' + 'registartion' + ']" value=""></td></tr>';
            html = html.replace(/count/g, $("#add_eligibility_content tr").length - 1);
            $("#add_eligibility_content").append(html);
        });
        // remove added table row
        $(document).on("click", ".remove_button", function (e) {
            e.preventDefault();
            $(this).closest("tr").remove();
        });
    });
    //mask for phone number
    jQuery(function($){

        $(".phone").mask("(999) 999-9999");


        $(".phone").on("blur", function() {
            var last = $(this).val().substr( $(this).val().indexOf("-") + 1 );

            if( last.length == 5 ) {
                var move = $(this).val().substr( $(this).val().indexOf("-") + 1, 1 );

                var lastfour = last.substr(1,4);

                var first = $(this).val().substr( 0, 9 );

                $(this).val( first + move + '-' + lastfour );
            }
        });
    });
    //accordion
    jQuery(function() {
        jQuery("#accordion").accordion();
        jQuery("#accordion1").accordion();
    });

    jQuery('.toggle-head').click(function(e){
        jQuery(".toggle-head").parent().removeClass("active");
        jQuery(".toggle-head").parent().parent().removeClass("active-panel");
        jQuery(this).parent().addClass("active");
        jQuery(this).parent().parent().addClass("active-panel");
        jQuery(this).parents('.col-sm-12').addClass("override-row");
    });
});