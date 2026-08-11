<?php
/**
 * Template Name: About
 */
get_header(); ?>

<main id="primary" class="site-main">
    <!-- Brand Introduction -->
    <section class="about-section" style="padding-top: var(--space-4xl);">
        <div class="container about-inner">
            <div class="about-image">
                <img loading="lazy"
                    src="https://images.unsplash.com/photo-1518310383802-640c2de311b2?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80"
                    alt="<?php esc_attr_e('About our sportswear brand', 'my-esport-theme'); ?>">
            </div>
            <div class="about-content">
                <span class="eyebrow"><?php esc_html_e('OUR STORY', 'my-esport-theme'); ?></span>
                <h1 class="section-heading"><?php esc_html_e('Engineered For The Game', 'my-esport-theme'); ?></h1>
                <p class="section-description">
                    <?php esc_html_e('Founded with a passion for athletic excellence, we design sportswear that pushes boundaries. Every stitch is engineered to help you perform at your peak, whether on the pitch or in the gym.', 'my-esport-theme'); ?>
                </p>
            </div>
        </div>
    </section>

    <!-- Sportswear Philosophy -->
    <section class="collection-section" style="padding-top: var(--space-4xl);">
        <div class="container">
            <div class="collection-inner" style="direction: rtl;">
                <div class="collection-content" style="direction: ltr;">
                    <span class="eyebrow"><?php esc_html_e('OUR PHILOSOPHY', 'my-esport-theme'); ?></span>
                    <h2 class="section-heading"><?php esc_html_e('Form Follows Function', 'my-esport-theme'); ?></h2>
                    <p class="section-description">
                        <?php esc_html_e('We believe that true performance wear doesn\'t compromise on style. Our design philosophy centers around high-performance materials cut into modern silhouettes that look as good as they feel.', 'my-esport-theme'); ?>
                    </p>
                </div>
                <div class="collection-image" style="direction: ltr;">
                    <img loading="lazy"
                        src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80"
                        alt="<?php esc_attr_e('Our Philosophy', 'my-esport-theme'); ?>">
                </div>
            </div>
        </div>
    </section>

    <!-- Product Quality & Community -->
    <section class="about-section" style="padding-top: var(--space-4xl); padding-bottom: var(--space-4xl);">
        <div class="container about-inner">
            <div class="about-image">
                <img loading="lazy"
                    src="https://images.unsplash.com/photo-1526506114631-f5b27341d75c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80"
                    alt="<?php esc_attr_e('Community and Quality', 'my-esport-theme'); ?>">
            </div>
            <div class="about-content">
                <span class="eyebrow"><?php esc_html_e('UNCOMPROMISING QUALITY', 'my-esport-theme'); ?></span>
                <h2 class="section-heading"><?php esc_html_e('Built For The Community', 'my-esport-theme'); ?></h2>
                <p class="section-description" style="margin-bottom: var(--space-md);">
                    <?php esc_html_e('We source only premium technical fabrics that offer superior breathability, stretch, and durability. But we\'re more than just apparel; we\'re a community of athletes united by the drive to improve everyday.', 'my-esport-theme'); ?>
                </p>
                <div>
                    <a href="<?php echo function_exists('wc_get_page_permalink') ? esc_url(wc_get_page_permalink('shop')) : esc_url(home_url('/shop')); ?>" class="btn btn-primary"><?php esc_html_e('Join Us & Shop', 'my-esport-theme'); ?></a>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
