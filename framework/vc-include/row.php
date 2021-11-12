<?php

/*******
	CUSTOM VC ROW
********/

if (function_exists('vc_remove_param')) {
	vc_remove_param('vc_row', 'full_width');            // Row stretch
	vc_remove_param('vc_row', 'gap');                   // Columns gap
	vc_remove_param('vc_row', 'full_height');           // Full height row
	vc_remove_param('vc_row', 'content_placement');     // Content position
	vc_remove_param('vc_row', 'video_bg');              // Use video background?
	vc_remove_param('vc_row', 'video_bg_url');          // YouTube link :: Support video_bg
	vc_remove_param('vc_row', 'columns_placement');     // Columns position
	vc_remove_param('vc_row', 'rtl_reverse');           // rtl reverse
	//remove vc parallax functionality
    vc_remove_param('vc_row', 'parallax');              // Parallax
    vc_remove_param('vc_row', 'parallax_image');        // Parallax Image Bg
    vc_remove_param('vc_row', 'parallax_speed_bg');     // Parallax Speed Control
	vc_remove_param('vc_row', 'video_bg_parallax');     // Parallax Video
	vc_remove_param('vc_row', 'parallax_speed_video');  // Parallax speed :: Support Parallax
}

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"show_settings_on_create" => true,
	"heading" => esc_html__('Content Display Type', 'manual'),
	"param_name" => "row_content_display",
	"description" => "<span style=\"color:red\">NOTE:</span> Content Display will <strong>auto switch to, Type: In Grid</strong> if selected, <strong>Row Type == Parallax</strong> AND Apply <strong>Background Opacity == YES</strong>",
	"value" => array(
	    "In Grid" => "in_grid",
		"Full Width" => "full_width",
	),
	'save_always' => true
));


vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"show_settings_on_create" => true,
	"heading" => esc_html__('Text Align', 'manual'),
	"param_name" => "row_content_display_align",
	"description" => "",
	"value" => array(
	    "Left" => "left",
		"Center" => "center",
		"Right" => "right",
	),
	'save_always' => true
));


/*** 1. Add New "Row Type" Features ***/
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"show_settings_on_create"=>true,
	"heading" => esc_html__('Row Type', 'manual'),
	"param_name" => "row_type",
	"value" => array(
		"Row" => "row",
		"Parallax" => "parallax",
	),
	'save_always' => true
));

/*** 1.1 Support Type "Row" ***/

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"show_settings_on_create"=>true,
	"heading" => esc_html__('Row Stretch Background', 'manual'), 
	"param_name" => "stretch_row_type",
	"value" => array(
		"Yes" => "yes",
		"No" => "no",
	),
	'save_always' => true,
	"description" => "", 
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));

	vc_add_param("vc_row", array(
		"type" => "colorpicker",
		"class" => "",
		"heading" =>  esc_html__('Background Color', 'manual'),
		"param_name" => "background_color",
		"value" => "",
		"description" => "",
		"dependency" => Array('element' => "stretch_row_type", 'value' => array('yes','no'))
	));
	
	vc_add_param("vc_row", array(
		"type" => "colorpicker",
		"class" => "",
		"heading" =>  esc_html__('Linear gradient color', 'manual'),
		"param_name" => "background_linear_gradient_color_stretch",
		"value" => "",
		"description" => "",
		"dependency" => Array('element' => "stretch_row_type", 'value' => array('yes','no'))
	));
	
	vc_add_param("vc_row", array(
		"type" => "attach_image",
		"class" => "",
		"heading" => esc_html__('Background Image', 'manual'),
		"param_name" => "background_replace_color_by_image",
		"value" => "",
		"description" => "Background color will be replace by image attached",
		"dependency" => Array('element' => "stretch_row_type", 'value' => array('yes','no'))
	));
	
	vc_add_param("vc_row", array(
		"type" => "dropdown",
		"class" => "",
		"heading" => esc_html__('Background Image Position', 'manual'), 
		"value" => "",
		"param_name" => "normal_background_image_position",
		"description" => "",
		"value" => array(
			"center center" => "center center",
			"center top" => "center top",
			"center bottom" => "center bottom",
		),
		"dependency" => Array('element' => "stretch_row_type", 'value' => array('yes','no'))
	));
	
	vc_add_param("vc_row", array(
		"type" => "dropdown",
		"class" => "",
		"heading" => esc_html__('Background Image Size', 'manual'), 
		"value" => "",
		"param_name" => "normal_background_image_size",
		"description" => esc_html__('Carefully select above option because your row background is under "background-repeat:repeat;"', 'manual'), 
		"value" => array(
			"auto" => "auto",
			"contain" => "contain",
			"cover" => "cover",
			"inherit" => "inherit",
		),
		"dependency" => Array('element' => "stretch_row_type", 'value' => array('yes','no')),
		'std'   => 'cover',
	));
	
	vc_add_param("vc_row", array(
		"type" => "checkbox",
		"class" => "",
		"heading" =>  esc_html__('Apply Background Opacity', 'manual'),
		"param_name" => "background_replace_img_opacity",
		"value" => "",
		"description" => "Only works if background image attached",
		"dependency" => Array('element' => "stretch_row_type", 'value' => array('yes'))
	));
	
	vc_add_param("vc_row", array(
		"type" => "colorpicker",
		"class" => "",
		"heading" =>  esc_html__('Background Opacity Color', 'manual'),
		"param_name" => "background_opacity_color",
		"value" => "rgba(55, 56, 53, 0.49)",
	    "description" => "<span style=\"color:red\">ALERT:</span> If using Background Opacity Color <strong style=\"color:red\">DO NOT SET ANY: \"padding\"</strong> values using <strong>above TAB </strong>\"Design Options\" from CSS box ",
		"dependency" => Array('element' => "background_replace_img_opacity", 'value' => array('true'))
	));
	

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => esc_html__('Row video background', 'manual'), 
	"value" => array(
		"No" => "",
		"Yes" => "show_video"
	),
	"param_name" => "video",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));

	vc_add_param("vc_row", array(
		"type" => "textfield",
		"class" => "",
		"heading" => esc_html__('Video background (webm) file url', 'manual'), 
		"value" => "",
		"param_name" => "video_webm",
		"description" => "",
		"dependency" => Array('element' => "video", 'value' => array('show_video'))
	));
	
	vc_add_param("vc_row", array(
		"type" => "textfield",
		"class" => "",
		"heading" =>  esc_html__('Video background (mp4) file url', 'manual'),  
		"value" => "",
		"param_name" => "video_mp4",
		"description" => "",
		"dependency" => Array('element' => "video", 'value' => array('show_video'))
	));
	
	vc_add_param("vc_row", array(
		"type" => "textfield",
		"class" => "",
		"heading" =>  esc_html__('Video background (ogv) file url', 'manual'),  
		"value" => "",
		"param_name" => "video_ogv",
		"description" => "",
		"dependency" => Array('element' => "video", 'value' => array('show_video'))
	));
	
	vc_add_param("vc_row", array(
		"type" => "attach_image",
		"class" => "",
		"heading" =>  esc_html__('Video preview image', 'manual'),
		"value" => "",
		"param_name" => "video_image",
		"description" => "",
		"dependency" => Array('element' => "video", 'value' => array('show_video'))
	));
	
	
/*** 1.2 Support Type "Parallax" ***/	

vc_add_param("vc_row", array(
	"type" => "attach_image",
	"class" => "",
	"heading" => esc_html__('Background image', 'manual'), 
	"value" => "",
	"param_name" => "background_image",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('parallax'))
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => esc_html__('Background Image Position', 'manual'), 
	"value" => "",
	"param_name" => "plx_background_image_position",
	"description" => "",
	"value" => array(
		"center center" => "center center",
		"center top" => "center top",
		"center bottom" => "center bottom",
	),
	"dependency" => Array('element' => "row_type", 'value' => array('parallax')),
));

vc_add_param("vc_row", array(
	"type" => "checkbox",
	"class" => "",
	"heading" =>  esc_html__('Apply Background Opacity', 'manual'),
	"param_name" => "plx_background_opacity",
	"value" => "",
	"description" => "Only works if background image attached",
	"dependency" => Array('element' => "row_type", 'value' => array('parallax'))
));
	
	vc_add_param("vc_row", array(
		"type" => "colorpicker",
		"class" => "",
		"heading" =>  esc_html__('Background Opacity Color', 'manual'),
		"param_name" => "plx_background_opacity_color",
		"value" => "rgba(55, 56, 53, 0.49)",
		"description" => "<span style=\"color:red\">ALERT:</span> If using Background Opacity Color <strong style=\"color:red\">DO NOT SET ANY: \"padding\"</strong> values using <strong>above TAB </strong>\"Design Options\" from CSS box ",
		"dependency" => Array('element' => "plx_background_opacity", 'value' => array('true'))
	));

?>