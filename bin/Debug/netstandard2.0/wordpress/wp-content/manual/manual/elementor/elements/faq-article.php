<?php
namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class manual__faq_article extends Widget_Base { 

	public function get_script_depends() {
		 return [ 'manual-ejs' ];
	}
	
	public function get_name() {  
		return 'manual-faq-article';
	}

	public function get_title() {
		return esc_html__( 'FAQs - Category Records', 'manual' );
	}

	public function get_icon() {
		return 'manual-elementor-icon faqrecord';
	}

	public function get_categories() {
		return [ 'manual-elements' ];
	}

	public function get_base() {
		return basename( __FILE__, '.php' );
	}
	
	function manual__get_all_faq_categories() {
		$faqcategories_array = array();
		$categories = get_categories(array('taxonomy' => 'manualfaqcategory',));
		foreach( $categories as $category ) {
			$faqcategories_array[$category->term_id] = $category->name;
		}
		return $faqcategories_array;
    }

	protected function _register_controls() {
		
		$this->start_controls_section(
			'section_tabs_kb',
			[
				'label' => __( 'General', 'manual' )
			]
		);
		$this->add_control(
			'important_note',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => __( 'Please select the FAQ category to view the result.', 'manual' ),
				'content_classes' => 'elementor-manual-block'
			]
		);
		$this->add_control(
			'faqsinglecatid',
			[
				'label'   => esc_html__( 'Select FAQ Category', 'manual' ),
				'type'    => Controls_Manager::SELECT2,
				'options' => $this->manual__get_all_faq_categories(),
				'label_block' => true,
			]
		);
		$this->add_control(
			'page_per_post',
			[
				'label'       => __( 'No. Of Post Per Page', 'manual' ),
				'type'        => Controls_Manager::NUMBER,
				'default' => '-1',
				"description" =>  esc_html__('-1 == shows all post', "manual"), 
				'min' => -1,
				'max' => 30,
				'step' => 1,
			]
		);
		$this->add_control(
			'include_child_post',
			[
				'label'   => esc_html__( 'Display All Child Category as Main Category', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
			'hidepagination',
			[
				'label'   => esc_html__( 'Pagination', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'no',
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
					"title"  => esc_html__( 'Title', 'manual' ),
					"date"  => esc_html__( 'Date', 'manual' ),
					"modified"  => esc_html__( 'Last Modified Date', 'manual' ),
					"rand"  => esc_html__( 'Random', 'manual' ),
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
			'displaystyle',
			[
				'label'   => esc_html__( 'FAQ Display Style', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"1"  => esc_html__( 'Style 1', 'manual' ),
					"2"  => esc_html__( 'Style 2', 'manual' ),
				],
				'default' => '1',
			]
		);
		$this->add_control(
			'bar_title_color',
			[
				'label' => esc_html__( 'Title Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [ 'displaystyle' => '1', ],
			]
		);
		$this->add_control(
			'bar_title_hover_color',
			[
				'label' => esc_html__( 'Title Hover Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [ 'displaystyle' => '1', ],
			]
		);
		$this->add_control(
			'icon_color_plus_minus',
			[
				'label' => esc_html__( 'Plus/Minus Icon Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [ 'displaystyle' => '1', ],
			]
		);
		$this->add_control(
			'bar_color',
			[
				'label' => esc_html__( 'Bar Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [ 'displaystyle' => '1', ],
			]
		);
		$this->add_control(
			'icon_bar_color',
			[
				'label' => esc_html__( 'Icon Bar Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [ 'displaystyle' => '1', ],
			]
		);
		$this->add_control(
			'custom_title',
			[
				'label'   => esc_html__( 'Custom Title', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'no',
				'condition' => [ 'displaystyle' => '1', ],
			]
		);
		$this->add_control(
			'title_font_size',
			[
				'label'       => __( 'Title Font Size (px)', 'manual' ),
				'type'        => Controls_Manager::NUMBER,
				'default' => '19',
				'min' => 0,
				'max' => 60,
				'step' => 1,
				'condition' => [ 'displaystyle' => '1', 'custom_title' => 'yes', ],
			]
		);
		$this->add_control(
			'title_line_height',
			[
				'label'       => __( 'Title Line Height (px)', 'manual' ),
				'type'        => Controls_Manager::NUMBER,
				'default' => '23',
				'min' => 0,
				'max' => 70,
				'step' => 1,
				'condition' => [ 'displaystyle' => '1', 'custom_title' => 'yes', ],
			]
		);
		$this->add_control(
			'text_font_weight',
			[
				'label'   => esc_html__( 'Text Weight', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'condition' => [ 'displaystyle' => '1', 'custom_title' => 'yes', ],
				'options' => [
					"100"	=> esc_html__( 'Thin 100', 'manual' ),
					"200" 	=> esc_html__( 'Extra-Light 200', 'manual' ),
					"300"	=> esc_html__( 'Light 300', 'manual' ),
					"400"	=> esc_html__( 'Regular 400', 'manual' ),
					"500"	=> esc_html__( 'Medium 500', 'manual' ),
					"600"	=> esc_html__( 'Semi-Bold 600', 'manual' ),
					"700"	=> esc_html__( 'Bold 700', 'manual' ),
					"800"	=> esc_html__( 'Extra-Bold 800', 'manual' ),
					"900"	=> esc_html__( 'Ultra-Bold 900', 'manual' )
				],
				'default' => '600'
			]
		);
		$this->add_control(
			'text_transform',
			[
				'label'   => esc_html__( 'Text Transform', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"uppercase"  => esc_html__( 'Uppercase', 'manual' ),
					"capitalize"  => esc_html__( 'Capitalize', 'manual' ),
					"lowercase"  => esc_html__( 'Lowercase', 'manual' ),
				],
				'default' => '',
				'label_block' => true,
				'condition' => [ 'displaystyle' => '1', 'custom_title' => 'yes', ],
			]
		);
		$this->add_control(
			'faq_column',
			[
				'label'   => esc_html__( 'Text Transform', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"2"  => esc_html__( 'Column 2', 'manual' ),
					"3"  => esc_html__( 'Column 3', 'manual' ),
					"4"  => esc_html__( 'Column 4', 'manual' ),
				],
				'default' => '4',
				'label_block' => true,
				'condition' => [ 'displaystyle' => '2', ],
			]
		);
		$this->add_control(
			'faq_title_tag',
			[
				'label'   => esc_html__( 'Title HTML Tag', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"h2"  => esc_html__( 'H2', 'manual' ),
					"h3"  => esc_html__( 'H3', 'manual' ),
					"h4"  => esc_html__( 'H4', 'manual' ),
					"h5"  => esc_html__( 'H5', 'manual' ),
					"h6"  => esc_html__( 'H6', 'manual' ),
				],
				'default' => 'h4',
				'label_block' => true,
				'condition' => [ 'displaystyle' => '2', ],
			]
		);
		$this->add_control(
			'box_height',
			[
				'label'       => __( 'Box Height (px)', 'manual' ),
				'type'        => Controls_Manager::NUMBER,
				'default' => '',
				'min' => 0,
				'max' => 500,
				'step' => 1,
				'condition' => [ 'displaystyle' => '2', ],
			]
		);
		$this->add_control(
			'bg_color',
			[
				'label' => esc_html__( 'Background Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#fafafa',
				'condition' => [ 'displaystyle' => '2', ],
			]
		);
		$this->add_control(
			'alternate_bg_color',
			[
				'label' => esc_html__( 'Alternate Background Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [ 'displaystyle' => '2', ],
			]
		);
		$this->add_control(
			'tag_color',
			[
				'label' => esc_html__( 'Text Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [ 'displaystyle' => '2', ],
			]
		);
		$this->end_controls_section();
	}
	
	protected function render() {		
		$settings = $this->get_settings_for_display();
		$instance = array(
			"page_per_post"   => $settings['page_per_post'],
			"custom_title"   => $settings['custom_title'],
			"title_font_size"   => $settings['title_font_size'].'px',
			"title_line_height"   => $settings['title_line_height'].'px',
			"text_font_weight"   => $settings['text_font_weight'],
			"text_transform"   => $settings['text_transform'],
			"post_order"   => $settings['post_order'],
			"post_orderby" => $settings['post_orderby'],
			"include_child_post" => $settings['include_child_post'],
			"faqsinglecatid"   => $settings['faqsinglecatid'],
			"hidepagination"   => $settings['hidepagination'],
			"displaystyle"   => $settings['displaystyle'],
			"faq_column"    => $settings['faq_column'],
			"faq_title_tag"    => $settings['faq_title_tag'],
			"bg_color" => $settings['bg_color'],
			"tag_color" => $settings['tag_color'],
			"alternate_bg_color" => $settings['alternate_bg_color'],
			"box_height" => $settings['box_height'].'px',
			"bar_color" => $settings['bar_color'],	  
			"icon_bar_color" => $settings['icon_bar_color'],	  
			"bar_title_color" => $settings['bar_title_color'],	 
			"bar_title_hover_color" => $settings['bar_title_hover_color'],	 
			"icon_color_plus_minus" => $settings['icon_color_plus_minus'],	 
		);
		manual__get_widget_template( $this->get_base(), array( 'instance' => $instance ) );
	}

}
Plugin::instance()->widgets_manager->register_widget_type( new manual__faq_article() );