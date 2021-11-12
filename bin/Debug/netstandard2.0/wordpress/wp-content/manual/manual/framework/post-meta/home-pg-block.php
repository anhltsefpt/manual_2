<?php
/************************
***** HOME HELP BLOCK *******
*************************/
add_filter( 'cmb2_admin_init', 'manual_home_page_metaboxes' );
function manual_home_page_metaboxes() {

	$prefix = '_manual_';
	
	$cmb = new_cmb2_box( array(
        'id'            => 'homeblock_meta',
        'title'         => esc_html__( 'Home Page Help Options', 'manual' ),
        'object_types'  => array( 'manual_hp_block', ), 
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
		'closed'     => false,
    ) );
	$cmb->add_field( array(
		'name' => esc_html__('Block Icon Name', 'manual' ),
		'desc' => __('Enter <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">fontawesome</a> name (eg: fa fa-file-o) -OR- <br>Enter <a href="https://www.elegantthemes.com/blog/resources/elegant-icon-font" target="_blank">elegant icon font</a> name -OR- <br>Enter <a href="http://demo.wpsmartapps.com/themes/manual/et-line-font/" target="_blank">et line font</a> name', 'manual' ),
		'id'   => $prefix . 'hpblock_icon',
		'type' => 'text',
	) );
	$cmb->add_field( array(
		'name'    => esc_html__('Block Icon Color', 'manual' ),
		'id'      => $prefix .'hpblock_icon_color',
		'type'    => 'colorpicker',
		'default' => '',
	) );
	$cmb->add_field( array( 
		'name'    => esc_html__('Custom Icon', 'manual' ),
		'desc'    => esc_html__('Upload an image or enter an URL.', 'manual' ),
		'id'      => $prefix .'hpblock_custom_icon',
		'type'    => 'file',
		'options' => array(
			'url' => true, 
		),
		'text'    => array(
			'add_upload_file_text' =>  esc_html__('Upload Image Icon' , 'manual' ),
		),
		'preview_size' => 'medium', 
	) );
	$cmb->add_field( array(
		'name' => esc_html__('Block Text','manual' ),
		'id'   => $prefix . 'hpblock_text',
		'desc' => esc_html__('Text below the block heading (optional)', 'manual' ),
		'type' => 'wysiwyg',
		'options' => array(	'textarea_rows' => 5, ),
	) );
	$cmb->add_field( array(
		'name' => esc_html__('Link URL','manual' ),
		'id'   => $prefix . 'hpblock_link',
		'desc' => esc_html__('Link the block (optional)','manual' ),
		'type' => 'text_medium',
	) );
	$cmb->add_field( array(
		'name' => esc_html__('Link Text','manual' ),
		'id'   => $prefix . 'hpblock_link_text',
		'desc' => esc_html__('Will replace Browse ...','manual' ),
		'type' => 'text_medium',
	) );
	$cmb->add_field( array(
		'name'    => esc_html__('Block background Color','manual' ),
		'id'      => $prefix .'hpblock_bg_color',
		'type'    => 'colorpicker',
		'default' => '',
	) );
	$cmb->add_field( array(
		'name'    => esc_html__('Block Text Color','manual' ),
		'id'      => $prefix .'hpblock_text_color',
		'type'    => 'colorpicker',
		'default' => '',
	) );
	$cmb->add_field( array(
		'name'    => esc_html__('Link Color','manual' ),
		'id'      => $prefix .'hpblock_link_color',
		'type'    => 'colorpicker',
		'default' => '',
	) );
}

/************************
***** HOME ORG BLOCKS *******
*************************/
add_filter( 'cmb2_admin_init', 'manual_home_org_page_metaboxes' );
function manual_home_org_page_metaboxes() {

	$prefix = '_manual_';
	
	$cmb = new_cmb2_box( array(
        'id'            => 'home_org_block_meta',
        'title'         => esc_html__( 'Organization Blocks', 'manual' ),
        'object_types'  => array( 'manual_org_block', ), 
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
		'closed'     => false,
    ) );
	$cmb->add_field( array(
		'name' => esc_html__('Block Icon Name','manual' ),
		'desc' => __('Enter <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">fontawesome</a> name (eg: fa fa-file-o) -OR- <br>Enter <a href="https://www.elegantthemes.com/blog/resources/elegant-icon-font" target="_blank">elegant icon font</a> name -OR- <br>Enter <a href="http://demo.wpsmartapps.com/themes/manual/et-line-font/" target="_blank">et line font</a> name', 'manual' ),
		'id'   => $prefix . 'hpblock_icon',
		'type' => 'text',
	) );
	$cmb->add_field( array( 
		'name'    => esc_html__('Custom Icon','manual' ),
		'desc'    => esc_html__('Upload an image or enter an URL.','manual' ),
		'id'      => $prefix .'hpblock_custom_icon',
		'type'    => 'file',
		'options' => array(
			'url' => true, 
		),
		'text'    => array(
			'add_upload_file_text' =>  esc_html__('Upload Image Icon' ,'manual' ),
		),
		'preview_size' => 'medium', 
	) );
	$cmb->add_field( array(
		'name' => esc_html__('Block Text','manual' ),
		'id'   => $prefix . 'hpblock_text',
		'desc' => esc_html__('Text below the block heading (optional)','manual' ),
		'type' => 'wysiwyg',
		'options' => array(	'textarea_rows' => 5, ),
	) );
}

/************************
***** TESTIMONIAL *******
*************************/
add_filter( 'cmb2_admin_init', 'manual_home_testimonial_metaboxes' );
function manual_home_testimonial_metaboxes() {

	$prefix = '_manual_';
	$cmb = new_cmb2_box( array(
        'id'            => 'home_testimonial_meta',
        'title'         => esc_html__( 'Testimonial', 'manual' ),
        'object_types'  => array( 'manual_tmal_block', ), 
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
		'closed'     => false,
    ) );
	$cmb->add_field( array(
		'name' =>  esc_html__('Person Name','manual' ),
		'id'   => $prefix . 'hpblock_name',
		'type' => 'text',
	) );
	$cmb->add_field( array(
		'name' => esc_html__('Message','manual' ),
		'id'   => $prefix . 'hpblock_text',
		'desc' => esc_html__('The text below the block heading (optional)','manual' ),
		'type' => 'wysiwyg',
		'options' => array(	'textarea_rows' => 5, ),
	) );
}

?>