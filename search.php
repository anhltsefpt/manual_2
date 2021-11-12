<?php
/**
 * WP Search Template
 */
if( (isset($_GET['ajax']) && !empty($_GET['ajax'])) ? sanitize_text_field($_GET['ajax']) : null) { 
	manual__live_search_result();
} else {
	get_header();
		get_template_part( 'template/content', 'search' ); 
	if( $theme_options['searchpg-sidebar'] == true ) get_sidebar(); 
	echo '</div></div>';
	get_footer(); 
 } 
