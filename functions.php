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

function my_esport_theme_get_register_url() {
    $page = get_page_by_path( 'register' );
    if ( $page ) {
        if ( function_exists( 'pll_get_post' ) ) {
            $translated_id = pll_get_post( $page->ID );
            if ( $translated_id ) {
                return get_permalink( $translated_id );
            }
        }
        return get_permalink( $page->ID );
    }
    return home_url( '/register/' );
}

// Add Register UI to WooCommerce Login form
add_action('woocommerce_login_form_end', 'my_esport_theme_add_register_to_login');
function my_esport_theme_add_register_to_login() {
    $register_url = my_esport_theme_get_register_url();
    ?>
    <div class="login-register-prompt">
        <p class="login-register-text"><?php esc_html_e("Don't have an account?", 'my-esport-theme'); ?></p>
        <a href="<?php echo esc_url($register_url); ?>" class="btn btn-secondary btn-register"><?php esc_html_e('Register', 'my-esport-theme'); ?></a>
    </div>
    <?php
}

// Validate custom password confirmation field during WooCommerce registration
add_filter( 'woocommerce_process_registration_errors', 'my_esport_theme_validate_password_confirmation', 10, 4 );
function my_esport_theme_validate_password_confirmation( $validation_error, $username, $password, $email ) {
    if ( isset( $_POST['register'] ) && isset( $_POST['password'] ) && 'no' === get_option( 'woocommerce_registration_generate_password' ) ) {
        if ( empty( $_POST['password_confirm'] ) ) {
            $validation_error->add( 'password_confirm_error', __( 'Please confirm your password.', 'my-esport-theme' ) );
        } elseif ( $_POST['password'] !== $_POST['password_confirm'] ) {
            $validation_error->add( 'password_mismatch', __( 'Passwords do not match.', 'my-esport-theme' ) );
        }
    }
    return $validation_error;
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
            case 'Reviews (%d)':
                return 'Reviews (%d)';
            case 'Reviews':
                return 'Reviews';
            case 'Additional information':
                return 'Additional Information';
            case 'Related products':
                return 'Related Products';
            case 'Login':
                return 'Login';
            case 'Username or email address':
                return 'Username or email address';
            case 'Password':
                return 'Password';
            case 'Remember me':
                return 'Remember me';
            case 'Log in':
                return 'Log in';
            case 'Lost your password?':
                return 'Lost your password?';
            case 'Email address':
                return 'Email address';
            case 'Register':
                return 'Register';
        }
    }
    return $translated_text;
}

add_filter( 'ngettext', 'my_esport_theme_force_english_woo_ngettext', 99, 5 );
function my_esport_theme_force_english_woo_ngettext( $translation, $single, $plural, $number, $domain ) {
    if ( $domain === 'woocommerce' ) {
        if ( $single === '%s review' && $plural === '%s reviews' ) {
            return $number === 1 ? '%s review' : '%s reviews';
        }
    }
    return $translation;
}

// Configure WooCommerce Related Products layout
add_filter( 'woocommerce_output_related_products_args', 'my_esport_theme_related_products_args', 99 );
function my_esport_theme_related_products_args( $args ) {
    $args['posts_per_page'] = 4; // 4 related products
    $args['columns'] = 4; // arranged in 4 columns
    return $args;
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
    
    if ( is_page( array( 'register', 'dang-ky' ) ) ) {
        $new_template = locate_template( array( 'page-register.php' ) );
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

// Default menu fallback
function my_esport_theme_default_menu() {
    echo '<ul class="nav-list">';
    echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__('Home', 'my-esport-theme') . '</a></li>';
    echo '<li><a href="' . (function_exists('wc_get_page_permalink') ? esc_url(wc_get_page_permalink('shop')) : esc_url(home_url('/shop'))) . '">' . esc_html__('Shop', 'my-esport-theme') . '</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/collections/' ) ) . '">' . esc_html__('Collections', 'my-esport-theme') . '</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/about/' ) ) . '">' . esc_html__('About Us', 'my-esport-theme') . '</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/contact/' ) ) . '">' . esc_html__('Contact', 'my-esport-theme') . '</a></li>';
    echo '</ul>';
}
