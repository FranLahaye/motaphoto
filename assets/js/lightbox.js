/* script to manage the photo lightbox modal */

/* check script is loaded */
document.addEventListener('DOMContentLoaded', function() {

    /* function to store information of all photo blocks present on page on a table */
    var photos_infos = []; // global table to store information

    function photos_store() {      
                    
        //Reset table    
        photos_infos.length = 0;

        // select photo blocks elements to store
        var photos_block = document.querySelectorAll('.photo_block');

        // extract informations from elements
        photos_block.forEach(function (photo_block, index) {

            var photo_img = photo_block.querySelector('.block_icon_full').getAttribute('data-fullphoto-url');
            var photo_reference = photo_block.querySelector('.block_infos_reference').textContent;
            var photo_category = photo_block.querySelector('.block_infos_category').textContent; 
        
            photos_infos.push({
                img: photo_img,
                reference: photo_reference,
                category: photo_category
                });
        });

        /*console.log("photos store:",photos_infos);*/

    } //end photos_store()

 
    /* global function to open lightbox on click in a photo block
     (called in gallery-filters.js , gallery-load-more.js scripts */
    window.open_lightbox = function open_lightbox() {
        var photos_icon = document.querySelectorAll('.block_icon_full');

        /*console.log('icons detected',photos_icon);*/

        photos_icon.forEach(function(icon, indexicon) {
                icon.addEventListener('click', function(event) {
                    event.preventDefault();

                    photos_store(); // store photos

                    currentindex = indexicon;

                    update_lightbox(currentindex); // update lightbox display

                    document.querySelector('.lightbox').style.display = 'block';
                });
        });
    } //end open_lightbox()
    open_lightbox(); // update lightbox context accordingly with current photos present


    /* global variable to store current index displayed */
    var currentindex = 0;

    /* display update into lightbox */
    function update_lightbox(index) {
            
        if ((index < photos_infos.length) && (index >= 0) ) {

            // Get elements to update on lightbox
            const lightboxImg = document.querySelector('.lightbox__container > img');
            const lightboxReference = document.querySelector('.lightbox__reference');
            const lightboxCategory = document.querySelector('.lightbox__category');

            // update elements with informations in table
            lightboxImg.src = photos_infos[index].img;
            lightboxReference.textContent = photos_infos[index].reference;
            lightboxCategory.textContent = photos_infos[index].category;

            currentindex = index;
     
        }
    } //end update_lightbox()

    /* Manage click on next */
    var next_button =  document.querySelector('.lightbox__next');
    next_button.addEventListener('click', function(event) {
        currentindex++;
        if (currentindex > (photos_infos.length - 1)) {currentindex = (photos_infos.length - 1)};
        
        update_lightbox(currentindex); // update lightbox display
  
    });

    /* Manage click on previous */
    var prev_button =  document.querySelector('.lightbox__prev');
    prev_button.addEventListener('click', function(event) {
        currentindex--;
        if (currentindex < 0) {currentindex = 0};
        
        update_lightbox(currentindex); // update lightbox display
    
    });


    // close lightbox with cross
    var modalLightbox = document.querySelector('.lightbox');
    var cross = document.querySelector('.lightbox__close');
    cross.onclick = function() {
        modalLightbox.style.display = "none";
    }

    // close lightbox with ESC key
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            modalLightbox.style.display = "none";
        }
    }); 


}); // end check script loaded 