<?php
#
# Theme admin options, please don't change anything
#
if ( !class_exists( 'Redux' ) ) {
    return;
}

// Remove notices from redux
$GLOBALS['redux_notice_check'] = 0;

// This is your option name where all the Redux data is stored.
$option_name = 'clementine_theme_options';
$theme = wp_get_theme();
$args = array(
	'opt_name' => $option_name,
	'display_name' => '<img src="'. THEME_URL .'/theme-functions/assets/images/logo.png">',
	// 'display_name' => $theme->get( 'Name' ),
	'display_version' => '<h3 class="theme-head">'. $theme->get( 'Description' ) .'</h3> Version: ' . $theme->get( 'Version' ),
	'menu_type' => 'menu',
	'allow_sub_menu' => true,
	'menu_title' => __( 'Clementine Options', 'clementine' ),
	'page_title' => __( 'Clementine Options', 'clementine' ),
	'google_api_key' => '',
	'google_update_weekly' => false,
	'async_typography' => true,
	'admin_bar' => true,
	'admin_bar_icon' => 'dashicons-portfolio',
	'admin_bar_priority' => 50,
	'global_variable' => '',
	'dev_mode' => false,
	'update_notice' => false,
	'customizer' => false,
	//'disable_save_warn' => true,
	'page_priority' => null,
	'page_parent' => 'themes.php',
	'page_permissions' => 'manage_options',
	'menu_icon' => ReduxFramework::$_url . 'theme-icon.png',
	'last_tab' => '',
	'page_icon' => 'icon-themes',
	'page_slug' => '',
	'save_defaults' => true,
	'default_show' => false,
	'default_mark' => '',
	'show_import_export' => true,
	'transient_time' => 60 * MINUTE_IN_SECONDS,
	'output' => true,
	'output_tag' => true,
	'footer_credit' => false,
	'database' => '',
	// HINTS
	'hints' => array(
	    'icon' => 'el el-question-sign',
	    'icon_position' => 'right',
	    'icon_color' => 'lightgray',
	    'icon_size' => 'normal',
	    'tip_style' => array(
	        'color' => 'red',
	        'shadow' => true,
	        'rounded' => false,
	        'style' => '',
	    ),
	    'tip_position' => array(
	        'my' => 'top left',
	        'at' => 'bottom right',
	    ),
	    'tip_effect' => array(
	        'show' => array(
	            'effect' => 'slide',
	            'duration' => '500',
	            'event' => 'mouseover',
	        ),
	        'hide' => array(
	            'effect' => 'slide',
	            'duration' => '500',
	            'event' => 'click mouseleave',
	        )
	    )
	)
);

Redux::setArgs( $option_name, $args );
#
# Theme Sections::General Settings
#
Redux::setSection( $option_name,
	array(
		'title' => __( 'General Settings', 'clementine' ),
		'icon' => 'el el-icon-cog',
		'fields' => array(
			array(
				'id' => 'adD_logo',
				'type' => 'media',
				'title' => __('Upload logo', 'clementine'),
				'default' => array(
					'url' => get_template_directory_uri() . '/theme-utilities/images/logo.png'
				)
			),
			array(
				'id' => 'adD_language',
				'type' => 'text',
				'title' => __('Language', 'clementine'),
				'subtitle' => __('<strong>Set your language using file name from /languages folder, for example en_US, fr_FR, etc.</strong>', 'clementine')
			),
			array(
				'id' => 'adD_search_string',
				'type' => 'text',
				'title' => __('Text for Search input', 'clementine'),
				'default' => 'Search'
			),
			array(
				'id' => 'adD_totop_string',
				'type' => 'text',
				'title' => __('Text for "Back to Top"', 'clementine'),
				'default' => 'To Top'
			),
			array(
				'id'       => 'adD_remove_static_parameters',
				'type'     => 'switch',
				'title'    => __( 'Clean Static Files URL', 'clementine' ),
				'subtitle' => __( 'Do you want to remove the version parameters from static resources so they can be cached better?', 'clementine' ),
				'default'  => false,
			),
			array(
				'id'       => 'adD_back_to_top',
				'type'     => 'switch',
				'title'    => __( 'Back to Top', 'clementine' ),
				'default'  => true,
			),
		)
	)
);

#
# Theme Sections::Header Settings
#
Redux::setSection( $option_name,
	array(
		'title' => __( 'Header Settings', 'clementine' ),
		'icon' => 'el el-wrench',
		'fields' => array(
			array(
				'id' => 'adD_header_spacing',
				'title' => __('Header spacing', 'clementine'),
				'type' => 'spacing',
				'left' => false,
				'right' => false,
				'mode' => 'margin',
				'output' => array('.header'),
				'units' => array( 'em', 'px', '%' ),
				'default' => array(
					'units' => 'px',
					'margin-bottom' => '60px'
				)
			),
			array(
				'id' => 'adD_section',
				'type' => 'section',
				'indent' => true,
				'title' => __('Top Bar Settings', 'clementine'),
				'subtitle' => __('Navigation position must be bottom to view top bar', 'clementine'),
			),
			array(
				'id' => 'adD_enable_topbar',
				'type' => 'switch',
				'title' => __('Enable Top Bar', 'clementine'),
				'default' => true
			),
			array(
				'id' => 'adD_topbar_link_color',
				'title' => __('Links color', 'clementine'),
				'type' => 'link_color',
				'output' => array('.top-menu .menu > ul > li > a, .top-menu ul.menu > li > a, .top-bar .social-media a'),
				'required' => array('adD_enable_topbar', 'equals', '1'),
				'active' => false,
				'default' => array(
					'regular' => '#fff',
					'hover' => '#FCA90F'
				)
			),
			array(
				'id' => 'adD_topbar_background',
				'title' => __('Background Color', 'clementine'),
				'type' => 'background',
				'required' => array('adD_enable_topbar', 'equals', '1'),
				'output' => array('.top-bar'),
				'background-attachment' => false,
				'background-repeat' => false,
				'background-position' => false,
				'background-image' => false,
				'background-clip' => false,
				'background-size' => false,
				'transparent' => false,
				'preview' => false,
				'default' => array(
					'background-color' => '#171717',
				)
			),
			array(
				'id' => 'adD_topbar_layout',
				'class' => 'image_selection',
				'type' => 'image_select',
				'required' => array('adD_enable_topbar', 'equals', '1'),
				'title' => __('Top Bar layout', 'clementine'),
				'options' => array(
					'top-1' => array(
						'alt' => 'Top Bar 1',
						'img' => ReduxFramework::$_url . 'images/top-bar/top-bar-1.jpg'
					),
					'top-2' => array(
						'alt' => 'Top Bar 2',
						'img' => ReduxFramework::$_url . 'images/top-bar/top-bar-2.jpg'
					),
					'top-3' => array(
						'alt' => 'Top Bar 3',
						'img' => ReduxFramework::$_url . 'images/top-bar/top-bar-3.jpg'
					),
					'top-4' => array(
						'alt' => 'Top Bar 4',
						'img' => ReduxFramework::$_url . 'images/top-bar/top-bar-4.jpg'
					),
					'top-5' => array(
						'alt' => 'Top Bar 5',
						'img' => ReduxFramework::$_url . 'images/top-bar/top-bar-5.jpg'
					),
					'top-6' => array(
						'alt' => 'Top Bar 6',
						'img' => ReduxFramework::$_url . 'images/top-bar/top-bar-6.jpg'
					)
				),
				'default' => 'top-1'
			),
			array(
				'id' => 'adD_topbar_menu',
				'title' => __('Select Menu for Top Bar', 'clementine'),
				'type' => 'select',
				'data' => 'menus',
				'required' => array( 
				    array('adD_topbar_layout', 'not', 'top-4'),
				    array('adD_topbar_layout', 'not', 'top-5'),
				    array('adD_topbar_layout', 'not', 'top-6')
				)
			),
		)
	)
);
#
# Theme Sections::Navigation
#
Redux::setSection( $option_name,
	array(
		'title' => __( 'Navigation', 'clementine' ),
		'icon' => 'el el-link',
		'fields' => array(
			array(
				'id' => 'adD_nav_padding',
				'title' => __('Inner spacing', 'clementine'),
				'type' => 'spacing',
				'output' => array('.navigation ul.menu > li'),
				'left' => false,
				'right' => false,
				'units' => array( 'em', 'px', '%' ),
				'default' => array(
					'padding-top'     => '20px', 
			        'padding-bottom'   => '20px', 
					'units' => 'px'
				)
			),
			array(
				'id' => 'adD_nav_link_margins',
				'title' => __('Spacing between links', 'clementine'),
				'type' => 'spacing',
				'mode' => 'margin',
				'output' => array('.navigation ul.menu > li'),
				'top' => false,
				'bottom' => false,
				'units' => array( 'em', 'px', '%' ),
				'default' => array(
					'units' => 'px'
				)
			),
			array(
				'id' => 'adD_nav_margin_bottom',
				'title' => __('Margin Bottom', 'clementine'),
				'type' => 'spacing',
				'mode' => 'margin',
				'output' => array('.navigation'),
				'top' => false,
				'left' => false,
				'right' => false,
				'units' => array( 'em', 'px', '%' ),
				'default' => array(
					'units' => 'px'
				)
			),
			array(
				'id' => 'adD_nav_link_color',
				'title' => __('Links color', 'clementine'),
				'type' => 'link_color',
				'active' => false,
				'output' => array('.navbar ul > li > a, .navbar ul > li:hover > a, .top-menu ul > li > a'),
				'default' => array(
					'regular' => '#171717',
					'hover' => '#FCA90F'
				)
			),
			array(
				'id' => 'adD_nav_background',
				'title' => __('Background Color', 'clementine'),
				'type' => 'background',
				'background-attachment' => false,
				'background-repeat' => false,
				'background-position' => false,
				'background-image' => false,
				'background-clip' => false,
				'background-size' => false,
				'transparent' => false,
				'output' => array('header.header'),
				'preview' => false,
				'default' => array(
					'background-color' => '#fff',
				)
			),
		)
	)
);
#
# Theme Sections::Post Slider
#
Redux::setSection( $option_name,
	array(
		'title' => __( 'Hero Section', 'clementine' ),
		'icon' => 'el el-lines',
		'fields' => array(
			array(
				'id' => 'adD_post_slider',
				'type' => 'button_set',
				'title' => __( 'Type', 'clementine' ),
				'options' => array(
					'slider' => 'Slider',
					'map' => 'Google Map with Posts',
					'none' => 'None'
				),
				'default' => 'none'
			),
			array(
				'id' => 'adD_post_slider_style',
				'class' => 'image_selection',
				'type' => 'image_select',
				'title' => __( 'Style', 'clementine' ),
				'required' => array(
					array('adD_post_slider', '!=', 'none'),
					array('adD_post_slider', '!=', 'map')
				),
				'options' => array(
					'full-width' => array(
						'alt' => 'Full width',
						'title' => 'Full width',
						'img' => ReduxFramework::$_url . 'images/fullwidth-slider.png'
					),
					'boxed' => array(
						'alt' => 'Boxed',
						'title' => 'Boxed',
						'img' => ReduxFramework::$_url . 'images/boxed-slider.png'
					),
					'multiple' => array(
						'alt' => 'Multiple slides',
						'title' => 'Multiple slides',
						'img' => ReduxFramework::$_url . 'images/multiple-slider.png'
					),
				),
				'default' => 'full-width'
			),
			array(
				'id' => 'adD_post_slider_order',
				'type' => 'button_set',
				'required' => array(
					array('adD_post_slider', '!=', 'none'),
					array('adD_post_slider', '!=', 'map')
				),
				'title' => __( 'Order', 'clementine' ),
				'options' => array(
					'asc' => 'Ascendent',
					'desc' => 'Descendent',
					'rand' => 'Random',
				),
				'default' => 'asc'
			),
			array(
				'id' => 'adD_slides_no',
				'type' => 'slider',
				'required' => array(
					array('adD_post_slider', '!=', 'none'),
					array('adD_post_slider', '!=', 'map')
				),
				'title' => __( 'Number of Slides', 'clementine' ),
				'min' => 1,
				'max' => 10,
				'step' => 1,
				'default' => '3'
			),
			array(
				'id' => 'adD_slide_category',
				'type' => 'select',
				'required' => array(
					array('adD_post_slider', '!=', 'none'),
					array('adD_post_slider', '!=', 'map')
				),
				'title' => __( 'Select Category', 'clementine' ),
				'data' => 'categories',
				'placeholder' => 'Select Category'
			),
			array(
				'id' => 'adD_slide_exclude_category',
				'type' => 'select',
				'required' => array(
					array('adD_post_slider', '!=', 'none'),
					array('adD_post_slider', '!=', 'map')
				),
				'title' => __( 'Exclude Category', 'clementine' ),
				'data' => 'categories',
				'placeholder' => 'Exclude Category'
			),
			array(
				'id' => 'adD_center_coordinates',
				'type' => 'select',
				'required' => array(
					array('adD_post_slider', '!=', 'none'),
					array('adD_post_slider', '!=', 'slider'),
				),
				'title' => __( 'Center Map by Post', 'clementine' ),
				'subtitle' => __( '<strong>Select Post to center google map, be sure you added coordinates in the post</strong><br><br><strong><em>NOTICE: If you leave empty map will not be visible</em></strong>', 'clementine' ),
				'data' => 'post',
				'args' => array(
					'posts_per_page' => '-1',
					'meta_key' => 'map_coordinates'
				),
				'placeholder' => 'Select Post'
			),
			array(
				'id' => 'adD_google_map_on_all',
				'type' => 'switch',
				'required' => array(
					array('adD_post_slider', '!=', 'none'),
					array('adD_post_slider', '!=', 'slider'),
				),
				'title' => __('Enable Google Map on all pages', 'clementine'),
				'default' => false
			),
			array(
				'id' => 'adD_map_zoom',
				'type' => 'slider',
				'required' => array(
					array('adD_post_slider', '!=', 'none'),
					array('adD_post_slider', '!=', 'slider'),
				),
				'title' => __( 'Map Zoom', 'clementine' ),
				'min' => 2,
				'step' => 1,
				'max' => 15,
				'default' => 5
			),
			array(
				'id' => 'adD_map_height',
				'type' => 'dimensions',
				'required' => array(
					array('adD_post_slider', '!=', 'none'),
					array('adD_post_slider', '!=', 'slider'),
				),
				'title' => __( 'Map height', 'clementine' ),
				'units' => array('px', 'em'),
				'width' => false,
				'output' => array('#map'),
				'default' => array(
					'height' => '500'
				)
			),
			array(
				'id' => 'adD_styles',
				'type' => 'textarea',
				'required' => array(
					array('adD_post_slider', '!=', 'none'),
					array('adD_post_slider', '!=', 'slider'),
				),
				'title' => __( 'Map Styles', 'clementine' ),
				'description' => __( '<strong>You can use <a href="https://snazzymaps.com/" target="_blank">snazzy maps</a> to style your map and copy the code</strong>', 'clementine' ),
			),
		)
	)
);
#
# Theme Sections::Post Settings
#
Redux::setSection( $option_name,
	array(
		'title' => __( 'Post Settings', 'clementine' ),
		'icon' => 'el el-pencil',
		'fields' => array(
			array(
				'id' => 'adD_general_options',
				'type' => 'checkbox',
				'title' => __('Comments', 'clementine'),
				'options' => array(
					'hide-comments' => 'Hide Comments',
				)
			),
			array(
				'id' => 'adD_post_type',
				'type' => 'image_select',
				'title' => __('Article Layout', 'clementine'),
				'class' => 'image_selection',
				'options' => array(
					'default' => array(
						'alt' => 'Default with Sidebar',
						'title' => 'Default with Sidebar',
						'img' => ReduxFramework::$_url . 'images/post-default.png'
					),
					'full' => array(
						'alt' => 'Full width article',
						'title' => 'Full width article',
						'img' => ReduxFramework::$_url . 'images/post-full.png'
					),
				),
				'default' => 'default'
			),
			array(
				'id' => 'adD_post_sidebar_position',
				'type' => 'button_set',
				'title' => __( 'Sidebar Position', 'clementine' ),
				'required' => array(
					array('adD_post_type', '=', 'default'),
				),
				'options' => array(
					'left' => 'Left',
					'right' => 'Right'
				),
				'default' => 'right'
			),
			array(
				'id' => 'adD_read_more_string',
				'title' => __('Read More text', 'clementine'),
				'type' => 'text',
				'default' => 'Continue Reading'
			),
			array(
				'id' => 'adD_custom_excerpt_length',
				'title' => __('Custom Excerpt Length', 'clementine'),
				'type' => 'text',
				'default' => '17'
			),
			array(
				'id' => 'adD_post_sharing',
				'type' => 'switch',
				'title' => __('Social Sharing', 'clementine'),
				'default' => true
			),
			array(
				'id' => 'adD_post_related',
				'type' => 'switch',
				'title' => __('Related Posts', 'clementine'),
				'default' => true
			),
			array(
				'id' => 'adD_author_settings',
				'type' => 'section',
				'indent' => true,
				'title' => __('Author Settings', 'clementine'),
			),
			array(
				'id' => 'adD_author_name',
				'type' => 'text',
				'title' => __('Author name', 'clementine'),
				'placeholder' => __('Your name', 'clementine'),
				'class' => 'large'
			),
			array(
				'id' => 'adD_author_bio',
				'type' => 'textarea',
				'title' => __('Author Bio', 'clementine'),
				'allowed_html' => array(
				    'a' => array(
				        'href' => array(),
				        'title' => array()
				    ),
				    'br' => array(),
				    'em' => array(),
				    'strong' => array(),
				),
			),
			array(
				'id' => 'adD_author_image',
				'type' => 'media',
				'title' => __('Author image', 'clementine'),
				'subtitle' => __('Image size: 100x100', 'clementine'),
			),
			array(
				'id' => 'adD_author_website',
				'type' => 'text',
				'class' => 'large',
				'title' => __('Author Website', 'clementine'),
				'subtitle' => __('<strong>URL Required</strong>', 'clementine'),
			),
			array(
				'id' => 'adD_author_facebook',
				'type' => 'text',
				'class' => 'large',
				'title' => __('Author Facebook', 'clementine'),
				'subtitle' => __('<strong>URL Required</strong>', 'clementine'),
			),
			array(
				'id' => 'adD_author_twitter',
				'type' => 'text',
				'class' => 'large',
				'title' => __('Author Twitter', 'clementine'),
				'subtitle' => __('<strong>URL Required</strong>', 'clementine'),
			),
			array(
				'id' => 'adD_author_google',
				'type' => 'text',
				'class' => 'large',
				'title' => __('Author Google+', 'clementine'),
				'subtitle' => __('<strong>URL Required</strong>', 'clementine'),
			),
			array(
				'id' => 'adD_author_instagram',
				'type' => 'text',
				'class' => 'large',
				'title' => __('Author Instagram', 'clementine'),
				'subtitle' => __('<strong>URL Required</strong>', 'clementine'),
			),
			array(
				'id' => 'adD_author_behance',
				'type' => 'text',
				'class' => 'large',
				'title' => __('Author Behance', 'clementine'),
				'subtitle' => __('<strong>URL Required</strong>', 'clementine'),
			),
			array(
				'id' => 'adD_author_dribbble',
				'type' => 'text',
				'class' => 'large',
				'title' => __('Author Dribbble', 'clementine'),
				'subtitle' => __('<strong>URL Required</strong>', 'clementine'),
			),
			array(
				'id' => 'adD_author_linkedin',
				'type' => 'text',
				'class' => 'large',
				'title' => __('Author Linkedin', 'clementine'),
				'subtitle' => __('<strong>URL Required</strong>', 'clementine'),
			),
			array(
				'id' => 'adD_author_pinterest',
				'type' => 'text',
				'class' => 'large',
				'title' => __('Author Pinterest', 'clementine'),
				'subtitle' => __('<strong>URL Required</strong>', 'clementine'),
			),
			array(
				'id' => 'adD_author_youtube',
				'type' => 'text',
				'class' => 'large',
				'title' => __('Author Youtube', 'clementine'),
				'subtitle' => __('<strong>URL Required</strong>', 'clementine'),
			),
			array(
				'id' => 'adD_author_tumblr',
				'type' => 'text',
				'class' => 'large',
				'title' => __('Author Tumblr', 'clementine'),
				'subtitle' => __('<strong>URL Required</strong>', 'clementine'),
			),
		)
	)
);
#
# Theme Sections::Blog Layout
#
Redux::setSection( $option_name,
	array(
		'title' => __( 'Blog Layout', 'clementine' ),
		'icon' => 'el el-adjust-alt',
		'fields' => array(
			array(
				'id' => 'adD_layout',
				'class' => 'image_selection',
				'type' => 'image_select',
				'title' => __('Blog Layout', 'clementine'),
				'options' => array(
					'default' => array(
						'alt' => 'Default',
						'title' => 'Default',
						'img' => ReduxFramework::$_url . 'images/default.png'
					),
					'full-width' => array(
						'alt' => 'Full Width',
						'title' => 'Full Width',
						'img' => ReduxFramework::$_url . 'images/full-width.png'
					),
					'grid-2-cols' => array(
						'alt' => 'Grid 2 Columns',
						'title' => 'Grid 2 Columns',
						'img' => ReduxFramework::$_url . 'images/grid-2-cols.png'
					),
					'grid-3-cols' => array(
						'alt' => 'Grid 3 Columns',
						'title' => 'Grid 3 Columns',
						'img' => ReduxFramework::$_url . 'images/grid-3-cols.png'
					),
					'grid-4-cols' => array(
						'alt' => 'Grid 4 Columns',
						'title' => 'Full width 4 Columns',
						'img' => ReduxFramework::$_url . 'images/grid-4-cols.png'
					),
					'post-grid' => array(
						'alt' => '1st Full post then Grid Layout',
						'title' => '1st Full post then Grid Layout',
						'img' => ReduxFramework::$_url . 'images/post-grid.png'
					)
				),
				'default' => 'default'
			),
			array(
				'id' => 'adD_sidebar_position',
				'type' => 'button_set',
				'title' => __( 'Sidebar Position', 'clementine' ),
				'required' => array(
					array('adD_layout', '!=', 'full-width'),
					array('adD_layout', '!=', 'grid-4-cols'),
					array('adD_layout', '!=', 'grid-3-cols'),
				),
				'options' => array(
					'left' => 'Left',
					'right' => 'Right'
				),
				'default' => 'right'
			),
			array(
				'id' => 'adD_sidebars',
				'type' => 'multi_text',
				'title' => __( 'Create Sidebar', 'clementine' ),
				'subtitle' => __( '<strong>Use normal words: Example Sidebar</strong>', 'clementine' ),
				'desc' => __( '<strong>You are not allowed to use special characters</strong>', 'clementine' ),
			),
		)
	)
);
#
# Theme Sections::Visual Settings
#
Redux::setSection( $option_name,
	array(
		'title' => __( 'Visual Settings', 'clementine' ),
		'icon' => 'el el-brush',
		'fields' => array(
			array(
				'id' => 'h1_section',
				'type' => 'section',
				'indent' => true,
				'title' => __('H1 Headings', 'clementine'),
			),
			array(
				'id' => 'adD_h1',
				'google' => true,
				'subsets' => false,
				'text-align' => false,
				'text-transform' => true,
				'title' => __('HEADING H1', 'clementine'),
				'subtitle' => __('<strong>Choose your style for H1 Headings</strong>', 'clementine'),
				'type' => 'typography',
				'output' => array('h1, h1 a'),
				'default' => array(
					'color' => '#171717',
					'font-family' => 'Libre Baskerville',
					'font-weight' => '700',
					'font-size' => '40px',
					'text-transform' => 'none',
				)
			),
			array(
				'id' => 'adD_h1_margin',
				'title' => __('MARGIN', 'clementine'),
				'type' => 'spacing',
				'mode' => 'margin',
				'output' => array('h1'),
				'left' => false,
				'right' => false,
				'units' => array( 'em', 'px', '%' ),
				'default' => array(
					'units' => 'px'
				)
			),
			array(
				'id' => 'h2_section',
				'type' => 'section',
				'indent' => true,
				'title' => __('H2 Headings', 'clementine'),
			),
			array(
				'id' => 'adD_h2',
				'google' => true,
				'subsets' => false,
				'text-align' => false,
				'text-transform' => true,
				'title' => __('HEADING H2', 'clementine'),
				'subtitle' => __('<strong>Choose your style for H2 Headings</strong>', 'clementine'),
				'type' => 'typography',
				'output' => array('h2, h2 a'),
				'default' => array(
					'color' => '#171717',
					'font-family' => 'Libre Baskerville',
					'font-weight' => '700',
					'font-size' => '30px',
					'text-transform' => 'none',
				)
			),
			array(
				'id' => 'adD_h2_margin',
				'title' => __('MARGIN', 'clementine'),
				'type' => 'spacing',
				'mode' => 'margin',
				'output' => array('h2'),
				'left' => false,
				'right' => false,
				'units' => array( 'em', 'px', '%' ),
				'default' => array(
					'units' => 'px'
				)
			),
			array(
				'id' => 'h3_section',
				'type' => 'section',
				'indent' => true,
				'title' => __('H3 Headings', 'clementine'),
			),
			array(
				'id' => 'adD_h3',
				'google' => true,
				'subsets' => false,
				'text-align' => false,
				'text-transform' => true,
				'title' => __('HEADING H3', 'clementine'),
				'subtitle' => __('<strong>Choose your style for H3 Headings</strong>', 'clementine'),
				'type' => 'typography',
				'output' => array('h3, h3 a'),
				'default' => array(
					'color' => '#171717',
					'font-family' => 'Libre Baskerville',
					'font-weight' => '700',
					'font-size' => '24px',
					'text-transform' => 'none',
				)
			),
			array(
				'id' => 'adD_h3_margin',
				'title' => __('MARGIN', 'clementine'),
				'type' => 'spacing',
				'mode' => 'margin',
				'output' => array('h3'),
				'left' => false,
				'right' => false,
				'units' => array( 'em', 'px', '%' ),
				'default' => array(
					'units' => 'px'
				)
			),
			array(
				'id' => 'h4_section',
				'type' => 'section',
				'indent' => true,
				'title' => __('H4 Headings', 'clementine'),
			),
			array(
				'id' => 'adD_h4',
				'google' => true,
				'subsets' => false,
				'text-align' => false,
				'text-transform' => true,
				'title' => __('HEADING H4', 'clementine'),
				'subtitle' => __('<strong>Choose your style for H4 Headings</strong>', 'clementine'),
				'type' => 'typography',
				'output' => array('h4, h4 a'),
				'default' => array(
					'color' => '#171717',
					'font-family' => 'Libre Baskerville',
					'font-weight' => '700',
					'font-size' => '20px',
					'text-transform' => 'none',
				)
			),
			array(
				'id' => 'adD_h4_margin',
				'title' => __('MARGIN', 'clementine'),
				'type' => 'spacing',
				'mode' => 'margin',
				'output' => array('h4'),
				'left' => false,
				'right' => false,
				'units' => array( 'em', 'px', '%' ),
				'default' => array(
					'units' => 'px'
				)
			),
			array(
				'id' => 'h5_section',
				'type' => 'section',
				'indent' => true,
				'title' => __('H5 Headings', 'clementine'),
			),
			array(
				'id' => 'adD_h5',
				'google' => true,
				'subsets' => false,
				'text-align' => false,
				'text-transform' => true,
				'title' => __('HEADING H5', 'clementine'),
				'subtitle' => __('<strong>Choose your style for H5 Headings</strong>', 'clementine'),
				'type' => 'typography',
				'output' => array('h5, h5 a'),
				'default' => array(
					'color' => '#171717',
					'font-family' => 'Libre Baskerville',
					'font-weight' => '700',
					'font-size' => '18px',
					'text-transform' => 'none',
				)
			),
			array(
				'id' => 'adD_h5_margin',
				'title' => __('MARGIN', 'clementine'),
				'type' => 'spacing',
				'mode' => 'margin',
				'output' => array('h5'),
				'left' => false,
				'right' => false,
				'units' => array( 'em', 'px', '%' ),
				'default' => array(
					'units' => 'px'
				)
			),
			array(
				'id' => 'h6_section',
				'type' => 'section',
				'indent' => true,
				'title' => __('H6 Headings', 'clementine'),
			),
			array(
				'id' => 'adD_h6',
				'google' => true,
				'subsets' => false,
				'text-align' => false,
				'text-transform' => true,
				'title' => __('HEADING H6', 'clementine'),
				'subtitle' => __('<strong>Choose your style for H6 Headings</strong>', 'clementine'),
				'type' => 'typography',
				'output' => array('h6, h6 a'),
				'default' => array(
					'color' => '#171717',
					'font-family' => 'Libre Baskerville',
					'font-weight' => '700',
					'font-size' => '14px',
					'text-transform' => 'none',
				)
			),
			array(
				'id' => 'adD_h6_margin',
				'title' => __('MARGIN', 'clementine'),
				'type' => 'spacing',
				'mode' => 'margin',
				'output' => array('h6'),
				'left' => false,
				'right' => false,
				'units' => array( 'em', 'px', '%' ),
				'default' => array(
					'units' => 'px'
				)
			),
			array(
				'id' => 'paragraphs_section',
				'type' => 'section',
				'indent' => true,
				'title' => __('Paragraphs', 'clementine'),
			),
			array(
				'id' => 'adD_paragraph',
				'google' => true,
				'subsets' => false,
				'text-align' => false,
				'title' => __('Paragraph', 'clementine'),
				'subtitle' => __('<strong>Choose your style for paragraphs</strong>', 'clementine'),
				'type' => 'typography',
				'output' => array('p, span'),
				'default' => array(
					'color' => '#87909b',
					'font-family' => 'Montserrat',
					'font-weight' => '400',
					'line-height' => '24px',
					'font-size' => '13px',
				)
			),
			array(
				'id' => 'adD_paragraph_margin',
				'title' => __('MARGIN', 'clementine'),
				'type' => 'spacing',
				'mode' => 'margin',
				'output' => array('p, span'),
				'top' => false,
				'left' => false,
				'right' => false,
				'units' => array( 'em', 'px', '%' ),
				'default' => array(
					'units' => 'px'
				)
			),
			array(
				'id' => 'buttonslinks_section',
				'type' => 'section',
				'indent' => true,
				'title' => __('Buttons & Links', 'clementine'),
			),
			array(
				'id' => 'adD_buttonslinks',
				'title' => __('Link hover color', 'clementine'),
				'type' => 'link_color',
				'active' => false,
				'regular' => false,
				'output' => array('a, article .entry-content p a, #footer-social a, .post-author .social-media a, .single .post-link a, .section-large .post-meta span a, #back-to-top'),
				'default' => array(
					'hover' => '#fca90f'
				)
			),
			array(
				'id' => 'adD_button_color',
				'title' => __('Button background color', 'clementine'),
				'type' => 'background',
				'background-repeat' => false,
				'background-attachment' => false,
				'background-position' => false,
				'background-image' => false,
				'background-clip' => false,
				'background-origin' => false,
				'background-size' => false,
				'transparent' => false,
				'preview' => false,
				'output' => array('article .entry-footer .post-permalink .btn, .btn.button, input[type=submit]'),
				'default' => array(
					'background-color' => '#fca90f'
				)
			),
			array(
				'id' => 'adD_button_color_hover',
				'title' => __('Button background color hover', 'clementine'),
				'type' => 'background',
				'background-repeat' => false,
				'background-attachment' => false,
				'background-position' => false,
				'background-image' => false,
				'background-clip' => false,
				'background-origin' => false,
				'background-size' => false,
				'transparent' => false,
				'preview' => false,
				'output' => array('article .entry-footer .post-permalink .btn:hover, .btn.button:hover, input[type=submit]:hover, article .entry-header .post-media .category a:hover, .section-large .category a:hover, .widget .mc4wp-form input[type=submit]:hover'),
				'default' => array(
					'background-color' => '#fac76a'
				)
			),
		)
	)
);
#
# Theme Sections::Social Media
#
Redux::setSection( $option_name,
	array(
		'title' => __( 'Social Media', 'clementine' ),
		'icon' => 'el el-twitter',
		'fields' => array(
			array(
				'id' => 'adD_facebook',
				'type' => 'text',
				'class' => 'large',
				'title' => __('FACEBOOK', 'clementine'),
				'subtitle' => __('<strong>URL Required</strong>', 'clementine'),
			),
			array(
				'id' => 'adD_twitter',
				'type' => 'text',
				'class' => 'large',
				'title' => __('TWITTER', 'clementine'),
				'subtitle' => __('<strong>URL Required</strong>', 'clementine'),
			),
			array(
				'id' => 'adD_google',
				'type' => 'text',
				'class' => 'large',
				'title' => __('GOOGLE+', 'clementine'),
				'subtitle' => __('<strong>URL Required</strong>', 'clementine'),
			),
			array(
				'id' => 'adD_instagram',
				'type' => 'text',
				'class' => 'large',
				'title' => __('INSTAGRAM', 'clementine'),
				'subtitle' => __('<strong>URL Required</strong>', 'clementine'),
			),
			array(
				'id' => 'adD_behance',
				'type' => 'text',
				'class' => 'large',
				'title' => __('BEHANCE', 'clementine'),
				'subtitle' => __('<strong>URL Required</strong>', 'clementine'),
			),
			array(
				'id' => 'adD_dribbble',
				'type' => 'text',
				'class' => 'large',
				'title' => __('DRIBBBLE', 'clementine'),
				'subtitle' => __('<strong>URL Required</strong>', 'clementine'),
			),
			array(
				'id' => 'adD_linkedin',
				'type' => 'text',
				'class' => 'large',
				'title' => __('LINKEDIN', 'clementine'),
				'subtitle' => __('<strong>URL Required</strong>', 'clementine'),
			),
			array(
				'id' => 'adD_flickr',
				'type' => 'text',
				'class' => 'large',
				'title' => __('FLICKR', 'clementine'),
				'subtitle' => __('<strong>URL Required</strong>', 'clementine'),
			),
			array(
				'id' => 'adD_vimeo',
				'type' => 'text',
				'class' => 'large',
				'title' => __('VIMEO', 'clementine'),
				'subtitle' => __('<strong>URL Required</strong>', 'clementine'),
			),
			array(
				'id' => 'adD_soundcloud',
				'type' => 'text',
				'class' => 'large',
				'title' => __('SOUNDCLOUD', 'clementine'),
				'subtitle' => __('<strong>URL Required</strong>', 'clementine'),
			),
			array(
				'id' => 'adD_deviantart',
				'type' => 'text',
				'class' => 'large',
				'title' => __('DEVIANTART', 'clementine'),
				'subtitle' => __('<strong>URL Required</strong>', 'clementine'),
			),
			array(
				'id' => 'adD_pinterest',
				'type' => 'text',
				'class' => 'large',
				'title' => __('PINTEREST', 'clementine'),
				'subtitle' => __('<strong>URL Required</strong>', 'clementine'),
			),
			array(
				'id' => 'adD_youtube',
				'type' => 'text',
				'class' => 'large',
				'title' => __('YOUTUBE', 'clementine'),
				'subtitle' => __('<strong>URL Required</strong>', 'clementine'),
			),
			array(
				'id' => 'adD_rss',
				'type' => 'text',
				'class' => 'large',
				'title' => __('RSS', 'clementine'),
				'subtitle' => __('<strong>URL Required</strong>', 'clementine'),
			),
			array(
				'id' => 'adD_tumblr',
				'type' => 'text',
				'class' => 'large',
				'title' => __('TUMBLR', 'clementine'),
				'subtitle' => __('<strong>URL Required</strong>', 'clementine'),
			),
		)
	)
);
#
# Theme Sections::Footer Settings
#
Redux::setSection( $option_name,
	array(
		'title' => __( 'Footer Settings', 'clementine' ),
		'icon' => 'el el-website',
		'fields' => array(
			array(
				'id' => 'adD_footer_widgets',
				'type' => 'switch',
				'title' => __('Footer Widgets', 'clementine'),
				'default' => false
			),
			array(
				'id' => 'adD_footer_layout',
				'class' => 'image_selection',
				'required' => array('adD_footer_widgets', 'equals', '1'),
				'type' => 'image_select',
				'title' => __('Widgets Layout', 'clementine'),
				'options' => array(
					'footer-2' => array(
						'alt' => '2 columns',
						'img' => ReduxFramework::$_url . 'images/footer/2-columns.jpg'
					),
					'footer-3' => array(
						'alt' => '3 columns',
						'img' => ReduxFramework::$_url . 'images/footer/3-columns.jpg'
					),
					'footer-4' => array(
						'alt' => '4 columns',
						'img' => ReduxFramework::$_url . 'images/footer/4-columns.jpg'
					)
				),
				'default' => 'footer-3'
			),
			array(
				'id' => 'adD_footer_logo',
				'type' => 'media',
				'title' => __('Upload Logo', 'clementine'), 
				'required' => array('adD_footer_widgets', '!=', '1'),
				'default' => array(
					'url' => get_template_directory_uri() . '/theme-utilities/images/logo-2.png'
				)
			),
			array(
				'id' => 'adD_footer_social',
				'type' => 'switch',
				'title' => __('Social Icons', 'clementine'),
				'default' => true
			),
			array(
				'id' => 'adD_copyright',
				'type' => 'textarea',
				'rows' => '5',
				'validate' => 'html_custom',
				'allowed_html' => array(
				    'a' => array(
				        'href' => array(),
				        'title' => array()
				    ),
				    'br' => array(),
				    'em' => array(),
				    'strong' => array(),
				),
				'title' => __('Copyright Text', 'clementine'),
				'subtitle' => __('<strong>Enter your copyright text.<br>HTML allowed</strong>', 'clementine'),
				'default' => 'Copyright '. date( 'Y' ) .' '. $theme->get( 'Name' ) .' All Rights Reserved'
			)
		)
	)
);
#
# Theme Sections::Custom Code
#
Redux::setSection( $option_name,
	array(
		'title' => __( 'Custom Code', 'clementine' ),
		'icon' => 'el el-edit',
		'fields' => array(
			array(
				'id' => 'adD_custom_css',
				'type' => 'ace_editor',
				'mode' => 'css',
				'title' => __('Custom Css code', 'clementine'),
				'subtitle' => __('<strong>clementine allows you to restyle it using custom CSS that overwrites the default styling.</strong>', 'clementine'),
				'default' => "/* Have fun adding your styles here */\n#custom{\nmargin: 0 auto;\n}",
			),
			array(
				'id' => 'adD_custom_js',
				'type' => 'ace_editor',
				'mode' => 'javascript',
				'title' => __('Custom Javascript code', 'clementine'),
				'subtitle' => __('<strong>You can use global symbol $</strong>', 'clementine'),
				'default' => "/* Have fun adding your javascript code here */\n$(document).ready(function() {\n //Your code here \n});",
			),
		)
	)
);
if ( ! function_exists( 'redux_validate_callback_function' ) ) {
    function redux_validate_callback_function( $field, $value, $existing_value ) {
        $error   = false;
        $warning = false;
        //do your validation
        if ( $value == 1 ) {
            $error = true;
            $value = $existing_value;
        } elseif ( $value == 2 ) {
            $warning = true;
            $value   = $existing_value;
        }
        $return['value'] = $value;
        if ( $error == true ) {
            $return['error'] = $field;
            $field['msg']    = 'your custom error message';
        }
        if ( $warning == true ) {
            $return['warning'] = $field;
            $field['msg']      = 'your custom warning message';
        }
        return $return;
    }
}
function addPanelCSS() {
    wp_register_style(
        'redux-custom-css',
        THEME_URL . '/theme-functions/core/custom.css',
        array( 'redux-admin-css' ),
        time(),
        'all'
    );
    wp_enqueue_style('redux-custom-css');
}
add_action( 'redux/page/clementine_theme_options/enqueue', 'addPanelCSS' );
function addPanelJS() {
    wp_register_script(
        'redux-custom-js',
        THEME_URL . '/theme-functions/core/custom.js',
        array( 'jquery' ),
        time(),
        'all'
    );
    wp_enqueue_script('redux-custom-js');
}
add_action( 'redux/page/clementine_theme_options/enqueue', 'addPanelJS' );

/** remove redux menu under the tools **/
add_action( 'admin_menu', 'remove_redux_menu',12 );
function remove_redux_menu() {
    remove_submenu_page('tools.php','redux-about');
}