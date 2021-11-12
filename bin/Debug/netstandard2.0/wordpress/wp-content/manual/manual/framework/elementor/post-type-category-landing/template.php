<?php
$manual_theme_post_type 			= $instance['manual_theme_post_type'];			   
$knowledgebase_style_type 			= $instance['knowledgebase_style_type'];
$knowledgebase_style_type_display_order 		= $instance['knowledgebase_style_type_display_order'];
$knowledgebase_style_type_display_orderby 		= $instance['knowledgebase_style_type_display_orderby'];
$title_tag 							    = $instance['title_tag'];
$total_article_count 					= $instance['total_article_count'];
$border_color 							= $instance['border_color'];
$article_count_box_title 				= $instance['article_count_box_title'];
$icon_color 							= $instance['icon_color'];
$kb_private_categpry 					= $instance['kb_private_categpry'];
$kb_private_category_text_color		    = $instance['kb_private_category_text_color'];
$exclude_kb_category 					= $instance['exclude_kb_category'];
$exclude_doc_category 					= $instance['exclude_doc_category'];
$kb_no_ofrecords 						= $instance['kb_no_ofrecords'];
$disable_description					= $instance['disable_description'];
$icon_size 							= $instance['icon_size'];
$default_icon_code 					= $instance['default_icon_code']['value'];
$limit_description_char				= $instance['limit_description_char'];
$background_color 						= $instance['background_color'];
$border_radius 						= $instance['border_radius'];
$total_article_count_style 			= $instance['total_article_count_style'];
$total_article_count_style1_text		= $instance['total_article_count_style1_text'];
$kb_writtenby_text_color 				= $instance['kb_writtenby_text_color'];
$landing_style_type2_column 			= $instance['landing_style_type2_column'];
$box_height 							= $instance['box_height'];
$text_box_align 						= $instance['text_box_align'];
$box_padding							= $instance['box_padding'];
$alternate_background_color		= $instance['alternate_background_color'];
$private_cat_alert_msg 			= $instance['private_cat_alert_msg'];


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

echo ent2ncr( $return );