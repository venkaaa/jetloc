<?php if(''!==$shortcode['title']): ?>
<h1 class="center"><?php echo $shortcode['title']; ?></h1>
<?php endif; ?>
<?php if(count($slides)): ?>
<?php
$nr = (int)$shortcode['nr'];
if(!$nr)
    $nr = count($slides);
?>
<div class="our-partners">
    <div class="row">
        <div class="span1">
            <div class="our-partners-arrows">
                <div class="our-partners-arrows-l"></div>
            </div>
        </div>
        <div class="span10 our-partners-items">
            <div class="row">
                <div class="our-partners-items-wrapper">
                    <?php foreach($slides as $i => $slide): if($i>=$nr) break; ?>
                    <div class="span3">
                        <div class="partner">
                            <?php if(''!==$slide['options']['url']): ?>
                            <a href="<?php echo esc_attr($slide['options']['url']); ?>"><img src="<?php echo esc_attr($slide['options']['image']); ?>" alt="partners"></a>
                            <?php else: ?>
                            <img src="<?php echo esc_attr($slide['options']['image']); ?>"alt="partners">
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="span1">
            <div class="our-partners-arrows">
                <div class="our-partners-arrows-r"></div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>