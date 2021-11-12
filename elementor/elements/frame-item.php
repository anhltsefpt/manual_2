<?php
namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class manual__frame_item extends Widget_Base { 

	public function get_name() {  
		return 'manual-web-frame';
	}

	public function get_title() {
		return esc_html__( 'Web Frame', 'manual' );
	}

	public function get_icon() {
		return 'manual-elementor-icon web-frame';
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
			'title',
			[
				'label'       => __( 'Title', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Title', 'manual' ),
				'label_block' => true,
				'default' => '',
			]
		);
		$this->add_control(
			'title_tag',
			[
				'label'   => esc_html__( 'Name HTML Tag', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"h3"  => esc_html__( 'h3', 'manual' ),
					"h4"  => esc_html__( 'h4', 'manual' ),
					"h5"  => esc_html__( 'h5', 'manual' ),
					"h6"  => esc_html__( 'h6', 'manual' ),
					"p"	  => esc_html__( 'p', 'manual' )
				],
				'default' => 'h5',
			]
		);
		$this->add_control(
			'text_padding',
			[
				'label'       => __( 'Text Padding (px)', 'manual' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'TOP/BOTTOM Padding', 'manual' ),
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'default' => '5',
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
		$this->add_control(
			'portfoio_image',
			[
				'label' => esc_html__( 'Image', 'manual' ),
				'type'  => Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'position',
			[
				'label'   => esc_html__( 'Image Position', 'manual' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'manual' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'manual' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'manual' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
			]
		);
		$this->add_control(
			'margin',
			[
				'label'       => __( 'Margin', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( '0px 0px 0px 0px', 'manual' ),
				'label_block' => true,
				'default' => '',
				"description" => esc_html__( '0px 0px 0px 0px (top, right, bottom, left)', 'manual' ),
			]
		);
		$this->add_control(
			'image_border_shadow',
			[
				'label'   => esc_html__( 'Apply Image Box Shadow', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'box_css_animation',
			[
				'label'   => esc_html__( 'Image Box CSS Animation', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					""    => esc_html__( 'Default', 'manual' ),
					"hvr-grow"	     => esc_html__( 'Grow', 'manual' ),
					"hvr-shrink" 	 => esc_html__( 'Shrink', 'manual' ),
					"hvr-pulse" 	 => esc_html__( 'Pulse', 'manual' ),
					"hvr-pulse-grow" 	=> esc_html__( 'Pulse Grow', 'manual' ),
					"hvr-pulse-shrink" 	=> esc_html__( 'Pulse Shrink', 'manual' ),
					"hvr-push" 	  => esc_html__( 'Push', 'manual' ),
					"hvr-pop" 	  => esc_html__( 'Pop', 'manual' ),
					"hvr-bounce-in"  => esc_html__( 'Bounce In', 'manual' ),
					"hvr-bounce-out" => esc_html__( 'Bounce Out', 'manual' ),
					"hvr-float" 	 => esc_html__( 'Float', 'manual' ),
					"hvr-wobble-horizontal" => esc_html__( 'Wobble Horizontal', 'manual' ),
					"hvr-wobble-vertical" 	=> esc_html__( 'Wobble Vertical', 'manual' ),
				],
				'default' => '',
			]
		);
		$this->end_controls_section();
	}
	
	protected function render() {
		$settings = $this->get_settings_for_display();
		$instance = array(
			"title"      => $settings['title'],
			"link"       => $settings['link'],
			"portfoio_image"  => $settings['portfoio_image']['id'],
			"image_border_shadow"  => $settings['image_border_shadow'],
			"box_css_animation"  => $settings['box_css_animation'],
			"position"  => $settings['position'],
			"margin"  => $settings['margin'],
			"title_tag"  => $settings['title_tag'],
			"text_padding"  => $settings['text_padding'].'px',
		);
		manual__get_widget_template( $this->get_base(), array( 'instance' => $instance ) );
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new manual__frame_item() );