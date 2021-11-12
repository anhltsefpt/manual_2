<?php
$manual_post_type  = $instance['manual_post_type'];
$title_tag  = $instance['title_tag'];
$link = $instance['link'];
$custom_article_name = $instance['custom_article_name'];
$custom_category_name = $instance['custom_category_name'];
$custom_post_type_name = $instance['custom_post_type_name'];
$custom_bbpress_topic_name = $instance['custom_bbpress_topic_name'];
$custom_bbpress_posts_name = $instance['custom_bbpress_posts_name'];
$icon = $instance['icon']['value'];
$text_align = $instance['text_align'];
$icon_size = $instance['icon_size'];
$icon_margin_right = $instance['icon_margin_right'];
$icon_color = $instance['icon_color'];
$box_padding = $instance['box_padding'];
$box_bg_color = $instance['box_bg_color'];
$box_css_animation = $instance['box_css_animation'];


$url = $link['url'] ? $link['url'] : '';
$target = $link['is_external'] ? ' target="_blank"' : '';
$nofollow = $link['nofollow'] ? ' rel="nofollow"' : '';

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

if( $url != '' ) $return .= '<a href="'.$url.'" '.$target.' '.$nofollow.'>';
$return .= '<div class="postype_recods_count_block '.$box_css_animation.'" style="width: 100%; padding:'.$box_padding.'; '.$boxbgcolor.' '.$count_block_align.'" > 
			   <i class="'.$icon.'" style=" '.$icon_padding_top_fix.' '.$icon_float.' font-size:'.$icon_size.'; '.$icon_margin.' color:'.$icon_color.'; "></i>
			   <'.$title_tag.'>'.$title_name.'</'.$title_tag.'>
			   <p>'.esc_html($post_count).' '.esc_html($custom_article_name).'  /  '.esc_html($category_count).' '.esc_html($custom_category_name).'</p>
		   </div>'; 
if( $url != '' ) $return .= '</a>';

echo ent2ncr( $return );