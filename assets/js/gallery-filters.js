
/* script to manage filters and ajax request to load photos into gallery in accordance with filters result */


/* global variables of filters result shared with others JS script */
var category_value = "";
var format_value = "";
var dateOrder_value = "";
var pagenb;

/* check script is loaded */
document.addEventListener('DOMContentLoaded', function() {



    /* categorie filter built with ul */
    var categorie_filter = document.getElementById('gallery_filter_categorie');

    if (categorie_filter) {
        var categorie_button = categorie_filter.querySelector('button.gallery_filter');
        var categorie_dropdown = categorie_filter.querySelector('.gallery_filter_dropdown');
        var categorie_options = Array.from(categorie_filter.querySelectorAll('.gallery_filter_option'));
        var previous_selected_option; // to store selected filter option
        

        /* categorie dropdown */
        categorie_button.addEventListener('focus', () => {
            categorie_dropdown.style.display = 'block';
            categorie_button.classList.add("gallery_filter_focus");

            // set focus to current filter option
            categorie_options.forEach(option => {
                if (categorie_button.textContent != "CATÉGORIES") {
                    if (option.textContent === categorie_button.textContent) {
                    option.classList.add("gallery_filter_option_focus"); // add class for colored current option
                    previous_selected_option = option;
                    }
                } else { // case of no filter
                    if (option.textContent === "") {
                        previous_selected_option = option;
                    }
                }
            });

            // format dropdown close
            format_dropdown.style.display = 'none';
            format_button.classList.remove("gallery_filter_focus");
            // sort dropdown close
            sort_dropdown.style.display = 'none';
            sort_button.classList.remove("gallery_filter_focus");
        });

        /* categorie filter result */
        categorie_options.forEach(option => {

            // click on an option
            option.addEventListener('click', () => {
                //display option selected
                if (option.textContent != "")
                    categorie_button.textContent = option.textContent;
                else
                    categorie_button.textContent = "CATÉGORIES";

                // set data-value of option selected into filter centralized value
                var selectedValue = option.getAttribute('data-value');
                categorie_filter.setAttribute('data-value', selectedValue);

                previous_selected_option.classList.remove("gallery_filter_option_focus"); // remove class for colored previous option

                // categorie dropdown close
                categorie_dropdown.style.display = 'none';
                categorie_button.classList.remove("gallery_filter_focus");
            });
        });
    } //end categorie_filter


    /* format filter built with ul */
    var format_filter = document.getElementById('gallery_filter_format');

    if (format_filter) {
        var format_button = format_filter.querySelector('button.gallery_filter');
        var format_dropdown = format_filter.querySelector('.gallery_filter_dropdown');
        var format_options = Array.from(format_filter.querySelectorAll('.gallery_filter_option'));

        /* format dropdown */
        format_button.addEventListener('focus', () => {
            format_dropdown.style.display = 'block';
            format_button.classList.add("gallery_filter_focus");
            
            // set focus to current filter option
            format_options.forEach(option => {
                if (format_button.textContent != "FORMATS") {
                    if (option.textContent === format_button.textContent) {
                    option.classList.add("gallery_filter_option_focus"); // add class for colored current option
                    previous_selected_option = option;
                    }
                } else { // case of no filter
                    if (option.textContent === "") {
                        previous_selected_option = option;
                    }
                }
            });

            // categorie dropdown close
            categorie_dropdown.style.display = 'none';
            categorie_button.classList.remove("gallery_filter_focus");
            // sort dropdown close
            sort_dropdown.style.display = 'none';
            sort_button.classList.remove("gallery_filter_focus");
        });

        /* format filter result */
        format_options.forEach(option => {

            // click on an option
            option.addEventListener('click', () => {
                //display option selected
                if (option.textContent != "")
                    format_button.textContent = option.textContent;
                else
                    format_button.textContent = "FORMATS";

                // set data-value of option selected into filter centralized value
                var selectedValue = option.getAttribute('data-value');
                format_filter.setAttribute('data-value', selectedValue);

                previous_selected_option.classList.remove("gallery_filter_option_focus"); // remove class for colored previous option

                // format dropdown close
                format_dropdown.style.display = 'none';
                format_button.classList.remove("gallery_filter_focus");

            });
        });
    } //end format_filter


    /* sort filter built with ul */
    var sort_filter = document.getElementById('gallery_filter_sort');

    if (sort_filter) {
        var sort_button = sort_filter.querySelector('button.gallery_filter');
        var sort_dropdown = sort_filter.querySelector('.gallery_filter_dropdown');
        var sort_options = Array.from(sort_filter.querySelectorAll('.gallery_filter_option'));

        /* sort dropdown */
        sort_button.addEventListener('focus', () => {
            sort_dropdown.style.display = 'block';
            sort_button.classList.add("gallery_filter_focus");

            // set focus to current filter option
            sort_options.forEach(option => {
                if (sort_button.textContent != "TRIER PAR") {
                    if (option.textContent === sort_button.textContent) {
                    option.classList.add("gallery_filter_option_focus"); // add class for colored current option
                    previous_selected_option = option;
                    }
                } else { // case of no filter
                    if (option.textContent === "") {
                        previous_selected_option = option;
                    }
                }
            });

            // categorie dropdown close
            categorie_dropdown.style.display = 'none';
            categorie_button.classList.remove("gallery_filter_focus");
            // format dropdown close
            format_dropdown.style.display = 'none';
            format_button.classList.remove("gallery_filter_focus");
        });

        /* sort filter result */
        sort_options.forEach(option => {

            // click on an option
            option.addEventListener('click', () => {
                //display option selected
                if (option.textContent != "")
                    sort_button.textContent = option.textContent;
                else
                    sort_button.textContent = "TRIER PAR";

                // set data-value of option selected into filter centralized value
                var selectedValue = option.getAttribute('data-value');
                sort_filter.setAttribute('data-value', selectedValue);

                previous_selected_option.classList.remove("gallery_filter_option_focus"); // remove class for colored previous option

                // sort dropdown close
                sort_dropdown.style.display = 'none';
                sort_button.classList.remove("gallery_filter_focus");
            });
        });
    } //end sort_filter

    
    /* initial load without filters */
    gallery_ajax_request();


    /* observer on change concerning filters result */
    var observer = new MutationObserver(function(mutations) {
        for (let mutation of mutations) {
            if ((mutation.type === "attributes") && (mutation.attributeName ==="data-value")) {
                gallery_ajax_request();
            }
        }
    });

    /* observers declaration for filters result detection */
    observer.observe(categorie_filter, { 
        attributes: true, 
        attributeFilter: ['data-value'] });

    observer.observe(format_filter, { 
        attributes: true, 
        attributeFilter: ['data-value'] });
    
    observer.observe(sort_filter, { 
        attributes: true, 
        attributeFilter: ['data-value'] });


            
    function gallery_ajax_request() {
        jQuery(document).ready(function($) {
            const posts_per_page = 8;

            pagenb = 1; // reset to page 1
            
            category_value = $('#gallery_filter_categorie').attr('data-value');
            if (category_value === undefined) {category_value = "";}

            format_value = $('#gallery_filter_format').attr('data-value');
            if (format_value === undefined) {format_value = "";}

            dateOrder_value = $('#gallery_filter_sort').attr('data-value');
            if (dateOrder_value === undefined) {dateOrder_value = "";}

            var data = {
                action: 'load_photos',
                page: pagenb,
                post_nb: posts_per_page,
                category: category_value,
                format: format_value,
                order: dateOrder_value,
            };

            /* check ajax request data
            console.log(data);*/

            // Ajax request using jquery method
            $.ajax({
                url: gallery_filters_JS.ajax_url,
                type: 'POST',
                data: data,
                async: true,
                success: function(response) {
                    // insert new photos into gallery
                    $('.gallery_photos').html(response);
                    pagenb++;

                    open_lightbox(); // update lightbox context accordingly with current photos present

                    // check if more photos
                    if ($(response).filter('.photo_block').length < posts_per_page) {
                        // hide button
                        $('.gallery_load_more_button').hide();
                    } else
                    {
                        $('.gallery_load_more_button').show();                    
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX error: ", status, error);
                },
            });
        
        });
    } // end function gallery_ajax_request



}); // end check script loaded 