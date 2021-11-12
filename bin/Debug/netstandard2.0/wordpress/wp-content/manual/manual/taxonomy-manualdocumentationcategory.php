<?php 
get_header();  

$post_type_check = get_post_type( $post );

/****************************
**** CATEGORY META VALUE ****
*****************************/
$check_if_login_call = '';
$current_term_check_termID = get_term_by( 'slug', get_query_var( 'term' ), 'manualdocumentationcategory' );
$check_if_login_call = get_option( 'doc_cat_check_login_'.$current_term_check_termID->term_id );
$check_user_role = get_option( 'doc_cat_user_role_'.$current_term_check_termID->term_id );
$custom_login_message = get_option( 'doc_cat_login_message_'.$current_term_check_termID->term_id );

/*****************************
**** AJAX POST LOAD CHECK ****
******************************/
if( isset($theme_options['documentation-disable-ajaxload-content']) && $theme_options['documentation-disable-ajaxload-content'] == true ) {
	$ajax_load_post = false;
	$ajaxload = 2;
} else {
	$ajax_load_post = true;
	$ajaxload = 1;
}

/************************
**** PAGE ROW LAYOUT ****
*************************/
$doc_sidebar = '';
if( isset($theme_options['documentation-row-layout']) && $theme_options['documentation-row-layout'] == 1 ) {
	$col_sidebar = 3;
	$col_content = 9;
} else if( isset($theme_options['documentation-row-layout']) && $theme_options['documentation-row-layout'] == 3 ) {
	$col_sidebar = 3;
	$col_content = 6;
	$doc_sidebar = 1;
} else if( isset($theme_options['documentation-row-layout']) && $theme_options['documentation-row-layout'] == 4 ) {
	$col_sidebar = 2;
	$col_content = 8;
	$doc_sidebar = 1;
} else {
	$col_sidebar = 4;
	$col_content = 8;
}

/*********************
**** FIND TERM ID ****
**********************/
$term_slug = get_query_var( 'term' );
$current_term = get_term_by( 'slug', $term_slug, 'manualdocumentationcategory' );
$term_id = $current_term->term_id;
?>
<?php 
if((isset($theme_options['doc-global-arcile-display-style']) && $theme_options['doc-global-arcile-display-style'] == 2) &&  
   (isset($theme_options['doc-global-page-bg-color']) && $theme_options['doc-global-page-bg-color'] != '') &&
   ($theme_options['documentation-pg-content-box-shadow'] == true) ) {
   echo '<div style="background:'.esc_attr($theme_options['doc-global-page-bg-color']).';">';
}
?>
<div class="container content-wrapper body-content">
<div class="row margin-top-btm-50 doc-row-margin-fix">
<?php 
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
		
		/******************************
		**** WIDGET SIDEBAR - LEFT ****
		*******************************/
		if( $doc_sidebar == 1 && $theme_options['documentation-sidebar-position'] == 'right' ) {
			echo '<aside class="col-md-'.esc_attr($col_sidebar).' col-sm-12 doc-sidebar-box"><div class="custom-well sidebar-nav">';
			if ( is_active_sidebar( 'doc-sidebar-1' ) ) { 
				dynamic_sidebar( 'doc-sidebar-1' ); 
			}
			echo '</div></aside>';
		}

		/**************************
		**** LEFT SIDEBAR ****
		****************************/
		if( $theme_options['documentation-sidebar-position'] == 'left' || 
		  ( $theme_options['documentation-sidebar-position'] == 'right' && $ajax_load_post == false ) ) { 
		
			if(  $theme_options['documentation-sidebar-position'] == 'right' && $ajax_load_post == false  ) $docnoajax_right = 'docnoajax_right';
			else $docnoajax_right = '';
		
			echo '<aside class="col-md-'.esc_attr($col_sidebar).' col-sm-12 doc-rtl-sidebar '.esc_attr($docnoajax_right).' " id="sidebar-box">';
			echo manual__doc_treemenu($post_type_check, 'manualdocumentationcategory', $term_id, $theme_options['documentation-record-display-order'], $theme_options['documentation-record-display-order-by'], 'padding-left:0px;', $theme_options['documentation-expand-text'], $theme_options['documentation-collapse-text'], $ajaxload);
			echo '</aside>';
		} 
		
		/**********************
		**** CONTENT AREA ****
		***********************/
		if( $ajax_load_post == true ) {
			echo '<div class="col-md-'.esc_attr($col_content).' col-sm-12"> <div class="doc-single-post doc-page" id="single-post-container"> </div></div>';
		} else {
			echo '<div class="col-md-'.esc_attr($col_content).' col-sm-12"><div class="doc-single-post doc-page">';
			get_template_part( 'template/doc/cat', 'page' );	
			echo '</div></div>';
		}

		/**************************
		**** RIGHT SIDEBAR ****
		****************************/
		if( $theme_options['documentation-sidebar-position'] == 'right' && $ajax_load_post == true ) { 
			echo '<aside class="col-md-'.esc_attr($col_sidebar).' col-sm-12 doc-rtl-sidebar" id="sidebar-box">';
			echo manual__doc_treemenu($post_type_check, 'manualdocumentationcategory', $term_id, $theme_options['documentation-record-display-order'], $theme_options['documentation-record-display-order-by'], 'padding-right:0px;', $theme_options['documentation-expand-text'], $theme_options['documentation-collapse-text'], $ajaxload);
			echo '</aside>';
		}
		
		
		/*******************************
		**** WIDGET SIDEBAR - RIGHT ****
		********************************/
		if( $doc_sidebar == 1 && $theme_options['documentation-sidebar-position'] == 'left' ) {
			echo '<aside class="col-md-'.esc_attr($col_sidebar).' col-sm-12 doc-sidebar-box"><div class="custom-well sidebar-nav">';
			if ( is_active_sidebar( 'doc-sidebar-1' ) ) { 
				dynamic_sidebar( 'doc-sidebar-1' ); 
			}
			echo '</div></aside>';
		}


	} // eof else
} // eof else (if user loggedin)
?>
</div>
</div>
<?php
if((isset($theme_options['doc-global-arcile-display-style']) && $theme_options['doc-global-arcile-display-style'] == 2) &&  
   (isset($theme_options['doc-global-page-bg-color']) && $theme_options['doc-global-page-bg-color'] != '') &&
   ($theme_options['documentation-pg-content-box-shadow'] == true) ) {
   echo '</div>';
}
get_footer(); 
?>