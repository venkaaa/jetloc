<?php

return array(
	'displaywp_services' => array(
		'name' => 'Services',
		'term' => 'service',
		'term_plural' => 'services',
		'order' => 'ASC',
		'options' => array(
			'image' => array(
				'type' => 'image',
				'description' => 'Image of the service',
				'title' => 'Image',
				'default' => 'holder.js/32x32/auto'
			),
			'description' => array(
				'type' => 'text',
				'description' => 'Description of the service',
				'title' => 'Description'
			),
			'url' => array(
				'type' => 'line',
				'description' => 'This URL will be applied to the title of the service.',
				'title' => 'URL (optional)'
			)
		),
		'output_default' => 'main',
		'output' => array(
			'main' => array(
				'shortcode' => 'displaywp_services',
				'view' => 'views/services_view',
				'shortcode_defaults' => array(
					'columns' => 4,
					'nr' => 0,
					'title' => '',
					'subtitle' => '',
					'wide_header' => false,
					'background' => '',
					'view_all' => '',
					'view_all_text' => _x('view all', '[displaywp_services]', 'displaywp')
				)
			)
		),
		'icon' => '../images/favicon.png'
	),
	'displaywp_offers' => array(
		'name' => 'Offers',
		'term' => 'offer',
		'term_plural' => 'offers',
		'order' => 'ASC',
		'options' => array(
			'image' => array(
				'type' => 'image',
				'description' => 'Image of the offer',
				'title' => 'Image',
				'default' => 'holder.js/32x32/auto'
			),
			'description' => array(
				'type' => 'text',
				'description' => 'Description of the offer',
				'title' => 'Description'
			)
		),
		'output_default' => 'main',
		'output' => array(
			'main' => array(
				'shortcode' => 'displaywp_offers',
				'view' => 'views/offers_view',
				'shortcode_defaults' => array(
					'nr' => 0,
					'title' => ''
				)
			)
		),
		'icon' => '../images/favicon.png'
	),
	'displaywp_skills' => array(
		'name' => 'Skills',
		'term' => 'skill',
		'term_plural' => 'skills',
		'order' => 'ASC',
		'options' => array(
			'value' => array(
				'type' => 'line',
				'description' => 'Value of the skill',
				'title' => 'Value'
			)
		),
		'output_default' => 'main',
		'output' => array(
			'main' => array(
				'shortcode' => 'displaywp_skills',
				'view' => 'views/skills_view',
				'shortcode_defaults' => array(
					'nr' => 0,
					'title' => '',
					'subtitle' => ''
				)
			)
		),
		'icon' => '../images/favicon.png'
	),
	'displaywp_choose' => array(
		'name' => 'Choose Us',
		'term' => 'item',
		'term_plural' => 'items',
		'order' => 'ASC',
		'options' => array(
			'description' => array(
				'type' => 'text',
				'description' => 'Description of the item',
				'title' => 'Description'
			)
		),
		'output_default' => 'main',
		'output' => array(
			'main' => array(
				'shortcode' => 'displaywp_choose',
				'view' => 'views/choose_view',
				'shortcode_defaults' => array(
					'nr' => 0,
					'title' => '',
					'subtitle' => ''
				)
			)
		),
		'icon' => '../images/favicon.png'
	),
	'displaywp_toggle' => array(
		'name' => 'Toggle List',
		'term' => 'item',
		'term_plural' => 'items',
		'order' => 'ASC',
		'options' => array(
			'description' => array(
				'type' => 'text',
				'description' => 'Description of the item',
				'title' => 'Description'
			)
		),
		'output_default' => 'main',
		'output' => array(
			'main' => array(
				'shortcode' => 'displaywp_toggle',
				'view' => 'views/toggle_view',
				'shortcode_defaults' => array(
					'nr' => 0,
					'title' => '',
					'subtitle' => ''
				)
			)
		),
		'icon' => '../images/favicon.png'
	),
	'displaywp_staff' => array(
		'name' => 'Staff Info',
		'term' => 'item',
		'term_plural' => 'items',
		'order' => 'ASC',
		'options' => array(
			'value' => array(
				'type' => 'line',
				'description' => 'Value of the item',
				'title' => 'Value'
			)
		),
		'output_default' => 'main',
		'output' => array(
			'main' => array(
				'shortcode' => 'displaywp_staff',
				'view' => 'views/staff_view',
				'shortcode_defaults' => array(
					'nr' => 0,
					'columns' => 3,
					'background' => ''
				)
			)
		),
		'icon' => '../images/favicon.png'
	),
	'displaywp_secondary' => array(
		'name' => 'Secondary Slider',
		'term' => 'slide',
		'term_plural' => 'slides',
		'order' => 'ASC',
		'options' => array(
			'image' => array(
				'type' => 'image',
				'description' => 'Image of the slide',
				'title' => 'Image',
				'default' => 'holder.js/570x395/auto'
			)
		),
		'output_default' => 'main',
		'output' => array(
			'main' => array(
				'shortcode' => 'displaywp_secondary',
				'view' => 'views/secondary_view',
				'shortcode_defaults' => array(
					'nr' => 0,
					'title' => ''
				)
			)
		),
		'icon' => '../images/favicon.png'
	),
	'displaywp_team' => array(
		'name' => 'Team',
		'term' => 'team member',
		'term_plural' => 'team members',
		'order' => 'ASC',
		'options' => array(
			'image' => array(
				'type' => 'image',
				'description' => 'Image of the team member',
				'title' => 'Image',
				'default' => 'holder.js/220x220/auto'
			),
			'position' => array(
				'type' => 'line',
				'description' => 'Position of the team member',
				'title' => 'Position'
			),
			'description' => array(
				'type' => 'text',
				'description' => 'Description of the team member',
				'title' => 'Description'
			),
			'facebook' => array(
				'type' => 'line',
				'description' => 'Facebook URL of the team member',
				'title' => 'Facebook'
			),
			'twitter' => array(
				'type' => 'line',
				'description' => 'Twitter URL of the team member',
				'title' => 'Twitter'
			),
			'url' => array(
				'type' => 'line',
				'description' => 'This URL will be applied to the image of the team member.',
				'title' => 'URL (optional)'
			)
		),
		'output_default' => 'main',
		'output' => array(
			'main' => array(
				'shortcode' => 'displaywp_team',
				'view' => 'views/team_view',
				'shortcode_defaults' => array(
					'nr' => 0,
					'columns' => 3,
					'title' => '',
					'subtitle' => '',
					'wide_header' => false,
					'background' => '',
					'view_all' => '',
					'view_all_text' => _x('view all', '[displaywp_team]', 'displaywp')
				)
			)
		),
		'icon' => '../images/favicon.png'
	),
	'displaywp_project' => array(
		'url' => _go('project_url'),
		'post_options' => array('supports'=>array('title','editor','thumbnail')),
		'has_single' => true,
		'name' => 'Portfolio',
		'term' => 'portfolio item',
		'term_plural' => 'portfolio items',
		'order' => 'ASC',
		'options' => array(
			'image_small' => array(
				'type' => 'image',
				'description' => 'This image is shown in the portfolio section with all the items',
				'title' => 'Small image',
				'default' => 'holder.js/348x284/auto'
			),
			'image_big' => array(
				'type' => 'image',
				'description' => 'This image is shown when clicking the zoom icon in the portfolio section with all the items',
				'title' => 'Big image',
				'default' => 'holder.js/348x284/auto'
			),
			'author' => array(
				'type' => 'line',
				'description' => 'Author of the portfolio item',
				'title' => 'Author'
			)
		),
		'output_default' => 'main',
		'output' => array(
			'main' => array(
				'view' => 'views/portfolio_view'
			),
			'single' => array(
				'view' => 'views/portfolio_single_view'
			)
		),
		'icon' => '../images/favicon.png'
	),
	'displaywp_main' => array(
		'name' => 'Main Slider',
		'term' => 'slide',
		'term_plural' => 'slides',
		'order' => 'ASC',
		'options' => array(
			'image' => array(
				'type' => 'image',
				'description' => 'Image of the slide',
				'title' => 'Image',
				'default' => 'holder.js/1920x700/auto'
			),
			'icon' => array(
				'type' => 'image',
				'description' => 'This icon is shown below the slide\'s title',
				'title' => 'Icon',
				'default' => 'holder.js/32x32/auto'
			)
		),
		'output_default' => 'main',
		'output' => array(
			'main' => array(
				'shortcode' => 'displaywp_main',
				'view' => 'views/main_view',
				'shortcode_defaults' => array(
					'nr' => 0
				)
			)
		),
		'icon' => '../images/favicon.png'
	),
	'displaywp_tstmnls' => array(
		'name' => 'Testimonials',
		'term' => 'testimonial',
		'term_plural' => 'testimonials',
		'order' => 'ASC',
		'options' => array(
			'subtitle' => array(
				'type' => 'line',
				'description' => 'This is shown under the title (which is the author\'s name)',
				'title' => 'Subtitle (optional)'
			),
			'image' => array(
				'type' => 'image',
				'description' => 'Image of the author',
				'title' => 'Image',
				'default' => 'holder.js/70x70/auto'
			),
			'text' => array(
				'type' => 'text',
				'description' => 'The text of the testimonial',
				'title' => 'Text'
			)
		),
		'output_default' => 'main',
		'output' => array(
			'main' => array(
				'shortcode' => 'displaywp_testimonials',
				'view' => 'views/testimonials_view',
				'shortcode_defaults' => array(
					'nr' => 0,
					'background' => '',
					'wide' => false
				)
			)
		),
		'icon' => '../images/favicon.png'
	),
	'displaywp_clients' => array(
		'name' => 'Clients Slider',
		'term' => 'slide',
		'term_plural' => 'slides',
		'order' => 'ASC',
		'options' => array(
			'image' => array(
				'type' => 'image',
				'description' => 'Image of the slide',
				'title' => 'Image',
				'default' => 'holder.js/70x70/auto'
			),
			'url' => array(
				'type' => 'line',
				'description' => 'This URL will be applied to the image',
				'title' => 'URL (optional)'
			)
		),
		'output_default' => 'main',
		'output' => array(
			'main' => array(
				'shortcode' => 'displaywp_clients_slider',
				'view' => 'views/clients_slider_view',
				'shortcode_defaults' => array(
					'nr' => 0,
					'title' => ''
				)
			)
		),
		'icon' => '../images/favicon.png'
	)
);