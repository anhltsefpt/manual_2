<?php
namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class manual__knowledgebase extends Widget_Base { 
	
	public function get_script_depends() {
		 return [ 'manual-ejs' ];
	}
	
	public function get_name() {  
		return 'manual-knowledgebase';
	}

	public function get_title() {
		return esc_html__( 'KnowledgeBase', 'manual' );
	}

	public function get_icon() {
		return 'manual-elementor-icon knowledgebase';
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
			'section_tabs_kb',
			[
				'label' => __( 'General', 'manual' )
			]
		);
		$this->add_control(
			'knowledgebase_style_type',
			[
				'label'   => esc_html__( 'Display Type', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"1"  => esc_html__( 'Masonry', 'manual' ),
					"2"  => esc_html__( 'FitRows', 'manual' ),
				],
				'default' => '2',
			]
		);
		$this->add_control(
			'knowledgebase_column',
			[
				'label'   => esc_html__( 'Columns', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"4"  => esc_html__( '3 Columns (Full Width)', 'manual' ),
					"6"  => esc_html__( '2 Columns (Best Fit Sidebar)', 'manual' ),
					"12"  => esc_html__( '1 Columns', 'manual' ),
				],
				'default' => '4',
				'label_block' => true,
			]
		);
		$this->add_control(
			'kb_no_of_category_records',
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
			'knowledgebase_no_of_articles',
			[
				'label'       => __( 'No. Of Articles Under Category', 'manual' ),
				'type'        => Controls_Manager::NUMBER,
				'default' => '5',
				'min' => 0,
				'max' => 30,
				'step' => 1,
			]
		);
		$this->add_control(
			'knowledgebase_child_cat_as_root',
			[
				'label'   => esc_html__( 'Display All Child Category as Main Category', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'no',
				'description'   => esc_html__('Will not work if select specific categories', 'manual' ),
			]
		);
		$this->add_control(
			'kbgroupcatid',
			[
				'label'   => esc_html__( 'Knowledge Base Category', 'manual' ),
				'type'    => Controls_Manager::SELECT2,
				'options' => $this->manual__get_all_kb_categories(),
				'label_block' => true,
				'multiple' => true,
				'description'   => esc_html__('Leave empty to display all category', 'manual' ),
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
			'knowledgebase_page_article_display_order',
			[
				'label'   => esc_html__( 'Category - Records Order', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"ASC"  => esc_html__( 'Ascending', 'manual' ),
					"DESC"  => esc_html__( 'Descending', 'manual' ),
				],
				'default' => 'DESC',
				'label_block' => true,
				'description'   => esc_html__('Order records that\'s under category', 'manual' ),
			]
		);
		$this->add_control(
			'knowledgebase_page_article_display_orderby',
			[
				'label'   => esc_html__( 'Category - Records Order By', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"date"  => esc_html__( 'By Date', 'manual' ),
					"modified"  => esc_html__( 'By Last Modified Date', 'manual' ),
					"title"  => esc_html__( 'By Title', 'manual' ),
					"rand"  => esc_html__( 'By Random', 'manual' ),
					"menu_order"  => esc_html__( 'By Page Order', 'manual' ),
					"comment_count"  => esc_html__( 'By Number of Comments', 'manual' ),
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
			'category_title_tag',
			[
				'label'   => esc_html__( 'Category Title HTML Tag', 'manual' ),
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
			'display_kb_cat_subcategory',
			[
				'label'   => esc_html__( 'Show Sub Category', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'no',
				'description'   => esc_html__('Sub-category will display under the main category', 'manual' ),
			]
		);
		$this->add_control(
			'completely_hide_private_category',
			[
				'label'   => esc_html__( 'Hide Private Category', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'no',
				'description'   => esc_html__('Visible to only respective users', 'manual' ),
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
		$this->add_control(
			'hide_kb_category_articles',
			[
				'label'   => esc_html__( 'Hide Category Articles', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
			'display_kb_cat_title_icon',
			[
				'label'   => esc_html__( 'Show Category Icon', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'display_kb_article_title_icon',
			[
				'label'   => esc_html__( 'Show Article Icon', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'display_kb_cat_desc',
			[
				'label'   => esc_html__( 'Show Category "Description"', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'read_more_text_display',
			[
				'label'   => esc_html__( 'Show "View All" Text', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'knowledgebase_view_all',
			[
				'label'       => __( 'Text', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'View All', 'manual' ),
				'label_block' => true,
				'default' => 'View All',
				'condition' => [ 'read_more_text_display' => 'yes', ],
			]
		);
		$this->add_control(
			'read_more_text_arrow',
			[
				'label'   => esc_html__( 'Hide Text Arrow', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'no',
				'condition' => [ 'read_more_text_display' => 'yes', ],
			]
		);
		$this->add_control(
			'hide_post_count_from_viewall_text',
			[
				'label'   => esc_html__( 'Hide Text "Post Count"', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'no',
				'condition' => [ 'read_more_text_display' => 'yes', ],
			]
		);
		$this->end_controls_section();
		
		
		/**************************
		*** SECTION - SHOW/HIDE ***
		***************************/
		$this->start_controls_section(
			'section_tabs_color',
			[
				'label' => __( 'Color', 'manual' )
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
				'description'   => esc_html__('Icon before category title', 'manual' ),
				'condition' => [ 'display_kb_cat_title_icon' => 'yes', ],
			]
		);
		$this->add_control(
			'cat_desc_color',
			[
				'label' => esc_html__( 'Category Description Text Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [ 'display_kb_cat_desc' => 'yes', ],
			]
		);
		$this->add_control(
			'kbsubcat_total_article_count_color',
			[
				'label' => esc_html__( 'Sub-Category Total Article Count Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [ 'display_kb_cat_subcategory' => 'yes', ],
			]
		);
		$this->end_controls_section();
		
		
		/**************************
		*** SECTION - DESIGN ***
		***************************/
		$this->start_controls_section(
			'section_tabs_design',
			[
				'label' => __( 'Design', 'manual' )
			]
		);
		$this->add_control(
			'knowledgebase_design_style_type',
			[
				'label'   => esc_html__( 'Knowledgebase Design Style', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"1"  => esc_html__( 'Default', 'manual' ),
					"2"  => esc_html__( 'Style 1', 'manual' ),
					"3"  => esc_html__( 'Style 2', 'manual' ),
				],
				'default' => '1',
				'label_block' => true,
			]
		);
		$this->add_control(
			'knowledgebase_article_txt_design3',
			[
				'label'       => __( 'Article Text', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Article Text', 'manual' ),
				'label_block' => true,
				'default' => 'articles', 
				'condition' => [ 'knowledgebase_design_style_type' => '3', ],
			]
		);
		$this->add_control(
			'kb_display_cat_recors_in_grid_layout_col_1',
			[
				'label'   => esc_html__( 'Display Records Under Category in Grid Style', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'no',
				'condition' => [ 'knowledgebase_column' => '12', ],
			]
		);
		$this->add_control(
			'kb_display_cat_recors_apply_li_border_layout_col_1',
			[
				'label'   => esc_html__( 'Apply Border for each Category Records', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'no',
				'condition' => [ 'knowledgebase_column' => '12', ],
			]
		);
		$this->add_control(
			'knowledgebase_design_style_type1_border_color',
			[
				'label' => esc_html__( 'Box Border Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#e1e1e1',
				'condition' => [ 'knowledgebase_design_style_type' => ['2','3'] ],
			]
		);
		$this->add_control(
			'knowledgebase_design_style_type1_border_width',
			[
				'label'       => __( 'Box Border Width (px)', 'manual' ),
				'type'        => Controls_Manager::NUMBER,
				'default' => '1',
				'min' => 1,
				'max' => 10,
				'step' => 1,
				'condition' => [ 'knowledgebase_design_style_type' => ['2','3'] ],
			]
		);
		$this->add_control(
			'knowledgebase_design_style_type1_bg_color',
			[
				'label' => esc_html__( 'Box Background Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#FFFFFF',
				'condition' => [ 'knowledgebase_design_style_type' => ['2','3'] ],
			]
		);
		$this->add_control(
			'knowledgebase_design_style_type1_bg_linear_color',
			[
				'label' => esc_html__( 'Box Background Linear gradient Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [ 'knowledgebase_design_style_type' => ['2','3'] ],
			]
		);
		$this->add_control(
			'knowledgebase_design_style_type1_titletxtbg_color',
			[
				'label' => esc_html__( 'Title Text Background Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#F6F6F6',
				'condition' => [ 'knowledgebase_design_style_type' => '2', ],
			]
		);
		$this->add_control(
			'knowledgebase_design_style_type3_text_color',
			[
				'label' => esc_html__( 'Total Article Text Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#A2A2A2',
				'condition' => [ 'knowledgebase_design_style_type' => '3', ],
			]
		);
		$this->add_control(
			'kb_cat_icon_position',
			[
				'label'   => esc_html__( 'Category "Title Icon" Position', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"1"  => esc_html__( 'Icon at left with heading', 'manual' ),
					"2"  => esc_html__( 'Icon at top', 'manual' ),
				],
				'default' => '1',
				'condition' => [ 'display_kb_cat_title_icon' => 'yes', ],
			]
		);
		$this->add_control(
			'category_icon_name_default',
			[
				'label'       => __( 'Icon', 'manual' ),
				'type'        => Controls_Manager::ICONS,
				'default' => [
								'value' => '',
								'library' => 'solid',
							],
				'condition' => [ 'display_kb_cat_title_icon' => 'yes', ],
			]
		);
		$this->add_control(
			'category_icon_font_size',
			[
				'label'       => __( 'Category Icon Font Size (px)', 'manual' ),
				'type'        => Controls_Manager::NUMBER,
				'min' => 8,
				'max' => 100,
				'step' => 1,
				'default' => 19,
				'condition' => [ 'display_kb_cat_title_icon' => 'yes', ],
			]
		);
		$this->add_control(
			'category_title_text_padding',
			[
				'label'       => __( 'Category Title Text Padding', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( '0px 0px 0px 35px', 'manual' ),
				'label_block' => true,
				'default' => '0px 0px 0px 35px',
				'condition' => [ 'kb_cat_icon_position' => '1', ],
				'description'   => esc_html__('0px 0px 0px 35px (TOP, RIGHT, BOTTOM, LEFT)', 'manual' ),
			]
		);
		$this->end_controls_section();
	}
	
	protected function render() {		
		$settings = $this->get_settings_for_display();
		$instance = array(
			"knowledgebase_style_type"                           => $settings['knowledgebase_style_type'],
			"knowledgebase_design_style_type"                    => $settings['knowledgebase_design_style_type'],
			"knowledgebase_design_style_type1_border_color"      => $settings['knowledgebase_design_style_type1_border_color'],
			"knowledgebase_design_style_type1_bg_color"          => $settings['knowledgebase_design_style_type1_bg_color'],
			"knowledgebase_design_style_type1_titletxtbg_color"  => $settings['knowledgebase_design_style_type1_titletxtbg_color'],
			"kb_no_of_category_records"                          => $settings['kb_no_of_category_records'],
			"knowledgebase_column"                           => $settings['knowledgebase_column'],
			"knowledgebase_category_display_order"           => $settings['knowledgebase_category_display_order'],
			"knowledgebase_category_display_orderby"         => $settings['knowledgebase_category_display_orderby'],
			"knowledgebase_no_of_articles"                   => $settings['knowledgebase_no_of_articles'],
			"knowledgebase_page_article_display_order"       => $settings['knowledgebase_page_article_display_order'],
			"knowledgebase_page_article_display_orderby"     => $settings['knowledgebase_page_article_display_orderby'],
			"knowledgebase_child_cat_as_root"                => $settings['knowledgebase_child_cat_as_root'],
			"category_title_tag"                      => $settings['category_title_tag'],
			"knowledgebase_view_all"                  => $settings['knowledgebase_view_all'],
			"read_more_text_display"                  => $settings['read_more_text_display'],
			"kbgroupcatid"                            => $settings['kbgroupcatid'],
			"icon_color"                              => $settings['icon_color'],
			"cat_desc_color"                          => $settings['cat_desc_color'],
			"display_kb_cat_desc"                             => $settings['display_kb_cat_desc'],
			"display_kb_cat_title_icon"                       => $settings['display_kb_cat_title_icon'],
			"display_kb_article_title_icon"                   => $settings['display_kb_article_title_icon'],
			"knowledgebase_article_txt_design3"               => $settings['knowledgebase_article_txt_design3'],
			"knowledgebase_design_style_type3_text_color"     => $settings['knowledgebase_design_style_type3_text_color'],
			"display_kb_cat_subcategory"                      => $settings['display_kb_cat_subcategory'],
			"kbsubcat_total_article_count_color"              => $settings['kbsubcat_total_article_count_color'],
			"hide_kb_category_articles"                       => $settings['hide_kb_category_articles'],
			"read_more_text_arrow"                            => $settings['read_more_text_arrow'],
			"kb_cat_icon_position"                            => $settings['kb_cat_icon_position'],
			"category_title_text_padding"                     => $settings['category_title_text_padding'],
			"category_icon_font_size"                         => $settings['category_icon_font_size'].'px',
			"category_icon_name_default"                      => $settings['category_icon_name_default'],
			"knowledgebase_design_style_type1_border_width"   => $settings['knowledgebase_design_style_type1_border_width'].'px',
			"completely_hide_private_category"                => $settings['completely_hide_private_category'],
			"hide_post_count_from_viewall_text"               => $settings['hide_post_count_from_viewall_text'],
			"kb_display_cat_recors_in_grid_layout_col_1"      => $settings['kb_display_cat_recors_in_grid_layout_col_1'],
			"kb_display_cat_recors_apply_li_border_layout_col_1"    => $settings['kb_display_cat_recors_apply_li_border_layout_col_1'],
			"knowledgebase_design_style_type1_bg_linear_color"      => $settings['knowledgebase_design_style_type1_bg_linear_color'],
			"completely_hide_private_articles"      => $settings['completely_hide_private_articles'],
		);
		manual__get_widget_template( $this->get_base(), array( 'instance' => $instance ) );
	}

}
Plugin::instance()->widgets_manager->register_widget_type( new manual__knowledgebase() );