<?php
global $post, $theme_options;
$kbcatrecords_type = $instance['kbcatrecords_type'];				   
$page_per_post   = $instance['page_per_post'];
$post_order   = $instance['post_order'];
$post_orderby = $instance['post_orderby'];
$include_child_post = $instance['include_child_post'];
$kbsinglecatid   = $instance['kbsinglecatid'];
$hide_pagination   = $instance['hide_pagination'];
$style2_border_color = $instance['style2_border_color'];
$style2_boxbg_color = $instance['style2_boxbg_color'];
$style2_metabox_color = $instance['style2_metabox_color'];
$style2_limit_desc_words = $instance['style2_limit_desc_words'];
$title_tag = $instance['title_tag'];
$quick_stats = $instance['quick_stats'];
$style1_view_text = $instance['style1_view_text'];
$style_icon_color = $instance['style_icon_color'];
$style_main_icon_color = $instance['style_main_icon_color'];
$style_textlink_color = $instance['style_textlink_color'];
$style_textlink_hover_color = $instance['style_textlink_hover_color'];
$style2_desc_words_text_color = $instance['style2_desc_words_text_color'];
$completely_hide_private_articles = $instance['completely_hide_private_articles'];
			
$return = '';
		
if( $page_per_post != '' ) $page_per_post = $page_per_post;
else $page_per_post = '-1';

if( $include_child_post == 'no' ) $include_child_post = true;
else $include_child_post = false;

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
				$return .= '<span>Written by </span>'. get_the_author(); 
				$return .= '<p>'.get_the_time( get_option('date_format') ).'</p>';
				$return .= '</div></div>';
				$return .= '</div>';
			}
		 }	   
		 endwhile;
		 
	// pagination here 
	if( $hide_pagination == 'yes' ) {
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
echo ent2ncr( $return );