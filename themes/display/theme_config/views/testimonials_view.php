<?php if(count($slides)): ?>
<?php
$nr = (int)$shortcode['nr'];
if(!$nr)
    $nr = count($slides);
?>
<?php if($shortcode['wide']): ?>
</div>
<?php endif; ?>
<div class="testimonial" style="background: <?php echo ''!==$shortcode['background']?"url('".$shortcode['background']."') top center fixed":'none'; ?>;">
	<?php if($shortcode['wide']): ?>
    <div class="container">
	<?php endif; ?>
        <div data-tesla-plugin="slider">
        	<?php foreach($slides as $i => $slide): if($i>=$nr) break; ?>
            <div class="item">
                <div class="testimonial-cover"><img src="<?php echo esc_attr($slide['options']['image']); ?>" alt="testimonial user image" /></div>
                <h1 class="center"><?php echo get_the_title($slide['post']->ID); ?><?php if(''!==$slide['options']['subtitle']): ?><br/> <span><?php echo $slide['options']['subtitle']; ?></span><?php endif; ?></h1>
                <h3 class="center"><?php echo $slide['options']['text']; ?></h3>
            </div>
            <?php endforeach; ?>
        </div>
    <?php if($shortcode['wide']): ?>
    </div>
    <?php endif; ?>
</div>
<?php if($shortcode['wide']): ?>
<div class="container">
<?php endif; ?>
<?php endif; ?>