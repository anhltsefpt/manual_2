<?php 
global $theme_options;
$current_pageID = DOCCATPAGENORMALPOSTCALL;
if( isset($current_pageID) ) {
	
		$post = get_post($current_pageID);
		$access_meta = get_post_meta( $post->ID, 'doc_single_article_access', true );
		$check_post_user_level_access = get_post_meta( $post->ID, 'doc_single_article_user_access', true );

		/********************************
		**** ARTICLE LOCK STATUS CHECK ****
		*********************************/
		if( isset($access_meta['login']) && $access_meta['login'] == 1 && !is_user_logged_in() ) {
			manual__login_forum($access_meta['message'], '', 1);
		} else {  
		
			/****************************************************
			**** LOGIN LEVEL (SUFFICIENT ACCESS LEVEL) CHECK ****
			*****************************************************/
			if( !empty($check_post_user_level_access) )  $access_status = manual_doc_access(serialize($check_post_user_level_access));
			else  $access_status = true;
			
			if( $access_status == false ) {
				manual__no_sufficentaccess($theme_options['documentation-single-page-access-control-message']);
			} else {
					
				/*************************
				**** DISPLAY CONTENT ****
				**************************/
				echo '<div class="print-content">';
				echo '<div id="single-post post-'.esc_html($post->ID).'">';
				
				/**********************************
				**** PAGE TITLE + META SECTION ****
				***********************************/
				echo '<div class="title-content-print">';
				echo '<div class="page-title-header">'; 
				echo '<'.$theme_options['documentation-singlepg-title-tag'].' class="manual-title title singlepg-font">'. esc_html($post->post_title) .'</'.$theme_options['documentation-singlepg-title-tag'].'>';
					  manual__doc_belowtitle_meta_section($post->ID, $post->post_author);
					  
				/*************************
				**** PAGE STYLE CONTROL **
				**************************/
				if( isset($theme_options['doc-global-arcile-display-style']) && $theme_options['doc-global-arcile-display-style'] == 2 ) {  
					// Author
					echo manual__author_display_style($post->post_author);
				}	  
				
				echo '</div>';
				echo '<div class="post-cat margin-btm-35"></div>';
				
				
				/****************
				**** CONTENT ****
				*****************/
				if ( post_password_required(  $current_pageID ) ) {
					echo get_the_password_form();
				} else {
					echo '<content><div class="entry-content clearfix">'.apply_filters('the_content', $post->post_content).'</div></content>';
				}
				echo '</div>';
				
				
				/****************
				**** TAGS ****
				*****************/
				if (has_term( '', 'manual_doc_tag' )) {
					echo '<div class="tagcloud singlepgtag kbtag clearfix margin-btm-20 singlepg"><span><i class="fa fa-tags"></i> '.esc_html__( 'Tags:', 'manual' ).'</span>';
					the_terms( get_the_ID(), 'manual_doc_tag', '' , '');
					echo '</div>';
				}
				 
					  
				/**********************
				**** ATTACHED FILE ****
				***********************/
				if( get_post_meta( $post->ID, '_manual_attachement_access_status', true ) == true && !is_user_logged_in() ) {
					$message = get_post_meta( $post->ID, '_manual_attachement_access_login_msg', true );
					if( $theme_options['documentation-disable-ajaxload-content'] == false ) { 
						manual_access_attachment($message, 1);
					} else {  
						manual_access_attachment($message);
					}
				} else { 
					manual_kb_attachment_files($post->ID); 
				}
					 
				echo '<div style="clear:both"></div>';
				
				
				/******************************
				**** SOCIAL SHARE + VOTING ****
				*******************************/
				echo '<div class="panel-heading" style="padding:0px;">';
				// SOCIAL SHARE 
				if( $theme_options['documentation-social-share-status'] == false ) {
					manual_social_share(get_permalink($post->ID));
				}
				// VOTING
				if( ($theme_options['documentation-voting-buttons-status'] == false && $theme_options['documentation-voting-login-users'] == false ) || ($theme_options['documentation-voting-buttons-status'] == false && $theme_options['documentation-voting-login-users'] == true && is_user_logged_in())) {
					manual__like_dislike_section($post->ID, $theme_options['yes-no-above-message']);
				} 
				echo '</div>';
				
						
				echo '</div><span class="manual-views" id="manual-views-'.$post->ID.'"></span>';
			
			
			/*********************
			**** RELATED POST ****
			**********************/
			if( $theme_options['documentation-related-post-status'] == true ) manual_doc_related_post($post->ID);
			
			echo '</div>';
			
		}// Eof else
		}// Eof else
		
}
?>