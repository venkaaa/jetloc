<?php global $woocommerce;
	$right_headermeta = ot_get_option('right_headermeta');
	$s_cart = ot_get_option('s_cart');
	$h_sm_locations = ot_get_option('h_sm_locations');
	$wpml_switcher = ot_get_option('wpml_switcher');
?>

<div class="col-md-4">
	
	<div class="header-right <?php if(!$s_cart&&$right_headermeta){ ?>margin-rh-cart<?php } 
	elseif(!$s_cart&&has_nav_menu( 'right-hm-menu' )){ ?>margin-rh-cart<?php } 
	elseif(!$s_cart&&$wpml_switcher){ ?>margin-rh-cart<?php } 
	elseif($h_sm_locations=="right_h"&&$right_headermeta){ ?>margin-rh-cart<?php } 
	elseif($h_sm_locations=="right_h"&&has_nav_menu( 'right-hm-menu' )){ ?>margin-rh-cart<?php } 
	elseif($h_sm_locations=="right_h"&&$wpml_switcher){ ?>margin-rh-cart<?php } 
	elseif($right_headermeta||has_nav_menu( 'right-hm-menu')){ ?>margin-rh<?php } 
	elseif(!$s_cart){ ?>margin-cart<?php }?>">
	
		<div class="header-r-meta">
			<?php if($right_headermeta){ ?>
				<div class="header-rh"><?php echo $right_headermeta; ?></div>
			<?php }else{?>
				<?php if ( has_nav_menu( 'right-hm-menu' ) ) { /* if menu location 'primary-menu' exists then use custom menu */ ?>
					<?php wp_nav_menu( array( 'theme_location' => 'right-hm-menu', 'menu_class' => 'right-header', 'container' => '', 'depth' => 1  ) ); ?>
				<?php } ?>
			<?php } ?>
			<?php get_template_part('includes/wpml' ) ?>
		</div>
		
		<?php if ($h_sm_locations=="right_h"){?>
		
			<div class="social-header social-right-align"><?php get_template_part('includes/header-social-media' ) ?></div>
		
		<?php }else{	?>
		
			<?php if(!$s_cart){ ?>
				<?php if (is_plugin_active('woocommerce/woocommerce.php')) {?>	
					<div class="header-cart">
						<a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" class="btn view_cart-btn" title="<?php _e('View Cart &rarr;', GETTEXT_DOMAIN); ?>"><span class="halflings shopping-cart halflings-icon"></span></a>
						<div class="cart-total"><?php echo $woocommerce->cart->get_cart_contents_count(); ?> <?php _e('item(s)', GETTEXT_DOMAIN); ?>  -  <?php echo $woocommerce->cart->get_cart_subtotal(); ?></div>
						<a href="<?php echo $woocommerce->cart->get_checkout_url(); ?>" class="btn btn-primary btn-sm checkout" title="<?php _e('Checkout &rarr;', GETTEXT_DOMAIN); ?>"><?php _e('Checkout &rarr;', GETTEXT_DOMAIN); ?></a>
						
						<div class="cart-dropdown hidden-xs hidden-sm">
							
							<div class="header_cart_list">
							
								<?php if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ) : ?>
							
									<?php foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) :
							
										$_product = $cart_item['data'];
							
										// Only display if allowed
										if ( ! apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) || ! $_product->exists() || $cart_item['quantity'] == 0 )
											continue;
							
										// Get price
										$product_price = get_option( 'woocommerce_display_cart_prices_excluding_tax' ) == 'yes' || $woocommerce->customer->is_vat_exempt() ? $_product->get_price_excluding_tax() : $_product->get_price();
							
										$product_price = apply_filters( 'woocommerce_cart_item_price_html', woocommerce_price( $product_price ), $cart_item, $cart_item_key );?>
							
										<div class="item clearfix">
											<a class="cart-thumbnail" href="<?php echo get_permalink( $cart_item['product_id'] ); ?>"><?php echo $_product->get_image('thumbnail'); ?></a>
											<div class="cart-content">
												<a class="cart-title" href="<?php echo get_permalink( $cart_item['product_id'] ); ?>"><?php echo apply_filters('woocommerce_widget_cart_product_title', $_product->get_title(), $_product ); ?></a>
												<?php echo $woocommerce->cart->get_item_data( $cart_item ); ?>
												<div class="cart-meta">
													<?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s"><span class="halflings trash halflings-icon"></span></a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), __('Remove this item', GETTEXT_DOMAIN) ), $cart_item_key );?>
													<span class="quantity"><?php printf( '%s &times; %s', $cart_item['quantity'], $product_price ); ?></span>
												</div>
											</div>
										</div>
										
									<?php endforeach; ?>
							
								<?php else : ?>
							
									<div class="empty"><?php _e('No products in the cart.', GETTEXT_DOMAIN); ?></div>
							
								<?php endif; ?>
							
							</div><!-- end product list -->
							
							<?php if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ) : ?>
							
							<div class="header_cart_footer">
								<p class="total cleanfix"><strong><?php _e('Cart Subtotal', GETTEXT_DOMAIN); ?>:</strong> <span><?php echo $woocommerce->cart->get_cart_subtotal(); ?></span></p>
							
								<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>
							</div>
							
							<?php endif; ?>
							
						</div>
						
					</div>
				<?php } ?>
			<?php } ?>
		
		<?php }	?>
		
	</div>
</div>