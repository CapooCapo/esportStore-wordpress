<?php
/**
 * Template Name: Contact
 */
get_header(); ?>

<main id="primary" class="site-main">
    <section class="contact-section" style="padding-top: var(--space-4xl); padding-bottom: var(--space-4xl); min-height: 70vh;">
        <div class="container">
            <!-- Contact Us -->
            <header class="page-header" style="text-align: center; margin-bottom: var(--space-4xl);">
                <span class="eyebrow"><?php esc_html_e('CONTACT US', 'my-esport-theme'); ?></span>
                <h1 class="section-heading"><?php esc_html_e('We Are Here to Help', 'my-esport-theme'); ?></h1>
                <p class="section-description">
                    <?php esc_html_e('Welcome to our support center. Whether you are a customer needing assistance or a business looking to partner, this is the main point of contact for our store.', 'my-esport-theme'); ?>
                </p>
            </header>
            
            <div class="contact-info-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-lg); margin-top: var(--space-xl);">
                <!-- Order Support -->
                <div class="contact-info-card" style="text-align: center; padding: var(--space-xl) var(--space-md); background: var(--color-surface); border-radius: var(--radius-lg); border: 1px solid var(--color-border);">
                    <svg class="contact-icon" viewBox="0 0 24 24" fill="none" stroke="var(--color-primary-red)"
                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="width: 48px; height: 48px; margin-bottom: var(--space-md);">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                    <h3 style="margin-bottom: var(--space-xs);"><?php esc_html_e('Order Support', 'my-esport-theme'); ?></h3>
                    <p style="color: var(--color-text-muted);">
                        <?php esc_html_e('Contact us regarding order status, delivery questions, product issues, or any other order-related support.', 'my-esport-theme'); ?>
                    </p>
                </div>

                <!-- Business Partnerships -->
                <div class="contact-info-card" style="text-align: center; padding: var(--space-xl) var(--space-md); background: var(--color-surface); border-radius: var(--radius-lg); border: 1px solid var(--color-border);">
                    <svg class="contact-icon" viewBox="0 0 24 24" fill="none" stroke="var(--color-primary-red)"
                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="width: 48px; height: 48px; margin-bottom: var(--space-md);">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    <h3 style="margin-bottom: var(--space-xs);"><?php esc_html_e('Business Partnerships', 'my-esport-theme'); ?></h3>
                    <p style="color: var(--color-text-muted);">
                        <?php esc_html_e('We invite businesses, teams, and clubs to reach out regarding exciting collaboration and wholesale opportunities.', 'my-esport-theme'); ?>
                    </p>
                </div>

                <!-- Service Feedback -->
                <div class="contact-info-card" style="text-align: center; padding: var(--space-xl) var(--space-md); background: var(--color-surface); border-radius: var(--radius-lg); border: 1px solid var(--color-border);">
                    <svg class="contact-icon" viewBox="0 0 24 24" fill="none" stroke="var(--color-primary-red)"
                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="width: 48px; height: 48px; margin-bottom: var(--space-md);">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M8 14s1.5 2 4 2 4-2 4-2"></path>
                        <line x1="9" y1="9" x2="9.01" y2="9"></line>
                        <line x1="15" y1="9" x2="15.01" y2="9"></line>
                    </svg>
                    <h3 style="margin-bottom: var(--space-xs);"><?php esc_html_e('Service Feedback', 'my-esport-theme'); ?></h3>
                    <p style="color: var(--color-text-muted);">
                        <?php esc_html_e('Share your valuable feedback about our products, ordering process, delivery, and overall service quality.', 'my-esport-theme'); ?>
                    </p>
                </div>
            </div>

            <?php
            // If there's a contact form plugin shortcode (like contact form 7), we can output it here.
            // echo do_shortcode('[contact-form-7 id="123" title="Contact form 1"]');
            ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
