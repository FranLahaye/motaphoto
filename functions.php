<?php

// CSS Styles declaration
function theme_enqueue_styles() {
    // Load theme personalized css
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css'));
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );