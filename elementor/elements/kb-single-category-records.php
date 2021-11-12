<?php
namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class manual__kb_single_cat_records extends Widget_Base { 
  
	public function get_name() {  
		return 'manual-kb-single-cat-records';
	}

	public function get_title() {
		return esc_html__( 'KnowledgeBase - Single Category Records', 'manual' );
	}

	public function get_icon() {
		return 'manual-elementor-icon kb-single-cat-records';
	}

	public function get_categories() {
		return [ 'manual-elements' ];
	}

	public function get_base() {
		return basename( __FILE__, '.php' );
	}
	
	function manual__get_all_kb_categories() {
		$kbcategories_array = array();
		$kbcategories_array[] = '';
		$categories = get_categories(array('taxonomy' => 'manualknowledgebasecat','parent' => 0,));
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
			'important_note',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => __( 'Please select the KnowledgeBase category to view the result.', 'manual' ),
				'content_classes' => 'elementor-manual-block'
			]
		);
		$this->add_control(
			'kbsinglecatid',
			[
				'label'   => esc_html__( 'Select KnowledgeBase Category', 'manual' ),
				'type'    => Controls_Manager::SELECT2,
				'options' => $this->manual__get_all_kb_categories(),
				'label_block' => true,
			]
		);
		$this->add_control(
			'page_per_post',
			[
				'label'       => __( 'No. Of Post Per Page', 'manual' ),
				'type'        => Controls_Manager::NUMBER,
				'default' => '-1',
				"description" =>  esc_html__('-1 or 0 == shows all articles', "manual"), 
				'min' => -1,
				'max' => 30,
				'step' => 1,
			]
		);
		$this->add_control(
			'include_child_post',
			[
				'label'   => esc_html__( 'Display all Child Category Records', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'no',
				'default' => 'yes',
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
				'default' => 'h4',
				'label_block' => true,
			]
		);
		$this->add_control(
			'hide_pagination',
			[
				'label'   => esc_html__( 'Pagination', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'no',
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
			'post_order',
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
			'post_orderby',
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
					"menu_order"  => esc_html__( 'Page Order', 'manual' ),
				],
				'default' => '',
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
			'kbcatrecords_type',
			[
				'label'   => esc_html__( 'Category Records - Style', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"1"	=> esc_html__( 'Style 1', 'manual' ),
					"2" 	=> esc_html__( 'Style 2', 'manual' ),
				],
				'default' => '1',
			]
		);
		$this->add_control(
			'quick_stats',
			[
				'label'   => esc_html__( 'Quick Stats', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'no',
				'default' => 'no',
				'condition' => [ 'kbcatrecords_type' => '1', ],
			]
		);
		$this->add_control(
			'style1_view_text',
			[
				'label'       => __( 'View - Text', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'views', 'manual' ),
				'label_block' => true,
				'default' => 'views', 
				'condition' => [ 'kbcatrecords_type' => '1', 'quick_stats' => 'no' ],
			]
		);
		$this->add_control(
			'style2_border_color',
			[
				'label' => esc_html__( 'Border Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#d4dadf',
			]
		);
		$this->add_control(
			'style2_boxbg_color',
			[
				'label' => esc_html__( 'Box Background Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#ffffff',
			]
		);
		$this->add_control(
			'style2_metabox_color',
			[
				'label' => esc_html__( 'Meta Text Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#727272',
			]
		);
		$this->add_control(
			'style_main_icon_color',
			[
				'label' => esc_html__( 'Main Icon Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [ 'kbcatrecords_type' => '1', ],
			]
		);
		$this->add_control(
			'style_icon_color',
			[
				'label' => esc_html__( 'Meta Icon Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [ 'kbcatrecords_type' => '1', ],
			]
		);
		$this->add_control(
			'style_textlink_color',
			[
				'label' => esc_html__( 'Text Link Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
			]
		);
		$this->add_control(
			'style_textlink_hover_color',
			[
				'label' => esc_html__( 'Text Link Hover Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
			]
		);
		$this->add_control(
			'style2_desc_words_text_color',
			[
				'label' => esc_html__( 'Description Word Text Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#333333',
				'condition' => [ 'kbcatrecords_type' => '2', ],
			]
		);
		$this->add_control(
			'style2_limit_desc_words',
			[
				'label'       => __( 'Limit Description Word', 'manual' ),
				'type'        => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 500,
				'step' => 1,
				'default' => '35',
				'condition' => [ 'kbcatrecords_type' => '2', ],
			]
		);
		$this->end_controls_section();
	}
	
	protected function render() {
		$settings = $this->get_settings_for_display();
		$instance = array(
			"kbcatrecords_type" => $settings['kbcatrecords_type'],				   
			"page_per_post"   => $settings['page_per_post'],
			"post_order"   => $settings['post_order'],
			"post_orderby" => $settings['post_orderby'],
			"include_child_post" => $settings['include_child_post'],
			"kbsinglecatid"   => $settings['kbsinglecatid'],
			"hide_pagination"   => $settings['hide_pagination'],
			"style2_border_color" => $settings['style2_border_color'],
			"style2_boxbg_color" => $settings['style2_boxbg_color'],
			"style2_metabox_color" => $settings['style2_metabox_color'],
			"style2_limit_desc_words" => $settings['style2_limit_desc_words'],
			"title_tag" => $settings['title_tag'],
			"quick_stats" => $settings['quick_stats'],
			"style1_view_text" => $settings['style1_view_text'],
			"style_icon_color" => $settings['style_icon_color'],
			"style_main_icon_color" => $settings['style_main_icon_color'],
			"style_textlink_color" => $settings['style_textlink_color'],
			"style_textlink_hover_color" => $settings['style_textlink_hover_color'],
			"style2_desc_words_text_color" => $settings['style2_desc_words_text_color'],
			"completely_hide_private_articles" => $settings['completely_hide_private_articles'],
		);
		manual__get_widget_template( $this->get_base(), array( 'instance' => $instance ) );
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new manual__kb_single_cat_records() );