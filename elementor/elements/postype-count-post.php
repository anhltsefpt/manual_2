<?php
namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class manual__postype_count_post extends Widget_Base { 

	public function get_name() {  
		return 'manual-postype-count-post';
	}

	public function get_title() {
		return esc_html__( 'Post Type - Records Count', 'manual' );
	}

	public function get_icon() {
		return 'manual-elementor-icon postype-count-post';
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
			'manual_post_type',
			[
				'label'   => esc_html__( 'Display Type', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"manual_kb"  => esc_html__( 'KnowledgeBase', 'manual' ),
					"manual_documentation"  => esc_html__( 'Documentation', 'manual' ),
					"manual_faq"  => esc_html__( 'FAQs', 'manual' ),
					"bbpress"  => esc_html__( 'Forum', 'manual' ),
					"post"  => esc_html__( 'Post', 'manual' ),
				],
				'default' => 'manual_kb',
			]
		);
		$this->add_control(
			'custom_post_type_name',
			[
				'label'       => __( 'Custom Post Type Name', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Custom Post Type Name', 'manual' ),
				'label_block' => true,
				'default' => '',
			]
		);
		$this->add_control(
			'custom_article_name',
			[
				'label'       => __( 'Custom Article Name', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Article Name', 'manual' ),
				'label_block' => true,
				'default' => 'Articles',
				'condition' => [ 'manual_post_type' => ['manual_kb','manual_documentation','manual_faq','post'] ],
			]
		);
		$this->add_control(
			'custom_category_name',
			[
				'label'       => __( 'Custom Categories Name', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Category Name', 'manual' ),
				'label_block' => true,
				'default' => 'Categories',
				'condition' => [ 'manual_post_type' => ['manual_kb','manual_documentation','manual_faq','post'] ],
			]
		);
		$this->add_control(
			'custom_bbpress_topic_name',
			[
				'label'       => __( 'Custom Topic Name', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Topic Name', 'manual' ),
				'label_block' => true,
				'default' => 'Topics',
				'condition' => [ 'manual_post_type' => ['bbpress'] ],
			]
		);
		$this->add_control(
			'custom_bbpress_posts_name',
			[
				'label'       => __( 'Custom Posts Name', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Posts Name', 'manual' ),
				'label_block' => true,
				'default' => 'Replies',
				'condition' => [ 'manual_post_type' => ['bbpress'] ],
			]
		);
		$this->add_control(
			'title_tag',
			[
				'label'   => esc_html__( 'Post Type Name HTML Tag', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"h3"  => esc_html__( 'H3', 'manual' ),
					"h4"  => esc_html__( 'H4', 'manual' ),
					"h5"  => esc_html__( 'H5', 'manual' ),
					"h6"  => esc_html__( 'H6', 'manual' ),
				],
				'default' => 'h4',
				'label_block' => true,
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
			'icon',
			[
				'label'       => __( 'Icon', 'manual' ),
				'type'        => Controls_Manager::ICONS,
				'default' => [
								'value' => 'fas fa-address-book',
								'library' => 'solid',
							],
			]
		);
		$this->add_control(
			'icon_size',
			[
				'label'       => __( 'Icon Size (px)', 'manual' ),
				'type'        => Controls_Manager::NUMBER,
				'min' => 8,
				'max' => 100,
				'step' => 1,
				'default' => 40,
			]
		);
		$this->end_controls_section();
		
		
		/**********************
		*** SECTION - STYLE ***
		***********************/
		$this->start_controls_section(
			'section_tabs_style',
			[
				'label' => __( 'Style', 'manual' )
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
			'box_padding',
			[
				'label'       => __( 'Box Padding', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( '0px 0px 0px 0px (TOP, RIGHT, BOTTOM, LEFT)', 'manual' ),
				'label_block' => true,
				'default' => __( '0px 0px 0px 0px', 'manual' ),
			]
		);
		$this->add_control(
			'box_bg_color',
			[
				'label' => esc_html__( 'Box Background Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
			]
		);
		$this->add_control(
			'box_css_animation',
			[
				'label'   => esc_html__( 'Box CSS Animation', 'manual' ),
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
		$this->add_control(
			'text_align',
			[
				'label'   => esc_html__( 'Text Align', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"1"  => esc_html__( 'Align text next to an icon', 'manual' ),
					"2"  => esc_html__( 'Left (everything left align)', 'manual' ),
					"3"  => esc_html__( 'Center', 'manual' ),
					"4"  => esc_html__( 'Right (everything right align)', 'manual' ),
				],
				'default' => '1',
				'label_block' => true,
			]
		);
		$this->add_control(
			'icon_margin_right',
			[
				'label'       => __( 'Icon Margin Right (px)', 'manual' ),
				'type'        => Controls_Manager::NUMBER,
				'min' => 8,
				'max' => 100,
				'step' => 1,
				'default' => 20,
				'condition' => [ 'text_align' => ['1'] ],
				"description" =>  esc_html__('Gap between icon and text', "manual"),
			]
		);
		$this->end_controls_section();
	}
	
	protected function render() {
		$settings = $this->get_settings_for_display();
		$instance = array(
			"manual_post_type"  => $settings['manual_post_type'],
			"title_tag"  => $settings['title_tag'],
			"link" => $settings['link'],
			"custom_article_name" => $settings['custom_article_name'],
			"custom_category_name" => $settings['custom_category_name'],
			"custom_post_type_name" => $settings['custom_post_type_name'],
			"custom_bbpress_topic_name" => $settings['custom_bbpress_topic_name'],
			"custom_bbpress_posts_name" => $settings['custom_bbpress_posts_name'],
			"icon" => $settings['icon'],
			"text_align" => $settings['text_align'],
			"icon_size" => $settings['icon_size'].'px',
			"icon_margin_right" => $settings['icon_margin_right'].'px',
			"icon_color" => $settings['icon_color'],
			"box_padding" => $settings['box_padding'],
			"box_bg_color" => $settings['box_bg_color'],
			"box_css_animation" => $settings['box_css_animation'],
			
		);
		manual__get_widget_template( $this->get_base(), array( 'instance' => $instance ) );
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new manual__postype_count_post() );