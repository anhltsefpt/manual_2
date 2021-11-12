<?php
$layout      = $instance['layout'];
$column      = $instance['column'];
$limit       = $instance['limit'];
$title_tag   = $instance['title_tag'];
$order       = $instance['order'];
$orderby     = $instance['orderby'];
$cat_id      = $instance['cat_id'];
$course_tag  = $instance['course_tag'];


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
$return .= '</div>';


echo ent2ncr( $return );