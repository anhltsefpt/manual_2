<?php 
global $theme_options; 
$searchtext = get_search_query();
?>
<div class="search <?php echo get_post_type(); ?>" id="post-<?php the_ID(); ?>">
  <div class="caption">
  
    <h4>
        <a href="<?php esc_url(the_permalink()); ?>" title="<?php the_title_attribute(); ?>">
		<?php 
		if( isset($searchtext) && $searchtext != '' ) {
			manual__highlight_results(get_the_title()); 
		} else {
			echo get_the_title();
		}
		?>
        </a>
    </h4>
    
	<?php 
	echo '<p class="entry-meta">';
	
	if( isset($theme_options['searchpg-records-publish-date']) && $theme_options['searchpg-records-publish-date'] == true ) {
		echo '<i class="far fa-calendar-alt"></i> <span>';
		the_time( get_option('date_format') );
		echo '</span>';
	}

	if( isset($theme_options['searchpg-records-author-name']) && $theme_options['searchpg-records-author-name'] == true ) {
		echo '<i class="fa fa-user"></i> <span>';
		$author_id = $post->post_author; echo the_author_meta( $theme_options['searchpg-records-post-user-name'] , $author_id );
		echo '</span>';
	} 
	
	if( isset($theme_options['searchpg-records-post-type-tag']) && $theme_options['searchpg-records-post-type-tag'] == true ) {
		$postType = get_post_type_object(get_post_type());
		if ($postType) {
			echo '<i class="fas fa-tag"></i> <span>';
			echo esc_html($postType->labels->singular_name).'</span>';
		}
	}

	if ( 'post' == get_post_type() ) { 
		edit_post_link( esc_html__( 'Edit', 'manual' ), '<i class="fa fa-edit"></i> <span class="edit-link">', '</span>' );
	} else {
		edit_post_link( esc_html__( 'Edit', 'manual' ), '<i class="fa fa-edit"></i> <span class="edit-link">', '</span>' );
	}
	
	echo '</p>';
	
	if( $theme_options['searchpg-display-post-content'] == true ) {
		if( isset($theme_options['searchpg-display-post-content-on-post-type']) ) {
			foreach ( $theme_options['searchpg-display-post-content-on-post-type']  as $post_type ) {
				if( $post_type == get_post_type( $post ) ) {
				echo '<p class="search-content">';
				$content = strip_shortcodes(get_the_content($post->ID)); 
				echo substr(strip_tags($content), 0, ($theme_options['searchpg-display-post-content-character']?$theme_options['searchpg-display-post-content-character']:200) );
				echo '</p>';
			 }
			}
		}
	}
	 ?>
  </div>
</div>