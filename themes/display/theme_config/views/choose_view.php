<?php
$nr = (int)$shortcode['nr'];
if(!$nr)
    $nr = count($slides);
?>
<?php if(count($slides)||''!==$shortcode['title']||''!==$shortcode['subtitle']): ?>
<div class="choose-us">
    <?php if(''!==$shortcode['title']): ?>
    <h1><?php echo $shortcode['title']; ?></h1>
    <?php endif; ?>
    <?php if(''!==$shortcode['subtitle']): ?>
    <p><?php echo $shortcode['subtitle']; ?></p>
    <br/>
    <?php endif; ?>
    <?php if(count($slides)): ?>
    <ul>
        <?php foreach($slides as $i => $slide): if($i>=$nr) break; ?>
        <li>
            <h5><?php echo get_the_title($slide['post']->ID); ?></h5>
            <?php echo wpautop($slide['options']['description']); ?>
        </li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>
</div>
<?php endif; ?>