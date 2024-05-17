/* script to manage dynamic effects on single photo page */

/* arrows prev-next */
function show_arrow_left() {
    var prev_div = document.getElementById('single_photo_previous_thumbnail');
    prev_div.style.display = 'inline';
    prev_div.style.transition = 'opacity 1s ease-in-out';
    prev_div.style.opacity = '1';

    var next_div = document.getElementById('single_photo_next_thumbnail');
    next_div.style.display = 'none';
}

function hide_arrow_left() {
    var prev_div = document.getElementById('single_photo_previous_thumbnail');
    prev_div.style.transition = 'opacity 1s ease-in-out';
    prev_div.style.opacity = '0';
}

function show_arrow_right() {
    var next_div = document.getElementById('single_photo_next_thumbnail');
    next_div.style.display = 'inline';
    next_div.style.transition = 'opacity 1s ease-in-out';
    next_div.style.opacity = '1';

    var prev_div = document.getElementById('single_photo_previous_thumbnail');
    prev_div.style.display = 'none';
}

function hide_arrow_right() {
    var next_div = document.getElementById('single_photo_next_thumbnail');
    next_div.style.transition = 'opacity 1s ease-in-out';
    next_div.style.opacity = '0';
}