<?php
/**
 * Template Name: Collections
 */
get_header(); ?>

<main id="primary" class="site-main">
    <div class="container" style="padding-top: var(--space-4xl); padding-bottom: var(--space-4xl);">
        <header class="page-header" style="text-align: center; margin-bottom: var(--space-4xl);">
            <h1 class="section-heading"><?php esc_html_e('Our Collections', 'my-esport-theme'); ?></h1>
            <p class="section-description"><?php esc_html_e('Discover gear engineered for every aspect of your active lifestyle.', 'my-esport-theme'); ?></p>
        </header>

        <!-- Match Collection -->
        <section class="collection-section" style="margin-bottom: var(--space-4xl);">
            <div class="collection-inner">
                <div class="collection-content">
                    <span class="eyebrow"><?php esc_html_e('GAMEDAY READY', 'my-esport-theme'); ?></span>
                    <h2 class="section-heading"><?php esc_html_e('Match Collection', 'my-esport-theme'); ?></h2>
                    <p class="section-description">
                        <?php esc_html_e('Professional-grade jerseys and gear built for competitive play. Lightweight, breathable, and designed to move with you.', 'my-esport-theme'); ?>
                    </p>
                    <div>
                        <a href="<?php echo function_exists('wc_get_page_permalink') ? esc_url(wc_get_page_permalink('shop')) : esc_url(home_url('/shop')); ?>"
                            class="btn btn-primary"><?php esc_html_e('Shop Match Gear', 'my-esport-theme'); ?></a>
                    </div>
                </div>
                <div class="collection-image">
                    <img loading="lazy"
                        src="https://images.unsplash.com/photo-1546519638-68e109498ffc?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80"
                        alt="<?php esc_attr_e('Match Collection', 'my-esport-theme'); ?>">
                </div>
            </div>
        </section>

        <!-- Training Collection -->
        <section class="collection-section" style="margin-bottom: var(--space-4xl);">
            <div class="collection-inner" style="direction: rtl;">
                <div class="collection-content" style="direction: ltr;">
                    <span class="eyebrow"><?php esc_html_e('PUT IN THE WORK', 'my-esport-theme'); ?></span>
                    <h2 class="section-heading"><?php esc_html_e('Training Collection', 'my-esport-theme'); ?></h2>
                    <p class="section-description">
                        <?php esc_html_e('Everyday performance wear that stands up to your most intense sessions. Moisture-wicking fabrics and ergonomic fits.', 'my-esport-theme'); ?>
                    </p>
                    <div>
                        <a href="<?php echo function_exists('wc_get_page_permalink') ? esc_url(wc_get_page_permalink('shop')) : esc_url(home_url('/shop')); ?>"
                            class="btn btn-primary"><?php esc_html_e('Shop Training Wear', 'my-esport-theme'); ?></a>
                    </div>
                </div>
                <div class="collection-image" style="direction: ltr;">
                    <img loading="lazy"
                        src="https://images.unsplash.com/photo-1571019614242-c5c5adee9f50?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80"
                        alt="<?php esc_attr_e('Training Collection', 'my-esport-theme'); ?>">
                </div>
            </div>
        </section>

        <!-- Street Sports -->
        <section class="collection-section" style="margin-bottom: var(--space-4xl);">
            <div class="collection-inner">
                <div class="collection-content">
                    <span class="eyebrow"><?php esc_html_e('URBAN ATHLETICS', 'my-esport-theme'); ?></span>
                    <h2 class="section-heading"><?php esc_html_e('Street Sports', 'my-esport-theme'); ?></h2>
                    <p class="section-description">
                        <?php esc_html_e('Blurring the lines between athletic performance and streetwear style. Bold designs for the concrete arena.', 'my-esport-theme'); ?>
                    </p>
                    <div>
                        <a href="<?php echo function_exists('wc_get_page_permalink') ? esc_url(wc_get_page_permalink('shop')) : esc_url(home_url('/shop')); ?>"
                            class="btn btn-primary"><?php esc_html_e('Shop Street Sports', 'my-esport-theme'); ?></a>
                    </div>
                </div>
                <div class="collection-image">
                    <img loading="lazy"
                        src="https://images.unsplash.com/photo-1517438476312-10d79c077509?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80"
                        alt="<?php esc_attr_e('Street Sports Collection', 'my-esport-theme'); ?>">
                </div>
            </div>
        </section>

        <!-- Everyday Sportswear -->
        <section class="collection-section">
            <div class="collection-inner" style="direction: rtl;">
                <div class="collection-content" style="direction: ltr;">
                    <span class="eyebrow"><?php esc_html_e('REST & RECOVERY', 'my-esport-theme'); ?></span>
                    <h2 class="section-heading"><?php esc_html_e('Everyday Sportswear', 'my-esport-theme'); ?></h2>
                    <p class="section-description">
                        <?php esc_html_e('Premium comfort for your off-days. Relaxed fits, soft materials, and classic athletic styling.', 'my-esport-theme'); ?>
                    </p>
                    <div>
                        <a href="<?php echo function_exists('wc_get_page_permalink') ? esc_url(wc_get_page_permalink('shop')) : esc_url(home_url('/shop')); ?>"
                            class="btn btn-primary"><?php esc_html_e('Shop Everyday Wear', 'my-esport-theme'); ?></a>
                    </div>
                </div>
                <div class="collection-image" style="direction: ltr;">
                    <img loading="lazy"
                        src="https://images.unsplash.com/photo-1483721310020-03333e577078?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80"
                        alt="<?php esc_attr_e('Everyday Sportswear', 'my-esport-theme'); ?>">
                </div>
            </div>
        </section>
    </div>
</main>

<?php get_footer(); ?>
