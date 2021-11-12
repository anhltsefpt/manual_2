<?php 
get_header();

// sidebar status
if( $theme_options['faq-display-sidebar-status'] == true ) {
	$col_md_sm = 12;
	$sidebar_status = true;
} else {
	if( $theme_options['faq-sidebar-display-position'] == 'left' ) {
		$sidebar_position = 'left';
	} else {
		$sidebar_position = 'right';
	}
	$col_md_sm = 8;
	if( $theme_options['theme_widget_width_size_global'] == 1 ) {
		$col_md_sm = 9;
	}
	$sidebar_status = false;
}
$overwrite_css = '';
if( $theme_options['faq-typography-title-overwrite'] == true ) {
	$overwrite_css = 'style=font-weight:'.$theme_options['faq-custom-title-font-weight'].';text-transform:'.$theme_options['faq-custom-title-text-transform'].';font-size:'.$theme_options['faq-custom-title-font-size'].'px;';
}

// Get our extra meta
$st_term_data =	$wp_query->queried_object;
$term_slug = get_query_var( 'term' );
$current_term = get_term_by( 'slug', $term_slug, 'manualfaqcategory' );
$check_if_login_call = get_option( 'doc_cat_check_login_'.$current_term->term_id );
$check_user_role = get_option( 'doc_cat_user_role_'.$current_term->term_id );
$custom_login_message = get_option( 'doc_cat_login_message_'.$current_term->term_id );
?>
<!-- /start container -->
<div class="container content-wrapper body-content">
<div class="row margin-top-btm-50">

<?php if( $sidebar_status == false && $sidebar_position == 'left' ) get_template_part('sidebar', 'faq');  ?>

<?php
/*******************************
**** CATEGORY ACCESS CONTROL ****
********************************/
if( $check_if_login_call == 1 && !is_user_logged_in() ) { 
	echo '<div class="col-md-'.esc_html($col_md_sm).' col-sm-12">';
	manual__login_forum($custom_login_message);
	echo '</div>';
} else { 

	/****************************************************
	**** LOGIN LEVEL (SUFFICIENT ACCESS LEVEL) CHECK ****
	*****************************************************/
	$access_status = manual_doc_access($check_user_role);
	if( $access_status == false ) { 
		echo '<div class="col-md-'.esc_html($col_md_sm).' col-sm-12"><div class="doc_access_control"><p>';
		echo esc_attr($theme_options['faq-cat-page-access-control-message']);
		echo '</p></div></div>';
	} else {
		
		/************************
		**** ARTICLE SECTION ****
		*************************/
?> 

<div class="col-md-<?php echo esc_html($col_md_sm); ?> col-sm-12">
  <?php if( $theme_options['faq-ed-expandcollapse'] == true ) { ?>
  <div class="margin-btm-20"> 
  <span><a class="more-link" id="faq-expandall" style="cursor:pointer;">
    <?php echo esc_attr($theme_options['faq-expand-collapse-text']); ?>
  </a></span> 
  </div>
  <?php } ?>
  <?php 
    if ( is_active_sidebar( 'faq-1' ) ) : 
		dynamic_sidebar( 'faq-1' ); 
    endif; 
?>
  <?php
  
	if( isset($theme_options['faq-display-order']) && $theme_options['faq-display-order'] != ''  ) {
		if( $theme_options['faq-display-order'] == 1 ) {
			$faq_record_order = 'ASC';
		} else {
			$faq_record_order = 'DESC';
		}
	}
	
	if( isset( $theme_options['faq-display-order-by'] ) && $theme_options['faq-display-order-by'] != '' ) {
		$faq_record_order_by = $theme_options['faq-display-order-by'];	
	} else {
		$faq_record_order_by = 'date';	
	}
	
	$st_term_data =	$wp_query->queried_object;
	$term_slug = get_query_var( 'term' );
	$args = array(
				'post_type' => 'manual_faq',
				'posts_per_page' => '-1',
				'order'    => $faq_record_order,
				'orderby'  => $faq_record_order_by,
				'tax_query' => array(
						array(
							'taxonomy' => 'manualfaqcategory',
							'field' => 'slug',
							'include_children' => true,
							'terms' => $term_slug
							)
						),
				
	);
	$wp_query_data = new WP_Query($args);
   
  if($wp_query_data->have_posts()) { 
  if ( have_posts() ) : ?>
  <div class="display-faq-section">
    <?php while($wp_query_data->have_posts()) :  $wp_query_data->the_post(); ?>
    <div class="collapsible-panels theme-faq-cat-pg faq-catpg-<?php echo esc_attr($post->ID); ?>" id="<?php echo esc_attr($post->ID); ?>">
      <h5 class="title-faq-cat" <?php echo esc_attr($overwrite_css); ?>><a href="#"><?php echo esc_html(get_the_title()); ?></a></h5>
      <span class="faq-postlink" onclick="prompt('<?php echo esc_html__( 'Press Ctrl + C, then Enter to copy to clipboard', 'manual' ) ?>','<?php echo get_permalink().'#'.$post->ID ?>')"><?php echo esc_html__( '#', 'manual' ) ?></span>
    </div>
    <div class="entry-content clearfix entry-content-<?php echo esc_attr($post->ID); ?> entry-content-faq-all display-none">
        <?php the_content(); ?>
        <?php edit_post_link( esc_html__( 'Edit', 'manual' ), '<p class="post-edit-link" style="text-align:right"><i class="fa fa-edit"></i> ', '</p>', $post->ID ); ?>
        <?php if( $theme_options['faq-display-social-share'] == true ) manual_social_share(get_permalink()); ?>
   </div>
    <?php 
		endwhile; 
		// Previous/next page navigation.
		the_posts_pagination( array(
			'prev_text'          => esc_html__( '&lt;', 'manual' ),
			'next_text'          => esc_html__( '&gt;', 'manual' ),
		) );
		?>
  </div>
  <?php 
	// If no content, include the "No posts found" template.
	else :
		 esc_html_e( 'Sorry, no records were found', 'manual' );
	endif;
  }
  wp_reset_query(); 
?>
  <div class="clearfix"></div>
</div>

<?php 
	}
}
if( $sidebar_status == false && $sidebar_position == 'right' ) get_template_part('sidebar', 'faq');
?>
</div>
</div>
<?php 
get_footer(); 
?>