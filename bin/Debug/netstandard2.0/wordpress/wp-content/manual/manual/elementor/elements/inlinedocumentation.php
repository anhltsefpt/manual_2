<?php
namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class manual__inlinedocumentation extends Widget_Base {
	
	public function get_script_depends() {
		 return [ 'manual-ejs' ];
	}

	public function get_name() {  
		return 'manual-inlinedocumentation';
	}

	public function get_title() {
		return esc_html__( 'Inline Documentation', 'manual' );
	}

	public function get_icon() {
		return 'manual-elementor-icon inlinedocumentation';
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
				'label' => __( 'General', 'manual' )
			]
		);
		$this->add_control(
			'important_note',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => __( 'Please select the category to view the result.', 'manual' ),
				'content_classes' => 'elementor-manual-block'
			]
		);
		$this->add_control(
			'post_type',
			[
				'label'   => esc_html__( 'Post Type', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"manual_documentation"	=> esc_html__( 'Documentation', 'manual' ),
					"manual_kb"	=> esc_html__( 'Knowledge Base', 'manual' ),
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
				'condition' => [ 'post_type' => 'manual_documentation', ],
			]
		);
		$this->add_control(
			'cat_id_posttype_kb',
			[
				'label'   => esc_html__( 'Select KnowledgeBase Category', 'manual' ),
				'type'    => Controls_Manager::SELECT2,
				'options' => $this->manual__get_all_kb_categories(),
				'label_block' => true,
				'condition' => [ 'post_type' => 'manual_kb', ],
			]
		);
		$this->add_control(
			'inlineodc_searchonoff',
			[
				'label'   => esc_html__( 'Search Box', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'on',
				'default' => 'on',
			]
		);
		$this->add_control(
			'inlinesearchboxtext',
			[
				'label'       => __( 'Expand All Text', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Search...',
				'condition' => [ 'inlineodc_searchonoff' => 'yes', ],
			]
		);
		$this->add_control(
			'posttype_inlinerec_display_position',
			[
				'label'   => esc_html__( 'Inline Menu Position', 'manual' ),
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
			'posttype_inlinerec_boxshadowand_padding',
			[
				'label'   => esc_html__( 'Content Box Shadow and Padding', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'no',
				'default' => 'no',
			]
		);
		$this->add_control(
			'adjust_sidebar_top_padding',
			[
				'label'   => esc_html__( 'Adjust Inline Menu on The Article Title Level', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'true',
				'default' => 'no',
			]
		);
		$this->add_control(
			'posttype_inlinerec_rowlayout',
			[
				'label'   => esc_html__( 'Layout', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"1"  => esc_html__( 'col-3 | col-9', 'manual' ),
					"2"  => esc_html__( 'col-4 | col-8', 'manual' ),
				],
				'default' => '2',
				'label_block' => true,
			]
		);
		$this->add_control(
			'posttype_inline_display_style',
			[
				'label'   => esc_html__( 'Inline Menu Style', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"1"  => esc_html__( 'Modern', 'manual' ),
					"2"  => esc_html__( 'Classic', 'manual' ),
				],
				'default' => '1',
				'label_block' => true,
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
			'posttype_inlinerec_display_order',
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
			'posttype_inlinerec_display_orderby',
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
	}
	
	protected function render() {
		$settings = $this->get_settings_for_display();
		$instance = array(
			"post_type"   => $settings['post_type'],
			"posttype_inlinerec_display_order" => $settings['posttype_inlinerec_display_order'],
			"posttype_inlinerec_display_orderby" => $settings['posttype_inlinerec_display_orderby'],
			"cat_id_posttype"   => $settings['cat_id_posttype'],
			"cat_id_posttype_kb" => $settings['cat_id_posttype_kb'],
			"posttype_inlinerec_display_position" => $settings['posttype_inlinerec_display_position'],
			"inlinesearchboxtext" => $settings['inlinesearchboxtext'],
			"inlineodc_searchonoff" => $settings['inlineodc_searchonoff'],
			"posttype_inlinerec_boxshadowand_padding" => $settings['posttype_inlinerec_boxshadowand_padding'],
			"posttype_inlinerec_rowlayout" => $settings['posttype_inlinerec_rowlayout'],
			"adjust_sidebar_top_padding" => $settings['adjust_sidebar_top_padding'],
			"posttype_inline_display_style" => $settings['posttype_inline_display_style'],
		);
		manual__get_widget_template( $this->get_base(), array( 'instance' => $instance ) );
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new manual__inlinedocumentation() );