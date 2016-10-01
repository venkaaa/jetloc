<?php
/*
Template Name: About us
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

        <div class="about-us-details">
            <div class="row">
                <?php if(has_post_thumbnail()): ?>
                <div class="span5">
                    <?php the_post_thumbnail(); ?>
                </div>
                <?php endif ?>
                <div class="span<?php echo has_post_thumbnail()?7:12; ?>">
                    <?php if(!$displaywp_metabox_template_options['about']['toggle']['disable_section']) echo Tesla_slider::get_slider_html('displaywp_toggle', array('shortcode_parameters' => $displaywp_metabox_template_options['about']['toggle'], 'category' => $displaywp_metabox_template_options['about']['toggle']['category'])); ?>
                </div>
            </div>
        </div>

        <?php if(!$displaywp_metabox_template_options['about']['staff']['disable_section']) echo Tesla_slider::get_slider_html('displaywp_staff', array('shortcode_parameters' => $displaywp_metabox_template_options['about']['staff'])); ?>

        <?php if(!$displaywp_metabox_template_options['about']['secondary']['disable_section']||!$displaywp_metabox_template_options['about']['secondary']['disable_section']): ?>
        <div class="row">
            <?php if(!$displaywp_metabox_template_options['about']['skills']['disable_section']): ?>
            <div class="<?php echo !$displaywp_metabox_template_options['about']['secondary']['disable_section']?'span6':'span12'; ?>">
                <?php echo Tesla_slider::get_slider_html('displaywp_skills', array('shortcode_parameters' => $displaywp_metabox_template_options['about']['skills'])); ?>
            </div>
            <?php endif; ?>
            <?php if(!$displaywp_metabox_template_options['about']['secondary']['disable_section']): ?>
            <div class="<?php echo !$displaywp_metabox_template_options['about']['skills']['disable_section']?'span6':'span12'; ?>">
                <?php echo Tesla_slider::get_slider_html('displaywp_secondary', array('shortcode_parameters' => $displaywp_metabox_template_options['about']['secondary'])); ?>
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