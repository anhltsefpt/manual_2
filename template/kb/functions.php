<?php 
/*-----------------------------------------------------------------------------------*/
/*	MANUAL KB :: META SECTION
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'manual__kb_belowtitle_meta_section' ) ) {
	function manual__kb_belowtitle_meta_section($postID, $post_author){
	global $theme_options;
		
	echo '<p class="entry-meta">'; 
    
	// Impression + Like Count
	if( $theme_options['knowledgebase-quick-stats-under-title'] != true ) {
			
		// Impression
		echo '<i class="fa fa-eye"></i> <span>';  
		if( get_post_meta( $postID, 'manual_post_visitors', true ) != '' ) { 
			echo get_post_meta( $postID, 'manual_post_visitors', true );
			echo '&nbsp;'.esc_html($theme_options['custom-record-post-view-text']);
		} else { 
			echo '0&nbsp;'.esc_html($theme_options['custom-record-post-view-text']); 
		} 
		echo '</span>';
		
		// Like count
		echo '<i class="fas fa-thumbs-up"></i> <span>'; 
		if( get_post_meta( $postID, 'votes_count_doc_manual', true ) == '' ) { 
			echo 0; 
		} else { 
			echo get_post_meta( $postID, 'votes_count_doc_manual', true ); 
		} 
		echo '</span>';
			
	}
	
	// Calender + Modified Date + Author
	if( isset($theme_options['kb-singlepg-display-style']) && $theme_options['kb-singlepg-display-style'] == 1 ) {	
	
		// Calender
		if( $theme_options['kb-singlepg-publish-date-status'] == true ) {
			echo '<i class="far fa-calendar-alt"></i> <span>';  
			echo get_the_date( get_option('date_format'), $postID ); echo '</span>';
		}
		// Modified Date
		 if( $theme_options['kb-singlepg-modified-date-status'] == true ) {
			if (get_post_modified_time(get_option('date_format'),'',$postID) != get_the_time(get_option('date_format'),$postID) ) { 
				echo '<i class="far fa-calendar-plus"></i> <span>'.$theme_options['date-modified-text'].' '.get_post_modified_time(get_option('date_format'),'',$postID).'</span>';
			} 
		} 
		// Author
		if( $theme_options['kb-disable-doc-author-name'] == true ) {
			echo '<i class="fa fa-user"></i> <span>';  
			$author_id = $post_author; 
			echo the_author_meta( $theme_options['kb-single-post-user-name'] , $author_id ); 
			echo '</span>';
		}
	
	}
		
	// Print Icon
	if( $theme_options['kb-single-pg-print-status'] == true ) {
		if (class_exists('WP_Print_O_Matic') || class_exists('WP_Print_Pro_Matic')) { 
			echo do_shortcode('[print-me printstyle="pom-small-grey" tag="span" target=".title-content-print"]'); 
		}
	}
	
	// Edit Icon
	edit_post_link( esc_html__( 'Edit', 'manual' ), '<span></span><i class="fa fa-edit"></i> <span class="edit-link kb-single-pg">', '</span>' ); 
	echo '</p>';		
		
		
	}
}


/*-----------------------------------------------------------------------------------*/
/*	MANUAL KB :: META SECTION
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'manual__kb_catag_belowtitle_meta_section' ) ) {
	function manual__kb_catag_belowtitle_meta_section($postID){
	global $theme_options;
		echo '<p class="entry-meta">'; 
		if( $theme_options['knowledgebase-cat-quick-stats-under-title'] == false ) {
			
			// Impression
			echo '<i class="fa fa-eye"></i> <span>';  
			if( get_post_meta( $postID, 'manual_post_visitors', true ) != '' ) { 
				echo get_post_meta( $postID, 'manual_post_visitors', true );
				echo '&nbsp;'.esc_html($theme_options['custom-record-post-view-text']);
			} else { 
				echo '0&nbsp;'.esc_html($theme_options['custom-record-post-view-text']); 
			} 
			echo '</span>';
			
			// Calender
			echo '<i class="far fa-calendar-alt"></i> <span>';  
			echo get_the_date( get_option('date_format'), $postID ); echo '</span>';
			
			
		}
		echo '</p>';
	}
}
?>