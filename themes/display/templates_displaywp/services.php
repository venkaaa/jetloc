<?php
/*
Template Name: Services
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

        <?php if(!$displaywp_metabox_template_options['services']['services']['disable_section']) echo Tesla_slider::get_slider_html('displaywp_services', array('shortcode_parameters' => $displaywp_metabox_template_options['services']['services'])); ?>
        <?php if(!$displaywp_metabox_template_options['services']['offers']['disable_section']) echo Tesla_slider::get_slider_html('displaywp_offers', array('shortcode_parameters' => $displaywp_metabox_template_options['services']['offers'])); ?>

        <?php if(!$displaywp_metabox_template_options['services']['skills']['disable_section']||!$displaywp_metabox_template_options['services']['choose']['disable_section']): ?>
        <div class="row">
            <?php if(!$displaywp_metabox_template_options['services']['skills']['disable_section']): ?>
            <div class="<?php echo !$displaywp_metabox_template_options['services']['choose']['disable_section']?'span6':'span12'; ?>">
                <?php echo Tesla_slider::get_slider_html('displaywp_skills', array('shortcode_parameters' => $displaywp_metabox_template_options['services']['skills'])); ?>
            </div>
            <?php endif; ?>
            <?php if(!$displaywp_metabox_template_options['services']['choose']['disable_section']): ?>
            <div class="<?php echo !$displaywp_metabox_template_options['services']['skills']['disable_section']?'span6':'span12'; ?>">
                <?php echo Tesla_slider::get_slider_html('displaywp_choose', array('shortcode_parameters' => $displaywp_metabox_template_options['services']['choose'])); ?>
            </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <?php the_content(); ?>

        <?php else: echo get_the_password_form(); endif; ?>
        
    </div>
</div>
<?php endif; ?>
<!-- =====================================================================
                                 END CONTENT
====================================================================== -->
<?php get_footer(); ?>