<?php
/**
 * The sidebar containing the main widget area
 */

global $theme_options;
$default_col = 4;
if( $theme_options['theme_widget_width_size_global'] == 1 ) {
	$default_col = 3;
} 
?>
<aside class="col-md-<?php echo esc_attr($default_col); ?> col-sm-12" id="sidebar-box">
  <div class="custom-well sidebar-nav">
	<?php 
		if ( is_active_sidebar( 'kb-sidebar-1' ) ) : 
			dynamic_sidebar( 'kb-sidebar-1' ); 
		endif; 
    ?>
  </div>
</aside>