<?php
namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class manual__kb_category extends Widget_Base { 

	public function get_name() {  
		return 'manual-kb-category';
	}

	public function get_title() {
		return esc_html__( 'Widget - KnowledgeBase Category', 'manual' );
	}

	public function get_icon() {
		return 'manual-elementor-icon kb-category';
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
			'kb_category_title',
			[
				'label'       => __( 'Title', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'KB Category',
			]
		);
		$this->add_control(
			'title_tag',
			[
				'label'   => esc_html__( 'Title HTML Tag', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"h3"  => esc_html__( 'h3', 'manual' ),
					"h4"  => esc_html__( 'h4', 'manual' ),
					"h5"  => esc_html__( 'h5', 'manual' ),
					"h6"  => esc_html__( 'h6', 'manual' ),
				],
				'default' => 'h5',
			]
		);
		$this->add_control(
			'kb_category_show_post_count',
			[
				'label'   => esc_html__( 'Show Post Counts', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
			'count_text_color',
			[
				'label' => esc_html__( 'Count Text Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [ 'kb_category_show_post_count' => 'yes', ],
			]
		);
		$this->add_control(
			'count_bg_color',
			[
				'label' => esc_html__( 'Count Background Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [ 'kb_category_show_post_count' => 'yes', ],
			]
		);
		$this->add_control(
			'kb_category_remove_border',
			[
				'label'   => esc_html__( 'Remove <li> Border', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
			'cat_fonticon_color',
			[
				'label' => esc_html__( 'Category Icon Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
			]
		);
		$this->end_controls_section();
	}
	
	protected function render() {
		$settings = $this->get_settings_for_display();
		$instance = array(
			"kb_category_title"            => $settings['kb_category_title'],
			"kb_category_show_post_count"  => $settings['kb_category_show_post_count'],
			"count_text_color"   => $settings['count_text_color'],
			"count_bg_color"     => $settings['count_bg_color'],
			"kb_category_remove_border"   => $settings['kb_category_remove_border'],
			"cat_fonticon_color"          => $settings['cat_fonticon_color'],
			"title_tag"                   => $settings['title_tag'],
		);
		manual__get_widget_template( $this->get_base(), array( 'instance' => $instance ) );
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new manual__kb_category() );