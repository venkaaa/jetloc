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
<div class="our-team">
    <div class="row">
        <?php foreach($slides as $i => $slide): if($i>=$nr) break; ?>
        <?php if($i&&!($i%$columns)): ?>
    </div>
    <div class="row">
        <?php endif; ?>
        <div class="col-sm-<?php echo $size; ?> col-xs-12">
            <div class="team-member">
                <div class="team-member-cover">
                    <?php if(''!==$slide['options']['url']): ?>
                    <a href="<?php echo $slide['options']['url']; ?>">
                        <img src="<?php echo esc_attr($slide['options']['image']); ?>" alt="team member">
                    </a>
                    <?php else: ?>
                    <img src="<?php echo esc_attr($slide['options']['image']); ?>" alt="team member">
                    <?php endif; ?>
                </div>
                <div class="team-member-name">
                    <?php echo get_the_title($slide['post']->ID); ?> <span><?php echo $slide['options']['position']; ?></span>
                </div>
                <?php echo wpautop($slide['options']['description']); ?>
                <?php if(''!==$slide['options']['facebook']||''!==$slide['options']['twitter']): ?>
                <ul>
                    <?php if(''!==$slide['options']['facebook']): ?>
                    <li><a href="<?php echo esc_attr($slide['options']['facebook']); ?>"><img src="<?php echo tesla_locate_uri('images/socials/facebook-b.png'); ?>" alt="social profile"></a></li>
                    <?php endif; ?>
                    <?php if(''!==$slide['options']['twitter']): ?>
                    <li><a href="<?php echo esc_attr($slide['options']['twitter']); ?>"><img src="<?php echo tesla_locate_uri('images/socials/twitter-b.png'); ?>" alt="social profile"></a></li>
                    <?php endif; ?>
                </ul>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
</div><!-- bootstrap 3 -->
<?php endif; ?>
<?php if(''!==$shortcode['view_all']): ?>
<span class="button-center view-all"><a href="<?php echo esc_attr($shortcode['view_all']); ?>" class="button-3"><?php echo $shortcode['view_all_text']; ?></a></span>
<?php endif; ?>