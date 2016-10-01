<?php
/*
Template Name: Contact
*/
?>
<?php get_header(); ?>
<!-- =====================================================================
                                 START CONTENT
====================================================================== -->
<?php if(have_posts()): the_post(); ?>
<?php $displaywp_metabox_template_options = displaywp_metabox_template_options_get(get_the_ID()); ?>
<div class="content contact-page">
    <div class="container">

        <?php if(!post_password_required()): ?>

        <div class="location-map">
            <?php tt_gmap('contact_map','contact_map','contact_map'); ?>
        </div>
        <div class="contact-page-content">
            <div class="row">
                <div class="span8">
                    <h1><?php echo $displaywp_metabox_template_options['contact']['contact']['form_title']; ?></h1>
                    <form class="contact-form" id="contact_form">
                        <input name="action" type="hidden" value="displaywp_contact" />
                        <p><?php _ex('Name','contact template','displaywp'); ?></p>
                        <span class="line-limit"><input type="text" name="displaywp-name" class="contact-line" placeholder="<?php _ex('Enter your name','contact template','displaywp'); ?>" /></span>
                        <p><?php _ex('E-mail','contact template','displaywp'); ?></p>
                        <span class="line-limit"><input type="text" name="displaywp-email" class="contact-line" placeholder="<?php _ex('Enter your e-mail address','contact template','displaywp'); ?>" /></span>
                        <p><?php _ex('Website','contact template','displaywp'); ?></p>
                        <span class="line-limit"><input type="text" name="displaywp-website" class="contact-line" placeholder="<?php _ex('Enter website address','contact template','displaywp'); ?>" /></span>
                        <p><?php _ex('Comment','contact template','displaywp'); ?></p>
                        <span class="line-limit"><textarea name="displaywp-message" class="contact-area"></textarea></span>
                        <input type="submit" id="contact_send" value="<?php echo $displaywp_metabox_template_options['contact']['contact']['form_button']; ?>" class="contact-button" />
                    </form>
                </div>
                <div class="span4">
                <h1><?php echo $displaywp_metabox_template_options['contact']['contact']['widget_title']; ?></span></h1>
                    <ul class="contact-info">
                        <?php $phones = _go_repeated('Phone numbers'); ?>
                        <?php foreach($phones as $phone): ?>
                        <li><?php echo $phone['office_phone']; ?></li>
                        <?php endforeach; ?>
                        <li><a href="mailto:<?php echo _go('office_email'); ?>"><?php echo _go('office_email'); ?></a></li>
                        <li><?php echo nl2br(_go('office_address')); ?></li>
                    </ul>
                </div>
            </div>
        </div>

        <?php the_content(); ?>

        <?php else: echo get_the_password_form(); endif; ?>
        
    </div>
</div>
<?php endif; ?>
<!-- =====================================================================
                                 END CONTENT
====================================================================== -->
<?php get_footer(); ?>