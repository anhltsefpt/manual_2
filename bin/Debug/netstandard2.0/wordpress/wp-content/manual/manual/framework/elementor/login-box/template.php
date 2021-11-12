<?php
$custom_login_message  = $instance['custom_login_message'];
$custom_loggedin_message  = $instance['custom_loggedin_message'];
$custom_logout_text = $instance['custom_logout_text'];
$custom_lostpassword_text = $instance['custom_lostpassword_text'];
$custom_register_text = $instance['custom_register_text'];
$custom_no_member_register_text = $instance['custom_no_member_register_text'];

$return = '';
if( is_user_logged_in() ) {
	$return .= '<div class="manual_login_page"> <div class="custom_login_form">';
	$return .= '<h4>'.$custom_loggedin_message.'</h4>';
	$return .= '<p><a href="'.esc_url(wp_logout_url()).'" class="more-link hvr-icon-wobble-horizontal">'.esc_html($custom_logout_text).' &nbsp;<i class="fa fa-arrow-right hvr-icon"></i></a>';
	$return .= '</p></div></div>';
} else {
	$return .= '<div><div class="manual_login_page"><div class="custom_login_form">';
	$return .= '<h4>'.esc_html($custom_login_message).'</h4>';
	$args = array(
		'echo' => false,
	);
	$return .= wp_login_form($args);
	$return .= '<ul class="custom_register">';
	$return .= '<li><a href=" '.wp_lostpassword_url().'" title="Lost Password" class="more-link hvr-icon-wobble-horizontal margin-15">';
	$return .= $custom_lostpassword_text;
	$return .= ' &nbsp;&nbsp;<i class="fa fa-arrow-right hvr-icon"></i> </a></li>';
	
	$registration_enabled = get_option( 'users_can_register' );
	if ( $registration_enabled ) {
		$return .= '<li>' . $custom_no_member_register_text . ' <a href="'. esc_attr(wp_registration_url()).'" class="more-link">' . esc_html($custom_register_text) . '</a></li>';
	}
	
	$return .= '</ul>';
	$return .= '</div></div></div>';
}

echo ent2ncr( $return );