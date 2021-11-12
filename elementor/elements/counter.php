<?php
namespace Elementor;

use Elementor\Widget_Base;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class manual__counter_number extends Widget_Base { 

	public function get_script_depends() {
		 return [ 'manual-ejs' ];
	}
  
	public function get_name() {  
		return 'manual-counter';
	}

	public function get_title() {
		return esc_html__( 'Counter', 'manual' );
	}

	public function get_icon() {
		return 'manual-elementor-icon counter';
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
				'label' => __( 'Counter Settings', 'manual' )
			]
		);
		
		$this->add_control(
			'position',
			[
				'label'   => esc_html__( 'Position', 'manual' ),
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
			'digit',
			[
				'label'       => __( 'Counter Number', 'manual' ),
				'type'        => Controls_Manager::NUMBER,
				'placeholder' => esc_html__( 'Counter Number', 'manual' ),
				'min' => 1,
				'max' => 10000,
				'step' => 1,
				'default' => '200',
			]
		);
		$this->add_control(
			'font_weight',
			[
				'label'   => esc_html__( 'Counter Weight', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"100"	=> esc_html__( 'Thin 100', 'manual' ),
					"200" 	=> esc_html__( 'Extra-Light 200', 'manual' ),
					"300"	=> esc_html__( 'Light 300', 'manual' ),
					"400"	=> esc_html__( 'Regular 400', 'manual' ),
					"500"	=> esc_html__( 'Medium 500', 'manual' ),
					"600"	=> esc_html__( 'Semi-Bold 600', 'manual' ),
					"700"	=> esc_html__( 'Bold 700', 'manual' ),
					"800"	=> esc_html__( 'Extra-Bold 800', 'manual' ),
					"900"	=> esc_html__( 'Ultra-Bold 900', 'manual' )
				],
				'default' => '700',
			]
		);
		$this->add_control(
			'font_color',
			[
				'label' => esc_html__( 'Counter Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#222222',
			]
		);
		$this->end_controls_section();
		
		
		/*********************
		*** SECTION - TEXT ***
		**********************/
		$this->start_controls_section(
			'section_tabs_text',
			[
				'label' => __( 'Text', 'manual' )
			]
		);
		$this->add_control(
			'text',
			[
				'label'       => __( 'Text', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Counter Title Text', 'manual' ),
				'label_block' => true,
				'default' => 'Happy Customers',
			]
		);
		$this->add_control(
			'text_tag',
			[
				'label'   => esc_html__( 'Text HTML Tag', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"h4"  => esc_html__( 'h4', 'manual' ),
					"h5"  => esc_html__( 'h5', 'manual' ),
					"h6"  => esc_html__( 'h6', 'manual' ),
					"p"	  => esc_html__( 'p', 'manual' )
				],
				'default' => 'p',
			]
		);
		$this->add_control(
			'text_font_weight',
			[
				'label'   => esc_html__( 'Text Weight', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"100"	=> esc_html__( 'Thin 100', 'manual' ),
					"200" 	=> esc_html__( 'Extra-Light 200', 'manual' ),
					"300"	=> esc_html__( 'Light 300', 'manual' ),
					"400"	=> esc_html__( 'Regular 400', 'manual' ),
					"500"	=> esc_html__( 'Medium 500', 'manual' ),
					"600"	=> esc_html__( 'Semi-Bold 600', 'manual' ),
					"700"	=> esc_html__( 'Bold 700', 'manual' ),
					"800"	=> esc_html__( 'Extra-Bold 800', 'manual' ),
					"900"	=> esc_html__( 'Ultra-Bold 900', 'manual' )
				],
				'default' => '500'
			]
		);
		$this->add_control(
			'text_transform',
			[
				'label'   => esc_html__( 'Text Transform', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"capitalize"  => esc_html__( 'capitalize', 'manual' ),
					"uppercase"	  => esc_html__( 'uppercase', 'manual' ),
					"lowercase"	  => esc_html__( 'lowercase', 'manual' )
				],
				'default' => 'uppercase',
			]
		);
		$this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'Text Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#222222',
			]
		);
		$this->end_controls_section();
		
		
		/*************************
		*** SECTION - SEPRATOR ***
		**************************/
		$this->start_controls_section(
			'section_tabs_seprator',
			[
				'label' => __( 'Seprator', 'manual' )
			]
		);
		$this->add_control(
			'separator',
			[
				'label'   => esc_html__( 'Separator', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'separator_color',
			[
				'label' => esc_html__( 'Separator Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#222222',
				'condition' => [ 'separator' => 'yes', ],
			]
		);
		
	$this->end_controls_section();
	}
	
	protected function render() {
		$settings = $this->get_settings_for_display();
		$instance = array(
			"position"         => $settings['position'],
			"digit"            => $settings['digit'],
			"font_weight"      => $settings['font_weight'],
			"font_color"       => $settings['font_color'],
			"text"             => $settings['text'],
			"text_transform"   => $settings['text_transform'],
			"text_color"       => $settings['text_color'],
			"text_font_weight" => $settings['text_font_weight'],
			"separator"        => $settings['separator'],
			"separator_color"  => $settings['separator_color'],
			"text_tag"  => $settings['text_tag'],
		);
		manual__get_widget_template( $this->get_base(), array( 'instance' => $instance ) );
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new manual__counter_number() );