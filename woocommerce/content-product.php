<?php
/**
 * The template for displaying product content within loops
 *
 * This template overrides the default WooCommerce template to match the theme's custom design.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php wc_product_class( '', $product ); ?>>
    <div class="product-image-wrap">
        <?php if ( $product->is_on_sale() ) : ?>
            <span class="product-badge"><?php esc_html_e('SALE', 'my-esport-theme'); ?></span>
        <?php elseif ( ( time() - strtotime( get_the_date('Y-m-d') ) ) < ( 30 * 24 * 60 * 60 ) ) : ?>
            <span class="product-badge"><?php esc_html_e('NEW', 'my-esport-theme'); ?></span>
        <?php endif; ?>
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
    
    <a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>" data-product_id="<?php echo esc_attr( $product->get_id() ); ?>" class="add-to-cart-btn ajax_add_to_cart" rel="nofollow">
        <?php echo esc_html( $product->add_to_cart_text() ); ?>
    </a>
</li>
