<?php
namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class manual__team_memeber extends Widget_Base { 

	public function get_name() {  
		return 'manual-team';
	}

	public function get_title() {
		return esc_html__( 'Team', 'manual' );
	}

	public function get_icon() {
		return 'manual-elementor-icon team';
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
				'label' => __( 'Team', 'manual' )
			]
		);
		$this->add_control(
			'team_name',
			[
				'label'       => __( 'Name', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Team Member Name', 'manual' ),
				'label_block' => true,
				'default' => 'Team Member Name',
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
			'name_color',
			[
				'label' => esc_html__( 'Name Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
			]
		);
		$this->add_control(
			'team_position',
			[
				'label'       => __( 'User Position', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Sr. Officer', 'manual' ),
				'label_block' => true,
				'default' => 'Sr. Officer',
			]
		);
		$this->add_control(
			'position_color',
			[
				'label' => esc_html__( 'Position Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
			]
		);
		$this->end_controls_section();
		
		
		/**********************************
		*** SECTION - SOCIAL ICON COLOR ***
		***********************************/
		$this->start_controls_section(
			'section_tabs_image',
			[
				'label' => __( 'Image', 'manual' )
			]
		);
		$this->add_control(
			'team_image',
			[
				'label' => esc_html__( 'Image', 'manual' ),
				'type'  => Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'image_hover_effect',
			[
				'label'   => esc_html__( 'Image Hover Effect', 'manual' ),
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
		
		
		/**********************************
		*** SECTION - SOCIAL ICON COLOR ***
		***********************************/
		$this->start_controls_section(
			'section_tabs_social_icon_color_settings',
			[
				'label' => __( 'Social Icon Color Settings', 'manual' )
			]
		);
		$this->add_control(
			'show_separator',
			[
				'label'   => esc_html__( 'Show Separator', 'manual' ),
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
				'default' => '',
				'condition' => [ 'show_separator' => 'yes', ],
			]
		);
		$this->add_control(
			'icons_color',
			[
				'label' => esc_html__( 'Social Icons Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
			]
		);
		$this->add_control(
			'icons_color_hover',
			[
				'label' => esc_html__( 'Social Icons Hover Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
			]
		);
		$this->end_controls_section();
		
		
		/*************************
		*** SECTION - SOCIAL 1 ***
		**************************/
		$this->start_controls_section(
			'section_tabs_social_one',
			[
				'label' => __( 'Social 1', 'manual' )
			]
		);
		$this->add_control(
			'team_social_icon_1',
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
			'team_social_icon_1_link',
			[
				'label'       => __( 'Link URL', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'default' => '',
			]
		);
		$this->add_control(
			'team_social_icon_1_target',
			[
				'label'   => esc_html__( 'Link Target', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'_self' => esc_html__( 'Self', 'manual' ),
					'_blank' => esc_html__( 'Blank', 'manual' ),
					'_parent' => esc_html__( 'Parent', 'manual' ),
				],
				'default' => '_self',
			]
		);
		$this->end_controls_section();
		
		
		/*************************
		*** SECTION - SOCIAL 2 ***
		**************************/
		$this->start_controls_section(
			'section_tabs_social_two',
			[
				'label' => __( 'Social 2', 'manual' )
			]
		);
		$this->add_control(
			'team_social_icon_2',
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
			'team_social_icon_2_link',
			[
				'label'       => __( 'Link URL', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'default' => '',
			]
		);
		$this->add_control(
			'team_social_icon_2_target',
			[
				'label'   => esc_html__( 'Link Target', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'_self' => esc_html__( 'Self', 'manual' ),
					'_blank' => esc_html__( 'Blank', 'manual' ),
					'_parent' => esc_html__( 'Parent', 'manual' ),
				],
				'default' => '_self',
			]
		);
		$this->end_controls_section();
		
		
		/*************************
		*** SECTION - SOCIAL 3 ***
		**************************/
		$this->start_controls_section(
			'section_tabs_social_three',
			[
				'label' => __( 'Social 3', 'manual' )
			]
		);
		$this->add_control(
			'team_social_icon_3',
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
			'team_social_icon_3_link',
			[
				'label'       => __( 'Link URL', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'default' => '',
			]
		);
		$this->add_control(
			'team_social_icon_3_target',
			[
				'label'   => esc_html__( 'Link Target', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'_self' => esc_html__( 'Self', 'manual' ),
					'_blank' => esc_html__( 'Blank', 'manual' ),
					'_parent' => esc_html__( 'Parent', 'manual' ),
				],
				'default' => '_self',
			]
		);
		$this->end_controls_section();
		
		
		/*************************
		*** SECTION - SOCIAL 4 ***
		**************************/
		$this->start_controls_section(
			'section_tabs_social_four',
			[
				'label' => __( 'Social 4', 'manual' )
			]
		);
		$this->add_control(
			'team_social_icon_4',
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
			'team_social_icon_4_link',
			[
				'label'       => __( 'Link URL', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'default' => '',
			]
		);
		$this->add_control(
			'team_social_icon_4_target',
			[
				'label'   => esc_html__( 'Link Target', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'_self' => esc_html__( 'Self', 'manual' ),
					'_blank' => esc_html__( 'Blank', 'manual' ),
					'_parent' => esc_html__( 'Parent', 'manual' ),
				],
				'default' => '_self',
			]
		);
		$this->end_controls_section();
	}
	
	protected function render() {
		$settings = $this->get_settings_for_display();
		$instance = array(
			"team_image"       => $settings['team_image']['id'],
			"image_hover_effect" => $settings['image_hover_effect'],
			"team_name"        => $settings['team_name'],
			"name_title_tag"   => $settings['name_title_tag'],
			"name_color"       => $settings['name_color'],
			"team_position"    => $settings['team_position'],
			"position_color"   => $settings['position_color'],
			"show_separator"   => $settings['show_separator'],
			"separator_color"  => $settings['separator_color'],
			"icons_color"      => $settings['icons_color'],
			"icons_color_hover" => $settings['icons_color_hover'],
			// social - 1
			"team_social_icon_1"         => $settings['team_social_icon_1'],
			"team_social_icon_1_link"    => $settings['team_social_icon_1_link'],
			"team_social_icon_1_target"  => $settings['team_social_icon_1_target'],
			// social - 2
			"team_social_icon_2"         => $settings['team_social_icon_2'],
			"team_social_icon_2_link"    => $settings['team_social_icon_2_link'],
			"team_social_icon_2_target"  => $settings['team_social_icon_2_target'],
			// social - 3
			"team_social_icon_3"         => $settings['team_social_icon_3'],
			"team_social_icon_3_link"    => $settings['team_social_icon_3_link'],
			"team_social_icon_3_target"  => $settings['team_social_icon_3_target'],
			// social - 4
			"team_social_icon_4"         => $settings['team_social_icon_4'],
			"team_social_icon_4_link"    => $settings['team_social_icon_4_link'],
			"team_social_icon_4_target"  => $settings['team_social_icon_4_target'],
		);
		manual__get_widget_template( $this->get_base(), array( 'instance' => $instance ) );
	}

}
Plugin::instance()->widgets_manager->register_widget_type( new manual__team_memeber() );