<?php
$post_type   = $instance['post_type'];
$posttype_inlinerec_display_order = $instance['posttype_inlinerec_display_order'];
$posttype_inlinerec_display_orderby = $instance['posttype_inlinerec_display_orderby'];
$cat_id_posttype   = $instance['cat_id_posttype'];
$cat_id_posttype_kb = $instance['cat_id_posttype_kb'];
$posttype_inlinerec_display_position = $instance['posttype_inlinerec_display_position'];
$inlinesearchboxtext = $instance['inlinesearchboxtext'];
$inlineodc_searchonoff = $instance['inlineodc_searchonoff'];
$posttype_inlinerec_boxshadowand_padding = $instance['posttype_inlinerec_boxshadowand_padding'];
$posttype_inlinerec_rowlayout = $instance['posttype_inlinerec_rowlayout'];
$adjust_sidebar_top_padding = $instance['adjust_sidebar_top_padding'];
$posttype_inline_display_style = $instance['posttype_inline_display_style'];

if( $posttype_inlinerec_boxshadowand_padding == 'no' ) { 
	$inlinecontent_css = 'inline-content-block';
} else { 
	$inlinecontent_css = 'inline-content-titlefix';
}

if( $posttype_inlinerec_display_position == "left" ) {
	$padding_left_right_fix = 'padding-left: 0px;';
	$padding_content_right_left_fix = 'padding-right: 0px;';
	$content_position = 'inline-content-block-left';
} else {
	$padding_left_right_fix = 'padding-right: 0px;';
	$padding_content_right_left_fix = 'padding-left: 0px;';
	$content_position = 'inline-content-block-right';
}

if( $posttype_inlinerec_rowlayout == 1 ) {
	$col_sidebar = 3;
	$col_content = 9;
} else {
	$col_sidebar = 4;
	$col_content = 8;
}


if( $post_type == 'manual_kb' ) {
	$global_check_ID = $cat_id_posttype_kb;
} else {
	$global_check_ID = $cat_id_posttype;
}


$return = $taxonomy = $style_two = '';
if( $posttype_inline_display_style == 2 ) { 
	$style_two = '.inlinedocs-sidebar ul.nav > li a.root { padding: 0px!important; background: none!important;
font-weight: normal!important; } .inlinedocs-sidebar .icon { display: none!important; }';
	$return .= '<style>'.$style_two.'</style>';
}
if( $posttype_inlinerec_boxshadowand_padding == 'no' && $adjust_sidebar_top_padding == 'true' ) {
	$return .= '<style>.inlinedocsidebar { padding-top:50px; }</style>';
}
if( isset($global_check_ID) && $global_check_ID != '' ) { 

	wp_enqueue_script( "manual-sticky-sidebar" , trailingslashit(get_template_directory_uri()) . "js/sticky-sidebar/manual-sticky-sidebar.js");
	wp_add_inline_script( 'manual-sticky-sidebar', 'jQuery(document).ready(function() { \'use strict\'; jQuery(\'.inlinedocsidebar\')
			.theiaStickySidebar({
			additionalMarginTop: 30,
			additionalMarginBottom: 20,
		});
	});');
	
	if( $post_type == 'manual_kb' ) {
		$taxonomy = 'manualknowledgebasecat';
		$doc_catID = explode(',', $cat_id_posttype_kb);
	} else {
		$taxonomy = 'manualdocumentationcategory';
		$doc_catID = explode(',', $cat_id_posttype);
	}
	
	$args = array(
		'order'         => $posttype_inlinerec_display_order,
		'orderby'       => $posttype_inlinerec_display_orderby,
	);
	$tax_terms = get_terms($taxonomy, $args);
	
	foreach ($tax_terms as $tax_term) { 
	
		if( $post_type == 'manual_kb' ) {
			$check_if_login_call = get_option( 'kb_cat_check_login_'.$tax_term->term_id );
			$check_user_role = get_option( 'kb_cat_user_role_'.$tax_term->term_id );
			$custom_login_message = get_option( 'kb_cat_login_message_'.$tax_term->term_id );
		} else {
			$check_if_login_call = get_option( 'doc_cat_check_login_'.$tax_term->term_id );
			$check_user_role = get_option( 'doc_cat_user_role_'.$tax_term->term_id );
			$custom_login_message = get_option( 'doc_cat_login_message_'.$tax_term->term_id );
		}
		
		if (in_array( $tax_term->term_id, $doc_catID)) {
			
			$return .= '<div class="content-wrapper body-content">';
						
			/****************************
			**** IF USER NOT LOGED-IN ****
			****************************/
			if( $check_if_login_call == 1 && !is_user_logged_in() ) {
				manual__login_forum($custom_login_message, 1);
			} else {
				
				
				/**************************************************
				**** USER LOGED-IN BUT HAS NO SUFFIENCT ACCESS ****
				****************************************************/
				$access_status = manual_doc_access($check_user_role);
				if( $check_if_login_call == 1 && is_user_logged_in() && $access_status == false ) { 
					manual__no_sufficentaccess($theme_options['documentation-root-category-access-control-message']);
				} else { 
					
					/**************************
					**** LEFT SIDEBAR ****
					****************************/
					if( $posttype_inlinerec_display_position == 'left' ) {
						$return .= '<aside class="col-md-'.$col_sidebar.' col-sm-12 inlinedocsidebar" id="sidebar-box" style="'.$padding_left_right_fix.'">';
						$return .= manual__inlinerecords_postype($post_type, $taxonomy, $tax_term->term_id, $posttype_inlinerec_display_order, $posttype_inlinerec_display_orderby, 'padding-left:0px;', $inlinesearchboxtext, $inlineodc_searchonoff);
						$return .= '</aside>';
					} 
					
					/**********************
					**** CONTENT AREA ****
					***********************/
					$return .= '<div class="col-md-'.$col_content.' col-sm-12 '.$content_position.' inline-content-wrap" style="'.$padding_content_right_left_fix.'">';
					$return .= manual__inlinerecords_postype_records($post_type, $taxonomy, $tax_term->term_id, $posttype_inlinerec_display_order, $posttype_inlinerec_display_orderby, $inlinecontent_css);
					$return .= '</div>';
					
					
					/**************************
					**** RIGHT SIDEBAR ****
					****************************/
					if( $posttype_inlinerec_display_position == 'right' ) { 
						$return .= '<aside class="col-md-'.$col_sidebar.' col-sm-12 inlinedocsidebar inlinedoc-right-sidebar" id="sidebar-box" style="'.$padding_left_right_fix.'">';                          
						$return .= manual__inlinerecords_postype($post_type, $taxonomy, $tax_term->term_id, $posttype_inlinerec_display_order, $posttype_inlinerec_display_orderby, 'padding-right: 0px;', $inlinesearchboxtext, $inlineodc_searchonoff);
						$return .= '</aside>';
					}
					
				}
			
			} //eof else
						
			$return .= '</div>';

		} // eof inarray
		
	} // eof foreach
	wp_reset_postdata();
}

echo ent2ncr( $return );