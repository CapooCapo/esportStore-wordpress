<?php get_header(); ?>
    <main>
        <!-- Hero Section -->
        <section id="home" class="hero-section">
            <div class="hero-content">
                <span class="eyebrow"><?php esc_html_e('NEW COLLECTION', 'my-esport-theme'); ?></span>
                <h1 class="hero-heading"><?php esc_html_e('Style Made For Everyday', 'my-esport-theme'); ?></h1>
                <p class="section-description"><?php esc_html_e('Modern clothing designed for everyday comfort and style.', 'my-esport-theme'); ?></p>
                <div class="hero-actions">
                    <a href="<?php echo function_exists('wc_get_page_permalink') ? esc_url(wc_get_page_permalink('shop')) : esc_url(home_url('/shop')); ?>" class="btn btn-primary"><?php esc_html_e('Shop Now', 'my-esport-theme'); ?></a>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>#collection" class="btn btn-secondary"><?php esc_html_e('View Collection', 'my-esport-theme'); ?></a>
                </div>
            </div>
            <div class="hero-image">
                <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" alt="Fashion model wearing modern clothing">
            </div>
        </section>

        <!-- Category Section -->
        <section class="category-section">
            <div class="container">
                <h2 class="section-heading"><?php esc_html_e('Shop By Category', 'my-esport-theme'); ?></h2>
                <div class="category-grid">
                    <?php
                    if ( class_exists( 'WooCommerce' ) ) {
                        $args = array(
                            'taxonomy'   => 'product_cat',
                            'hide_empty' => false,
                            'number'     => 4
                        );
                        $product_categories = get_terms( $args );
                        if ( ! empty( $product_categories ) && ! is_wp_error( $product_categories ) ) {
                            foreach ( $product_categories as $category ) {
                                $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
                                $image_url = $thumbnail_id ? wp_get_attachment_url( $thumbnail_id ) : wc_placeholder_img_src();
                                ?>
                                <a href="<?php echo esc_url( get_term_link( $category ) ); ?>" class="category-card">
                                    <img loading="lazy" src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $category->name ); ?>">
                                    <span class="category-name"><?php echo esc_html( $category->name ); ?></span>
                                </a>
                                <?php
                            }
                        } else {
                            echo '<p>' . esc_html__( 'No categories found.', 'my-esport-theme' ) . '</p>';
                        }
                    } else {
                        echo '<p>' . esc_html__( 'WooCommerce is not active.', 'my-esport-theme' ) . '</p>';
                    }
                    ?>
                </div>
            </div>
        </section>

        <!-- Featured Products Section -->
        <section id="shop" class="featured-products">
            <div class="container">
                <div class="section-header">
                    <span class="eyebrow">OUR COLLECTION</span>
                    <h2 class="section-heading">Featured Products</h2>
                    <p class="section-description">Explore our latest clothing collection.</p>
                </div>
                
                <ul class="product-grid products">
                    <?php
                    if ( class_exists( 'WooCommerce' ) ) {
                        $args = array(
                            'post_type' => 'product',
                            'posts_per_page' => 4,
                            'status' => 'publish',
                        );
                        $loop = new WP_Query( $args );
                        if ( $loop->have_posts() ) {
                            while ( $loop->have_posts() ) : $loop->the_post();
                                wc_get_template_part( 'content', 'product' );
                            endwhile;
                        } else {
                            echo '<p>' . esc_html__( 'No products found', 'my-esport-theme' ) . '</p>';
                        }
                        wp_reset_postdata();
                    } else {
                        echo '<p>' . esc_html__( 'WooCommerce is not active.', 'my-esport-theme' ) . '</p>';
                    }
                    ?>
                </ul>
                
                <div class="center-action">
                    <a href="#shop" class="btn btn-secondary">View All Products</a>
                </div>
            </div>
        </section>

        <!-- Collection Section -->
        <section id="collection" class="collection-section">
            <div class="container">
                <div class="collection-inner">
                    <div class="collection-content">
                        <span class="eyebrow"><?php esc_html_e('NEW SEASON', 'my-esport-theme'); ?></span>
                        <h2 class="section-heading"><?php esc_html_e('Everyday Essentials', 'my-esport-theme'); ?></h2>
                        <p class="section-description"><?php esc_html_e('Simple pieces designed to work together across your wardrobe.', 'my-esport-theme'); ?></p>
                        <div>
                            <a href="#shop" class="btn btn-primary"><?php esc_html_e('Explore Collection', 'my-esport-theme'); ?></a>
                        </div>
                    </div>
                    <div class="collection-image">
                        <img loading="lazy" src="https://images.unsplash.com/photo-1485230895905-31298c772db5?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" alt="<?php esc_attr_e('Everyday essentials collection', 'my-esport-theme'); ?>">
                    </div>
                </div>
            </div>
        </section>

        <!-- Promotion Section -->
        <section id="promotion" class="promotion-section">
            <img loading="lazy" src="https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80" alt="<?php esc_attr_e('Fashion promotion', 'my-esport-theme'); ?>" class="promotion-bg">
            <div class="promotion-overlay"></div>
            <div class="container">
                <div class="promotion-content">
                    <span class="eyebrow"><?php esc_html_e('LIMITED OFFER', 'my-esport-theme'); ?></span>
                    <h2 class="section-heading"><?php esc_html_e('Up To 30% Off Selected Items', 'my-esport-theme'); ?></h2>
                    <p class="section-description"><?php esc_html_e('Discover selected styles at special prices for a limited time.', 'my-esport-theme'); ?></p>
                    <a href="#shop" class="btn btn-primary"><?php esc_html_e('Shop Sale', 'my-esport-theme'); ?></a>
                </div>
            </div>
        </section>

        <!-- Benefits Section -->
        <section class="benefits-section">
            <div class="container">
                <div class="benefits-grid">
                    <div class="benefit-item">
                        <svg class="benefit-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                        <h3 class="benefit-title"><?php esc_html_e('Free Shipping', 'my-esport-theme'); ?></h3>
                        <p class="benefit-description"><?php esc_html_e('Free shipping for qualifying orders.', 'my-esport-theme'); ?></p>
                    </div>
                    <div class="benefit-item">
                        <svg class="benefit-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21.5 2v6h-6M21.34 15.57a10 10 0 1 1-.59-9.21l5.25 4.28"></path></svg>
                        <h3 class="benefit-title"><?php esc_html_e('Easy Returns', 'my-esport-theme'); ?></h3>
                        <p class="benefit-description"><?php esc_html_e('Simple return process for eligible products.', 'my-esport-theme'); ?></p>
                    </div>
                    <div class="benefit-item">
                        <svg class="benefit-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                        <h3 class="benefit-title"><?php esc_html_e('Secure Checkout', 'my-esport-theme'); ?></h3>
                        <p class="benefit-description"><?php esc_html_e('Secure and reliable checkout experience.', 'my-esport-theme'); ?></p>
                    </div>
                    <div class="benefit-item">
                        <svg class="benefit-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                        <h3 class="benefit-title"><?php esc_html_e('Customer Support', 'my-esport-theme'); ?></h3>
                        <p class="benefit-description"><?php esc_html_e('Support for product and order questions.', 'my-esport-theme'); ?></p>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="about-section container">
            <div class="about-image">
                <img loading="lazy" src="https://images.unsplash.com/photo-1558769132-cb1fac084092?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" alt="<?php esc_attr_e('About our clothing brand', 'my-esport-theme'); ?>">
            </div>
            <div class="about-content">
                <span class="eyebrow"><?php esc_html_e('ABOUT US', 'my-esport-theme'); ?></span>
                <h2 class="section-heading"><?php esc_html_e('Clothing For Everyday Life', 'my-esport-theme'); ?></h2>
                <p class="section-description"><?php esc_html_e('We create practical and modern clothing designed for everyday wear. Our focus is on high-quality materials and simple designs that fit naturally into your lifestyle.', 'my-esport-theme'); ?></p>
                <div>
                    <a href="#about" class="btn btn-secondary"><?php esc_html_e('Learn More', 'my-esport-theme'); ?></a>
                </div>
            </div>
        </section>

        <!-- Newsletter Section -->
        <section class="newsletter-section">
            <div class="container">
                <h2 class="section-heading"><?php esc_html_e('Stay In The Loop', 'my-esport-theme'); ?></h2>
                <p class="section-description" style="margin: 0 auto 2rem;"><?php esc_html_e('Subscribe to receive new collection updates and offers.', 'my-esport-theme'); ?></p>
                <form class="newsletter-form" onsubmit="event.preventDefault();">
                    <input type="email" class="newsletter-input" placeholder="<?php esc_attr_e('Your email address', 'my-esport-theme'); ?>" required aria-label="<?php esc_attr_e('Email Address', 'my-esport-theme'); ?>">
                    <button type="submit" class="btn btn-primary"><?php esc_html_e('Subscribe', 'my-esport-theme'); ?></button>
                </form>
            </div>
        </section>
        <!-- Contact Section -->
        <section class="contact-section">
            <div class="container">
                <div class="contact-content">
                    <span class="eyebrow"><?php esc_html_e('GET IN TOUCH', 'my-esport-theme'); ?></span>
                    <h2 class="section-heading"><?php esc_html_e('Contact Us', 'my-esport-theme'); ?></h2>
                    <p class="section-description"><?php esc_html_e('Have questions about our products or your order? We are here to help.', 'my-esport-theme'); ?></p>
                    <div class="contact-info-grid">
                        <div class="contact-info-card">
                            <svg class="contact-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                            <h3><?php esc_html_e('Email', 'my-esport-theme'); ?></h3>
                            <p>support@esportstore.com</p>
                        </div>
                        <div class="contact-info-card">
                            <svg class="contact-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                            <h3><?php esc_html_e('Phone', 'my-esport-theme'); ?></h3>
                            <p>+1 (800) 123-4567</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
<?php get_footer(); ?>
