<?php global $wp_query; ?>

<?php do_action('woocommerce_wishlists_before_wrapper'); ?>
<div id="wl-wrapper" class="woocommerce">

    <?php woocommerce_show_messages(); ?>

    <form class="wl-search-form" method="get">
        <label for="f-list">Find Someone's List</label>
        <input type="text" name="f-list" id="f-list" class="find-input form-control" value="<?php echo (isset($_GET['f-list']) ? esc_attr($_GET['f-list']) : ''); ?>"  placeholder="<?php _e('Enter name or email', GETTEXT_DOMAIN); ?>" />
        <input type="submit" class="btn btn-primary" value="Search" />
    </form>
    <hr />

    <?php if (have_posts()) : ?>
        <?php if (isset($_GET['f-list']) && $_GET['f-list']) : ?>
            <p class="wl-results-msg"><?php _e(sprintf("We've found %s lists matching <strong>%s</strong>", $wp_query->found_posts, esc_html($_GET['f-list']))); ?></p> <?php _e(sprintf('<a class="wl-clear-results" href="%s">Clear Results</a>', WC_Wishlists_Pages::get_url_for('find-a-list'))); ?>
        <?php endif; ?>
        <table class="shop_table cart wl-table wl-manage wl-find-table" cellspacing="0">
            <thead>
                <tr>
                    <th class="product-name"><?php _e('List Name', GETTEXT_DOMAIN); ?></th>
                    <th class="wl-pers-name"><?php _e('Name', GETTEXT_DOMAIN); ?></th>
                    <th class="wl-date-added"><?php _e('Date Added', GETTEXT_DOMAIN); ?></th>
                </tr>
            </thead>

            <?php
            while (have_posts()) : the_post();
                $list = new WC_Wishlists_Wishlist(get_the_ID());
                ?>
                <tr>
                    <td><a href="<?php $list->the_url_view(); ?>"><?php $list->the_title(); ?></a></td>
                    <td><?php echo esc_attr(get_post_meta($list->id, '_wishlist_first_name', true)) . ' ' . esc_attr(get_post_meta($list->id, '_wishlist_last_name', true)); ?></td>
                    <td class="wl-date-added"><?php echo date(get_option('date_format'), strtotime($list->post->post_date)); ?></td>
                </tr>
            <?php endwhile; ?>
        </table>

        <?php woocommerce_wishlists_nav('nav-below'); ?>

    <?php elseif (isset($_GET['f-list'])): ?>
        <!-- results go down here -->
        <p><?php _e("We're sorry, we couldn't find a list for that name. Please double check your entry and try again.", GETTEXT_DOMAIN); ?></p>
        <h2 class="wl-search-result"><?php printf('We found %d matching lists', GETTEXT_DOMAIN); ?></h2>
    <?php endif; ?>
</div>
<?php do_action('woocommerce_wishlists_after_wrapper'); ?>