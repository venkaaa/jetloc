<?php

class Displaywp_widget_newsletter extends WP_Widget {

    function __construct() {
        parent::__construct(
                'displaywp_widget_newsletter',
                'Display - Newsletter',
                array(
                    'description' => __('Displays an image with a link', 'displaywp'),
                    'classname' => 'displaywp_widget_newsletter',
                )
        );
    }

    function widget($args, $instance) {
        extract($args);
        $title = $instance['title'];
        $description = $instance['description'];

        echo $before_widget;

        if (!empty($title))
            echo $before_title . $title . '' . $after_title;

        ?>
        <div class="subscription">
            <?php echo wpautop($description); ?>
            <form class="subscription-form" data-tt-subscription method="post" action="#">
                <input type="text" name="email" placeholder="<?php _e('E-mail address','displaywp'); ?>" class="subscription-line" data-tt-subscription-required data-tt-subscription-type="email">
                <input type="submit" value="<?php _e('subscribe','displaywp'); ?>" class="subscription-button">
                <div class="result_container"></div>
            </form>
        </div>
        <?php

        echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = $new_instance['title'];
        $instance['description'] = $new_instance['description'];

        return $instance;
    }

    function form($instance) {
        $instance = wp_parse_args((array) $instance, array('title' => '','description'=>''));
        $title = esc_attr($instance['title']);
        $description = esc_textarea($instance['description']);
        ?>
        <div class="displaywp_widget_newsletter">
            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','displaywp') ?></label>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('description'); ?>"><?php _e('Description:','displaywp') ?></label>
                <textarea class="widefat" id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo $this->get_field_name('description'); ?>" rows="5" cols="20" style="overflow:scroll;resize:vertical;white-space:nowrap;"><?php echo $description; ?></textarea>
            </p>
        </div>
        <?php
    }
}
