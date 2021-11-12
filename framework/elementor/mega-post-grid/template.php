<?php
$gridview_post_type       = $instance['gridview_post_type'];
$include_post_category    = $instance['include_post_category'];
$include_kb_category      = $instance['include_kb_category'];
$include_doc_category     = $instance['include_doc_category'];
$include_faq_category     = $instance['include_faq_category'];
$design_presentation_type = $instance['design_presentation_type'];
$type       			  = $instance['type'];
$number_of_posts         = $instance['number_of_posts'];
$number_of_colums        = $instance['number_of_colums'];
$order_by                = $instance['order_by'];
$order                   = $instance['order'];
$title_tag               = $instance['title_tag'];
$display_feature_image   = $instance['display_feature_image'];
$display_excerpt_read    = $instance['display_excerpt_read'];
$content_limit           = $instance['content_limit'];
$display_continue_read   = $instance['display_continue_read'];
$continue_reading_txt    = $instance['continue_reading_txt'];

$columns_number = "";

// columns
$columns_number = 'col-md-4 col-sm-6';
if($number_of_colums == 2){
	$columns_number = "col-md-6 col-sm-6"; 
} else if ($number_of_colums == 3) {
	$columns_number = "col-md-4 col-sm-6";
} else if ($number_of_colums == 4) {
	$columns_number = "col-md-3 col-sm-6";
}

// post type
$cat_in = $cat_taxonomy_in = '';
if( $gridview_post_type == 'post' ) {
	$cat_in = $include_post_category;
} else if( $gridview_post_type == 'manual_kb' ) {
	$cat_taxonomy_in = $include_kb_category;
} else if( $gridview_post_type == 'manual_documentation' ) {
	$cat_taxonomy_in = $include_doc_category;
} else if( $gridview_post_type == 'manual_faq' ) {
	$cat_taxonomy_in = $include_faq_category;
}

if( $gridview_post_type == 'manual_kb' || $gridview_post_type == 'manual_documentation' || $gridview_post_type == 'manual_faq' ) {
	if( $gridview_post_type == 'manual_kb' ) $taxonomy = 'manualknowledgebasecat';
	else if( $gridview_post_type == 'manual_documentation' ) $taxonomy = 'manualdocumentationcategory';
	else $taxonomy = 'manualfaqcategory';
	$cat_taxonomy_in = explode (",", $cat_taxonomy_in);
	if( !empty( $cat_taxonomy_in[0] ) ) {
		$tax_query = array( array( 'taxonomy' => $taxonomy,
									'field' => 'id',
									'include_children' => true,
									'terms' => $cat_taxonomy_in,
									)
						   );
	} else {
		$tax_query = '';
	}
} else {
	$tax_query = '';
}

$return = '';
$q = new WP_Query(
		array(
			  'post_type' => $gridview_post_type, 
			  'orderby' => $order_by, 
			  'order' => $order, 
			  'posts_per_page' => $number_of_posts, 
			  'cat' => $cat_in,
			  'tax_query' => $tax_query,
		)
);

if( $design_presentation_type == 1 ) {
	$grid_type = 'masonry-grid';
	$grid_item_type = 'masonry-item';
} else {
	$grid_type = '';
	$grid_item_type = 'fitrows';
}

if( $design_presentation_type == 1 ) {
	$return .= "<div class='vc_theme_blog_post_holder ".$grid_type."'>";
} else {
	$return .= '<div class="vc_theme_blog_post_holder row row-eq-height">'; 
}

if($q->have_posts()) { 
	$i = 1;
	while ($q->have_posts()) : $q->the_post();
		$return .= "<div class=' ".$columns_number." ".$grid_item_type." body-content'>";
		
		if( $display_feature_image == 'yes' ) {
			$return .= '<a href="'.get_permalink().'">'.get_the_post_thumbnail(get_the_ID(), 'portfolio-FitRows').'</a>';
		}
			// Entry Content
			$return .= '<div class="entry-content">';
			
			$return .= '<div class="entry-header '.($type == "dividers"?'dividers':'').'">
							<'.$title_tag.' style="margin-top: 0px;margin-bottom: 0px;"><a href="' . get_permalink() . '">' . get_the_title() . '</a></'.$title_tag.'>
						</div>';
			
			if ($type == "dividers" ) {
				$return .= '<div class="entry-meta latest_post_date">';
				$return .= '<i class="far fa-calendar-alt"></i> <div class="latest_post_day">'.get_the_time('d').'</div>';
				$return .= '<div class="latest_post_month">'.get_the_time('M').'</div>';
				$return .= '</div>';
			} else {
				//Entry Meta
				$return .= '<div class="entry-meta">';	
				$return .= '<span class="posted-on"><i class="far fa-calendar-alt"></i></span>&nbsp;
							<span class="publish-date">' . get_the_time('d F, Y') . '</span>';	
				$return .= "</div>";
			}
			
			//Post Content
			
			$return .= '<div class="content">';
			if( $display_excerpt_read == 'yes' ) { 
				if( has_excerpt() ) {
					$blog_content = get_the_excerpt();
				} else {
					$blog_content = get_the_excerpt();	
				}
				$return .= '<p>'.wp_strip_all_tags(wp_trim_words( $blog_content, $content_limit, '...' )).'</p>';
			}
			if( $display_continue_read == 'yes' ) {
				$return .= '<p> <a href="'.esc_url( get_permalink() ).'" class="more-link hvr-icon-wobble-horizontal">'.$continue_reading_txt.' &nbsp;&nbsp;<i class="fa fa-arrow-right hvr-icon"></i></a> </p>';
			}
			$return .= "</div>";
			
			$return .= "</div>";
			
		$return .= "</div>";
		
		// FIXROW
		if(  $design_presentation_type == 2 && $number_of_colums == 4 ) {
			if($i % 4 == 0) $return .= '</div><div class="vc_theme_blog_post_holder row row-eq-height">'; 
		} else if(  $design_presentation_type == 2 && $number_of_colums == 3 ) {
			if($i % 3 == 0) $return .= '</div><div class="vc_theme_blog_post_holder row row-eq-height">'; 
		} else if( $design_presentation_type == 2 && $number_of_colums == 2 ) {  
			if($i % 2 == 0) $return .= '</div><div class="vc_theme_blog_post_holder row row-eq-height">'; 
		}
		// EOF FIXROW
		
  $i++;		
  endwhile;
} else {
	$return .= '<p class="no-records"> '. esc_html__('Sorry, no posts matched your criteria.', 'manual') .'</p>';
}
$return .= "</div>";

wp_reset_postdata();


echo ent2ncr( $return );