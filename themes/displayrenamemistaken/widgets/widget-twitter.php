<?php

class Displaywp_widget_twitter extends WP_Widget {

    function __construct() {
        parent::__construct(
                'displaywp_widget_twitter',
                'Display - Twitter',
                array(
                    'description' => __('Display latest tweets', 'displaywp'),
                    'classname' => 'displaywp_widget_twitter',
                )
        );
    }

    function widget($args, $instance) {
        extract($args);
        $title = $instance['title'];
        $user = $instance['user'];
        $nr = $instance['nr'];

        echo $before_widget;

        if (!empty($title))
            echo $before_title . $title . $after_title;

        echo twitter_generate_output($user, $nr, '', array($this, 'tweet_output'),'<ul class="twitter_widget">','</ul>');

        echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = $new_instance['title'];
        $instance['user'] = $new_instance['user'];
        $instance['nr'] = (int)$new_instance['nr'];

        return $instance;
    }

    function form($instance) {
        $instance = wp_parse_args((array) $instance, array('title' => '', 'user'=>'teslathemes', 'nr'=>3));
        $title = esc_attr($instance['title']);
        $user = esc_attr($instance['user']);
        $nr = $instance['nr'];
        ?>
        <p>
            <label><?php _e('Title:','displaywp'); ?><input class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label>
        </p>
        <p>
            <label><?php _e('Twitter user:','displaywp'); ?><input class="widefat" name="<?php echo $this->get_field_name('user'); ?>" type="text" value="<?php echo $user; ?>" /></label> 
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('nr'); ?>">
                <?php _e('Number of tweets to show:','displaywp'); ?>
                <input id="<?php echo $this->get_field_id('nr'); ?>" name="<?php echo $this->get_field_name('nr'); ?>" type="text" value="<?php echo $nr; ?>" size="3" />
            </label>
        </p>
        <p>
            <em>Twitter API keys must be set in the theme's options.</em>
        </p>
        <?php
    }

    public function tweet_output($i, $text, $date){
        return '<li>'.$text.'<span>'.$date.'</span></li>';
    }
}
