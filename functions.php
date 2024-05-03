<?php

// CSS Styles declaration
function theme_enqueue_styles() {
    // Load theme personalized css
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/assets/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css'));
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function register_menus() {
    
    register_nav_menus(
        array(
            'header-menu' => esc_html__( 'header', 'on header location' ),
            'footer-menu'  => esc_html__( 'footer', 'on footer location' ),
        )
    );
}
add_action( 'after_setup_theme', 'register_menus' );