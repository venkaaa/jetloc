<?php if(''!==$shortcode['title']): ?>
<h1><?php echo $shortcode['title']; ?></h1>
<?php endif; ?>
<?php if(count($slides)): ?>
<?php
$nr = (int)$shortcode['nr'];
if(!$nr)
    $nr = count($slides);
?>
<div class="slider" data-tesla-plugin="slider" data-tesla-item=".slide" data-tesla-next=".slide-right" data-tesla-prev=".slide-left" data-tesla-container=".slide-wrapper">
    <div class="slide-arrows">
        <div class="slide-left"></div>
        <div class="slide-right"></div>
    </div>
    <ul class="slide-wrapper">
        <?php foreach($slides as $i => $slide): if($i>=$nr) break; ?>
        <li class="slide">
            <img src="<?php echo $slide['options']['image']; ?>" alt="about" />
        </li>
    <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>