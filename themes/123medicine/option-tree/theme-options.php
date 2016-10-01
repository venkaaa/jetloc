<?php
/**
 * Initialize the custom theme options.
 */
add_action( 'admin_init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => ''
    ),
    'sections'        => array( 
      array(
        'id'          => 'general_default',
        'title'       => __('General Settings', GETTEXT_DOMAIN),
      ),
		array(
			'id'          => 'navigation',
			'title'       => __('Menu Options', GETTEXT_DOMAIN),
		),
		array(
			'id'          => 'typography',
			'title'       => __('Typography', GETTEXT_DOMAIN),
		),
      array(
        'id'          => 'seo_settings',
        'title'       => __('SEO Settings', GETTEXT_DOMAIN),
      ),
      array(
        'id'          => 'theme_options',
        'title'       => __('Theme Settings', GETTEXT_DOMAIN),
      ),
      array(
        'id'          => 'footer_options',
        'title'       => __('Footer Options', GETTEXT_DOMAIN),
      ),
      array(
        'id'          => 'blog_options',
        'title'       => __('Blog Settings', GETTEXT_DOMAIN),
      ),
      array(
        'id'          => 'shop_options',
        'title'       => __('Shop Settings', GETTEXT_DOMAIN),
      ),
      array(
        'id'          => 'header_sm',
        'title'       => __('Header Social Media', GETTEXT_DOMAIN),
      ),
      array(
        'id'          => 'footer_meta',
        'title'       => __('Footer Meta', GETTEXT_DOMAIN),
      ),
    ),
    'settings'        => array(

      array(
        'id'          => 'st_buttons',
        'label'       => __('Share This Buttons', GETTEXT_DOMAIN),
        'desc'        => __('Paste the span tags "ShareThis" buttons, get your code for "ShareThis" buttons on <a href="http://www.sharethis.com/">http://www.sharethis.com/</a>', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'blog_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'st_javascript',
        'label'       => __('Share This Javascript', GETTEXT_DOMAIN),
        'desc'        => __('Paste the script tags "ShareThis" javascript, get your code for "ShareThis" javascript on <a href="http://www.sharethis.com/">http://www.sharethis.com/</a>', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'blog_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),

      array(
        'id'          => 'body_font_size',
        'label'       => __('Body Font Size', GETTEXT_DOMAIN),
        'desc'        => __('Set body font size.', GETTEXT_DOMAIN),
        'std'         => '13',
        'type'        => 'select',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '11',
            'label'       => '11',
            'src'         => ''
          ),
          array(
            'value'       => '12',
            'label'       => '12',
            'src'         => ''
          ),
          array(
            'value'       => '13',
            'label'       => '13',
            'src'         => ''
          ),
          array(
            'value'       => '14',
            'label'       => '14',
            'src'         => ''
          ),
          array(
            'value'       => '15',
            'label'       => '15',
            'src'         => ''
          ),
          array(
            'value'       => '16',
            'label'       => '16',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'body_font_family',
        'label'       => __('Body Font Family', GETTEXT_DOMAIN),
        'desc'        => __('Set body font family.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'select',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '',
            'label'       => '--- Google Webfonts ---',
            'src'         => ''
          ),
          array(
            'value'       => 'Open+Sans',
            'label'       => '"Open Sans", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Titillium+Web',
            'label'       => '"Titillium Web", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Oxygen',
            'label'       => '"Oxygen", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Quicksand',
            'label'       => '"Quicksand", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Lato',
            'label'       => '"Lato", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Raleway',
            'label'       => '"Raleway", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Source+Sans+Pro',
            'label'       => '"Source Sans Pro", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Dosis',
            'label'       => '"Dosis", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Exo',
            'label'       => '"Exo", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Arvo',
            'label'       => '"Arvo", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Vollkorn',
            'label'       => '"Vollkorn", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Ubuntu',
            'label'       => '"Ubuntu", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'PT+Sans',
            'label'       => '"PT Sans", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'PT+Serif',
            'label'       => '"PT Serif", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Droid+Sans',
            'label'       => '"Droid Sans", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Droid+Serif',
            'label'       => '"Droid Serif", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Cabin',
            'label'       => '"Cabin", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Lora',
            'label'       => '"Lora", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Oswald',
            'label'       => '"Oswald", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Varela+Round',
            'label'       => '"Varela Round", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Unna',
            'label'       => '"Unna", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Rokkitt',
            'label'       => '"Rokkitt", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Merriweather',
            'label'       => '"Merriweather", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Bitter',
            'label'       => '"Bitter", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Kreon',
            'label'       => '"Kreon", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Playfair+Display',
            'label'       => '"Playfair Display", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Roboto+Slab',
            'label'       => '"Roboto Slab", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Bree+Serif',
            'label'       => '"Bree Serif", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Libre+Baskerville',
            'label'       => '"Libre Baskerville", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Cantata+One',
            'label'       => '"Cantata One", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Alegreya',
            'label'       => '"Alegreya", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Noto+Serif',
            'label'       => '"Noto Serif", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'EB+Garamond',
            'label'       => '"EB Garamond", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Noticia+Text',
            'label'       => '"Noticia Text", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Old+Standard+TT',
            'label'       => '"Old Standard TT", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Crimson+Text',
            'label'       => '"Crimson Text", serif',
            'src'         => ''
          ),
          array(
            'value'       => '',
            'label'       => '--- System Fonts ---',
            'src'         => ''
          ),
          array(
            'value'       => '"Helvetica Neue", Helvetica, Arial, sans-serif',
            'label'       => '"Helvetica Neue", Helvetica, Arial, sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Arial, "Helvetica Neue", Helvetica, sans-serif',
            'label'       => 'Arial, "Helvetica Neue", Helvetica, sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Garamond, "Hoefler Text", Times New Roman, Times, serif',
            'label'       => 'Garamond, "Hoefler Text", Times New Roman, Times, serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Geneva, Verdana, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif',
            'label'       => 'Geneva, Verdana, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Georgia, Palatino, "Palatino Linotype", Times, "Times New Roman", serif',
            'label'       => 'Georgia, Palatino, "Palatino Linotype", Times, "Times New Roman", serif',
            'src'         => ''
          ),
          array(
            'value'       => '"Gill Sans", Calibri, "Trebuchet MS", sans-serif',
            'label'       => '"Gill Sans", Calibri, "Trebuchet MS", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => '"Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif',
            'label'       => '"Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Palatino, "Palatino Linotype", "Hoefler Text", Times, "Times New Roman", serif',
            'label'       => 'Palatino, "Palatino Linotype", "Hoefler Text", Times, "Times New Roman", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Tahoma, Geneva, Verdana, sans-serif',
            'label'       => 'Tahoma, Geneva, Verdana, sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Times, "Times New Roman", Georgia, serif',
            'label'       => 'Times, "Times New Roman", Georgia, serif',
            'src'         => ''
          ),
          array(
            'value'       => '"Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande", "Lucida Sans", Arial, sans-serif',
            'label'       => '"Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande", "Lucida Sans", Arial, sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Verdana, Tahoma, Geneva, sans-serif, sans-serif',
            'label'       => 'Verdana, Tahoma, Geneva, sans-serif, sans-serif',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'heading_font_family',
        'label'       => __('Heading Font Family', GETTEXT_DOMAIN),
        'desc'        => __('Set heading font family.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'select',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '',
            'label'       => '--- Google Webfonts ---',
            'src'         => ''
          ),
          array(
            'value'       => 'Open+Sans',
            'label'       => '"Open Sans", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Titillium+Web',
            'label'       => '"Titillium Web", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Oxygen',
            'label'       => '"Oxygen", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Quicksand',
            'label'       => '"Quicksand", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Lato',
            'label'       => '"Lato", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Raleway',
            'label'       => '"Raleway", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Source+Sans+Pro',
            'label'       => '"Source Sans Pro", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Dosis',
            'label'       => '"Dosis", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Exo',
            'label'       => '"Exo", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Arvo',
            'label'       => '"Arvo", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Vollkorn',
            'label'       => '"Vollkorn", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Ubuntu',
            'label'       => '"Ubuntu", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'PT+Sans',
            'label'       => '"PT Sans", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'PT+Serif',
            'label'       => '"PT Serif", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Droid+Sans',
            'label'       => '"Droid Sans", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Droid+Serif',
            'label'       => '"Droid Serif", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Cabin',
            'label'       => '"Cabin", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Lora',
            'label'       => '"Lora", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Oswald',
            'label'       => '"Oswald", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Varela+Round',
            'label'       => '"Varela Round", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Unna',
            'label'       => '"Unna", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Rokkitt',
            'label'       => '"Rokkitt", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Merriweather',
            'label'       => '"Merriweather", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Bitter',
            'label'       => '"Bitter", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Kreon',
            'label'       => '"Kreon", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Playfair+Display',
            'label'       => '"Playfair Display", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Roboto+Slab',
            'label'       => '"Roboto Slab", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Bree+Serif',
            'label'       => '"Bree Serif", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Libre+Baskerville',
            'label'       => '"Libre Baskerville", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Cantata+One',
            'label'       => '"Cantata One", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Alegreya',
            'label'       => '"Alegreya", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Noto+Serif',
            'label'       => '"Noto Serif", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'EB+Garamond',
            'label'       => '"EB Garamond", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Noticia+Text',
            'label'       => '"Noticia Text", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Old+Standard+TT',
            'label'       => '"Old Standard TT", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Crimson+Text',
            'label'       => '"Crimson Text", serif',
            'src'         => ''
          ),
          array(
            'value'       => '',
            'label'       => '--- System Fonts ---',
            'src'         => ''
          ),
          array(
            'value'       => '"Helvetica Neue", Helvetica, Arial, sans-serif',
            'label'       => '"Helvetica Neue", Helvetica, Arial, sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Arial, "Helvetica Neue", Helvetica, sans-serif',
            'label'       => 'Arial, "Helvetica Neue", Helvetica, sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Garamond, "Hoefler Text", Times New Roman, Times, serif',
            'label'       => 'Garamond, "Hoefler Text", Times New Roman, Times, serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Geneva, Verdana, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif',
            'label'       => 'Geneva, Verdana, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Georgia, Palatino, "Palatino Linotype", Times, "Times New Roman", serif',
            'label'       => 'Georgia, Palatino, "Palatino Linotype", Times, "Times New Roman", serif',
            'src'         => ''
          ),
          array(
            'value'       => '"Gill Sans", Calibri, "Trebuchet MS", sans-serif',
            'label'       => '"Gill Sans", Calibri, "Trebuchet MS", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => '"Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif',
            'label'       => '"Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Palatino, "Palatino Linotype", "Hoefler Text", Times, "Times New Roman", serif',
            'label'       => 'Palatino, "Palatino Linotype", "Hoefler Text", Times, "Times New Roman", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Tahoma, Geneva, Verdana, sans-serif',
            'label'       => 'Tahoma, Geneva, Verdana, sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Times, "Times New Roman", Georgia, serif',
            'label'       => 'Times, "Times New Roman", Georgia, serif',
            'src'         => ''
          ),
          array(
            'value'       => '"Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande", "Lucida Sans", Arial, sans-serif',
            'label'       => '"Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande", "Lucida Sans", Arial, sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Verdana, Tahoma, Geneva, sans-serif, sans-serif',
            'label'       => 'Verdana, Tahoma, Geneva, sans-serif, sans-serif',
            'src'         => ''
          )
        ),
      ),

      array(
        'id'          => 'h_sm_locations',
        'label'       => __('Social Media Locations', GETTEXT_DOMAIN),
        'desc'        => __('Select one of locations.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'select',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => 'none',
            'label'       => __('None', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'left_h',
            'label'       => __('Left Header', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'right_h',
            'label'       => __('Right Header', GETTEXT_DOMAIN),
            'src'         => ''
          ),
        ),
      ),
      array(
        'id'          => 'h_sm_label',
        'label'       => "Social Media Label",
        'desc'        => __("Enter a value for social media label.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_pinterest',
        'label'       => "pinterest",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_dropbox',
        'label'       => "dropbox",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_google_plus',
        'label'       => "google plus",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_jolicloud',
        'label'       => "jolicloud",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_yahoo',
        'label'       => "yahoo",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_blogger',
        'label'       => "blogger",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_picasa',
        'label'       => "picasa",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_amazon',
        'label'       => "amazon",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_tumblr',
        'label'       => "tumblr",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_wordpress',
        'label'       => "wordpress",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_instapaper',
        'label'       => "instapaper",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_evernote',
        'label'       => "evernote",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_xing',
        'label'       => "xing",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_zootool',
        'label'       => "zootool",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_dribbble',
        'label'       => "dribbble",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_deviantart',
        'label'       => "deviantart",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_read_it_later',
        'label'       => "read it later",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_linked_in',
        'label'       => "linked in",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_forrst',
        'label'       => "forrst",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_pinboard',
        'label'       => "pinboard",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_behance',
        'label'       => "behance",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_github',
        'label'       => "github",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_youtube',
        'label'       => "youtube",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_skitch',
        'label'       => "skitch",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_foursquare',
        'label'       => "foursquare",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_quora',
        'label'       => "quora",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_badoo',
        'label'       => "badoo",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_spotify',
        'label'       => "spotify",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_stumbleupon',
        'label'       => "stumbleupon",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_readability',
        'label'       => "readability",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_facebook',
        'label'       => "facebook",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_twitter',
        'label'       => "twitter",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_instagram',
        'label'       => "instagram",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_posterous_spaces',
        'label'       => "posterous spaces",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_vimeo',
        'label'       => "vimeo",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_flickr',
        'label'       => "flickr",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_last_fm',
        'label'       => "last fm",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_rss',
        'label'       => "rss",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_skype',
        'label'       => "skype",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_e_mail',
        'label'       => "e-mail",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_vine',
        'label'       => "vine",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_myspace',
        'label'       => "myspace",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_goodreads',
        'label'       => "goodreads",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_apple',
        'label'       => "apple",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_windows',
        'label'       => "windows",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_yelp',
        'label'       => "yelp",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_playstation',
        'label'       => "playstation",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_xbox',
        'label'       => "xbox",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_android',
        'label'       => "android",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h_ios',
        'label'       => "ios",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_sm',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),

      array(
        'id'          => 's_cart',
        'label'       => __('Shopping Cart', GETTEXT_DOMAIN),
        'desc'        => __('Check for disabling shopping cart.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'shop_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'Disable',
            'label'       => __('Disable', GETTEXT_DOMAIN),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 's_rating',
        'label'       => __('Rating', GETTEXT_DOMAIN),
        'desc'        => __('Check for disabling rating stars on front pages.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'shop_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'Disable',
            'label'       => __('Disable', GETTEXT_DOMAIN),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'loop_shop_per_page',
        'label'       => __('Number of Products', GETTEXT_DOMAIN),
        'desc'        => __('Number of products to display on shop page.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'shop_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'shop_columns',
        'label'       => __('Number of Columns', GETTEXT_DOMAIN),
        'desc'        => __('Select number of columns for shop page.', GETTEXT_DOMAIN),
        'std'         => '4',
        'type'        => 'select',
        'section'     => 'shop_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '2',
            'label'       => '2',
            'src'         => ''
          ),
          array(
            'value'       => '3',
            'label'       => '3',
            'src'         => ''
          ),
          array(
            'value'       => '4',
            'label'       => '4',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'sale_flash_color',
        'label'       => __('Sale Flash Element', GETTEXT_DOMAIN),
        'desc'        => __('Pick the color for sale flash element.', GETTEXT_DOMAIN),
        'std'         => '#c82f2a',
        'type'        => 'colorpicker',
        'section'     => 'shop_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      
      array(
        'id'          => 'shop_thumb_type',
        'label'       => 'Shop Thumbnail',
        'desc'        => 'Select one of thumbnail type.',
        'std'         => 'square',
        'type'        => 'select',
        'section'     => 'shop_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => 'none',
            'label'       => 'default',
            'src'         => ''
          ),
          array(
            'value'       => 'portrait',
            'label'       => 'portrait',
            'src'         => ''
          ),
          array(
            'value'       => 'square',
            'label'       => 'square',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'product_image_type',
        'label'       => 'Product Image',
        'desc'        => 'Select one of image type.',
        'std'         => 'square',
        'type'        => 'select',
        'section'     => 'shop_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => 'none',
            'label'       => 'default',
            'src'         => ''
          ),
          array(
            'value'       => 'portrait',
            'label'       => 'portrait',
            'src'         => ''
          ),
          array(
            'value'       => 'square',
            'label'       => 'square',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'product_thumb_type',
        'label'       => 'Product Thumbnails',
        'desc'        => 'Select one of thumbnail type.',
        'std'         => 'square',
        'type'        => 'select',
        'section'     => 'shop_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => 'none',
            'label'       => 'default',
            'src'         => ''
          ),
          array(
            'value'       => 'portrait',
            'label'       => 'portrait',
            'src'         => ''
          ),
          array(
            'value'       => 'square',
            'label'       => 'square',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'theme_layouts',
        'label'       => __('Theme Layouts', GETTEXT_DOMAIN),
        'desc'        => __('Select one of theme layouts', GETTEXT_DOMAIN),
        'std'         => '1170',
        'type'        => 'select',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '1170',
            'label'       => __('1170px wide (bootstrap v3)', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => '940',
            'label'       => __('940px wide (based on 960 grid system)', GETTEXT_DOMAIN),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'type_layouts',
        'label'       => 'Layouts Type',
        'desc'        => __('Select one of layouts type.', GETTEXT_DOMAIN),
        'std'         => 'responsive',
        'type'        => 'select',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'responsive',
            'label'       => 'responsive',
            'src'         => ''
          ),
          array(
            'value'       => 'fixed',
            'label'       => 'fixed',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'custom_logo',
        'label'       => 'Custom Logo',
        'desc'        => __('Upload a logo for your theme.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'left_headermeta',
        'label'       => __('Left Header Meta', GETTEXT_DOMAIN),
        'desc'        => __('Enter a value for left header meta.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'right_headermeta',
        'label'       => __('Right Header Meta', GETTEXT_DOMAIN),
        'desc'        => __('Enter a value for right header meta.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'header_search',
        'label'       => __('Header Search Form', GETTEXT_DOMAIN),
        'desc'        => __('Select one search form type', GETTEXT_DOMAIN),
        'std'         => 'theme_search',
        'type'        => 'select',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'shop_search',
            'label'       => __('Shop search', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'theme_search',
            'label'       => __('Theme search', GETTEXT_DOMAIN),
            'src'         => ''
          ),
          array(
            'value'       => 'none',
            'label'       => __('None', GETTEXT_DOMAIN),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'wpml_switcher',
        'label'       => __('WPML Switcher', GETTEXT_DOMAIN),
        'desc'        => __('Enable for displaying "WordPress Multilingual" switcher, "WPML Multilingual CMS" plugin must be activated.', GETTEXT_DOMAIN),
        'std'         => 'none',
        'type'        => 'checkbox',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'Enable',
            'label'       => __('Enable', GETTEXT_DOMAIN),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'fadeout_elements',
        'label'       => 'Enable Fadeout Elements',
        'desc'        => __('Check, if you want to enable fadeout elements.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'Enable',
            'label'       => 'Enable',
            'src'         => ''
          )
        ),
      ),
      
      array(
        'id'          => 'disable_sticky',
        'label'       => 'Disable Stickey Menu',
        'desc'        => __('Check, if you want to disable sticky menu.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'navigation',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'Disable',
            'label'       => 'Disable',
            'src'         => ''
          )
        ),
      ),
      
      array(
        'id'          => 'disable_logo_sticky',
        'label'       => 'Disable Logo in Stickey Menu',
        'desc'        => __('Check, if you want to disable sticky menu.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'navigation',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'Disable',
            'label'       => 'Disable',
            'src'         => ''
          )
        ),
      ),
      
       array(
        'id'          => 'navigation_font_size',
        'label'       => 'Navigation Font Size',
        'desc'        => __('Set navigation font size.', GETTEXT_DOMAIN),
        'std'         => '12',
        'type'        => 'select',
        'section'     => 'navigation',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '11',
            'label'       => '11',
            'src'         => ''
          ), 
          array(
            'value'       => '12',
            'label'       => '12',
            'src'         => ''
          ), 
          array(
            'value'       => '13',
            'label'       => '13',
            'src'         => ''
          ),
          array(
            'value'       => '14',
            'label'       => '14',
            'src'         => ''
          ),
          array(
            'value'       => '15',
            'label'       => '15',
            'src'         => ''
          ),
          array(
            'value'       => '16',
            'label'       => '16',
            'src'         => ''
          )
        ),
      ),
       array(
        'id'          => 'navigation_font_style',
        'label'       => 'Navigation Font Weight',
        'desc'        => __('Set navigation font weight.', GETTEXT_DOMAIN),
        'std'         => 'bold',
        'type'        => 'select',
        'section'     => 'navigation',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'normal',
            'label'       => 'normal',
            'src'         => ''
          ),
          array(
            'value'       => 'bold',
            'label'       => 'bold',
            'src'         => ''
          )
        ),
      ),
       array(
        'id'          => 'dropdown_font_size',
        'label'       => 'Navigation Dropdown Font Size',
        'desc'        => __('Set navigation dropdown font size.', GETTEXT_DOMAIN),
        'std'         => '13',
        'type'        => 'select',
        'section'     => 'navigation',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '11',
            'label'       => '11',
            'src'         => ''
          ), 
          array(
            'value'       => '12',
            'label'       => '12',
            'src'         => ''
          ), 
          array(
            'value'       => '13',
            'label'       => '13',
            'src'         => ''
          ),
          array(
            'value'       => '14',
            'label'       => '14',
            'src'         => ''
          ),
          array(
            'value'       => '15',
            'label'       => '15',
            'src'         => ''
          ),
          array(
            'value'       => '16',
            'label'       => '16',
            'src'         => ''
          )
        ),
      ),
       array(
        'id'          => 'dropdown_font_style',
        'label'       => 'Navigation Dropdown Font Weight',
        'desc'        => __('Set navigation dropdown font weight.', GETTEXT_DOMAIN),
        'std'         => 'bold',
        'type'        => 'select',
        'section'     => 'navigation',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'normal',
            'label'       => 'normal',
            'src'         => ''
          ),
          array(
            'value'       => 'bold',
            'label'       => 'bold',
            'src'         => ''
          )
        ),
      ),
      
      
      array(
        'id'          => 'theme_color',
        'label'       => __('Theme Color #1', GETTEXT_DOMAIN),
        'desc'        => __('Pick the color for link, buttons and etc.', GETTEXT_DOMAIN),
        'std'         => '#fba525',
        'type'        => 'colorpicker',
        'section'     => 'theme_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'theme_color_2',
        'label'       => __('Theme  Color #2', GETTEXT_DOMAIN),
        'desc'        => __('Pick the hover color for link, buttons and etc.', GETTEXT_DOMAIN),
        'std'         => '#95b558',
        'type'        => 'colorpicker',
        'section'     => 'theme_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'favicon',
        'label'       => 'Favicon',
        'desc'        => __('Upload an .ico image (dimensions 16x16) for favicon.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'theme_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'iphone_icon',
        'label'       => 'Iphone Icon',
        'desc'        => __('Upload an .png image (dimensions 57x57) for touch icon.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'theme_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'ipad_icon',
        'label'       => 'Ipad Icon',
        'desc'        => __('Upload an .png image (dimensions 72x72) for touch icon.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'theme_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'iphone2_icon',
        'label'       => 'Iphone Icon Retina',
        'desc'        => __('Upload an .png image (dimensions 114x114) for touch icon.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'theme_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'ipad2_icon',
        'label'       => 'Ipad Icon Retina',
        'desc'        => __('Upload an .png image (dimensions 144x144) for touch icon.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'theme_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'disable_seo',
        'label'       => 'Disable Theme SEO',
        'desc'        => __('If you are using an external SEO plug-in you should disable this option.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'seo_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'Disable',
            'label'       => 'Disable',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'theme_title',
        'label'       => 'Browser Page Title',
        'desc'        => __('%blog_title% - Will display name of your blog,
%blog_description% - Will blog description,
%page_title% - Will display current page title.', GETTEXT_DOMAIN),
        'std'         => '%blog_title%, %blog_description%, %page_title%',
        'type'        => 'textarea-simple',
        'section'     => 'seo_settings',
        'rows'        => '2',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'keywords',
        'label'       => 'Keywords',
        'desc'        => __('Enter a list of keywords separated by commas.', GETTEXT_DOMAIN),
        'std'         => 'keyword1, keywords2',
        'type'        => 'textarea-simple',
        'section'     => 'seo_settings',
        'rows'        => '2',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'description',
        'label'       => 'Description',
        'desc'        => __('Enter description for your site.', GETTEXT_DOMAIN),
        'std'         => 'website description',
        'type'        => 'textarea-simple',
        'section'     => 'seo_settings',
        'rows'        => '4',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'cc',
        'label'       => __('Credit Cards', GETTEXT_DOMAIN),
        'desc'        => __('Select your payment methods.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '2checkout',
            'label'       => '2checkout',
            'src'         => ''
          ),
           array(
            'value'       => 'american-express',
            'label'       => 'American Express',
            'src'         => ''
          ),
           array(
            'value'       => 'cirrus',
            'label'       => 'Cirrus',
            'src'         => ''
          ),
           array(
            'value'       => 'delta',
            'label'       => 'Delta',
            'src'         => ''
          ),
           array(
            'value'       => 'discover',
            'label'       => 'Discover',
            'src'         => ''
          ),
           array(
            'value'       => 'ebay',
            'label'       => 'Ebay',
            'src'         => ''
          ),
           array(
            'value'       => 'google-checkout',
            'label'       => 'Google Checkout',
            'src'         => ''
          ),
           array(
            'value'       => 'maestro',
            'label'       => 'Maestro',
            'src'         => ''
          ),
           array(
            'value'       => 'mastercard',
            'label'       => 'Mastercard',
            'src'         => ''
          ),
           array(
            'value'       => 'moneybookers',
            'label'       => 'Moneybookers',
            'src'         => ''
          ),
           array(
            'value'       => 'sagepay',
            'label'       => 'Sagepay',
            'src'         => ''
          ),
           array(
            'value'       => 'solo',
            'label'       => 'Solo',
            'src'         => ''
          ),
            array(
            'value'       => 'switch',
            'label'       => 'Switch',
            'src'         => ''
          ),
           array(
            'value'       => 'visa-electron',
            'label'       => 'Visa Electron',
            'src'         => ''
          ),
           array(
            'value'       => 'visa',
            'label'       => 'Visa',
            'src'         => ''
          ),
            array(
            'value'       => 'western-union',
            'label'       => 'Western Union',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'footer_copyright',
        'label'       => 'Footer Copyright Text',
        'desc'        => 'Enter the copyright text you\'d like to show in the footer of your site.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'footer_logo',
        'label'       => 'Footer Logo',
        'desc'        => __('Upload footer logo for your theme.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'fm_column1',
        'label'       => __('Column 1', GETTEXT_DOMAIN),
        'desc'        => __('Enter a value for column 1.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'fm_column2',
        'label'       => __('Column 2', GETTEXT_DOMAIN),
        'desc'        => __('Enter a value for column 2.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'fm_column3',
        'label'       => __('Column 3', GETTEXT_DOMAIN),
        'desc'        => __('Enter a value for column 3.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'fm_column4',
        'label'       => __('Column 4', GETTEXT_DOMAIN),
        'desc'        => __('Enter a value for column 4.', GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'sm_label',
        'label'       => "Social Media Label",
        'desc'        => __("Enter a value for social media label.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'pinterest',
        'label'       => "pinterest",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'dropbox',
        'label'       => "dropbox",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'google_plus',
        'label'       => "google plus",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'jolicloud',
        'label'       => "jolicloud",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'yahoo',
        'label'       => "yahoo",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'blogger',
        'label'       => "blogger",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'picasa',
        'label'       => "picasa",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'amazon',
        'label'       => "amazon",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'tumblr',
        'label'       => "tumblr",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'wordpress',
        'label'       => "wordpress",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'instapaper',
        'label'       => "instapaper",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'evernote',
        'label'       => "evernote",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'xing',
        'label'       => "xing",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'zootool',
        'label'       => "zootool",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'dribbble',
        'label'       => "dribbble",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'deviantart',
        'label'       => "deviantart",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'read_it_later',
        'label'       => "read it later",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'linked_in',
        'label'       => "linked in",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'forrst',
        'label'       => "forrst",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'pinboard',
        'label'       => "pinboard",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'behance',
        'label'       => "behance",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'github',
        'label'       => "github",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'youtube',
        'label'       => "youtube",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'skitch',
        'label'       => "skitch",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'foursquare',
        'label'       => "foursquare",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'quora',
        'label'       => "quora",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'badoo',
        'label'       => "badoo",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'spotify',
        'label'       => "spotify",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'stumbleupon',
        'label'       => "stumbleupon",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'readability',
        'label'       => "readability",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'facebook',
        'label'       => "facebook",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'twitter',
        'label'       => "twitter",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'instagram',
        'label'       => "instagram",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'posterous_spaces',
        'label'       => "posterous spaces",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vimeo',
        'label'       => "vimeo",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'flickr',
        'label'       => "flickr",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'last_fm',
        'label'       => "last fm",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'rss',
        'label'       => "rss",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'skype',
        'label'       => "skype",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'e_mail',
        'label'       => "e-mail",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vine',
        'label'       => "vine",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'myspace',
        'label'       => "myspace",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'goodreads',
        'label'       => "goodreads",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'apple',
        'label'       => "apple",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'windows',
        'label'       => "windows",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'yelp',
        'label'       => "yelp",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'playstation',
        'label'       => "playstation",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'xbox',
        'label'       => "xbox",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'android',
        'label'       => "android",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'ios',
        'label'       => "ios",
        'desc'        => __("Input the full URL you'd like the button to link.", GETTEXT_DOMAIN),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer_meta',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}