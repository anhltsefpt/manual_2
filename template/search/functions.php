<?php 
/*-----------------------------------------------------------------------------------*/
/*	STANDARD HEADER SEARCH FORM
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual__standard_search_form')) {
	function manual__standard_search_form() {
		global $theme_options;
		
		if($theme_options['theme_search_box_search_bottom'] == true) { 
			$search_box_css = 'no_buttom';
		} else { 
			$search_box_css = '';
		}
		
		echo '<input type="hidden" id="oldplacvalue" value="'.esc_html($theme_options['global-search-text-paceholder']).'">';
		echo '<form role="search" method="get" id="searchform" class="searchform" action="'.esc_url( home_url( '/' ) ).'">';
		echo '<i class="fa fa-search livesearch"></i> <div class="form-group">';
		echo '<input type="text"  placeholder="'.esc_html($theme_options['global-search-text-paceholder']).'" value="'.get_search_query().'" name="s" id="s" class="form-control header-search '.$search_box_css.' " />';
		
		$display_on_forum_page = '';
		if( $theme_options['manual-trending-post-type-search-status-on-forum-pages'] == false ) {
			$is_plugin_active = manual__plugin_active('bbpress');
			if( $is_plugin_active == true ){
				if( get_post_type() == 'forum' || get_post_type() == 'topic' || bbp_is_user_home() ) $display_on_forum_page = 1;
			}
		} else {
			 $display_on_forum_page = 2;
		}
		if ( $theme_options['manual-trending-post-type-search-status'] == true && ($display_on_forum_page != 1) ){ 
			echo '<select class="search-expand-types" name="post_type" id="search_post_type">';
			echo ' <option value="">'.$theme_options['manual-post-type-search-text-inital'].'</option>';
			foreach ( $theme_options['manual-search-post-type-multi-select']  as $post_type ) {
				
				if( $post_type == 'manual_ourteam' ||
				   $post_type == 'manual_tmal_block' ||
				   $post_type == 'manual_org_block' ||
				   $post_type == 'manual_hp_block'  ||
				   $post_type == 'reply' || $post_type == 'lp_quiz' || $post_type == 'lp_lesson' || $post_type == 'lp_course' ||
				   $post_type == 'topic' ) { continue; }
				   
				if( $post_type == 'attachment' ) { $new_name = esc_html($theme_options['manual-post-type-search-dropdown-media']);   
				} else if( $post_type == 'forum' ) { $new_name = esc_html($theme_options['manual-post-type-search-dropdown-forums']);   
				} else if( $post_type == 'manual_kb' ) { $new_name = esc_html($theme_options['manual-post-type-search-dropdown-kb']);    
				} else if( $post_type == 'manual_faq' ) { $new_name = esc_html($theme_options['manual-post-type-search-dropdown-faq']);    
				} else if( $post_type == 'manual_portfolio' ) { $new_name = esc_html($theme_options['manual-post-type-search-dropdown-portfolio']);    
				} else if( $post_type == 'manual_documentation' ) { $new_name = esc_html($theme_options['manual-post-type-search-dropdown-documentation']); 
				} else if( $post_type == 'page' ) { $new_name = esc_html($theme_options['manual-post-type-search-dropdown-page']);   
				} else if( $post_type == 'post' ) { $new_name = esc_html($theme_options['manual-post-type-search-dropdown-post']);   
				} else {
					$post_type_label = get_post_type_object( $post_type );
					$new_name = $post_type_label->label;
				}
				
				if( isset($_GET['post_type']) && $_GET['post_type'] == $post_type ) $select = 'selected';
				else $select = '';
				
				echo ' <option '.$select.' value="'. $post_type .'">' . $new_name . '</option>';
				
			}
			echo ' </select>';
		} else {
			echo '<input type="hidden" value="" name="post_type" id="search_post_type">';
		}
		
		// translation search url fix
		$ajax_live_search_url = home_url('/'); 
		$ajax_live_search_url_query_str = parse_url($ajax_live_search_url, PHP_URL_QUERY);
		if($ajax_live_search_url_query_str != '' ) {
			parse_str($ajax_live_search_url_query_str, $url_result);
			foreach( $url_result as $key=>$val ) {
				echo '<input type="hidden" value="'.$val.'" name="'.$key.'" id="search_post_type">';
			}
		}
		// eof translation search url fix
		
		if($theme_options['theme_search_box_search_bottom'] == false) {
		echo '<input type="submit" class=" button button-custom" value="'.esc_html($theme_options['global-buttom-search-text-paceholder']?$theme_options['global-buttom-search-text-paceholder']:'Search').'">';
		}
		
		echo '</div></form>';
		
		manual_trending_search();
		
	}
}


/*-----------------------------------------------------------------------------------*/
/*	MANUAL :: TRENDING SEARCH
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual_trending_search')) {
	function manual_trending_search() {
		global $theme_options;
		
		$search_keywords = array();
		if( isset($theme_options['manual-trending-live-search-status']) && $theme_options['manual-trending-live-search-status'] == true ){ 
			echo '<div class="trending-search">';
			if( isset($theme_options['manual-trending-text']) ){ 
				echo '<span class="popular-keyword-title">'.esc_html($theme_options['manual-trending-text']).'</span>';  
			}  
			if( isset($theme_options['manual-three-trending-search-text']) ) {
				foreach( $theme_options['manual-three-trending-search-text'] as $val ) {
					if( empty($val) ) continue;
					$search_keywords[] = '<a href="" class="trending-search-popular-keyword">'.$val.'</a>';
				}
				echo implode('<span class="comma">,</span> ', $search_keywords );
			}
			echo '</div>';
			
		}
	}
}


/*-----------------------------------------------------------------------------------*/
/*	MANUAL :: LIVE SEARCH RESULT
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'manual__live_search_result' ) ) {
function manual__live_search_result() {
global $theme_options;
	if (have_posts()) {
		
		echo '<ul class="manual-searchresults">';
		// While Loop
		while (have_posts()) { the_post();
				$post_type = get_post_type( get_the_ID() );
				
				$post_access_display = '';
				if( $post_type == "manual_documentation" ) {
					$new_class = 'live_search_doc_icon';
					$post_access_display = manual_search_content_access_control(get_the_ID(), 'manualdocumentationcategory','doc_cat_check_login_', 'doc_cat_user_role_','doc_single_article_access','doc_single_article_user_access');
				} else if ( $post_type == "manual_faq" ) {
					$new_class = 'live_search_faq_icon';
					$post_access_display = manual_search_content_access_control(get_the_ID(), 'manualfaqcategory','doc_cat_check_login_', 'doc_cat_user_role_','doc_single_article_access','doc_single_article_user_access');
				} else if ( $post_type == "manual_kb" ) {
					$new_class = 'live_search_kb_icon';
					$post_access_display = manual_search_content_access_control(get_the_ID(), 'manualknowledgebasecat','kb_cat_check_login_', 'kb_cat_user_role_','doc_single_article_access','doc_single_article_user_access');
				} else if ( $post_type == "forum" ) {
					$new_class = 'live_search_forum_icon';
				} else if ( $post_type == "manual_portfolio" ) {
					$new_class = 'live_search_portfolio_icon';
				} else if ( $post_type == "attachment" ) {
					$new_class = 'live_search_attachment_icon';
				} else if ( $post_type == "post" ) {
					$new_class = 'live_search_post_icon';
				} else if ( $post_type == "lp_quiz" ) {
					$new_class = 'live_search_lp_quiz_icon';
				} else if ( $post_type == "lp_lesson" ) {
					$new_class = 'live_search_lp_lesson_icon';
				} else if ( $post_type == "lp_course" ) {
					$new_class = 'live_search_lp_course_icon';
				} else {
					$new_class = '';
				}
				
				echo '<li class="'.$new_class.'" style="display:'.$post_access_display.';">';
				echo '<a href="'.get_the_permalink().'">';
				echo get_the_title();
				manual_live_search_navigation(get_the_ID(), $post_type);
				echo '</a>';
				echo '</li>';
				
		} // Eof while loop
		
		echo '<li class="manual-searchresults-showall">';
		
		// translation search url fix
		$ajax_live_search_url = home_url('/'); 
		$ajax_live_search_url_query_str = parse_url($ajax_live_search_url, PHP_URL_QUERY);
		$only_site_url = preg_replace('/\\?.*/', '', $ajax_live_search_url);
		if($ajax_live_search_url_query_str != '' ) {
			$live_search_final_url = $only_site_url.'?'.$ajax_live_search_url_query_str.'&s=';
		} else {
			$live_search_final_url = $only_site_url.'?s=';
		}
		echo '<a href="'.$live_search_final_url.get_search_query().'&post_type='.$_GET['post_type'].'">'.$theme_options['global-showall-search-text-paceholder'].'</a></li>';
		echo '</ul>';
		
	} else {
		
		echo '<ul class="manual-searchresults">';
		echo '<li class="manual-searchresults-noresults">'. esc_attr($theme_options['global-noresult-search-text-paceholder']) .'</li>';
		echo '</ul>';
		
	}
	
}
}

/*-----------------------------------------------------------------------------------*/
/*	MANUAL :: LIVE SEARCH - DISPLAY NAVIGATION
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual_live_search_navigation')) {
	function manual_live_search_navigation($getID, $post_type) { 
	global $theme_options;
		if( $theme_options['manual-live-search-post-navigation-status'] == true ) {
		 echo '<div class="live_search_navigation">';
		 			if( $post_type == 'post') {
						$categories = get_the_category( $getID );
						$count_cat_loop = count($categories);
						if ( ! empty( $categories ) ) {
							$i = 0;
							foreach( $categories as $category ) {
								if($i == 1 && $count_cat_loop > $i ) { echo ', ...'; break; }
								echo 'Post / '.$category->name;
								$i++;
							}
						}
					} else if( $post_type == 'manual_documentation' || $post_type == 'manual_faq' || $post_type == 'manual_kb' || $post_type == 'manual_portfolio'  ) {
						if( $post_type == 'manual_documentation') { 
							$categories = get_the_terms( $getID, 'manualdocumentationcategory' );
							$breadcrumb_name = $theme_options['doc-breadcrumb-name'];
						} else if( $post_type == 'manual_faq') { 
							$categories = get_the_terms( $getID, 'manualfaqcategory' );
							$breadcrumb_name = $theme_options['faq-breadcrumb-name'];
						} else if( $post_type == 'manual_portfolio') { 
							$categories = get_the_terms( $getID, 'manualportfoliocategory' );
							$breadcrumb_name = $theme_options['portfolio-breadcrumb-name'];
						} else { 
							$categories = get_the_terms( $getID, 'manualknowledgebasecat' );
							$breadcrumb_name = $theme_options['kb-breadcrumb-name'];
						}
						
						if( is_array($categories) ) {
							$count_cat_loop = count($categories);
							if ( ! empty( $categories ) ) {
								$i = 0;
								foreach( $categories as $category ) {
									if($i == 1 && $count_cat_loop > $i ) { echo ', ...'; break; }
									echo esc_html($breadcrumb_name).' / '.$category->name;
									$i++;
								}
							}
						}
						
					} else {
						echo esc_html($post_type).': #'.get_the_title();
					}
			echo '</div>';
		}
	}
}

/*-----------------------------------------------------------------------------------*/
/*	INLINE SEARCH FORM
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual__inlinesearch_form')) {
	function manual__inlinesearch_form($placeholder, $post_info) {
		$current_pgid = get_queried_object_id();
		$current_pgurl = get_permalink( $current_pgid );
		$return = '';
		$return .= '<div class="inlinesearch_formwrap">';
		$return .= '<form role="search" method="get" id="searchform" class="searchform" action="'.esc_url( home_url( '/' ) ).'">';
		//$return .= '<i class="fa fa-search livesearch"></i>';
		$return .= '<input type="hidden" value="'.$post_info.'" name="post_type" id="search_post_type">';
		$return .= '<input type="text" placeholder="'.esc_html($placeholder).'" value="'.get_search_query().'" name="s" id="s" class="inlinesearchbox"/>';
		$return .= '</form>';
		$return .= '</div>';
		return $return;
	}
}
?>