<?php

return array(
        'favico' => array(
                'dir' => '/images/favicon.png'
        ),
        'option_saved_text' => 'Options successfully saved',
        'tabs' => array(
                array(
                        'title'=>'General Options',
                        'icon'=>1,
                        'boxes' => array(
                                'Logo' => array(
                                        'icon'=>'customization',
                                        'size'=>'2_3',
                                        'columns'=>true,
                                        'description'=>'Here you upload a image as logo or you can write it as text and select the logo color, size, font.',
                                        'input_fields' => array(
                                                'Logo As Image'=>array(
                                                        'size'=>'half',
                                                        'id'=>'logo_image',
                                                        'type'=>'image_upload',
                                                        'note'=>'Here you can insert your link to a image logo or upload a new logo image.'
                                                ),
                                                'Logo As Text'=>array(
                                                        'size'=>'half_last',
                                                        'id'=>'logo_text',
                                                        'type'=>'text',
                                                        'note' => "Type the logo text here, then select a color, set a size and font",
                                                        'color_changer'=>true,
                                                        'font_changer'=>true,
                                                        'font_size_changer'=>array(1,1000, 'px'),
                                                        'font_preview'=>array(true, true)
                                                )
                                        )
                                ),
                                'Favicon' => array(
                                        'icon'=>'customization',
                                        'size'=>'1_3_last',
                                        'input_fields' => array(
                                                array(
                                                        'id'=>'favicon',
                                                        'type'=>'image_upload',
                                                        'note'=>'Here you can upload the favicon icon.'
                                                )
                                        )
                                ),
                                'Site Colors' => array(
                                        'icon'=>'background',
                                        'size'=>'1_3_last',
                                        'input_fields' => array(
                                                array(
                                                        'size'=>'7',
                                                        'id'=>'site_color',
                                                        'type'=>'colorpicker',
                                                        'note'=>'Change the default first color.',
                                                        'default' => '#45c9c3'
                                                ),
                                                array(
                                                        'size'=>'7',
                                                        'id'=>'site_color_4',
                                                        'type'=>'colorpicker',
                                                        'note'=>'Change the default second color.',
                                                        'default' => '#37a19c'
                                                ),
                                                array(
                                                        'size'=>'7',
                                                        'id'=>'site_color_2',
                                                        'type'=>'colorpicker',
                                                        'note'=>'Change the default third color.',
                                                        'default' => '#47a1f4'
                                                ),
                                                array(
                                                        'size'=>'7',
                                                        'id'=>'site_color_3',
                                                        'type'=>'colorpicker',
                                                        'note'=>'Change the default fourth color.',
                                                        'default' => '#f6606a'
                                                )
                                        )
                                )
                        )
                ),
                array(
                        'title' => 'Site Background',
                        'icon'=>4,
                        'boxes' => array(
                                'Background Customization'=>array(
                                        'icon'=>'background',
                                        'columns'=>true,
                                        'input_fields' => array(
                                                'Background Color'=>array(
                                                        'size'=>'3',
                                                        'id'=>'bg_color',
                                                        'type'=>'colorpicker'
                                                ),
                                                'Background Image' => array(
                                                        'size'=>'3',
                                                        'id'=>'bg_image',
                                                        'type'=>'image_upload'
                                                ),
                                                'Position' => array(
                                                        'size'=>'3_last',
                                                        'id' => 'bg_image_position',
                                                        'type' => 'radio',
                                                        'values' => array('Left','Center','Right')
                                                ),
                                                'Repeat' => array(
                                                        'size'=>'3_last',
                                                        'id' => 'bg_image_repeat',
                                                        'type' => 'radio',
                                                        'values' => array('bitch'=>'No Repeat','Tile','Tile Horizontally','Tile Vertically')
                                                ),
                                                'Attachment' => array(
                                                        'size'=>'3_last',
                                                        'id' => 'bg_image_attachment',
                                                        'type' => 'radio',
                                                        'values' => array('Scroll','Fixed')
                                                )
                                        )
                                )
                        )
                ),
                array(
                        'title' => 'Social Icons',
                        'icon'=>2,
                        'boxes'=>array(
                                'Social Platforms'=>array(
                                        'icon'=>'social',
                                        'description'=>"Insert the link to the social share page.",
                                        'size'=>'1_3',
                                        'columns'=>true,
                                        'input_fields'=>array(
                                                array(
                                                        'id'=>'social_platforms',
                                                        'size'=>'half',
                                                        'type'=>'social_platforms',
                                                        'platforms'=>array('facebook','twitter','linkedin','rss','pinterest','youtube','flickr','behance','dribbble','google')
                                                )
                                        )
                                )
                        )
                ),
                array(
                        'title' => 'Twitter Settings',
                        'icon'  => 3,
                        'boxes' => array(
                                'Twitter API keys'=>array(
                                        'icon' => 'customization',
                                        'description'=>"Used by the Twitter Widget",
                                        'size'=>'1_3_last',
                                        'columns'=>false,
                                        'input_fields' =>array(
                                                'Consumer Key' => array(
                                                        'id'    => 'twitter_consumerkey',
                                                        'type'  => 'text',
                                                        'size' => '1'
                                                ),
                                                'Consumer Secret' => array(
                                                        'id'    => 'twitter_consumersecret',
                                                        'type'  => 'text',
                                                        'size' => '1',
                                                ),
                                                'Access Token' => array(
                                                        'id'    => 'twitter_accesstoken',
                                                        'type'  => 'text',
                                                        'size' => '1',
                                                ),
                                                'Access Toekn Secret' => array(
                                                        'id'    => 'twitter_accesstokensecret',
                                                        'type'  => 'text',
                                                        'size' => '1',
                                                )
                                        )
                                )
                        )
                ),
                array(
                        'title' => 'Additional Options',
                        'icon'  => 6,
                        'boxes' => array(
                                'Custom CSS' => array(
                                        'icon'=>'css',
                                        'size'=>'2_3',
                                        'description'=>'Here you can write your personal CSS for customizing the classes you choose to modify.',
                                        'input_fields' => array(
                                                array(
                                                        'id'=>'custom_css',
                                                        'type'=>'textarea'
                                                )
                                        )
                                ),
                                'Append to footer' => array(
                                        'icon'=>'track',
                                        'size'=>'2_3_last',
                                        'input_fields'=>array(
                                                array(
                                                        'type'=>'textarea',
                                                        'id'=>'append_to_footer'
                                                )
                                        )
                                ),
                                'Header menu' => array(
                                        'icon'=>'track',
                                        'size'=>'2_3_last',
                                        'description' => 'Chose how to align the header menu (default: right)',
                                        'input_fields'=>array(
                                                array(
                                                        'size'=>'3_last',
                                                        'id' => 'header_menu_alignment',
                                                        'type' => 'radio',
                                                        'values' => array('left','center','right')
                                                )
                                        )
                                )
                        )
                ),
                array(
                        'title' => 'Contact Info',
                        'icon'  => 5,
                        'boxes' => array(
                                'Contact info'=>array(
                                        'icon' => 'customization',
                                        'description'=>"Provide contact information. This information will appear in contact template. For more informations read documentation.",
                                        'size'=>'2_3',
                                        'columns'=>true,
                                        'input_fields' =>array(
                                                'Map iframe' => array(
                                                        'id'    => 'contact_map',
                                                        'type'  => 'map',
                                                        'note' => 'Here you can insert iframe with your location. For more information you can find in theme\'s documentation' ,
                                                        'size' => 'half',
                                                        'icons' => array('google-marker.gif','home.png','home_1.png','home_2.png','administration.png','office-building.png')
                                                ),
                                                'Map height' => array(
                                                        'id'    => 'map_height',
                                                        'type'  => 'text',
                                                        'note' => 'Specify a height in pixels for the contact map (default is 700)',
                                                        'size' => 'half',
                                                        'placeholder' => 'Map height'
                                                ),
                                                'Contact form' => array(
                                                        'id'    => 'email_contact',
                                                        'type'  => 'text',
                                                        'note' => 'Provide an email used to recive messages from Contact Form',
                                                        'size' => 'half_last',
                                                        'placeholder' => 'Contact Form Email'
                                                ),
                                                array(
                                                        'id'    => 'email_prefix',
                                                        'type'  => 'text',
                                                        'note' => 'Provide a prefix for subjects of the messages received from Contact Form',
                                                        'size' => 'half_last',
                                                        'placeholder' => 'Subject Prefix'
                                                )
                                        )
                                ),
                                'Phone numbers'=>array(
                                        'icon' => 'customization',
                                        'description'=>"A list of offices with respective contact details.",
                                        'size'=>'1_3_last',
                                        'repeater' => 'Add new color',
                                        'input_fields' =>array(
                                                'Phone'=>array(
                                                        'type'=>'text',
                                                        'id'=>'office_phone',
                                                        'placeholder'=>'Phone',
                                                        'note'=>'Phone of the office'
                                                )
                                        )
                                ),
                                'Additional Info'=>array(
                                        'icon' => 'customization',
                                        'description'=>"A list of offices with respective contact details.",
                                        'size'=>'1_3_last',
                                        'input_fields' =>array(
                                                'E-mail'=>array(
                                                        'type'=>'text',
                                                        'id'=>'office_email',
                                                        'placeholder'=>'E-mail',
                                                        'note'=>'E-mail of the office'
                                                ),
                                                'Address'=>array(
                                                        'type'=>'textarea',
                                                        'id'=>'office_address',
                                                        'placeholder'=>'Address',
                                                        'note'=>'Address of the office'
                                                )
                                        )
                                )

                        )
                ),
                array(
                        'title' => 'Subscription',
                        'icon'  => 7,
                        'boxes' => array(
                                'Subscribers'=>array(
                                        'icon' => 'social',
                                        'description'=>'First 20 subscribers are listed here. To get the full list export files using buttons below:',
                                        'size'=>'1',
                                        'input_fields' => array(
                                                array(
                                                        'type'=>'subscription',
                                                        'id'=>'subscription_list'
                                                )
                                        )
                                )
                        )
                ),
        ),
        'styles' => array( array('wp-color-picker'),'style','select2' ),
        'scripts' => array( array( 'jquery', 'jquery-ui-core','jquery-ui-datepicker','wp-color-picker' ), 'select2.min','jquery.cookie','tt_options', 'admin_js' )
);