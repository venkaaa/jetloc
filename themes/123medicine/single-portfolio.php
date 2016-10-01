
<?php $sidebar_checkbox = get_post_meta($post->ID, 'sidebar_checkbox', true);?>
<?php $full_width = get_post_meta($post->ID, 'portfolio_options_full', true);?>

<?php get_header(); ?>

<?php get_template_part('includes/title-breadcrumb' ) ?>

<div id="main" class="inner-page <?php if ($sidebar_checkbox){?>left-sidebar-template<?php }?>">
	<div class="container">
		<div class="row">
			<div class="col-md-12 page-content">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php get_template_part('includes/single-portfolio-post' );?>
            <?php endwhile; else: ?>
                <p><?php _e('Sorry, no posts matched your criteria.', GETTEXT_DOMAIN) ?></p>
            <?php endif; ?>
            </div>
		</div>
	</div>
</div>


        
<?php get_footer(); ?>