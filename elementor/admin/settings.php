<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/****************************
*** PAGE SETTINGS CONTROL ***
*****************************/
/*function manual__elementor_page_settings_controls( Elementor\Core\DocumentTypes\Page $page ) {
	$post_type = get_post_type();
	if ($post_type == 'page' ) {
		$page->add_control(
			'_manual_header_hide_header_bar',
			[
				'label' => __( 'Hide Page Title Bar', 'manual' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'return_value' => 'off',
				'default' => 'on',
			]
		);
	}
}
add_action( 'elementor/element/wp-page/document_settings/before_section_end', 'manual__elementor_page_settings_controls');*/