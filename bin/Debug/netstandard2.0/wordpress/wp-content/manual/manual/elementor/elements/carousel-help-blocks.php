<?php
namespace Elementor;
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'elementor/widget/widgets_registered', function() {
	require_once('widget.php');

	$drop_down_widget =	new Dropdown_Widget();

	// Let Elementor know about our widget
	Plugin::instance()->widgets_manager->register_widget_type( $drop_down_widget );
}); 

class manual__home_help_blocks extends Widget_Base { 

	public function get_script_depends() {
		 return [ 'manual-ejs' ];
	}
  
	public function get_name() {  
		return 'manual-home-help-block';
	}

	public function get_title() {
		return esc_html__( 'Carousel Help Blocks', 'manual' );
	}

	public function get_icon() {
		return 'manual-elementor-icon home-help-block';
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
				'label' => __( 'Blocks', 'manual' )
			]
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'title',
			[
				'label'       => esc_html__( 'Title', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Add your text here', 'manual' ),
				'label_block' => true,
				'default' => 'Add Your Heading Text',
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
		$repeater->add_control(
			'icon_name',
			[
				'label'       => __( 'Icon', 'manual' ),
				'type'        => Controls_Manager::ICONS,
				'default' => [
								'value' => 'far fa-clock',
								'library' => 'solid',
							],
			]
		);
		$repeater->add_control(
			'image',
			[
				'label' => esc_html__( 'Replace Icon With Image', 'manual' ),
				'type'  => Controls_Manager::MEDIA,
			]
		);
		$repeater->add_control(
			'link_text',
			[
				'label'       => __( 'Custom Link Text', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Click Here',
				'placeholder' => esc_html__( 'Add your text here', 'manual' ),
			]
		);
		$repeater->add_control(
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
		$repeater->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
			]
		);
		$repeater->add_control(
			'bg_color',
			[
				'label' => esc_html__( 'Background Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
			]
		);
		$repeater->add_control(
			'text_color',
			[
				'label' => esc_html__( 'Text Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
			]
		);
		$repeater->add_control(
			'link_color',
			[
				'label' => esc_html__( 'Link Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
			]
		);
		$this->add_control(
			'panel',
			[
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'title_field' => '{{{ title }}}',
				'separator'   => 'before'
			]
		);
		$this->end_controls_section();
	}
	
	protected function render() {
		$settings = $this->get_settings_for_display();
		$instance = array(
			'panel'  => $settings['panel'],
		);
		manual__get_widget_template( $this->get_base(), array( 'instance' => $instance ) );
	}
	
}

Plugin::instance()->widgets_manager->register_widget_type( new manual__home_help_blocks() );