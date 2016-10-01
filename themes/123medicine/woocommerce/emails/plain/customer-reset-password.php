<?php
/**
 * Customer Reset Password email
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails/Plain
 * @version     2.0.0
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

echo $email_heading . "\n\n";

echo __( 'Someone requested that the password be reset for the following account:', GETTEXT_DOMAIN ) . "\r\n\r\n";
echo network_home_url( '/' ) . "\r\n\r\n";
echo sprintf(__( 'Username: %s', GETTEXT_DOMAIN ), $user_login) . "\r\n\r\n";
echo __( 'If this was a mistake, just ignore this email and nothing will happen.', GETTEXT_DOMAIN ) . "\r\n\r\n";
echo __( 'To reset your password, visit the following address:', GETTEXT_DOMAIN ) . "\r\n\r\n";

echo get_permalink( woocommerce_get_page_id( 'lost_password' ) ) . sprintf( '?key=%s&login=%s', $reset_key, $user_login ) . "\r\n";

echo "\n****************************************************\n\n";

echo apply_filters( 'woocommerce_email_footer_text', get_option( 'woocommerce_email_footer_text' ) );