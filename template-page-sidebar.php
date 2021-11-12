<?php
/**
 * Template Name: Page - With Sidebar
 */

get_header();
$default_content_col = 8;
if( $theme_options['theme_widget_width_size_global'] == 1 ) {
	$default_content_col = 9;
} 
?>
<!-- /start container -->
<div class="container content-wrapper body-content">
<div class="row margin-top-btm-50 page-with-sidebar">
<div class="col-md-<?php echo esc_attr($default_content_col); ?> col-sm-12 clearfix">
  <?php
		// Start the loop.
		while ( have_posts() ) : the_post();
			get_template_part( 'template/content', 'page' );
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		// End the loop.
		endwhile;
		?>
</div>
<?php get_sidebar(); ?>
</div>
</div>
<?php get_footer(); ?>
