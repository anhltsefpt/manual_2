<?php
namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class manual__learnpress_course extends Widget_Base { 

	public function get_script_depends() {
		 return [ 'manual-ejs' ];
	}
  
	public function get_name() {  
		return 'manual-course';
	}

	public function get_title() {
		return esc_html__( 'Course', 'manual' );
	}

	public function get_icon() {
		return 'manual-elementor-icon learnpress-course';
	}

	public function get_categories() {
		return [ 'manual-elements' ];
	}

	public function get_base() {
		return basename( __FILE__, '.php' ); 
	}
	
	function manual__get_all_course_categories( $cats = false ) {
		global $wpdb;
		$query = $wpdb->get_results( $wpdb->prepare(
			"
					  SELECT      t1.term_id, t2.name
					  FROM        $wpdb->term_taxonomy AS t1
					  INNER JOIN $wpdb->terms AS t2 ON t1.term_id = t2.term_id
					  WHERE t1.taxonomy = %s
					  AND t1.count > %d
					  ",
			'course_category', 0
		) );
	
		if ( ! $cats ) {
			$cats = array();
		}
		if ( ! empty( $query ) ) {
			foreach ( $query as $key => $value ) {
				$cats[ $value->term_id ] = $value->name;
			}
		}
	
		return $cats;
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_tabs',
			[
				'label' => __( 'Course', 'manual' )
			]
		);
		$this->add_control(
			'layout',
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
			'column',
			[
				'label'   => esc_html__( 'No. Of Columns', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"2"  => esc_html__( '2 Columns', 'manual' ),
					"3"  => esc_html__( '3 Columns', 'manual' ),
					"4"  => esc_html__( '4 Columns', 'manual' ),
				],
				'default' => '4',
				'label_block' => true,
			]
		);
		$this->add_control(
			'limit',
			[
				'label'       => __( 'No. Of Records Limit', 'manual' ),
				'type'        => Controls_Manager::NUMBER,
				'default' => '8',
				'min' => -1,
				'max' => 30,
				'step' => 1,
			]
		);
		$this->add_control(
			'cat_id',
			[
				'label'   => esc_html__( 'Select Course Category', 'manual' ),
				'type'    => Controls_Manager::SELECT2,
				'options' => $this->manual__get_all_course_categories( array( 'All' => esc_html__( 'all', 'manual' ) ) ),
				'label_block' => true,
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
			'orderby',
			[
				'label'   => esc_html__( 'Category Order By', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"date"  => esc_html__( 'Date', 'manual' ),
					"rand"  => esc_html__( 'Random', 'manual' ),
					"title"  => esc_html__( 'Title', 'manual' ),
					"modified"  => esc_html__( 'Modified', 'manual' ),
					"category"  => esc_html__( 'Category', 'manual' ),
				],
				'default' => '',
				'label_block' => true,
			]
		);
		$this->add_control(
			'title_tag',
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
				'default' => 'h5',
				'label_block' => true,
			]
		);
		$this->add_control(
			'course_tag',
			[
				'label'   => esc_html__( 'Price HTML Tag', 'manual' ),
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
	}
	
	protected function render() {
		$settings = $this->get_settings_for_display();
		$instance = array(
			"layout"      => $settings['layout'],
			"column"      => $settings['column'],
			"limit"       => $settings['limit'],
			"title_tag"   => $settings['title_tag'],
			"order"       => $settings['order'],
			"orderby"     => $settings['orderby'],
			"cat_id"      => $settings['cat_id'],
			"course_tag"  => $settings['course_tag'],
		);
		manual__get_widget_template( $this->get_base(), array( 'instance' => $instance ) );
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new manual__learnpress_course() );