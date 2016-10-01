<?php
$nr = (int)$shortcode['nr'];
if(!$nr)
    $nr = count($slides);
?>
<?php if(count($slides)||''!==$shortcode['title']): ?>
</div>

<div class="offer-box">
    <div class="container">
        <div class="row">
            <?php if(''!==$shortcode['title']): ?>
            <div class="span4">
                <h1><?php echo $shortcode['title']; ?></h1>
            </div>
            <?php endif; ?>
            <div class="span<?php echo ''!==$shortcode['title']?8:12; ?>">
                <?php foreach($slides as $i => $slide): if($i>=$nr) break; ?>
                <div class="offer-one">
                    <div class="offer-cover">
                        <img src="<?php echo $slide['options']['image']; ?>" alt="offer image">
                    </div>
                    <h4><?php echo get_the_title($slide['post']->ID); ?></h4>
                    <?php echo wpautop($slide['options']['description']); ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<div class="container">
<?php endif; ?>