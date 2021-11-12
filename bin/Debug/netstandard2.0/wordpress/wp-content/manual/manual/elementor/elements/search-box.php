<?php
namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class manual__search_box extends Widget_Base { 

	public function get_name() {  
		return 'manual-searchbox';
	}

	public function get_title() {
		return esc_html__( 'Search Box', 'manual' );
	}

	public function get_icon() {
		return 'manual-elementor-icon search-box';
	}

	public function get_categories() {
		return [ 'manual-elements' ];
	}

	public function get_base() {
		return basename( __FILE__, '.php' );
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_tabs',
			[
				'label' => __( 'Settings', 'manual' )
			]
		);
		$this->add_control(
			'standard_search',
			[
				'label'   => esc_html__( 'HIDE Theme Standard Search', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
				"description" =>  esc_html__('Theme Option Control Search Bar', "manual"), 
			]
		);
		$this->add_control(
			'placeholder_text',
			[
				'label'       => __( 'Placeholder Text', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter Search Text', 'manual' ),
				'label_block' => true,
				'default' => 'Search...',
				'condition' => [ 'standard_search' => 'yes' ],
			]
		);
		$this->end_controls_section();
	}
	
	protected function render() {
		$settings = $this->get_settings_for_display();
		$instance = array(
			"placeholder_text"  => $settings['placeholder_text'],
			"standard_search"  => $settings['standard_search'],
		);
		manual__get_widget_template( $this->get_base(), array( 'instance' => $instance ) );
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new manual__search_box() );