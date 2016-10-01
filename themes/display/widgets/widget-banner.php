<?php

class Displaywp_widget_banner extends WP_Widget {

    function __construct() {
        parent::__construct(
                'displaywp_widget_banner',
                'Display - Banner',
                array(
                    'description' => __('Displays an image with a link', 'displaywp'),
                    'classname' => 'displaywp_widget_banner',
                )
        );
    }

    function widget($args, $instance) {
        extract($args);
        $title = $instance['title'];
        $image = $instance['image'];
        $url = $instance['url'];
        $target = $instance['target'];

        echo $before_widget;

        if (!empty($title))
            echo $before_title . $title . $after_title;

        if(''!==$url)
            echo '<a href="'.$url.'" '.($target?'target="_blank"':'').'><img src="'.$image.'" /></a>';
        else
            echo '<img src="'.$image.'" />';

        echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = $new_instance['title'];
        $instance['image'] = $new_instance['image'];
        $instance['url'] = $new_instance['url'];
        $instance['target'] = !empty($new_instance['target']);

        return $instance;
    }

    function form($instance) {
        $instance = wp_parse_args((array) $instance, array('title' => '', 'image'=>'', 'url'=>'', 'target'=>true));
        $title = esc_attr($instance['title']);
        $image = esc_attr($instance['image']);
        $url = esc_attr($instance['url']);
        $target = esc_attr($instance['target']);
        ?>
        <div class="displaywp_widget_banner">
            <p>
                <label><?php _e('Title:','displaywp'); ?><input class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label>
            </p>
            <p>
                <label>
                    <?php if(''!==$image): ?>
                        <img src="<?php echo $image; ?>">
                    <?php endif; ?>
                    <input type="button" value="<?php echo ''===$image ? 'Set image' : 'Change image'; ?>" class="button" />
                </label>
                <input type="button" value="Remove image" class="button right"<?php if(''===$image) echo ' style="display: none;"'; ?> />
                <input type="hidden" value="<?php echo $image; ?>" name="<?php echo $this->get_field_name('image'); ?>" />
            </p>
            <p>
                <label><?php _e('URL:','displaywp'); ?><input class="widefat" name="<?php echo $this->get_field_name('url'); ?>" type="text" value="<?php echo $url; ?>" /></label>
            </p>
            <p>
                <label><input name="<?php echo $this->get_field_name('target'); ?>" type="checkbox" <?php checked($target); ?> value="1" /> <?php _e('Open link in a new window/tab','displaywp'); ?></label>
            </p>
        </div>
        <?php
    }
}
