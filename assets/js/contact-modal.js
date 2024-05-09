// Get the overlay containing the modal
var overlay = document.getElementById('contact-modal');

// Get the header menu item that opens the modal
var header_menu_contact = document.getElementById("menu-item-26");

// When the user clicks on the button, open the modal
header_menu_contact.onclick = function() {
    overlay.style.display = "flex";
}


// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == overlay) { //click on overlay outside modal
        overlay.style.display = "none";
    }
}