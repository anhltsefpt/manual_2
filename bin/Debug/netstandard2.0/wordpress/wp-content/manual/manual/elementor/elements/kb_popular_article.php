<?php
namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class manual__kb_popular_article extends Widget_Base { 

	public function get_name() {  
		return 'manual-kb-popular-article';
	}

	public function get_title() {
		return esc_html__( 'Widget - KnowledgeBase Article', 'manual' );
	}

	public function get_icon() {
		return 'manual-elementor-icon kb-category';
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
				'label' => __( 'General', 'manual' )
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Latest Articles',
			]
		);
		$this->add_control(
			'title_tag',
			[
				'label'   => esc_html__( 'Title HTML Tag', 'manual' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"h3"  => esc_html__( 'h3', 'manual' ),
					"h4"  => esc_html__( 'h4', 'manual' ),
					"h5"  => esc_html__( 'h5', 'manual' ),
					"h6"  => esc_html__( 'h6', 'manual' ),
				],
				'default' => 'h5',
			]
		);
		$this->add_control(
			'knowledgebase_article_display_type',
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
			'knowledgebase_article_number',
			[
				'label'       => __( 'Number Of Article', 'manual' ),
				'type'        => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 20,
				'step' => 1,
				'default' => '5',
			]
		);
		$this->add_control(
			'knowledgebase_article_order',
			[
				'label'   => esc_html__( 'Article Order', 'manual' ),
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
			'display_grid',
			[
				'label'   => esc_html__( 'Display in Grid Layout', 'manual' ),
				'type'    => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->end_controls_section();
	}
	
	protected function render() {
		$settings = $this->get_settings_for_display();
		$instance = array(
			"title"   => $settings['title'],
			"title_tag"   => $settings['title_tag'],
			"knowledgebase_article_display_type"   => $settings['knowledgebase_article_display_type'],
			"knowledgebase_article_number"   => $settings['knowledgebase_article_number'],
			"knowledgebase_article_order"   => $settings['knowledgebase_article_order'],
			"display_grid" => $settings['display_grid'],
			"completely_hide_private_articles" => $settings['completely_hide_private_articles'],
		);
		manual__get_widget_template( $this->get_base(), array( 'instance' => $instance ) );
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new manual__kb_popular_article() );