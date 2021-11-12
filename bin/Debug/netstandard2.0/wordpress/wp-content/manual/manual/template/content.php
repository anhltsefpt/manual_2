<?php
global $theme_options;
$chkpost_type = get_post_type();
// check post format
$format = get_post_format();
?>
<div <?php post_class('blog'); ?> id="post-<?php the_ID(); ?>">

  <div class="caption">
      <?php 
		
		/*******************
		**** STICKY POST ****
		********************/
		if ( is_sticky() && is_home() && !is_paged() ) {
			printf( '<div class="sticky-blogpost"><span class="sticky-post">%s</span></div>', esc_html__( 'Featured', 'manual' ) );
		}
		
		/*******************
		**** BLOG TITLE ****
		********************/
		if ( is_single() ) {
			if( $theme_options['blog_single_title_on_content_area'] == true  ) {
				the_title( '<h2 class="singlepg-font-blog-upper">', '</h2>' );
			}
			// if no plugin active
			$is_plugin_active = manual__plugin_active('ReduxFramework');
			if($is_plugin_active == false){
				the_title( '<h2 class="singlepg-font-blog-upper">', '</h2>' );
			}
			// eof plugin active
		} else {
			the_title( sprintf( '<h2 class="singlepg-font-blog"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		}
		
		/************************
		**** BLOG MEDA FIELD ****
		************************/
		if ( $chkpost_type == 'post' ) {
			echo '<p class="blog_meta_section">';
				if( is_page() === false ) { 
					manual_entry_meta(); 
				} 
				edit_post_link( esc_html__( 'Edit', 'manual' ), '&nbsp;&nbsp;<span class="edit-link"><i class="fa fa-edit"></i> ', '</span>' );
			echo '</p>';
		}
		
		
     ?>
  </div><!--end of caption-->
  
	<?php 
		/*******************
		**** BLOG THUMBNAIL ****
		********************/
		if( ($theme_options['blog_featured_image_on_the_header'] == false) && is_single() ) {  
			manual_post_thumbnail(); 
		} else if( !is_single() ) { 
			manual_post_thumbnail(); 
		}
    ?>

  <div class="blog-box-post-inner">
  
	<?php
		/*******************
		**** BLOG EXCERPT ****
		********************/
		echo '<div class="entry-content clearfix">';
			if ( is_single() ) :
				the_content();
			else :
				the_excerpt();
			endif;
		echo '</div>';	
	
	
		if( is_single() ) {
				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'manual' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'manual' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				) );
				
				the_tags( '</span> <div class="tagcloud singlepgtag clearfix singlepg"><span><i class="fa fa-tags"></i> '.esc_html__( 'Tags:', 'manual' ).'</span>', '', '</div>' ); 
				
				if ( $chkpost_type == 'post' ) {
					if( $theme_options['blog_single_social_share_status'] == true ) { manual_social_share(get_permalink()); } 
				}
		}
		
		if ( !is_single() && !is_search() ) {
			if( $format != 'quote' ) {
				echo '<p><a href="'. esc_url( get_permalink() ) .'" class="custom-link-blog hvr-icon-wobble-horizontal">';
      			echo (isset($theme_options['theme-defult-post-continue-reading-text'])?
					 $theme_options['theme-defult-post-continue-reading-text']:
					 esc_html__( 'Continue Reading', 'manual'));
      			echo '&nbsp;&nbsp;<i class="fa fa-arrow-right hvr-icon"></i></a> </p>';
			}
		}
		
	?>
  </div><!--eof blog post inner-->
  
</div><!--Eof main div-->

<?php
/*******************
**** AUTHOR BIO ****
********************/
if ( is_single() && get_the_author_meta( 'description' ) ) :
	get_template_part( 'author-bio' );
endif;
?>