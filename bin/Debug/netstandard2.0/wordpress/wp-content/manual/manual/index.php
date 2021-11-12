<?php 
get_header(); 

$default_content_col = 8;
if( $theme_options['theme_widget_width_size_global'] == 1 ) {
	$default_content_col = 9;
}

if( isset($theme_options['blog_home_sidebar']) ) {
	if( $theme_options['blog_home_sidebar'] == false ) $default_content_col = 12;
}
?>
<!-- /start container -->
<div class="container content-wrapper body-content">
<div class="row margin-top-btm-50">
<div class="col-md-<?php echo esc_attr($default_content_col); ?> col-sm-12 rtl-blog">
  <?php 
		if ( have_posts() ) : 
		
			while ( have_posts() ) : the_post();
				get_template_part( 'template/content', get_post_format() );
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'  => esc_html__( '&lt;', 'manual' ),
				'next_text'  => esc_html__( '&gt;', 'manual' ),
			) );
			
		else :
			 _e( 'Sorry, no posts were found', 'manual' );
		endif;
		?>
  <div class="clearfix"></div>
</div>
<?php 
if( isset($theme_options['blog_home_sidebar']) ) {
	if( $theme_options['blog_home_sidebar'] == true ) get_sidebar(); 
} else {
	get_sidebar(); 
}
?>
</div>
</div>
<?php get_footer(); ?>