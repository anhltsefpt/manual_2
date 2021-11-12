<?php
global $post,$paged;
$portfolio_title_tag        = $instance['portfolio_title_tag'];
$portfolio_order            = $instance['portfolio_order'];
$number_of_post             = $instance['number_of_post'];
$portfolio_order_by         = $instance['portfolio_order_by'];
$portfolio_column           = $instance['portfolio_column'];
$portfolio_type             = $instance['portfolio_type'];
$portfolio_shorting         = $instance['portfolio_shorting'];
$shorting_link_color        = $instance['shorting_link_color'];
$shorting_link_border_color = $instance['shorting_link_border_color'];
$filter_align               = $instance['filter_align'];
$filter_padding             = $instance['filter_padding'];
$link_color                 = $instance['link_color'];
$link_color_hover           = $instance['link_color_hover'];
$link_cat_color             = $instance['link_cat_color'];
$selected_projects          = $instance['selected_projects'];
$category                   = $instance['category'];
$sorting_order              = $instance['sorting_order'];
$sorting_order_by           = $instance['sorting_order_by'];
$show_categories            = $instance['show_categories'];
$show_load_more        	    = $instance['show_load_more'];
$show_load_more_align       = $instance['show_load_more_align'];
$show_load_more_margin      = $instance['show_load_more_margin'];
$show_custom_description    = $instance['show_custom_description'];
$content_block_align        = $instance['content_block_align'];
$show_title                 = $instance['show_title'];
$inital_loading_text        = $instance['inital_loading_text'];
$loading_text               = $instance['loading_text'];


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

$time_start = microtime(true);
$time_start = explode(".", $time_start);
if( isset($link_color) && $link_color != '' ) {
	echo '<style>.portfolio_link.color_'.$time_start[1].' {color:'.$link_color.';} .portfolio_link.color_'.$time_start[1].':hover {color:'.$link_color_hover.';}</style>';
}

// cat names 
$catID = array();
if( !empty($category) ) {
	$catID = $category;
}
		
$args = array(
	'hide_empty'    => 1,
	'child_of' 		=> 0,
	'pad_counts' 	=> 1,
	'hierarchical'	=> 1,
	'order'         => $sorting_order,
	'orderby'       => $sorting_order_by,
	'include'       => $catID,
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

if (empty($catID)) {
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
		'posts_per_page' => $number_of_post,
		'orderby' => $portfolio_order_by,
		'post_status' => 'publish',
		'order' => $portfolio_order,
		'paged' => $paged,
		'tax_query' => array(
					array(
						'taxonomy' => 'manualportfoliocategory',
						'field' => 'term_id',
						'include_children' => true,
						'terms' => $catID 
					)
				)
	);
}
$project_ids = null;
if ($selected_projects != "") {
$args['post__in'] = $selected_projects;
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
	$return .= '</a></div>';
	
	if( $show_title == 'yes' || $show_categories == 'yes' || $show_custom_description == 'yes' ) {
		$return .= '<div class="portfolio-desc" style="text-align:'.$content_block_align.'">';
		if( $show_title == 'yes' ) {
		$return .= '<'.$portfolio_title_tag.'><a href="'. ($cutom_redirect_url?$cutom_redirect_url:get_permalink($wp_query->post->ID)) .'" class="portfolio_link color_'.$time_start[1].'">';
					$title = get_the_title(); 
					$return .= html_entity_decode($title, ENT_QUOTES, "UTF-8");
		$return .= '</a></'.$portfolio_title_tag.'>';
		}
		if( $show_categories == 'yes' ) $return .= '<p class="category" style="color:'.$link_cat_color.'">'. implode(', ', $out ).' </p>';
		if( $show_custom_description == 'yes' ) $return .= '<p>'.$cutom_description.'</p>';
		$return .= '</div>';
	}
	
	$return .= '</div>';
		
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
	if ($show_load_more == "yes") {
	
	if( isset($show_load_more_margin) && $show_load_more_margin != '' ) $show_load_more_margin = $show_load_more_margin;
	else $show_load_more_margin = '20px';
	
	$return .= '<div style="text-align:'.$show_load_more_align.'; margin: '.$show_load_more_margin.' 0px;" class="portfolio_paging"><span rel="' . $wp_query->max_num_pages . '" class="ajax_load_more_post load_more custom-botton hvr-icon-spin">' . get_next_posts_link($inital_loading_text, $wp_query->max_num_pages) . '&nbsp;</span></div>';
	$return .= '<div style="text-align:'.$show_load_more_align.'; margin: '.$show_load_more_margin.' 0px;" class="portfolio_paging_loading load_more "><a href="javascript: void(0)" class="qbutton custom-botton">'.$loading_text.'</a></div>';
	}
}
wp_reset_postdata();
echo ent2ncr( $return );