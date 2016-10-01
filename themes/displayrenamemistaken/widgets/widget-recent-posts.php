<?php

class Displaywp_widget_recent_posts extends WP_Widget {

    function __construct() {
        parent::__construct(
                'displaywp_widget_recent_posts',
                'Display - Recent Posts',
                array(
                    'description' => __('Display a list of recent posts', 'displaywp'),
                    'classname' => 'displaywp_widget_recent_posts',
                )
        );
    }

    function widget($args, $instance) {

        extract($args);
        $title = $instance['title'];
        $nr = $instance['nr'];
        $category = $instance['category'];

        echo $before_widget;

        if (!empty($title))
            echo $before_title . $title . $after_title;

        $args = array(
            'numberposts' => $nr,
            'orderby' => 'post_date',
            'order' => 'DESC',
            'post_type' => 'post',
            'post_status' => 'publish',
        );

        if(''!==$category)
            $args['category'] = $category;

        $query = get_posts($args);

        if(count($query)):
            foreach($query as $q):
                setup_postdata($q);
        ?>
            <div class="recent-post<?php if(!has_post_thumbnail($q->ID)) echo ' no_image'; ?>">
                <?php if(has_post_thumbnail($q->ID)): ?>
                <div class="recent-post-cover">
                    <a href="<?php echo get_permalink($q->ID); ?>"><?php echo get_the_post_thumbnail($q->ID); ?></a>
                </div>
                <?php endif; ?>
                <h4><a href="<?php echo get_permalink($q->ID); ?>"><?php echo get_the_title($q->ID); ?></a></h4>
                <div class="recent-post-date"><?php echo get_the_time('j M', $q->ID); ?></div> 
            </div>
        <?php
            endforeach;
        else:
            echo '<p>'.__('No posts.','displaywp').'</p>';
        endif;
        wp_reset_postdata();

        echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = $new_instance['title'];
        $instance['nr'] = (int)strip_tags($new_instance['nr']);
        $instance['category'] = $new_instance['category'];

        return $instance;
    }

    function form($instance) {
        $instance = wp_parse_args((array) $instance, array('title' => '', 'nr' => 3, 'category' => ''));
        $title = esc_attr($instance['title']);
        $nr = esc_attr($instance['nr']);
        $category = $instance['category'];
        $categories_all = get_categories(array('hide_empty'=>0));
        ?>
        <p>
            <label><?php _e('Title:','displaywp'); ?><input class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label>
        </p>
        <p>
            Select a cetegory to take the posts from. <em>(optional)</em>
        </p>
        <p>
            <?php $this->displaywp_option(array('cats'=>$categories_all,'value'=>$category,'disabled'=>false)); ?>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('nr'); ?>"><?php _e('Max. nr of posts:','displaywp'); ?></label>
            <input id="<?php echo $this->get_field_id('nr'); ?>" name="<?php echo $this->get_field_name('nr'); ?>" type="text" value="<?php echo $nr; ?>" size="3" />
        </p>
        <?php
    }

    private function displaywp_option($args){
        ?>
        <select class="widefat" name="<?php echo $this->get_field_name('category'); ?>" <?php disabled($args['disabled']); ?>>
            <?php
            echo '<option value=""> - No category - </option>';
            foreach ($args['cats'] as $c) {
                $option = '<option value="' . $c->cat_ID . '"' . selected($args['value'], $c->cat_ID, false) . '>';
                $option .= $c->cat_name.' ('.$c->count.')';
                $option .= '</option>';
                echo $option;
            }
            ?>
        </select>
        <?php
    }
}
