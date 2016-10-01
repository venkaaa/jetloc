<?php
/**
 * External product add to cart
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce, $product;

?>
<?php do_action('woocommerce_before_add_to_cart_button'); ?>

<div class="external-cart clearfix <?php if (!$product->get_price_html()){?>no-price<?php } ?>">
	<?php if ($product->get_price_html()){?>
	<div itemprop="offers" itemscope itemtype="http://schema.org/Offer" class="cart-price">
	
		<span class="pr-label"><?php _e( 'Price', GETTEXT_DOMAIN);?>:</span>
	
		<p itemprop="price" class="price"><?php echo $product->get_price_html(); ?></p>
	
		<meta itemprop="priceCurrency" content="<?php echo get_woocommerce_currency(); ?>" />
		<link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />
	
	</div>
	<?php } ?>
	<p class="cart"><a href="<?php echo esc_url( $product_url ); ?>" rel="nofollow" class="single_add_to_cart_button btn btn-primary"><?php echo apply_filters('single_add_to_cart_text', $button_text, 'external'); ?></a></p>
</div>

<?php do_action('woocommerce_after_add_to_cart_button'); ?>