/* script based on jquery to manage ajax request to load more photos on button click */

/* check script is loaded */
document.addEventListener('DOMContentLoaded', function() {

    jQuery(document).ready(function($) {
        const posts_per_page = 8;
        
        // function called by button click
        function Load_More_Photos() {
            var data = {
                action: 'load_photos',
                page: pagenb,
                post_nb: posts_per_page,
                category: category_value,
                format: format_value,
                order: dateOrder_value,
            };

            // Ajax request using jquery method
            $.ajax({
                url: gallery_filters_JS.ajax_url,
                type: 'POST',
                data: data,
                async: true,
                success: function(response) {
                    // insert new photos into gallery
                    $('.gallery_photos').append(response);
                    pagenb++;
                    
                    open_lightbox(); // update lightbox context accordingly with current photos present

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
    
    }); // jquery loaded
}); // end check script loaded 