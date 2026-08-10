<?php

function my_esport_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'my_esport_theme_setup' );

function my_esport_theme_enqueue_assets() {
    // Enqueue CSS
    wp_enqueue_style(
        'my-esport-theme-style',
        get_stylesheet_directory_uri() . '/style.css',
        array(),
        filemtime(get_stylesheet_directory() . '/style.css')
    );

    // Enqueue JS
    wp_enqueue_script(
        'my-esport-theme-main-js',
        get_stylesheet_directory_uri() . '/assets/js/main.js',
        array(),
        filemtime(get_stylesheet_directory() . '/assets/js/main.js'),
        true // Load in footer
    );
}

add_action('wp_enqueue_scripts', 'my_esport_theme_enqueue_assets');

// WooCommerce Theme Hooks
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

add_action('woocommerce_before_main_content', 'my_esport_theme_wrapper_start', 10);
function my_esport_theme_wrapper_start() {
    echo '<main class="main-content"><section class="category-section"><div class="container">';
}

add_action('woocommerce_after_main_content', 'my_esport_theme_wrapper_end', 10);
function my_esport_theme_wrapper_end() {
    echo '</div></section></main>';
}

