<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<?php
	 do_action( 'woocommerce_before_single_product' );
?>

<div itemscope itemtype="http://schema.org/Product" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="row">

	<?php
		do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="col-md-6 product-content">
		
		<div class="shop-navigation clearfix">
		<?php woocommerce_breadcrumb();?>
		<?php woocommerce_get_template( 'loop/rating.php' );?>
		</div>
	
		<?php
			do_action( 'woocommerce_single_product_summary' );
		?>

	</div><!-- .summary -->

	</div>
	
	
	<?php
		do_action( 'woocommerce_after_single_product_summary' );
	?>

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>