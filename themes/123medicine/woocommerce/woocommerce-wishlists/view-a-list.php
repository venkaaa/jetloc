<?php
$wishlist = new WC_Wishlists_Wishlist($_GET['wlid']);
$wishlist_items = WC_Wishlists_Wishlist_Item_Collection::get_items($wishlist->id);
$wishlist_item_categories = WC_Wishlists_Wishlist_Item_Collection::get_items_categories($wishlist->id);
?>

<?php
$current_owner_key = WC_Wishlists_User::get_wishlist_key();
$sharing = $wishlist->get_wishlist_sharing();
$sharing_key = $wishlist->get_wishlist_sharing_key();
$wl_owner = $wishlist->get_wishlist_owner();


$is_visible = true;

if (!current_user_can('manage_woocommerce')) :
    if ($sharing == 'Shared' && ($current_owner_key != $wl_owner)) :
        if (!isset($_GET['wlkey']) || $_GET['wlkey'] != $sharing_key) :
            $is_visible = false;
        endif;
    elseif ($sharing == 'Private' && $current_owner_key != $wl_owner) :
        if (!isset($_GET['wlkey']) || $_GET['wlkey'] != $sharing_key || $current_owner_key != $wl_owner) :
            $is_visible = false;
        endif;
    endif;
endif;

$wlitemsort = isset($_GET['wlitemsort']) ? $_GET['wlitemsort'] : 'date';
$wlitemcat = isset($_GET['wlitemcat']) ? $_GET['wlitemcat'] : 0;
?>
<?php do_action('woocommerce_wishlists_before_wrapper'); ?>
<?php if (!$is_visible) : ?>
    <div id="wl-wrapper" class="woocommerce">

        <?php woocommerce_show_messages(); ?>

        <ul class="woocommerce_error woocommerce-errror">
            <li>
                <?php _e('Unable to locate the requested list', GETTEXT_DOMAIN); ?>
            </li>
        </ul>

    </div>
<?php else: ?>
    <div id="wl-wrapper" class="product woocommerce">
        <?php woocommerce_show_messages(); ?>
        <?php if ($wishlist_items && count($wishlist_items)) : ?>
            <?php if (isset($_GET['preview']) && $_GET['preview']) : ?>
                <div class="woocommerce-info woocommerce_info"><a href="<?php echo $wishlist->the_url_edit(); ?>" class="button">Return to your view</a> <?php _e('This is how other people will see your Wish List', GETTEXT_DOMAIN); ?></div>
            <?php endif; ?>

            <div class="wl-intro">
                <h2 class="entry-title my-account-title"><?php $wishlist->the_title(); ?></h2>
                <?php if ($sharing == 'Public' || $sharing == 'Shared') : ?>

                    <div class="wl-meta-share">
                        <?php woocommerce_wishlists_get_template('wishlist-sharing-menu.php', array('id' => $wishlist->id)); ?>

                    </div>

                <?php endif; ?>
                <div class="wl-intro-desc">
                    <?php $wishlist->the_content(); ?>

                </div>
            </div>

            <div class="wl-row wl-clear">
                <form method="GET" action="<?php $wishlist->the_url_view(); ?>">
                    <input type="hidden" name="wlid" value="<?php echo $wishlist->id; ?>" />
                    <table width="100%" cellpadding="0" cellspacing="0" class="wl-actions-table wl-right">


                        <tbody>
                            <tr>
                                <td><label for="sort-dropdown"><?php _e('Sort by:', GETTEXT_DOMAIN); ?></label></td>
                                <td><label for="sort-dropdown"><?php _e('In Category:', GETTEXT_DOMAIN); ?></label></td>
                                <td></td>
                            </tr>

                            <tr>
                                <td>
                                    <select class="wl-sel form-control" name="wlitemsort" id="sort-dropdown">
                                        <option value="date" <?php selected($wlitemsort, 'date'); ?>><?php _e('Date Added', GETTEXT_DOMAIN); ?></option>
                                        <option value='pasc' <?php selected($wlitemsort, 'pasc'); ?>><?php _e('Price (High to Low)', GETTEXT_DOMAIN); ?></option>
                                        <option value="pdesc" <?php selected($wlitemsort, 'pdesc'); ?>><?php _e('Price (Low to High)', GETTEXT_DOMAIN); ?></option>
                                    </select>
                                </td>
                                <td>
                                    <?php wp_dropdown_categories(array('taxonomy' => 'product_cat', 'class' => 'wl-sel form-control', 'name' => 'wlitemcat', 'show_option_all' => 'All', 'selected' => $wlitemcat, 'hierarchical' => true, 'include' => array_keys($wishlist_item_categories))); ?>
                                </td>
                                <td>
                                    <input type="submit" class="btn btn-default btn-sm wl-but" value="<?php _e('Go', GETTEXT_DOMAIN); ?>" />
                                </td>

                            </tr>
                        </tbody>

                    </table>
                </form>
            </div>


            <table class="shop_table cart wl-table view" cellspacing="0">
                <thead>

                    <tr>
                        <th class="product-thumbnail">&nbsp;</th>
                        <th class="product-name"><?php _e('Product', GETTEXT_DOMAIN); ?></th>
                        <th class="product-price"><?php _e('Price', GETTEXT_DOMAIN); ?></th>
                        <th class="product-quantity ctr"><?php _e('Qty', GETTEXT_DOMAIN); ?></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($wlitemcat) {
                        $wishlist_items = _woocommerce_wishlist_filter_item_collection_category($wishlist_items, (int) $wlitemcat);
                    }

                    if ($wlitemsort == 'date') {
                        uasort($wishlist_items, '_woocommerce_wishlist_sort_item_collection_date');
                    } elseif ($wlitemsort == 'pasc') {
                        uasort($wishlist_items, '_woocommerce_wishlist_sort_item_collection_price_asc');
                    } elseif ($wlitemsort == 'pdesc') {
                        uasort($wishlist_items, '_woocommerce_wishlist_sort_item_collection_price_desc');
                    }


                    if (sizeof($wishlist_items) > 0) :
                        foreach ($wishlist_items as $wishlist_item_key => $item) :
                            $_product = $item['data'];
                            if ($_product->exists() && $item['quantity'] > 0) :
                                ?>
                                <tr class="cart_table_item">
                                    <td class="product-thumbnail">
                                        <?php
                                        printf('<a href="%s">%s</a>', esc_url(get_permalink(apply_filters('woocommerce_in_cart_product_id', $item['product_id']))), $_product->get_image());
                                        ?>

                                    </td>
                                    <td class="product-name">
                                        <?php
                                        printf('<a href="%s">%s</a>', esc_url(get_permalink(apply_filters('woocommerce_in_cart_product_id', $item['product_id']))), apply_filters('woocommerce_in_cart_product_title', $_product->get_title(), $_product));

                                        // Meta data
                                        echo $woocommerce->cart->get_item_data($item);

                                        // Availability
                                        $availability = $_product->get_availability();

                                        if ($availability['availability']) :
                                            echo apply_filters('woocommerce_stock_html', '<p class="stock ' . esc_attr($availability['class']) . '">' . esc_html($availability['availability']) . '</p>', $availability['availability']);
                                        endif;
                                        ?>

                                    </td>
                                    <td class="product-price">
                                        <?php
                                        $product_price = ( get_option('woocommerce_display_cart_prices_excluding_tax') == 'yes' ) ? $_product->get_price_excluding_tax() : $_product->get_price();
                                        echo apply_filters('woocommerce_cart_item_price_html', woocommerce_price($product_price), $item, $wishlist_item_key);
                                        ?>

                                    </td>
                                    <td class="product-quantity">
                                        <?php echo apply_filters('woocommerce_cart_item_quantity', $item['quantity'], $wishlist_item_key); ?>

                                    </td>
                                    <td class="product-purchase">
                                        <?php if ($_product->is_in_stock()) : ?>
                                            <a href="<?php echo woocommerce_wishlist_url_item_add_to_cart($wishlist->id, $wishlist_item_key, $wishlist->get_wishlist_sharing() == 'Shared' ? $wishlist->get_wishlist_sharing_key() : false ); ?>" class="btn btn-primary btn-sm">Add to Cart</a>
                                        <?php endif; ?>

                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
						<tr><!-- the tds need to be individual for woothemes responsive mode, since they target the first td specifically and hide it. WIth colspan this causes issues once in responsive mode -->
							<td class="product-thumbnail">&nbsp;</td>
							<td class="product-name">&nbsp;</td>
							<td class="product-price">&nbsp;</td>
							<td class="product-quantity">&nbsp;</td>
							<td class="product-purchase"><a href="<?php echo woocommerce_wishlist_url_add_all_to_cart($wishlist->id, $wishlist->get_wishlist_sharing() == 'Shared' ? $wishlist->get_wishlist_sharing_key() : false ); ?>" class="btn btn-primary alt wl-add-all">Add All To Cart</a></td>
						</tr>
                    <?php endif; ?>
                </tbody>
            </table>



        <?php else : ?>
            <?php $shop_url = get_permalink(woocommerce_get_page_id('shop')); ?>
            <div class="woocommerce-info woocommerce_info"> <?php _e('This list currently contains no items.', GETTEXT_DOMAIN); ?> <a href="<?php echo WC_Wishlists_Pages::get_url_for('find-a-list'); ?>"><?php _e('Back to find a list', GETTEXT_DOMAIN); ?></a></div>
            <?php endif; ?>

    </div><!-- /wishlist-wrapper -->
<?php endif; ?>
<?php do_action('woocommerce_wishlists_after_wrapper'); ?>

<?php woocommerce_get_template( 'woocommerce-wishlists/wishlist-email-form.php', array('wishlist' => $wishlist));?>

