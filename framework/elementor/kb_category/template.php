<?php
$kb_category_title            =  $instance['kb_category_title'];
$kb_category_show_post_count  =  $instance['kb_category_show_post_count'];
$count_text_color   =  $instance['count_text_color'];
$count_bg_color   =  $instance['count_bg_color'];
$kb_category_remove_border   =  $instance['kb_category_remove_border'];
$cat_fonticon_color   =  $instance['cat_fonticon_color'];
$title_tag   =  $instance['title_tag'];

$return = $no_border = $cat_icon_color = '';
$time_start = microtime(true);
$time_start = explode(".", $time_start);
if( isset($cat_fonticon_color) && $cat_fonticon_color != '' ) {
	echo '<style>.vc-kb-cat-widget.icon_color_'.$time_start[1].' ul.vc_kbcat_widget li:before{color:'.$cat_fonticon_color.';}</style>';
}

if( isset($kb_category_remove_border) && $kb_category_remove_border == 'yes' ) { $no_border = 'style="border: none;"';  }

$categories = get_categories('taxonomy=manualknowledgebasecat&post_type=manual_kb');
$return = '<div class="vc_kb_cat_sc sidebar-nav sidebar-widget widget_kb_cat_widget vc-kb-cat-widget icon_color_'.$time_start[1].'"><div class="display-faq-section">';
$return .= '<'.$title_tag.' class="widget-title widget-custom" style="margin-bottom: 25px;"><span>' . $kb_category_title . '</span></'.$title_tag.'>';
$return .= '<ul class="vc_kbcat_widget">';
foreach ($categories as $category) {
	$category_link = get_category_link( $category->term_id );
	$return .= '<li '.$no_border.'><a href="'. esc_url($category_link) .'">'. $category->name .'</a> ' ;
	if( $kb_category_show_post_count == 'yes' ) { $return .= '<span class="kb_cat_post_count" style="color:'.$count_text_color.';background:'.$count_bg_color.';">'.$category->count.'</span>'; }
	$return .= '</li>';
}
$return .= '</ul>';
$return .= '</div></div>';
wp_reset_postdata();

echo ent2ncr( $return );