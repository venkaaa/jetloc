<?php
$shop_columns = ot_get_option('shop_columns');

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )

	if(!$shop_columns)
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
	else
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', $shop_columns );

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ($woocommerce_loop['columns'] == "2"){
	$classes[] = 'col-md-6';
} elseif ($woocommerce_loop['columns'] == "3"){
	$classes[] = 'col-md-4';	
} elseif ($woocommerce_loop['columns'] == "4"){
	$classes[] = 'col-md-3';	
} else{
	$classes[] = 'col-md-3';	
}
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last';
?>
<li <?php post_class( $classes ); ?>>

	<div class="product-item-wrap">

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

		<?php
			do_action( 'woocommerce_before_shop_loop_item_title' );
		?>
		
		
		<h3><?php the_title(); ?></h3>
		<div class="item-details clearfix">
			<?php woocommerce_get_template( 'loop/price.php' );?>
			<div class="item-navigation <?php if ( $product->is_in_stock() && ! in_array( $product->product_type, array( 'external', 'grouped', 'variable' ) ) ) : ?>nav_in_stock<?php endif; ?>">
				<?php woocommerce_get_template( 'loop/add-to-cart.php' );?>
				<?php if ( $product->is_in_stock() && ! in_array( $product->product_type, array( 'external', 'grouped', 'variable'  ) ) ) : ?>
				<a href="<?php echo get_permalink( $product->id ); ?>" class=""><?php _e( '+ Read More', GETTEXT_DOMAIN ) ; ?></a>
				<?php endif; ?>
			</div>
		</div>

		<?php
			do_action( 'woocommerce_after_shop_loop_item_title' );
		?>

	<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
	
	</div>

</li>