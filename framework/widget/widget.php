<?php 
/*-----------------------------------------------------------------------------------*/
/*	WIDGET
/*-----------------------------------------------------------------------------------*/
if (!function_exists('manual_theme_widgets_init')) {
	function manual_theme_widgets_init() {
		
		global $theme_options;
		
		if( isset( $theme_options['theme_footer_title_tag'] ) && $theme_options['theme_footer_title_tag'] != '' ) {
			$footer_tag = $theme_options['theme_footer_title_tag'];	
		} else {
			$footer_tag = 'h5';
		}
		
		if( isset( $theme_options['theme_widget_title_tag'] ) && $theme_options['theme_widget_title_tag'] != '' ) {
			$global_widget_title_tag = $theme_options['theme_widget_title_tag'];	
		} else {
			$global_widget_title_tag = 'h5';
		}
		
		register_sidebar( array(
			'name'          => esc_html__( 'Primary Area', 'manual' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your blog/search/archive area', 'manual' ),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<'.$global_widget_title_tag.'>',
			'after_title'   => '</'.$global_widget_title_tag.'>',
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Faq Widgets', 'manual' ),
			'id'            => 'faq-1',
			'description'   => esc_html__( 'Add widgets here to appear inside FAQ page.', 'manual' ),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<'.$global_widget_title_tag.'>',
			'after_title'   => '</'.$global_widget_title_tag.'>',
		) );
	
		register_sidebar( array(
			'name'          => esc_html__( 'Faq Sidebar', 'manual' ),
			'id'            => 'faq-sidebar-1',
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<'.$global_widget_title_tag.'>',
			'after_title'   => '</'.$global_widget_title_tag.'>',
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Knowledge Base Sidebar', 'manual' ),
			'id'            => 'kb-sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear on the Knowledge Base page sidebar.', 'manual' ),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<'.$global_widget_title_tag.'>',
			'after_title'   => '</'.$global_widget_title_tag.'>',
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Documentation Sidebar', 'manual' ),
			'id'            => 'doc-sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear on the Documentation page.', 'manual' ),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<'.$global_widget_title_tag.'>',
			'after_title'   => '</'.$global_widget_title_tag.'>',
		) );
		
		$is_plugin_bbPress_active = manual__plugin_active('bbPress');
		if ( $is_plugin_bbPress_active == true ) {
			register_sidebar( array(
				'name'          => esc_html__( 'BBPress Sidebar', 'manual' ),
				'id'            => 'manual-sidebar-bbpress',
				'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<'.$global_widget_title_tag.'>',
				'after_title'   => '</'.$global_widget_title_tag.'>',
			) );
		}
		
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Box 1', 'manual' ),
			'id'            => 'footer-box-1',
			'before_widget' => '<div id="%1$s" class="sidebar-widget footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<'.$footer_tag.'>',
			'after_title'   => '</'.$footer_tag.'>',
		) );
		
		
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Box 2', 'manual' ),
			'id'            => 'footer-box-2',
			'before_widget' => '<div id="%1$s" class="sidebar-widget footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<'.$footer_tag.'>',
			'after_title'   => '</'.$footer_tag.'>',
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Box 3', 'manual' ),
			'id'            => 'footer-box-3',
			'before_widget' => '<div id="%1$s" class="sidebar-widget footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<'.$footer_tag.'>',
			'after_title'   => '</'.$footer_tag.'>',
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Box 4', 'manual' ),
			'id'            => 'footer-box-4',
			'before_widget' => '<div id="%1$s" class="sidebar-widget footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<'.$footer_tag.'>',
			'after_title'   => '</'.$footer_tag.'>',
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Portfolio', 'manual' ),
			'id'            => 'manual-poftfolio-widget',
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<'.$global_widget_title_tag.'>',
			'after_title'   => '</'.$global_widget_title_tag.'>',
		) );
		
		$is_plugin_woocommerce_active = manual__plugin_active('WooCommerce');
		if ( $is_plugin_woocommerce_active == true ) {
			register_sidebar( array(
				'name'          => esc_html__( 'WooCommerce Sidebar', 'manual' ),
				'id'            => 'manual-woocommerce-widget',
				'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<'.$global_widget_title_tag.'>',
				'after_title'   => '</'.$global_widget_title_tag.'>',
			) );
		}
		
		// Header - Social Icon
		register_sidebar( array(
			'name'          => esc_html__( 'Header - Main Menu Section', 'manual' ),
			'id'            => 'manual-header-social-widgetnav',
			'before_widget' => '<div id="%1$s" class="theme-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6>',
			'after_title'   => '</h6>',
			'description'   => esc_html__( 'Display Social/Search Icons or Button using this section Section', 'manual' ),
		) );
		
	}
	add_action( 'widgets_init', 'manual_theme_widgets_init' );
}

?>