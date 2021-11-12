<?php
namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class manual__kb_tree_view extends Widget_Base { 

	public function get_script_depends() {
		 return [ 'manual-ejs' ];
	}

	public function get_name() {  
		return 'manual-kb-tree-view';
	}

	public function get_title() {
		return esc_html__( 'KnowledgeBase - Tree View', 'manual' );
	}

	public function get_icon() {
		return 'manual-elementor-icon kb-tree-view';
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
			'kb_no_of_category_records',
			[
				'label'       => __( 'No. Of Category Records', 'manual' ),
				'type'        => Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 30,
				'step' => 1,
				'default' => '0',
				"description" => "0 == all category records",
			]
		);
		$this->add_control(
			'title_tag',
			[
				'label'   => esc_html__( 'Text HTML Tag', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"h3"  => esc_html__( 'h3', 'manual' ),
					"h4"  => esc_html__( 'h4', 'manual' ),
					"h5"  => esc_html__( 'h5', 'manual' ),
					"h6"  => esc_html__( 'h6', 'manual' ),
				],
				'default' => 'h6',
			]
		);
		$this->end_controls_section();
		
		/**************************
		*** SECTION - SHOW/HIDE ***
		***************************/
		$this->start_controls_section(
			'section_tabs_show_hide',
			[
				'label' => __( 'Show/Hide', 'manual' )
			]
		);
		$this->add_control(
			'completely_hide_private_articles',
			[
				'label'   => esc_html__( 'Hide Private Articles', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'no',
				'description'   => esc_html__('Visible to only respective users', 'manual' ),
			]
		);
		$this->end_controls_section();
		
		
		/**********************
		*** SECTION - ORDER ***
		***********************/
		$this->start_controls_section(
			'section_tabs_order',
			[
				'label' => __( 'Order', 'manual' )
			]
		);
		$this->add_control(
			'knowledgebase_category_display_order',
			[
				'label'   => esc_html__( 'Category Order', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"ASC"  => esc_html__( 'Ascending', 'manual' ),
					"DESC"  => esc_html__( 'Descending', 'manual' ),
				],
				'default' => 'DESC',
				'label_block' => true,
			]
		);
		$this->add_control(
			'knowledgebase_category_display_orderby',
			[
				'label'   => esc_html__( 'Category Order By', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"none" => esc_html__( 'None', 'manual' ),
					"description"  => esc_html__( 'Order By Description', 'manual' ),
					"count"  => esc_html__( 'Number Of Records Count', 'manual' ),
					"slug"  => esc_html__( 'Slug Name', 'manual' ),
					"name"  => esc_html__( 'Name', 'manual' ),
				],
				'default' => 'name',
				'label_block' => true,
			]
		);
		$this->add_control(
			'knowledgebase_records_display_order',
			[
				'label'   => esc_html__( "Records Under Category Display Order", 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"ASC"  => esc_html__( 'Ascending', 'manual' ),
					"DESC"  => esc_html__( 'Descending', 'manual' ),
				],
				'default' => 'DESC',
				'label_block' => true,
			]
		);
		$this->add_control(
			'knowledgebase_records_display_orderby',
			[
				'label'   => esc_html__( 'Records Under Category Display Order By', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"date" => esc_html__( 'Date', 'manual' ),
					"modified"  => esc_html__( 'Last Modified Date', 'manual' ),
					"title"  => esc_html__( 'Title', 'manual' ),
					"rand"  => esc_html__( 'Random', 'manual' ),
					"menu_order"  => esc_html__( 'Page Order', 'manual' ),
					"comment_count"  => esc_html__( 'Number of Comments', 'manual' ),
				],
				'default' => 'name',
				'label_block' => true,
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
			'kb_private_category',
			[
				'label'       => __( 'Private Category - Text', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter Text', 'manual' ),
				'label_block' => true,
				'default' => 'Private Records',
			]
		);
		$this->add_control(
			'root_tag_li_padding',
			[
				'label'       => __( 'Root tag &lt;li&gt; padding', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( '0px 0px 0px 0px (top, left, buttom, right)', 'manual' ),
				'label_block' => true,
				'default' => '3px 10px 3px 10px',
				"description" => "Default: 3px 10px 3px 10px (top, left, buttom, right)",
			]
		);
		$this->add_control(
			'root_tag_color',
			[
				'label' => esc_html__( 'Root tag &lt;li&gt; Background Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#f7f7f7',
			]
		);
		$this->add_control(
			'root_tag_border_bottom_color',
			[
				'label' => esc_html__( 'Root tag &lt;li&gt; Border Buttom Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#f7f7f7',
			]
		);
		$this->add_control(
			'border_radius',
			[
				'label'       => __( 'Border Radius', 'manual' ),
				'type'        => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 50,
				'step' => 1,
				'default' => '5',
			]
		);
		$this->end_controls_section();
	}
	
	protected function render() {
		$settings = $this->get_settings_for_display();
		$instance = array(
			"title_tag"   => $settings['title_tag'],
			"root_tag_li_padding" => $settings['root_tag_li_padding'],
			"root_tag_color" => $settings['root_tag_color'],
			"root_tag_border_bottom_color" => $settings['root_tag_border_bottom_color'],
			"kb_no_of_category_records" => $settings['kb_no_of_category_records'],
			"knowledgebase_category_display_order" => $settings['knowledgebase_category_display_order'],
			"knowledgebase_category_display_orderby" => $settings['knowledgebase_category_display_orderby'],
			"kb_private_category" => $settings['kb_private_category'],
			"knowledgebase_records_display_order" => $settings['knowledgebase_records_display_order'],
			"knowledgebase_records_display_orderby" => $settings['knowledgebase_records_display_orderby'],
			"border_radius" => $settings['border_radius'].'px',
			"completely_hide_private_articles" => $settings['completely_hide_private_articles'],
		);
		manual__get_widget_template( $this->get_base(), array( 'instance' => $instance ) );
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new manual__kb_tree_view() );