<?php 
/*----------------------------*/
/*	MANUAL CUSTOMIZE :: LOGO
/*----------------------------*/
if (!function_exists('manual__logo_customize_settings')) {
	function manual__logo_customize_settings() {
		global $theme_options;
		
		// Normal Logo
		$logo_readjust = $logo_readjust_top_margin = $logo_readjust_responsive = $logo_readjust_top_margin_responsive = $logo_readjust_sticky = $logo_readjust_sticky_margin = '';
		if( isset($theme_options['theme-logo-readjust-height']['height']) && $theme_options['theme-logo-readjust-height']['height'] != '' && $theme_options['theme-logo-readjust-height']['height'] != 'px' ) {
			$logo_readjust = 'height:'.esc_attr($theme_options['theme-logo-readjust-height']['height']).'!important;';
		}
		if( isset($theme_options['theme-logo-readjust-margin-top']['height']) &&  $theme_options['theme-logo-readjust-margin-top']['height'] != '' &&  $theme_options['theme-logo-readjust-margin-top']['height'] != 'px' ) { 
			$logo_readjust_top_margin = 'margin-top:'.esc_attr($theme_options['theme-logo-readjust-margin-top']['height']).';';
		}
		// Responsive Logo
		if( isset($theme_options['theme-logo-readjust-height-responsive']['height']) && $theme_options['theme-logo-readjust-height-responsive']['height'] != '' && $theme_options['theme-logo-readjust-height-responsive']['height'] != 'px' ) { 
			$logo_readjust_responsive = 'height:'.esc_attr($theme_options['theme-logo-readjust-height-responsive']['height']).'!important;';
		}
		if( isset($theme_options['theme-logo-readjust-margin-top-responsive']['height']) && $theme_options['theme-logo-readjust-margin-top-responsive']['height'] != '' && $theme_options['theme-logo-readjust-margin-top-responsive']['height'] != 'px' ) { 
			$logo_readjust_top_margin_responsive = 'margin-top:'.esc_attr($theme_options['theme-logo-readjust-margin-top-responsive']['height']).';';
		}
		// Sticky Menu
		if( isset($theme_options['theme-logo-readjust-sticky-height']['height']) && $theme_options['theme-logo-readjust-sticky-height']['height'] != '' && $theme_options['theme-logo-readjust-sticky-height']['height'] != 'px' ) { 
			$logo_readjust_sticky = 'height: '.esc_attr($theme_options['theme-logo-readjust-sticky-height']['height']).'!important;'; 
		}
		if( isset($theme_options['theme-logo-readjust-sticky-margin-top']['height']) && $theme_options['theme-logo-readjust-sticky-margin-top']['height'] != '' && $theme_options['theme-logo-readjust-sticky-margin-top']['height'] != 'px' ) { 
			$logo_readjust_sticky_margin = 'margin-top: '.esc_attr($theme_options['theme-logo-readjust-sticky-margin-top']['height']).';'; 
		}
		if( isset($theme_options['theme-logo-readjust-sticky-hamburger-menu-top-margin']) && $theme_options['theme-logo-readjust-sticky-hamburger-menu-top-margin'] != '' ) { 
			$readjust_sticky_hamburger_menu_top_margin = 'margin-top: '.esc_attr($theme_options['theme-logo-readjust-sticky-hamburger-menu-top-margin']).'px;'; 
		}
		
		echo '.custom-nav-logo { '.$logo_readjust.' '.$logo_readjust_top_margin.'  } @media (max-width: 767px) { .custom-nav-logo {  '.$logo_readjust_responsive.'  '.$logo_readjust_top_margin_responsive.' }  } ';
		// Sticky menu login user design fix
		if( is_user_logged_in() == true ) { echo 'body.home nav.navbar.after-scroll-wrap, nav.navbar.after-scroll-wrap { margin-top: 32px; }'; }
		echo 'nav.navbar.after-scroll-wrap .custom-nav-logo { '.$logo_readjust_sticky.' '.$logo_readjust_sticky_margin.' } nav.navbar.after-scroll-wrap .hamburger-menu span { '.$readjust_sticky_hamburger_menu_top_margin.' }';
		
	}
}



/*-----------------------------------------------------------------*/
/*	MANUAL CUSTOMIZE :: TYPOGRAPHY (body, h1, h2, h3, h4, h5, h6)
/*-----------------------------------------------------------------*/
if (!function_exists('manual__typography_customize_settings')) {
	function manual__typography_customize_settings() {
		global $theme_options;
		
		// Body
		if( $theme_options['theme-typography-body']['font-family'] != '' ) {
			
			if( $theme_options['theme-typography-body']['font-family'] == 'Open Sans' && 
			    $theme_options['theme-typography-body']['line-height'] == '1.4px' ) {
				$body_lineheight = '1.7px';
			} else {
				$body_lineheight = $theme_options['theme-typography-body']['line-height'];
			}
			
			$body_font_bkup = '';
			if ( !empty( $theme_options['theme-typography-body']['font-family'] ) && !empty( $theme_options['theme-typography-body']['font-backup'] ) ) { 
				$body_font_bkup = ','.$theme_options['theme-typography-body']['font-backup'];   
			}
			
		echo '#learn-press-course-curriculum.course-curriculum ul.curriculum-sections .section-content .course-item .item-icon, #learn-press-course-curriculum.course-curriculum ul.curriculum-sections .section-content .course-item .item-name, .lp-pmpro-membership-list h2.lp-title, .lp-single-course .course-quick-info ul li span.label, body { color: '.esc_attr($theme_options['theme-typography-body']['color']).'; font-family:'.esc_attr(((isset($theme_options['custom-body-font']) && $theme_options['custom-body-font'] != '' )?$theme_options['custom-body-font']:$theme_options['theme-typography-body']['font-family'])).''.$body_font_bkup.'!important;font-size: '.esc_attr($theme_options['theme-typography-body']['font-size']). ($theme_options['theme-typography-body']['font-size'] == '15'?'px':'') .';line-height: '. preg_replace( '/px/', '', esc_attr($body_lineheight) ).';letter-spacing: '.esc_attr($theme_options['theme-typography-body']['letter-spacing']).($theme_options['theme-typography-body']['letter-spacing']=='0.3'?'px':'').'; font-weight: '.esc_attr((isset($theme_options['theme-typography-body']['font-weight']) && $theme_options['theme-typography-body']['font-weight'] != "")?$theme_options['theme-typography-body']['font-weight']:'400').' }';
		}
		// H1
		if( $theme_options['theme-h1-typography']['font-family'] != '' ) { 
			if( isset($theme_options['theme-h1-typography']['font-weight']) && 
				$theme_options['theme-h1-typography']['font-weight'] != ''  ) {
				$h1_weight = esc_attr($theme_options['theme-h1-typography']['font-weight']);	
			} else {
				$h1_weight = esc_attr($theme_options['theme-h1-typography']['font-style']);
			}
			
			$h1_font_bkup = '';
			if ( !empty( $theme_options['theme-h1-typography']['font-family'] ) && !empty( $theme_options['theme-h1-typography']['font-backup'] ) ) { 
				$h1_font_bkup = ','.$theme_options['theme-h1-typography']['font-backup'];   
			}
			
			echo 'body.course-item-popup #learn-press-content-item .course-item-title, h1 {  font-family: '.esc_attr(((isset($theme_options['custom-h1-font']) && $theme_options['custom-h1-font'] != "")?$theme_options['custom-h1-font']:$theme_options['theme-h1-typography']['font-family'])).''.$h1_font_bkup.'; font-weight:'.esc_attr($h1_weight).'; font-size:'.esc_attr($theme_options['theme-h1-typography']['font-size']).( ($theme_options['theme-h1-typography']['font-size'] == '40')?'px':'' ).'; line-height: '.esc_attr($theme_options['theme-h1-typography']['line-height']).( ($theme_options['theme-h1-typography']['line-height'] == '20' || $theme_options['theme-h1-typography']['line-height'] == '45')?'px':'' ).'; text-transform:'.esc_attr($theme_options['theme-h1-typography']['text-transform']).'; letter-spacing: '.esc_attr($theme_options['theme-h1-typography']['letter-spacing']).( ($theme_options['theme-h1-typography']['letter-spacing'] == '-0.7')?'px':'' ).'; color: '.esc_attr($theme_options['theme-h1-typography']['color']).'; }';				
		}
		// H2
		if( $theme_options['theme-h2-typography']['font-family'] != '' ) {
			if( isset($theme_options['theme-h2-typography']['font-weight']) && 
				$theme_options['theme-h2-typography']['font-weight'] != ''  ) {
				$h2_weight = esc_attr($theme_options['theme-h2-typography']['font-weight']);	
			} else {
				$h2_weight = esc_attr($theme_options['theme-h2-typography']['font-style']);
			}
			
			$h2_font_bkup = '';
			if ( !empty( $theme_options['theme-h2-typography']['font-family'] ) && !empty( $theme_options['theme-h2-typography']['font-backup'] ) ) { 
				$h2_font_bkup = ','.$theme_options['theme-h2-typography']['font-backup'];   
			}
			
			echo '.lp-pmpro-membership-list .lp-price, h2 {  font-family: '.esc_attr(((isset($theme_options['custom-h2-font']) && $theme_options['custom-h2-font'] != '')?$theme_options['custom-h2-font']:$theme_options['theme-h2-typography']['font-family'])).''.$h2_font_bkup.'; font-weight:'.esc_attr($h2_weight).'; font-size:'.esc_attr($theme_options['theme-h2-typography']['font-size']).( ($theme_options['theme-h2-typography']['font-size'] == '34')?'px':'' ).'; line-height: '.esc_attr($theme_options['theme-h2-typography']['line-height']).(($theme_options['theme-h2-typography']['line-height'] == '30' || $theme_options['theme-h2-typography']['line-height'] == '40')?'px':'' ).'; text-transform:'.esc_attr($theme_options['theme-h2-typography']['text-transform']).'; letter-spacing: '.esc_attr($theme_options['theme-h2-typography']['letter-spacing']).( ($theme_options['theme-h2-typography']['letter-spacing'] == '-0.4')?'px':'' ).'; color: '.esc_attr($theme_options['theme-h2-typography']['color']).'; }';				
		}
		// H3
		if( $theme_options['theme-h3-typography']['font-family'] != '' ) {
			if( isset($theme_options['theme-h3-typography']['font-weight']) && 
				$theme_options['theme-h3-typography']['font-weight'] != ''  ) {
				$h3_weight = esc_attr($theme_options['theme-h3-typography']['font-weight']);	
			} else {
				$h3_weight = esc_attr($theme_options['theme-h3-typography']['font-style']);
			}
			
			$h3_font_bkup = '';
			if ( !empty( $theme_options['theme-h3-typography']['font-family'] ) && !empty( $theme_options['theme-h3-typography']['font-backup'] ) ) { 
				$h3_font_bkup = ','.$theme_options['theme-h3-typography']['font-backup'];   
			}
			
			echo 'h3 {  font-family: '.esc_attr(((isset($theme_options['custom-h3-font']) && $theme_options['custom-h3-font'] != '')?$theme_options['custom-h3-font']:$theme_options['theme-h3-typography']['font-family'])).''.$h3_font_bkup.'; font-weight:'.esc_attr($h3_weight).'; font-size:'.esc_attr($theme_options['theme-h3-typography']['font-size']).( ($theme_options['theme-h3-typography']['font-size'] == '30')?'px':'' ).'; line-height: '.esc_attr($theme_options['theme-h3-typography']['line-height']).(($theme_options['theme-h3-typography']['line-height'] == '20' || $theme_options['theme-h3-typography']['line-height'] == '34')?'px':'' ).'; text-transform:'.esc_attr($theme_options['theme-h3-typography']['text-transform']).'; letter-spacing: '.esc_attr($theme_options['theme-h3-typography']['letter-spacing']).( ($theme_options['theme-h3-typography']['letter-spacing'] == '0')?'px':'' ).'; color: '.esc_attr($theme_options['theme-h3-typography']['color']).'; }';
		}
		// H4
		if( $theme_options['theme-h4-typography']['font-family'] != '' ) {
			if( isset($theme_options['theme-h4-typography']['font-weight']) && 
				$theme_options['theme-h4-typography']['font-weight'] != ''  ) {
				$h4_weight = esc_attr($theme_options['theme-h4-typography']['font-weight']);	
			} else {
				$h4_weight = esc_attr($theme_options['theme-h4-typography']['font-style']);
			}
			
			$h4_font_bkup = '';
			if ( !empty( $theme_options['theme-h4-typography']['font-family'] ) && !empty( $theme_options['theme-h4-typography']['font-backup'] ) ) { 
				$h4_font_bkup = ','.$theme_options['theme-h4-typography']['font-backup'];   
			}
			
			echo '.review-form h3, .course-rating h3, .single-lp_course .lp-single-course .course-author .author-name, #lp-single-course .related_course .related-title, .manual-course-wrapper .course-box .course-info .course-price.h4, h4 {  font-family: '.esc_attr(((isset($theme_options['custom-h4-font']) && $theme_options['custom-h4-font'] != '')?$theme_options['custom-h4-font']:$theme_options['theme-h4-typography']['font-family'])).''.$h4_font_bkup.'; font-weight:'.esc_attr($h4_weight).'; font-size:'.esc_attr($theme_options['theme-h4-typography']['font-size']).( ($theme_options['theme-h4-typography']['font-size'] == '24')?'px':'' ).'; line-height: '.esc_attr($theme_options['theme-h4-typography']['line-height']).(($theme_options['theme-h4-typography']['line-height'] == '20' || $theme_options['theme-h4-typography']['line-height'] == '30')?'px':'' ).'; text-transform:'.esc_attr($theme_options['theme-h4-typography']['text-transform']).'; letter-spacing: '.esc_attr($theme_options['theme-h4-typography']['letter-spacing']).( ($theme_options['theme-h4-typography']['letter-spacing'] == '0')?'px':'' ).'; color: '.esc_attr($theme_options['theme-h4-typography']['color']).'; }';
		}
		// H5
		if( $theme_options['theme-h5-typography']['font-family'] != '' ) {
			if( isset($theme_options['theme-h5-typography']['font-weight']) && 
				$theme_options['theme-h5-typography']['font-weight'] != ''  ) {
				$h5_weight = esc_attr($theme_options['theme-h5-typography']['font-weight']);	
			} else {
				$h5_weight = esc_attr($theme_options['theme-h5-typography']['font-style']);
			}
			
			$h5_font_bkup = '';
			if ( !empty( $theme_options['theme-h5-typography']['font-family'] ) && !empty( $theme_options['theme-h5-typography']['font-backup'] ) ) { 
				$h5_font_bkup = ','.$theme_options['theme-h5-typography']['font-backup'];   
			}
			
			echo 'ul.learn-press-wishlist-courses h3, .lp-profile-content .course-box .course-info h3.course-title, #course-item-content-header .course-title, .course-curriculum ul.curriculum-sections .section-header .section-title, .manual-course-wrapper .course-box .course-info .course-price, .manual-course-wrapper .course-box .course-info .course-price.h5, .sidebar-widget h1, .sidebar-widget h2, .sidebar-widget h3, h5 {  font-family: '.esc_attr(((isset($theme_options['custom-h5-font']) && $theme_options['custom-h5-font'] != '')?$theme_options['custom-h5-font']:$theme_options['theme-h5-typography']['font-family'])).''.$h5_font_bkup.'; font-weight:'.esc_attr($h5_weight).'; font-size:'.esc_attr($theme_options['theme-h5-typography']['font-size']).( ($theme_options['theme-h5-typography']['font-size'] == '19')?'px':'' ).'; line-height: '.esc_attr($theme_options['theme-h5-typography']['line-height']).(($theme_options['theme-h5-typography']['line-height'] == '23')?'px':'' ).'; text-transform:'.esc_attr($theme_options['theme-h5-typography']['text-transform']).'; letter-spacing: '.esc_attr($theme_options['theme-h5-typography']['letter-spacing']).( ($theme_options['theme-h5-typography']['letter-spacing'] == '0')?'px':'' ).'; color: '.esc_attr($theme_options['theme-h5-typography']['color']).'; }';
		}
		// H6
		if( $theme_options['theme-h6-typography']['font-family'] != '' ) {
			if( isset($theme_options['theme-h6-typography']['font-weight']) && 
				$theme_options['theme-h6-typography']['font-weight'] != ''  ) {
				$h6_weight = esc_attr($theme_options['theme-h6-typography']['font-weight']);	
			} else {
				$h6_weight = esc_attr($theme_options['theme-h6-typography']['font-style']);
			}
			
			$h6_font_bkup = '';
			if ( !empty( $theme_options['theme-h6-typography']['font-family'] ) && !empty( $theme_options['theme-h6-typography']['font-backup'] ) ) { 
				$h6_font_bkup = ','.$theme_options['theme-h6-typography']['font-backup'];   
			}
			
			echo '.archive-course-widget-outer .course-title, ul.learn-press-courses .course-box .course-info .course-price.h6, .manual-course-wrapper .course-box .course-info .course-price.h6, h6 {  font-family: '.esc_attr(((isset($theme_options['custom-h6-font']) && $theme_options['custom-h6-font'] != '')?$theme_options['custom-h6-font']:$theme_options['theme-h6-typography']['font-family'])).''.$h6_font_bkup.'; font-weight:'.esc_attr($h6_weight).'; font-size:'.esc_attr($theme_options['theme-h6-typography']['font-size']).( ($theme_options['theme-h6-typography']['font-size'] == '16')?'px':'' ).'; line-height: '.esc_attr($theme_options['theme-h6-typography']['line-height']).(($theme_options['theme-h6-typography']['line-height'] == '20')?'px':'' ).'; text-transform:'.esc_attr($theme_options['theme-h6-typography']['text-transform']).'; letter-spacing: '.esc_attr($theme_options['theme-h6-typography']['letter-spacing']).( ($theme_options['theme-h6-typography']['letter-spacing'] == '0')?'px':'' ).'; color: '.esc_attr($theme_options['theme-h6-typography']['color']).'; }';
		}
		
	}
}


/*-------------------------------------------------*/
/*	MANUAL CUSTOMIZE :: CUSTOM STYLE - GENERAL
/*-------------------------------------------------*/
if (!function_exists('manual__cs_general_customize_settings')) {
	function manual__cs_general_customize_settings() {
		global $theme_options;
		
		//Layout
		$box_top_margin_layout = '25px';
		$box_bottom_margin_layout = '';
		$box_layout_maxwidth = '1230px';
		if( isset($theme_options['website_box_layout_outer_margin']['margin-top']) && $theme_options['website_box_layout_outer_margin']['margin-top'] != '' ) {
			$box_top_margin_layout = $theme_options['website_box_layout_outer_margin']['margin-top'];	
		}
		if( isset($theme_options['website_box_layout_outer_margin']['margin-bottom']) && 
			$theme_options['website_box_layout_outer_margin']['margin-bottom'] != '' ) {
			$box_bottom_margin_layout = $theme_options['website_box_layout_outer_margin']['margin-bottom'];	
		}
		
		if( isset($theme_options['website_boxlayout_max_width']) && $theme_options['website_boxlayout_max_width'] != '' ) {
			$box_layout_maxwidth = $theme_options['website_boxlayout_max_width'];	
		}
		
		echo ' body.boxed_layout .theme_box_wrapper { max-width: '.$box_layout_maxwidth.'; margin: '.esc_attr($box_top_margin_layout).' auto '.esc_attr($box_bottom_margin_layout).'; } @media (min-width: 1200px) { .container { width: '.(isset($theme_options['website_width_container_1200'])?esc_attr($theme_options['website_width_container_1200']):'1170px').'; } .elementor-section.elementor-section-boxed > .elementor-container { max-width: '.(isset($theme_options['website_width_container_1200'])?esc_attr($theme_options['website_width_container_1200']):'1170px').'; padding-right: 6px; padding-left: 6px; }}';
		
		if( isset($theme_options['website_highscreen_container']) && $theme_options['website_highscreen_container'] == true ) {
			echo '@media (min-width: 1400px) { .container { width: '.(isset($theme_options['website_width_container_1400_and_1600'])?esc_attr($theme_options['website_width_container_1400_and_1600']):'1370px').'; } .elementor-section.elementor-section-boxed > .elementor-container { max-width: '.(isset($theme_options['website_width_container_1400_and_1600'])?esc_attr($theme_options['website_width_container_1400_and_1600']):'1370px').'; padding-right: 6px; padding-left: 6px;} } @media (min-width: 1600px) { .container { width: '.(isset($theme_options['website_width_container_1400_and_1600'])?esc_attr($theme_options['website_width_container_1400_and_1600']):'1370px').'; }  .elementor-section.elementor-section-boxed > .elementor-container { max-width: '.(isset($theme_options['website_width_container_1400_and_1600'])?esc_attr($theme_options['website_width_container_1400_and_1600']):'1370px').'; padding-right: 6px; padding-left: 6px;} } @media (min-width: 1900px) { .container { width: '.(isset($theme_options['website_width_container_1900'])?esc_attr($theme_options['website_width_container_1900']):'1570px').'!important; }  .elementor-section.elementor-section-boxed > .elementor-container { max-width: '.(isset($theme_options['website_width_container_1900'])?esc_attr($theme_options['website_width_container_1900']):'1570px').'!important; padding-right: 6px; padding-left: 6px;} }';
			echo '@media (min-width: 1400px) { body.boxed_layout .theme_box_wrapper { max-width:'.(isset($theme_options['website_boxlayout_max_width_1400_and_1600'])?esc_attr($theme_options['website_boxlayout_max_width_1400_and_1600']):'1370px').'; } } @media (min-width: 1600px) { body.boxed_layout .theme_box_wrapper { max-width:'.(isset($theme_options['website_boxlayout_max_width_1400_and_1600'])?esc_attr($theme_options['website_boxlayout_max_width_1400_and_1600']):'1370px').'; } } @media (min-width: 1900px) { body.boxed_layout .theme_box_wrapper { max-width:'.(isset($theme_options['website_boxlayout_max_width_1900'])?esc_attr($theme_options['website_boxlayout_max_width_1900']):'1370px').'!important; } }';
		}
			  
		if( isset($theme_options['website_box_layout']) && $theme_options['website_box_layout'] == true ) {
			echo '.parallax-mirror { z-index:0!important; }';
			
			if( $theme_options['website_box_layout_bg_image'] == true && $theme_options['website_box_layout_background_image']['url'] != '' ) {
				$box_layout_background = $box_layout_background_size = $box_layout_background_position = $box_layout_background_repeat = '';
				if( isset($theme_options['website_box_layout_background_image']['url']) && 
				$theme_options['website_box_layout_background_image']['url'] != "" ) {
					$box_layout_background = 'background-image:url('.esc_url($theme_options['website_box_layout_background_image']['url']).');';
				}
				if( isset($theme_options['website_box_layout_background_image_size']) && 
				$theme_options['website_box_layout_background_image_size'] != "" ) {
					$box_layout_background_size = 'background-size:'.esc_attr($theme_options['website_box_layout_background_image_size']).';';
				}
				if( isset($theme_options['website_box_layout_background_image_position']) && 
				$theme_options['website_box_layout_background_image_position'] != "" ) {
					$box_layout_background_position = 'background-position:'.esc_attr($theme_options['website_box_layout_background_image_position']).';';
				}
				if( isset($theme_options['website_box_layout_background_image_repeat']) && 
				$theme_options['website_box_layout_background_image_repeat'] != "" ) {
					$box_layout_background_repeat = 'background-repeat:'.esc_attr($theme_options['website_box_layout_background_image_repeat']).';';
				}
				echo 'body.boxed_layout{ '.$box_layout_background.' '.$box_layout_background_size.' '.$box_layout_background_position.' '.$box_layout_background_repeat.' } ';
			} else {
				$box_layout_background_color = '';
				if( isset($theme_options['website_box_layout_bg_color']['regular']) &&  $theme_options['website_box_layout_bg_color']['regular'] != "" ) {
					$box_layout_background_color = 'background:'.esc_attr($theme_options['website_box_layout_bg_color']['regular']).';';
				}
				echo 'body.boxed_layout{ '.$box_layout_background_color.';} ';
			}
			echo ' body.boxed_layout .parallax-mirror { z-index:0!important; }';
		}
		
		// Website Color
		echo '.lp-profile-content .course-box .course-meta .meta-icon, .browse-help-desk .browse-help-desk-div .i-fa:hover, ul.news-list li.cat-lists:hover:before, .body-content li.cat.inner:hover:before, .kb-box-single:hover:before, #list-manual li a.has-child.dataicon:before, #list-manual li a.has-inner-child.dataicon:before, .manual_related_articles h5:before, .manual_attached_section h5:before, .tagcloud.singlepgtag span i, form.searchform i.livesearch, span.required, .woocommerce .star-rating, .woocommerce-page .star-rating, .kb_tree_viewmenu ul li.root_cat a.kb-tree-recdisplay:before, .kb_tree_viewmenu_elementor ul li.root_cat a.kb-tree-recdisplay:before, .kb_tree_viewmenu ul li.root_cat_child a.kb-tree-recdisplay:before, .kb_tree_viewmenu_elementor ul li.root_cat_child a.kb-tree-recdisplay:before, #bbpress-forums .bbp-forum-title-container a:before, .body-content .collapsible-panels h4:before, .body-content .collapsible-panels h5:before, .portfolio-next-prv-bar .hvr-icon-back, .portfolio-next-prv-bar .hvr-icon-forward, .body-content .blog:before, #bbpress-forums .bbp-forum-title-container a:after, ul li.kb_tree_title a:hover:before, #list-manual li a.doc-active.has-child i:before, span.inlinedoc-postlink.inner:hover, .lp-single-course .course-meta i.icon, .course-review .review-stars-rated .review-stars > li span, button.learn-press-course-wishlist:before, .lp-single-course .course-quick-info ul li i, .review-stars-rated .review-stars.filled, .rating-box .review-stars-rated .review-stars>li span, .review-stars-rated .review-stars.empty, .review-stars-rated .review-stars.filled, .manual-course-wrapper .course-box .course-meta .meta-icon, #course-item-content-header .toggle-content-item:hover:before, body.single-lp_course.course-item-popup .course-item-nav .next a:before, body.single-lp_course.course-item-popup .course-item-nav .prev a:before, .manual-course-wrapper .course-box .course-related-meta .meta-icon, #course-item-content-header .toggle-content-item:before, .vc_theme_blog_post_holder .entry-meta i, .single-lp_course .course-curriculum ul.curriculum-sections .section-content .course-item.course-item-lp_lesson .section-item-link:before, .course-curriculum ul.curriculum-sections .section-content .course-item.course-item-lp_quiz .section-item-link:before, .lp-profile-extra th i, #learn-press-profile-nav .tabs > li:before, #toctoc #toctoc-body .link-h3 i, #toctoc #toctoc-body .link-h4 i, .course-extra-box__content li::before, #learn-press-course-tabs input[name="learn-press-course-tab-radio"]:nth-child(1):checked ~ .learn-press-nav-tabs .course-nav:nth-child(1) label, .ininebody .page-title-header:before {color:'.esc_attr($theme_options['website_colour']['regular']).'; } .social-share-box:hover { background:'.esc_attr($theme_options['website_colour']['regular']).'; border: 1px solid '.esc_attr($theme_options['website_colour']['regular']).'; } .manual_login_page { border-top: 4px solid '.esc_attr($theme_options['website_colour']['regular']).'; } .learn-press-pagination .page-numbers li > .page-numbers.current, .learn-press-pagination .page-numbers li > .page-numbers:hover, .pagination .page-numbers.current, .pagination .page-numbers:hover, .pagination a.page-numbers:hover, .pagination .next.page-numbers:hover, .pagination .prev.page-numbers:hover { background-color: '.esc_attr($theme_options['website_colour']['regular']).'; border-color: '.esc_attr($theme_options['website_colour']['regular']).'; } .learn-press-pagination .page-numbers li > .page-numbers.current, .learn-press-pagination .page-numbers li > .page-numbers:hover, .pagination .page-numbers.current, .pagination .page-numbers:hover, .pagination a.page-numbers:hover, .pagination .next.page-numbers:hover, .pagination .prev.page-numbers:hover{ color: #ffffff; } blockquote { border-left: 5px solid '.esc_attr($theme_options['website_colour']['regular']).'; } form.bbp-login-form, .bbp-logged-in { border-top: 4px solid '.esc_attr($theme_options['website_colour']['regular']).'; } .woocommerce .quantity .minus:hover, .woocommerce #content .quantity .minus:hover, .woocommerce-page .quantity .minus:hover, .woocommerce-page #content .quantity .minus:hover, .woocommerce .quantity .plus:hover, .woocommerce #content .quantity .plus:hover, .woocommerce-page .quantity .plus:hover, .woocommerce-page #content .quantity .plus:hover, .shopping_cart_header .header_cart .header_cart_span { background-color:'.esc_attr($theme_options['website_colour']['regular']).'; } .woocommerce div.product .woocommerce-tabs ul.tabs li.active { border-top: 4px solid '.esc_attr($theme_options['website_colour']['regular']).'; } .woocommerce p.stars a, .woocommerce p.stars a:hover, button.learn-press-course-wishlist:hover { color:'.esc_attr($theme_options['website_colour']['regular']).'!important;  } .sidebar-widget.widget_product_categories ul li.current-cat>a { border-left-color: '.esc_attr($theme_options['website_colour']['regular']).'; }.woocommerce .widget_price_filter .ui-slider-horizontal .ui-slider-range, .woocommerce-page .widget_price_filter .ui-slider-horizontal .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce-page .widget_price_filter .ui-slider .ui-slider-handle { background-color: '.esc_attr($theme_options['website_colour']['regular']).'; } .pagination>li>a:focus, .pagination>li>a:hover, .pagination>li>span:focus, .pagination>li>span:hover { background-color: '.esc_attr($theme_options['website_colour']['regular']).'; border-color:'.esc_attr($theme_options['website_colour']['regular']).'; color:#ffffff; } #bbpress-forums .bbp-forums .status-category .bbp-forum-header, #bbpress-forums .bbp-forums > .bbp-forum-header { border-top: 1px solid '.esc_attr($theme_options['website_colour']['regular']).'; } .sidebar-widget.widget_product_categories ul li a:hover { border-left: 5px solid '.esc_attr($theme_options['website_colour']['regular']).'; } a.post-page-numbers.current { color:'.esc_attr($theme_options['website_colour']['regular']).'; background:#ffffff; border: 1px solid '.esc_attr($theme_options['website_colour']['regular']).'; } .inlinedocs-sidebar ul.nav li ul { border-left: 1px dashed '.esc_attr($theme_options['website_colour']['regular']).'; } .lp-single-course .course-tabs .nav-tabs li.active:before, .course-rating .rating-rated-item .rating-progress .full_bar .progress-bar { background-color:'.esc_attr($theme_options['website_colour']['regular']).'; } #learn-press-profile-nav .tabs > li.active > a { border-left:2px solid '.esc_attr($theme_options['website_colour']['regular']).'; }.manual-tabpanel.manual-tabpanel-horizontal>.manual-nav-tabs li.active a { border-bottom-color: '.esc_attr($theme_options['website_colour']['regular']).'; }.lp-tab-sections .section-tab.active span { border-bottom: 2px solid '.esc_attr($theme_options['website_colour']['regular']).'; }#toctoc #toctoc-head p { border-bottom: 1px solid '.esc_attr($theme_options['website_colour']['regular']).'; }.social-share-box{ border: 1px solid '.esc_attr($theme_options['website_colour']['regular']).'; }:root {--lp-primary-color: '.esc_attr($theme_options['website_colour']['regular']).';}';
		// Standard a tag + hover color 
		echo 'a, a:visited, a:focus, .body-content .knowledgebase-cat-body h4 a, .body-content .knowledgebase-body h5:before, .body-content .knowledgebase-body h5 a, .body-content .knowledgebase-body h6 a, .body-content .knowledgebase-body h4 a, .body-content .knowledgebase-body h3 a, #bbpress-forums .bbp-reply-author .bbp-author-name, #bbpress-forums .bbp-topic-freshness > a, #bbpress-forums li.bbp-body ul.topic li.bbp-topic-title a, #bbpress-forums .last-posted-topic-title a, #bbpress-forums .bbp-forum-link, #bbpress-forums .bbp-forum-header .bbp-forum-title, .body-content .blog .caption h2 a, a.href, .body-content .collapsible-panels p.post-edit-link a, .tagcloud.singlepg a, h4.title-faq-cat a, .portfolio-next-prv-bar .portfolio-prev a, .portfolio-next-prv-bar .portfolio-next a, .search h4 a, .portfolio-filter ul li span, ul.news-list.doc-landing li a, .kb-box-single a, .portfolio-desc a, .woocommerce ul.products li.product a, .kb_tree_viewmenu ul li a, .kb_tree_viewmenu_elementor ul li a,  #bbpress-forums .bbp-admin-links a, .woocommerce div.product div.product_meta>span span, .woocommerce div.product div.product_meta>span a, td.product-name a, .body-content .blog-author h5.author-title a, .entry-content .inlinedocs-sidebar a, .single-lp_course .course-curriculum ul.curriculum-sections .section-content .course-item.item-locked .course-item-status:before, #learn-press-profile-nav .tabs > li a, .lp-tab-sections .section-tab a, .lp-profile-content .course-box .course-info h3.course-title a, .lp-list-table tbody tr td a, table.lp-pmpro-membership-list a, p.pmpro_actions_nav a, .woocommerce .woocommerce-MyAccount-navigation ul li a, .vc_theme_blog_post_holder .entry-header a, ul.learn-press-courses .course .course-title a, .lp-sub-menu li a, .widget_lp-widget-recent-courses .course-title, .monitor_frame_main_div .portfolio_title a, #toctoc a, #popup-course #popup-footer .course-item-nav .next a { color:'.esc_attr($theme_options['manual-global-link-color']['regular']).'; } a:hover, .body-content .knowledgebase-cat-body h4 a:hover, .body-content .knowledgebase-body h6:hover:before, .body-content .knowledgebase-body h5:hover:before, .body-content .knowledgebase-body h4:hover:before, .body-content .knowledgebase-body h3:hover:before, .body-content .knowledgebase-body h6 a:hover, .body-content .knowledgebase-body h5 a:hover, .body-content .knowledgebase-body h4 a:hover, .body-content .knowledgebase-body h3 a:hover, #bbpress-forums .bbp-reply-author .bbp-author-name:hover, #bbpress-forums .bbp-topic-freshness > a:hover, #bbpress-forums li.bbp-body ul.topic li.bbp-topic-title a:hover, #bbpress-forums .last-posted-topic-title a:hover, #bbpress-forums .bbp-forum-link:hover, #bbpress-forums .bbp-forum-header .bbp-forum-title:hover, .body-content .blog .caption h2 a:hover, .body-content .blog .caption span:hover, .body-content .blog .caption p a:hover, .sidebar-nav ul li a:hover, .tagcloud a:hover , a.href:hover, .body-content .collapsible-panels p.post-edit-link a:hover, .tagcloud.singlepg a:hover, .body-content li.cat a:hover, h4.title-faq-cat a:hover, .portfolio-next-prv-bar .portfolio-prev a:hover, .portfolio-next-prv-bar .portfolio-next a:hover, .search h4 a:hover, .portfolio-filter ul li span:hover, ul.news-list.doc-landing li a:hover, .news-list li:hover:before, .body-content li.cat.inner:hover:before, .kb-box-single:hover:before, .kb_article_type li.articles:hover:before, .kb-box-single a:hover, .portfolio-desc a:hover, .woocommerce ul.products li.product a:hover, .kb_tree_viewmenu h6 a:hover, .kb_tree_viewmenu_elementor h6 a:hover, .kb_tree_viewmenu h6 a:hover:before, .kb_tree_viewmenu_elementor h6 a:hover:before, .kb_tree_viewmenu h5 a:hover, .kb_tree_viewmenu_elementor h5 a:hover, .kb_tree_viewmenu h5 a:hover:before,  .kb_tree_viewmenu_elementor h5 a:hover:before,  .kb_tree_viewmenu ul li a:hover, .kb_tree_viewmenu_elementor ul li a:hover, #bbpress-forums li.bbp-body ul.topic li.bbp-topic-title:hover:before, #bbpress-forums .bbp-admin-links a:hover, .widget_display_topics li:hover:before, .woocommerce div.product div.product_meta>span span:hover, .woocommerce div.product div.product_meta>span a:hover, #breadcrumbs a:hover, .body-content li.cat.inner a:hover:before, .vc_kb_article_type li.articles a:hover:before, .footer-go-uplink:hover, a.post-edit-link:hover, .body-content .collapsible-panels h4:hover:before, .body-content .collapsible-panels h5:hover:before, td.product-name a:hover, ul.vc_kbcat_widget li:hover:before, .sidebar-widget .display-faq-section li.cat-item a:hover:before, .body-content .display-faq-section ul li.cat-item.current-cat a:before, .single-lp_course .course-curriculum ul.curriculum-sections .section-content .course-item.item-locked .course-item-status:hover:before, #learn-press-profile-nav .tabs > li.dashboard:hover:before, #learn-press-profile-nav .tabs > li.courses:hover:before, #learn-press-profile-nav .tabs > li.quizzes:hover:before, #learn-press-profile-nav .tabs > li.wishlist:hover:before, #learn-press-profile-nav .tabs > li.orders:hover:before, #learn-press-profile-nav .tabs > li.settings:hover:before, .lp-tab-sections .section-tab a:hover, .lp-profile-content .course-box .course-info h3.course-title a:hover, .lp-list-table tbody tr td a:hover, .learn-press-courses .learn-press-course-wishlist.wishlist-button:hover, table.lp-pmpro-membership-list a:hover, p.pmpro_actions_nav a:hover, .woocommerce .woocommerce-MyAccount-navigation ul li a:hover, .vc_theme_blog_post_holder .entry-header a:hover, ul.learn-press-courses .course .course-title a:hover, .lp-sub-menu li a:hover, .widget_lp-widget-recent-courses .course-title:hover, .woocommerce ul.cart_list li a:hover, .shopping_cart_dropdown ul li a:hover, .monitor_frame_main_div .portfolio_title a:hover, #toctoc a:hover, #list-manual li a.doc-active, #list-manual li a.doc-active-normal, .mobile-menu-holder.doc-mobile-menu .navbar-nav li a.doc-active-normal, .mobile-menu-holder.doc-mobile-menu a.has-child > i, #list-manual-phone li a.has-inner-child > i, #popup-course #popup-footer .course-item-nav .next a:hover, .inlinedocs-sidebar .nav>.active>a, .inlinedocs-sidebar .nav>li.active> span i { color:'.esc_attr($theme_options['manual-global-link-color']['hover']).'; } .trending-search a:hover, li.current-singlepg-active a, li.current-singlepg-active a:before, .kb_article_type li.articles a:hover:before, .sidebar-widget .display-faq-section li.cat-item:hover:before, ul.manual-searchresults li.live_search_attachment_icon a:hover:before, ul.manual-searchresults li.live_search_portfolio_icon a:hover:before, ul.manual-searchresults li.live_search_forum_icon a:hover:before, .body-content .blog-author h5.author-title a:hover, span.edit-link a.vc_inline-link:hover, .body-content .search:hover:before, ul.manual-searchresults li.live_search_doc_icon a:hover:before, ul.manual-searchresults li.live_search_kb_icon a:hover:before, ul.manual-searchresults li.live_search_faq_icon a:hover:before, ul.manual-searchresults li.live_search_lp_quiz_icon a:hover:before, ul.manual-searchresults li.live_search_lp_lesson_icon a:hover:before, ul.manual-searchresults li.live_search_lp_course_icon a:hover:before, #list-manual li a.has-inner-child > i, #list-manual li a.has-child.dataicon i:before,  #list-manual li a.has-inner-child.dataicon i:before, #list-manual li a.doc-active.has-inner-child i:before, .doc-root-child-plus-icon { color:'.esc_attr($theme_options['manual-global-link-color']['hover']).'!important; }#list-manual .underline_link:before, .mCSB_container .underline_link:before, .mobile-menu-holder.doc-mobile-menu .underline_link:before{  background-color:'.esc_attr($theme_options['manual-global-link-color']['hover']).'; } .mobile-menu-holder.doc-mobile-menu .navbar-nav li a.doc-active, .mobile-menu-holder.doc-mobile-menu a.has-inner-child > i, .mobile-menu-holder.doc-mobile-menu a:hover { color:'.esc_attr($theme_options['manual-global-link-color']['hover']).'!important; } .mobile-menu-holder.doc-mobile-menu a { color:'.esc_attr($theme_options['manual-global-link-color']['regular']).'!important; }'; 
		// Standard a tag + hover color (inside post)
		echo '.entry-content a, .manual_attached_section a, #toctoc #toctoc-head a.sh_toc, .page-title-header span.inlinedoc-postlink, span.inlinedoc-postlink.inner { color:'.esc_attr($theme_options['standard_a_tag_link_color_inside_post']['regular']).'; }.entry-content a:hover, .manual_attached_section a:hover, #toctoc #toctoc-head a:hover.sh_toc, .page-title-header span.inlinedoc-postlink:hover, span.inlinedoc-postlink.inner:hover{ color:'.esc_attr($theme_options['standard_a_tag_link_color_inside_post']['hover']).'; }';
		// Custom Text :: Link Color
		echo '.custom-link, .more-link, .load_more a, a.custom-link-blog, a.custom-link i {color:'.esc_attr($theme_options['text_link_color']['regular']).'!important;}.custom-link:hover, .more-link:hover, .load_more a:hover, a.custom-link-blog:hover { color:'.esc_attr($theme_options['text_link_color']['hover']).'!important; }';
		// Botton Color + text color
		echo '.button-custom, p.home-message-darkblue-bar, p.portfolio-des-n-link, .portfolio-section .portfolio-button-top, .body-content .wpcf7 input[type="submit"], .container .blog-btn, .sidebar-widget.widget_search input[type="submit"], .navbar-inverse .navbar-toggle, .custom_login_form input[type="submit"], .custom-botton, button#bbp_user_edit_submit, button#bbp_topic_submit, button#bbp_reply_submit, button#bbp_merge_topic_submit, .bbp_widget_login button#user-submit, input[type=submit], .vc_btn3.vc_btn3-color-juicy-pink, .vc_btn3.vc_btn3-color-juicy-pink.vc_btn3-style-flat, #bbpress-forums .bbp-topic-controls #favorite-toggle, #bbpress-forums .bbp-topic-controls #subscription-toggle, .bbp-logged-in a.button, .woocommerce a.button, form.woocommerce-product-search button, .woocommerce button.button.alt, .woocommerce #respond input#submit, .woocommerce button.button, .woocommerce input.button, .wp-block-button__link, button.write-a-review, button.submit-review, .course-curriculum ul.curriculum-sections .section-content .course-item.item-preview .course-item-status, #course-item-content-header .form-button.lp-button-back button, button[type="submit"], .lp-button, button#lp-upload-photo, #learn-press-pmpro-notice.purchase-course a, .shopping_cart_dropdown .qbutton, .lp_profile_course_progress__nav button {background-color:'.esc_attr($theme_options['botton_color']['regular']).'!important; color:'.esc_attr($theme_options['botton_text_color']['regular']).'!important; -webkit-transition: background-color 2s ease-out; -moz-transition: background-color 2s ease-out; -o-transition: background-color 2s ease-out; transition: background-color 2s ease-out; }
		.navbar-inverse .navbar-toggle, .container .blog-btn,input[type=submit] { border-color:'.esc_attr($theme_options['botton_color']['regular']).'!important;}
		.button-custom:hover, p.home-message-darkblue-bar:hover, .body-content .wpcf7 input[type="submit"]:hover, .container .blog-btn:hover, .sidebar-widget.widget_search input[type="submit"]:hover, .navbar-inverse .navbar-toggle:hover, .custom_login_form input[type="submit"]:hover, .custom-botton:hover, button#bbp_user_edit_submit:hover, button#bbp_topic_submit:hover, button#bbp_reply_submit:hover, button#bbp_merge_topic_submit:hover, .bbp_widget_login button#user-submit:hover, input[type=submit]:hover, .vc_btn3.vc_btn3-color-juicy-pink.vc_btn3-style-flat:focus, .vc_btn3.vc_btn3-color-juicy-pink.vc_btn3-style-flat:hover, .vc_btn3.vc_btn3-color-juicy-pink:focus, .vc_btn3.vc_btn3-color-juicy-pink:hover, #bbpress-forums .bbp-topic-controls #favorite-toggle:hover, #bbpress-forums .bbp-topic-controls #subscription-toggle:hover, .bbp-logged-in a.button:hover, .woocommerce a.button:hover, form.woocommerce-product-search button:hover, .woocommerce button.button.alt:hover, .woocommerce #respond input#submit:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .wp-block-button__link:hover, p.portfolio-des-n-link:hover, button.write-a-review:hover, button.submit-review:hover, .course-curriculum ul.curriculum-sections .section-content .course-item.item-preview .course-item-status:hover, #course-item-content-header .form-button.lp-button-back button:hover, button[type="submit"]:hover, .lp-button:hover, button#lp-upload-photo:hover, #learn-press-pmpro-notice.purchase-course a:hover, .shopping_cart_dropdown .qbutton:hover, .lp_profile_course_progress__nav button:hover {  background-color:'.esc_attr($theme_options['botton_color']['hover']).'!important; } .navbar-inverse .navbar-toggle:hover { border-color:'.esc_attr($theme_options['botton_color']['hover']).'!important;  }';
		//Learpress
		$learnpress_h5_weight = '';
		if( isset($theme_options['theme-h5-typography']['font-weight']) && 
			$theme_options['theme-h5-typography']['font-weight'] != ''  ) {
			$learnpress_h5_weight = esc_attr($theme_options['theme-h5-typography']['font-weight']);	
		} else {
			$learnpress_h5_weight = esc_attr($theme_options['theme-h5-typography']['font-style']);
		}
		echo '.learnpress_manual a, .manual-course-wrapper .course-box .course-info .course-title a, .lp-profile-header .author-social-networks a{ color:'.esc_attr($theme_options['manual-global-link-color']['regular']).'!important;  }.learnpress_manual a:hover, .manual-course-wrapper .course-box .course-info .course-title a:hover, .lp-profile-header .author-social-networks a:hover{ color:'.esc_attr($theme_options['manual-global-link-color']['hover']).'!important; }.lp-single-course .course-meta label, .lp-single-course .course-payment label { color: '.esc_attr($theme_options['theme-typography-body']['color']).'; } .course-curriculum ul.curriculum-sections .section-content .course-item{ font-size: '.esc_attr($theme_options['theme-typography-body']['font-size']). ($theme_options['theme-typography-body']['font-size'] == '14'?'px':'') .'; }.course-curriculum ul.curriculum-sections .section-content .course-item.current { background-color:'.esc_attr($theme_options['website_colour']['regular']).'!important; } ul.learn-press-courses .course .course-title { margin: 5px 0px 18px; font-size:'.esc_attr($theme_options['theme-h5-typography']['font-size']).( ($theme_options['theme-h5-typography']['font-size'] == '16')?'px':'' ).'; line-height: '.esc_attr($theme_options['theme-h5-typography']['line-height']).(($theme_options['theme-h5-typography']['line-height'] == '20')?'px':'' ).'; font-weight:'.esc_attr($learnpress_h5_weight).'; }#popup-course #popup-sidebar .course-curriculum .section .section-content .course-item .section-item-link .item-name{ font-size: '.esc_attr($theme_options['theme-typography-body']['font-size']). ($theme_options['theme-typography-body']['font-size'] == '15'?'px':'') .'!important; }.learn-press-tabs .learn-press-tabs__tab.active::before{ background:'.esc_attr($theme_options['website_colour']['regular']).'!important; }.learn-press-tabs .learn-press-tabs__tab.active a, .lp-profile-content .learn-press-filters > li span, .lp-profile-nav-tabs li.has-child.active > ul > li.active > a{ color:'.esc_attr($theme_options['website_colour']['regular']).'!important; } .learn-press-message.success { border-top: 5px solid '.esc_attr($theme_options['website_colour']['regular']).'; }';
		
		// Meta icon color
		echo '.body-content .blog .caption p a i, .body-content .blog .caption p i, .page-title-header p, p.entry-meta i { color:'.esc_attr($theme_options['blog-meta-icon-color']['regular']).'; } .page-title-header span, p.entry-meta span {  color:'.esc_attr($theme_options['blog-meta-icon-text-color']['regular']).';  }';
		//POST TYPE- DOC SINGLE PAGE/CATEGORY 
		if( (isset($theme_options['doc-global-arcile-display-style']) && $theme_options['doc-global-arcile-display-style'] == 2) && 
			(isset($theme_options['documentation-pg-content-box-shadow']) && $theme_options['documentation-pg-content-box-shadow'] == true) ) {
			echo '.doc-single-post.doc-page { background: #fff!important; padding: 50px 50px!important; margin-bottom: 30px!important; }';
			
			if( $theme_options['doc-global-design2-content-box-margin-zero'] == true ) {
				echo '.doc-row-margin-fix{ margin-top:0px; margin-bottom:0px; } .doc-row-margin-fix aside#sidebar-box, .doc-row-margin-fix aside.doc-sidebar-box { padding-top:50px; } .doc-row-margin-fix .doc-single-post.doc-page { margin-bottom: 0px!important; } .doc-single-post.doc-page{ border-right: 1px solid #f1f1f1; border-left: 1px solid #f1f1f1; }';
			}
			
		} else {
			if( (isset($theme_options['doc-global-arcile-display-style']) && $theme_options['doc-global-arcile-display-style'] == 1) && 
				( isset($theme_options['documentation-pg-title-icon']) && $theme_options['documentation-pg-title-icon'] == false ) ) { 
				echo '.page-title-header:before{ content: ""; } .page-title-header { padding: 0px 0px 5px 0px; }';
			}
		}
		
		// Global Theme Widget Design
		if( $theme_options['theme_widget_display_style_global'] == 2 ) {
			echo '.custom-well { padding:0px; background:transparent; } .sidebar-widget { padding:0px; }';	
			if( is_rtl() ) echo '.kb_article_type li.articles a:before { padding-right: 31px; }';
		}
		
		// bbPress Design Control
		$bbpress_header_bgcolor = $bbpress_header_font_size = $bbpress_header_font_weight = $bbpress_header_height = $bbpress_header_border_top_width = $bbpress_header_border_border_color = $bbpress_header_text_color = $bbpress_container_fontsize = $bbpress_header_border_btm_width = '';
		if( isset($theme_options['bbpress-forum-header-background-color']['rgba']) && $theme_options['bbpress-forum-header-background-color']['rgba'] != '' ) {
			$bbpress_header_bgcolor = 'background:'.$theme_options['bbpress-forum-header-background-color']['rgba'].';';
		}
		if( isset($theme_options['bbpress-forum-header-font-size']) && $theme_options['bbpress-forum-header-font-size'] != '' ) {
			$bbpress_header_font_size = 'font-size:'.$theme_options['bbpress-forum-header-font-size'].'px;';
		}
		if( isset($theme_options['bbpress-forum-header-font-weight']) && $theme_options['bbpress-forum-header-font-weight'] != '' ) {
			$bbpress_header_font_weight = 'font-weight:'.$theme_options['bbpress-forum-header-font-weight'].';';
		}
		if( isset($theme_options['bbpress-forum-header-height']) && $theme_options['bbpress-forum-header-height'] != '' ) {
			$bbpress_header_height = 'padding: '.$theme_options['bbpress-forum-header-height'].'px 13px!important;';
		}
		if( isset($theme_options['bbpress-forum-header-border-top-height']) && $theme_options['bbpress-forum-header-border-top-height'] != '' ) {
			$bbpress_header_border_top_width = 'border-top-width: '.$theme_options['bbpress-forum-header-border-top-height'].'px;';
			$bbpress_header_border_btm_width = 'border-bottom-width: '.$theme_options['bbpress-forum-header-border-top-height'].'px;';
		}
		if( isset($theme_options['bbpress-forum-header-border-top-color']['rgba']) && $theme_options['bbpress-forum-header-border-top-color']['rgba'] != '' ) {
			$bbpress_header_border_border_color = 'border-color: '.$theme_options['bbpress-forum-header-border-top-color']['rgba'].';';
		}
		if( isset($theme_options['bbpress-forum-header-background-text-color']) && $theme_options['bbpress-forum-header-background-text-color'] != '' ) {
			$bbpress_header_text_color = 'color: '.$theme_options['bbpress-forum-header-background-text-color'].';';
		}
		if( isset($theme_options['bbpress-forum-container-description-fontsize']) && $theme_options['bbpress-forum-container-description-fontsize'] != '' ) {
			$bbpress_container_fontsize = 'font-size: '.$theme_options['bbpress-forum-container-description-fontsize'].'px!important;';
		}
		echo '#bbpress-forums .bbp-forum-header { '.$bbpress_header_bgcolor.' '.$bbpress_header_height.' } #bbpress-forums .bbp-forum-header .bbp-forum-title { '.$bbpress_header_font_size.' '.$bbpress_header_font_weight.' '.$bbpress_header_text_color.' } #bbpress-forums .bbp-forums .status-category .bbp-forum-header, #bbpress-forums .bbp-forums > .bbp-forum-header { '.$bbpress_header_border_top_width.' '.$bbpress_header_border_border_color.' } #bbpress-forums .bbp-forum-description { '.$bbpress_container_fontsize.' } #bbpress-forums .bbp-user-section li.bbp-header, #bbpress-forums .bbp-topics li.bbp-header { '.$bbpress_header_border_border_color.' '.$bbpress_header_border_btm_width.' }';
		
		//Main Header Search Box Design Control
		$main_menubar_searchbox_top_margin = $main_menubar_font_size = $main_menubar_searchbox_bgcolor = $main_menubar_searchbox_placeholder_txtcolor = '';
		if( isset($theme_options['main-menubar-searchbox-font-size']) && $theme_options['main-menubar-searchbox-font-size'] != '' ) {
			$main_menubar_font_size = 'font-size: '.$theme_options['main-menubar-searchbox-font-size'].'px;';
		}
		if( isset($theme_options['main-menubar-searchbox-top-margin']) && $theme_options['main-menubar-searchbox-top-margin'] != '' ) {
			$main_menubar_searchbox_top_margin = 'top: '.$theme_options['main-menubar-searchbox-top-margin'].'px;';
		}
		if( isset($theme_options['main-menubar-searchbox-design-bgcolor']['rgba']) && $theme_options['main-menubar-searchbox-design-bgcolor']['rgba'] != '' ) {
			$main_menubar_searchbox_bgcolor = 'background: '.$theme_options['main-menubar-searchbox-design-bgcolor']['rgba'].'!important;';
		}
		if( isset($theme_options['main-menubar-searchbox-placeholder-text-color']) && $theme_options['main-menubar-searchbox-placeholder-text-color'] != '' ) {
			$main_menubar_searchbox_placeholder_txtcolor = 'color: '.$theme_options['main-menubar-searchbox-placeholder-text-color'].';';
		}
		echo '.form-group.menu-bar-form .form-control, .form-group.menu-bar-form .button-custom.custom-simple-search { '.$main_menubar_searchbox_bgcolor.' } .form-group.menu-bar-form .form-control::-webkit-input-placeholder { '.$main_menubar_searchbox_placeholder_txtcolor.' } .form-group.menu-bar-form .form-control:-ms-input-placeholder { '.$main_menubar_searchbox_placeholder_txtcolor.' } .form-group.menu-bar-form .form-control::placeholder { '.$main_menubar_searchbox_placeholder_txtcolor.' } .navbar .form-group.menu-bar-form { '.$main_menubar_searchbox_top_margin.' } .navbar .form-group.menu-bar-form .form-control { border: 1px solid #e2e7ee!important; min-height: 40px; border-radius: 45px!important; padding-left: 38px; '.$main_menubar_font_size.' } .navbar .form-group.menu-bar-form input:focus{  border: 1px solid '.esc_attr($theme_options['website_colour']['regular']).'!important; } .navbar .form-control.header-search.search_loading { background: #fff url("'.trailingslashit( get_template_directory_uri() ).'img/loader.svg") no-repeat right 5px center!important; } @media (max-width:767px) { .navbar .form-control.header-search.search_loading { background: #fff url("'.trailingslashit( get_template_directory_uri() ).'img/loader.svg") no-repeat right 5px center!important; } } .navbar .form-group.menu-bar-form select.search-expand-types, .navbar .form-group.menu-bar-form .button-custom { display:none; }';
		
		// Documentation tree menu display style 2 
		if( isset($theme_options['documentation-tree-menu-display-style']) && $theme_options['documentation-tree-menu-display-style'] == 2 ) {
			echo 'ul#list-manual > li > ul, .mCSB_container > li > ul { margin-left: 0 !important; display:block!important; } #list-manual li a.has-child i:before, #list-manual .doc-root-plus-icon, .mCSB_container li a.has-child i:before, .mCSB_container .doc-root-plus-icon{ display:none!important; } #list-manual li a.no-child, .mCSB_container li a.no-child { padding: 2px 5px 2px 0px; } ul#list-manual > li > a.has-child, .mCSB_container > li > a.has-child{ font-weight: bold;padding-left: 0 !important;margin-left: -2px;}#list-manual li.active > a, #list-manual li a:hover, .mCSB_container li.active > a, .mCSB_container li a:hover { background-color: transparent; border-radius:0px; } #list-manual li a, .mCSB_container li a { padding: 3px 5px 3px 26px; } #list-manual li a.doc-active, .doc-root-child-plus-icon, #list-manual li a i, .mCSB_container li a.doc-active, .mCSB_container li a i, #list-manual li a.has-inner-child.dataicon i:before, #list-manual li a.doc-active.has-inner-child i:before { color:'.esc_attr($theme_options['manual-global-link-color']['hover']).'; } #list-manual .mCSB_container li a.has-child{ padding-left: 3px!important; }.mobile-menu-holder.doc-mobile-menu li a.has-child i:before,.mobile-menu-holder.doc-mobile-menu .doc-root-plus-icon { display:none!important; }.mobile-menu-holder.doc-mobile-menu .navbar-nav > li > a.has-child span { padding-left: 4px; } .mobile-menu-holder.doc-mobile-menu li a.has-child { font-weight: bold!important; padding-left: 0 !important; margin-left: -2px!important; }.mobile-menu-holder.doc-mobile-menu li a.no-child { padding: 2px 5px 2px 0px!important; } #list-manual ul > li { margin-left:0px; }';
			//#list-manual li a.has-child.doc-active, .mCSB_container li a.has-child.doc-active{ color:inherit; }
		}
		
		// Documentation responsive layout menu display control
		if ( isset($theme_options['documentation-responsive-tree-menu']) && $theme_options['documentation-responsive-tree-menu'] == true ) {
			echo '@media (max-width: 991px) { aside.doc-rtl-sidebar{ display:none; } }';
		}
		
		//FIX MsScroll while using Firefox
		if ( isset($theme_options['documentation-menu-scroller-status']) && $theme_options['documentation-menu-scroller-status'] == true ) {
			$scroll_define_height = '400';
			if( !empty ( $theme_options['documentation-scroll-after-menu-height-new'] ) ) {
				$scroll_define_height = $theme_options['documentation-scroll-after-menu-height-new'].'';
			}
			echo '#list-manual.mCustomScrollbar { height: calc('.$scroll_define_height*0.1522.'vh - 1px) !important; }';
		}

	}
}


/*-----------------------------------*/
/*	MANUAL CUSTOMIZE :: STICKY MENU
/*-----------------------------------*/
if (!function_exists('manual__cs_stickymenu_customize_settings')) {
	function manual__cs_stickymenu_customize_settings(){
		global $theme_options;
		$bg_color = '';
		if( isset($theme_options['theme_sticky_menu_background']['rgba']) && $theme_options['theme_sticky_menu_background']['rgba'] != '' ) {
			$bg_color = 'background:'.esc_attr($theme_options['theme_sticky_menu_background']['rgba']).'!important;';
		}
		if( $theme_options['theme_sticky_white_logo'] == true ) {
			echo 'nav.navbar.after-scroll-wrap img.home-logo-show { display: none; } nav.navbar.after-scroll-wrap img.inner-page-white-logo { display: block; }';
		}
		echo 'body.home nav.navbar.after-scroll-wrap, body nav.navbar.after-scroll-wrap { '.$bg_color.' } .navbar-inverse.after-scroll-wrap .navbar-nav>li>a { color:'.esc_attr($theme_options['theme_sticky_menu_text_color']['regular']).'!important; } .navbar-inverse.after-scroll-wrap .navbar-nav>li>a:hover {  color:'.esc_attr($theme_options['theme_sticky_menu_text_color']['hover']).'!important; } ';
	}
}


/*-----------------------------------------------------------------*/
/*	MANUAL CUSTOMIZE :: CUSTOM STYLE - SEARCH BOX STYLE
/*-----------------------------------------------------------------*/
if (!function_exists('manual__cs_searchbox_customize_settings')) {
	function manual__cs_searchbox_customize_settings() {
		global $theme_options;
		
		$search_btm_remove = $searhbox_theme_search_box_border_color = $scrollbkToTop_color = '';
		if( $theme_options['theme_search_box_search_bottom'] ==  true ) $search_btm_remove = '!important';
		if( isset($theme_options['theme_search_box_border_color']['rgba']) && $theme_options['theme_search_box_border_color']['rgba'] != "" ) {
			$searhbox_theme_search_box_border_color = 'border-color:'.esc_attr($theme_options['theme_search_box_border_color']['rgba']).'!important;';
		}
		
		// Search box
		echo '.form-control.header-search{ border-radius:'.esc_attr($theme_options['theme_search_box_radius']).'px'.$search_btm_remove.'; font-size: '.$theme_options['theme_search_font_size'].'px; font-weight:'.esc_attr($theme_options['theme_search_font_weight']).'; '.$searhbox_theme_search_box_border_color.' } form.searchform i.livesearch, .form-group.menu-bar-form .button-custom.custom-simple-search { color: '.esc_attr($theme_options['theme_search_box_icon_color']).'!important; } .theme-top-header-searchbox .form-group .search-button-custom{ font-size: '.esc_attr($theme_options['theme_search_font_size']).'px; font-weight:'.esc_attr($theme_options['theme_search_font_weight']).'; }';
		
		if($theme_options['theme_search_box_search_bottom'] == true) { 
			echo 'select.search-expand-types { right: 16px!important; } .icon-page-popup.page-search-popup select.search-expand-types { right: 1px!important; }';
			if( $theme_options['manual-trending-post-type-search-status'] == false ) {
				echo '.form-control.header-search.search_loading { background: #fff url("'.trailingslashit( get_template_directory_uri() ).'img/loader.svg") no-repeat right 5px center!important; } @media (max-width:767px) { .form-control.header-search.search_loading { background: #fff url("'.trailingslashit( get_template_directory_uri() ).'img/loader.svg") no-repeat right 5px center!important; } }';
			} else {
				echo '.form-control.header-search.search_loading { background: #fff url("'.trailingslashit( get_template_directory_uri() ).'img/loader.svg") no-repeat right 150px center!important; } @media (max-width:767px) { .form-control.header-search.search_loading { background: #fff url("'.trailingslashit( get_template_directory_uri() ).'img/loader.svg") no-repeat right 5px center!important; } }';
			}
		} else {
			if($theme_options['manual-trending-post-type-search-status'] == false) {
				echo '.form-control.header-search.search_loading { background: #fff url("'.trailingslashit( get_template_directory_uri() ).'img/loader.svg") no-repeat right 255px center!important; } @media (max-width:767px) { .form-control.header-search.search_loading { background: #fff url("'.trailingslashit( get_template_directory_uri() ).'img/loader.svg") no-repeat right 115px center!important; } } @media (min-width:767px) {  .form-control.header-search.search_loading { background: #fff url("'.trailingslashit( get_template_directory_uri() ).'img/loader.svg") no-repeat right 115px center!important; }  }';
			} else {
				if ( class_exists('bbPress') && is_bbPress() ) {
					if( $theme_options['manual-trending-post-type-search-status-on-forum-pages'] == true ) {
						echo '.form-control.header-search.search_loading { background: #fff url("'.trailingslashit( get_template_directory_uri() ).'img/loader.svg") no-repeat right 255px center!important; } @media (max-width:767px) { .form-control.header-search.search_loading { background: #fff url("'.trailingslashit( get_template_directory_uri() ).'img/loader.svg") no-repeat right 115px center!important; } } @media (min-width:767px) {  .form-control.header-search.search_loading { background: #fff url("'.trailingslashit( get_template_directory_uri() ).'img/loader.svg") no-repeat right 255px center!important; }  }';
					} else {
						echo '.form-control.header-search.search_loading { background: #fff url("'.trailingslashit( get_template_directory_uri() ).'img/loader.svg") no-repeat right 105px center!important; } @media (max-width:767px) { .form-control.header-search.search_loading { background: #fff url("'.trailingslashit( get_template_directory_uri() ).'img/loader.svg") no-repeat right 115px center!important; } } @media (min-width:767px) {  .form-control.header-search.search_loading { background: #fff url("'.trailingslashit( get_template_directory_uri() ).'img/loader.svg") no-repeat right 115px center!important; }  }';
					}
				} else {
					echo '.form-control.header-search.search_loading { background: #fff url("'.trailingslashit( get_template_directory_uri() ).'img/loader.svg") no-repeat right 255px center!important; } @media (max-width:767px) { .form-control.header-search.search_loading { background: #fff url("'.trailingslashit( get_template_directory_uri() ).'img/loader.svg") no-repeat right 115px center!important; } } @media (min-width:767px) {  .form-control.header-search.search_loading { background: #fff url("'.trailingslashit( get_template_directory_uri() ).'img/loader.svg") no-repeat right 255px center!important; }  }';
				}
			}
			
		}
		
		// global search box settings.
		if($theme_options['manual-live-search-transparent-input-box'] == true) {
			echo '.form-control.header-search { background:'.esc_attr($theme_options['manual-live-search-transparent-bg-color']['rgba']).'!important; color:'.esc_attr($theme_options['manual-live-search-transparent-input-box-textcolor']).'!important; } .form-control.header-search:focus { color:inherit!important; }.form-control.header-search:focus{ background:#ffffff!important; color:#222222!important; } .jumbotron_new .form-control.header-search:focus::placeholder { color:#222222!important; }';
		}
		if( isset($theme_options['theme_search_box_placeholder_text_color']) && $theme_options['theme_search_box_placeholder_text_color'] != '' ) {
		echo '.jumbotron_new .form-control.header-search::-webkit-input-placeholder { color:'.esc_attr($theme_options['theme_search_box_placeholder_text_color']).'; } .jumbotron_new .form-control.header-search:-ms-input-placeholder { color:'.esc_attr($theme_options['theme_search_box_placeholder_text_color']).'; } .jumbotron_new .form-control.header-search::placeholder { color:'.esc_attr($theme_options['theme_search_box_placeholder_text_color']).'; }';
		}
		
		// Box Shadow
		if( isset($theme_options['manual-live-search-box-shadow-input-box']) && $theme_options['manual-live-search-box-shadow-input-box'] == true ) {
			echo '.jumbotron_new .form-group input.header-search { box-shadow: 0 0 1px rgba(0, 0, 0, 0.07), 0 1px 6px rgba(0, 0, 0, 0.06), 0 2px 15px rgba(0, 0, 0, 0.05)!important; }';
		}
		
		// Design Layout 2
		if( isset($theme_options['manual-live-search-design-style']) && $theme_options['manual-live-search-design-style'] == 2 ) {
			echo '.jumbotron_new .form-group input.header-search, .elementor-widget-container .elementor_themeoption_search .form-group input.header-search{ min-height: 75px; } .jumbotron_new .searchform .button-custom, .elementor-widget-container .elementor_themeoption_search .searchform .button-custom { margin: 13px!important; padding: 13px 30px !important; min-height: auto!important; width: auto; border-top-left-radius: 3px!important; border-bottom-left-radius: 3px!important; line-height: inherit!important; font-size:'.esc_attr($theme_options['theme_search_btm_font_size']).'px; } .jumbotron_new  select.search-expand-types, .elementor-widget-container .elementor_themeoption_search select.search-expand-types { margin: 12px 0px; right: 153px; height: 49px; background-color:#FFFFFF; } .jumbotron_new form.searchform i.livesearch { top: 48px; } .jumbotron_new .form-group input.header-search, .elementor-widget-container .elementor_themeoption_search .form-group input.header-search { padding-left: 68px; } .jumbotron_new form.searchform i.livesearch { left: 43px; }';
	echo '.jumbotron_new .class-pg-searchbox-fix select.search-expand-types, .elementor-widget-container .elementor_themeoption_search .class-pg-searchbox-fix select.search-expand-types { margin: 12px 0px; right: 138px!important; background-color: #FFFFFF; height: 49px; } .jumbotron_new .class-pg-searchbox-fix i.livesearch, .elementor-widget-container .elementor_themeoption_search .class-pg-searchbox-fix i.livesearch { left: 26px!important; } ';
			if( is_rtl() ) echo '.jumbotron_new .class-pg-searchbox-fix i.livesearch, .elementor-widget-container .elementor_themeoption_search .class-pg-searchbox-fix i.livesearch { left: auto!important; }';
			echo '.elementor-widget-container .elementor_themeoption_search form.searchform i.livesearch{ top: 43px; left: 26px; }';
		}
		
	}
}


/*-----------------------------------------------------------------*/
/*	MANUAL CUSTOMIZE :: CUSTOM STYLE - HEADER MENU CONTROL
/*-----------------------------------------------------------------*/
if (!function_exists('manual__cs_headermenucontrol_customize_settings')) {
	function manual__cs_headermenucontrol_customize_settings() {
		global $theme_options;
		
		$border_btm_color_li = '';
		if( isset($theme_options['mobile-menu-border-btm-li-color']['rgba']) && $theme_options['mobile-menu-border-btm-li-color']['rgba'] != '' ) {
			$border_btm_color_li = 'border-bottom: 1px solid '.esc_attr($theme_options['mobile-menu-border-btm-li-color']['rgba']).'!important;';
		}
		
		echo '.navbar-inverse .navbar-nav>li>a { font-family:'.((isset($theme_options['custom-nav-font'])&& $theme_options['custom-nav-font'] != '')?$theme_options['custom-nav-font']:$theme_options['theme-typography-nav']['font-family']).'!important; text-transform: '.esc_attr($theme_options['first-level-menu-text-transform']).'; font-weight: '.esc_attr($theme_options['first-level-menu-weight']).'; font-size: '.esc_attr($theme_options['first-level-menu-font-size']).'px; letter-spacing: '.esc_attr($theme_options['first-level-menu-letter-spacing']).'; color:'.esc_attr($theme_options['first-level-menu-text-color']['regular']).'!important;} .navbar-inverse .navbar-nav>li>a:hover { color:'.esc_attr($theme_options['first-level-menu-text-color']['hover']).'!important; }#navbar ul li > ul, #navbar ul li > ul li > ul { background-color:'.esc_attr($theme_options['menu-inner-level-background-color']).'; border-color:'.esc_attr($theme_options['menu-inner-level-background-color']).'; box-shadow: 0 5px 11px 0 rgba(0,0,0,.27); padding: 10px 0px;} #navbar ul li > ul li a { font-family:'.((isset($theme_options['custom-nav-font'])&& $theme_options['custom-nav-font'] != '')?$theme_options['custom-nav-font']:$theme_options['theme-typography-nav']['font-family']).'!important; font-weight:'.esc_attr($theme_options['menu-inner-level-weight']).'; font-size:'.esc_attr($theme_options['menu-inner-level-font-size']).'px; color:'.esc_attr($theme_options['menu-inner-level-text-color']['regular']).'!important; letter-spacing: '.esc_attr($theme_options['menu-inner-level-menu-letter-spacing']).'; text-transform:'.esc_attr($theme_options['menu-inner-level-menu-text-transform']).';line-height:'.esc_attr($theme_options['menu-inner-level-menu-letter-line-height']).';} #navbar ul li > ul li a:hover { color:'.esc_attr($theme_options['menu-inner-level-text-color']['hover']).'!important; } @media (max-width: 991px) { .mobile-menu-holder li a {  font-family:'.((isset($theme_options['custom-nav-font'])&& $theme_options['custom-nav-font'] != '')?$theme_options['custom-nav-font']:$theme_options['theme-typography-nav']['font-family']).'!important; } }  @media (max-width: 991px){ .mobile-menu-holder{ background:'.esc_attr($theme_options['mobile-bgackground-holder-background-color']).'; } .mobile-menu-holder li a { font-size:'.esc_attr($theme_options['mobile-first-level-menu-font-size']).'px; font-weight:'.esc_attr($theme_options['mobile-first-level-menu-weight']).'!important; letter-spacing:'.esc_attr($theme_options['mobile-first-level-menu-letter-spacing']).'; text-transform:'.esc_attr($theme_options['mobile-first-level-menu-text-transform']).'; color:'.esc_attr($theme_options['mobile-first-level-menu-text-color']['regular']).'!important } .mobile-menu-holder li a:hover { color: '.esc_attr($theme_options['mobile-first-level-menu-text-color']['hover']).'!important; background:none; }  .mobile-menu-holder li > ul li a { font-size:'.esc_attr($theme_options['mobile-menu-inner-level-font-size']).'px; font-weight:'.esc_attr($theme_options['mobile-menu-inner-level-weight']).'!important; letter-spacing:'.esc_attr($theme_options['mobile-menu-inner-level-menu-letter-spacing']).'; text-transform:'.esc_attr($theme_options['mobile-menu-inner-level-menu-text-transform']).'; line-height:'.esc_attr($theme_options['mobile-menu-inner-level-menu-letter-line-height']).'; color: '.esc_attr($theme_options['mobile-menu-inner-level-text-color']['regular']).'!important; } .mobile-menu-holder li > ul li a:hover{ color: '.esc_attr($theme_options['mobile-menu-inner-level-text-color']['hover']).'!important; } .mobile_menu_arrow { color:'.esc_attr($theme_options['mobile-first-level-menu-text-color']['regular']).'!important; } .mobile_menu_arrow:hover { color:'.esc_attr($theme_options['mobile-first-level-menu-text-color']['hover']).'!important; } .mobile-menu-holder ul > li { '.$border_btm_color_li.' } } @media (max-width: 991px) and (min-width: 768px){ .navbar-inverse .navbar-toggle { top:'.esc_attr($theme_options['first-level-responsive-hamburger-menu-top-margin']).'px; } } @media (max-width: 767px){ .navbar-inverse .navbar-toggle { border:none!important; top:'.esc_attr($theme_options['first-level-responsive-hamburger-menu-top-margin']).'px; } } .theme-social-icons li a, .shopping_cart_header .header_cart{ color:'.esc_attr($theme_options['first-level-menu-text-color']['regular']).'!important; } .theme-social-icons li a:hover { color:'.esc_attr($theme_options['first-level-menu-text-color']['hover']).'!important; } .hamburger-menu span { background:'.esc_attr($theme_options['first-level-menu-text-color']['regular']).'; } #navbar ul li > ul li.active a { color:'.esc_attr($theme_options['menu-inner-level-active-text-color']['regular']).'!important; }';
		// show hide
		echo '@media (max-width: 991px){ .mobile-menu-holder i.menu_arrow_first_level.fa.fa-caret-down { float: right;  padding: 5px; } .mobile-menu-holder ul > li { border-bottom: 1px solid rgba(241, 241, 241, 0.92); } .mobile-menu-holder li > ul li a i { display: block; float: right; margin-top: 6px; } .mobile-menu-holder ul.sub-menu li:last-child, .mobile-menu-holder ul > li:last-child{ border-bottom:none; } }';
		if( isset($theme_options['first-level-menu-icon']) && $theme_options['first-level-menu-icon'] == false ) {
			echo '#navbar i.menu_arrow_first_level.fa.fa-caret-down { display:none }';
		}
		//Icon Search Popup
		echo 'span.burger-icon-top, span.burger-icon-bottom { background:'.esc_attr($theme_options['first-level-menu-text-color']['regular']).'; }';
		
	}
}


/*-----------------------------------------------------------------*/
/*	MANUAL CUSTOMIZE :: CUSTOM STYLE - HEADER MENU TYPE CONTROL
/*-----------------------------------------------------------------*/
if (!function_exists('manual__cs_headermenu_type_control_customize_settings')) {
	function manual__cs_headermenu_type_control_customize_settings() {
		global $theme_options;
		
		// Check the logo switch status
		if( isset($theme_options['manual-header-custom-image']['url']) && $theme_options['manual-header-custom-image']['url'] != '' ) {
		  $manual_headercustomimgurl = $theme_options['manual-header-custom-image']['url'];
		} else {
		  $manual_headercustomimgurl = '';
		}
		
		if( $theme_options['theme-nav-type'] == 2 && $manual_headercustomimgurl == '' &&  $theme_options['default-header-sytle-backgorund-image'] == false) {
			echo 'img.inner-page-white-logo { display: none; } img.home-logo-show { display: block; }';
		} else if( $theme_options['theme-nav-type'] == 2 && $theme_options['manual-header-custom-image']['url'] != '' &&  $theme_options['default-header-sytle-backgorund-image'] == true) {
			echo 'img.inner-page-white-logo { display: block; } img.home-logo-show { display: none; }'; 
			echo '.navbar-inverse .navbar-nav>li>a, .theme-social-icons li a, .shopping_cart_header .header_cart { color:'.esc_attr($theme_options['first-level-menu-text-color-for-img-bg']['regular']).'!important; }'; 
			echo '.navbar-inverse .navbar-nav>li>a:hover, .theme-social-icons li a:hover { color:'.esc_attr($theme_options['first-level-menu-text-color-for-img-bg']['hover']).'!important; } .hamburger-menu span { background:'.esc_attr($theme_options['first-level-menu-text-color-for-img-bg']['regular']).';} ';
		} else if( $theme_options['header-force-white-logo-and-text'] == 1 && $theme_options['manual-header-custom-image']['url'] == '' && $theme_options['default-header-sytle-backgorund-image'] == true ) { 
			echo 'img.inner-page-white-logo { display: block; } img.home-logo-show { display: none; } .navbar-inverse .navbar-nav>li>a, .theme-social-icons li a, .shopping_cart_header .header_cart { color:'.esc_attr($theme_options['first-level-menu-text-color-for-img-bg']['regular']).'!important; } .navbar-inverse .navbar-nav>li>a:hover, .theme-social-icons li a:hover { color:'.esc_attr($theme_options['first-level-menu-text-color-for-img-bg']['hover']).'!important; } .hamburger-menu span { background:'.esc_attr($theme_options['first-level-menu-text-color-for-img-bg']['regular']).';}';
		} else {
			echo 'img.inner-page-white-logo { display: none; } img.home-logo-show { display: block; }';
		}
		
		 echo 'nav.navbar.after-scroll-wrap img.inner-page-white-logo{ display: none; } nav.navbar.after-scroll-wrap img.home-logo-show { display: block; }';
		
		// Nav background and border bottom
		echo '.navbar {  z-index: 99; border: none;';   
		if( $theme_options['apply-nav-box-shadow'] ) { echo 'box-shadow: 0px 0px 30px 0px rgba(0, 0, 0, 0.05);'; }
		if( $theme_options['apply-nav-border'] ==  1) { 
			echo 'border-bottom:1px solid '.esc_attr($theme_options['apply-nav-border-color']['rgba']).'; ';
		} else { 
			echo 'border-bottom:none;';
		}
		if( $theme_options['theme-nav-type'] ==  2 && !is_page()) { 
			if( $theme_options['enable-header-bg-color-for-nav-one'] == true ) { 
				echo 'background: '.esc_attr($theme_options['apply-nav-background-color']['rgba']).'!important;'; 
			}
		} else {
			echo 'background: '.(isset($theme_options['apply-nav-background-color-for-transparent-bg']['rgba']) && $theme_options['apply-nav-background-color-for-transparent-bg']['rgba'] != '' ? $theme_options['apply-nav-background-color-for-transparent-bg']['rgba'] : '').'!important;';
		}
		echo '}';


	}
}


/*-----------------------------------------------------------------*/
/*	MANUAL CUSTOMIZE :: CUSTOM STYLE - HEADER MENU TYPE CONTROL
/*-----------------------------------------------------------------*/
if (!function_exists('manual__cs_headerbar_customize_settings')) {
	function manual__cs_headerbar_customize_settings() {
		global $theme_options;
		
		// Default
		if( $theme_options['default-header-sytle-backgorund-image'] == false ) {
			echo '.noise-break { background: #F7F7F7 url('.get_template_directory_uri().'/img/noise.jpg) repeat; }';
		} 
		  
		if( $theme_options['default-header-sytle-backgorund-image'] == true && isset($theme_options['manual-header-custom-image']['url']) && $theme_options['manual-header-custom-image']['url'] != '' ) {
		   echo '.noise-break { background: '.esc_attr($theme_options['default-header-sytle-background-color']).' url('.$theme_options['manual-header-custom-image']['url'].') repeat; background-size:'.esc_attr($theme_options['manual-default-header-background-size']).'; background-position:'.esc_attr($theme_options['header-background-position']).' }';
		} else if( $theme_options['default-header-sytle-backgorund-image'] == true && $theme_options['manual-header-custom-image']['url'] == '' ) {
		  echo '.noise-break { background: '.esc_attr($theme_options['default-header-sytle-background-color']).'; }';
		}
		 
		if( $theme_options['header-opacity-uploadimage-global'] == true && !empty($theme_options['manual-header-custom-image']['url']) && $theme_options['default-header-sytle-backgorund-image'] == true && !is_page() ) {  echo '.page_opacity.header_custom_height_new{background:'.esc_attr($theme_options['header-opacity-uploadimg-bg-color']['rgba']).';}'; }
		 
		 // Header height
		 if(preg_match("/ /", $theme_options['default-header-sytle-height'])) {
			 echo '.page_opacity.header_custom_height_new{ padding: '.esc_attr($theme_options['default-header-sytle-height']).'; }';
		 } else {
			 echo '.page_opacity.header_custom_height_new{ padding: '.esc_attr($theme_options['default-header-sytle-height']).'px 0px; }';
		 }
		  
		// Controls header text align
		echo ' .header_control_text_align { text-align:'.esc_attr($theme_options['default-header-text-align']).'; } ';
		 
		// Header title control
		$h1custom_line_height = '';
		if( isset($theme_options['default-header-title-font-line-height-spacing']) && $theme_options['default-header-title-font-line-height-spacing'] != '' ) {
			$h1custom_line_height = 'line-height:'.esc_attr($theme_options['default-header-title-font-line-height-spacing']).';';
		}
		echo 'h1.custom_h1_head { color: '.esc_attr($theme_options['default-top-header-title-color']).'!important; font-size: '.esc_attr($theme_options['default-header-title-font-size']).'px!important; font-weight: '.esc_attr($theme_options['default-header-title-font-weight']).'!important; text-transform:'.esc_attr($theme_options['default-header-title-text-transform']).'!important; '.$h1custom_line_height.' letter-spacing: '.esc_attr($theme_options['default-header-title-font-letter-spacing']).'px!important; overflow-wrap: break-word; }';
		 
		// Subtitle
		echo 'p.inner-header-color { color:'.esc_attr($theme_options['default-top-header-subtitle-color']).'; font-size: '.esc_attr($theme_options['default-header-subtitle-font-size']).'px!important; letter-spacing: '.esc_attr($theme_options['default-header-subtitle-font-letter-spacing']).'px!important; font-weight:'.esc_attr($theme_options['default-header-subtitle-font-weight']).'!important; text-transform:'.esc_attr($theme_options['default-header-subtitle-text-transform']).';  }';
		 
		// Breadcrumbs
		if( isset($theme_options['default-header-breadcrumb-letter-spacing']) && $theme_options['default-header-breadcrumb-letter-spacing'] != '' ) {
			$breadcrumbs_letter_spacing = esc_attr($theme_options['default-header-breadcrumb-letter-spacing']);
		} else {
			$breadcrumbs_letter_spacing = '0';	
		}
		echo '.header-desc {color:'.esc_attr($theme_options['default-top-header-breadcrumb-color']).';} #breadcrumbs {color:'.esc_attr($theme_options['default-top-header-breadcrumb-color']).'; text-transform:'.esc_attr($theme_options['default-header-breadcrumb-text-transform']).'; letter-spacing: '.esc_attr($breadcrumbs_letter_spacing).'px; font-size: '.esc_attr($theme_options['default-header-breadcrumb-font-size']).'px; font-weight: '.esc_attr($theme_options['default-header-breadcrumb-font-weight']).';  padding-top: '.esc_attr($theme_options['default-header-breadcrumb-padding']).'px;} #breadcrumbs span{ color:'.esc_attr($theme_options['default-top-header-breadcrumb-color']).'; } #breadcrumbs a{ color:'.esc_attr($theme_options['default-top-header-breadcrumb-link-color']['regular']).'; } #breadcrumbs a:hover{ color:'.esc_attr($theme_options['default-top-header-breadcrumb-link-color']['hover']).'!important; } ';
		 
		// Trending search
		echo '.trending-search span.popular-keyword-title { color:'.esc_attr($theme_options['theme_header_treanding_search_color']).'; } .trending-search a { color:'.esc_attr($theme_options['theme_header_treanding_search_link_color']['regular']).'!important; }';
		
		//Mobile Menu Control
		echo '@media (max-width: 767px){ .navbar { min-height: auto; } .navbar, .navbar .nav-fix, .hamburger-menu { height: '.esc_attr($theme_options['mobile-menu-height']).'px!important; } }';

	}
}

/*----------------------------*/
/*	MANUAL CUSTOMIZE :: LOGO
/*----------------------------*/
if (!function_exists('manual__gouparrow_settings')) {
	function manual__gouparrow_settings() {
		global $theme_options;
		echo '.footer-go-uplink { color:'.(!empty($theme_options['manual-go-up-icon-color']['rgba'])?$theme_options['manual-go-up-icon-color']['rgba']:'').'; font-size:'.$theme_options['go_up_arrow_font_size'].'px!important; }
';
	}
}

/*--------------------------------------------*/
/*	MANUAL CUSTOMIZE :: CUSTOM STYLE - FOOTER
/*--------------------------------------------*/
if (!function_exists('manual__cs_footer_customize_settings')) {
	function manual__cs_footer_customize_settings() {
		global $theme_options;
		
		echo '.footer-bg { background: '.$theme_options['theme_footer_widget_bg_color'].'; } .footer-widget h6, .footer-widget h5, .footer-widget h4 { color: '.$theme_options['theme_footer_widget_title_color'].'!important; } .footer-widget .textwidget, .footer-widget .textwidget p, .footer-bg .theme-social-icons li a { color: '.$theme_options['theme_footer_widget_text_color'].'!important; } .footer-widget a {
color: '.$theme_options['theme_footer_widget_text_link_color']['regular'].'!important; } .footer-widget a:hover { color:'.$theme_options['theme_footer_widget_text_link_color']['hover'].'!important; } span.post-date { color: '.$theme_options['theme_footer_widget_text_color'].'; }'; 

		echo '.footer_social_copyright, .footer-bg.footer-type-one{ background-color: '.$theme_options['theme_footer_social_bg_color'].'; } .footer-btm-box p, .footer-bg.footer-type-one .copyright, .footer-tertiary p { color: '.$theme_options['theme_footer_social_text_color'].'; } .footer-link-box a,.footer-btm-box a, .footer-bg.footer-type-one .footer-btm-box-one a{ color: '.$theme_options['theme_footer_social_link_color']['regular'].'!important;  } .footer-link-box a:hover, .footer-btm-box a:hover, .footer-bg.footer-type-one .footer-btm-box-one a:hover { color: '.$theme_options['theme_footer_social_link_color']['hover'].'!important; } .footer-btm-box .social-footer-icon, .footer-bg.footer-type-one .social-footer-icon { color: '.$theme_options['theme_footer_social_icon_link_color']['regular'].'; } .footer-btm-box .social-footer-icon:hover, .footer-bg.footer-type-one .social-footer-icon:hover { color:'.$theme_options['theme_footer_social_icon_link_color']['hover'].'; }';
		
	}
}

/*--------------------------------------------*/
/*	MANUAL EXTRA DESIGN - ICON BOUNCED IN
/*--------------------------------------------*/
if (!function_exists('manual__cs_icon_bouncedin_settings')) {
	function manual__cs_icon_bouncedin_settings() {
		global $theme_options;
		
		if( $theme_options['manual-live-search-icon-bouncein'] == true ) {
			echo 'form.searchform i.livesearch{ animation: bounceIn 750ms linear infinite alternate; -moz-animation: bounceIn 750ms linear infinite alternate;   -webkit-animation: bounceIn 750ms linear infinite alternate; -o-animation: bounceIn 750ms linear infinite alternate; } @-webkit-keyframes bounceIn{0%,20%,40%,60%,80%,100%{-webkit-transition-timing-function:cubic-bezier(0.215,0.610,0.355,1.000);transition-timing-function:cubic-bezier(0.215,0.610,0.355,1.000);}0%{opacity:0;-webkit-transform:scale3d(.3,.3,.3);transform:scale3d(.3,.3,.3);}20%{-webkit-transform:scale3d(1.1,1.1,1.1);transform:scale3d(1.1,1.1,1.1);}40%{-webkit-transform:scale3d(.9,.9,.9);transform:scale3d(.9,.9,.9);}60%{opacity:1;-webkit-transform:scale3d(1.03,1.03,1.03);transform:scale3d(1.03,1.03,1.03);}80%{-webkit-transform:scale3d(.97,.97,.97);transform:scale3d(.97,.97,.97);}100%{opacity:1;-webkit-transform:scale3d(1,1,1);transform:scale3d(1,1,1);}}
	keyframes bounceIn{0%,20%,40%,60%,80%,100%{-webkit-transition-timing-function:cubic-bezier(0.215,0.610,0.355,1.000);transition-timing-function:cubic-bezier(0.215,0.610,0.355,1.000);}0%{opacity:0;-webkit-transform:scale3d(.3,.3,.3);-ms-transform:scale3d(.3,.3,.3);transform:scale3d(.3,.3,.3);}20%{-webkit-transform:scale3d(1.1,1.1,1.1);-ms-transform:scale3d(1.1,1.1,1.1);transform:scale3d(1.1,1.1,1.1);}40%{-webkit-transform:scale3d(.9,.9,.9);-ms-transform:scale3d(.9,.9,.9);transform:scale3d(.9,.9,.9);}60%{opacity:1;-webkit-transform:scale3d(1.03,1.03,1.03);-ms-transform:scale3d(1.03,1.03,1.03);transform:scale3d(1.03,1.03,1.03);}80%{-webkit-transform:scale3d(.97,.97,.97);-ms-transform:scale3d(.97,.97,.97);transform:scale3d(.97,.97,.97);}100%{opacity:1;-webkit-transform:scale3d(1,1,1);-ms-transform:scale3d(1,1,1);transform:scale3d(1,1,1);}}
	.bounceIn{-webkit-animation-name:bounceIn;animation-name:bounceIn;-webkit-animation-duration:.75s;animation-duration:.75s;}';
		}
		
	}
}


/*----------------------------------------------------*/
/*	MANUAL CUSTOMIZE :: CUSTOM STYLE - KNOWLEDGEBASE
/*----------------------------------------------------*/
if (!function_exists('manual__cs_knowledgebase_customize_settings')) {
	function manual__cs_knowledgebase_customize_settings() {
		global $theme_options;

		if( $theme_options['knowledgebase-cat-quick-stats-under-title'] == true ) { echo '.kb-box-single:before { font-size: 28px; margin-top: -3px; } .kb-box-single { padding: 14px 10% 0px 44px; margin-bottom: 0px;; }'; }
		if( $theme_options['knowledgebase-quick-stats-under-title'] == true ) { echo '.body-content .kb-single:before { font-size: 39px; } .body-content .kb-single { padding: 0px 0px 5px 55px; } .body-content .kb-single:before { top: -4px; }'; }
		// target search dropdown design control
		echo 'select.search-expand-types{ margin-right:'.$theme_options['manual-dropdown-target-search-margin-right'].'; }';
		// other
		echo '.kb_tree_viewmenu h5 a, .kb_tree_viewmenu h6 a, .kb_tree_viewmenu_elementor h5 a, .kb_tree_viewmenu_elementor h6 a { color: inherit; }';
		
	}
}


/*-------------------------------*/
/*	INITIAL MANUAL THEME SETUP
/*-------------------------------*/
if (!function_exists('manual__themeinitial_setup')) {
	function manual__themeinitial_setup() {
		$post_type = get_post_type();
		echo 'body { color: #333333; font-family: PT Sans; font-size: 15px; line-height: 1.6; letter-spacing: 0.3px; font-weight: 400; } h1, h2, h3, h4, h5, h6 {font-family: Dosis; color: #222222; text-rendering: optimizeLegibility; -webkit-font-smoothing: antialiased; text-transform:none; } h1 { font-weight: 800; font-size: 40px; line-height: 45px; letter-spacing: -0.7px; } h2 { font-weight: 700; font-size: 34px; line-height: 40px; letter-spacing: -0.4px; } h3 { font-weight: 700; font-size: 30px; line-height: 34px; letter-spacing: 0px; } h4 { font-weight: 700; font-size: 24px; line-height: 30px; letter-spacing: 0px; } .sidebar-widget h2, h5 { font-weight: 700; font-size: 19px; line-height: 23px; letter-spacing: 0px; } h6 { font-weight: 700; font-size: 16px; line-height: 20px; letter-spacing: 0px; } .navbar-inverse .navbar-nav>li>a { font-family: Raleway; text-transform: uppercase; font-weight: 600; font-size: 13px; letter-spacing: 0.9px; color: #181818!important; } img.home-logo-show { display: block!important; } h1.inner-header { text-align: center; } .page_opacity.header_custom_height_new { padding: 90px 0px!important; }.header_control_text_align { text-align: center!important; }#breadcrumbs {color: #919191; text-transform: capitalize; letter-spacing: 0px; font-size: 14px; font-weight: 400; padding-top: 0px; } a, .body-content .blog .caption h2 a { color: #333333; } a:hover, .body-content .knowledgebase-cat-body h4 a:hover, .body-content .knowledgebase-body h6:hover:before, .body-content .knowledgebase-body h5:hover:before, .body-content .knowledgebase-body h4:hover:before, .body-content .knowledgebase-body h3:hover:before, .body-content .knowledgebase-body h6 a:hover, .body-content .knowledgebase-body h5 a:hover, .body-content .knowledgebase-body h4 a:hover, .body-content .knowledgebase-body h3 a:hover, #bbpress-forums .bbp-reply-author .bbp-author-name:hover, #bbpress-forums .bbp-topic-freshness > a:hover, #bbpress-forums li.bbp-body ul.topic li.bbp-topic-title a:hover, #bbpress-forums .last-posted-topic-title a:hover, #bbpress-forums .bbp-forum-link:hover, #bbpress-forums .bbp-forum-header .bbp-forum-title:hover, .body-content .blog .caption h2 a:hover, .body-content .blog .caption span:hover, .body-content .blog .caption p a:hover, .sidebar-nav ul li a:hover, .tagcloud a:hover, a.href:hover, .body-content .collapsible-panels p.post-edit-link a:hover, .tagcloud.singlepg a:hover, .body-content li.cat a:hover, h4.title-faq-cat a:hover, .portfolio-next-prv-bar .portfolio-prev a:hover, .portfolio-next-prv-bar .portfolio-next a:hover, .search h4 a:hover, .portfolio-filter ul li span:hover, ul.news-list.doc-landing li a:hover, .news-list li:hover:before, .body-content li.cat.inner:hover:before, .kb-box-single:hover:before, .kb_article_type li.articles:hover:before, .kb-box-single a:hover, .portfolio-desc a:hover, .woocommerce ul.products li.product a:hover, .kb_tree_viewmenu h6 a:hover, .kb_tree_viewmenu h6 a:hover:before, .kb_tree_viewmenu h5 a:hover, .kb_tree_viewmenu h5 a:hover:before, .kb_tree_viewmenu ul li a:hover, #bbpress-forums li.bbp-body ul.topic li.bbp-topic-title:hover:before, #bbpress-forums .bbp-admin-links a:hover, .widget_display_topics li:hover:before, .woocommerce div.product div.product_meta>span span:hover, .woocommerce div.product div.product_meta>span a:hover, #breadcrumbs a:hover, .body-content li.cat.inner a:hover:before, .vc_kb_article_type li.articles a:hover:before, .footer-go-uplink:hover, a.post-edit-link:hover, .body-content .collapsible-panels h4:hover:before, .body-content .collapsible-panels h5:hover:before, td.product-name a:hover, ul.vc_kbcat_widget li:hover:before, .sidebar-widget .display-faq-section li.cat-item a:hover:before, .body-content .display-faq-section ul li.cat-item.current-cat a:before { color: #46b289; } .body-content .blog .caption p a i, .body-content .blog .caption p i, .page-title-header p, p.entry-meta i { color: #46b289; } .pagination .page-numbers.current, .pagination .page-numbers:hover, .pagination a.page-numbers:hover, .pagination .next.page-numbers:hover, .pagination .prev.page-numbers:hover { background-color: #47C494; border-color: #47C494; } .pagination .page-numbers.current, .pagination .page-numbers:hover, .pagination a.page-numbers:hover, .pagination .next.page-numbers:hover, .pagination .prev.page-numbers:hover { color: #ffffff; } .browse-help-desk .browse-help-desk-div .i-fa:hover, ul.news-list li.cat-lists:hover:before, .body-content li.cat.inner:hover:before, .kb-box-single:hover:before, #list-manual li a.has-child.dataicon:before, #list-manual li a.has-inner-child.dataicon:before, .manual_related_articles h5:before, .manual_attached_section h5:before, .tagcloud.singlepgtag span i, form.searchform i.livesearch, span.required, .woocommerce .star-rating, .woocommerce-page .star-rating, .kb_tree_viewmenu ul li.root_cat a.kb-tree-recdisplay:before, .kb_tree_viewmenu ul li.root_cat_child a.kb-tree-recdisplay:before, #bbpress-forums .bbp-forum-title-container a:before, .body-content .collapsible-panels h4:before, .body-content .collapsible-panels h5:before, .portfolio-next-prv-bar .hvr-icon-back, .portfolio-next-prv-bar .hvr-icon-forward, .body-content .blog:before { color: #47C494; } .custom-well { padding: 30px 19px 19px 19px; } .navbar-inverse .navbar-nav>li>a:hover { color: #46b289!important; } .navbar-inverse .navbar-toggle, .container .blog-btn, input[type=submit] { border-color: #46b289!important; } .navbar-inverse .navbar-toggle { background-color: #46b289!important; } .navbar-inverse .navbar-toggle:hover { background-color: #001040!important; } .body-content .search:before { margin-top: -8px; font-size: 25px; } .body-content .search { padding: 20px 5px 1px 45px; } .button-custom, p.home-message-darkblue-bar, p.portfolio-des-n-link, .portfolio-section .portfolio-button-top, .body-content .wpcf7 input[type="submit"], .container .blog-btn, .sidebar-widget.widget_search input[type="submit"], .navbar-inverse .navbar-toggle, .custom_login_form input[type="submit"], .custom-botton, button#bbp_user_edit_submit, button#bbp_topic_submit, button#bbp_reply_submit, button#bbp_merge_topic_submit, .bbp_widget_login button#user-submit, input[type=submit], .vc_btn3.vc_btn3-color-juicy-pink, .vc_btn3.vc_btn3-color-juicy-pink.vc_btn3-style-flat, #bbpress-forums .bbp-topic-controls #favorite-toggle, #bbpress-forums .bbp-topic-controls #subscription-toggle, .bbp-logged-in a.button, .woocommerce a.button, form.woocommerce-product-search button, .woocommerce button.button.alt, .woocommerce #respond input#submit, .woocommerce button.button, .woocommerce input.button, .wp-block-button__link { background: #46b289!important; color: #ffffff!important; -webkit-transition: background-color 2s ease-out; -moz-transition: background-color 2s ease-out; -o-transition: background-color 2s ease-out; transition: background-color 2s ease-out; } .button-custom:hover, p.home-message-darkblue-bar:hover, .body-content .wpcf7 input[type="submit"]:hover, .container .blog-btn:hover, .sidebar-widget.widget_search input[type="submit"]:hover, .navbar-inverse .navbar-toggle:hover, .custom_login_form input[type="submit"]:hover, .custom-botton:hover, button#bbp_user_edit_submit:hover, button#bbp_topic_submit:hover, button#bbp_reply_submit:hover, button#bbp_merge_topic_submit:hover, .bbp_widget_login button#user-submit:hover, input[type=submit]:hover, .vc_btn3.vc_btn3-color-juicy-pink.vc_btn3-style-flat:focus, .vc_btn3.vc_btn3-color-juicy-pink.vc_btn3-style-flat:hover, .vc_btn3.vc_btn3-color-juicy-pink:focus, .vc_btn3.vc_btn3-color-juicy-pink:hover, #bbpress-forums .bbp-topic-controls #favorite-toggle:hover, #bbpress-forums .bbp-topic-controls #subscription-toggle:hover, .bbp-logged-in a.button:hover, .woocommerce a.button:hover, form.woocommerce-product-search button:hover, .woocommerce button.button.alt:hover, .woocommerce #respond input#submit:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .wp-block-button__link:hover, p.portfolio-des-n-link:hover { background-color: #001040!important; }';
		if( is_404() || (is_single() && $post_type == 'post' ) || $post_type == 'post' ) { echo '.jumbotron_new.jumbotron-inner-fix { display: none; } .navbar { position: inherit; box-shadow: 0 2px 9px -1px rgba(0,0,0,.04); -moz-box-shadow: 0 2px 9px -1px rgba(0,0,0,.04); -webkit-box-shadow: 0 2px 9px -1px rgba(0,0,0,.04); }'; }
		if( is_404() ) { echo 'form.searchform i.livesearch { top: 36px; }'; }
	}
}
?>