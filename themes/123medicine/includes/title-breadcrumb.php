<div id="title-breadcrumb">
	<div class="container">
		<div class="row">
			<div class="col-md-12"><div class="sep-border-light"></div></div>
		</div>
		<div class="row">
			<div class="col-md-6"><h2><?php echo lpd_title();?></h2></div>
			<div class="col-md-6 hidden-sm hidden-xs">
			<?php if (is_plugin_active('woocommerce/woocommerce.php')) {?>
				<?php if(is_shop()){?>
					<?php if(get_option( 'woocommerce_shop_page_display' ) == 'subcategories'){?>
						<div class="lpd_breadcrumb"><?php echo woocommerce_page_breadcrumb();?></div>
					<?php } else{?>
						<div class="lpd_shop_catalog clearfix"><?php echo woocommerce_catalog_ordering();?>
						<?php echo woocommerce_result_count();?></div>
					<?php }?>
				<?php } else if (is_tax('product_cat')||is_tax('product_tag') ) {?>
					<div class="lpd_breadcrumb"><?php _e('You Are Here', GETTEXT_DOMAIN); ?>: <?php echo lpd_breadcrumb()?></div>
				<?php } else{?>
					<div class="lpd_breadcrumb"><?php _e('You Are Here', GETTEXT_DOMAIN); ?>: <?php echo lpd_breadcrumb()?></div>
				<?php }?>
			<?php }else{?>
				<div class="lpd_breadcrumb"><?php _e('You Are Here', GETTEXT_DOMAIN); ?>: <?php echo lpd_breadcrumb()?></div>
			<?php }?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12"><div class="sep-border"></div></div>
		</div>

	</div>
</div>