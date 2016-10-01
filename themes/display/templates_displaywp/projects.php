<?php
/*
Template Name: Portfolio
*/
?>
<?php get_header(); ?>
<!-- =====================================================================
                                 START CONTENT
====================================================================== -->
<?php if(have_posts()): the_post(); ?>
<?php $displaywp_metabox_template_options = displaywp_metabox_template_options_get(get_the_ID()); ?>
<div class="content">
    <div class="container">

    	<?php if(!post_password_required()): ?>

        <?php if(!$displaywp_metabox_template_options['project']['project']['disable_section']) echo displaywp_portfolio($displaywp_metabox_template_options['project']['project']); ?>

        <?php the_content(); ?>

        <?php else: echo get_the_password_form(); endif; ?>

    </div>
</div>
<?php endif; ?>
<!-- =====================================================================
                                 END CONTENT
====================================================================== -->
<?php get_footer(); ?>