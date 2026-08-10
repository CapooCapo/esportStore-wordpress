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
                    <a href="#t-shirts" class="category-card">
                        <img loading="lazy" src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="T-Shirts Category">
                        <span class="category-name"><?php esc_html_e('T-Shirts', 'my-esport-theme'); ?></span>
                    </a>
                    <a href="#shirts" class="category-card">
                        <img loading="lazy" src="https://images.unsplash.com/photo-1596755094514-f87e32f85e2c?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Shirts Category">
                        <span class="category-name"><?php esc_html_e('Shirts', 'my-esport-theme'); ?></span>
                    </a>
                    <a href="#pants" class="category-card">
                        <img loading="lazy" src="https://images.unsplash.com/photo-1624378439575-d8705ad7ae80?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Pants Category">
                        <span class="category-name"><?php esc_html_e('Pants', 'my-esport-theme'); ?></span>
                    </a>
                    <a href="#jackets" class="category-card">
                        <img loading="lazy" src="https://images.unsplash.com/photo-1551028719-00167b16eac5?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Jackets Category">
                        <span class="category-name"><?php esc_html_e('Jackets', 'my-esport-theme'); ?></span>
                    </a>
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
                
                <div class="product-grid">
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
                                global $product;
                                ?>
                                <div class="product-card">
                                    <div class="product-image-wrap">
                                        <?php if ( $product->is_on_sale() ) : ?>
                                            <span class="product-badge"><?php esc_html_e('SALE', 'my-esport-theme'); ?></span>
                                        <?php elseif ( ( time() - strtotime( get_the_date('Y-m-d') ) ) < ( 30 * 24 * 60 * 60 ) ) : ?>
                                            <span class="product-badge"><?php esc_html_e('NEW', 'my-esport-theme'); ?></span>
                                        <?php endif; ?>
                                        <button class="wishlist-btn" aria-label="<?php esc_attr_e('Add to Wishlist', 'my-esport-theme'); ?>">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                                        </button>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php 
                                            if ( has_post_thumbnail() ) {
                                                the_post_thumbnail( 'woocommerce_thumbnail', array( 'loading' => 'lazy' ) );
                                            } else {
                                                echo '<img src="' . esc_url( wc_placeholder_img_src() ) . '" alt="' . esc_attr__( 'Placeholder', 'my-esport-theme' ) . '" loading="lazy" />';
                                            }
                                            ?>
                                        </a>
                                    </div>
                                    <span class="product-category"><?php echo wc_get_product_category_list( $product->get_id(), ', ' ); ?></span>
                                    <a href="<?php the_permalink(); ?>"><h3 class="product-name"><?php the_title(); ?></h3></a>
                                    <div class="product-price-wrap">
                                        <?php echo $product->get_price_html(); ?>
                                    </div>
                                    <a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>" data-product_id="<?php echo esc_attr( $product->get_id() ); ?>" class="add-to-cart-btn ajax_add_to_cart" rel="nofollow"><?php echo esc_html( $product->add_to_cart_text() ); ?></a>
                                </div>
                                <?php
                            endwhile;
                        } else {
                            echo '<p>' . esc_html__( 'No products found', 'my-esport-theme' ) . '</p>';
                        }
                        wp_reset_postdata();
                    } else {
                        echo '<p>' . esc_html__( 'WooCommerce is not active.', 'my-esport-theme' ) . '</p>';
                    }
                    ?>
                </div>
                
                <div class="center-action">
                    <a href="#shop" class="btn btn-secondary">View All Products</a>
                </div>
            </div>
        </section>

        <!-- Promotion Section -->
        <section class="promotion-section">
            <img loading="lazy" src="https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80" alt="<?php esc_attr_e('Fashion promotion', 'my-esport-theme'); ?>" class="promotion-bg">
            <div class="promotion-overlay"></div>
            <div class="container">
                <div class="promotion-content">
                    <span class="eyebrow"><?php esc_html_e('LIMITED OFFER', 'my-esport-theme'); ?></span>
                    <h2 class="section-heading"><?php esc_html_e('Up To 30% Off Selected Items', 'my-esport-theme'); ?></h2>
                    <p class="section-description"><?php esc_html_e('Discover selected styles at special prices for a limited time.', 'my-esport-theme'); ?></p>
                    <a href="#shop" class="btn btn-white"><?php esc_html_e('Shop Sale', 'my-esport-theme'); ?></a>
                </div>
            </div>
        </section>

        <!-- Collection Section -->
        <section id="collection" class="collection-section">
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
    </main>
<?php get_footer(); ?>
