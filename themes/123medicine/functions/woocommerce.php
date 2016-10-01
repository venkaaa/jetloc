<?php
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 5 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 10 );

#remove_action('woocommerce_before_add_to_cart_button', array('WC_Compare_Hook_Filter', 'woocp_details_add_compare_button') );
remove_action('woocommerce_before_template_part', array('WC_Compare_Hook_Filter', 'woocp_shop_add_compare_button'), 10, 3);
remove_action('woocommerce_after_shop_loop_item', array('WC_Compare_Hook_Filter', 'woocp_shop_add_compare_button_below_cart'), 11);

remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

remove_shortcode('wc_wishlists_create', 'shortcode_wc_wishlists_create');
add_shortcode('wc_wishlists_create', 'shortcode_wc_wishlists_create1');
remove_shortcode('wc_wishlists_search', 'shortcode_wc_wishlists_search');
add_shortcode('wc_wishlists_search', 'shortcode_wc_wishlists_search1');
remove_shortcode('wc_wishlists_my_archive', 'shortcode_wc_wishlists_my_archive');
add_shortcode('wc_wishlists_my_archive', 'shortcode_wc_wishlists_my_archive1');
remove_shortcode('wc_wishlists_single', 'shortcode_wc_wishlists_single');
add_shortcode('wc_wishlists_single', 'shortcode_wc_wishlists_single1');
remove_shortcode('wc_wishlists_edit', 'shortcode_wc_wishlists_edit');
add_shortcode('wc_wishlists_edit', 'shortcode_wc_wishlists_edit1');

// wishlist start
function shortcode_wc_wishlists_edit1($atts) {
    ob_start();

    if (is_user_logged_in() || (WC_Wishlists_Settings::get_setting('wc_wishlist_guest_enabled', 'enabled') == 'enabled')) {

        if (isset($_REQUEST['wlid']) && !empty($_REQUEST['wlid'])) {
            global $post;
            $post = get_post($_REQUEST['wlid']);
            if ($post && $post->post_type == 'wishlist') {
                $key = WC_Wishlists_Wishlist::get_the_wishlist_owner($post->ID);
                $user_key = WC_Wishlists_User::get_wishlist_key();
                if ($key == $user_key || current_user_can('manage_woocommerce')) {
                    setup_postdata($post);
                    woocommerce_get_template( 'woocommerce-wishlists/edit-my-list.php');
                } else {
                    
                }
            }
        }

        wp_reset_postdata();
    } else {
        woocommerce_get_template( 'woocommerce-wishlists/guest-disabled.php');
    }

    return ob_get_clean();
}

function shortcode_wc_wishlists_single1($atts) {
    ob_start();

    if (isset($_REQUEST['wlid']) && !empty($_REQUEST['wlid'])) {
        global $post;
        $post = get_post($_REQUEST['wlid']);
        if ($post && $post->post_type == 'wishlist') {
            setup_postdata($post);
				woocommerce_get_template( 'woocommerce-wishlists/view-a-list.php');
        }
    }

    wp_reset_postdata();


    return ob_get_clean();
}
function shortcode_wc_wishlists_my_archive1($atts) {
    ob_start();
    if (is_user_logged_in() || (WC_Wishlists_Settings::get_setting('wc_wishlist_guest_enabled', 'enabled') == 'enabled')) {
        woocommerce_get_template( 'woocommerce-wishlists/my-lists.php');
    } else {
        woocommerce_get_template( 'woocommerce-wishlists/guest-disabled.php');
    }

    return ob_get_clean();
}
function shortcode_wc_wishlists_create1($atts) {
    ob_start();
    if (is_user_logged_in() || (WC_Wishlists_Settings::get_setting('wc_wishlist_guest_enabled', 'enabled') == 'enabled')) {
        woocommerce_get_template( 'woocommerce-wishlists/create-a-list.php');
    } else {
        woocommerce_get_template( 'woocommerce-wishlists/guest-disabled.php');
    }
    return ob_get_clean();
}
function shortcode_wc_wishlists_search1($atts) {
    global $paged;

    if (empty($paged)) {
        $paged = 1;
    }

    ob_start();

    $args = array(
        'paged' => $paged,
        'posts_per_page' => 10,
        'post_type' => 'wishlist',
        'meta_query' => array(
            array(
                'key' => '_wishlist_sharing',
                'value' => 'public'
            )
        )
    );

    if (isset($_GET['f-list'])) {

        $email_args = array(
            'post_type' => 'wishlist',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => '_wishlist_sharing',
                    'value' => 'public'
                ),
                array(
                    'key' => '_wishlist_email',
                    'value' => $_GET['f-list'],
                    'compare' => '='
                )
            )
        );

        $name = explode(' ', $_GET['f-list']);
        $name_args = array(
            'post_type' => 'wishlist',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => '_wishlist_sharing',
                    'value' => 'public'
                ),
                array(
                    'key' => '_wishlist_first_name',
                    'value' => $name[0],
                    'compare' => '='
                )
            )
        );


        if (count($name) > 1) {
            $name_args['meta_query'][] = array(
                'key' => '_wishlist_last_name',
                'value' => $name[1],
                'compare' => '='
            );
        }

        $email_ids = get_posts($email_args);
        $name_ids = get_posts($name_args);

        if (count($name == 1)) {
            $name_args = array(
                'post_type' => 'wishlist',
                'meta_query' => array(
                    'relation' => 'AND',
                    array(
                        'key' => '_wishlist_sharing',
                        'value' => 'public'
                    ),
                    array(
                        'key' => '_wishlist_last_name',
                        'value' => $name[0],
                        'compare' => '='
                    )
                )
            );
            
            $last_ids = get_posts($name_args);
            if ($last_ids) {
                $name_ids = array_merge($name_ids, $last_ids);
            }
        }

        $found_ids = array();
        if ($email_ids) {
            foreach ($email_ids as $post) {
                $found_ids[] = $post->ID;
            }
        }

        if ($name_ids) {
            foreach ($name_ids as $post) {
                $found_ids[] = $post->ID;
            }
        }

        if (count($found_ids)) {
            $args['post__in'] = $found_ids;
        } else {
            $args['post__in'] = array(0);
        }
    }

    query_posts($args);
    woocommerce_get_template( 'woocommerce-wishlists/find-a-list.php');
    wp_reset_query();

    return ob_get_clean();
}
// wishlist end


add_filter('add_to_cart_fragments', 'lpd_add_to_cart_fragments');
 
function lpd_add_to_cart_fragments( $fragments ) {
	global $woocommerce;
	ob_start();?>
		
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
		
	<?php $fragments['.header-cart'] = ob_get_clean();
	return $fragments;
}

if ( ! function_exists( 'woocommerce_page_breadcrumb' ) ) {

	function woocommerce_page_breadcrumb( $args = array() ) {

		$defaults = apply_filters( 'woocommerce_breadcrumb_defaults', array(
			'delimiter'   => '&nbsp;&rarr; ',
			'wrap_before' => '',
			'wrap_after'  => '',
			'before'      => '',
			'after'       => '',
			'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
		) );

		$args = wp_parse_args( $args, $defaults );

		woocommerce_get_template( 'shop/breadcrumb.php', $args );
	}
}

if ( ! function_exists( 'woocommerce_get_product_thumbnail' ) ) {

	function woocommerce_get_product_thumbnail( $size = 'shop_catalog', $placeholder_width = 0, $placeholder_height = 0  ) {
	
		global $post, $woocommerce;
		global $product;

		$shop_thumb_type = ot_get_option('shop_thumb_type');
		$s_rating = ot_get_option('s_rating');

			$output = '';
			
			$output .= '<div class="product-item-thumb-wrap">';
			
			if(!$s_rating){
				if ( $rating_html = $product->get_rating_html() ) :
					$output .= '<div class="star-rating-wrap"><div class="star-rating-wrap-wrap">';
						$output .= $rating_html;
					$output .= '</div></div>';
				endif;
			}
			
			if ($product->is_on_sale()) {
				$output .= apply_filters('woocommerce_sale_flash', '<span class="lpd-onsale">'.__( 'Sale!', 'woocommerce' ).'</span>', $post, $product);			
			}
			
			if ( ! $product->is_in_stock() ) :
				$output .= '<span class="lpd-out-of-s">'.__( 'Out of Stock', 'woocommerce' ).'</span>';
			endif;
			
			if ( (! $product->is_in_stock()) || ($product->product_type == 'external') || ( ! $product->is_purchasable() && ! in_array( $product->product_type, array( 'external', 'grouped' ) ) ) ){}
	
			if ( has_post_thumbnail() ) {
			
				if($shop_thumb_type=="none"){
				
					$thumbnail = get_the_post_thumbnail( $post->ID, $size );
				
				}else{
				
					if($shop_thumb_type=="portrait"){
						$thumbnail = get_the_post_thumbnail( $post->ID, 'front-shop-thumb' );	
					}else{
						$thumbnail = get_the_post_thumbnail( $post->ID, 'front-shop-thumb2' );
					}
				
				}
	
				if ( ! $product->is_purchasable() && ! in_array( $product->product_type, array( 'external', 'grouped' ) ) ){
				
					$output .= '<a class="product-item-thumb" href="'.get_permalink().'" title="'.__('Read More', GETTEXT_DOMAIN).'">'.$thumbnail.'</a>';
					
				}else{
				
					if ( ! $product->is_in_stock() ){
					
						$output .= '<a class="product-item-thumb" href="'.get_permalink().'" title="'.__('Read More', GETTEXT_DOMAIN).'">'.$thumbnail.'</a>';
					
					}else{
					
						$disable = '';
					
						switch ( $product->product_type ) {
						case "variable" :
							$link 	= apply_filters( 'variable_add_to_cart_url', get_permalink( $product->id ) );
							$label 	= apply_filters( 'variable_add_to_cart_text', __('Select options', GETTEXT_DOMAIN) );
						break;
						case "grouped" :
							$link 	= apply_filters( 'grouped_add_to_cart_url', get_permalink( $product->id ) );
							$label 	= apply_filters( 'grouped_add_to_cart_text', __('View options', GETTEXT_DOMAIN) );
						break;
						case "external" :
							$disable = 'yes';
						break;
						default :
							$link 	= get_permalink();
							$label 	= apply_filters( 'add_to_cart_text', __('Add to cart', GETTEXT_DOMAIN) );
						break;
						}
							
						if($disable == 'yes'){
							
							$output .= '<a class="product-item-thumb" href="'.get_permalink().'" title="'.__('Read More', GETTEXT_DOMAIN).'">'.$thumbnail.'</a>';
						
						}else{
				
							$output .= '<a class="product-item-thumb" href="'.$link.'" title="'.$label.'">'.$thumbnail.'</a>';
						
						}
				
					}
				
				}
	
			} 
			else {
			
				$thumbnail = '<img src="'. woocommerce_placeholder_img_src() .'" alt="Placeholder" width="480" height="480" />';
	
				if ( ! $product->is_purchasable() && ! in_array( $product->product_type, array( 'external', 'grouped' ) ) ){
				
					$output .= '<a class="product-item-thumb" data-placement="bottom" href="'.get_permalink().'" title="'.__('Read More', GETTEXT_DOMAIN).'">'.$thumbnail.'</a>';
					
				}else{
				
					if ( ! $product->is_in_stock() ){
					
						$output .= '<a class="product-item-thumb" href="'.apply_filters( 'out_of_stock_add_to_cart_url', get_permalink( $product->id ) ).'" title="'.__('Read More', GETTEXT_DOMAIN).'">'.$thumbnail.'</a>';
					
					}else{
					
						$disable = '';
						
						switch ( $product->product_type ) {
						case "variable" :
							$link 	= apply_filters( 'variable_add_to_cart_url', get_permalink( $product->id ) );
							$label 	= apply_filters( 'variable_add_to_cart_text', __('Select options', GETTEXT_DOMAIN) );
						break;
						case "grouped" :
							$link 	= apply_filters( 'grouped_add_to_cart_url', get_permalink( $product->id ) );
							$label 	= apply_filters( 'grouped_add_to_cart_text', __('View options', GETTEXT_DOMAIN) );
						break;
						case "external" :
							$disable = 'yes';
						break;
						default :
							$link 	= get_permalink();
							$label 	= apply_filters( 'add_to_cart_text', __('Add to cart', GETTEXT_DOMAIN) );
						break;
						}
								
						if($disable == 'yes'){
							
							$output .= '<a class="product-item-thumb" href="'.get_permalink().'" title="'.__('Read More', GETTEXT_DOMAIN).'">'.$thumbnail.'</a>';
						
						}else{
				
							$output .= '<a class="product-item-thumb" href="'.$link.'" title="'.$label.'">'.$thumbnail.'</a>';
						
						}
				
					}
				
				}
	
			}
			
			$output .= '</div>';
			
			return $output;
	}
}


if ( ! function_exists( 'woocommerce_output_related_products' ) ) {
	function woocommerce_output_related_products() {
		woocommerce_related_products( 4, 4  );
	}
}

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_upsells', 15 );
 
if ( ! function_exists( 'woocommerce_output_upsells' ) ) {
	function woocommerce_output_upsells() {
	woocommerce_upsell_display( 4,4 );
	}
}


add_filter ( 'woocommerce_product_thumbnails_columns', 'ptc_lpd_themes' ); 
function ptc_lpd_themes() {
	return 3;
}


add_filter('loop_shop_per_page', 'new_loop_shop_per_page');
function new_loop_shop_per_page() {

	$loop_shop_per_page= ot_get_option('loop_shop_per_page');

	if (!$loop_shop_per_page){
	    $loop_shop_per_page = 12;
	}
	
	return $loop_shop_per_page;

}

add_filter ( 'single_product_large_thumbnail_size', 'woo_lts_lpd_themes' ); 
function woo_lts_lpd_themes() {			

	$product_image_type= ot_get_option('product_image_type');
				
	if($product_image_type=="none"){
		return 'shop_catalog';
	}else{
		if($product_image_type=="portrait"){
			return 'front-shop-thumb';	
		}else{
			return 'front-shop-thumb2';
		}
	}
	
}

add_filter ( 'single_product_small_thumbnail_size', 'woo_sts_lpd_themes' );
function woo_sts_lpd_themes() {	

	$product_thumb_type= ot_get_option('product_thumb_type');
	
	if($product_thumb_type=="none"){
		return 'shop_catalog';
	}else{		
		if($product_thumb_type=="portrait"){
			return 'front-shop-thumb';	
		}else{
			return 'front-shop-thumb2';
		}
	}
	
}


#add_filter( 'post_class', 'woocommerce_custom_remove_product_postclass', 12 );

#function woocommerce_custom_remove_product_postclass ( $classes) {

    #$key = array_search('product',$classes);
    #if($key!==false){

        #unset($classes[$key]);

    #}
    
    #return $classes;
#}

?>