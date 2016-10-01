<?php
$nr = (int)$shortcode['nr'];
if(!$nr)
    $nr = count($slides);
?>
<?php if(''!==$shortcode['title']): ?>
<h1><?php echo $shortcode['title']; ?></h1>
<?php endif; ?>
<?php if(''!==$shortcode['subtitle']): ?>
<h3><?php echo $shortcode['subtitle']; ?></h3>
<br/>
<?php endif; ?>
<?php foreach($slides as $i => $slide): if($i>=$nr) break; ?>
<div class="skill">
    <h1><?php echo get_the_title($slide['post']->ID); ?></h1>
    <div class="skill-line">
        <span style="width: <?php echo $slide['options']['value']; ?>%;"></span>
    </div>
    <div class="skill-procent"><?php echo $slide['options']['value']; ?>%</div>
</div>
<?php endforeach; ?>