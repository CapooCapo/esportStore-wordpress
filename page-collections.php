<?php
/**
 * Template Name: Collections
 */
get_header(); ?>

<main id="primary" class="site-main">
    <div class="container" style="padding-top: var(--space-4xl); padding-bottom: var(--space-4xl);">
        <header class="page-header" style="text-align: center; margin-bottom: var(--space-4xl);">
            <span class="eyebrow"><?php esc_html_e('BROWSE CATEGORIES', 'my-esport-theme'); ?></span>
            <h1 class="section-heading"><?php esc_html_e('Collections', 'my-esport-theme'); ?></h1>
            <p class="section-description"><?php esc_html_e('Browse our sportswear collections for football, basketball, training, and everyday activewear.', 'my-esport-theme'); ?></p>
        </header>

        <!-- Football Collection -->
        <section class="collection-section" style="margin-bottom: var(--space-4xl);">
            <div class="collection-inner">
                <div class="collection-content">
                    <span class="eyebrow"><?php esc_html_e('ON THE PITCH', 'my-esport-theme'); ?></span>
                    <h2 class="section-heading"><?php esc_html_e('Football', 'my-esport-theme'); ?></h2>
                    <p class="section-description">
                        <?php esc_html_e('Football jerseys, shorts, and training wear for players and supporters. Built for performance and passion.', 'my-esport-theme'); ?>
                    </p>
                    <div>
                        <a href="<?php echo esc_url(home_url('/product-category/football/')); ?>"
                            class="btn btn-primary"><?php esc_html_e('Shop Football', 'my-esport-theme'); ?></a>
                    </div>
                </div>
                <div class="collection-image">
                    <img loading="lazy"
                        src="https://images.unsplash.com/photo-1546519638-68e109498ffc?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80"
                        alt="<?php esc_attr_e('Football Collection', 'my-esport-theme'); ?>">
                </div>
            </div>
        </section>

        <!-- Basketball Collection -->
        <section class="collection-section" style="margin-bottom: var(--space-4xl);">
            <div class="collection-inner" style="direction: rtl;">
                <div class="collection-content" style="direction: ltr;">
                    <span class="eyebrow"><?php esc_html_e('ON THE COURT', 'my-esport-theme'); ?></span>
                    <h2 class="section-heading"><?php esc_html_e('Basketball', 'my-esport-theme'); ?></h2>
                    <p class="section-description">
                        <?php esc_html_e('Basketball jerseys, shorts, and sportswear designed for training, games, and everyday wear. Lightweight and breathable.', 'my-esport-theme'); ?>
                    </p>
                    <div>
                        <a href="<?php echo esc_url(home_url('/product-category/basketball/')); ?>"
                            class="btn btn-primary"><?php esc_html_e('Shop Basketball', 'my-esport-theme'); ?></a>
                    </div>
                </div>
                <div class="collection-image" style="direction: ltr;">
                    <img loading="lazy"
                        src="https://images.unsplash.com/photo-1515523110800-9415d13b84a8?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80"
                        alt="<?php esc_attr_e('Basketball Collection', 'my-esport-theme'); ?>">
                </div>
            </div>
        </section>

        <!-- Training Collection -->
        <section class="collection-section" style="margin-bottom: var(--space-4xl);">
            <div class="collection-inner">
                <div class="collection-content">
                    <span class="eyebrow"><?php esc_html_e('PUT IN THE WORK', 'my-esport-theme'); ?></span>
                    <h2 class="section-heading"><?php esc_html_e('Training', 'my-esport-theme'); ?></h2>
                    <p class="section-description">
                        <?php esc_html_e('Practical sportswear and equipment for training sessions and active routines. Stand up to your most intense workouts.', 'my-esport-theme'); ?>
                    </p>
                    <div>
                        <a href="<?php echo esc_url(home_url('/product-category/training/')); ?>"
                            class="btn btn-primary"><?php esc_html_e('Shop Training', 'my-esport-theme'); ?></a>
                    </div>
                </div>
                <div class="collection-image">
                    <img loading="lazy"
                        src="https://images.unsplash.com/photo-1571019614242-c5c5adee9f50?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80"
                        alt="<?php esc_attr_e('Training Collection', 'my-esport-theme'); ?>">
                </div>
            </div>
        </section>

        <!-- Sports Accessories -->
        <section class="collection-section">
            <div class="collection-inner" style="direction: rtl;">
                <div class="collection-content" style="direction: ltr;">
                    <span class="eyebrow"><?php esc_html_e('COMPLETE YOUR KIT', 'my-esport-theme'); ?></span>
                    <h2 class="section-heading"><?php esc_html_e('Sports Accessories', 'my-esport-theme'); ?></h2>
                    <p class="section-description">
                        <?php esc_html_e('Selected accessories and sports essentials to complement your training and game-day setup.', 'my-esport-theme'); ?>
                    </p>
                    <div>
                        <a href="<?php echo esc_url(home_url('/product-category/accessories/')); ?>"
                            class="btn btn-primary"><?php esc_html_e('Shop Accessories', 'my-esport-theme'); ?></a>
                    </div>
                </div>
                <div class="collection-image" style="direction: ltr;">
                    <img loading="lazy"
                        src="https://images.unsplash.com/photo-1517438476312-10d79c077509?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80"
                        alt="<?php esc_attr_e('Sports Accessories', 'my-esport-theme'); ?>">
                </div>
            </div>
        </section>
    </div>
</main>

<?php get_footer(); ?>
