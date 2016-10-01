<?php if(''!==$shortcode['title']): ?>
<h1><?php echo $shortcode['title']; ?></h1>
<?php endif; ?>
<?php if(''!==$shortcode['subtitle']): ?>
<p><?php echo $shortcode['subtitle']; ?></p>
<br/>
<?php endif; ?>
<?php if(count($slides)): ?>
<?php
global $displaywp_toggle_index;
if(!isset($displaywp_toggle_index))
    $displaywp_toggle_index = 0;
else
    $displaywp_toggle_index++;
$displaywp_toggle_id = '-'.$displaywp_toggle_index;
$nr = (int)$shortcode['nr'];
if(!$nr)
    $nr = count($slides);
?>
<div id="accordion<?php echo $displaywp_toggle_id; ?>" class="accordion">
    <?php foreach($slides as $i => $slide): if($i>=$nr) break; ?>
    <div class="accordion-group">
        <div class="accordion-heading<?php if(!$i) echo ' active'; ?>">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion<?php echo $displaywp_toggle_id; ?>" href="#content_<?php echo $i.$displaywp_toggle_id; ?>">
                <span><?php echo get_the_title($slide['post']->ID); ?></span>
            </a>
        </div>
        <div id="content_<?php echo $i.$displaywp_toggle_id; ?>" class="accordion-body<?php if(!$i) echo ' in'; ?> collapse">
            <div class="accordion-inner">
                <?php echo $slide['options']['description']; ?>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>