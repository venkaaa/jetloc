
<?php do_action('woocommerce_email_header', $email_heading); ?>

<p><?php printf(__("Price drop alert from %s. Items below have been reduced in price:", GETTEXT_DOMAIN), get_option('blogname')); ?></p>


<table cellspacing="0" cellpadding="6" style="width: 100%; border: 1px solid #eee;" border="1" bordercolor="#eee">
    <thead>
        <tr>
            <th scope="col" style="text-align:left; border: 1px solid #eee;"><?php _e('Product', GETTEXT_DOMAIN); ?></th>
            <th scope="col" style="text-align:left; border: 1px solid #eee;"><?php _e('Was', GETTEXT_DOMAIN); ?></th>
            <th scope="col" style="text-align:left; border: 1px solid #eee;"><?php _e('Now', GETTEXT_DOMAIN); ?></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php foreach ($changes as $change) : ?>
                <td>
                    <?php echo $change['title']; ?>
                </td>
                <td>
                    <?php echo woocommerce_price($change['old_price']); ?>
                </td>
                <td>
                    <?php echo woocommerce_price($change['new_price']); ?>
                </td>
            <?php endforeach; ?>
        </tr>
    </tbody>
</table>


<?php do_action('woocommerce_email_footer'); ?>