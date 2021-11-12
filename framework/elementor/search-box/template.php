<?php
$placeholder_text  = $instance['placeholder_text'];
$standard_search  = $instance['standard_search'];

if( $standard_search != 'yes' ) {
	echo '<div class="elementor_themeoption_search">';
	manual__standard_search_form();	
	echo '</div>';
} else {
	$return = '<div class="vc_manual__search_wrap">';
	$return .= manual__inlinesearch_form($placeholder_text,'');
	$return .= '</div>';
	echo ent2ncr( $return );
}