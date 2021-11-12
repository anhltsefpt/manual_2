<?php 
/**
 * The template part for displaying results in search pages
*/
global $theme_options;

if( isset($theme_options['searchpg-post-type-private-records']) && 
	$theme_options['searchpg-post-type-private-records'] ==  true ) {
	$post_access_CSS = '';
} else {
	$post_access_CSS = 'none';
}

if( $theme_options['searchpg-sidebar'] == true ) {
	$col = 8;
	if( $theme_options['theme_widget_width_size_global'] == 1 ) {
		$col = 9;
	}
} else { 
	$col = 12;
}
echo '<div class="container content-wrapper body-content">
	  <div class="row margin-top-btm-50">
	  <div class="col-md-'.$col.' col-sm-12 rtl-searchpg">';
	  
		if ( have_posts() ) : 
		// Start the loop.
		while ( have_posts() ) : the_post();
			$post_type = get_post_type( get_the_ID() );
			$post_access_display = '';
			
			/*******************
			** DOCUMENTATION  **
			********************/
			if( $post_type == "manual_documentation" ) {
				//access control check for category
				$terms = get_the_terms( get_the_ID() , 'manualdocumentationcategory' ); 
				$check_if_login_call = get_option( 'doc_cat_check_login_'.$terms[0]->term_id );
				$check_user_role = get_option( 'doc_cat_user_role_'.$terms[0]->term_id );
				if( $check_if_login_call == 1 && !is_user_logged_in() ) {
					$post_access_display = $post_access_CSS;
				} else {
					$access_status = manual_doc_access($check_user_role);
					if( $check_if_login_call == 1 && is_user_logged_in() && $access_status == false ) { 
						$post_access_display = $post_access_CSS;
					} else {
						// check for single page
						$access_meta = get_post_meta( get_the_ID(), 'doc_single_article_access', true );
						$check_post_user_level_access = get_post_meta( get_the_ID(), 'doc_single_article_user_access', true );
						if( isset($access_meta['login']) && $access_meta['login'] == 1 && !is_user_logged_in() ) {
							$post_access_display = $post_access_CSS;
						} else {
							if( !empty($check_post_user_level_access) )  $access_status = manual_doc_access(serialize($check_post_user_level_access));
							else  $access_status = true;
							
							if(  isset($access_meta['login']) && $access_meta['login'] == 1 && is_user_logged_in() && $access_status == false ) {
								$post_access_display = $post_access_CSS;
							} else {
								$post_access_display = '';
							}
						}
						// eof single page check 
					}
				} 
				
				
			/*******************
			** KNOWLEDGEBASE  **
			********************/
			}  else if ( $post_type == "manual_kb" ) {
				//access control check for category
				$terms = get_the_terms( get_the_ID() , 'manualknowledgebasecat' ); 
				$check_if_login_call = get_option( 'kb_cat_check_login_'.$terms[0]->term_id );
				$check_user_role = get_option( 'kb_cat_user_role_'.$terms[0]->term_id );
				if( $check_if_login_call == 1 && !is_user_logged_in() ) {
					$post_access_display = $post_access_CSS;
				} else {
					$access_status = manual_doc_access($check_user_role);
					if( $check_if_login_call == 1 && is_user_logged_in() && $access_status == false ) { 
						$post_access_display = $post_access_CSS;
					} else {
						// check for single page
						$access_meta = get_post_meta( get_the_ID(), 'doc_single_article_access', true );
						$check_post_user_level_access = get_post_meta( get_the_ID(), 'doc_single_article_user_access', true );
						if( isset($access_meta['login']) && $access_meta['login'] == 1 && !is_user_logged_in() ) {
							$post_access_display = $post_access_CSS;
						} else {
							if( !empty($check_post_user_level_access) )  $access_status = manual_doc_access(serialize($check_post_user_level_access));
							else  $access_status = true;
							
							if(  isset($access_meta['login']) && $access_meta['login'] == 1 && is_user_logged_in() && $access_status == false ) {
								$post_access_display = $post_access_CSS;
							} else {
								$post_access_display = '';
							}
						}
						// eof single page check 
					}
				} 
				
				
			/****************
			**    FAQ      **
			*****************/
			}  else if ( $post_type == "manual_faq" ) {
				//access control check for category
				$terms = get_the_terms( get_the_ID() , 'manualfaqcategory' ); 
				$check_if_login_call = get_option( 'doc_cat_check_login_'.$terms[0]->term_id );
				$check_user_role = get_option( 'doc_cat_user_role_'.$terms[0]->term_id );
				if( $check_if_login_call == 1 && !is_user_logged_in() ) {
					$post_access_display = $post_access_CSS;
				} else {
					$access_status = manual_doc_access($check_user_role);
					if( $check_if_login_call == 1 && is_user_logged_in() && $access_status == false ) { 
						$post_access_display = $post_access_CSS;
					} else {
						// check for single page
						$post_access_display = '';
						// eof single page check 
					}
				} 
				//eof access control check for category 
			} 
			
			if($post_access_display == '') get_template_part( 'template/content', 'searchrecords' );
			
		endwhile;
		// Previous/next page navigation.
		the_posts_pagination( array(
			'prev_text'          => esc_html__( '&lt;', 'manual' ),
			'next_text'          => esc_html__( '&gt;', 'manual' ),
		) );
	// If no content, include the "No posts found" template.
	else :
		if( isset($theme_options['manual_searchpg_no_result_text_message']) && $theme_options['manual_searchpg_no_result_text_message'] != '' ) {
			echo esc_html($theme_options['manual_searchpg_no_result_text_message']);
		}
	endif;

	echo '<div class="clearfix"></div>
          </div>';

?>