<?php 
/*************************************
***    ADD VC SC 1 :: COUNTER     ***
**************************************/
if(!function_exists("manual_theme_counter")){
	function manual_theme_counter( $atts, $content = null ) {
		
		extract( shortcode_atts( array( 
			"position"         => "",
			"digit"            => "",
			"font_weight"      => "",
			"font_color"       => "",
			"text"             => "",
			"text_transform"   => "",
			"text_color"       => "",
			"text_font_weight" => "",
			"separator"        => "",
			"separator_color"  => "",
		), $atts ) );
		
		// Countdown Color
		if( isset($font_color) && $font_color != '' ) { $font_color = 'color:'.$font_color.';';  
		} else { $font_color = ''; }
		// Countdown Font Weight
		if( isset($font_weight) && $font_weight != '' ) { $font_weight = 'font-weight:'.$font_weight.';'; 
		} else { $font_weight = ''; }
		// Text Color
		if( isset($text_color) && $text_color != '' ) { $text_color =  $text_color = 'color:'.$text_color.';';  
		} else { $text_color = ''; }
		// Text Font Weight
		if( isset($text_font_weight) && $text_font_weight != '' ) { $text_font_weight = 'font-weight:'.$text_font_weight.';'; 
		} else { $text_font_weight = ''; }
		// Separator Color
		if( isset($separator_color) && $separator_color != '' ) { $separator_color = $separator_color;
		} else { $separator_color = ''; }
		// Text Transform 
		if( isset($text_transform) && $text_transform != '' ) { $text_transform = 'text-transform:'.$text_transform.';'; 
		} else { $text_transform = ''; }
		// Separator yes/no
		if( $separator == 'yes' ) { 
			$separator_html = '<span class="separator small" style="background:'.$separator_color.'"></span>';
			$count_down_value_height = '';
		} else { 
			$separator_html = '';
			$count_down_value_height = 'height: 90px;'; 
		}
		
		$return  = '<div class="funact-main-div sc-funact text-white">
		  <span class="timer counter-select-number" data-to="'.$digit.'" data-speed="10000" style="'.$font_color.''.$count_down_value_height.''.$font_weight.'"></span>
		 '.$separator_html.'
		  <p class="counter-sc-text" style="'.$text_color.''.$text_font_weight.''.$text_transform.'">'.$text.'</p>
		</div>';
		
		return $return;
	}
add_shortcode('manual_theme_counter', 'manual_theme_counter');	
}

/*************************************
***    ADD VC SC 2 :: TEAM       ***
**************************************/
if(!function_exists("manual_our_team")){
	function manual_our_team( $atts, $content = null ) {
		
		extract( shortcode_atts( array( 
			"team_image"       => "",
			"team_name"        => "",
			"name_title_tag"   => "h4",
			"name_color"       => "",
			"team_position"    => "",
			"position_color"   => "",
			"show_separator"   => "",
			"separator_color"  => "",
			"icons_color"      => "",
			// social - 1
			"team_social_icon_1"         => "",
			"team_social_icon_1_link"    => "",
			"team_social_icon_1_target"  => "",
			// social - 2
			"team_social_icon_2"         => "",
			"team_social_icon_2_link"    => "",
			"team_social_icon_2_target"  => "",
			// social - 3
			"team_social_icon_3"         => "",
			"team_social_icon_3_link"    => "",
			"team_social_icon_3_target"  => "",
			// social - 4
			"team_social_icon_4"         => "",
			"team_social_icon_4_link"    => "",
			"team_social_icon_4_target"  => "",
		), $atts ) );
		
		
		if (is_numeric($team_image) && isset($team_image)) {
			$image_src = wp_get_attachment_url($team_image);
		} else {
			$image_src = trailingslashit( get_template_directory_uri() ). 'img/team-blank.png';
		}
		if( $show_separator == 'yes' ) {
			$seprator = '<div class="separator" style="background-color:'.$separator_color.'"></div>';
		} else {
			$seprator = '<div class="no-separator"></div>';
		}
		
$return = '<div class="manual_team">
		  <div class="manual_team_inner">
			<div class="manual_team_image"><img src="'.$image_src.'"></div>
			<div class="manual_team_text" style="padding-top:0px;">
				<div class="manual_team_title_holder">
				<'.$name_title_tag.' class="manual_team_name" style="color:'.$name_color.'!important;">'.$team_name.'</'.$name_title_tag.'>
				<span style="color:'.$position_color.';">'.$team_position.'</span> '.$seprator.'
					<div class="team_social_holder">
					<span class="team_social_holder normal_social"><a href="'.$team_social_icon_1_link.'" target="'.$team_social_icon_1_target.'"><i class="'.$team_social_icon_1.' simple_social" style="color:'.$icons_color.';"></i></a></span>
					<span class="team_social_holder normal_social"><a href="'.$team_social_icon_2_link.'" target="'.$team_social_icon_1_target.'"><i class="'.$team_social_icon_2.' simple_social" style="color:'.$icons_color.';"></i></a></span>
					<span class="team_social_holder normal_social"><a href="'.$team_social_icon_3_link.'" target="'.$team_social_icon_1_target.'"><i class="'.$team_social_icon_3.' simple_social" style="color:'.$icons_color.';"></i></a></span>
					<span class="team_social_holder normal_social"><a href="'.$team_social_icon_4_link.'" target="'.$team_social_icon_1_target.'"><i class="'.$team_social_icon_4.' simple_social" style="color:'.$icons_color.';"></i></a></span>
					</div>
				</div>
			</div>
		  </div>
		</div>';
		
		return $return;
	}
add_shortcode('manual_our_team', 'manual_our_team');	
}

/*************************************
***  ADD VC SC 3 :: TESTIMONIALS   ***
**************************************/
if(!function_exists("manual_theme_testimonials")){
	function manual_theme_testimonials( $atts, $content = null ) {
		
		extract( shortcode_atts( array( 
			"number"                  => "",
			"order_by"                => "",
			"order"                   => "",
			"text_color"              => "",
			"author_text_font_weight" => "",
			"author_text_color"       => "",
			"custom_font_size"        => "",
		), $atts ) );
		
		if( isset($number) && $number != '' ) $number = $number;
		else $number = '-1';
		
		if( isset($order_by) && $order_by != '' ) $order_by = $order_by;
		else $order_by = 'menu_order';
		
		if( isset($order) && $order != '' ) $order = $order;
		else $order = 'DESC';
		
		$return = '<style>.vc_sc_testo .owl-page span{ background:'.$text_color.'!important;}</style>';
		$return .= '<div class="home-testo-desk vc_sc_testo">'; 	
		$args = array(
						'post_type' => 'manual_tmal_block',
						'posts_per_page' => $number,
						'orderby' => $order_by,
						'post_status' => 'publish',
						'order' => $order,
					);
			$wp_query = new WP_Query($args);
			if($wp_query->have_posts()) {
				$i = 0;
				while($wp_query->have_posts()) { $wp_query->the_post();
				$return .= '<div class="testimonial text-center"><div class="testimonial-text">
						<div class="testimonial-quote">
							<p class="textmsg" style="color:'.$text_color.';font-size:'.$custom_font_size.';">
							'.get_post_meta( $wp_query->post->ID, '_manual_hpblock_text', true ).'
							</p>
						</div>
						<div class="testimonial-cite" style="font-weight:'.$author_text_font_weight.';color:'.$author_text_color.';">'.get_post_meta( $wp_query->post->ID, '_manual_hpblock_name', true ).'</div>
					 </div></div>';
				}
			} 
		wp_reset_postdata(); 
		$return .= '</div>';
		
		return $return;
	}
add_shortcode('manual_theme_testimonials', 'manual_theme_testimonials');	
}

/***************************************
***    ADD VC SC 4 :: ICON WITH TEXT ***
****************************************/
if(!function_exists("manual_theme_icon_text")){
	function manual_theme_icon_text( $atts, $content = null ) {
		$link_html = '';
		$a_box_open = $a_box_close = $a_open = $a_close = '';
		extract( shortcode_atts( array( 
			"use_custom_icon_box_design"  => "",
			"icon_box_color"  => "",
			"icon_box_padding"  => "",
			"icon_box_margin"  => "",
			"box_css_animation"  => "",
			"icon_name"  => "",
			"title"      => "",
			"text"      => "",
			"use_custom_icon_size" => "",
			"custom_icon_size" => "",
			"text_color" => "",
			"title_font_weight" => "",
			"title_color" => "",
			"icon_color" => "",
			"display_icon_position" => "",
			"display_icon_top_margin" => "",
			"activate_link" => "",
			"link_icon" => "",
			"link"     => "",
			"link_color"  => "",
			"custom_top_margin_maintext_and_text"  => "",
			"custom_icon_margin"  => "",
			"title_font_size"  => "",
			"title_font_transform"  => "",
			"title_tag" => "h5",
			"box_border_radius" => "",
			"box_shadow" => "no",
			"image_top" => "",
			"image_top_width" => "",
		), $atts ) );
		
		// custom icon box design
		$image_src = $box_shadow_css = '';
		if( $use_custom_icon_box_design == 'yes' ) {
			if( isset($icon_box_padding) && $icon_box_padding != '' ) $icon_box_padding = 'padding:'.$icon_box_padding.';';
			if( isset($icon_box_margin) && $icon_box_margin != '' ) $icon_box_margin = 'margin:'.$icon_box_margin.';';
			if( isset($icon_box_color) && $icon_box_color != '' ) $icon_box_color = 'background:'.$icon_box_color.';';
			if( isset($box_border_radius) && $box_border_radius != '' ) $box_border_radius = 'border-radius:'.$box_border_radius.';';
			if( $box_shadow == 'yes' ) $box_shadow_css = 'boxshadow';
			$box_design = 'style=" '.$icon_box_color.''.$icon_box_padding.''.$icon_box_margin.''.$box_border_radius.' "';
		} else {
			$box_design = '';
		}
		// eof of custom icon box design	
		
		if( $use_custom_icon_size == "yes" ) {
			$new_custom_icon_size = $custom_icon_size.'px';
		} else {
			$new_custom_icon_size = '';
		}
		
		if( $display_icon_position == 'left' || $display_icon_position == 'left_from_title' ) { 
			$icon_position_class = '';
		} else if( $display_icon_position == 'top' ) { 
			$icon_position_class = 'top';
			$display_icon_top_margin = $display_icon_top_margin;
			// image
			if (is_numeric($image_top) && isset($image_top)) {
				$image_src = wp_get_attachment_url($image_top);
			}
			if( isset($image_top_width) && $image_top_width != '' ) $image_top_width = 'style="width:'.$image_top_width.';"';
			// eof image
		} else {
			$display_icon_top_margin = '';
			$icon_position_class = '';
		}
		
		// activate link
		if( $activate_link == 'yes' ) {
			$link = (function_exists("vc_build_link") ? vc_build_link($link) : $link);
			if( $link_icon == 'box' ) {
				$a_box_open  = '<a href="'.$link['url'].'" target="'.$link['target'].'">';
				$a_box_close = '</a>';
			} else if( $link_icon == 'yes' ) {
				$a_open  = '<a href="'.$link['url'].'" target="'.$link['target'].'">';
				$a_close = '</a>';
			} else {  
				if( $link_icon == 'both' ) {
					$a_open  = '<a href="'.$link['url'].'" target="'.$link['target'].'">';
					$a_close = '</a>';
				}
				if( isset($link['title']) && $link['title'] != '' ) { 
					$link_html = '<p style="padding-top:10px;text-transform: capitalize;letter-spacing: 0.6px;"> <a href="'.$link['url'].'" class="custom-link hvr-icon-wobble-horizontal" style="color:'.$link_color.'!important;" target="'.$link['target'].'">'.$link['title'].'  &nbsp;<i class="fa fa-arrow-right hvr-icon" style="color:'.$link_color.'!important;"></i></a> </p>';
				} else {  
					$link_html = '';
				}
			}
		}

		
if( $display_icon_position == 'left_from_title' ) { 
	$return = '<div class="'.$box_css_animation.'">'.$a_box_open.'<div class="manual_icon_with_title '.$box_shadow_css.'" '.$box_design.'">
	  
	  <div class="icon_holder '.$icon_position_class.' " style="margin-bottom:'.$display_icon_top_margin.'px;width: 100%;display: -webkit-box;">
		'.$a_open.'<span><i class="'.$icon_name.'" style="font-size:'.$new_custom_icon_size.'; color:'.$icon_color.';padding: 0 20px 0 0;"></i></span>'.$a_close.'
		<'.$title_tag.' style="font-weight:'.$title_font_weight.'!important;color:'.$title_color.'!important;font-size:'.$title_font_size.'px!important;text-transform:'.$title_font_transform.'!important;">'.$title.'</'.$title_tag.'>
	  </div>
	  
	  <div class="icon_text_holder '.$icon_position_class.'" style="padding:0px;padding-top:10px; clear: both;">
		<div class="icon_text_inner" style="margin-top:'.$custom_top_margin_maintext_and_text.'px;">
		  <p class="desc" style="color:'.$text_color.';">'.$text.'</p>
		  '.$link_html.'
		</div>
	  </div>
	  
	</div>'.$a_box_close.'</div>';
		
} else {
	
	if( $display_icon_position == 'left' ) $custom_icon_margin_left = $custom_icon_margin;
	else $custom_icon_margin_left = '';
	
	$return = '<div class="'.$box_css_animation.'">'.$a_box_open.'<div class="manual_icon_with_title '.$box_shadow_css.'" '.$box_design.'">
	  
	  <div class="icon_holder '.$icon_position_class.' " style="margin-bottom:'.$display_icon_top_margin.'px;">
	  '.$a_open.'<span>';
	 
	 if( $display_icon_position == 'top' && ( isset($image_src) && $image_src != '' ) ) {
		  $return .= '<img src="'.$image_src.'" '.$image_top_width.'>';
	 } else {
		 $return .= '<i class="'.$icon_name.'" style="font-size:'.$new_custom_icon_size.'; color:'.$icon_color.';"></i>';
	 }
	 
	 $return .= '</span>'.$a_close.'
	  </div>
	  
	  <div class="icon_text_holder '.$icon_position_class.'" style="padding-left:'.$custom_icon_margin_left.'px;">
		<div class="icon_text_inner">
		  <'.$title_tag.' style="font-weight:'.$title_font_weight.'!important;color:'.$title_color.'!important;font-size:'.$title_font_size.'px!important;text-transform:'.$title_font_transform.'!important;">'.$title.'</'.$title_tag.'>
		  <p class="desc" style="color:'.$text_color.';margin-top:'.$custom_top_margin_maintext_and_text.'px;">'.$text.'</p>
		  '.$link_html.'
		</div>
	  </div>
	  
	</div>'.$a_box_close.'</div>';
}


		return $return;
	}
add_shortcode('manual_theme_icon_text', 'manual_theme_icon_text');	
}

/*************************************
***  ADD VC SC 5 :: KNOWLEDGEBASE  ***
**************************************/
if(!function_exists("manual_theme_all_knowledgebase")){  
	function manual_theme_all_knowledgebase( $atts, $content = null ) {
	global $theme_options;	
	
		extract( shortcode_atts( array( 
			"knowledgebase_style_type" => '1',
			"knowledgebase_design_style_type" => '1',
			"knowledgebase_design_style_type1_border_color" => '#e1e1e1',
			"knowledgebase_design_style_type1_bg_color" => '#ffffff',
			"knowledgebase_design_style_type1_titletxtbg_color" => '#F6F6F6',
			"kb_no_of_category_records" => '0',
			"knowledgebase_column"  => "4",
			"knowledgebase_category_display_order"  => "ASC",
			"knowledgebase_category_display_orderby"  => "name",
			"knowledgebase_no_of_articles"  => "5",
			"knowledgebase_page_article_display_order"  => "ASC",
			"knowledgebase_page_article_display_orderby"  => "date",
			"knowledgebase_child_cat_as_root"  => "no",
			"category_title_tag" => "h5",
			"knowledgebase_view_all"  => "View All",
			"read_more_text_display" => 'yes',
			"kbgroupcatid"  => "",
			"icon_color" => "",
			"cat_desc_color" => "#96989a",
			"display_kb_cat_desc" => "yes",
			"display_kb_cat_title_icon" => "yes",
			"display_kb_article_title_icon" => "yes",
			"knowledgebase_article_txt_design3" => "articles",
			"knowledgebase_design_style_type3_text_color" => "#a2a2a2",
			"display_kb_cat_subcategory" => "no",
			"kbsubcat_total_article_count_color" => "#c1c1c1",
			"hide_kb_category_articles" => "no",
			"read_more_text_arrow" => "no",
			"kb_cat_icon_position" => '1',
			"category_title_text_padding" => '',
			"category_icon_font_size" => '19px',
			"category_icon_name_default" => 'icon-briefcase',
			"knowledgebase_design_style_type1_border_width" => '1px',
			"completely_hide_private_category" => 'no',
			"hide_post_count_from_viewall_text" => 'no',
			"kb_display_cat_recors_in_grid_layout_col_1" => 'no',
			"kb_display_cat_recors_apply_li_border_layout_col_1" => 'no',
			"knowledgebase_design_style_type1_bg_linear_color" => '',
			"completely_hide_private_articles" => 'no',
		), $atts ) );
		
		
		// Knowledgebase Column & Style 
		$class = $grid_layout = $apply_li_border = ''; 
		if( $knowledgebase_column == 4 ) {
			if( $knowledgebase_style_type == 1 ) { $class = 'masonry-grid'; }
			$col_md = 4;
		} else if( $knowledgebase_column == 6 ) {
			if( $knowledgebase_style_type == 1 ) { $class = 'masonry-grid-without-sidebar'; }
			$col_md = 6;
		} else if( $knowledgebase_column == 12 ) {
			if( $knowledgebase_style_type == 1 ) { $class = 'masonry-grid'; }
			$col_md = 12;
			if( $kb_display_cat_recors_in_grid_layout_col_1 == 'yes' ) $grid_layout = 'gridstyle';
			if( $kb_display_cat_recors_apply_li_border_layout_col_1 == 'yes' ) $apply_li_border = 'liborder';
		} else {
			if( $knowledgebase_style_type == 1 ) { $class = 'masonry-grid'; }
			$col_md = 4;
		}
		
		// Category Icon Position
		$catkb_icon_float = $catkb_icon_text_block_padding = '';
		if( $display_kb_cat_title_icon == 'yes' && $kb_cat_icon_position == 2 ) {
			$catkb_icon_float = 'style="float: none;"';
			$catkb_icon_text_block_padding = 'style="padding-left: 0px;"';
		} 
		
		//Icon Postion
		$cat_title_textpadding = '';
		if( isset($category_title_text_padding) && $category_title_text_padding != '' && $kb_cat_icon_position == 1 ) { 
			$catkb_icon_text_block_padding = 'style="padding:'.$category_title_text_padding.';"';
		}
		
		// Knowledegabse design style
		$kb_title_designstyle = $knowledgebase_body_style = '';
		if( $knowledgebase_design_style_type == 2 ||  $knowledgebase_design_style_type == 3 ) {
			
			$box_linear_bg_color = '';
			if( isset($knowledgebase_design_style_type1_bg_linear_color) && $knowledgebase_design_style_type1_bg_linear_color != '' ) {
				$box_linear_bg_color = 'background-image: linear-gradient(180deg,'.$knowledgebase_design_style_type1_bg_color.' 31%,'.$knowledgebase_design_style_type1_bg_linear_color.' 100%);';
			}
			
			$knowledgebase_body_style = 'style="border:'.((isset($knowledgebase_design_style_type1_border_width) && $knowledgebase_design_style_type1_border_width != '')?$knowledgebase_design_style_type1_border_width:'1px').' solid '.$knowledgebase_design_style_type1_border_color.'; padding: 19px; background:'.$knowledgebase_design_style_type1_bg_color.';'.$box_linear_bg_color.'"';
			if( $knowledgebase_design_style_type == 2 ) {
				$kb_title_designstyle = 'style="border-radius: 5px; margin-bottom: 10px; background: '.$knowledgebase_design_style_type1_titletxtbg_color.'; padding: 15px 15px 1px 15px;"';
			} else {
				$kb_title_designstyle = '';	
			}
		}
				
		// Category Display Order
		if( isset($knowledgebase_category_display_order) && $knowledgebase_category_display_order != ''  ) {
			$cat_display_order = $knowledgebase_category_display_order;
		}
		if( isset($knowledgebase_category_display_orderby) && $knowledgebase_category_display_orderby != ''  ) {
			$cat_display_order_by = $knowledgebase_category_display_orderby;
		}
		
		// Records Under Category Display Order
		if( isset($knowledgebase_page_article_display_order) && $knowledgebase_page_article_display_order != ''  ) {
			$page_display_order = $knowledgebase_page_article_display_order;
		}
		if( isset( $knowledgebase_page_article_display_orderby ) && $knowledgebase_page_article_display_orderby != '' ) {
			$display_page_order_by = $knowledgebase_page_article_display_orderby;	
		}
		
		$id = get_the_ID();
		$get_id = update_option('manual_breadcrumb_kb', $id);
		
		
		$kb_catIDs = '';
		if( isset( $kbgroupcatid ) && $kbgroupcatid != '' ) {
			$kb_catIDs = explode(',', $kbgroupcatid); 
		}
		 
		//list terms in a given taxonomy
		$args = array(
			'hide_empty'    => 1,
			'child_of' 		=> 0,
			'pad_counts' 	=> 1,
			'hierarchical'	=> 1,
			'order'         => $cat_display_order,
			'orderby'       => $cat_display_order_by,
			'number'        => $kb_no_of_category_records,
		); 
		$tax_terms = get_terms('manualknowledgebasecat', $args);
		if( $knowledgebase_child_cat_as_root == 'no' ) $tax_terms = wp_list_filter($tax_terms,array('parent'=>0));
		$return = '<div class="'.$class.'">';
		
		// FIXROW
		if( $knowledgebase_style_type == 2 && ($knowledgebase_column == 4 || $knowledgebase_column == 6 || $knowledgebase_column == 12) ) {
			$return .= '<div class="row row-eq-height" style="margin: 0px;">'; // control every 3 loop
		}
		// EOF FIXROW
		
	    $i = 1;
		$cat_icon_name = 'icon-briefcase';
		
	    foreach ($tax_terms as $tax_term) { 
		
		$check_if_login_call = get_option( 'kb_cat_check_login_'.$tax_term->term_id );
		$check_user_role = get_option( 'kb_cat_user_role_'.$tax_term->term_id );
		$custom_login_message = get_option( 'kb_cat_login_message_'.$tax_term->term_id );
		$cat_icon_name = get_option( 'kb_cat_icon_name_'.$tax_term->term_id );
		
		if( isset( $cat_icon_name ) && $cat_icon_name != '' ) {
			$cat_icon_name = $cat_icon_name;
		} else {  
			$cat_icon_name = ((isset($category_icon_name_default) && $category_icon_name_default != '')?$category_icon_name_default:'icon-briefcase');
		}
		
		if ( !empty($kb_catIDs) && !in_array( $tax_term->term_id, $kb_catIDs)) continue;
		
		
		/****************************************
		**** Completely hide private Category ***
		*****************************************/
		if( $completely_hide_private_category == 'yes' && $check_if_login_call == 1 && !is_user_logged_in() )  {
			continue;
		} else {
			if( !empty($check_user_role) ) { 
				$access_status = manual_doc_access(($check_user_role));
			} else {  
				$access_status = true; 
			}
			if( $completely_hide_private_category == 'yes' && $check_if_login_call == 1 && is_user_logged_in() && $access_status == false ) continue;
		}
		/********************************************
		**** Eof Completely hide private Category ***
		*********************************************/
		
		
	    $return .= '<div class="col-md-'.$col_md.' col-sm-12 masonry-item body-content"> 
				    <div class="knowledgebase-body" '.$knowledgebase_body_style.'>';
					
		if( isset($cat_icon_name) && $cat_icon_name != '' ) { 
			$return .= '<div class="kb-title-wrap" '.$kb_title_designstyle.' >';
			if( $display_kb_cat_title_icon == 'yes' ) {
				$return .= '<div class="kb-masonry-icon" '.$catkb_icon_float.'><'.$category_title_tag.'><i class="'.$cat_icon_name.'" style="font-size:'.$category_icon_font_size.';color:'.((isset($icon_color)&& $icon_color!='')?$icon_color:'inherit').';" ></i></'.$category_title_tag.'></div>';
			}
			$return .= '<div '.($display_kb_cat_title_icon == 'yes'?'class="vc-kb-masonry-tag-right"':'').' '.$catkb_icon_text_block_padding.'>';
		}			
					
		$return .= '<'.$category_title_tag.'><a href="'.esc_attr(get_term_link($tax_term, 'manualknowledgebasecat')).'">'; 
	    
         $cat_title = $tax_term->name; 
         $return .= html_entity_decode($cat_title, ENT_QUOTES, "UTF-8");
         $return .= '</a> 
                     </'.$category_title_tag.'>';
					 
		if( $display_kb_cat_desc == 'yes' ) {			 
			$return .= '<div style="color:'.$cat_desc_color.'">'.category_description($tax_term->term_id).'</div>'; 
		}
		
		if( $knowledgebase_design_style_type == 3 && ( $tax_term->count > 1 ) ) {
			$return .= '<div><p style="color:'.$knowledgebase_design_style_type3_text_color.'">'.$tax_term->count.' '.$knowledgebase_article_txt_design3.'</p></div>'; 
		}
					 
		 if( isset($cat_icon_name) && $cat_icon_name != '' ) { $return .= '</div>'; }
		 
		 if( $knowledgebase_design_style_type != 2 ) $return .= '<span class="separator small"></span>';
		 $return .= '</div>';
		 
		 if( $check_if_login_call == 1 && !is_user_logged_in() ) {
			$return .= manual_get_login_form_control($custom_login_message);
		 } else {
				 
			if( !empty($check_user_role) ) $access_status = manual_doc_access(($check_user_role));
			else  $access_status = true;
			
			if( $check_if_login_call == 1 && is_user_logged_in() && $access_status == false ) {
					$return .= '<div class="manual_login_page"> <div class="custom_login_form"><p>';
					$return .= $theme_options['kb-cat-page-access-control-message'];
					$return .= '</p></div></div>';
			} else {
				
				/*********************************
				**** Display Sub Category Name ***
				**********************************/
				if( $display_kb_cat_subcategory == 'yes' ) {
					$subcat_args = array(
						'child_of' => $tax_term->term_id,
						'taxonomy' => $tax_term->taxonomy,
						'hide_empty' => 0,
						'pad_counts' 	=> 1,
						'hierarchical' => false,
						'orderby' => $display_page_order_by,
						'order'  => $page_display_order,
					);
					$subcategory = get_categories($subcat_args);
					if( $subcategory ) {
					$return .= '<ul class="kbse">';	
						foreach( $subcategory as $subcats ) {
							$return .= '<li class="cat inner subcat"><a href="'.esc_attr(get_term_link($subcats, 'manualknowledgebasecat')).'">'.$subcats->cat_name.'&nbsp;&nbsp;<span style="color:'.$kbsubcat_total_article_count_color.';">('.$subcats->count.')</span></a></li>';
						}
					$return .= '</ul>';	 
					}
				}
				/*************************************
				** EOF - Display Sub Category Name ***
				**************************************/
				
				if( $hide_kb_category_articles == 'no' ) {
					$return .= '<ul class="kbse '.$grid_layout.'">';
					if( isset( $knowledgebase_no_of_articles ) && $knowledgebase_no_of_articles != '' ) {
						$display_on_of_records_under_cat = $knowledgebase_no_of_articles;	
					} else {
						$display_on_of_records_under_cat = 5;
					}
					
					$args = array( 
						'post_type'  => 'manual_kb',
						'numberposts' => $display_on_of_records_under_cat,
						'orderby' => $display_page_order_by,
						'order'  => $page_display_order,
						'tax_query' => array(
							array(
								'taxonomy' => 'manualknowledgebasecat',
								'field' => 'term_id',
								'include_children' => true,
								'terms' => $tax_term->term_id
							)
						)
					 );
					 $st_cat_posts = get_posts( $args );
					 foreach( $st_cat_posts as $post ) : 
					 
					 // control article access 
					 $access_status = true;
					 if( $completely_hide_private_articles == 'yes' ) {
						 $article_access_meta = get_post_meta( $post->ID, 'doc_single_article_access', true );
						 $article_check_post_user_level_access = get_post_meta( $post->ID, 'doc_single_article_user_access', true );
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
					 // eof control article access
					 
					 if( $access_status == true ) {
						 $format = get_post_format( $post->ID ); // get post format
						 $return .= '<li class="cat '.($display_kb_article_title_icon == "yes"?'inner '.((isset($format) && $format != '')?$format:'').' ':'').''.$apply_li_border.'"> <a href="'. get_permalink($post->ID).'" '.($display_kb_article_title_icon == "no"?'style="padding: 8px 0px 5px 0px;"':'').'>';
						 $org_title = $post->post_title; 
						 $return .= html_entity_decode($org_title, ENT_QUOTES, "UTF-8");
						 $return .= '</a> </li>';
					 }
					 
					 endforeach;
					 $return .= '</ul>';
				}
				 
				 if( $knowledgebase_no_of_articles < $tax_term->count ) { 
					 if( $read_more_text_display == 'yes' ) {
						 $return .= '<div style="padding:10px 0px;"> <a href="'. esc_attr(get_term_link($tax_term, 'manualknowledgebasecat')).'" class="custom-link hvr-icon-wobble-horizontal kblnk">'.$knowledgebase_view_all.'&nbsp;';
						 if( $hide_post_count_from_viewall_text == 'no' ) $return .= $tax_term->count.'&nbsp;';
						 if( $read_more_text_arrow == 'no' ) $return .= '&nbsp;<i class="fa fa-arrow-right hvr-icon"></i>';
						 $return .= '</a></div>';
					 }
				 }
					   
			  }
		  }
          $return .= '</div> </div>';
		  
		// FIXROW
		if( $knowledgebase_style_type == 2 && $knowledgebase_column == 4 ) { 
			if($i % 3 == 0) $return .= '</div><div class="row row-eq-height" style="margin: 0px;">'; 
		} else if( $knowledgebase_style_type == 2 && $knowledgebase_column == 6 ) {
			if($i % 2 == 0) $return .= '</div><div class="row row-eq-height" style="margin: 0px;">'; 
		} else if( $knowledgebase_style_type == 2 && $knowledgebase_column == 12 ) {
			if($i % 1 == 0) $return .= '</div><div class="row row-eq-height" style="margin: 0px;">'; 
		}
		// EOF FIXROW
		  
         $i++; }
		 
		 wp_reset_postdata();
		 
		 // FIXROW
		if( $knowledgebase_style_type == 2 && ($knowledgebase_column == 4 || $knowledgebase_column == 6) ) { 
			$return .= '</div>'; 
		}
		// EOF FIXROW
		 
		 $return .= '</div>';
		// Eof main code
		return $return;
		
	}
add_shortcode('manual_theme_all_knowledgebase', 'manual_theme_all_knowledgebase');	
}

/*************************************
***  ADD VC SC 6 :: KB CATEGORY    ***
**************************************/
if(!function_exists("manual_theme_kb_category")){
	function manual_theme_kb_category( $atts, $content = null ) {
		
		extract( shortcode_atts( array( 
			"kb_category_title"            => "",
			"kb_category_show_post_count"  => "",
			"count_text_color"   => "",
			"count_bg_color"   => "",
			"kb_category_remove_border"   => "",
			"cat_fonticon_color"   => "",
		), $atts ) );
		
		$return = $no_border = $cat_icon_color = '';
		
		$time_start = microtime(true);
		$time_start = explode(".", $time_start);
		if( isset($cat_fonticon_color) && $cat_fonticon_color != '' ) {
			echo '<style>.vc-kb-cat-widget.icon_color_'.$time_start[1].' ul.vc_kbcat_widget li:before{color:'.$cat_fonticon_color.';}</style>';
		}
		
		if( isset($kb_category_remove_border) && $kb_category_remove_border == 'true' ) { $no_border = 'style="border: none;"';  }
		
		$categories = get_categories('taxonomy=manualknowledgebasecat&post_type=manual_kb');
		$return = '<div class="vc_kb_cat_sc sidebar-nav sidebar-widget widget_kb_cat_widget vc-kb-cat-widget icon_color_'.$time_start[1].'"><div class="display-faq-section">';
		$return .= '<h5 class="widget-title widget-custom" style="margin-bottom: 25px;"><span>' . $kb_category_title . '</span></h5>';
		$return .= '<ul class="vc_kbcat_widget">';
		foreach ($categories as $category) {
			$category_link = get_category_link( $category->term_id );
			$return .= '<li '.$no_border.'><a href="'. esc_url($category_link) .'">'. $category->name .'</a> ' ;
			if( $kb_category_show_post_count == 'true' ) { $return .= '<span class="kb_cat_post_count" style="color:'.$count_text_color.';background:'.$count_bg_color.';">'.$category->count.'</span>'; }
			$return .= '</li>';
		}
		$return .= '</ul>';
		$return .= '</div></div>';
		wp_reset_postdata();
		return $return;
	}
add_shortcode('manual_theme_kb_category', 'manual_theme_kb_category');	
}

/******************************************
***  ADD VC SC 7 :: KB POPULAR ARTICLE  ***
*******************************************/
if(!function_exists("manual_theme_kb_popular_article")){
	function manual_theme_kb_popular_article( $atts, $content = null ) {
		global $post, $wpdb;
		extract( shortcode_atts( array( 
			"title"   => "",
			"title_tag"   => "h5",
			"knowledgebase_article_display_type"   => "",
			"knowledgebase_article_number"   => "5",
			"knowledgebase_article_order"   => "ASC",
			"display_grid" => 'no',
			"completely_hide_private_articles" => 'no',
		), $atts ) );
		
		if( $display_grid == 'yes' ) { $ul_class = 'vcshortcode_kbarticles';
		} else { $ul_class = 'clearfix'; }
		
		$return = '<div class="vc_kb_article_type sidebar-nav sidebar-widget widget_kb_cat_widget vc-kb-popular-widget"><div class="display-faq-section">';
		$return .= '<'.$title_tag.' class="widget-title widget-custom" style="margin-bottom: 25px;"><span>' . $title . '</span></'.$title_tag.'>';
		
		$args = '';
		if( $knowledgebase_article_display_type == 1 ) { // Latest Article
			$args = array( 
						'posts_per_page' => $knowledgebase_article_number, 
						'post_type'  => 'manual_kb',
						'orderby' => 'date',
						'order'	=>	$knowledgebase_article_order,
					);
			
		} else if( $knowledgebase_article_display_type == 2 ) { // Popular Article
			$args = array( 
							'posts_per_page' => $knowledgebase_article_number, 
							'post_type'  => 'manual_kb',
							'orderby' => 'meta_value_num',
							'order'	=>	$knowledgebase_article_order,
							'meta_key' => 'manual_post_visitors'
						);
			
		} else if( $knowledgebase_article_display_type == 3 ) { // Top Rated Article
			$args = array( 
					'posts_per_page' => $knowledgebase_article_number, 
					'post_type'  => 'manual_kb',
					'orderby' => 'meta_value_num',
					'order'	=>	$knowledgebase_article_order,
					'meta_key' => 'votes_count_doc_manual'
				);
			
		} else if( $knowledgebase_article_display_type == 4 ) { // Most Commented Article
			$args = array( 
							'posts_per_page' => $knowledgebase_article_number, 
							'post_type'  => 'manual_kb',
							'orderby' => 'comment_count',
							'order'	=>	$knowledgebase_article_order,
						);
						
		} else if( $knowledgebase_article_display_type == 5 ) { // Recently Update Article
			$args = array( 
							'posts_per_page' => $knowledgebase_article_number, 
							'post_type'  => 'manual_kb',
							'orderby' => 'modified',
							'order'	=>	$knowledgebase_article_order,
						);
						
		} else { // Default latest
			$args = array( 
						'posts_per_page' => $knowledgebase_article_number, 
						'post_type'  => 'manual_kb',
						'orderby' => 'date',
						'order'	=>	$knowledgebase_article_order,
					);
		}
		
		$query = new WP_Query($args);
		$return .= '<ul class="'.$ul_class.'">';
		if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
		
		// control article access 
		$access_status = true;
		if( $completely_hide_private_articles == 'yes' ) {
			$article_access_meta = get_post_meta( $query->post->ID, 'doc_single_article_access', true );
			$article_check_post_user_level_access = get_post_meta( $query->post->ID, 'doc_single_article_user_access', true );
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
		// eof control article access
		
		if( $access_status == true ) {
			$format = get_post_format($query->post->ID);
			$return .= '<li class="articles '.( (isset($format) && $format!= '')?$format:'' ).' "><a href="'.get_permalink($query->post->ID).'" rel="bookmark">'.get_the_title($query->post->ID).'</a></li>';
		}
		
		endwhile; endif;
		$return .= '</ul>'; 
		
		wp_reset_postdata();
		$return .= '</div></div>';

		return $return;
	}
add_shortcode('manual_theme_kb_popular_article', 'manual_theme_kb_popular_article');	
}

/*******************************************
***  ADD VC SC 8 :: AJAX LOAD POST TYPE  ***
********************************************/
if(!function_exists("manual__vc_ajaxloaddocumentation")){
	function manual__vc_ajaxloaddocumentation( $atts, $content = null ) {
		global $theme_options;
		
		extract( shortcode_atts( array( 
			"post_type"   => "manual_documentation",
			"posttype_records_display_order" => "ASC",
			"posttype_records_display_orderby" => "menu_order",
			"cat_id_posttype"   => "",
			"posttype_treemenu_display_position" => "left",
			"expandalltext" => "Expand All",
			"collapsealltext" => "Collapse All",
			"rowlayout" => "2",
			"layout_style" => "1",
			"content_bg_color" => "#ffffff",
			'adjust_sidebar_top_padding' => '',
			'vc_doc_ajaxload_off' => '',
		), $atts ) );
		
		$content_style_css = $vc_doc_ajaxload_sidebar_margin_fix = $author_false = '';
		if( $layout_style == "2" ) {
			$content_style_css = '.vc-doc-content-page, .doc-single-post.doc-page { background:'.$content_bg_color.'!important; padding: 50px 50px!important; margin-bottom: 30px!important; }';
		}
		if( isset($adjust_sidebar_top_padding) && $adjust_sidebar_top_padding == true ) {
			$vc_doc_ajaxload_sidebar_margin_fix = 'aside#sidebar-box, aside.doc-sidebar-box, .doc-single-post.doc-page { padding-top: 50px!important; } .vc-doc-content-page, .doc-single-post.doc-page{ margin-bottom: 0px!important; } .vc-doc-content-page{ border-right: 1px solid #f1f1f1; border-left: 1px solid #f1f1f1; }';
		}
		if( isset($theme_options['doc-global-arcile-display-style']) && $theme_options['doc-global-arcile-display-style'] == 2 ) { 
		if( $theme_options['doc-global-design2-author'] == false ) { $author_false = '.doc-single-post .page-title-header p { float: none; margin-top: 0px; margin-bottom: 10px; }'; }
			echo '<style>.doc-single-post .page-title-header p { float: right; margin-top: 35px; margin-bottom: 0px; } .doc-single-post .page-title-header:before { content: ""; } .doc-single-post .page-title-header { padding: 0px 0px 5px 0px; } '.$content_style_css.'  '.$vc_doc_ajaxload_sidebar_margin_fix.' '.$author_false.'</style>';
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
		return $return;
	}
add_shortcode('manual__vc_ajaxloaddocumentation', 'manual__vc_ajaxloaddocumentation');	
}


/**********************************************
***  ADD VC SC 8.1 :: INLINE DOCUMENTATION  ***
***********************************************/
if(!function_exists("manual__vc_inlinedocumentation")){
	function manual__vc_inlinedocumentation( $atts, $content = null ) {
		global $theme_options;
		extract( shortcode_atts( array( 
			"post_type"   => "manual_documentation",
			"posttype_inlinerec_display_order" => "ASC",
			"posttype_inlinerec_display_orderby" => "menu_order",
			"cat_id_posttype"   => "",
			"cat_id_posttype_kb" => "",
			"posttype_inlinerec_display_position" => "left",
			"inlinesearchboxtext" => "Search...",
			"inlineodc_searchonoff" => "on",
			"posttype_inlinerec_boxshadowand_padding" => "no",
			"posttype_inlinerec_rowlayout" => "2",
			"adjust_sidebar_top_padding" => "",
			"posttype_inline_display_style" => "1",
		), $atts ) );
		
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
			$return .= '<style>.inlinedocsidebar{ padding-top:50px; }</style>';
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
		
		return $return;
	}
add_shortcode('manual__vc_inlinedocumentation', 'manual__vc_inlinedocumentation');		
}



/****************************************
***  ADD VC SC 9 :: HOME HELP BLOCKS  ***
*****************************************/
if(!function_exists("manual_theme_home_help_blocks")){
	function manual_theme_home_help_blocks( $atts, $content = null ) {
		
		extract( shortcode_atts( array( 
			"title"   => "",
		), $atts ) );
		
		$return = '<div class="loop-help-desk">';
        $args = array(
	 				'post_type' => 'manual_hp_block',
					'posts_per_page' => '-1',
					'orderby' => 'menu_order',
					'post_status' => 'publish',
					'order' => 'ASC'
				);
		$wp_query = new WP_Query($args);
		if($wp_query->have_posts()) {
		while($wp_query->have_posts()) { $wp_query->the_post(); 
         $return .= '<a href="'.get_post_meta( $wp_query->post->ID, '_manual_hpblock_link', true ).'">
		   <div class="vc-help-blocks counter-text hvr-float">
              <div class="browse-help-desk" style="background:'.get_post_meta( $wp_query->post->ID, '_manual_hpblock_bg_color', true ).';"><div class="browse-help-desk-div"> ';
			    $icon_image_url = get_post_meta( $wp_query->post->ID, '_manual_hpblock_custom_icon', 1 );
				if( $icon_image_url != '' ) {
					$return .= '<img src="'.$icon_image_url.'">';
				} else {
					$return .= '<i class="'.get_post_meta( $wp_query->post->ID, '_manual_hpblock_icon', true ).' i-fa" style="color:'.get_post_meta( $wp_query->post->ID, '_manual_hpblock_icon_color', true ).';"></i>';
				}
				$return .= '</div>
                <div class="m-and-p">
                  <h5 style="color:'.get_post_meta( $wp_query->post->ID, '_manual_hpblock_text_color', true ).';">'.get_the_title($wp_query->post->ID).'</h5>
                  <p style="color:'.get_post_meta( $wp_query->post->ID, '_manual_hpblock_text_color', true ).';">'. get_post_meta( $wp_query->post->ID, '_manual_hpblock_text', true ).'</p>';
				
				if( get_post_meta( $wp_query->post->ID, '_manual_hpblock_link_text', true ) != '' ) { 
					 $return .= '<p class="padding" style="color:'.get_post_meta( $wp_query->post->ID, '_manual_hpblock_text_color', true ).';"><span class="custom-link hvr-icon-wobble-horizontal" style="letter-spacing:1px;color:'.get_post_meta( $wp_query->post->ID, '_manual_hpblock_link_color', true ).'!important;">'.get_post_meta( $wp_query->post->ID, '_manual_hpblock_link_text', true ).'</span></p>';
				} else {  
				   if( get_post_meta( $wp_query->post->ID, '_manual_hpblock_link', true ) != '' ) {
					   $return .= '<p class="padding" style="color:'.get_post_meta( $wp_query->post->ID, '_manual_hpblock_text_color', true ).';"><span class="custom-link hvr-icon-wobble-horizontal" style="letter-spacing:1px;color:'.get_post_meta( $wp_query->post->ID, '_manual_hpblock_link_color', true ).'!important;">Browse&nbsp;'.get_the_title($wp_query->post->ID).' &nbsp;<i class="fa fa-arrow-right hvr-icon"></i></span></p>';
					} 
				}
                $return .= '</div>
              </div>
            </div></a>';
		}
		} 
		wp_reset_postdata();
		$return .= '</div>';
		return $return;
	}
add_shortcode('manual_theme_home_help_blocks', 'manual_theme_home_help_blocks');	
}

/***************************************
***  ADD VC SC 10 :: PORTFOLIO LIST  ***
****************************************/
if(!function_exists("manual_theme_portfolio_sc")){
	function manual_theme_portfolio_sc( $atts, $content = null ) {
		global $post,$paged;
		extract( shortcode_atts( array( 
			"title"                      => "",
			"portfolio_title_tag"        => "h4",
			"portfolio_order"            => "DESC",
			"number_of_post"             => "",
			"portfolio_order_by"         => "date",
			"portfolio_column"           => "3",
			"portfolio_type"             => "",
			"portfolio_shorting"         => "no",
			"shorting_link_color"        => "",
			"shorting_link_border_color" => "",
			"filter_align"               => "left",
			"filter_padding"             => "",
			"link_color"                 => "",
			"link_cat_color"             => "",
			"selected_projects"          => "",
			"category"                   => "",
			"sorting_order"              => "ASC",
			"sorting_order_by"           => "name",
			"show_categories"            => "yes",
			"show_load_more"        	 => "yes",
			"show_load_more_align"       => "",
			"show_load_more_margin"      => "",
			"show_custom_description"      => "no",
		), $atts ) );
		

		if( isset($portfolio_type) && $portfolio_type != '') {
			if( $portfolio_type == 'FitRows' ) {
				$portfolio_type_class = 'isotope-container';
				$image_handler_size = 'portfolio-FitRows';
				if( $portfolio_shorting == 'yes' ) {
					$portfolio_filter_type_class = 'filter-portfolio-group';
					$portfolio_data_filter_li = 'data-filter';
				}
			} else {
				$portfolio_type_class = 'isotope-container-masnory';
				$image_handler_size = 'large';
				if( $portfolio_shorting == 'yes' ) {
					$portfolio_filter_type_class = 'filter-portfolio-group-masnory';
					$portfolio_data_filter_li = 'data-filter-masnory';
				}
			}
		} else {
			$portfolio_type_class = 'isotope-container-masnory';
			$image_handler_size = 'large';
			if( $portfolio_shorting == 'yes' ) {
				$portfolio_filter_type_class = 'filter-portfolio-group-masnory';
				$portfolio_data_filter_li = 'data-filter-masnory';
			}
		}
		
		$return = '<span></span>';
		if( isset($portfolio_shorting) && $portfolio_shorting != '' && $portfolio_shorting == 'yes') {
			
			if( isset($filter_padding) && !empty($filter_padding) ) $filter_padding = $filter_padding;
			else $filter_padding = '50px';
			
			if( !empty($shorting_link_border_color) ) { 
				$readjust_border_color = 'border-bottom: 1px solid '.$shorting_link_border_color.'';
			} else {
				$readjust_border_color = '';
			}
			
			if( !empty($filter_align) ) {
				if( $filter_align == 'left' ) $filter_padding_align_li = 'padding:10px 18px 10px 0px;';
				else if( $filter_align == 'center' ) $filter_padding_align_li = 'padding: 10px 10px;';
				else if( $filter_align == 'right' ) $filter_padding_align_li = 'padding: 10px 0px 10px 18px;';
			}
			
			// cat names 
			$cat_slug_name = array();
			if( !empty($category) ) {
				$category = preg_replace('/\s+/', '', $category);
				$cat_slug_name = explode(",", $category);
			}
					
			$args = array(
				'hide_empty'    => 1,
				'child_of' 		=> 0,
				'pad_counts' 	=> 1,
				'hierarchical'	=> 1,
				'order'         => $sorting_order,
				'orderby'       => $sorting_order_by,
			); 
			$tax_terms = get_terms('manualportfoliocategory', $args);
			$tax_terms = wp_list_filter($tax_terms,array('parent'=>0));
			
			if( ! empty($tax_terms) ) { 
				$return .= '<div class="portfolio-start-display-section" style="padding: '.$filter_padding.' 0px;">
							<div class="portfolio-filter portfolio-list-divider '.$portfolio_filter_type_class.'" style="text-align:'.$filter_align.'">
							<ul>';
				$return .= '<li style="'.$filter_padding_align_li.'" '.$portfolio_data_filter_li.'="*" class="selected"><span style="'.$readjust_border_color.';color:'.$shorting_link_color.'">All</span></li>';
				$i = 1;
				foreach ($tax_terms as $tax_term) { 
					 if ( !empty($cat_slug_name) && !in_array( trim($tax_term->slug), $cat_slug_name ) ) continue;
					 $cat_title = $tax_term->name; 
					 $cat_title = html_entity_decode($cat_title, ENT_QUOTES, "UTF-8");
					 $cat_title_filter = strtolower($cat_title);
					 $cat_title_filter = preg_replace("/[\s_]/", "-", $cat_title_filter);
					 $return .= ' <li style="'.$filter_padding_align_li.'" '.$portfolio_data_filter_li.'=".'.strtolower($cat_title_filter).'"><span style="'.$readjust_border_color.';color:'.$shorting_link_color.'">'.$cat_title.'</span></li> ';
				 } 
				$return .= '</ul></div></div>';
			} 
		}
		
		if( isset($number_of_post) && $number_of_post != '' ) $number_of_post = $number_of_post;
		else $number_of_post = '-1';
		
		$return .= '<div class="portfolio-readjust-container">';	
		$term_slug = get_query_var( 'term' );
		
		if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
		elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
		else { $paged = 1; }
		
		if ($category == "") {
				$args = array(
	 				'post_type' => 'manual_portfolio',
					'posts_per_page' => $number_of_post,
					'orderby' => $portfolio_order_by,
					'post_status' => 'publish',
					'order' => $portfolio_order,
					'paged' => $paged,
				);
		} else {
				$args = array(
	 				'post_type' => 'manual_portfolio',
					'manualportfoliocategory' => $category,
					'posts_per_page' => $number_of_post,
					'orderby' => $portfolio_order_by,
					'post_status' => 'publish',
					'order' => $portfolio_order,
					'paged' => $paged,
				);
		}
		
		$project_ids = null;
		if ($selected_projects != "") {
			$project_ids = explode(",", $selected_projects);
			$args['post__in'] = $project_ids;
		}
				
		$wp_query = new WP_Query($args);
		if($wp_query->have_posts()) {
			$return .= '<div class="projects_holder '.$portfolio_type_class.'" style="margin:0px -15px;">';
			while($wp_query->have_posts()) : $wp_query->the_post();
			    $cutom_redirect_url = get_post_meta( $wp_query->post->ID, '_manual_portfolio_redirect_link_url', true );
			    $cutom_description = get_post_meta( $wp_query->post->ID, '_manual_portfolio_widget_description', true );
				$taxonomies = get_object_taxonomies( $post->post_type, 'objects' ); 
				$out = array();
				$data_category = array();
				foreach ( $taxonomies as $taxonomy_slug => $taxonomy ){
					// get the terms related to post
					$terms = get_the_terms( $post->ID, $taxonomy_slug );
					if ( !empty( $terms ) ) {
						foreach ( $terms as $term ) {
							$out[] = $term->name;
							$data_category[] = $term->name;
						}
					}
				}
				$return .= '<div class="col-md-'.$portfolio_column.' col-sm-6 element-item portfolio-section-records ';
				foreach( $data_category as $val ) { $return .=  preg_replace("/[\s_]/", "-", strtolower($val)).' '; }
				$return .= '">';
				$return .= '<div class="portfolio-image">';
				$return .= '<a href="'. ($cutom_redirect_url?$cutom_redirect_url:get_permalink($wp_query->post->ID)) .'"> ';
				if ( has_post_thumbnail()) { 
					$return .= get_the_post_thumbnail( $wp_query->post->ID, $image_handler_size, array( 'class' => 'hvr-float' ) );
				} else {
				$return .= '<img width="825" height="510" src="'. trailingslashit( get_template_directory_uri() ).'img/blank-portfolio.jpg" class="hvr-float wp-post-image">';
				}
				$return .= '</a></div>
						    <div class="portfolio-desc">
						    <'.$portfolio_title_tag.'><a href="'. ($cutom_redirect_url?$cutom_redirect_url:get_permalink($wp_query->post->ID)) .'" style="color:'.$link_color.'!important;">';
							$title = get_the_title(); 
							$return .= html_entity_decode($title, ENT_QUOTES, "UTF-8");
						
				$return .= '</a></'.$portfolio_title_tag.'>';
				if( $show_categories == 'yes' ) $return .= '<p class="category" style="color:'.$link_cat_color.'">'. implode(', ', $out ).' </p>';
				if( $show_custom_description == 'yes' ) $return .= '<p>'.$cutom_description.'</p>';
				$return .= '</div></div>';
                    
			 endwhile;
			 
			 	$i = 1;
                while ($i <= $portfolio_column) {
                    $i++;
                    if ($portfolio_column != 1) {
                        $return .= "<div class='filler'></div>\n";
                    }
                }
				
			  $return .= '</div>';
             
		} else {
			$return .= '<p> '. esc_html__('Sorry, no posts matched your criteria.', 'manual') .'</p>';
		}
		$return .= '</div>';
		
		if ($show_load_more == "yes" && $wp_query->max_num_pages > 1 ) { 
		if ($show_load_more == "yes" || $show_load_more == "") {
			
			if( isset($show_load_more_margin) && $show_load_more_margin != '' ) $show_load_more_margin = $show_load_more_margin;
			else $show_load_more_margin = '20px';
		
			$return .= '<div style="text-align:'.$show_load_more_align.'; margin: '.$show_load_more_margin.' 0px;" class="portfolio_paging"><span rel="' . $wp_query->max_num_pages . '" class="ajax_load_more_post load_more custom-botton hvr-icon-spin">' . get_next_posts_link(esc_html__('Show more', 'manual'), $wp_query->max_num_pages) . '&nbsp;</span></div>';
			$return .= '<div style="text-align:'.$show_load_more_align.'; margin: '.$show_load_more_margin.' 0px;" class="portfolio_paging_loading load_more "><a href="javascript: void(0)" class="qbutton custom-botton">'.__('Loading...', 'manual').'</a></div>';
		
		}
		}
		
		
		wp_reset_postdata();
		
		return $return;
	}
add_shortcode('manual_theme_portfolio_sc', 'manual_theme_portfolio_sc');	
}

/**************************************
***  ADD VC SC 11 :: MONITOR FRAME  ***
***************************************/
if(!function_exists("manual_theme_monitor_frame_portfolio")){
	function manual_theme_monitor_frame_portfolio( $atts, $content = null ) {
		extract( shortcode_atts( array( 
			"title"      => "",
			"link"       => "#",
			"portfoio_image"  => "",
			"title_tag" => "h6",
		), $atts ) );
		
		
		if (is_numeric($portfoio_image) && isset($portfoio_image)) {
			$image_src = wp_get_attachment_url($portfoio_image);
		} else {
			$image_src = trailingslashit( get_template_directory_uri() ). 'img/no-portfolio-img.jpg';
		}
		
		
		$link = (function_exists("vc_build_link") ? vc_build_link($link) : $link);
		if( isset($link['target']) && $link['target'] != ''  ) { 
			$add_parm = 'target="_blank"';
		} else { 
			$add_parm = '';
		}
				
		$return  = '<div class="monitor_frame_main_div mix hvr-bob">
					<img class="monitor_frame" alt="frame" src="'.trailingslashit( get_template_directory_uri() ).'/img/monitor_frame.png">';
					
		$return  .= '<div class="item_holder slide_up">';
						
						if( $link['title'] != ''  ) {
		
						$return  .= '<div class="portfolio_title_holder hvr-bubble-top">
										<'.$title_tag.' class="portfolio_title"><a class="href" href="'.$link['url'].'" '.$add_parm.'>'.$link['title'].'</a></'.$title_tag.'>
									</div>';
						}
						
						$return  .= '<a class="portfolio_link_class" href="'.$link['url'].'" '.$add_parm.'></a> 
						<div class="portfolio_shader"></div>
						
						<div class="image_holder">
							<span class="image"><img src="'.$image_src.'"></span>
						</div>';
					
		$return  .= '</div></div>';
		
		
		return $return;
		
	}
add_shortcode('manual_theme_monitor_frame_portfolio', 'manual_theme_monitor_frame_portfolio');	
}

/**************************************
***  ADD VC SC 12 :: KB SINGLE CAT  ***
***************************************/
if(!function_exists("manual_theme_single_cat_knowledgebase")){
	function manual_theme_single_cat_knowledgebase( $atts, $content = null ) {
		global $post, $theme_options;
		extract( shortcode_atts( array( 
			"kbcatrecords_type" => "1",						   
			"page_per_post"   => "",
			"post_order"   => "",
			"post_orderby" => "",
			"include_child_post" => "",
			"kbsinglecatid"   => "",
			"hide_pagination"   => "1",
			"style2_border_color" => "#d4dadf",
			"style2_boxbg_color" => "#ffffff",
			"style2_metabox_color" => "#727272",
			"style2_limit_desc_words" => 35,
			"title_tag" => "h4",
			"quick_stats" => 'no',
			"style1_view_text" => 'views',
			"style_icon_color" => '',
			"style_main_icon_color" => '',
			"style_textlink_color" => '',
			"style_textlink_hover_color" => '',
			"style2_desc_words_text_color" => '#333333',
			"completely_hide_private_articles" => 'no',
		), $atts ) );
		
		$return = '';
		
		if( $page_per_post != '' ) $page_per_post = $page_per_post;
		else $page_per_post = '-1';
		
		if( $post_order != '' ) $post_order = $post_order;
		else $post_order = 'DESC';
		
		if( $post_orderby != '' ) $post_orderby = $post_orderby;
		else $post_orderby = 'none';
		
		if( $include_child_post != '' && $include_child_post == 'yes' ) $include_child_post = true;
		else if( $include_child_post != '' && $include_child_post == 'no' ) $include_child_post = false;
		else $include_child_post = true;
		
		// Check if access level defined
		$check_if_login_call = get_option( 'kb_cat_check_login_'.$kbsinglecatid );
		$check_user_role = get_option( 'kb_cat_user_role_'.$kbsinglecatid);
		$custom_login_message = get_option( 'kb_cat_login_message_'.$kbsinglecatid );
		if( $check_if_login_call == 1 && !is_user_logged_in() ) {
			$return .= manual__get_login_forum($custom_login_message);
		} else {
			
			if( !empty($check_user_role) ) $access_status = manual_doc_access(($check_user_role));
			else  $access_status = true;
			
			if( $access_status == false ) {
					$return .= '<div class="manual_login_page"> <div class="custom_login_form"><p>';
					$return .= $theme_options['kb-cat-page-access-control-message'];
					$return .= '</p></div></div>';
			} else {
			
			$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
			$args = array( 
				'posts_per_page' => $page_per_post, 
				'paged' => $paged,
				'post_type'  => 'manual_kb',
				'orderby' => $post_orderby,
				'order'  => $post_order,
				'tax_query' => array(
					array(
						'taxonomy' => 'manualknowledgebasecat',
						'field' => 'id',
						'include_children' => $include_child_post,
						'terms' => $kbsinglecatid
					)
				)
			 );
			
		    $time_start = microtime(true);
		    $time_start = explode(".", $time_start);
			echo '<style>';
				if( isset($style_main_icon_color) && $style_main_icon_color != '' ) {
					echo '.kb-box-single.vc_single_cat_record_style_one_'.$time_start[1].':before { color:'.$style_main_icon_color.'; }'; 
				}
				if( isset($style_textlink_color) && $style_textlink_color != '' ) {
					echo 'a.linkcolor_'.$time_start[1].' { color:'.$style_textlink_color.'; }';
				}
				if( isset($style_textlink_hover_color) && $style_textlink_hover_color != '' ) {
					echo 'a.linkcolor_'.$time_start[1].':hover, .kb-box-single.vc_single_cat_record_style_one_'.$time_start[1].':hover:before { color:'.$style_textlink_hover_color.'; }'; 
				}
			echo '</style>'; 

			$return = '';
			$the_query = new WP_Query( $args );
			if ( $the_query->have_posts() ) {
				 $return .= '<div style="clear:both" class="knowledgebase-cat-body sc-kb-single">';
				 while ( $the_query->have_posts() ) : $the_query->the_post();
				 
				// control article access 
				$access_status = true;
				if( $completely_hide_private_articles == 'yes' ) {
					$article_access_meta = get_post_meta( $post->ID, 'doc_single_article_access', true );
					$article_check_post_user_level_access = get_post_meta( $post->ID, 'doc_single_article_user_access', true );
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
				// eof control article access
				if( $access_status == true ) { 
				 
				 	if( $kbcatrecords_type == 1 ) {
					   $icon_color = '';
					   if( isset($style_icon_color) && $style_icon_color != '' ) $icon_color = 'style="color:'.$style_icon_color.';"';
					   $format = get_post_format( $the_query->ID );	
					   $return .= '<div class="kb-box-single '.( (isset($format) && $format != '')?$format:'' ).' vc_single_cat_record_style_one_'.$time_start[1].'" style="background:'.$style2_boxbg_color.';border-bottom: 1px solid '.$style2_border_color.'" >'; 
					   $return .= '<'.$title_tag.' style="margin-bottom:5px;"><a class="linkcolor_'.$time_start[1].'" href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></'.$title_tag.'>
									   <p class="entry-meta">';
					   if( $quick_stats == "no" ) {
								$return .= '<i class="fa fa-eye" '.$icon_color.'></i>&nbsp;<span style="color:'.$style2_metabox_color.';">'; 
									   
											if( get_post_meta( $post->ID, 'manual_post_visitors', true ) != '' ) { 
												$return .= get_post_meta( $post->ID, 'manual_post_visitors', true ). '&nbsp;'.$style1_view_text.' ';
											} else { $return .= '0 '.$style1_view_text.''; }
										   
										   $return .= '</span><i class="far fa-calendar-alt" '.$icon_color.'></i> <span style="color:'.$style2_metabox_color.';">'.get_the_time( get_option('date_format') ).'</span>';
										   $return .= '</span>';
					   }
						$return .= '</p>
						   </div>';
					} else {
						$margin_style = '';
						if( $title_tag == 'h3' ) $margin_style = 'margin-top: 8px;';
						$style_border = 'style= "border-color:'.$style2_border_color.'; background:'.$style2_boxbg_color.';"';
						$return .= '<div class="vc-kb-styletwo-single" '.$style_border.' >';
						$return .= '<div class="entry-header">
						            <'.$title_tag.' style="margin-bottom:5px;'.$margin_style.'"><a class="linkcolor_'.$time_start[1].'" href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></'.$title_tag.'>
									</div>';
						$return .= '<p class="excerpt" style="color:'.$style2_desc_words_text_color.';">'.manual__get_excerpt_trim( $style2_limit_desc_words, '...').'</p>';
						$return .= '<div class="vckbpostauthors">';
						$userID =  get_the_author_meta( 'ID', $post->post_author );
						$return .= '<ul style="top: -6px;"><li><img src="'.get_avatar_url($userID).'"></li></ul>';
						$return .= '<div class="item-info" style="color:'.$style2_metabox_color.';">';
						$return .= '<span>Written by </span>'. get_the_author('display_name'); 
						$return .= '<p>'.get_the_time( get_option('date_format') ).'</p>';
						$return .= '</div></div>';
						$return .= '</div>';
					}
				
				}
				endwhile;
				 
			// pagination here 
			if( $hide_pagination == 1 ) {
			$return .= '<div class="vc_sc_kb_single_cat">
							<ul class="pagination">
								<li class="vc_sc_kb_single_cat_page">'. get_previous_posts_link( '&lt;' ).'</li>
								<li class="vc_sc_kb_single_cat_page">'. get_next_posts_link( '&gt;', $the_query->max_num_pages ).'</li>
							</ul>
						</div>';
			}
						
			$return .= '</div>';	
			
			}
		wp_reset_postdata(); 
	  }
	}
		
		
		return $return;
	}
add_shortcode('manual_theme_single_cat_knowledgebase', 'manual_theme_single_cat_knowledgebase');	
}

/***********************************************
***  ADD VC SC 13 :: KB GROUP CAT - REMOVED  ***
************************************************/


/*************************************
***  ADD VC SC 14 :: FAQ CATEGORY  ***
**************************************/
if(!function_exists("manual_theme_faq_category")){
	function manual_theme_faq_category( $atts, $content = null ) {
		
		extract( shortcode_atts( array( 
			"faq_category_title"  => "",
			"faq_category_show_post_count"  => "",
			"count_text_color"  => "",
			"count_bg_color"  => "",
		), $atts ) );
		
		$categories = get_categories('taxonomy=manualfaqcategory&post_type=manual_faq');
		$return = '<div class="vc_kb_cat_sc sidebar-nav sidebar-widget widget_kb_cat_widget"><div class="display-faq-section">';
		$return .= '<h5 class="widget-title widget-custom" style="margin-bottom: 25px;"><span>' . $faq_category_title . '</span></h5>';
		foreach ($categories as $category) {
			$category_link = get_category_link( $category->term_id );
			$return .= '<ul>';
			$return .= '<li class="cat-item"><a href="'. esc_url($category_link) .'">'. $category->name .'</a> ' ;
			if( $faq_category_show_post_count == 'true' ) { $return .= '<span class="kb_cat_post_count" style="color:'.$count_text_color.';background:'.$count_bg_color.';">'.$category->count.'</span>'; }
			$return .= '</li></ul>';
		}
		wp_reset_postdata();
		$return .= '</div></div>';
		return $return;
	}
add_shortcode('manual_theme_faq_category', 'manual_theme_faq_category');	
}

/****************************************************
***  ADD VC SC 15 :: FAQ SINGLE CATEGORY ARTICLE  ***
*****************************************************/
if(!function_exists("manual_theme_single_faq_article")){
	function manual_theme_single_faq_article( $atts, $content = null ) {
		global $post, $theme_options;
		extract( shortcode_atts( array( 
			"page_per_post"   => "",
			"custom_title"   => "",
			"title_font_size"   => "19px",
			"text_font_weight"   => "600",
			"text_transform"   => "none",
			"post_order"   => "",
			"post_orderby" => "",
			"include_child_post" => "",
			"faqsinglecatid"   => "",
			"hidepagination"   => "1",
			"displaystyle"   => "1",
			"faq_column"    => "4",
			"faq_title_tag"    => "h4",
			"bg_color" => "#fafafa",
			"tag_color" => "",
			"alternate_bg_color" => "", 
			"box_height" => "",
			"bar_color" => "",
		), $atts ) );
		
		$newbox_height = $responsive_newbox_height = '';
		if( isset($box_height) && $box_height!= '' ) {
			$newbox_height = 'height:'.$box_height.';';	
			$responsive_newbox_height = 'height:auto;';	
		}
		
		if( $page_per_post != '' ) $page_per_post = $page_per_post;
		else $page_per_post = '-1';
		
		if( $post_order != '' ) $post_order = $post_order;
		else $post_order = 'DESC';
		
		if( $post_orderby != '' ) $post_orderby = $post_orderby;
		else $post_orderby = 'none';
		
		if( $include_child_post != '' && $include_child_post == 'yes' ) $include_child_post = true;
		else if( $include_child_post != '' && $include_child_post == 'no' ) $include_child_post = false;
		else $include_child_post = true;
		
		if( $custom_title == 'yes' ) {
			$custom_title_style = 'style="font-weight:'.$text_font_weight.';text-transform:'.$text_transform.';font-size:'.$title_font_size.';"';
		} else {
			$custom_title_style = '';
		}
		
		$paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
		$args = array( 
			'posts_per_page' => $page_per_post, 
			'paged' => $paged,
			'post_type'  => 'manual_faq',
			'orderby' => $post_orderby,
			'order'  => $post_order,
			'tax_query' => array(
				array(
					'taxonomy' => 'manualfaqcategory',
					'field' => 'id',
					'include_children' => $include_child_post,
					'terms' => $faqsinglecatid
				)
			)
		 );
		
		$return = '';
		$the_query = new WP_Query( $args );
		
		$current_term = get_terms('manualfaqcategory',array("term_taxonomy_id"=>$faqsinglecatid));
		if( !empty( $current_term ) ){
		$check_if_login_call = get_option( 'doc_cat_check_login_'.$current_term[0]->term_id );
		$check_user_role = get_option( 'doc_cat_user_role_'.$current_term[0]->term_id );
		$custom_login_message = get_option( 'doc_cat_login_message_'.$current_term[0]->term_id );
		
		if( $check_if_login_call == 1 && !is_user_logged_in() ) {
			$return .= manual__get_login_forum($custom_login_message);
		} else {
			
			if( !empty($check_user_role) ) { $access_status = manual_doc_access(($check_user_role));
			} else {  $access_status = true; }
				
			if( $check_if_login_call == 1 && is_user_logged_in() && $access_status == false ) {
					$return .= '<div class="manual_login_page"> <div class="custom_login_form"><p>';
					$return .= $theme_options['faq-cat-page-access-control-message'];
					$return .= '</p></div></div>';
			} else {
				if ( $the_query->have_posts() ) {
					$return .= '<div style="clear:both" class="knowledgebase-cat-body sc-kb-single">';
					
					// Display Style 1
					if( $displaystyle == 1 ) {
						
						$bar_new_color = '';
						if( isset($bar_color) && $bar_color != '' ) $bar_new_color = 'style="background-color:'.$bar_color.';"';
						
						$return .= '<div class="body-content">';
						$return .= '<div class="display-faq-section shortcode">';
						while ( $the_query->have_posts() ) : $the_query->the_post();
							$content = get_the_content();
							$content = apply_filters('the_content', $content);
							$content = str_replace(']]>', ']]&gt;', $content);
							$return .= '<div class="collapsible-panels theme-faq-cat-pg faq-catpg-'. $post->ID .'" id="'. $post->ID .'" '.$bar_new_color.'>
										  <h5 class="title-faq-cat" '.$custom_title_style.'><a href="#">'. $post->post_title .'</a></h5>';
							$return .= '</div>';
							
							// content
							$return .= '<div class="entry-content clearfix entry-content-'.esc_attr($post->ID).' entry-content-faq-all display-none">
											'. $content .' ';
						    $chk_link = get_edit_post_link( $post->ID );
						    if( $chk_link != '' ) {					
							   $return .= '<p class="post-edit-link" style="text-align:right"><i class="fa fa-edit"></i> <a href="'. $chk_link .'">'.esc_html__( 'Edit', 'manual' ).'</a></p>';
						    }
						    if( $theme_options['faq-display-social-share'] == true ) $return .= manual_get_social_share(get_permalink());
							$return .= '</div>';
							// eof content
						endwhile;
						$return .= '</div></div>';		
						
					} else {
						
						if( $tag_color != '' || $newbox_height != '' ) $return .= '<style>.knowledgebase-cat-body .vc-faqmanualblocks { '.$newbox_height.' } @media (max-width:767px) { .knowledgebase-cat-body .vc-faqmanualblocks { '.$responsive_newbox_height.' } } .knowledgebase-cat-body .vc-faqmanualblocks a { color:'.((($tag_color != '')?$tag_color:'inherit')).'!important; } .knowledgebase-cat-body .vc-faqmanualblocks a:hover { color:'.$theme_options['manual-global-link-color']['hover'].'!important; } </style>';
						
						if( $faq_column == 4 ) $colmd = 3;
						else if( $faq_column == 3 )  $colmd = 4;
						else if( $faq_column == 2 )  $colmd = 6;
						else $colmd = 3; 
						
						$i = 1;
						$return .= '<div class="row row-eq-height" style="margin: 0px;">';
						while ( $the_query->have_posts() ) : $the_query->the_post();
							
							if( (isset($alternate_bg_color) && $alternate_bg_color != '') && $i % 2 == 0){ 
								$faq_box_bgcolor = $alternate_bg_color; 
							} else { 
								$faq_box_bgcolor = $bg_color; 
							}
							
							$chk_link = get_post_permalink( $post->ID );
							$return .= '<div class="col-md-'.$colmd.' col-sm-12 vc-faqmanualblocks-wrap" >';
							$return .= '<div class="vc-faqmanualblocks" style="background:'.$faq_box_bgcolor.';">';
						    $return .= '<'.$faq_title_tag.' class="title-faq-cat" '.$custom_title_style.'><a href="'.$chk_link.'">'. $post->post_title .'</a></'.$faq_title_tag.'>';         
							$return .= '</div>';
							$return .= '</div>';
							
							if( $faq_column == 4 ) { 
								if($i % 4 == 0) $return .= '</div><div class="row row-eq-height" style="margin: 0px;">'; 
							} else if( $faq_column == 3 ) {
								if($i % 3 == 0) $return .= '</div><div class="row row-eq-height" style="margin: 0px;">'; 
							} else if( $faq_column == 2 ) {
								if($i % 2 == 0) $return .= '</div><div class="row row-eq-height" style="margin: 0px;">'; 
							}
							
						$i++;	
						endwhile;
						$return .= '</div>';
						
					}
					$return .= '</div>';
				}
				
				// pagination here 
				if( $hidepagination == 1 && $page_per_post != '-1') {
					$return .= '<div class="vc_sc_kb_single_cat">
									<ul class="pagination">
										<li class="vc_sc_kb_single_cat_page">'. get_next_posts_link( 'Next Page', $the_query->max_num_pages ).'</li>
										<li class="vc_sc_kb_single_cat_page">'. get_previous_posts_link( 'Previous Page' ).'</li>
									</ul>
								</div>';
				}
				
				wp_reset_postdata(); 
		} // eof else
		}
		}
		return $return;
	}
add_shortcode('manual_theme_single_faq_article', 'manual_theme_single_faq_article');	
}

/**************************************
***  ADD VC SC 16 :: BBPRESS LOGIN  ***
***************************************/
if (!function_exists('theme_maual_bbpress_login')) {
	function theme_maual_bbpress_login($atts, $content = null) {
		
		extract( shortcode_atts( array( 
			"bbpress_login"  => "Login",
			"text_color"  => "",
			"button_bg_color"  => "",
			"button_text_color"  => "",
			"register_link_url"  => "",
			"lost_password_link_url"  => "",
		), $atts ) );
		
		$register_link = (function_exists("vc_build_link") ? vc_build_link($register_link_url) : $register_link_url);
		$lost_password_link = (function_exists("vc_build_link") ? vc_build_link($lost_password_link_url) : $lost_password_link_url);
		
		$return =  '<div class="vc-bbpress-login"><form method="post" action="'. bbp_get_wp_login_action( array( 'context' => 'login_post' ) ).'" class="bbp-login-form">
	<fieldset class="bbp-form">

		<div class="bbp-username">
			<label for="user_login" style="color:'.$text_color.'">'. esc_html__( 'Username', 'manual' ).': </label>
			<input type="text" name="log" value="'. bbp_sanitize_val( 'user_login', 'text' ).'" size="20" id="user_login" />
		</div>

		<div class="bbp-password">
			<label for="user_pass" style="color:'.$text_color.'">'. esc_html__( 'Password', 'manual' ).': </label>
			<input type="password" name="pwd" value="'. bbp_sanitize_val( 'user_pass', 'password' ).'" size="20" id="user_pass" />
		</div>

		<div class="bbp-remember-me">
			<input type="checkbox" name="rememberme" value="forever" '. checked( bbp_get_sanitize_val( 'rememberme', 'checkbox' ) ) .' id="rememberme" />
			<label for="rememberme"  style="color:'.$text_color.'">'. esc_html__( 'Keep me signed in', 'manual' ) .'</label>
		</div>

		'. do_action( 'login_form' ) .'

		<div class="bbp-submit-wrapper">
			<button type="submit" name="user-submit" class="custom-botton" style="background:'.$button_bg_color.';color:'.$button_text_color.'">'. $bbpress_login .'</button>
			'. bbp_user_login_fields() .'
		</div>';
		
		
		if( !empty($register_link['title']) ) {
			$return .= '<div><a href="'.$register_link['url'].'" target="'.$register_link['target'].'" class="more-link hvr-icon-wobble-horizontal">'.$register_link['title'].'</a></div>';
		}
		
		if( !empty($lost_password_link['title']) ) {
			$return .= '<div><a href="'.$lost_password_link['url'].'" target="'.$lost_password_link['target'].'" class="more-link hvr-icon-wobble-horizontal">'.$lost_password_link['title'].'</a></div>';
		}
		
	$return .= '</fieldset>
</form></div>';
		
		return $return;
	}
add_shortcode('theme_maual_bbpress_login', 'theme_maual_bbpress_login');	
}

/*****************************************
***  ADD VC SC 17 :: BBPRESS REGISTER  ***
******************************************/
if (!function_exists('theme_maual_bbpress_register')) {
	function theme_maual_bbpress_register($atts, $content = null) {
		
		extract( shortcode_atts( array( 
			"bbpress_register_msg"  => "Your username must be unique, and cannot be changed later. We use your email address to email you a secure password and verify your account.",
			"text_color"  => "",
			"button_bg_color"  => "",
			"button_text_color"  => "",
		), $atts ) );
		
		$return = '<form method="post" action=" '. bbp_get_wp_login_action( array( 'context' => 'login_post' ) ) .'" class="bbp-login-form">
	<fieldset class="bbp-form">
		<legend>'.esc_html__( 'Create an Account', 'manual' ).'</legend>

		<div class="bbp-register-notice">
			<p style="color:'.$text_color.'">'.$bbpress_register_msg.'</p>
		</div>

		<div class="bbp-username">
			<label for="user_login">'.esc_html__( 'Username', 'manual' ).':</label>
			<input type="text" name="user_login" value="'. bbp_sanitize_val( 'user_login' ).'" size="20" id="user_login" />
		</div>

		<div class="bbp-email">
			<label for="user_email">'.esc_html__( 'Email', 'manual' ).': </label>
			<input type="text" name="user_email" value="'. bbp_sanitize_val( 'user_email' ).'" size="20" id="user_email" />
		</div>

		'. do_action( 'register_form' ) .'

		<div class="bbp-submit-wrapper">
			<button type="submit" name="user-submit" class="custom-botton" style="background:'.$button_bg_color.';color:'.$button_text_color.'">'.esc_html__( 'Register', 'manual' ).'</button>
			'. bbp_user_register_fields() .'

		</div>
	</fieldset>
</form>
';
		
		return $return;
	}
add_shortcode('theme_maual_bbpress_register', 'theme_maual_bbpress_register');	
}

/**********************************************
***  ADD VC SC 18 :: BBPRESS LOST PASSWORD  ***
***********************************************/
if (!function_exists('theme_maual_bbpress_lost_password')) {
	function theme_maual_bbpress_lost_password($atts, $content = null) {
		
		extract( shortcode_atts( array( 
			"button_bg_color"  => "",
			"button_text_color"  => "",
		), $atts ) );
		
		$return = '<form method="post" action="'. bbp_get_wp_login_action( array( 'action' => 'lostpassword', 'context' => 'login_post' ) ) .'" class="bbp-login-form">
		<fieldset class="bbp-form">
			<legend>'.esc_html__( 'Lost Password', 'manual' ).'</legend>
			<div class="bbp-username">
				<p>
					<label for="user_login">'.esc_html__( 'Username or Email', 'manual' ).': </label>
					<input type="text" name="user_login" value="" size="20" id="user_login" />
				</p>
			</div>
			'. do_action( 'login_form', 'resetpass' ) .'
			<div class="bbp-submit-wrapper">
				<button type="submit" name="user-submit" class="custom-botton" style="background:'.$button_bg_color.';color:'.$button_text_color.'">'.esc_html__( 'Reset My Password', 'manual' ).'</button>
				'. bbp_user_lost_pass_fields() .'
			</div>
		</fieldset>
	</form>';
		
		return $return;
	}
add_shortcode('theme_maual_bbpress_lost_password', 'theme_maual_bbpress_lost_password');	
}

/**********************************************
***  ADD VC SC 19 :: PORTFOLIO ITEM WRAP  *****
***********************************************/
if(!function_exists("manual_portfolio_item_frame")){
	function manual_portfolio_item_frame( $atts, $content = null ) {
		extract( shortcode_atts( array( 
			"title"      => "",
			"link"       => "#",
			"portfoio_image"  => "",
			"image_border_shadow"  => "",
			"box_css_animation"  => "",
			"position"  => "",
			"margin"  => "",
		), $atts ) );
		
		if (is_numeric($portfoio_image) && isset($portfoio_image)) {
			$image_src = wp_get_attachment_url($portfoio_image);
		} else {
			$image_src = trailingslashit( get_template_directory_uri() ). 'img/no-portfolio-img.jpg';
		}
		
		$link = (function_exists("vc_build_link") ? vc_build_link($link) : $link);
		if( isset($link['target']) && $link['target'] != ''  ) { 
			$add_parm = 'target="_blank"';
		} else { 
			$add_parm = '';
		}
		
		if( $image_border_shadow == true ) $shadow = "shadow";
		else $shadow = '';
		
		$return = '<div class="portfolio-item-wrap" style="text-align:'.$position.';margin:'.$margin.';"><div class="portfolio-item '.$shadow.' '.$box_css_animation.'">
					<a href="'.$link['url'].'" '.$add_parm.'> <div class="image-wrap"><img src="'.$image_src.'"></div> </a>';
		$return .= '</div></div>';
		
		return $return;
		
	}
add_shortcode('manual_portfolio_item_frame', 'manual_portfolio_item_frame');
}

/********************************
***  ADD VC SC 20 :: BUTTON *****
*********************************/
if(!function_exists("manual_sc_button_url")){
	function manual_sc_button_url( $atts, $content = null ) {
		$text_readjust_padding = $text_readjust_size = $border_bottom = $text_shadow = '';
		extract( shortcode_atts( array( 
			"link"        => "",
			"bottom_margin"  => "",
			"button_css_animation"  => "",
			"link_align"  => "",
			"link_color"  => "",
			"button_color"  => "",
			"text_size"  => "",
			"text_padding"  => "",
			"remove_border_buttom" => "",
			"border_radius" => "",
			"remove_text_shadow" => "",
			"button_hover_color" => "",
		), $atts ) );
		
		if( !empty($text_size) ) $text_readjust_size = 'font-size:'.$text_size.';';
		if( !empty($text_padding) ) $text_readjust_padding = 'padding:'.$text_padding.';';
		
		if( $remove_border_buttom == true ) $border_bottom = "border-bottom:0px;";
		if( $remove_text_shadow == true ) $text_shadow = "text-shadow:none;";
		if( !empty($border_radius) )  $border_radius = 'border-radius:'.$border_radius.';';
		
		$time_start = microtime(true);
		$time_start = explode(".", $time_start);
		$link = (function_exists("vc_build_link") ? vc_build_link($link) : $link);
		if( !empty($link['title']) ) {
			if( empty($link['target']) ) $btm_target = '_parent';
			else $btm_target = $link['target'];
			$return = '<style>a.vc-custom-btm-hover-'.$time_start[1].'{background-color:'.$button_color.'!important;}a.vc-custom-btm-hover-'.$time_start[1].':hover{color:'.($link_color?$link_color:'#fff').'!important;background-color:'.$button_hover_color.'!important;}</style><div style="text-align:'.$link_align.'; margin:'.$bottom_margin.';" class="'.$button_css_animation.'"><a href="'.$link['url'].'" target="'.$btm_target.'" style="text-transform:none;height:auto!important; color:'.$link_color.'!important; '.$text_shadow.' '.$border_radius.' '.$text_readjust_size.' '.$text_readjust_padding.' '.$border_bottom.'" class="custom-botton vc-custom-btm-hover-'.$time_start[1].'" >'.$link['title'].'</a></div>';
		} else {
			$return = '';
		}
		
		return $return;
	}
add_shortcode('manual_sc_button_url', 'manual_sc_button_url');
}

/**************************************************
***  ADD VC SC 21 :: KNOWLEDGE BASE TREE MENU *****
***************************************************/
if(!function_exists("manual__knowledgebase_tree_menu")){
	function manual__knowledgebase_tree_menu( $atts, $content = null ) {
		global $post, $theme_options;
		
		extract( shortcode_atts( array( 
			"title_tag"   => "h6",
			"root_tag_li_padding" => "3px 10px 3px 10px",
			"root_tag_color" => "#f7f7f7",
			"root_tag_border_bottom_color" => "#f7f7f7",
			"kb_no_of_category_records" => "",
			"knowledgebase_category_display_order" => "ASC",
			"knowledgebase_category_display_orderby" => "name",
			"kb_private_category" => "Private Records",
			"knowledgebase_records_display_order" => "ASC",
			"knowledgebase_records_display_orderby" => "date",
			"border_radius" => "5px",
			"completely_hide_private_articles" => 'no',
		), $atts ) );
		
		
		if( isset($root_tag_li_padding) && $root_tag_li_padding != '' ) $root_tag_li_padding = 'padding:'.$root_tag_li_padding.';';
		else $root_tag_li_padding = '';
		
		if( isset($root_tag_color) && $root_tag_color != '' ) $root_tag_color = 'background:'.$root_tag_color.';';
		else $root_tag_color = '';
		
		if( isset($border_radius) && $border_radius != '' ) $border_radius = 'border-radius:'.$border_radius.';';
		else $border_radius = '';
		
		$return = '';
		$return .= '<div class="kb_tree_viewmenu">';
		//list terms in a given taxonomy
		$args = array(
			'hide_empty'    => 1,
			'child_of' 		=> 0,
			'pad_counts' 	=> 1,
			'hierarchical'	=> 1,
			'parent'        => 0,
			'order'         => $knowledgebase_category_display_order,
			'orderby'       => $knowledgebase_category_display_orderby,
			'number'        => $kb_no_of_category_records,
		); 
		$tax_terms = get_terms('manualknowledgebasecat', $args);
		$i = 1;
		/***********************
		***  START MAIN ROOT CATEGORY  ***
		***********************/
		$return .= '<ul class="kb_tree_view_wrap">';
		foreach ($tax_terms as $tax_term) {
			
		// get extra meta value
		$root_cat_login_check = get_option( 'kb_cat_check_login_'.$tax_term->term_id );
		$root_cat_check_user_role = get_option( 'kb_cat_user_role_'.$tax_term->term_id );
		// eof exta meta value	
			
		if( $i == 1 ) { 
			$call_css = 'open-ul-first';
		} else {  
			$call_css = '';	
		}
		$return .= '<li class="root_cat" style="'.$root_tag_li_padding.' '.$root_tag_color.' '.$border_radius.' border-bottom: 1px solid '.$root_tag_border_bottom_color.'; ">';
			// Root Category
			$return .= '<'.$title_tag.'><a rel="'.$tax_term->term_id.'" class="kb-tree-recdisplay '.$call_css.'">';
			$cat_title = $tax_term->name; 
			$return .= html_entity_decode($cat_title, ENT_QUOTES, "UTF-8");
			$return .= '</a></'.$title_tag.'>';
			
			/***********************
			***  CHECK CHILD CATEGORY  ***
			***********************/
			$kb_subcat_args = array(
			  'order'         => $knowledgebase_category_display_order,
			  'orderby'       => $knowledgebase_category_display_orderby,
			  'child_of' => $tax_term->term_id,
			  'parent' => $tax_term->term_id
			);
			$kb_sub_categories = get_terms('manualknowledgebasecat', $kb_subcat_args);
			if ($kb_sub_categories) {
				$return .= '<ul class="kb-tree-chidcat-'.$tax_term->term_id.' kb_tree_chid_cat_wrap close_record">'; // hide
				foreach($kb_sub_categories as $kb_sub_category_list) {
					
					// get extra meta value
					$root_subcat_login_check = get_option( 'kb_cat_check_login_'.$kb_sub_category_list->term_id );
					$root_subcat_check_user_role = get_option( 'kb_cat_user_role_'.$kb_sub_category_list->term_id );
					// eof exta meta value	
					
					$return .= '<li class="root_cat_child">';
					$subcat_title = $kb_sub_category_list->name; 
					$return .= '<'.$title_tag.'><a rel="'.$kb_sub_category_list->term_id.'" class="kb-tree-recdisplay">';
					$return .= html_entity_decode($subcat_title, ENT_QUOTES, "UTF-8");
					$return .= '</a></'.$title_tag.'>';
						/***********************
						***  DISPLAY RECORDS  ***
						***********************/
						$kb_childargs_list = array( 
							'post_type'  => 'manual_kb',
							'order'  => $knowledgebase_records_display_order,
							'orderby' => $knowledgebase_records_display_orderby,
							'tax_query' => array(
								array(
									'taxonomy' => 'manualknowledgebasecat',
									'field' => 'id',
									'include_children' => false,
									'terms' => $kb_sub_category_list->term_id
								)
							)
						);
						$kb_childposts = get_posts( $kb_childargs_list );
						$return .= '<ul class="kb-tree-records-'.$kb_sub_category_list->term_id.' tree_child_records close_record">';
						
						// check login 
						if( isset($root_subcat_login_check) && $root_subcat_login_check == true && !is_user_logged_in() ) {
							$return .='<li class="kb_tree_title" style="color:red;">'.$kb_private_category.'</li>';
						} else {
						/**************************************
						** Check USER ROLE AFTER USER LOGIN**
						***************************************/
						$access_status_subcat = manual_doc_access($root_subcat_check_user_role);
						if( $root_subcat_login_check == 1 && is_user_logged_in() && $access_status_subcat == false ) { 
							$return .= '<li class="kb_tree_title" style="color:red;">';
							$return .= esc_html('No sufficent user permission');
							$return .= '</li>';
						} else {
							foreach( $kb_childposts as $kbchildpost ) {
								
								// control article access 
								$childkb_access_status = true;
								if( $completely_hide_private_articles == 'yes' ) {
									$childkb_article_access_meta = get_post_meta( $kbchildpost->ID, 'doc_single_article_access', true );
									$childkb_article_check_post_user_level_access = get_post_meta( $kbchildpost->ID, 'doc_single_article_user_access', true );
									if( isset($childkb_article_access_meta['login']) && $childkb_article_access_meta['login'] == 1 && !is_user_logged_in() ) {
										$childkb_access_status = false;
									} else {
										if( !empty($childkb_article_check_post_user_level_access) ) {
											$childkb_access_status = manual_doc_access(serialize($childkb_article_check_post_user_level_access));
										} else { 
											$childkb_access_status = true;
										}
									}
								}
								// eof control article access
								
								if( $childkb_access_status == true ) {
									$return .='<li class="kb_tree_title">';
									$return .='<a href="'.get_permalink($kbchildpost->ID).'" class="kb_tree_title">';
									$return .= html_entity_decode($kbchildpost->post_title, ENT_QUOTES, "UTF-8");
									$return .='</a>';
									$return .='</li>';
								}
								
								
							}
						}
						}
						$return .= '</ul>';
						/***********************
						***  EOF DISPLAY RECORDS  ***
						***********************/
					$return .= '</li>';
				}
				$return .= '</ul>';
			}
			/***********************
			***  EOF CHILD CATEGORY  ***
			***********************/
			
			/***********************
			***  DISPLAY ROOT RECORDS  ***
			***********************/
				$kbroot_args = array(
					'post_type' => 'manual_kb',
					'order'  => $knowledgebase_records_display_order,
					'orderby' => $knowledgebase_records_display_orderby,
					'posts_per_page' => '-1',
					'tax_query' => array(
							array(
								'taxonomy' => 'manualknowledgebasecat',
								'field' => 'id',
								'include_children' => false,
								'terms' => $tax_term->term_id
								)
							),
				);
				$kb_rootposts = get_posts( $kbroot_args );
				$return .= '<ul class="kb-tree-records-'.$tax_term->term_id.' kbroot_cat_records close_record">';
					// check login 
					if( isset($root_cat_login_check) && $root_cat_login_check == true && !is_user_logged_in() ) {
						$return .='<li class="kb_tree_title" style="color:red;">'.$kb_private_category.'</li>';
					} else {
						/**************************************
						** Check USER ROLE AFTER USER LOGIN**
						***************************************/
						$access_status = manual_doc_access($root_cat_check_user_role);
						if( $root_cat_login_check == 1 && is_user_logged_in() && $access_status == false ) { 
							$return .= '<li class="kb_tree_title" style="color:red;">';
							$return .= esc_html('No sufficent user permission');
							$return .= '</li>';
						} else {
							foreach( $kb_rootposts as $kbpost_list ) {
								
								// control article access 
								$access_status = true;
								if( $completely_hide_private_articles == 'yes' ) {
									 $article_access_meta = get_post_meta( $kbpost_list->ID, 'doc_single_article_access', true );
									 $article_check_post_user_level_access = get_post_meta( $kbpost_list->ID, 'doc_single_article_user_access', true );
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
								// eof control article access
								
								if( $access_status == true ) {
									$return .='<li class="kb_tree_title">';
									$return .='<a href="'.get_permalink($kbpost_list->ID).'" >';
									$return .= html_entity_decode($kbpost_list->post_title, ENT_QUOTES, "UTF-8");
									$return .='</a>';
									$return .='</li>';
								}
								
							}
						}
					}
				$return .= '</ul>';
			/***********************
			*** EOF DISPLAY ROOT RECORDS  ***
			***********************/
			
		$return .= '</li>';
		$i++;
		}
		$return .= '</ul>';
		/***********************
		***  EOF MAIN ROOT CATEGORY  ***
		***********************/
		wp_reset_postdata();
		$return .= '</div>';
		return $return;
	}
add_shortcode('manual__knowledgebase_tree_menu', 'manual__knowledgebase_tree_menu');
}


/**************************************************
***  ADD VC SC 22 :: POST TYPE CAT LANDING  *****
***************************************************/
if(!function_exists("manual__theme_kb_catlanding_style")){
	function manual__theme_kb_catlanding_style( $atts, $content = null ) {
		global $theme_options;	

		extract( shortcode_atts( array( 
			"manual_theme_post_type" => "manual_kb",						   
			"knowledgebase_style_type" => "1",
			"knowledgebase_style_type_display_order" => "ASC",
			"knowledgebase_style_type_display_orderby" => "date",
			"title_tag" => "h5",
			"total_article_count" => "no",
			"border_color" => "",
			"article_count_box_title" => 'articles in this collection',
			"icon_color" => '#818A97',
			"kb_private_categpry" => 'Private Category',
			"kb_private_category_text_color" => '#F13C2A',
			"exclude_kb_category" => '',
			"exclude_doc_category" => '',
			"kb_no_ofrecords" => "0",
			"disable_description" => "no",
			"icon_size" => "",
			"default_icon_code" => "icon_documents_alt",
			"limit_description_char" => "",
			"background_color" => '#ffffff',
			"border_radius" => '4px',
			"total_article_count_style" => '1',
			"total_article_count_style1_text" => 'Written by',
			"kb_writtenby_text_color" => '#8d8d8d',
			"landing_style_type2_column" => '6',
			"box_height" => '',
			"text_box_align" => '',
			'box_padding' => '',
			'alternate_background_color' => '',
			'private_cat_alert_msg' => 'no'
		), $atts ) );
		
		$return = '';
		
		/*****************************
		*** CONTROL THEME POST TYPE **
		******************************/
		if( $manual_theme_post_type == 'manual_documentation' ) {
			// Documentation
			$manual_post_type_category_name = 'manualdocumentationcategory';
			$manual_post_type_category_exclude = $exclude_doc_category;
		} else {
			// Knowledgebase 
			$manual_post_type_category_name = 'manualknowledgebasecat';
			$manual_post_type_category_exclude = $exclude_kb_category;
		}
		// END
		
		// args
		$args = array(
			'hide_empty'    => 1,
			'child_of' 		=> 0,
			'pad_counts' 	=> 1,
			'hierarchical'	=> 1,
			'order'         => $knowledgebase_style_type_display_order,
			'orderby'       => $knowledgebase_style_type_display_orderby,
			'exclude'       => $manual_post_type_category_exclude,
			'number'        => $kb_no_ofrecords,
		); 
		
		$tax_terms = get_terms($manual_post_type_category_name, $args);
		$tax_terms = wp_list_filter($tax_terms,array('parent'=>0));
		
		if( $knowledgebase_style_type == 1 ) {
			
			if( isset($border_color) && $border_color != '' ) $border_color = $border_color;
			else $border_color = '#d4dadf';
			
			if( isset($icon_size) && $icon_size != '' ) $icon_size = $icon_size;
			else $icon_size = '55px';
			
			
			$i = 1;
	        foreach ($tax_terms as $tax_term) {
			// get extra meta value
			if( $manual_theme_post_type == 'manual_documentation' ) { 
				$icon_name = get_option( 'doc_cat_icon_name_'.$tax_term->term_id ); 
				$login_check = get_option( 'doc_cat_check_login_'.$tax_term->term_id );
			} else {
				$icon_name = get_option( 'kb_cat_icon_name_'.$tax_term->term_id );
				$login_check = get_option( 'kb_cat_check_login_'.$tax_term->term_id ); 
			}
			
			if( isset($icon_name) && $icon_name != '' ) { $icon_name = $icon_name;
			} else { $icon_name = $default_icon_code; }
			// eof exta meta value
			
			$return .= '<div class="kb_style1_box"> <div class="wrap_kbstyle" style="border: 1px solid '.$border_color.';background:'.$background_color.';border-radius:'.$border_radius.';">';
			if( isset($login_check) && $login_check == true ) { 
				if ( !is_user_logged_in() && $private_cat_alert_msg == 'no' ) {
					$return .= '<div class="private-kb-cat"><i class="fas fa-lock" style="color:'.$kb_private_category_text_color.';"></i>&nbsp; '.$kb_private_categpry.'</div>';
				}
			}
			$return .= '<div class="wrap_stylekb">
								<!--icon or image-->
								<div class="icon_image_kbstyle">';
			if( isset($icon_name) && $icon_name != '' ) $return .= '<i class="'.$icon_name.'" style="color:'.$icon_color.';font-size:'.$icon_size.';"></i>';
			$return .= '</div>
								<!--Content-->';
			$return .= '<div class="kbcontent">';
			$return .= '<'.$title_tag.'><a href="'.esc_attr(get_term_link($tax_term, $manual_post_type_category_name)).'">';
			$cat_title = $tax_term->name;
			$return .= html_entity_decode($cat_title, ENT_QUOTES, "UTF-8");
			$return .= '</a></'.$title_tag.'>';
			if( $disable_description == 'no' ) { 
				if( isset($limit_description_char) && $limit_description_char != '' ) {
					$return .= '<p>'.  mb_strimwidth(esc_attr($tax_term->description), 0, $limit_description_char, "...").'</p>';
				} else {
					$return .= '<p>'.esc_attr($tax_term->description).'</p>';
				}
			}
			
			if( $total_article_count == 'no' && $total_article_count_style == 2 ) {
			$return .= '<div style="padding:5px 0px;"> <a href="'. esc_attr(get_term_link($tax_term, $manual_post_type_category_name)).'" class="custom-link hvr-icon-wobble-horizontal" style="font-weight:inherit;">
               '. $tax_term->count .'&nbsp; '.esc_attr($article_count_box_title).' </a></div>';
			}
			
			// User Avator
			if( $total_article_count == 'no' && $total_article_count_style == 1 ) {
				$authors = manual__get_authors_in_category($tax_term->term_id, $manual_theme_post_type, $manual_post_type_category_name);
				$return .= '<div class="vckbpostauthors">
							<ul>';
				foreach ( $authors as $key=>$val ) {
				  $return .= '<li><img src=" '.$val.' " ></li>';
				}
				$return .= '</ul>
							<div class="item-info" style="color:'.$kb_writtenby_text_color.';"><a href="'. esc_attr(get_term_link($tax_term, $manual_post_type_category_name)).'" class="custom-link"> '. $tax_term->count .'&nbsp; '.esc_attr($article_count_box_title).'</a> <br> <span class="vc_wrriten_by_text">'.$total_article_count_style1_text.'</span><span class="kb_post_article_username">&nbsp;';
				
				$author_count = count($authors);
				foreach ( $authors as $key=>$val ) {
				 if( $author_count  > 1 ) $comma = ',';
				 else $comma = '';
				 $return .= $key.''.$comma.'&nbsp;</span>';
				}			
							
				$return .= '</div>
						</div>';  
			}
			// Eof User Avator
			
			$return .= '</div>
							</div>
						</div></div>';
						
			}
		} else if( $knowledgebase_style_type == 2 ) {
			
			// Text align 
			if( $text_box_align == 2 ) {
				$class_flex = 'noflex';
				$class_mediafigure_fix = 'fix';
				$class_private = 'fix left';
			} else if( $text_box_align == 3 ) {
				$class_flex = 'noflex center';
				$class_mediafigure_fix = 'fix';
				$class_private = 'fix';
			} else {
				$class_flex = 'flex';
				$class_mediafigure_fix = '';
				$class_private = '';
			}
			// Eof text align
			
			if( isset($border_color) && $border_color != '' ) $border_color = $border_color;
			else $border_color = '#ededed';
			
			if( isset($icon_size) && $icon_size != '' ) $icon_size = $icon_size;
			else $icon_size = '45px';
			
			// FIX ROW
			$return .= '<div class="row-eq-height">';
			// EOF FIX ROW
			
			$j = 1;
	        foreach ($tax_terms as $tax_term) {
				
			// get extra meta value
			if( $manual_theme_post_type == 'manual_documentation' ) { 
				$icon_name = get_option( 'doc_cat_icon_name_'.$tax_term->term_id );
				$login_check = get_option( 'doc_cat_check_login_'.$tax_term->term_id );
			} else {
				$icon_name = get_option( 'kb_cat_icon_name_'.$tax_term->term_id );
				$login_check = get_option( 'kb_cat_check_login_'.$tax_term->term_id ); 
			}
			
			if( isset($icon_name) && $icon_name != '' ) { $icon_name = $icon_name;
			} else { $icon_name = $default_icon_code; }
			// eof exta meta value
			
			if( isset($box_padding) && $box_padding != '' ) $replace_box_padding = 'padding:'.$box_padding.';';
			else $replace_box_padding = '';
			
			 if( (isset($alternate_background_color) && $alternate_background_color != '') && $j % 2 == 0){ $alternate_bgcolor = $alternate_background_color; 
			 } else { $alternate_bgcolor = $background_color; }
			
			$return .= '<div class="col-md-'.$landing_style_type2_column.' col-sm-12 KbCategory__box_layout2" ><div class="KbCategory__box_layout2__boxInner" style="border: 1px solid '.$border_color.';background:'.$alternate_bgcolor.';border-radius:'.$border_radius.';height:'.( (isset($box_height) && $box_height!= '')?$box_height:'auto' ).'; '.$replace_box_padding.'">';
			$return .= '<div class="'.$class_flex.'">';
			$return .= '<div class="mediaFigure '.$class_mediafigure_fix.'">';
			if( isset($icon_name) && $icon_name != '' ) $return .= '<i class="'.$icon_name.'" style="color:'.$icon_color.';font-size:'.$icon_size.';"></i>';
			$return .= '</div>';
			
			$return .= '<div class="mediaContent">';
			if( isset($login_check) && $login_check == true ) { 
				if ( !is_user_logged_in() && $private_cat_alert_msg == 'no' ) {
					$return .= '<div class="private-kb-cat '.$class_private.'"><i class="fas fa-lock" style="color:'.$kb_private_category_text_color.';"></i>&nbsp; '.$kb_private_categpry.'</div>';
				}
			}
			$return .= '<'.$title_tag.'><a href="'.esc_attr(get_term_link($tax_term, $manual_post_type_category_name)).'">';
			$cat_title = $tax_term->name;
			$return .= html_entity_decode($cat_title, ENT_QUOTES, "UTF-8");
			$return .= '</a></'.$title_tag.'>';
			
			if( $disable_description == 'no' ) { 
				if( isset($limit_description_char) && $limit_description_char != '' ) {
					$return .= '<p>'.  mb_strimwidth(esc_attr($tax_term->description), 0, $limit_description_char, "...").'</p>';
				} else {
					$return .= '<p>'.esc_attr($tax_term->description).'</p>';
				}
			}
			
			if( $total_article_count == 'no' && $total_article_count_style == 2 ) {
			$return .= '<div style="padding:5px 0px;"> <a href="'. esc_attr(get_term_link($tax_term, $manual_post_type_category_name)).'" class="custom-link hvr-icon-wobble-horizontal" style="font-weight:inherit;">
               '. $tax_term->count .'&nbsp; '.esc_attr($article_count_box_title).' </a></div>';
			}
			
			// User Avator
			if( $total_article_count == 'no' && $total_article_count_style == 1 ) {
				$authors = manual__get_authors_in_category($tax_term->term_id, $manual_theme_post_type, $manual_post_type_category_name);
				$return .= '<div class="vckbpostauthors">
							<ul>';
				foreach ( $authors as $key=>$val ) {
				  $return .= '<li><img src=" '.$val.' " ></li>';
				}
				$return .= '</ul>
							<div class="item-info" style="color:'.$kb_writtenby_text_color.';"><a href="'. esc_attr(get_term_link($tax_term, $manual_post_type_category_name)).'" class="custom-link"> '. $tax_term->count .'&nbsp; '.esc_attr($article_count_box_title).'</a> <br> <span class="vc_wrriten_by_text">'.$total_article_count_style1_text.'</span><span class="kb_post_article_username">&nbsp;';
				
				$author_count = count($authors);
				foreach ( $authors as $key=>$val ) {
				 if( $author_count  > 1 ) $comma = ',';
				 else $comma = '';
				 $return .= $key.''.$comma.'&nbsp;</span>';
				}			
							
				$return .= '</div>
						</div>';  
			}
			// Eof User Avator
			
			$return .= '</div>';
			$return .= '</div> </div> </div>';
						
			// FIX ROW	
			if( $landing_style_type2_column == 4 ) {
				if($j % 3 == 0) $return .= ' </div><div class="row-eq-height">';  // control every 3 loop
			} else {
				if($j % 2 == 0) $return .= ' </div><div class="row-eq-height">';  // control every 2 loop
			}
			// EOF FIX ROW
						
			$j++;			
			}
			
			$return .= '</div>';
			
		} // eof else
	
		return $return;
	}
add_shortcode('manual__theme_kb_catlanding_style', 'manual__theme_kb_catlanding_style');
}


/************************************************
***  ADD VC SC 23 :: DOCUMENTATION ARTICLES *****
*************************************************/
if(!function_exists("manual_theme_documentation_article")){
	function manual_theme_documentation_article( $atts, $content = null ) {
		global $post, $wpdb;
		extract( shortcode_atts( array( 
			"documentation_article_display_type"   => "1",
			"documentation_article_numbers"   => "6",
			"documentation_article_order_asc_dsc"   => "DESC",
			"documentation_title_tag"   => "h4",
			"documentation_column" => "3",
			"documentation_excerpt_content" => "yes",
			"documentation_excerpt_content_wordlength" => "15",
			"box_bg_color" => '#f1f1f1',
			"box_border_btm_color" => '#efefef',
		), $atts ) );
		
		$return = $args = '';
		if( $documentation_article_display_type == 1 ) { // Latest Article
			$args = array( 
				'posts_per_page' => $documentation_article_numbers, 
				'post_type'  => 'manual_documentation',
				'orderby' => 'date',
				'order'	=>	$documentation_article_order_asc_dsc,
			);
			
		} else if( $documentation_article_display_type == 2 ) { // Popular Article
			$args = array( 
				'posts_per_page' => $documentation_article_numbers, 
				'post_type'  => 'manual_documentation',
				'orderby' => 'meta_value_num',
				'order'	=>	$documentation_article_order_asc_dsc,
				'meta_key' => 'manual_post_visitors'
			);
			
		} else if( $documentation_article_display_type == 3 ) { // Top Rated Article
			$args = array( 
				'posts_per_page' => $documentation_article_numbers, 
				'post_type'  => 'manual_documentation',
				'orderby' => 'meta_value_num',
				'order'	=>	$documentation_article_order_asc_dsc,
				'meta_key' => 'votes_count_doc_manual'
			);
			
		} else if( $documentation_article_display_type == 4 ) { // Most Commented Article
			$args = array( 
				'posts_per_page' => $documentation_article_numbers, 
				'post_type'  => 'manual_documentation',
				'orderby' => 'comment_count',
				'order'	=>	$documentation_article_order_asc_dsc,
			);
						
		} else if( $documentation_article_display_type == 5 ) { // Recently Updated Article
			$args = array( 
				'posts_per_page' => $documentation_article_numbers, 
				'post_type'  => 'manual_documentation',
				'orderby' => 'modified',
				'order'	=>	$documentation_article_order_asc_dsc,
			);
						
		} else { // Default latest
			$args = array( 
				'posts_per_page' => $documentation_article_numbers, 
				'post_type'  => 'manual_documentation',
				'orderby' => 'date',
				'order'	=>	$documentation_article_order,
			);
		}
		
		// Columns
		if( $documentation_column == 4 ) $colmd = 3;
		else if( $documentation_column == 3 )  $colmd = 4;
		else if( $documentation_column == 2 )  $colmd = 6;
		else $colmd = 3; 
		
		$i = 1;
		$return .= '<div class="row row-eq-height" style="margin: 0px;">';
			$the_query = new WP_Query($args);
			if ($the_query->have_posts()) : 
			while ($the_query->have_posts()) : $the_query->the_post();
			
				$chk_link = get_post_permalink( $post->ID );
				$return .= '<div class="col-md-'.$colmd.' col-sm-12 vc-manualfaq-blocks hvr-bob" style="background:'.$box_bg_color.'; border-bottom-color:'.$box_border_btm_color.';">';
				$return .= '<'.$documentation_title_tag.' class="title-faq-cat"><a href="'.$chk_link.'">'. $post->post_title .'</a></'.$documentation_title_tag.'>';
				if( $documentation_excerpt_content == 'yes' ) {
					$return .= '<p>'.manual__get_excerpt_trim($documentation_excerpt_content_wordlength,'..').'</p>';
				}
				
				$return .= '</div>';
				
				if( $documentation_column == 4 ) { 
					if($i % 4 == 0) $return .= '</div><div class="row row-eq-height" style="margin: 0px;">'; 
				} else if( $documentation_column == 3 ) {
					if($i % 3 == 0) $return .= '</div><div class="row row-eq-height" style="margin: 0px;">'; 
				} else if( $documentation_column == 2 ) {
					if($i % 2 == 0) $return .= '</div><div class="row row-eq-height" style="margin: 0px;">'; 
				} else {
					if($i % 4 == 0) $return .= '</div><div class="row row-eq-height" style="margin: 0px;">';
				}
					
			$i++;		
			endwhile; 
			endif;
		$return .= '</div>';
		
		wp_reset_postdata();
		
		return $return;
	}
add_shortcode('manual_theme_documentation_article', 'manual_theme_documentation_article');	
}


/***********************************
***    ADD VC SC 24 :: LOGIN     ***
************************************/
if(!function_exists("manual_theme__login_box")){
	function manual_theme__login_box( $atts, $content = null ) {
		
		extract( shortcode_atts( array( 
			"custom_login_message"  => "Login",
			"custom_loggedin_message"  => "You are loggedin",
			"custom_logout_text" => "Logout",
			"custom_lostpassword_text" => "Lost Password",
			"custom_register_text" => "Register now",
			"custom_no_member_register_text" => "Not a member yet?",
		), $atts ) );
		
		$return = '';
		if( is_user_logged_in() ) {
			$return .= '<div class="manual_login_page"> <div class="custom_login_form">';
			$return .= '<h4>'.$custom_loggedin_message.'</h4>';
			$return .= '<p><a href="'.esc_url(wp_logout_url()).'" class="more-link hvr-icon-wobble-horizontal">'.$custom_logout_text.' &nbsp;<i class="fa fa-arrow-right hvr-icon"></i></a>';
			$return .= '</p></div></div>';
		} else {
			$return .= '<div><div class="manual_login_page"><div class="custom_login_form">';
			$return .= '<h4>'.esc_html($custom_login_message).'</h4>';
			$args = array(
				'echo' => false,
			);
			$return .= wp_login_form($args);
			$return .= '<ul class="custom_register">';
			$return .= '<li><a href=" '.wp_lostpassword_url().'" title="Lost Password" class="more-link hvr-icon-wobble-horizontal margin-15">';
			$return .= $custom_lostpassword_text;
			$return .= ' &nbsp;&nbsp;<i class="fa fa-arrow-right hvr-icon"></i> </a></li>';
			
			$registration_enabled = get_option( 'users_can_register' );
			if ( $registration_enabled ) {
				$return .= '<li>' . $custom_no_member_register_text . ' <a href="'. esc_attr(wp_registration_url()).'" class="more-link">' . $custom_register_text . '</a></li>';
			}
			
			$return .= '</ul>';
		    $return .= '</div></div></div>';
		}
		
		return $return;
	}
add_shortcode('manual_theme__login_box', 'manual_theme__login_box');	
}

/***********************************************************
***    ADD VC SC 25 :: POST TYPE COUNT POST/CATEGORY     ***
************************************************************/
if(!function_exists("manual_theme__postype_count_post_category")){
	function manual_theme__postype_count_post_category( $atts, $content = null ) {
		
		extract( shortcode_atts( array( 
			"manual_post_type"  => "manual_kb",
			"title_tag"  => "h4",
			"link" => '',
			"custom_article_name" => 'Articles',
			"custom_category_name" => 'Categories',
			"custom_post_type_name" => '',
			"custom_bbpress_topic_name" => 'Topic',
			"custom_bbpress_posts_name" => 'Posts',
			"icon" => 'icon_folder-alt',
			"text_align" => '1',
			"icon_size" => '40px',
			"icon_margin_right" => '20px',
			"icon_color" => '',
			"box_padding" => '0px',
			"box_bg_color" => '',
			"box_css_animation" => '',
		), $atts ) );
		$link = (function_exists("vc_build_link") ? vc_build_link($link) : $link);
		
		$return = '';
		
		if( $manual_post_type == 'manual_kb' ) $post_typecat = 'manualknowledgebasecat';
		else if( $manual_post_type == 'manual_documentation' ) $post_typecat = 'manualdocumentationcategory';
		else if( $manual_post_type == 'manual_faq' ) $post_typecat = 'manualfaqcategory';
		else if( $manual_post_type == 'bbpress' ) $post_typecat = '';
		else if( $manual_post_type == 'post' ) $post_typecat = 'category';
		
		// Post Type: Name + post count + category count
		$post_count = $category_count = $title_name = '';
		
		if( $manual_post_type == 'bbpress' ) { 
		
			$custom_article_name = $custom_bbpress_topic_name;
			$custom_category_name = $custom_bbpress_posts_name;
		
			if( isset($custom_post_type_name) && $custom_post_type_name != '' ) {
				$title_name = $custom_post_type_name;
			} else {
				$title_name = esc_html( 'Forums', 'manual' );
			}
			
			// only if class exist
			if (class_exists( 'bbPress' )) {
				// Get forum topcs counts
				$post_count = wp_count_posts('topic');
				$post_count = $post_count->publish;
				// Get forum post counts
				$category_count = wp_count_posts('reply');
				$category_count = $category_count->publish;
			}
		
		} else {
			
			// post name
			$postype_name = get_post_type_object( $manual_post_type );
			if( isset($custom_post_type_name) && $custom_post_type_name != '' ) {
				$title_name = $custom_post_type_name;
			} else {
				$title_name = $postype_name->labels->singular_name;
			}
			
			// Get - post counts
			$post_count = wp_count_posts($manual_post_type);
			$post_count = $post_count->publish;
			
			// Get - category counts
			$category_count = get_terms($post_typecat);
			if ( !is_wp_error( $category_count ) ) {
				$category_count = count($category_count);
			} else {
				$category_count = 0;
			}
			
		}
		
		// background 
		if( isset($box_bg_color) && $box_bg_color != '' ) $boxbgcolor = 'background:'.$box_bg_color.';';
		else $boxbgcolor = '';
		
		// Text align
		$icon_float = $count_block_align = $icon_margin = $icon_padding_top_fix = '';
		if( $text_align == 1 ) { 
			$icon_float = 'float: left;';
			$icon_margin = 'margin:0  '.$icon_margin_right.' 20px 0px;';
		} else if( $text_align == 2 ) { 
			$icon_float = '';
			$icon_margin = 'margin:0px';
		} else if( $text_align == 3 ) { 
			$count_block_align = 'text-align: center;';
			$icon_margin = 'margin:0px';
		} else if( $text_align == 4 ) { 
			$count_block_align = 'text-align: right;';
			$icon_margin = 'margin:0px';
		}
		
		if( isset($box_css_animation) && $box_css_animation != '' && $text_align == 1 ) $icon_padding_top_fix = 'padding-top: 10px;';
		
		if( $link['url'] != '' ) $return .= '<a href="'.$link['url'].'" target="'.$link['target'].'">';
	    $return .= '<div class="postype_recods_count_block '.$box_css_animation.'" style="width: 100%; padding:'.$box_padding.'; '.$boxbgcolor.' '.$count_block_align.'" > 
					   <i class="'.$icon.'" style=" '.$icon_padding_top_fix.' '.$icon_float.' font-size:'.$icon_size.'; '.$icon_margin.' color:'.$icon_color.'; "></i>
					   <'.$title_tag.'>'.$title_name.'</'.$title_tag.'>
					   <p>'.esc_html($post_count).' '.esc_html($custom_article_name).'  /  '.esc_html($category_count).' '.esc_html($custom_category_name).'</p>
				   </div>'; 
		if( $link['url'] != '' ) $return .= '</a>';
				   
		return $return;
	}
add_shortcode('manual_theme__postype_count_post_category', 'manual_theme__postype_count_post_category');	
}


/*****************************************
***    ADD VC SC 26 :: MESSAGE BOX   ***
******************************************/
if(!function_exists("manual__sc_message_box")){
	function manual__sc_message_box( $atts, $content = null ) {
		$title_text_replace_color = $short_message_text_replace_color = $title_text_replace_weight  = $short_message_text_replace_weight = $title_text_replace_font_size = $short_message_replace_text_font_size = $button_text_replace_color = $button_bg_replace_color = $message_box_border_replace_color = $button_replace_margin_top = $margin_right =$message_box_background_replace_color = '';
		extract( shortcode_atts( array( 
			"message_box_border"    => "",
			"message_box_background_color"    => "",
			"message_box_border_color"    => "",
			"title_text"    => "",
			"title_text_color"  => "",
			"title_text_weight" => "",
			"title_text_font_size" => "",
			"short_message_text"  => "",
			"short_message_text_color"  => "",
			"short_message_text_weight"  => "",
			"short_message_text_font_size"  => "",
			"link" => "",
			"button_text_color" => "",
			"button_bg_color" => "",
			"button_margin_top" => "",
			"title_tag" => "h3",
		), $atts ) );
		
		$time_start = microtime(true);
		$time_start = explode(".", $time_start);
		
		if( !empty($message_box_border) && $message_box_border == 'yes' ) {
			$border_status = '';
			$border_padding = '';
			if( !empty($message_box_border_color) ) $message_box_border_replace_color = 'border:1px solid'.$message_box_border_color.'!important;';
		} else {
			$border_status = 'border:none;';
			$border_padding = 'padding:0px;';
		}
		
		if( !empty($message_box_background_color) ) $message_box_background_replace_color = 'background:'.$message_box_background_color.';';
		if( !empty($title_text_font_size) ) $title_text_replace_font_size = 'font-size:'.$title_text_font_size.'!important;';
		if( !empty($title_text_weight) ) $title_text_replace_weight = 'font-weight:'.$title_text_weight.'!important;';
		if( !empty($title_text_color) ) $title_text_replace_color = 'color:'.$title_text_color.'!important;';
		if( !empty($short_message_text_color) ) $short_message_text_replace_color = 'color:'.$short_message_text_color.'!important;';
		if( !empty($short_message_text_weight) ) $short_message_text_replace_weight = 'font-weight:'.$short_message_text_weight.'!important;';
		if( !empty($short_message_text_font_size) ) $short_message_replace_text_font_size = 'font-size:'.$short_message_text_font_size.'!important;';
		$link = (function_exists("vc_build_link") ? vc_build_link($link) : $link);
		if( !empty($button_text_color) ) $button_text_replace_color = 'color:'.$button_text_color.'!important;';
		if( !empty($button_bg_color) ) $button_bg_replace_color = 'background-color:'.$button_bg_color.';';
		if( !empty($button_margin_top) ) $button_replace_margin_top = 'margin-top:'.$button_margin_top.'!important;';
		
		$return =  '<div class="promo" style="'.$border_status.' '.$message_box_border_replace_color.' '.$border_padding.' '.$message_box_background_replace_color.'">';
		
		if( !empty($title_text) ) {	
		if( empty($link['title']) ) $margin_right = 'margin-right:0px!important;';
		$return .= '<'.$title_tag.' style="'.$title_text_replace_color.' '.$title_text_replace_weight.' '.$title_text_replace_font_size.' '.$margin_right.' ">'.$title_text.'</'.$title_tag.'>';
		}
		
		if( !empty($short_message_text) ) {			
		$return .= '<p style="'.$short_message_text_replace_color.' '.$short_message_text_replace_weight.' '.$short_message_replace_text_font_size.'">'.$short_message_text.'</p>';
		} 
		
		if( !empty($link['title']) ) {
			
		if( empty($link['target']) ) $link_target = '_parent';
		else $link_target = $link['target'];
		
		echo '<style>.vc_btm_color_'.$time_start[1].' { '.$button_bg_replace_color.' }</style>';
					
		$return .= '<a href="'.$link['url'].'" target="'.$link_target.'" class="custom-botton vc_btm_color_'.$time_start[1].'" style="'.$button_text_replace_color.' '.$button_replace_margin_top.'">'.$link['title'].'</a>';
		}
		
		$return .= '</div>';
		
		return $return;
	}
add_shortcode('manual__sc_message_box', 'manual__sc_message_box');	
}


/*****************************************
***    ADD VC SC 27 :: MESSAGE BOX   ***
******************************************/
if(!function_exists("manual__search_box")){
	function manual__search_box( $atts, $content = null ) {
		extract( shortcode_atts( array( 
			"placeholder_text"  => "Search...",
		), $atts ) );
		
		$return = '<div class="vc_manual__search_wrap">';
		$return .= manual__inlinesearch_form($placeholder_text,'');
		$return .= '</div>';

		return $return;
	}
add_shortcode('manual__search_box', 'manual__search_box');	
}


if ( class_exists('LearnPress') ) {
	/***************************************
	***    ADD VC SC 28 :: LEARNPRESS   ***
	****************************************/
	if(!function_exists("manual__learnpress_course")){
		function manual__learnpress_course( $atts, $content = null ) {
			extract( shortcode_atts( array( 
				"layout"      => "1",
				"column"      => "4",
				"limit"       => "8",
				"title_tag"   => "h5",
				"order"       => "DESC",
				"orderby"     => "date",
				"cat_id"      => "",
				"course_tag"  => "h5",
			), $atts ) );
			
			if( $column == 2 ) $column_change = '6';
			else if( $column == 4 ) $column_change = '3';
			else if( $column == 3 ) $column_change = '4';
			
			if( $layout == 1 ) {
				$masonry_grid = 'masonry-grid';
				$masonry_item = 'masonry-item';
				$masonry_wrap = 'masonry-wrap';
			} else { 
				$masonry_grid = '';
				$masonry_item = 'fitrows';
				$masonry_wrap = '';
			}
			
			$return = '';
			$return .= '<div class="manual-course-wrapper '.$masonry_wrap.'">';
			
			if( $layout == 1 ) {
				$return .= '<div class="'.$masonry_grid.'">';
			} else {
				$return .= '<div class="row row-eq-height">'; 
			}
			
			if( isset($cat_id) && $cat_id != ''  && $cat_id != 'all' ) {
				$cat_id = $cat_id;
				$array_assign = array(
									array(
										'taxonomy' => 'course_category',
										'field' => 'term_id',
										'include_children' => true,
										'terms' => $cat_id,
									)
								);
			} else { 
				$array_assign = '';
			}
			
			$condition = array(
				'post_type'           => 'lp_course',
				'posts_per_page'      => $limit,
				'orderby'             => 'menu_order',
				'post_status'         => 'publish',
				'ignore_sticky_posts' => true,
				'order'  => $order,
				'orderby'  => $orderby,
				'tax_query' => $array_assign,
			);
			
			$all_course = get_posts( $condition );
			$i = 1;
			foreach( $all_course as $post ) { 
			
				$return .= '<div class="col-md-'.$column_change.' col-sm-6 col-xs-12 '.$masonry_item.' course-wrapper hvr-float lp_course">';
				$return .= '<div class="course-box">';
				
				if ( has_post_thumbnail($post->ID) ) {
				$src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'course_thumbnail' );
				$return .= '<div class="course-thumbnail wrap-image"> <a href="'.esc_url( get_permalink($post->ID) ).'" class="course-permalink"> <img src="'.esc_url( $src[0] ).'"> </a> </div>';
				}
				$return .= '<div class="course-info">';
				$term_list = strip_tags (get_the_term_list(  $post->ID, 'course_category', '', ', ', '' ));
				$return .= '<div class="course-categories">
							  <p class="cat-links">'.$term_list.'</p>
							</div>';
				
				
				$return .= '<'.$title_tag.' class="course-title"><a href="'.esc_url( get_permalink($post->ID) ).'" class="course-permalink">'.$post->post_title.'</a></'.$title_tag.'>';
				// Course Meta
				$return .= '<div class="course-meta">';
				
					$course = learn_press_get_course( $post->ID );
					 
					// Lession
					$count_items = $course->count_items();
					$count_items = intval( $count_items );
					$return .= '<div class="course-lesson"> <span class="meta-icon far fa-file-alt"></span> <span class="meta-value">';
					$return .= ' '.$count_items.' Lessons';
					$return .= '</span> </div>';
					
					// $Price
					$return .= '<div class="course-price '.$course_tag.'">';
					if ( $price_html = $course->get_price_html() ) {
						if ( $course->get_origin_price() != $course->get_price() ) {
							$origin_price_html = $course->get_origin_price_html();
							$return .= '<span class="origin-price">' . $origin_price_html . '</span>';
						}
						
					}
					$return .= ' <span class="price">' . $price_html . '</span>';
					$return .= '</div>';
					// Eof $price
				$return .= '</div>';
				$return .= '</div></div></div>';
				
				// FIXROW
				if(  $layout == 2 && $column == 4 ) {
					if($i % 4 == 0) $return .= '</div><div class="row row-eq-height">'; 
				} else if(  $layout == 2 && $column == 3 ) {
					if($i % 3 == 0) $return .= '</div><div class="row row-eq-height">'; 
				} else if( $layout == 2 && $column == 2 ) {  
					if($i % 2 == 0) $return .= '</div><div class="row row-eq-height">'; 
				}
				// EOF FIXROW
				
			$i++;
			}
			
			wp_reset_postdata();
			if(  $layout == 2 ) $return .= '</div>';
			$return .= '</div></div>';
			return $return;
		}
	add_shortcode('manual__learnpress_course', 'manual__learnpress_course');	
	}
}

/*****************************************
***    ADD VC SC 29 :: POST GRID   ***
******************************************/
if (!function_exists('manual__masonry_post_grid')) {
    function manual__masonry_post_grid($atts, $content = null) {
		
		$columns_number = "";
		
        $args = array(
            "gridview_post_type"    => "post",
            "include_post_category"  => "",
            "include_kb_category"    => "",
            "include_doc_category"   => "",
			"include_faq_category"    => "",
			"design_presentation_type" => "1",
			"type"       			=> "",
			"number_of_posts"       => "4",
			"number_of_colums"      => "",
			"order_by"              => "",   
            "order"                 => "", 
			"title_tag"             => "h4",
			"display_feature_image"   => "2",
			"display_excerpt_read"  => "2",
			"content_limit"         => "15",
			"display_continue_read" => "2",
			"continue_reading_txt"    => "Continue Reading",
        );
		
		extract(shortcode_atts($args, $atts));
		
		// columns
		$columns_number = 'col-md-4 col-sm-6';
		if($number_of_colums == 2){
			$columns_number = "col-md-6 col-sm-6"; 
		} else if ($number_of_colums == 3) {
			$columns_number = "col-md-4 col-sm-6";
		} else if ($number_of_colums == 4) {
			$columns_number = "col-md-3 col-sm-6";
		}
		
		// post type
		$cat_in = $cat_taxonomy_in = '';
		if( $gridview_post_type == 'post' ) {
			$cat_in = $include_post_category;
		} else if( $gridview_post_type == 'manual_kb' ) {
			$cat_taxonomy_in = $include_kb_category;
		} else if( $gridview_post_type == 'manual_documentation' ) {
			$cat_taxonomy_in = $include_doc_category;
		} else if( $gridview_post_type == 'manual_faq' ) {
			$cat_taxonomy_in = $include_faq_category;
		}
		
		if( $gridview_post_type == 'manual_kb' || $gridview_post_type == 'manual_documentation' || $gridview_post_type == 'manual_faq' ) {
			if( $gridview_post_type == 'manual_kb' ) $taxonomy = 'manualknowledgebasecat';
			else if( $gridview_post_type == 'manual_documentation' ) $taxonomy = 'manualdocumentationcategory';
			else $taxonomy = 'manualfaqcategory';
			$cat_taxonomy_in = explode (",", $cat_taxonomy_in);
			if( !empty( $cat_taxonomy_in[0] ) ) {
				$tax_query = array( array( 'taxonomy' => $taxonomy,
											'field' => 'id',
											'include_children' => true,
											'terms' => $cat_taxonomy_in,
											)
								   );
			} else {
				$tax_query = '';
			}
		} else {
			$tax_query = '';
		}
		
        $return = '';
		$q = new WP_Query(
				array(
					  'post_type' => $gridview_post_type, 
					  'orderby' => $order_by, 
					  'order' => $order, 
					  'posts_per_page' => $number_of_posts, 
					  'cat' => $cat_in,
					  'tax_query' => $tax_query,
				)
		);
		
		if( $design_presentation_type == 1 ) {
			$grid_type = 'masonry-grid';
			$grid_item_type = 'masonry-item';
		} else {
			$grid_type = '';
			$grid_item_type = 'fitrows';
		}
		
		if( $design_presentation_type == 1 ) {
			$return .= "<div class='vc_theme_blog_post_holder ".$grid_type."'>";
		} else {
			$return .= '<div class="vc_theme_blog_post_holder row row-eq-height">'; 
		}
		
		if($q->have_posts()) { 
			$i = 1;
			while ($q->have_posts()) : $q->the_post();
				$return .= "<div class=' ".$columns_number." ".$grid_item_type." body-content'>";
				
				if( $display_feature_image == 2 ) {
					$return .= '<a href="'.get_permalink().'">'.get_the_post_thumbnail(get_the_ID(), 'portfolio-FitRows').'</a>';
				}
					// Entry Content
					$return .= '<div class="entry-content">';
					
					$return .= '<div class="entry-header '.($type == "dividers"?'dividers':'').'">
									<'.$title_tag.' style="margin-top: 0px;margin-bottom: 0px;"><a href="' . get_permalink() . '">' . get_the_title() . '</a></'.$title_tag.'>
								</div>';
					
					if ($type == "dividers" ) {
						$return .= '<div class="entry-meta latest_post_date">';
						$return .= '<i class="far fa-calendar-alt"></i> <div class="latest_post_day">'.get_the_time('d').'</div>';
						$return .= '<div class="latest_post_month">'.get_the_time('M').'</div>';
						$return .= '</div>';
					} else {
						//Entry Meta
						$return .= '<div class="entry-meta">';	
						$return .= '<span class="posted-on"><i class="far fa-calendar-alt"></i></span>&nbsp;
									<span class="publish-date">' . get_the_time('d F, Y') . '</span>';	
						$return .= "</div>";
					}
					
					//Post Content
					
					$return .= '<div class="content">';
					if( $display_excerpt_read == 2 ) { 
					    if( has_excerpt() ) {
							$blog_content = get_the_excerpt();
						} else {
							$blog_content = get_the_excerpt();	
						}
						$return .= '<p>'.wp_strip_all_tags(wp_trim_words( $blog_content, $content_limit, '...' )).'</p>';
					}
					if( $display_continue_read == 2 ) {
						$return .= '<p> <a href="'.esc_url( get_permalink() ).'" class="more-link hvr-icon-wobble-horizontal">'.$continue_reading_txt.' &nbsp;&nbsp;<i class="fa fa-arrow-right hvr-icon"></i></a> </p>';
					}
					$return .= "</div>";
					
					$return .= "</div>";
					
				$return .= "</div>";
				
				// FIXROW
				if(  $design_presentation_type == 2 && $number_of_colums == 4 ) {
					if($i % 4 == 0) $return .= '</div><div class="vc_theme_blog_post_holder row row-eq-height">'; 
				} else if(  $design_presentation_type == 2 && $number_of_colums == 3 ) {
					if($i % 3 == 0) $return .= '</div><div class="vc_theme_blog_post_holder row row-eq-height">'; 
				} else if( $design_presentation_type == 2 && $number_of_colums == 2 ) {  
					if($i % 2 == 0) $return .= '</div><div class="vc_theme_blog_post_holder row row-eq-height">'; 
				}
				// EOF FIXROW
				
		  $i++;		
		  endwhile;
	    } else {
			$return .= '<p class="no-records"> '. esc_html__('Sorry, no posts matched your criteria.', 'manual') .'</p>';
		}
        $return .= "</div>";
		
		wp_reset_postdata();
        return $return;
    }
    add_shortcode('manual__masonry_post_grid', 'manual__masonry_post_grid');
}



/***************************************
***    ADD VC SC 30 :: VIDEO   ***
****************************************/
if(!function_exists("manual__video_popup")){
	function manual__video_popup( $atts, $content = null ) {
		
		global $post;
		$currentpost = $post->ID;
		$class = '';
		extract( shortcode_atts( array( 
			"video_url"   => "",
			"video_image"   => "",
			"player_icon_color"   => "#c91914",
			"player_icon_font_size" => "60px",
			"player_icon_margin" => "-27px 0px 0px -23px",
			"custom_icon" => "fab fa-youtube",
			"title_tag" => "h5",
			"title_name" => "",
			"text_align" => "center",
			"title_text_padding" => "",
			"text_color" => "",
		), $atts ) );
		
		if (is_numeric($video_image) && isset($video_image)) {
			$image_src = wp_get_attachment_url($video_image);
		} else {
			$image_src = '';
		}
		
		$return = $padding = $color = '';
		$return .= '<div class="manual_video_wrap"><a class="manual_vc_video_image_effect_tag_a" href="'.$video_url.'"><img src="'.$image_src.'" alt="video" class="manual_vc_video_image_effect">
						<i class="'.$custom_icon.'" style="position: absolute;top: 50%;left: 50%;font-size: '.$player_icon_font_size.';color:'.$player_icon_color.';margin:'.$player_icon_margin.';"></i>
					</a></div>';
		if( isset($title_name) && $title_name != '' ) {	
			if( isset($title_text_padding) && $title_text_padding != '' ) $padding = 'padding:'.$title_text_padding.';';
			if( isset($text_color) && $text_color != '' ) $color = 'style="color:'.$text_color.';"';
			$return .= '<div style="text-align:'.$text_align.';'.$padding.'"><'.$title_tag.' '.$color.'>'.$title_name.'</'.$title_tag.'></div>';
		}

	    return $return;
    }
    add_shortcode('manual__video_popup', 'manual__video_popup');
}
?>