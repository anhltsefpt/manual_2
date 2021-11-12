<?php
namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class manual__testimonials extends Widget_Base { 
	
	public function get_script_depends() {
		 return [ 'manual-ejs' ];
	}
	
	public function get_name() {  
		return 'manual-testimonials';
	}

	public function get_title() {
		return esc_html__( 'Testimonials', 'manual' );
	}

	public function get_icon() {
		return 'manual-elementor-icon testimonials';
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
				'label' => __( 'Testimonial', 'manual' )
			]
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'panel_title',
			[
				'label'       => esc_html__( 'Person Name', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Add your text here', 'manual' ),
				'label_block' => true,
				'default' => 'Person Name',
			]
		);
		$repeater->add_control(
			'panel_body',
			[
				'label'       => esc_html__( 'Message', 'manual' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Add your text here', 'manual' ),
				'label_block' => true,
				'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.',
			]
		);
		$this->add_control(
			'panel',
			[
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'title_field' => '{{{ panel_title }}}',
				'separator'   => 'before'
			]
		);
		$this->end_controls_section();
		
		
		/*********************************
		*** SECTION - CONTENT SETTINGS ***
		**********************************/
		$this->start_controls_section(
			'section_tabs_content_settings',
			[
				'label' => __( 'Content Settings', 'manual' )
			]
		);
		$this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'Content Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
			]
		);
		$this->add_control(
			'custom_font_size',
			[
				'label'       => __( 'Font Size (px)', 'manual' ),
				'type'        => Controls_Manager::NUMBER,
				'min' => 8,
				'max' => 100,
				'step' => 1,
				'default' => 22,
			]
		);
		$this->add_control(
			'custom_line_height',
			[
				'label'       => __( 'Line Height (px)', 'manual' ),
				'type'        => Controls_Manager::NUMBER,
				'min' => 8,
				'max' => 100,
				'step' => 1,
				'default' => 30, 
			]
		);
		$this->end_controls_section();
		
		
		/******************************
		*** SECTION - NAME SETTINGS ***
		*******************************/
		$this->start_controls_section(
			'section_tabs_name_settings',
			[
				'label' => __( 'Name Text Settings', 'manual' )
			]
		);
		$this->add_control(
			'name_title_tag',
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
				'default' => 'h4',
			]
		);
		$this->add_control(
			'author_text_color',
			[
				'label' => esc_html__( 'Name Text Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
			]
		);
		$this->end_controls_section();
	}
	
	protected function render() {
		$settings = $this->get_settings_for_display();
		$instance = array(
			"text_color"              => $settings['text_color'],
			"name_title_tag"          => $settings['name_title_tag'],
			"author_text_color"       => $settings['author_text_color'],
			"custom_font_size"        => $settings['custom_font_size'].'px',
			"custom_line_height"      => $settings['custom_line_height'].'px',
			'panel'                   => $settings['panel'],
		);
		manual__get_widget_template( $this->get_base(), array( 'instance' => $instance ) );
	}

}
Plugin::instance()->widgets_manager->register_widget_type( new manual__testimonials() );