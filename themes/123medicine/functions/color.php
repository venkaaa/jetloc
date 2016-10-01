<?php function lpd_color_styles() {?>

<?php require_once(ABSPATH .'/wp-admin/includes/plugin.php');?>

<?php 
	$theme_color = ot_get_option('theme_color');
	$theme_color_2 = ot_get_option('theme_color_2');
	$type_layouts = ot_get_option('type_layouts');
	
	if($theme_color==""){
		$theme_color = "#fba525";
	}
	
	if($theme_color_2==""){
		$theme_color_2 = "#95b558";
	}	
?>

<?php if($theme_color||$theme_color_2){?>
<style>
/* bootstrap */
a {
  color: <?php echo $theme_color;?>;
}
.nav a:hover .caret {
  border-top-color: <?php echo $theme_color;?>;
  border-bottom-color: <?php echo $theme_color;?>;
}
.navbar-nav > li > a:hover{
  color: <?php echo $theme_color;?>;
}
.dropdown-menu > li > a:hover,
.dropdown-menu > li > a:focus {
  background-color: <?php echo $theme_color;?>;
}
.dropdown-menu > .active > a,
.dropdown-menu > .active > a:hover,
.dropdown-menu > .active > a:focus {
  background-color: <?php echo $theme_color;?>;
}
.navbar-toggle .icon-bar{
	background-color: <?php echo $theme_color;?>;
}

.navbar .nav > li > .dropdown-menu:after {
  border-bottom: 10px solid <?php echo $theme_color;?>;
}
.dropdown-menu {
  border: 5px solid <?php echo $theme_color;?>;
}
.btn-primary.disabled, .btn-primary[disabled], fieldset[disabled] .btn-primary, .btn-primary.disabled:hover, .btn-primary[disabled]:hover, fieldset[disabled] .btn-primary:hover, .btn-primary.disabled:focus, .btn-primary[disabled]:focus, fieldset[disabled] .btn-primary:focus, .btn-primary.disabled:active, .btn-primary[disabled]:active, fieldset[disabled] .btn-primary:active, .btn-primary.disabled.active, .btn-primary.active[disabled], fieldset[disabled] .btn-primary.active{
	background-color: <?php echo $theme_color_2;?>;
	border-color: <?php echo $theme_color_2;?>;
}
<?php if($type_layouts=="fixed"){?>
@media (min-width: 768px) {

	.dropdown-menu > li > a:hover,
	.dropdown-menu > li > a:focus {
	  background-color: <?php echo $theme_color;?>;
	}
	.dropdown-menu > .active > a,
	.dropdown-menu > .active > a:hover,
	.dropdown-menu > .active > a:focus {
	  background-color: <?php echo $theme_color;?>;
	}
}
<?php }?>
.btn-primary {
  background-color: <?php echo $theme_color;?>;
  border-color: <?php echo $theme_color;?>;
}
/* application */
.thumb-menu-item a:hover img{
	border-color: <?php echo $theme_color_2;?>;
}
.thumb-menu-item a:hover h5{
	color: <?php echo $theme_color_2;?>;
}
.header-middle a {
  color: <?php echo $theme_color_2;?>;
}
.header-middle .wpml-switcher a:hover,
.left-header li a:hover,
.right-header li a:hover{
  color: <?php echo $theme_color_2;?>
}
.lpd_breadcrumb a,
.lpd_breadcrumb .current{
  color: <?php echo $theme_color_2;?>;
}
<?php if($type_layouts=="fixed"){?>
@media (min-width: 768px) {
	section .dropdown-submenu.active > a,
	section .dropdown-submenu:hover > a{
	  background-color: <?php echo $theme_color;?>;
	}
}
<?php }?>
.dropdown-menu section li a:focus,
.dropdown-menu section li a:hover {
  background-color: <?php echo $theme_color;?>;
}
.view_cart-btn .halflings:before,
.header-search .btn .halflings:before{
	color: <?php echo $theme_color_2;?>;
}
.view_cart-btn,
.header-search .btn{
	border: 1px solid <?php echo $theme_color_2;?>;
}
.view_cart-btn:hover .halflings:before,
.header-search .btn:hover .halflings:before{
	color: <?php echo $theme_color;?>;
}
.view_cart-btn:hover,
.header-search .btn:hover{
	border: 1px solid <?php echo $theme_color;?>;
}
.right-header li a:hover{
	color: <?php echo $theme_color_2;?>;
}
#logo h5{
	color: <?php echo $theme_color;?>;
}
.single-post-meta a:hover .halflings:before,
.blog-post-meta a:hover .halflings:before,
.single-post-meta a:hover,
.blog-post-meta a:hover{
	color: <?php echo $theme_color;?>;
}
#footer-bottom a{
	color: <?php echo $theme_color_2;?>;
}
#footer-bottom .footer-menu li a:hover{
	color: <?php echo $theme_color_2;?>;
}
.widget.widget_pages ul li a:hover:before,
.widget.widget_nav_menu ul li a:hover:before,
.widget.widget_login ul li a:hover:before,
.widget.widget_meta ul li a:hover:before,
.widget.widget_categories ul li a:hover:before,
.widget.widget_archive ul li a:hover:before,
.widget.widget_recent_comments ul li a:hover:before,
.widget.widget_recent_entries ul li a:hover:before,
.widget.widget_rss ul li a:hover,
.widget.widget_pages ul li a:hover,
.widget.widget_nav_menu ul li a:hover,
.widget.widget_login ul li a:hover,
.widget.widget_meta ul li a:hover,
.widget.widget_categories ul li a:hover,
.widget.widget_archive ul li a:hover,
.widget.widget_recent_comments ul li a:hover,
.widget.widget_recent_entries ul li a:hover{
	color: <?php echo $theme_color;?>;
}
.footer .widget.widget_pages ul li a:hover:before,
.footer .widget.widget_nav_menu ul li a:hover:before,
.footer .widget.widget_login ul li a:hover:before,
.footer .widget.widget_meta ul li a:hover:before,
.footer .widget.widget_categories ul li a:hover:before,
.footer .widget.widget_archive ul li a:hover:before,
.footer .widget.widget_recent_comments ul li a:hover:before,
.footer .widget.widget_recent_entries ul li a:hover:before,
.footer .widget.widget_rss ul li a:hover,
.footer .widget.widget_pages ul li a:hover,
.footer .widget.widget_nav_menu ul li a:hover,
.footer .widget.widget_login ul li a:hover,
.footer .widget.widget_meta ul li a:hover,
.footer .widget.widget_categories ul li a:hover,
.footer .widget.widget_archive ul li a:hover,
.footer .widget.widget_recent_comments ul li a:hover,
.footer .widget.widget_recent_entries ul li a:hover{
	color: <?php echo $theme_color_2;?>;
}
.tagcloud a:hover,
.tags a:hover{
	border-color: <?php echo $theme_color;?>;
	background-color: <?php echo $theme_color;?>;
}

.footer .tagcloud a:hover,
.footer .tags a:hover{
	border-color: <?php echo $theme_color_2;?>;
	background-color: <?php echo $theme_color_2;?>;
}
/* Multi Purpose Media Boxes */
.box:hover .box-caption .box-title{
  color: <?php echo $theme_color;?>;
}
.category-navbar li.select a{
  background-color: <?php echo $theme_color;?>;
}
.category-navbar li a:hover{
  background-color: <?php echo $theme_color_2;?>;
}
.hover-lightbox, .hover-url, .hover-iframe{
  background-color: <?php echo $theme_color;?>;
}
/* shoprcodes */
.dropcap{
	background: <?php echo $theme_color;?>;
}
.dropcap1{
	background: <?php echo $theme_color_2;?>;
}
/* elements */
.mega-icon{
	background-color: <?php echo $theme_color;?>; 
}
.mega-icon:hover{
	background-color: <?php echo $theme_color_2;?>; 
}
.lpd-portfolio-item .title a:hover,
.lpd-portfolio-item .portfolio-categories a:hover,
.lpd-portfolio-item .news-meta a:hover,
.lpd-portfolio-item .news-meta a:hover .halflings:before{
	color: <?php echo $theme_color;?>;
}
.lpd-portfolio-item:hover{
    border-color: <?php echo $theme_color_2;?>;
}
.meta-block:hover{
    border-color: <?php echo $theme_color_2;?>;
}
.meta-block:hover .sep-border{
	background: <?php echo $theme_color_2;?>;
}
.iconitem:hover .glyphicons:before{
	color: <?php echo $theme_color;?>;
}
.iconitem:hover .content{
	border-color: <?php echo $theme_color;?>;
}
blockquote:hover{
	color: <?php echo $theme_color_2;?>;
	border-color: <?php echo $theme_color_2;?>;
}
.callout:hover{
	border-color: <?php echo $theme_color_2;?>;
}
.callout:hover .sep-border{
	background: <?php echo $theme_color_2;?>;
}
.vc_lpd_testiomonial:hover .testiomonial_content{
	color: <?php echo $theme_color_2;?>;
	border-color: <?php echo $theme_color_2;?>;
}
.vc_lpd_testiomonial:hover .testiomonial_content:before{
	border-top-color: <?php echo $theme_color_2;?>
}
<?php if (is_plugin_active('woocommerce/woocommerce.php')) {?>
/* woocommerece */
.product-category a:hover{
	border-color: <?php echo $theme_color;?>;
}
ul.lpd-products li.product.product-category:hover .product-category-title{
	background-color: <?php echo $theme_color;?>;
}
.wordpress-123medicine .woocommerce .woocommerce-breadcrumb a:hover,
.wordpress-123medicine.woocommerce-page .woocommerce-breadcrumb a:hover{
	color: <?php echo $theme_color;?>;
}
ul.lpd-products li.product:hover .item-navigation a{
	color: <?php echo $theme_color_2;?>;
}
ul.lpd-products li.product .item-navigation a:hover{
	color: <?php echo $theme_color;?>;
}
ul.lpd-products li.product:hover h3{
	color: <?php echo $theme_color_2;?>;
}
ul.lpd-products li.product:hover .product-item-wrap {
	border: 1px solid <?php echo $theme_color_2;?>;
}
.wordpress-123medicine .woocommerce .star-rating span:before,
.wordpress-123medicine.woocommerce-page .star-rating span:before,
.wordpress-123medicine .woocommerce .star-rating:before,
.wordpress-123medicine.woocommerce-page .star-rating:before{
	color: <?php echo $theme_color;?>;
}
.wordpress-123medicine.woocommerce-page .quantity .plus:hover,
.wordpress-123medicine.woocommerce-page .quantity .minus:hover{
	color: <?php echo $theme_color_2;?>;
    border-color: <?php echo $theme_color_2;?>;
}
.wordpress-123medicine.woocommerce-page div.product form.cart .group_table td.label a:hover{
	color: <?php echo $theme_color;?>;
}
.wordpress-123medicine.woocommerce-page div.product div.images .thumbnails a:hover img{
    border-color: <?php echo $theme_color_2;?>;
}
.wordpress-123medicine.woocommerce-page .woocommerce-tabs #reviews #comments ol.commentlist li:hover img.avatar{
    border-color: <?php echo $theme_color_2;?>;
}
.wordpress-123medicine .woocommerce table.cart a.remove:hover, .wordpress-123medicine.woocommerce-page table.cart a.remove:hover{
	background-color: <?php echo $theme_color_2;?>;
}
.wordpress-123medicine.woocommerce-page form.login:hover, .wordpress-123medicine.woocommerce-page form.checkout_coupon:hover, .wordpress-123medicine.woocommerce-page form.register:hover{
	border-color: <?php echo $theme_color_2;?>;
}
#checkout-accordion .accordion-group:hover{
	border-color: <?php echo $theme_color_2;?>;
}
.wordpress-123medicine .woocommerce ul.cart_list li a:hover,
.wordpress-123medicine.woocommerce-page ul.cart_list li a:hover,
.wordpress-123medicine .woocommerce ul.product_list_widget li a:hover,
.wordpress-123medicine.woocommerce-page ul.product_list_widget li a:hover{
	color: <?php echo $theme_color;?>;
}
.wordpress-123medicine .woocommerce ul.cart_list li a:hover img,
.wordpress-123medicine.woocommerce-page ul.cart_list li a:hover img,
.wordpress-123medicine .woocommerce ul.product_list_widget li a:hover img,
.wordpress-123medicine.woocommerce-page ul.product_list_widget li a:hover img{
	border-color: <?php echo $theme_color;?>;
}
.wordpress-123medicine .footer .woocommerce ul.cart_list li a:hover,
.wordpress-123medicine.woocommerce-page .footer ul.cart_list li a:hover,
.wordpress-123medicine .footer .woocommerce ul.product_list_widget li a:hover,
.wordpress-123medicine.woocommerce-page .footer ul.product_list_widget li a:hover{
	color: <?php echo $theme_color_2;?>;
}
.wordpress-123medicine .footer .woocommerce ul.cart_list li a:hover img,
.wordpress-123medicine.woocommerce-page .footer ul.cart_list li a:hover img,
.wordpress-123medicine .footer .woocommerce ul.product_list_widget li a:hover img,
.wordpress-123medicine.woocommerce-page .footer ul.product_list_widget li a:hover img{
	border-color: <?php echo $theme_color_2;?>;
}
.widget_product_categories ul li a:hover{
	color: <?php echo $theme_color;?>;
}
.woocommerce .widget_layered_nav ul li a:hover,
.woocommerce-page .widget_layered_nav ul li a:hover{
	color: <?php echo $theme_color;?>;
}
.footer .widget_product_categories ul li a:hover{
	color: <?php echo $theme_color_2;?>;
}
.woocommerce .footer .widget_layered_nav ul li a:hover,
.woocommerce-page .footer .widget_layered_nav ul li a:hover{
	color: <?php echo $theme_color_2;?>;
}
<?php }?>
</style>
<?php }?>

<?php }?>
<?php add_action( 'wp_head', 'lpd_color_styles' );?>