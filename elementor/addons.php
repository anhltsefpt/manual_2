<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once trailingslashit( get_template_directory() ) . 'elementor/inc/e-helper.php';
require_once trailingslashit( get_template_directory() ) . 'elementor/inc/class-elementor-extend-icons.php';
function manual__add_new_elements() {
	require trailingslashit( get_template_directory() ). 'elementor/inc/helper.php';
	//Load elements
	require trailingslashit( get_template_directory() ). 'elementor/elements/counter.php';
	require trailingslashit( get_template_directory() ). 'elementor/elements/team.php';
	require trailingslashit( get_template_directory() ). 'elementor/elements/testimonials.php';
	require trailingslashit( get_template_directory() ). 'elementor/elements/knowledgebase.php';
	require trailingslashit( get_template_directory() ). 'elementor/elements/kb_category.php';
	require trailingslashit( get_template_directory() ). 'elementor/elements/kb_popular_article.php';
	require trailingslashit( get_template_directory() ). 'elementor/elements/ajaxloaddocumentation.php';
	require trailingslashit( get_template_directory() ). 'elementor/elements/inlinedocumentation.php';
	require trailingslashit( get_template_directory() ). 'elementor/elements/portfolio.php';
	require trailingslashit( get_template_directory() ). 'elementor/elements/monitor_frame.php';
	require trailingslashit( get_template_directory() ). 'elementor/elements/post-type-category-landing.php';
	require trailingslashit( get_template_directory() ). 'elementor/elements/kb-single-category-records.php';
	require trailingslashit( get_template_directory() ). 'elementor/elements/kb-tree-view.php';
	require trailingslashit( get_template_directory() ). 'elementor/elements/faq-category.php';
	require trailingslashit( get_template_directory() ). 'elementor/elements/faq-article.php';
	require trailingslashit( get_template_directory() ). 'elementor/elements/mega-post-grid.php';
	require trailingslashit( get_template_directory() ). 'elementor/elements/frame-item.php';
	require trailingslashit( get_template_directory() ). 'elementor/elements/carousel-help-blocks.php';
	require trailingslashit( get_template_directory() ). 'elementor/elements/documentation-article.php';
	require trailingslashit( get_template_directory() ). 'elementor/elements/login-box.php';
	require trailingslashit( get_template_directory() ). 'elementor/elements/postype-count-post.php';
	require trailingslashit( get_template_directory() ). 'elementor/elements/search-box.php';
	if ( class_exists('LearnPress') ) { 
		require trailingslashit( get_template_directory() ). 'elementor/elements/learnpress-course.php';
	}
	require trailingslashit( get_template_directory() ). 'elementor/elements/message-box.php';
	require trailingslashit( get_template_directory() ). 'elementor/elements/pricing-table.php';
	require trailingslashit( get_template_directory() ). 'elementor/elements/service-table.php';
}
add_action( 'elementor/widgets/widgets_registered', 'manual__add_new_elements' );

function manual__after_register_scripts() {
	wp_enqueue_script( 'manual-ejs', trailingslashit( get_template_directory_uri() ) . 'elementor/assets/js/m-elementor.js', array( 'jquery' ), '1.0', true );
}
add_action( 'elementor/frontend/after_register_scripts', 'manual__after_register_scripts' );
//Page Settings
require trailingslashit( get_template_directory() ). 'elementor/admin/settings.php';