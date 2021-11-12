<?php 
/*-------------------------------------------
-------------------------------------------
	* Use function inside this page to 
	* control custom page title bar CSS
	* provided by theme option panel 
-------------------------------------------
-------------------------------------------*/


/******************************************
	[[THEME OPTION]] ::  
	PAGE TITLE BAR {{ CSS CONTROL }}
	BASED ON [[ POST TYPE ]]
*******************************************/
if (!function_exists('manual__post_type_header_control')) {
	function manual__post_type_header_control(){
		global $post, $theme_options;
		/***********Post Type****************/
		$current_post_type = get_post_type();
		$check_cat_img_exist = '';
		
		/*********************************************** 
		** [THEME OPTION] - 404 PAGE CSS CONTROL  ***
		************************************************/
		if( is_404() ) {
			// Check to turn header On/Off
			if( $theme_options['onoff-404-page-hrader'] == true ){
				// ----- Image & Page Title Bar Height Control ------
				$check_404_img_exist = $searchpg_404_background_color_code = '';
				if( isset($theme_options['404-page-header-background-img']['url']) &&
						$theme_options['404-page-header-background-img']['url'] != '' ) {
						$check_404_img_exist = esc_url( $theme_options['404-page-header-background-img']['url'] );
						$searchpg_404_background_color_code = $theme_options['manual_404page_background_color']['rgba'];
				}
				$lineargradient_first_color_404 = $lineargradient_second_color_404 = $responsive_headerheight = '';
				if( isset($theme_options['404-lineargradient-first-color']['rgba']) && $theme_options['404-lineargradient-first-color']['rgba']!= '' ) {
					$lineargradient_first_color_404 = $theme_options['404-lineargradient-first-color']['rgba'];
				}
				if( isset($theme_options['404-linear-gradient-second-color']['rgba']) && $theme_options['404-linear-gradient-second-color']['rgba']!= '' ) {
					$lineargradient_second_color_404 = $theme_options['404-linear-gradient-second-color']['rgba'];
				}
				if( isset($theme_options['404-responsive-header-height']) && $theme_options['404-responsive-header-height'] != '') {
					$responsive_headerheight = $theme_options['404-responsive-header-height'];
				}
				manual_custom_page_css_control($check_404_img_exist, $theme_options['404-header-background-position'], $theme_options['404-apply-nav-background'], $theme_options['404-header-opacity-uploadimage-global'], $theme_options['404-header-height'], $lineargradient_first_color_404, $lineargradient_second_color_404, $searchpg_404_background_color_code, $theme_options['404page-title-color'], $theme_options['404page-link-color']['regular'], $responsive_headerheight);
				// ----- Font Control ------
				$headertitle_font_weight_404 = $headertitle_font_size_404 = $header_lineheight_404 = '';
				if( isset($theme_options['home_404_header_title_font_weight']) && $theme_options['home_404_header_title_font_weight'] != '' && $theme_options['home_404_header_title_font_weight'] != 'default' ) {
					$headertitle_font_weight_404 = 'font-weight:'.$theme_options['home_404_header_title_font_weight'].'!important;';	
				}
				if( isset($theme_options['home_404_header_title_font_size']) && ($theme_options['home_404_header_title_font_size'] != '') ) {
					$headertitle_font_size_404 = 'font-size:'.$theme_options['home_404_header_title_font_size'].'!important;';	
				}
				if( isset($theme_options['home_404_header_title_line_height']) && ($theme_options['home_404_header_title_line_height'] != '') ) {
					$header_lineheight_404 = 'line-height: '.$theme_options['home_404_header_title_line_height'].'!important;';
				}
				echo 'h1.custom_h1_head { '.$headertitle_font_weight_404.$headertitle_font_size_404.$header_lineheight_404.'}';
				// ----- Border Btm ------
				if( $theme_options['404-apply-nav-border-btm'] == 1 ) {
					if( isset($theme_options['website_box_layout']) && $theme_options['website_box_layout'] == true ) {
						echo '.navbar .nav-fix { border-bottom: 1px solid '.$theme_options['404-apply-nav-border-btm-color']['rgba'].'; }'; 
					} else {
						echo '.navbar { border-bottom: 1px solid '.$theme_options['404-apply-nav-border-btm-color']['rgba'].'; }'; 
					}
				}
				// ----- Text Align ------
				if( isset($theme_options['404-header-text-align']) && $theme_options['404-header-text-align'] != '' ) {
					echo '.header_control_text_align { text-align:'.$theme_options['404-header-text-align'].'; }';
				}
			} else {
				echo '.navbar { position: inherit; box-shadow: 0 2px 9px -1px rgba(0,0,0,.04); -moz-box-shadow: 0 2px 9px -1px rgba(0,0,0,.04); -webkit-box-shadow: 0 2px 9px -1px rgba(0,0,0,.04); }';
			}
		
		/*********************************************** 
		** [THEME OPTION] - SEARCH PAGE CSS CONTROL  ***
		************************************************/
		} else if( is_search() ) {
			
			if( $theme_options['onoff-search-page-title-bar'] == false && $theme_options['theme-nav-type'] == '2' ) {
				manual__no_page_header_for_custom_post_type();
			} else {	
			
				// ----- Image & Page Title Bar Height Control ------
				$check_searchpg_img_exist = $searchpg_background_color_code = '';
				if( isset($theme_options['search-page-header-background-img']['url']) &&
						$theme_options['search-page-header-background-img']['url'] != '' ) {
						$check_searchpg_img_exist = esc_url( $theme_options['search-page-header-background-img']['url'] );
						$searchpg_background_color_code = $theme_options['manual_searchpage_background_color']['rgba'];
				}
				$search_lineargradient_first_color = $search_lineargradient_second_color = $responsive_headerheight = '';
				if( isset($theme_options['search-header-lineargradient-first-color']['rgba']) && $theme_options['search-header-lineargradient-first-color']['rgba']!= '' ) {
					$search_lineargradient_first_color = $theme_options['search-header-lineargradient-first-color']['rgba'];
				}
				if( isset($theme_options['search-header-linear-gradient-second-color']['rgba']) && $theme_options['search-header-linear-gradient-second-color']['rgba']!= '' ) {
					$search_lineargradient_second_color = $theme_options['search-header-linear-gradient-second-color']['rgba'];
				}
				if( isset($theme_options['search-responsive-header-height']) && $theme_options['search-responsive-header-height'] != '') {
					$responsive_headerheight = $theme_options['search-responsive-header-height'];
				}
				manual_custom_page_css_control($check_searchpg_img_exist, $theme_options['search-header-background-position'], $theme_options['search-apply-nav-background'], $theme_options['search-header-opacity-uploadimage-global'], $theme_options['search-header-height'], $search_lineargradient_first_color, $search_lineargradient_second_color, $searchpg_background_color_code, $theme_options['search-pageheader-title-color'], $theme_options['search-pageheader-link-color']['regular'], $responsive_headerheight);
				// ----- Text Align ------
				if( isset($theme_options['search-header-text-align']) && $theme_options['search-header-text-align'] != '' ) {
					echo '.header_control_text_align { text-align:'.$theme_options['search-header-text-align'].'; }';
				}
				// ----- Border Btm ------
				if( $theme_options['search-header-apply-nav-border-btm'] == 1 ) {
					if( isset($theme_options['website_box_layout']) && $theme_options['website_box_layout'] == true ) {
						echo '.navbar .nav-fix { border-bottom: 1px solid '.$theme_options['search-header-apply-nav-border-btm-color']['rgba'].'; }'; 
					} else {
						echo '.navbar { border-bottom: 1px solid '.$theme_options['search-header-apply-nav-border-btm-color']['rgba'].'; }'; 
					}
				}
				// ----- Text Align ------
				$searchpg_font_weight = $searchpg_font_size = $searchpg_lineheight = '';
				if( isset($theme_options['search_page_header_title_font_weight']) && $theme_options['search_page_header_title_font_weight'] != '' && $theme_options['search_page_header_title_font_weight'] != 'default' ) {
					$searchpg_font_weight = 'font-weight:'.$theme_options['search_page_header_title_font_weight'].'!important;';	
				}
				if( isset($theme_options['search_page_header_title_font_size']) && ($theme_options['search_page_header_title_font_size'] != '') ) {
					$searchpg_font_size = 'font-size:'.$theme_options['search_page_header_title_font_size'].'!important;';	
				}
				if( isset($theme_options['search_page_header_title_line_height']) && ($theme_options['search_page_header_title_line_height'] != '') ) {
					$searchpg_lineheight = 'line-height: '.$theme_options['search_page_header_title_line_height'].'!important;';
				}
				echo 'h1.custom_h1_head { '.$searchpg_font_weight.$searchpg_font_size.$searchpg_lineheight.'}';
				// ----- Misc ------
				if( $theme_options['searchpg-records-publish-date'] == false && $theme_options['searchpg-records-author-name'] == false && !is_user_logged_in() ) { echo '.body-content .search::before, .body-content .search.manual_documentation:before {font-size: 32px; margin-top: -10px; }'; }
			
			}
			
		/*********************************************** 
		** SEARCH PAGE CSS CONTROL  ***
		************************************************/
		} else if( $current_post_type == 'manual_portfolio' ) {  
			manual_header_page_css_control($post->ID);
			
			
		/*********************************************** 
		** [THEME OPTION] - FAQ PAGE CSS CONTROL  ***
		************************************************/
		} else if($current_post_type == 'manual_faq') {
			
			if( $theme_options['onoff-faq-catag-single-page-title-bar'] == false && $theme_options['theme-nav-type'] == '2' ) {
				manual__no_page_header_for_custom_post_type();
			} else {
				// ----- Image & Page Title Bar Height Control ------
				if( isset($theme_options['manual-faq-header-background-image']['url']) &&
						$theme_options['manual-faq-header-background-image']['url'] != '' ) {
						$check_cat_img_exist = esc_url( $theme_options['manual-faq-header-background-image']['url'] );
						$faq_background_color_code = $theme_options['manual_FAQpage_background_color']['rgba'];
				} else {
					if (function_exists('category_image_src')) {
							$display_cat_img = false; 
							// Get only image url
							$display_cat_params = array(
							  'term_id' => null,
							  'size' => 'full'
							);
							$check_cat_img_exist = category_image_src( $display_cat_params , $display_cat_img );
							$check_cat_img_exist = esc_url( $check_cat_img_exist );
					}
					$faq_background_color_code = '';
				}
				if( $check_cat_img_exist != '') {
					$faq_lineargradient_first_color = $faq_lineargradient_second_color = '';
					if( isset($theme_options['faq-lineargradient-first-color']['rgba']) && $theme_options['faq-lineargradient-first-color']['rgba']!= '' ) {
						$faq_lineargradient_first_color = $theme_options['faq-lineargradient-first-color']['rgba'];
					}
					if( isset($theme_options['faq-linear-gradient-second-color']['rgba']) && $theme_options['faq-linear-gradient-second-color']['rgba']!= '' ) {
						$faq_lineargradient_second_color = $theme_options['faq-linear-gradient-second-color']['rgba'];
					}
					manual_custom_page_css_control($check_cat_img_exist, $theme_options['header-faq-background-position'], $theme_options['faq-apply-nav-background-category-page'], $theme_options['faq-header-opacity-uploadimage-global-category-page'], $theme_options['faq-header-height-category-page'], $faq_lineargradient_first_color, $faq_lineargradient_second_color, $faq_background_color_code, $theme_options['faq-catsinglepage-title-color'], $theme_options['faq-catsinglepage-link-color']['regular']);
				} else {
						manual_custom_page_css_control('', '', '', '', $theme_options['faq-header-height-category-page']);
				}
				// ----- Page Title Responsive Layout Re-Adjust ------
				if( isset($theme_options['faq-responsive-header-height-category-page']) && $theme_options['faq-responsive-header-height-category-page'] != '') {
					echo '@media (max-width: 991px) { .page_opacity.header_custom_height_new { padding:'.$theme_options['faq-responsive-header-height-category-page'].'!important; } }';
				}
				// ----- Text Align ------
				if( isset($theme_options['faq-header-text-align']) && $theme_options['faq-header-text-align'] != '' ) {
					echo '.header_control_text_align { text-align:'.$theme_options['faq-header-text-align'].'; }';
				}
				// ----- Font Control ------
				$faq_headertitle_font_weight = $faq_headertitle_font_size = $faq_header_lineheight = '';
				if( isset($theme_options['faq_header_title_font_weight']) && $theme_options['faq_header_title_font_weight'] != '' && $theme_options['faq_header_title_font_weight'] != 'default' ) {
					$faq_headertitle_font_weight = 'font-weight:'.$theme_options['faq_header_title_font_weight'].'!important;';	
				}
				if( isset($theme_options['faq_header_title_font_size']) && ($theme_options['faq_header_title_font_size'] != '') ) {
					$faq_headertitle_font_size = 'font-size:'.$theme_options['faq_header_title_font_size'].'!important;';	
				}
				if( isset($theme_options['faq_header_title_line_height']) && ($theme_options['faq_header_title_line_height'] != '') ) {
					$faq_header_lineheight = 'line-height: '.$theme_options['faq_header_title_line_height'].'!important;';
				}
				echo 'h1.custom_h1_head { '.$faq_headertitle_font_weight.$faq_headertitle_font_size.$faq_header_lineheight.'}';
				// ----- Border Btm ------
				if( $theme_options['faq-apply-nav-border-btm'] == 1 ) {
					if( isset($theme_options['website_box_layout']) && $theme_options['website_box_layout'] == true ) {
						echo '.navbar .nav-fix { border-bottom: 1px solid '.$theme_options['faq-apply-nav-border-btm-color']['rgba'].'; }'; 
					} else {
						echo '.navbar { border-bottom: 1px solid '.$theme_options['faq-apply-nav-border-btm-color']['rgba'].'; }'; 
					}
				}
			}
		/********************************************************
		** [THEME OPTION] - LEARNPRESS SINGLE PG CSS CONTROL  ***
		*********************************************************/
		} else if(class_exists( 'LearnPress' ) && ($current_post_type == 'lp_course') && is_single() ) {
			
			// ----- REMOVE PAGE TILE BAR  --------
			if( $theme_options['onoff-learnpress-single-page-title-bar'] == false && $theme_options['theme-nav-type'] == '2'  ) {
				manual__no_page_header_for_custom_post_type();
			} else {
				
				$feature_image_url = '';
				if( get_post_meta( $post->ID, '_manual_learnpress_no_header_image', true ) == false ) {
					if( get_post_meta( $post->ID, '_manual_learnpress_header_image', true ) == true && 
						get_post_meta( $post->ID, '_manual_learnpress_header_image', true ) != '' ) {
						$feature_image_url = get_post_meta( $post->ID, '_manual_learnpress_header_image', true );
						echo '.noise-break{ background-position:'.get_post_meta( $post->ID, '_manual_learnpress_background_img_display_position', true ).'!important; }';
					} else {
						$feature_image_url = esc_url(get_the_post_thumbnail_url($post->ID,'large'));
					}
				}
				
				if( $feature_image_url != '' && $theme_options['learnpress_featured_image_on_the_header'] == true ) {
					$learnpress_lineargradient_first_color = $learnpress_lineargradient_second_color = '';
					if( isset($theme_options['learnpress-lineargradient-first-color']['rgba']) && $theme_options['learnpress-lineargradient-first-color']['rgba']!= '' ) {
					$learnpress_lineargradient_first_color = $theme_options['learnpress-lineargradient-first-color']['rgba'];
					}
					if( isset($theme_options['learnpress-linear-gradient-second-color']['rgba']) && $theme_options['learnpress-linear-gradient-second-color']['rgba']!= '' ) {
					$learnpress_lineargradient_second_color = $theme_options['learnpress-linear-gradient-second-color']['rgba'];
					}
					manual_custom_page_css_control($feature_image_url, 'center center', $theme_options['learnpress-apply-nav-background'], $theme_options['learnpress-header-opacity-uploadimage-global'], $theme_options['learnpress-singlepg-header-height'], $learnpress_lineargradient_first_color, $learnpress_lineargradient_second_color, '', $theme_options['learnpress-singlepage-title-color'], $theme_options['learnpress-singlepage-link-color']['regular']);
					
				} else {
					manual_custom_page_css_control('', '', '', '', $theme_options['learnpress-singlepg-header-height']);
				}
				// ----- Border Btm ------
				if( $theme_options['learnpress-apply-nav-border-btm'] == 1 ) {
					if( isset($theme_options['website_box_layout']) && $theme_options['website_box_layout'] == true ) {
						echo '.navbar .nav-fix { border-bottom: 1px solid '.$theme_options['learnpress-apply-nav-border-btm-color']['rgba'].'; }'; 
					} else {
						echo '.navbar { border-bottom: 1px solid '.$theme_options['learnpress-apply-nav-border-btm-color']['rgba'].'; }'; 
					}
				}
				// ----- Page Title Responsive Layout Re-Adjust ------
				if( isset($theme_options['learnpress-responsive-singlepg-header-height']) && $theme_options['learnpress-responsive-singlepg-header-height'] != '') {
					echo '@media (max-width: 991px) { .page_opacity.header_custom_height_new { padding:'.$theme_options['learnpress-responsive-singlepg-header-height'].'!important; } }';
				}
				// ----- Text Align ------
				if( isset($theme_options['learnpress-singlepg-text-align']) && $theme_options['learnpress-singlepg-text-align'] != '' ) {
					echo '.header_control_text_align { text-align:'.$theme_options['learnpress-singlepg-text-align'].'; }';
				}
				// ----- Font Control ------
				$learnpress_headertitle_font_weight = $learnpress_headertitle_font_size = $learnpress_header_lineheight = '';
				if( isset($theme_options['learnpress_singlepg_header_title_font_weight']) && $theme_options['learnpress_singlepg_header_title_font_weight'] != '' && $theme_options['learnpress_singlepg_header_title_font_weight'] != 'default' ) {
					$learnpress_headertitle_font_weight = 'font-weight:'.$theme_options['learnpress_singlepg_header_title_font_weight'].'!important;';	
				}
				if( isset($theme_options['learnpress_singlepg_header_title_font_size']) && ($theme_options['learnpress_singlepg_header_title_font_size'] != '') ) {
					$learnpress_headertitle_font_size = 'font-size:'.$theme_options['learnpress_singlepg_header_title_font_size'].'!important;';	
				}
				if( isset($theme_options['learnpress_singlepg_header_title_line_height']) && ($theme_options['learnpress_singlepg_header_title_line_height'] != '') ) {
					$learnpress_header_lineheight = 'line-height: '.$theme_options['learnpress_singlepg_header_title_line_height'].'!important;';
				}
				echo 'h1.custom_h1_head { '.$learnpress_headertitle_font_weight.$learnpress_headertitle_font_size.$learnpress_header_lineheight.'}';
				
				
			}
			
		/**********************************************************
		** [THEME OPTION] - KNOWLEDGEBASE CAT/PAGE CSS CONTROL  ***
		***********************************************************/
		} else if($current_post_type == 'manual_kb') {
			
			if( is_single() ) {
				
				// ----- REMOVE PAGE TILE BAR  --------
				if( $theme_options['onoff-knowledgebase-single-page-title-bar'] == false && $theme_options['theme-nav-type'] == '2'  ) {
					manual__no_page_header_for_custom_post_type();
				} else {
				
				// ----- Image & Page Title Bar Height Control ------
				$image = get_post_meta( get_the_ID(), '_manual_header_image', 1 ); // post upload image
				$terms = wp_get_post_terms($post->ID, 'manualknowledgebasecat');
				$current_term = $terms[0];
				$term_id = $current_term->term_id;
				if( isset($theme_options['kbsinglepg-header-background-image']['url']) &&
					$theme_options['kbsinglepg-header-background-image']['url'] != '' ) {
					$check_cat_img_exist = esc_url( $theme_options['kbsinglepg-header-background-image']['url'] );
					$kbsingle_background_color_code = $theme_options['manual_kbsinglepg_background_color']['rgba'];
				} else {
					if (function_exists('category_image_src')) {
						$display_cat_img = false; 
						// Get only image url
						$display_cat_params = array(
						  'term_id' => $term_id,
						  'size' => 'full'
						);
						$check_cat_img_exist = category_image_src( $display_cat_params , $display_cat_img );
						$check_cat_img_exist = esc_url( $check_cat_img_exist );
					}
					$kbsingle_background_color_code = '';
				}
				if( $check_cat_img_exist != '' && $image == '' ) {
					$kbsingle_lineargradient_first_color = $kbsingle_lineargradient_second_color = '';
					if( isset($theme_options['kbsingle-lineargradient-first-color']['rgba']) && $theme_options['kbsingle-lineargradient-first-color']['rgba']!= '' ) {
						$kbsingle_lineargradient_first_color = $theme_options['kbsingle-lineargradient-first-color']['rgba'];
					}
					if( isset($theme_options['kbsingle-linear-gradient-second-color']['rgba']) && $theme_options['kbsingle-linear-gradient-second-color']['rgba']!= '' ) {
						$kbsingle_lineargradient_second_color = $theme_options['kbsingle-linear-gradient-second-color']['rgba'];
					}
					manual_custom_page_css_control($check_cat_img_exist, $theme_options['kbsinglepg-header-background-position'], $theme_options['kbsinglepg-apply-nav-background'], $theme_options['kbsinglepg-header-opacity-uploadimage-global'], $theme_options['kbsinglepg-header-height'], $kbsingle_lineargradient_first_color, $kbsingle_lineargradient_second_color, $kbsingle_background_color_code, $theme_options['kbsinglepage-title-color'], $theme_options['kbsinglepage-link-color']['regular']);
					// ----- Border Btm ------
					if( $theme_options['kbsinglepg-apply-nav-border-btm'] == 1 ) {
						if( isset($theme_options['website_box_layout']) && $theme_options['website_box_layout'] == true ) {
							echo '.navbar .nav-fix { border-bottom: 1px solid '.$theme_options['kbsinglepg-apply-nav-border-btm-color']['rgba'].'; }'; 
						} else {
							echo '.navbar { border-bottom: 1px solid '.$theme_options['kbsinglepg-apply-nav-border-btm-color']['rgba'].'; }'; 
						}
					}
					
				} else {
					if( $image != '') { 
						if( get_post_meta( get_the_ID(), '_manual_remove_nav_bg', 1 ) == false ) $nav = true;
						else $nav = false;
						if( get_post_meta( get_the_ID(), '_manual_bg_opacity_uploadimg', 1 ) == false ) $header_opacity = true;
						else $header_opacity = false;
						manual_custom_page_css_control($image, 'center center', $nav, $header_opacity, ( (get_post_meta( get_the_ID(), '_manual_header_height', 1 ) != '')?get_post_meta( get_the_ID(), '_manual_header_height', 1 ):$theme_options['kbsinglepg-header-height'] ), '','','', $theme_options['kbsinglepage-title-color'], $theme_options['kbsinglepage-link-color']['regular']);
					} else {
						$nav = $header_opacity = false;
						manual_custom_page_css_control('', '', $nav, $header_opacity, ( (get_post_meta( get_the_ID(), '_manual_header_height', 1 ) != '')?get_post_meta( get_the_ID(), '_manual_header_height', 1 ):$theme_options['kbsinglepg-header-height'] ), '','','', $theme_options['kbsinglepage-title-color'], $theme_options['kbsinglepage-link-color']['regular'] );
					}
				}
				// ----- Page Title Responsive Layout Re-Adjust ------
				if( isset($theme_options['kbsinglepg-responsive-header-height']) && $theme_options['kbsinglepg-responsive-header-height'] != '') {
					echo '@media (max-width: 991px) { .page_opacity.header_custom_height_new { padding:'.$theme_options['kbsinglepg-responsive-header-height'].'!important; } }';
				}
				// ----- Text Align ------
				if( isset($theme_options['kbsinglepg-text-align']) && $theme_options['kbsinglepg-text-align'] != '' ) {
					echo '.header_control_text_align { text-align:'.$theme_options['kbsinglepg-text-align'].'; }';
				}
				// ----- Font Control ------
				$kbsinglepg_headertitle_font_weight = $kbsinglepg_headertitle_font_size = $kbsinglepg_header_lineheight = '';
				if( isset($theme_options['kbsinglepg_header_title_font_weight']) && $theme_options['kbsinglepg_header_title_font_weight'] != '' && $theme_options['kbsinglepg_header_title_font_weight'] != 'default' ) {
					$kbsinglepg_headertitle_font_weight = 'font-weight:'.$theme_options['kbsinglepg_header_title_font_weight'].'!important;';	
				}
				if( isset($theme_options['kbsinglepg_header_title_font_size']) && ($theme_options['kbsinglepg_header_title_font_size'] != '') ) {
					$kbsinglepg_headertitle_font_size = 'font-size:'.$theme_options['kbsinglepg_header_title_font_size'].'!important;';	
				}
				if( isset($theme_options['kbsinglepg_header_title_line_height']) && ($theme_options['kbsinglepg_header_title_line_height'] != '') ) {
					$kbsinglepg_header_lineheight = 'line-height: '.$theme_options['kbsinglepg_header_title_line_height'].'!important;';
				}
				echo 'h1.custom_h1_head { '.$kbsinglepg_headertitle_font_weight.$kbsinglepg_headertitle_font_size.$kbsinglepg_header_lineheight.'}';
			  }// Eof else
			  
			    // Single page content - title design control
			    if( isset($theme_options['kb-remove-article-title-icon']) && $theme_options['kb-remove-article-title-icon'] == false ) {
					echo '.body-content .kb-single { padding: 0px; } .body-content .kb-single:before { content: ""; }';
				}
				// Design Control - kb single page style 2
				if( isset($theme_options['kb-singlepg-display-style']) && $theme_options['kb-singlepg-display-style'] == 2 ) {
					echo '.body-content .kb-single { padding: 0px; } .body-content .kb-single:before { content: ""; } .body-content .kb-single p { float: right;margin-top: 26px; } span.edit-link.kb-single-pg { padding-right: 0px; } span.edit-link.kb-single-pg a{ margin-right: 0px; }';
					if( is_rtl() ){ echo '.body-content .kb-single p { float: left; }';  }
				}
			  
			} else {
				// ----- REMOVE PAGE TILE BAR  --------
				if( $theme_options['onoff-knowledgebase-catag-page-title-bar'] == false && $theme_options['theme-nav-type'] == '2'  ) {
					manual__no_page_header_for_custom_post_type();
				} else {
				// ----- Image & Page Title Bar Height Control ------
				if( isset($theme_options['manual-kb-header-background-image']['url']) &&
					$theme_options['manual-kb-header-background-image']['url'] != '' ) {
					if (function_exists('category_image_src')) {
						$display_cat_img = false; 
						// Get only image url
						$display_cat_params = array(
						  'term_id' => null,
						  'size' => 'full'
						);
						$check_cat_img_exist = category_image_src( $display_cat_params , $display_cat_img );
						if( isset($check_cat_img_exist) && $check_cat_img_exist != '' ) {
							$check_cat_img_exist = esc_url( $check_cat_img_exist );
							$kbcat_background_color_code = '';
						} else {
							$check_cat_img_exist = esc_url( $theme_options['manual-kb-header-background-image']['url'] );
							$kbcat_background_color_code = $theme_options['manual_kbcategory_background_color']['rgba'];
						}
					} else {
						$check_cat_img_exist = esc_url( $theme_options['manual-kb-header-background-image']['url'] );
						$kbcat_background_color_code = $theme_options['manual_kbcategory_background_color']['rgba'];
					}
				} else {
					if (function_exists('category_image_src')) {
						$display_cat_img = false; 
						// Get only image url
						$display_cat_params = array(
						  'term_id' => null,
						  'size' => 'full'
						);
						$check_cat_img_exist = category_image_src( $display_cat_params , $display_cat_img );
						$check_cat_img_exist = esc_url( $check_cat_img_exist );
					}
					$kbcat_background_color_code = '';
				}
				if( $check_cat_img_exist != '') {
					$kbcat_lineargradient_first_color = $kbcat_lineargradient_second_color = '';
					if( isset($theme_options['kbcat-lineargradient-first-color']['rgba']) && $theme_options['kbcat-lineargradient-first-color']['rgba']!= '' ) {
						$kbcat_lineargradient_first_color = $theme_options['kbcat-lineargradient-first-color']['rgba'];
					}
					if( isset($theme_options['kbcat-linear-gradient-second-color']['rgba']) && $theme_options['kbcat-linear-gradient-second-color']['rgba']!= '' ) {
						$kbcat_lineargradient_second_color = $theme_options['kbcat-linear-gradient-second-color']['rgba'];
					}
					manual_custom_page_css_control($check_cat_img_exist, $theme_options['kbcat-header-background-position'], $theme_options['kbcat-apply-nav-background'], $theme_options['kbcat-header-opacity-uploadimage-global'], $theme_options['kbcat-header-height'], $kbcat_lineargradient_first_color, $kbcat_lineargradient_second_color, $kbcat_background_color_code, $theme_options['kbcatpage-title-color'], $theme_options['kbcatpage-link-color']['regular']);
					// ----- Border Btm ------
					if( $theme_options['kbcat-apply-nav-border-btm'] == 1 ) {
						if( isset($theme_options['website_box_layout']) && $theme_options['website_box_layout'] == true ) {
							echo '.navbar .nav-fix { border-bottom: 1px solid '.$theme_options['kbcat-apply-nav-border-btm-color']['rgba'].'; }'; 
						} else {
							echo '.navbar { border-bottom: 1px solid '.$theme_options['kbcat-apply-nav-border-btm-color']['rgba'].'; }'; 
						}
					}
					
				} else {
					manual_custom_page_css_control('', '', '', '', $theme_options['kbcat-header-height']);
				}
				// ----- Page Title Responsive Layout Re-Adjust ------
				if( isset($theme_options['kbcat-responsive-header-height']) && $theme_options['kbcat-responsive-header-height'] != '') {
					echo '@media (max-width: 991px) { .page_opacity.header_custom_height_new { padding:'.$theme_options['kbcat-responsive-header-height'].'!important; } }';
				}
				// ----- Text Align ------
				if( isset($theme_options['kbcat-text-align']) && $theme_options['kbcat-text-align'] != '' ) {
					echo '.header_control_text_align { text-align:'.$theme_options['kbcat-text-align'].'; }';
				}
				// ----- Font Control ------
				$kbcat_headertitle_font_weight = $kbcat_headertitle_font_size = $kbcat_header_lineheight = '';
				if( isset($theme_options['kb_cattag_header_title_font_weight']) && $theme_options['kb_cattag_header_title_font_weight'] != '' && $theme_options['kb_cattag_header_title_font_weight'] != 'default' ) {
					$kbcat_headertitle_font_weight = 'font-weight:'.$theme_options['kb_cattag_header_title_font_weight'].'!important;';	
				}
				if( isset($theme_options['kb_cattag_header_title_font_size']) && ($theme_options['kb_cattag_header_title_font_size'] != '') ) {
					$kbcat_headertitle_font_size = 'font-size:'.$theme_options['kb_cattag_header_title_font_size'].'!important;';	
				}
				if( isset($theme_options['kb_cattag_header_title_line_height']) && ($theme_options['kb_cattag_header_title_line_height'] != '') ) {
					$kbcat_header_lineheight = 'line-height: '.$theme_options['kb_cattag_header_title_line_height'].'!important;';
				}
				echo 'h1.custom_h1_head { '.$kbcat_headertitle_font_weight.$kbcat_headertitle_font_size.$kbcat_header_lineheight.'}';
			 }
		  }
		
		/**********************************************************
		** [THEME OPTION] - DOCUMENTATION CAT/PAGE CSS CONTROL  ***
		***********************************************************/
		} else if($current_post_type == 'manual_documentation') {
			
			// ----- Image & Page Title Bar Height Control ------
			$documentation_lineargradient_first_color = $documentation_lineargradient_second_color = '';
			if( isset($theme_options['documentation-lineargradient-first-color']['rgba']) && $theme_options['documentation-lineargradient-first-color']['rgba']!= '' ) {
				$documentation_lineargradient_first_color = $theme_options['documentation-lineargradient-first-color']['rgba'];
			}
			if( isset($theme_options['documentation-linear-gradient-second-color']['rgba']) && $theme_options['documentation-linear-gradient-second-color']['rgba']!= '' ) {
				$documentation_lineargradient_second_color = $theme_options['documentation-linear-gradient-second-color']['rgba'];
			}
	
			if( is_single() ) {
				if( $theme_options['onoff-documentation-catag-single-page-title-bar'] == false && $theme_options['theme-nav-type'] == '2'  ) {
						manual__no_page_header_for_custom_post_type();
				} else {	
					if( isset($theme_options['manual-documentation-header-background-image']['url']) &&
						$theme_options['manual-documentation-header-background-image']['url'] != '' ) {
						$check_cat_img_exist = esc_url( $theme_options['manual-documentation-header-background-image']['url'] );
						$doc_background_color_code = $theme_options['manual_documentation_bgcolor']['rgba'];
					} else {
						$doc_background_color_code = '';
						$terms = wp_get_post_terms($post->ID, 'manualdocumentationcategory');
						$current_term = $terms[0];
						$term_id = $current_term->term_id;
						if (function_exists('category_image_src')) {
							$display_cat_img = false; 
							// Get only image url
							$display_cat_params = array(
							  'term_id' => $term_id,
							  'size' => 'full'
							);
							$check_cat_img_exist = category_image_src( $display_cat_params , $display_cat_img );
							$check_cat_img_exist = esc_url( $check_cat_img_exist );
						}
					}
					if( $check_cat_img_exist != '') {
						manual_custom_page_css_control($check_cat_img_exist, $theme_options['doc-header-background-position'], $theme_options['documentation-apply-nav-background-category-page'], $theme_options['documentation-header-opacity-uploadimage-global-category-page'], $theme_options['documentation-header-height-category-page'], $documentation_lineargradient_first_color, $documentation_lineargradient_second_color, $doc_background_color_code, $theme_options['documentation-catsinglepage-title-color'], $theme_options['documentation-catsinglepage-link-color']['regular']);
					} else {
						manual_custom_page_css_control('', '', '', '', $theme_options['documentation-header-height-category-page']);
					}
				}
			} else { // start else
				if( $theme_options['onoff-documentation-catag-single-page-title-bar'] == false && $theme_options['theme-nav-type'] == '2'  ) {
					manual__no_page_header_for_custom_post_type();
				} else {
					if( isset($theme_options['manual-documentation-header-background-image']['url']) &&
						$theme_options['manual-documentation-header-background-image']['url'] != '' ) {
						$check_cat_img_exist = esc_url( $theme_options['manual-documentation-header-background-image']['url'] );
						$doc_background_color_code = $theme_options['manual_documentation_bgcolor']['rgba'];
					} else {
						$doc_background_color_code = '';
						if (function_exists('category_image_src')) {
							$display_cat_img = false; 
							// Get only image url
							$display_cat_params = array(
							  'term_id' => null,
							  'size' => 'full'
							);
							$check_cat_img_exist = category_image_src( $display_cat_params , $display_cat_img );
							$check_cat_img_exist = esc_url( $check_cat_img_exist );
						}
					}
					if( $check_cat_img_exist != '') {
						manual_custom_page_css_control($check_cat_img_exist, $theme_options['doc-header-background-position'], $theme_options['documentation-apply-nav-background-category-page'], $theme_options['documentation-header-opacity-uploadimage-global-category-page'], $theme_options['documentation-header-height-category-page'], $documentation_lineargradient_first_color, $documentation_lineargradient_second_color, $doc_background_color_code,$theme_options['documentation-catsinglepage-title-color'], $theme_options['documentation-catsinglepage-link-color']['regular']);
					} else {
						manual_custom_page_css_control('', '', '', '', $theme_options['documentation-header-height-category-page']);
					}
				}
			} 
			// ----- Page Title Responsive Layout Re-Adjust ------
			if( isset($theme_options['documentation-responsive-header-height-category-page']) && $theme_options['documentation-responsive-header-height-category-page'] != '') {
				echo '@media (max-width: 991px) { .page_opacity.header_custom_height_new { padding:'.$theme_options['documentation-responsive-header-height-category-page'].'!important; } }';
			}
			// ----- Misc ------
			if( $theme_options['documentation-quick-stats-under-title'] == true && !is_user_logged_in()  ) { echo '.page-title-header:before {font-size: 34px;top: -7px;}.page-title-header { padding: 0px 0px 0px 53px; margin-bottom: -8px; }'; }
			if( $theme_options['documentation-voting-buttons-status'] == true || ($theme_options['documentation-voting-buttons-status'] == false && !is_user_logged_in() && $theme_options['documentation-voting-login-users'] == true)  ) {
				echo '.panel-heading .social-box { float: none; }';
			}
			// ----- Text Align ------
			if( isset($theme_options['doc-header-text-align']) && $theme_options['doc-header-text-align'] != '' ) {
				echo '.header_control_text_align { text-align:'.$theme_options['doc-header-text-align'].'; }';
			}
			// ----- Font Control ------
			$doc_headertitle_font_weight = $doc_headertitle_font_size = $doc_header_lineheight = '';
			if( isset($theme_options['doc_header_title_font_weight']) && $theme_options['doc_header_title_font_weight'] != '' && $theme_options['doc_header_title_font_weight'] != 'default' ) {
				$doc_headertitle_font_weight = 'font-weight:'.$theme_options['doc_header_title_font_weight'].'!important;';	
			}
			if( isset($theme_options['doc_header_title_font_size']) && ($theme_options['doc_header_title_font_size'] != '') ) {
				$doc_headertitle_font_size = 'font-size:'.$theme_options['doc_header_title_font_size'].'!important;';	
			}
			if( isset($theme_options['doc_header_title_line_height']) && ($theme_options['doc_header_title_line_height'] != '') ) {
				$doc_header_lineheight = 'line-height: '.$theme_options['doc_header_title_line_height'].'!important;';
			}
			echo 'h1.custom_h1_head { '.$doc_headertitle_font_weight.$doc_headertitle_font_size.$doc_header_lineheight.'}';
			// ----- Border Btm ------
			if( $theme_options['documentation-apply-nav-border-btm'] == 1 ) {
				if( isset($theme_options['website_box_layout']) && $theme_options['website_box_layout'] == true ) {
					echo '.navbar .nav-fix { border-bottom: 1px solid '.$theme_options['documentation-apply-nav-border-btm-color']['rgba'].'; }'; 
				} else {
					echo '.navbar { border-bottom: 1px solid '.$theme_options['documentation-apply-nav-border-btm-color']['rgba'].'; }'; 
				}
			}
			// ----- Article Records Style 2 Control ------
			if( isset($theme_options['doc-global-arcile-display-style']) && $theme_options['doc-global-arcile-display-style'] == 2 ) {  
				echo '.doc-single-post .page-title-header p { float: right; margin-top: 35px; margin-bottom: 0px; } .doc-single-post .page-title-header:before { content: ""; } .doc-single-post .page-title-header { padding: 0px 0px 5px 0px; } @media (max-width:767px) { .doc-single-post .page-title-header p { float: none; } }';
			if( is_rtl() ) echo '.doc-single-post .page-title-header p { float: left; } .body-content .doc-single-post h2.singlepg-font, .doc-single-post .page-title-header p { padding-right: 0px; padding-left: 67px; } .doc-single-post .page-title-header p.entry-meta { padding-left: 0px; } .body-content .doc-single-post .page-title-header span { padding-left: 7px; } .pom-small-grey { padding-right: 17px!important; }';	
				if( $theme_options['doc-global-design2-author'] == false ) { echo '.doc-single-post .page-title-header p { float: none; margin-top: 0px; margin-bottom: 10px; }'; } 
			}
			
		/******************************
		** WOOCOMMERCE CSS CONTROL  ***
		*******************************/
		} else if(function_exists("is_woocommerce") && (is_shop() || is_checkout() || is_account_page())){
			if(is_shop()){
				$page_id = get_option('woocommerce_shop_page_id');
				manual_woo_shop_column_css_handler();		
			} elseif(is_checkout()) {
				$page_id = get_option('woocommerce_pay_page_id'); 
			} elseif(is_account_page()) {
				$page_id = get_option('woocommerce_myaccount_page_id'); 
			} elseif(is_account_page()) {
				$page_id = get_option('woocommerce_edit_address_page_id'); 
			} elseif(is_account_page()) {
				$page_id = get_option('woocommerce_view_order_page_id'); 
			}
			$woopage  = get_post( $page_id );
			if( isset($woopage->ID) && $woopage->ID != '' ) {
				manual_header_page_css_control($woopage->ID);
			}
		} else if(function_exists("is_woocommerce") && (is_product() || is_product_category() || is_product_tag() ) ){ 
			if( is_product_category() || is_product_tag() ) {
				manual_custom_page_css_control('', '', '', '', 40);
			} else {
				manual_custom_page_css_control('', '', '', '', 25);
			}
			if( is_product() ) echo '.header_control_text_align { text-align:left; }';
		} else if( is_home() && $current_post_type == 'post' ) {
			$postID = get_option('page_for_posts');
			if( $postID != '' && $postID != 0 ) {
				manual_header_page_css_control($postID);
			} else {
				echo '.navbar { position: inherit; box-shadow: 0 2px 9px -1px rgba(0,0,0,.04); -moz-box-shadow: 0 2px 9px -1px rgba(0,0,0,.04); -webkit-box-shadow: 0 2px 9px -1px rgba(0,0,0,.04); }';	
			}
		} else if( $current_post_type == 'page' ) {
			manual_header_page_css_control($post->ID);
		} else if( $current_post_type == 'post' && $theme_options['blog_single_page_global_header_settings'] == true && !is_single() ) {
			$postID = get_option('page_for_posts');
			manual_header_page_css_control($postID);
		
		
		/*********************************************** 
		** [THEME OPTION] - POST SINGLE CSS CONTROL  ***
		************************************************/
		} else if( $current_post_type == 'post' && is_single() ) {
			// ----- Image & Page Title Bar Height Control ------
			$feature_image_url = get_the_post_thumbnail_url($post->ID,'large');
			if( $feature_image_url != '' && $theme_options['blog_featured_image_on_the_header'] == true ) {
				$blogpg_lineargradient_first_color = $blogpg_lineargradient_second_color = '';
				if( isset($theme_options['blog-lineargradient-first-color']['rgba']) && $theme_options['blog-lineargradient-first-color']['rgba']!= '' ) {
					$blogpg_lineargradient_first_color = $theme_options['blog-lineargradient-first-color']['rgba'];
				}
				if( isset($theme_options['blog-linear-gradient-second-color']['rgba']) && $theme_options['blog-linear-gradient-second-color']['rgba']!= '' ) {
					$blogpg_lineargradient_second_color = $theme_options['blog-linear-gradient-second-color']['rgba'];
				}
				manual_custom_page_css_control($feature_image_url, 'center center', $theme_options['blog-apply-nav-background'], $theme_options['blog-header-opacity-uploadimage-global'], $theme_options['blog-header-height'], $blogpg_lineargradient_first_color, $blogpg_lineargradient_second_color, '', $theme_options['blog-singlepage-title-color'], $theme_options['blog-singlepage-link-color']['regular']);
				
			} else {
				manual_custom_page_css_control('', '', '', '', $theme_options['blog-header-height']);
			}
			// ----- Responsive Page Height------
			if( isset($theme_options['blog-responsive-header-height']) && $theme_options['blog-responsive-header-height'] != '') {
				echo '@media (max-width: 991px) { .page_opacity.header_custom_height_new { padding:'.$theme_options['blog-responsive-header-height'].'!important; } }';
			}
			// ----- FIX :: Icon Format ------
			if( $theme_options['blog_single_page_icon_format'] == true ) { 
				echo '.body-content .blog.post.format-image:before, .body-content .blog.post.format-quote:before, .body-content .blog.post.format-video:before, .body-content .blog.post.format-audio:before, .body-content .blog.post.format-standard:before { content: ""; }';
			}
			// ----- Text Align ------
			if( isset($theme_options['blog-header-text-align']) && $theme_options['blog-header-text-align'] != '' ) {
				echo '.header_control_text_align { text-align:'.$theme_options['blog-header-text-align'].'; }';
			}
			// ----- Font Control ------
			$blogsingle_headertitle_font_weight = $blogsingle_headertitle_font_size = $blogsingle_header_lineheight = '';
			if( isset($theme_options['blog_header_title_font_weight']) && $theme_options['blog_header_title_font_weight'] != '' && $theme_options['blog_header_title_font_weight'] != 'default' ) {
				$blogsingle_headertitle_font_weight = 'font-weight:'.$theme_options['blog_header_title_font_weight'].'!important;';	
			}
			if( isset($theme_options['blog_header_title_font_size']) && ($theme_options['blog_header_title_font_size'] != '') ) {
				$blogsingle_headertitle_font_size = 'font-size:'.$theme_options['blog_header_title_font_size'].'!important;';	
			}
			if( isset($theme_options['blog_header_title_line_height']) && ($theme_options['blog_header_title_line_height'] != '') ) {
				$blogsingle_header_lineheight = 'line-height: '.$theme_options['blog_header_title_line_height'].'!important;';
			}
			echo 'h1.custom_h1_head { '.$blogsingle_headertitle_font_weight.$blogsingle_headertitle_font_size.$blogsingle_header_lineheight.'}';
			// ----- Border Btm ------
			if( $theme_options['blog-apply-nav-border-btm'] == 1 ) {
				if( isset($theme_options['website_box_layout']) && $theme_options['website_box_layout'] == true ) {
					echo '.navbar .nav-fix { border-bottom: 1px solid '.$theme_options['blog-apply-nav-border-btm-color']['rgba'].'; }'; 
				} else {
					echo '.navbar { border-bottom: 1px solid '.$theme_options['blog-apply-nav-border-btm-color']['rgba'].'; }'; 
				}
			}
			
		/*******************************************
		** [THEME OPTION] - BBPRESS CSS CONTROL  ***
		********************************************/
		} else if ( class_exists('bbPress') && is_bbPress() && !is_front_page() ) { 
			if( isset($theme_options['bbpress-header-image']['url']) && $theme_options['bbpress-header-image']['url'] != '') {
				// ----- Image & Page Title Bar Height Control ------
				$bbpress_lineargradient_first_color = $bbpress_lineargradient_second_color = '';
				if( isset($theme_options['bbpress-lineargradient-first-color']['rgba']) && $theme_options['bbpress-lineargradient-first-color']['rgba']!= '' ) {
					$bbpress_lineargradient_first_color = $theme_options['bbpress-lineargradient-first-color']['rgba'];
				}
				if( isset($theme_options['bbpress-linear-gradient-second-color']['rgba']) && $theme_options['bbpress-linear-gradient-second-color']['rgba']!= '' ) {
					$bbpress_lineargradient_second_color = $theme_options['bbpress-linear-gradient-second-color']['rgba'];
				}
				if( isset($theme_options['manual_bbpress_background_color']['rgba']) && $theme_options['manual_bbpress_background_color']['rgba']!= '' ) {
					$manual_bbpress_background_color = $theme_options['manual_bbpress_background_color']['rgba'];
				}
				manual_custom_page_css_control($theme_options['bbpress-header-image']['url'], $theme_options['bbpress-header-background-position'], $theme_options['bbpress-apply-nav-background'], $theme_options['bbpress-header-opacity-uploadimage-global'], $theme_options['bbpress-header-height'], $bbpress_lineargradient_first_color, $bbpress_lineargradient_second_color, $manual_bbpress_background_color, $theme_options['bbpresspages-title-color'], $theme_options['bbpresspages-link-color']['regular']);
				// ----- Border Btm ------
				if( $theme_options['bbpress-apply-nav-background'] == 0 ) {
					echo '.navbar { background: transparent!important; }';
				}
				if( $theme_options['bbpress-apply-nav-border-btm'] == 1 ) {
					if( isset($theme_options['website_box_layout']) && $theme_options['website_box_layout'] == true ) {
						echo '.navbar .nav-fix { border-bottom: 1px solid '.$theme_options['bbpress-apply-nav-border-btm-color']['rgba'].'; }'; 
					} else {
						echo '.navbar { border-bottom: 1px solid '.$theme_options['bbpress-apply-nav-border-btm-color']['rgba'].'; }'; 
					}
				}
			} else {
				manual_custom_page_css_control('', '', false, false, $theme_options['bbpress-header-height']);
			}
			// ----- Page Title Responsive Layout Re-Adjust ------
			if( isset($theme_options['bbpress-responsive-header-height']) && $theme_options['bbpress-responsive-header-height'] != '') {
				echo '@media (max-width: 991px) { .page_opacity.header_custom_height_new { padding:'.$theme_options['bbpress-responsive-header-height'].'!important; } }';
			}
			// ----- Text Align ------
			if( isset($theme_options['bbpress-header-text-align']) && $theme_options['bbpress-header-text-align'] != '' ) {
				echo '.header_control_text_align { text-align:'.$theme_options['bbpress-header-text-align'].'; }';
			}
			// ----- Font Control ------
			$bbpress_headertitle_font_weight = $bbpress_headertitle_font_size = $bbpress_header_lineheight = '';
			if( isset($theme_options['bbpress_header_title_font_weight']) && $theme_options['bbpress_header_title_font_weight'] != '' && $theme_options['bbpress_header_title_font_weight'] != 'default' ) {
				$bbpress_headertitle_font_weight = 'font-weight:'.$theme_options['bbpress_header_title_font_weight'].'!important;';	
			}
			if( isset($theme_options['bbpress_header_title_font_size']) && ($theme_options['bbpress_header_title_font_size'] != '') ) {
				$bbpress_headertitle_font_size = 'font-size:'.$theme_options['bbpress_header_title_font_size'].'!important;';	
			}
			if( isset($theme_options['bbpress_header_title_line_height']) && ($theme_options['bbpress_header_title_line_height'] != '') ) {
				$bbpress_header_lineheight = 'line-height: '.$theme_options['bbpress_header_title_line_height'].'!important;';
			}
			echo 'h1.custom_h1_head { '.$bbpress_headertitle_font_weight.$bbpress_headertitle_font_size.$bbpress_header_lineheight.'}';
		
		
	  /*******************************************
	  ** LEARN PRESS                           ***
	  ********************************************/
	  } else if( class_exists( 'LearnPress' ) && manual__check_is_course() && is_archive()) {
			$learnpress_course_id = get_option('learn_press_courses_page_id');
			if( isset($learnpress_course_id) && $learnpress_course_id != '' ) { 
				manual_header_page_css_control($learnpress_course_id);
			} else { 
				manual__no_page_header_for_custom_post_type();
			}
	  }
		
	/***********************************************************
	** [THEME OPTION] - RESPONSIVE TITLE BAR HEIGHT CONTROL  ***
	************************************************************/
	echo '@media (max-width:991px) { .page_opacity.header_custom_height_new { padding: '.esc_attr($theme_options['default-header-sytle-responsive-height']).'; } } @media (max-width:767px) {  h1.custom_h1_head { font-size:'.esc_attr($theme_options['default-mobile-header-title-font-size']).'px!important; line-height:'.esc_attr($theme_options['default-mobile-header-title-font-line-height-spacing']).'!important; } }';
		
	}
}





/*******************************************************
	PAGE TITLE BAR {{ HEADER HEIGHT & BG IMAGE CONTROL }}
	BASED ON [[ PARAMETER SEND VIA FUNCTION ]]
	** NOTE: THEME OPTION POST TYPE HEADER CONTROL **
********************************************************/
if (!function_exists('manual_custom_page_css_control')) {
	function manual_custom_page_css_control($img='', $imgbgposition = 'center center', $navbarbg = true, $header_opacity = true, $headerheight = '', $lineargradient_first = '', $lineargradient_second = '', $bgcolor_withimage = '#f5f5f5', $headerh1color = '#ffffff', $linkregularcolor = '#f1f1f1', $responsive_headerheight = '' ) {
		global $theme_options;
		/************* Control Page Title Header Image ****************/
		if( $img != '' ) { 
			echo '.noise-break { background: '.$bgcolor_withimage.' ';
			echo 'url('.$img.') repeat; background-size: cover; background-position:'.$imgbgposition.'; ';
			echo '}';
			
			
			if( isset($headerh1color) && $headerh1color != '' && $headerh1color != '#ffffff' ) {
				$headerh1color = $headerh1color;
			}
			if( isset($linkregularcolor) && $linkregularcolor != '' && $linkregularcolor != '#ffffff' ) {
				$linkregularcolor = $linkregularcolor;
			}
			
			echo 'h1.custom_h1_head { color:'.$headerh1color.'!important; } .header-desc, #breadcrumbs, #breadcrumbs span, #breadcrumbs a, .trending-search a, .trending-search span.comma { color:'.$linkregularcolor.'!important; } .trending-search span.popular-keyword-title { color:'.$headerh1color.'; } p.inner-header-color { color: '.$headerh1color.'; } ';
			
			/************* Control Image Opacity ****************/
			if( $header_opacity == true ) { 
				echo '.page_opacity.header_custom_height_new { background: '.((isset($lineargradient_first)&& $lineargradient_first != '')?$lineargradient_first:'rgba(0,0,0,0.3)').';';
				if( ( isset($lineargradient_first) && $lineargradient_first != '' ) &&  (isset($lineargradient_second) && $lineargradient_second != '') ) {							
				echo 'background: -moz-linear-gradient(-45deg, '.$lineargradient_first.' 35%, '.$lineargradient_second.' 100%);
				background: -webkit-linear-gradient(-45deg, '.$lineargradient_first.' 35%, '.$lineargradient_second.' 100%);
				background: linear-gradient(135deg, '.$lineargradient_first.' 35%, '.$lineargradient_second.' 100%);';
				}
				echo '}'; 
			}
			
			if( $theme_options['theme-nav-type'] == 2 ) { 
				if( class_exists('bbPress') && is_bbpress() && !is_front_page() ) {
					$apply_nav_background_color_rgba = '';
					if( isset( $theme_options['apply-nav-background-color']['rgba'] ) && $theme_options['apply-nav-background-color']['rgba'] != '' ) {
						$apply_nav_background_color_rgba = 'background:'.$theme_options['apply-nav-background-color']['rgba'].'!important;';	
					}
					$nav_bg_call = $apply_nav_background_color_rgba;
				} else {
					$nav_bg_call = 'background:none!important;';
				}
				echo '.navbar {  border: none; box-shadow:none;'.$nav_bg_call.' } '; 
			}
			
			if( $navbarbg == true ) { 
				if( $theme_options['theme-nav-type'] == 2 ) { 
					echo '.navbar {  background:'.( (isset($theme_options['apply-nav-background-color']['rgba'])&& $theme_options['apply-nav-background-color']['rgba'] != '')?$theme_options['apply-nav-background-color']['rgba']:'' ).'!important; }';
				} 
			}
			
			if($theme_options['theme-nav-type'] == 2) { 
				echo 'img.home-logo-show { display: none; } img.inner-page-white-logo { display: block; } .navbar-inverse .navbar-nav>li>a, .theme-social-icons li a { color:'.$theme_options['first-level-menu-text-color-for-img-bg']['regular'].'!important; } .navbar-inverse .navbar-nav>li>a:hover, .theme-social-icons li a:hover { color:'.$theme_options['first-level-menu-text-color-for-img-bg']['hover'].'!important; } @media (max-width: 991px) and (min-width: 768px) { img.inner-page-white-logo { display: none!important; } img.home-logo-show { display: block; } .navbar {  background:'.$theme_options['mobile-bgackground-holder-headerbackground-color'].'!important; } } @media (max-width: 767px) {  img.inner-page-white-logo { display: none!important; } img.home-logo-show { display: block; } .navbar {   background:'.$theme_options['mobile-bgackground-holder-headerbackground-color'].'!important; } }'; }
				
			}
			
			/************* Control Page Title Height ****************/
			if( $headerheight != '' ) {
				if(preg_match("/ /", $headerheight)) {
					echo '@media (min-width: 992px) { .page_opacity.header_custom_height_new { padding: '.$headerheight.'; } }';
				} else {
					echo '@media (min-width: 992px) { .page_opacity.header_custom_height_new { padding: '.$headerheight.'px 0px; } }';
				}
			}
			
			/************* Control Page Responsive Title Height ****************/
			if( $responsive_headerheight != '' ) {
				echo '@media (max-width: 991px) { .page_opacity.header_custom_height_new { padding:'.$responsive_headerheight.'!important; } }';
			}
	}
}



/*******************************************************
	PAGE TITLE BAR {{ REMOVE }}
	BASED ON [[ PARAMETER SEND VIA FUNCTION ]]
	** NOTE: THEME OPTION POST TYPE HEADER CONTROL **
********************************************************/
if (!function_exists('manual__no_page_header_for_custom_post_type')) {
	function manual__no_page_header_for_custom_post_type() {
		global $theme_options;
		echo '.navbar { position: inherit; background:'.(isset($theme_options['apply-nav-background-color-for-transparent-bg']['rgba'])?$theme_options['apply-nav-background-color-for-transparent-bg']['rgba']:'').'!important; }img.inner-page-white-logo{ display: none; } img.home-logo-show { display: block; } .jumbotron_new .inner-margin-top { padding-top: 0px; } .navbar-inverse .navbar-nav>li>a, .theme-social-icons li a { color:'.$theme_options['first-level-menu-text-color']['regular'].'!important; } .navbar-inverse .navbar-nav>li>a:hover, .theme-social-icons li a:hover { color:'.$theme_options['first-level-menu-text-color']['hover'].'!important; } .hamburger-menu span { background:'.$theme_options['first-level-menu-text-color']['regular'].'; }';
	}
}
?>