<?php 
    $st_javascript = ot_get_option('st_javascript');
?>

</div><!-- END #wrap -->


<?php if ( is_active_sidebar(2)||is_active_sidebar(5) ){?>
<div id="footer">
	<?php get_template_part('includes/footer-meta') ?>
	<?php if ( is_active_sidebar(2)||is_active_sidebar(5) ){?>
	<div class="footer">
		<div class="container">
			<div class="row">
				<?php if ( is_active_sidebar(5) ){?>
					<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer 3 Column') ) ?>
				<?php } else{?>
					<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer') ) ?>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php } ?>
</div>
<?php } ?>

<div id="footer-bottom">
	<div class="container">
		<div class="row">
			<div class="col-xs-6">
				<?php get_template_part('includes/footer-logo' ) ?>
				<?php get_template_part('includes/copyright' ) ?>
			</div>
			<div class="col-xs-6">
				<?php if ( has_nav_menu( 'footer-menu' ) ) { ?>
				<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'menu_class' => 'footer-menu', 'container' => '', 'depth' => 1  ) ); ?>
				<?php } ?>
				<?php get_template_part('includes/payment-method') ?>
			</div>
		</div>
	</div>
</div>

<?php get_template_part('includes/custom_css') ?>
<?php get_template_part('includes/custom_js') ?>

<?php if (is_singular()) {?>
<!-- sharethis buttons -->
	<?php if ($st_javascript) {?>
		<?php echo $st_javascript;?>
	<?php } ?>
<?php } ?>
    
<?php wp_footer(); ?>

</body>
</html>