<?php
namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class manual__ajaxloaddocumentation extends Widget_Base { 
	
	public function get_script_depends() {
		 return [ 'manual-ejs' ];
	}
	
	public function get_name() {  
		return 'manual-ajaxloaddocumentation';
	}

	public function get_title() {
		return esc_html__( 'Documentation - Tree View Ajax Load Post', 'manual' );
	}

	public function get_icon() {
		return 'manual-elementor-icon ajaxloaddocumentation';
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

	protected function _register_controls() {
		$this->start_controls_section(
			'section_tabs',
			[
				'label' => __( 'General', 'manual' )
			]
		);
		$this->add_control(
			'important_note',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => __( 'FRIST: Please select the documentation category to view the result.', 'manual' ),
				'content_classes' => 'elementor-manual-block'
			]
		);
		$this->add_control(
			'vc_doc_ajaxload_off',
			[
				'label'   => esc_html__( 'Disable Ajax Load', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'true',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'post_type',
			[
				'label'   => esc_html__( 'Post Type', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"manual_documentation"	=> esc_html__( 'Documentation', 'manual' ),
				],
				'default' => 'manual_documentation',
			]
		);
		$this->add_control(
			'cat_id_posttype',
			[
				'label'   => esc_html__( 'Select Documentation Category', 'manual' ),
				'type'    => Controls_Manager::SELECT2,
				'options' => $this->manual__get_all_doc_categories(),
				'label_block' => true,
			]
		);
		$this->add_control(
			'posttype_treemenu_display_position',
			[
				'label'   => esc_html__( 'Tree Menu Position', 'manual' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'manual' ),
						'icon' => 'fa fa-align-left',
					],
					'right' => [
						'title' => __( 'Right', 'manual' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'left',
			]
		);
		$this->add_control(
			'rowlayout',
			[
				'label'   => esc_html__( 'Row Layout', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"2"	=> esc_html__( 'col-4 | col-8', 'manual' ),
					"1"	=> esc_html__( 'col-3 | col-9', 'manual' ),
					"3"	=> esc_html__( 'col-3 | col-6 | col-3 (with sidebar)', 'manual' ),
					"4"	=> esc_html__( 'col-2 | col-8 | col-2 (with sidebar)', 'manual' ),
				],
				'default' => '2',
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
			'posttype_records_display_order',
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
			'posttype_records_display_orderby',
			[
				'label'   => esc_html__( 'Order By', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"menu_order"  => esc_html__( 'Page Order', 'manual' ),
					"title"  => esc_html__( 'Order by Title', 'manual' ),
					"rand"  => esc_html__( 'Order by Random', 'manual' ),
					"date"  => esc_html__( 'Order By Date', 'manual' ),
					"modified"  => esc_html__( 'Order By Last Modified Date', 'manual' ),
				],
				'default' => 'date',
				'label_block' => true,
			]
		);
		$this->end_controls_section();
		
		
		/**********************
		*** SECTION - STYLE ***
		***********************/
		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Style', 'manual' )
			]
		);
		$this->add_control(
			'layout_style',
			[
				'label'   => esc_html__( 'Style', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"1"  => esc_html__( 'Default', 'manual' ),
					"2"  => esc_html__( 'Style 1', 'manual' ),
				],
				'default' => '1',
				'label_block' => true,
			]
		);
		$this->add_control(
			'content_bg_color',
			[
				'label' => esc_html__( 'Content Background Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#ffffff',
			]
		);
		$this->add_control(
			'adjust_sidebar_top_padding',
			[
				'label'   => esc_html__( 'Adjust Tree Menu on The Article Title Level', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'no',
				'default' => 'yes',
			]
		);
		$this->end_controls_section();
		
		/**********************
		*** SECTION - TEXT ***
		***********************/
		$this->start_controls_section(
			'section_tabs_text',
			[
				'label' => __( 'Text', 'manual' )
			]
		);
		$this->add_control(
			'expandalltext',
			[
				'label'       => __( 'Expand All Text', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Expand All',
			]
		);
		$this->add_control(
			'collapsealltext',
			[
				'label'       => __( 'Collapse All Text', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Collapse All',
			]
		);
		$this->end_controls_section();
	}
	
	protected function render() {
		$settings = $this->get_settings_for_display();
		$instance = array(
			"post_type"   => $settings['post_type'],
			"posttype_records_display_order" => $settings['posttype_records_display_order'],
			"posttype_records_display_orderby" => $settings['posttype_records_display_orderby'],
			"cat_id_posttype"   => $settings['cat_id_posttype'],
			"posttype_treemenu_display_position" => $settings['posttype_treemenu_display_position'],
			"expandalltext" => $settings['expandalltext'],
			"collapsealltext" => $settings['collapsealltext'],
			"rowlayout" => $settings['rowlayout'],
			"layout_style" => $settings['layout_style'],
			"content_bg_color" => $settings['content_bg_color'],
			"adjust_sidebar_top_padding" => $settings['adjust_sidebar_top_padding'],
			"vc_doc_ajaxload_off" => $settings['vc_doc_ajaxload_off'],
		);
		manual__get_widget_template( $this->get_base(), array( 'instance' => $instance ) );
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new manual__ajaxloaddocumentation() );