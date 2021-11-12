<?php
global $post, $theme_options; 
$page_per_post   = $instance['page_per_post'];
$custom_title   =  $instance['custom_title'];
$title_font_size   = $instance['title_font_size'];
$title_line_height   = $instance['title_line_height'];
$text_font_weight   = $instance['text_font_weight'];
$text_transform   = $instance['text_transform'];
$post_order   = $instance['post_order'];
$post_orderby = $instance['post_orderby'];
$include_child_post = $instance['include_child_post'];
$faqsinglecatid   = $instance['faqsinglecatid'];
$hidepagination   = $instance['hidepagination']; 
$displaystyle   = $instance['displaystyle'];
$faq_column    = $instance['faq_column'];
$faq_title_tag    = $instance['faq_title_tag'];
$bg_color = $instance['bg_color'];
$tag_color = $instance['tag_color'];
$alternate_bg_color = $instance['alternate_bg_color'];
$box_height = $instance['box_height'];
$bar_color = $instance['bar_color'];
$icon_bar_color = $instance['icon_bar_color'];
$bar_title_color = $instance['bar_title_color'];
$bar_title_hover_color = $instance['bar_title_hover_color'];
$icon_color_plus_minus = $instance['icon_color_plus_minus'];

$time_start = microtime(true);
$time_start = explode(".", $time_start);
if( (isset($icon_bar_color) && $icon_bar_color != '') || (isset($bar_title_color) && $bar_title_color != '') || (isset($bar_title_hover_color) && $bar_title_hover_color != '') || (isset($icon_color_plus_minus) && $icon_color_plus_minus != '') ) {
	echo '<style>';
	if(isset($icon_bar_color) && $icon_bar_color != '' ) { echo '.body-content .collapsible-panels div span.social_box_'.$time_start[1].' div.social-box {background:'.$icon_bar_color.';}'; }
	if(isset($bar_title_color) && $bar_title_color != '') { echo '.collapsible-panels .title-faq-cat.color_'.$time_start[1].' a { color:'.$bar_title_color.';  }'; }
	if(isset($bar_title_hover_color) && $bar_title_hover_color != '') { echo '.collapsible-panels .title-faq-cat.color_'.$time_start[1].' a:hover { color:'.$bar_title_hover_color.';  }'; }
	if(isset($icon_color_plus_minus) && $icon_color_plus_minus != '') { echo '.collapsible-panels .title-faq-cat.color_'.$time_start[1].':before, .collapsible-panels .title-faq-cat.color_'.$time_start[1].':hover:before{ color:'.$icon_color_plus_minus.';  }';  }
	echo '</style>';
}

$newbox_height = $responsive_newbox_height = '';
if( isset($box_height) && $box_height!= '' ) {
	$newbox_height = 'height:'.$box_height.';';	
	$responsive_newbox_height = 'height:auto;';	
}

if( $include_child_post == 'yes' ) $include_child_post = true;
else $include_child_post = false;

if( $custom_title == 'yes' ) {
	$custom_title_style = 'style="font-weight:'.$text_font_weight.';text-transform:'.$text_transform.';font-size:'.$title_font_size.';line-height:'.$title_line_height.';"';
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
					$return .= '<div class="collapsible-panels theme-faq-cat-pgs faq-catpg-'. $post->ID .'" id="'. $post->ID .'" '.$bar_new_color.'>
								  <h5 class="title-faq-cat" '.$custom_title_style.'><a href="#">'. $post->post_title .'</a></h5>';
					$return .= '</div>';
					
					// content
					$return .= '<div class="entry-content clearfix entry-content-'.$post->ID.' entry-content-faq-all display-none">
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
		if( $hidepagination == 'yes' && $page_per_post != '-1') {
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

echo ent2ncr( $return );