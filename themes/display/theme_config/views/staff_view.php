<?php if(count($slides)): ?>
<?php
$size = (int)round(12/(int)$shortcode['columns']);
$columns = (int)floor(12/$size);
$nr = (int)$shortcode['nr'];
if(!$nr)
    $nr = count($slides);
?>
</div>

<div class="staff" style="background-image: <?php echo ''!==$shortcode['background']?"url('".esc_attr($shortcode['background'])."')":'none'; ?>;">
    <div class="container">
        <div class="row">
        <?php foreach($slides as $i => $slide): if($i>=$nr) break; ?>
            <?php if($i&&!($i%$columns)): ?>
        </div>
        <div class="row">
            <?php endif; ?>
            <div class="span<?php echo $size; ?>">
                <div class="staff-category">
                <h1><?php echo $slide['options']['value']; ?>%</h1>
                <h3><?php echo get_the_title($slide['post']->ID); ?></h3>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="container">
<?php endif; ?>