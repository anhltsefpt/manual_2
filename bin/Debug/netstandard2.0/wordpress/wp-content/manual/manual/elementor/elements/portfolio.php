<?php
namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class manual__portfolio extends Widget_Base { 

	public function get_script_depends() {
		 return [ 'manual-ejs' ];
	}
  
	public function get_name() {  
		return 'manual-portfolio';
	}

	public function get_title() {
		return esc_html__( 'Portfolio', 'manual' );
	}

	public function get_icon() {
		return 'manual-elementor-icon portfolio';
	}

	public function get_categories() {
		return [ 'manual-elements' ];
	}

	public function get_base() {
		return basename( __FILE__, '.php' );
	}
	
	function manual__get_all_portfolio_categories() {
		$portfolio_array = array();
		$portfolio_array[] = '';
		$categories = get_categories(array('taxonomy' => 'manualportfoliocategory','parent' => 0,));
		foreach( $categories as $category ) {
			$portfolio_array[$category->term_id] = $category->name;
		}
		return $portfolio_array;
    }

	function manual__get_all_portfolio_articles() {
		$portfolio_array_post = array();
		$portfolio_array_post[] = '';
		$articles = get_posts(array('post_type' => 'manual_portfolio', 'numberposts'      => -1,));
		foreach( $articles as $article ) {
			$portfolio_array_post[$article->ID] = $article->post_title;
		}
		return $portfolio_array_post;
    }

	protected function _register_controls() {
		$this->start_controls_section(
			'section_tabs',
			[
				'label' => __( 'Settings', 'manual' )
			]
		);
		$this->add_control(
			'portfolio_type',
			[
				'label'   => esc_html__( 'Portfolio Type', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"FitRows"	=> esc_html__( 'FitRows', 'manual' ),
					"Masonry" 	=> esc_html__( 'Masonry', 'manual' ),
				],
				'default' => 'FitRows',
			]
		);
		$this->add_control(
			'portfolio_column',
			[
				'label'   => esc_html__( 'Portfolio Column', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"6"	=> esc_html__( 'Two', 'manual' ),
					"4" 	=> esc_html__( 'Three', 'manual' ),
					"3" 	=> esc_html__( 'Four', 'manual' ),
				],
				'default' => '3',
			]
		);
		$this->add_control(
			'number_of_post',
			[
				'label'       => __( 'Portfolio Records Per Page', 'manual' ),
				'type'        => Controls_Manager::NUMBER,
				'default' => '-1',
				'min' => -1,
				'max' => 20,
				'step' => 1,
				'description'   => esc_html__('-1 0r 0 == display all category', 'manual' ),
			]
		);
		$this->add_control(
			'category',
			[
				'label'   => esc_html__( 'Portfolio Category', 'manual' ),
				'type'    => Controls_Manager::SELECT2,
				'options' => $this->manual__get_all_portfolio_categories(),
				'label_block' => true,
				'multiple' => true,
				'description'   => esc_html__('Leave empty to display all category', 'manual' ),
			]
		);
		$this->add_control(
			'selected_projects',
			[
				'label'   => esc_html__( 'Portfolio by Selected Projects', 'manual' ),
				'type'    => Controls_Manager::SELECT2,
				'options' => $this->manual__get_all_portfolio_articles(),
				'label_block' => true,
				'multiple' => true,
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
			'portfolio_order',
			[
				'label'   => esc_html__( 'Portfolio Order', 'manual' ),
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
			'portfolio_order_by',
			[
				'label'   => esc_html__( 'Order By', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"title"  => esc_html__( 'Title', 'manual' ),
					"name"  => esc_html__( 'Name', 'manual' ),
					"date"  => esc_html__( 'Date', 'manual' ),
					"modified"  => esc_html__( 'Modified', 'manual' ),
					"rand"  => esc_html__( 'Random', 'manual' ),
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
			'portfolio_title_tag',
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
		$this->add_control(
			'link_color',
			[
				'label' => esc_html__( 'Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
			]
		);
		$this->add_control(
			'link_color_hover',
			[
				'label' => esc_html__( 'Hover Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
			]
		);
		$this->end_controls_section();
		
		/**************************
		*** SECTION - SHOW/HIDE ***
		***************************/
		$this->start_controls_section(
			'section_tabs_showhide',
			[
				'label' => __( 'Show/Hide', 'manual' )
			]
		);
		$this->add_control(
			'show_title',
			[
				'label'   => esc_html__( 'Show Title', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'show_categories',
			[
				'label'   => esc_html__( 'Show Categories', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'link_cat_color',
			[
				'label' => esc_html__( 'Category Text Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [ 'show_categories' => 'yes', ],
			]
		);
		$this->add_control(
			'show_custom_description',
			[
				'label'   => esc_html__( 'Show Custom Description', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
			'content_block_align',
			[
				'label'   => esc_html__( 'Text Align', 'manual' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'manual' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'manual' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'manual' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'left',
			]
		);
		$this->end_controls_section();
		
		/**************************
		*** SECTION - LOAD MORE ***
		***************************/
		$this->start_controls_section(
			'section_tabs_loadmore',
			[
				'label' => __( 'Load More', 'manual' ),
			]
		);
		$this->add_control(
			'show_load_more',
			[
				'label'   => esc_html__( 'Show Load More', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
			'inital_loading_text',
			[
				'label'       => __( 'Inital Loading Text', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Show more',
				'condition' => [ 'show_load_more' => 'yes', ],
			]
		);
		$this->add_control(
			'loading_text',
			[
				'label'       => __( 'Loading Text', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Loading...',
				'condition' => [ 'show_load_more' => 'yes', ],
			]
		);
		$this->add_control(
			'show_load_more_align',
			[
				'label'   => esc_html__( 'Load More Align', 'manual' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'manual' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'manual' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'manual' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'condition' => [ 'show_load_more' => 'yes', ],
			]
		);
		$this->add_control(
			'show_load_more_margin',
			[
				'label'       => __( 'Load More Margin (px)', 'manual' ),
				'type'        => Controls_Manager::NUMBER,
				'default' => '20',
				'min' => 0,
				'max' => 150,
				'step' => 1,
				'condition' => [ 'show_load_more' => 'yes', ],
			]
		);
		$this->end_controls_section();
		
		
		/**********************
		*** SECTION - FILTER ***
		***********************/
		$this->start_controls_section(
			'section_tabs_filter',
			[
				'label' => __( 'Portfolio Filter', 'manual' )
			]
		);
		$this->add_control(
			'portfolio_shorting',
			[
				'label'   => esc_html__( 'Portfolio Filter', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'sorting_order',
			[
				'label'   => esc_html__( 'Order', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"ASC"  => esc_html__( 'Ascending', 'manual' ),
					"DESC"  => esc_html__( 'Descending', 'manual' ),
				],
				'default' => 'DESC',
				'label_block' => true,
				'condition' => [ 'portfolio_shorting' => 'yes', ],
			]
		);
		$this->add_control(
			'sorting_order_by',
			[
				'label'   => esc_html__( ' Order By', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"name"  => esc_html__( 'Name', 'manual' ),
					"slug"  => esc_html__( 'Slug', 'manual' ),
					"id"  => esc_html__( 'ID', 'manual' ),
					"description"  => esc_html__( 'Description', 'manual' ),
				],
				'default' => 'name',
				'label_block' => true,
				'condition' => [ 'portfolio_shorting' => 'yes', ],
			]
		);
		$this->add_control(
			'shorting_link_color',
			[
				'label' => esc_html__( 'Filter Link Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#222222',
				'condition' => [ 'portfolio_shorting' => 'yes', ],
			]
		);
		$this->add_control(
			'shorting_link_border_color',
			[
				'label' => esc_html__( 'Filter Border Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#222222',
				'condition' => [ 'portfolio_shorting' => 'yes', ],
			]
		);
		$this->add_control(
			'filter_align',
			[
				'label'   => esc_html__( 'Filter Align', 'manual' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'manual' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'manual' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'manual' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'condition' => [ 'portfolio_shorting' => 'yes', ],
			]
		);
		$this->add_control(
			'filter_padding',
			[
				'label'       => __( 'Filter Padding (px)', 'manual' ),
				'type'        => Controls_Manager::NUMBER,
				'default' => '50',
				'min' => 0,
				'max' => 150,
				'step' => 1,
				'condition' => [ 'portfolio_shorting' => 'yes', ],
			]
		);
		$this->end_controls_section();
	}
	
	protected function render() {
		$settings = $this->get_settings_for_display();
		$instance = array(
			//"title"                      => $settings['title'],
			"portfolio_title_tag"        => $settings['portfolio_title_tag'],
			"portfolio_order"            => $settings['portfolio_order'],
			"number_of_post"             => $settings['number_of_post'],
			"portfolio_order_by"         => $settings['portfolio_order_by'],
			"portfolio_column"           => $settings['portfolio_column'],
			"portfolio_type"             => $settings['portfolio_type'],
			"portfolio_shorting"         => $settings['portfolio_shorting'],
			"shorting_link_color"        => $settings['shorting_link_color'],
			"shorting_link_border_color" => $settings['shorting_link_border_color'],
			"filter_align"               => $settings['filter_align'],
			"filter_padding"             => $settings['filter_padding'].'px',
			"link_color"                 => $settings['link_color'],
			"link_color_hover"           => $settings['link_color_hover'],
			"link_cat_color"             => $settings['link_cat_color'],
			"selected_projects"          => $settings['selected_projects'],
			"category"                   => $settings['category'],
			"sorting_order"              => $settings['sorting_order'],
			"sorting_order_by"           => $settings['sorting_order_by'],
			"show_categories"            => $settings['show_categories'],
			"show_load_more"        	 => $settings['show_load_more'],
			"show_load_more_align"       => $settings['show_load_more_align'],
			"show_load_more_margin"      => $settings['show_load_more_margin'].'px',
			"show_custom_description"    => $settings['show_custom_description'],
			"content_block_align"        => $settings['content_block_align'],
			"show_title"                 => $settings['show_title'],
			"inital_loading_text"        => $settings['inital_loading_text'],
			"loading_text"               => $settings['loading_text'],
		);
		manual__get_widget_template( $this->get_base(), array( 'instance' => $instance ) );
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new manual__portfolio() );