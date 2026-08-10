<?php

function my_esport_theme_enqueue_styles() {
    wp_enqueue_style(
        'my-esport-theme-style',
        get_stylesheet_directory_uri() . '/style.css',
        array(),
        filemtime(get_stylesheet_directory() . '/style.css')
    );
}

add_action('wp_enqueue_scripts', 'my_esport_theme_enqueue_styles');
