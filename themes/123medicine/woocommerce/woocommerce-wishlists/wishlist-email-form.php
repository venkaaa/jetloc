<div class="modal hide" id="share-via-email-<?php echo $wishlist->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display:none;z-index:9999;">
    <div class="modal-header">
        <button type="button" class="close btn btn-sm btn-default" data-dismiss="modal" aria-hidden="true">×</button>
        <h1 id="myModalLabel"><?php _e('Share this list via e-mail ', GETTEXT_DOMAIN); ?></h1>
    </div>
    <div class="modal-body">       
        <form id="share-via-email-<?php echo $wishlist->id; ?>-form" action="" method="POST"> 
            <p class="form-row form-row-wide" class="wishlist_name">
                <label for="wishlist_email_from"><?php _e('Your name:', GETTEXT_DOMAIN); ?></label>
                <input type="text" class="input-text" name="wishlist_email_from" value="<?php echo esc_attr(get_post_meta($wishlist->id, '_wishlist_first_name', true) . ' ' . get_post_meta($wishlist->id, '_wishlist_last_name', true)); ?>" />
            </p>
            <p class="form-row form-row-wide">
                <label for="wishlist_email_to"><?php _e('To:', GETTEXT_DOMAIN); ?></label>
                <textarea class="wl-em-to form-control" name="wishlist_email_to" rows="2" placeholder="<?php _e('Type in e-mail addresses: jo@example.com, jan@example.com.', GETTEXT_DOMAIN); ?>"></textarea>
            </p> 
            <p class="form-row form-row-wide">
                <label for="wishlist_content"><?php _e('Add a note:', GETTEXT_DOMAIN); ?></label>
                <textarea class="wl-em-note form-control" name="wishlist_content" rows="4"></textarea>
            </p>             
            <div class="clear"></div>            
            <input type="hidden" name="wishlist_id" value="<?php echo esc_attr($wishlist->id); ?>" />
            <input type="hidden" name="wishlist-action" value="share-via-email" />
            <?php echo WC_Wishlists_Plugin::nonce_field('share-via-email') ?>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary btn-sm share-via-email-button" data-form="share-via-email-<?php echo $wishlist->id; ?>-form" aria-hidden="true"><?php _e('Send email', GETTEXT_DOMAIN); ?></button>
    </div>
</div>