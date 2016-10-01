<?php 
    $custom_logo = ot_get_option('custom_logo');
    $logo_tagline = ot_get_option('logo_tagline');
?>

<div class="col-md-4">
	<?php if($custom_logo){?>
	<div id="logo" class="img">
	    <h1><a href="<?php echo home_url(); ?>"><img alt="<?php bloginfo( 'name' ); ?>" src="<?php echo $custom_logo?>"/></a></h1>
	</div>
	<?php }else{?>
	<div id="logo">
	    <h1><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
        <?php if(!$logo_tagline){?>
            <?php if($blog_title = get_bloginfo('description')){?>
            <h5><?php echo $blog_title; ?></h5>
            <?php }?>
        <?php }?>
	</div>
	<?php }?>
</div>