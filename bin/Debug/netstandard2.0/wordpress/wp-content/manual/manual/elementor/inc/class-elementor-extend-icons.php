<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

class Manual__Elementor_Extend_Icons {
	private static $instance = null;

	public function __construct() {
		add_action( 'elementor/editor/before_enqueue_styles', array( $this, 'manual__font_setup' ) );
	}

	public function manual__font_setup() {
		wp_enqueue_style( 'manual-elementor-admin-icon', trailingslashit( get_template_directory_uri() ) . 'css/m-elementor-icons.css' );
	}
	
	public static function get_instance() {
		if ( self::$instance == null ) {
			self::$instance = new self;
		}
		return self::$instance;
	}
}

Manual__Elementor_Extend_Icons::get_instance();