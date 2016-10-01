<?php $slide = $slides[0]; ?>
<div class="filter-area">
    <div class="container">
        <div class="project">
            <div class="row">
                <?php if(has_post_thumbnail($slide['post']->ID)): ?>
                <div class="span7">
                    <div class="project-cover">
                        <?php echo get_the_post_thumbnail($slide['post']->ID); ?>
                    </div>    
                </div>
                <?php endif; ?>

                <div class="span<?php echo has_post_thumbnail($slide['post']->ID)?5:12; ?>">
                    <div class="project-details">
                        <ul class="project-selection">
                            <?php previous_post_link('<li>%link</li>',_x('prev','single project page','displaywp')); ?>
                            <?php next_post_link('<li>%link</li>',_x('next','single project page','displaywp')); ?>
                        </ul>
                        <h1><?php echo get_the_title($slide['post']->ID); ?></h1>
                        <ul class="project-info">
                            <li><span><?php echo $slide['options']['author']; ?></span><?php _ex('Author','single project page','displaywp'); ?></li>
                            <li><span><?php echo get_the_time('d.m.Y',$slide['post']->ID); ?></span><?php _ex('Date','single project page','displaywp'); ?></li>
                            <li><span><?php echo implode(', ', $slide['categories']); ?></span><?php echo _nx('Category','Categories',count($slide['categories']),'single project page','displaywp'); ?></li>
                        </ul>
                        <?php echo apply_filters('the_content', $slide['post']->post_content); ?>
                        <br/>
                        <div class="share-it">
                        <span><?php _ex('Share','single project page','displaywp'); ?></span>
                            <ul>
                                <li><span class="st_facebook"></span></li>
                                <li><span class="st_twitter"></span></li>
                                <li><span class="st_googleplus"></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if($slide['related']): ?>
        <h1 class="center"><?php _ex('<span>Related</span> projects','single project page','displaywp'); ?></h1>
        <br/>
        <div class="row" data-tesla-plugin="masonry">
            <?php foreach($slide['related'] as $related): ?>
            <div class="span4 nature">
                <div class="filter-item">
                    <div class="filter-hidden">
                        <div class="filter-hover">
                            <h5><a href="<?php echo get_permalink($related['post']->ID); ?>"><?php echo get_the_title($related['post']->ID); ?></a></h5>
                            <ul>
                                <li><a class="filter-zoom swipebox" href="<?php echo esc_attr($related['options']['image_big']); ?>"></a></li>
                                <li><a class="filter-link" href="<?php echo get_permalink($related['post']->ID); ?>"></a></li>
                            </ul>
                        </div>
                        <div class="filter-cover">
                            <img src="<?php echo esc_attr($related['options']['image_small']); ?>" alt="project">
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</div>