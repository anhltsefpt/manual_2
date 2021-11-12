<?php 
get_header(); 
$post_type = get_post_type();
?>
<!-- /start container -->
<div class="container content-wrapper body-content">
<div class="row margin-top-btm-50 page-default">
<?php 
	if( ($post_type == 'lp_course' && is_single()) ) { 
		while ( have_posts() ) : the_post();
			get_template_part( 'template/content', 'course' );
		endwhile;
	} else { 
?> 
<div class="col-md-12 col-sm-12 clearfix">
  <?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'template/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		// End the loop.
		endwhile;
		?>
</div>
<?php } ?>
</div>
</div>
<?php get_footer(); ?>