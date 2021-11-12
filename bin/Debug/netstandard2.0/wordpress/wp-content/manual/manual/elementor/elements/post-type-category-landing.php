<?php
namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class manual__post_type_category_landing extends Widget_Base { 

	public function get_name() {  
		return 'manual-post-type-category-landing';
	}

	public function get_title() {
		return esc_html__( 'Post Type - Category Landing Style', 'manual' );
	}

	public function get_icon() {
		return 'manual-elementor-icon catlanding_post_type';
	}

	public function get_categories() {
		return [ 'manual-elements' ];
	}

	public function get_base() {
		return basename( __FILE__, '.php' );
	}
	
	function manual__get_all_doc_categories() {
		$doccategories_array = array();
		$categories = get_categories(array('taxonomy' => 'manualdocumentationcategory',));
		foreach( $categories as $category ) {
			$doccategories_array[$category->term_id] = $category->name;
		}
		return $doccategories_array;
    }
	
	function manual__get_all_kb_categories() {
		$kbcategories_array = array();
		$kbcategories_array[] = '';
		$categories = get_categories(array('taxonomy' => 'manualknowledgebasecat',));
		foreach( $categories as $category ) {
			$kbcategories_array[$category->term_id] = $category->name;
		}
		return $kbcategories_array;
    }

	protected function _register_controls() {
		$this->start_controls_section(
			'section_tabs',
			[
				'label' => __( 'Settings', 'manual' )
			]
		);
		$this->add_control(
			'manual_theme_post_type',
			[
				'label'   => esc_html__( 'Post Type', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"manual_documentation"	=> esc_html__( 'Documentation', 'manual' ),
					"manual_kb"	=> esc_html__( 'Knowledge Base', 'manual' ),
				],
				'default' => 'manual_kb',
			]
		);
		$this->add_control(
			'knowledgebase_style_type',
			[
				'label'   => esc_html__( 'Landing Style', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"1"	=> esc_html__( 'Style 1', 'manual' ),
					"2"	=> esc_html__( 'Style 2', 'manual' ),
				],
				'default' => '1',
			]
		);
		$this->add_control(
			'landing_style_type2_column',
			[
				'label'   => esc_html__( 'Columns', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"6"	=> esc_html__( '2 Columns', 'manual' ),
					"4"	=> esc_html__( '3 Columns', 'manual' ),
				],
				'default' => '6',
				'condition' => [ 'knowledgebase_style_type' => '2', ],
			]
		);
		$this->add_control(
			'box_height',
			[
				'label'       => __( 'Box Height', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'auto', 
				"description" => "Example: 254px -OR- you can use word: \"auto\" ",
				'condition' => [ 'knowledgebase_style_type' => '2' ],
			]
		);
		$this->add_control(
			'hr',
			[
				'type' => Controls_Manager::DIVIDER,
				'condition' => [ 'knowledgebase_style_type' => '2' ],
			]
		);
		$this->add_control(
			'kb_no_ofrecords',
			[
				'label'       => __( 'No. Of Category Records', 'manual' ),
				'type'        => Controls_Manager::NUMBER,
				'default' => '0',
				"description" =>  esc_html__('0 == all category records', "manual"), 
				'min' => 0,
				'max' => 30,
				'step' => 1,
			]
		);
		$this->add_control(
			'total_article_count_style',
			[
				'label'   => esc_html__( 'Total Article Count Style', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"1"	=> esc_html__( 'Style 1', 'manual' ),
					"2"	=> esc_html__( 'Style 2', 'manual' ),
				],
				'default' => '1',
				'condition' => [ 'total_article_count' => 'no', ],
			]
		);
		$this->add_control(
			'exclude_kb_category',
			[
				'label'   => esc_html__( 'Exclude Knowledge Base Category', 'manual' ),
				'type'    => Controls_Manager::SELECT2,
				'options' => $this->manual__get_all_kb_categories(),
				'label_block' => true,
				'multiple' => true,
				'condition' => [ 'manual_theme_post_type' => 'manual_kb', ],
			]
		);
		$this->add_control(
			'exclude_doc_category',
			[
				'label'   => esc_html__( 'Exclude Documentation Category', 'manual' ),
				'type'    => Controls_Manager::SELECT2,
				'options' => $this->manual__get_all_doc_categories(),
				'label_block' => true,
				'multiple' => true,
				'condition' => [ 'manual_theme_post_type' => 'manual_documentation', ],
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
			'knowledgebase_style_type_display_order',
			[
				'label'   => esc_html__( 'Order', 'manual' ),
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
			'knowledgebase_style_type_display_orderby',
			[
				'label'   => esc_html__( 'Order By', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"date"  => esc_html__( 'Date', 'manual' ),
					"modified"  => esc_html__( 'Last Modified Date', 'manual' ),
					"title"  => esc_html__( 'Title', 'manual' ),
					"rand"  => esc_html__( 'Random', 'manual' ),
					"menu_order"  => esc_html__( 'Page Order', 'manual' ),
					"comment_count"  => esc_html__( 'Number of Comments', 'manual' ),
				],
				'default' => 'date',
				'label_block' => true,
			]
		);
		$this->end_controls_section();
		
		
		/********************
		*** SECTION - TAG ***
		*********************/
		$this->start_controls_section(
			'section_tabs_tag',
			[
				'label' => __( 'Tag', 'manual' )
			]
		);
		$this->add_control(
			'title_tag',
			[
				'label'   => esc_html__( 'Title HTML Tag', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"h3"  => esc_html__( 'H3', 'manual' ),
					"h4"  => esc_html__( 'H4', 'manual' ),
					"h5"  => esc_html__( 'H5', 'manual' ),
					"h6"  => esc_html__( 'H6', 'manual' ),
				],
				'default' => 'h5',
				'label_block' => true,
			]
		);
		$this->end_controls_section();
		
		
		/********************
		*** SECTION - TAG ***
		*********************/
		$this->start_controls_section(
			'section_tabs_show_hide',
			[
				'label' => __( 'Show/Hide', 'manual' )
			]
		);
		$this->add_control(
			'total_article_count',
			[
				'label'   => esc_html__( 'Total Article Count Section', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'no',
				'default' => 'no',
				'condition' => [ 'knowledgebase_style_type' => ['1','2'] ],
			]
		);
		$this->add_control(
			'disable_description',
			[
				'label'   => esc_html__( 'Category Description', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'no',
				'default' => 'no',
				'condition' => [ 'knowledgebase_style_type' => ['1','2'] ],
			]
		);
		$this->add_control(
			'limit_description_char',
			[
				'label'       => __( 'Character Length', 'manual' ),
				'type'        => Controls_Manager::NUMBER,
				'default' => '100',
				'min' => 0,
				'max' => 500,
				'step' => 1,
				'condition' => [ 'disable_description' => 'no', ],
			]
		);
		$this->add_control(
			'private_cat_alert_msg',
			[
				'label'   => esc_html__( 'Private Category Message', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'no',
				'default' => 'no',
			]
		);
		$this->end_controls_section();
		
		
		/********************
		*** SECTION - TEXT ***
		*********************/
		$this->start_controls_section(
			'section_tabs_text',
			[
				'label' => __( 'Text', 'manual' )
			]
		);
		$this->add_control(
			'total_article_count_style1_text',
			[
				'label'       => __( 'Written By - Text', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Written by', 'manual' ),
				'label_block' => true,
				'default' => 'Written by', 
				'condition' => [ 'total_article_count_style' => '1', ],
			]
		);
		$this->add_control(
			'article_count_box_title',
			[
				'label'       => __( 'Articles In This Collection - Text', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'articles in this collection', 'manual' ),
				'label_block' => true,
				'default' => 'articles in this collection', 
				'condition' => [ 'total_article_count' => 'no', ],
			]
		);
		$this->add_control(
			'kb_private_categpry',
			[
				'label'       => __( 'Private Category - Text', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'articles in this collection', 'manual' ),
				'label_block' => true,
				'default' => 'Private Category', 
			]
		);
		$this->end_controls_section();
		
		
		/********************
		*** SECTION - COLOR ***
		*********************/
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
				'default' => '#ffffff',
				'condition' => [ 'knowledgebase_style_type' => ['1','2'] ],
			]
		);
		$this->add_control(
			'alternate_background_color',
			[
				'label' => esc_html__( 'Alternate Background Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'condition' => [ 'knowledgebase_style_type' => '2', ],
				"description" => "Will appear on even blocks",
			]
		);
		$this->add_control(
			'border_color',
			[
				'label' => esc_html__( 'Border Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#d4dadf',
				'condition' => [ 'knowledgebase_style_type' => ['1','2'] ],
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#818A97',
				'condition' => [ 'knowledgebase_style_type' => ['1','2'] ],
			]
		);
		$this->add_control(
			'kb_private_category_text_color',
			[
				'label' => esc_html__( 'Private Category Text Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#F13C2A',
			]
		);
		$this->add_control(
			'kb_writtenby_text_color',
			[
				'label' => esc_html__( 'Written By Text Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#8d8d8d',
			]
		);
		$this->end_controls_section();
		
		
		/***********************
		*** SECTION - DESIGN ***
		************************/
		$this->start_controls_section(
			'section_tabs_design',
			[
				'label' => __( 'Design', 'manual' )
			]
		);
		$this->add_control(
			'default_icon_code',
			[
				'label'       => __( 'Default Icon', 'manual' ),
				'type'        => Controls_Manager::ICONS,
				'default' => [
								'value' => 'icon_documents_alt',
								'library' => 'solid',
							],
			]
		);
		$this->add_control(
			'border_radius',
			[
				'label'       => __( 'Border Radius', 'manual' ),
				'type'        => Controls_Manager::NUMBER,
				'default' => '5',
				'min' => 0,
				'max' => 40,
				'step' => 1,
			]
		);
		$this->add_control(
			'box_padding',
			[
				'label'       => __( 'Box Padding', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				"description" => "Example: 25px 25px 25px 25px (TOP, RIGHT, BOTTOM, LEFT) ",
				'default' => '25px 25px 25px 25px', 
				'condition' => [ 'knowledgebase_style_type' => '2' ],
			]
		);
		$this->add_control(
			'text_box_align',
			[
				'label'   => esc_html__( 'Text Align', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"1"	=> esc_html__( 'Align text next to an icon', 'manual' ),
					"2" 	=> esc_html__( 'Left (everything left align)', 'manual' ),
					"3"	=> esc_html__( 'Center', 'manual' ),
				],
				'default' => '1',
				'condition' => [ 'knowledgebase_style_type' => '2' ],
			]
		);
		$this->add_control(
			'icon_size',
			[
				'label'       => __( 'Icon Size (px)', 'manual' ),
				'type'        => Controls_Manager::NUMBER,
				'default' => '55',
				'min' => 0,
				'max' => 100,
				'step' => 1,
			]
		);
		$this->end_controls_section();
	}
	
	protected function render() {
		$settings = $this->get_settings_for_display();
		$instance = array(
			"manual_theme_post_type" =>  $settings['manual_theme_post_type'],						   
			"knowledgebase_style_type" =>  $settings['knowledgebase_style_type'],
			"knowledgebase_style_type_display_order" =>  $settings['knowledgebase_style_type_display_order'],
			"knowledgebase_style_type_display_orderby" =>  $settings['knowledgebase_style_type_display_orderby'],
			"title_tag" =>  $settings['title_tag'],
			"total_article_count" =>  $settings['total_article_count'],
			"border_color" =>  $settings['border_color'],
			"article_count_box_title" =>  $settings['article_count_box_title'],
			"icon_color" =>  $settings['icon_color'],
			"kb_private_categpry" =>  $settings['kb_private_categpry'],
			"kb_private_category_text_color" =>  $settings['kb_private_category_text_color'],
			"exclude_kb_category" =>  $settings['exclude_kb_category'],
			"exclude_doc_category" =>  $settings['exclude_doc_category'],
			"kb_no_ofrecords" =>  $settings['kb_no_ofrecords'],
			"disable_description" =>  $settings['disable_description'],
			"icon_size" =>  $settings['icon_size'].'px',
			"default_icon_code" =>  $settings['default_icon_code'],
			"limit_description_char" =>  $settings['limit_description_char'],
			"background_color" =>  $settings['background_color'],
			"border_radius" =>  $settings['border_radius'].'px',
			"total_article_count_style" =>  $settings['total_article_count_style'],
			"total_article_count_style1_text" =>  $settings['total_article_count_style1_text'],
			"kb_writtenby_text_color" =>  $settings['kb_writtenby_text_color'],
			"landing_style_type2_column" =>  $settings['landing_style_type2_column'],
			"box_height" =>  $settings['box_height'],
			"text_box_align" =>  $settings['text_box_align'],
			'box_padding' =>  $settings['box_padding'],
			'alternate_background_color' =>  $settings['alternate_background_color'],
			'private_cat_alert_msg' =>  $settings['private_cat_alert_msg'],
		);
		manual__get_widget_template( $this->get_base(), array( 'instance' => $instance ) );
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new manual__post_type_category_landing() );