<?php
$title   = $instance['title'];
$title_tag   = $instance['title_tag'];
$knowledgebase_article_display_type   = $instance['knowledgebase_article_display_type'];
$knowledgebase_article_number   = $instance['knowledgebase_article_number'];
$knowledgebase_article_order   = $instance['knowledgebase_article_order'];
$display_grid = $instance['display_grid'];
$completely_hide_private_articles = $instance['completely_hide_private_articles'];

if( $display_grid == 'yes' ) { $ul_class = 'vcshortcode_kbarticles';
} else { $ul_class = 'clearfix'; }

$return = '<div class="vc_kb_article_type sidebar-nav sidebar-widget widget_kb_cat_widget vc-kb-popular-widget"><div class="display-faq-section">';
$return .= '<'.$title_tag.' class="widget-title widget-custom" style="margin-bottom: 25px;"><span>' . $title . '</span></'.$title_tag.'>';

$args = '';
if( $knowledgebase_article_display_type == 1 ) { // Latest Article
	$args = array( 
				'posts_per_page' => $knowledgebase_article_number, 
				'post_type'  => 'manual_kb',
				'orderby' => 'date',
				'order'	=>	$knowledgebase_article_order,
			);
	
} else if( $knowledgebase_article_display_type == 2 ) { // Popular Article
	$args = array( 
					'posts_per_page' => $knowledgebase_article_number, 
					'post_type'  => 'manual_kb',
					'orderby' => 'meta_value_num',
					'order'	=>	$knowledgebase_article_order,
					'meta_key' => 'manual_post_visitors'
				);
	
} else if( $knowledgebase_article_display_type == 3 ) { // Top Rated Article
	$args = array( 
			'posts_per_page' => $knowledgebase_article_number, 
			'post_type'  => 'manual_kb',
			'orderby' => 'meta_value_num',
			'order'	=>	$knowledgebase_article_order,
			'meta_key' => 'votes_count_doc_manual'
		);
	
} else if( $knowledgebase_article_display_type == 4 ) { // Most Commented Article
	$args = array( 
					'posts_per_page' => $knowledgebase_article_number, 
					'post_type'  => 'manual_kb',
					'orderby' => 'comment_count',
					'order'	=>	$knowledgebase_article_order,
				);
				
} else if( $knowledgebase_article_display_type == 5 ) { // Recently Update Article
	$args = array( 
					'posts_per_page' => $knowledgebase_article_number, 
					'post_type'  => 'manual_kb',
					'orderby' => 'modified',
					'order'	=>	$knowledgebase_article_order,
				);
				
} else { // Default latest
	$args = array( 
				'posts_per_page' => $knowledgebase_article_number, 
				'post_type'  => 'manual_kb',
				'orderby' => 'date',
				'order'	=>	$knowledgebase_article_order,
			);
}

$query = new WP_Query($args);
$return .= '<ul class="'.$ul_class.'">';
if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();

	// control article access 
	$access_status = true;
	if( $completely_hide_private_articles == 'yes' ) {
		$article_access_meta = get_post_meta( $query->post->ID, 'doc_single_article_access', true );
		$article_check_post_user_level_access = get_post_meta( $query->post->ID, 'doc_single_article_user_access', true );
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
		$format = get_post_format($query->post->ID);
		$return .= '<li class="articles '.( (isset($format) && $format!= '')?$format:'' ).' "><a href="'.get_permalink($query->post->ID).'" rel="bookmark">'.get_the_title($query->post->ID).'</a></li>';
	}
	
	
endwhile; endif;
$return .= '</ul>'; 

wp_reset_postdata();
$return .= '</div></div>';

echo ent2ncr( $return );