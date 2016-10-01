
<?php get_header(); ?>

<?php get_template_part('includes/title-breadcrumb' ) ?>
<div id="main" class="inner-page">
	<div class="container">
		<div class="row">
			<div class="col-md-9 page-content">
			
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php get_template_part('includes/single-post' );?>
						<?php comments_template('', true); ?>
                    <?php endwhile; else: ?>
                        <p><?php _e('Sorry, no posts matched your criteria.', GETTEXT_DOMAIN) ?></p>
                    <?php endif; ?>
				
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
        
<?php get_footer(); ?>