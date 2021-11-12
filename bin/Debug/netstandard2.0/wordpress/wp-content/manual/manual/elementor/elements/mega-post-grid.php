<?php
namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class manual__mega_post_grid extends Widget_Base { 

	public function get_script_depends() {
		 return [ 'manual-ejs' ];
	}

	public function get_name() {  
		return 'manual-mega-post-grid';
	}

	public function get_title() {
		return esc_html__( 'Mega Post Grid', 'manual' );
	}

	public function get_icon() {
		return 'manual-elementor-icon mega-post-grid';
	}

	public function get_categories() {
		return [ 'manual-elements' ];
	}

	public function get_base() {
		return basename( __FILE__, '.php' );
	}
	
	function manual__get_all_post_categories() {
		$postcategories_array = array();
		$post_categories = get_categories();
		foreach( $post_categories as $category ) {
			$postcategories_array[$category->term_id] = $category->name;
		}
		return $postcategories_array;
    }
	
	function manual__get_all_doc_categories() {
		$doccategories_array = array();
		$categories = get_categories(array('taxonomy' => 'manualdocumentationcategory','parent' => 0,));
		foreach( $categories as $category ) {
			$doccategories_array[$category->term_id] = $category->name;
		}
		return $doccategories_array;
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
	
	function manual__get_all_faq_categories() {
		$faq_array = array();
		$faq_array[] = '';
		$categories = get_categories(array('taxonomy' => 'manualfaqcategory','parent' => 0,));
		foreach( $categories as $category ) {
			$faq_array[$category->term_id] = $category->name;
		}
		return $faq_array;
    }

	protected function _register_controls() {
		$this->start_controls_section(
			'section_tabs',
			[
				'label' => __( 'Settings', 'manual' )
			]
		);
		$this->add_control(
			'gridview_post_type',
			[
				'label'   => esc_html__( 'Post Type', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"post"	=> esc_html__( 'Post', 'manual' ),
					"manual_faq"	=> esc_html__( 'FAQs', 'manual' ),
					"manual_documentation"	=> esc_html__( 'Documentation', 'manual' ),
					"manual_kb"	=> esc_html__( 'Knowledge Base', 'manual' ),
				],
				'default' => 'post',
			]
		);
		$this->add_control(
			'include_post_category',
			[
				'label'   => esc_html__( 'Include Post From Category', 'manual' ),
				'type'    => Controls_Manager::SELECT2,
				'options' => $this->manual__get_all_post_categories(),
				'label_block' => true,
				'condition' => [ 'gridview_post_type' => 'post', ],
				'multiple' => true,
				'description'   => esc_html__('Leave empty to display all category', 'manual' ),
			]
		);
		$this->add_control(
			'include_kb_category',
			[
				'label'   => esc_html__( 'Include Post From Category', 'manual' ),
				'type'    => Controls_Manager::SELECT2,
				'options' => $this->manual__get_all_kb_categories(),
				'label_block' => true,
				'condition' => [ 'gridview_post_type' => 'manual_kb', ],
				'multiple' => true,
				'description'   => esc_html__('Leave empty to display all category', 'manual' ),
			]
		);
		$this->add_control(
			'include_doc_category',
			[
				'label'   => esc_html__( 'Include Post From Category', 'manual' ),
				'type'    => Controls_Manager::SELECT2,
				'options' => $this->manual__get_all_doc_categories(),
				'label_block' => true,
				'condition' => [ 'gridview_post_type' => 'manual_documentation', ],
				'multiple' => true,
				'description'   => esc_html__('Leave empty to display all category', 'manual' ),
			]
		);
		$this->add_control(
			'include_faq_category',
			[
				'label'   => esc_html__( 'Include Post From Category', 'manual' ),
				'type'    => Controls_Manager::SELECT2,
				'options' => $this->manual__get_all_faq_categories(),
				'label_block' => true,
				'condition' => [ 'gridview_post_type' => 'manual_faq', ],
				'multiple' => true,
				'description'   => esc_html__('Leave empty to display all category', 'manual' ),
			]
		);
		$this->add_control(
			'design_presentation_type',
			[
				'label'   => esc_html__( 'Design Type', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"1"	=> esc_html__( 'Masonry', 'manual' ),
					"2"	=> esc_html__( 'FitRows', 'manual' ),
				],
				'default' => '2',
			]
		);
		$this->add_control(
			'type',
			[
				'label'   => esc_html__( 'Design Style', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"boxes"	=> esc_html__( 'Box', 'manual' ),
					"dividers"	=> esc_html__( 'Box Content With Dividers', 'manual' ),
				],
				'default' => 'boxes',
			]
		);
		$this->add_control(
			'number_of_posts',
			[
				'label'       => __( 'No. Of Posts', 'manual' ),
				'type'        => Controls_Manager::NUMBER,
				'default' => '4',
				"description" =>  esc_html__('-1 == all post records', "manual"), 
				'min' => -1,
				'max' => 30,
				'step' => 1,
			]
		);
		$this->add_control(
			'number_of_colums',
			[
				'label'   => esc_html__( 'No. Of Colums', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"2"	=> esc_html__( 'Two', 'manual' ),
					"3"	=> esc_html__( 'Three', 'manual' ),
					"4"	=> esc_html__( 'Four', 'manual' ),
				],
				'default' => '3',
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
			'order',
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
			'order_by',
			[
				'label'   => esc_html__( 'Order By', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"title"  => esc_html__( 'Title', 'manual' ),
					"date"  => esc_html__( 'Date', 'manual' ),
				],
				'default' => '',
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
				'default' => 'h4',
				'label_block' => true,
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
			'display_feature_image',
			[
				'label'   => esc_html__( 'Display Featured Image', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'display_excerpt_read',
			[
				'label'   => esc_html__( 'Display Content', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'content_limit',
			[
				'label'       => __( 'No. Of Characters', 'manual' ),
				'type'        => Controls_Manager::NUMBER,
				'default' => '15',
				'min' => 0,
				'max' => 200,
				'step' => 1,
				'condition' => [ 'display_excerpt_read' => 'yes', ],
			]
		);
		$this->add_control(
			'display_continue_read',
			[
				'label'   => esc_html__( 'Display Continue Reading', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'continue_reading_txt',
			[
				'label'       => __( 'Continue Reading Text', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Continue Reading', 'manual' ),
				'label_block' => true,
				'default' => 'Continue Reading',
			]
		);
		$this->end_controls_section();
	}
	
	protected function render() {
		$settings = $this->get_settings_for_display();
		$instance = array(
			"gridview_post_type"       => $settings['gridview_post_type'],
            "include_post_category"    => $settings['include_post_category'],
            "include_kb_category"      => $settings['include_kb_category'],
            "include_doc_category"     => $settings['include_doc_category'],
			"include_faq_category"     => $settings['include_faq_category'],
			"design_presentation_type" => $settings['design_presentation_type'],
			"type"       			 => $settings['type'],
			"number_of_posts"        => $settings['number_of_posts'],
			"number_of_colums"       => $settings['number_of_colums'],
			"order_by"               => $settings['order_by'],
            "order"                  => $settings['order'],
			"title_tag"              => $settings['title_tag'],
			"display_feature_image"  => $settings['display_feature_image'],
			"display_excerpt_read"   => $settings['display_excerpt_read'],
			"content_limit"          => $settings['content_limit'],
			"display_continue_read"  => $settings['display_continue_read'],
			"continue_reading_txt"   => $settings['continue_reading_txt'],
		);
		manual__get_widget_template( $this->get_base(), array( 'instance' => $instance ) );
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new manual__mega_post_grid() );