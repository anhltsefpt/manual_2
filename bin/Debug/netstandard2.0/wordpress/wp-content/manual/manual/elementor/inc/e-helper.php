<?php

namespace Elementor;

function manual__elementor_init() { 
	// Creating a new category
	Plugin::instance()->elements_manager->add_category(
		'manual-elements',
		[
			'title' => esc_html__( 'Manual', 'manual' ),
			//'icon'  => 'font'
		]
	);

}
add_action( 'elementor/init', 'Elementor\manual__elementor_init' );