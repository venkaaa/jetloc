<?php
/*
Template Name: Home
*/
?>
<?php get_header(); ?>
<?php if(have_posts()): the_post(); ?>

<?php if(!post_password_required()): ?>

<?php $displaywp_metabox_template_options = displaywp_metabox_template_options_get(get_the_ID()); ?>
<?php if($displaywp_metabox_template_options['home']['rev_slider']['enabled']): ?>
<?php if(function_exists('putRevSlider')): ?>
<?php if(!$displaywp_metabox_template_options['home']['rev_slider']['disable_section']) putRevSlider($displaywp_metabox_template_options['home']['rev_slider']['slug']); ?>
<?php endif; ?>
<?php else: ?>
<?php if(!$displaywp_metabox_template_options['home']['main']['disable_section']) echo Tesla_slider::get_slider_html('displaywp_main', array('shortcode_parameters' => $displaywp_metabox_template_options['home']['main'])); ?>
<?php endif; ?>

<?php else: echo get_the_password_form(); endif; ?>

<!-- =====================================================================
                                 START CONTENT
====================================================================== -->
<div class="content">
    <div class="container">

        <?php if(!post_password_required()): ?>

        <?php if(!$displaywp_metabox_template_options['home']['services']['disable_section']) echo Tesla_slider::get_slider_html('displaywp_services', array('shortcode_parameters' => $displaywp_metabox_template_options['home']['services'])); ?>
        <?php if(!$displaywp_metabox_template_options['home']['team']['disable_section']) echo Tesla_slider::get_slider_html('displaywp_team', array('shortcode_parameters' => $displaywp_metabox_template_options['home']['team'])); ?>
        <?php if(!$displaywp_metabox_template_options['home']['project']['disable_section']) echo displaywp_portfolio($displaywp_metabox_template_options['home']['project']); ?>
        <?php if(!$displaywp_metabox_template_options['home']['hot_offer']['disable_section']) echo displaywp_hot_offer($displaywp_metabox_template_options['home']['hot_offer']); ?>

        <?php if(!$displaywp_metabox_template_options['home']['toggle']['disable_section']||!$displaywp_metabox_template_options['home']['recent_posts']['disable_section']): ?>
        <div class="row">
            <?php if(!$displaywp_metabox_template_options['home']['toggle']['disable_section']): ?>
            <div class="<?php echo !$displaywp_metabox_template_options['home']['recent_posts']['disable_section']?'span6':'span12'; ?>">
                <?php echo Tesla_slider::get_slider_html('displaywp_toggle', array('shortcode_parameters' => $displaywp_metabox_template_options['home']['toggle'], 'category' => $displaywp_metabox_template_options['home']['toggle']['category'])); ?>
            </div>
            <?php endif; ?>
            <?php if(!$displaywp_metabox_template_options['home']['recent_posts']['disable_section']): ?>
            <div class="<?php echo !$displaywp_metabox_template_options['home']['toggle']['disable_section']?'span5 offset1':'span12'; ?>">
                <?php echo displaywp_posts_latest($displaywp_metabox_template_options['home']['recent_posts']); ?>
            </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <?php if(!$displaywp_metabox_template_options['home']['testimonials']['disable_section']) echo Tesla_slider::get_slider_html('displaywp_tstmnls', array('shortcode_parameters' => $displaywp_metabox_template_options['home']['testimonials'])); ?>
        <?php if(!$displaywp_metabox_template_options['home']['clients']['disable_section']) echo Tesla_slider::get_slider_html('displaywp_clients', array('shortcode_parameters' => $displaywp_metabox_template_options['home']['clients'])); ?>
        <?php if(!$displaywp_metabox_template_options['home']['contact']['disable_section']) echo displaywp_contact($displaywp_metabox_template_options['home']['contact']); ?>

        <?php the_content(); ?>

        <?php else: echo get_the_password_form(); endif; ?>
        
    </div>
</div>
<!-- =====================================================================
                                 END CONTENT
====================================================================== -->
<?php endif; ?>
<?php get_footer(); ?>