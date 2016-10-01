<?php get_header(); ?>
<!-- =====================================================================
                                 START CONTENT
====================================================================== -->
<div class="containerbg">
    <div class="wholbg container">
        <div class="inbg-lf-shadow"></div>
        <div class="pagecirclereadmore">
            <div class="bginbackground">
            </div>
                <!--span<?php echo is_active_sidebar('page-sidebar')?8:12; ?>-->
                <?php if(have_posts()): the_post(); $displaywp_metabox_page_options = displaywp_metabox_page_options_get(get_the_ID()); ?>
                <?php if('blog'===$displaywp_metabox_page_options['layout']): ?>
                <div class="all-entrys">
                    <div class="blog-entry">
                        <div class="entry-header">
                            <h1><a href="<?php the_permalink ?>"><?php the_title(); ?></a></h1>
                        </div>
                        <?php echo displaywp_get_featured(); ?>
                        <div class="entry-content">
                            <div class="entry-content-details">
                                <ul>
                                    <li class="details-date"><span><?php _ex('Date:','blog','displaywp'); ?></span> <?php the_time('j M Y'); ?></li>
                                    <li class="details-author"><span><?php _ex('Author:','blog','displaywp'); ?></span> <?php the_author_posts_link(); ?></li>
                                    <li class="details-comments"><span><?php _ex('Comments:','blog','displaywp'); ?></span> <a href="<?php the_permalink(); ?>">(<?php echo get_comments_number(); ?>)</a></li>
                                    <?php the_tags('<li class="details-tags"><span>'.__('Tags:','blog','displaywp').'</span> ',', ',' </li>'); ?>
                                    <?php $get_the_category_list = get_the_category_list(', '); if(''!==$get_the_category_list) echo '<li class="details-categories"><span>'.__('Categories:','blog','displaywp').'</span> '.$get_the_category_list.' </li>'; ?>
                                </ul>
                            </div>
                            <?php the_content(); ?>
                            <?php 
                            wp_link_pages(array(
                                'before'           => '<ul class="page-numbers">',
                                'after'            => '</ul>',
                                'link_before'      => '',
                                'link_after'       => '',
                                'next_or_number'   => 'number',
                                'separator'        => '',
                                'nextpagelink'     => _x( '&rarr;', 'pagination', 'displaywp' ),
                                'previouspagelink' => _x( '&larr;', 'pagination', 'displaywp' ),
                                'pagelink'         => '%',
                                'echo'             => 1
                            ));
                            ?>
                        </div>
                    </div>
                    <?php comments_template(); ?>
                </div>
                <?php else: ?>
                <?php echo displaywp_get_featured(); ?>
                <?php the_content(); ?>
                <?php comments_template(); ?>
                <?php endif; ?>
                <?php endif; ?>
            
            <?php if (is_active_sidebar('page-sidebar')): ?>
            <div class="span4">
                <div class="sidebar">
                    <?php dynamic_sidebar('page-sidebar'); ?>
                </div>
            </div>
            <?php endif; ?>
        </div>

        <div class="inbg-rg-shadow"></div>
    </div>
</div>
<!-- =====================================================================
                                 END CONTENT
====================================================================== -->
<?php get_footer(); ?>