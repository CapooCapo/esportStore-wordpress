<?php get_header(); ?>
<main>
    <!-- Hero Section -->
    <section id="home" class="hero-section" style="position: relative; overflow: hidden; border-radius: var(--radius-xl); margin: var(--space-md) var(--space-md) var(--space-4xl);">
        <div class="hero-background" style="position: absolute; inset: 0; z-index: 0;">
            <img src="https://images.unsplash.com/photo-1556817411-31ae72fa3ea0?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80"
                alt="Athletes in high-performance sportswear" style="width: 100%; height: 100%; object-fit: cover;">
            <!-- Removed opaque overlay to let image dominate -->
        </div>
        <div class="container hero-content-container" style="position: relative; z-index: 1;">
            <div class="hero-content" style="max-width: 600px; padding: var(--space-3xl) 0;">
                <span class="eyebrow"><?php esc_html_e('NEW ARRIVALS', 'my-esport-theme'); ?></span>
                <h1 class="hero-heading"><?php esc_html_e('High-Performance Sportswear', 'my-esport-theme'); ?></h1>
                <p class="section-description">
                    <?php esc_html_e('Engineered for your toughest workouts and everyday comfort.', 'my-esport-theme'); ?>
                </p>
                <div class="hero-actions">
                    <a href="<?php echo function_exists('wc_get_page_permalink') ? esc_url(wc_get_page_permalink('shop')) : esc_url(home_url('/shop')); ?>"
                        class="btn btn-primary"><?php esc_html_e('Shop Now', 'my-esport-theme'); ?></a>
                    <a href="<?php echo esc_url(home_url('/collections/')); ?>"
                        class="btn btn-secondary"><?php esc_html_e('View Collection', 'my-esport-theme'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Category Section -->
    <section class="category-section">
        <div class="container">
            <h2 class="section-heading"><?php esc_html_e('Shop By Category', 'my-esport-theme'); ?></h2>
            <div class="category-grid">
                <?php
                if (class_exists('WooCommerce')) {
                    $args = array(
                        'taxonomy' => 'product_cat',
                        'hide_empty' => false,
                        'number' => 6
                    );
                    $product_categories = get_terms($args);
                    if (!empty($product_categories) && !is_wp_error($product_categories)) {
                        $target_cats = array('Football', 'Basketball', 'Jerseys', 'Shorts', 'Training Wear', 'Sports Accessories');
                        $count = 0;
                        foreach ($product_categories as $category) {
                            if (in_array($category->name, $target_cats) || in_array(htmlspecialchars_decode($category->name), $target_cats)) {
                                $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                                $image_url = $thumbnail_id ? wp_get_attachment_url($thumbnail_id) : wc_placeholder_img_src();
                                ?>
                                <a href="<?php echo esc_url(get_term_link($category)); ?>" class="category-card">
                                    <img loading="lazy" src="<?php echo esc_url($image_url); ?>"
                                        alt="<?php echo esc_attr($category->name); ?>">
                                    <span class="category-name"><?php echo esc_html($category->name); ?></span>
                                </a>
                                <?php
                                $count++;
                                if ($count >= 6) break;
                            }
                        }
                        if ($count === 0) {
                            echo '<p>' . esc_html__('No matching categories found.', 'my-esport-theme') . '</p>';
                        }
                    } else {
                        echo '<p>' . esc_html__('No categories found.', 'my-esport-theme') . '</p>';
                    }
                } else {
                    echo '<p>' . esc_html__('WooCommerce is not active.', 'my-esport-theme') . '</p>';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- New Arrivals Section -->
    <section class="featured-products">
        <div class="container">
            <div class="section-header">
                <span class="eyebrow"><?php esc_html_e('LATEST GEAR', 'my-esport-theme'); ?></span>
                <h2 class="section-heading"><?php esc_html_e('New Arrivals', 'my-esport-theme'); ?></h2>
                <p class="section-description"><?php esc_html_e('Check out the newest additions to our collection.', 'my-esport-theme'); ?></p>
            </div>

            <ul class="product-grid products">
                <?php
                if (class_exists('WooCommerce')) {
                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => 4,
                        'status' => 'publish',
                        'orderby' => 'date',
                        'order' => 'DESC'
                    );
                    $loop = new WP_Query($args);
                    if ($loop->have_posts()) {
                        while ($loop->have_posts()):
                            $loop->the_post();
                            wc_get_template_part('content', 'product');
                        endwhile;
                    } else {
                        echo '<p>' . esc_html__('No products found', 'my-esport-theme') . '</p>';
                    }
                    wp_reset_postdata();
                } else {
                    echo '<p>' . esc_html__('WooCommerce is not active.', 'my-esport-theme') . '</p>';
                }
                ?>
            </ul>

            <div class="center-action">
                <a href="<?php echo function_exists('wc_get_page_permalink') ? esc_url(wc_get_page_permalink('shop')) : esc_url(home_url('/shop')); ?>" class="btn btn-secondary"><?php esc_html_e('View All Products', 'my-esport-theme'); ?></a>
            </div>
        </div>
    </section>

    <!-- Best Sellers Section -->
    <section class="featured-products" style="background-color: var(--color-background);">
        <div class="container">
            <div class="section-header">
                <span class="eyebrow"><?php esc_html_e('TOP RATED', 'my-esport-theme'); ?></span>
                <h2 class="section-heading"><?php esc_html_e('Best Sellers', 'my-esport-theme'); ?></h2>
                <p class="section-description"><?php esc_html_e('Our most popular sportswear loved by athletes.', 'my-esport-theme'); ?></p>
            </div>

            <ul class="product-grid products">
                <?php
                if (class_exists('WooCommerce')) {
                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => 4,
                        'status' => 'publish',
                        'meta_key' => 'total_sales',
                        'orderby' => 'meta_value_num',
                    );
                    $loop = new WP_Query($args);
                    if ($loop->have_posts()) {
                        while ($loop->have_posts()):
                            $loop->the_post();
                            wc_get_template_part('content', 'product');
                        endwhile;
                    } else {
                        echo '<p>' . esc_html__('No products found', 'my-esport-theme') . '</p>';
                    }
                    wp_reset_postdata();
                } else {
                    echo '<p>' . esc_html__('WooCommerce is not active.', 'my-esport-theme') . '</p>';
                }
                ?>
            </ul>
        </div>
    </section>

    <!-- Featured Collection Section -->
    <section id="collection" class="collection-section">
        <div class="container">
            <div class="collection-inner">
                <div class="collection-content">
                    <span class="eyebrow"><?php esc_html_e('PRO SERIES', 'my-esport-theme'); ?></span>
                    <h2 class="section-heading"><?php esc_html_e('Elite Training Collection', 'my-esport-theme'); ?></h2>
                    <p class="section-description">
                        <?php esc_html_e('Advanced moisture-wicking fabrics and ergonomic designs for maximum performance.', 'my-esport-theme'); ?>
                    </p>
                    <div>
                        <a href="<?php echo esc_url(home_url('/collections/')); ?>"
                            class="btn btn-primary"><?php esc_html_e('Explore Collection', 'my-esport-theme'); ?></a>
                    </div>
                </div>
                <div class="collection-image">
                    <img loading="lazy"
                        src="https://images.unsplash.com/photo-1581009146145-b5ef050c2e1e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80"
                        alt="<?php esc_attr_e('Elite training collection', 'my-esport-theme'); ?>">
                </div>
            </div>
        </div>
    </section>

    <!-- Promotion Section -->
    <section id="promotion" class="promotion-section" style="border-radius: var(--radius-xl); margin: var(--space-3xl) var(--space-md); overflow: hidden; position: relative;">
        <img loading="lazy"
            src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80"
            alt="<?php esc_attr_e('Sportswear promotion', 'my-esport-theme'); ?>" class="promotion-bg">
        <div class="promotion-overlay"></div>
        <div class="container">
            <div class="promotion-content">
                <span class="eyebrow"><?php esc_html_e('TRAIN HARD.', 'my-esport-theme'); ?></span>
                <h2 class="section-heading" style="color: #ffffff;"><?php esc_html_e('PLAY HARDER.', 'my-esport-theme'); ?></h2>
                <p class="section-description" style="color: #e5e7eb;">
                    <?php esc_html_e('Take your workout to the next level with our premium training gear.', 'my-esport-theme'); ?>
                </p>
                <a href="<?php echo function_exists('wc_get_page_permalink') ? esc_url(wc_get_page_permalink('shop')) : esc_url(home_url('/shop')); ?>" class="btn btn-primary"><?php esc_html_e('Shop Training Wear', 'my-esport-theme'); ?></a>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="benefits-section">
        <div class="container">
            <div class="benefits-grid">
                <div class="benefit-item">
                    <svg class="benefit-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round">
                        <rect x="1" y="3" width="15" height="13"></rect>
                        <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                        <circle cx="5.5" cy="18.5" r="2.5"></circle>
                        <circle cx="18.5" cy="18.5" r="2.5"></circle>
                    </svg>
                    <h3 class="benefit-title"><?php esc_html_e('Free Shipping', 'my-esport-theme'); ?></h3>
                    <p class="benefit-description">
                        <?php esc_html_e('Free shipping for qualifying orders.', 'my-esport-theme'); ?>
                    </p>
                </div>
                <div class="benefit-item">
                    <svg class="benefit-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21.5 2v6h-6M21.34 15.57a10 10 0 1 1-.59-9.21l5.25 4.28"></path>
                    </svg>
                    <h3 class="benefit-title"><?php esc_html_e('Easy Returns', 'my-esport-theme'); ?></h3>
                    <p class="benefit-description">
                        <?php esc_html_e('Simple return process for eligible products.', 'my-esport-theme'); ?>
                    </p>
                </div>
                <div class="benefit-item">
                    <svg class="benefit-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg>
                    <h3 class="benefit-title"><?php esc_html_e('Secure Checkout', 'my-esport-theme'); ?></h3>
                    <p class="benefit-description">
                        <?php esc_html_e('Secure and reliable checkout experience.', 'my-esport-theme'); ?>
                    </p>
                </div>
                <div class="benefit-item">
                    <svg class="benefit-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                    </svg>
                    <h3 class="benefit-title"><?php esc_html_e('Customer Support', 'my-esport-theme'); ?></h3>
                    <p class="benefit-description">
                        <?php esc_html_e('Support for product and order questions.', 'my-esport-theme'); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section">
        <div class="container about-inner">
            <div class="about-image">
                <img loading="lazy"
                    src="https://images.unsplash.com/photo-1546519638-68e109498ffc?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80"
                    alt="<?php esc_attr_e('Sportswear brand introduction', 'my-esport-theme'); ?>">
            </div>
            <div class="about-content">
                <span class="eyebrow"><?php esc_html_e('ABOUT US', 'my-esport-theme'); ?></span>
                <h2 class="section-heading"><?php esc_html_e('Sportswear Made for the Game', 'my-esport-theme'); ?></h2>
                <p class="section-description" style="text-align: left; margin-bottom: var(--space-md);">
                    <?php esc_html_e('We are a sportswear store focused on football and basketball apparel for players, fans, and people who simply enjoy the game.', 'my-esport-theme'); ?>
                </p>
                <ul style="color: var(--color-text); text-align: left; list-style-type: none; padding-bottom: var(--space-xs); font-size: 0.95rem; line-height: 1.8;">
                    <li><strong><?php esc_html_e('What We Offer', 'my-esport-theme'); ?></strong></li>
                    <li>• <?php esc_html_e('Football Jerseys', 'my-esport-theme'); ?></li>
                    <li>• <?php esc_html_e('Basketball Jerseys', 'my-esport-theme'); ?></li>
                    <li>• <?php esc_html_e('Training Wear', 'my-esport-theme'); ?></li>
                    <li><strong><?php esc_html_e('Our Approach', 'my-esport-theme'); ?></strong>: <?php esc_html_e('Sportswear for an active lifestyle.', 'my-esport-theme'); ?></li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container">
            <div class="contact-content">
                <span class="eyebrow"><?php esc_html_e('CONTACT US', 'my-esport-theme'); ?></span>
                <h2 class="section-heading"><?php esc_html_e('How Can We Help?', 'my-esport-theme'); ?></h2>
                <p class="section-description">
                    <?php esc_html_e('We are always ready to listen and assist you throughout your shopping experience.', 'my-esport-theme'); ?>
                </p>
            </div>
            <div class="contact-info-grid">
                <div class="contact-info-card">
                    <svg class="contact-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                    <h3 class="benefit-title" style="margin-bottom: var(--space-sm); font-size: 1.1rem;"><?php esc_html_e('Order Support', 'my-esport-theme'); ?></h3>
                    <ul style="color: var(--color-text-muted); text-align: left; list-style-type: none; padding-bottom: var(--space-xs); font-size: 0.95rem; line-height: 1.8;">
                        <li>• <?php esc_html_e('Order status', 'my-esport-theme'); ?></li>
                        <li>• <?php esc_html_e('Product information', 'my-esport-theme'); ?></li>
                        <li>• <?php esc_html_e('Shipping and delivery', 'my-esport-theme'); ?></li>
                        <li>• <?php esc_html_e('Order-related questions', 'my-esport-theme'); ?></li>
                    </ul>
                </div>
                <div class="contact-info-card">
                    <svg class="contact-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    <h3 class="benefit-title" style="margin-bottom: var(--space-sm); font-size: 1.1rem;"><?php esc_html_e('Business Partnerships', 'my-esport-theme'); ?></h3>
                    <ul style="color: var(--color-text-muted); text-align: left; list-style-type: none; padding-bottom: var(--space-xs); font-size: 0.95rem; line-height: 1.8;">
                        <li>• <?php esc_html_e('Sports teams', 'my-esport-theme'); ?></li>
                        <li>• <?php esc_html_e('Retail partnerships', 'my-esport-theme'); ?></li>
                        <li>• <?php esc_html_e('Business collaborations', 'my-esport-theme'); ?></li>
                        <li>• <?php esc_html_e('Sports-related projects', 'my-esport-theme'); ?></li>
                    </ul>
                </div>
                <div class="contact-info-card">
                    <svg class="contact-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                    </svg>
                    <h3 class="benefit-title" style="margin-bottom: var(--space-sm); font-size: 1.1rem;"><?php esc_html_e('Service Feedback', 'my-esport-theme'); ?></h3>
                    <ul style="color: var(--color-text-muted); text-align: left; list-style-type: none; padding-bottom: var(--space-xs); font-size: 0.95rem; line-height: 1.8;">
                        <li>• <?php esc_html_e('Products', 'my-esport-theme'); ?></li>
                        <li>• <?php esc_html_e('Website', 'my-esport-theme'); ?></li>
                        <li>• <?php esc_html_e('Ordering process', 'my-esport-theme'); ?></li>
                        <li>• <?php esc_html_e('Customer service', 'my-esport-theme'); ?></li>
                    </ul>
                </div>
            </div>
            <div style="text-align: center; margin-top: var(--space-2xl);">
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary"><?php esc_html_e('Get in Touch', 'my-esport-theme'); ?></a>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="newsletter-section" style="background-color: var(--color-surface);">
        <div class="container">
            <h2 class="section-heading"><?php esc_html_e('Stay In The Loop', 'my-esport-theme'); ?></h2>
            <p class="section-description" style="margin: 0 auto 2rem;">
                <?php esc_html_e('Subscribe to receive new gear drops and exclusive offers.', 'my-esport-theme'); ?>
            </p>
            <form class="newsletter-form" onsubmit="event.preventDefault();">
                <input type="email" class="newsletter-input"
                    placeholder="<?php esc_attr_e('Your email address', 'my-esport-theme'); ?>" required
                    aria-label="<?php esc_attr_e('Email Address', 'my-esport-theme'); ?>">
                <button type="submit"
                    class="btn btn-primary"><?php esc_html_e('Subscribe', 'my-esport-theme'); ?></button>
            </form>
        </div>
    </section>

</main>
<?php get_footer(); ?>