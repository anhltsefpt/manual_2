<?php
namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class manual__faq_category extends Widget_Base { 

	public function get_name() {  
		return 'manual-faq-category';
	}

	public function get_title() {
		return esc_html__( 'Widget - FAQ Category', 'manual' );
	}

	public function get_icon() {
		return 'manual-elementor-icon faq_category';
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
			'faq_category_title',
			[
				'label'       => __( 'Title', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'FAQ Category',
			]
		);
		$this->add_control(
			'faq_category_show_post_count',
			[
				'label'   => esc_html__( 'Post Counts', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		$this->add_control(
			'count_text_color',
			[
				'label' => esc_html__( 'Count Text Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [ 'faq_category_show_post_count' => 'true', ],
			]
		);
		$this->add_control(
			'count_bg_color',
			[
				'label' => esc_html__( 'Count Background Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [ 'faq_category_show_post_count' => 'true', ],
			]
		);
		$this->end_controls_section();
	}
	
	protected function render() {
		$settings = $this->get_settings_for_display();
		$instance = array(
			"faq_category_title"  => $settings['faq_category_title'],
			"faq_category_show_post_count"  => $settings['faq_category_show_post_count'],
			"count_text_color"  => $settings['count_text_color'],
			"count_bg_color"  => $settings['count_bg_color'],
		);
		manual__get_widget_template( $this->get_base(), array( 'instance' => $instance ) );
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new manual__faq_category() );