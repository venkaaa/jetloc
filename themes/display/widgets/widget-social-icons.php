<?php

class Displaywp_widget_social_icons extends WP_Widget {

    function __construct() {
        parent::__construct(
                'displaywp_widget_social_icons',
                'Display - Social Icons',
                array(
                    'description' => __('Displays an image with a link', 'displaywp'),
                    'classname' => 'displaywp_widget_social_icons',
                )
        );
    }

    function widget($args, $instance) {
        extract($args);
        $title = $instance['title'];

        echo $before_widget;

        if (!empty($title))
            echo $before_title . $title . $after_title;

        $displaywp_social = array(
            'facebook'=>_go('social_platforms_facebook'),
            'twitter'=>_go('social_platforms_twitter'),
            'linkedin'=>_go('social_platforms_linkedin'),
            'rss'=>_go('social_platforms_rss'),
            'pinterest'=>_go('social_platforms_pinterest'),
            'youtube'=>_go('social_platforms_youtube'),
            'flickr'=>_go('social_platforms_flickr'),
            'behance'=>_go('social_platforms_behance'),
            'dribbble'=>_go('social_platforms_dribbble'),
            'googleplus'=>_go('social_platforms_google')
        );
        $displaywp_social_filtered = array_filter($displaywp_social);
        if(!empty($displaywp_social_filtered)):
        ?>
        <ul class="socials">
            <?php foreach($displaywp_social_filtered as $displaywp_social_key => $displaywp_social_value): ?>
            <li><a href="<?php echo $displaywp_social_value; ?>"><img src="<?php echo tesla_locate_uri('images/socials/'.$displaywp_social_key.'.png'); ?>" alt="<?php echo $displaywp_social_key; ?>" /></a></li>
            <?php endforeach; ?>
        </ul>
        <?php
        endif;

        echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = $new_instance['title'];

        return $instance;
    }

    function form($instance) {
        $instance = wp_parse_args((array) $instance, array('title' => ''));
        $title = esc_attr($instance['title']);
        ?>
        <div class="displaywp_widget_social_icons">
            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','displaywp') ?></label>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />
            </p>
            <p>
                Configure the icons on Dashboard > Display > Social Icons.
            </p>
        </div>
        <?php
    }
}
