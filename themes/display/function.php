<?php

/*============================== TESLA FRAMEWORK ======================================================================================================================*/

require_once locate_template('tesla_framework/tesla.php');

require_once locate_template('tesla_dev/tt_log.php');

TT_ENQUEUE::$enabled = FALSE;



/*============================== THEME FEATURES ======================================================================================================================*/

function displaywp_theme_features() {

    register_nav_menus(array(
        'displaywp_menu' => 'Header Menu'
    ));
register_nav_menus(array(
        'service-sidemenu' => 'Service Menu'
    ));
    if (!isset($content_width))
        $content_width = 1170;

    add_theme_support('post-thumbnails');

    add_theme_support( 'automatic-feed-links' );
}

add_action('after_setup_theme', 'displaywp_theme_features');



/*============================== SIDEBARS ======================================================================================================================*/

function displaywp_sidebars() {

    register_sidebar(array(
        'name' => 'Blog Sidebar',
        'id' => 'blog-sidebar',
        'description' => 'This sidebar is located on the right side of the content on the blog page.',
        'class' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));
    /*register_sidebar(array(
        'name' => 'Page Sidebar',
        'id' => 'page-sidebar',
        'description' => 'This sidebar is located on the right side of the content on the single page.',
        'class' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));*/
    register_sidebar(array(
        'name' => 'Footer Left Sidebar',
        'id' => 'footer-left-sidebar',
        'description' => 'This sidebar is located in the left column of the footer area.',
        'class' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
    register_sidebar(array(
        'name' => 'Footer Middle Sidebar',
        'id' => 'footer-middle-sidebar',
        'description' => 'This sidebar is located in the middle column of the footer area.',
        'class' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
    register_sidebar(array(
        'name' => 'Footer Right Sidebar',
        'id' => 'footer-right-sidebar',
        'description' => 'This sidebar is located in the right column of the footer area.',
        'class' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

}

add_action('widgets_init', 'displaywp_sidebars');



/*============================== LANGUAGE SETUP ======================================================================================================================*/

function displaywp_language_setup(){

    load_theme_textdomain('displaywp', locate_template('languages'));

}

add_action('after_setup_theme', 'displaywp_language_setup');


function addservicesidemenu()
{
echo "<style> h1.post-title{ display:none; } </style>";


$menu_name = 'service-sidemenu';

    if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
    $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );

    $menu_items = wp_get_nav_menu_items($menu->term_id);

    $menu_list = '<ul class="nav nav-pills nav-stacked left-menu" id="menu-' . $menu_name . '">';

    foreach ( (array) $menu_items as $key => $menu_item ) {
        $title = $menu_item->title;
        $url = $menu_item->url;
        $getlink = get_the_permalink();
        $menu_list .= '<li><a ';
        if($url == $getlink ){ $menu_list .= 'class="active"'; }
        $menu_list .=' href="' . $url . '">' . $title . '</a></li>';
    }
    $menu_list .= '</ul>';
    } else {
    $menu_list = '<ul class="nav nav-pills nav-stacked left-menu"><li>Menu "' . $menu_name . '" not defined.</li></ul>';
    }
    // $menu_list now ready to output   
return $menu_list;

}
add_shortcode('service-menu', 'addservicesidemenu');




function officemap()
{

    // $menu_list now ready to output   
return tt_gmap('contact_map','contact_map','contact_map');;

}
add_shortcode('contact-map', 'officemap');



/*============================== SCRIPTS & STYLES ======================================================================================================================*/

function displaywp_scripts_and_styles() {

    $protocol = is_ssl() ? 'https' : 'http';

    $font_custom = _go('logo_text_font');

    //wp_enqueue_style('displaywp-font-opensans', $protocol.'://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,600,700', false, null);

    if($font_custom){

        $font_custom = str_replace(' ', '+', $font_custom);

      //  wp_enqueue_style( 'displaywp-font-custom', $protocol.'://fonts.googleapis.com/css?family='.$font_custom, false, null);

    }

	// wp_enqueue_style('displaywp-css-bootstrap', tesla_locate_uri('css/bootstrap.css'), false, null);
      //  wp_enqueue_style('displaywp-css-main', tesla_locate_uri('css/style.css'), array('displaywp-css-bootstrap'), null);
   // wp_enqueue_style('displaywp-css-bootstrap-3', tesla_locate_uri('css/bootstrap-3.css'), array('displaywp-css-main'), null);
  //  wp_enqueue_style('displaywp-css-root', tesla_locate_uri('style.css'), false, null);

	//wp_enqueue_script('jquery');
     //wp_enqueue_script('displaywp-js-retina', tesla_locate_uri('js/retina-1.1.0.min.js'), false, null, true);
	 //wp_enqueue_script('displaywp-js-modernizr', tesla_locate_uri('js/modernizr.custom.63321.js'), false, null, true);
     //wp_enqueue_script('displaywp-js-bootstrap', tesla_locate_uri('js/bootstrap.js'), array('jquery', 'displaywp-js-modernizr'), null, true);
     //wp_enqueue_script('displaywp-js-placeholder', tesla_locate_uri('js/placeholder.js'), array('jquery', 'displaywp-js-modernizr'), null, true);
     //wp_enqueue_script('displaywp-js-imagesloaded', tesla_locate_uri('js/imagesloaded.pkgd.min.js'), array('jquery', 'displaywp-js-modernizr'), null, true);
    // wp_enqueue_script('displaywp-js-masonry', tesla_locate_uri('js/masonry.pkgd.js'), array('jquery', 'displaywp-js-modernizr', 'displaywp-js-imagesloaded'), null, true);
     //wp_enqueue_script('displaywp-js-plugins', tesla_locate_uri('js/plugins.js'), array('jquery', 'displaywp-js-modernizr', 'displaywp-js-imagesloaded', 'displaywp-js-masonry'), null, true);
     //wp_enqueue_script('displaywp-js-swipebox', tesla_locate_uri('js/jquery.swipebox.min.js'), array('jquery', 'displaywp-js-modernizr'), null, true);
     //wp_enqueue_script('displaywp-js-sharethis', tesla_locate_uri('js/buttons.js'), array('jquery'), null, true);
    // wp_enqueue_script('displaywp-js-options', tesla_locate_uri('js/options.js'), array('jquery', 'displaywp-js-modernizr', 'displaywp-js-bootstrap', 'displaywp-js-placeholder', 'displaywp-js-imagesloaded', 'displaywp-js-masonry', 'displaywp-js-plugins', 'displaywp-js-swipebox', 'displaywp-js-sharethis'), null, true);

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply', array('jquery') );

    wp_localize_script( 'displaywp-js-options', 'displaywp', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

}

function displaywp_admin_scripts_and_styles($hook_suffix) {

    if ('widgets.php' === $hook_suffix) {
        wp_enqueue_style('displaywp-css-admin-widgets', tesla_locate_uri('admin/widgets.css'), false, null);

        wp_enqueue_media();
        wp_enqueue_script('displaywp-js-admin-widgets', tesla_locate_uri('admin/widgets.js'), array('media-upload', 'media-views'), null);
    }

    $screen = get_current_screen();

    if('page'===$screen->id){

        wp_enqueue_style('displaywp-css-admin-page', tesla_locate_uri('admin/page.css'), false, null);

        wp_enqueue_script('displaywp-js-admin-widgets', tesla_locate_uri('admin/page.js'), false, null);

    }

}

if(!is_admin())
    add_action('wp_enqueue_scripts', 'displaywp_scripts_and_styles');
else
    add_action('admin_enqueue_scripts', 'displaywp_admin_scripts_and_styles');

function displaywp_header(){
    $background_image = _go('bg_image');
    $background_position = _go('bg_image_position');
    $background_repeat = _go('bg_image_repeat');
    $background_attachment = _go('bg_image_attachment');
    $background_color = _go('bg_color');
    ?>
    <style type="text/css">
    .displaywp_video_wrapper,
    .video-player {
        position: relative !important;
        padding-bottom: 56.25% !important;
        overflow: hidden !important;
        height: 0 !important;
        width: auto !important;
    }

    .displaywp_video_wrapper>iframe,
    .displaywp_video_wrapper>object,
    .displaywp_video_wrapper>embed,
    .video-player>iframe,
    .video-player>object,
    .video-player>embed {
        position: absolute !important;
        top: 0 !important;
        left: 0 !important;
        width: 100% !important;
        height: 100% !important;
    }
    .contact_map{
        height: 100%;
    }
    <?php
    echo 'body{'."\n";
    if(!empty($background_image))
        echo 'background-image: url('.$background_image.');'."\n";
    if(!empty($background_position)){
        echo 'background-position: ';
        switch($background_position){
            case 'Left':
                echo 'top left';
                break;
            case 'Center':
                echo 'top center';
                break;
            case 'Right':
                echo 'top right';
                break;
            default:
                break;
        }
        echo ';'."\n";
    }
    if(!empty($background_repeat)){
        echo 'background-repeat: ';
        switch($background_repeat){
            case 'No Repeat':
                echo 'no-repeat';
                break;
            case 'Tile':
                echo 'repeat';
                break;
            case 'Tile Horizontally':
                echo 'repeat-x';
                break;
            case 'Tile Vertically':
                echo 'repeat-y';
                break;
            default:
                break;
        }
        echo ';'."\n";
    }
    if(!empty($background_attachment)){
        echo 'background-attachment: ';
        switch($background_attachment){
            case 'Scroll':
                echo 'scroll';
                break;
            case 'Fixed':
                echo 'fixed';
                break;
            default:
                break;
        }
        echo ';'."\n";
    }
    if(!empty($background_color))
        echo 'background-color: '.$background_color.';'."\n";
    echo '}'."\n";
    $default = _go('site_color');
    $default2 = _go('site_color_2');
    $default3 = _go('site_color_3');
    $default4 = _go('site_color_4');
    if(empty($default))
        $default = '#45c9c3';
    if(empty($default2))
        $default2 = '#47a1f4';
    if(empty($default3))
        $default3 = '#f6606a';
    if(empty($default4))
        $default4 = '#37a19c';
    ?>
    /* first color */
    a:hover {
        color: <?php echo $default; ?>;
    }
    .displaywp-sticky {
        color: <?php echo $default; ?>;
    }
    .contact-box .contact-box-form .contact-box-line:focus,
    .contact-box .contact-box-form .contact-box-area:focus {
        border-color: <?php echo $default; ?>;
    }
    .header .menu ul li.current_page_item a,
    .header .menu ul li a:hover {
        border-top-color: <?php echo $default; ?>;
        color: <?php echo $default; ?>;
    }
    .project .project-selection li a:hover {
        color: <?php echo $default; ?>;
    }
    .share-it ul li a:hover {
        background-color: <?php echo $default; ?>;
    }
    .blog-entry .entry-header h1 a:hover {
        color: <?php echo $default; ?>;
    }
    .blog-entry .entry-content .entry-content-details ul li a:hover {
        color: <?php echo $default; ?>;
    }
    .recent-post h4 a:hover {
        color: <?php echo $default; ?>;
    }
    .footer .widget .tagcloud a:hover,
    .sidebar .widget .tagcloud a:hover {
        color: <?php echo $default; ?>;
    }
    .comments-area .comment-form .form-submit input {
        background-color: <?php echo $default; ?>;
    }
    .hot-offer {
        background-color: <?php echo $default; ?>;
    }
    .filter-item .filter-hover h5 a:hover {
        color: <?php echo $default; ?>;
    }
    .filter-item .filter-hover ul li a:hover {
        background-color: <?php echo $default; ?>;
    }
    .alert-regular {
        background-color: <?php echo $default; ?>;
    }
    .button-2 {
        background-color: <?php echo $default; ?>;
    }
    .contact-form .contact-line:focus,
    .contact-form .contact-area:focus {
        border-color: <?php echo $default; ?>;
    }
    .contact-form .contact-button {
        background-color: <?php echo $default; ?>;
    }
    .contact-info li a:hover {
        color: <?php echo $default; ?>;
    }
    .tabs h4 a:hover {
        color: <?php echo $default; ?>;
    }
    .skill .skill-line span {
        background-color: <?php echo $default; ?>;
    }
    .footer .footer-copyright span a:hover,
    .footer .footer-menu li a:hover {
        color: <?php echo $default; ?>;
    }
    .subscription .subscription-button {
        background-color: <?php echo $default; ?>;
    }
    .sidebar .widget_archive li a:hover,
    .sidebar .widget_categories li a:hover {
        color: <?php echo $default; ?>;
    }
    .share-it ul li>span:hover{
        background-color: <?php echo $default; ?> !important;
    }
    /* second color */
    .accordion .accordion-heading.active a {
        background-color: <?php echo $default2; ?>;
        border-color: <?php echo $default2; ?>;
    }
    .contact-box .contact-title span {
        background-color: <?php echo $default2; ?>;
    }
    .comments-area .commentlist li .comment .comment-info .comment-edit-link,
    .comments-area .commentlist li .comment .comment-info .comment-reply-link {
        color: <?php echo $default2; ?>;
    }
    .page-numbers li .current {
        background-color: <?php echo $default2; ?>;
        border-color: <?php echo $default2; ?>;
    }
    .page-numbers li a:hover {
        border-color: <?php echo $default2; ?>;
    }
    .alert-attention {
        background-color: <?php echo $default2; ?>;
    }
    .button-3 {
        background-color: <?php echo $default2; ?>;
        border-color: <?php echo $default2; ?>;
    }
    .pricing-table {
        border-top-color: <?php echo $default2; ?>;
    }
    .pricing-table .pricing-table-header h1 {
        color: <?php echo $default2; ?>;
    }
    .offer-box .offer-one .offer-cover {
        background-color: <?php echo $default2; ?>;
    }
    .service-box:hover {
        border-color: <?php echo $default2; ?>;
    }
    /* third color */
    .error-404 h2 span {
        color: <?php echo $default3; ?>;
    }
    .tabs .tab_nav li.active a {
        border-top-color: <?php echo $default3; ?>;
    }
    /* fourth color */
    .comments-area .comment-form .form-submit input {
        border-bottom-color: <?php echo $default4; ?>;
    }
    .button-2 {
        border-bottom-color: <?php echo $default4; ?>;
    }
    .contact-form .contact-button {
        border-bottom-color: <?php echo $default4; ?>;
    }
    .subscription .subscription-button {
        border-bottom-color: <?php echo $default4; ?>;
    }
    <?php
    $header_align = _go('header_menu_alignment');
    if(!empty($header_align))
        echo '.header div.menu>ul{'."\n".'text-align: '.$header_align.';'."\n".'}'."\n";
    $map_height = _go('map_height');
    if(!empty($map_height))
        echo '.location-map{'."\n".'height: '.$map_height.'px;'."\n".'}'."\n";
    echo _go('custom_css');
    ?>
    </style>
    <?php
    $favicon = _go('favicon');
    if(!empty($favicon))
        echo '<link rel="icon" type="image/png" href="'.$favicon.'">';
}

add_action('wp_head','displaywp_header',1000);

function displaywp_footer(){

    echo '<!--[if lt IE 9]><script src="'.tesla_locate_uri('js/html5.js').'"></script><![endif]-->';

    echo _go('append_to_footer');

}

add_action('wp_footer','displaywp_footer',1000);



/*============================== FILTERS ======================================================================================================================*/

function displaywp_wp_title( $title, $sep ) {
    global $paged, $page;

    if ( is_feed() )
        return $title;

    $title .= get_bloginfo( 'name' );
    
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        $title = "$title $sep $site_description";

    if ( $paged >= 2 || $page >= 2 )
        $title = "$title $sep " . sprintf( __( 'Page %s', 'tesla' ), max( $paged, $page ) );

    return $title;
}

add_filter( 'wp_title', 'displaywp_wp_title', 10, 2 );

function displaywp_the_title( $title, $id ) {
    
    if(''===$title)
        $title = _x('Untitled', 'post or page without title', 'displaywp');

    return $title;

}

add_filter( 'the_title', 'displaywp_the_title', 10, 2 );

function displaywp_wp_link_pages_link( $link, $i ) {
    
    return '<li>'.$link.'</li>';

}

add_filter( 'wp_link_pages_link', 'displaywp_wp_link_pages_link', 10, 2 );



/*============================== WIDGETS ======================================================================================================================*/

require_once locate_template('widgets/widget-twitter.php');
require_once locate_template('widgets/widget-banner.php');
require_once locate_template('widgets/widget-tabs.php');
require_once locate_template('widgets/widget-recent-posts.php');
require_once locate_template('widgets/widget-menu.php');
require_once locate_template('widgets/widget-social-icons.php');
require_once locate_template('widgets/widget-newsletter.php');

function displaywp_register_widgets() {

    register_widget('Displaywp_widget_twitter');
    register_widget('Displaywp_widget_banner');
    register_widget('Displaywp_widget_tabs');
    register_widget('Displaywp_widget_recent_posts');
    register_widget('Displaywp_widget_menu');
    register_widget('Displaywp_widget_social_icons');
    register_widget('Displaywp_widget_newsletter');
    
}

add_action('widgets_init', 'displaywp_register_widgets');



/*============================== COMMENTS ======================================================================================================================*/

function displaywp_comment($comment, $args, $depth){

    $GLOBALS['comment'] = $comment;
    switch ($comment->comment_type) :
        case 'pingback' :
        case 'trackback' :
            ?>

            <li>
                <div <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
                    <span class="comment-info"><?php edit_comment_link(_x('Edit', 'comments', 'displaywp')); ?><?php _ex('Pingback: ', 'comments', 'displaywp'); ?><?php echo get_comment_author_link(); ?> <span><?php comment_date('j M Y'); ?></span></span>
                </div>

            <?php
            break;
        default :
            global $post;
            ?>

            <li>
                <div <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
                    <span class="avatar"><?php echo get_avatar($comment, 70); ?></span>
                    <span class="comment-info"><?php comment_reply_link(array_merge($args, array('reply_text' => _x('Reply', 'comments', 'displaywp'), 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?><?php edit_comment_link(_x('Edit', 'comments', 'displaywp')); ?><?php echo get_comment_author_link(); ?> <span><?php comment_date('j M Y'); ?></span></span>
                    <?php if ('0' == $comment->comment_approved) : ?>
                        <p class="comment-awaiting-moderation"><?php _ex('Your comment is awaiting moderation.', 'comments', 'displaywp'); ?></p>
                    <?php endif; ?>
                    <?php comment_text(); ?>
                </div>

            <?php
            break;
    endswitch;

}

function displaywp_comment_end($comment, $args, $depth){

    $GLOBALS['comment'] = $comment;
    switch ($comment->comment_type) :
        case 'pingback' :
        case 'trackback' :
            ?>

            </li>

            <?php
            break;
        default :
            ?>

            </li>

            <?php
            break;
    endswitch;

}



/*============================== FEATURED CONTENT UTILITIES ======================================================================================================================*/

function displaywp_has_featured($id = null){

    if(is_null($id))
        $id = get_the_id();

    $featured_image = has_post_thumbnail($id);

    $displaywp_metabox_video = displaywp_metabox_video_get($id);

    $featured_video = !empty($displaywp_metabox_video['video']);

    return $featured_image || $featured_video;
}

function displaywp_get_featured($echo = false, $id = null){

    if(is_null($id))
        $id = get_the_id();

    $featured_image = has_post_thumbnail($id);

    $displaywp_metabox_video = displaywp_metabox_video_get($id);

    $featured_video = !empty($displaywp_metabox_video['video']);

    switch(true){

        case $featured_video:
            $featured = '<div class="entry-cover"><div class="displaywp_video_wrapper">'.$displaywp_metabox_video['video'].'</div></div>';
            break;

        case $featured_image:
            $featured = '<div class="entry-cover">'.get_the_post_thumbnail($id).'</div>';
            break;

        default:
            $featured = '';
            break;

    }

    if($echo){
        echo $featured;
        $featured = null;
    }
    
    return $featured;
}



/*============================== QUERY VARS ======================================================================================================================*/

function displaywp_get_query($var){
    
    if(isset($_GET[$var]))
        $categories = $_GET[$var];
    else
        $categories = get_query_var($var);

    return $categories;

}



/*============================== METABOXES ======================================================================================================================*/

function displaywp_array_filter_recursive_callback(&$value){

    if(is_array($value)){

        $value = array_filter($value,'displaywp_array_filter_recursive_callback');

        return (bool)count($value);

    }else{

        return ''!==$value;

    }

}

function displaywp_array_filter_recursive($array){

    return array_filter($array,'displaywp_array_filter_recursive_callback');

}

function displaywp_parse_args_callback(&$value, $key, $options){

    if(isset($options[$key])){

        if(is_array($value)&&isset($options[$key])){

            array_walk($value, 'displaywp_parse_args_callback', $options[$key]);

        }else{

            $value = $options[$key];

        }

    }

}

function displaywp_parse_args($options, $defaults){

    $options = displaywp_array_filter_recursive($options);

    array_walk($defaults, 'displaywp_parse_args_callback', $options);

    return $defaults;

}

function displaywp_metabox_template_input_select_term($input_name, $taxonomy, $current_category){

    ?>

    <?php $terms = get_terms($taxonomy); ?>
    <select name="<?php echo $input_name; ?>" disabled="disabled">
        <option value="" <?php selected($current_category, ''); ?>> - no category - </option>
        <?php foreach($terms as $t): ?>
        <option value="<?php echo $t->slug; ?>" <?php selected($current_category, $t->slug); ?>><?php echo $t->name; ?> (<?php echo $t->count; ?>)</option>
        <?php endforeach; ?>
    </select>

    <?php

}

function displaywp_metabox_template_input_checkbox($input_name, $value){

    ?>

    <input type="hidden" name="<?php echo $input_name; ?>" value="0" /><input type="checkbox" name="<?php echo $input_name; ?>" <?php checked($value); ?> value="1" />

    <?php

}

function displaywp_metabox_template_input_disable_section_checkbox($input_name, $value){

    ?>

    <p>
        <label>
            <input type="hidden" name="<?php echo $input_name; ?>" value="0" /><input class="tesla_template_disable_section" type="checkbox" name="<?php echo $input_name; ?>" <?php checked($value); ?> value="1" /> Disable section<br/><em>(disables this section)</em>
        </label>
    </p>

    <?php

}

function displaywp_metabox_template_input_image($input_name, $value){

    ?>

    <span class="tesla_template_meta_image">
        <?php if(''!==$value): ?>
        <img src="<?php echo esc_attr($value); ?>" /><button type="button" class="button button-secondary">Remove image</button><input type="hidden" class="widefat" name="<?php echo $input_name; ?>" value="<?php echo esc_attr($value); ?>" disabled="disabled" />
        <?php else: ?>
        <button type="button" class="button button-secondary">Set image</button><input type="hidden" class="widefat" name="<?php echo $input_name; ?>" value="<?php echo esc_attr($value); ?>" disabled="disabled" />
        <?php endif; ?>
    </span>

    <?php

}

function displaywp_metabox_template_options_get($post_id){

    $options = (array) get_post_meta($post_id, 'displaywp_metabox_template_options', true);

    $defaults = array(

        'services' => array(
            'services' => array(
                'disable_section' => false,
                'columns' => 4,
                'nr' => 0
            ),
            'offers' => array(
                'disable_section' => false,
                'title' => '',
                'nr' => 0
            ),
            'skills' => array(
                'disable_section' => false,
                'title' => '',
                'subtitle' => '',
                'nr' => 0
            ),
            'choose' => array(
                'disable_section' => false,
                'title' => '',
                'subtitle' => '',
                'nr' => 0
            )
        ),
        'about' => array(
            'toggle' => array(
                'disable_section' => false,
                'title' => '',
                'subtitle' => '',
                'nr' => 0,
                'category' => ''
            ),
            'staff' => array(
                'disable_section' => false,
                'background' => '',
                'columns' => 3,
                'nr' => 0
            ),
            'skills' => array(
                'disable_section' => false,
                'title' => '',
                'subtitle' => '',
                'nr' => 0
            ),
            'secondary' => array(
                'disable_section' => false,
                'title' => '',
                'nr' => 0
            )
        ),
        'team' => array(
            'team' => array(
                'disable_section' => false,
                'columns' => 3,
                'nr' => 0
            )
        ),
        'project' => array(
            'project' => array(
                'disable_section' => false,
                'columns' => 3,
                'items_per_page' => 12,
                'wide_filter' => true,
                'single_filter' => false
            )
        ),
        'home' => array(
            'main' => array(
                'disable_section' => false,
                'nr' => 0
            ),
            'rev_slider' => array(
                'disable_section' => false,
                'enabled' => false,
                'slug' => ''
            ),
            'services' => array(
                'disable_section' => false,
                'nr' => 4,
                'columns' => 4,
                'background' => '',
                'title' => '',
                'subtitle' => '',
                'wide_header' => true,
                'view_all' => ''
            ),
            'team' => array(
                'disable_section' => false,
                'nr' => 3,
                'columns' => 3,
                'background' => '',
                'title' => '',
                'subtitle' => '',
                'wide_header' => true,
                'view_all' => ''
            ),
            'project' => array(
                'disable_section' => false,
                'nr' => 6,
                'columns' => 3,
                'wide_filter' => true,
                'background' => '',
                'title' => '',
                'subtitle' => '',
                'wide_header' => true,
                'view_all' => ''
            ),
            'hot_offer' => array(
                'disable_section' => false,
                'title' => '',
                'description' => '',
                'date' => '',
                'title_color' => '',
                'description_color' => '',
                'date_color' => '',
                'background' => '',
                'border' => '',
                'wide' => true,
                'url' => ''
            ),
            'toggle' => array(
                'disable_section' => false,
                'title' => '',
                'subtitle' => '',
                'nr' => 0,
                'category' => ''
            ),
            'recent_posts' => array(
                'disable_section' => false,
                'nr' => 5,
                'title' => '',
                'category' => ''
            ),
            'testimonials' => array(
                'disable_section' => false,
                'nr' => 0,
                'background' => '',
                'wide' => true
            ),
            'clients' => array(
                'disable_section' => false,
                'nr' => 0,
                'title' => ''
            ),
            'contact' => array(
                'disable_section' => false,
                'title' => '',
                'subtitle' => '',
                'form_title' => '',
                'button' => '',
                'background' => '',
                'address_icon' => '',
                'mail_icon' => '',
                'phone_icon' => '',
                'wide' => true
            )
        ),
        'contact' => array(
            'contact' => array(
                'form_title' => _x('drop us a <span>line</span>','contact template','displaywp'),
                'form_button' => _x('Drop us a line','contact template','displaywp'),
                'widget_title' => _x('contact <span>info','contact template','displaywp')
            )
        )
    );

    return displaywp_parse_args($options, $defaults);

}

function displaywp_metabox_template_options($post) {
    wp_nonce_field(-1, 'displaywp_metabox_template_options_nonce');
    $displaywp_metabox_template_options = displaywp_metabox_template_options_get($post->ID);
    ?>
    <div data-template="default" style="display: none;">
        <p>
            Select a template to see the available options.
        </p>
    </div>
    <div data-template="templates_displaywp/contact.php" style="display: none;">
        <p>
            <label>
                Contact form title: <input type="text" class="widefat" name="displaywp_metabox_template_options[contact][contact][form_title]" value="<?php echo esc_attr($displaywp_metabox_template_options['contact']['contact']['form_title']); ?>" disabled="disabled" />
            </label>
        </p>
        <p>
            <label>
                Contact form button: <input type="text" class="widefat" name="displaywp_metabox_template_options[contact][contact][form_button]" value="<?php echo esc_attr($displaywp_metabox_template_options['contact']['contact']['form_button']); ?>" disabled="disabled" />
            </label>
        </p>
        <p>
            <label>
                Contact widget title: <input type="text" class="widefat" name="displaywp_metabox_template_options[contact][contact][widget_title]" value="<?php echo esc_attr($displaywp_metabox_template_options['contact']['contact']['widget_title']); ?>" disabled="disabled" />
            </label>
        </p>
        <p>
            The other options can be configured in Dashboard > Display > Contact Info.
        </p>
    </div>
    <div data-template="templates_displaywp/services.php" style="display: none;">
        <p>
            <strong>Services section options:</strong>
        </p>
        <?php displaywp_metabox_template_input_disable_section_checkbox('displaywp_metabox_template_options[services][services][disable_section]',$displaywp_metabox_template_options['services']['services']['disable_section']); ?>
        <div class="tesla_template_section">
            <p>
                <label>
                    Columns: <input type="text" size="3" name="displaywp_metabox_template_options[services][services][columns]" value="<?php echo esc_attr($displaywp_metabox_template_options['services']['services']['columns']); ?>" disabled="disabled" /> <em>(valid values: 1, 2, 3, 4, 6 and 12)</em>
                </label>
            </p>
            <p>
                <label>
                    Nr: <input type="text" size="3" name="displaywp_metabox_template_options[services][services][nr]" value="<?php echo esc_attr($displaywp_metabox_template_options['services']['services']['nr']); ?>" disabled="disabled" /> <em>(limits the nr of items, set to 0 to show all)</em>
                </label>
            </p>
            <p>
                <strong>Note: </strong><em>Add content at Dashboard > Services.</em>
            </p>
        </div>
        <br/>
        <p>
            <strong>Offers section options:</strong>
        </p>
        <?php displaywp_metabox_template_input_disable_section_checkbox('displaywp_metabox_template_options[services][offers][disable_section]',$displaywp_metabox_template_options['services']['offers']['disable_section']); ?>
        <div class="tesla_template_section">
            <p>
                <label>
                    Title: <input type="text" class="widefat" name="displaywp_metabox_template_options[services][offers][title]" value="<?php echo esc_attr($displaywp_metabox_template_options['services']['offers']['title']); ?>" disabled="disabled" />
                </label>
            </p>
            <p>
                <label>
                    Nr: <input type="text" size="3" name="displaywp_metabox_template_options[services][offers][nr]" value="<?php echo esc_attr($displaywp_metabox_template_options['services']['offers']['nr']); ?>" disabled="disabled" /> <em>(limits the nr of items, set to 0 to show all)</em>
                </label>
            </p>
            <p>
                <strong>Note: </strong><em>Add content at Dashboard > Offers.</em>
            </p>
        </div>
        <br/>
        <p>
            <strong>Skills section options:</strong>
        </p>
        <?php displaywp_metabox_template_input_disable_section_checkbox('displaywp_metabox_template_options[services][skills][disable_section]',$displaywp_metabox_template_options['services']['skills']['disable_section']); ?>
        <div class="tesla_template_section">
            <p>
                <label>
                    Title: <input type="text" class="widefat" name="displaywp_metabox_template_options[services][skills][title]" value="<?php echo esc_attr($displaywp_metabox_template_options['services']['skills']['title']); ?>" disabled="disabled" /> <em>(wrap in a &lt;span&gt; for bold effect)</em>
                </label>
            </p>
            <p>
                <label>
                    Subtitle: <input type="text" class="widefat" name="displaywp_metabox_template_options[services][skills][subtitle]" value="<?php echo esc_attr($displaywp_metabox_template_options['services']['skills']['subtitle']); ?>" disabled="disabled" />
                </label>
            </p>
            <p>
                <label>
                    Nr: <input type="text" size="3" name="displaywp_metabox_template_options[services][skills][nr]" value="<?php echo esc_attr($displaywp_metabox_template_options['services']['skills']['nr']); ?>" disabled="disabled" /> <em>(limits the nr of items, set to 0 to show all)</em>
                </label>
            </p>
            <p>
                <strong>Note: </strong><em>Add content at Dashboard > Skills.</em>
            </p>
        </div>
        <br/>
        <p>
            <strong>"Why Choose Us" section options:</strong>
        </p>
        <?php displaywp_metabox_template_input_disable_section_checkbox('displaywp_metabox_template_options[services][choose][disable_section]',$displaywp_metabox_template_options['services']['choose']['disable_section']); ?>
        <div class="tesla_template_section">
            <p>
                <label>
                    Title: <input type="text" class="widefat" name="displaywp_metabox_template_options[services][choose][title]" value="<?php echo esc_attr($displaywp_metabox_template_options['services']['choose']['title']); ?>" disabled="disabled" /> <em>(wrap in a &lt;span&gt; for bold effect)</em>
                </label>
            </p>
            <p>
                <label>
                    Subtitle: <input type="text" class="widefat" name="displaywp_metabox_template_options[services][choose][subtitle]" value="<?php echo esc_attr($displaywp_metabox_template_options['services']['choose']['subtitle']); ?>" disabled="disabled" />
                </label>
            </p>
            <p>
                <label>
                    Nr: <input type="text" size="3" name="displaywp_metabox_template_options[services][choose][nr]" value="<?php echo esc_attr($displaywp_metabox_template_options['services']['choose']['nr']); ?>" disabled="disabled" /> <em>(limits the nr of items, set to 0 to show all)</em>
                </label>
            </p>
            <p>
                <strong>Note: </strong><em>Add content at Dashboard > Choose us.</em>
            </p>
        </div>
    </div>
    <div data-template="templates_displaywp/about.php" style="display: none;">
        <p>
            The image in the top left of the page can be set in the Featured Image option of the page.
        </p>
        <br/>
        <p>
            <strong>"Toggle List" section options:</strong>
        </p>
        <?php displaywp_metabox_template_input_disable_section_checkbox('displaywp_metabox_template_options[about][toggle][disable_section]',$displaywp_metabox_template_options['about']['toggle']['disable_section']); ?>
        <div class="tesla_template_section">
            <p>
                <label>
                    Title: <input type="text" class="widefat" name="displaywp_metabox_template_options[about][toggle][title]" value="<?php echo esc_attr($displaywp_metabox_template_options['about']['toggle']['title']); ?>" disabled="disabled" /> <em>(wrap in a &lt;span&gt; for bold effect)</em>
                </label>
            </p>
            <p>
                <label>
                    Subtitle: <input type="text" class="widefat" name="displaywp_metabox_template_options[about][toggle][subtitle]" value="<?php echo esc_attr($displaywp_metabox_template_options['about']['toggle']['subtitle']); ?>" disabled="disabled" />
                </label>
            </p>
            <p>
                Category: <?php displaywp_metabox_template_input_select_term('displaywp_metabox_template_options[about][toggle][category]','displaywp_toggle_tax',$displaywp_metabox_template_options['about']['toggle']['category']); ?> <em>(set the category that the items would be taken from, set to "no category" to take all the posts)</em>
            </p>
            <p>
                <label>
                    Nr: <input type="text" size="3" name="displaywp_metabox_template_options[about][toggle][nr]" value="<?php echo esc_attr($displaywp_metabox_template_options['about']['toggle']['nr']); ?>" disabled="disabled" /> <em>(limits the nr of items, set to 0 to show all)</em>
                </label>
            </p>
            <p>
                <strong>Note: </strong><em>Add content at Dashboard > Toggle List.</em>
            </p>
        </div>
        <br/>
        <p>
            <strong>Staff Info section options:</strong>
        </p>
        <?php displaywp_metabox_template_input_disable_section_checkbox('displaywp_metabox_template_options[about][staff][disable_section]',$displaywp_metabox_template_options['about']['staff']['disable_section']); ?>
        <div class="tesla_template_section">
            <p>
                Background image:
                <br/>
                <?php displaywp_metabox_template_input_image('displaywp_metabox_template_options[about][staff][background]',$displaywp_metabox_template_options['about']['staff']['background']); ?>
                <br/>
                <em>(after you have added an image you can change it by clicking on the image or remove it)</em>
            </p>
            <p>
                <label>
                    Columns: <input type="text" size="3" name="displaywp_metabox_template_options[about][staff][columns]" value="<?php echo esc_attr($displaywp_metabox_template_options['about']['staff']['columns']); ?>" disabled="disabled" /> <em>(valid values: 1, 2, 3, 4, 6 and 12)</em>
                </label>
            </p>
            <p>
                <label>
                    Nr: <input type="text" size="3" name="displaywp_metabox_template_options[about][staff][nr]" value="<?php echo esc_attr($displaywp_metabox_template_options['about']['staff']['nr']); ?>" disabled="disabled" /> <em>(limits the nr of items, set to 0 to show all)</em>
                </label>
            </p>
            <p>
                <strong>Note: </strong><em>Add content at Dashboard > Staff Info.</em>
            </p>
        </div>
        <br/>
        <p>
            <strong>Skills section options:</strong>
        </p>
        <?php displaywp_metabox_template_input_disable_section_checkbox('displaywp_metabox_template_options[about][skills][disable_section]',$displaywp_metabox_template_options['about']['skills']['disable_section']); ?>
        <div class="tesla_template_section">
            <p>
                <label>
                    Title: <input type="text" class="widefat" name="displaywp_metabox_template_options[about][skills][title]" value="<?php echo esc_attr($displaywp_metabox_template_options['about']['skills']['title']); ?>" disabled="disabled" /> <em>(wrap in a &lt;span&gt; for bold effect)</em>
                </label>
            </p>
            <p>
                <label>
                    Subtitle: <input type="text" class="widefat" name="displaywp_metabox_template_options[about][skills][subtitle]" value="<?php echo esc_attr($displaywp_metabox_template_options['about']['skills']['subtitle']); ?>" disabled="disabled" />
                </label>
            </p>
            <p>
                <label>
                    Nr: <input type="text" size="3" name="displaywp_metabox_template_options[about][skills][nr]" value="<?php echo esc_attr($displaywp_metabox_template_options['about']['skills']['nr']); ?>" disabled="disabled" /> <em>(limits the nr of items, set to 0 to show all)</em>
                </label>
            </p>
            <p>
                <strong>Note: </strong><em>Add content at Dashboard > Skills.</em>
            </p>
        </div>
        <br/>
        <p>
            <strong>Slider section options:</strong>
        </p>
        <?php displaywp_metabox_template_input_disable_section_checkbox('displaywp_metabox_template_options[about][secondary][disable_section]',$displaywp_metabox_template_options['about']['secondary']['disable_section']); ?>
        <div class="tesla_template_section">
            <p>
                <label>
                    Title: <input type="text" class="widefat" name="displaywp_metabox_template_options[about][secondary][title]" value="<?php echo esc_attr($displaywp_metabox_template_options['about']['secondary']['title']); ?>" disabled="disabled" /> <em>(wrap in a &lt;span&gt; for bold effect)</em>
                </label>
            </p>
            <p>
                <label>
                    Nr: <input type="text" size="3" name="displaywp_metabox_template_options[about][secondary][nr]" value="<?php echo esc_attr($displaywp_metabox_template_options['about']['secondary']['nr']); ?>" disabled="disabled" /> <em>(limits the nr of items, set to 0 to show all)</em>
                </label>
            </p>
            <p>
                <strong>Note: </strong><em>Add content at Dashboard > Secondary Slider.</em>
            </p>
        </div>
    </div>
    <div data-template="templates_displaywp/team.php" style="display: none;">
        <p>
            <strong>Team section options:</strong>
        </p>
        <?php displaywp_metabox_template_input_disable_section_checkbox('displaywp_metabox_template_options[team][team][disable_section]',$displaywp_metabox_template_options['team']['team']['disable_section']); ?>
        <div class="tesla_template_section">
            <p>
                <label>
                    Columns: <input type="text" size="3" name="displaywp_metabox_template_options[team][team][columns]" value="<?php echo esc_attr($displaywp_metabox_template_options['team']['team']['columns']); ?>" disabled="disabled" /> <em>(valid values: 1, 2, 3, 4, 6 and 12)</em>
                </label>
            </p>
            <p>
                <label>
                    Nr: <input type="text" size="3" name="displaywp_metabox_template_options[team][team][nr]" value="<?php echo esc_attr($displaywp_metabox_template_options['team']['team']['nr']); ?>" disabled="disabled" /> <em>(limits the nr of items, set to 0 to show all)</em>
                </label>
            </p>
            <p>
                <strong>Note: </strong><em>Add content at Dashboard > Team.</em>
            </p>
        </div>
    </div>
    <div data-template="templates_displaywp/projects.php" style="display: none;">
        <p>
            <strong>Portfolio section options:</strong>
        </p>
        <?php displaywp_metabox_template_input_disable_section_checkbox('displaywp_metabox_template_options[project][project][disable_section]',$displaywp_metabox_template_options['project']['project']['disable_section']); ?>
        <div class="tesla_template_section">
            <p>
                <label>
                    Columns: <input type="text" size="3" name="displaywp_metabox_template_options[project][project][columns]" value="<?php echo esc_attr($displaywp_metabox_template_options['project']['project']['columns']); ?>" disabled="disabled" /> <em>(valid values: 1, 2, 3, 4, 6 and 12)</em>
                </label>
            </p>
            <p>
                <label>
                    Items per page: <input type="text" size="3" name="displaywp_metabox_template_options[project][project][items_per_page]" value="<?php echo esc_attr($displaywp_metabox_template_options['project']['project']['items_per_page']); ?>" disabled="disabled" /> <em>(nr of items to be shown on a page)</em>
                </label>
            </p>
            <p>
                <label>
                    <input type="hidden" name="displaywp_metabox_template_options[project][project][wide_filter]" value="0" /><input type="checkbox" name="displaywp_metabox_template_options[project][project][wide_filter]" <?php checked($displaywp_metabox_template_options['project']['project']['wide_filter']); ?> value="1" /> Wide filter<br/><em>(make the filter have full page width)</em>
                </label>
            </p>
            <p>
                <label>
                    <input type="hidden" name="displaywp_metabox_template_options[project][project][single_filter]" value="0" /><input type="checkbox" name="displaywp_metabox_template_options[project][project][single_filter]" <?php checked($displaywp_metabox_template_options['project']['project']['single_filter']); ?> value="1" /> Single filter<br/><em>(disable selection of multiple filters)</em>
                </label>
            </p>
            <p>
                <strong>Note: </strong><em>Add content at Dashboard > Portfolio.</em>
            </p>
        </div>
    </div>
    <div data-template="templates_displaywp/home.php" style="display: none;">
        <p>
            <strong>Main slider options:</strong>
        </p>
        <?php displaywp_metabox_template_input_disable_section_checkbox('displaywp_metabox_template_options[home][main][disable_section]',$displaywp_metabox_template_options['home']['main']['disable_section']); ?>
        <div class="tesla_template_section">
            <p>
                <label>
                    Nr: <input type="text" size="3" name="displaywp_metabox_template_options[home][main][nr]" value="<?php echo esc_attr($displaywp_metabox_template_options['home']['main']['nr']); ?>" disabled="disabled" /> <em>(limits the nr of items, set to 0 to show all)</em>
                </label>
            </p>
            <p>
                <strong>Note: </strong><em>Add content to the default slider at Dashboard > Main Slider.</em>
            </p>
        </div>
        <br/>
        <p>
            <strong>Revolution slider options:</strong>
        </p>
        <?php displaywp_metabox_template_input_disable_section_checkbox('displaywp_metabox_template_options[home][rev_slider][disable_section]',$displaywp_metabox_template_options['home']['rev_slider']['disable_section']); ?>
        <div class="tesla_template_section">
            <p>
                <label>
                    <?php displaywp_metabox_template_input_checkbox('displaywp_metabox_template_options[home][rev_slider][enabled]',$displaywp_metabox_template_options['home']['rev_slider']['enabled']); ?> Display the "Revolution Slider" instead of the default slider<br/>
                </label>
            </p>
            <p>
                <label>
                    Alias of the slider: <input type="text" size="9" name="displaywp_metabox_template_options[home][rev_slider][slug]" value="<?php echo esc_attr($displaywp_metabox_template_options['home']['rev_slider']['slug']); ?>" disabled="disabled" />
                    <br/>
                    <em>(enter the alias of the desired revolution slider)</em>
                </label>
            </p>
            <p>
                <strong>Note:</strong> You can create revolution sliders on Dashbaord > Revolution Slider (giving that you have the Revolution Slider plugin installed and activacted).
            </p>
        </div>
        <br/>
        <p>
            <strong>Services section options:</strong>
        </p>
        <?php displaywp_metabox_template_input_disable_section_checkbox('displaywp_metabox_template_options[home][services][disable_section]',$displaywp_metabox_template_options['home']['services']['disable_section']); ?>
        <div class="tesla_template_section">
            <p>
                <label>
                    Title: <input type="text" class="widefat" name="displaywp_metabox_template_options[home][services][title]" value="<?php echo esc_attr($displaywp_metabox_template_options['home']['services']['title']); ?>" disabled="disabled" /> <em>(wrap in a &lt;span&gt; for bold effect)</em>
                </label>
            </p>
            <p>
                <label>
                    Subtitle: <input type="text" class="widefat" name="displaywp_metabox_template_options[home][services][subtitle]" value="<?php echo esc_attr($displaywp_metabox_template_options['home']['services']['subtitle']); ?>" disabled="disabled" />
                </label>
            </p>
            <p>
                <strong>Note: </strong><em>header of the services section contains the title and the subtitle.</em>
            </p>
            <p>
                Header background image:
                <br/>
                <?php displaywp_metabox_template_input_image('displaywp_metabox_template_options[home][services][background]',$displaywp_metabox_template_options['home']['services']['background']); ?>
                <br/>
                <em>(after you have added an image you can change it by clicking on the image or remove it)</em>
            </p>
            <p>
                <label>
                    <input type="hidden" name="displaywp_metabox_template_options[home][services][wide_header]" value="0" /><input type="checkbox" name="displaywp_metabox_template_options[home][services][wide_header]" <?php checked($displaywp_metabox_template_options['home']['services']['wide_header']); ?> value="1" /> Wide header<br/><em>(make the header have full page width)</em>
                </label>
            </p>
            <p>
                <label>
                    Columns: <input type="text" size="3" name="displaywp_metabox_template_options[home][services][columns]" value="<?php echo esc_attr($displaywp_metabox_template_options['home']['services']['columns']); ?>" disabled="disabled" /> <em>(valid values: 1, 2, 3, 4, 6 and 12)</em>
                </label>
            </p>
            <p>
                <label>
                    Nr: <input type="text" size="3" name="displaywp_metabox_template_options[home][services][nr]" value="<?php echo esc_attr($displaywp_metabox_template_options['home']['services']['nr']); ?>" disabled="disabled" /> <em>(limits the nr of items, set to 0 to show all)</em>
                </label>
            </p>
            <p>
                <label>
                    "View All" URL: <input type="text" class="widefat" name="displaywp_metabox_template_options[home][services][view_all]" value="<?php echo esc_attr($displaywp_metabox_template_options['home']['services']['view_all']); ?>" disabled="disabled" /> <em>(enter the full URL to the page with all the services)</em>
                </label>
            </p>
            <p>
                <strong>Note: </strong><em>Add content at Dashboard > Servies.</em>
            </p>
        </div>
        <br/>
        <p>
            <strong>Team section options:</strong>
        </p>
        <?php displaywp_metabox_template_input_disable_section_checkbox('displaywp_metabox_template_options[home][team][disable_section]',$displaywp_metabox_template_options['home']['team']['disable_section']); ?>
        <div class="tesla_template_section">
            <p>
                <label>
                    Title: <input type="text" class="widefat" name="displaywp_metabox_template_options[home][team][title]" value="<?php echo esc_attr($displaywp_metabox_template_options['home']['team']['title']); ?>" disabled="disabled" /> <em>(wrap in a &lt;span&gt; for bold effect)</em>
                </label>
            </p>
            <p>
                <label>
                    Subtitle: <input type="text" class="widefat" name="displaywp_metabox_template_options[home][team][subtitle]" value="<?php echo esc_attr($displaywp_metabox_template_options['home']['team']['subtitle']); ?>" disabled="disabled" />
                </label>
            </p>
            <p>
                <strong>Note: </strong><em>header of the team section contains the title and the subtitle.</em>
            </p>
            <p>
                Header background image:
                <br/>
                <?php displaywp_metabox_template_input_image('displaywp_metabox_template_options[home][team][background]',$displaywp_metabox_template_options['home']['team']['background']); ?>
                <br/>
                <em>(after you have added an image you can change it by clicking on the image or remove it)</em>
            </p>
            <p>
                <label>
                    <input type="hidden" name="displaywp_metabox_template_options[home][team][wide_header]" value="0" /><input type="checkbox" name="displaywp_metabox_template_options[home][team][wide_header]" <?php checked($displaywp_metabox_template_options['home']['team']['wide_header']); ?> value="1" /> Wide header<br/><em>(make the header have full page width)</em>
                </label>
            </p>
            <p>
                <label>
                    Columns: <input type="text" size="3" name="displaywp_metabox_template_options[home][team][columns]" value="<?php echo esc_attr($displaywp_metabox_template_options['home']['team']['columns']); ?>" disabled="disabled" /> <em>(valid values: 1, 2, 3, 4, 6 and 12)</em>
                </label>
            </p>
            <p>
                <label>
                    Nr: <input type="text" size="3" name="displaywp_metabox_template_options[home][team][nr]" value="<?php echo esc_attr($displaywp_metabox_template_options['home']['team']['nr']); ?>" disabled="disabled" /> <em>(limits the nr of items, set to 0 to show all)</em>
                </label>
            </p>
            <p>
                <label>
                    "View All" URL: <input type="text" class="widefat" name="displaywp_metabox_template_options[home][team][view_all]" value="<?php echo esc_attr($displaywp_metabox_template_options['home']['team']['view_all']); ?>" disabled="disabled" /> <em>(enter the full URL to the page with all the team)</em>
                </label>
            </p>
            <p>
                <strong>Note: </strong><em>Add content at Dashboard > Team.</em>
            </p>
        </div>
        <br/>
        <p>
            <strong>Portfolio section options:</strong>
        </p>
        <?php displaywp_metabox_template_input_disable_section_checkbox('displaywp_metabox_template_options[home][project][disable_section]',$displaywp_metabox_template_options['home']['project']['disable_section']); ?>
        <div class="tesla_template_section">
            <p>
                <label>
                    Title: <input type="text" class="widefat" name="displaywp_metabox_template_options[home][project][title]" value="<?php echo esc_attr($displaywp_metabox_template_options['home']['project']['title']); ?>" disabled="disabled" /> <em>(wrap in a &lt;span&gt; for bold effect)</em>
                </label>
            </p>
            <p>
                <label>
                    Subtitle: <input type="text" class="widefat" name="displaywp_metabox_template_options[home][project][subtitle]" value="<?php echo esc_attr($displaywp_metabox_template_options['home']['project']['subtitle']); ?>" disabled="disabled" />
                </label>
            </p>
            <p>
                <strong>Note: </strong><em>header of the project section contains the title and the subtitle.</em>
            </p>
            <p>
            <label>
                Header background image:
                <br/>
                <?php displaywp_metabox_template_input_image('displaywp_metabox_template_options[home][project][background]',$displaywp_metabox_template_options['home']['project']['background']); ?>
                <br/>
                <em>(after you have added an image you can change it by clicking on the image or remove it)</em>
            </p>
            <p>
                <label>
                    <input type="hidden" name="displaywp_metabox_template_options[home][project][wide_header]" value="0" /><input type="checkbox" name="displaywp_metabox_template_options[home][project][wide_header]" <?php checked($displaywp_metabox_template_options['home']['project']['wide_header']); ?> value="1" /> Wide header<br/><em>(make the header have full page width)</em>
                </label>
            </p>
            <p>
                <label>
                    Columns: <input type="text" size="3" name="displaywp_metabox_template_options[home][project][columns]" value="<?php echo esc_attr($displaywp_metabox_template_options['home']['project']['columns']); ?>" disabled="disabled" /> <em>(valid values: 1, 2, 3, 4, 6 and 12)</em>
                </label>
            </p>
            <p>
                <label>
                    <input type="hidden" name="displaywp_metabox_template_options[home][project][wide_filter]" value="0" /><input type="checkbox" name="displaywp_metabox_template_options[home][project][wide_filter]" <?php checked($displaywp_metabox_template_options['home']['project']['wide_filter']); ?> value="1" /> Wide filter<br/><em>(make the filter have full page width)</em>
                </label>
            </p>
            <p>
                <label>
                    Nr: <input type="text" size="3" name="displaywp_metabox_template_options[home][project][nr]" value="<?php echo esc_attr($displaywp_metabox_template_options['home']['project']['nr']); ?>" disabled="disabled" /> <em>(limits the nr of items, set to 0 to show all)</em>
                </label>
            </p>
            <p>
                <label>
                    "View All" URL: <input type="text" class="widefat" name="displaywp_metabox_template_options[home][project][view_all]" value="<?php echo esc_attr($displaywp_metabox_template_options['home']['project']['view_all']); ?>" disabled="disabled" /> <em>(enter the full URL to the page with all the project)</em>
                </label>
            </p>
            <p>
                <strong>Note: </strong><em>Add content at Dashboard > Portfolio.</em>
            </p>
        </div>
        <br/>
        <p>
            <strong>"Hot Offer" section options:</strong>
        </p>
        <?php displaywp_metabox_template_input_disable_section_checkbox('displaywp_metabox_template_options[home][hot_offer][disable_section]',$displaywp_metabox_template_options['home']['hot_offer']['disable_section']); ?>
        <div class="tesla_template_section">
            <p>
                <label>
                    Title: <input type="text" class="widefat" name="displaywp_metabox_template_options[home][hot_offer][title]" value="<?php echo esc_attr($displaywp_metabox_template_options['home']['hot_offer']['title']); ?>" disabled="disabled" /> <em>(wrap in a &lt;span&gt; for bold effect)</em>
                </label>
            </p>
            <p>
                <label>
                    Description: <input type="text" class="widefat" name="displaywp_metabox_template_options[home][hot_offer][description]" value="<?php echo esc_attr($displaywp_metabox_template_options['home']['hot_offer']['description']); ?>" disabled="disabled" /> <em>(it is shown next to the title)</em>
                </label>
            </p>
            <p>
                <label>
                    Date: <input type="text" class="widefat" name="displaywp_metabox_template_options[home][hot_offer][date]" value="<?php echo esc_attr($displaywp_metabox_template_options['home']['hot_offer']['date']); ?>" disabled="disabled" /> <em>(it is shown under the description)</em>
                </label>
            </p>
            <p>
                <label>
                    Title color: <input type="text" size="9" name="displaywp_metabox_template_options[home][hot_offer][title_color]" value="<?php echo esc_attr($displaywp_metabox_template_options['home']['hot_offer']['title_color']); ?>" disabled="disabled" /> <em>(enter the HEX code including the '#' for the title color, ex: #ab15e8)</em>
                </label>
            </p>
            <p>
                <label>
                    Description color: <input type="text" size="9" name="displaywp_metabox_template_options[home][hot_offer][description_color]" value="<?php echo esc_attr($displaywp_metabox_template_options['home']['hot_offer']['description_color']); ?>" disabled="disabled" /> <em>(enter the HEX code including the '#' for the description color, ex: #ab15e8)</em>
                </label>
            </p>
            <p>
                <label>
                    Date color: <input type="text" size="9" name="displaywp_metabox_template_options[home][hot_offer][date_color]" value="<?php echo esc_attr($displaywp_metabox_template_options['home']['hot_offer']['date_color']); ?>" disabled="disabled" /> <em>(enter the HEX code including the '#' for the date color, ex: #ab15e8)</em>
                </label>
            </p>
            <p>
                <label>
                    Background color: <input type="text" size="9" name="displaywp_metabox_template_options[home][hot_offer][background]" value="<?php echo esc_attr($displaywp_metabox_template_options['home']['hot_offer']['background']); ?>" disabled="disabled" /> <em>(enter the HEX code including the '#' for the background color, ex: #ab15e8)</em>
                </label>
            </p>
            <p>
                <label>
                    Border color: <input type="text" size="9" name="displaywp_metabox_template_options[home][hot_offer][border]" value="<?php echo esc_attr($displaywp_metabox_template_options['home']['hot_offer']['border']); ?>" disabled="disabled" /> <em>(enter the HEX code including the '#' for the lower border color, ex: #ab15e8)</em>
                </label>
            </p>
            <p>
                <label>
                    <input type="hidden" name="displaywp_metabox_template_options[home][hot_offer][wide]" value="0" /><input type="checkbox" name="displaywp_metabox_template_options[home][hot_offer][wide]" <?php checked($displaywp_metabox_template_options['home']['hot_offer']['wide']); ?> value="1" /> Wide<br/><em>(make the section have full page width)</em>
                </label>
            </p>
            <p>
                <label>
                    URL: <input type="text" class="widefat" name="displaywp_metabox_template_options[home][hot_offer][url]" value="<?php echo esc_attr($displaywp_metabox_template_options['home']['hot_offer']['url']); ?>" disabled="disabled" /> <em>(optional, it will be applied to the title and description)</em>
                </label>
            </p>
        </div>
        <br/>
        <p>
            <strong>"Toggle List" section options:</strong>
        </p>
        <?php displaywp_metabox_template_input_disable_section_checkbox('displaywp_metabox_template_options[home][toggle][disable_section]',$displaywp_metabox_template_options['home']['toggle']['disable_section']); ?>
        <div class="tesla_template_section">
            <p>
                <label>
                    Title: <input type="text" class="widefat" name="displaywp_metabox_template_options[home][toggle][title]" value="<?php echo esc_attr($displaywp_metabox_template_options['home']['toggle']['title']); ?>" disabled="disabled" /> <em>(wrap in a &lt;span&gt; for bold effect)</em>
                </label>
            </p>
            <p>
                <label>
                    Subtitle: <input type="text" class="widefat" name="displaywp_metabox_template_options[home][toggle][subtitle]" value="<?php echo esc_attr($displaywp_metabox_template_options['home']['toggle']['subtitle']); ?>" disabled="disabled" />
                </label>
            </p>
            <p>
                Category: <?php displaywp_metabox_template_input_select_term('displaywp_metabox_template_options[home][toggle][category]','displaywp_toggle_tax',$displaywp_metabox_template_options['home']['toggle']['category']); ?> <em>(set the category that the items would be taken from, set to "no category" to take all the posts)</em>
            </p>
            <p>
                <label>
                    Nr: <input type="text" size="3" name="displaywp_metabox_template_options[home][toggle][nr]" value="<?php echo esc_attr($displaywp_metabox_template_options['home']['toggle']['nr']); ?>" disabled="disabled" /> <em>(limits the nr of items, set to 0 to show all)</em>
                </label>
            </p>
            <p>
                <strong>Note: </strong><em>Add content at Dashboard > Toggle List.</em>
            </p>
        </div>
        <br/>
        <p>
            <strong>"Recent Posts" section options:</strong>
        </p>
        <?php displaywp_metabox_template_input_disable_section_checkbox('displaywp_metabox_template_options[home][recent_posts][disable_section]',$displaywp_metabox_template_options['home']['recent_posts']['disable_section']); ?>
        <div class="tesla_template_section">
            <p>
                <label>
                    Title: <input type="text" class="widefat" name="displaywp_metabox_template_options[home][recent_posts][title]" value="<?php echo esc_attr($displaywp_metabox_template_options['home']['recent_posts']['title']); ?>" disabled="disabled" /> <em>(wrap in a &lt;span&gt; for bold effect)</em>
                </label>
            </p>
            <p>
                Category: <?php displaywp_metabox_template_input_select_term('displaywp_metabox_template_options[home][recent_posts][category]','category',$displaywp_metabox_template_options['home']['recent_posts']['category']); ?> <em>(set the category that the items would be taken from, set to "no category" to take all the posts)</em>
            </p>
            <p>
                <label>
                    Nr: <input type="text" size="3" name="displaywp_metabox_template_options[home][recent_posts][nr]" value="<?php echo esc_attr($displaywp_metabox_template_options['home']['recent_posts']['nr']); ?>" disabled="disabled" /> <em>(limits the nr of items, set to 0 to show all)</em>
                </label>
            </p>
        </div>
        <br/>
        <p>
            <strong>Testimonials section options:</strong>
        </p>
        <?php displaywp_metabox_template_input_disable_section_checkbox('displaywp_metabox_template_options[home][testimonials][disable_section]',$displaywp_metabox_template_options['home']['testimonials']['disable_section']); ?>
        <div class="tesla_template_section">
            <p>
                Section background image:
                <br/>
                <?php displaywp_metabox_template_input_image('displaywp_metabox_template_options[home][testimonials][background]',$displaywp_metabox_template_options['home']['testimonials']['background']); ?>
                <br/>
                <em>(after you have added an image you can change it by clicking on the image or remove it)</em>
            </p>
            <p>
                <label>
                    <input type="hidden" name="displaywp_metabox_template_options[home][testimonials][wide]" value="0" /><input type="checkbox" name="displaywp_metabox_template_options[home][testimonials][wide]" <?php checked($displaywp_metabox_template_options['home']['testimonials']['wide']); ?> value="1" /> Wide<br/><em>(make the section have full page width)</em>
                </label>
            </p>
            <p>
                <label>
                    Nr: <input type="text" size="3" name="displaywp_metabox_template_options[home][testimonials][nr]" value="<?php echo esc_attr($displaywp_metabox_template_options['home']['testimonials']['nr']); ?>" disabled="disabled" /> <em>(limits the nr of items, set to 0 to show all)</em>
                </label>
            </p>
            <p>
                <strong>Note: </strong><em>Add content at Dashboard > Testimonials.</em>
            </p>
        </div>
        <br/>
        <p>
            <strong>Clients slider options:</strong>
        </p>
        <?php displaywp_metabox_template_input_disable_section_checkbox('displaywp_metabox_template_options[home][clients][disable_section]',$displaywp_metabox_template_options['home']['clients']['disable_section']); ?>
        <div class="tesla_template_section">
            <p>
                <label>
                    Title: <input type="text" class="widefat" name="displaywp_metabox_template_options[home][clients][title]" value="<?php echo esc_attr($displaywp_metabox_template_options['home']['clients']['title']); ?>" disabled="disabled" /> <em>(wrap in a &lt;span&gt; for bold effect)</em>
                </label>
            </p>
            <p>
                <label>
                    Nr: <input type="text" size="3" name="displaywp_metabox_template_options[home][clients][nr]" value="<?php echo esc_attr($displaywp_metabox_template_options['home']['clients']['nr']); ?>" disabled="disabled" /> <em>(limits the nr of items, set to 0 to show all)</em>
                </label>
            </p>
            <p>
                <strong>Note: </strong><em>Add content at Dashboard > Clients Slider.</em>
            </p>
        </div>
        <br/>
        <p>
            <strong>Contact form options:</strong>
        </p>
        <?php displaywp_metabox_template_input_disable_section_checkbox('displaywp_metabox_template_options[home][contact][disable_section]',$displaywp_metabox_template_options['home']['contact']['disable_section']); ?>
        <div class="tesla_template_section">
            <p>
                <label>
                    Title: <input type="text" class="widefat" name="displaywp_metabox_template_options[home][contact][title]" value="<?php echo esc_attr($displaywp_metabox_template_options['home']['contact']['title']); ?>" disabled="disabled" />
                </label>
            </p>
            <p>
                <label>
                    Subtitle: <input type="text" class="widefat" name="displaywp_metabox_template_options[home][contact][subtitle]" value="<?php echo esc_attr($displaywp_metabox_template_options['home']['contact']['subtitle']); ?>" disabled="disabled" />
                </label>
            </p>
            <p>
                <label>
                    Form title: <input type="text" class="widefat" name="displaywp_metabox_template_options[home][contact][form_title]" value="<?php echo esc_attr($displaywp_metabox_template_options['home']['contact']['form_title']); ?>" disabled="disabled" />
                </label>
            </p>
            <p>
                <label>
                    Submit button text: <input type="text" class="widefat" name="displaywp_metabox_template_options[home][contact][button]" value="<?php echo esc_attr($displaywp_metabox_template_options['home']['contact']['button']); ?>" disabled="disabled" />
                </label>
            </p>
            <p>
                Section background image:
                <br/>
                <?php displaywp_metabox_template_input_image('displaywp_metabox_template_options[home][contact][background]',$displaywp_metabox_template_options['home']['contact']['background']); ?>
                <br/>
                <em>(after you have added an image you can change it by clicking on the image or remove it)</em>
            </p>
            <p>
                Section background image:
                <br/>
                <?php displaywp_metabox_template_input_image('displaywp_metabox_template_options[home][contact][address_icon]',$displaywp_metabox_template_options['home']['contact']['address_icon']); ?>
                <br/>
                <em>(after you have added an image you can change it by clicking on the image or remove it)</em>
            </p>
            <p>
                Section background image:
                <br/>
                <?php displaywp_metabox_template_input_image('displaywp_metabox_template_options[home][contact][mail_icon]',$displaywp_metabox_template_options['home']['contact']['mail_icon']); ?>
                <br/>
                <em>(after you have added an image you can change it by clicking on the image or remove it)</em>
            </p>
            <p>
                Section background image:
                <br/>
                <?php displaywp_metabox_template_input_image('displaywp_metabox_template_options[home][contact][phone_icon]',$displaywp_metabox_template_options['home']['contact']['phone_icon']); ?>
                <br/>
                <em>(after you have added an image you can change it by clicking on the image or remove it)</em>
            </p>
            <p>
                <label>
                    <?php displaywp_metabox_template_input_checkbox('displaywp_metabox_template_options[home][contact][wide]',$displaywp_metabox_template_options['home']['contact']['wide']); ?> Wide<br/><em>(make the section have full page width)</em>
                </label>
            </p>
            <p>
                <strong>Note: </strong><em>Configure additional options at Dashboard > Display > Contact Info.</em>
            </p>
        </div>
    </div>
    <?php
}

function displaywp_metabox_template_options_save($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

    if (!isset($_POST['displaywp_metabox_template_options_nonce']) || !wp_verify_nonce($_POST['displaywp_metabox_template_options_nonce']))
        return;

    if (!current_user_can('edit_post', $post_id))
        return;

    if (wp_is_post_revision($post_id) === false) {

        add_post_meta($post_id, 'displaywp_metabox_template_options', $_POST['displaywp_metabox_template_options'], true) or
                update_post_meta($post_id, 'displaywp_metabox_template_options', $_POST['displaywp_metabox_template_options']);
    }
}

function displaywp_metabox_page_options_get($post_id){

    $options = (array) get_post_meta($post_id, 'displaywp_metabox_page_options', true);

    $defaults = array(

        'layout' => 'default',
        'title_description' => '',

    );

    return displaywp_parse_args($options, $defaults);

}

function displaywp_metabox_page_options($post) {
    wp_nonce_field(-1, 'displaywp_metabox_page_options_nonce');
    $displaywp_metabox_page_options = displaywp_metabox_page_options_get($post->ID);
    ?>
    <p>
        Layout:
    </p>
    <p>
        <label>
            <input type="radio" name="displaywp_metabox_page_options[layout]" <?php checked($displaywp_metabox_page_options['layout'],'default'); ?> value="default" /> Default layout
            <br/>
            <em>(the title is displayed in the header, also a description under the title is possible)</em>
        </label>
    </p>
    <p>
        <label>
            <input type="radio" name="displaywp_metabox_page_options[layout]" <?php checked($displaywp_metabox_page_options['layout'],'blog'); ?> value="blog" /> Blog post layout
            <br/>
            <em>(the page has the same layout as a blog post)</em>
        </label>
    </p>
    <p>
        <label>
            <input type="radio" name="displaywp_metabox_page_options[layout]" <?php checked($displaywp_metabox_page_options['layout'],'clean'); ?> value="clean" /> Clean layout
            <br/>
            <em>(no details, no title)</em>
        </label>
    </p>
    <p>
        <label>
            Title description:
            <textarea class="widefat" style="overflow:scroll;resize:vertical;white-space:nowrap;" cols="20" rows="5" name="displaywp_metabox_page_options[title_description]" /><?php echo esc_textarea($displaywp_metabox_page_options['title_description']); ?></textarea>
            <em>(this will appear below the title, valid only for big header layout)</em>
        </label>
    </p>
    <?php
}

function displaywp_metabox_page_options_save($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

    if (!isset($_POST['displaywp_metabox_page_options_nonce']) || !wp_verify_nonce($_POST['displaywp_metabox_page_options_nonce']))
        return;

    if (!current_user_can('edit_post', $post_id))
        return;

    if (wp_is_post_revision($post_id) === false) {

        if(isset($_POST['displaywp_metabox_page_options']))
            $displaywp_metabox_page_options = $_POST['displaywp_metabox_page_options'];
        else
            $displaywp_metabox_page_options = array();

        add_post_meta($post_id, 'displaywp_metabox_page_options', $displaywp_metabox_page_options, true) or
                update_post_meta($post_id, 'displaywp_metabox_page_options', $displaywp_metabox_page_options);
    }
}

function displaywp_metabox_video_get($post_id){

    $options = (array) get_post_meta($post_id, 'displaywp_metabox_video', true);

    $defaults = array(

        'video' => ''

    );

    return displaywp_parse_args($options, $defaults);

}

function displaywp_metabox_video($post) {
    wp_nonce_field(-1, 'displaywp_metabox_video_nonce');
    $displaywp_metabox_video = displaywp_metabox_video_get($post->ID);
    ?>
    <p>
        <label>
            <input class="widefat" type="text" name="displaywp_metabox_video[video]" value="<?php echo esc_attr($displaywp_metabox_video['video']); ?>" />
            <br/>
            <em>(paste the embedded code here)</em>
        </label>
    </p>
    <?php
}

function displaywp_metabox_video_save($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

    if (!isset($_POST['displaywp_metabox_video_nonce']) || !wp_verify_nonce($_POST['displaywp_metabox_video_nonce']))
        return;

    if (!current_user_can('edit_post', $post_id))
        return;

    if (wp_is_post_revision($post_id) === false) {

        if(isset($_POST['displaywp_metabox_video']))
            $displaywp_metabox_video = $_POST['displaywp_metabox_video'];
        else
            $displaywp_metabox_video = array();

        add_post_meta($post_id, 'displaywp_metabox_video', $displaywp_metabox_video, true) or
                update_post_meta($post_id, 'displaywp_metabox_video', $displaywp_metabox_video);
    }
}

function displaywp_add_meta_boxes() {

    add_meta_box('displaywp_metabox_template_options', 'Template options', 'displaywp_metabox_template_options', 'page', 'normal', 'high');

    add_meta_box('displaywp_metabox_page_options', 'Page options', 'displaywp_metabox_page_options', 'page', 'side', 'core');

    add_meta_box('displaywp_metabox_video', 'Featured Video', 'displaywp_metabox_video', 'post', 'side', 'core');

    add_meta_box('displaywp_metabox_video', 'Featured Video', 'displaywp_metabox_video', 'page', 'side', 'core');

}

add_action('add_meta_boxes', 'displaywp_add_meta_boxes');

add_action('save_post', 'displaywp_metabox_template_options_save');

add_action('save_post', 'displaywp_metabox_page_options_save');

add_action('save_post', 'displaywp_metabox_video_save');



/*============================== AJAX ======================================================================================================================*/

function displaywp_contact_ajax(){

    $receiver_mail = _go('email_contact');
    if(!empty($receiver_mail))
    {
        $mail_title_prefix = _go('email_prefix');
        if(empty($mail_title_prefix))
            $mail_title_prefix = '';
        if( !empty($_POST['displaywp-name']) && !empty($_POST['displaywp-email']) && !empty($_POST['displaywp-message']) ){
                $subject = $mail_title_prefix._x(' message from ', 'contact form','displaywp').$_POST['displaywp-name'].' ('.$_POST['displaywp-email'].')';
            $reply_to = is_email($_POST['displaywp-email']);
            if(false!==$reply_to){
                $reply_to = !empty($_POST['displaywp-name']) ? $_POST['displaywp-name'] . '<' . $reply_to . '>' : $reply_to;
                $headers = '';
                $headers .= 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $headers .= 'From: ['.get_bloginfo('name').']' . "\r\n";
                $headers .= 'Reply-to: ' . $reply_to . "\r\n";
                if ( mail($receiver_mail, $subject, $_POST['displaywp-message'].(!empty($_POST['displaywp-website'])?"\n\n".'Website: '.$_POST['displaywp-website']:''), $headers) )
                    $result = _x("Your message was successfully sent.", 'contact form','displaywp');
                else
                    $result = _x("Operation could not be completed.", 'contact form','displaywp');
            }else{
                $result = _x("You have provided an invalid e-mail address.", 'contact form','displaywp');
            }
        }else
        {
            $result = _x("Please fill in all the required fields.", 'contact form','displaywp');
        }
    }else{
        $result = _x('Error! There is no e-mail configured to receive the messages.', 'contact form','displaywp');
    }
    echo $result;
    die;

}
add_action( "wp_ajax_displaywp_contact", "displaywp_contact_ajax" );
add_action( "wp_ajax_nopriv_displaywp_contact", "displaywp_contact_ajax" );



/*============================== VIDEO ======================================================================================================================*/

function displaywp_embed_oembed_html($html) {

    return '<div class="displaywp_video_wrapper">'.$html.'</div>';
    
}

add_filter( 'embed_oembed_html', 'displaywp_embed_oembed_html');



/*============================== EXCERPT ======================================================================================================================*/

function displaywp_excerpt($excerpt, $content){

    if(''!==$excerpt){

        $text = $excerpt;

        $text = apply_filters('get_the_excerpt', $text);

    }else{

        $text = $content;

        $text = strip_shortcodes( $text );

        $text = apply_filters('the_content', $text);
        $text = str_replace(']]>', ']]&gt;', $text);
        $excerpt_length = apply_filters('excerpt_length', 55);
        $excerpt_more = apply_filters('excerpt_more', ' ' . '[&hellip;]');
        $text = wp_trim_words( $text, $excerpt_length, $excerpt_more );

        $text = apply_filters('wp_trim_excerpt', $text, $text);

    }

    return $text;

}



/*============================== MENU ======================================================================================================================*/

class Displaywp_Nav_Menu_Walker extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $value . $class_names .'>';

        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        
        $item_output .= $args->link_before . apply_filters( 'the_title', strip_tags($item->title), $item->ID ) . (''!==$item->description?'<span>'.$item->description.'</span>':'') . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}

class Displaywp_Walker_Page extends Walker_Page {
    function start_el( &$output, $page, $depth = 0, $args = array(), $current_page = 0 ) {
        if ( $depth )
            $indent = str_repeat("\t", $depth);
        else
            $indent = '';

        extract($args, EXTR_SKIP);
        $css_class = array('page_item', 'page-item-'.$page->ID);

        if( isset( $args['pages_with_children'][ $page->ID ] ) )
            $css_class[] = 'page_item_has_children';

        if ( !empty($current_page) ) {
            $_current_page = get_post( $current_page );
            if ( in_array( $page->ID, $_current_page->ancestors ) )
                $css_class[] = 'current_page_ancestor';
            if ( $page->ID == $current_page )
                $css_class[] = 'current_page_item';
            elseif ( $_current_page && $page->ID == $_current_page->post_parent )
                $css_class[] = 'current_page_parent';
        } elseif ( $page->ID == get_option('page_for_posts') ) {
            $css_class[] = 'current_page_parent';
        }

        $css_class = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page ) );

        if ( '' === $page->post_title )
            $page->post_title = sprintf( __( '#%d (no title)' ), $page->ID );

        $output .= $indent . '<li class="' . $css_class . '"><a href="' . get_permalink($page->ID) . '">' . $link_before . apply_filters( 'the_title', strip_tags($page->post_title), $page->ID ) . $link_after . '</a>';

        if ( !empty($show_date) ) {
            if ( 'modified' == $show_date )
                $time = $page->post_modified;
            else
                $time = $page->post_date;

            $output .= " " . mysql2date($date_format, $time);
        }
    }
}



/*============================== LIBRARIES ======================================================================================================================*/

if ( is_admin() && current_user_can( 'install_themes' ) ) {
    require_once( get_template_directory() . '/lib/tgm-plugin-activation/register-plugins.php' );
}



/*============================== CUSTOM TAXONOMY TERMS ORDER ======================================================================================================================*/

$zoomy_portfolio_tax = new Tesla_slider_tax('displaywp_project_tax');
$zoomy_portfolio_tax->add_order();



/*============================== SHORTCODES ======================================================================================================================*/

function displaywp_posts_latest( $atts, $content = null ){

    extract(shortcode_atts(array(
        'nr' => 5,
        'category' => '',
        'title' => _x('recent <span>posts</span>','[displaywp_posts_latest] shortcode','displaywp')
    ), $atts));

    $output = '';

    if(''!==$title)
        $output .= '<h1>'.$title.'</h1>';

    $args = array(
        'numberposts' => $nr,
        'orderby' => 'post_date',
        'order' => 'DESC',
        'post_type' => 'post',
        'post_status' => 'publish',
        'post__not_in' => get_option( 'sticky_posts' ),
        'category_name' => $category
    );

    $query = get_posts($args);

    if(count($query)){

        foreach($query as $i => $q){

            setup_postdata($q);

            $output .= '<div class="recent-post'.(!has_post_thumbnail($q->ID)?' no-thumbnail':'').'">';

            if(has_post_thumbnail($q->ID)){

                $output .= '<div class="recent-post-cover"><a href="'.get_permalink($q->ID).'">'.get_the_post_thumbnail($q->ID).'</a></div>';

            }

            $output .= '<h4><a href="'.get_permalink($q->ID).'">'.get_the_title($q->ID).'</a></h4><div class="recent-post-date">'.get_the_time('j M',$q->ID).'</div></div>';

        }

        wp_reset_postdata();

    }

    return $output;

}

add_shortcode('displaywp_posts_latest', 'displaywp_posts_latest');

function displaywp_posts_tabs( $atts, $content = null ){

    extract(shortcode_atts(array(
        'nr' => 3,
        'categories' => '',
        'title' => _x('Tabs','[displaywp_posts_tabs] shortcode','displaywp')
    ), $atts));

    global $displaywp_posts_tabs_id;

    if(!isset($displaywp_posts_tabs_id))
        $displaywp_posts_tabs_id = 0;
    else
        $displaywp_posts_tabs_id++;

    $output = '';

    if (!empty($title))
        $output .= '<h1>'.$title.'</h1>';

    $categories = explode(',', $categories);

    foreach ($categories as $key => $value) {
        $value = trim($value);
        $categories[$key] = $value;
        if(!empty($value))
            $categories[$key] = get_category_by_slug($value);
        else
            unset($categories[$key]);
    }

    if(count($categories)){
        $output .= '<div class="tabs"><ul class="tab_nav">';

        foreach ($categories as $key => $value)
            $output .= '<li'.(!$key?' class="active"':'').'><a href="#'.$value->term_id.'-'.$displaywp_posts_tabs_id.'" data-toggle="tab">'.$value->name.'</a></li>';

        $output .= '</ul><div class="clear"></div><div class="tab-content">';

        foreach ($categories as $key => $value) {
            $output .= '<div class="tab-pane'.(!$key?' active':'').'" id="'.$value->term_id.'-'.$displaywp_posts_tabs_id.'">';
            $args = array(
                'numberposts' => $nr,
                'category' => $value->term_id,
                'orderby' => 'post_date',
                'order' => 'DESC',
                'post_type' => 'post',
                'post_status' => 'publish',
            );
            $query = get_posts($args);
            if(count($query))
                foreach($query as $q){
                    setup_postdata($q);
                    $output .= '<div class="row-fluid">';
                    if(has_post_thumbnail($q->ID))
                        $output .= '<div class="span4"><div class="tab-cover"><a href="'.get_permalink($q->ID).'">'.get_the_post_thumbnail($q->ID).'</a></div></div>';
                    $output .= '<div class="span'.(has_post_thumbnail($q->ID)?'8':'12').'"><h4><a href="'.get_permalink($q->ID).'">'.get_the_title($q->ID).'</a></h4><div class="tab-date">'.get_the_time('j M', $q->ID).'</div></div>';
                    $output .= '</div>';
                }
            else
                $output .= '<p>'.__('No posts.','displaywp').'</p>';
            $output .= '</div>';
        }
        wp_reset_postdata();

        $output .= '</div></div>';
    }

    return $output;

}

add_shortcode('displaywp_posts_tabs', 'displaywp_posts_tabs');

function displaywp_portfolio( $atts, $content = null ){

    $displaywp_project_options = shortcode_atts(array(
        'nr' => 0,
        'columns' => 3,
        'items_per_page' => 12,
        'wide_filter' => true,
        'background' => '',
        'title' => '',
        'subtitle' => '',
        'wide_header' => true,
        'view_all' => '',
        'single_filter' => false
    ), $atts);

    $output = '';

    $categories_query = displaywp_get_query('categories');

    if(''!==$categories_query){

        $categories = explode(' ',$categories_query);

        $tax_query = array(
            array(
                'taxonomy' => 'displaywp_project_tax',
                'field' => 'slug',
                'terms' => $categories,
                'operator' => 'IN'
            )
        );

    }else{

        $categories = array();

        $tax_query = array();

    }

    $posts = get_posts(array(

        'post_type' => 'displaywp_project',
        'posts_per_page' => -1,
        'tax_query' => $tax_query

    ));

    $count_posts = count($posts);

    if($count_posts):

        $posts_per_page = !$displaywp_project_options['nr'] ? $displaywp_project_options['items_per_page'] : $displaywp_project_options['nr'];

        $current_page = !$displaywp_project_options['nr'] ? max(1, displaywp_get_query('page')) : 1;

        $custom = $displaywp_project_options;
        $custom['categories'] = $categories;

        $output .= Tesla_slider::get_slider_html('displaywp_project',array(

            'query' => array(
                'posts_per_page' => $posts_per_page,
                'paged' => $current_page,
                'tax_query' => $tax_query
            ),
            'custom' => $custom

        ));

        if(!$displaywp_project_options['nr']){

            if($posts_per_page>0)
                $total_pages = ceil($count_posts/$posts_per_page);
            else
                $total_pages = 1;

            global $wp_query;
            $big = 999999999; // need an unlikely big integer
            if ($total_pages > 1) {
                if(''!==$categories_query)
                    $url = add_query_arg('categories',$categories_query,get_permalink());
                else
                    $url = get_permalink();

                $output .= paginate_links(array(
                    'base' => str_replace($big, '%#%', esc_url(add_query_arg('page',$big,$url))),
                    'format' => '?page=%#%',
                    'current' => $current_page,
                    'total' => $total_pages,
                    'type' => 'list',
                    'next_text' => _x('&rarr;', 'pagination', 'displaywp'),
                    'prev_text' => _x('&larr;', 'pagination', 'displaywp'),
                ));
            }

        }

    endif;

    return $output;

}

add_shortcode('displaywp_portfolio', 'displaywp_portfolio');

function displaywp_hot_offer( $atts, $content = null ){

    extract(shortcode_atts(array(
        'title' => '',
        'description' => '',
        'date' => '',
        'title_color' => '',
        'description_color' => '',
        'date_color' => '',
        'background' => '',
        'border' => '',
        'wide' => true,
        'url' => ''
    ), $atts));

    $wide = $wide === 'false' ? false : (bool) $wide;

    $output = '';

    if($wide){
        $output .= '</div>';
    }

    $output .= '<div class="hot-offer" style="'.(''!==$background?'background:'.$background.';':'').(''!==$border?'border-bottom-color:'.$border.';':'').'">
        <div class="container">
            <div class="row">
                <div class="span4">
                <h1 style="'.(''!==$title_color?'color:'.$title_color.';':'').'">
                    '.(''===$url?$title:'<a href="'.$url.'">'.$title.'</a>').'
                </h1>
                </div>
                <div class="span8">
                <h2 style="'.(''!==$description_color?'color:'.$description_color.';':'').'">
                    '.(''===$url?$description:'<a href="'.$url.'">'.$description.'</a>').'
                </h2>
                <p style="'.(''!==$date_color?'color:'.$date_color.';':'').'">
                    '.$date.'
                </p>
                </div>
            </div>
        </div>
    </div>';

    if($wide){
        $output .= '<div class="container">';
    }

    return $output;

}

add_shortcode('displaywp_hot_offer', 'displaywp_hot_offer');

function displaywp_contact( $atts, $content = null ){

    extract(shortcode_atts(array(
        'title' => _x('Contact us','contact shortcode','displaywp'),
        'subtitle' => _x('it is all about us','contact shortcode','displaywp'),
        'form_title' => _x('Drop us a line','contact shortcode','displaywp'),
        'button' => _x('Drop us a line','contact shortcode','displaywp'),
        'background' => '',
        'address_icon' => '',
        'mail_icon' => '',
        'phone_icon' => '',
        'wide' => true
    ), $atts));

    $wide = $wide === 'false' ? false : (bool) $wide;

    $output = '';

    if($wide){
        $output .= '</div>';
    }

    $phones = _go_repeated('Phone numbers');
    $phones_html = '';
    foreach($phones as $i => $phone){
        if($i)
            $phones_html .= '<br/>';
        $phones_html .= $phone['office_phone'];
    }

    $output .= '<div class="contact-box" style="background: '.(''!==$background?"url('".$background."') top center fixed":'none').';">
            <div class="contact-box-bg">
                <div class="container">
                    <h1 class="center">'.$title.(''!==$subtitle?'<br/><span>'.$subtitle.'</span>':'').'</h1>
                    <br/>
                    <div class="row">
                        <div class="span4">
                            '.(''!==$address_icon?'<div class="center"><img src="'.$address_icon.'" alt="contact image"></div>':'').'
                            <h3 class="center">'._x('Address','contact shortcode','displaywp').'</h3>
                            <p>'.nl2br(_go('office_address')).'</p>
                        </div>
                        <div class="span4">
                            '.(''!==$mail_icon?'<div class="center"><img src="'.$mail_icon.'" alt="contact image"></div>':'').'
                            <h3 class="center">'._x('Mail','contact shortcode','displaywp').'</h3>
                            <p>'._go('office_email').'</p>
                        </div>
                        <div class="span4">
                            '.(''!==$phone_icon?'<div class="center"><img src="'.$phone_icon.'" alt="contact image"></div>':'').'
                            <h3 class="center">'._x('Phone','contact shortcode','displaywp').'</h3>
                            <p>'.$phones_html.'</p>
                        </div>
                    </div>

                    '.($form_title!==''?'<div class="contact-title"><span>'.$form_title.'</span></div>':'').'
                    <form class="contact-box-form" id="contact_form">
                    <input name="action" type="hidden" value="displaywp_contact" />
                    <div class="row">
                        <div class="span8">
                            <input type="text" name="displaywp-name" class="contact-box-line" placeholder="'.esc_attr(_x('Name','contact shortcode','displaywp')).'">
                            <input type="text" name="displaywp-email" class="contact-box-line" placeholder="'.esc_attr(_x('E-mail','contact shortcode','displaywp')).'">
                        </div>
                        <div class="span4">
                            <textarea name="displaywp-message" placeholder="'.esc_attr(_x('Message','contact shortcode','displaywp')).'" class="contact-box-area"></textarea>   
                        </div>                        
                    </div>
                        <input type="submit" id="contact_send" value="'.esc_attr($button).'" class="button-2">
                    </form>
                </div>
            </div>
        </div>';

    if($wide){
        $output .= '<div class="container">';
    }

    return $output;

}

add_shortcode('displaywp_contact', 'displaywp_contact');

function displaywp_column_first( $atts, $content = null ){
    extract(shortcode_atts(array(
            'size' => 4,
            'offset' => 0,
            'style' => '',
        ), $atts));
    $size = (int)$size;
    return '<div class="row-fluid"><div class="span'.$size.($offset?' offset'.$offset:'').'" style="'.$style.'">'.do_shortcode($content).'</div>';
}
function displaywp_column( $atts, $content = null ){
    extract(shortcode_atts(array(
            'size' => 4,
            'offset' => 0,
            'style' => '',
        ), $atts));
    $size = (int)$size;
    return '<div class="span'.$size.($offset?' offset'.$offset:'').'" style="'.$style.'">'.do_shortcode($content).'</div>';
}
function displaywp_column_last( $atts, $content = null ){
    extract(shortcode_atts(array(
            'size' => 4,
            'offset' => 0,
            'style' => '',
        ), $atts));
    $size = (int)$size;
    return '<div class="span'.$size.($offset?' offset'.$offset:'').'" style="'.$style.'">'.do_shortcode($content).'</div></div>';
}
add_shortcode( 'displaywp_column_first', 'displaywp_column_first' );
add_shortcode( 'displaywp_column', 'displaywp_column' );
add_shortcode( 'displaywp_column_last', 'displaywp_column_last' );