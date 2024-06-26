/* script to manage contact modal interaction */

// Get the overlay containing the modal
const overlay = document.getElementById('contact-modal');

// Get the header menu items that opens the modal (menus desktop and mobile)
const header_menu_contact = document.querySelectorAll(".menu-item-26");

// When the user clicks on the header menu item, open the modal
header_menu_contact.forEach(link => {
    link.onclick = function() {
    overlay.style.display = "flex";
    }
});

// Get the button on single custom post that opens the modal
var single_photo_contact = document.getElementById("single_photo_contact");

if (single_photo_contact) { // single photo page loaded
    // When the user clicks on the button contact, open the modal
    single_photo_contact.onclick = function() {
        overlay.style.display = "flex";
        // jquery code : transfert value of reference from single custom post to contact modal
        jQuery( document ).ready( function($) {
            $reference = $("#single_photo_reference").text();
            $("#contact_popup_ref").val($reference);
        });
    }
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == overlay) { //click on overlay outside modal
        overlay.style.display = "none";
    }
}