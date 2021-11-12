<?php

/**
 * Single Forum
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

// sidebar
$default_sidbear_col = 4;
if( $theme_options['theme_widget_width_size_global'] == 1 ) {
	$default_sidbear_col = 3;
} 
?>
<!-- /start container -->
<div class="container content-wrapper body-content">
<div class="row margin-top-btm-50">
<div class="col-md-<?php echo esc_attr($col_md); ?> col-sm-12">
  <?php 
	do_action( 'bbp_before_main_content' );
	do_action( 'bbp_template_notices' );
	while ( have_posts() ) : the_post();
	
	if ( bbp_user_can_view_forum() ) : ?>
    
    <div id="forum-<?php bbp_forum_id(); ?>" class="bbp-forum-content">
    <?php bbp_get_template_part( 'content', 'single-forum' ); ?>
    </div>
    
  <!-- #forum-<?php bbp_forum_id(); ?> -->
  <?php else : // Forum exists, user no access ?>
  
  <div><?php bbp_get_template_part( 'feedback', 'no-access' ); ?></div>
  
  <?php 
	endif; 
	endwhile;
	do_action( 'bbp_after_main_content' ); 
 ?>
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