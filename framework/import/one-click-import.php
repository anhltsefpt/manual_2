<?php

/****************************************
 ***  ONE CLICK DEMO IMPORT - CUSTOM ***
*****************************************/

$OCDI_Plugin_active = manual__plugin_active('OCDI_Plugin');
if ( $OCDI_Plugin_active == true ) {
	
	// START IMPORT
	function ocdi_import_files() {
	  $active_info_learnpress = $active_info_woocommerce = $active_info_bbpress = $active_info_sr = $active_info_elementor = '<span style="color:red;">Inactive</span>';
	  $active_info_js = '<span style="color:red;">Inactive (IMPORTANT)</span>';
	  $is_plugin_woocommerce_active = manual__plugin_active('WooCommerce');
	  $is_plugin_learnpress_active = manual__plugin_active('LearnPress');
	  $is_plugin_bbpress_active = manual__plugin_active('bbPress');
	  $is_plugin_sr_active = manual__plugin_active('RevSliderFront');
	  $is_plugin_js_composer_active = manual__plugin_active('Vc_Manager');
	  
	  if ( $is_plugin_woocommerce_active == true ) {
		  $active_info_woocommerce = '<span style="color:blue;">Active</span>';
	  }
	  if ( $is_plugin_learnpress_active == true ) {
		  $active_info_learnpress = '<span style="color:blue;">Active</span>';
	  }
	  if ( $is_plugin_bbpress_active == true ) {
		  $active_info_bbpress = '<span style="color:blue;">Active</span>';
	  }
	  if ( $is_plugin_sr_active == true ) {
		  $active_info_sr = '<span style="color:blue;">Active</span>';
	  }
	  if ( $is_plugin_js_composer_active == true ) {
		  $active_info_js = '<span style="color:blue;">Active</span>';
	  }
	  if ( manual__abs_plugin_active( 'elementor/elementor.php' ) ) {
		   $active_info_elementor = '<span style="color:blue;">Active</span>';
	  }
	  
	  
	  
	  return array(
				   
	  	/***** ORIGINAL: Manual Default ***/
		array(
            'import_file_name'             => 'Manual Original',
            'categories'                   => array('Manual-Original'),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'framework/import/initial/demo-content.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'framework/import/initial/widgets.wie',
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'framework/import/initial/redux.json',
                    'option_name' => 'redux_demo',
                ),
            ),
			'import_preview_image_url' =>  trailingslashit( get_template_directory_uri() ) . 'img/preview_import.jpg',
			'import_notice'            => '<strong>Import time 2-6 minutes.<br><br>A. <span style="color: #dc2f2f;border-bottom: 1px solid;">This Demo REQUIRED Below Plugin</span><br>
			<br>1. Slider Revolution - '.$active_info_sr.'
			<br>2. WooCommerce - '.$active_info_woocommerce.'
			<br>3. bbPress - '.$active_info_bbpress.'
			<br>4. WPBakery  - '.$active_info_js.'
			</strong> 
			<strong> <br><br>B. <span style="color: #dc2f2f;border-bottom: 1px solid;">Download</span><br></strong> 
			<br><i>For the Revolution Slider plugin:</i>
			<a href="http://demo.wpsmartapps.com/themes/manual/MANUAL-ReV-SlideR/" target="_blank">Download Demo Slider</a>',
			'preview_url'   => 'http://demo.wpsmartapps.com/themes/manual/',
        ),
		/***** DEMO TWELVE: Documentation ***/
		array(
            'import_file_name'             => 'Modern Software',
            'categories'                   => array('Documentation'),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'framework/import/twelve/demo-content-12.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'framework/import/twelve/widgets-12.wie',
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'framework/import/twelve/redux-12.json',
                    'option_name' => 'redux_demo',
                ),
            ),
            'import_preview_image_url' =>  trailingslashit( get_template_directory_uri() ) . 'img/preview_import_12.jpg',
			'preview_url'   => 'http://demo.wpsmartapps.com/manual/twelve/',
			'import_notice' => '<strong><span style="color: #dc2f2f;border-bottom: 1px solid;">This Demo REQUIRED Below Plugin</span> 
								<br><br>1. WPBakery  - '.$active_info_js.'
								<br><br></strong>',
        ),
		/***** DEMO ELEVEN: Elementor (KB) ***/
		array(
            'import_file_name'             => 'Elementor - KB',
            'categories'                   => array('Elementor'),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'framework/import/eleven/demo-content-11.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'framework/import/eleven/widgets-11.wie',
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'framework/import/eleven/redux-11.json',
                    'option_name' => 'redux_demo',
                ),
            ),
            'import_preview_image_url' =>  trailingslashit( get_template_directory_uri() ) . 'img/preview_import_11.jpg',
			'preview_url'   => 'http://demo.wpsmartapps.com/manual/eleven/',
			'import_notice' => '<strong><span style="color: #dc2f2f;border-bottom: 1px solid;">This Demo REQUIRED Below Plugin</span> 
								<br><br>1. Elementor  - '.$active_info_elementor.'
								<br><br></strong>',
        ),
		/***** DEMO TEN: Education ***/
		array(
            'import_file_name'             => '(LMS) Education',
            'categories'                   => array('LearnPress'),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'framework/import/ten/demo-content-10.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'framework/import/ten/widgets-10.wie',
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'framework/import/ten/redux-10.json',
                    'option_name' => 'redux_demo',
                ),
            ),
            'import_preview_image_url' =>  trailingslashit( get_template_directory_uri() ) . 'img/preview_import_10.jpg',
			'preview_url'   => 'http://demo.wpsmartapps.com/manual/ten/',
			'import_notice' => '<strong><span style="color: #dc2f2f;border-bottom: 1px solid;">This Demo REQUIRED Below Plugin</span> 
								<br><br>1. LearnPress - '.$active_info_learnpress.'
								<br>2. WooCommerce - '.$active_info_woocommerce.'
								<br>3. WPBakery  - '.$active_info_js.'
								<br><br></strong>',
        ),
		/***** DEMO NINE: Software Company ***/
		array(
            'import_file_name'             => 'Software Company',
            'categories'                   => array('KnowledgeBase'),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'framework/import/nine/demo-content-9.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'framework/import/nine/widgets-9.wie',
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'framework/import/nine/redux-9.json',
                    'option_name' => 'redux_demo',
                ),
            ),
            'import_preview_image_url' =>  trailingslashit( get_template_directory_uri() ) . 'img/preview_import_9.jpg',
			'preview_url'   => 'http://demo.wpsmartapps.com/manual/nine/',
			'import_notice' => '<strong><span style="color: #dc2f2f;border-bottom: 1px solid;">This Demo REQUIRED Below Plugin</span> 
								<br><br>1. WPBakery  - '.$active_info_js.'
								<br><br></strong>',
        ),
		/***** DEMO EIGHT: Game ***/
		array(
            'import_file_name'             => 'Game',
            'categories'                   => array('Documentation'),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'framework/import/eight/demo-content-8.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'framework/import/eight/widgets-8.wie',
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'framework/import/eight/redux-8.json',
                    'option_name' => 'redux_demo',
                ),
            ),
            'import_preview_image_url' =>  trailingslashit( get_template_directory_uri() ) . 'img/preview_import_8.jpg',
			'preview_url'   => 'http://demo.wpsmartapps.com/manual/eight/',
			'import_notice' => '<strong><span style="color: #dc2f2f;border-bottom: 1px solid;">This Demo REQUIRED Below Plugin</span> 
								<br><br>1. WPBakery  - '.$active_info_js.'
								<br><br></strong>',
        ),
		/***** DEMO SEVENTH: Consulting ***/
		array(
            'import_file_name'             => 'Consulting',
            'categories'                   => array('KnowledgeBase'),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'framework/import/seven/demo-content-7.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'framework/import/seven/widgets-7.wie',
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'framework/import/seven/redux-7.json',
                    'option_name' => 'redux_demo',
                ),
            ),
            'import_preview_image_url' =>  trailingslashit( get_template_directory_uri() ) . 'img/preview_import_7.jpg',
			'preview_url'   => 'http://demo.wpsmartapps.com/manual/seven/',
			'import_notice' => '<strong><span style="color: #dc2f2f;border-bottom: 1px solid;">This Demo REQUIRED Below Plugin</span>  
								<br><br>1. bbPress - '.$active_info_bbpress.'
								<br>2. WPBakery  - '.$active_info_js.'
								<br><br></strong>',
        ),
		/***** DEMO SIXTH: Forum ***/
		array(
            'import_file_name'             => 'Forum',
            'categories'                   => array('bbPress'),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'framework/import/six/demo-content-6.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'framework/import/six/widgets-6.wie',
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'framework/import/six/redux-6.json',
                    'option_name' => 'redux_demo',
                ),
            ),
            'import_preview_image_url' =>  trailingslashit( get_template_directory_uri() ) . 'img/preview_import_6.jpg',
			'preview_url'   => 'http://demo.wpsmartapps.com/manual/six/',
			'import_notice' => '<strong><span style="color: #dc2f2f;border-bottom: 1px solid;">This Demo REQUIRED Below Plugin</span> 
								<br><br>1. bbPress - '.$active_info_bbpress.'
								<br>2. WPBakery  - '.$active_info_js.'
								<br><br></strong>',
			
        ),
		/***** DEMO FIFTH: Online Service ***/
		array(
            'import_file_name'             => 'Online Service',
            'categories'                   => array('KnowledgeBase'),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'framework/import/five/demo-content-5.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'framework/import/five/widgets-5.wie',
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'framework/import/five/redux-5.json',
                    'option_name' => 'redux_demo',
                ),
            ),
            'import_preview_image_url' =>  trailingslashit( get_template_directory_uri() ) . 'img/preview_import_5.jpg',
			'preview_url'   => 'http://demo.wpsmartapps.com/manual/five/',
			'import_notice' => '<strong><span style="color: #dc2f2f;border-bottom: 1px solid;">This Demo REQUIRED Below Plugin</span> 
								<br><br>1. bbPress - '.$active_info_bbpress.'
								<br>2. WPBakery  - '.$active_info_js.'
								<br><br></strong>',
        ),
		/***** DEMO FOURTH: eCommerce ***/
		array(
            'import_file_name'             => 'eCommerce',
            'categories'                   => array('KnowledgeBase'),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'framework/import/four/demo-content-4.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'framework/import/four/widgets-4.wie',
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'framework/import/four/redux-4.json',
                    'option_name' => 'redux_demo',
                ),
            ),
            'import_preview_image_url' =>  trailingslashit( get_template_directory_uri() ) . 'img/preview_import_4.jpg',
			'preview_url'   => 'http://demo.wpsmartapps.com/manual/four/',
			'import_notice' => '<strong><span style="color: #dc2f2f;border-bottom: 1px solid;">This Demo REQUIRED Below Plugin</span> 
								<br><br>1. WPBakery  - '.$active_info_js.'
								<br><br></strong>',
        ),
		/***** DEMO THIRD: Classic Corporate ***/
		array(
            'import_file_name'             => 'Classic Corporate',
            'categories'                   => array('KnowledgeBase'),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'framework/import/three/demo-content-3.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'framework/import/three/widgets-3.wie',
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'framework/import/three/redux-3.json',
                    'option_name' => 'redux_demo',
                ),
            ),
            'import_preview_image_url' =>  trailingslashit( get_template_directory_uri() ) . 'img/preview_import_3.jpg',
			'preview_url'   => 'http://demo.wpsmartapps.com/manual/three/',
			'import_notice' => '<strong><span style="color: #dc2f2f;border-bottom: 1px solid;">This Demo REQUIRED Below Plugin</span> 
								<br><br>1. WPBakery  - '.$active_info_js.'
								<br><br></strong>',
        ),
		/***** DEMO SECOND: Corporate ***/
		array(
            'import_file_name'             => 'Corporate',
            'categories'                   => array('KnowledgeBase'),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'framework/import/two/demo-content-2.xml',
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'framework/import/two/redux-2.json',
                    'option_name' => 'redux_demo',
                ),
            ),
            'import_preview_image_url' =>  trailingslashit( get_template_directory_uri() ) . 'img/preview_import_2.jpg',
			'preview_url'   => 'http://demo.wpsmartapps.com/manual/two/',
			'import_notice' => '<strong><span style="color: #dc2f2f;border-bottom: 1px solid;">This Demo REQUIRED Below Plugin</span> 
								<br><br>1. WPBakery  - '.$active_info_js.'
								<br><br></strong>',
        ),
		/***** DEMO FIRST: Software ***/
		array(
            'import_file_name'             => 'Software',
            'categories'                   => array('Documentation'),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'framework/import/one/demo-content-1.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'framework/import/one/widgets-1.wie',
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'framework/import/one/redux-1.json',
                    'option_name' => 'redux_demo',
                ),
            ),
            'import_preview_image_url' =>  trailingslashit( get_template_directory_uri() ) . 'img/preview_import_1.jpg',
			'preview_url'   => 'http://demo.wpsmartapps.com/manual/one/',
			'import_notice' => '<strong><span style="color: #dc2f2f;border-bottom: 1px solid;">This Demo REQUIRED Below Plugin</span> 
								<br><br>1. WPBakery  - '.$active_info_js.'
								<br><br></strong>',
        ),
		
	  );
	}
	add_filter( 'pt-ocdi/import_files', 'ocdi_import_files' );
	
	// AUTOMATICALLY ASSIGN 'FRONT PAGE' & MENU LOCATION AFTER THE IMPORT IS DONE.
	function ocdi_after_import_setup() {
		// Assign menus to their locations.
		$main_menu = get_term_by( 'name', 'header menu', 'nav_menu' );
		$footer_menu = get_term_by( 'name', 'footer', 'nav_menu' );
		
		set_theme_mod( 'nav_menu_locations', array(
				'primary' => $main_menu->term_id,
				'footer' => $footer_menu->term_id,
			)
		);
	
		// Assign front page and posts page (blog page).
		$front_page_id = get_page_by_title( 'Home Landing' );
		$blog_page_id  = get_page_by_title( 'News' );
	
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page_id->ID );
		update_option( 'page_for_posts', $blog_page_id->ID );
	
	}
	add_action( 'pt-ocdi/after_import', 'ocdi_after_import_setup' );
	
	// CHANGE THE LOCATION
	function manual_plugin_page_setup( $default_settings ) {
		$default_settings['parent_slug'] = 'admin.php';
		$default_settings['page_title']  = esc_html__( 'Manual Demo Import' , 'manual' );
		$default_settings['menu_title']  = esc_html__( 'Manual Demo Import' , 'manual' );
		$default_settings['capability']  = 'import';
		$default_settings['menu_slug']   = 'manual-demo-import';
		return $default_settings;
	}
	add_filter( 'pt-ocdi/plugin_page_setup', 'manual_plugin_page_setup' );
	
	// CHANGE PLUGIN INTRO
	function manual_import_intro_text( $default_text ) {
		$default_text .= '<div class="ocdi__intro-text" style="padding: 15px;background: #f7f77f;margin-bottom: 15px;">Demo Import requires Min. PHP version 5.3.x, but we recommend you to use higher. <br> Please contact your hosting company if found hosting using low PHP version.</div>';
		return $default_text;
	}
	add_filter( 'pt-ocdi/plugin_intro_text', 'manual_import_intro_text' );
	add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
	
	// RECOMMENDED PLUGNS BEFORE START IMPORT
	function manual__install_required_plugins( $plugins ) {
	  $theme_url = trailingslashit( get_template_directory() );	
	  $theme_plugins = [
		[ 'name'     => 'WPBakery Page Builder', 
		  'slug'     => 'js_composer', 
		  'source'   => $theme_url.'install/js_composer.zip',
		  'required' => false,
		],
		[ 'name'     => 'Slider Revolution', 
		  'slug'     => 'revslider', 
		  'source'   => $theme_url.'install/revslider.zip',
		  'required' => false,
		],
		[ 'name'     => 'bbPress', 
		  'slug'     => 'bbpress', 
		  'required' => false,                  
		],
		[ 'name'     => 'WooCommerce', 
		  'slug'     => 'woocommerce', 
		  'required' => false,                  
		],
		[ 'name'     => 'Elementor - Website Builder', 
		  'slug'     => 'elementor', 
		  'required' => false,                  
		],
		[ 'name'     => 'LearnPress', 
		  'slug'     => 'learnpress', 
		  'required' => false,                  
		],
	  ];
	 
	  return array_merge( $plugins, $theme_plugins );
	}
	add_filter( 'ocdi/register_plugins', 'manual__install_required_plugins' );
	
}
?>