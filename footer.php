    <!-- Footer -->
    <footer id="contact" class="site-footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo"><?php bloginfo( 'name' ); ?></a>
                    <p class="footer-desc"><?php esc_html_e('Modern clothing for everyday life.', 'my-esport-theme'); ?></p>
                    <div class="social-links">
                        <a href="#" class="social-link" aria-label="Facebook">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                        </a>
                        <a href="#" class="social-link" aria-label="Instagram">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                        </a>
                        <a href="#" class="social-link" aria-label="Twitter">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>
                        </a>
                    </div>
                </div>
                
                <div class="footer-col">
                    <h3 class="footer-title"><?php esc_html_e('Shop', 'my-esport-theme'); ?></h3>
                    <div class="footer-links">
                        <a href="#"><?php esc_html_e('T-Shirts', 'my-esport-theme'); ?></a>
                        <a href="#"><?php esc_html_e('Shirts', 'my-esport-theme'); ?></a>
                        <a href="#"><?php esc_html_e('Pants', 'my-esport-theme'); ?></a>
                        <a href="#"><?php esc_html_e('Jackets', 'my-esport-theme'); ?></a>
                        <a href="#"><?php esc_html_e('New Collection', 'my-esport-theme'); ?></a>
                    </div>
                </div>
                
                <div class="footer-col">
                    <h3 class="footer-title"><?php esc_html_e('Customer Service', 'my-esport-theme'); ?></h3>
                    <div class="footer-links">
                        <a href="#"><?php esc_html_e('Contact', 'my-esport-theme'); ?></a>
                        <a href="#"><?php esc_html_e('Shipping', 'my-esport-theme'); ?></a>
                        <a href="#"><?php esc_html_e('Returns', 'my-esport-theme'); ?></a>
                        <a href="#"><?php esc_html_e('FAQ', 'my-esport-theme'); ?></a>
                    </div>
                </div>
                
                <div class="footer-col">
                    <h3 class="footer-title"><?php esc_html_e('Information', 'my-esport-theme'); ?></h3>
                    <div class="footer-links">
                        <a href="#"><?php esc_html_e('About Us', 'my-esport-theme'); ?></a>
                        <a href="#"><?php esc_html_e('Privacy Policy', 'my-esport-theme'); ?></a>
                        <a href="#"><?php esc_html_e('Terms & Conditions', 'my-esport-theme'); ?></a>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e('All rights reserved.', 'my-esport-theme'); ?></p>
            </div>
        </div>
    </footer>


    <?php wp_footer(); ?>
</body>
</html>
