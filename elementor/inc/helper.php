<?php 
if ( ! function_exists( 'manual__get_widget_template' ) ) {
	function manual__get_widget_template( $widget_base, $args = array(), $template_name = 'template' ) {
		if ( is_array( $args ) && isset( $args ) ) {
			extract( $args );
		}

		if ( false === strpos( $template_name, '.php' ) ) {
			$template_name .= '.php';
		}

		$parent_path = get_template_directory() . '/framework/elementor/' . $widget_base . '/' . $template_name;
		if ( file_exists( $parent_path ) ) {
			$template_path = $parent_path;
		} else {
			_doing_it_wrong( __FUNCTION__, sprintf( '<code>%s</code> does not exist.', $template_name ), '1.0.0' );

			return;
		}
		
		require $template_path;
	}
}