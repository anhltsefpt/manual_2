<?php
/**
 * The template for displaying all single posts and attachments
 */
get_header();

$offset = $rtl_css = '';
if( isset( $theme_options['blog_single_sidebar_status'] )) {
	if( $theme_options['blog_single_sidebar_status'] == true ) {
		$col_md_sm = 8;
		if( $theme_options['theme_widget_width_size_global'] == 1 ) {
			$col_md_sm = 9;
		}
		$sidebar_status = true;
		$rtl_css = 'rtl-blog-single';
	} else {
		$col_md_sm = 12;
		$sidebar_status = false;
	}
} else {
	$col_md_sm = 8;
	if( $theme_options['theme_widget_width_size_global'] == 1 ) {
		$col_md_sm = 9;
	}
	$sidebar_status = true;
	$rtl_css = 'rtl-blog-single';
}

if( $sidebar_status == false ) {
	if( $theme_options['blog_single_page_sidebar_center_content'] == true ) {
		$col_md_sm = 10;
		$offset = 'col-md-offset-1';
	} else {
		$col_md_sm = 12;
		$offset = '';
	}
}
?>
<!-- /start container -->
<div class="container content-wrapper body-content">
<div class="row  margin-top-btm-50">
<div class="col-md-<?php echo esc_attr($col_md_sm); ?> col-sm-12 <?php echo esc_attr($offset); echo esc_attr($rtl_css); ?>">
  <?php
		// Start the loop.
		while ( have_posts() ) : the_post();
			get_template_part( 'template/content', get_post_format() );
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		// End the loop.
		endwhile;
		?>
  <div class="clearfix"></div>
</div>
<?php if( $sidebar_status == true ) get_sidebar(); ?>
</div>
</div>
<?php get_footer(); ?>