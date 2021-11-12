<?php 
get_header();

$cat_display_order = 'ASC';
$cat_display_order_by = 'date';
$cat_sidebar_position = 'right';

if( isset($theme_options['kb-cat-display-order']) &&  $theme_options['kb-cat-display-order'] != '' ) {
	$cat_display_order = $theme_options['kb-cat-display-order'];
}
if( isset($theme_options['kb-cat-display-order-by']) &&  $theme_options['kb-cat-display-order-by'] != '' ) {
	$cat_display_order_by = $theme_options['kb-cat-display-order-by'];
}
if( isset($theme_options['kb-cat-sidebar-position']) &&  $theme_options['kb-cat-sidebar-position'] != '' ) {
	$cat_sidebar_position = $theme_options['kb-cat-sidebar-position'];
}

if( $theme_options['kb-cat-sidebar-status'] == true ) { 
	$col_content = 12;
} else {
	$col_content = 8;
	if( $theme_options['theme_widget_width_size_global'] == 1 ) {
		$col_content = 9;
	}
}

if( $theme_options['kb-cat-sidebar-status'] == true && $theme_options['kb-cat-content-center'] == true ) $col_css = 'col-md-10 col-sm-12 col-xs-12 col-md-offset-1';
else $col_css = 'col-md-'.esc_html($col_content).' col-sm-12';

/***************************
**** GET CURRENT CAT ID ****
****************************/
$st_term_data =	$wp_query->queried_object;
$term_slug = get_query_var( 'term' );
$current_term = get_term_by( 'slug', $term_slug, 'manualknowledgebasecat' );
$check_if_login_call = get_option( 'kb_cat_check_login_'.$current_term->term_id );
$check_user_role = get_option( 'kb_cat_user_role_'.$current_term->term_id );
$custom_login_message = get_option( 'kb_cat_login_message_'.$current_term->term_id );
$term_id = $current_term->term_id;
?>

<!-- /start container -->
<div class="container content-wrapper body-content">
<div class="row margin-top-btm-50">


<?php 

/*********************
**** SIDEBAR LEFT ****
**********************/
if( $theme_options['kb-cat-sidebar-status'] != true && $cat_sidebar_position == 'left' ) { 
	get_template_part('sidebar', 'kb'); 
} 

/*******************************
**** CATEGORY ACCESS CONTROL ****
********************************/
if( $check_if_login_call == 1 && !is_user_logged_in() ) { 
	echo '<div class="col-md-'.esc_html($col_content).' col-sm-12">';
	manual__login_forum($custom_login_message);
	echo '</div>';
	
} else { 

	/****************************************************
	**** LOGIN LEVEL (SUFFICIENT ACCESS LEVEL) CHECK ****
	*****************************************************/
	$access_status = manual_doc_access($check_user_role);
	if( $access_status == false ) { 
		echo '<div class="'.esc_attr($col_css).'"><div class="doc_access_control"><p>';
		echo esc_html($theme_options['kb-cat-page-access-control-message']);
		echo '</p></div></div>';
	} else {
		
		/************************
		**** ARTICLE SECTION ****
		*************************/
		echo '<div class="'.esc_attr($col_css).' kb-rtl-right">';
		
		
		/**********************************
		** STYLE - 2 ROOT CATEGORY TITLE **
		***********************************/
		if( isset($theme_options['kb-catpg-display-style']) && $theme_options['kb-catpg-display-style'] == 2 ) {
			$root_cat_icon = get_option( 'kb_cat_icon_name_'.$current_term->term_id );
			echo '<div class="kb-subcat-cssfix">';
				echo '<div class="kb_style1_box cat_pgstyle2_fix"><div class="wrap_stylekb">
						<!--icon or image-->
						<div class="icon_image_kbstyle">';
				echo '<i class="'.( ( isset($root_cat_icon) && $root_cat_icon != '' )?esc_attr($root_cat_icon):'icon-briefcase').'" style="color:'.esc_attr($theme_options['kb-cat-design2-icon-color']['color']).';font-size:55px;"></i>';
				echo '</div>
					  <!--Content-->
					  <div class="kbcontent">';
						
				$cat_title = $current_term->name; 
				html_entity_decode($cat_title, ENT_QUOTES, "UTF-8");		
				echo '<h4 class="root_cat_css" style="color: inherit;"><a href="'.esc_url(get_term_link($current_term->slug, 'manualknowledgebasecat')).'">
					  '.esc_html(html_entity_decode($cat_title, ENT_QUOTES, "UTF-8")).'</a></h4>';
				if( $theme_options['knowledgebase-remove-subcategory-description'] == false ) { echo '<p>'.esc_html($current_term->description).'</p>'; }
			  
				// User Avator
				$authors = manual__get_authors_in_category($current_term->term_id);
				echo '<div class="vckbpostauthors"> <ul>';
				foreach ( $authors as $key=>$val ) {
					echo '<li><img src=" '.esc_url($val).' " ></li>';
				}
				echo '</ul>
					  <div class="item-info">
					  <a href="'. esc_url(get_term_link($current_term, 'manualknowledgebasecat')).'" class="custom-link"> '. esc_html($current_term->count) .'&nbsp; '.(esc_html($theme_options['kb-cat-design2-aitc-text'])).'</a> <br><span style="color:'.esc_attr($theme_options['kb-cat-design2-metabox-color']['color']).'">'.esc_html($theme_options['kb-cat-design2-wby-text']).'</span> <span class="post_autname" style="color:'.esc_attr($theme_options['kb-cat-design2-metabox-color']['color']).'">';
						
						$author_count = count($authors);
						foreach ( $authors as $key=>$val ) {
							if( $author_count  > 1 ) $comma = ',';
							else $comma = '';
							echo esc_html($key).''.esc_html($comma).'&nbsp;';
						}			
						
				echo '</span></div> </div>';  
				// Eof User Avator	
				
				echo '</div></div></div>';
				echo '</div>';
		}
		/*****************************************
		** EOF STYLE - 2 EOF ROOT CATEGORY TILE **
		******************************************/
		

		/***************************
		 DISPLAY ALL CHILD CATEGORY
		****************************/
		if( $theme_options['all-child-cat-post-in-root-category'] == false ) {
			if( !is_paged() ) { 
			
			// CHILD CAT !! CHEK IF THERE IS ANY
			$st_subcat_args = array(
			  'orderby' => 'name',
			  'order'   => 'ASC',
			  'child_of' => $term_id,
			  'parent' => $term_id
			);
			
			$st_sub_categories = get_terms('manualknowledgebasecat', $st_subcat_args);
			if ($st_sub_categories) {
				
				$check_no_of_records = count($st_sub_categories);
				if( $check_no_of_records > 1 && (isset($theme_options['kb-catpg-display-style']) && $theme_options['kb-catpg-display-style'] == 1 ))  {
					$apply_masonry_grid = 'masonry-grid-inner';
				} else {  
					$apply_masonry_grid = '';
				}
				
				echo '<div class="'.esc_attr($apply_masonry_grid).' margin-btm-25" style="clear:both;">';
				
				// If the category has sub categories 
				$st_subcat_args = array(
					'orderby' => 'name',
					'order'   => 'ASC',
					'child_of' => $term_id,
					'parent' => $term_id
				);
				$st_sub_categories = get_terms('manualknowledgebasecat', $st_subcat_args); 
				$st_sub_categories_count = count($st_sub_categories);
				if( $st_sub_categories_count == 1 ) { 
					$col_md_sm = 12;
					$col_sm = 12;
				} else { 
					$col_md_sm = 6; 
					$col_sm = 12;
				}
				
				//Check colm settings style - default
				$gridlayoutstyle1_col_1_css = $liborderlayoutstyle1_col_1_css = '';
				if( isset($theme_options['kb-catpg-display-style']) && $theme_options['kb-catpg-display-style'] == 1 ) {
					if( $theme_options['kb-catpg-display-style-one-col-layout'] == 1 ) {
						$col_md_sm = 12;
						if($theme_options['kb-catpg-display-style-one-col-layout-grid-style'] == true) {
							$gridlayoutstyle1_col_1_css = 'gridstyle';	
						}
						if( $theme_options['kb-catpg-display-style-one-col-layout-li-applyborder'] == true ) {
							$liborderlayoutstyle1_col_1_css = 'liborder';
						}
					}
				}
				
				$i = 0;
				foreach($st_sub_categories as $st_sub_category) {
					
					// check - access level 
					$check_if_access_call_for_subcat = get_option( 'kb_cat_check_login_'.$st_sub_category->term_id );
					$check_user_role = get_option( 'kb_cat_user_role_'.$st_sub_category->term_id );
					$custom_login_message = get_option( 'kb_cat_login_message_'.$st_sub_category->term_id );
					
					$cat_icon_name = get_option( 'kb_cat_icon_name_'.$st_sub_category->term_id );
					if( isset( $cat_icon_name ) && $cat_icon_name != '' ) {
						$cat_icon_name = $cat_icon_name;
					} else {
						$cat_icon_name = 'icon-briefcase';
					}
					
					// STYLE - 2
					if( isset($theme_options['kb-catpg-display-style']) && $theme_options['kb-catpg-display-style'] == 2 ) {
						if( $i == 0 ) echo '<div style="border:1px solid rgba(222, 220, 220, 0.4); margin-bottom: 40px; clear: both;"></div>';
						echo '<div class="kb-subcat-cssfix">';
						echo '<div class="kb_style1_box cat_pgstyle2_fix"><div class="wrap_stylekb">
								<!--icon or image-->
								<div class="icon_image_kbstyle">';
						echo '<i class="'.esc_attr($cat_icon_name).'" style="color:'.esc_attr($theme_options['kb-cat-design2-icon-color']['color']).';font-size:55px;"></i>';
						echo '</div>
						      <!--Content-->
							  <div class="kbcontent">';
								
						$cat_title = $st_sub_category->name; 
						html_entity_decode($cat_title, ENT_QUOTES, "UTF-8");		
						echo '<h4 class="root_cat_css" style="color: inherit;"><a href="'.esc_url(get_term_link($st_sub_category->slug, 'manualknowledgebasecat')).'">
						      '.esc_html(html_entity_decode($cat_title, ENT_QUOTES, "UTF-8")).'</a></h4>';
						if( $theme_options['knowledgebase-remove-subcategory-description'] == false ) { echo '<p>'.esc_html($st_sub_category->description).'</p>'; }
					  
						// User Avator
						$authors = manual__get_authors_in_category($st_sub_category->term_id);
						echo '<div class="vckbpostauthors"> <ul>';
						foreach ( $authors as $key=>$val ) {
							echo '<li><img src=" '.esc_html($val).' " ></li>';
						}
						echo '</ul>
							  <div class="item-info">
							  <a href="'. esc_url(get_term_link($st_sub_category, 'manualknowledgebasecat')).'" class="custom-link"> '. esc_html($st_sub_category->count) .'&nbsp; '.esc_html($theme_options['kb-cat-design2-aitc-text']).'</a> <br><span style="color:'.esc_attr($theme_options['kb-cat-design2-metabox-color']['color']).'">'.esc_html($theme_options['kb-cat-design2-wby-text']).'</span> <span class="post_autname" style="color:'.esc_attr($theme_options['kb-cat-design2-metabox-color']['color']).'">';
								
								$author_count = count($authors);
								foreach ( $authors as $key=>$val ) {
									if( $author_count  > 1 ) $comma = ',';
									else $comma = '';
									echo esc_html($key).''.esc_html($comma).'&nbsp;';
								}			
								
						echo '</span></div> </div>';  
						// Eof User Avator	
						
						echo '</div></div></div>';
						echo '</div>';
						
					} else {  
					// STYLE - DEFAULT
					
						echo '<div class="col-md-'.esc_attr($col_md_sm).' col-sm-'.esc_attr($col_sm).' masonry-item kb-subcat-cssfix">';
						echo '<div class="knowledgebase-body">';
						
						if( isset($cat_icon_name) && $cat_icon_name != '' ) { 
							echo '<div class="kb-masonry-icon"><h5><i class="'.esc_attr($cat_icon_name).'" style="color:'.esc_attr($theme_options['kb-cat-design2-icon-color']['color']).';"></i></h5></div><div class="vc-kb-masonry-tag-right">';
						}
						
						echo '<h5><a href="'.esc_url(get_term_link($st_sub_category->slug, 'manualknowledgebasecat')).'">';
						$cat_title = $st_sub_category->name; 
						echo esc_html(html_entity_decode($cat_title, ENT_QUOTES, "UTF-8"));
						echo '</a></h5>';
						
						if( $theme_options['knowledgebase-remove-subcategory-description'] == false ) { 
							echo category_description($st_sub_category->term_id); 
						}
						
						if( isset($cat_icon_name) && $cat_icon_name != '' ) { echo '</div>'; }
						
						echo '<span class="separator small"></span>';
						
						
						if( $check_if_access_call_for_subcat == 1 && !is_user_logged_in() ) { 
							echo manual_get_login_form_control($custom_login_message);
						} else {
							
							/****************************************************
							**** LOGIN LEVEL (SUFFICIENT ACCESS LEVEL) CHECK ****
							*****************************************************/
							$access_status = manual_doc_access($check_user_role);
							if( $access_status == false ) { 
								echo '<div class="doc_access_control"><p>';
								echo esc_attr($theme_options['kb-cat-page-access-control-message']);
								echo '</p></div>';
							} else {
						
								echo '<ul class="kbse '.$gridlayoutstyle1_col_1_css.'">';
								if( isset( $theme_options['kb-noof-subcat-records-percat'] ) && $theme_options['kb-noof-subcat-records-percat'] != '' ) {
									$display_on_of_records_under_cat = $theme_options['kb-noof-subcat-records-percat'];	
								} else {
									$display_on_of_records_under_cat = '5';	
								}
								  
								// Get posts per category
								$args = array( 
									'numberposts' => $display_on_of_records_under_cat, 
									'post_type'  => 'manual_kb',
									'orderby' => $cat_display_order_by,
									'order'  => $cat_display_order,
									'tax_query' => array(
										array(
											'taxonomy' => 'manualknowledgebasecat',
											'field' => 'id',
											'include_children' => false,
											'terms' => $st_sub_category->term_id
										)
									)
								);
								$st_cat_posts = get_posts( $args );
								foreach( $st_cat_posts as $post ) {
									
									// control article access
									$subcat_access_status =  manual__gobal_article_access_chk($post->ID);
									// eof control article access	
										
									if( $subcat_access_status == true ) {	
										$format = get_post_format( $post->ID );	
										echo '<li class="cat inner '.$liborderlayoutstyle1_col_1_css.' '.$format.'"> <a href="'.esc_url(get_the_permalink()).'">';
											$org_title = get_the_title(); 
										echo esc_html(html_entity_decode($org_title, ENT_QUOTES, "UTF-8"));
										echo '</a> </li>';
									}
									
								} 
						
								echo '</ul>';
								if( $theme_options['knowledgebase-remove-subcategory-readmore'] == false ) {
								echo '<div style="padding:10px 0px;"> <a href="'.esc_url(get_term_link($st_sub_category->slug, 'manualknowledgebasecat')).'"  class="custom-link hvr-icon-wobble-horizontal kblnk">'.esc_html($theme_options['kb-cat-view-all']).'&nbsp;'. esc_html($st_sub_category->count) .' &nbsp;&nbsp;<i class="fa fa-arrow-right hvr-icon"></i> </a> </div>';
								}
						
						}}// End of access call
						
						echo '</div>';
						echo '</div>';
					
					} // EOF STYLE - DEFAULT
					
			  
				$i++; }
				
				echo '</div>';
			} 
			wp_reset_postdata();
			}
		}


		/******************************
		 DISPLAY ROOT CATEGORY RECORDS
		*******************************/
		$paged_no = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args = array(
			'post_type' => 'manual_kb',
			'paged' => $paged_no,
			'posts_per_page' => (isset($theme_options['kb-noof-records-catper-page'])?$theme_options['kb-noof-records-catper-page']:'-1'),
			'order'  => $cat_display_order,
			'orderby' => $cat_display_order_by,
			'tax_query' => array(
					array(
						'taxonomy' => 'manualknowledgebasecat',
						'field' => 'slug',
						'include_children' => (($theme_options['all-child-cat-post-in-root-category'] == false)? false : true ), //false,
						'terms' => $term_slug
						)
					),
						
		);
		$wp_query = new WP_Query($args);
		if($wp_query->have_posts()) :  
			echo '<div class="clearfix margin-btm-25 rtl-kbcatbody-fix" style="padding-left:1px; clear:both;">'; 
			echo '<div class="knowledgebase-cat-body">';
			if ( have_posts() ) {
				while($wp_query->have_posts()) : $wp_query->the_post();
				
				// control article access
				$access_status =  manual__gobal_article_access_chk($post->ID);
				// eof control article access
				
				if( $access_status == true ) {
				// STYLE - 2
				if( isset($theme_options['kb-catpg-display-style']) && $theme_options['kb-catpg-display-style'] == 2 ) {
					echo '<div class="kb-categorypg-style2" style="background:'.esc_attr($theme_options['kb-cat-design2-articleboxbg-color']['rgba']).'!important;">';
					echo '<div class="kb-box-single">';
					echo '<h4><a href="'.esc_url(get_the_permalink()).'">';
					$org_title = get_the_title(); 
					echo esc_html(html_entity_decode($org_title, ENT_QUOTES, "UTF-8"));
					echo '</a></h4>';
					if($theme_options['knowledgebase-cat-style1-post-excerpt'] == true) {
					echo '<p class="customkb_excerpt" style="color:'.esc_attr($theme_options['kb-cat-design2-articles-excerpt-color']['color']).'">'.manual__get_excerpt_trim(( (isset($theme_options['kb-cat-design2-articles-excerpt-trim']) && ($theme_options['kb-cat-design2-articles-excerpt-trim']) != '')?esc_html($theme_options['kb-cat-design2-articles-excerpt-trim']):25), '...').'</p>';
					}
					// author
					echo '<div class="vckbpostauthors" style="margin-top: 0px;">';
                    $userID =  get_the_author_meta( 'ID', $post->post_author ); 
					echo '<ul><li><img src="'. esc_url(get_avatar_url($userID)) .'"></li></ul>';
					echo '<div class="item-info" style="color:'.esc_attr($theme_options['kb-cat-design2-metabox-color']['color']).'">';
                    echo esc_html($theme_options['kb-cat-design2-wby-text']).' <span class="post_autname">'.esc_html(get_the_author()).'</span>'; 
                    echo '<br>';
					echo esc_html(get_the_date());
                    echo '</div>';
                    echo '</div>';
					// Eof author
					echo '</div>';
					echo '</div>';
					
				// STYLE - 1	
				} else {
					$format = get_post_format($post->ID);
					if( $theme_options['knowledgebase-cat-quick-stats-under-title-appear-right'] == true ) {
						echo '<div class="kb-box-single style_three '.((isset($format) && $format != '')? esc_html($format) : '').'">';
							echo '<div class="kb_wrap">';
								echo '<div class="entry-header">';
									echo '<h4><a href="'.esc_url(get_the_permalink()).'">';
									$org_title = get_the_title(); 
									echo esc_html(html_entity_decode($org_title, ENT_QUOTES, "UTF-8"));
									echo '</a></h4>';
								echo '</div>';
								echo '<div class="meta">';
									manual__kb_catag_belowtitle_meta_section($post->ID);
								echo '</div>';
							echo '</div>';
							
							if($theme_options['knowledgebase-cat-style1-post-excerpt'] == true) {
								echo '<p class="customkb_excerpt" style="color:'.esc_attr($theme_options['kb-cat-design2-articles-excerpt-color']['color']).';">'.manual__get_excerpt_trim(( (isset($theme_options['kb-cat-design2-articles-excerpt-trim']) && ($theme_options['kb-cat-design2-articles-excerpt-trim']) != '')?esc_html($theme_options['kb-cat-design2-articles-excerpt-trim']):25), '...').'</p>';
							}
						echo '</div>';
					} else {
						echo '<div class="kb-box-single '.((isset($format) && $format != '')? esc_html($format) : '').'">';
						echo '<h4 style="margin-bottom:5px;"><a href="'.esc_url(get_the_permalink()).'">';
						$org_title = get_the_title(); 
						echo esc_html(html_entity_decode($org_title, ENT_QUOTES, "UTF-8"));
						echo '</a></h4>';
						manual__kb_catag_belowtitle_meta_section($post->ID);
						if($theme_options['knowledgebase-cat-style1-post-excerpt'] == true) {
							echo '<p class="customkb_excerpt" style="margin-top: -5px; color:'.esc_attr($theme_options['kb-cat-design2-articles-excerpt-color']['color']).'">'.manual__get_excerpt_trim(( (isset($theme_options['kb-cat-design2-articles-excerpt-trim']) && ($theme_options['kb-cat-design2-articles-excerpt-trim']) != '')?esc_html($theme_options['kb-cat-design2-articles-excerpt-trim']):25), '...').'</p>';
						}
						echo '</div>';
					}
				}
				// EOF STYLE
				}
				
				
				
				endwhile; 
		  
				// Previous/next page navigation.
				the_posts_pagination( array(
					'prev_text'          => esc_html__( '&lt;', 'manual' ),
					'next_text'          => esc_html__( '&gt;', 'manual' ),
				) ); 
				
				wp_reset_postdata();
	
			} else {
				 esc_html_e( 'Sorry, no posts were found', 'manual' );
			}			
    
  		echo '</div></div>';
 	endif; 
	echo '</div>';
	} // eof else
}// eof else 


/*********************
**** SIDEBAR RIGHT ****
**********************/
if( $theme_options['kb-cat-sidebar-status'] != true && $cat_sidebar_position == 'right' ) { 
	get_template_part('sidebar', 'kb'); 
} 

?>
</div>
</div>
<?php
/***************
**** FOOTER ****
****************/
get_footer(); 
?>