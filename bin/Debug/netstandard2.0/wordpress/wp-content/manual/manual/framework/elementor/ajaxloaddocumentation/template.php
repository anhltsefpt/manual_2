<?php
global $theme_options;

$post_type   = $instance['post_type'];
$posttype_records_display_order = $instance['posttype_records_display_order'];
$posttype_records_display_orderby = $instance['posttype_records_display_orderby'];
$cat_id_posttype   = $instance['cat_id_posttype'];
$posttype_treemenu_display_position = $instance['posttype_treemenu_display_position'];
$expandalltext = $instance['expandalltext'];
$collapsealltext = $instance['collapsealltext'];
$rowlayout = $instance['rowlayout'];
$layout_style = $instance['layout_style'];
$content_bg_color = $instance['content_bg_color'];
$adjust_sidebar_top_padding = $instance['adjust_sidebar_top_padding'];
$vc_doc_ajaxload_off = $instance['vc_doc_ajaxload_off'];

$content_style_css = $vc_doc_ajaxload_sidebar_margin_fix = $author_false = '';
if( $layout_style == "2" ) {
	$content_style_css = '.vc-doc-content-page, .doc-single-post.doc-page { background:'.$content_bg_color.'!important; padding: 50px 50px!important; margin-bottom: 30px!important; }';
}
if( isset($adjust_sidebar_top_padding) && $adjust_sidebar_top_padding == true ) {
	$vc_doc_ajaxload_sidebar_margin_fix = 'aside#sidebar-box, aside.doc-sidebar-box, .doc-single-post.doc-page { padding-top: 50px!important; } .vc-doc-content-page, .doc-single-post.doc-page{ margin-bottom: 0px!important; } .vc-doc-content-page{ border-right: 1px solid #f1f1f1; border-left: 1px solid #f1f1f1; }';
}
if( isset($theme_options['doc-global-arcile-display-style']) && $theme_options['doc-global-arcile-display-style'] == 2 ) { 
if( $theme_options['doc-global-design2-author'] == false ) { $author_false = '.doc-single-post .page-title-header p { float: none; margin-top: 0px; margin-bottom: 10px; }'; }
	echo '<style>.doc-single-post .page-title-header p { float: right; margin-top: 35px; margin-bottom: 0px; } .doc-single-post .page-title-header:before { content: ""; } .doc-single-post .page-title-header { padding: 0px 0px 5px 0px; } '.$content_style_css.' '.$vc_doc_ajaxload_sidebar_margin_fix.' '.$author_false.'</style>';
}
if ( isset($theme_options['documentation-responsive-tree-menu']) && $theme_options['documentation-responsive-tree-menu'] == true ) {
echo '<style>@media (max-width: 991px) { aside.vc-doc-sidebar { display: none; } }</style>';
}

$return = $taxonomy = '';

if( $posttype_treemenu_display_position == "left" ) {
	$content_fixcss = '';
	$padding_left_right_fix = 'padding-left: 0px;';
	$padding_content_right_left_fix = 'padding-right: 0px;';
} else {
	$padding_left_right_fix = 'padding-right: 0px;';
	$padding_content_right_left_fix = 'padding-left: 0px;';
	$content_fixcss = 'ajxloadvc';
}

$doc_sidebar = '';
if( $rowlayout == 2 ) {
	$sidebar_col = '4';
	$sidebar_content = '8';
} else if( $rowlayout == 3 ) {
	$sidebar_col = '3';
	$sidebar_content = '6';
	$doc_sidebar = 1;
} else if( $rowlayout == 4 ) {
	$sidebar_col = '2';
	$sidebar_content = '8';
	$doc_sidebar = 1;
} else {
	$sidebar_col = '3';
	$sidebar_content = '9';
}

// CHECK AJAX LOAD POST
if( $vc_doc_ajaxload_off == true ) { // - Activate Normal Page Load
	$ajax_load_post = false;
	$ajaxload = 2;
} else {
	$ajax_load_post = true;
	$ajaxload = 1;
}

if( isset($cat_id_posttype) && $cat_id_posttype != '' ) { 
	
	if( $post_type == 'manual_documentation' ) {
		$taxonomy = 'manualdocumentationcategory';
	}
	
	$doc_catID = explode(',', $cat_id_posttype); 
	$args = array(
		'order'         => $posttype_records_display_order,
		'orderby'       => $posttype_records_display_orderby,
	);
	$tax_terms = get_terms($taxonomy, $args);
	
	foreach ($tax_terms as $tax_term) { 
	
		$check_if_login_call = get_option( 'doc_cat_check_login_'.$tax_term->term_id );
		$check_user_role = get_option( 'doc_cat_user_role_'.$tax_term->term_id );
		$custom_login_message = get_option( 'doc_cat_login_message_'.$tax_term->term_id );
		
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
					
				
					/******************************
					**** WIDGET SIDEBAR - LEFT ****
					*******************************/
					if( $doc_sidebar == 1 && $posttype_treemenu_display_position == 'right' ) {
						$return .= '<aside class="col-md-'.esc_attr($sidebar_col).' col-sm-12 doc-sidebar-box"><div class="custom-well sidebar-nav">';
						$left_sidebar_contents = "";
						ob_start();
						dynamic_sidebar('doc-sidebar-1');
						$left_sidebar_contents = ob_get_clean();
						$return .= $left_sidebar_contents;
						$return .= '</div></aside>';
					}
					
					/**************************
					**** LEFT SIDEBAR ****
					****************************/
					if( $posttype_treemenu_display_position == 'left' ) {
						$return .= '<aside class="col-md-'.$sidebar_col.' col-sm-12 vc-doc-sidebar" id="sidebar-box" style="'.$padding_left_right_fix.'">';
						$return .= manual__doc_treemenu($post_type, $taxonomy, $tax_term->term_id, $posttype_records_display_order, $posttype_records_display_orderby, 'padding-left:0px;', $expandalltext, $collapsealltext, $ajaxload, 'page');
						$return .= '</aside>';
					} 
					
					/**********************
					**** CONTENT AREA ****
					***********************/
					if( $ajax_load_post == true ) {
						$return .= '<div class="col-md-'.$sidebar_content.' col-sm-12 '.$content_fixcss.' vc-doc-content-page" style="'.$padding_content_right_left_fix.'"> <div class="doc-single-post" id="single-post-container"> </div></div>';
					} else {
						
					/*************************************
					**** WHEN AJAX LOAD IS TURN OFF - ****
					**************************************/
						$return .= '<div class="col-md-'.$sidebar_content.' col-sm-12 '.$content_fixcss.' doc-single-post doc-page" style="'.$padding_content_right_left_fix.'">';
						$current_pageID = DOCVCPOSTCALL;
						if( isset($current_pageID) ) {
							
							$post = get_post($current_pageID);
							$access_meta = get_post_meta( $post->ID, 'doc_single_article_access', true );
							$check_post_user_level_access = get_post_meta( $post->ID, 'doc_single_article_user_access', true );
							/********************************
							**** ARTICLE LOCK STATUS CHECK ****
							*********************************/
							if( isset($access_meta['login']) && $access_meta['login'] == 1 && !is_user_logged_in() ) {
								$return .= manual__get_login_forum($access_meta['message'], '', 1);
							} else {
								
								/****************************************************
								**** LOGIN LEVEL (SUFFICIENT ACCESS LEVEL) CHECK ****
								*****************************************************/
								if( !empty($check_post_user_level_access) )  $access_status = manual_doc_access(serialize($check_post_user_level_access));
								else  $access_status = true;
	
								if( $access_status == false ) {
									$return .= manual__get_no_sufficentaccess($theme_options['documentation-single-page-access-control-message']);
								} else {
										
									/*************************
									**** DISPLAY CONTENT ****
									**************************/
									$return .= '<div class="print-content">';
									$return .= '<div id="single-post post-'.esc_html($post->ID).'">';
		
									/**********************************
									**** PAGE TITLE + META SECTION ****
									***********************************/
									$return .= '<div class="title-content-print">';
									$return .= '<div class="page-title-header">'; 
									$return .= '<'.$theme_options['documentation-singlepg-title-tag'].' class="manual-title title singlepg-font">'. esc_html($post->post_title) .'</'.$theme_options['documentation-singlepg-title-tag'].'>';
									$return .=  manual__get_doc_belowtitle_meta_section($post->ID, $post->post_author);
			  
									/*************************
									**** PAGE STYLE CONTROL **
									**************************/
									if( isset($theme_options['doc-global-arcile-display-style']) && $theme_options['doc-global-arcile-display-style'] == 2 ) {  
										// Author
										$return .= manual__author_display_style($post->post_author);
									}	  
									
									$return .= '</div>';
									$return .= '<div class="post-cat margin-btm-35"></div>';
		
		
									/****************
									**** CONTENT ****
									*****************/
									if ( post_password_required(  $current_pageID ) ) {
										$return .= get_the_password_form();
									} else {
										$return .= '<content><div class="entry-content clearfix">'.apply_filters('the_content', $post->post_content).'</div></content>';
									}
									$return .= '</div>';
			 
										  
									/**********************
									**** ATTACHED FILE ****
									***********************/
									if( get_post_meta( $post->ID, '_manual_attachement_access_status', true ) == true && !is_user_logged_in() ) {
										$message = get_post_meta( $post->ID, '_manual_attachement_access_login_msg', true );
										if( $theme_options['documentation-disable-ajaxload-content'] == false ) { 
											$return .= manual__get_access_attachment($message, 1);
										} else {  
											$return .= manual__get_access_attachment($message);
										}
									} else { 
										$return .= manual_kb_get_attachment_files($post->ID); 
									}
										 
									$return .= '<div style="clear:both"></div>';
		
									
									/******************************
									**** SOCIAL SHARE + VOTING ****
									*******************************/
									$return .= '<div class="panel-heading" style="padding:0px;">';
									// SOCIAL SHARE 
									if( $theme_options['documentation-social-share-status'] == false ) {
										$return .= manual_get_social_share(get_permalink($post->ID));
									}
									// VOTING
									if( ($theme_options['documentation-voting-buttons-status'] == false && $theme_options['documentation-voting-login-users'] == false ) || ($theme_options['documentation-voting-buttons-status'] == false && $theme_options['documentation-voting-login-users'] == true && is_user_logged_in())) {
										$return .=  manual__get_like_dislike_section($post->ID, $theme_options['yes-no-above-message']);
									} 
									$return .= '</div>';
									
											
									$return .= '</div><span class="manual-views" id="manual-views-'.$post->ID.'"></span>';
	
	
									/*********************
									**** RELATED POST ****
									**********************/
									if( $theme_options['documentation-related-post-status'] == true ) $return .= manual__doc_get_related_post($post->ID);
									
									$return .= '</div>';
	
									}// Eof else

							}
						}
						$return .= '</div>';
					/*******************************************
					**** EOF - WHEN AJAX LOAD IS TURN OFF - ****
					********************************************/
					}
					
					/**************************
					**** RIGHT SIDEBAR ****
					****************************/
					if( $posttype_treemenu_display_position == 'right' ) { 
						$return .= '<aside class="col-md-'.$sidebar_col.' col-sm-12 vc-doc-sidebar" id="sidebar-box" style="'.$padding_left_right_fix.'">';
						$return .= manual__doc_treemenu($post_type, $taxonomy, $tax_term->term_id, $posttype_records_display_order, $posttype_records_display_orderby, 'padding-right:0px;', $expandalltext, $collapsealltext, $ajaxload, 'page');
						$return .= '</aside>';
					}
					
					/*******************************
					**** WIDGET SIDEBAR - RIGHT ****
					********************************/
					if( $doc_sidebar == 1 && $posttype_treemenu_display_position == 'left' ) {
						$return .= '<aside class="col-md-'.esc_attr($sidebar_col).' col-sm-12 doc-sidebar-box"><div class="custom-well sidebar-nav">';
						$sidebar_contents = "";
						ob_start();
						dynamic_sidebar('doc-sidebar-1');
						$sidebar_contents = ob_get_clean();
						$return .= $sidebar_contents;
						$return .= '</div></aside>';
					}
				}
			} //eof else
			$return .= '</div>';
		} // eof inarray
	} // eof foreach
	wp_reset_postdata();
}

echo ent2ncr( $return );