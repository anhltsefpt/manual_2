<?php 

/*-----------------------------------------------------------------------------------*/
/*	MANUAL :: HEADER LOGO
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual_global_header')) {
	function manual_global_header() {
		global $theme_options;
		
		if( isset($theme_options['theme-custom-site-url']) && $theme_options['theme-custom-site-url'] != '' ) { 
			$custom_site_url = $theme_options['theme-custom-site-url'];
		} else {
			$custom_site_url = home_url('/');
		}
		
		if( $theme_options['hide-header-logo-status'] == false ) { 
		
			echo '<a class="navbar-brand" href="'.esc_url( $custom_site_url ).'">';
			
			if( isset($theme_options['theme-header-logo']['url']) && $theme_options['theme-header-logo']['url'] != '' ) { 
				$logo_url = esc_url($theme_options['theme-header-logo']['url']); 
			} else { 
				$logo_url = get_template_directory_uri().'/img/logo-dark.png'; 
			}
			
			if( isset($theme_options['theme-nav-homepg-logo-when-img-bg']['url']) && $theme_options['theme-nav-homepg-logo-when-img-bg']['url'] != '' ) {
				$white_url = esc_url($theme_options['theme-nav-homepg-logo-when-img-bg']['url']);
			} else {
				$white_url = get_template_directory_uri().'/img/logo-home.png';  
			}
			
			echo '<img src="'.esc_url( $logo_url ).'" class="pull-left custom-nav-logo home-logo-show">'; 
			echo '<img src="'.esc_url( $white_url ).'" class="pull-left custom-nav-logo inner-page-white-logo">'; 
			
			echo '</a>';
			
       } 
		
	}
}


/*-----------------------------------------------------------------------------------*/
/*	MANUAL :: BBPRESS SEARCH HACK
/*-----------------------------------------------------------------------------------*/

/**
 * Include bbPress 'topic' custom post type in WordPress' search results
 */
if (!function_exists('manual_bbp_topic_search')) { 
	function manual_bbp_topic_search( $topic_search ) {
		$topic_search['exclude_from_search'] = false;
		return $topic_search;
	}
	add_filter( 'bbp_register_topic_post_type', 'manual_bbp_topic_search' );
}

/**
 * Include bbPress 'reply' custom post type in WordPress' search results
 */
if (!function_exists('manual_bbp_reply_search')) {
	function manual_bbp_reply_search( $reply_search ) {
		$reply_search['exclude_from_search'] = false;
		return $reply_search;
	}
	add_filter( 'bbp_register_reply_post_type', 'manual_bbp_reply_search' );
}

/**
 * Include bbPress 'forum' custom post type in WordPress' search results 
 */
if (!function_exists('manual_bbp_forum_search')) {
	function manual_bbp_forum_search( $forum_search ) {
		$forum_search['exclude_from_search'] = false;
		return $forum_search;
	}
	add_filter( 'bbp_register_forum_post_type', 'manual_bbp_forum_search' );
}


/*-----------------------------------------------------------------------------------*/
/*	MANUAL :: LIVE SEARCH URL PROCESS
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual_site_root_url_process')) {
	function manual_site_root_url_process() {
		$ajax_live_search_url = home_url('/'); 
		$ajax_live_search_url_query_str = parse_url($ajax_live_search_url, PHP_URL_QUERY);
		$only_site_url = preg_replace('/\\?.*/', '', $ajax_live_search_url);
		if($ajax_live_search_url_query_str != '' ) {
			$live_search_final_url = $only_site_url.'?'.$ajax_live_search_url_query_str.'&ajax=on&s=';
		} else {
			$live_search_final_url = $only_site_url.'?ajax=on&s=';
		}
		return $live_search_final_url;
	}
}

/*-----------------------------------------------------------------------------------*/
/*	MANUAL :: SEARCH HIGHLIGHTER
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual__highlight_results')) {
	function manual__highlight_results($text){ 
		 if(is_search() && !is_admin()){
			 // grab search "s"
			 $keys = get_search_query();
			 $keys = explode(" ",preg_quote($keys));
			 $keys = array_filter($keys);
			 $regEx = '\'(?!((<.*?)|(<a.*?)))(\b'. implode('|', $keys) . '\b)(?!(([^<>]*?)>)|([^>]*?</a>))\'iu';
			 $text = preg_replace($regEx, '<strong class="search-highlight">\0</strong>', $text);
		 }
		 echo ''.$text;
	}
}


/*-----------------------------------------------------------------------------------*/
/*	MANUAL RESPONSIVE LAYOUT "BAR ICON REPLACEMENT"
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual_responsive_layout_bar_icon_replacement')) {
	function manual_responsive_layout_bar_icon_replacement() { 
		global $theme_options;
		if( $theme_options['theme-responsive-bar-icon-replacement'] == false ) { 
			$barname = 'fa fa-bars';
			$replacement_html_text = $css_call = '';
		} else { 
			$barname = ''; 
			$replacement_html_text = $theme_options['theme-responsive-bar-icon-replacement-text'];
			$css_call = 'style="font-style:normal;cursor:pointer;color:#FFFFFF;font-weight:'.$theme_options['first-level-menu-weight'].';font-size:'.$theme_options['first-level-menu-font-size'].'px;text-transform:'.$theme_options['first-level-menu-text-transform'].'"';
		}
		echo '<i class="'.$barname.' navbar-toggle" '.$css_call.'>'.$replacement_html_text.'</i>';
	}
}


/*-----------------------------------------------------------------------------------*/
/*	MANUAL :: ADVANCE SEARCH
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual__custompostsearch_procesing')) {
	function manual__custompostsearch_procesing( $search, $wp_query ) {
		global $wpdb, $theme_options;
		
		$search_queryvar = $wp_query->query_vars;
		$n = !empty($search_queryvar['exact']) ? '' : '%';
		$search = $searchand = '';
		
		// IF, Search Query NOT Empty
		if ( ! empty( $search_queryvar['s'] ) ) {
			$countsearch_term = count($search_queryvar['search_terms']);
			foreach ((array)$search_queryvar['search_terms'] as $term ) {
				$OR = '';
				$term = $n . $wpdb->esc_like( $term ) . $n;
				
				$search .= "{$searchand} (";
							 
					// Default: search post title
					$search .= $wpdb->prepare("($wpdb->posts.post_title LIKE '%s')", $term);
					$OR = ' OR ';
					
					// If content search is enabled
					if( isset($theme_options['general_livesearch_settings']['2']) && $theme_options['general_livesearch_settings']['2'] == 1 ) { 
						$search .= $OR;
						$search .= $wpdb->prepare("($wpdb->posts.post_content LIKE '%s')", $term);
						$OR = ' OR ';
					}
					
					// If excerpt search is enabled
					if( isset($theme_options['general_livesearch_settings']['3']) && $theme_options['general_livesearch_settings']['3'] == 1 ) { 
						$search .= $OR;
						$search .= $wpdb->prepare("($wpdb->posts.post_excerpt LIKE '%s')", $term);
						$OR = ' OR ';
					}
					
					// If taxonomies search is enabled
					if (!empty($theme_options['multi_texonomies_livesearch_settings'])) {
							$tax_OR = '';
							foreach ($theme_options['multi_texonomies_livesearch_settings'] as $tax ) { 
								$search .= $OR;
								$search .= $wpdb->prepare("$tax_OR (estt.taxonomy = '%s' AND est.name LIKE '%s')", $tax, $term);
								$OR = '';
								$tax_OR = ' OR ';
							}
							$OR = ' OR ';
					}
					
					// If authors search is enabled - {keep this author search last}
					if ($theme_options['advance-livesearch-in-authors'] == true) {
						$search .= $OR;
						$search .= $wpdb->prepare("(esusers.display_name LIKE '%s')", $term);
					}
					
				$search .= ")";
			
			 if( $countsearch_term > 1 ) $searchand = " ".$theme_options['adv-search-terms-relation-type']. " "; // Dynamic: AND/OR
			 
			}
		}
		
		if ( !empty( $search ) ) {
			$search = " AND ({$search}) ";
		}
		
		/* Join Table */
        add_filter('posts_join_request', 'manual__search_join_table');
		
		/* Request distinct results */
		add_filter('posts_distinct_request', 'manual__search_distinct');
		
		/*  Now return everything to wp. */
		return apply_filters('manual__posts_search', $search, $wp_query); 	  
	}
}

function manual__search_distinct($distinct) {
	$distinct = 'DISTINCT';
	return $distinct;
}

function manual__search_join_table($join){
	global $wpdb, $theme_options;
	
	//Join taxonomies table
	if( !empty($theme_options['multi_texonomies_livesearch_settings']) ) {
		$join .= " LEFT JOIN $wpdb->term_relationships estr ON ($wpdb->posts.ID = estr.object_id) ";
		$join .= " LEFT JOIN $wpdb->term_taxonomy estt ON (estr.term_taxonomy_id = estt.term_taxonomy_id) ";
		$join .= " LEFT JOIN $wpdb->terms est ON (estt.term_id = est.term_id) ";
	}
	
	// Joint the users table
	if ($theme_options['advance-livesearch-in-authors'] == true) {
		$join .= " LEFT JOIN $wpdb->users esusers ON ($wpdb->posts.post_author = esusers.ID) ";
	}
	
	return $join;
}


if (!function_exists('manual__customsearch_query')) {
	function manual__customsearch_query() {
		if ( !is_admin() ) {
			  /* Filter to modify search query */
			  add_filter('posts_search', 'manual__custompostsearch_procesing', 500, 2);
			  /* Action for modify query arguments */
			  add_action( 'pre_get_posts' , 'manual__customsearch_pre_get_posts', 500);
		}
	}
	add_action('init', 'manual__customsearch_query');
}

function manual__customsearch_pre_get_posts($query) {
	global $theme_options;
	if (!empty($query->is_search)) {
		
		//Filter search result
		if (is_search() && ( isset($theme_options['searchpg-result-display-orderby']) ||  
							 isset($theme_options['searchpg-records-per-page']) || 
							 isset($theme_options['searchpg-result-display-order']) 
							 ) ) { 
			$query->set('orderby', $theme_options['searchpg-result-display-orderby']);
			$query->set('posts_per_page', $theme_options['searchpg-records-per-page'] );
			$query->set('order', $theme_options['searchpg-result-display-order']); 
		}
		
		//Set post types
		if (!empty($theme_options['manual-default-search-type-multi-select'])) {
			if (isset($_GET['post_type']) && $_GET['post_type'] != '') {
				$query->query_vars['post_type'] = (array) esc_attr($_GET['post_type']);
			} else { 
				$query->query_vars['post_type'] = (array) $theme_options['manual-default-search-type-multi-select'];
			}
        } else {
			if (isset($_GET['post_type']) && $_GET['post_type'] != '') {
				$query->query_vars['post_type'] = (array) esc_attr($_GET['post_type']);
			}	
		}
		
		//Set date query to exclude resutls
		if (!empty($theme_options['advance-search-exclude-older-result'])) { 
			$date = explode( '/', $theme_options['advance-search-exclude-older-result'] );
			$query->set('date_query', array(
				    array(
						'after' => array(
										'year' => $date[2],
										'month' => $date[0],
										'day' => $date[1],
									),
						'inclusive' => true,
					)
			));
		}
		
		//If searching for attachment type then set post status to inherit
	    if ( is_array( $query->get( 'post_type' ) ) && in_array( 'attachment', $query->get( 'post_type' ) ) ) {
			$query->set( 'post_status', array( 'publish', 'inherit' ) );
			if ( is_user_logged_in() ) {
				$query->set( 'post_status', array( 'publish', 'inherit', 'private' ) );
				$query->set( 'perm', 'readable' ); //Check if current user can read private posts
			}
	    }
		
		//Set exact match
	    if ( $theme_options['adv-search-match-exact-type'] == 'yes' ) {
			$query->set( 'exact', true );
			$query->set( 'sentence', true );
	    }
		
	}
}
/*-----------------------------------------------------------------------------------*/
/*	MANUAL :: DOCUMENTATION ACCESS CONTROL
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual_doc_access')) {
	function manual_doc_access($check_user_role) {
		if ( is_user_logged_in() &&  $check_user_role != '' && !is_super_admin() ) {  
			$value = '';
			$check_roles = unserialize($check_user_role);
			$current_user = wp_get_current_user();
			$wp_role = $current_user->roles;
			foreach ($wp_role as $role_value => $role_name) {
				if ( in_array($role_name, $check_roles) ) {
					$value = 1;
				} else {
					continue;	
				}
			}
			if( $value == 1 ) return true;
			else return false;
		}
		return true;
	}
}


/*-----------------------------------------------------------------------------------*/
/*	MANUAL :: FOOTER
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual_footer_notification_msg')) {
	function manual_footer_notification_msg($hide){
		global $theme_options;
		$notification_background = '';
		
		if( $theme_options['footer-notification-status'] == true ) {
			if( !empty($theme_options['footer-notification-bar-background-img']['url']) ) { 
				$notification_background = 'background-image:url('.$theme_options['footer-notification-bar-background-img']['url'].');background-size: cover; background-position: center;';
			} else { 
				if( isset($theme_options['footer-notification-bar-bg-color']['rgba']) && $theme_options['footer-notification-bar-bg-color']['rgba'] != '' ) { 
					$notification_background = 'background:'.$theme_options['footer-notification-bar-bg-color']['rgba'].';';
					if( isset($theme_options['footer-notification-bar-linear-gradient-color']['rgba']) && 
						      $theme_options['footer-notification-bar-linear-gradient-color']['rgba'] != '' ) {
							  $notification_background .= 'background: -moz-linear-gradient(-45deg, '.$theme_options['footer-notification-bar-bg-color']['rgba'].' 35%, '.$theme_options['footer-notification-bar-linear-gradient-color']['rgba'].' 100%); background: -webkit-linear-gradient(-45deg, '.$theme_options['footer-notification-bar-bg-color']['rgba'].' 35%,'.$theme_options['footer-notification-bar-linear-gradient-color']['rgba'].' 100%); background: linear-gradient(135deg, '.$theme_options['footer-notification-bar-bg-color']['rgba'].' 35%,'.$theme_options['footer-notification-bar-linear-gradient-color']['rgba'].' 100%);';
					}
				}
			}
			
			if( $hide == 1 && isset( $theme_options['footer-text'] ) && $theme_options['footer-text'] != '' ) {
			echo '<div id="footer-info" >
				  <div class="bg-color" style="'.$notification_background.'">
					<div class="container">
					  <div class="row  text-padding" style="margin:'.$theme_options['footer-notification-bar-text-margin'].'px 0px">
						<div class="col-md-12 col-sm-12 footer-msg-bar">';
						 if( isset($theme_options['footer-text']) && $theme_options['footer-text'] != '') { echo wp_kses_post($theme_options['footer-text']); }
				   echo '</div>
					  </div>
					</div>
				  </div>
				</div>';
			}
		}
	}
}

if (!function_exists('manual_footer_controls')) {
	function manual_footer_controls(){
		global $theme_options, $post;
		
		$current_post_type = get_post_type();
		if($current_post_type == 'manual_documentation' && !is_search() ) {
			if( $theme_options['documentation-notification-bar-global'] == true ) manual_footer_notification_msg(2);
			else manual_footer_notification_msg(1);
			
		} else if($current_post_type == 'manual_kb' && !is_search() ) { 
			if( $theme_options['kb-hide-notification-bar'] == true ) manual_footer_notification_msg(2);
			else manual_footer_notification_msg(1);
			
		} else {  
			manual_footer_notification_msg(2);
		}
		
	}
}


/*-----------------------------------------------------------------------------------*/
/*	MANUAL :: SOCIAL SHARE CONTROL POST
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual_social_share')) {
	function manual_social_share($url){
		global $theme_options;
		if( isset($theme_options['theme-social-box']) && $theme_options['theme-social-box'] == true ) {
			if( isset($theme_options['theme-social-box-mailto-subject']) ){
				$mailto = $theme_options['theme-social-box-mailto-subject'];
			} else {
				$mailto = '';
			}
			
		?>
		<div class="social-box">
		<?php 
		if( !empty($theme_options['theme-social-share-displaycrl-status']) ) {
			foreach ( $theme_options['theme-social-share-displaycrl-status'] as $key => $value ) {
				if( $key == 'linkedin' && $value == 1 ) {
					echo '<a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;url='.$url.'"><i class="fab fa-linkedin-in social-share-box"></i></a>';
				} 
				if( $key == 'twitter' && $value == 1 ) {
					echo '<a target="_blank" href="https://twitter.com/intent/tweet?url='.$url.'"><i class="fab fa-twitter social-share-box"></i></a>';
				}
				if( $key == 'facebook' && $value == 1 ) {
					echo '<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='.$url.'" title="facebook"><i class="fab fa-facebook-f social-share-box"></i></a>';
				}
				if( $key == 'pinterest' && $value == 1 ) {
					echo '<a target="_blank" href="https://pinterest.com/pin/create/button/?url='. $url .'&media=&description="><i class="fab fa-pinterest-p social-share-box"></i></a>';
				}
				if( $key == 'google-plus' && $value == 1 ) {
					echo '<a target="_blank" href="https://plus.google.com/share?url='.$url.'"><i class="fab fa-google-plus-g social-share-box"></i></a>';
				}
				if( $key == 'email' && $value == 1 ) {
					echo '<a target="_blank" href="mailto:?Subject='.$mailto.'&body='.$url.'"><i class="far fa-envelope social-share-box"></i></a>';
				}
			} 
		} 
		?>
		</div>
		<?php 
		}
	}
}


if (!function_exists('manual_get_social_share')) {
	function manual_get_social_share($url){
		global $theme_options;
		if( isset($theme_options['theme-social-box']) && $theme_options['theme-social-box'] == true ) {
			if( isset($theme_options['theme-social-box-mailto-subject']) ){
				$mailto = $theme_options['theme-social-box-mailto-subject'];
			} else {
				$mailto = '';
			}
			
		$return = '<div class="social-box">';
		if( !empty($theme_options['theme-social-share-displaycrl-status']) ) {
			foreach ( $theme_options['theme-social-share-displaycrl-status'] as $key => $value ) {
				if( $key == 'linkedin' && $value == 1 ) {
					$return .= '<a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;url='.$url.'"><i class="fab fa-linkedin-in social-share-box"></i></a>';
				} 
				if( $key == 'twitter' && $value == 1 ) {
					$return .= '<a target="_blank" href="https://twitter.com/intent/tweet?url='.$url.'"><i class="fab fa-twitter social-share-box"></i></a>';
				}
				if( $key == 'facebook' && $value == 1 ) {
					$return .= '<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='.$url.'" title="facebook"><i class="fab fa-facebook-f social-share-box"></i></a>';
				}
				if( $key == 'pinterest' && $value == 1 ) {
					$return .= '<a target="_blank" href="https://pinterest.com/pin/create/button/?url='. $url .'&media=&description="><i class="fab fa-pinterest-p social-share-box"></i></a>';
				}
				if( $key == 'google-plus' && $value == 1 ) {
					$return .= '<a target="_blank" href="https://plus.google.com/share?url='.$url.'"><i class="fab fa-google-plus-g social-share-box"></i></a>';
				}
				if( $key == 'email' && $value == 1 ) {
					$return .= '<a target="_blank" href="mailto:?Subject='.$mailto.'&body='.$url.'"><i class="far fa-envelope social-share-box"></i></a>';
				}
			} 
		} 
		$return .= '</div>';
		}
	return $return;	
	}
}


/*-----------------------------------------------------------------------------------*/
/*	MANUAL :: HAMBURGER MENU
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual_css_hamburger_menu_control')) {
	function manual_css_hamburger_menu_control(){
		$hamburger_class = '';
		global $theme_options,$post;
		$current_post_type = get_post_type();
		if( $current_post_type == 'page' || ( $current_post_type == 'page' && is_home() ) || ( $current_post_type == 'post' && is_home() ) ) {
			
			if( ($current_post_type == 'post' && is_home()) ) {
				$postID = get_option('page_for_posts');	
				$page_hamburger_menu = get_post_meta( $postID, '_manual_header_display_hamburger_bar', true );
			} else {
				$page_hamburger_menu = get_post_meta( $post->ID, '_manual_header_display_hamburger_bar', true );
			}
			
			if( $page_hamburger_menu == true ) {
					$hamburger_class = 'hidemenu';
			} else {
				$hamburger_class = '';
			}
			
		} else {
			// Hamburger Menu ON/OFF
			if( $theme_options['activate-hamburger-menu'] == true ) {
				$hamburger_class = 'hidemenu';
			} else {
				$hamburger_class = '';
			}
		}
		return $hamburger_class;
	}
}


if (!function_exists('manual_hamburger_menu_control')) {
	function manual_hamburger_menu_control(){
		global $theme_options, $post;
		$current_post_type = get_post_type();
		
		if( $current_post_type == 'page' || ( $current_post_type == 'page' && is_home() ) || ( $current_post_type == 'post' && is_home() ) ) {
			if( ($current_post_type == 'post' && is_home()) ) {
				$postID = get_option('page_for_posts');	
				$page_hamburger_menu = get_post_meta( $postID, '_manual_header_display_hamburger_bar', true );
				$page_search_on_the_menu = get_post_meta( $postID, '_manual_header_display_search_box_on_menu_bar', true );
			} else {
				$page_hamburger_menu = get_post_meta( $post->ID, '_manual_header_display_hamburger_bar', true );
				$page_search_on_the_menu = get_post_meta( $post->ID, '_manual_header_display_search_box_on_menu_bar', true );
			}
			if( $page_hamburger_menu == true ) {
				echo '<div class="hamburger-menu">
						<span></span> <span></span> <span></span> <span></span>
					 </div>';
				if( $page_search_on_the_menu == true ) {
					 echo '<div class="form-group menu-bar-form col-md-offset-3">';
					 	if( $current_post_type == 'post' && is_home() ) {
							$modern_search_design_header = get_post_meta( $postID, '_manual_header_display_search_box_modern_on_menu_bar', true );
						} else {
							$modern_search_design_header = get_post_meta( $post->ID, '_manual_header_display_search_box_modern_on_menu_bar', true );
						}
						if( $modern_search_design_header == true ) {
							manual_nav_bar_search_normal();
						} else {
							manual__standard_search_form();
						}
					 echo '</div>';
				}
			}
		
		} else {
			// Hamburger Menu ON/OFF
			if( $theme_options['activate-hamburger-menu'] == true ) { 
				echo '<div class="hamburger-menu">
					<span></span> <span></span> <span></span> <span></span>
				</div>';
				
				if( $theme_options['activate-search-box-on-menu-bar'] == true ) {
					 echo '<div class="form-group menu-bar-form col-md-offset-3">';
						if( $theme_options['replace-search-design-with-modern-bar'] == true ) { 
							manual_nav_bar_search_normal();
						} else {
							manual__standard_search_form();
						}
					 echo '</div>';
				}
			}
		} // eof page
	}
}

if (!function_exists('manual_nav_bar_search_normal')) {
	function manual_nav_bar_search_normal(){
		global $theme_options;
        echo '<input type="hidden" id="oldplacvalue" value="'.$theme_options['global-search-text-paceholder'].'">
        <form role="search" method="get" id="searchform_nav" class="searchform" action="'.esc_url( home_url( '/' ) ).'">
          <i class="fa fa-search livesearch"></i>
		  <div class="form-group">
            <input type="text"  placeholder="'.$theme_options['global-search-text-paceholder'].'" value="'.get_search_query().'" name="s" id="s" class="form-control header-search custom-simple-header-search" />
            <input type="hidden" value="" name="post_type" id="search_post_type">
          </div>
        </form>';
	}
}


/*-----------------------------------------------------------------------------------*/
/*	MANUAL :: SOCIAL SHARE CONTROL FOOTER
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual_footer_social_share')) {
	function manual_footer_social_share(){
	global $theme_options;
	if( isset($theme_options['footer-social-twitter']) && $theme_options['footer-social-twitter'] != ''  ) {  ?>
        <li><a href="<?php echo esc_url($theme_options['footer-social-twitter']); ?>" title="Twitter" target="_blank"><i class="fab fa-twitter social-footer-icon"></i></a></li>
        <?php } ?>
        
        <?php if( isset($theme_options['footer-social-facebook']) && $theme_options['footer-social-facebook'] != ''  ) {  ?>
        <li><a href="<?php echo esc_url($theme_options['footer-social-facebook']); ?>" title="Facebook" target="_blank"><i class="fab fa-facebook-f social-footer-icon"></i></a></li>
        <?php } ?>
        
        <?php if( isset($theme_options['footer-social-youtube']) && $theme_options['footer-social-youtube'] != ''  ) {  ?>
        <li><a href="<?php echo esc_url($theme_options['footer-social-youtube']); ?>" title="YouTube" target="_blank"><i class="fab fa-youtube social-footer-icon"></i></a> </li>
        <?php } ?>
        
        <?php if( isset($theme_options['footer-social-google']) && $theme_options['footer-social-google'] != ''  ) {  ?>
        <li><a href="<?php echo esc_url($theme_options['footer-social-google']); ?>" title="Google+" target="_blank"><i class="fab fa-google-plus-g social-footer-icon"></i></a></li>
        <?php } ?>
        
        <?php if( isset($theme_options['footer-social-instagram']) && $theme_options['footer-social-instagram'] != ''  ) {  ?>
        <li><a href="<?php echo esc_url($theme_options['footer-social-instagram']); ?>" title="Instagram" target="_blank"><i class="fab fa-instagram social-footer-icon"></i></a></li>
        <?php } ?>
        
        <?php if( isset($theme_options['footer-social-linkedin']) && $theme_options['footer-social-linkedin'] != ''  ) {  ?>
        <li><a href="<?php echo esc_url($theme_options['footer-social-linkedin']); ?>" title="Linkedin" target="_blank"><i class="fab fa-linkedin-in social-footer-icon"></i></a> </li>
        <?php } ?>
        
        <?php if( isset($theme_options['footer-social-pinterest']) && $theme_options['footer-social-pinterest'] != ''  ) {  ?>
        <li><a href="<?php echo esc_url($theme_options['footer-social-pinterest']); ?>" title="Pinterest" target="_blank"><i class="fab fa-pinterest-p social-footer-icon"></i></a> </li>
        <?php } ?>
        
        <?php if( isset($theme_options['footer-social-vimo']) && $theme_options['footer-social-vimo'] != ''  ) {  ?>
        <li><a href="<?php echo esc_url($theme_options['footer-social-vimo']); ?>" title="Vimo" target="_blank"><i class="fab fa-vimeo-v social-footer-icon"></i></a> </li>
        <?php } ?>
		
		<?php if( isset($theme_options['footer-social-tumblr']) && $theme_options['footer-social-tumblr'] != ''  ) {  ?>
        <li><a href="<?php echo esc_url($theme_options['footer-social-tumblr']); ?>" title="Tumblr" target="_blank"><i class="fab fa-tumblr social-footer-icon"></i></a> </li>
        <?php } ?>
		
		<?php if( isset($theme_options['footer-social-whatsapp']) && $theme_options['footer-social-whatsapp'] != ''  ) {  ?>
        <li><a href="<?php echo esc_url($theme_options['footer-social-whatsapp']); ?>" title="Whatsapp" target="_blank"><i class="fab fa-whatsapp social-footer-icon"></i></a> </li>
        <?php }
		
		
	}
}

/*-----------------------------------------------------------------------------------*/
/*	WOOCOMMERSE ::  REPLACE HEADER CSS
/*-----------------------------------------------------------------------------------*/
function manual_woo_shop_column_css_handler(){
	global $theme_options;
	if( $theme_options['woo_column_product_listing'] == 4  ) {
		echo '@media (max-width:767px) { .woocommerce ul.products li.product{ width: 99%; } }';
	} else if( $theme_options['woo_column_product_listing'] == 3  ) {
		echo '.woocommerce ul.products li.product{ width: 30.7%; } @media (max-width:767px) { .woocommerce ul.products li.product{ width: 99.5%; } }';
	}
}


/*-----------------------------------------------------------------------------------*/
/*	HEX 2 RGB
/*-----------------------------------------------------------------------------------*/ 
if (!function_exists('hex2rgb')) {
	function hex2rgb($hex) {
	   $hex = str_replace("#", "", $hex);
	
	   if(strlen($hex) == 3) {
		  $r = hexdec(substr($hex,0,1).substr($hex,0,1));
		  $g = hexdec(substr($hex,1,1).substr($hex,1,1));
		  $b = hexdec(substr($hex,2,1).substr($hex,2,1));
	   } else {
		  $r = hexdec(substr($hex,0,2));
		  $g = hexdec(substr($hex,2,2));
		  $b = hexdec(substr($hex,4,2));
	   }
	   $rgb = array($r, $g, $b);
	   return $rgb; // returns an array with the rgb values
	}
}


/*-----------------------------------------------------------------------------------*/
/*	VOTING (GLOBAL)  :: LIKE, UNLIKE, RESET  (SUPPORT FUNCTION)
/*-----------------------------------------------------------------------------------*/
$timebeforerevote = 30; // = 30 mins
function manual_hasAlreadyVoted($post_id)
{
    global $timebeforerevote;
 
    // Retrieve post votes IPs
    $meta_IP = get_post_meta($post_id, "voted_IP");
	if (!empty($meta_IP)) {
		$voted_IP = $meta_IP[0];
	} else {
		$voted_IP = '';
	}
     
    if(!is_array($voted_IP))
        $voted_IP = array();
         
    // Retrieve current user IP
    $ip = getenv('REMOTE_ADDR');
     
    // If user has already voted
    if(in_array($ip, array_keys($voted_IP)))
    {
        $time = $voted_IP[$ip];
        $now = time();
         
        // Compare between current time and vote time
        if(round(($now - $time) / 60) > $timebeforerevote)
            return false;
             
        return true;
    }
     
    return false;
}

/*-----------------------------------------------------------------------------------*/
/*	KNOWLEDGEBASE RELATED POST 
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual_kb_related_post')) {
	function manual_kb_related_post() {
		global $post, $theme_options;
		if( isset($theme_options['kb-related-post-per-page']) && $theme_options['kb-related-post-per-page'] != '' ) {
			$posts_per_page = $theme_options['kb-related-post-per-page'];
		} else {
			$posts_per_page = 6;
		}
		$categories = get_the_terms($post->ID, 'manualknowledgebasecat');
		
		if ($categories) {
			$category_ids = array();
			foreach($categories as $individual_category) 
				$category_ids[] = $individual_category->term_id;
				
			$args=array(
			'post_type' => 'manual_kb',
			'tax_query' => array(
				array(
					'taxonomy' => 'manualknowledgebasecat',
					'field' => 'term_id',
					'terms' => $category_ids
				)
			),
			'post__not_in' => array($post->ID),
			'posts_per_page'=> $posts_per_page, // Number of related posts that will be shown.
			'ignore_sticky_posts'=>1 // sticky post hide
		   );
		   $related_articles_query = new wp_query( $args );
		   if( $related_articles_query->have_posts() ) {
		   ?>
			<section class="manual_related_articles">
				<h5><?php echo esc_html($theme_options['kb-related-post-title']); ?></h5>
				<div class="separator small"></div>
				<ul class="kbse">
				<?php 
				 while( $related_articles_query->have_posts() ) {
					$related_articles_query->the_post();
					$format = get_post_format( $post->ID );
					
					// control article access
					$relatedpost__access_status =  manual__gobal_article_access_chk($post->ID);
					// eof control article access
					if( $relatedpost__access_status == true ) {
				?>
					<li class="cat inner <?php echo $format; ?>"><a href="<?php the_permalink()?>"><?php the_title(); ?></a></li>
				 <?php }} ?>
				</ul>
			</section>      
		   <?php 	   
		   }
		}
		wp_reset_postdata();
	}
}



/*-----------------------------------------------------------------------------------*/
/*	ATTACHMENT FILE
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual_kb_attachment_files')) {
	function manual_kb_attachment_files($postID = '') {
		global $theme_options;
		if( isset($theme_options['attached-file-title']) && $theme_options['attached-file-title'] != '' ) {
			$attached_title = $theme_options['attached-file-title'];
		}
		
		if( $postID != '' ) { 
			$entries = get_post_meta( $postID, '_manual_custom_post_attached_files', true );
		} else {  
			$entries = get_post_meta( get_the_ID(), '_manual_custom_post_attached_files', true );
		}
		if( !empty($entries)) { 
		echo '<div class="manual_attached_section">
			  <h5>'.$attached_title.'</h5>
			  <div class="wrapbox">
			  <table class="table table-hover"> 
				<thead> 
					<tr> 
						<th><h6>#</h6></th> 
						<th><h6>'.$attached_title = $theme_options['attached-file-type'].'</h6></th> 
						<th><h6>'.$attached_title = $theme_options['attached-file-size'].'</h6></th> 
						<th><h6>'.$attached_title = $theme_options['attached-file-download'].'</h6></th> 
					</tr> 
				</thead>	
				 ';
			$i = 1;	
			foreach ( (array) $entries as $key => $entry ) {
				$file_size = filesize( get_attached_file( $entry['image_id'] ) );
				$attach_file_type = wp_check_filetype($entry['image']);
				$filename = ( get_the_title($entry['image_id'])?get_the_title($entry['image_id']):basename( get_attached_file( $entry['image_id'] ) )); 
				$img = $title = $desc = $caption = '';
				if ( isset( $entry['title'] ) ) $title = esc_html( $entry['title'] );
					if ( isset( $entry['image'] ) ) { 
						echo '<tbody> 
							<tr> 
								<th scope="row">'.$i.'</th> 
								<td>'. '.'.$attach_file_type['ext'].'</td> 
								<td>'. size_format($file_size, 2) .'</td> 
								<td><a href="'. wp_get_attachment_url( $entry['image_id'] ) .'" '.( (isset($entries[$key]['new_window']) && $entries[$key]['new_window'] == true)?'target="_blank"':'' ).'>'. $filename .'</a></td> 
							</tr> 
						</tbody>'; 
					}
			$i++;		
			}
			echo '</table></div></div>';
		}
	}
}




/*-----------------------------------------------------------------------------------*/
/*	ATTACHMENT FILE :: RETURN TYPE
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual_kb_get_attachment_files')) {
	function manual_kb_get_attachment_files($postID = '') {
		global $theme_options;
		if( isset($theme_options['attached-file-title']) && $theme_options['attached-file-title'] != '' ) {
			$attached_title = $theme_options['attached-file-title'];
		}
		
		if( $postID != '' ) { 
			$entries = get_post_meta( $postID, '_manual_custom_post_attached_files', true );
		} else {  
			$entries = get_post_meta( get_the_ID(), '_manual_custom_post_attached_files', true );
		}
		if( !empty($entries)) { 
		$return = '<div class="manual_attached_section">
			  <h5>'.$attached_title.'</h5>
			  <div class="wrapbox">
			  <table class="table table-hover"> 
				<thead> 
					<tr> 
						<th><h6>#</h6></th> 
						<th><h6>'.$attached_title = $theme_options['attached-file-type'].'</h6></th> 
						<th><h6>'.$attached_title = $theme_options['attached-file-size'].'</h6></th> 
						<th><h6>'.$attached_title = $theme_options['attached-file-download'].'</h6></th> 
					</tr> 
				</thead>	
				 ';
			$i = 1;	
			foreach ( (array) $entries as $key => $entry ) {
				$file_size = filesize( get_attached_file( $entry['image_id'] ) );
				$attach_file_type = wp_check_filetype($entry['image']);
				$filename = ( get_the_title($entry['image_id'])?get_the_title($entry['image_id']):basename( get_attached_file( $entry['image_id'] ) )); 
				$img = $title = $desc = $caption = '';
				if ( isset( $entry['title'] ) ) $title = esc_html( $entry['title'] );
					if ( isset( $entry['image'] ) ) { 
						$return .= '<tbody> 
							<tr> 
								<th scope="row">'.$i.'</th> 
								<td>'. '.'.$attach_file_type['ext'].'</td> 
								<td>'. size_format($file_size, 2) .'</td> 
								<td><a href="'. wp_get_attachment_url( $entry['image_id'] ) .'" '.( (isset($entries[$key]['new_window']) && $entries[$key]['new_window'] == true)?'target="_blank"':'' ).'>'. $filename .'</a></td> 
							</tr> 
						</tbody>'; 
					}
			$i++;		
			}
			$return .= '</table></div></div>';
		} else {
			$return = '';
		}
		return $return;
	}
}



/*-----------------------------------------------------------------------------------*/
/*	ACCESS ATTACHMENT
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual_access_attachment')) {
	function manual_access_attachment($message, $ajaxcall_login = '') {
		global $theme_options;
		echo '<div class="manual_attached_section">';
		echo '<h5>'.$theme_options['attached-file-title'].'</h5>';
		echo '<span class="separator small"></span>
		  <div class="wrapbox" style="background:none;">
				<div class="manual_login_page">
				  <div class="custom_login_form">';
				   if( $message != '' ) { 
						echo '<h4>'.stripslashes($message).'</h4>'; 
					}
					if( $ajaxcall_login == '' ) {
						$args = array(
							'echo' => false,
						);
						echo wp_login_form($args); 
					} else {
						echo ' <form action="' . esc_url( site_url( 'wp-login.php', 'login_post' ) ) . '" method="post"><input type="submit" class="button-primary" value="Log In"></form>';
					}
					echo '<ul class="custom_register">';
					echo '<li><a href="'.wp_lostpassword_url().'" class="more-link hvr-icon-wobble-horizontal margin-15">';
					echo esc_html_e( 'Lost Password', 'manual' );
					echo '&nbsp;&nbsp;<i class="fa fa-arrow-right hvr-icon"></i> </a></li>';
					
					$registration_enabled = get_option( 'users_can_register' );
					if ( $registration_enabled ) {
						echo '<li>' . esc_html__( 'Not a member yet? ', 'manual' ) . ' <a href="'. esc_attr(wp_registration_url()).'" class="more-link">' . esc_html__( 'Register now', 'manual' ) . '</a></li>';
					}
					
					echo '</ul>
				  </div>
				</div>
		  </div>
		</div>';	
	}
}



/*-----------------------------------------------------------------------------------*/
/*	ACCESS ATTACHMENT :: RETURN TYPE
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual__get_access_attachment')) {
	function manual__get_access_attachment($message, $ajaxcall_login = '') {
		global $theme_options;
		$return = '<div class="manual_attached_section">';
		$return .= '<h5>'.$theme_options['attached-file-title'].'</h5>';
		$return .= '<span class="separator small"></span>
		  <div class="wrapbox" style="background:none;">
				<div class="manual_login_page">
				  <div class="custom_login_form">';
				   if( $message != '' ) { 
						$return .= '<h4>'.stripslashes($message).'</h4>'; 
					}
					if( $ajaxcall_login == '' ) {
						$args = array(
							'echo' => false,
						);
						$return .= wp_login_form($args); 
					} else {
						$return .= ' <form action="' . esc_url( site_url( 'wp-login.php', 'login_post' ) ) . '" method="post"><input type="submit" class="button-primary" value="Log In"></form>';
					}
					$return .= '<ul class="custom_register">';
					$return .= '<li><a href="'.wp_lostpassword_url().'" class="more-link hvr-icon-wobble-horizontal margin-15">';
					$return .= esc_html__( 'Lost Password', 'manual' );
					$return .= '&nbsp;&nbsp;<i class="fa fa-arrow-right hvr-icon"></i> </a></li>';
					
					$registration_enabled = get_option( 'users_can_register' );
					if ( $registration_enabled ) {
						$return .= '<li>' . esc_html__( 'Not a member yet? ', 'manual' ) . ' <a href="'. esc_attr(wp_registration_url()).'" class="more-link">' . esc_html__( 'Register now', 'manual' ) . '</a></li>';
					}
					
					$return .= '</ul>
				  </div>
				</div>
		  </div>
		</div>';
	return $return;	
	}
}


/*-----------------------------------------------------------------------------------*/
/*	MANUAL :: HEADER CONTROL GLOBAL
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual_header_control_global')) {
	function manual_header_control_global() {
		global $theme_options;
		$post_type = get_post_type();
		
		// Manual options settings - Custom Style - Header Menu Control
		manual__cs_headermenucontrol_customize_settings();
		
		// Manual options settings - Custom Style - Header Menu Type Control
		manual__cs_headermenu_type_control_customize_settings();
		
		// Manual options settings - Custom Style - Header Bar
		manual__cs_headerbar_customize_settings();
		
		//ipad + mobie fix
		echo '@media (min-width:768px) and (max-width:991px) { .navbar { position:relative!important; background:'.$theme_options['mobile-bgackground-holder-headerbackground-color'].'!important; } .jumbotron_new.jumbotron-inner-fix .inner-margin-top{ padding-top: 0px!important; } .navbar-inverse .navbar-nav > li > a { color: #181818!important; } .padding-jumbotron{  padding:0px 0px 0px; } body.home .navbar-inverse .navbar-nav>li>a { color: #000000!important; } body.home .navbar-inverse .navbar-nav > li > a:hover{ color: #7C7C7C!important; } img.inner-page-white-logo { display: none; } img.home-logo-show { display: block; } ul.nav.navbar-nav.hidemenu { display: block; }} 
@media (max-width:767px) { .navbar { position:relative!important; background:'.$theme_options['mobile-bgackground-holder-headerbackground-color'].'!important; } .padding-jumbotron{ padding:0px 10px;  } .navbar-inverse .navbar-nav > li > a { color: #181818!important; padding-top: 10px!important; } .jumbotron_new.jumbotron-inner-fix .inner-margin-top { padding-top: 0px!important;  } .navbar-inverse .navbar-nav > li > a { border-top: none!important; } body.home .navbar-inverse .navbar-nav>li>a { color: #000000!important; } body.home .navbar-inverse .navbar-nav > li > a:hover{ color: #7C7C7C!important; } img.inner-page-white-logo { display: none; } img.home-logo-show { display: block; } }';
		
	}
}


/*-----------------------------------------------------------------------------------*/
/*	MANUAL :: CUSTOMIZER ENHANCE 
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual_customizer_enhance')) {
	function manual_customizer_enhance() {
		global $theme_options, $post;
		
		/*CONTROL CSS BEFORE REDUX ACTIVE*/ 
		$is_plugin_active = manual__plugin_active('ReduxFramework');
		if( $is_plugin_active == false ){
			
			manual__themeinitial_setup();
			
		} else {
			
			$check_cat_img_exist = '';
		
			// Manual options settings - Logo
			manual__logo_customize_settings();
			
			// Manual options settings - Typography 
			manual__typography_customize_settings();
			
			// Manual options settings - Custom Style - General
			manual__cs_general_customize_settings();
			
			// Manual options settings - Custom Style - Sticky Menu
			manual__cs_stickymenu_customize_settings();
			
			// Manual options settings - Custom Style - Search Box Style
			manual__cs_searchbox_customize_settings();
			
			// Manual options settings - Footer Design
			manual__cs_footer_customize_settings();
			
			// Manual Extra Design - Icon BounceIn
			manual__cs_icon_bouncedin_settings();
			
			// Manual options settings - KnowledgeBase
			manual__cs_knowledgebase_customize_settings();
			
			// Manual options - Custom CSS Code
			if( isset($theme_options['manual-editor-css']) && $theme_options['manual-editor-css'] != '' ) { 
				echo $theme_options['manual-editor-css']; 
			}
			
			// Manual Post Type Design Header CSS Control
			manual__post_type_header_control();
			
			// BBPress
			if( is_user_logged_in() == false ) { echo '.bbp-topic-controls{ display:none; }'; }
				
			}
				
	}
}


/********************************************
*** LOGIN FORM **
*********************************************/
if (!function_exists('manual_get_login_form_control')) {
	function manual_get_login_form_control($custom_login_message) {
		$return = '<div class="manual_login_page vcustom"> <div class="custom_login_form">';
		if( $custom_login_message != '' ) { $return .= ''.esc_html($custom_login_message).'';  }
		$return .= '<ul class="custom_register">';
		$return .= '<li><a href="'.wp_login_url().'" title="Login" class="more-link hvr-icon-wobble-horizontal margin-15">'.esc_html__( 'Login', 'manual' ).' &nbsp;&nbsp;<i class="fa fa-arrow-right hvr-icon"></i> </a></li></ul>';
		$return .= '</div></div>';
		return $return;
	}
}


/*-----------------------------------------------------------------------------------*/
/*	FOOTER SECTION
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual_footer_controls_lower')) {
	function manual_footer_controls_lower() {
		global $theme_options, $post;
		$current_post_type = get_post_type();
		$hide_widget_area = ''; 
		
		if( (is_page() || $current_post_type == 'manual_portfolio') && (get_post_meta( $post->ID, '_manual_footer_force_hide_widget_area', true ) == true) ) { 
			$hide_widget_area = 1;
		} else {  
			if( $theme_options['footer-widget-status'] == true )  $hide_widget_area = 1;
			else $hide_widget_area = 2;
		}
		
		// Check if widget area active
		if ( is_active_sidebar( 'footer-box-1' ) || is_active_sidebar( 'footer-box-2' ) || 
			 is_active_sidebar( 'footer-box-3' ) || is_active_sidebar( 'footer-box-4' ) ) {
			$isactive_sidebar = 1;	 
		} else {
			$isactive_sidebar = 2;
		}
		
		$padding_footertop_60 = '';
		if( ( ($hide_widget_area == 2 && $theme_options['theme-footer-type'] == 2) && $isactive_sidebar == 1) ) {  
			$padding_footertop_60 = 'padding-footertop-60'; 
		}
		
		//Footer Bg.
		$footer_bg_opacity = '';
		if( isset($theme_options['theme_footer_widget_bg_image']['url']) && $theme_options['theme_footer_widget_bg_image']['url'] != '' ) { 
			$footerurl = 'background: '.esc_attr($theme_options['theme_footer_widget_bg_color']).' url('.$theme_options['theme_footer_widget_bg_image']['url'].') '.$theme_options['theme_footer_widget_bg_image_position'].' / cover no-repeat;';
			// Opacity Color
			if( isset($theme_options['theme_footer_widget_bg_image_opacity_apply']) && $theme_options['theme_footer_widget_bg_image_opacity_apply'] == 1 ) {
				$footer_bg_opacity = 'background:'.esc_attr($theme_options['theme_footer_widget_bg_image_opacity_first_color']['rgba']).';';
			}
		} else {
			$footerurl = '';
		}
		
		
		echo '<footer>';

		// START WIDGET FOOTER
        echo '<div class="footer-bg';
			if( $theme_options['theme-footer-type'] == 1 ) { echo ' footer-type-one'; } 
		echo '"';
        echo '>';
    
	    if( $theme_options['theme-footer-type'] == 1 ) { 
		
			/********************
			*** FOOTER TYPE 1 ***
			*********************/
			echo '<div class="footer-layer-1" style="'.$footerurl.'"><div style="'.$footer_bg_opacity.'">';
			if( (isset( $theme_options['website_footer_container_global_full_width'] ) && $theme_options['website_footer_container_global_full_width'] == true) && 
				(isset( $theme_options['website_box_layout'] ) && $theme_options['website_box_layout'] == false) ) { 
				echo '<div class="container-fluid">';
			} else { 
				echo '<div class="container">';
			}
		
			echo '<div class="row"> <div class="col-md-12 col-sm-12 footer-btm-box-one">
					<div><ul class="social-foot">';
						manual_footer_social_share();
					echo '</ul></div>
					<div class="copyright">';
					if( isset($theme_options['footer-copyright']) && $theme_options['footer-copyright'] != '' ) { echo wp_kses($theme_options['footer-copyright'], array('a' => array('href' => array(),'title' => array()),'br' => array()) ); }
					echo '</div>
				</div> </div> </div> </div> </div>';
		} else { 
		
		
			/***********************************
			*** FOOTER TYPE 2 :: WIDGET AREA ***
			************************************/
			
			if( $hide_widget_area != 1  ) { 
			// Display widget area if NOT hide via theme option panel.
			if( $isactive_sidebar == 1 ) { 
			
				if( isset( $theme_options['theme_footer_noof_section_widget_area'] ) &&  $theme_options['theme_footer_noof_section_widget_area'] != '' ) {
					$col_footer_one = $theme_options['footer_one_widget_column'];
					$col_footer_two = $theme_options['footer_two_widget_column'];
					$col_footer_three = $theme_options['footer_three_widget_column'];
					$col_footer_four = $theme_options['footer_four_widget_column'];
					if( $theme_options['theme_footer_noof_section_widget_area'] == 4 ) {
						$col_sm = 12;
						$hide_widget = 4;
					} else if( $theme_options['theme_footer_noof_section_widget_area'] == 3 ) {
						$col_sm = 12;
						$hide_widget = 3;
					} else if( $theme_options['theme_footer_noof_section_widget_area'] == 2 ) {
						$col_sm = 12;
						$hide_widget = 2;
					} else if( $theme_options['theme_footer_noof_section_widget_area'] == 1 ) {
						$col_sm = 12;
						$hide_widget = 1;
					}
				} else {
					$col_sm = 12;
					$hide_widget = 4;
				}
				
				echo '<div class="footer-layer-2" style="'.$footerurl.'"><div class="'.$padding_footertop_60.'" style="'.$footer_bg_opacity.'">';
				
				if( (isset( $theme_options['website_footer_container_global_full_width'] ) && $theme_options['website_footer_container_global_full_width'] == true) && (isset( $theme_options['website_box_layout'] ) && $theme_options['website_box_layout'] == false) ) { 
					echo '<div class="container-fluid">';
				} else { 
					echo '<div class="container">';
				}
				
				echo '<div class="row">
					  
						<div class="col-md-'.$col_footer_one.' col-sm-'.$col_sm.'">';
						if ( is_active_sidebar( 'footer-box-1' ) ) : 
							dynamic_sidebar( 'footer-box-1' ); 
						endif; 
						echo '</div>';
						
						if( $hide_widget == 4 || $hide_widget == 3 || $hide_widget == 2  ) {
							echo '<div class="col-md-'.$col_footer_two.' col-sm-'.$col_sm.'">';
									if ( is_active_sidebar( 'footer-box-2' ) ) : 
										dynamic_sidebar( 'footer-box-2' ); 
									endif; 
							echo '</div>';
						}
					
						if( $hide_widget == 4 || $hide_widget == 3 && $hide_widget != 2  ) {
							echo '<div class="col-md-'.$col_footer_three.' col-sm-'. $col_sm.'">';
									if ( is_active_sidebar( 'footer-box-3' ) ) : 
										dynamic_sidebar( 'footer-box-3' ); 
									endif; 
							echo '</div>';
						} 
					
						if( $hide_widget == 4 && $hide_widget != 3 && $hide_widget != 2  ) {
							echo '<div class="col-md-'.$col_footer_four.' col-sm-'.$col_sm.'">';
									if ( is_active_sidebar( 'footer-box-4' ) ) : 
										dynamic_sidebar( 'footer-box-4' ); 
									endif; 
							echo '</div>';
						} 
					
				  echo '</div> </div> </div> </div>';
				  
			 } // EOD if
			 } // EOF if
			 
			 
			/***********************************
			*** FOOTER TYPE 2 :: COPYRIGHT AREA ***
			************************************/
			
			 if( $theme_options['footer-social-copyright-status'] == false ) {
				 // Display copyright area if NOT hide via theme option panel.
				 echo '<div class="footer_social_copyright">'; 
				 
				 if( (isset( $theme_options['website_footer_container_global_full_width'] ) && $theme_options['website_footer_container_global_full_width'] == true) && (isset( $theme_options['website_box_layout'] ) && $theme_options['website_box_layout'] == false) ) { 
					echo '<div class="container-fluid">';
				 } else { 
					echo '<div class="container">';
				 }
				 
				 echo '<div class="row">';
				 
				 
				 $is_plugin_active = manual__plugin_active('ReduxFramework');
				 if($is_plugin_active == true){
					 // Social Link
					 if( ($theme_options['footer-disable-social-icons'] == false) ) { 
						$fixsocial_iconstyle = '';
						if( $theme_options['footer-disable-copyright-section'] == true ) { 
							$fixsocial_iconstyle = 'border-bottom: none;margin-bottom: 25px;';
						}
						echo '<div class="col-md-12 col-sm-12">';
						echo '<ul class="social-foot footer-btm-box" style="padding-left:0px;'.$fixsocial_iconstyle.'">';
						  manual_footer_social_share();
						echo '</ul>';
						echo '</div>'; 
					 } 
				 }
				 
				// Copyright
				if( $theme_options['footer-disable-copyright-section'] == false ) {
					echo '<div class="col-md-12 col-sm-12 footer_copyright_wrap">';
					$display_copyright_style = 'float:none;text-align:center;';	
					if ( has_nav_menu( 'footer' ) ) { 
						wp_nav_menu( array( 'theme_location' => 'footer', 'menu_class' => 'footer-secondary footer-link-box', 'container' => 'ul', 'container_class' => '', 'link_before' => '', 'link_after' => '', 'fallback_cb' => false, 'menu_id' => 'footer_menu', 'depth' => 1 ));
						$display_copyright_style = ''; 	
					}
				  
					echo '<ul class="footer-tertiary copyright-section secondaryLink footer-link-box" style="'.$display_copyright_style.'"> <li> <p>';
						  if( isset($theme_options['footer-copyright']) && $theme_options['footer-copyright'] != '' ) { echo wp_kses($theme_options['footer-copyright'], array('a' => array('href' => array(),'title' => array()),'br' => array()) ); } 
					echo '</p> </li> </ul>';
				
					echo '</div>';  
				}  
				  
				  
			 echo '</div> </div> </div>';
			 } // end of copyright section
			 
			//}// plugin active
			 
			/*************************
			*** EOF FOOTER TYPE 2  ***
			**************************/

		} // EOF ELSE (if else end) 
			
			
	  echo '</div>'; // main div close 
	  // EOF WIDGET FOOTER
	  echo '</footer>';
	} // function close
}


/*-----------------------------------------------------------------------------------*/
/*	MANUAL :: SEARCH ACCESS CONTROL
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual_search_content_access_control')) {
	function manual_search_content_access_control($postID,$texonomycat,$cat_login,$cat_role,$article_login,$article_role) {
		global $theme_options;
		if( isset($theme_options['manual-live-search-post-type-private-records']) && 
			$theme_options['manual-live-search-post-type-private-records'] ==  true ) {
			$post_access_CSS = '';
		} else {
			$post_access_CSS = 'none';
		}
		//access control check for category
		$terms = get_the_terms( $postID , $texonomycat ); 
		if( is_array( $terms ) ) {
			$check_if_login_call = get_option( $cat_login.$terms[0]->term_id );
			$check_user_role = get_option( $cat_role.$terms[0]->term_id );
			if( $check_if_login_call == 1 && !is_user_logged_in() ) {
				$post_access_display = $post_access_CSS;
			} else {
				$access_status = manual_doc_access($check_user_role);
				if( $check_if_login_call == 1 && is_user_logged_in() && $access_status == false ) { 
					$post_access_display = $post_access_CSS;
				} else {
					// check for single page
					$access_meta = get_post_meta( $postID, $article_login, true );
					$check_post_user_level_access = get_post_meta( $postID, $article_role, true );
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
			//eof access control check for category
			return $post_access_display;
		} else {
			return 'none';	
		}
	} // function close
}

/*-----------------------------------------------------------------------------------*/
/*	VC EXPORT CONTENT
/*-----------------------------------------------------------------------------------*/ 
if ( ! function_exists( 'get_manual_chk_excerpt_content' ) ) {
	function get_manual_chk_excerpt_content( $post_excerpt, $content, $display_morelink_status, $blog_content_limit, $format, $excerpt_content_limit ){
		
		$return = '';
		$post_excerpt = trim($post_excerpt);
		if( !empty($post_excerpt) && trim($post_excerpt) != "" ) { 
			if( $format == 'audio' ) {
				$return .= '<p>'.substr( $content, 0, $excerpt_content_limit ).'</p>';
			} else if( $format == 'video' ) {
				$return .= '<p>'.substr( $content, 0, $excerpt_content_limit ).'</p>';
			} else {
				$return .= '<p>'.substr( get_the_excerpt(), 0, $excerpt_content_limit ).'</p>';
			}
			
			if( $display_morelink_status == 2 ) {
				$return .= '<p> <a href="'.esc_url( get_permalink() ).'" class="custom-link-blog hvr-icon-wobble-horizontal">'. esc_html__( 'Continue Reading', 'manual' ).'</a> </p>';
			}
			
		} else { 
			$return .= $trimmed_content = '<p>'.wp_trim_words( $content, $blog_content_limit, '...' ).'</p>';	
			if( $display_morelink_status == 2 ) $return .= '<p> <a href="'.esc_url( get_permalink() ).'" class="custom-link-blog hvr-icon-wobble-horizontal">'. esc_html__( 'Continue Reading', 'manual' ).'</a> </p>';	
		}
		
		return $return;
	}
}

/*-----------------------------------------------------------------------------------*/
/*	CMB2
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'manual_sanitization_func' ) ) {
	function manual_sanitization_func( $original_value, $args, $cmb2_field ) {
		return $original_value; // Unsanitized value.
	}
}

/*-----------------------------------------------------------------------------------*/
/*	CHECK PLUGIN EXIST USING CLASS NAME
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual__plugin_active')) {
	function manual__plugin_active($class_name) {
		if( class_exists($class_name) ) {
			return true;
		} else {
			return false;	
		}
	}
}

/*-----------------------------------------------------------------------------------*/
/*	CHECK PLUGIN EXIST USING FUNCATION NAME
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual__chkfunction_plugin_active')) {
	function manual__chkfunction_plugin_active($function_name) {
		if( function_exists($function_name) ) {
			return true;
		} else {
			return false;	
		}
	}
}

/*-----------------------------------------------------------------------------------*/
/*	CHECK PLUGIN EXIST USING PLUGIN ACTIVE
/*-----------------------------------------------------------------------------------*/
function manual__abs_plugin_active( $plugin ) {
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	if ( is_plugin_active( $plugin ) ) {
		return true;
	}

	return false;
}

/*-----------------------------------------------------------------------------------*/
/*	GET CATEGORY AUTHOIR NAMES
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual__get_authors_in_category')) {
	function  manual__get_authors_in_category ( $category_id, $post_type = 'manual_kb', $taxonomy = 'manualknowledgebasecat' ) {
		$args = array( 
			'post_type'  => $post_type,
			'posts_per_page'  => -1,
			'orderby'   => 'author',
			'order'  => 'ASC',
			'tax_query' => array(
				array(
					'taxonomy' => $taxonomy,
					'field' => 'term_id',
					'include_children' => true,
					'terms' => $category_id,
				)
			)
		 );
		$cat_posts = get_posts( $args );
		
		$authors = $author_count = array();
		foreach ($cat_posts as $post) {
			if( array_key_exists( get_the_author_meta( 'ID', $post->post_author ), $author_count ) ) { 
				$author_count[get_the_author_meta( 'ID', $post->post_author )]++;
			} else { 
				$author_count[get_the_author_meta( 'ID', $post->post_author )] = 1; 
			}
		}
		foreach ( $author_count as $key=>$val ) {
			$user_avatar = esc_url( get_avatar_url( $key ) );
			$username = get_the_author_meta( 'display_name', $key );
			$authors[$username] = $user_avatar;
		}
		$authors = array_slice($authors, 0, 4);
		return $authors;
	}
}

/*-----------------------------------------------------------------------------------*/
/*	TRIM CONTENT
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'manual__get_excerpt_trim' ) ) {
	function manual__get_excerpt_trim($num_words='24', $more='..'){
		$excerpt = get_the_excerpt();
		$excerpt = wp_trim_words( $excerpt, $num_words , $more );
		return $excerpt;
	}
}


/*-----------------------------------------------------------------------------------*/
/*	WEBSITE DISIGN
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual__website_global_design_control')) {
	function manual__website_global_design_control() {
		global $theme_options;
		if( isset($theme_options['website_box_layout']) && $theme_options['website_box_layout'] == true ) {
			$return = 'boxed_layout';
		} else {
			$return = '';
		}
		return $return;
	}
}

/*-----------------------------------------------------------------------------------*/
/*	THEME HEADER CONTROL
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual__theme_header_control')) {
	function manual__theme_header_control(){
		global $theme_options;
		
		if( (isset( $theme_options['website_nav_container_global_full_width'] ) && $theme_options['website_nav_container_global_full_width'] == true) && 
			(isset( $theme_options['website_box_layout'] ) && $theme_options['website_box_layout'] == false) ) { 
			echo '<div class="container-fluid nav-fix">';
		} else { 
			echo '<div class="container nav-fix">';
		}
		
		echo '<div class="navbar-header">';
		manual_responsive_layout_bar_icon_replacement();
		manual_global_header();
		echo '</div>
			  <div id="navbar" class="navbar-collapse collapse">';
		
			// Hamburger Menu
			$hamburger_class = manual_css_hamburger_menu_control();
			manual_hamburger_menu_control(); 
			
			// Header Social Icons
			echo '<div class="theme_header_menu_social">';
				if ( is_active_sidebar( 'manual-header-social-widgetnav' ) ) : 
					dynamic_sidebar( 'manual-header-social-widgetnav' ); 
				endif;
			echo '</div>';
			
			// Primary Menu
			if ( has_nav_menu( 'primary' ) ) { 
				 wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav '.$hamburger_class.'',  'walker' => new manual_menu_walker() )); 	
			} else { 
				echo '<ul class="nav navbar-nav '. esc_html($hamburger_class).' ">';
				echo wp_list_pages( array( 'title_li' => '' ) );
				echo '</ul>';
			} 	
		
		echo '</div></div>';
		
	}
}

/*-----------------------------------------------------------------------------------*/
/*	THEME MOBILE MENU CONTROL
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual__theme_mobile_menu_holder')) {
	function manual__theme_mobile_menu_holder(){
		global $theme_options;
		
		if( (isset( $theme_options['website_nav_container_global_full_width'] ) && $theme_options['website_nav_container_global_full_width'] == true) && 
			(isset( $theme_options['website_box_layout'] ) && $theme_options['website_box_layout'] == false) ) { 
			echo '<div class="container-fluid">';
		} else { 
			echo '<div class="container">';
		}
		
		$hamburger_class = manual_css_hamburger_menu_control();
		if ( has_nav_menu( 'primary' ) ) { 
			wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav '.$hamburger_class.'',  'walker' => new manual_menu_walker() )); 
		} else {
			$current_post_type = get_post_type();
			if($current_post_type == 'manual_documentation' && $theme_options['documentation-responsive-tree-menu'] == true) {
				echo '<ul class="nav navbar-nav"></ul>';
			}
		}
		echo '</div>';
		
	}
}

/*-----------------------------------------------------------------------------------*/
/*	THEME MOBILE MENU CONTROL
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual__social_icon_site_url')) {
	function manual__social_icon_site_url(){
		$allowed_html_array = array('a' => array('href' => array(),'title' => array()),'br' => array(), 'p' => array('class' => array('cmb2-metabox-description'),),'strong' => array(),'span' => array(),);
return wp_kses( __('<p class="cmb2-metabox-description">Enter <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">fontawesome</a> name (eg: fa fa-file-o) -OR- <br> Enter <a href="https://www.elegantthemes.com/blog/resources/elegant-icon-font" target="_blank">elegant icon font</a> name -OR- <br> Enter <a href="http://demo.wpsmartapps.com/themes/manual/et-line-font/" target="_blank">et line font</a> name</p>', 'manual' ), $allowed_html_array);
	}
}

/*-----------------------------------------------------------------------------------*/
/*	LEARN PRESS
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'manual__check_is_course' ) ) {
	function manual__check_is_course() {
		if ( function_exists( 'learn_press_is_courses' ) && learn_press_is_courses() ) {
			return true;
		} else {
			return false;
		}
	}
}
if ( !function_exists( 'manual__check_is_course_taxonomy' ) ) {
	function manual__check_is_course_taxonomy() {
		if ( function_exists( 'learn_press_is_course_taxonomy' ) && learn_press_is_course_taxonomy() ) {
			return true;
		} else {
			return false;
		}
	}
}

if ( !function_exists( 'manual__theme_global_var' ) ) {
	function manual__theme_global_var(){
		global $theme_options;
		return $theme_options;
	}
}

/*-----------------------------------------------------------------------------------*/
/*	GLOBAL - CONTROL ARTICLE ACCESS
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual__gobal_article_access_chk')) {
	function manual__gobal_article_access_chk($postID) {
		global $theme_options;
		$access_status = true;
		if( isset($theme_options['hide-private-kb-articles-globally']) && $theme_options['hide-private-kb-articles-globally'] == true  ) {
			 $article_access_meta = get_post_meta( $postID, 'doc_single_article_access', true );
			 $article_check_post_user_level_access = get_post_meta( $postID, 'doc_single_article_user_access', true );
			 if( isset($article_access_meta['login']) && $article_access_meta['login'] == 1 && !is_user_logged_in() ) {
				 $access_status = false;
			 } else {
				if( !empty($article_check_post_user_level_access) ) {
					$access_status = manual_doc_access(serialize($article_check_post_user_level_access));
				} else { 
					$access_status = true;
				}
			 }
		}
		return $access_status;
	}
}

?>