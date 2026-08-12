    <!-- Footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo" aria-label="<?php esc_attr_e('Home', 'my-esport-theme'); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="<?php bloginfo('name'); ?> Logo">
                    </a>
                    <p class="footer-desc"><?php esc_html_e('Modern clothing for everyday life.', 'my-esport-theme'); ?></p>
                        <!-- Social Links Removed - No fake navigation links allowed -->
                </div>
                
                <div class="footer-col">
                    <h3 class="footer-title"><?php esc_html_e('Shop', 'my-esport-theme'); ?></h3>
                    <div class="footer-links">
                        <?php 
                        $shop_url = function_exists('wc_get_page_permalink') ? esc_url(wc_get_page_permalink('shop')) : esc_url(home_url('/shop')); 
                        ?>
                        <a href="<?php echo $shop_url; ?>"><?php esc_html_e('All Products', 'my-esport-theme'); ?></a>
                        <a href="<?php echo $shop_url; ?>"><?php esc_html_e('Football', 'my-esport-theme'); ?></a>
                        <a href="<?php echo $shop_url; ?>"><?php esc_html_e('Basketball', 'my-esport-theme'); ?></a>
                        <a href="<?php echo $shop_url; ?>"><?php esc_html_e('Training', 'my-esport-theme'); ?></a>
                        <a href="<?php echo $shop_url; ?>"><?php esc_html_e('Accessories', 'my-esport-theme'); ?></a>
                    </div>
                </div>
                
                <div class="footer-col">
                    <h3 class="footer-title"><?php esc_html_e('Customer Service', 'my-esport-theme'); ?></h3>
                    <div class="footer-links">
                        <a href="<?php echo esc_url(home_url('/contact')); ?>"><?php esc_html_e('Contact', 'my-esport-theme'); ?></a>
                        <a href="<?php echo function_exists('wc_get_page_permalink') ? esc_url(wc_get_page_permalink('myaccount')) : esc_url(home_url('/my-account')); ?>"><?php esc_html_e('My Account', 'my-esport-theme'); ?></a>
                        <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('FAQ', 'my-esport-theme'); ?></a>
                    </div>
                </div>
                
                <div class="footer-col">
                    <h3 class="footer-title"><?php esc_html_e('Information', 'my-esport-theme'); ?></h3>
                    <div class="footer-links">
                        <a href="<?php echo esc_url(home_url('/about')); ?>"><?php esc_html_e('About Us', 'my-esport-theme'); ?></a>
                        <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Privacy Policy', 'my-esport-theme'); ?></a>
                        <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Terms & Conditions', 'my-esport-theme'); ?></a>
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
