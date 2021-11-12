<?php
namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class manual__pricing_table extends Widget_Base {  

	public function get_name() {  
		return 'manual-pricing-table';
	}

	public function get_title() {
		return esc_html__( 'Pricing Table', 'manual' );
	}

	public function get_icon() {
		return 'manual-elementor-icon pricing-table';
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
				'label_block' => true,
				'default' => 'Enter your title',
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
			'price',
			[
				'label'       => __( 'Price', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => '49',
			]
		);
		$this->add_control(
			'currency',
			[
				'label'       => __( 'Currency', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => '$',
			]
		);
		$this->add_control(
			'price_period',
			[
				'label'       => __( 'Price Period', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => '/MO',
			]
		);
		$this->add_control(
			'active',
			[
				'label'   => esc_html__( 'Make Box Standout', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
			'standout_box_bg_color',
			[
				'label' => esc_html__( 'Standout Box Background Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [ 'active' => 'yes', ],
			]
		);
		$this->end_controls_section();
		
		/*************************
		*** SECTION - FEATURES ***
		**************************/
		$this->start_controls_section(
			'section_tabs_features',
			[
				'label' => __( 'Features', 'manual' )
			]
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'item_text',
			[
				'label'       => esc_html__( 'Text', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __( 'List Item #1', 'manual' ),
			]
		);
		$this->add_control(
			'panel',
			[
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'title_field' => '{{{ item_text }}}',
			]
		);
		$this->end_controls_section();
		
		/*********************************
		*** SECTION - CONTENT SETTINGS ***
		**********************************/
		$this->start_controls_section(
			'section_tabs_button',
			[
				'label' => __( 'Button Settings', 'manual' )
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
			'link',
			[
				'label'       => __( 'Button Link URL', 'manual' ),
				'type'        => Controls_Manager::URL,
				'default' => [
					'url' => '',
					'is_external' => false,
					'nofollow' => false,
				],
			]
		);
		$this->end_controls_section();
		
		/***********************
		*** SECTION - COLOR ***
		***********************/
		$this->start_controls_section(
			'section_tabs_color',
			[
				'label' => __( 'Color', 'manual' )
			]
		);
		$this->add_control(
			'background_color',
			[
				'label' => esc_html__( 'Background Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
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
			'box_border_color',
			[
				'label' => esc_html__( 'Box Border Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
			]
		);
		$this->end_controls_section();
	}
	
	protected function render() {
		$settings = $this->get_settings_for_display();
		$instance = array(
			"title"        => $settings['title'],
			"price"        => $settings['price'],
			"currency"     => $settings['currency'],
			"price_period" => $settings['price_period'],
			"link"         => $settings['link'],
			"active"       => $settings['active'],
			"background_color"  => $settings['background_color'],
			"box_border_color"  => $settings['box_border_color'],
			"text_color"  => $settings['text_color'],
			"title_tag"  => $settings['title_tag'],
			"standout_box_bg_color"  => $settings['standout_box_bg_color'],
			"panel"  => $settings['panel'],
			"button_text"  => $settings['button_text'],
		);
		manual__get_widget_template( $this->get_base(), array( 'instance' => $instance ) );
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new manual__pricing_table() );