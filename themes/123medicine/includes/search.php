<?php

$left_headermeta = ot_get_option('left_headermeta');
$header_search = ot_get_option('header_search');
$header_search_type = ot_get_option('header_search_type');
$h_sm_locations = ot_get_option('h_sm_locations');

?>

<div class="col-md-4">
	<div class="header-left <?php if($header_search&&$left_headermeta){ ?>margin-lh-search<?php } 
	elseif($header_search&&has_nav_menu( 'left-hm-menu' )){ ?>margin-lh-search<?php } 
	elseif($h_sm_locations=="left_h"&&$left_headermeta){ ?>margin-lh-search<?php } 
	elseif($h_sm_locations=="left_h"&&has_nav_menu( 'left-hm-menu' )){ ?>margin-lh-search<?php } 
	elseif($left_headermeta||has_nav_menu( 'left-hm-menu' )){ ?>margin-lh<?php } 
	elseif($header_search){ ?>margin-search<?php }?>">
		
		<?php if($left_headermeta){ ?>
			<div class="header-lh"><?php echo $left_headermeta; ?></div>
		<?php }else{?>
			<?php if (has_nav_menu( 'left-hm-menu' )) { ?>
			<?php wp_nav_menu( array( 'theme_location' => 'left-hm-menu', 'menu_class' => 'left-header', 'container' => '', 'depth' => 1  ) ); ?>
			<?php } ?>
		<?php }?>

<?php if ($h_sm_locations=="left_h"){?>

	<div class="social-header"><?php get_template_part('includes/header-social-media' ) ?></div>

<?php } else{?>
		
	<?php if ($header_search!="none"){?>
	<div class="header-search">
	
		<?php if($header_search == "shop_search"){ ?>
			<form role="form" method="get" class="form-inline" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
				<input type="hidden" name="post_type" value="product" />
			    <input type="input" class="form-control" id="s" name="s" placeholder="<?php _e( 'Search For Products', GETTEXT_DOMAIN ); ?>">
				<button type="submit" class="btn"><span class="halflings search halflings-icon"></span></button>
			</form>
		<?php } elseif($header_search == "theme_search"){?>
			<form role="form" method="get" class="form-inline" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
			    <input type="input" class="form-control" id="s" name="s" placeholder="<?php _e( 'Search Site', GETTEXT_DOMAIN ); ?>">
				<button type="submit" class="btn"><span class="halflings search halflings-icon"></span></button>
			</form>
		<?php }?>
			
	</div>
	<?php }	?>

<?php }	?>
		
	</div>
</div>
