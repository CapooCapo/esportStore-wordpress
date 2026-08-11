<?php

function my_esport_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
    
    register_nav_menus(
        array(
            'primary' => __('Primary Menu', 'my-esport-theme'),
        )
    );
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

// Add Register UI to WooCommerce Login form
add_action('woocommerce_login_form_end', 'my_esport_theme_add_register_to_login');
function my_esport_theme_add_register_to_login() {
    $register_url = wp_registration_url();
    ?>
    <div class="login-register-prompt">
        <p class="login-register-text"><?php esc_html_e("Don't have an account?", 'my-esport-theme'); ?></p>
        <a href="<?php echo esc_url($register_url); ?>" class="btn btn-secondary btn-register"><?php esc_html_e('Register', 'my-esport-theme'); ?></a>
    </div>
    <?php
}

// Force English UI for specific WooCommerce elements in the presentation layer
add_filter( 'woocommerce_product_add_to_cart_text', 'my_esport_theme_add_to_cart_text', 99, 2 );
add_filter( 'woocommerce_product_single_add_to_cart_text', 'my_esport_theme_add_to_cart_text', 99, 2 );

function my_esport_theme_add_to_cart_text( $text, $product ) {
    if ( $product ) {
        $product_type = $product->get_type();
        if ( $product_type === 'variable' ) {
            return esc_html__( 'Select Options', 'my-esport-theme' );
        } elseif ( $product_type === 'grouped' ) {
            return esc_html__( 'View Products', 'my-esport-theme' );
        } elseif ( $product_type === 'external' ) {
            return esc_html__( 'Buy Product', 'my-esport-theme' );
        } elseif ( ! $product->is_in_stock() ) {
            return esc_html__( 'Read More', 'my-esport-theme' );
        }
    }
    return esc_html__( 'Add to Cart', 'my-esport-theme' );
}

add_filter( 'gettext', 'my_esport_theme_force_english_woo_strings', 99, 3 );
function my_esport_theme_force_english_woo_strings( $translated_text, $text, $domain ) {
    if ( $domain === 'woocommerce' ) {
        switch ( $text ) {
            case 'Description':
                return 'Description';
            case 'Reviews (%s)':
                return 'Reviews (%s)';
            case 'Reviews':
                return 'Reviews';
            case 'Additional information':
                return 'Additional Information';
            case 'Related products':
                return 'Related Products';
        }
    }
    return $translated_text;
}

// Add custom Hero to the Shop page archive
add_action( 'woocommerce_archive_description', 'my_esport_theme_shop_header', 10 );
function my_esport_theme_shop_header() {
    if ( is_shop() ) {
        echo '<header class="page-header" style="text-align: center; margin-bottom: var(--space-4xl); padding-top: var(--space-2xl);">';
        echo '<span class="eyebrow">' . esc_html__( 'OUR CATALOG', 'my-esport-theme' ) . '</span>';
        echo '<h1 class="section-heading">' . esc_html__( 'Shop Sportswear', 'my-esport-theme' ) . '</h1>';
        echo '<p class="section-description">' . esc_html__( 'Explore football and basketball jerseys, training wear, sports shorts, and selected accessories for training, competition, and everyday sports use.', 'my-esport-theme' ) . '</p>';
        echo '</header>';
    }
}

// Route core pages to their respective hardcoded templates to bypass missing page.php and manual template assignments
add_filter( 'template_include', 'my_esport_theme_core_page_routing', 99 );
function my_esport_theme_core_page_routing( $template ) {
    if ( is_page( array( 'about', 'gioi-thieu' ) ) ) {
        $new_template = locate_template( array( 'page-about.php' ) );
        if ( ! empty( $new_template ) ) {
            return $new_template;
        }
    }
    
    if ( is_page( array( 'contact', 'lien-he' ) ) ) {
        $new_template = locate_template( array( 'page-contact.php' ) );
        if ( ! empty( $new_template ) ) {
            return $new_template;
        }
    }
    
    if ( is_page( array( 'collections', 'collection', 'bo-suu-tap' ) ) ) {
        $new_template = locate_template( array( 'page-collections.php' ) );
        if ( ! empty( $new_template ) ) {
            return $new_template;
        }
    }

    return $template;
}
