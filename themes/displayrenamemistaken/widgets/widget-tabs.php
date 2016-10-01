<?php

class Displaywp_widget_tabs extends WP_Widget {

    function __construct() {
        parent::__construct(
                'displaywp_widget_tabs',
                'Display - Tabs',
                array(
                    'description' => __('Tabs with the latest post from specified categories', 'displaywp'),
                    'classname' => 'displaywp_widget_tabs tabs',
                )
        );
    }

    function widget($args, $instance) {

        extract($args);
        $title = $instance['title'];
        $nr = $instance['nr'];
        $categories = $instance['categories'];

        foreach ($categories as $key => $value) {
            if(!empty($value))
                $categories[$key] = get_category($value);
            else
                unset($categories[$key]);
        }

        echo $before_widget;

        if (!empty($title))
            echo $before_title . $title . $after_title;

        if(count($categories)):
        ?>
            <ul class="tab_nav">
                <?php
                $first = true;
                foreach ($categories as $key => $value) {
                    echo '<li'.($first?' class="active"':'').'><a href="#'.$this->get_field_id($value->term_id).'" data-toggle="tab">'.$value->name.'</a></li>';
                    if($first)
                        $first = false;
                }
                ?>
            </ul>
            <div class="clear"></div>
            <div class="tab-content">
                <?php
                $first = true;
                foreach ($categories as $key => $value) {
                    echo '<div class="tab-pane'.($first?' active':'').'" id="'.$this->get_field_id($value->term_id).'">';
                    $args = array(
                        'numberposts' => $nr,
                        'category' => $value->term_id,
                        'orderby' => 'post_date',
                        'order' => 'DESC',
                        'post_type' => 'post',
                        'post_status' => 'publish',
                    );
                    $query = get_posts($args);
                    if(count($query))
                        foreach($query as $q){
                            setup_postdata($q);
                            echo '<div class="row-fluid">';
                            if(has_post_thumbnail($q->ID))
                                echo '<div class="span4">
                                        <div class="tab-cover"><a href="'.get_permalink($q->ID).'">'.get_the_post_thumbnail($q->ID).'</a></div>
                                    </div>';
                            echo '<div class="span'.(has_post_thumbnail($q->ID)?'8':'12').'">
                                    <h4><a href="'.get_permalink($q->ID).'">'.get_the_title($q->ID).'</a></h4>
                                    <div class="tab-date">'.get_the_time('j M', $q->ID).'</div>
                                    </div>';
                            echo '</div>';
                        }
                    else
                        echo '<p>'.__('No posts.','displaywp').'</p>';
                    echo '</div>';
                    if($first)
                        $first = false;
                }
                wp_reset_postdata();
                ?>
            </div>
        <?php
        endif;
        echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = $new_instance['title'];
        $instance['nr'] = (int)strip_tags($new_instance['nr']);
        $instance['categories'] = $new_instance['categories'];

        return $instance;
    }

    function form($instance) {
        $instance = wp_parse_args((array) $instance, array('title' => '', 'nr' => 3, 'categories' => array('')));
        $title = esc_attr($instance['title']);
        $nr = esc_attr($instance['nr']);
        $categories = (array)$instance['categories'];
        if(!count($categories))
            $categories = array('');
        $categories_all = get_categories(array('hide_empty'=>0));
        ?>
        <p>
            <label><?php _e('Title:','displaywp'); ?><input class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label>
        </p>
        <p>
            Select a category for each tab.
        </p>
        <div class="displaywp_widget_tabs">
            <?php foreach ($categories as $value): ?>
                <p>
                    <?php $this->displaywp_option(array('cats'=>$categories_all,'value'=>$value,'disabled'=>false)); ?>
                </p>
            <?php endforeach; ?>
            <p>
                <?php $this->displaywp_option(array('cats'=>$categories_all,'value'=>'','disabled'=>true)); ?>
            </p>
        </div>
        <p>
            <label for="<?php echo $this->get_field_id('nr'); ?>"><?php _e('Max. nr of posts:','displaywp'); ?></label>
            <input id="<?php echo $this->get_field_id('nr'); ?>" name="<?php echo $this->get_field_name('nr'); ?>" type="text" value="<?php echo $nr; ?>" size="3" />
        </p>
        <?php
    }

    private function displaywp_option($args){
        ?>
        <select class="widefat" name="<?php echo $this->get_field_name('categories'); ?>[]" <?php disabled($args['disabled']); ?>>
            <?php
            echo '<option value=""> - Select a category - </option>';
            foreach ($args['cats'] as $c) {
                $option = '<option value="' . $c->cat_ID . '"' . selected($args['value'], $c->cat_ID, false) . '>';
                $option .= $c->cat_name.' ('.$c->count.')';
                $option .= '</option>';
                echo $option;
            }
            ?>
        </select>
        <input type="button" class="button" value="+" />
        <input type="button" class="button" value="-" />
        <?php
    }
}
