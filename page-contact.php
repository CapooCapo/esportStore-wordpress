<?php
/**
 * Template Name: Contact
 */
get_header(); ?>

<main id="primary" class="site-main">
    <section class="contact-section" style="padding-top: var(--space-4xl); padding-bottom: var(--space-4xl); min-height: 70vh;">
        <div class="container">
            <header class="page-header" style="text-align: center; margin-bottom: var(--space-4xl);">
                <span class="eyebrow"><?php esc_html_e('GET IN TOUCH', 'my-esport-theme'); ?></span>
                <h1 class="section-heading"><?php esc_html_e('Contact Us', 'my-esport-theme'); ?></h1>
                <p class="section-description">
                    <?php esc_html_e('Have questions about our sportswear, sizing, or your order? Our team is ready to assist you.', 'my-esport-theme'); ?>
                </p>
            </header>
            
            <div class="contact-info-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-lg); margin-top: var(--space-xl);">
                <div class="contact-info-card" style="text-align: center; padding: var(--space-xl) var(--space-md); background: var(--color-surface); border-radius: var(--radius-lg); border: 1px solid var(--color-border);">
                    <svg class="contact-icon" viewBox="0 0 24 24" fill="none" stroke="var(--color-primary-red)"
                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="width: 48px; height: 48px; margin-bottom: var(--space-md);">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                    <h3 style="margin-bottom: var(--space-xs);"><?php esc_html_e('Email', 'my-esport-theme'); ?></h3>
                    <p style="color: var(--color-text-muted);">support@esportstore.com</p>
                </div>
                <div class="contact-info-card" style="text-align: center; padding: var(--space-xl) var(--space-md); background: var(--color-surface); border-radius: var(--radius-lg); border: 1px solid var(--color-border);">
                    <svg class="contact-icon" viewBox="0 0 24 24" fill="none" stroke="var(--color-primary-red)"
                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="width: 48px; height: 48px; margin-bottom: var(--space-md);">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                    </svg>
                    <h3 style="margin-bottom: var(--space-xs);"><?php esc_html_e('Phone', 'my-esport-theme'); ?></h3>
                    <p style="color: var(--color-text-muted);">+1 (800) 123-4567</p>
                </div>
                <div class="contact-info-card" style="text-align: center; padding: var(--space-xl) var(--space-md); background: var(--color-surface); border-radius: var(--radius-lg); border: 1px solid var(--color-border);">
                    <svg class="contact-icon" viewBox="0 0 24 24" fill="none" stroke="var(--color-primary-red)"
                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="width: 48px; height: 48px; margin-bottom: var(--space-md);">
                        <circle cx="12" cy="10" r="3"></circle>
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                    </svg>
                    <h3 style="margin-bottom: var(--space-xs);"><?php esc_html_e('Business Hours', 'my-esport-theme'); ?></h3>
                    <p style="color: var(--color-text-muted);">Mon-Fri: 9AM - 6PM EST</p>
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
