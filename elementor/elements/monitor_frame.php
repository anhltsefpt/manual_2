<?php
namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class manual__monitor_frame extends Widget_Base { 

	public function get_name() {  
		return 'monitor-frame';
	}

	public function get_title() {
		return esc_html__( 'Monitor Frame', 'manual' );
	}

	public function get_icon() {
		return 'manual-elementor-icon monitor_frame';
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
			'portfoio_image',
			[
				'label' => esc_html__( 'Image', 'manual' ),
				'type'  => Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'link',
			[
				'label'       => __( 'Link URL', 'manual' ),
				'type'        => Controls_Manager::URL,
				'default' => [
					'url' => '',
					'is_external' => false,
					'nofollow' => false,
				],
			]
		);
		$this->end_controls_section();
		
		
		/**********************************
		*** SECTION - SOCIAL ICON COLOR ***
		***********************************/
		$this->start_controls_section(
			'section_tabs_text',
			[
				'label' => __( 'Text', 'manual' )
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => '',
			]
		);
		$this->add_control(
			'title_tag',
			[
				'label'   => esc_html__( 'Text HTML Tag', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"h4"  => esc_html__( 'h4', 'manual' ),
					"h5"  => esc_html__( 'h5', 'manual' ),
					"h6"  => esc_html__( 'h6', 'manual' ),
					"p"	  => esc_html__( 'p', 'manual' )
				],
				'default' => 'h5',
			]
		);
		$this->add_control(
			'bg_color',
			[
				'label' => esc_html__( 'Text Holder Background Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#ffffff',
			]
		);
		$this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'Text Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
			]
		);
		$this->add_control(
			'text_hover_color',
			[
				'label' => esc_html__( 'Text Hover Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
			]
		);
		$this->end_controls_section();
	}
	
	protected function render() {
		$settings = $this->get_settings_for_display();
		$instance = array(
			"title"      =>  $settings['title'],
			"link"       =>  $settings['link'],
			"portfoio_image"  =>  $settings['portfoio_image'],
			"title_tag" =>  $settings['title_tag'],
			"bg_color" =>  $settings['bg_color'],
			"text_color" =>  $settings['text_color'],
			"text_hover_color" =>  $settings['text_hover_color'],
		);
		manual__get_widget_template( $this->get_base(), array( 'instance' => $instance ) );
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new manual__monitor_frame() );