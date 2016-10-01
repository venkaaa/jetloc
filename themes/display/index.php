<?php get_header(); ?>
<!-- =====================================================================
                                 START CONTENT
====================================================================== -->
<!-- <div class="content">
    <div class="container">
        <div class="row">
            <div class="span<?php echo is_active_sidebar('blog-sidebar')?8:12; ?>">
                <div class="all-entrys"> -->
    <div class="breadcrumb">
          <div class="header-content container" style="padding: 0px !important;
          margin: 0px auto !important;
background: transparent none repeat scroll 0% 0%;
border: medium none;">
           <!--  <h1><?php echo $displaywp_title; ?></h1> -->
            <?php echo $displaywp_title_description; ?>
                </div>
            </div> 

 <div class="containerbg">
                <div class="wholbg container">
                <div class="inbg-lf-shadow"></div>
                <div class="pagecirclereadmore" style="min-height: 450px;">
<div class="col-md-12" style="text-align: center;">
            <h2 class="post-title">PAGE Not Found</h2>
            <p>Apologies, but the page you requested could not be found. </p>
                    <?php if(have_posts()): ?>

                    <?php while(have_posts()): the_post(); ?>

                    <div <?php post_class('blog-entry'); ?>>
                        <div class="entry-header">
                            <h1>
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                <?php if(is_sticky()): ?>
                                <span class="displaywp-sticky"><?php _ex('FEATURED','sticky post','displaywp'); ?></span>
                                <?php endif; ?>
                            </h1>
                        </div>
                        <?php if(!(is_search()||is_archive())) echo displaywp_get_featured(); ?>
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
                            <?php if(!(is_search()||is_archive())) the_content(); else the_excerpt(); ?>
                        </div>
                        <div class="entry-footer">
                            <a href="<?php the_permalink(); ?>" class="button-2"><?php _ex('read more','blog','displaywp'); ?></a>
                        </div>
                    </div>

                    <?php endwhile; ?>

                    <?php elseif(is_search()): ?>

                    <div class="displaywp-no-results">
                        <p><?php _ex('No results. Try searching again.','search - no results','displaywp'); ?></p>
                        <?php get_search_form(); ?>
                    </div>

                    <?php endif; ?>

                    <!-- === PAGINATION === -->
                    <?php
                    global $wp_query;
                    $big = 999999999; // need an unlikely integer
                    $total_pages = $wp_query->max_num_pages;
                    if ($total_pages > 1) {
                        $current_page = max(1, get_query_var('paged'));
                        echo paginate_links(array(
                            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                            'format' => '/page/%#%',
                            'current' => $current_page,
                            'total' => $total_pages,
                            'type' => 'list',
                            'next_text' => _x('&rarr;', 'pagination', 'displaywp'),
                            'prev_text' => _x('&larr;', 'pagination', 'displaywp'),
                        ));
                    }
                    ?>
                    <!-- === PAGINATION === -->

                </div>
            </div>
            <?php if (is_active_sidebar('blog-sidebar')): ?>
            
           
            


       

            <!-- <div class="span4">
                <div class="sidebar"> -->


                    <?php //dynamic_sidebar('blog-sidebar'); ?>

                <!-- </div>
            </div> -->
            <?php endif; ?>
            </div>
        </div>
        </div>
</div>
<!-- =====================================================================
                                 END CONTENT
====================================================================== -->
<?php get_footer(); ?>