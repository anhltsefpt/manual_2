<?php
/*************************************
***      REMOVING SHORTCODES       ***
**************************************/

// Ultimate Addons for WPBakery Page Builder
define('BSF_PRODUCTS_NOTICES', false);

/*** 1 - Deprecated ***/
vc_remove_element("vc_button");
vc_remove_element("vc_cta_button");
vc_remove_element("vc_cta_button2");
vc_remove_element('vc_button2');
vc_remove_element("vc_tour");
vc_remove_element("vc_accordion");
vc_remove_element("vc_tabs");
/*** 2 - WP ***/ 
vc_remove_element("vc_wp_search");
vc_remove_element("vc_wp_meta");
vc_remove_element("vc_wp_recentcomments");
vc_remove_element("vc_wp_calendar");
vc_remove_element("vc_wp_pages");
vc_remove_element("vc_wp_tagcloud");
vc_remove_element("vc_wp_custommenu");
vc_remove_element("vc_wp_text");
vc_remove_element("vc_wp_posts");
vc_remove_element("vc_wp_categories");
vc_remove_element("vc_wp_archives");
vc_remove_element("vc_wp_rss");


/*************************************
***    ADD VC SC 1 :: COUNTER     ***
**************************************/
vc_map( array(
"name"             => esc_html__("Counter", "manual"),
"base"              => "manual_theme_counter",
"category"          => esc_html__('Manual', "manual"),
"icon" => trailingslashit(get_template_directory_uri()) . "/img/vc_manual_counter.png",
"description" => esc_html__("Counter", 'manual'),
"allowed_container_element" => 'vc_row',
"params" => array(
	
	array(
		"type" => "dropdown",
		"admin_label" => true,
		"heading" => "Position",
		"param_name" => "position",
		"value" => array(
			"Left" => "left",
			"Right" => "right",	
			"Center" => "center"	
		),
		'save_always' => true,
		"description" => ""
	),
	
	array(
		"type" => "textfield",
		"admin_label" => true,
		"heading" => "Digit",
		"param_name" => "digit",
		"description" => ""
	),
	
	array(
		"type" => "dropdown",
		"admin_label" => true,
		"heading" => "Digit Font Weight",
		"param_name" => "font_weight",
		"value" => array(
			"Default" 			=> "",
			"Thin 100"			=> "100",
			"Extra-Light 200" 	=> "200",
			"Light 300"			=> "300",
			"Regular 400"		=> "400",
			"Medium 500"		=> "500",
			"Semi-Bold 600"		=> "600",
			"Bold 700"			=> "700",
			"Extra-Bold 800"	=> "800",
			"Ultra-Bold 900"	=> "900"
		),
		"description" => ""
	),
	
	array(
		"type" => "colorpicker",
		"admin_label" => true,
		"heading" => "Font Color",
		"param_name" => "font_color",
		"description" => ""
	),
	
	array(
		"type" => "textfield",
		"admin_label" => true,
		"heading" => "Text",
		"param_name" => "text",
		"description" => ""
	),
	
	array(
		"type" => "dropdown",
		"admin_label" => true,
		"heading" => "Text Font Weight",
		"param_name" => "text_font_weight",
		"value" => array(
			"Default" => "",
			"Thin 100" => "100",
			"Extra-Light 200" => "200",
			"Light 300" => "300",
			"Regular 400" => "400",
			"Medium 500" => "500",
			"Semi-Bold 600" => "600",
			"Bold 700" => "700",
			"Extra-Bold 800" => "800",
			"Ultra-Bold 900" => "900"
		)
	),
	
	array(
		"type" => "dropdown",
		"admin_label" => true,
		"heading" => "Text Transform",
		"param_name" => "text_transform",
		"value" => array(
			"Default" 			=> "uppercase",
			"None"				=> "none",
			"Capitalize" 		=> "capitalize",
			"Uppercase"			=> "uppercase",
			"Lowercase"			=> "lowercase"
		),
		"description" => ""
	),
	
	array(
		"type" => "colorpicker",
		"admin_label" => true,
		"heading" => "Text Color",
		"param_name" => "text_color",
		"description" => ""
	),
	
	array(
		"type" => "dropdown",
		"admin_label" => true,
		"heading" => "Separator",
		"param_name" => "separator",
		"value" => array(
			"Yes" => "yes",
			"No" => "no"
		),
		'save_always' => true,
		"description" => ""
	),
	
	array(
		"type" => "colorpicker",
		"admin_label" => true,
		"heading" => "Separator Color",
		"param_name" => "separator_color",
		"description" => "",
		"dependency" => array('element' => "separator", 'value' => array('yes'))
	),
)
) );
	
   
/*************************************
***    ADD VC SC 2 :: TEAM       ***
**************************************/
vc_map( array(
	"name" => esc_html__("Team", "manual"), 
	"base" => "manual_our_team",
	"category"  => esc_html__('Manual', "manual"),
	"icon" => "icon-wpb-q_team",
	"allowed_container_element" => 'vc_row',
	"icon" => trailingslashit(get_template_directory_uri()) . "/img/vc_manual_team.png",
	"description" => esc_html__("Team", 'manual'), 
	"params" => array(
					  
		array(
			"type" => "attach_image",
			"admin_label" => true,
			"heading" => esc_html__("Image", "manual"), 
			"param_name" => "team_image"
		),
		
		array(
			"type" => "textfield",
			"admin_label" => true,
			"heading" => esc_html__("Name", "manual"), 
			"param_name" => "team_name"
		),
		
		array(
			"type" => "dropdown",
			"admin_label" => true,
			"heading" => esc_html__("Name Title Tag", "manual"), 
			"param_name" => "name_title_tag",
			"value" => array(
				"h2" => "h2",
				"h3" => "h3",
				"h4" => "h4",
				"h5" => "h5",
				"h6" => "h6",
			),
			"description" => "",
			'std'         => 'h4',
		),
		
		array(
			"type" => "colorpicker",
			"admin_label" => true,
			"heading" => esc_html__("Name Color", "manual"), 
			"param_name" => "name_color",
			"description" => ""
		),
		
		array(
			"type" => "textfield",
			"admin_label" => true,
			"heading" => esc_html__("Position", "manual"),
			"param_name" => "team_position"
		),
		
		array(
			"type" => "colorpicker",
			"admin_label" => true,
			"heading" => esc_html__("Position Color", "manual"), 
			"param_name" => "position_color",
			"description" => ""
		),
		
		array(
			"type" => "dropdown",
			"admin_label" => true,
			"heading" => esc_html__("Show Separator", "manual"), 
			"param_name" => "show_separator",
			"value" => array(
				"Default" => "",
				"Yes" => "yes",
				"No" => "no"
			),
			"description" => ""
		),
		
		array(
			"type" => "colorpicker",
			"admin_label" => true,
			"heading" => esc_html__("Separator Color", "manual"), 
			"param_name" => "separator_color",
			"value" => "#1abc9c",
			"dependency" => array('element' => "show_separator", 'value' => array('yes','')),
			"description" => ""
		),
		
		array(
			"type" => "colorpicker",
			"admin_label" => true,
			"heading" => esc_html__("Social Icons Color", "manual"),
			"param_name" => "icons_color",
			"value" => "",
			"description" => ""
		),
		
		// social icons - 1
		array(
			"type" => "textfield",
			"admin_label" => true,
			"heading" => esc_html__("Social Icon 1", "manual"), 
			"param_name" => "team_social_icon_1",
			"description" => "Enter <a href=\"http://fortawesome.github.io/Font-Awesome/icons/\" target=\"_blank\">fontawesome</a> name (eg: fa fa-file-o) -OR- <br>Enter <a href=\"https://www.elegantthemes.com/blog/resources/elegant-icon-font\" target=\"_blank\">elegant icon font</a> name -OR- <br>Enter <a href=\"http://demo.wpsmartapps.com/themes/manual/et-line-font/\" target=\"_blank\">et line font</a> name",
		),
		
		array(
			"type" => "textfield",
			"admin_label" => true,
			"heading" => esc_html__("Social Icon 1 Link", "manual"), 
			"param_name" => "team_social_icon_1_link"
		),
		
		array(
			"type" => "dropdown",
			"admin_label" => true,
			"heading" => "Social Icon 1 Target",
			"param_name" => "team_social_icon_1_target",
			"value" => array(
				"" => "",
				"Self" => "_self",
				"Blank" => "_blank",
				"Parent" => "_parent"
			),
			"description" => ""
		),
		
		// social icons - 2
		array(
			"type" => "textfield",
			"admin_label" => true,
			"heading" => esc_html__("Social Icon 2", "manual"), 
			"param_name" => "team_social_icon_2",
			"description" => "Enter <a href=\"http://fortawesome.github.io/Font-Awesome/icons/\" target=\"_blank\">fontawesome</a> name (eg: fa fa-file-o) -OR- <br>Enter <a href=\"https://www.elegantthemes.com/blog/resources/elegant-icon-font\" target=\"_blank\">elegant icon font</a> name -OR- <br>Enter <a href=\"http://demo.wpsmartapps.com/themes/manual/et-line-font/\" target=\"_blank\">et line font</a> name",
		),
		
		array(
			"type" => "textfield",
			"admin_label" => true,
			"heading" => esc_html__("Social Icon 2 Link", "manual"), 
			"param_name" => "team_social_icon_2_link"
		),
		
		array(
			"type" => "dropdown",
			"admin_label" => true,
			"heading" => "Social Icon 2 Target",
			"param_name" => "team_social_icon_2_target",
			"value" => array(
				"" => "",
				"Self" => "_self",
				"Blank" => "_blank",
				"Parent" => "_parent"
			),
			"description" => ""
		),
		
		// social icons - 3
		array(
			"type" => "textfield",
			"admin_label" => true,
			"heading" => esc_html__("Social Icon 3", "manual"), 
			"param_name" => "team_social_icon_3",
			"description" => "Enter <a href=\"http://fortawesome.github.io/Font-Awesome/icons/\" target=\"_blank\">fontawesome</a> name (eg: fa fa-file-o) -OR- <br>Enter <a href=\"https://www.elegantthemes.com/blog/resources/elegant-icon-font\" target=\"_blank\">elegant icon font</a> name -OR- <br>Enter <a href=\"http://demo.wpsmartapps.com/themes/manual/et-line-font/\" target=\"_blank\">et line font</a> name",
		),
		
		array(
			"type" => "textfield",
			"admin_label" => true,
			"heading" => esc_html__("Social Icon 3 Link", "manual"), 
			"param_name" => "team_social_icon_3_link"
		),
		
		array(
			"type" => "dropdown",
			"admin_label" => true,
			"heading" => "Social Icon 3 Target",
			"param_name" => "team_social_icon_3_target",
			"value" => array(
				"" => "",
				"Self" => "_self",
				"Blank" => "_blank",
				"Parent" => "_parent"
			),
			"description" => ""
		),
		
		// social icons - 4
		array(
			"type" => "textfield",
			"admin_label" => true,
			"heading" => esc_html__("Social Icon 4", "manual"), 
			"param_name" => "team_social_icon_4",
			"description" => "Enter <a href=\"http://fortawesome.github.io/Font-Awesome/icons/\" target=\"_blank\">fontawesome</a> name (eg: fa fa-file-o) -OR- <br>Enter <a href=\"https://www.elegantthemes.com/blog/resources/elegant-icon-font\" target=\"_blank\">elegant icon font</a> name -OR- <br>Enter <a href=\"http://demo.wpsmartapps.com/themes/manual/et-line-font/\" target=\"_blank\">et line font</a> name",
		),
		
		array(
			"type" => "textfield",
			"admin_label" => true,
			"heading" => esc_html__("Social Icon 4 Link", "manual"), 
			"param_name" => "team_social_icon_4_link"
		),
		
		array(
			"type" => "dropdown",
			"admin_label" => true,
			"heading" => "Social Icon 4 Target",
			"param_name" => "team_social_icon_4_target",
			"value" => array(
				"" => "",
				"Self" => "_self",
				"Blank" => "_blank",
				"Parent" => "_parent"
			),
			"description" => ""
		),
		
		// Eof social
		
	)
) );   
	
	
/*************************************
***  ADD VC SC 3 :: TESTIMONIALS   ***
**************************************/
vc_map( array(
		"name" => esc_html__("Testimonials", "manual"), 
		"base" => "manual_theme_testimonials",
		"category" => esc_html__('Manual', "manual"),
		"allowed_container_element" => 'vc_row',
		"icon" => trailingslashit(get_template_directory_uri()) . "/img/vc_manual_testimonial.png",
		"description" => esc_html__("User testimonial", 'manual'), 
		"params" => array(
						  
			array(
				"type" => "textfield",
				"admin_label" => true,
				"heading" => esc_html__('Number', "manual"),
				"param_name" => "number",
				"value" => "",
				"description" =>  esc_html__('Number of Testimonials, if place -1 it will display all', "manual"), 
			),
			
			array(
				"type" => "dropdown",
				"admin_label" => true,
				"heading" => esc_html__('Order By', "manual"),
				"param_name" => "order_by",
				"value" => array(
					"" => "",
					"Title" => "title",
					"Date" => "date",
					"Random" => "rand"
				),
				"description" => ""
			),
			
			array(
				"type" => "dropdown",
				"admin_label" => true,
				"heading" => esc_html__('Order Type', "manual"),
				"param_name" => "order",
				"value" => array(
					"" => "",
					"Ascending" => "ASC",
					"Descending" => "DESC",
				),
				"description" => "",
				"dependency" => array("element" => "order_by", "value" => array("title", "date"))
			),
			
            array(
                "type" => "colorpicker",
                "admin_label" => true,
                "heading" => esc_html__('Text Color', "manual"), 
                "param_name" => "text_color",
                "description" => ""
            ),
			
			array(
				"type" => "textfield",
				"admin_label" => true,
				"heading" => esc_html__('Custom Text Font', "manual"),
				"param_name" => "custom_font_size",
				"value" => "22px",
				"description" =>  esc_html__('Enter as: 12px, 34px as per your need', "manual"), 
			),
			
			array(
				"type" => "dropdown",
				"admin_label" => true,
				"heading" =>  esc_html__('Author Text Font Weight', "manual"),
				"param_name" => "author_text_font_weight",
				"value" => array(
					"Default" 			=> "",
					"Thin 100"			=> "100",
					"Extra-Light 200" 	=> "200",
					"Light 300"			=> "300",
					"Regular 400"		=> "400",
					"Medium 500"		=> "500",
					"Semi-Bold 600"		=> "600",
					"Bold 700"			=> "700",
					"Extra-Bold 800"	=> "800",
					"Ultra-Bold 900"	=> "900"
				),
				"description" => ""
			),
			
            array(
                "type" => "colorpicker",
                "admin_label" => true,
                "heading" => esc_html__('Author Text Color', "manual"),
                "param_name" => "author_text_color",
                "description" => ""
            ),
			
		)
) );	



/***************************************
***    ADD VC SC 4 :: ICON WITH TEXT ***
****************************************/
vc_map( array(
		"name" => esc_html__("Icon with Text", "manual"), 
		"base" => "manual_theme_icon_text",
		"category" => esc_html__('Manual', "manual"),
		"allowed_container_element" => 'vc_row',
		"icon" => trailingslashit(get_template_directory_uri()) . "/img/vc_manual_iconwithtext.png",
		"description" => esc_html__("Icon with text custom box", 'manual'),
		"params" => array_merge(
			array(
				
				// DESIGN
				array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => esc_html__('Custom Box', "manual"), 
					"param_name" => "use_custom_icon_box_design",
					"value" => array(
						"No" => "no",
						"Yes" => "yes"
					),
					'save_always' => true,
					"description" => esc_html__("Select Yes if you want to custom design your icon box", "manual"),
					"group" => 'Design',
				),
				array(
					"type" => "colorpicker",
					"admin_label" => true,
					"heading" => esc_html__('Box Color', "manual"),
					"param_name" => "icon_box_color",
					"description" => "",
					"dependency" => array('element' => "use_custom_icon_box_design", 'value' => array('yes')),
					"group" => 'Design',
				),
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => esc_html__('Border radius', "manual"), 
					"param_name" => "box_border_radius",
					"value" => "",
					"dependency" => array('element' => "use_custom_icon_box_design", 'value' => array('yes')),
					"group" => 'Design',
					"description" => "Example: 4px",
				),
				array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => esc_html__('Box Shadow', "manual"), 
					"param_name" => "box_shadow",
					"value" => array(
						"No" => "no",
						"Yes" => "yes"
					),
					'save_always' => true,
					"group" => 'Design',
				),
			    array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => esc_html__('Box Padding', "manual"), 
					"param_name" => "icon_box_padding",
					"value" => "",
					"description" => "Default: 0px 0px 30px 0px (top, right, buttom, left)",
					"dependency" => array('element' => "use_custom_icon_box_design", 'value' => array('yes')),
					"group" => 'Design',
				),
			    array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => esc_html__('Box Margin', "manual"), 
					"param_name" => "icon_box_margin",
					"value" => "",
					"description" => "Default: 0px 0px 0px 0px (top, right, buttom, left)",
					"dependency" => array('element' => "use_custom_icon_box_design", 'value' => array('yes')),
					"group" => 'Design',
				),
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__('Box CSS Animation', "manual"), 
					"param_name" => "box_css_animation",
					"value" => array(
						"Default"    => "",
						"Grow"	     => "hvr-grow",
						"Shrink" 	 => "hvr-shrink",
						"Pulse" 	 => "hvr-pulse",
						"Pulse Grow" 	=> "hvr-pulse-grow",
						"Pulse Shrink" 	=> "hvr-pulse-shrink",
						"Push" 	  => "hvr-push",
						"Pop" 	  => "hvr-pop",
						"Bounce In"  => "hvr-bounce-in",
						"Bounce Out" => "hvr-bounce-out",
						"Float" 	 => "hvr-float",
						"Wobble Horizontal" => "hvr-wobble-horizontal",
						"Wobble Vertical" 	=> "hvr-wobble-vertical",
						),
					"description" => "",
					"dependency" => array('element' => "use_custom_icon_box_design", 'value' => array('yes')),
					"group" => 'Design',
				),
				
				// GROUP - ICON
				array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => esc_html__('Icon Position', "manual"),
					"param_name" => "display_icon_position",
					"value" => array(
						"Left" => "left",
						"Top" => "top",
						"Left From Title" => "left_from_title",
					),
					'save_always' => true,
					"description" => "",
					"group" => 'Icon',
				),
				array(
					"type" => "attach_image",
					"admin_label" => true,
					"heading" => esc_html__("Image", "manual"), 
					"param_name" => "image_top",
					"group" => 'Icon',
					"description" =>  esc_html__("If upload image, icon will be replaced", "manual"),
					"dependency" => array('element' => "display_icon_position", 'value' => array('top')),
				),
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => esc_html__('Image Width', "manual"),
					"param_name" => "image_top_width",
					"value" => "",
					"description" =>  esc_html__("Example: 90px", "manual"),
					"dependency" => array('element' => "display_icon_position", 'value' => array('top')),
					"group" => 'Icon',
				),
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => esc_html__("Icon Name", "manual"),
					"param_name" => "icon_name",
					"value" => "",
					"description" => "Enter <a href=\"http://fortawesome.github.io/Font-Awesome/icons/\" target=\"_blank\">fontawesome</a> name (eg: fa fa-file-o) -OR- <br>Enter <a href=\"https://www.elegantthemes.com/blog/resources/elegant-icon-font\" target=\"_blank\">elegant icon font</a> name -OR- <br>Enter <a href=\"http://demo.wpsmartapps.com/themes/manual/et-line-font/\" target=\"_blank\">et line font</a> name",
					"group" => 'Icon',
				),
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => esc_html__('Icon Margin (px)', "manual"),
					"param_name" => "display_icon_top_margin",
					"value" => "",
					"description" => "Margin should be set in a top right bottom left format",
					"dependency" => array('element' => "display_icon_position", 'value' => array('top')),
					"group" => 'Icon',
				),
				array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => esc_html__('Use Custom Icon Size', "manual"), 
					"param_name" => "use_custom_icon_size",
					"value" => array(
						"No" => "no",
						"Yes" => "yes"
					),
					'save_always' => true,
					"description" => esc_html__("Select Yes if you want to use custom icon size and margin", "manual"),
					"group" => 'Icon',
				),
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => esc_html__('Custom Icon Size (px)', "manual"), 
					"param_name" => "custom_icon_size",
					"value" => "",
					"description" => esc_html__("Enter just number, omit px", "manual"),
					"dependency" => array('element' => "use_custom_icon_size", 'value' => array('yes')),
					"group" => 'Icon',
				),
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => esc_html__('Custom Icon Margin (px)', "manual"),
					"param_name" => "custom_icon_margin",
					"value" => "",
					"description" => esc_html__("Spacing between icon and text (for left icon/margin position). Enter just number, omit px", "manual"),
					"dependency" => array('element' => "use_custom_icon_size", 'value' => array('yes')),
					"group" => 'Icon',
				),
				array(
					"type" => "colorpicker",
					"admin_label" => true,
					"heading" => esc_html__('Icon Color', "manual"),
					"param_name" => "icon_color",
					"description" => "",
					"group" => 'Icon',
				),
				
				// GROUP - TITLE
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => esc_html__('Title', "manual"), 
					"param_name" => "title",
					"value" => "",
					"group" => 'Title',
				),
				array(
					"type" => "dropdown",
					"heading" => "Title Tag",
					"param_name" => "title_tag",
					'admin_label' => true,
					"value" => array(
						""   => "",
						"h3" => "h3",
						"h4" => "h4",	
						"h5" => "h5",	
						"h6" => "h6",	
					),
					"description" => "",
					"group" => "Title",
					"std" => "h5",
				),
				array(
					"type" => "colorpicker",
					"admin_label" => true,
					"heading" => esc_html__('Title Color', "manual"), 
					"param_name" => "title_color",
					"description" => "",
					"group" => 'Title',
				),
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => esc_html__('Font Size (px)', "manual"), 
					"param_name" => "title_font_size",
					"value" => "",
					"description" => "Omit px",
					"group" => 'Title',
				),
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__('Text Transform', "manual"), 
					"param_name" => "title_font_transform",
					"value" => array(
						"Default" 		=> "",
						"capitalize"	=> "capitalize",
						"lowercase" 	=> "lowercase",
						),
					"description" => "",
					"group" => 'Title',
				),
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__('Font Weight', "manual"), 
					"param_name" => "title_font_weight",
					"value" => array(
						"Default" 			=> "",
						"Thin 100"			=> "100",
						"Extra-Light 200" 	=> "200",
						"Light 300"			=> "300",
						"Regular 400"		=> "400",
						"Medium 500"		=> "500",
						"Semi-Bold 600"		=> "600",
						"Bold 700"			=> "700",
						"Extra-Bold 800"	=> "800",
						"Ultra-Bold 900"	=> "900"
						),
					"description" => "",
					"group" => 'Title',
				),
				
				// GROUP - DESC
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => esc_html__('Text', "manual"), 
					"param_name" => "text",
					"value" => "",
					"group" => 'Description',
				),
				array(
					"type" => "colorpicker",
					"admin_label" => true,
					"heading" => esc_html__('Text Color', "manual"),  
					"param_name" => "text_color",
					"description" => "",
					"group" => 'Description',
				),
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => esc_html__('Custom Top Margin (px)', "manual"), 
					"param_name" => "custom_top_margin_maintext_and_text",
					"value" => "",
					"description" => __("Spacing between title text and text. Enter just number, omit px", "manual"),
					"group" => 'Description',
				),
				array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => esc_html__('Activate Link', "manual"), 
					"param_name" => "activate_link",
					"value" => array(
						'' => '',
						'Yes' => 'yes',
						'No' => 'no'
					),
					"group" => 'Link',
				),
				array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => esc_html__('Link URL Type', "manual"), 
					"param_name" => "link_icon",
					"value" => array(
						'' => '',
						'Link only icon' => 'yes',
						'Link only text' => 'no',
						'Link both icon & text' => 'both',
						'Link box' => 'box'
					),
					"dependency" => Array('element' => "activate_link", 'value' => array('yes')),
					"group" => 'Link',
				),
				array(
					"type"        => "vc_link",
					"class"       => "",
					"heading"     => esc_html__("Link", "manual"),
					"param_name"  => "link",
					"value"       => "",
					"description" => esc_html__("Link URL", "manual"),
					"dependency" => Array('element' => "activate_link", 'value' => array('yes')),
					"group" => 'Link',
				 ),
				 array(
					"type" => "colorpicker",
					"admin_label" => true,
					"heading" => esc_html__("Link Text Color", "manual"),
					"param_name" => "link_color",
					"description" => "",
					"dependency" => Array('element' => "link_icon", 'value' => array('no','both')),
					"group" => 'Link',
				),
				 
			)
		)
) );


/*************************************
***  ADD VC SC 5 :: KNOWLEDGEBASE  ***
**************************************/
add_action( 'vc_before_init', 'manualtheme_standardknowledgebase_vcsc' );
function manualtheme_standardknowledgebase_vcsc() {
    $kbcategories_array = array();
	$kbcategories_array[] = '';
    $categories = get_categories(array('taxonomy' => 'manualknowledgebasecat','parent' => 0,));
    foreach( $categories as $category ) {
        $kbcategories_array[$category->name] = $category->term_id;
    }
	
	vc_map( array(
			"name" => esc_html__("KnowledgeBase", "manual"), 
			"base" => "manual_theme_all_knowledgebase",
			"icon" => trailingslashit(get_template_directory_uri()) . "/img/vc_manual_knowledgebase.png",
			"category" => esc_html__('Manual', "manual"),
			"allowed_container_element" => 'vc_row',
			"params" => array_merge(
				array(
				
					array(
						"type" => "dropdown",
						"heading" =>  esc_html__("Knowledgebase Type", 'manual'), 
						"param_name" => "knowledgebase_style_type",
						'admin_label' => true,
						"value" => array(
							"Masonry" => "1",
							"FitRows" => "2",
							)
					),
					
					array(
						"type" => "dropdown",
						"heading" =>  esc_html__("Knowledgebase Columns", "manual"), 
						'admin_label' => true,
						"param_name" => "knowledgebase_column",
						"value" => array(
							"Default" => "",
							"3 Columns (Full Width)" => "4",
							"2 Columns (Best Fit Sidebar)" => "6",
							"1 Columns" => "12",
							)
					),
					
					array(
						"type" => "textfield",
						"heading" => esc_html__("Number Of Category Records", 'manual'),
						'admin_label' => true,
						"param_name" => "kb_no_of_category_records",
						"value" => "0",
						"description" => "0 == all category records",
					),
					
					array(
						"type" => "textfield",
						"heading" => "Number Of Articles Under Category",
						"param_name" => "knowledgebase_no_of_articles",
						'admin_label' => true,
						"description" => 'No of articles under category (Default:5)',  
						"value"       => "5",
					),
					
					// GROUP 1 - ORDER CATEGORY RECORD
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Category Order", 'manual'),
						'admin_label' => true,
						"param_name" => "knowledgebase_category_display_order",
						"value" => array(
							"Ascending Order" => "ASC",
							"Descending Order" => "DESC",
							),
						"group" => "Order",
					),
					
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Category Order By", 'manual'),
						'admin_label' => true,
						"param_name" => "knowledgebase_category_display_orderby",
						"value" => array(
								"None" => "none",
								"Order By Description" => "description",
								"Number Of Records Count"  => "count",
								"Slug Name"  => "slug",
								"Name"  => "name",
							),
						"group" => "Order",
					),
					
					array(
					"type" => "dropdown",
					"heading" => esc_html__("Category - Records Order", 'manual'),
					"param_name" => "knowledgebase_page_article_display_order",
					'admin_label' => true,
					"description" => 'Order pages that\'s under category',
					"value" => array(
						"Ascending Order" => "ASC",
						"Descending Order" => "DESC",
						),
					"group" => "Order",
					),
					
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Category - Records Order By", 'manual'),
						'admin_label' => true,
						"param_name" => "knowledgebase_page_article_display_orderby",
						"value" => array(
								"None" => "none",
								"Order By Date" => "date",
								"Order By Last Modified Date"  => "modified",
								"Order By Title"  => "title",
								"Order By Random"  => "rand",
								"Order By Page Order"  => "menu_order",
								"Order By Number of Comments"  => "comment_count",
							),
						"group" => "Order",
					),
					
					// GROUP 2 - TITLE TAG
					array(
						"type" => "dropdown",
						"heading" => "Category Title Tag",
						"param_name" => "category_title_tag",
						'admin_label' => true,
						"value" => array(
							""   => "",
							"h3" => "h3",
							"h4" => "h4",	
							"h5" => "h5",	
							"h6" => "h6",	
						),
						"description" => "",
						"group" => "Title Tag",
					),
					
					// GROUP 3 - SHOW HIDE
					array(
						"type" => "dropdown",
						"heading" =>  esc_html__("Show Sub Category", 'manual'), 
						'admin_label' => true,
						"param_name" => "display_kb_cat_subcategory",
						"value" => array(
							"No" => "no",
							"Yes" => "yes",
							),
						"group" => "Show/Hide",
						"description" =>  esc_html__("All the sub-category will display under the main category", 'manual'),
					),
					
					array(
						"type" => "dropdown",
						"heading" =>  esc_html__("Hide Private Category", 'manual'), 
						"description" =>  esc_html__("Visible to only respective users", 'manual'), 
						'admin_label' => true,
						"param_name" => "completely_hide_private_category",
						"value" => array(
							"No" => "no",			 
							"Yes" => "yes",
							),
						"group" => "Show/Hide",
					),
					
					array(
						"type" => "dropdown",
						"heading" =>  esc_html__("Hide Private Articles", 'manual'), 
						"description" =>  esc_html__("Visible to only respective users", 'manual'), 
						'admin_label' => true,
						"param_name" => "completely_hide_private_articles",
						"value" => array(
							"No" => "no",			 
							"Yes" => "yes",
							),
						"group" => "Show/Hide",
					),
					
					array(
						"type" => "dropdown",
						"heading" =>  esc_html__("Hide Category Articles", 'manual'),
						'admin_label' => true,
						"param_name" => "hide_kb_category_articles",
						"value" => array(
							"No" => "no",
							"Yes" => "yes",
							),
						"group" => "Show/Hide",
						"description" =>  esc_html__("All the articles that are under the category will be hidden", 'manual'), 
					),
					
					array(
						"type" => "dropdown",
						"heading" =>  esc_html__("Show Category Icon", 'manual'), 
						"param_name" => "display_kb_cat_title_icon",
						'admin_label' => true,
						"value" => array(
							"Yes" => "yes",
							"No" => "no",
							),
						"group" => "Show/Hide",
						"description" =>  esc_html__("Show/hide icons that are visible before the category title", 'manual'),
					),
					
					array(
						"type" => "dropdown",
						"heading" =>  esc_html__("Show Article Icon", 'manual'), 
						"param_name" => "display_kb_article_title_icon",
						'admin_label' => true,
						"value" => array(
							"Yes" => "yes",
							"No" => "no",
							),
						"group" => "Show/Hide",
						"description" =>  esc_html__("Show/hide icons that are visible before the article title", 'manual'),
					),
					
					array(
						"type" => "dropdown",
						"heading" =>  esc_html__("Show Category \"Description\"", 'manual'), 
						'admin_label' => true,
						"param_name" => "display_kb_cat_desc",
						"value" => array(
							"Yes" => "yes",
							"No" => "no",
							),
						"group" => "Show/Hide",
						"description" =>  esc_html__("Show/hide category description text", 'manual'),
					),
					
					array(
						"type" => "dropdown",
						"heading" =>  esc_html__("Show \"View All\" Text", 'manual'), 
						"param_name" => "read_more_text_display",
						'admin_label' => true,
						"value" => array(
							"Yes" => "yes",
							"No" => "no",
							),
						"group" => "Show/Hide",
						"description" =>  esc_html__("Show/hide 'view all' link text", 'manual'),
					),
					
					array(
						"type" => "dropdown",
						"heading" =>  esc_html__("Hide - \"View All\" Text Arrow", 'manual'), 
						"param_name" => "read_more_text_arrow",
						'admin_label' => true,
						"value" => array(
							"No" => "no",
							"Yes" => "yes",
							),
						"group" => "Show/Hide",
						"dependency" => Array('element' => "read_more_text_display", 'value' => array('yes')),  
					),
					
					array(
						"type" => "dropdown",
						"heading" =>  esc_html__("Hide \"Post Count\" from \"View All\" Text", 'manual'), 
						"param_name" => "hide_post_count_from_viewall_text",
						'admin_label' => true,
						"value" => array(
							"No" => "no",
							"Yes" => "yes",
							),
						"group" => "Show/Hide",
						"dependency" => Array('element' => "read_more_text_display", 'value' => array('yes')),  
					),
					
					// GROUP 4 - COLOR
					array(
						"type" => "colorpicker",
						"heading" => esc_html__('Icon Color', "manual"), 
						"param_name" => "icon_color",
						"description" => "Icon before category title",
						'admin_label' => true,
						"dependency" => Array('element' => "display_kb_cat_title_icon", 'value' => array('yes')),
						"group" => "Color",
					),
					
					array(
						"type" => "colorpicker",
						"heading" => esc_html__('Category Description Text Color', "manual"), 
						"param_name" => "cat_desc_color",
						'admin_label' => true,
						"description" => "",
						"dependency" => Array('element' => "display_kb_cat_desc", 'value' => array('yes')),
						"group" => "Color",
					),
					
					array(
						"type" => "colorpicker",
						"heading" => esc_html__('Sub-Category Total Article Count Color', "manual"), 
						'admin_label' => true,
						"param_name" => "kbsubcat_total_article_count_color",
						"dependency" => Array('element' => "display_kb_cat_subcategory", 'value' => array('yes')),
						"group" => "Color",
					),
					
					// GROUP 5 - DESIGN STYLE
					array(
						"type" => "dropdown",
						"heading" =>  esc_html__("Knowledgebase Design Style", 'manual'), 
						'admin_label' => true,
						"param_name" => "knowledgebase_design_style_type",
						"value" => array(
							"Default" => "1",
							"Style 1" => "2",
							"Style 2" => "3",
							), 
						"group" => "Design",
					),
					
					array(
						"type" => "dropdown",
						"heading" =>  esc_html__("Display Records Under Category in Grid Style", 'manual'), 
						"param_name" => "kb_display_cat_recors_in_grid_layout_col_1",
						'admin_label' => true,
						"value" => array(
							"No" => "no",
							"Yes" => "yes",
							),
						"group" => "Design",
						"dependency" => Array('element' => "knowledgebase_column", 'value' => array('12')), 
						"description" =>  esc_html__("Will only work if selected \"KB column == 1 column\"", 'manual'),
					),
					
					array(
						"type" => "dropdown",
						"heading" =>  esc_html__("Apply Border for each Category Records", 'manual'), 
						"param_name" => "kb_display_cat_recors_apply_li_border_layout_col_1",
						'admin_label' => true,
						"value" => array(
							"No" => "no",
							"Yes" => "yes",
							),
						"group" => "Design",
						"dependency" => Array('element' => "knowledgebase_column", 'value' => array('12')), 
						"description" =>  esc_html__("Will only work if selected \"KB column == 1 column\"", 'manual'),
					),
					
					array(
						"type" => "colorpicker",
						"heading" => esc_html__('Box Border Color', "manual"), 
						'admin_label' => true,
						"param_name" => "knowledgebase_design_style_type1_border_color",
						"description" => "Default: #E1E1E1",
						"dependency" => Array('element' => "knowledgebase_design_style_type", 'value' => array('2','3')), 
						"group" => "Design",
					),
					
					array(
						"type" => "dropdown",
						"heading" => "Box Border Width",
						'admin_label' => true,
						"param_name" => "knowledgebase_design_style_type1_border_width",
						"value" => array(
							"1px" => "1px",
							"2px" => "2px",
							"3px" => "3px",
							"4px" => "4px",
							"5px" => "5px",
							"6px" => "6px",
							"7px" => "7px",
							"8px" => "8px",
							"9px" => "9px",
							"10px" => "10px",
							),
						"description" => "Default: 1px",
						"group" => "Show/Hide",
						"dependency" => Array('element' => "knowledgebase_design_style_type", 'value' => array('2','3')), 
						"group" => "Design",
					),
					
					
					array(
						"type" => "colorpicker",
						"heading" => esc_html__('Box Background Color', "manual"), 
						'admin_label' => true,
						"param_name" => "knowledgebase_design_style_type1_bg_color",
						"dependency" => Array('element' => "knowledgebase_design_style_type", 'value' => array('2','3')), 
						"group" => "Design",
						"description" => "Default: #FFFFFF",
					),
					
					array(
						"type" => "colorpicker",
						"heading" => esc_html__('Box Background Linear gradient Color', "manual"), 
						'admin_label' => true,
						"param_name" => "knowledgebase_design_style_type1_bg_linear_color",
						"dependency" => Array('element' => "knowledgebase_design_style_type", 'value' => array('2','3')), 
						"group" => "Design",
						"description" => "Example: #f5f5f5",
					),
					
					array(
						"type" => "colorpicker",
						"heading" => esc_html__('Title Text Background Color', "manual"), 
						"param_name" => "knowledgebase_design_style_type1_titletxtbg_color",
						'admin_label' => true,
						"dependency" => Array('element' => "knowledgebase_design_style_type", 'value' => array('2')), 
						"group" => "Design",
						"description" => "Default: #F6F6F6",
					),
					
					array(
						"type" => "colorpicker",
						"heading" => esc_html__('Total Article Text Color', "manual"), 
						"param_name" => "knowledgebase_design_style_type3_text_color",
						'admin_label' => true,
						"description" => "Default: #A2A2A2",
						"dependency" => Array('element' => "knowledgebase_design_style_type", 'value' => array('3')), 
						"group" => "Design",
					),
					
					
					array(
						"type" => "dropdown",
						"heading" =>  esc_html__("Category \"Title Icon\" Position", 'manual'), 
						"param_name" => "kb_cat_icon_position",
						'admin_label' => true,
						"value" => array(
							"Icon at left with heading" => "1",
							"Icon at top" => "2",
							),
						"group" => "Design",
						"dependency" => Array('element' => "display_kb_cat_title_icon", 'value' => array('yes')), 
					),
					
					array(
						"type" => "textfield",
						"heading" => "Default Category Icon Name",
						"param_name" => "category_icon_name_default",
						'admin_label' => true,
						"value" => "icon-briefcase",
						"description" => "Default: icon-briefcase <br> Enter <a href=\"http://fortawesome.github.io/Font-Awesome/icons/\" target=\"_blank\">fontawesome</a> Name (eg: fa fa-file-o)",
						"group" => "Show/Hide",
						"dependency" => Array('element' => "display_kb_cat_title_icon", 'value' => array('yes')), 
						"group" => "Design",
					),
					
					array(
						"type" => "textfield",
						"heading" => "Category Icon Font Size",
						"param_name" => "category_icon_font_size",
						'admin_label' => true,
						"value" => "19px",
						"description" => "Default:19px",
						"group" => "Show/Hide",
						"dependency" => Array('element' => "display_kb_cat_title_icon", 'value' => array('yes')), 
						"group" => "Design",
					),
					
					array(
						"type" => "textfield",
						"heading" => "Category Title Text Padding",
						'admin_label' => true,
						"param_name" => "category_title_text_padding",
						"value" => "",
						"description" => "Default: 0px 0px 0px 35px (TOP, RIGHT, BOTTOM, LEFT)",
						"group" => "Show/Hide",
						"dependency" => Array('element' => "kb_cat_icon_position", 'value' => array('1')), 
						"group" => "Design",
					),
					
					
					
					// GROUP 6 - TEXT
					array(
						"type" => "textfield",
						"heading" => "View All Text",
						'admin_label' => true,
						"param_name" => "knowledgebase_view_all",
						"value" => "View All",
						"group" => "Show/Hide",
						"dependency" => Array('element' => "read_more_text_display", 'value' => array('yes')), 
						"group" => "Text",
					),
					
					array(
						"type" => "textfield",
						"heading" => "Article Text",
						'admin_label' => true,
						"param_name" => "knowledgebase_article_txt_design3",
						"value" => "articles",
						"group" => "Show/Hide",
						"dependency" => Array('element' => "knowledgebase_design_style_type", 'value' => array('3')), 
						"group" => "Text",
					),
					// EOF - GROUP 6
					
					array(
						"type" => "dropdown",
						'admin_label' => true,
						"heading" => esc_html__("Display Child Category as Main Category", 'manual'),
						"param_name" => "knowledgebase_child_cat_as_root",
						"value" => array(
								"No" => "no",
								"Yes" => "yes",
							)
					),
					
					array(
						"type" => "manual__dropdown_multi",
						'admin_label' => true,
						"heading" => esc_html__( "Select Knowledge Base Category", "manual" ),
						"param_name" => "kbgroupcatid",
						"value" => $kbcategories_array, 
						"description" => "Select KB Category <span style='color:blue'>(Leave empty to display all category)</span><br><br>",
					),
					
				)
			)
	) );

}



/***************************************************
***     ADD VC :: KNOWLEDGE BASE CAT LANDING  ******
****************************************************/
add_action( 'vc_before_init', 'manualtheme_kbcategorylandingstyle_vcsc' );
function manualtheme_kbcategorylandingstyle_vcsc() {
	// KNOWLEDGEBASE 
	$kbcategories_array = array();
	$kbcategories_array[] = '';
    $categories = get_categories(array('taxonomy' => 'manualknowledgebasecat','parent' => 0,));
    foreach( $categories as $category ) {
        $kbcategories_array[$category->name] = $category->term_id;
    }
	//DOCUMENTATION
	$doccategories_array = array();
	$doccategories_array[] = '';
    $doccategories = get_categories(array('taxonomy' => 'manualdocumentationcategory','parent' => 0,));
    foreach( $doccategories as $category ) {
        $doccategories_array[$category->name] = $category->term_id;
    }
	
	vc_map( array(
			"name" => esc_html__("Post Type - Category Landing Style", 'manual'), 
			"base" => "manual__theme_kb_catlanding_style",
			"icon" => trailingslashit(get_template_directory_uri()) . "/img/vc_manual_cat_landing_style.png",
			"category" => 'Manual',
			"allowed_container_element" => 'vc_row',
			"params" => array_merge(
				array(
					  
					array(
						"type" => "dropdown",
						"admin_label" => true,
						"heading" =>  esc_html__("Post Type ", 'manual'), 
						"param_name" => "manual_theme_post_type",
						"value" => array(
							"KnowledgeBase" => "manual_kb",
							"Documentation" => "manual_documentation",
							)
					),  
				
					array(
						"type" => "dropdown",
						"admin_label" => true,
						"heading" =>  esc_html__("Category - Landing Style", 'manual'), 
						"param_name" => "knowledgebase_style_type",
						"value" => array(
							"Style 1" => "1",
							"Style 2" => "2",
							)
					),
					
					array(
						"type" => "dropdown",
						"admin_label" => true,
						"heading" =>  esc_html__("Columns", 'manual'), 
						"param_name" => "landing_style_type2_column",
						"value" => array(
							"2 Columns" => "6",			 
							"3 Columns" => "4",
							),
						"dependency" => Array('element' => "knowledgebase_style_type", 'value' => array('2'))
					),
					
					array(
						"type" => "textfield",
						"admin_label" => true,
						"heading" => esc_html__("Number Of Category Records", 'manual'),
						"param_name" => "kb_no_ofrecords",
						"value" => "0",
						"description" => "0 == all records",
					),
					
					array(
						"type" => "dropdown",
						"class" => "",
						"heading" => "Total Article Count - Display Style",
						"param_name" => "total_article_count_style",
						"value" => array(
							"Style 1"   => "1",
							"Style 2" => "2",	
						),
						"dependency" => Array('element' => "total_article_count", 'value' => array('no'))
					),
					
					array(
						"type" => "textfield",
						"admin_label" => true,
						"heading" => "Limit Description to Define Character Length",
						"param_name" => "limit_description_char",
						"value" => "",
						"description" => esc_html__("Limit your description characters", 'manual'),
						"dependency" => Array('element' => "disable_description", 'value' => array('no'))
					),
					
					array(
						"type" => "manual__dropdown_multi",
						"admin_label" => true,
						"heading" => esc_html__( "Exclude Knowledge Base Category", "manual" ),
						"param_name" => "exclude_kb_category",
						"value" => $kbcategories_array, 
						"description" => esc_html__( "Select category", "manual" ),
						"dependency" => Array('element' => "manual_theme_post_type", 'value' => array('manual_kb')),
					),
					
					array(
						"type" => "manual__dropdown_multi",
						"admin_label" => true,
						"heading" => esc_html__( "Exclude Documentation Category", "manual" ),
						"param_name" => "exclude_doc_category",
						"value" => $doccategories_array, 
						"description" => esc_html__( "Select category", "manual" ), 
						"dependency" => Array('element' => "manual_theme_post_type", 'value' => array('manual_documentation')),
					),
					
					// GROUP 1 - ORDER
					array(
						"type" => "dropdown",
						"admin_label" => true,
						"heading" => esc_html__("Records - Display Order", 'manual'),
						"param_name" => "knowledgebase_style_type_display_order",
						"description" => 'Order pages that\'s under category',
						"value" => array(
							"Ascending Order" => "ASC",
							"Descending Order" => "DESC",
							),
						"group" => "Order",
					),
					
					array(
						"type" => "dropdown",
						"admin_label" => true,
						"heading" => esc_html__("Records - Display Order By", 'manual'),
						"param_name" => "knowledgebase_style_type_display_orderby",
						"value" => array(
								"Order By Date" => "date",
								"Order By Last Modified Date"  => "modified",
								"Order By Title"  => "title",
								"Order By Random"  => "rand",
								"Order By Page Order"  => "menu_order",
								"Order By Number of Comments"  => "comment_count",
							),
						"group" => "Order",
					),
					
					// GROUP 2 - TITLE TAG
					array(
						"type" => "dropdown",
						"class" => "",
						"heading" => "Title Tag",
						"param_name" => "title_tag",
						"value" => array(
							""   => "",
							"h3" => "h3",	
							"h4" => "h4",	
							"h5" => "h5",	
							"h6" => "h6",	
						),
						"description" => "",
						"group" => "Title Tag",
					),
					
					// GROUP 3 - SHOW/HIDE
					array(
						"type" => "dropdown",
						"class" => "",
						"heading" => "Disable - Total Article Count Section",
						"param_name" => "total_article_count",
						"value" => array(
							"No"   => "no",
							"Yes" => "yes",	
						),
						"dependency" => Array('element' => "knowledgebase_style_type", 'value' => array('1','2')),
						"group" => "Show/Hide",
					),
					array(
						"type" => "dropdown",
						"class" => "",
						"heading" => "Disable - Category Description",
						"param_name" => "disable_description",
						"value" => array(
							"No"   => "no",
							"Yes" => "yes",	
						),
						"dependency" => Array('element' => "knowledgebase_style_type", 'value' => array('1','2')),
						"group" => "Show/Hide",
					),
					array(
						"type" => "dropdown",
						"class" => "",
						"heading" => "Hide Private Category Alert Message",
						"param_name" => "private_cat_alert_msg",
						"value" => array(
							"No"   => "no",
							"Yes" => "yes",	
						),
						"group" => "Show/Hide",
					),
					
					// GROUP 4 - TEXT
					array(
						"type" => "textfield",
						"admin_label" => true,
						"heading" => esc_html__("Written By - Text", 'manual'),
						"param_name" => "total_article_count_style1_text",
						"value" => "Written by",
						"description" => "",
						"dependency" => Array('element' => "total_article_count_style", 'value' => array('1')),
						"group" => "Text",
					),
					
					array(
						"type" => "textfield",
						"admin_label" => true,
						"heading" => esc_html__("Articles In This Collection - Text", 'manual'),
						"description" => esc_html__("Default text: articles in this collection", 'manual'),
						"param_name" => "article_count_box_title",
						"value" => "articles in this collection",
						"dependency" => Array('element' => "total_article_count", 'value' => array('no')),
						"group" => "Text",
					),
					
					array(
						"type" => "textfield",
						"admin_label" => true,
						"heading" => esc_html__("Private Category - Text", 'manual'),
						"param_name" => "kb_private_categpry",
						"value" => "Private Category",
						"description" => "",
						"group" => "Text",
					),
					
					// GROUP 5 - COLOR
					array(
						"type" => "colorpicker",
						"admin_label" => true,
						"heading" => esc_html__('Background Color', 'manual'), 
						"param_name" => "background_color",
						"description" => "",
						"dependency" => Array('element' => "knowledgebase_style_type", 'value' => array('1','2')),
						"group" => "Color",
					),
					
					array(
						"type" => "colorpicker",
						"admin_label" => true,
						"heading" => esc_html__("Alternate Background Color", 'manual'),
						"param_name" => "alternate_background_color",
						"description" => "Will appear on even blocks",
						"group" => "Color", 
						"dependency" => Array('element' => "knowledgebase_style_type", 'value' => array('2'))
					),
					
					array(
						"type" => "colorpicker",
						"admin_label" => true,
						"heading" => esc_html__('Border Color', 'manual'), 
						"param_name" => "border_color",
						"description" => "",
						"dependency" => Array('element' => "knowledgebase_style_type", 'value' => array('1','2')),
						"group" => "Color",
					),
					
					array(
						"type" => "colorpicker",
						"admin_label" => true,
						"heading" => esc_html__('Icon Color', 'manual'), 
						"param_name" => "icon_color",
						"description" => "",
						"dependency" => Array('element' => "knowledgebase_style_type", 'value' => array('1','2')),
						"group" => "Color",
					),
					
					array(
						"type" => "colorpicker",
						"admin_label" => true,
						"heading" => esc_html__('Private Category Text Color', 'manual'), 
						"param_name" => "kb_private_category_text_color",
						"description" => "",
						"group" => "Color",
					),
					
					array(
						"type" => "colorpicker",
						"admin_label" => true,
						"heading" => esc_html__('Written By Text Color', 'manual'), 
						"param_name" => "kb_writtenby_text_color",
						"description" => "",
						"group" => "Color",
					),
					
					// GROUP 6 - DESIGN
					array(
						"type" => "textfield",
						"admin_label" => true,
						"heading" => esc_html__("Border Radius", 'manual'),
						"param_name" => "border_radius",
						"value" => "4px",
						"description" => "Example: 4px",
						"group" => "Design",
					),
					
					array(
						"type" => "textfield",
						"admin_label" => true,
						"heading" => esc_html__("Box Height", 'manual'),
						"param_name" => "box_height",
						"value" => "auto",
						"description" => "Example: 254px -OR- you can use word: \"auto\" ",
						"group" => "Design", 
						"dependency" => Array('element' => "knowledgebase_style_type", 'value' => array('2'))
					),
					
					array(
						"type" => "textfield",
						"admin_label" => true,
						"heading" => esc_html__("Box Padding", 'manual'),
						"param_name" => "box_padding",
						"value" => "25px 25px 25px 25px",
						"description" => "Default: 25px 25px 25px 25px (TOP, RIGHT, BOTTOM, LEFT)",
						"group" => "Design", 
						"dependency" => Array('element' => "knowledgebase_style_type", 'value' => array('2'))
					),
					
					array(
						"type" => "dropdown",
						"class" => "",
						"heading" => "Text Align",
						"param_name" => "text_box_align",
						"value" => array(
							"Align text next to an icon" => "1",	
							"Left (everything left align)" => "2",	
							"Center" => "3",	
						),
						"description" => "",
						"group" => "Design", 
						"dependency" => Array('element' => "knowledgebase_style_type", 'value' => array('2'))
					),
					
					array(
						"type" => "textfield",
						"admin_label" => true,
						"heading" => esc_html__("Default Icon Code Name", 'manual'),
						"param_name" => "default_icon_code",
						"value" => "",
						"description" => "If found knowledgebase category icon code blank, system will use default icon code <br>Enter <a href=\"http://fortawesome.github.io/Font-Awesome/icons/\" target=\"_blank\">fontawesome</a> name (eg: fa fa-file-o) -OR- <br>Enter <a href=\"https://www.elegantthemes.com/blog/resources/elegant-icon-font\" target=\"_blank\">elegant icon font</a> name -OR- <br>Enter <a href=\"http://demo.wpsmartapps.com/themes/manual/et-line-font/\" target=\"_blank\">et line font</a> name",
						"group" => "Design",
					),
					
					array(
						"type" => "textfield",
						"admin_label" => true,
						"heading" => esc_html__("Icon Size", 'manual'),
						"param_name" => "icon_size",
						"value" => "",
						"description" => "Example:55px",
						"group" => "Design",
					),
					// EOF DESIGN
	
				)
			)
	) );

}



/**************************************
***  ADD VC SC 12 :: KB SINGLE CAT  ***
***************************************/
add_action( 'vc_before_init', 'manualtheme_knowledgebase_singlecatrec_vcsc' );
function manualtheme_knowledgebase_singlecatrec_vcsc() {
    $kbcategories_array = array();
    $categories = get_categories(array('taxonomy' => 'manualknowledgebasecat',));
    foreach( $categories as $category ) {
        $kbcategories_array[$category->name] = $category->term_id;
    }
	vc_map( array(
			"name" => esc_html__("KnowledgeBase - Single Category Records", "manual"), 
			"base" => "manual_theme_single_cat_knowledgebase",
			"icon" => trailingslashit(get_template_directory_uri()) . "/img/vc_manual_faq_cat_record.png",
			"category" => esc_html__('Manual', "manual"),
			"allowed_container_element" => 'vc_row',
			"params" => array_merge(
				array(
					  
					array(
						"type" => "dropdown",
						"admin_label" => true,
						"heading" => esc_html__( "Display KnowledgeBase Category", "manual" ),
						"param_name" => "kbsinglecatid",
						"value" => $kbcategories_array,
						"description" => esc_html__( "Select category", "manual" )
					),  
					  
					array(
						"type" => "textfield",
						"admin_label" => true,
						"heading" => esc_html__("Number Of Post Per Page", "manual"),
						"param_name" => "page_per_post",
						"value" => "-1",
						"description" => "Note: -1 shows all post",
					),
					
					// GROUP 1 - TITLE TAG
					array(
						"type" => "dropdown",
						"class" => "",
						"heading" => "Title Tag",
						"param_name" => "title_tag",
						"value" => array(
							""   => "",
							"h3" => "h3",	
							"h4" => "h4",	
							"h5" => "h5",	
							"h6" => "h6",	
						),
						"description" => "Default:h4",
						"group" => "Title Tag",
					),
					
					// GROUP 2 - ORDER
					array(
						"type" => "dropdown",
						"admin_label" => true,
						"heading" => esc_html__("Post Order", "manual"),
						"param_name" => "post_order",
						"value" => array(
							"None" => "",
							"Ascending"  => "ASC",
							"Descending" => "DESC",
							),
						"group" => "Order",
					),
					
					array(
						"type" => "dropdown",
						"admin_label" => true,
						"heading" => esc_html__("Post Order By", "manual"),
						"param_name" => "post_orderby",
						"value" => array(
								"None" => "none",
								"Title" => "title",
								"Date"  => "date",
								"Last Modified Date"  => "modified",
								"Random"  => "rand",
								"Number of Comments"  => "comment_count",
								"Page Order"  => "menu_order",
							),
						"group" => "Order",
					),
					
					// GROUP 3 - SHOW/HIDE
					array(
						"type" => "dropdown",
						"heading" =>  esc_html__("Hide Private Articles", 'manual'), 
						"description" =>  esc_html__("Visible to only respective users", 'manual'), 
						'admin_label' => true,
						"param_name" => "completely_hide_private_articles",
						"value" => array(
							"No" => "no",			 
							"Yes" => "yes",
							),
						"group" => "Show/Hide",
					),
					
					array(
						"type" => "dropdown",
						"admin_label" => true,
						"heading" => esc_html__("Hide Pagination", "manual"),
						"param_name" => "hide_pagination",
						"value" => array(
							"No"  => "1",
							"Yes" => "2",
							),
						"group" => "Show/Hide",
					),
					
					array(
						"type" => "dropdown",
						"admin_label" => true,
						"heading" => esc_html__("Hide Quick Stats", "manual"),
						"param_name" => "quick_stats",
						"value" => array(
							"No"  => "no",
							"Yes" => "yes",
							),
						"group" => "Show/Hide",
						"dependency" => Array('element' => "kbcatrecords_type", 'value' => array('1')),
					),
					
					// GROUP 4 - STYLE
					array(
						"type" => "dropdown",
						"admin_label" => true,
						"heading" =>  esc_html__("Category Records - Style", 'manual'), 
						"param_name" => "kbcatrecords_type",
						"value" => array(
							"Style 1" => "1",
							"Style 2" => "2",
							),
						"group" => "Style",
					), 
					
					array(
						"type" => "textfield",
						"admin_label" => true,
						"heading" => esc_html__("Limit Description Word", "manual"),
						"param_name" => "style1_view_text",
						"value" => "views",
						"group" => "Text",
						"dependency" => Array('element' => "kbcatrecords_type", 'value' => array('1')),
					),
					
					array(
						"type" => "colorpicker",
						"admin_label" => true,
						"heading" => esc_html__('Border Color', 'manual'), 
						"param_name" => "style2_border_color",
						"description" => "Default: #d4dadf",
						"group" => "Style",
					),
					
					array(
						"type" => "colorpicker",
						"admin_label" => true,
						"heading" => esc_html__('Box Background Color', 'manual'), 
						"param_name" => "style2_boxbg_color",
						"description" => "Default: #ffffff",
						"group" => "Style",
					),
					
					array(
						"type" => "colorpicker",
						"admin_label" => true,
						"heading" => esc_html__('Meta Text Color', 'manual'), 
						"param_name" => "style2_metabox_color",
						"description" => "Default: #727272",
						"group" => "Style",
					),
					
					array(
						"type" => "colorpicker",
						"admin_label" => true,
						"heading" => esc_html__('Main Icon Color', 'manual'), 
						"param_name" => "style_main_icon_color",
						"dependency" => Array('element' => "kbcatrecords_type", 'value' => array('1')),
						"group" => "Style",
					),
					
					array(
						"type" => "colorpicker",
						"admin_label" => true,
						"heading" => esc_html__('Sub Icon Color', 'manual'), 
						"param_name" => "style_icon_color",
						"description" => "Icon that appears below title",
						"dependency" => Array('element' => "kbcatrecords_type", 'value' => array('1')),
						"group" => "Style", 
					),
					
					array(
						"type" => "colorpicker",
						"admin_label" => true,
						"heading" => esc_html__('Text Link Color', 'manual'), 
						"param_name" => "style_textlink_color",
						"group" => "Style", 
					),
					
					array(
						"type" => "colorpicker",
						"admin_label" => true,
						"heading" => esc_html__('Text Link Hover Color', 'manual'), 
						"param_name" => "style_textlink_hover_color",
						"group" => "Style", 
					),
					
					array(
						"type" => "colorpicker",
						"admin_label" => true,
						"heading" => esc_html__('Description Word Text Color', 'manual'), 
						"param_name" => "style2_desc_words_text_color",
						"group" => "Style",
						"description" => "Default:#333333",
						"dependency" => Array('element' => "kbcatrecords_type", 'value' => array('2')),
					),
					
					array(
						"type" => "textfield",
						"admin_label" => true,
						"heading" => esc_html__("Limit Description Word", "manual"),
						"param_name" => "style2_limit_desc_words",
						"value" => "",
						"description" => "Default:35",
						"group" => "Style",
						"dependency" => Array('element' => "kbcatrecords_type", 'value' => array('2')),
					),
	
					//EOF GROUP 4
					
					array(
						"type" => "dropdown",
						"admin_label" => true,
						"heading" => esc_html__("Include Child Category Post Inside ROOT Category", "manual"),
						"param_name" => "include_child_post",
						"value" => array(
								"yes" => "yes",
								"No" => "no",
							),
					),
						
				)
			)
	) );
}


/**************************************************
***  ADD VC SC 21 :: KNOWLEDGE BASE TREE MENU *****
***************************************************/
vc_map( array(
		"name" => esc_html__("KnowledgeBase - Tree View", 'manual'), 
		"base" => "manual__knowledgebase_tree_menu",
		"category" => 'Manual',
		"allowed_container_element" => 'vc_row',
		"icon" => trailingslashit(get_template_directory_uri()) . "/img/vc_manual_tree.png",
		"params" => array_merge(
			array(
			
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => "Title Tag",
					"param_name" => "title_tag",
					"value" => array(
						""   => "",
						"h4" => "h4",	
						"h5" => "h5",	
						"h6" => "h6",	
					),
					"description" => ""
				),
				
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => esc_html__("Number Of Category Records", 'manual'),
					"param_name" => "kb_no_of_category_records",
					"value" => "0",
					"description" => "0 == all category records",
				),
				
				//SHOW/HIDE
				array(
					"type" => "dropdown",
					"heading" =>  esc_html__("Hide Private Articles", 'manual'), 
					"description" =>  esc_html__("Visible to only respective users", 'manual'), 
					'admin_label' => true,
					"param_name" => "completely_hide_private_articles",
					"value" => array(
						"No" => "no",			 
						"Yes" => "yes",
						),
					"group" => "Show/Hide",
				),
				 
				
				// GROUP 1 - ORDER
                array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => esc_html__("Category Display Order", 'manual'),
					"param_name" => "knowledgebase_category_display_order",
					"value" => array(
						"Ascending Order" => "ASC",
						"Descending Order" => "DESC",
						),
					"group" => "Order",
				),
                
                array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => esc_html__("Category Display Order By", 'manual'),
					"param_name" => "knowledgebase_category_display_orderby",
					"value" => array(
							"None" => "none",
							"Order By Description" => "description",
							"Number Of Records Count"  => "count",
							"Slug Name"  => "slug",
							"Name"  => "name",
						),
					"group" => "Order",
				),
				
				array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => esc_html__("Records Under Category Display Order", 'manual'),
					"param_name" => "knowledgebase_records_display_order",
					"description" => 'Order pages that\'s under category',
					"value" => array(
						"Ascending Order" => "ASC",
						"Descending Order" => "DESC",
						),
					"group" => "Order",
				),
                
                array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => esc_html__("Records Under Category Display Order By", 'manual'),
					"param_name" => "knowledgebase_records_display_orderby",
					"value" => array(
							"None" => "none",		 
							"Order By Date" => "date",
							"Order By Last Modified Date"  => "modified",
							"Order By Title"  => "title",
							"Order By Random"  => "rand",
							"Order By Page Order"  => "menu_order",
							"Order By Number of Comments"  => "comment_count",
						),
					"group" => "Order",
				),
				
				// GROUP 2 - TEXT
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => esc_html__("\"Private Category\" - Text", 'manual'),
					"param_name" => "kb_private_category",
					"value" => "",
					"description" => "",
					"group" => "Text",
				),
				
				// GROUP 3 - STYLE
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => esc_html__("Root tag <li> padding", 'manual'),
					"param_name" => "root_tag_li_padding",
					"value" => "",
					"description" => "Default: 3px 10px 3px 10px (top, left, buttom, right)",
					"group" => "Style",
				),
				
				array(
					"type" => "colorpicker",
					"admin_label" => true,
					"heading" => esc_html__('Root tag <li> Background Color', 'manual'), 
					"param_name" => "root_tag_color",
					"description" => "",
					"group" => "Style",
				),
				
				array(
					"type" => "colorpicker",
					"admin_label" => true,
					"heading" => esc_html__('Root tag <li> Border Buttom Color', 'manual'), 
					"param_name" => "root_tag_border_bottom_color",
					"description" => "",
					"group" => "Style",
				),
				
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => esc_html__('Border Radius', 'manual'), 
					"param_name" => "border_radius",
					"value" => "",
					"description" => "Example: 5px",
					"group" => "Style",
				),

			)
		)
) );

/*************************************
***  ADD VC SC 6 :: KB CATEGORY    ***
**************************************/
vc_map( array(
		"name" => esc_html__("Widget - KnowledgeBase Category", "manual"), 
		"base" => "manual_theme_kb_category",
		"category" => esc_html__('Manual', "manual"),
		"allowed_container_element" => 'vc_row',
		"description" => esc_html__("Widget", 'manual'), 
		"icon" => trailingslashit(get_template_directory_uri()) . "/img/vc_manual_widgets.png",
		"params" => array_merge(
			array(
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => esc_html__("Title", "manual"),
					"param_name" => "kb_category_title",
					"value" => "",
					"description" => "",
				),
				array(
					"type" => "checkbox",
					"admin_label" => true,
					"heading" => esc_html__("Show post counts", "manual"),
					"param_name" => "kb_category_show_post_count",
					"value" => "",
					"description" => "",
				),
				array(
					"type" => "colorpicker",
					"admin_label" => true,
					"heading" => esc_html__('Count Text Color', "manual"), 
					"param_name" => "count_text_color",
					"description" => "",
					"dependency" => Array('element' => "kb_category_show_post_count", 'value' => array('true'))
				),
				array(
					"type" => "colorpicker",
					"admin_label" => true,
					"heading" => esc_html__('Count Background Color', "manual"), 
					"param_name" => "count_bg_color",
					"description" => "",
					"dependency" => Array('element' => "kb_category_show_post_count", 'value' => array('true'))
				),
				array(
					"type" => "checkbox",
					"admin_label" => true,
					"heading" => esc_html__("Remove <li> Border", "manual"),
					"param_name" => "kb_category_remove_border",
					"value" => "",
					"description" => "",
				),
				array(
					"type" => "colorpicker",
					"admin_label" => true,
					"heading" => esc_html__('Category Icon Color', "manual"), 
					"param_name" => "cat_fonticon_color",
					"description" => "",
				),
			)
		)
) );



/******************************************
***  ADD VC SC 7 :: KB POPULAR ARTICLE  ***
*******************************************/
vc_map( array(
		"name" => esc_html__("Widget - KnowledgeBase Article", "manual"), 
		"base" => "manual_theme_kb_popular_article",
		"category" => esc_html__('Manual', "manual"),
		"allowed_container_element" => 'vc_row',
		"description" => esc_html__("Widget", 'manual'), 
		"icon" => trailingslashit(get_template_directory_uri()) . "/img/vc_manual_widgets.png",
		"params" => array_merge(
			array(
				  
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => esc_html__("Title", "manual"),
					"param_name" => "title",
					"value" => "",
					"description" => "",
				),
				
				array(
					"type" => "dropdown",
					"heading" =>  esc_html__("Hide Private Articles", 'manual'), 
					"description" =>  esc_html__("Visible to only respective users", 'manual'), 
					'admin_label' => true,
					"param_name" => "completely_hide_private_articles",
					"value" => array(
						"No" => "no",			 
						"Yes" => "yes",
						),
					"group" => "Show/Hide",
				),
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => "Title Tag",
					"param_name" => "title_tag",
					"value" => array(
						""   => "",
						"h3" => "h3",	
						"h4" => "h4",	
						"h5" => "h5",	
						"h6" => "h6",	
					),
					"description" => "Default:h5",
					"group" => "Title Tag",
				),
				
				array(
				"type" => "dropdown",
				"admin_label" => true,
				"heading" => esc_html__("Articles By", "manual"),
				"param_name" => "knowledgebase_article_display_type",
				"value" => array(
					"Select Article Display Type" => "",
					"Latest Articles (using date)" => "1",
					"Popular Article (using number of views)" => "2",
					"Top Rated Article (using like)" => "3",
					"Most Commented Article" => "4",
					"Recently Updated Article" => "5",
					)
				),
				
				array(
				"type" => "dropdown",
				"admin_label" => true,
				"heading" => esc_html__("Number Of Article", "manual"),
				"param_name" => "knowledgebase_article_number",
				"value" => array(
					"Three" => "3",
					"Four" => "4",
					"Five" => "5",
					"Six" => "6",
					"Seven" => "7",
					"Eight" => "8",
					"Nine" => "9",
					"Ten" => "10",
					"Eleven" => "11",
					"Twelve" => "12",
					"Thirteen" => "13",
					"Fourteen" => "14",
					"Fifteen" => "15",
					)
				),
				
				array(
				"type" => "dropdown",
				"admin_label" => true,
				"heading" => esc_html__("Article Order", "manual"),
				"param_name" => "knowledgebase_article_order",
				"value" => array(
					"Ascending Order" => "ASC",
					"Descending Order" => "DESC",
					)
				),
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => "Display in Grid Layout",
					"param_name" => "display_grid",
					"value" => array(
						"No" => "no",	
						"Yes" => "yes",	
					),
					"group" => "Design",
				),
				
			)
		)
) );



/*******************************************
***  ADD VC SC 8 :: AJAX LOAD POST TYPE  ***
********************************************/
add_action( 'vc_before_init', 'manualtheme_doctreeviewajaxload_vcsc' );
function manualtheme_doctreeviewajaxload_vcsc() {
    $doccategories_array = array();
    $categories = get_categories(array('taxonomy' => 'manualdocumentationcategory',));
    foreach( $categories as $category ) {
        $doccategories_array[$category->name] = $category->term_id;
    }

	vc_map( array(
			"name" => esc_html__("Documentation - Tree View Ajax Load Post", 'manual'), 
			"base" => "manual__vc_ajaxloaddocumentation",
			"icon" => "icon-wpb-icon_text",
			"category" => 'Manual',
			"allowed_container_element" => 'vc_row',
			"icon" => trailingslashit(get_template_directory_uri()) . "/img/vc_manual_tree.png",
			"params" => array_merge(
				array(
					
					array(
						"type" => "checkbox",
						"admin_label" => true,
						"heading" => esc_html__("Disable Ajax Load", "manual"),
						"param_name" => "vc_doc_ajaxload_off",
						"value" => "",
						"description" => esc_html__("Apply only if required", "manual"),
					),
					array(
						"type" => "dropdown",
						"admin_label" => true,
						"heading" => esc_html__("Post Type", 'manual'),
						"param_name" => "post_type",
						"value" => array(
								"Documentation" => "manual_documentation",
							)
					),
					array(
						"type" => "dropdown",
						"admin_label" => true,
						"heading" => esc_html__( "Select Documentation Category", "manual" ),
						"param_name" => "cat_id_posttype",
						"value" => $doccategories_array,
						"description" => esc_html__( "Select category", "manual" )
					), 
					array(
						"type" => "dropdown",
						"admin_label" => true,
						"heading" => esc_html__("Tree Menu Display Position", 'manual'),
						"param_name" => "posttype_treemenu_display_position",
						"value" => array(
								'Left' => 'left',		 
								'Right' => 'right',
							)
					),
					
					// GROUP 1 - ORDER
					array(
						"type" => "dropdown",
						"admin_label" => true,
						"heading" => esc_html__("Tree Menu Display Order", 'manual'),
						"param_name" => "posttype_records_display_order",
						"value" => array(
							"Ascending Order" => "ASC",
							"Descending Order" => "DESC",
							),
						"group" => "Order",
					),
					array(
						"type" => "dropdown",
						"admin_label" => true,
						"heading" => esc_html__("Tree Menu Display Order By", 'manual'),
						"param_name" => "posttype_records_display_orderby",
						"value" => array(
								'Page Order' => 'menu_order',		 
								'Order by Title' => 'title',
								'Order by Random' => 'rand',
								'Order By Date' => 'date',
								'Order By Last Modified Date' => 'modified',
								'None' => 'none',
							),
						"group" => "Order",
					),
					
					// GROUP 2 - TEXT
					array(
						"type" => "textfield",
						"admin_label" => true,
						"heading" => esc_html__( "Expand All Text", "manual" ),
						"param_name" => "expandalltext",
						"value" => "Expand All",
						"group" => "Text",
					 ),
					array(
						"type" => "textfield",
						"admin_label" => true,
						"heading" => esc_html__( "Collapse All Text", "manual" ),
						"param_name" => "collapsealltext",
						"value" => "Collapse All",
						"group" => "Text",
					 ),
					
					// GROUP 3
					array(
						"type" => "dropdown",
						"admin_label" => true,
						"heading" => esc_html__("Row Layout", 'manual'),
						"param_name" => "rowlayout",
						"value" => array(
								'col-4 | col-8' => '2',		 
								'col-3 | col-9' => '1',		 
								'col-3 | col-6 | col-3 (with sidebar)' => '3',		 
								'col-2 | col-8 | col-2 (with sidebar)' => '4',		 
							),
						"group" => "Layout",
					),
					
					// STYLE
					array(
						"type" => "dropdown",
						"admin_label" => true,
						"heading" => esc_html__("Style", 'manual'),
						"param_name" => "layout_style",
						"value" => array(
								'Default' => '1',		 
								'Style 1' => '2',		 
							),
						"group" => "Style",
					),
					array(
						"type" => "colorpicker",
						"admin_label" => true,
						"heading" => esc_html__('Content Background Color', "manual"), 
						"param_name" => "content_bg_color",
						"description" => "Default: #ffffff",
						"dependency" => Array('element' => "layout_style", 'value' => array('2')),
						"group" => "Style",
					),
					array(
						"type" => "checkbox",
						"admin_label" => true,
						"heading" => esc_html__("Adjust Tree Menu on The Article Title Level", "manual"),
						"param_name" => "adjust_sidebar_top_padding",
						"value" => "",
						"description" => "",
						"dependency" => Array('element' => "layout_style", 'value' => array('2')),
						"group" => "Style",
					),
					
	
				)
			)
	) );

}



/*********************************************
***  ADD VC SC 8.1 :: INLINE DOCUMENTATION ***
**********************************************/
add_action( 'vc_before_init', 'manualtheme_inlinedoc_vcsc' );
function manualtheme_inlinedoc_vcsc() {
    $doccategories_array = array();
    $categories = get_categories(array('taxonomy' => 'manualdocumentationcategory',));
    foreach( $categories as $category ) {
        $doccategories_array[$category->name] = $category->term_id;
    }
	// KNOWLEDGEBASE 
	$kbcategories_array = array();
	$kbcategories_array[] = '';
    $categories = get_categories(array('taxonomy' => 'manualknowledgebasecat',));
    foreach( $categories as $category ) {
        $kbcategories_array[$category->name] = $category->term_id;
    }
	
	vc_map( array(
			"name" => esc_html__("Inline Documentation", 'manual'), 
			"base" => "manual__vc_inlinedocumentation",
			"category" => 'Manual',
			"allowed_container_element" => 'vc_row',
			"icon" => trailingslashit(get_template_directory_uri()) . "/img/vc_manual_inline.png",
			"description" => esc_html__("KB & DOC inline", 'manual'), 
			"params" => array_merge(	  
				array(  
					  
					array(
						"type" => "dropdown",
						"admin_label" => true,
						"heading" => esc_html__("Post Type", 'manual'),
						"param_name" => "post_type",
						"value" => array(
							"Documentation" => "manual_documentation",
							"KnowledgeBase" => "manual_kb",
						)
					),
					array(
						"type" => "dropdown",
						"admin_label" => true,
						"heading" => esc_html__( "Select Documentation Category", "manual" ),
						"param_name" => "cat_id_posttype",
						"value" => $doccategories_array,
						"description" => esc_html__( "Select category", "manual" ),
						"dependency" => array('element' => "post_type", 'value' => array('manual_documentation')),
					), 
					array(
						"type" => "dropdown",
						"admin_label" => true,
						"heading" => esc_html__( "Select Documentation Category", "manual" ),
						"param_name" => "cat_id_posttype_kb",
						"value" => $kbcategories_array,
						"description" => esc_html__( "Select category", "manual" ),
						"dependency" => array('element' => "post_type", 'value' => array('manual_kb')),
					), 
					// GROUP 1 - ORDER
					array(
						"type" => "dropdown",
						"admin_label" => true,
						"heading" => esc_html__("Inline Records Display Order", 'manual'),
						"param_name" => "posttype_inlinerec_display_order",
						"value" => array(
							"Ascending Order" => "ASC",
							"Descending Order" => "DESC",
							),
						"group" => "Order",
					),
					array(
						"type" => "dropdown",
						"admin_label" => true,
						"heading" => esc_html__("Inline Records Display Order By", 'manual'),
						"param_name" => "posttype_inlinerec_display_orderby",
						"value" => array(
								'Page Order' => 'menu_order',		 
								'Order by Title' => 'title',
								'Order by Random' => 'rand',
								'Order By Date' => 'date',
								'Order By Last Modified Date' => 'modified',
								'None' => 'none',
							),
						"group" => "Order",
					),
					// GROUP 2 - SEARCH BOX
					array(
						"type" => "dropdown",
						"admin_label" => true,
						"heading" => esc_html__("Display Search Box On|Off", 'manual'),
						"param_name" => "inlineodc_searchonoff",
						"value" => array(
							"On" => "on",
							"Off" => "off",
							),
						"group" => "Search Box",
					),  
					array(
						"type" => "textfield",
						"admin_label" => true,
						"heading" => esc_html__( "Search Box Text", "manual" ),
						"param_name" => "inlinesearchboxtext",
						"value" => "Search...",
						"dependency" => array('element' => "inlineodc_searchonoff", 'value' => array('on')),
						"group" => "Search Box",
					),
					// GROUP 3 - DESIGN
					array(
						"type" => "dropdown",
						"admin_label" => true,
						"heading" => esc_html__("Inline Records Display Position", 'manual'),
						"param_name" => "posttype_inlinerec_display_position",
						"value" => array(
								'Left' => 'left',		 
								'Right' => 'right',
							),
						"group" => "Design",
					),
					array(
						"type" => "dropdown",
						"admin_label" => true,
						"heading" => esc_html__("Remove - Content Box Shadow and Padding", 'manual'),
						"param_name" => "posttype_inlinerec_boxshadowand_padding",
						"value" => array(
								'No' => 'no',		 
								'Yes' => 'yes',
							),
						"group" => "Design",
					),
					array(
						"type" => "checkbox",
						"admin_label" => true,
						"heading" => esc_html__("Adjust Inline Menu on The Article Title Level", "manual"),
						"param_name" => "adjust_sidebar_top_padding",
						"value" => "",
						"description" => "",
						"dependency" => Array('element' => "posttype_inlinerec_boxshadowand_padding", 'value' => array('no')),
						"group" => "Design",
					),
					array(
						"type" => "dropdown",
						"admin_label" => true,
						"heading" => esc_html__("Row Layout", 'manual'),
						"param_name" => "posttype_inlinerec_rowlayout",
						"value" => array(
								'col-3 | col-9' => '1',
								'col-4 | col-8' => '2',		 
							),
						"std" => "2",
						"group" => "Design", 
					),
					// GROUP 4 - STYLE
					array(
						"type" => "dropdown",
						"admin_label" => true,
						"heading" => esc_html__("Inline Menu Style", 'manual'),
						"param_name" => "posttype_inline_display_style",
						"value" => array(
								'Modern' => '1',		 
								'Classic' => '2',
							),
						"group" => "Style",
					),
					  
				)
			)	  
	) );
	
}




/****************************************
***  ADD VC SC 9 :: HOME HELP BLOCKS  ***
*****************************************/
vc_map( array(
		"name" => esc_html__("Home Help Blocks", "manual"), 
		"base" => "manual_theme_home_help_blocks",
		"category" => esc_html__('Manual', "manual"),
		"allowed_container_element" => 'vc_row',
		"icon" => trailingslashit(get_template_directory_uri()) . "/img/vc_manual_carousel.png",
		"description" => esc_html__("Help carousel blocks", 'manual'), 
		"params" => array_merge(
			array(
				  
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => esc_html__("Title Name (Only For heading, will not display anywhere)", "manual"),
					"param_name" => "title",
					"value" => "",
					"description" => "",
				),
				
			)
		)
) );



/***************************************
***  ADD VC SC 10 :: PORTFOLIO LIST  ***
****************************************/
vc_map( array(
		"name" => esc_html__("Portfolio", "manual"), 
		"base" => "manual_theme_portfolio_sc",
		"category" => esc_html__('Manual', "manual"),
		"allowed_container_element" => 'vc_row',
		"description" => esc_html__("Display portfolio in a style", 'manual'), 
		"icon" => trailingslashit(get_template_directory_uri()) . "/img/vc_manual_portfolio.png",
		"params" => array_merge(
			array(
			
				array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => esc_html__("Portfolio Type", "manual"),
					"param_name" => "portfolio_type",
					"value" => array(
						"Default" => "",
						"FitRows" => "FitRows",
						"Masonry" => "Masonry",
						)
				),
				
				array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => esc_html__("Display Portfolio Filter", "manual"),
					"param_name" => "portfolio_shorting",
					"value" => array(
						"Default" => "",
						"yes" => "yes",
						"no" => "no",
						)
				),
				
				array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => esc_html__("Filter Order", "manual"),
					"param_name" => "sorting_order",
					"value" => array(
						"Default" => "",
						"Ascending Order" => "ASC",
						"Descending Order" => "DESC",
						),
					"dependency" => Array('element' => "portfolio_shorting", 'value' => array('yes'))
				),
				
				array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => "Filter Order By",
					"param_name" => "sorting_order_by",
					"value" => array(
						"Name" => "name",
						"Slug" => "slug",
						"ID" => "id",
						"Description" => "description"
					),
					"description" => "",
					"dependency" => array('element' => "portfolio_shorting", 'value' => array('yes'))
				),
				
				array(
					"type" => "colorpicker",
					"admin_label" => true,
					"heading" => esc_html__('Filter Link Color', "manual"), 
					"param_name" => "shorting_link_color",
					"description" => "",
					"dependency" => Array('element' => "portfolio_shorting", 'value' => array('yes'))
				),
				
				array(
					"type" => "colorpicker",
					"admin_label" => true,
					"heading" => esc_html__('Filter Link Border Color', "manual"), 
					"param_name" => "shorting_link_border_color",
					"description" => "",
					"dependency" => Array('element' => "portfolio_shorting", 'value' => array('yes'))
				),
				
				array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => esc_html__("Filter Align", "manual"),
					"param_name" => "filter_align",
					"value" => array(
								"Left" => "left",
								"Center" => "center",
								"Right" => "right",
							   ),
					"dependency" => Array('element' => "portfolio_shorting", 'value' => array('yes'))	
				),
				
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => esc_html__("Filter Padding", "manual"),
					"param_name" => "filter_padding",
					"value" => "50px",
					"description" => "Will distribute equal top/bottom height (Default:50px)",
					"dependency" => Array('element' => "portfolio_shorting", 'value' => array('yes'))
				),
				
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => esc_html__("Number of portfolio records per page", "manual"),
					"param_name" => "number_of_post",
					"value" => "-1",
					"description" => esc_html__("NOTE: value -1 display all result", "manual"),
				),
				
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => esc_html__("Portfolio by Selected Category", "manual"),
					"param_name" => "category",
					"value" => "",
					"description" => "Enter Category Slug Name seprated by comma (leave empty for all)"
				),
				
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => esc_html__("Portfolio by Selected Projects", "manual"),
					"param_name" => "selected_projects",
					"value" => "",
					"description" => "Enter portfolio ID seprated by comma"
				),
				
				array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => esc_html__("Portfolio Title Tag", "manual"), 
					"param_name" => "portfolio_title_tag",
					"value" => array(
						"h3" => "h3",
						"h4" => "h4",
						"h5" => "h5",
						"h6" => "h6",
					),
					"description" => "",
					'std'         => 'h4',
				),
				
				array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => esc_html__("Portfolio Order", "manual"),
					"param_name" => "portfolio_order",
					"value" => array(
						"Default" => "",
						"Ascending Order" => "ASC",
						"Descending Order" => "DESC",
						)
				),
				
				array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => esc_html__("Portfolio Order By", "manual"),
					"param_name" => "portfolio_order_by",
					"value" => array(
						"Default" => "",
						"Title" => "title",
						"Name" => "name",
						"Date" => "date",
						"Modified" => "modified",
						"Random" => "rand",
						)
				),
				
				array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => esc_html__("Portfolio Column", "manual"),
					"param_name" => "portfolio_column",
					"value" => array(
						"Default" => "",
						"Two" => "6",
						"Three" => "4",
						"Four" => "3",
						)
				),
				
				array(
					"type" => "colorpicker",
					"admin_label" => true,
					"heading" => esc_html__('Link Color', "manual"), 
					"param_name" => "link_color",
					"description" => "",
				),
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => "Show Categories",
					"param_name" => "show_categories",
					"value" => array(
						"Yes"	=>	"yes",
						"No"   	=>	"no"
					),
					"description" => ""
				),
				
				array(
					"type" => "colorpicker",
					"admin_label" => true,
					"heading" => esc_html__('Category Text Color', "manual"), 
					"param_name" => "link_cat_color",
					"description" => "",
					"dependency" => Array('element' => "show_categories", 'value' => array('yes'))
				),
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => "Show Custom Description",
					"param_name" => "show_custom_description",
					"value" => array(
						"No"   	=>	"no",
						"Yes"	=>	"yes",
					),
					"description" => ""
				),
				
				array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => esc_html__('Show Load More', "manual"),
					"param_name" => "show_load_more",
					"value" => array(
						"" => "",
						"Yes" => "yes",
						"No" => "no"	
					),
					"description" => "",
				),
				
				array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => esc_html__("Show Load More Text Align", "manual"),
					"param_name" => "show_load_more_align",
					"value" => array(
								"Default" => "",
								"Left" => "left",
								"Center" => "center",
								"Right" => "right",
							   ),
					"dependency" => Array('element' => "show_load_more", 'value' => array('yes'))	
				),
				
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => esc_html__("Show Load More margin", "manual"),
					"param_name" => "show_load_more_margin",
					"value" => "20px",
					"description" => "Will distribute equal top/bottom height (Default:20px)",
					"dependency" => Array('element' => "show_load_more", 'value' => array('yes'))	
				),
				
			)
		)
) );


/**************************************
***  ADD VC SC 11 :: MONITOR FRAME  ***
***************************************/
vc_map( array(
		"name" => esc_html__("Monitor Frame", "manual"), 
		"base" => "manual_theme_monitor_frame_portfolio",
		"category" => esc_html__('Manual', "manual"),
		"allowed_container_element" => 'vc_row',
		"description" => esc_html__("Monitor image frame", 'manual'), 
        "icon" => trailingslashit(get_template_directory_uri()) . "/img/vc_manual_monitor_img_frame.png",
		"params" => array_merge(
			array(
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => esc_html__("Title", "manual"),
					"param_name" => "title",
					"value" => "",
					"description" => "",
				),
				array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => esc_html__("Title Tag", "manual"),
					"param_name" => "title_tag",
					"value" => array(
						"None" => "",
						"h5"  => "h5",
						"h6" => "h6",
						"div" => "div",
						)
				),
				array(
					"type"        => "vc_link",
					"class"       => "",
					"heading"     => esc_html__("Link", "manual"),
					"param_name"  => "link",
					"value"       => "",
					"description" => esc_html__("Link URL", "manual"),
				 ),
				 array(
					"type" => "attach_image",
					"admin_label" => true,
					"heading" => esc_html__("Image", "manual"), 
					"param_name" => "portfoio_image"
				),
			)
		)
) );


/*************************************
***  ADD VC SC 13 :: KB GROUP CAT - REMOVED  ***
**************************************/


			
/*************************************
***  ADD VC SC 14 :: FAQ CATEGORY  ***
**************************************/
vc_map( array(
		"name" => esc_html__("Widget - FAQ Category", "manual"), 
		"base" => "manual_theme_faq_category",
		"category" => esc_html__('Manual', "manual"),
		"allowed_container_element" => 'vc_row',
		"description" => esc_html__("Widget", 'manual'), 
		"icon" => trailingslashit(get_template_directory_uri()) . "/img/vc_manual_widgets.png",
		"params" => array_merge(
			array(
			
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => esc_html__("Title", "manual"),
					"param_name" => "faq_category_title",
					"value" => "",
					"description" => "",
				),
				
				array(
					"type" => "checkbox",
					"admin_label" => true,
					"heading" => esc_html__("Show post counts", "manual"),
					"param_name" => "faq_category_show_post_count",
					"value" => "",
					"description" => "",
				),
				
				array(
					"type" => "colorpicker",
					"admin_label" => true,
					"heading" => esc_html__('Count Text Color', "manual"), 
					"param_name" => "count_text_color",
					"description" => "",
					"dependency" => Array('element' => "faq_category_show_post_count", 'value' => array('true'))
				),
				
				array(
					"type" => "colorpicker",
					"admin_label" => true,
					"heading" => esc_html__('Count Background Color', "manual"), 
					"param_name" => "count_bg_color",
					"description" => "",
					"dependency" => Array('element' => "faq_category_show_post_count", 'value' => array('true'))
				),
				
			)
		)
) );





/****************************************************
***  ADD VC SC 15 :: FAQ SINGLE CATEGORY ARTICLE  ***
*****************************************************/
add_action( 'vc_before_init', 'manualtheme_faq_singlecatrec_vcsc' );
function manualtheme_faq_singlecatrec_vcsc() {
    $faqcategories_array = array();
    $categories = get_categories(array('taxonomy' => 'manualfaqcategory',));
    foreach( $categories as $category ) {
        $faqcategories_array[$category->name] = $category->term_id;
    }
	
	vc_map( array(
			"name" => esc_html__("FAQs - Category Records", "manual"), 
			"base" => "manual_theme_single_faq_article",
			"category" => esc_html__('Manual', "manual"),
			"allowed_container_element" => 'vc_row',
			"description" => esc_html__("Display FAQs in a different style", 'manual'), 
			"icon" => trailingslashit(get_template_directory_uri()) . "/img/vc_manual_faq_cat_record.png",
			"params" => array_merge(
				array(
					  
					array(
						"type" => "dropdown",
						"admin_label" => true,
						"heading" => esc_html__( "Select FAQ Category", "manual" ),
						"param_name" => "faqsinglecatid",
						"value" => $faqcategories_array,
						"description" => esc_html__( "Select category", "manual" )
					),  
					 
					array(
						"type" => "textfield",
						"admin_label" => true,
						"heading" => esc_html__("Number Of Post Per Page", "manual"),
						"param_name" => "page_per_post",
						"value" => "-1",
						"description" => "Note: -1 shows all post",
					),
					
					array(
						"type" => "dropdown",
						"admin_label" => true,
						"heading" => esc_html__("Include Child Category Posts Inside Root Category", "manual"),
						"param_name" => "include_child_post",
						"value" => array(
								"yes" => "yes",
								"No" => "no",
							)
					),
					
					// GROUP 1 - ORDER 
					array(
						"type" => "dropdown",
						"admin_label" => true,
						"heading" => esc_html__("Post Order", "manual"),
						"param_name" => "post_order",
						"value" => array(
							"None" => "",
							"Ascending"  => "ASC",
							"Descending" => "DESC",
							),
						"group" => "Order",
					),
					
					array(
						"type" => "dropdown",
						"admin_label" => true,
						"heading" => esc_html__("Post Order By", "manual"),
						"param_name" => "post_orderby",
						"value" => array(
								"None" => "none",
								"Title" => "title",
								"Date"  => "date",
								"Last Modified Date"  => "modified",
								"Random"  => "rand",
								"Number of Comments"  => "comment_count",
								"Page Order"  => "menu_order",
							),
						"group" => "Order",
					),
					
					// GROUP 2 - SHOW/HIDE 
					array(
						"type" => "dropdown",
						"admin_label" => true,
						"heading" => esc_html__("Hide Pagination", "manual"),
						"param_name" => "hidepagination",
						"value" => array(
								"1" => "No",
								"2" => "Yes",
							),
						"group" => "Show/Hide",
					),
					
					// GROUP 3 - DISPLAY STYLE 
					array(
						"type" => "dropdown",
						"admin_label" => true,
						"heading" => esc_html__('FAQ Display Style', "manual"), 
						"param_name" => "displaystyle",
						"value" => array(
							'Style 1' => '1',
							'Style 2' => '2',
						),
						"group" => "Style",
					), 
					array(
						"type" => "colorpicker",
						"admin_label" => true,
						"heading" => "Bar Color",
						"param_name" => "bar_color",
						"description" => "",
						"dependency" => Array('element' => "displaystyle", 'value' => array('1')),
						"group" => "Style",
					),
					array(
						"type" => "dropdown",
						"admin_label" => true,
						"heading" => esc_html__('Custom Title', "manual"), 
						"param_name" => "custom_title",
						"value" => array(
							'' => '',
							'Yes' => 'yes',
							'No' => 'no',
						),
						"dependency" => Array('element' => "displaystyle", 'value' => array('1')),
						"group" => "Style",
					),
					array(
						"type" => "textfield",
						"admin_label" => true,
						"heading" => esc_html__('Title Font Size', "manual"), 
						"param_name" => "title_font_size",
						"value" => "19px",
						"description" => "Default: 19px",
						"dependency" => Array('element' => "custom_title", 'value' => array('yes')),
						"group" => "Style",
					),
					array(
						"type" => "dropdown",
						"admin_label" => true,
						"heading" => "Text Font Weight",
						"param_name" => "text_font_weight",
						"value" => array(
							"Default" => "",
							"Thin 100" => "100",
							"Extra-Light 200" => "200",
							"Light 300" => "300",
							"Regular 400" => "400",
							"Medium 500" => "500",
							"Semi-Bold 600" => "600",
							"Bold 700" => "700",
							"Extra-Bold 800" => "800",
							"Ultra-Bold 900" => "900"
						),
						'std'         => '600', 
						"dependency" => Array('element' => "custom_title", 'value' => array('yes')),
						"group" => "Style",
					),
					
					array(
						"type" => "dropdown",
						"admin_label" => true,
						"heading" => "Text Transform",
						"param_name" => "text_transform",
						"value" => array(
							"Default" 			=> "uppercase",
							"None"				=> "none",
							"Capitalize" 		=> "capitalize",
							"Uppercase"			=> "uppercase",
							"Lowercase"			=> "lowercase"
						),
						"description" => "",
						'std'         => 'none',
						"dependency" => Array('element' => "custom_title", 'value' => array('yes')),
						"group" => "Style",
					),
					
					array(
						"type" => "dropdown",
						"admin_label" => true,
						"heading" => esc_html__('Display Column', "manual"), 
						"param_name" => "faq_column",
						"value" => array(
							'Column 4' => '4',
							'Column 3' => '3',
							'Column 2' => '2',
						),
						"dependency" => Array('element' => "displaystyle", 'value' => array('2')),
						"group" => "Style",
					),  
					
					array(
						"type" => "dropdown",
						"admin_label" => true,
						"heading" => esc_html__('Title Tag', "manual"), 
						"param_name" => "faq_title_tag",
						"description" =>  esc_html__('Default:h4', "manual"),
						"value" => array(
							'' => 'Default',
							'H2' => 'h2',
							'H3' => 'h3',
							'H4' => 'h4',
							'H5' => 'h5',
							'H6' => 'h6',
						),
						"dependency" => Array('element' => "displaystyle", 'value' => array('2')),
						"group" => "Style",
					),  
					
					array(
						"type" => "textfield",
						"admin_label" => true,
						"heading" => esc_html__("Box Height", 'manual'),
						"param_name" => "box_height",
						"value" => "",
						"description" => "Example: 155px",
						"group" => "Style", 
						"dependency" => Array('element' => "displaystyle", 'value' => array('2'))
					),
					
					array(
						"type" => "colorpicker",
						"admin_label" => true,
						"heading" => "Background Color",
						"param_name" => "bg_color",
						"description" => "",
						"dependency" => Array('element' => "displaystyle", 'value' => array('2')),
						"group" => "Style",
					),
					
					array(
						"type" => "colorpicker",
						"admin_label" => true,
						"heading" => "Alternate Background Color",
						"param_name" => "alternate_bg_color",
						"description" => "Will appear on even blocks",
						"dependency" => Array('element' => "displaystyle", 'value' => array('2')),
						"group" => "Style",
					),
					
					array(
						"type" => "colorpicker",
						"admin_label" => true,
						"heading" => "Text Color",
						"param_name" => "tag_color",
						"description" => "",
						"dependency" => Array('element' => "displaystyle", 'value' => array('2')),
						"group" => "Style",
					),
					
					// EOF GROUP 1
						
				)
			)
	) );

}



if ( class_exists('bbPress') ) { 
	/**************************************
	***  ADD VC SC 16 :: BBPRESS LOGIN  ***
	***************************************/
	vc_map( array(
			"name" => esc_html__("Login", "manual"), 
			"base" => "theme_maual_bbpress_login",
			"category" => 'Manual BBPress',
			"allowed_container_element" => 'vc_row',
			"description" => esc_html__("Site login", 'manual'), 
			"icon" => trailingslashit(get_template_directory_uri()) . "/img/vc_manual_site_login.png",
			"params" => array(
			
					array(
						"type" => "textfield",
						"admin_label" => true,
						"heading" => "Login Text",
						"param_name" => "bbpress_login",
						"description" => "Custom Login Text"
					),
					
					array(
						"type" => "colorpicker",
						"admin_label" => true,
						"heading" => "Text Color",
						"param_name" => "text_color",
						"description" => "",
					),
	
					array(
						"type" => "colorpicker",
						"admin_label" => true,
						"heading" => "Button Background Color",
						"param_name" => "button_bg_color",
						"description" => "",
					),
	
					array(
						"type" => "colorpicker",
						"admin_label" => true,
						"heading" => "Button Text Color",
						"param_name" => "button_text_color",
						"description" => "",
					),
					
					array(
						"type"        => "vc_link",
						"class"       => "",
						"heading"     => esc_html__("Register Link", "manual"),
						"param_name"  => "register_link_url",
						"value"       => "",
						"description" => esc_html__("Register Link URL", "manual"),
					),

					array(
						"type"        => "vc_link",
						"class"       => "",
						"heading"     => esc_html__("Lost Password Link", "manual"),
						"param_name"  => "lost_password_link_url",
						"value"       => "",
						"description" => esc_html__("Lost Password Link URL", "manual"),
					),
	
			)
	) );
	
	
	/*****************************************
	***  ADD VC SC 17 :: BBPRESS REGISTER  ***
	******************************************/
	vc_map( array(
			"name" => esc_html__("Register", "manual"), 
			"base" => "theme_maual_bbpress_register",
			"category" => 'Manual BBPress',
			"allowed_container_element" => 'vc_row',
			"description" => esc_html__("Site register", 'manual'), 
            "icon" => trailingslashit(get_template_directory_uri()) . "/img/vc_manual_site_register.png",
			"params" => array(
			
					array(
						"type" => "textfield",
						"admin_label" => true,
						"heading" => "Message",
						"param_name" => "bbpress_register_msg",
						"value" => "",
						"description" => 'The pre-define message will overwrite',
					),
					
					array(
						"type" => "colorpicker",
						"admin_label" => true,
						"heading" => "Message Text Color",
						"param_name" => "text_color",
						"description" => "",
					),
	
					array(
						"type" => "colorpicker",
						"admin_label" => true,
						"heading" => "Button Background Color",
						"param_name" => "button_bg_color",
						"description" => "",
					),
	
					array(
						"type" => "colorpicker",
						"admin_label" => true,
						"heading" => "Button Text Color",
						"param_name" => "button_text_color",
						"description" => "",
					),

			)
	) );
	
	
	/**********************************************
	***  ADD VC SC 18 :: BBPRESS LOST PASSWORD  ***
	***********************************************/
	vc_map( array(
			"name" => esc_html__("Lost Password", "manual"), 
			"base" => "theme_maual_bbpress_lost_password",
			"category" => 'Manual BBPress',
			"allowed_container_element" => 'vc_row',
			"description" => esc_html__("Lost password", 'manual'), 
			"icon" => trailingslashit(get_template_directory_uri()) . "/img/vc_manual_lost_pass.png",
			"params" => array(
			
					array(
						"type" => "colorpicker",
						"admin_label" => true,
						"heading" => "Button Background Color",
						"param_name" => "button_bg_color",
						"description" => "",
					),
	
					array(
						"type" => "colorpicker",
						"admin_label" => true,
						"heading" => "Button Text Color",
						"param_name" => "button_text_color",
						"description" => "",
					),
			
			)
	) );
	
} // Eof bbpress



	
/**********************************************
***  ADD VC SC 19 :: PORTFOLIO ITEM WRAP  *****
***********************************************/
vc_map( array(
		"name" => esc_html__("Web Frame", "manual"), 
		"base" => "manual_portfolio_item_frame",
		"category" => esc_html__('Manual', "manual"),
		"allowed_container_element" => 'vc_row',
		"description" => esc_html__("Web broswer frame", 'manual'),
		"icon" => trailingslashit(get_template_directory_uri()) . "/img/vc_manual_web_browser_frame.png",
		"params" => array_merge(
			array(
			
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => esc_html__("Title", "manual"),
					"param_name" => "title",
					"value" => "",
					"description" => "",
				),
				
				array(
					"type"        => "vc_link",
					"class"       => "",
					"heading"     => esc_html__("Link", "manual"),
					"param_name"  => "link",
					"value"       => "",
					"description" => esc_html__("Link URL", "manual"),
				 ),
				 
				 array(
					"type" => "attach_image",
					"admin_label" => true,
					"heading" => esc_html__("Image", "manual"), 
					"param_name" => "portfoio_image"
				),
				
				array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => "Image Position",
					"param_name" => "position",
					"value" => array(
						"Center" => "center",	
						"Left" => "left",
						"Right" => "right",	
					),
					'save_always' => true,
					"description" => ""
				),
				
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => esc_html__("Margin", "manual"),
					"param_name" => "margin",
					"value" => "",
					"description" => "example: 0px 0px 0px 0px (top, right, bottom, left)",
				),
				
				array(
					"type" => "checkbox",
					"admin_label" => true,
					"heading" => esc_html__("Apply Image Box Shadow", "manual"),
					"param_name" => "image_border_shadow",
					"value" => "",
					"description" => "",
				),
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__('Image Box CSS Animation', "manual"), 
					"param_name" => "box_css_animation",
					"value" => array(
						"Default"    => "",
						"Grow"	     => "hvr-grow",
						"Shrink" 	 => "hvr-shrink",
						"Pulse" 	 => "hvr-pulse",
						"Pulse Grow" 	=> "hvr-pulse-grow",
						"Pulse Shrink" 	=> "hvr-pulse-shrink",
						"Push" 	  => "hvr-push",
						"Pop" 	  => "hvr-pop",
						"Bounce In"  => "hvr-bounce-in",
						"Bounce Out" => "hvr-bounce-out",
						"Float" 	 => "hvr-float",
						"Wobble Horizontal" => "hvr-wobble-horizontal",
						"Wobble Vertical" 	=> "hvr-wobble-vertical",
						),
					"description" => "",
				),
				
			)
		)
) );




/********************************
***  ADD VC SC 20 :: BUTTON *****
*********************************/
vc_map( array(
		"name" => esc_html__("Button", "manual"), 
		"base" => "manual_sc_button_url",
		"category" => esc_html__('Manual', "manual"),
		"allowed_container_element" => 'vc_row',
		"description" => esc_html__("A simple call to action button", 'manual'), 
		"icon" => trailingslashit(get_template_directory_uri()) . "/img/vc_manual_button.png",
		"params" => array_merge(
			array(
			
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => esc_html__("Botton Margin", "manual"),
					"param_name" => "bottom_margin",
					"value" => "0px 0px 0px 0px",
					"description" => "(Default: 0px 0px 0px 0px;) == top right button left (Include px)",
				),
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__('Botton CSS Animation', "manual"), 
					"param_name" => "button_css_animation",
					"value" => array(
						"Default"    => "",
						"Grow"	     => "hvr-grow",
						"Shrink" 	 => "hvr-shrink",
						"Pulse" 	 => "hvr-pulse",
						"Pulse Grow" 	=> "hvr-pulse-grow",
						"Pulse Shrink" 	=> "hvr-pulse-shrink",
						"Push" 	  => "hvr-push",
						"Pop" 	  => "hvr-pop",
						"Bounce In"  => "hvr-bounce-in",
						"Bounce Out" => "hvr-bounce-out",
						"Float" 	 => "hvr-float",
						"Wobble Horizontal" => "hvr-wobble-horizontal",
						"Wobble Vertical" 	=> "hvr-wobble-vertical",
						),
					"description" => ""
				),
			
				array(
					"type"        => "vc_link",
					"class"       => "",
					"heading"     => esc_html__("Link", "manual"),
					"param_name"  => "link",
					"value"       => "",
					"description" => esc_html__("Link URL", "manual"),
				),
				 
				array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => esc_html__('Button Align', "manual"),
					"param_name" => "link_align",
					"value" => array(
						"Left" => "left",
						"Center" => "center",
						"Right" => "right",
					),
					'save_always' => true,
				),
				
				array(
					"type" => "colorpicker",
					"admin_label" => true,
					"heading" => esc_html__('Text Color', "manual"),
					"param_name" => "link_color",
					"description" => ""
				),
				
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => esc_html__("Text Size", "manual"),
					"param_name" => "text_size",
					"value" => "",
					"description" => "Include px example:17px",
				),
				
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => esc_html__("Text Padding", "manual"),
					"param_name" => "text_padding",
					"value" => "",
					"description" => "Default: 0px 22px; (top/button left/right) Include px",
				),
				
				array(
					"type" => "colorpicker",
					"admin_label" => true,
					"heading" => esc_html__('Button Color', "manual"),
					"param_name" => "button_color",
					"description" => ""
				),
				
				array(
					"type" => "colorpicker",
					"admin_label" => true,
					"heading" => esc_html__('Button Hover Color', "manual"),
					"param_name" => "button_hover_color",
					"description" => ""
				),
				
				array(
					"type" => "checkbox",
					"admin_label" => true,
					"heading" => esc_html__('Remove Border Bottom', "manual"),  
					"param_name" => "remove_border_buttom",
					"description" => ""
				),
				
				array(
					"type" => "checkbox",
					"admin_label" => true,
					"heading" => esc_html__('Remove Text Shadow', "manual"),  
					"param_name" => "remove_text_shadow",
					"description" => ""
				),
				
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => esc_html__('Border Radius', "manual"),  
					"param_name" => "border_radius",
					"value" => "",
					"description" => "Include px (example: 3px)"
				),
			
			)
		)
) );


/*************************************
***    ADD VC :: SERVICE TABLE     ***
**************************************/
vc_map( array(
"name" => esc_html__("Service Table", "manual"),
"base" => "manual_service_table_section",
"category" =>  esc_html__('Manual', "manual"),
"as_parent" => array('only' => 'manual_service_option'),
"content_element" => true,
"show_settings_on_create" => true,
"js_view" => 'VcColumnView',
"description" => esc_html__("Popular service table", 'manual'), 
"icon" => trailingslashit(get_template_directory_uri()) . "/img/vc_manual_pricing_table.png",
"params"            => array(
			 array(
				"type"        => "textfield",
				"admin_label" => true,
				"heading"     => esc_html__("Title", "manual"),
				"param_name"  => "title",
				"value"       => "",
				"description" => esc_html__("The title of the service section", "manual")
			 ),
			 
			 array(
				"type"        => "textfield",
				"class"       => "",
				"heading"     => esc_html__("Icon Image", "manual"),
				"param_name"  => "iconimage",
				"value"       => "",
				"description" => "Enter <a href=\"http://fortawesome.github.io/Font-Awesome/icons/\" target=\"_blank\">fontawesome</a> name (eg: fa fa-file-o) -OR- <br>Enter <a href=\"https://www.elegantthemes.com/blog/resources/elegant-icon-font\" target=\"_blank\">elegant icon font</a> name -OR- <br>Enter <a href=\"http://demo.wpsmartapps.com/themes/manual/et-line-font/\" target=\"_blank\">et line font</a> name"
			 ),
			 
			 array(
				"type" => "colorpicker",
				"admin_label" => true,
				"heading" => esc_html__('Icon Color', "manual"), 
				"param_name" => "icon_color",
				"description" => "",
			),
			 
			array(
				"type"        => "textfield",
				"admin_label" => true,
				"heading"     => esc_html__("Description", "manual"),
				"param_name"  => "description",
				"value"       => "",
				"description" => esc_html__("short info", "manual")
			),
			
			array(
				"type" => "colorpicker",
				"admin_label" => true,
				"heading" => esc_html__('Description Text Color', "manual"), 
				"param_name" => "description_text_color",
				"description" => "",
			),
			
			array(
				"type"        => "vc_link",
				"class"       => "",
				"heading"     => esc_html__("Link", "manual"),
				"param_name"  => "link",
				"value"       => "",
				"description" => esc_html__("Link URL", "manual")
			 ),
			
			 array(
				"type" => "colorpicker",
				"admin_label" => true,
				"heading" => esc_html__('Box Font Color', "manual"), 
				"param_name" => "box_font_color",
				"description" => "",
			),
			 
			array(
				"type" => "colorpicker",
				"admin_label" => true,
				"heading" => esc_html__('Link Text Color', "manual"), 
				"param_name" => "link_text_color",
				"description" => "",
			),
			
			array(
				"type" => "colorpicker",
				"admin_label" => true,
				"heading" => esc_html__('Box Background Color', "manual"), 
				"param_name" => "background_color",
				"description" => "",
			),
			
			array(
				"type" => "colorpicker",
				"admin_label" => true,
				"heading" => esc_html__('Box Border Color', "manual"), 
				"param_name" => "box_border_color",
				"description" => "",
			),
  )
) );

vc_map( array(
  "name"              => esc_html__("Service Option", "manual"),
  "base"              => "manual_service_option",
  "content_element"   => true,
  "as_child"          => array('only' => 'manual_service_table'),
  "category"          => esc_html__('Manual', "manual"),
  "params"            => array(
							   
							 array(
								"type"        => "textarea_html",
								"admin_label" => true,
								"heading"     => esc_html__("Option Text", "manual"),
								"param_name"  => "content",
								"value" => "<li style=\"border-bottom: 1px solid #F0F0F0;\">content content content</li><li style=\"border-bottom: 1px solid #F0F0F0;\">content content content</li><li style=\"border-bottom: 1px solid #F0F0F0;\">content content content</li>",
								"description" => esc_html__("An option this Service table includes", "manual")
							 ),
	
  )
) );
   
  
/*************************************
***    ADD VC :: PRICING TABLE    ***
**************************************/
vc_map( array(
"name" => esc_html__("Pricing Table", "manual"),
"base" => "manual_pricing_table_section",
"category" =>  esc_html__('Manual', "manual"),
"as_parent" => array('only' => 'manual_pricing_option'),
"content_element" => true,
"show_settings_on_create" => true,
"js_view" => 'VcColumnView',
"description" => esc_html__("Popular pricing table", 'manual'), 
"icon" => trailingslashit(get_template_directory_uri()) . "/img/vc_manual_pricing_table.png",
"params"            => array(
							 
			 array(
				"type"        => "textfield",
				"admin_label" => true,
				"heading"     => esc_html__("Title", "manual"),
				"param_name"  => "title",
				"value"       => "",
				"description" => esc_html__("The title of the service section", "manual")
			 ),
			 array(
				"type" => "dropdown",
				"admin_label" => true,
				"heading" => esc_html__('Title Tag', "manual"), 
				"param_name" => "title_tag",
				"value" => array(
					'H2' => 'h2',
					'H3' => 'h3',
					'H4' => 'h4',
					'H5' => 'h5',
					'H6' => 'h6',
				),
				"group" => "Title Tag",
				'std'   => 'h5',
			 ),
			 array(
				"type" => "textfield",
				"admin_label" => true,
				"heading" => esc_html__("Price", "manual"), 
				"param_name" => "price",
				"description" => ""
			 ),
			 array(
				"type" => "textfield",
				"admin_label" => true,
				"heading" => esc_html__("Currency", "manual"),
				"param_name" => "currency",
				"description" => ""
			 ),
			 array(
				"type" => "textfield",
				"admin_label" => true,
				"heading" => esc_html__("Price Period", "manual"),
				"param_name" => "price_period",
				"description" => ""
			 ),
			 array(
				"type"        => "vc_link",
				"class"       => "",
				"heading"     => esc_html__("Button Link", "manual"),
				"param_name"  => "link",
				"value"       => "",
				"description" => esc_html__("Link URL", "manual"),
				"group" => "Button",
			 ),
			 array(
				"type" => "dropdown",
				"admin_label" => true,
				"heading" => esc_html__("Make Box Standout", "manual"),
				"param_name" => "active",
				"value" => array(
					"No" => "no",
					"Yes" => "yes"	
				),
				'save_always' => true,
				"description" => "",
				"group" => "Style",
			 ),
			 array( 
				"type" => "colorpicker",
				"admin_label" => true,
				"heading" => esc_html__('Standout Box Background Color', "manual"), 
				"param_name" => "standout_box_bg_color",
				"description" => "",
				"dependency" => array('element' => "active", 'value' => array('yes')),
				"group" => "Style",
			 ),
			 array(
				"type" => "colorpicker",
				"admin_label" => true,
				"heading" => esc_html__('Background Color', "manual"), 
				"param_name" => "background_color",
				"description" => "",
				"group" => "Design",
			 ),
			 array(
				"type" => "colorpicker",
				"admin_label" => true,
				"heading" =>  esc_html__('Text Color', "manual"), 
				"param_name" => "text_color",
				"description" => "",
				"group" => "Design",
			 ),
			 array(
				"type" => "colorpicker",
				"admin_label" => true,
				"heading" => esc_html__('Box Border Color', "manual"), 
				"param_name" => "box_border_color",
				"description" => "",
				"group" => "Design",
			 ),
  )
) );

vc_map( array(
  "name"              => esc_html__("Pricing Option", "manual"),
  "base"              => "manual_pricing_option",
  "content_element"   => true,
  "as_child"          => array('only' => 'manual_pricing_table'),
  "category"          => esc_html__('Manual', "manual"),
  "icon"              => "icon-wpb-pricing_column",
  "allowed_container_element" => 'vc_row',
  "params"            => array(
							   
							 array(
								"type"        => "textarea_html",
								"admin_label" => true,
								"heading"     => esc_html__("Option Text", "manual"),
								"param_name"  => "content",
								"value" => "<li style=\"border-bottom: 1px solid #F0F0F0;\">content content content</li><li style=\"border-bottom: 1px solid #F0F0F0;\">content content content</li><li style=\"border-bottom: 1px solid #F0F0F0;\">content content content</li>",
								"description" => esc_html__("An option this Service table includes", "manual")
							 ),
	 
  )
) );
   
/*******
SUPPORT PARM ::	EXTRA PROCESS
********/
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
   class WPBakeryShortCode_Manual_Service_Table_Section extends WPBakeryShortCodesContainer {}
   class WPBakeryShortCode_Manual_Pricing_Table_Section extends WPBakeryShortCodesContainer {}
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
   class WPBakeryShortCode_Manual_Service_Option extends WPBakeryShortCode {}
   class WPBakeryShortCode_Manual_Pricing_Option extends WPBakeryShortCode {}
}


/********************************
***  DEFINE CUSTOM VC TYPE    ***
*********************************/
if(!function_exists("manual__dropdown_multi_vc")){
	function manual__dropdown_multi_vc( $param, $value ) {
		$param_line = '';
		$param_line .= '<select multiple name="'. esc_attr( $param['param_name'] ).'" class="wpb_vc_param_value wpb-input wpb-select '. esc_attr( $param['param_name'] ).' '. esc_attr($param['type']).'">';
		foreach ( $param['value'] as $text_val => $val ) {
			if ( is_numeric($text_val) && (is_string($val) || is_numeric($val)) ) {
				$text_val = $val;
			}
			//$text_val = __($text_val, "js_composer");
			$selected = '';
	
			if(!is_array($value)) {
				$param_value_arr = explode(',',$value);
			} else {
				$param_value_arr = $value;
			}
	
			if ($value!=='' && in_array($val, $param_value_arr)) {
				$selected = ' selected="selected"';
			}
			$param_line .= '<option class="'.$val.'" value="'.$val.'"'.$selected.'>'.$text_val.'</option>';
		}
		$param_line .= '</select>';
	
		return  $param_line;
	}
	vc_add_shortcode_param( 'manual__dropdown_multi', 'manual__dropdown_multi_vc' );
}



/************************************************
***  ADD VC SC 23 :: DOCUMENTATION ARTICLES *****
*************************************************/
vc_map( array(
		"name" => esc_html__("Documentation Articles", "manual"), 
		"base" => "manual_theme_documentation_article",
		"category" => esc_html__('Manual', "manual"),
		"allowed_container_element" => 'vc_row',
		"description" => esc_html__("Display articles by a type", 'manual'),
		"icon" => trailingslashit(get_template_directory_uri()) . "/img/vc_manual_doc_arc.png",
		"params" => array_merge(
			array(
				  
				  array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => esc_html__("Articles By", "manual"),
					"param_name" => "documentation_article_display_type",
					"value" => array(
						"Select Article Display Type" => "",
						"Latest Articles (using date)" => "1",
						"Popular Article (using number of views)" => "2",
						"Top Rated Article (using like)" => "3",
						"Most Commented Article" => "4",
						"Recently Updated Article" => "5",
						),
					'std'  => '1',
				   ),
				  
				  array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => esc_html__("Number Of Article", "manual"),
					"param_name" => "documentation_article_numbers",
					"value" => array(
						"2" => "2",
						"3" => "3",
						"4" => "4",
						"5" => "5",
						"6" => "6",
						"7" => "7",
						"8" => "8",
						"9" => "9",
						"10" => "10",
						"11" => "11",
						"12" => "12",
						),
					'std'  => '6',
				   ),
				  
				  array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => esc_html__("Article Order", "manual"),
					"param_name" => "documentation_article_order_asc_dsc",
					"value" => array(
						"Ascending Order" => "ASC",
						"Descending Order" => "DESC",
						),
					"group" => "Order",
					'std'   => 'DESC',
				   ),
				  
				  
				  array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => esc_html__('Title Tag', "manual"), 
					"param_name" => "documentation_title_tag",
					"description" =>  esc_html__('Default:h4', "manual"),
					"value" => array(
						'H2' => 'h2',
						'H3' => 'h3',
						'H4' => 'h4',
						'H5' => 'h5',
						'H6' => 'h6',
					),
					"group" => "Style",
					'std'   => 'h4',
				   ),
				  
				  
				  array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => esc_html__('Display Column', "manual"), 
					"param_name" => "documentation_column",
					"value" => array(
						'Column 4' => '4',
						'Column 3' => '3',
						'Column 2' => '2',
					),
					"group" => "Style",
					'std'         => '3',
				   ),  
				  
				   array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => esc_html__('Display Excerpt Content', "manual"), 
					"param_name" => "documentation_excerpt_content",
					"value" => array(
						'Yes' => 'yes',
						'No' => 'no',
					),
					"group" => "Style",
					'std'  => 'yes',
				   ),
				   
				   array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => esc_html__("Excerpt Length - Number Of Words", "manual"),
					"param_name" => "documentation_excerpt_content_wordlength",
					"value" => "15",
					"description" => "",
					"group" => "Style",
					"dependency" => array('element' => "documentation_excerpt_content", 'value' => array('yes'))
				   ),
				   
				  array(
					"type" => "colorpicker",
					"admin_label" => true,
					"heading" => "Box Background Color",
					"param_name" => "box_bg_color",
					"description" => "", 
					"group" => "Design",
				  ),
				  
				  array(
					"type" => "colorpicker",
					"admin_label" => true,
					"heading" => "Box Border Bottom Color",
					"param_name" => "box_border_btm_color",
					"description" => "", 
					"group" => "Design",
				  ),
				  

			)
		)
) );

/*************************************
***    ADD VC SC 24 :: LOGIN     ***
**************************************/
vc_map( array(
		"name" => esc_html__("Login Box", "manual"), 
		"base" => "manual_theme__login_box",
		"category" => esc_html__('Manual', "manual"),
		"allowed_container_element" => 'vc_row',
		"description" => esc_html__("Site login box", 'manual'), 
		"icon" => trailingslashit(get_template_directory_uri()) . "/img/vc_manual_site_login.png",
		"params" => array_merge(
			array(
				  
				array(
					"type"        => "textfield",
					"heading"     => esc_html__("Login Message", "manual"),
					"param_name"  => "custom_login_message",
					'admin_label' => true,
					"value"       => "",
				), 
				  
				array(
					"type"        => "textfield",
					"heading"     => esc_html__("Logged-in Message", "manual"),
					"param_name"  => "custom_loggedin_message",
					'admin_label' => true,
					"value"       => "",
				), 
				  
				array(
					"type"        => "textfield",
					"heading"     => esc_html__("Logout Text", "manual"),
					"param_name"  => "custom_logout_text",
					'admin_label' => true,
					"value"       => "",
				), 
				
				array(
					"type"        => "textfield",
					"heading"     => esc_html__("Lost Password Text", "manual"),
					"param_name"  => "custom_lostpassword_text",
					'admin_label' => true,
					"value"       => "",
				), 
				
				array(
					"type"        => "textfield",
					"heading"     => esc_html__("Not a member yet? Text", "manual"),
					"param_name"  => "custom_no_member_register_text",
					'admin_label' => true,
					"value"       => "",
				), 
				
				array(
					"type"        => "textfield",
					"heading"     => esc_html__("Register now Text", "manual"),
					"param_name"  => "custom_register_text",
					'admin_label' => true,
					"value"       => "",
				), 

			)
		)
) );


/***********************************************************
***    ADD VC SC 25 :: POST TYPE COUNT POST/CATEGORY     ***
************************************************************/
vc_map( array(
		"name" => esc_html__("Post Type - Records Count", "manual"), 
		"base" => "manual_theme__postype_count_post_category",
		"icon" => "icon-wpb-icon_text",
		"category" => esc_html__('Manual', "manual"),
		"allowed_container_element" => 'vc_row',
		"description" => esc_html__("Count total records of a selected post type", 'manual'),
		"icon" => trailingslashit(get_template_directory_uri()) . "/img/vc_manual_records_count.png",
		"params" => array_merge(
			array(
				  
				  array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => esc_html__('Post Type', "manual"), 
					"param_name" => "manual_post_type",
					"value" => array(
						'KnowledgeBase' => 'manual_kb',
						'Documentation' => 'manual_documentation',
						'FAQs' => 'manual_faq',
						'Forum' => 'bbpress',
						'Post' => 'post',
					),
					'std'  => 'manual_kb',
				   ),
				  
				  array(
					"type"        => "textfield",
					"admin_label" => true,
					"heading"     => esc_html__("Custom Post Type Name", "manual"),
					"param_name"  => "custom_post_type_name",
					"value"       => "",
				 ),
				  
				  array(
					"type"        => "vc_link",
					"class"       => "",
					"heading"     => esc_html__("Link", "manual"),
					"param_name"  => "link",
					"value"       => "",
					"description" => esc_html__("Link URL", "manual"),
				  ),
				  
				  array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => esc_html__('Title Tag', "manual"), 
					"param_name" => "title_tag",
					"description" =>  esc_html__('Default:H4', "manual"),
					"value" => array(
						'H3' => 'h3',
						'H4' => 'h4',
						'H5' => 'h5',
						'H6' => 'h6',
					),
					"group" => "Tag",
					'std'   => 'h4',
				   ),
				  
				  array(
					"type"        => "textfield",
					"admin_label" => true,
					"heading"     => esc_html__("Custom Article Name", "manual"),
					"param_name"  => "custom_article_name",
					"value"       => "Articles",
					"group"       => "Text",
					"dependency" => array('element' => "manual_post_type", 'value' => array('manual_kb','manual_documentation','manual_faq','post')),
				 ),
				  
				 array(
					"type"        => "textfield",
					"admin_label" => true,
					"heading"     => esc_html__("Custom Categories Name", "manual"),
					"param_name"  => "custom_category_name",
					"value"       => "Categories",
					"group"       => "Text",
					"dependency" => array('element' => "manual_post_type", 'value' => array('manual_kb','manual_documentation','manual_faq','post')),
				 ),
				 
				 
				 array(
					"type"        => "textfield",
					"admin_label" => true,
					"heading"     => esc_html__("Custom Topic Name", "manual"),
					"param_name"  => "custom_bbpress_topic_name",
					"value"       => "Topic",
					"group"       => "Text",
					"dependency" => array('element' => "manual_post_type", 'value' => array('bbpress')),
				 ),
				  
				 array(
					"type"        => "textfield",
					"admin_label" => true,
					"heading"     => esc_html__("Custom Posts Name", "manual"),
					"param_name"  => "custom_bbpress_posts_name",
					"value"       => "Posts",
					"group"       => "Text",
					"dependency" => array('element' => "manual_post_type", 'value' => array('bbpress')),
				 ),
				 
				 array(
					"type"        => "textfield",
					"class"       => "",
					"heading"     => esc_html__("Icon", "manual"),
					"param_name"  => "icon",
					"value"       => "",
					"description" => "Enter <a href=\"http://fortawesome.github.io/Font-Awesome/icons/\" target=\"_blank\">fontawesome</a> name (eg: fa fa-file-o) -OR- <br>Enter <a href=\"https://www.elegantthemes.com/blog/resources/elegant-icon-font\" target=\"_blank\">elegant icon font</a> name -OR- <br>Enter <a href=\"http://demo.wpsmartapps.com/themes/manual/et-line-font/\" target=\"_blank\">et line font</a> name",
					"group"       => "Icon",
				 ),
				 
				 array(
					"type"        => "textfield",
					"class"       => "",
					"heading"     => esc_html__("Icon Size", "manual"),
					"param_name"  => "icon_size",
					"value"       => "",
					"description" => "Default:40px",
					"group"       => "Icon",
				 ),
				 
				 
				 array(
					"type" => "colorpicker",
					"admin_label" => true,
					"heading" => "Icon Color",
					"param_name" => "icon_color",
					"description" => "",
					"group"       => "Icon",
				  ),
				 
				 array(
					"type"        => "textfield",
					"class"       => "",
					"heading"     => esc_html__("Box Padding", "manual"),
					"param_name"  => "box_padding",
					"value"       => "",
					"group"       => "Style",
					"description" =>  esc_html__('Default:0px 0px 0px 0px (TOP, RIGHT, BOTTOM, LEFT)', "manual"),
				 ),
				 
				  array(
					"type" => "colorpicker",
					"admin_label" => true,
					"heading" => "Box Background Color",
					"param_name" => "box_bg_color",
					"description" => "",
					"group"       => "Style",
				  ),
				  
				  array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__('Box CSS Animation', "manual"), 
					"param_name" => "box_css_animation",
					"value" => array(
						"Default"    => "",
						"Grow"	     => "hvr-grow",
						"Shrink" 	 => "hvr-shrink",
						"Pulse" 	 => "hvr-pulse",
						"Pulse Grow" 	=> "hvr-pulse-grow",
						"Pulse Shrink" 	=> "hvr-pulse-shrink",
						"Push" 	  => "hvr-push",
						"Pop" 	  => "hvr-pop",
						"Bounce In"  => "hvr-bounce-in",
						"Bounce Out" => "hvr-bounce-out",
						"Float" 	 => "hvr-float",
						"Wobble Horizontal" => "hvr-wobble-horizontal",
						"Wobble Vertical" 	=> "hvr-wobble-vertical",
						),
					"description" => "",
					"group" => 'Style',
				),
				 
				  array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => esc_html__('Text Align', "manual"), 
					"param_name" => "text_align",
					"description" =>  esc_html__('Default:H4', "manual"),
					"value" => array(
						'Align text next to an icon' => '1',
						'Left (everything left align)' => '2',
						'Center' => '3',
						'Right (everything right align)' => '4',
					),
					"group" => "Style",
					'std'   => '1',
				   ),
				  
				  
				   array(
					"type"        => "textfield",
					"class"       => "",
					"heading"     => esc_html__("Icon Margin Right", "manual"),
					"param_name"  => "icon_margin_right",
					"value"       => "",
					"group"       => "Style",
					"description" =>  esc_html__('Default:20px (Gap between icon and text)', "manual"),
					"dependency" => Array('element' => "text_align", 'value' => array('1')),
				  ),
				  
			)
		)
) );

/*****************************************
***    ADD VC SC 26 :: MESSAGE BOX   ***
******************************************/
vc_map( array(
		"name" => esc_html__("Message Box", 'manual'), 
		"base" => "manual__sc_message_box",
		"category" => 'Manual',
		"allowed_container_element" => 'vc_row',
		"description" => esc_html__("Call to action message", 'manual'), 
        "icon" => trailingslashit(get_template_directory_uri()) . "/img/vc_manual_messagebox.png",
		"params" => array_merge(
			array(
					array(
						"type" => "textfield",
						"admin_label" => true,
						"heading" => esc_html__("Title Text", 'manual'),
						"param_name" => "title_text",
						"value" => "",
						"description" => "",
					),
					array(
						"type" => "textfield",
						"admin_label" => true,
						"heading" => esc_html__("Short Message Text", 'manual'),
						"param_name" => "short_message_text",
						"value" => "",
						"description" => "",
					),
					/************* Group - Style ************/
					array(
						"type" => "dropdown",
						"class" => "",
						"heading" => esc_html__('Apply Box Border', 'manual'), 
						"param_name" => "message_box_border",
						"value" => array(
							"Default" => "",
							"No"	  => "no",
							"Yes" 	  => "yes",
							),
						"description" => "",
						"group" => "Style",
					),
					/************* Group - Color ************/
					array(
						"type" => "colorpicker",
						"admin_label" => true,
						"heading" => esc_html__("Box Background Color", 'manual'),
						"param_name" => "message_box_background_color",
						"description" => "",
						"group" => "Color",
					),
					array(
						"type" => "colorpicker",
						"admin_label" => true,
						"heading" => esc_html__("Border Color", 'manual'),
						"param_name" => "message_box_border_color",
						"description" => "",
						"dependency" => Array('element' => "message_box_border", 'value' => array('yes')),
						"group" => "Color",
					),
					array(
						"type" => "colorpicker",
						"admin_label" => true,
						"heading" => esc_html__('Title Text Color', 'manual'),
						"param_name" => "title_text_color",
						"description" => "",
						"group" => "Color",
					),
					array(
						"type" => "colorpicker",
						"admin_label" => true,
						"heading" => esc_html__('Short Message Text Color', 'manual'),
						"param_name" => "short_message_text_color",
						"description" => "",
						"group" => "Color",
					),
					array(
						"type" => "colorpicker",
						"admin_label" => true,
						"heading" => esc_html__('Button Text Color', 'manual'),
						"param_name" => "button_text_color",
						"description" => "",
						"group" => "Color",
					),
					
					array(
						"type" => "colorpicker",
						"admin_label" => true,
						"heading" => esc_html__('Button Background Color', 'manual'),
						"param_name" => "button_bg_color",
						"description" => "",
						"group" => "Color",
					),
					/************* Group - Tag ************/
					 array(
						"type" => "dropdown",
						"class" => "",
						"heading" => "Title Tag",
						"param_name" => "title_tag",
						"value" => array(
							""   => "",
							"h2" => "h2",
							"h3" => "h3",	
							"h4" => "h4",	
							"h5" => "h5",	
							"h6" => "h6",	
						),
						"description" => "",
						"group" => "Tag",
					),
					/************* Group - Font Control ************/
					array(
						"type" => "textfield",
						"admin_label" => true,
						"heading" => esc_html__("Title Font Size", 'manual'),
						"param_name" => "title_text_font_size",
						"value" => "",
						"description" => "Default:24px (Enter value as: 24px)",
						"group" => "Font Control",
					),
					array(
						"type" => "dropdown",
						"class" => "",
						"heading" => esc_html__('Title Text Weight', 'manual'), 
						"param_name" => "title_text_weight",
						"value" => array(
							"Default" 			=> "",
							"Thin 100"			=> "100",
							"Extra-Light 200" 	=> "200",
							"Light 300"			=> "300",
							"Regular 400"		=> "400",
							"Medium 500"		=> "500",
							"Semi-Bold 600"		=> "600",
							"Bold 700"			=> "700",
							"Extra-Bold 800"	=> "800",
							"Ultra-Bold 900"	=> "900"
							),
						"description" => "",
						"group" => "Font Control",
					),
					array(
						"type" => "textfield",
						"admin_label" => true,
						"heading" => esc_html__("Short Message Font Size", 'manual'),
						"param_name" => "short_message_text_font_size",
						"value" => "",
						"description" => "Default:16px (Enter value as: 16px)",
						"group" => "Font Control",
					),
					array(
						"type" => "dropdown",
						"class" => "",
						"heading" => esc_html__('Short Message Text Weight', 'manual'), 
						"param_name" => "short_message_text_weight",
						"value" => array(
							"Default" 			=> "",
							"Thin 100"			=> "100",
							"Extra-Light 200" 	=> "200",
							"Light 300"			=> "300",
							"Regular 400"		=> "400",
							"Medium 500"		=> "500",
							"Semi-Bold 600"		=> "600",
							"Bold 700"			=> "700",
							"Extra-Bold 800"	=> "800",
							"Ultra-Bold 900"	=> "900"
							),
						"description" => "",
						"group" => "Font Control",
					),
					/************* Group - Link ************/
					array(
						"type"        => "vc_link",
						"class"       => "",
						"heading"     => esc_html__("Button Link", 'manual'),
						"param_name"  => "link",
						"value"       => "",
						"group" => "Link",
					),
					/************* Group - Misc ************/
					array(
						"type" => "textfield",
						"admin_label" => true,
						"heading" => esc_html__("Readjust Button Margin Top", 'manual'),
						"param_name" => "button_margin_top",
						"value" => "",
						"description" => "adjust value only if needed (Default: -63px)",
						"group" => "Misc",
					),
			
			)
		)
) );


/*****************************************
***    ADD VC SC 27 :: SEARCH BOX   ***
******************************************/
vc_map( array(
		"name" => esc_html__("Search Box", 'manual'), 
		"base" => "manual__search_box",
		"category" => 'Manual',
		"allowed_container_element" => 'vc_row',
		"description" => esc_html__("Search...", 'manual'), 
		"icon" => trailingslashit(get_template_directory_uri()) . "/img/vc_manual_search.png",
		"params" => array_merge(
			array(
					array(
						"type" => "textfield",
						"admin_label" => true,
						"heading" => esc_html__("Placeholder Text", 'manual'),
						"param_name" => "placeholder_text",
						"value" => "",
						"description" => "Default: Search...",
					),
					
			)
		)
) );


if ( class_exists('LearnPress') ) { 
	/***************************************
	***    ADD VC SC 28 :: LEARNPRESS   ***
	****************************************/
	vc_map( array(
			"name" => esc_html__("Course", 'manual'), 
			"base" => "manual__learnpress_course",
			"category" => 'Manual',
			"allowed_container_element" => 'vc_row',
			"description" => esc_html__("Display course", 'manual'), 
			"icon" => trailingslashit(get_template_directory_uri()) . "/img/vc_manual_course.png",
			"params" => array_merge(
				array(
					/************* Layout ************/
					array(
						'type'        => 'dropdown',
						'admin_label' => true,
						'heading'     => esc_html__( 'Course Display Layout', 'manual' ),
						'param_name'  => 'layout',
						'value'       => array(
							esc_html__( 'Masonry', 'manual' )    => '1',
							esc_html__( 'Fit Rows', 'manual' )   => '2',
						),
					),
					array(
						'type'        => 'dropdown',
						'admin_label' => true,
						'heading'     => esc_html__( 'No of Column', 'manual' ),
						'param_name'  => 'column',
						'value'       => array(
							'2'   => '2',
							'3'   => '3',
							'4'   => '4',
						),
						'std'         => '4',
						'description' => esc_html__( 'Column.', 'manual' )
					),
					array(
						'type'        => 'number',
						'admin_label' => true,
						'heading'     => esc_html__( 'No of Records Limit', 'manual' ),
						'param_name'  => 'limit',
						'min'         => 1,
						'max'         => 20,
						'std'         => '8',
						'description' => esc_html__( 'Limit number courses.', 'manual' )
					),
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__( 'Select Category', 'manual' ),
						'param_name' => 'cat_id',
						'value'      => manual__get_course_categories( array( 'All' => esc_html__( 'all', 'manual' ) ) ),
					),
					 /************* Group - Order ************/
					 array(
						"type" => "dropdown",
						'admin_label' => true,
						"heading" => esc_html__("Order", "manual"),
						"param_name" => "order",
						"value" => array(
							"Descending Order" => "DESC",			 
							"Ascending Order" => "ASC",
							),
						"group" => "Order",
						'std'   => 'DESC',
				   ),
				   array(
						'type'        => 'dropdown',
						'admin_label' => true,
						'heading'     => esc_html__( 'Order By', 'manual' ),
						'param_name'  => 'orderby',
						'value'       => array(
							esc_html__( 'Date', 'manual' )   => 'date',
							esc_html__( 'Random', 'manual' )  => 'rand',
							esc_html__( 'Title', 'manual' )   => 'title',
							esc_html__( 'Modified', 'manual' ) => 'modified',
							esc_html__( 'Category', 'manual' ) => 'category',
						),
						'description' => esc_html__( 'Select order by.', 'manual' ),
						"group" => "Order",
					),
					/************* Group - Tag ************/
					array(
						"type" => "dropdown",
						"heading" => "Title Tag",
						'admin_label' => true,
						"param_name" => "title_tag",
						"value" => array(
							""   => "",
							"h2" => "h2",
							"h3" => "h3",	
							"h4" => "h4",	
							"h5" => "h5",	
							"h6" => "h6",	
						),
						"description" => "Default: h4",
						'std'   => 'h5',
						"group" => "Tag",
					),
					
					array(
						"type" => "dropdown",
						"heading" => "Price Tag",
						'admin_label' => true,
						"param_name" => "course_tag",
						"value" => array(
							""   => "",
							"h4" => "h4",	
							"h5" => "h5",	
							"h6" => "h6",	
						),
						"description" => "Default: h4",
						'std'   => 'h5',
						"group" => "Tag",
					),
						
				)
			)
	) );
}



/*****************************************
***    ADD VC SC 29 :: POST GRID   ***
******************************************/
add_action( 'vc_before_init', 'manualtheme__post_custompost_grid' );
function manualtheme__post_custompost_grid() {
	$postcategories_array = $kbcategories_array = $doccategories_array = $faqcategories_array = array();
	$postcategories_array[] = $kbcategories_array[] = $doccategories_array[] = $faqcategories_array[] = '';
	
	//POST
	$post_categories = get_categories();
	foreach( $post_categories as $category ) {
		$postcategories_array[$category->name] = $category->term_id;
	}
	// KNOWLEDGEBASE 
    $kbcategories = get_categories(array('taxonomy' => 'manualknowledgebasecat','parent' => 0,));
    foreach( $kbcategories as $category ) {
        $kbcategories_array[$category->name] = $category->term_id;
    }
	//DOCUMENTATION
    $doccategories = get_categories(array('taxonomy' => 'manualdocumentationcategory','parent' => 0,));
    foreach( $doccategories as $category ) {
        $doccategories_array[$category->name] = $category->term_id;
    }
	// FAQ
    $faqcategories = get_categories(array('taxonomy' => 'manualfaqcategory','parent' => 0,));
    foreach( $faqcategories as $category ) {
        $faqcategories_array[$category->name] = $category->term_id;
    }
	
vc_map( array(
		"name" => esc_html__("Mega Post Grid", 'manual'), 
		"base" => "manual__masonry_post_grid",
		"category" => 'Manual',
		"description" => esc_html__("Posts and custom post type records in a grid/masonry layout", 'manual'), 
		"allowed_container_element" => 'vc_row',
		"icon" => trailingslashit(get_template_directory_uri()) . "/img/vc_manual_post_grid.png",
		"params" => array_merge(
			array(
				  
				array(
						"type" => "dropdown",
						"admin_label" => true,
						"heading" =>  esc_html__("Post Type ", 'manual'), 
						"param_name" => "gridview_post_type",
						"value" => array(
							"Post" => "post",
							"KnowledgeBase" => "manual_kb",
							"Documentation" => "manual_documentation",
							"FAQs" => "manual_faq",
						)
				),
				array(
					"type" => "manual__dropdown_multi",
					"admin_label" => true,
					"heading" => esc_html__( "Include Post From Category", "manual" ),
					"param_name" => "include_post_category",
					"value" => $postcategories_array, 
					"description" => esc_html__( "Leave empty to display latest posts", "manual" ),
					"dependency" => Array('element' => "gridview_post_type", 'value' => array('post')),
				),
				array(
					"type" => "manual__dropdown_multi",
					"admin_label" => true,
					"heading" => esc_html__( "Include Post From Category", "manual" ),
					"param_name" => "include_kb_category",
					"value" => $kbcategories_array, 
					"description" => esc_html__( "Leave empty to display latest KB posts", "manual" ),
					"dependency" => Array('element' => "gridview_post_type", 'value' => array('manual_kb')),
				),
				array(
					"type" => "manual__dropdown_multi",
					"admin_label" => true,
					"heading" => esc_html__( "Include Post From Category", "manual" ),
					"param_name" => "include_doc_category",
					"value" => $doccategories_array, 
					"description" => esc_html__( "Leave empty to display latest DOC posts", "manual" ),
					"dependency" => Array('element' => "gridview_post_type", 'value' => array('manual_documentation')),
				),
				array(
					"type" => "manual__dropdown_multi",
					"admin_label" => true,
					"heading" => esc_html__( "Include Post From Category", "manual" ),
					"param_name" => "include_faq_category",
					"value" => $faqcategories_array, 
					"description" => esc_html__( "Leave empty to display latest FAQ posts", "manual" ),
					"dependency" => Array('element' => "gridview_post_type", 'value' => array('manual_faq')),
				),
				
				array(
					"type" => "dropdown",
					'admin_label' => true,
					"heading" => esc_html__("Design Type", 'manual'),
					"param_name" => "design_presentation_type",
					"value" => array(
						"Masonry" => "1",
						"FitRows" => "2"
					),
					'save_always' => true,
					"description" => "",
					"group" => "Design",
				),
				array(
					"type" => "dropdown",
					'admin_label' => true,
					"heading" => esc_html__("Design Style", 'manual'),
					"param_name" => "type",
					"value" => array(
						"Box" => "boxes",
						"Box Content With Dividers" => "dividers"
					),
					'save_always' => true,
					"description" => "",
					"group" => "Design",
				),
				array(
					"type" => "textfield",
					'admin_label' => true,
					"heading" => "Number of Posts",
					"param_name" => "number_of_posts",
					"description" => "-1 will display all records",
					"value" => "4",
				),
				array(
					"type" => "dropdown",
					'admin_label' => true,
					"heading" => "Number of Colums",
					"param_name" => "number_of_colums",
					"value" => array(
						"Two" => "2",
						"Three" => "3",
						"Four" => "4"
					),
					'save_always' => true,
					"description" => "",
					'std'   => '4',
					"group" => "Design",
				),
				array(
					"type" => "dropdown",
					'admin_label' => true,
					"heading" => "Order",
					"param_name" => "order",
					"value" => array(
						"DESC" => "DESC",			 
						"ASC" => "ASC"
					),
					'save_always' => true,
					"description" => "", 
					"group" => "Order",
				),
				array(
					"type" => "dropdown",
					'admin_label' => true,
					"heading" => "Order By",
					"param_name" => "order_by",
					"value" => array(
						"Title" => "title",
						"Date" => "date"
					),
					'save_always' => true,
					"description" => "",
					"group" => "Order",
					'std'   => 'date',
				),
				array(
					"type" => "dropdown",
					'admin_label' => true,
					"heading" => "Title Tag",
					"param_name" => "title_tag",
					"value" => array(
						""   => "",
						"h3" => "h3",
						"h4" => "h4",	
						"h5" => "h5",	
						"h6" => "h6",	
					),
					"description" => "",
					"group" => "Title Tag",
					'std'   => 'h4',
				),
				array(
					"type" => "dropdown",
					'admin_label' => true,
					"heading" => "Display Featured Image",
					"param_name" => "display_feature_image",
					"value" => array(
						"No" => "1",
						"Yes" => "2",
					),
					"description" => '',
					"group" => "On/Off",
					'std'   => '2',
				),
				array(
					"type" => "dropdown",
					'admin_label' => true,
					"heading" => "Display Content",
					"param_name" => "display_excerpt_read",
					"value" => array(
						"No" => "1",
						"Yes" => "2",
					),
					"description" => '',
					"group" => "On/Off",
					'std'   => '2',
				),
				array(
					"type" => "textfield",
					'admin_label' => true,
					"heading" => "Content Length",
					"param_name" => "content_limit",
					"description" => "Number of characters (Default:15)",
					"group" => "On/Off",
					"dependency" => Array('element' => "display_excerpt_read", 'value' => array('2')),
					"value" => "15",
				),
				array(
					"type" => "dropdown",
					'admin_label' => true,
					"heading" => "Display Continue Reading",
					"param_name" => "display_continue_read",
					"value" => array(
						"No" => "1",
						"Yes" => "2",
					),
					"description" => '',
					"group" => "On/Off",
					'std'   => '2',
				),
				array(
					"type" => "textfield",
					'admin_label' => true,
					"heading" => "Continue Reading Text",
					"param_name" => "continue_reading_txt",
					"value" => "Continue Reading",
					"group" => "On/Off",
					"dependency" => Array('element' => "display_continue_read", 'value' => array('2')),
				),
		)
		)
) );
}



/***************************************
***    ADD VC SC 30 :: VIDEO   ***
****************************************/
vc_map( array(
		"name" => esc_html__("Video", 'manual'), 
		"base" => "manual__video_popup",
		"category" => 'Manual',
		"allowed_container_element" => 'vc_row',
		"description" => esc_html__("play video", 'manual'), 
		"icon" => trailingslashit(get_template_directory_uri()) . "/img/vc_manual_video.png",
		"params" => array_merge(
			array(
				array(
					"type" => "textfield",
					'admin_label' => true,
					"heading" => esc_html__("Video URL", 'manual'),
					"param_name" => "video_url",
					"value" => "",
					"description" => "Example: https://www.youtube.com/watch?v=NS0txu_Kzl8"
				),
				array(
					"type" => "attach_image",
					'admin_label' => true,
					"heading" => esc_html__("Video Image", 'manual'), 
					"param_name" => "video_image"
				),
				array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => esc_html__("Video Title Tag", "manual"), 
					"param_name" => "title_tag",
					"value" => array(
						"h2" => "h2",
						"h3" => "h3",
						"h4" => "h4",
						"h5" => "h5",
						"h6" => "h6",
						"p" => "p",
					),
					"description" => "",
					'std'         => 'h5',
					"group" => "Title",
				),
				array(
					"type" => "textfield",
					'admin_label' => true,
					"heading" => esc_html__("Video Title", 'manual'),
					"param_name" => "title_name",
					"value" => "",
					"description" => "Will appear below video",
					"group" => "Title",
				),
				array(
					"type" => "colorpicker",
					"admin_label" => true,
					"heading" => "Text Color",
					"param_name" => "text_color",
					"description" => "",
					"group" => "Title",
				),
				array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => esc_html__('Text Align', "manual"), 
					"param_name" => "text_align",
					"value" => array(
						'Left' => 'left',
						'Center' => 'center',
						'Right' => 'right',
					),
					'std'   => 'center',
					"group" => "Title",
				 ),
				 array(
					"type" => "textfield",
					"heading" => "Title Text Padding",
					'admin_label' => true,
					"param_name" => "title_text_padding",
					"value" => "",
					"description" => "Default: 0px 0px 0px 0px (TOP, RIGHT, BOTTOM, LEFT)",
					"group" => "Title",
				 ),
				 array(
					"type" => "colorpicker",
					'admin_label' => true,
					"heading" => "Icon Color",
					"param_name" => "player_icon_color",
					"description" => "",
					"group" => "Play Icon Design",
				 ),
				 array(
					"type" => "textfield",
					'admin_label' => true,
					"heading" => esc_html__("Custom Play Icon", 'manual'),
					"param_name" => "custom_icon",
					"value" => "",
					"description" => "Enter <a href=\"https://fontawesome.com/icons?d=gallery&m=free\" target=\"_blank\">fontawesome</a> name (eg: fab fa-youtube)",
					"group" => "Play Icon Design",
				 ),
				 array(
					"type" => "textfield",
					'admin_label' => true,
					"heading" => esc_html__("Icon Size", 'manual'),
					"param_name" => "player_icon_font_size",
					"value" => "",
					"description" => "Default: 60px",
					"group" => "Play Icon Design",
				 ),
				 array(
					"type" => "textfield",
					'admin_label' => true,
					"heading" => esc_html__("Icon Margin", 'manual'),
					"param_name" => "player_icon_margin",
					"value" => "",
					"description" => "Default: -27px 0px 0px -23px (top, right, bottom, left)",
					"group" => "Play Icon Design",
				 ),
			)
		)
) );


?>