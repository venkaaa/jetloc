<?php

/* URI shortcuts
================================================== */
define( 'THEME_ASSETS', get_template_directory_uri() . '/assets/', true );
define( 'TEMPLATEPATH', get_template_directory_uri(), true );
define( 'GETTEXT_DOMAIN', '123medicine' );

require_once dirname( __FILE__ ) . '/functions/reset.php';

require_once dirname( __FILE__ ) . '/functions/class-tgm-plugin-activation.php';
require_once dirname( __FILE__ ) . '/functions/class-tgm-plugin-register.php';


/* Register and load JS, CSS
================================================== */
function lpd_enqueue_scripts() {

    wp_register_style('woocommerce', THEME_ASSETS . 'css/woocommerce.css');
    
    wp_register_style('no-responsive-css', THEME_ASSETS . 'css/no-responsive.css');
    wp_register_style('no-responsive-960-css', THEME_ASSETS . 'css/no-responsive-960.css');
    wp_register_style('responsive-css', THEME_ASSETS . 'css/responsive.css');
    wp_register_style('responsive-960-css', THEME_ASSETS . 'css/responsive-960.css');

	// register scripts;
    wp_register_script('bootstrap', THEME_ASSETS.'js/bootstrap.js', false, false, true);
    wp_register_script('custom', THEME_ASSETS.'js/custom.functions.js', false, false, true);
    wp_register_script('sticky-menu', THEME_ASSETS.'js/sticky_menu.js', false, false, true);
    wp_register_script('fadeout-elements', THEME_ASSETS.'js/fadeout_elements.js', false, false, true);
    
	wp_register_script('rotate-patch', THEME_ASSETS.'Multi_Purpose_Media_Boxes/plugin/js/rotate-patch.js', false, false, true);
	wp_register_script('waypoints', THEME_ASSETS.'Multi_Purpose_Media_Boxes/plugin/js/waypoints.min.js', false, false, true);
	wp_register_script('mediaBoxes', THEME_ASSETS.'Multi_Purpose_Media_Boxes/plugin/js/mediaBoxes.js', false, false, true);
	wp_register_style('mediaBoxes', THEME_ASSETS . 'Multi_Purpose_Media_Boxes/plugin/css/mediaBoxes.css');
	
	wp_register_script('no-responsive-js', THEME_ASSETS.'js/no-responsive.function.js', false, false, false);
	wp_register_script('responsive-js', THEME_ASSETS.'js/responsive.function.js', false, false, false);
	
	// enqueue scripts
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrap');
	wp_enqueue_script('custom');
	
	wp_enqueue_script('rotate-patch');
	wp_enqueue_script('waypoints');
	wp_enqueue_script('mediaBoxes');
	wp_enqueue_style( 'mediaBoxes');
 
    if ( is_singular() ) wp_enqueue_script( "comment-reply" );   

}
add_action('wp_enqueue_scripts', 'lpd_enqueue_scripts');


function lpd_theme_style() {
	wp_enqueue_style( 'lpd-style', get_bloginfo( 'stylesheet_url' ), array(), '1.0' );
}
add_action( 'wp_enqueue_scripts', 'lpd_theme_style' );

function lpd_ie_style() {

	wp_register_style('ie_css', THEME_ASSETS . 'css.css');
	
    $GLOBALS['wp_styles']->add_data( 'ie_css', 'conditional', 'lte IE 8' );
    wp_enqueue_style( 'ie_css' );
	
}
add_action( 'wp_enqueue_scripts', 'lpd_ie_style' );

function lpd_ie_html5() {
	global $is_IE;
	if ( $is_IE ) {
		echo '<!--[if lt IE 9]>';
		echo '<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>';
		echo '<![endif]-->';
	}
}
add_action( 'wp_head', 'lpd_ie_html5' );


function lpd_fadeout_elements() {
	wp_enqueue_script('fadeout-elements');
}
function lpd_sticky_menu() {
	wp_enqueue_script('sticky-menu');
}
function lpd_woocommerce_styles() {
	wp_enqueue_style('woocommerce');
}
function lpd_woocommerce_rating_style() {
	wp_enqueue_style('woocommerce-rating');
}
function lpd_fixed_1170() {
	wp_enqueue_script('no-responsive-js');
	wp_enqueue_style('no-responsive-css');
}
function lpd_fixed_960() {
	wp_enqueue_script('no-responsive-js');
	wp_enqueue_style('no-responsive-css-css');
	wp_enqueue_style('no-responsive-960-css');
}
function lpd_responsive() {
	wp_enqueue_style('responsive-css');
	wp_enqueue_script('responsive-js');
}
function lpd_responsive_960() {
	wp_enqueue_style('responsive-960-css');
}
function lpd_add_admin_scripts( $hook ) {

    if ( $hook == 'post-new.php' || $hook == 'post.php' ) {    
	wp_enqueue_script('jquery-ui-datepicker');
	wp_enqueue_script('jquery-ui-slider');
	wp_enqueue_script('custom-js', get_template_directory_uri().'/functions/metabox/js/custom-js.js');
	wp_enqueue_style('jquery-ui-custom', get_template_directory_uri().'/functions/metabox/css/jquery-ui-custom.css');
    }
}
add_action( 'admin_enqueue_scripts', 'lpd_add_admin_scripts', 10, 1 );

require_once dirname( __FILE__ ) . '/functions/sidebar.php';
require_once dirname( __FILE__ ) . '/functions/Functions.php';


require_once (TEMPLATEPATH. '/functions/theme_walker.php');
require_once (TEMPLATEPATH. '/functions/theme_video.php');
require_once (TEMPLATEPATH. '/functions/theme_comments.php');
require_once (TEMPLATEPATH. '/functions/theme_breadcrumb.php');
require_once (TEMPLATEPATH. '/functions/lpd_title.php');
require_once (TEMPLATEPATH. '/functions/shortcodes.php');
include_once (TEMPLATEPATH. '/admin/shortcode-tinymce.php');
include_once (TEMPLATEPATH. '/functions/woocommerce.php');
include_once (TEMPLATEPATH. '/functions/ggl_web_fonts.php');

/*  visual composer
================================================== */
if (!class_exists('WPBakeryVisualComposerAbstract')) {
  $dir = dirname(__FILE__) . '/wpbakery/';
  $composer_settings = Array(
      'APP_ROOT'      => $dir . '/js_composer',
      'WP_ROOT'       => dirname( dirname( dirname( dirname($dir ) ) ) ). '/',
      'APP_DIR'       => basename( $dir ) . '/js_composer/',
      'CONFIG'        => $dir . '/js_composer/config/',
      'ASSETS_DIR'    => 'assets/',
      'COMPOSER'      => $dir . '/js_composer/composer/',
      'COMPOSER_LIB'  => $dir . '/js_composer/composer/lib/',
      'SHORTCODES_LIB'  => $dir . '/js_composer/composer/lib/shortcodes/',
      'USER_DIR_NAME'  => 'vc_templates', /* Path relative to your current theme, where VC should look for new shortcode templates */
 
      //for which content types Visual Composer should be enabled by default
      'default_post_types' => Array('page')
  );
  require_once locate_template('/wpbakery/js_composer/js_composer.php');
  $wpVC_setup->init($composer_settings);
}

require_once (TEMPLATEPATH. '/functions/vc/vc_featured_modules.php');
require_once (TEMPLATEPATH. '/functions/vc/vc_module.php');
require_once (TEMPLATEPATH. '/functions/vc/vc_post_widget.php');
require_once (TEMPLATEPATH. '/functions/vc/vc_media_grid_widget.php');
require_once (TEMPLATEPATH. '/functions/vc/vc_meta_block.php');
require_once (TEMPLATEPATH. '/functions/vc/vc_iconitem.php');
require_once (TEMPLATEPATH. '/functions/vc/vc_icon_header.php');
require_once (TEMPLATEPATH. '/functions/vc/vc_blockquote.php');
require_once (TEMPLATEPATH. '/functions/vc/vc_new_button.php');
require_once (TEMPLATEPATH. '/functions/vc/vc_callout.php');
require_once (TEMPLATEPATH. '/functions/vc/vc_callout2.php');
require_once (TEMPLATEPATH. '/functions/vc/vc_testimonial.php');
require_once (TEMPLATEPATH. '/functions/vc/vc_divider.php');
require_once (TEMPLATEPATH. '/functions/vc/vc_add_shortcode.php');
require_once (TEMPLATEPATH. '/functions/vc/vc_woocommerce.php');

/* functions custom styles
================================================== */
require_once (TEMPLATEPATH. '/functions/fonts.php');
require_once (TEMPLATEPATH. '/functions/color.php');
#require_once (TEMPLATEPATH. '/functions/bg.php');
if (is_plugin_active('woocommerce/woocommerce.php')) {require_once (TEMPLATEPATH. '/functions/shop-styles.php');}

/* post type
================================================== */
include_once (TEMPLATEPATH. '/functions/post-type/portfolio.php');

/* metabox
================================================== */
include_once (TEMPLATEPATH. '/functions/metabox/functions/add_meta_box-sidebar.php');
include_once (TEMPLATEPATH. '/functions/metabox/functions/add_meta_box-grid-options.php');
include_once (TEMPLATEPATH. '/functions/metabox/functions/add_meta_box-portfolio-options.php');
;

include_once (TEMPLATEPATH. '/functions/metabox-post-format.php');
include_once (TEMPLATEPATH. '/functions/metabox-portfolio-format.php');

?>