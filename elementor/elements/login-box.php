<?php
namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class manual__login_box extends Widget_Base { 

	public function get_name() {  
		return 'manual-login-box';
	}

	public function get_title() {
		return esc_html__( 'Login Box', 'manual' );
	}

	public function get_icon() {
		return 'manual-elementor-icon login-box';
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
			'custom_login_message',
			[
				'label'       => __( 'Login Message', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Login',
			]
		);
		$this->add_control(
			'custom_loggedin_message',
			[
				'label'       => __( 'Logged-in Message', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'You are loggedin',
			]
		);
		$this->add_control(
			'custom_logout_text',
			[
				'label'       => __( 'Logout Text', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Logout',
			]
		);
		$this->add_control(
			'custom_lostpassword_text',
			[
				'label'       => __( 'Lost Password Text', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Lost Password',
			]
		);
		$this->add_control(
			'custom_no_member_register_text',
			[
				'label'       => __( 'Not a member yet? Text', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Not a member yet?',
			]
		);
		$this->add_control(
			'custom_register_text',
			[
				'label'       => __( 'Register now Text', 'manual' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Register now',
			]
		);
		$this->end_controls_section();
	}
	
	protected function render() {
		$settings = $this->get_settings_for_display();
		$instance = array(
			"custom_login_message"  => $settings['custom_login_message'],
			"custom_loggedin_message"  => $settings['custom_loggedin_message'],
			"custom_logout_text" => $settings['custom_logout_text'],
			"custom_lostpassword_text" => $settings['custom_lostpassword_text'],
			"custom_register_text" => $settings['custom_register_text'],
			"custom_no_member_register_text" => $settings['custom_no_member_register_text'],
		);
		manual__get_widget_template( $this->get_base(), array( 'instance' => $instance ) );
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new manual__login_box() );