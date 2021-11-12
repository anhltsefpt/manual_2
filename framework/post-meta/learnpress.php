<?php
/*-----------------------------------------------------------------------------------*/
/*	PAGE TITLE BAR
/*-----------------------------------------------------------------------------------*/
add_filter( 'cmb2_admin_init', 'manual_learnpress_metaboxes_header_control' );
function manual_learnpress_metaboxes_header_control() {
	
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_manual_';
	
	$cmb = new_cmb2_box( array(
        'id'            => 'learnpress_background_control_options',
        'title'         => esc_html__( 'Header Control', 'manual' ),
        'object_types'  => array( 'lp_course'), 
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
		'closed'     => true,
    ) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Apply No Header Image', 'manual' ),
		'desc' => esc_html__( 'On checked, no any header image will be visiable on the single record i.e. theme global header will be applied.', 'manual' ),
		'id'   => $prefix .'learnpress_no_header_image',
		'type' => 'checkbox'
	) );
	
	$cmb->add_field( array(
		'name'    => esc_html__( 'Header Image', 'manual' ), 
		'id'      => $prefix .'learnpress_header_image',
		'desc' => esc_html__( 'If upload image, feature image will be replaced.', 'manual' ),
		'type'    => 'file',
		'options' => array(
			'url' => true,
			'add_upload_file_text' => 'Add Or Upload File' 
		),
	) );
	
	$cmb->add_field( array(
		'name'             => esc_html__( 'Upload Image Header Position', 'manual' ),
		'id'               => $prefix .'learnpress_background_img_display_position',
		'type'             => 'select',
		'default'          => 'center center',
		'options'          => array(
			'center top'      => esc_html__( 'Center Top', 'manual' ),
			'center center'   => esc_html__( 'Center Center', 'manual' ),
			'center bottom'   => esc_html__( 'Center Bottom', 'manual' ),
			),
	) );
	
}
?>