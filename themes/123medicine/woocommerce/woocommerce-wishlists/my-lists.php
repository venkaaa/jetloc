<?php do_action('woocommerce_wishlists_before_wrapper'); ?>
<?php $lists = WC_Wishlists_User::get_wishlists(); ?>
<div id="wl-wrapper" class="woocommerce">

    <?php woocommerce_show_messages(); ?>

    <div class="wl-row">
        <a href="<?php echo WC_Wishlists_Pages::get_url_for('create-a-list'); ?>" class="btn btn-primary wl-create-new"><?php _e('Create a New List', GETTEXT_DOMAIN); ?></a>
    </div>

    <?php if ($lists && count($lists)) : ?>
        <form method="post">

            <?php echo WC_Wishlists_Plugin::nonce_field('edit-lists'); ?>
            <?php echo WC_Wishlists_Plugin::action_field('edit-lists'); ?>
            <?php $lists = WC_Wishlists_User::get_wishlists(); ?>


            <table class="shop_table cart wl-table wl-manage" cellspacing="0">
                <thead>
                    <tr>
                        <th class="product-name"><?php _e('List Name', GETTEXT_DOMAIN); ?></th>
                        <th class="wl-date-added"><?php _e('Date Added', GETTEXT_DOMAIN); ?></th>
                        <th class="wl-privacy-col"><?php _e('Privacy Settings', GETTEXT_DOMAIN); ?></th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($lists as $list) : ?>
                        <?php
                        $sharing = $list->get_wishlist_sharing();
                        ?>

                        <tr class="cart_table_item <?php echo WC_Wishlists_Request_Handler::last_updated_class($list->id); ?>">
                            <td class="product-name">
                                <strong><a href="<?php $list->the_url_edit(); ?>"><?php $list->the_title(); ?></a></strong>
                                <div class="row-actions">
                                    <span class="edit">
                                        <small><a href="<?php $list->the_url_edit(); ?>"><?php _e('Manage this list', GETTEXT_DOMAIN); ?></a></small>
                                    </span>
                                    |
                                    <span class="trash">
                                        <small><a class="ico-delete wlconfirm" data-message="<?php _e('Are you sure you want to delete this list.', GETTEXT_DOMAIN); ?>" href="<?php $list->the_url_delete(); ?>"><?php _e('Delete', GETTEXT_DOMAIN); ?></a></small>
                                    </span>
                                    <?php if ($sharing == 'Public' || $sharing == 'Shared') : ?>
                                        |
                                        <span class="view">
                                            <small><a href="<?php $list->the_url_view(); ?>&preview=true"><?php _e('Preview', GETTEXT_DOMAIN); ?></a></small>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <?php if ($sharing == 'Public' || $sharing == 'Shared') : ?>
                                    <?php woocommerce_get_template( 'woocommerce-wishlists/wishlist-sharing-menu.php', array('id' => $list->id)); ?>
                                <?php endif; ?>
                            </td>
                            <td class="wl-date-added"><?php echo date(get_option('date_format'), strtotime($list->post->post_date)); ?></td>
                            <td class="wl-privacy-col">
                                <select class="wl-priv-sel form-control" name="sharing[<?php echo $list->id; ?>]">
                                    <option <?php selected($sharing, 'Public'); ?> value="Public"><?php _e('Public', GETTEXT_DOMAIN); ?></option>
                                    <option <?php selected($sharing, 'Shared'); ?> value="Shared"><?php _e('Shared', GETTEXT_DOMAIN); ?></option>
                                    <option <?php selected($sharing, 'Private'); ?> value="Private"><?php _e('Private', GETTEXT_DOMAIN); ?></option>
                                </select>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                        <td class="actions">
                            <input type="submit" class="btn btn-primary wl-but" name="update_wishlists" value="<?php _e('Save Changes', GETTEXT_DOMAIN); ?>" />
                        </td>
                    </tr>

                </tbody>
            </table>
        </form>
    <?php else : ?>
        <?php $shop_url = get_permalink(woocommerce_get_page_id('shop')); ?>
        <?php _e('You have not created any lists yet.', GETTEXT_DOMAIN); ?> <a href="<?php echo $shop_url; ?>"><?php _e('Go shopping to create one.', GETTEXT_DOMAIN); ?></a>.
    <?php endif; ?>
    
    <?php
    if ($lists && count($lists)) :
        foreach ($lists as $list) :
            $sharing = $list->get_wishlist_sharing();
            if ($sharing == 'Public' || $sharing == 'Shared') :
                woocommerce_get_template( 'woocommerce-wishlists/wishlist-email-form.php', array('wishlist' => $list));
            endif;
        endforeach;
    endif;
    ?>
</div><!-- /wishlist-wrapper -->
<?php do_action('woocommerce_wishlists_after_wrapper'); ?>