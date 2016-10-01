<?php if(count($slides)): ?>
<?php
$nr = (int)$shortcode['nr'];
if(!$nr)
    $nr = count($slides);
?>
<!-- =====================================================================
                                 START THE SLIDER
====================================================================== -->
<div class="the-slider" data-tesla-plugin="slider" data-tesla-item=".slide" data-tesla-next=".slide-right" data-tesla-prev=".slide-left" data-tesla-container=".slide-wrapper">
    <div class="the-slider-content">
        <div class="slide-arrows">
            <div class="slide-left"></div>
            <div class="slide-right"></div>
        </div>
        <ul class="slide-wrapper" id="slide-wrapper">
            <?php foreach($slides as $i => $slide): if($i>=$nr) break; ?>
            <li class="slide"><img src="<?php echo esc_attr($slide['options']['image']); ?>" alt="slider image"></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="the-slider-bullets">
        <div class="container">
            <ul class="the-bullets" data-tesla-plugin="bullets">
                <?php foreach($slides as $i => $slide): if($i>=$nr) break; ?>
                <li>
                    <span class="the-bullets-actived"></span>
                    <h4><a href="#"><?php echo get_the_title($slide['post']->ID); ?><span><img src="<?php echo esc_attr($slide['options']['icon']); ?>" alt="slider"></span></a></h4>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
<!-- =====================================================================
                                 END THE SLIDER
====================================================================== -->
<?php endif; ?>