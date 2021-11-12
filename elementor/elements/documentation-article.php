<?php
namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class manual__documentation_article extends Widget_Base { 

	public function get_name() {  
		return 'manual-documentation-article';
	}

	public function get_title() {
		return esc_html__( 'Documentation Article', 'manual' );
	}

	public function get_icon() {
		return 'manual-elementor-icon documentation-article';
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
			'documentation_article_display_type',
			[
				'label'   => esc_html__( 'Articles By', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"1"  => esc_html__( 'Latest Articles (using date)', 'manual' ),
					"2"  => esc_html__( 'Popular Article (using number of views)', 'manual' ),
					"3"  => esc_html__( 'Top Rated Article (using like)', 'manual' ),
					"4"  => esc_html__( 'Most Commented Article', 'manual' ),
					"5"  => esc_html__( 'Recently Updated Article', 'manual' ),
				],
				'default' => '1',
			]
		);
		$this->add_control(
			'documentation_article_numbers',
			[
				'label'       => __( 'No. Of Article', 'manual' ),
				'type'        => Controls_Manager::NUMBER,
				'default' => '6',
				'min' => 0,
				'max' => 30,
				'step' => 1,
			]
		);
		$this->add_control(
			'documentation_article_order_asc_dsc',
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
			'documentation_title_tag',
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
			'documentation_column',
			[
				'label'   => esc_html__( 'Display Column', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"2"  => esc_html__( 'Two', 'manual' ),
					"3"  => esc_html__( 'Three', 'manual' ),
					"4"  => esc_html__( 'Four', 'manual' ),
				],
				'default' => '3',
				'label_block' => true,
			]
		);
		$this->add_control(
			'documentation_excerpt_content',
			[
				'label'   => esc_html__( 'Display Excerpt Content', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'documentation_excerpt_content_wordlength',
			[
				'label'       => __( 'No. Of Words', 'manual' ),
				'type'        => Controls_Manager::NUMBER,
				'default' => '15',
				'min' => 0,
				'max' => 100,
				'step' => 1,
				'condition' => [ 'documentation_excerpt_content' => 'yes', ],
			]
		);
		$this->add_control(
			'box_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
			]
		);
		$this->add_control(
			'box_border_btm_color',
			[
				'label' => esc_html__( 'Box Border Bottom Color', 'manual' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
			]
		);
		$this->end_controls_section();
	}
	
	protected function render() {
		$settings = $this->get_settings_for_display();
		$instance = array(
			"documentation_article_display_type"   => $settings['documentation_article_display_type'],
			"documentation_article_numbers"   => $settings['documentation_article_numbers'],
			"documentation_article_order_asc_dsc"   => $settings['documentation_article_order_asc_dsc'],
			"documentation_title_tag"   => $settings['documentation_title_tag'],
			"documentation_column" => $settings['documentation_column'],
			"documentation_excerpt_content" => $settings['documentation_excerpt_content'],
			"documentation_excerpt_content_wordlength" => $settings['documentation_excerpt_content_wordlength'],
			"box_bg_color" => $settings['box_bg_color'],
			"box_border_btm_color" => $settings['box_border_btm_color'],
		);
		manual__get_widget_template( $this->get_base(), array( 'instance' => $instance ) );
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new manual__documentation_article() );