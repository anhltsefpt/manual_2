<?php
/*-----------------------------------------------------------------------------------*/
/*	 HAMBURGER MENU & SEARCH BOX ON THE NAVIGATION BAR
/*-----------------------------------------------------------------------------------*/

add_filter( 'cmb2_admin_init', 'manual_page_menu_metaboxes' );
function manual_page_menu_metaboxes() {
	$prefix = '_manual_';
	$cmb = new_cmb2_box( array(
        'id'            => 'page_menu_options',
        'title'         => esc_html__( '\'Hamburger Menu & Search Box\' On The Main Menu Bar', 'manual' ),
        'object_types'  => array( 'page', 'manual_portfolio' ), 
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
		'closed'     => true,
    ) );
	$cmb->add_field( array(
		'name' => esc_html__( 'Hamburger Menu', 'manual' ),
		'desc' => esc_html__( 'On checked, the main menu will be replaced by hamburger menu.', 'manual' ),
		'id'   => $prefix .'header_display_hamburger_bar',
		'type' => 'checkbox'
	) );
	$cmb->add_field( array(
		'name' => esc_html__( 'Search Box On The Main Menu Bar', 'manual' ),
		'desc' => __('On checked, the search box will appear on the main menu bar. <i style="color:#f10000;">(NOTE: Only work if, hamburger menu active)</i>', 'manual' ),
		'id'   => $prefix .'header_display_search_box_on_menu_bar',
		'type' => 'checkbox',
	) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Search Design', 'manual' ),
		'desc' => esc_html__( 'On checked, classic search design will be replace by simple modern design', 'manual' ),
		'id'   => $prefix .'header_display_search_box_modern_on_menu_bar',
		'type' => 'checkbox',
	) );
	
}
 
/*-----------------------------------------------------------------------------------*/
/*	PAGE HEADER CONFIGURATION
/*-----------------------------------------------------------------------------------*/
add_filter( 'cmb2_admin_init', 'manual_page_metaboxes' );
function manual_page_metaboxes() {
	
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_manual_';
	
	$cmb = new_cmb2_box( array(
        'id'            => 'page_options',
        'title'         => esc_html__( 'Main Menu - Style', 'manual' ),
        'object_types'  => array( 'page', 'manual_portfolio' ), 
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
		'closed'     => true,
    ) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Hide Main Menu', 'manual' ),
		'desc' => __('Hide header (logo + main menu). <i style="color:#f10000;">(will appear ONLY if, sticky menu active)</i>','manual' ),
		'id'   => $prefix .'header_hide_menu_bar',
		'type' => 'checkbox'
	) );
	
	$cmb->add_field( array(
		'name'             => esc_html__( 'Main Menu - Style', 'manual' ),
		'desc'             => 'Select an option',
		'id'               => $prefix .'nav_style_type',
		'type'             => 'select',
		'default'          => 'default', //'custom',
		'options'          => array(
			'default'   => esc_html__( 'Theme Option - {Default - Main Menu} Style', 'manual' ),
			'custom'   => esc_html__( 'With Transparent Background', 'manual' ),
			'standard' => esc_html__( 'Without Background (White Backgorund)', 'manual' ),
			),
	) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Add - Nav Background', 'manual' ),
		'desc' => esc_html__('If checked, transparent background will be added on the header nav bar.', 'manual' ),
		'id'   => $prefix .'remove_nav_header_bg_opacity',
		'type' => 'checkbox'
	) );
	
	
	$cmb->add_field( array(
		'name'    => esc_html__( 'Background Color', 'manual' ),
		'id'      => $prefix .'nav_header_bg_color',
		'type'    => 'colorpicker',
		'default' => '#35373F',
		'classes' => 'theme_metabox_margin_left_50',
	) );
	
	$cmb->add_field( array(
		'name'    => esc_html__( 'Background Opacity', 'manual' ),
		'default' => '',
		'id'      => $prefix .'nav_header_bg_color_opacity',
		'type'    => 'text_small',
		'desc'    => esc_html__('Default: 0.3 (Make sure opacity value is between 0.1 to 0.9)','manual' ),
		'classes' => 'theme_metabox_margin_left_50',
	) );
	
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Add - Nav Border Bottom', 'manual' ),
		'desc' => esc_html__('If checked, transparent border will be added on the header nav bar (works best with header type "Transparent Background")', 'manual' ),
		'id'   => $prefix .'remove_nav_border_line',
		'type' => 'checkbox'
	) );
	
	$cmb->add_field( array(
		'name'    => esc_html__( 'Border Bottom Color', 'manual' ),
		'id'      => $prefix .'nav_border_color',
		'type'    => 'colorpicker',
		'default' => '#949494',
		'classes' => 'theme_metabox_margin_left_50',
	) );
	
	$cmb->add_field( array(
		'name'    => esc_html__( 'Border Bottom Color Opacity', 'manual' ),
		'default' => '0.6',
		'id'      => $prefix .'nav_border_opacity',
		'type'    => 'text_small',
		'desc'    => esc_html__('Default: 0.6 (Make sure opacity value is between 0.1 to 0.9)', 'manual' ),
		'classes' => 'theme_metabox_margin_left_50',
	) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Add - Nav Box Shadow', 'manual' ),
		'desc' => esc_html__('If checked, box shadow will be added on the header nav bar.', 'manual' ),
		'id'   => $prefix .'remove_nav_box_shadow',
		'type' => 'checkbox'
	) );
	
}

/*-----------------------------------------------------------------------------------*/
/*	PAGE TITLE BAR
/*-----------------------------------------------------------------------------------*/
add_filter( 'cmb2_admin_init', 'manual_page_metaboxes_header_control' );
function manual_page_metaboxes_header_control() {
	
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_manual_';
	
	$cmb = new_cmb2_box( array(
        'id'            => 'page_header_control_options',
        'title'         => esc_html__( 'Page Title Bar', 'manual' ),
        'object_types'  => array( 'page', 'manual_portfolio' ), 
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
		'closed'     => true,
    ) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Hide Page Title Bar', 'manual' ),
		'desc' => esc_html__('Check to hide title bar.','manual' ),
		'id'   => $prefix .'header_hide_header_bar',
		'type' => 'checkbox'
	) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Activate - Search Box', 'manual' ),
		'desc' => esc_html__('If checked, search box will appear on the page title bar', 'manual' ),
		'id'   => $prefix .'header_searh_box',
		'type' => 'checkbox'
	) );
	
	$cmb->add_field( array(
		'name'             => esc_html__( 'Search Box Display Column Layout', 'manual' ),
		'desc'             => esc_html__('Select an option', 'manual' ),
		'id'               => $prefix .'search_box_display_grid',
		'type'             => 'select',
		'default'          => '5',
		'classes'          => 'theme_metabox_margin_left_50',
		'options'          => array(
			'center' => esc_html__( 'Exact Center', 'manual' ),
			'6' => esc_html__( '50% Width', 'manual' ),
			'7' => esc_html__( '58% Width', 'manual' ),
			'8' => esc_html__( '66% Width', 'manual' ),
			'9' => esc_html__( '75% Width', 'manual' ),
			'10'  => esc_html__( '83% Width', 'manual' ),
			'11'  => esc_html__( '91% Width', 'manual' ),
			'12'  => esc_html__( '100% Width', 'manual' ),
			),
	) );
	
	
	$cmb->add_field( array(
		'name'    => esc_html__('[Readjust] Page Title Bar Height','manual' ),
		'desc'    => __('Example: 120px 0px 120px 0px (TOP, RIGHT, BOTTOM, LEFT) <br> <strong style="color:#e6614b;">IMPORTANT: Make sure the value of RIGHT, LEFT is always 0px</strong>','manual' ),
		'default' => '',
		'id' => $prefix . 'header_re_adjust_padding',
		'type'    => 'text',
	) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Title Bar - Background Color', 'manual' ),
		'desc' => __('Background color <strong>will NOT work</strong> if uploaded Header Image and checked option <strong>\'Apply Parallax Effect For the Upload Image\'</strong>','manual' ),
		'id'   => $prefix .'header_background_color',
		'type' => 'colorpicker'
	) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Background Linear Gradient Color', 'manual' ),
		'desc' => __('<strong style="color:#e6614b;">NOTE: \'Title Bar - Background Color\' must be enable to activate this feature.</strong>','manual' ),
		'id'   => $prefix .'header_background_color_linear',
		'type' => 'colorpicker',
		'classes' => 'theme_metabox_margin_left_50',
	) );

	
	$cmb->add_field( array(
		'name' => esc_html__( 'Force apply white logo and white menu bar text for the selected \'Title Bar Background Color\'', 'manual' ),
		'desc' => __('Apply white logo and white text color on the menu bar. <br><i style="color:#f10000;">(Works only if "Main Menu - Style == Transparent Background")</i>','manual' ),
		'id'   => $prefix .'header_background_color_force_white',
		'type' => 'checkbox',
		'classes' => 'theme_metabox_margin_left_50',  
	) );
	
	
	$cmb->add_field( array(
		'name'    => esc_html__( 'Page Header Image', 'manual' ), 
		'desc'    => esc_html__( 'Upload image for your header (Note: Does not work if, place slider revolution shortcode or select <strong>Template as "Home Page") ' , 'manual' ),
		'id'      => $prefix .'header_image',
		'type'    => 'file',
		'options' => array(
			'url' => true, // Hide the text input for the url
			'add_upload_file_text' => 'Add Or Upload File' // Change upload button text. Default: "Add or Upload File"
		),
	) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Force apply black logo and black menu bar text for the selected \'Page Header Image\'', 'manual' ),
		'id'   => $prefix .'header_background_img_force_black',
		'desc' => __('<i style="color:#f10000;">Works only if "Main Menu - Style == Transparent Background" </i>','manual' ),
		'type' => 'checkbox',
		'classes' => 'theme_metabox_margin_left_50',
	) );
	
	$cmb->add_field( array(
		'name'             => esc_html__( 'Background Image Display Position', 'manual' ),
		'desc'             => esc_html__('Option does not work if applied Parallax Effect','manual' ),
		'id'               => $prefix .'background_img_display_position',
		'type'             => 'select',
		'default'          => 'center center',
		'classes' => 'theme_metabox_margin_left_50',
		'options'          => array(
			'center top'      => esc_html__( 'Center Top', 'manual' ),
			'center center'   => esc_html__( 'Center Center', 'manual' ),
			'center bottom'   => esc_html__( 'Center Bottom', 'manual' ),
			),
	) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Apply Background Opacity For the Upload Image', 'manual' ),
		'desc' => esc_html__( 'If checked, Background Opacity will activate', 'manual' ),
		'id'   => $prefix .'header_bk_opacity_effect',
		'type' => 'checkbox',
		'classes' => 'theme_metabox_margin_left_50',
	) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Opacity Color', 'manual' ),
		'id'   => $prefix .'header_background_bg_cover_opacity_color',
		'type' => 'colorpicker',
		'classes' => 'theme_metabox_margin_left_50',
	) );
	
	$cmb->add_field( array(
		'name'    => esc_html__( 'Color Opacity Depth', 'manual' ),
		'default' => '0.3',
		'id'      => $prefix .'bg_color_opacity_depth',
		'type'    => 'text_small',
		'desc'    => esc_html__('Default:0.3 (Make sure opacity value is between 0.1 to 0.9)', 'manual' ),
		'classes' => 'theme_metabox_margin_left_100',
	) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Apply Parallax Effect For the Upload Image', 'manual' ),
		'desc' => esc_html__( 'If checked, Parallax effect will activate', 'manual' ),
		'id'   => $prefix .'header_parallax_effect',
		'type' => 'checkbox',
		'classes' => 'theme_metabox_margin_left_50',
	) );
	
	$cmb->add_field( array(
		'name'    => esc_html__( 'Slider Revolution ShortCode', 'manual' ),
		'desc'    => __('Will replace header image or background color (Copy and paste your shortcode located in "Slider Revolution -> Slider Revolution -> Embed Slider")', 'manual' ),
		'id'      => $prefix .'slider_rev_shortcode',
		'type'    => 'text',
	) );
	
}

/*-----------------------------------------------------------------------------------*/
/*	PAGE HEADER CONFIGURATION
/*-----------------------------------------------------------------------------------*/
add_filter( 'cmb2_admin_init', 'manual_page_metaboxes_header_text_control' );
function manual_page_metaboxes_header_text_control() {
	
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_manual_';
	
	$cmb = new_cmb2_box( array(
        'id'            => 'page_header_text_control_options',
        'title'         => esc_html__( 'Page Title Bar - Text Control', 'manual' ),
        'object_types'  => array( 'page', 'manual_portfolio' ), 
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
		'closed'     => true,
    ) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Disable Title', 'manual' ),
		'desc' => esc_html__( 'If checked, title will be disable', 'manual' ),
		'id'   => $prefix .'header_no_title',
		'type' => 'checkbox',
	) );
	
	$cmb->add_field( array(
		'name'             => esc_html__( 'Text Alignment', 'manual' ),
		'desc'             => esc_html__( 'Header Content alignment', 'manual' ),
		'id'               => $prefix .'text_align_title_and_desc',
		'type'             => 'select',
		'default'          => 'default', //'center',
		'options'          => array(
			'default'   => esc_html__( 'Theme Option - {Default - Theme Title Bar} Alignment', 'manual' ),					
			'left'    => esc_html__( 'Left', 'manual' ),
			'center'  => esc_html__( 'Center', 'manual' ),
			'right'   => esc_html__( 'Right', 'manual' ),
			),
	) );
	
	$cmb->add_field( array(
		'name'    => esc_html__( 'Replacement Title', 'manual' ),
		'desc'    => esc_html__( 'New page tagline', 'manual' ), 
		'id'      => $prefix.'page_tagline',
		'type'    => 'text',
		'sanitization_cb' => 'manual_sanitization_func',
	) );
	
	   // [+] Replacement Title Text Style
	
		$cmb->add_field( array(
			'name'    => esc_html__( 'Title Color', 'manual' ),  
			'id'      => $prefix . 'page_tagline_color',
			'type'    => 'colorpicker',
			'desc'    => __('<strong>Default: #4d515c</strong>  (NOTE: for image background use #FFFFFF)', 'manual' ),  
		) );
		
		$cmb->add_field( array(
			'name'    => esc_html__( 'Title Size', 'manual' ),
			'desc'    => __('<strong>(omit px)</strong> (please enter as: 36)','manual' ), 
			'id'   => $prefix . 'page_tagline_size',
			'type'    => 'text_small'
		) );
		
		$cmb->add_field( array(
			'name'             => esc_html__( 'Title Weight', 'manual' ),
			'id'      		   => $prefix . 'page_tagline_weight',
			'type'             => 'select',
			'show_option_none' => false,
			'default'          => '',
			'options'          => array(
				 '' 	  => esc_html__( '' ),
				'100' 	  => esc_html__( 'Thin 100', 'manual' ),
				'200'     => esc_html__( 'Extra-Light 200', 'manual' ),
				'300'     => esc_html__( 'Light 300', 'manual' ),
				'400'     => esc_html__( 'Regular 400', 'manual' ),
				'500'     => esc_html__( 'Medium 500', 'manual' ),
				'600'     => esc_html__( 'Semi-Bold 600', 'manual' ),
				'700'     => esc_html__( 'Bold 700', 'manual' ),
				'800'     => esc_html__( 'Extra-Bold 800', 'manual' ),
				'900'     => esc_html__( 'Ultra-Bold 900', 'manual' ),
			),
		) );
		
		$cmb->add_field( array(
			'name'             => esc_html__( 'Title Text Transform', 'manual' ),
			'id'      		   => $prefix . 'header_title_text_transform',
			'type'             => 'select',
			'show_option_none' => false,
			'options'          => array(
				'' => esc_html__(''),
				'uppercase' => esc_html__( 'Uppercase', 'manual' ),
				'capitalize'   => esc_html__( 'Capitalize', 'manual' ),
				'none'   => esc_html__( 'None', 'manual' ),
			),
		) );
		
		$group_field_title_text_extra_settings = $cmb->add_field( array(
			'id'          => $prefix.'extra_title_text_settings',
			'type'        => 'group',
			'repeatable'  => false,
			'options'     => array(
				'group_title'   => esc_html__( '[+] Extra Title Text Style', 'manual' ), 
				'add_button'    => esc_html__( 'Add Another Entry', 'manual' ),
				'remove_button' => esc_html__( 'Remove Entry', 'manual' ),
				'sortable'      => true, 
				'closed'       => true, 
			),
		) );
		
		$cmb->add_group_field( $group_field_title_text_extra_settings, array(
			'name'    => esc_html__( 'Padding', 'manual' ),
			'desc'    => __('<strong>Default: 0px 0px 0px 0px (top right buttom left)</strong> ','manual' ), 
			'default' => '',
			'id'      => 'title_text_padding',
			'type'    => 'text'
		) );
		
		$cmb->add_group_field( $group_field_title_text_extra_settings, array(
			'name'    => esc_html__( 'Margin', 'manual' ),
			'desc'    => __('<strong>Example: 0px 0px 0px 0px (top right buttom left)</strong> ','manual' ),
			'default' => '',
			'id'      => 'title_text_margin',
			'type'    => 'text'
		) );
		
		$cmb->add_group_field( $group_field_title_text_extra_settings, array(
			'name'    => esc_html__( 'Line Height', 'manual' ),
			'desc'    => __('example:35px', 'manual' ),
			'default' => '',
			'id'      => 'title_text_line_height',
			'type'    => 'text'
		) );
		
		$cmb->add_group_field( $group_field_title_text_extra_settings, array(
			'name'    => esc_html__( 'Letter Spacing', 'manual' ),
			'desc'    => __('example:-1px or 0.4px etc...', 'manual' ),
			'default' => '',
			'id'      => 'title_text_letter_spacing',
			'type'    => 'text'
		) );
		
	   // Eof [+] Replacement Title Text Style
	
		$cmb->add_field( array(
			'name'    => esc_html__( 'Subtitle Text', 'manual' ),
			'desc'    => esc_html__( 'Enter your subtitle text (will appear under title)', 'manual' ), 
			'id'   => $prefix . 'page_desc',
			'type'    => 'text',
			'sanitization_cb' => 'manual_sanitization_func',
		) );

		// [+] Replacement Sub-Title Text Style

		$group_field_subtitle_text_other_settings = $cmb->add_field( array(
			'id'          => $prefix.'subtitle_text_settings',
			'type'        => 'group',
			'repeatable'  => false,
			'options'     => array(
				'group_title'   => esc_html__( '[+] Subtitle Text Style', 'manual' ), 
				'add_button'    => esc_html__( 'Add Another Entry', 'manual' ),
				'remove_button' => esc_html__( 'Remove Entry', 'manual' ),
				'sortable'      => true, 
				'closed'       => true, 
			),
		) );
		
		$cmb->add_group_field( $group_field_subtitle_text_other_settings, array(
			'name'    => esc_html__( 'Text Color', 'manual' ),  
			'id'      => 'title_text_color',
			'type'    => 'colorpicker',
			'desc'    => __('<strong>Default: #989CA6</strong>  (NOTE: for image background use #FFFFFF)', 'manual' ),  
		) );
		
		$cmb->add_group_field( $group_field_subtitle_text_other_settings, array(
			'name'    => esc_html__( 'Text Size', 'manual' ),
			'desc'    => __('<strong>Default:18px</strong> (please enter as: 15px)','manual' ),
			'id'      => 'title_text_size',
			'type'    => 'text_small'
		) );
		
		$cmb->add_group_field( $group_field_subtitle_text_other_settings, array(
			'name'             => esc_html__( 'Title Weight', 'manual' ),
			'id'               => 'title_text_weight',
			'type'             => 'select',
			'show_option_none' => false,
			'default'          => '400',
			'desc'             => __( '<strong>Default: Regular 400</strong>', 'manual' ),
			'options'          => array(
				'100'     => esc_html__( 'Thin 100', 'manual' ),
				'200'     => esc_html__( 'Extra-Light 200', 'manual' ),
				'300'     => esc_html__( 'Light 300', 'manual' ),
				'400'     => esc_html__( 'Regular 400', 'manual' ),
				'500'     => esc_html__( 'Medium 500', 'manual' ),
				'600'     => esc_html__( 'Semi-Bold 600', 'manual' ),
				'700'     => esc_html__( 'Bold 700', 'manual' ),
				'800'     => esc_html__( 'Extra-Bold 800', 'manual' ),
				'900'     => esc_html__( 'Ultra-Bold 900', 'manual' ),
			),
		) );
		
		$cmb->add_group_field( $group_field_subtitle_text_other_settings, array(
			'name'             => esc_html__( 'Text Transform', 'manual' ),
			'id'               => 'subtitle_text_transform',
			'type'             => 'select',
			'show_option_none' => false,
			'default'          => 'none',
			'desc'             => __('<strong>Default: none</strong>','manual' ),
			'options'          => array(
				'uppercase'    => esc_html__( 'Uppercase', 'manual' ),
				'capitalize'   => esc_html__( 'Capitalize', 'manual' ),
				'none'         => esc_html__( 'None', 'manual' ),
			),
		) );
		
		$cmb->add_group_field( $group_field_subtitle_text_other_settings, array(
			'name'    => esc_html__( 'Padding', 'manual' ),
			'desc'    => __('<strong>Default: 0px 0px 0px 0px (top right buttom left)</strong> ', 'manual' ),
			'default' => '',
			'id'      => 'sub_title_text_padding',
			'type'    => 'text'
		) );
		
		$cmb->add_group_field( $group_field_subtitle_text_other_settings, array(
			'name'    => esc_html__( 'Margin', 'manual' ),
			'desc'    => __('<strong>Default: 0px 0px 0px 0px (top right buttom left)</strong> ', 'manual' ),
			'default' => '',
			'id'      => 'sub_title_text_margin',
			'type'    => 'text'
		) );
		
		$cmb->add_group_field( $group_field_subtitle_text_other_settings, array(
			'name'    => esc_html__( 'Line Height', 'manual' ),
			'desc'    => esc_html__('example:35px', 'manual' ),
			'default' => '',
			'id'      => 'sub_title_text_line_height',
			'type'    => 'text'
		) );
		
		$cmb->add_group_field( $group_field_subtitle_text_other_settings, array(
			'name'    => esc_html__( 'Letter Spacing', 'manual' ),
			'desc'    => esc_html__('example:-1px or 0.4px etc...', 'manual' ),
			'default' => '',
			'id'      => 'sub_title_text_letter_spacing',
			'type'    => 'text'
		) );

	   // Eof [+] Sub Title Text Style
	  
		$cmb->add_field( array(
			'name' => esc_html__( 'Activate Breadcrumb', 'manual' ),
			'desc' => esc_html__( 'If checked, breadcrumb will be activate', 'manual' ),
			'id'   => $prefix .'header_breadcrumb_status',
			'type' => 'checkbox'
		) );
		
		$group_breadcrumb_other_settings = $cmb->add_field( array(
			'id'          => $prefix.'breadcrumb_settings',
			'type'        => 'group',
			'repeatable'  => false,
			'options'     => array(
				'group_title'   => esc_html__( '[+] Breadcrumb Style', 'manual' ), 
				'add_button'    => esc_html__( 'Add Another Entry', 'manual' ),
				'remove_button' => esc_html__( 'Remove Entry', 'manual' ),
				'sortable'      => true, 
				'closed'       => true, 
			),
		) );
		
		$cmb->add_group_field( $group_breadcrumb_other_settings, array(
			'name'    => esc_html__( 'Text Color', 'manual' ),  
			'id'      => 'text_color',
			'type'    => 'colorpicker',
			'desc'    => esc_html__('NOTE: for image background use #F4F4F4', 'manual' ),
		) );
	
		$cmb->add_group_field( $group_breadcrumb_other_settings, array(
			'name'    => esc_html__( 'Link Text Color', 'manual' ),  
			'id'      => 'link_text_color',
			'type'    => 'colorpicker',
			'desc'    => esc_html__('NOTE: for image background use #FFFFFF', 'manual' ),
		) );
	
		$cmb->add_group_field( $group_breadcrumb_other_settings, array(
			'name'    => esc_html__( 'Link Text Hover Color', 'manual' ),  
			'id'      => 'link_text_hover_color',
			'type'    => 'colorpicker',
			'desc'    => esc_html__('NOTE: for image background use #d8d3d3', 'manual' ),
		) );
		
		$trending_search_settings = $cmb->add_field( array(
			'id'          => $prefix.'trending_search_settings',
			'type'        => 'group',
			'repeatable'  => false,
			'options'     => array(
				'group_title'   => esc_html__( '[+] Trending Search Style', 'manual' ), 
				'add_button'    => esc_html__( 'Add Another Entry', 'manual' ),
				'remove_button' => esc_html__( 'Remove Entry', 'manual' ),
				'sortable'      => true, 
				'closed'       => true, 
			),
		) );
		
		$cmb->add_group_field( $trending_search_settings, array(
			'name'    => esc_html__( 'Search Text Color', 'manual' ),  
			'id'      => 'text_color',
			'type'    => 'colorpicker',
			'desc'    => esc_html__('NOTE: for image background use #F4F4F4', 'manual' ),  
		) );
	
		$cmb->add_group_field( $trending_search_settings, array(
			'name'    => esc_html__( 'Search Link Text Color', 'manual' ),  
			'id'      => 'link_text_color',
			'type'    => 'colorpicker',
			'desc'    => esc_html__( 'NOTE: for image background use #FFFFFF', 'manual' ), 
		) );
	
		$cmb->add_group_field( $trending_search_settings, array(
			'name'    => esc_html__( 'Search Link Text Hover Color', 'manual' ),  
			'id'      => 'link_text_hover_color',
			'type'    => 'colorpicker',
			'desc'    => esc_html__('NOTE: for image background use #d8d3d3', 'manual' ),  
		) );
	  
}

/*-----------------------------------------------------------------------------------*/
/*	PAGE HEADER CONFIGURATION
/*-----------------------------------------------------------------------------------*/
add_filter( 'cmb2_admin_init', 'manual_page_footer_metaboxes' );
function manual_page_footer_metaboxes() {
	
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_manual_';
	
	$cmb = new_cmb2_box( array(
        'id'            => 'page_footer_options',
        'title'         => esc_html__( 'Page Footer', 'manual' ),
        'object_types'  => array( 'page', 'manual_portfolio' ), 
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
		'closed'     => true,
    ) );

	$cmb->add_field( array(
		'name' => esc_html__( 'Forcely De-activate Footer Widget Area', 'manual' ),
		'desc' => esc_html__( 'Will de-activate footer widget area', 'manual' ),
		'id'   => $prefix .'footer_force_hide_widget_area',
		'type' => 'checkbox'
	) );
	
}
?>