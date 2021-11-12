<?php
global $post, $theme_options;
$title_tag   = $instance['title_tag'];
$root_tag_li_padding = $instance['root_tag_li_padding'];
$root_tag_color = $instance['root_tag_color'];
$root_tag_border_bottom_color = $instance['root_tag_border_bottom_color'];
$kb_no_of_category_records = $instance['kb_no_of_category_records'];
$knowledgebase_category_display_order = $instance['knowledgebase_category_display_order'];
$knowledgebase_category_display_orderby = $instance['knowledgebase_category_display_orderby'];
$kb_private_category = $instance['kb_private_category'];
$knowledgebase_records_display_order = $instance['knowledgebase_records_display_order'];
$knowledgebase_records_display_orderby = $instance['knowledgebase_records_display_orderby'];
$border_radius = $instance['border_radius'];
$completely_hide_private_articles = $instance['completely_hide_private_articles'];


if( isset($root_tag_li_padding) && $root_tag_li_padding != '' ) $root_tag_li_padding = 'padding:'.$root_tag_li_padding.';';
else $root_tag_li_padding = '';

if( isset($root_tag_color) && $root_tag_color != '' ) $root_tag_color = 'background:'.$root_tag_color.';';
else $root_tag_color = '';

if( isset($border_radius) && $border_radius != '' ) $border_radius = 'border-radius:'.$border_radius.';';
else $border_radius = '';

$return = '';
$return .= '<div class="kb_tree_viewmenu_elementor">';
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
	  'orderby' => 'name',
	  //'order'   => $cat_display_order,
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
					'orderby' => $knowledgebase_records_display_order,
					'order'  => $knowledgebase_records_display_orderby,
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
			'orderby' => $knowledgebase_records_display_order,
			'order'  => $knowledgebase_records_display_orderby,
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
$return .= '</div>';
wp_reset_postdata();

echo ent2ncr( $return );