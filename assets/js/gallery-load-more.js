jQuery(document).ready(function($) {
    var pagenb = 2; // at first request the page 2 because page 1 is loaded by default with home page
    const posts_per_page = 8;

    // function called by button click
    function Load_More_Photos() {
        var data = {
            action: 'load_more_photos',
            page: pagenb,
            post_nb: posts_per_page,
         };

        // Ajax request using jquery method
        $.ajax({
            url: gallery_load_more_JS.ajax_url,
            type: 'POST',
            data: data,
            async: true,
            success: function(response) {
                // insert new photos into gallery
                $('.gallery_photos').append(response);
                pagenb++;

                // check if more photos
                if ($(response).filter('.photo_block').length < posts_per_page) {
                    // hide button
                    $('.gallery_load_more_button').hide();
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX error: ", status, error);
            },
         });
    }
    // on button click
    $('.gallery_load_more_button').on('click', function() {
        Load_More_Photos();
    });
  
});