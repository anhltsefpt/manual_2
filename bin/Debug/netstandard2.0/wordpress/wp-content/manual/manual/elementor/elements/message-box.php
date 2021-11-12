<?php
namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class manual__message_box extends Widget_Base { 

	public function get_name() {  
		return 'manual-message-box';
	}

	public function get_title() {
		return esc_html__( 'Messange Box', 'manual' );
	}

	public function get_icon() {
		return 'manual-elementor-icon messange-box';
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
			'title_text',
			[
				'label'       => __( 'Title Text', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Add Your Heading Text Here',
			]
		);
		$this->add_control(
			'short_message_text',
			[
				'label'       => __( 'Short Message Text', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.',
			]
		);
		$this->add_control(
			'button_text',
			[
				'label'       => __( 'Button Text', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Click Here',
			]
		);
		$this->add_control(
			'message_box_border',
			[
				'label'   => esc_html__( 'Box Border', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'message_box_background_color',
			[
				'label' => esc_html__( 'Background Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
			]
		);
		$this->add_control(
			'message_box_border_color',
			[
				'label' => esc_html__( 'Border Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [ 'message_box_border' => 'yes', ],
			]
		);
		$this->add_control(
			'title_text_color',
			[
				'label' => esc_html__( 'Title Text Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
			]
		);
		$this->add_control(
			'short_message_text_color',
			[
				'label' => esc_html__( 'Short Message Text Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
			]
		);
		$this->add_control(
			'button_text_color',
			[
				'label' => esc_html__( 'Button Text Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
			]
		);
		$this->add_control(
			'button_bg_color',
			[
				'label' => esc_html__( 'Button Background Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
			]
		);
		$this->add_control(
			'title_tag',
			[
				'label'   => esc_html__( 'Title HTML Tag', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"h2"  => esc_html__( 'H2', 'manual' ),
					"h3"  => esc_html__( 'H3', 'manual' ),
					"h4"  => esc_html__( 'H4', 'manual' ),
					"h5"  => esc_html__( 'H5', 'manual' ),
					"h6"  => esc_html__( 'H6', 'manual' ),
				],
				'default' => 'h5',
				'label_block' => true,
			]
		);
		$this->add_control(
			'link',
			[
				'label'       => __( 'Button URL', 'manual' ),
				'type'        => Controls_Manager::URL,
				'default' => [
					'url' => '',
					'is_external' => false,
					'nofollow' => false,
				],
			]
		);
		$this->add_control(
			'button_margin_top',
			[
				'label'       => __( 'Button Margin Top (px)', 'manual' ),
				'type'        => Controls_Manager::NUMBER,
				'default' => '-63',
				'min' => -300,
				'max' => 300,
				'step' => 1,
			]
		);
		$this->end_controls_section();
		
		
		/**********************
		*** SECTION - ORDER ***
		***********************/
		$this->start_controls_section(
			'section_tabs_font_control',
			[
				'label' => __( 'Font Control', 'manual' )
			]
		);
		$this->add_control(
			'title_text_font_size',
			[
				'label'       => __( 'Title Font Size (px)', 'manual' ),
				'type'        => Controls_Manager::NUMBER,
				'default' => '',
				'min' => 8,
				'max' => 70,
				'step' => 1,
			]
		);
		$this->add_control(
			'title_text_weight',
			[
				'label'   => esc_html__( 'Title Text Weight', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					""	=> esc_html__( 'Default', 'manual' ),
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
				'default' => ''
			]
		);
		$this->add_control(
			'short_message_text_font_size',
			[
				'label'       => __( 'Short Message Font Size (px)', 'manual' ),
				'type'        => Controls_Manager::NUMBER,
				'default' => '',
				'min' => 8,
				'max' => 70,
				'step' => 1,
			]
		);
		$this->add_control(
			'short_message_text_weight',
			[
				'label'   => esc_html__( 'Short Message Text Weight', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					""	=> esc_html__( 'Default', 'manual' ),
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
				'default' => ''
			]
		);
		$this->end_controls_section();
	}
	
	protected function render() {
		$settings = $this->get_settings_for_display();
		$instance = array(
			"message_box_border"    => $settings['message_box_border'],
			"message_box_background_color"    => $settings['message_box_background_color'],
			"message_box_border_color"    => $settings['message_box_border_color'],
			"title_text"    => $settings['title_text'],
			"title_text_color"  => $settings['title_text_color'],
			"title_text_weight" => $settings['title_text_weight'],
			"title_text_font_size" => $settings['title_text_font_size'].'px',
			"short_message_text"  => $settings['short_message_text'],
			"short_message_text_color"  => $settings['short_message_text_color'],
			"short_message_text_weight"  => $settings['short_message_text_weight'],
			"short_message_text_font_size"  => $settings['short_message_text_font_size'].'px',
			"link" => $settings['link'],
			"button_text_color" => $settings['button_text_color'],
			"button_bg_color" => $settings['button_bg_color'],
			"button_margin_top" => $settings['button_margin_top'].'px',
			"title_tag" =>  $settings['title_tag'],
			"button_text" => $settings['button_text'],
		);
		manual__get_widget_template( $this->get_base(), array( 'instance' => $instance ) );
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new manual__message_box() );