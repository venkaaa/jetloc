<?php if(''!==$shortcode['title']||''!==$shortcode['subtitle']): ?>
<?php if($shortcode['wide_header']): ?>
</div>
<?php endif; ?>
<div class="breadcrumb-2" style="background: <?php echo ''!==$shortcode['background']?"url('".$shortcode['background']."') top center fixed":'none'; ?>;">
    <div class="container">
        <?php if(''!==$shortcode['title']): ?>
        <h1><?php echo $shortcode['title']; ?></h1>
        <?php endif; ?>
        <?php if(''!==$shortcode['subtitle']): ?>
        <p><?php echo $shortcode['subtitle']; ?></p>
        <?php endif; ?>
    </div>
</div>
<?php if($shortcode['wide_header']): ?>
<div class="container">
<?php endif; ?>
<?php endif; ?>
<?php if(count($slides)): ?>
<?php
$size = (int)round(12/(int)$shortcode['columns']);
$columns = (int)floor(12/$size);
$nr = (int)$shortcode['nr'];
if(!$nr)
    $nr = count($slides);
?>
<div class="bootstrap-3"><!-- bootstrap 3 -->
<div class="row">
<?php foreach($slides as $i => $slide): if($i>=$nr) break; ?>
    <?php if($i&&!($i%$columns)): ?>
</div>
<div class="row">
    <?php endif; ?>
    <div class="col-sm-<?php echo $size; ?> col-xs-12">
        <div class="service-box">
            <div class="service-icon">
                <img src="<?php echo $slide['options']['image']; ?>" alt="service image">
            </div>
            <h5>
                <?php if(''!==$slide['options']['url']): ?>
                <a href="<?php echo $slide['options']['url']; ?>">
                    <?php echo get_the_title($slide['post']->ID); ?>
                </a>
                <?php else: ?>
                <?php echo get_the_title($slide['post']->ID); ?>
                <?php endif; ?>
                
            </h5>
            <?php echo wpautop($slide['options']['description']); ?>
        </div>
    </div>
<?php endforeach; ?>
</div>
</div><!-- bootstrap 3 -->
<?php endif; ?>
<?php if(''!==$shortcode['view_all']): ?>
<span class="button-center view-all"><a href="<?php echo esc_attr($shortcode['view_all']); ?>" class="button-3"><?php echo $shortcode['view_all_text']; ?></a></span>
<?php endif; ?>