<?php 
get_header(); 
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
?>
<!-- /start container -->
<div class="container content-wrapper body-content">
<div class="row margin-top-btm-50">
<?php if( $sidebar_status == false && $sidebar_position == 'left' ) get_template_part('sidebar', 'faq');  ?>
<div class="col-md-<?php echo esc_attr($col_md_sm); ?> col-sm-12 faq">
  <div class="faq-single">
  <h2 class="singlepg-font">
    <?php the_title(); ?>
  </h2>
  </div>
  <?php while ( have_posts() ) : the_post(); ?>
   <div class="entry-content clearfix">
    <?php the_content(); ?>
    <?php edit_post_link( esc_html__( 'Edit', 'manual' ), '<p class="edit-link" style="text-align:right">', '</p>', $post->ID ); ?>
  </div>
  <?php endwhile; // end of the loop. ?>
  <div style="clear:both"></div>
  <br>
</div>
<?php 
if( $sidebar_status == false && $sidebar_position == 'right' ) get_template_part('sidebar', 'faq');
?>
</div>
</div>
<?php
get_footer(); ?>
