<?php

/**
 * bbPress - Forum Archive
 *
 * @package bbPress
 * @subpackage Theme
 */

get_header(); 
$f_sidebar = $theme_options['manual-forum-yes-no-sidebar'];
$col_md_sm = 12; 
if( $f_sidebar == 1 ) { 
	$col_md = 12;
} else { 
	$col_md = 8; 
	if( $theme_options['theme_widget_width_size_global'] == 1 ) {
		$col_md = 9;
	} 
} 
$forumID = get_option('manual_forum_page');
if( isset($forumID) && $forumID != '' ) {  
	$pagetitle = get_post_meta( $forumID, '_manual_page_tagline', true ); 
	$pagedesc = get_post_meta( $forumID, '_manual_page_desc', true );
	$active_forumID = $forumID;
}

// sidebar
$default_sidbear_col = 4;
if( $theme_options['theme_widget_width_size_global'] == 1 ) {
	$default_sidbear_col = 3;
} 
?>
<!-- /start container -->
<div class="container content-wrapper body-content">
<div class="row margin-top-btm-50">

<?php 
$f_msg = $theme_options['manual-forum-message']; 
if( $f_msg != '' ) {
?>
<div class="col-md-12 col-sm-12" style="margin-top: -20px;">
  <div class="forum-msg"> <?php echo wp_kses_post($f_msg); ?> </div>
</div>
<?php 
} 
?>

<div class="col-md-<?php echo esc_html($col_md); ?> col-sm-12">
  <?php 
  do_action( 'bbp_before_main_content' );
  do_action( 'bbp_template_notices' ); 
  ?>
  <div id="forum-front" class="bbp-forum-front"><?php bbp_get_template_part( 'content', 'archive-forum' ); ?></div>
  <?php do_action( 'bbp_after_main_content' ); ?>
  <div class="clearfix"></div>
</div>

<?php 
if( $f_sidebar != 1 ) { 
	if ( is_active_sidebar( 'manual-sidebar-bbpress' ) ) { 
		echo '<aside class="col-md-'.esc_attr($default_sidbear_col).' col-sm-12" id="sidebar-box"><div class="custom-well sidebar-nav manual-forum">';
			  dynamic_sidebar( 'manual-sidebar-bbpress' );
		echo '</div></aside>';
	}
} 
?>
</div>
</div>
<?php
get_footer(); 
?>