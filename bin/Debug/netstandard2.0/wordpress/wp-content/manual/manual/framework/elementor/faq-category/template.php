<?php
$faq_category_title  = $instance['faq_category_title'];
$faq_category_show_post_count  = $instance['faq_category_show_post_count'];
$count_text_color  = $instance['count_text_color'];
$count_bg_color  = $instance['count_bg_color'];

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
		
echo ent2ncr( $return );