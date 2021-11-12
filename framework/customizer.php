<?php 

class manual_Customize {

		public static function register( $wp_customize ) {
		
		} // eof register
		
		/**
		* This will output the custom WordPress settings to the live theme's WP head.
		*/
	    public static function header_output() {
			$theme_nav_type = '';
			global $post, $theme_options; 
			echo '<style type="text/css">';
			
			// Go up arrow
			manual__gouparrow_settings();
			// menu navigation style control
			manual_menu_navigation_control();
			// control header
			manual_header_control_global();
			// remaining global
			manual_customizer_enhance(); 
			
			echo '</style>';
	    }
		
		public static function generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {
		  $return = '';
		  $mod = get_theme_mod($mod_name);
		  if ( ! empty( $mod ) ) {
			 $return = sprintf('%s { %s:%s; }',
				$selector,
				$style,
				$prefix.$mod.$postfix
			 );
			 if ( $echo ) {
				echo ''.$return;
			 }
		  }
		  return $return;
		}
		
		
	   /**
		* This outputs the javascript needed to automate the live settings preview.
		*/
	   public static function live_preview() {
		  wp_enqueue_script( 
			   'manual-themecustomizer', // Give the script a unique ID
			   get_template_directory_uri() . '/js/customize-preview.js', // Define the path to the JS file
			   array(  'jquery', 'customize-preview' ), // Define dependencies
			   '', // Define a version (optional) 
			   true // Specify whether to put in footer (leave this true)
		  );
	   }
		

}
// Setup the Theme Customizer settings and controls...
add_action( 'customize_register' , array( 'manual_Customize' , 'register' ) );
// Output custom CSS to live site
add_action( 'wp_head' , array( 'manual_Customize' , 'header_output' ) );
// Enqueue live preview javascript in Theme Customizer admin screen
add_action( 'customize_preview_init' , array( 'manual_Customize' , 'live_preview' ) );
?>