<?php
/**
 * The sidebar containing the main widget area
 */

global $theme_options;

$faq_sidebar_rtl = '';
if( $theme_options['faq-sidebar-display-position'] == 'left' ) {
	$faq_sidebar_rtl = 'faq_rtl_sidebar_right';
}

$default_col = 4;
if( $theme_options['theme_widget_width_size_global'] == 1 ) {
	$default_col = 3;
}
?>

<aside class="col-md-<?php echo esc_attr($default_col); ?> col-sm-12 <?php echo esc_attr($faq_sidebar_rtl); ?>" id="sidebar-box">
  <div class="custom-well sidebar-nav faq_sidebar">
    <?php 
    if ( is_active_sidebar( 'faq-sidebar-1' ) ) : 
		dynamic_sidebar( 'faq-sidebar-1' ); 
    endif; 
	?>
  </div>
</aside>