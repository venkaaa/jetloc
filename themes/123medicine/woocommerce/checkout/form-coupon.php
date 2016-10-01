<?php
/**
 * Checkout coupon form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;

if ( ! $woocommerce->cart->coupons_enabled() )
	return;

$info_message = apply_filters('woocommerce_checkout_coupon_message', __( 'Have a coupon?', GETTEXT_DOMAIN ));
?>

<p class="woocommerce-info"><?php echo $info_message; ?> <a href="#" class="showcoupon"><?php _e( 'Click here to enter your code', GETTEXT_DOMAIN ); ?></a></p>

<form class="checkout_coupon" method="post" style="display:none">

	<p class="form-row form-row-first">
		<input type="text" name="coupon_code" class="input-text" placeholder="<?php _e( 'Coupon code', GETTEXT_DOMAIN ); ?>" id="coupon_code" value="" />
	</p>

	<p class="form-row form-row-last">
		<input type="submit" class="btn btn-primary" name="apply_coupon" value="<?php _e( 'Apply Coupon', GETTEXT_DOMAIN ); ?>" />
	</p>

	<div class="clear"></div>
</form>