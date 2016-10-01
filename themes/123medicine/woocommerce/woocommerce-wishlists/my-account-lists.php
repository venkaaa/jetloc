<?php do_action('woocommerce_wishlists_before_wrapper'); ?>
<div id="wl-wrapper" class="woocommerce">
    <h2><?php echo apply_filters( 'woocommerce_my_account_my_wishlists_title', __( 'Wishlists', GETTEXT_DOMAIN ) ); ?></h2>
    <table class="shop_table cart wl-table wl-manage" cellspacing="0">
        <thead>
            <tr>
                <th class="product-name"><?php _e('List Name', GETTEXT_DOMAIN); ?></th>
                <th class="wl-date-added"><?php _e('Date Added', GETTEXT_DOMAIN); ?></th>
                <th class="wl-privacy-col"><?php _e('Privacy Settings', GETTEXT_DOMAIN); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php $lists = WC_Wishlists_User::get_wishlists(); ?>
            <?php if ($lists && count($lists)) : ?>
                <?php foreach ($lists as $list) : ?>
                    <?php $sharing = $list->get_wishlist_sharing(); ?>
                    <tr class="cart_table_item <?php echo WC_Wishlists_Request_Handler::last_updated_class($list->id); ?>">
                        <td class="product-name">
                            <a href="<?php $list->the_url_edit(); ?>"><?php $list->the_title(); ?></a>
                            <div class="row-actions"></div>
                            <?php if ($sharing == 'Public' || $sharing == 'Shared') : ?>
                                <?php woocommerce_get_template( 'woocommerce-wishlists/wishlist-sharing-menu.php', array('id' => $list->id)); ?>
                            <?php endif; ?>
                        </td>
                        <td class="wl-date-added"><?php echo date(get_option('date_format'), strtotime($list->post->post_date)); ?></td>
                        <td class="wl-privacy-col">
                            <?php echo $list->get_wishlist_sharing(); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr>

                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div><!-- /wishlist-wrapper -->
<?php do_action('woocommerce_wishlists_after_wrapper'); ?>
