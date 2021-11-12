<?php
namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class manual__service_table extends Widget_Base {  

	public function get_name() {  
		return 'manual-service-table';
	}

	public function get_title() {
		return esc_html__( 'Service Table', 'manual' );
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
			'link_text',
			[
				'label'       => __( 'Link Text', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Learn More',
			]
		);
		$this->add_control(
			'iconimage',
			[
				'label'       => __( 'Icon', 'manual' ),
				'type'        => Controls_Manager::ICONS,
				'default' => [
								'value' => '',
								'library' => 'solid',
							],
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
			]
		);
		$this->add_control(
			'description',
			[
				'label'       => __( 'Description', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Enter your description',
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
			'description_text_color',
			[
				'label' => esc_html__( 'Description Text Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
			]
		);
		$this->add_control(
			'box_font_color',
			[
				'label' => esc_html__( 'Title Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
			]
		);
		$this->add_control(
			'link_text_color',
			[
				'label' => esc_html__( 'Link Text Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
			]
		);
		$this->add_control(
			'background_color',
			[
				'label' => esc_html__( 'Box Background Color', 'manual' ),
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
	}
	
	protected function render() {
		$settings = $this->get_settings_for_display();
		$instance = array(
			"title"         => $settings['title'],
			"iconimage"     => $settings['iconimage'],
			"description"   => $settings['description'],
			"link"          => $settings['link'],
			"background_color"  => $settings['background_color'],
			"box_border_color"  => $settings['box_border_color'],
			"link_text_color"  => $settings['link_text_color'],
			"box_font_color"  => $settings['box_font_color'],
			"icon_color"  => $settings['icon_color'],
			"description_text_color"  => $settings['description_text_color'],
			"panel"  => $settings['panel'],
			"link_text"  => $settings['link_text'],
		);
		manual__get_widget_template( $this->get_base(), array( 'instance' => $instance ) );
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new manual__service_table() );