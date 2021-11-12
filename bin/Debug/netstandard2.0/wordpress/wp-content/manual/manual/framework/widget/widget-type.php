<?php 
/**
* Add Custom Widget
*/

/*************************
Custom KB Category Widget
**************************/
class manual_custom_kb_cat extends WP_Widget {
	
	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'kb_custom_cat_widget',
		// Widget name will appear in UI
		esc_html__('KB Custom Category', 'manual'),
		// Widget description
		array( 'description' => esc_html__( 'Display custom knowledgebase category', 'manual' ), )
		);
	} // Eof __construct
	
	// This is where the action happens
	public function widget( $args, $instance ) {
		
		global $theme_options;
		if( isset( $theme_options['theme_widget_title_tag'] ) && $theme_options['theme_widget_title_tag'] != '' ) {
			$global_widget_title_tag = $theme_options['theme_widget_title_tag'];	
		} else {
			$global_widget_title_tag = 'h5';
		}
		
		$title = apply_filters( 'widget_title', $instance['title'] );
		// before and after widget arguments are defined by themes
		
		echo wp_kses_post($args['before_widget']);
			echo '<div class="display-faq-section">';
				if ( ! empty( $title ) ) echo '<'.$global_widget_title_tag.' class="widget-title widget-custom"><span>' . $title . '</span></'.$global_widget_title_tag.'>';
				
					if( $instance['cat_list'] != '' ) {
					 echo '<ul>';
					   wp_list_categories( array(
						  'orderby' => 'name',
						  //'show_count' => $show_count,
						  'pad_counts' => 0,
						  'hierarchical' => false,
						  'taxonomy' => 'manualknowledgebasecat',
						  'title_li' => '',
						  'include' => $instance['cat_list'],
						) );
					 echo '</ul>';
					}
				
			echo '<div style="clear:both"></div>';
			echo '</div>';
		echo wp_kses_post($args['after_widget']);
	}
	
	// Widget Backend
	public function form( $instance ) {
		
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		} else {
			$title = esc_html__( 'New title', 'manual' );
		}
		
		$select = array();
		if ( isset( $instance[ 'cat_list' ] ) ) {
			$select = $instance[ 'cat_list' ];
		}
		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'manual' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		
        <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'cat_list' )); ?>"><?php esc_html_e( 'Select Category:', 'manual' ); ?></label>
		 <?php 
			 $cat_list = get_categories( array( 'taxonomy' => 'manualknowledgebasecat' ) );
			 
			printf (
                '<select multiple="multiple" name="%s[]" id="%s" class="widefat" size="15" style="margin:10px 0px">',
                $this->get_field_name('cat_list'),
                $this->get_field_id('cat_list')
            );

            // Each individual option
            foreach( $cat_list as $cat )
            {
                printf(
                    '<option value="%s" %s style="margin-bottom:3px;">%s</option>',
                    $cat->cat_ID,
                    in_array( $cat->cat_ID, $select) ? 'selected="selected"' : '',
                    $cat->cat_name
                );
            }

            echo '</select>';
			 
		 ?>
         </p>
         
         <?php 
		
	} // Eof public form
	
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['cat_list'] = ( ! empty( $new_instance['cat_list'] ) ) ? esc_sql( $new_instance['cat_list'] ) : '';
		return $instance;
	}
	
}// Eof Class manual_custom_kb_cat

// Register and load the widget
if (!function_exists('manual_custom_kb_cat_widget')) {
	function manual_custom_kb_cat_widget() { 
		register_widget( 'manual_custom_kb_cat' ); 
	}
	add_action( 'widgets_init', 'manual_custom_kb_cat_widget' );
}


/**********
FAQ WIDGET
***********/
class manual_faq extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'faq_cat_widget',
		// Widget name will appear in UI
		esc_html__('FAQ Categroy', 'manual'),
		// Widget description
		array( 'description' => esc_html__( 'Faq records based on category', 'manual' ), )
		);
	}
	// This is where the action happens
	public function widget( $args, $instance ) {
		
		global $theme_options;
		if( isset( $theme_options['theme_widget_title_tag'] ) && $theme_options['theme_widget_title_tag'] != '' ) {
			$global_widget_title_tag = $theme_options['theme_widget_title_tag'];	
		} else {
			$global_widget_title_tag = 'h5';
		}
		
		$title = apply_filters( 'widget_title', $instance['title'] );
		if( $instance['cat_count'] == 1 ) { $show_count = 1; } else { $show_count = 0; }
		if( $instance['cat_hierarchy'] == 1 ) { $cat_hierarchy = 1; } else { $cat_hierarchy = 0; }
		// before and after widget arguments are defined by themes
		
		echo wp_kses_post($args['before_widget']);
			echo '<div class="display-faq-section">';
				if ( ! empty( $title ) ) echo '<'.$global_widget_title_tag.' class="widget-title widget-custom"><span>' . $title . '</span></'.$global_widget_title_tag.'>';
				
				$customPostTaxonomies = get_object_taxonomies('manual_faq');
				if(count($customPostTaxonomies) > 0) {    
					 echo '<ul>';
					 foreach($customPostTaxonomies as $tax) {
						$cat_op = wp_list_categories( array(
							  'orderby' => 'name',
							  'show_count' => $show_count,
							  'pad_counts' => 0,
							  'hierarchical' => $cat_hierarchy,
							  'taxonomy' => $tax,
							  'title_li' => '',
							  'echo' => 0,
							) );
						$cat_op = str_replace('</a> (', '</a> <span class="count-span">', $cat_op);
						echo str_replace(')', '</span>', $cat_op);
					 }	
					 echo '</ul>';
				}
			echo '<div style="clear:both"></div>';
			echo '</div>';
		echo wp_kses_post($args['after_widget']);
	}
	// Widget Backend
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		} else {
			$title = esc_html__( 'New title', 'manual' );
		}
		
		$cat_count = (isset($instance[ 'cat_count' ])?$instance[ 'cat_count' ]:'');
		$cat_hierarchy = (isset($instance[ 'cat_hierarchy' ])?$instance[ 'cat_hierarchy' ]:''); 
		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'manual' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		
		<p>
			<input name="<?php echo esc_attr($this->get_field_name( 'cat_count' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'cat_count' )); ?>" type="checkbox" value="1" <?php if( $cat_count == 1 ){ echo 'checked'; } ?> />
			<label for="<?php echo esc_attr($this->get_field_id( 'cat_count' )); ?>"><?php esc_html_e( 'Show post counts', 'manual' ); ?></label>
		</p>

		<p>
			<input name="<?php echo esc_attr($this->get_field_name( 'cat_hierarchy' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'cat_hierarchy' )); ?>" type="checkbox" value="1" <?php if( $cat_hierarchy == 1 ){ echo 'checked'; } ?> />
			<label for="<?php echo esc_attr($this->get_field_id( 'cat_hierarchy' )); ?>"><?php esc_html_e( 'Show hierarchy', 'manual' ); ?></label>
		</p>


		<?php		
	}
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['cat_dropdown'] = ( ! empty( $new_instance['cat_dropdown'] ) ) ? strip_tags( $new_instance['cat_dropdown'] ) : '';
		$instance['cat_count'] = ( ! empty( $new_instance['cat_count'] ) ) ? strip_tags( $new_instance['cat_count'] ) : '';
		$instance['cat_hierarchy'] = ( ! empty( $new_instance['cat_hierarchy'] ) ) ? strip_tags( $new_instance['cat_hierarchy'] ) : '';
		return $instance;
	}

} // Class wpb_widget ends here
 
// Register and load the widget
if (!function_exists('manual_load_faq_widget')) {
	function manual_load_faq_widget() { 
		register_widget( 'manual_faq' ); 
	}
	add_action( 'widgets_init', 'manual_load_faq_widget' );
}


/********************
KnowledgeBase WIDGET
**********************/
class manual_kbse extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'kb_cat_widget',
		// Widget name will appear in UI
		esc_html__('KB Categroy', 'manual'),
		// Widget description
		array( 'description' => esc_html__( 'KB records based on category', 'manual' ), )
		);
	}
	// This is where the action happens
	public function widget( $args, $instance ) {
		
		global $theme_options, $post;
		if( isset( $theme_options['theme_widget_title_tag'] ) && $theme_options['theme_widget_title_tag'] != '' ) {
			$global_widget_title_tag = $theme_options['theme_widget_title_tag'];	
		} else {
			$global_widget_title_tag = 'h5';
		}
		
		$title = apply_filters( 'widget_title', $instance['title'] );
		if( $instance['cat_count'] == 1 ) { $show_count = 1; } else { $show_count = 0; }
		if( $instance['cat_hierarchy'] == 1 ) { $cat_hierarchy = 1; } else { $cat_hierarchy = 0; }
		// before and after widget arguments are defined by themes
		
		echo wp_kses_post($args['before_widget']);
		
			echo '<div class="display-faq-section">';
				if ( ! empty( $title ) ) echo '<'.$global_widget_title_tag.' class="widget-title widget-custom"><span>' . $title . '</span></'.$global_widget_title_tag.'>';
				
			if( !is_admin() ) { 
				//$customPostTaxonomies = get_object_taxonomies('manual_kb');
				// Select current cat
				$currentKBID = '';
				$terms_kb_selectCatID = get_the_terms( $post->ID, 'manualknowledgebasecat' );
				//print_r($terms_kb_selectCatID); 
				if ( isset($terms_kb_selectCatID) && $terms_kb_selectCatID != null ){  
					$currentKBID = array();
					foreach( $terms_kb_selectCatID as $terms_kb_selectCatID ) {
						$currentKBID[] = $terms_kb_selectCatID->term_taxonomy_id;
						unset($terms_kb_selectCatID);
					}
					//print_r($currentKBID);
					if( (array) !empty($currentKBID) ) {
						$kbcatID = implode(",",$currentKBID);
					} else {
						$kbcatID = 0;
					}
				} else {
					$kbcatID = 0;
				}
					 echo '<ul>';
						 $cat_op = wp_list_categories( array(
							  'orderby' => 'name',
							  'show_count' => $show_count,
							  'pad_counts' => 0,
							  'hierarchical' => $cat_hierarchy,
							  'taxonomy' => 'manualknowledgebasecat',
							  'current_category' => $kbcatID,
							  'title_li' => '',
							  'echo' => 0,
							) );
						$cat_op = str_replace('</a> (', '</a> <span class="count-span">', $cat_op);
						echo str_replace(')', '</span>', $cat_op);
					 echo '</ul>';
			} else {
				echo esc_html__('No preview available.', 'manual');
			}		 
			echo '<div style="clear:both"></div>';
			echo '</div>';
			echo wp_kses_post($args['after_widget']);
	}
         
	// Widget Backend
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		} else {
			$title = esc_html__( 'New title', 'manual' );
		}
		
		$cat_count = (isset($instance[ 'cat_count' ])?$instance[ 'cat_count' ]:'');
		$cat_hierarchy = (isset($instance[ 'cat_hierarchy' ])?$instance[ 'cat_hierarchy' ]:'');
		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'manual' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		
		<p>
			<input name="<?php echo esc_attr($this->get_field_name( 'cat_count' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'cat_count' )); ?>" type="checkbox" value="1" <?php if( $cat_count == 1 ){ echo 'checked'; } ?> />
			<label for="<?php echo esc_attr($this->get_field_id( 'cat_count' )); ?>"><?php esc_html_e( 'Show post counts', 'manual' ); ?></label>
		</p>

		<p>
			<input name="<?php echo esc_attr($this->get_field_name( 'cat_hierarchy' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'cat_hierarchy' )); ?>" type="checkbox" value="1" <?php if( $cat_hierarchy == 1 ){ echo 'checked'; } ?> />
			<label for="<?php echo esc_attr($this->get_field_id( 'cat_hierarchy' )); ?>"><?php esc_html_e( 'Show hierarchy', 'manual' ); ?></label>
		</p>


		<?php		
	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['cat_dropdown'] = ( ! empty( $new_instance['cat_dropdown'] ) ) ? strip_tags( $new_instance['cat_dropdown'] ) : '';
		$instance['cat_count'] = ( ! empty( $new_instance['cat_count'] ) ) ? strip_tags( $new_instance['cat_count'] ) : '';
		$instance['cat_hierarchy'] = ( ! empty( $new_instance['cat_hierarchy'] ) ) ? strip_tags( $new_instance['cat_hierarchy'] ) : '';
		return $instance;
	}

} // Class wpb_widget ends here
 
// Register and load the widget
if (!function_exists('manual_load_kb_widget')) {
	function manual_load_kb_widget() { 
		register_widget( 'manual_kbse' ); 
	}
	add_action( 'widgets_init', 'manual_load_kb_widget' );
}


/*****************************
Knowledge Base Article WIDGET
******************************/
class manual_kb_articles extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'kb_article_widget',
		// Widget name will appear in UI
		esc_html__('KB Articles', 'manual'),
		// Widget description
		array( 'description' => esc_html__( 'KB articles (latest, popular, top rated and the most commented articles)', 'manual' ), )
		);
	}
	
	// This is where the action happens
	public function widget( $args, $instance ) {
		global $theme_options, $post, $wpdb;

		if( isset( $theme_options['theme_widget_title_tag'] ) && $theme_options['theme_widget_title_tag'] != '' ) {
			$global_widget_title_tag = $theme_options['theme_widget_title_tag'];	
		} else {
			$global_widget_title_tag = 'h5';
		}
		
		$title = apply_filters( 'widget_title', $instance['title'] );
		$knowledgebase_article_number = $instance['article_number'];
		$knowledgebase_article_order = $instance[ 'article_order' ];
		
		if( isset($knowledgebase_article_number) && $knowledgebase_article_number != '' ) {
			$no_of_records = $knowledgebase_article_number;
		} else {
			$no_of_records = 5;
		}
		
		if ( is_user_logged_in() && (isset($_GET['preview']) && $_GET['preview'] == true) ) {
			$meta_value_num = '';
		} else {
			$meta_value_num = 'meta_value_num';
		}
		
		if(  isset($instance[ 'display_type' ]) && $instance[ 'display_type' ] == 1 ) { // Latest Article
			$kb_args = array( 
						'posts_per_page' => $no_of_records, 
						'post_type'  => 'manual_kb',
						'orderby' => 'date',
						'order'	=>	$knowledgebase_article_order,
					);
			
		} else if(  isset($instance[ 'display_type' ]) && $instance[ 'display_type' ] == 2 ) { // Popular Article (//echo get_locale();)
			$kb_args = array( 
							'posts_per_page' => $knowledgebase_article_number, 
							'post_type'  => 'manual_kb',
							'orderby' => $meta_value_num,
							'order'	=>	$knowledgebase_article_order,
							'meta_key' => 'manual_post_visitors',
						);
			
		} else if(  isset($instance[ 'display_type' ]) && $instance[ 'display_type' ] == 3 ) { // Top Rated Article
			$kb_args = array( 
					'posts_per_page' => $knowledgebase_article_number, 
					'post_type'  => 'manual_kb',
					'orderby' => $meta_value_num,
					'order'	=>	$knowledgebase_article_order,
					'meta_key' => 'votes_count_doc_manual',
				);
			
		} else if(  isset($instance[ 'display_type' ]) && $instance[ 'display_type' ] == 4 ) { // Most Commented Article
			$kb_args = array( 
							'posts_per_page' => $no_of_records, 
							'post_type'  => 'manual_kb',
							'orderby' => 'comment_count',
							'order'	=>	$knowledgebase_article_order,
						);
		} else if(  isset($instance[ 'display_type' ]) && $instance[ 'display_type' ] == 5 ) { // Recently Updated Article
			$kb_args = array( 
							'posts_per_page' => $no_of_records, 
							'post_type'  => 'manual_kb',
							'orderby' => 'modified',
							'order'	=>	$knowledgebase_article_order,
						);
		}
		
		echo wp_kses_post($args['before_widget']);
		echo '<div class="kb_article_type display-faq-section">';
			if ( ! empty( $title ) ) echo '<'.$global_widget_title_tag.' class="widget-title widget-custom"><span>' . $title . '</span></'.$global_widget_title_tag.'>';
		$kb_article_query = new WP_Query($kb_args);
		echo '<ul class="clearfix">';
		if ($kb_article_query->have_posts()) : while ($kb_article_query->have_posts()) : $kb_article_query->the_post();
		
		// control article access
		$access_status =  manual__gobal_article_access_chk($kb_article_query->post->ID);
		// eof control article access
		
		if( $access_status == true ) {
			$format = get_post_format( $kb_article_query->ID );
			echo '<li class="articles '.( (isset($format) && $format != '')?$format:'' ).'"><a href="'.get_permalink($kb_article_query->post->ID).'" rel="bookmark">'.get_the_title($kb_article_query->post->ID).'</a></li>';
		}
		
		
		endwhile; endif;
		echo '</ul>'; 
		
		wp_reset_postdata();
		echo '</div>';
		echo wp_kses_post($args['after_widget']);
	}
	
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['display_type'] = ( ! empty( $new_instance['display_type'] ) ) ? strip_tags( $new_instance['display_type'] ) : '';
		$instance['article_number'] = ( ! empty( $new_instance['article_number'] ) ) ? strip_tags( $new_instance['article_number'] ) : '';
		$instance['article_order'] = ( ! empty( $new_instance['article_order'] ) ) ? strip_tags( $new_instance['article_order'] ) : '';
		return $instance;
	}
	
	// Widget Backend
	public function form( $instance ) {
		
		// title
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		} else {
			$title = esc_html__( 'New title', 'manual' );
		}
		
		// display
		$latest_article = $popular_article = $top_rated_article = $most_commented_article = $recently_updated_article = '';
		if(  isset($instance[ 'display_type' ]) && $instance[ 'display_type' ] == 1 ) $latest_article = 'selected';
		else if(  isset($instance[ 'display_type' ]) && $instance[ 'display_type' ] == 2 ) $popular_article = 'selected';
		else if(  isset($instance[ 'display_type' ]) && $instance[ 'display_type' ] == 3 ) $top_rated_article = 'selected';
		else if(  isset($instance[ 'display_type' ]) && $instance[ 'display_type' ] == 4 ) $most_commented_article = 'selected';
		else if(  isset($instance[ 'display_type' ]) && $instance[ 'display_type' ] == 5 ) $recently_updated_article = 'selected';
		
		// article number
		if ( isset( $instance[ 'article_number' ] ) ) {
			$article_number = $instance[ 'article_number' ];
		} else {
			$article_number = 5;
		}
		
		// order
		$ascending_order = $descending_order = '';
		if(  isset($instance[ 'article_order' ]) && $instance[ 'article_order' ] == 'ASC' ) { $ascending_order = 'selected';  }
		else if(  isset($instance[ 'article_order' ]) && $instance[ 'article_order' ] == 'DESC' ) { $descending_order = 'selected';  }

		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'manual' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
        
        <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'Article Display Type' )); ?>"><?php esc_html_e( 'Article Display Type', 'manual' ); ?></label>
        <select id="<?php echo esc_attr($this->get_field_id( 'display_type' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'display_type' )); ?>">
            <option value="1" <?php echo esc_attr($latest_article); ?>>Latest Articles (using date)</option>
            <option value="2" <?php echo esc_attr($popular_article); ?>>Popular Article (using number of views)</option>
            <option value="3" <?php echo esc_attr($top_rated_article); ?>>Top Rated Article (using like)</option>
            <option value="4" <?php echo esc_attr($most_commented_article); ?>>Most Commented Article</option>
            <option value="5" <?php echo esc_attr($recently_updated_article); ?>>Recently Updated Article</option>
        </select>
        </p>
        
        <p>
			<label for="<?php echo esc_attr($this->get_field_id( 'Number of Articles' )); ?>"><?php esc_html_e( 'Number of Articles:', 'manual' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'article_number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'article_number' )); ?>" type="text" value="<?php echo esc_attr( $article_number ); ?>" />
		</p>
        
        
         <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'Article Order' )); ?>"><?php esc_html_e( 'Article Order', 'manual' ); ?></label>
        <select id="<?php echo esc_attr($this->get_field_id( 'article_order' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'article_order' )); ?>">
            <option value="ASC" <?php echo esc_attr($ascending_order); ?>><?php esc_html_e( 'Ascending Order', 'manual' ); ?></option>
            <option value="DESC" <?php echo esc_attr($descending_order); ?>><?php esc_html_e( 'Descending Order', 'manual' ); ?></option>
        </select>
        </p>


		<?php		
	}
	
} // Class wpb_widget ends here
 
// Register and load the widget
if (!function_exists('manual_load_kb_article_widget')) {
	function manual_load_kb_article_widget() { 
		register_widget( 'manual_kb_articles' ); 
	}
	add_action( 'widgets_init', 'manual_load_kb_article_widget' );
}


/*******************************************
KB category articles in single page sidebar 
********************************************/
class manual_kb_cat_article_single_pg extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'kb_single_pg_related_cat_widget',
		// Widget name will appear in UI
		esc_html__('KB Category Articles In Single Page Sidebar', 'manual'),
		// Widget description
		array( 'description' => esc_html__( 'display category articles for all KB single post pages', 'manual' ), )
		);
	}

	// This is where the action happens
	public function widget( $args, $instance ) {
		global $post, $paged, $theme_options, $wp_query;
		
		if( isset($instance[ 'article_order' ]) && $instance[ 'article_order' ] != '' ) {
			$knowledgebase_article_order = $instance[ 'article_order' ];
		} else {
			$knowledgebase_article_order = 'DESC';
		}
		
		if( isset($instance['include_category_post']) && $instance['include_category_post'] == 1 ) { 
			$include_child_post = true; 
		} else { 
			$include_child_post = false; 
		}  
		
		if( isset( $theme_options['theme_widget_title_tag'] ) && $theme_options['theme_widget_title_tag'] != '' ) {
			$global_widget_title_tag = $theme_options['theme_widget_title_tag'];	
		} else {
			$global_widget_title_tag = 'h5';
		}
		
		if( $instance['no_of_category_records'] == '' ) {
			$no_of_category_records = -1;	
		} else {
			$no_of_category_records = $instance['no_of_category_records'];
		}
		
		$post_type = get_post_type();
		if( $post_type == 'manual_kb' && is_single() ) {
		echo wp_kses_post($args['before_widget']);
			echo '<div class="display-faq-section">';
			
				$terms = get_the_terms( $post->ID , 'manualknowledgebasecat' );
				
				$check_if_login_call = get_option( 'kb_cat_check_login_'.$terms[0]->term_id );
				$check_user_role = get_option( 'kb_cat_user_role_'.$terms[0]->term_id );
				$custom_login_message = get_option( 'kb_cat_login_message_'.$terms[0]->term_id );
				if( $check_if_login_call == 1 && !is_user_logged_in() ) {
					$term = array_pop($terms);
					 echo '<div class="knowledgebase-body">
						  <h5><a href="'.get_term_link($term->term_id).'">'.$term->name.'</a> </h5>';
					 echo  manual_get_login_form_control($custom_login_message);
					 echo '</div>';
				} else {
					
					if( !empty($check_user_role) ) $access_status = manual_doc_access(($check_user_role));
					else  $access_status = true;
					
					if( $access_status == false ) {
						$term = array_pop($terms);
							echo '<div class="knowledgebase-body">
							  <h5><a href="'.get_term_link($term->term_id).'">'.$term->name.'</a> </h5>';
							echo '<div class="manual_login_page"> <div class="custom_login_form"><p>';
							echo esc_attr($theme_options['kb-single-page-access-control-message']);
							echo '</p></div></div></div>';
					} else {
				
					$term = array_pop($terms);
					
					$cat_icon_name = get_option( 'kb_cat_icon_name_'.$term->term_id );
					if( isset( $cat_icon_name ) && $cat_icon_name != '' ) {
						$cat_icon_name = $cat_icon_name;
					} else {
						$cat_icon_name = 'icon-briefcase';
					}
				
					echo '<div class="knowledgebase-body">
						  <'.$global_widget_title_tag.'><a href="'.get_term_link($term->term_id).'">'.$term->name.'</a> </'.$global_widget_title_tag.'>
						  <span class="separator small"></span><ul class="kbse">';
					
					$pageID_current = $post->ID;
					if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
					elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
					else { $paged = 1; }
							
					$widget_post_args = array( 
						'post_type'  => 'manual_kb',
						'posts_per_page' => $no_of_category_records,
						'orderby' => 'date',
						'order'  => $knowledgebase_article_order,
						'post__not_in' => array($pageID_current),
						'paged' => $paged,
						'tax_query' => array(
							array(
								'taxonomy' => 'manualknowledgebasecat',
								'field' => 'term_id',
								'include_children' => $include_child_post,
								'terms' => $term->term_id
							)
						)
					); 
					$widget_query = new WP_Query($widget_post_args);
					echo '<li class="cat inner current-singlepg-active"><a href="'.get_permalink($pageID_current).'">'.get_the_title().'</a></li>';
					if($widget_query->have_posts()) { 
						while($widget_query->have_posts()) { $widget_query->the_post();
							
							// control article access
							$access_status =  manual__gobal_article_access_chk($post->ID);
							// eof control article access
							
							if( $access_status == true ) {
								
								//Current PageID
								if( $pageID_current == $post->ID ) { 
									$active_css = 'current-singlepg-active';
								} else {
									$active_css = '';
								}
								//Eof Current PageID
								
								$format = get_post_format( $widget_query->ID );
								echo '<li class="cat inner '.((isset($format) && $format != '')? $format : '').' '.$active_css.' "> <a href="'. get_the_permalink().'">';
								$org_title = get_the_title(); 
								echo html_entity_decode($org_title, ENT_QUOTES, "UTF-8");
								echo '</a></li>';
							}
							
							
						}
					}
					
					echo '</ul>';
					
					if( $no_of_category_records != '' || $no_of_category_records == '-1' ) {  
						if( $widget_query->max_num_pages != 0 && ($widget_query->found_posts > $no_of_category_records) ) {
							echo '<div style="padding:10px 0px;"> <a href="'.get_term_link($term->term_id).'" class="custom-link hvr-icon-wobble-horizontal kblnk">
							'.$theme_options['kb-cat-view-all'].' '.$widget_query->found_posts.' &nbsp;<i class="fa fa-arrow-right hvr-icon"></i> </a> </div>';
						}
					}
					
					echo '</div>';
				
				 wp_reset_postdata(); 
				}}
				
			echo '<div style="clear:both"></div>';
			echo '</div>';
		echo wp_kses_post($args['after_widget']);
		}
	}
         
	// Widget Backend
	public function form( $instance ) {
		$no_of_category_records = (isset($instance[ 'no_of_category_records' ])?$instance[ 'no_of_category_records' ]:'');
		// order
		$ascending_order = $descending_order = '';
		if(  isset($instance[ 'article_order' ]) && $instance[ 'article_order' ] == 'ASC' ) { $ascending_order = 'selected';  }
		else if(  isset($instance[ 'article_order' ]) && $instance[ 'article_order' ] == 'DESC' ) { $descending_order = 'selected';  }
		// include child category posts
		$include_category_post = (isset($instance[ 'include_category_post' ])?$instance[ 'include_category_post' ]:'');
		?><p>
        <label for="<?php echo esc_attr($this->get_field_id( 'no_of_category_records' )); ?>"><?php esc_html_e( 'Number of Articles:', 'manual' ); ?></label>
		<input class="widefat" name="<?php echo esc_attr($this->get_field_name( 'no_of_category_records' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'no_of_category_records' )); ?>" type="text" value="<?php echo esc_attr( $no_of_category_records ); ?>" /><br><?php esc_html_e( 'Note: value "-1/empty value" display all results', 'manual' ); ?>
        </p>
        
        <p>
        <!--Article Order-->
        <label for="<?php echo esc_attr($this->get_field_id( 'Article Display Order' )); ?>"><?php esc_html_e( 'Article Display Order', 'manual' ); ?></label>
        <select id="<?php echo esc_attr($this->get_field_id( 'article_order' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'article_order' )); ?>">
            <option value="ASC" <?php echo esc_attr($ascending_order); ?>><?php esc_html_e( 'Ascending Order', 'manual' ); ?></option>
            <option value="DESC" <?php echo esc_attr($descending_order); ?>><?php esc_html_e( 'Descending Order', 'manual' ); ?></option>
        </select>
		</p>
		
		<!--Include Children-->
        <p>
			<input name="<?php echo esc_attr($this->get_field_name( 'include_category_post' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'include_category_post' )); ?>" type="checkbox" value="1" <?php if( $include_category_post == 1 ){ echo 'checked'; } ?> />
			<label for="<?php echo esc_attr($this->get_field_id( 'include_category_post' )); ?>"><?php esc_html_e( 'Include Child Category Posts', 'manual' ); ?></label>
		</p>
		<?php		
	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['no_of_category_records'] = ( !empty( $new_instance['no_of_category_records'] ) ) ? strip_tags( $new_instance['no_of_category_records'] ) : '';
		$instance['article_order'] = ( ! empty( $new_instance['article_order'] ) ) ? strip_tags( $new_instance['article_order'] ) : '';
		$instance['include_category_post'] = ( ! empty( $new_instance['include_category_post'] ) ) ? strip_tags( $new_instance['include_category_post'] ) : '';
		return $instance;
	}

} // Class wpb_widget ends here
 
// Register and load the widget
if (!function_exists('manual_kb_cat_article_single_pg_widget')) {
	function manual_kb_cat_article_single_pg_widget() { 
		register_widget( 'manual_kb_cat_article_single_pg' ); 
	}
	add_action( 'widgets_init', 'manual_kb_cat_article_single_pg_widget' );
}



/*********************
DOCUMENTATION WIDGET
*********************/
class manual_doccat extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'documentation_cat_widget',
		// Widget name will appear in UI
		esc_html__('DOC Categroy', 'manual'),
		// Widget description
		array( 'description' => esc_html__( 'Documentation records based on category', 'manual' ), )
		);
	}
	// This is where the action happens
	public function widget( $args, $instance ) {
		global $theme_options, $post;
		if( isset( $theme_options['theme_widget_title_tag'] ) && $theme_options['theme_widget_title_tag'] != '' ) {
			$global_widget_title_tag = $theme_options['theme_widget_title_tag'];	
		} else {
			$global_widget_title_tag = 'h5';
		}
		
		$title = apply_filters( 'widget_title', $instance['title'] );
		if( $instance['cat_count'] == 1 ) { $show_count = 1; } else { $show_count = 0; }
		if( $instance['cat_hierarchy'] == 1 ) { $cat_hierarchy = 1; } else { $cat_hierarchy = 0; }
		// before and after widget arguments are defined by themes
		
		echo wp_kses_post($args['before_widget']);
			echo '<div class="display-faq-section">';
				if ( ! empty( $title ) ) echo '<'.$global_widget_title_tag.' class="widget-title widget-custom"><span>' . $title . '</span></'.$global_widget_title_tag.'>';
				
				// Select current cat
				$currentKBID = '';
				$terms_kb_selectCatID = get_the_terms( $post->ID, 'manualdocumentationcategory' );
				
				if ( $terms_kb_selectCatID != null ){  
					$currentKBID = array();
					foreach( $terms_kb_selectCatID as $terms_kb_selectCatID ) {
						$currentKBID[] = $terms_kb_selectCatID->term_taxonomy_id;
						unset($terms_kb_selectCatID);
					}
					
					if( (array) !empty($currentKBID) ) {
						$kbcatID = implode(",",$currentKBID);
					} else {
						$kbcatID = 0;
					}
				} else {
					$kbcatID = 0;
				}
					 echo '<ul>';
						 $cat_op = wp_list_categories( array(
							  'orderby' => 'name',
							  'show_count' => $show_count,
							  'pad_counts' => 0,
							  'hierarchical' => $cat_hierarchy,
							  'taxonomy' => 'manualdocumentationcategory',
							  'current_category' => $kbcatID,
							  'title_li' => '',
							  'echo' => 0,
							) );
						$cat_op = str_replace('</a> (', '</a> <span class="count-span">', $cat_op);
						echo str_replace(')', '</span>', $cat_op);
					 echo '</ul>';
			echo '<div style="clear:both"></div>';
			echo '</div>';
		echo wp_kses_post($args['after_widget']);
	}
         
	// Widget Backend
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		} else {
			$title = esc_html__( 'New title', 'manual' );
		}
		
		$cat_count = (isset($instance[ 'cat_count' ])?$instance[ 'cat_count' ]:'');
		$cat_hierarchy = (isset($instance[ 'cat_hierarchy' ])?$instance[ 'cat_hierarchy' ]:'');
		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'manual' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		
		<p>
			<input name="<?php echo esc_attr($this->get_field_name( 'cat_count' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'cat_count' )); ?>" type="checkbox" value="1" <?php if( $cat_count == 1 ){ echo 'checked'; } ?> />
			<label for="<?php echo esc_attr($this->get_field_id( 'cat_count' )); ?>"><?php esc_html_e( 'Show post counts', 'manual' ); ?></label>
		</p>

		<p>
			<input name="<?php echo esc_attr($this->get_field_name( 'cat_hierarchy' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'cat_hierarchy' )); ?>" type="checkbox" value="1" <?php if( $cat_hierarchy == 1 ){ echo 'checked'; } ?> />
			<label for="<?php echo esc_attr($this->get_field_id( 'cat_hierarchy' )); ?>"><?php esc_html_e( 'Show hierarchy', 'manual' ); ?></label>
		</p>


		<?php		
	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['cat_dropdown'] = ( ! empty( $new_instance['cat_dropdown'] ) ) ? strip_tags( $new_instance['cat_dropdown'] ) : '';
		$instance['cat_count'] = ( ! empty( $new_instance['cat_count'] ) ) ? strip_tags( $new_instance['cat_count'] ) : '';
		$instance['cat_hierarchy'] = ( ! empty( $new_instance['cat_hierarchy'] ) ) ? strip_tags( $new_instance['cat_hierarchy'] ) : '';
		return $instance;
	}

} // Class wpb_widget ends here
 
// Register and load the widget
if (!function_exists('manual_load_doccat_widget')) {
	function manual_load_doccat_widget() { 
		register_widget( 'manual_doccat' ); 
	}
	add_action( 'widgets_init', 'manual_load_doccat_widget' );
}


/***********************
Knowledge-Base Article 
*************************/
class manual_doc_articles extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'documentation_article_widget',
		// Widget name will appear in UI
		esc_html__('DOC Articles', 'manual'),
		// Widget description
		array( 'description' => esc_html__( 'Documentation articles (latest, popular, top rated and the most commented articles)', 'manual' ), )
		);
	}
	
	// This is where the action happens
	public function widget( $args, $instance ) {
		global $theme_options, $post, $wpdb;

		if( isset( $theme_options['theme_widget_title_tag'] ) && $theme_options['theme_widget_title_tag'] != '' ) {
			$global_widget_title_tag = $theme_options['theme_widget_title_tag'];	
		} else {
			$global_widget_title_tag = 'h5';
		}
		
		$title = apply_filters( 'widget_title', $instance['title'] );
		$knowledgebase_article_number = $instance['article_number'];
		$knowledgebase_article_order = $instance[ 'article_order' ];
		
		if( isset($knowledgebase_article_number) && $knowledgebase_article_number != '' ) {
			$no_of_records = $knowledgebase_article_number;
		} else {
			$no_of_records = 5;
		}
		
		if ( is_user_logged_in() && (isset($_GET['preview']) && $_GET['preview'] == true) ) {
			$meta_value_num = '';
		} else {
			$meta_value_num = 'meta_value_num';
		}
		
		if(  isset($instance[ 'display_type' ]) && $instance[ 'display_type' ] == 1 ) { // Latest Article
			$kb_args = array( 
						'posts_per_page' => $no_of_records, 
						'post_type'  => 'manual_documentation',
						'orderby' => 'date',
						'order'	=>	$knowledgebase_article_order,
					);
			
		} else if(  isset($instance[ 'display_type' ]) && $instance[ 'display_type' ] == 2 ) { // Popular Article (//echo get_locale();)
			$kb_args = array( 
							'posts_per_page' => $knowledgebase_article_number, 
							'post_type'  => 'manual_documentation',
							'orderby' => $meta_value_num,
							'order'	=>	$knowledgebase_article_order,
							'meta_key' => 'manual_post_visitors',
						);
			
		} else if(  isset($instance[ 'display_type' ]) && $instance[ 'display_type' ] == 3 ) { // Top Rated Article
			$kb_args = array( 
					'posts_per_page' => $knowledgebase_article_number, 
					'post_type'  => 'manual_documentation',
					'orderby' => $meta_value_num,
					'order'	=>	$knowledgebase_article_order,
					'meta_key' => 'votes_count_doc_manual',
				);
			
		} else if(  isset($instance[ 'display_type' ]) && $instance[ 'display_type' ] == 4 ) { // Most Commented Article
			$kb_args = array( 
							'posts_per_page' => $no_of_records, 
							'post_type'  => 'manual_documentation',
							'orderby' => 'comment_count',
							'order'	=>	$knowledgebase_article_order,
						);
		} else if(  isset($instance[ 'display_type' ]) && $instance[ 'display_type' ] == 5 ) { // Recently Updated
			$kb_args = array( 
							'posts_per_page' => $no_of_records, 
							'post_type'  => 'manual_documentation',
							'orderby' => 'modified',
							'order'	=>	$knowledgebase_article_order,
						);
		}
		
		echo wp_kses_post($args['before_widget']);
		echo '<div class="kb_article_type display-faq-section">';
			if ( ! empty( $title ) ) echo '<'.$global_widget_title_tag.' class="widget-title widget-custom"><span>' . $title . '</span></'.$global_widget_title_tag.'>';
		$query = new WP_Query($kb_args);
		echo '<ul class="clearfix">';
		if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
		echo '<li class="articles"><a href="'.get_permalink($query->post->ID).'" rel="bookmark">'.get_the_title($query->post->ID).'</a></li>';
		endwhile; endif;
		echo '</ul>'; 
		
		wp_reset_postdata();
		echo '</div>';
		echo wp_kses_post($args['after_widget']);
	}
	
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['display_type'] = ( ! empty( $new_instance['display_type'] ) ) ? strip_tags( $new_instance['display_type'] ) : '';
		$instance['article_number'] = ( ! empty( $new_instance['article_number'] ) ) ? strip_tags( $new_instance['article_number'] ) : '';
		$instance['article_order'] = ( ! empty( $new_instance['article_order'] ) ) ? strip_tags( $new_instance['article_order'] ) : '';
		return $instance;
	}
	
	// Widget Backend
	public function form( $instance ) {
		
		// title
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		} else {
			$title = esc_html__( 'New title', 'manual' );
		}
		
		// display
		$latest_article = $popular_article = $top_rated_article = $most_commented_article = $recently_updated_article = '';
		if(  isset($instance[ 'display_type' ]) && $instance[ 'display_type' ] == 1 ) $latest_article = 'selected';
		else if(  isset($instance[ 'display_type' ]) && $instance[ 'display_type' ] == 2 ) $popular_article = 'selected';
		else if(  isset($instance[ 'display_type' ]) && $instance[ 'display_type' ] == 3 ) $top_rated_article = 'selected';
		else if(  isset($instance[ 'display_type' ]) && $instance[ 'display_type' ] == 4 ) $most_commented_article = 'selected';
		else if(  isset($instance[ 'display_type' ]) && $instance[ 'display_type' ] == 5 ) $recently_updated_article = 'selected';
		
		// article number
		if ( isset( $instance[ 'article_number' ] ) ) {
			$article_number = $instance[ 'article_number' ];
		} else {
			$article_number = 5;
		}
		
		// order
		$ascending_order = $descending_order = '';
		if(  isset($instance[ 'article_order' ]) && $instance[ 'article_order' ] == 'ASC' ) { $ascending_order = 'selected';  }
		else if(  isset($instance[ 'article_order' ]) && $instance[ 'article_order' ] == 'DESC' ) { $descending_order = 'selected';  }

		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'manual' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
        
        <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'Article Display Type' )); ?>"><?php esc_html_e( 'Article Display Type', 'manual' ); ?></label>
        <select id="<?php echo esc_attr($this->get_field_id( 'display_type' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'display_type' )); ?>">
            <option value="1" <?php echo esc_attr($latest_article); ?>>Latest Articles (using date)</option>
            <option value="2" <?php echo esc_attr($popular_article); ?>>Popular Article (using number of views)</option>
            <option value="3" <?php echo esc_attr($top_rated_article); ?>>Top Rated Article (using like)</option>
            <option value="4" <?php echo esc_attr($most_commented_article); ?>>Most Commented Article</option>
            <option value="5" <?php echo esc_attr($recently_updated_article); ?>>Recently Updated Article</option>
        </select>
        </p>
        
        <p>
			<label for="<?php echo esc_attr($this->get_field_id( 'Number of Articles' )); ?>"><?php esc_html_e( 'Number of Articles:', 'manual' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'article_number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'article_number' )); ?>" type="text" value="<?php echo esc_attr( $article_number ); ?>" />
		</p>
        
        
         <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'Article Order' )); ?>"><?php esc_html_e( 'Article Order', 'manual' ); ?></label>
        <select id="<?php echo esc_attr($this->get_field_id( 'article_order' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'article_order' )); ?>">
            <option value="ASC" <?php echo esc_attr($ascending_order); ?>>Ascending Order</option>
            <option value="DESC" <?php echo esc_attr($descending_order); ?>>Descending Order</option>
        </select>
        </p>


		<?php		
	}
	
} // Class wpb_widget ends here
 
// Register and load the widget
if (!function_exists('manual_load_doc_article_widget')) {
	function manual_load_doc_article_widget() { 
		register_widget( 'manual_doc_articles' ); 
	}
	add_action( 'widgets_init', 'manual_load_doc_article_widget' );
}


/***********************
Table Of Content 
*************************/
class manual_auto_generate_post_toc extends WP_Widget {
	
	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'manual_post_table_of_content',
		// Widget name will appear in UI
		esc_html__('Manual - TOC', 'manual'),
		// Widget description
		array( 'description' => esc_html__( 'Display documentation or Knowledgebase post table of content', 'manual' ), )
		);
	}
	
	// This is where the action happens
	public function widget( $args, $instance ) {
		global $theme_options, $post, $wpdb;
		echo wp_kses_post($args['before_widget']);
		echo '<div id="toctoc"></div><div class="clearfix"></div>';
		echo wp_kses_post($args['after_widget']);
	}
	
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		return $instance;
	}
	
	// Widget Backend
	public function form( $instance ) {
		?>
		<p> <?php esc_html_e( 'Display \'Table Of Content\' for the Knowledgebase OR Documentation.', 'manual' ) ?></p>
	<?php 
    }
	
}
// Register and load the widget
if (!function_exists('manual_load_table_of_content_widget')) {
	function manual_load_table_of_content_widget() { 
		register_widget( 'manual_auto_generate_post_toc' ); 
	}
	add_action( 'widgets_init', 'manual_load_table_of_content_widget' );
}

?>