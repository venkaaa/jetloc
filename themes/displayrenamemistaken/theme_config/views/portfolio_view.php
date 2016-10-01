<?php if(''!==$custom['title']||''!==$custom['subtitle']): ?>
<?php if($custom['wide_header']): ?>
</div>
<?php endif; ?>
<div class="breadcrumb-2" style="background: <?php echo ''!==$custom['background']?"url('".$custom['background']."') top center fixed":'none'; ?>;">
    <div class="container">
        <?php if(''!==$custom['title']): ?>
        <h1><?php echo $custom['title']; ?></h1>
        <?php endif; ?>
        <?php if(''!==$custom['subtitle']): ?>
        <p><?php echo $custom['subtitle']; ?></p>
        <?php endif; ?>
    </div>
</div>
<?php if($custom['wide_header']): ?>
<div class="container">
<?php endif; ?>
<?php endif; ?>

<?php
$url = get_permalink();
$size = (int)round(12/(int)$custom['columns']);
$columns = (int)floor(12/$size);
?>
<?php if($custom['wide_filter']): ?>
</div>
<?php endif; ?>

<div class="filter-area">
    <ul class="filter tesla_filters"<?php if($custom['nr']) echo ' data-tesla-plugin="filters"'; ?>>
        <li><a data-category="" class="<?php echo !count($custom['categories'])?'active':''; ?>" href="<?php echo $url; ?>">all</a></li>
        <?php foreach($all_categories as $category_slug => $category_name): ?>
        <?php

        if(!$custom['single_filter']):

        if(in_array($category_slug, $custom['categories'])){

            $categories = array_diff($custom['categories'], array($category_slug));

        }else{

            $categories = $custom['categories'];

            array_push($categories, $category_slug);

        }

        if(count($categories))

            $url_category = add_query_arg('categories',implode('+', $categories),$url);

        else

            $url_category = $url;

        else:

        $url_category = add_query_arg('categories',$category_slug,$url);

        endif;

        ?>
        <li><a data-category="<?php echo $category_slug; ?>" class="<?php echo in_array($category_slug, $custom['categories'])?'active':''; ?>" href="<?php echo $url_category; ?>"><?php echo $category_name; ?></a></li>
        <?php endforeach; ?>
    </ul>
    <div class="bootstrap-3"><!-- bootstrap 3 -->
    <div class="container">
        <div class="row" data-tesla-plugin="masonry">
            <?php foreach($slides as $i => $slide): ?>
            <div class="col-sm-<?php echo $size; ?> col-xs-6 <?php echo implode(' ', array_keys($slide['categories'])); ?>">
                <div class="filter-item">
                    <div class="filter-hidden">
                        <div class="filter-hover">
                            <h5><a href="<?php echo get_permalink($slide['post']->ID); ?>"><?php echo get_the_title($slide['post']->ID); ?></a></h5>
                            <ul>
                                <li><a class="filter-zoom swipebox" href="<?php echo esc_attr($slide['options']['image_big']); ?>"></a></li>
                                <li><a class="filter-link" href="<?php echo get_permalink($slide['post']->ID); ?>"></a></li>
                            </ul>
                        </div>
                        <div class="filter-cover">
                            <img src="<?php echo esc_attr($slide['options']['image_small']); ?>" alt="project">
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    </div><!-- bootstrap 3 -->
</div>

<?php if($custom['wide_filter']): ?>
<div class="container">
<?php endif; ?>

<?php if(''!==$custom['view_all']): ?>
<span class="button-center view-all"><a href="<?php echo esc_attr($custom['view_all']); ?>" class="button-3">view all</a></span>
<?php endif; ?>