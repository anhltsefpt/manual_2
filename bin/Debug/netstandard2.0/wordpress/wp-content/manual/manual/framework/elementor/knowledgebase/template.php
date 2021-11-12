<?php
$knowledgebase_style_type                           = $instance['knowledgebase_style_type'];
$knowledgebase_design_style_type                    = $instance['knowledgebase_design_style_type'];
$knowledgebase_design_style_type1_border_color      = $instance['knowledgebase_design_style_type1_border_color'];
$knowledgebase_design_style_type1_bg_color          = $instance['knowledgebase_design_style_type1_bg_color'];
$knowledgebase_design_style_type1_titletxtbg_color  = $instance['knowledgebase_design_style_type1_titletxtbg_color'];
$kb_no_of_category_records                          = $instance['kb_no_of_category_records'];
$knowledgebase_column                           = $instance['knowledgebase_column'];
$knowledgebase_category_display_order           = $instance['knowledgebase_category_display_order'];
$knowledgebase_category_display_orderby         = $instance['knowledgebase_category_display_orderby'];
$knowledgebase_no_of_articles                   = $instance['knowledgebase_no_of_articles'];
$knowledgebase_page_article_display_order       = $instance['knowledgebase_page_article_display_order'];
$knowledgebase_page_article_display_orderby     = $instance['knowledgebase_page_article_display_orderby'];
$knowledgebase_child_cat_as_root                = $instance['knowledgebase_child_cat_as_root'];
$category_title_tag                      = $instance['category_title_tag'];
$knowledgebase_view_all                  = $instance['knowledgebase_view_all'];
$read_more_text_display                  = $instance['read_more_text_display'];
$kbgroupcatid                            = $instance['kbgroupcatid'];
$icon_color                              = $instance['icon_color'];
$cat_desc_color                          = $instance['cat_desc_color'];
$display_kb_cat_desc                             = $instance['display_kb_cat_desc'];
$display_kb_cat_title_icon                       = $instance['display_kb_cat_title_icon'];
$display_kb_article_title_icon                   = $instance['display_kb_article_title_icon'];
$knowledgebase_article_txt_design3               = $instance['knowledgebase_article_txt_design3'];
$knowledgebase_design_style_type3_text_color     = $instance['knowledgebase_design_style_type3_text_color'];
$display_kb_cat_subcategory                      = $instance['display_kb_cat_subcategory'];
$kbsubcat_total_article_count_color              = $instance['kbsubcat_total_article_count_color'];
$hide_kb_category_articles                       = $instance['hide_kb_category_articles'];
$read_more_text_arrow                            = $instance['read_more_text_arrow'];
$kb_cat_icon_position                            = $instance['kb_cat_icon_position'];
$category_title_text_padding                     = $instance['category_title_text_padding'];
$category_icon_font_size                         = $instance['category_icon_font_size'];
$category_icon_name_default                      = $instance['category_icon_name_default']['value'];
$knowledgebase_design_style_type1_border_width   = $instance['knowledgebase_design_style_type1_border_width'];
$completely_hide_private_category                = $instance['completely_hide_private_category'];
$hide_post_count_from_viewall_text               = $instance['hide_post_count_from_viewall_text'];
$kb_display_cat_recors_in_grid_layout_col_1      = $instance['kb_display_cat_recors_in_grid_layout_col_1'];
$kb_display_cat_recors_apply_li_border_layout_col_1    = $instance['kb_display_cat_recors_apply_li_border_layout_col_1'];
$knowledgebase_design_style_type1_bg_linear_color      = $instance['knowledgebase_design_style_type1_bg_linear_color'];
$completely_hide_private_articles      = $instance['completely_hide_private_articles'];


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
	$kb_catIDs = $kbgroupcatid; 
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
	'include'       => $kb_catIDs,
); 
$tax_terms = get_terms('manualknowledgebasecat', $args);
if( $knowledgebase_child_cat_as_root != 'yes' ) $tax_terms = wp_list_filter($tax_terms,array('parent'=>0));
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
		
		if( $hide_kb_category_articles != 'yes' ) {
			$return .= '<ul class="kbse '.$grid_layout.'">';
			if( isset( $knowledgebase_no_of_articles ) && $knowledgebase_no_of_articles != '' ) {
				$display_on_of_records_under_cat = $knowledgebase_no_of_articles;	
			} else {
				$display_on_of_records_under_cat = 5;
			}
						 
			$args = array( 
				'post_type'  => 'manual_kb',
				'posts_per_page' => $display_on_of_records_under_cat,
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
				 $return .= '<li class="cat '.($display_kb_article_title_icon == "yes"?'inner '.((isset($format) && $format != '')?$format:'').' ':'').''.$apply_li_border.'"> <a href="'. get_permalink($post->ID).'" '.($display_kb_article_title_icon != "yes"?'style="padding: 8px 0px 5px 0px;"':'').'>';
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
				 if( $hide_post_count_from_viewall_text != 'yes' ) $return .= $tax_term->count.'&nbsp;';
				 if( $read_more_text_arrow != 'yes' ) $return .= '&nbsp;<i class="fa fa-arrow-right hvr-icon"></i>';
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
		
echo ent2ncr( $return );