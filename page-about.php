<?php
/**
 * Template Name: About
 */
get_header(); ?>

<main id="primary" class="site-main">
    <!-- About Us Section -->
    <section class="about-section" style="padding-top: var(--space-4xl);">
        <div class="container about-inner">
            <div class="about-image">
                <img loading="lazy"
                    src="https://images.unsplash.com/photo-1518310383802-640c2de311b2?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80"
                    alt="<?php esc_attr_e('About our sportswear brand', 'my-esport-theme'); ?>">
            </div>
            <div class="about-content">
                <span class="eyebrow"><?php esc_html_e('ABOUT US', 'my-esport-theme'); ?></span>
                <h1 class="section-heading"><?php esc_html_e('Your Premier Sportswear Shop', 'my-esport-theme'); ?></h1>
                <p class="section-description">
                    <?php esc_html_e('Welcome to our store. We are a specialized sportswear shop deeply focused on providing high-quality football and basketball clothing for athletes and fans alike.', 'my-esport-theme'); ?>
                </p>
            </div>
        </div>
    </section>

    <!-- What We Offer -->
    <section class="collection-section" style="padding-top: var(--space-4xl);">
        <div class="container">
            <div class="collection-inner" style="direction: rtl;">
                <div class="collection-content" style="direction: ltr;">
                    <span class="eyebrow"><?php esc_html_e('WHAT WE OFFER', 'my-esport-theme'); ?></span>
                    <h2 class="section-heading"><?php esc_html_e('Complete Athletic Gear', 'my-esport-theme'); ?></h2>
                    <p class="section-description">
                        <?php esc_html_e('We provide an extensive catalog of football jerseys, basketball jerseys, performance shorts, and essential training wear. Our selection also includes carefully curated sports accessories to complete your kit.', 'my-esport-theme'); ?>
                    </p>
                </div>
                <div class="collection-image" style="direction: ltr;">
                    <img loading="lazy"
                        src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80"
                        alt="<?php esc_attr_e('What We Offer', 'my-esport-theme'); ?>">
                </div>
            </div>
        </div>
    </section>

    <!-- Our Focus -->
    <section class="about-section" style="padding-top: var(--space-4xl);">
        <div class="container about-inner">
            <div class="about-image">
                <img loading="lazy"
                    src="https://images.unsplash.com/photo-1526506114631-f5b27341d75c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80"
                    alt="<?php esc_attr_e('Our Focus', 'my-esport-theme'); ?>">
            </div>
            <div class="about-content">
                <span class="eyebrow"><?php esc_html_e('OUR FOCUS', 'my-esport-theme'); ?></span>
                <h2 class="section-heading"><?php esc_html_e('Performance Meets Comfort', 'my-esport-theme'); ?></h2>
                <p class="section-description">
                    <?php esc_html_e('We focus on practical sportswear with team-inspired designs and comfortable materials. Our products are rigorously selected to be perfectly suitable for intense training, active competition, and everyday sports use.', 'my-esport-theme'); ?>
                </p>
            </div>
        </div>
    </section>

    <!-- For Sports Fans -->
    <section class="collection-section" style="padding-top: var(--space-4xl); padding-bottom: var(--space-4xl);">
        <div class="container">
            <div class="collection-inner" style="direction: rtl;">
                <div class="collection-content" style="direction: ltr;">
                    <span class="eyebrow"><?php esc_html_e('FOR SPORTS FANS', 'my-esport-theme'); ?></span>
                    <h2 class="section-heading"><?php esc_html_e('Wear Your Passion', 'my-esport-theme'); ?></h2>
                    <p class="section-description" style="margin-bottom: var(--space-md);">
                        <?php esc_html_e('Our store is built for customers who love football and basketball. Whether you are playing on the court or cheering from the stands, we offer sportswear that seamlessly fits your everyday active style.', 'my-esport-theme'); ?>
                    </p>
                    <div>
                        <a href="<?php echo function_exists('wc_get_page_permalink') ? esc_url(wc_get_page_permalink('shop')) : esc_url(home_url('/shop')); ?>" class="btn btn-primary"><?php esc_html_e('Shop Collection', 'my-esport-theme'); ?></a>
                    </div>
                </div>
                <div class="collection-image" style="direction: ltr;">
                    <img loading="lazy"
                        src="https://images.unsplash.com/photo-1517466787929-bc90951d0974?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80"
                        alt="<?php esc_attr_e('For Sports Fans', 'my-esport-theme'); ?>">
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
