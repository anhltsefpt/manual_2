<?php
/**
* Set the content width based on the theme's design and stylesheet.
*/
if ( ! defined( 'MANUAL_THEME_VERSION' ) ) {
define( 'MANUAL_THEME_VERSION', '6.6.2' );
}

if ( ! isset( $content_width ) ) $content_width = 700;

/*-----------------------------------------------------------------------------------*/
/*	Sets up theme defaults and registers support for various WordPress features.
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'manual_theme_manual_setup' ) ) {
	function manual_theme_manual_setup() {
		
        /*	Load Text Domain */
		load_theme_textdomain( 'manual', trailingslashit( get_template_directory() ) . 'languages' );
		
        /*	Add Automatic Feed Links Support */
        add_theme_support( 'automatic-feed-links' );
		
        /* Add Post Formats Support */
		add_theme_support('post-formats', array('link', 'aside', 'gallery', 'image', 'quote', 'status', 'video', 'audio', 'chat'));
		
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);
		
		/* Add WooCommerce support */
		add_theme_support( 'woocommerce' );
		
		/*** If BBPress is active, add theme support */
		if ( class_exists( 'bbPress' ) ) { add_theme_support( 'bbpress' ); }

		/* Let WordPress manage the document title. */
		add_theme_support( 'title-tag' );
		
		/* Add Post Thumbnails Support and Related Image Sizes */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 825, 510, true );
		
		/** This theme uses wp_nav_menu() in one location. */
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu',  'manual' ),
			'footer'  => esc_html__( 'Footer Menu',  'manual' ),
		) );
		
		/** Custom image sizes */
		add_image_size( 'portfolio-FitRows', 700, 525, true ); 
		
		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
		
		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'css/style-editor.css' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );
		
	}
}
add_action( 'after_setup_theme', 'manual_theme_manual_setup' );

/*-----------------------------------------------------------------------------------*/
/*	Framework :: REDUXCORE (Manual Theme Options)
/*-----------------------------------------------------------------------------------*/
require_once( trailingslashit( get_template_directory() ) . 'framework/ReduxCore/manual/manual.php' );

/*-----------------------------------------------------------------------------------*/
/*	Framework :: CMB2 (META TYPE)
/*-----------------------------------------------------------------------------------*/ 
require trailingslashit( get_template_directory() ) . 'framework/post-meta/kb.php';
require trailingslashit( get_template_directory() ) . 'framework/post-meta/portfolio.php';
require trailingslashit( get_template_directory() ) . 'framework/post-meta/page.php';
require trailingslashit( get_template_directory() ) . 'framework/post-meta/custom-meta.php';
require trailingslashit( get_template_directory() ) . 'framework/post-meta/doc.php';
require trailingslashit( get_template_directory() ) . 'framework/post-meta/faq.php';
require trailingslashit( get_template_directory() ) . 'framework/post-meta/home-pg-block.php';

/*-----------------------------------------------------------------------------------*/
/*	Customizer
/*-----------------------------------------------------------------------------------*/ 
require trailingslashit( get_template_directory() ) . 'framework/customizer.php';
require trailingslashit( get_template_directory() ) . 'framework/customize/customize.php';
require trailingslashit( get_template_directory() ) . 'framework/customize/customize-header.php';
require trailingslashit( get_template_directory() ) . 'framework/customize/header-custom-post-type.php';
require trailingslashit( get_template_directory() ) . 'template/search/functions.php';
require trailingslashit( get_template_directory() ) . 'template/bbpress/functions.php';

/*-----------------------------------------------------------------------------------*/
/*	Custom template tags for this theme
/*-----------------------------------------------------------------------------------*/ 
require trailingslashit( get_template_directory() ) . 'framework/template-tags.php';

/*-----------------------------------------------------------------------------------*/
/*	Widget Register & Placement
/*-----------------------------------------------------------------------------------*/ 
require trailingslashit( get_template_directory() ) . 'framework/widget/widget-type.php';
require trailingslashit( get_template_directory() ) . 'framework/widget/widget.php';

/*-----------------------------------------------------------------------------------*/
/*	Breadcrumb
/*-----------------------------------------------------------------------------------*/ 
require trailingslashit( get_template_directory() ) . 'framework/breadcrumb.php';

/*-----------------------------------------------------------------------------------*/
/*	DOC + KB
/*-----------------------------------------------------------------------------------*/ 
require trailingslashit( get_template_directory() ) . 'template/doc/functions.php';
require trailingslashit( get_template_directory() ) . 'template/doc/doc-ajax.php';
require trailingslashit( get_template_directory() ) . 'template/kb/functions.php';

/*-----------------------------------------------------------------------------------*/
/*	SUPPORT FUNCTION
/*-----------------------------------------------------------------------------------*/ 
require trailingslashit( get_template_directory() ) . 'framework/includes/functions.php';

/*-----------------------------------------------------------------------------------*/
/*	HOOK
/*-----------------------------------------------------------------------------------*/
require trailingslashit( get_template_directory() ) . 'framework/includes/hook.php';

/*-----------------------------------------------------------------------------------*/
/*	Custom Menu
/*-----------------------------------------------------------------------------------*/  
require trailingslashit( get_template_directory() ) . 'framework/includes/menu.php';

/*-----------------------------------------------------------------------------------*/
/*	WOOCOMMERCE
/*-----------------------------------------------------------------------------------*/
require trailingslashit( get_template_directory() ) . 'woocommerce/woocommerce_configuration.php';

/*-----------------------------------------------------------------------------------*/
/*	IMPORT
/*-----------------------------------------------------------------------------------*/ 
require trailingslashit( get_template_directory() ) . 'framework/import/one-click-import.php';

/*-----------------------------------------------------------------------------------*/
/*	LEARNPRESS
/*-----------------------------------------------------------------------------------*/ 
require trailingslashit( get_template_directory() ) . 'framework/learnpress/class_learnpress.php';
require trailingslashit( get_template_directory() ) . 'framework/post-meta/learnpress.php';


/*-----------------------------------------------------------------------------------*/
/*	ELEMENTOR
/*-----------------------------------------------------------------------------------*/ 
if ( manual__abs_plugin_active( 'elementor/elementor.php' ) ) {
	require trailingslashit( get_template_directory() ) . 'elementor/addons.php';
}


/*-----------------------------------------------------------------------------------*/
/*	Manual Framework Plugin Update Checker
/*-----------------------------------------------------------------------------------*/ 
$manual_theme_framework_version_check = "3.2"; 
$is_plugin_required_fortheme_active = manual__chkfunction_plugin_active('manual_framework_plugin_active');
if ( $is_plugin_required_fortheme_active == true ) {
	$manual_theme_framework_version = get_option( 'manual_theme_framework_version' );
	if( $manual_theme_framework_version != $manual_theme_framework_version_check || $manual_theme_framework_version == '' ) {  
		add_action('admin_notices', 'manual_plugin_notify');
	}
}

function manual_plugin_notify() {
$allowed_html_array = array('a' => array('href' => array(),'title' => array()),'br' => array(),'div' => array('class' => array('manual_adminmsg'),),'strong' => array(),'span' => array(),);
echo wp_kses( '<div class="manual_adminmsg"><span>PLEASE UPGRADE "Manual Framework (Post Type)" to the new version 3.2</span> <br><br> 1. Go to: Plugins -> Installed Plugins. <br>2. <strong>DELETE plugin "Manual Framework (Post Type)"</strong> from the system. <strong><i><span>(you must DEACTIVATE plugin first and DELETE it)</span></i></strong> <br> 3. <strong>Go to: Appearance > Install Plugin</strong>, to intall the new version.<br><br><i>Note: No data will be loss in this upgrade process.</i> </div>', $allowed_html_array);
}

/*-----------------------------------------------------------------------------------*/
/*	ACTIVATE VC
/*-----------------------------------------------------------------------------------*/
$is_plugin_js_composer_active = manual__plugin_active('Vc_Manager');
if ( $is_plugin_js_composer_active == true ) {
	
	// check the latest vc version
	if( version_compare(WPB_VC_VERSION, '6.7.0', '<' ) ) {
		add_action('admin_notices', 'manual_plugin_vc_update_notify');
	}
	require trailingslashit( get_template_directory() ) . 'framework/vc-include/row.php';
	require trailingslashit( get_template_directory() ) . 'framework/vc-include/vc.php';
	require trailingslashit( get_template_directory() ) . 'framework/vc-include/shortcodes.php';
	require trailingslashit( get_template_directory() ) . 'framework/vc-include/template.php';
}

function manual_plugin_vc_update_notify() {
$allowed_html_array = array('a' => array('href' => array(),'title' => array()),'br' => array(),'div' => array('class' => array('manual_adminmsg'),),'strong' => array(),'span' => array(),);
echo wp_kses( '<div class="manual_adminmsg"><div class="message" style="padding: 10px; font-size: 14px; color: #FCFCFC; color: #000000; background: white; box-shadow: 1px 1px 10px #828181;"><span style="color: #C31111; font-weight:bold;">PLEASE UPGRADE "WPBakery Visual Composer" to the new version 6.7.0</span> <br><br> 1. Go to: Plugins -> Installed Plugins. <br>2. <strong>DELETE plugin</strong> "WPBakery Visual Composer" for the system. <strong><i>(you must DEACTIVATE plugin first and DELETE it)</i></strong> <br> 3. <strong>Go to: Appearance > Install Plugin, to intall new version</strong>.</span> <br><br><i>Note: No data will be loss in this upgrade process.</i> </div></div>', $allowed_html_array);
}


/*-----------------------------------------------------------------------------------*/
/*	CHECKER SR PLUGIN
/*-----------------------------------------------------------------------------------*/ 
$is_plugin_revslider_active = manual__plugin_active('RevSliderFront');
if ( $is_plugin_revslider_active == true ) {
	if( version_compare( RS_REVISION, '6.5.8', '<' ) ) {
		add_action('admin_notices', 'manual_plugin_slider_revolution_update_notify');
	}
}
function manual_plugin_slider_revolution_update_notify() {
$allowed_html_array = array('a' => array('href' => array(),'title' => array()),'br' => array(),'div' => array('class' => array('manual_adminmsg'),),'strong' => array(),'span' => array(),);
echo wp_kses( '<div class="manual_adminmsg"><span>PLEASE UPGRADE "Slider Revolution" to the new version 6.5.8</span> <br><br> 1. Go to: Plugins -> Installed Plugins. <br>2. <strong>DELETE plugin</strong> "Slider Revolution" from the system. <strong><i>(you must DEACTIVATE plugin first and DELETE it)</i></strong> <br> 3. <strong>Go to "Manual > Plugins"</strong> and click on <strong>"install"</strong>, to install the new version.</span> <br><br><i>Note: No data will be loss in this upgrade process.</i> </div>', $allowed_html_array);
}


/*-----------------------------------------------------------------------------------*/
/*	Ultimate_VC_Addons
/*-----------------------------------------------------------------------------------*/
$is_plugin_ultimate_addons_for_wpbakery_page_builder_active = manual__plugin_active('Ultimate_VC_Addons');
if ( $is_plugin_ultimate_addons_for_wpbakery_page_builder_active == true ) {
	// check the latest vc version
	if( version_compare(ULTIMATE_VERSION, '3.19.11', '<' ) ) {
		add_action('admin_notices', 'manual__plugin_ultimate_addons_for_wpbakery_update_notify');
	}
}

function manual__plugin_ultimate_addons_for_wpbakery_update_notify() {
$allowed_html_array = array('a' => array('href' => array(),'title' => array()),'br' => array(),'div' => array('class' => array('manual_adminmsg'),),'strong' => array(),'span' => array(),);
printf( wp_kses( __('<div class="manual_adminmsg"><span>PLEASE UPGRADE "Ultimate Addons for WPBakery Page Builder" to the new version 3.19.11</span> <br><br> 1. Go to: Plugins -> Installed Plugins. <br>2. <strong>DELETE plugin</strong> "Ultimate Addons for WPBakery Page Builder" for the system. <strong><i>(you must DEACTIVATE plugin first and DELETE it)</i></strong> <br> 3. <strong>Go to "Manual > Plugins"</strong>, to install new version.</span> <br><br><i>Note: No data will be loss in this upgrade process.</i> </div>', 'manual' ), $allowed_html_array) );
}
?>