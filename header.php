<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <!-- Header -->
    <header class="site-header">
        <div class="container header-container">
            <div class="logo">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
            </div>
            
            <nav class="main-nav" id="main-nav" aria-label="Main Navigation">
                <ul class="nav-list">
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Home', 'my-esport-theme'); ?></a></li>
                    <li><a href="<?php echo function_exists('wc_get_page_permalink') ? esc_url(wc_get_page_permalink('shop')) : esc_url(home_url('/shop')); ?>"><?php esc_html_e('Shop', 'my-esport-theme'); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#collection"><?php esc_html_e('Collection', 'my-esport-theme'); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#about"><?php esc_html_e('About', 'my-esport-theme'); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#contact"><?php esc_html_e('Contact', 'my-esport-theme'); ?></a></li>
                </ul>
            </nav>

            <div class="header-actions">
                <button class="action-btn search-btn" id="header-search-toggle" aria-label="<?php esc_attr_e('Search', 'my-esport-theme'); ?>">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                </button>
                <div class="header-search-container" id="header-search-container">
                    <form role="search" method="get" class="header-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <input type="search" class="search-field" placeholder="<?php echo esc_attr__( 'Search products&hellip;', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                        <input type="hidden" name="post_type" value="product" />
                        <button type="submit" class="search-submit">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                        </button>
                    </form>
                </div>
                <div class="language-switcher">
                    <?php if ( function_exists( 'pll_the_languages' ) ) : ?>
                        <div class="polylang-switcher-custom">
                            <?php 
                            $languages = pll_the_languages( array( 'raw' => 1 ) );
                            if ( ! empty( $languages ) ) {
                                foreach ( $languages as $lang ) {
                                    if ( strtolower( $lang['slug'] ) === 'en' ) {
                                        continue;
                                    }
                                    $active_class = $lang['current_lang'] ? ' active' : '';
                                    $aria_label = sprintf( esc_attr__( 'Switch to %s', 'my-esport-theme' ), $lang['name'] );
                                    echo '<a href="' . esc_url( $lang['url'] ) . '" class="lang-btn' . esc_attr( $active_class ) . '" lang="' . esc_attr( $lang['locale'] ) . '" aria-label="' . esc_attr( $aria_label ) . '">' . esc_html( strtoupper( $lang['slug'] ) ) . '</a>';
                                }
                            }
                            ?>
                        </div>
                    <?php else : ?>
                        <button class="lang-btn active" data-lang="vi">VI</button>
                    <?php endif; ?>
                </div>
                <?php
                $myaccount_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : '#account';
                if ( is_user_logged_in() ) :
                    $current_user = wp_get_current_user();
                    $logout_url = wp_logout_url( $myaccount_url );
                ?>
                    <div class="account-menu-wrapper" style="position: relative;">
                        <a href="<?php echo esc_url($myaccount_url); ?>" class="action-btn account-btn" aria-label="<?php esc_attr_e('Account', 'my-esport-theme'); ?>">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                            <span class="account-text"><?php echo esc_html($current_user->display_name); ?></span>
                        </a>
                        <div class="account-dropdown">
                            <a href="<?php echo esc_url($myaccount_url); ?>"><?php esc_html_e('My Account', 'my-esport-theme'); ?></a>
                            <a href="<?php echo esc_url($logout_url); ?>"><?php esc_html_e('Logout', 'my-esport-theme'); ?></a>
                        </div>
                    </div>
                <?php else : ?>
                    <a href="<?php echo esc_url($myaccount_url); ?>" class="action-btn account-btn" aria-label="<?php esc_attr_e('Account', 'my-esport-theme'); ?>">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        <span class="account-text"><?php esc_html_e('Login', 'my-esport-theme'); ?> <span style="margin: 0 4px; opacity: 0.5;">|</span> <?php esc_html_e('Register', 'my-esport-theme'); ?></span>
                    </a>
                <?php endif; ?>
                <a href="<?php echo function_exists('wc_get_cart_url') ? esc_url(wc_get_cart_url()) : '#cart'; ?>" class="action-btn cart-btn" aria-label="<?php esc_attr_e('Cart', 'my-esport-theme'); ?>">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                    <span class="cart-count"><?php echo function_exists('WC') && WC()->cart ? esc_html(WC()->cart->get_cart_contents_count()) : '0'; ?></span>
                </a>
                <button class="mobile-menu-btn" id="mobile-menu-btn" aria-expanded="false" aria-label="Toggle Menu">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="menu-icon"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                </button>
            </div>
        </div>
    </header>
