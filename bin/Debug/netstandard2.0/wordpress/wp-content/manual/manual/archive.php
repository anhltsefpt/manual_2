<?php 
get_header(); 

$default_content_col = 8;
if( $theme_options['theme_widget_width_size_global'] == 1 ) {
	$default_content_col = 9;
} 
?>
<!-- /start container -->
<div class="container content-wrapper body-content">
<div class="row margin-top-btm-50">
<div class="col-md-<?php echo esc_attr($default_content_col); ?> col-sm-12">
  <?php if ( have_posts() ) : ?>
  <?php if( is_archive() && !is_category() ) : ?>
  <header class="page-header margin-fix">
    <?php
		the_archive_title( '<h4 class="page-title">', '</h4>' );
		the_archive_description( '<div class="taxonomy-description">', '</div>' );
	?>
  </header>
  <!-- .page-header -->
  <?php endif; ?>
  <?php
			// Start the Loop.
			while ( have_posts() ) : the_post();
				get_template_part( 'template/content', get_post_format() );
			// End the loop.
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => esc_html__( '&lt;', 'manual' ),
				'next_text'          => esc_html__( '&gt;', 'manual' ),
			) );

		// If no content, include the "No posts found" template.
		else :
			 esc_html_e( 'Sorry, no records were found', 'manual' );
		endif;
		?>
  <div class="clearfix"></div>
</div>
<?php get_sidebar(); ?>
</div>
</div>
<?php get_footer(); ?>