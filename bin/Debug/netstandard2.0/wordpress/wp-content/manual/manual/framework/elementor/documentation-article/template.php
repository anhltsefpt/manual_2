<?php
global $post, $wpdb;
$documentation_article_display_type   = $instance['documentation_article_display_type'];
$documentation_article_numbers   = $instance['documentation_article_numbers'];
$documentation_article_order_asc_dsc   = $instance['documentation_article_order_asc_dsc'];
$documentation_title_tag   = $instance['documentation_title_tag'];
$documentation_column = $instance['documentation_column'];
$documentation_excerpt_content = $instance['documentation_excerpt_content'];
$documentation_excerpt_content_wordlength = $instance['documentation_excerpt_content_wordlength'];
$box_bg_color = $instance['box_bg_color'];
$box_border_btm_color = $instance['box_border_btm_color'];


$return = $args = '';
if( $documentation_article_display_type == 1 ) { // Latest Article
	$args = array( 
		'posts_per_page' => $documentation_article_numbers, 
		'post_type'  => 'manual_documentation',
		'orderby' => 'date',
		'order'	=>	$documentation_article_order_asc_dsc,
	);
	
} else if( $documentation_article_display_type == 2 ) { // Popular Article
	$args = array( 
		'posts_per_page' => $documentation_article_numbers, 
		'post_type'  => 'manual_documentation',
		'orderby' => 'meta_value_num',
		'order'	=>	$documentation_article_order_asc_dsc,
		'meta_key' => 'manual_post_visitors'
	);
	
} else if( $documentation_article_display_type == 3 ) { // Top Rated Article
	$args = array( 
		'posts_per_page' => $documentation_article_numbers, 
		'post_type'  => 'manual_documentation',
		'orderby' => 'meta_value_num',
		'order'	=>	$documentation_article_order_asc_dsc,
		'meta_key' => 'votes_count_doc_manual'
	);
	
} else if( $documentation_article_display_type == 4 ) { // Most Commented Article
	$args = array( 
		'posts_per_page' => $documentation_article_numbers, 
		'post_type'  => 'manual_documentation',
		'orderby' => 'comment_count',
		'order'	=>	$documentation_article_order_asc_dsc,
	);
				
} else if( $documentation_article_display_type == 5 ) { // Recently Updated Article
	$args = array( 
		'posts_per_page' => $documentation_article_numbers, 
		'post_type'  => 'manual_documentation',
		'orderby' => 'modified',
		'order'	=>	$documentation_article_order_asc_dsc,
	);
				
} else { // Default latest
	$args = array( 
		'posts_per_page' => $documentation_article_numbers, 
		'post_type'  => 'manual_documentation',
		'orderby' => 'date',
		'order'	=>	$documentation_article_order,
	);
}

// Columns
if( $documentation_column == 4 ) $colmd = 3;
else if( $documentation_column == 3 )  $colmd = 4;
else if( $documentation_column == 2 )  $colmd = 6;
else $colmd = 3; 

$i = 1;
$return .= '<div class="row row-eq-height" style="margin: 0px;">';
	$the_query = new WP_Query($args);
	if ($the_query->have_posts()) : 
	while ($the_query->have_posts()) : $the_query->the_post();
	
		$chk_link = get_post_permalink( $post->ID );
		$return .= '<div class="col-md-'.$colmd.' col-sm-12 vc-manualfaq-blocks hvr-bob" style="background:'.$box_bg_color.'; border-bottom-color:'.$box_border_btm_color.';">';
		$return .= '<'.$documentation_title_tag.' class="title-faq-cat"><a href="'.$chk_link.'">'. $post->post_title .'</a></'.$documentation_title_tag.'>';
		if( $documentation_excerpt_content == 'yes' ) {
			$return .= '<p>'.manual__get_excerpt_trim($documentation_excerpt_content_wordlength,'..').'</p>';
		}
		
		$return .= '</div>';
		
		if( $documentation_column == 4 ) { 
			if($i % 4 == 0) $return .= '</div><div class="row row-eq-height" style="margin: 0px;">'; 
		} else if( $documentation_column == 3 ) {
			if($i % 3 == 0) $return .= '</div><div class="row row-eq-height" style="margin: 0px;">'; 
		} else if( $documentation_column == 2 ) {
			if($i % 2 == 0) $return .= '</div><div class="row row-eq-height" style="margin: 0px;">'; 
		} else {
			if($i % 4 == 0) $return .= '</div><div class="row row-eq-height" style="margin: 0px;">';
		}
			
	$i++;		
	endwhile; 
	endif;
$return .= '</div>';

wp_reset_postdata();

echo ent2ncr( $return );