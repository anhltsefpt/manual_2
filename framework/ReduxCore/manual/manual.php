<?php
    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    $opt_name = "redux_demo";    // ==== IMPORTANT

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        'opt_name'             => $opt_name,
        'display_name'         => $theme->get( 'Name' ),
        'display_version'      => $theme->get( 'Version' ),
        'menu_type'            => 'menu',
        'allow_sub_menu'       => true,
        'menu_title'           => __( 'Manual Options', 'manual' ),
        'page_title'           => __( 'Manual Options', 'manual' ),
        'google_api_key'       => '',
        'google_update_weekly' => false,
        'async_typography'     => true,
        'admin_bar'            => true,
        'admin_bar_icon'       => 'dashicons-portfolio',
        'admin_bar_priority'   => 50,
        'global_variable'      => 'theme_options',
        'dev_mode'             => false,
		'forced_dev_mode_off'  => true,
		'use_cdn'              => false,
        'update_notice'        => true,
        'customizer'           => true,
        'page_priority'        => null,
        'page_parent'          => 'themes.php',
        'page_permissions'     => 'manage_options',
        'menu_icon'            => '',
        'last_tab'             => '',
        'page_icon'            => 'icon-themes',
        'page_slug'            => '',
        'save_defaults'        => true,
        'default_show'         => false,
        'default_mark'         => '',
        'show_import_export'   => true,
        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
		'show_options_object'  => false,
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
    } else {
    }


    Redux::setArgs( $opt_name, $args );


/*********************************
*******  TEXT & SOCIAL SHARE *****
**********************************/	 
	 
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Text', 'manual' ),
        'id'               => 'theme_global_used_text_section',
       // 'subsection'       => true,
        'customizer_width' => '450px',
		'icon'             => 'el el-globe-alt',
        'fields'           => array(
			
			/****** Copyright Text  *****/
			array(
				'id'       => 'footer-copyright',
				'type'     => 'text',
				'title'    => esc_html__( 'Copyright Text', 'manual' ),
				'default'  => 'Copyright 2021 WpSmartApps.com. All Rights Reserved.'
			),
			
			/****** Article Modified Text  *****/
			array(
				'id'       => 'date-modified-text',
				'type'     => 'text',
				'title'    => esc_html__( 'Article Modified Text', 'manual' ),
				'default'  => 'Updated on',
				'desc'     => esc_html__( 'Will appear as: Updated on October 10, 2021', 'manual' ),
			),
			
			/****** Breadcrumb  *****/
			array(
                'id'       => 'theme-breadcrumb-records-text-change',
                'type'     => 'section',
                'title'    => esc_html__( 'Breadcrumb', 'manual' ),
                'indent'   => true, 
            ),
			array (
				'subtitle' => esc_html__('rename initial "Home" attribute in a Breadcrumb: "Home / Doc /... ', 'manual'),
				'id' => 'custom-record-breadcrumb-home-text',
				'type' => 'text',
				'title' => esc_html__('Home Text', 'manual'),
				'default' => 'home',
			),
			
			/****** Blog  *****/
			array(
                'id'       => 'theme-blog-text-change',
                'type'     => 'section',
                'title'    => esc_html__( 'Blog', 'manual' ),
                'indent'   => true, 
            ),
			array (
				'subtitle' => esc_html__('Will appear under summery post content', 'manual'),
				'id' => 'theme-defult-post-continue-reading-text',
				'type' => 'text',
				'title' => esc_html__('Continue Reading', 'manual'),
				'default' => esc_html__('Continue Reading', 'manual'),
			),
		
			/****** General  *****/
			array(
                'id'       => 'theme-post-records-text-change',
                'type'     => 'section',
                'title'    => esc_html__( 'Custom Post Records', 'manual' ),
                'indent'   => true, 
            ),
			array (
				'subtitle' => esc_html__('Will appear under knowledgebase and documentation records', 'manual'),
				'id' => 'custom-record-post-view-text',
				'type' => 'text',
				'title' => esc_html__('View Text', 'manual'),
				'default' => esc_html__('views', 'manual'),
			),
			
			/****** Table Of Content  *****/
			array(
                'id'       => 'theme-post-table-of-content',
                'type'     => 'section',
                'title'    => esc_html__( 'Table Of Content', 'manual' ),
                'indent'   => true, 
            ),
			array (
				'subtitle' => esc_html__('Will appear as the title for the TOC', 'manual'),
				'id' => 'toc-on-this-page',
				'type' => 'text',
				'title' => esc_html__('On This Page Text', 'manual'),
				'default' => esc_html__('On This Page:', 'manual'),
			),
			array (
				'subtitle' => esc_html__('Show/Hide text will appear next to the TOC title', 'manual'),
				'id' => 'toc-hide-text',
				'type' => 'text',
				'title' => esc_html__('Hide Text', 'manual'),
				'default' => esc_html__('hide', 'manual'),
			),
			array (
				'subtitle' => esc_html__('Show/Hide text will appear next to the TOC title', 'manual'),
				'id' => 'toc-show-text',
				'type' => 'text',
				'title' => esc_html__('Show Text', 'manual'),
				'default' => esc_html__('show', 'manual'),
			),
			
			/****** Post like dislike  *****/
			array(
                'id'       => 'theme-post-like-dislike-global-text-change',
                'type'     => 'section',
                'title'    => esc_html__( 'Post Like/Dislike', 'manual' ),
                'indent'   => true, 
            ),
			array (
				'subtitle' => esc_html__('This message will appear above Yes/No button on the knowledgebase and documentation section.', 'manual'),
				'id' => 'yes-no-above-message',
				'type' => 'text',
				'title' => esc_html__('Like/Dislike Message', 'manual'),
				'default' => esc_html__('Was this helpful?', 'manual'),
			),
			array (
				'id' => 'yes-user-input-text',
				'type' => 'text',
				'title' => esc_html__('Like Button Text', 'manual'),
				'subtitle' => esc_html__('(Yes) button Text.', 'manual'),
				'default' => 'Yes',
			),
			array (
				'id' => 'no-user-input-text',
				'type' => 'text',
				'title' => esc_html__('Unlike Button Text', 'manual'),
				'subtitle' => esc_html__('(No) button Text.', 'manual'),
				'default' => 'No',
			),
			array (
				'id' => 'already-voted',
				'type' => 'text',
				'title' => esc_html__('Already Voted', 'manual'),
				'subtitle' => esc_html__('Message appear if user has voted already', 'manual'),
				'default' => 'already voted',
			),
			array (
				'id' => 'reset-user-input-text',
				'type' => 'text',
				'title' => esc_html__('Reset Button Text', 'manual'),
				'subtitle' => esc_html__('(Reset) button Text.', 'manual'),
				'default' => 'Reset',
			),
			
			/****** File attached  *****/
			array(
                'id'       => 'theme-post-file-attached-global-text-change',
                'type'     => 'section',
                'title'    => esc_html__( 'Post File Attached', 'manual' ),
                'indent'   => true, 
            ),
			array (
				'subtitle' => esc_html__('Will appear as title', 'manual'),
				'id' => 'attached-file-title',
				'type' => 'text',
				'title' => esc_html__('Attached File Title', 'manual'),
				'default' => esc_html__('Attached Files', 'manual'),
			),
			array (
				'subtitle' => esc_html__('Will appear on the table section as header', 'manual'),
				'id' => 'attached-file-type',
				'type' => 'text',
				'title' => esc_html__('[Attached] File Type Title', 'manual'),
				'default' => 'File Type',
			),
			array (
				'subtitle' => esc_html__('Will appear on the table section as header', 'manual'),
				'id' => 'attached-file-size',
				'type' => 'text',
				'title' => esc_html__('[Attached] File Size Title', 'manual'),
				'default' => 'File Size',
			),
			array (
				'subtitle' => esc_html__('Will appear on the table section as header', 'manual'),
				'id' => 'attached-file-download',
				'type' => 'text',
				'title' => esc_html__('[Attached] File Download Title', 'manual'),
				'default' => 'Download',
			),
			
			/****** knowledgebase  *****/
			array(
                'id'       => 'knowlegebase-global-text-change',
                'type'     => 'section',
                'title'    => esc_html__( 'Knowledge Base', 'manual' ),
                'indent'   => true, 
            ),
			array(
				'id'       => 'kb-cat-page-access-control-message',
				'type'     => 'text',
				'title'    => esc_html__( 'Knowledgebase Category Access Control Message', 'manual' ),
				'default'  => 'You do not have sufficient permissions to access this Knowledge-base Category.',
				'subtitle' => esc_html__('will appear if logged-in user has not sufficient permission to access the selected category', 'manual' ),
			),
			array(
				'id'       => 'kb-single-page-access-control-message',
				'type'     => 'text',
				'title'    => esc_html__( 'Knowledgebase Article Access Control Message', 'manual' ),
				'default'  => 'You do not have sufficient permissions to access this Knowledge-base Article.',
				'subtitle' => esc_html__('will appear if logged-in user has not sufficient permission to access the selected article', 'manual' ),
			),
			array(
				'id'       => 'kb-cat-view-all',
				'type'     => 'text',
				'title'    => esc_html__( 'View All Text', 'manual' ),
				'default'  => 'View All',
				'subtitle' => esc_html__('will appear under category records','manual' ),
			),
			array(
				'id'       => 'kb-related-post-title',
				'type'     => 'text',
				'title'    => esc_html__( 'Related Post Title', 'manual' ),
				'default'  => 'Related Articles',
			),
			
			/****** Documentation *****/
			array(
                'id'       => 'documentation-global-text-change',
                'type'     => 'section',
                'title'    => esc_html__( 'Documentation', 'manual' ),
                'indent'   => true, 
            ),
			array(
				'id'       => 'documentation-expand-text',
				'type'     => 'text',
				'title'    => esc_html__( 'Expand Text', 'manual' ),
				'default'  => 'Expand All',
				'subtitle' => esc_html__('will appear on the documentation sidebar @ top', 'manual' ),
			),
			array(
				'id'       => 'documentation-collapse-text',
				'type'     => 'text',
				'title'    => esc_html__( 'Collapse Text', 'manual' ),
				'default'  => 'Collapse All',
				'subtitle' => esc_html__('will appear on the documentation sidebar @ top', 'manual' ),
			),
			array(
				'id'       => 'documentation-root-category-access-control-message',
				'type'     => 'text',
				'title'    => esc_html__( 'Documentation Category Access Control Message', 'manual' ),
				'default'  => 'You do not have sufficient permissions to access this documentation',
				'subtitle' => esc_html__('will appear if logged-in user has not sufficient permission to access the selected category', 'manual' ),
			),
			array(
				'id'       => 'documentation-single-page-access-control-message',
				'type'     => 'text',
				'title'    => esc_html__( 'Documentation Article Access Control Message', 'manual' ),
				'default'  => 'You do not have sufficient permissions to access this documentation Article.',
				'subtitle' => esc_html__('will appear if logged-in user has not sufficient permission to access the selected article','manual' ),
			),
			array(
				'id'       => 'documentation-related-post-title',
				'type'     => 'text',
				'title'    => esc_html__( 'Related Post Title', 'manual' ),
				'default'  => 'Related Articles',
			),
			
			
			/****** FAQ *****/
			array(
                'id'       => 'faq-global-text-change',
                'type'     => 'section',
                'title'    => esc_html__( 'FAQ', 'manual' ),
                'indent'   => true, 
            ),
			 array(
				'id'       => 'faq-expand-collapse-text',
				'type'     => 'text',
				'title'    => esc_html__( 'Expand / Collapse Text', 'manual' ),
				'default'  => 'Expand / Collapse All',
			),
            array(
                'id'       => 'faq-cat-page-access-control-message',
                'type'     => 'text',
                'title'    => esc_html__( 'FAQ Category Access Control Message', 'manual' ),
                'default'  => 'You do not have sufficient permissions to access this FAQ Category.',
                'subtitle' => esc_html__('will appear if logged-in user has not sufficient permission to access the selected category', 'manual' ),
            ),
			
			/****** Forum *****/
			array(
                'id'       => 'bbpress-global-text-change',
                'type'     => 'section',
                'title'    => esc_html__( 'Forum (bbPress)', 'manual' ),
                'indent'   => true, 
            ),
			array(
				'id'       => 'bbpress-directory-text',
				'type'     => 'text',
				'title'    => esc_html__( 'Directory Text', 'manual' ),
				'default'  => 'Directory',
			),
			array(
				'id'       => 'bbpress-topic-text',
				'type'     => 'text',
				'title'    => esc_html__( 'Topic Text', 'manual' ),
				'default'  => 'Topics',
			),
			array(
				'id'       => 'bbpress-posts-text',
				'type'     => 'text',
				'title'    => esc_html__( 'Posts Text', 'manual' ),
				'default'  => 'Posts',
			),
			array(
				'id'       => 'bbpress-lastpost-text',
				'type'     => 'text',
				'title'    => esc_html__( 'Last Post Text', 'manual' ),
				'default'  => 'Last Post',
			),
			array(
				'id'       => 'bbpress-voices-text',
				'type'     => 'text',
				'title'    => esc_html__( 'Voices Text', 'manual' ),
				'default'  => 'Voices',
			),

		)
    ) );
	
	
/***************************************
*******  THEME - SITE LAYOUT ***
****************************************/

    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Layout', 'manual' ),
        'id'     => 'manualtheme-layout',
        'icon'   => 'el el-website',
        'fields' => array(
						  
					array(
						'id'       => 'website_box_layout',
						'type'     => 'switch',
						'title'    => esc_html__('Layout', 'manual' ),
						'subtitle' => esc_html__('Controls the site layout.', 'manual'),
						'default'  => false,
						'on' => esc_html__( 'Boxed', 'manual' ),
						'off' => esc_html__( 'Wide', 'manual' ),
					),
					array(
						'id'       => 'website_width_container_1200',
						'type'     => 'text',
						'title'    => esc_html__( 'Container Width (min: 1200px)', 'manual' ),
						'subtitle'  => esc_html__( 'Controls container width when the browser window is minimum 1200px', 'manual' ),
						'default'  => '1170px',
						'desc'     => esc_html__( 'Default: 1170px', 'manual' ),
					),
					array(
						'id'       => 'website_nav_container_global_full_width',
						'type'     => 'switch',
						'title'    => esc_html__( 'Header Full Width Layout', 'manual' ),
						'subtitle' => esc_html__('Make menu+logo area full width', 'manual'),
						'default'  => false,
						'required' => array('website_box_layout','equals','0'),
						'on' => esc_html__( 'Enable', 'manual' ),
						'off' => esc_html__( 'Disable', 'manual' ),
					),
					array(
						'id'       => 'website_footer_container_global_full_width',
						'type'     => 'switch',
						'title'    => esc_html__( 'Footer Full Width Layout', 'manual' ),
						'subtitle' => esc_html__('Make footer area full width', 'manual'),
						'default'  => false,
						'required' => array('website_box_layout','equals','0'),
						'on' => esc_html__( 'Enable', 'manual' ),
						'off' => esc_html__( 'Disable', 'manual' ),
					),
					array(
						'id'       => 'website_boxlayout_max_width',
						'type'     => 'text',
						'title'    => esc_html__( 'Boxed Layout Max. Width', 'manual' ),
						'subtitle'  => esc_html__( 'Controls box layout width', 'manual' ),
						'default'  => '1230px',
						'desc'     => esc_html__( 'Default: 1230px', 'manual' ),
						'required' => array('website_box_layout','equals','1'),
					),
					array(
						'id'             => 'website_box_layout_outer_margin',
						'type'           => 'spacing',
						'mode'           => 'margin',
						'units'          => 'px',
						'left'           => false,
						'right'           => false,
						'title'          => esc_html__('Boxed Mode Top/Bottom Offset', 'manual'),
						'subtitle'       => esc_html__('Controls the top/bottom offset of the boxed background. Enter values including any valid CSS unit, ex: 0px, 0px.', 'manual'),
						'default'            => array(
							'margin-top'     => '25px ', 
							'margin-bottom'    => '0px',
						),
						'required' => array('website_box_layout','equals','1'),
					),
					array(
						'id'       => 'website_box_layout_bg_color',
						'type'     => 'link_color',
						'title'    => esc_html__( 'Background Color', 'manual' ),
						'subtitle' => esc_html__('Choose the background color for your box layout', 'manual'),
						'hover'    => false, 
						'active'    => false, 
						'visited'   => false, 
						'default'  => array(
							'regular'   => '#ffffff',
						),
						'required' => array('website_box_layout','equals','1'),
					),
					array(
						'id'       => 'website_box_layout_bg_image',
						'type'     => 'switch',
						'title'    => esc_html__('Apply Background Image', 'manual' ),
						'subtitle' => esc_html__('Controls the site layout.', 'manual'),
						'default'  => false,
						'on' => esc_html__( 'Enable', 'manual' ),
						'off' => esc_html__( 'Disable', 'manual' ),
						'required' => array('website_box_layout','equals','1'),
					),
					array (
							'subtitle' => esc_html__('Choose the background image for your box layout', 'manual'),
							'id' => 'website_box_layout_background_image',
							'type' => 'media',
							'title' => esc_html__('Background Image', 'manual'),
							'url' => false,
							'required' => array('website_box_layout_bg_image','equals','1'),
					 ),
					 array(
						'id'       => 'website_box_layout_background_image_size',
						'type'     => 'select',
						'title'    => esc_html__( 'Background Image Size', 'manual' ),
						'options'  => array(
							'auto' => esc_html__('Auto','manual'),
							'cover' => esc_html__('Cover','manual'),
							'inherit' => esc_html__('Inherit','manual'),
						),
						'default'  => 'auto',
						'required' => array('website_box_layout_bg_image','equals','1'),
					),
					array(
						'id'       => 'website_box_layout_background_image_position',
						'type'     => 'select',
						'title'    => esc_html__( 'Background Image Position', 'manual' ),
						'options'  => array(
							'center top' => esc_html__('Center Top','manual'),
							'center center' => esc_html__('Center Center','manual'),
							'center bottom' => esc_html__('Center Bottom','manual'),
						),
						'default'  => 'center center',
						'required' => array('website_box_layout_bg_image','equals','1'),
					),
					array(
						'id'       => 'website_box_layout_background_image_repeat',
						'type'     => 'select',
						'title'    => esc_html__( 'Background Image Repeat', 'manual' ),
						'options'  => array(
							'no-repeat' => esc_html__('No Repeat', 'manual' ),
							'repeat' => esc_html__('Repeat', 'manual' ),
							'inherit' => esc_html__('Inherit', 'manual' ),
						),
						'default'  => 'repeat',
						'required' => array('website_box_layout_bg_image','equals','1'),
					),
					
					// Container
					array(
						'id'       => 'website_box_layout_section',
						'type'     => 'section',
						'title'    => esc_html__( 'High Screen Container Width Control', 'manual' ),
						'indent'   => true, 
					),
					array(
						'id'       => 'website_highscreen_container',
						'type'     => 'switch',
						'title'    => esc_html__('Control High Screen Container Width', 'manual' ),
						'subtitle' => esc_html__('Controls the site container layout.', 'manual'),
						'default'  => false,
						'on' => esc_html__( 'Enable', 'manual' ),
						'off' => esc_html__( 'Disable', 'manual' ),
					),
					array(
						'id'       => 'website_width_container_1400_and_1600',
						'type'     => 'text',
						'title'    => esc_html__( 'Container Width (min: 1400px) & (min: 1600px)', 'manual' ),
						'subtitle'  => esc_html__( 'Controls container width when the browser window is minimum 1400px and minimum 1600px', 'manual' ),
						'default'  => '1370px',
						'desc'     => esc_html__( 'Default: 1370px', 'manual' ),
						'required' => array('website_highscreen_container','equals','1'),
					),
					array(
						'id'       => 'website_width_container_1900',
						'type'     => 'text',
						'title'    => esc_html__( 'Container Width (min: 1900px) and above', 'manual' ),
						'subtitle'  => esc_html__( 'Controls container width when the browser window is minimum 1900px', 'manual' ),
						'default'  => '1570px',
						'desc'     => esc_html__( 'Default: 1570px', 'manual' ),
						'required' => array('website_highscreen_container','equals','1'),
					),
					array(
						'id'       => 'website_boxlayout_max_width_1400_and_1600',
						'type'     => 'text',
						'title'    => esc_html__( 'Boxed Layout Max. Width', 'manual' ),
						'subtitle'  => esc_html__( 'Controls box layout width for the screen size (min: 1400px) & (min: 1600px)', 'manual' ),
						'default'  => '1450px',
						'desc'     => esc_html__( 'Default: 1450px', 'manual' ),
						'required' => array('website_highscreen_container','equals','1'),
					),
					array(
						'id'       => 'website_boxlayout_max_width_1900',
						'type'     => 'text',
						'title'    => esc_html__( 'Boxed Layout Max. Width', 'manual' ),
						'subtitle'  => esc_html__( 'Controls box layout width for the screen size (min: 1900px) and above', 'manual' ),
						'default'  => '1650px',
						'desc'     => esc_html__( 'Default: 1650px', 'manual' ),
						'required' => array('website_highscreen_container','equals','1'),
					),
						  
	  )
    ) );
	
	
/******************************
***** WEBSITE GLOBAL COLOR ****
*******************************/

    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Colors', 'manual' ),
        'id'     => 'manual-theme-global-color',
        'icon'   => 'el el-brush',
        'fields' => array(
						  
					// Website colour
					array(
						'id'       => 'website_colour',
						'type'     => 'link_color',
						'title'    => esc_html__( 'Website Color', 'manual' ),
						'subtitle'  => esc_html__('Applied to site globally', 'manual'),
						'hover'    => false, 
						'active'    => false, 
						'visited'   => false, 
						'default'  => array(
							'regular'   => '#47C494',
						)
					),
					
					// Standard a tag color
					array(
						'id'       => 'manual-global-link-color',
						'type'     => 'link_color',
						'title'    => esc_html__( 'Standard "a" TAG :: Color', 'manual' ),
						'subtitle'  => esc_html__('Standard color', 'manual'),
						'active'    => false, 
						'visited'   => false, 
						'default'  => array(
							'regular' => '#333333',
							'hover'   => '#46b289',
						),
					),
					
					// Standard a tag color - inside post
					array(
						'id'       => 'standard_a_tag_link_color_inside_post',
						'type'     => 'link_color',
						'title'    => esc_html__( 'Standard "a" TAG :: Color (inside post)', 'manual' ),
						'subtitle'  => esc_html__('Standard color for the post content', 'manual'),
						'active'    => false, 
						'visited'   => false, 
						'default'  => array(   
							'regular'   => '#1e73be',
							'hover'   => '#46b289',
						)
					),
					
					// Custom text link color
					array(
						'id'       => 'text_link_color',
						'type'     => 'link_color',
						'title'    => esc_html__( 'Custom Text :: Link Color', 'manual' ),
						'subtitle'  => esc_html__('Custom text link with icon attached', 'manual'),
						'active'    => false, 
						'visited'   => false, 
						'default'  => array(
							'regular' => '#46b289',
							'hover'   => '#001040',
						)
					),
					
					// Button color
					array(
						'id'       => 'botton_color',
						'type'     => 'link_color',
						'title'    => esc_html__( 'Botton Color', 'manual' ),
						'subtitle'  => esc_html__('Botton with special CSS effects', 'manual'),
						'active'    => false, 
						'visited'   => false, 
						'default'  => array(
							'regular' => '#46b289',
							'hover'   => '#001040',
						)
					),
					
					// Button text color
					array(
						'id'       => 'botton_text_color',
						'type'     => 'link_color',
						'title'    => esc_html__( 'Botton Text Color', 'manual' ),
						'active'    => false, 
						'hover'    => false, 
						'visited'   => false, 
						'default'  => array(
							'regular' => '#ffffff',
						)
					),
					
					// Meta icon color
					array(
						'id'       => 'blog-meta-icon-color',
						'type'     => 'link_color',
						'title'    => esc_html__( 'Meta Icon :: Color', 'manual' ),
						'subtitle'  => esc_html__('Appears Below the title', 'manual'),
						'hover'    => false, 
						'active'    => false, 
						'visited'   => false, 
						'default'  => array(
							'regular' => '#46b289',
						)
					),
					
					// Meta icon color
					array(
						'id'       => 'blog-meta-icon-text-color',
						'type'     => 'link_color',
						'title'    => esc_html__( 'Meta Text :: Color', 'manual' ),
						'subtitle'  => esc_html__('Appears Below the title', 'manual'),
						'hover'    => false, 
						'active'    => false, 
						'visited'   => false, 
						'default'  => array(
							'regular' => '#727272',
						)
					),
	
        )
    ) );
	


/***************************************
*******  THEME OPTIONS  - LOGO     *****
****************************************/

	 Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Logo', 'manual' ),
        'id'     => 'theme-header-logo-settings',
		'icon'   => 'el el-plus-sign',
        'fields' => array(
						  
			array(
				'id'       => 'hide-header-logo-status',
				'type'     => 'switch',
				'title'    => esc_html__( 'Hide Logo', 'manual' ),
				'default'  => false,
				'subtitle' => esc_html__( 'Global Effect', 'manual' ),
			),			  
			array (
				'subtitle' => esc_html__('Favicon for your website', 'manual'),
				'id' => 'manual-favicon',
				'type' => 'media',
				'title' => esc_html__('Favicon', 'manual'),
				'url' => false,
				'desc' => esc_html__( 'Standard favicon size: 16px x 16px or 32px x 32px', 'manual' ),
			),
            array(
                'id'       => 'theme-header-logo',
                'type'     => 'media',
                'title'    => esc_html__( 'Default Logo', 'manual' ),
				'url' => false,
				'subtitle' => esc_html__('Select an image file for your logo.', 'manual'),
				'desc' => esc_html__( 'Standard logo size: 479px x 105px', 'manual' ),
            ),
		    array(
                'id'       => 'theme-nav-homepg-logo-when-img-bg',
                'type'     => 'media',
				'url' => false,
                'title'    => esc_html__( 'White Logo', 'manual' ),
				'subtitle' => esc_html__( 'Applyed white logo if found image background', 'manual' ),
				'desc' => esc_html__( 'Standard logo size: 479px x 105px', 'manual' ),
            ),
			array(
				'id'       => 'theme-custom-site-url',
				'type'     => 'text',
				'title'    => esc_html__('Logo Custom Link URL', 'manual'),
				'subtitle' => esc_html__('Enter a custom URL the site logo should link to. Leave empty to let logo link to the home page.', 'manual'),
			),
			
			// Readjust Logo
			array(
                'id'       => 'readjust-logo-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Logo Adjustment', 'manual' ),
                'subtitle' => esc_html__( 'Readjust logo if needed', 'manual' ),
                'indent'   => true, 
            ),
			array(
				'id'       => 'theme-logo-readjust-height',
				'type'     => 'dimensions',
				'units'    => array('px'),
				'title'    => esc_html__('Logo Height', 'manual'),
				'desc'     => esc_html__('Default: 35', 'manual'),
				'width'     => false,
				'default'  => array(
					'Height'  => '35'
					)
			),
			array(
				'id'       => 'theme-logo-readjust-margin-top',
				'type'     => 'dimensions',
				'units'    => array('px'),
				'title'    => esc_html__('Logo Top Margin', 'manual'),
				'desc'     => esc_html__('Default: -6', 'manual'),
				'width'     => false,
				'default'  => array(
					'Height'  => '-6'
					)
			),
			array(
				'id'       => 'theme-logo-readjust-height-responsive',
				'type'     => 'dimensions',
				'units'    => array('px'),
				'title'    => esc_html__('Responsive (Logo Height)', 'manual'),
				'desc'     => esc_html__('Default: 35', 'manual'),
				'width'     => false,
				'default'  => array(
					'Height'  => '35'
					)
			),
			array(
				'id'       => 'theme-logo-readjust-margin-top-responsive',
				'type'     => 'dimensions',
				'units'    => array('px'),
				'title'    => esc_html__('Responsive (Logo Top Margin)', 'manual'),
				'desc'     => esc_html__('Default: -6', 'manual'),
				'width'     => false,
				'default'  => array(
					'Height'  => '-6'
					)
			),
			
        )
    ) );
	 

/***************************************
*******  THEME OPTIONS  - TYPOGRAPHY ***
****************************************/

    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Typography', 'manual' ),
        'id'     => 'typography',
        'icon'   => 'el el-font',
        'fields' => array(
						  
			array(
					'id'    => 'typography-section-info',
					'type'  => 'info',
					'style' => 'info',
					'notice' => false,
					'title' => esc_html__( 'IMPORTANT NOTE', 'manual' ),
					'desc'  => __( '<br>This tab contains general typography options. Additional typography options for specific areas can be found within other tabs. Example: For menu typography options go to the menu tab.', 'manual' )
			),			  
			
			// Body
            array(
                'id'       => 'theme-typography-body',
                'type'     => 'typography',
                'title'    => esc_html__( 'Body Font', 'manual' ),
                'subtitle' => esc_html__('Specify the body font properties.', 'manual' ),
                'google'   => true,
				'text-align' => false,
				'font-style' => false,
				'letter-spacing' => true,
				'subsets' => false,
				'font-backup' => true,
				'units'  => '',
                'default'  => array(
                    'color'       => '#333333',
                    'font-size'   => '15',
                    'font-family' => 'PT Sans',
					'line-height' => '1.6',
					'letter-spacing' => '0.3',
					'google'      => true,
					'font-weight' => '400',
                ),
            ),
			
			array (
				'subtitle' => esc_html__('System assume, theme is connected with your custom font', 'manual'),
				'desc' => esc_html__('If place name, Body Font Family will be replaced by this custom font', 'manual'),
				'id' => 'custom-body-font',
				'type' => 'text',
				'title' => esc_html__('Body Custom Font Family Name', 'manual'),
			),
			
			// H1
			array(
                'id'       => 'typography-h1-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Headers Typography', 'manual' ),
                'indent'   => true, 
            ),
			
			array(
                'id'          => 'theme-h1-typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'H1 Headers', 'manual' ),
                'google'      => true,
                'font-backup' => false,
				'text-align' => false,
				'text-transform' => true,
                'subsets'       => false, 
                'letter-spacing'=> true,  
                'all_styles'  => true,
				'font-backup' => true,
                'units'       => 'px',
                'default'     => array(
                    'font-style'  => '800',
                    'font-family' => 'Dosis',
                    'google'      => true,
                    'font-size'   => '40',
                    'line-height' => '45',
					'text-transform' => 'none',
					'letter-spacing' => '-0.7',
					'color' => '#222222',
                ),
            ),
			
			array (
				'subtitle' => esc_html__('System assume, theme is connected with your custom font', 'manual'),
				'desc' => esc_html__('If place name, H1 Font Family will be replaced by this custom font', 'manual'),
				'id' => 'custom-h1-font',
				'type' => 'text',
				'title' => esc_html__('H1 Custom Font Family Name', 'manual'),
			),
			
			// H2
			array(
                'id'          => 'theme-h2-typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'H2 Headers', 'manual' ),
                'google'      => true,
                'font-backup' => false,
				'text-align' => false,
				'text-transform' => true,
                'subsets'       => false, 
                'letter-spacing'=> true,  
                'all_styles'  => true,
				'font-backup' => true,
                'units'       => 'px',
                'default'     => array(
                    'font-style'  => '700',
                    'font-family' => 'Dosis',
                    'google'      => true,
                    'font-size'   => '34',
                    'line-height' => '40',
					'text-transform' => 'none',
					'letter-spacing' => '-0.4',
					'color' => '#222222',
                ),
            ),
			
			array (
				'subtitle' => esc_html__('System assume, theme is connected with your custom font', 'manual'),
				'desc' => esc_html__('If place name, H2 Font Family will be replaced by this custom font', 'manual'),
				'id' => 'custom-h2-font',
				'type' => 'text',
				'title' => esc_html__('H2 Custom Font Family Name', 'manual'),
			),
			
			// H3
			array(
                'id'          => 'theme-h3-typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'H3 Headers', 'manual' ),
                'google'      => true,
                'font-backup' => false,
				'text-align' => false,
				'text-transform' => true,
                'subsets'       => false, 
                'letter-spacing'=> true,  
                'all_styles'  => true,
				'font-backup' => true,
                'units'       => 'px',
                'default'     => array(
                    'font-style'  => '700',
                    'font-family' => 'Dosis',
                    'google'      => true,
                    'font-size'   => '30',
                    'line-height' => '34',
					'text-transform' => 'none',
					'letter-spacing' => '0',
					'color' => '#222222',
                ),
            ),
			
			array (
				'subtitle' => esc_html__('System assume, theme is connected with your custom font', 'manual'),
				'desc' => esc_html__('If place name, H3 Font Family will be replaced by this custom font', 'manual'),
				'id' => 'custom-h3-font',
				'type' => 'text',
				'title' => esc_html__('H3 Custom Font Family Name', 'manual'),
			),
			
			// H4
			array(
                'id'          => 'theme-h4-typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'H4 Headers', 'manual' ),
                'google'      => true,
                'font-backup' => false,
				'text-align' => false,
				'text-transform' => true,
                'subsets'       => false, 
                'letter-spacing'=> true,  
                'all_styles'  => true,
				'font-backup' => true,
                'units'       => 'px',
                'default'     => array(
                    'font-style'  => '700',
                    'font-family' => 'Dosis',
                    'google'      => true,
                    'font-size'   => '24',
                    'line-height' => '30',
					'text-transform' => 'none',
					'letter-spacing' => '0',
					'color' => '#222222',
                ),
            ),
			
			array (
				'subtitle' => esc_html__('System assume, theme is connected with your custom font', 'manual'),
				'desc' => esc_html__('If place name, H4 Font Family will be replaced by this custom font', 'manual'),
				'id' => 'custom-h4-font',
				'type' => 'text',
				'title' => esc_html__('H4 Custom Font Family Name', 'manual'),
			),
			
			// H5
			array(
                'id'          => 'theme-h5-typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'H5 Headers', 'manual' ),
                'google'      => true,
                'font-backup' => false,
				'text-align' => false,
				'text-transform' => true,
                'subsets'       => false, 
                'letter-spacing'=> true,  
                'all_styles'  => true,
				'font-backup' => true,
                'units'       => 'px',
                'default'     => array(
                    'font-style'  => '700',
                    'font-family' => 'Dosis',
                    'google'      => true,
                    'font-size'   => '19',
                    'line-height' => '23',
					'text-transform' => 'none',
					'letter-spacing' => '0',
					'color' => '#222222',
                ),
            ),
			
			array (
				'subtitle' => esc_html__('System assume, theme is connected with your custom font', 'manual'),
				'desc' => esc_html__('If place name, H5 Font Family will be replaced by this custom font', 'manual'),
				'id' => 'custom-h5-font',
				'type' => 'text',
				'title' => esc_html__('H5 Custom Font Family Name', 'manual'),
			),
			
			// H6
			array(
                'id'          => 'theme-h6-typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'H6 Headers', 'manual' ),
                'google'      => true,
                'font-backup' => false,
				'text-align' => false,
				'text-transform' => true,
                'subsets'       => false, 
                'letter-spacing'=> true,  
                'all_styles'  => true,
				'font-backup' => true,
                'units'       => 'px',
                'default'     => array(
                    'font-style'  => '700',
                    'font-family' => 'Dosis',
                    'google'      => true,
                    'font-size'   => '16',
                    'line-height' => '20',
					'text-transform' => 'none',
					'letter-spacing' => '0',
					'color' => '#222222',
                ),
            ),
			
			array (
				'subtitle' => esc_html__('System assume, theme is connected with your custom font', 'manual'),
				'desc' => esc_html__('If place name, H6 Font Family will be replaced by this custom font', 'manual'),
				'id' => 'custom-h6-font',
				'type' => 'text',
				'title' => esc_html__('H6 Custom Font Family Name', 'manual'),
			),
			
        )
    ) );

		
		
		
/***************************
*******  THEME WIDGET  *****
****************************/
		
		Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Theme - Widget', 'manual' ),
		'id'     => 'manual-theme-widget-style',
		'icon'   => 'el el-website',
		'fields' => array(
						  
						  
			array(
					'id'    => 'theme_widget_section_info',
					'type'  => 'info',
					'style' => 'info',
					'notice' => false,
					'title' => esc_html__( 'IMPORTANT NOTE', 'manual' ),
					'desc'  => __( '<br>1. Sidebar width will not work for the shop, course and documentation  pages. <br> <br> 2. Seprate settings are available inside "Manual Options > Documentation > Single/Category Page" to control sidebar width for the documentation section.', 'manual' )
			),			  
			
			array(
				'id'       => 'theme_widget_sticky_sidebar',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Sidebar', 'manual' ),
				'default'  => false,
				'subtitle' => esc_html__( 'Global Effect', 'manual' ),
				'on' => esc_html__( 'Enable', 'manual' ),
				'off' => esc_html__( 'Disable', 'manual' ),
			),
						  
			array(
				'id'       => 'theme_widget_display_style_global',
				'type'     => 'select',
				'title'    => esc_html__( 'Page Sidebar Style', 'manual' ),
				'subtitle' => esc_html__( 'Select widget sidebar design style', 'manual' ),
				'options'  => array(
					'1' => esc_html__('Style 1', 'manual' ),
					'2' => esc_html__('Style 2', 'manual' ),
				),
				'default'  => '1'
			),	
			
			array(
				'id'       => 'theme_widget_width_size_global',
				'type'     => 'select',
				'title'    => esc_html__( 'Sidebar width', 'manual' ),
				'subtitle' => esc_html__( 'Select sidebar width', 'manual' ),
				'options'  => array(
					'1' => esc_html__('25%','manual' ),
					'2' => esc_html__('33.3%','manual' ),
				),
				'default'  => '2'
			),	
		
			array(
				'id'       => 'theme_widget_title_tag',
				'type'     => 'select',
				'title'    => esc_html__( 'Theme Widget Title Tag', 'manual' ),
				'options'  => array(
					'h4' => esc_html__('h4', 'manual' ),
					'h5' => esc_html__('h5', 'manual' ),
					'h6' => esc_html__('h6', 'manual' ),
				),
				'default'  => 'h5', 
			),
			
			
		)
		) );

	
/*******************************************
*******  THEME OPTIONS  - CUSTOM STYLE *****
********************************************/

		Redux::setSection( $opt_name, array(
			'title'            => esc_html__( 'Menu', 'manual' ),
			'id'               => 'manual-theme-menu-custom-style',
			'customizer_width' => '400px',
			'icon'             => 'el el-lines'
		) );
		
		// HEADER MENU TYPE STYLE
		Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Main Menu - Style', 'manual' ),
		'id'     => 'manual-theme-navigation-style',
		'subsection'  => true,
		'fields' => array(
						  
				array(
					'id'            => 'theme-nav-type-style-all-height',
					'type'          => 'slider',
					'title'         => esc_html__( 'Main Menu Height', 'manual' ),
					'default'       => 92,
					'min'           => 1,
					'step'          => 1,
					'max'           => 150,
					'display_value' => 'label',
					'subtitle' => esc_html__('Default: 92px', 'manual' ),
					'display_value' => 'text',
					'desc'         => __( '<strong style="color:#e6614b;">IMPORTANT:</strong> Re-adjust logo (Manual Option > logo) based on the seleted menu height', 'manual' ),
				),
				
				array(
					'id'       => 'theme-nav-type',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Main Menu - Style', 'manual' ),
					'subtitle' => esc_html__( 'Select transparent or white header navigation style', 'manual' ),
					'options'  => array(
						'1' => array( 'img' => trailingslashit(get_template_directory_uri()) .'framework/ReduxCore/manual/1.jpg' ),
						'2' => array( 'img' => trailingslashit(get_template_directory_uri()) .'framework/ReduxCore/manual/2.jpg' ),
					),
					'default'  => '2',
				),	
				
				array(
					'id'       => 'theme-global-menu-type',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Main Menu - Position', 'manual' ),
					'subtitle' => esc_html__( 'Select menu display position', 'manual' ),
					'options'  => array(
						'1' => array( 'img' => trailingslashit(get_template_directory_uri()) .'framework/ReduxCore/manual/menu1.png' ),
						'2' => array( 'img' => trailingslashit(get_template_directory_uri()) .'framework/ReduxCore/manual/menu2.png' ),
					),
					'default'  => '1',
				),	
		
				array(
					'id'       => 'apply-nav-background-color-for-transparent-bg',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Main Menu - Background Color', 'manual' ),
					'subtitle'    => esc_html__( 'Select header (logo + navigation) bar background color', 'manual' ),
					'default'  => array(
									'color' => '#ffffff',
									'alpha' => '0'
								),
					'required' => array('theme-nav-type','equals','1'),
				),
				
				array(
					'id'       => 'enable-header-bg-color-for-nav-one',
					'type'     => 'switch',
					'title'    => esc_html__( 'Main Menu - Background Color', 'manual' ),
					'subtitle' => esc_html__('Transparent background color will be applied on the menu bar', 'manual'),
					'default'  => false,
					'on' => esc_html__( 'Enable', 'manual' ),
					'off' => esc_html__( 'Disable', 'manual' ),
					'required' => array('theme-nav-type','equals','2'),
				),
				
				array(
					'id'       => 'apply-nav-background-color',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Transparent Background Color', 'manual' ),
					'subtitle'    => __('Select transparent header (logo + navigation) background color. <br><br>Will not work on page (pages>add new), seprare page settings will be provided to control Transparent Background Color', 'manual' ),
					'default'  => array(
									'color' => '#3a3a40',
									'alpha' => '.2'
								),
					'required' => array('enable-header-bg-color-for-nav-one','equals',true),
				),
				
				array(
					'id'       => 'apply-nav-border',
					'type'     => 'checkbox',
					'title'    => esc_html__( 'Main Menu - Border Bottom', 'manual' ),
					'default'  => '0',
					'subtitle' => esc_html__('If checked, transparent border will be added on header nav bar (works best with header type "Transparent Background")', 'manual' ),
				),
				
				array(
					'id'       => 'apply-nav-border-color',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Border Bottom Color', 'manual' ),
					'default'  => array(
									'color' => '#ffffff',
									'alpha' => '.4'
								),
					'subtitle' => esc_html__('Will not work on page (pages>add new), seprare page settings will be provided to control border color', 'manual' ),
					'required' => array('apply-nav-border','equals','1'),
				),
				
				array(
					'id'       => 'apply-nav-box-shadow',
					'type'     => 'checkbox',
					'title'    => esc_html__( 'Main Menu - Box shadow', 'manual' ),
					'default'  => '0',
					'subtitle' => esc_html__('Will not work on page (pages>add new), seprare page settings will be provided to control Box shadow','manual' ),
				),
			
			)
		) );

		// HEADER MENU STYLE
		Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Main Menu - Controls', 'manual' ),
		'id'     => 'theme-menu-style',
		'subsection'  => true,
		'fields' => array(
						  
				array(
					'id'       => 'theme-typography-nav',
					'type'     => 'typography',
					'title'    => esc_html__( 'Menus Typography', 'manual' ),
					'subtitle' => esc_html__('Specify the Typography font properties.', 'manual' ),
					'google'   => true,
					'text-align' => false,
					'font-weight' => false,
					'font-style' => false,
					'letter-spacing' => true,
					'subsets' => false,
					'color' => false,
					'font-size' => false,
					'line-height' => false,
					'letter-spacing' => false,
					'units'  => '',
					'default'  => array(
						'font-family' => 'Raleway',
						'google'      => true,
					),
				),
				
				array (
					'subtitle' => esc_html__('System assume, theme is connected with your custom font', 'manual'),
					'desc' => esc_html__('If place name, Nav Font Family will be replaced by this custom font', 'manual'),
					'id' => 'custom-nav-font',
					'type' => 'text',
					'title' => esc_html__('Nav Custom Font Family Name', 'manual'),
				),
				
				
				// Menu first level
				array(
					'id'       => 'menu-first-level',
					'type'     => 'section',
					'title'    => esc_html__( 'Menu First Level', 'manual' ),
					'indent'   => true, 
				),
				
				array(
					'id'       => 'first-level-menu-icon',
					'type'     => 'switch',
					'title'    => esc_html__( 'Navigation Arrow', 'manual' ),
					'default'  => true,
					'subtitle' => esc_html__( 'Down arrow icon will appear if found sub menu', 'manual' ),
					'on' => esc_html__( 'Enable', 'manual' ),
					'off' => esc_html__( 'Disable', 'manual' ),
				),
				
				array(
					'id'       => 'first-level-menu-text-color',
					'type'     => 'link_color',
					'title'    => esc_html__( 'Font Color', 'manual' ),
					'active'    => false, 
					'visited'   => false, 
					'default'  => array(
						'regular' => '#181818',
						'hover'   => '#5e5e5e',
						'active'  => '#ccc',
					),
				),
				
				array(
					'id'       => 'first-level-menu-text-color-for-img-bg',
					'type'     => 'link_color',
					'title'    => esc_html__( 'Font Color (for: Nav Bar with image background)', 'manual' ),
					'active'    => false, 
					'visited'   => false, 
					'default'  => array(
						'regular' => '#ffffff',
						'hover'   => '#d8d8d8',
						'active'  => '#ccc',
					),
				),
			
				array(
					'id'       => 'first-level-menu-weight',
					'type'     => 'select',
					'title'    => esc_html__( 'Font Weight', 'manual' ),
					'options'  => array(
						'100' => esc_html__('100','manual' ),
						'200' => esc_html__('200','manual' ),
						'300' => esc_html__('300','manual' ),
						'400' => esc_html__('400','manual' ),
						'500' => esc_html__('500','manual' ),
						'600' => esc_html__('600','manual' ),
						'700' => esc_html__('700','manual' ),
						'800' => esc_html__('800','manual' ),
						'900' => esc_html__('900','manual' ),
					),
					'default'  => '600',
					'subtitle' => esc_html__('Font weight totally depens on type of google "font family" you choose from "Typography->Body Font" ', 'manual' ),
				),
				
				array(
					'id'            => 'first-level-menu-font-size',
					'type'          => 'slider',
					'title'         => esc_html__( 'Font Size', 'manual' ),
					'default'       => 13,
					'min'           => 1,
					'step'          => 1,
					'max'           => 50,
					'display_value' => 'label',
					'subtitle' => esc_html__('Default: 13px','manual' ),
					'display_value' => 'text',
				),
				
				array(
					'id'       => 'first-level-menu-letter-spacing',
					'type'     => 'text',
					'title'    => esc_html__( 'Letter Spacing', 'manual' ),
					'desc'     => esc_html__('Default: 0.9px','manual' ),
					'default'  => '0.9px',
				),
				
				array(
					'id'       => 'first-level-menu-text-transform',
					'type'     => 'select',
					'title'    => esc_html__( 'Text Transform', 'manual' ),
					'options'  => array(
						'none' => esc_html__('none','manual' ),
						'capitalize' => esc_html__('Capitalize','manual' ),
						'uppercase' => esc_html__('Uppercase','manual' ),
						'lowercase' => esc_html__( 'Lowercase','manual' ),
					),
					'default'  => 'uppercase'
				),
				
				// Menu inner level
				array(
					'id'       => 'menu-inner-level',
					'type'     => 'section',
					'title'    => esc_html__( 'Menu Inner Levels', 'manual' ),
					'indent'   => true, 
				),
				
				array(
					'id'       => 'menu-inner-level-background-color',
					'type'     => 'color',
					'title'    => esc_html__( 'Background Color', 'manual' ),
					'default'  => '#262626',
				),
				
				array(
					'id'       => 'menu-inner-level-text-color',
					'type'     => 'link_color',
					'title'    => esc_html__( 'Font Color', 'manual' ),
					'active'    => false, 
					'visited'   => false, 
					'default'  => array(
						'regular' => '#9d9d9d',
						'hover'   => '#FFFFFF',
						'active'  => '#ccc',
					),
				),
				
				array(
					'id'       => 'menu-inner-level-active-text-color',
					'type'     => 'link_color',
					'title'    => esc_html__( 'Active Font Color', 'manual' ),
					'active'    => false, 
					'visited'   => false, 
					'hover'   => false, 
					'default'  => array(
						'regular' => '#FFFFFF',
					),
				),
				
				array(
					'id'       => 'menu-inner-level-weight',
					'type'     => 'select',
					'title'    => esc_html__( 'Font Weight', 'manual' ),
					'options'  => array(
						'100' => esc_html__('100','manual' ),
						'200' => esc_html__('200','manual' ),
						'300' => esc_html__('300','manual' ),
						'400' => esc_html__('400','manual' ),
						'500' => esc_html__('500','manual' ),
						'600' => esc_html__('600','manual' ),
						'700' => esc_html__('700','manual' ),
						'800' => esc_html__('800','manual' ),
						'900' => esc_html__('900','manual' ),
					),
					'default'  => '600',
				),
				
				array(
					'id'            => 'menu-inner-level-font-size',
					'type'          => 'slider',
					'title'         => esc_html__( 'Font Size', 'manual' ),
					'default'       => 11,
					'min'           => 1,
					'step'          => 1,
					'max'           => 50,
					'display_value' => 'label',
					'subtitle' => esc_html__('Default: 11px','manual' ),
					'display_value' => 'text',
				),
				
				array(
					'id'       => 'menu-inner-level-menu-letter-spacing',
					'type'     => 'text',
					'title'    => esc_html__( 'Letter Spacing', 'manual' ),
					'desc'     => esc_html__('Default: 0.9px','manual' ),
					'default'  => '0.9px',
				),
				
				array(
					'id'       => 'menu-inner-level-menu-letter-line-height',
					'type'     => 'text',
					'title'    => esc_html__( 'Letter Line Height', 'manual' ),
					'desc'     => esc_html__('Default: 16px','manual' ),
					'default'  => '16px',
				),
				
				
				array(
					'id'       => 'menu-inner-level-menu-text-transform',
					'type'     => 'select',
					'title'    => esc_html__( 'Text Transform', 'manual' ),
					'options'  => array(
						'none' => esc_html__('none','manual' ),
						'capitalize' => esc_html__('Capitalize','manual' ),
						'uppercase' => esc_html__('Uppercase','manual' ),
						'lowercase' => esc_html__('Lowercase','manual' ),
					),
					'default'  => 'uppercase'
				),
				
			)
		) );
		
		// RESPONSIVE MENU
		Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Responsive Menu', 'manual' ),
        'id'     => 'manual-theme-responsive-layout-settings',
		'subsection'  => true,
        'fields' => array(
		
		
			array(
				'id'       => 'theme-responsive-bar-icon-replacement',
				'type'     => 'switch',
				'title'    => esc_html__( 'Replace Primary Menu "Bar Icon" (logo right side icon) with something text like.. "Menu" for the responsive layout', 'manual' ),
				'default'  => false,
				'subtitle' => esc_html__( '"Bar Icon" will be replaced by text for the device like ipad and iphone', 'manual' ),
			),
			
			array (
				'id' => 'theme-responsive-bar-icon-replacement-text',
				'type' => 'text',
				'title' => esc_html__('"Bar Icon" Replacement Text', 'manual'),
				'default' => 'Menu',
			),
			
			
			// Mobile/Ipad - Menu Holder
			array(
				'id'       => 'mobile-height-adjustment-holder',
				'type'     => 'section',
				'title'    => esc_html__( 'Mobile Menu Height Control', 'manual' ),
				'indent'   => true, 
			),
			
			array(
				'id'            => 'mobile-menu-height',
				'type'          => 'slider',
				'title'         => esc_html__( 'Hamburger Menu Height', 'manual' ),
				'default'       => 92,
				'min'           => 1,
				'step'          => 1,
				'max'           => 150,
				'display_value' => 'label',
				'subtitle'      => esc_html__('Default: 92px', 'manual' ),
				'display_value' => 'text',
				'desc'          => __( '<strong style="color:#e6614b;">IMPORTANT:</strong> Re-adjust Responsive logo (Manual Option > logo) based on the seleted hamburger menu height', 'manual' ),
			),
			
			array(
				'id'            => 'first-level-responsive-hamburger-menu-top-margin',
				'type'          => 'slider',
				'title'         => esc_html__( 'Responsive Hamburger Menu - Top Margin', 'manual' ),
				'default'       => 18,
				'min'           => 1,
				'step'          => 1,
				'max'           => 30,
				'display_value' => 'label',
				'subtitle'      => esc_html__('Default: 18', 'manual' ),
				'display_value' => 'text',
				'desc'          => __( '<strong style="color:#e6614b;">IMPORTANT:</strong> Re-adjust \'Top Margin\' based on the seleted \'Hamburger Menu Height\'', 'manual' ),
			),
			
			array(
				'id'       => 'mobile-bgackground-holder',
				'type'     => 'section',
				'title'    => esc_html__( 'Mobile/Ipad - Menu Holder', 'manual' ),
				'indent'   => true, 
			),
			
			array(
				'id'       => 'mobile-bgackground-holder-headerbackground-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Menu Bar - Background Color', 'manual' ),
				'subtitle' => esc_html__( 'Menu bar with just logo and Bar Icon', 'manual' ),
				'default'  => '#FFFFFF',
			),
			
			array(
				'id'       => 'mobile-bgackground-holder-background-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Menu Container - Background Color', 'manual' ),
				'subtitle'    => esc_html__( 'Responsive menu area that display all the levels (first and inner levels) of menus', 'manual' ),
				'default'  => '#F9F9F9',
			),
			
			array(
				'id'       => 'mobile-menu-border-btm-li-color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Border Bottom <li> Tag Color', 'manual' ),
				'subtitle'    => esc_html__( 'Display menu seprator color', 'manual' ),
				'default'  => array(
								'color' => '#f1f1f1',
								'alpha' => '0.9'
							),
			),
			
			// Mobile/Ipad - Menu First Level
			array(
				'id'       => 'mobile-menu-first-level',
				'type'     => 'section',
				'title'    => esc_html__( 'Mobile/Ipad - Menu First Level', 'manual' ),
				'indent'   => true, 
			),
			
			array(
				'id'       => 'mobile-first-level-menu-text-color',
				'type'     => 'link_color',
				'title'    => esc_html__( 'Font Color', 'manual' ),
				'active'    => false, 
				'visited'   => false, 
				'default'  => array(
					'regular' => '#5B5B5B',
					'hover'   => '#47c494',
				),
			), 
			
			array(
				'id'            => 'mobile-first-level-menu-font-size',
				'type'          => 'slider',
				'title'         => esc_html__( 'Font Size', 'manual' ),
				'default'       => 12,
				'min'           => 1,
				'step'          => 1,
				'max'           => 50,
				'display_value' => 'label',
				'subtitle'      => esc_html__('Default: 12px','manual' ),
				'display_value' => 'text',
			),
		
			array(
				'id'       => 'mobile-first-level-menu-weight',
				'type'     => 'select',
				'title'    => esc_html__( 'Font Weight', 'manual' ),
				'options'  => array(
					'100' => esc_html__('100','manual' ),
					'200' => esc_html__('200','manual' ),
					'300' => esc_html__('300','manual' ),
					'400' => esc_html__('400','manual' ),
					'500' => esc_html__('500','manual' ),
					'600' => esc_html__('600','manual' ),
					'700' => esc_html__('700','manual' ),
					'800' => esc_html__('800','manual' ),
					'900' => esc_html__('900','manual' ),
				),
				'default'  => '700',
				'subtitle' => esc_html__('Font weight totally depens on type of google "font family" you choose from "Typography->Body Font" ','manual' ),
			),
			
			array(
				'id'       => 'mobile-first-level-menu-letter-spacing',
				'type'     => 'text',
				'title'    => esc_html__( 'Letter Spacing', 'manual' ),
				'desc'     => esc_html__('Default: 0.9px','manual' ),
				'default'  => '0.9px',
			),
			
			array(
				'id'       => 'mobile-first-level-menu-text-transform',
				'type'     => 'select',
				'title'    => esc_html__( 'Text Transform', 'manual' ),
				'options'  => array(
					'none' => esc_html__('none','manual' ),
					'capitalize' => esc_html__('Capitalize','manual' ),
					'uppercase' => esc_html__('Uppercase','manual' ),
					'lowercase' => esc_html__('Lowercase','manual' ),
				),
				'default'  => 'uppercase'
			),
			
			// Mobile/Ipad - Menu Inner Level
			array(
				'id'       => 'mobile-menu-inner-level',
				'type'     => 'section',
				'title'    => esc_html__( 'Mobile/Ipad - Menu Inner Levels', 'manual' ),
				'indent'   => true, 
			),
			
			array(

				'id'       => 'mobile-menu-inner-level-text-color',
				'type'     => 'link_color',
				'title'    => esc_html__( 'Font Color', 'manual' ),
				'active'    => false, 
				'visited'   => false, 
				'default'  => array(
					'regular' => '#656464',
					'hover'   => '#47c494',
				),
			),
			
			array(
				'id'            => 'mobile-menu-inner-level-font-size',
				'type'          => 'slider',
				'title'         => esc_html__( 'Font Size', 'manual' ),
				'default'       => 11,
				'min'           => 1,
				'step'          => 1,
				'max'           => 50,
				'display_value' => 'label',
				'subtitle' => esc_html__('Default: 11px', 'manual' ),
				'display_value' => 'text',
			),
			
			array(
				'id'       => 'mobile-menu-inner-level-weight',
				'type'     => 'select',
				'title'    => esc_html__( 'Font Weight', 'manual' ),
				'options'  => array(
					'100' => esc_html__('100','manual' ),
					'200' => esc_html__('200','manual' ),
					'300' => esc_html__('300','manual' ),
					'400' => esc_html__('400','manual' ),
					'500' => esc_html__('500','manual' ),
					'600' => esc_html__('600','manual' ),
					'700' => esc_html__('700','manual' ),
					'800' => esc_html__('800','manual' ),
					'900' => esc_html__('900','manual' ),
				),
				'default'  => '600',
			),
			
			array(
				'id'       => 'mobile-menu-inner-level-menu-letter-spacing',
				'type'     => 'text',
				'title'    => esc_html__( 'Letter Spacing', 'manual' ),
				'desc'     => esc_html__('Default: 0.9px','manual' ),
				'default'  => '0.9px',
			),
			
			array(
				'id'       => 'mobile-menu-inner-level-menu-text-transform',
				'type'     => 'select',
				'title'    => esc_html__( 'Text Transform', 'manual' ),
				'options'  => array(
					'none' => esc_html__('none', 'manual' ),
					'capitalize' => esc_html__('Capitalize', 'manual' ),
					'uppercase' => esc_html__('Uppercase', 'manual' ),
					'lowercase' => esc_html__('Lowercase', 'manual' ),
				),
				'default'  => 'uppercase'
			),
			
			array(
				'id'       => 'mobile-menu-inner-level-menu-letter-line-height',
				'type'     => 'text',
				'title'    => esc_html__( 'Letter Line Height', 'manual' ),
				'desc'     => esc_html__('Default: 28px', 'manual' ),
				'default'  => '28px',
			),
		
		)
		) );
		
		// STICKY MENU
		Redux::setSection( $opt_name, array(
			'title'            => esc_html__( 'Sticky Menu', 'manual' ),
			'id'               => 'theme_sticky_menu_settings',
			'subsection'       => true,
			'customizer_width' => '450px',
			'fields'           => array(
										
										
					// Sticky Menu
					array(
						'id'       => 'theme-sticky-menu',
						'type'     => 'switch',
						'title'    => esc_html__( 'Sticky Menu', 'manual' ),
						'default'  => false,
						'subtitle' => esc_html__( 'Global Effect', 'manual' ),
						'on' => esc_html__( 'Enable', 'manual' ),
						'off' => esc_html__( 'Disable', 'manual' ),
					),
					
					array(
						'id'       => 'readjust-sticky-logo-start',
						'type'     => 'section',
						'title'    => esc_html__( 'Other Settings', 'manual' ),
						'indent'   => true, 
						'required' => array('theme-sticky-menu','equals',true),
					),
					
					array(
						'id'       => 'theme-logo-readjust-sticky-height',
						'type'     => 'dimensions',
						'units'    => array('px'),
						'title'    => esc_html__('Logo Height', 'manual'),
						'desc'     => esc_html__('Default: 27', 'manual'),
						'width'     => false,
						'default'  => array(
							'Height'  => '27'
							)
					),
					
					array(
						'id'       => 'theme-logo-readjust-sticky-margin-top',
						'type'     => 'dimensions',
						'units'    => array('px'),
						'title'    => esc_html__('Logo Top Margin', 'manual'),
						'desc'     => esc_html__('Default: -18', 'manual'),
						'width'     => false,
						'default'  => array(
							'Height'  => '-18px'
							)
					),
					
					array(
						'id'            => 'theme-logo-readjust-sticky-hamburger-menu-top-margin',
						'type'          => 'slider',
						'title'         => esc_html__( 'Sticky Hamburger Menu - Top Margin', 'manual' ),
						'default'       => 26,
						'min'           => 1,
						'step'          => 1,
						'max'           => 90,
						'display_value' => 'label',
						'subtitle' => esc_html__('Default: 26','manual' ),
						'display_value' => 'text',
						'desc'          => __( '<strong style="color:#e6614b;">IMPORTANT:</strong> Re-adjust \'Sticky Hamburger Menu Top Margin\'', 'manual' ),
					),
					
					array(
						'id'        => 'theme_sticky_menu_background',
						'type'      => 'color_rgba',
						'title'    => esc_html__( 'Sticky Menu Background Color', 'manual' ),
						'default'   => array(
							'color'     => '#fefefe',
							'alpha'     => 0.9
						),
						'options'       => array(
							'choose_text'               => esc_html__('Choose','manual' ),
							'cancel_text'               => esc_html__('Cancel', 'manual' ),
							'palette'                   => null,  // show default
							'input_text'                => esc_html__('Select Color', 'manual' ),
						),                        
					),
					
					array(
						'id'       => 'theme_sticky_menu_text_color',
						'type'     => 'link_color',
						'title'    => esc_html__( 'Font Color', 'manual' ),
						'active'    => false, 
						'visited'   => false, 
						'default'  => array(
							'regular' => '#181818',
							'hover'   => '#47c494',
						),
					),
					
					array(
						'id'       => 'theme_sticky_white_logo',
						'type'     => 'switch',
						'title'    => esc_html__( 'Activate White Logo', 'manual' ),
						'default'  => false,
						'subtitle' => esc_html__( 'Normal logo dark logo will be replaced by the white logo', 'manual' ),
					),
			
			)
		) );
		
		
		// HAMBURGER MENU AND SEARCH BOX	
		Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Hamburger Menu & Search Box', 'manual' ),
        'id'     => 'theme-hamburger-nav',
		'subsection'       => true,
		'customizer_width' => '450px',
        'fields' => array(
			array(
					'id'    => 'hamburger-menu-info',
					'type'  => 'info',
					'style' => 'info',
					'notice' => false,
					'title' => esc_html__( 'IMPORTANT NOTE', 'manual' ),
					'desc'  => __('<br>1. Hamburger menu will <strong>not work on the page, seprate settings are available</strong> to display Hamburger Menu & Search Box when you create page using \'Pages-> Add New\'. <br><br> 2. If any page is assign as \'Posts page\' (Settings > Reading > A static page) it will not work, you need to re-configure Hamburger Menu & Search Box on the assigned page.  </strong>','manual' ),
			),
			array(
				'id'       => 'activate-hamburger-menu',
				'type'     => 'switch',
				'title'    => esc_html__( 'Hamburger Menu', 'manual' ),
				'default'  => false,
				'subtitle' => esc_html__('If enable, standard header menu will be replaced by the hamburger menu', 'manual' ),
				'on' => esc_html__( 'Enable', 'manual' ),
				'off' => esc_html__( 'Disable', 'manual' ),
			),
			array(
				'id'            => 'first-level-hamburger-menu-top-margin',
				'type'          => 'slider',
				'title'         => esc_html__( 'Hamburger Icon - Top Margin', 'manual' ),
				'default'       => 32,
				'min'           => 1,
				'step'          => 1,
				'max'           => 90,
				'display_value' => 'label',
				'desc' => esc_html__('Default: 32','manual' ),
				'display_value' => 'text',
				'required' => array('activate-hamburger-menu','equals',true),
				'subtitle'         => __( '<strong style="color:#e6614b;">If required,</strong> re-adjust \'top margin\' based on the seleted <strong>\'main menu height\'</strong> (manual options > main menu - style).', 'manual' ),
			),
			array(
				'id'       => 'activate-search-box-on-menu-bar',
				'type'     => 'switch',
				'title'    => esc_html__( 'Search Bar', 'manual' ),
				'default'  => false,
				'required' => array('activate-hamburger-menu','equals',true),
				'subtitle' => esc_html__('If enable, the live search bar will appear on the main menu bar.','manual' ),
				'on' => esc_html__( 'Enable', 'manual' ),
				'off' => esc_html__( 'Disable', 'manual' ),
			),
			array(
				'id'       => 'replace-search-design-with-modern-bar',
				'type'     => 'switch',
				'title'    => esc_html__( 'Standard Search', 'manual' ),
				'default'  => false,
				'required' => array('activate-search-box-on-menu-bar','equals',true),
				'subtitle' => esc_html__('If enable, live search will be disable.','manual' ),
				'on' => esc_html__( 'Enable', 'manual' ),
				'off' => esc_html__( 'Disable', 'manual' ),
			),
			// Search Design
			array(
				'id'    => 'main-menubar-search-box-design-info',
				'type'     => 'section',
				'title'    => esc_html__( 'Search Bar Design', 'manual' ),
				'indent'   => true, 
				'required' => array('activate-search-box-on-menu-bar','equals',true),
			),
			array(
				'id'            => 'main-menubar-searchbox-font-size',
				'type'          => 'slider',
				'title'         => esc_html__( 'Font Size', 'manual' ),
				'default'       => 14,
				'min'           => 1,
				'step'          => 1,
				'max'           => 30,
				'display_value' => 'label',
				'subtitle' => esc_html__('Default: 14','manual' ),
				'display_value' => 'text',
			),
			array(
				'id'            => 'main-menubar-searchbox-top-margin',
				'type'          => 'slider',
				'title'         => esc_html__( 'Top Margin', 'manual' ),
				'default'       => 7,
				'min'           => 1,
				'step'          => 1,
				'max'           => 20,
				'display_value' => 'label',
				'desc' => esc_html__('Default: 7','manual' ),
				'display_value' => 'text',
				'subtitle'      => __( '<strong style="color:#e6614b;">If required,</strong> re-adjust \'top margin\'', 'manual' ),
			),
			array(
				'id'       => 'main-menubar-searchbox-design-bgcolor',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Text Bar Background Color', 'manual' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 0.9,
				),
				'mode'     => 'background',
			),
			array(
				'id'       => 'main-menubar-searchbox-placeholder-text-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Placeholder Text Color', 'manual' ),
				'default'  => '#888888',
			),
        )
    ) );
		
		
		
		

/***************************************
*******  POST TYPE - CUSTOM HEADER *****
****************************************/

		Redux::setSection( $opt_name, array(
			'title'            => esc_html__( 'Page Title Bar', 'manual' ),
			'id'               => 'manual-theme-custom-header',
			'customizer_width' => '400px',
			'icon'             => 'el el-adjust-alt'
		) );
		
		// DEFAULT THEME HEADER
		Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Default - Theme Title Bar', 'manual' ),
		'id'     => 'manual-theme-default-theme-header',
		'subsection'       => true,
		'fields' => array(
		
				array(
					'id'    => 'header-style-info',
					'type'  => 'info',
					'style' => 'info',
					'notice' => false,
					'title' => esc_html__( 'IMPORTANT NOTE', 'manual' ),
					'desc'  => __( '<br>1. Settings set for the <strong>\'Default - Theme Title Bar\' are always GLOBAL</strong> but, some settings like; \'page title bar height\', \'title font size\', \'title font weight\' can be overwrite using tab section; \'Bbpress/Forum\', \'KB - Category/Tag Page\', \'KB - Single Page\', \'DOC - Category/Single Page\', \'FAQ - Category/Single Page\', \'404 Page\', \'Blog Single Post\' and \'Search Page\'. <br><br> 2. Some of the GLOBAL settings <strong>may not work while crating page using "Pages-> Add New"</strong>, in that case you can use sperate page header settings available while creating page to overwrite global settings creating unique header layout.', 'manual' )
				),
				array(
					'id'       => 'default-header-sytle-backgorund-image',
					'type'     => 'switch',
					'title'    => __('<span style="color:red;font-weight: 500;">Page Title Bar - Default Gray Noise Background Image</span>', 'manual'),
					'subtitle' => esc_html__('Enable/Disable default gray noise header background image (Global Effect)', 'manual'),
					'default'  => false,
					'on' => esc_html__( 'Disable', 'manual' ),
					'off' => esc_html__( 'Enable', 'manual' ),
				),
				array(
					'id'       => 'default-header-sytle-background-color',
					'type'     => 'color',
					'title'    => esc_html__( 'Header Background Color', 'manual' ),
					'default'  => '#F8F8F8',
					'description' => __( '<strong style="color:#11d62b"><i>NOTE: Will not work if applied image background</i></strong>', 'manual' ),
					'required' => array('default-header-sytle-backgorund-image','equals','1'),
				),
				array(
					'id'       => 'header-force-white-logo-and-text',
					'type'     => 'checkbox',
					'title'    => esc_html__( 'Force apply white logo and First Level Background Image Color', 'manual' ),
					'subtitle' => esc_html__( 'Force apply white logo and first level image background color (Custom Navigation > Header - Menu Controls > Menu First Level) for the selected \'Header Background Color\'', 'manual' ),
					'default'  => '0',
					'required' => array('default-header-sytle-backgorund-image','equals','1'),
				),
				array (
					'subtitle' => esc_html__('Custom Header Background', 'manual'),
					'id' => 'manual-header-custom-image',
					'type' => 'media',
					'title' => esc_html__('Header Background', 'manual'),
					'url' => false,
					'required' => array('default-header-sytle-backgorund-image','equals','1'),
				),
				array(
					'id'       => 'header-background-position',
					'type'     => 'select',
					'title'    => esc_html__( 'Header Background Position', 'manual' ),
					'options'  => array(
						'center top' => esc_html__('Center Top', 'manual' ),
						'center center' => esc_html__('Center Center', 'manual' ),
						'center bottom' => esc_html__('Center Bottom', 'manual' ),
					),
					'default'  => 'center center',
					'required' => array('manual-header-custom-image','!=',''),
				),
				array(
					'id'       => 'manual-default-header-background-size',
					'type'     => 'select',
					'title'    => esc_html__( 'Header Background Size', 'manual' ),
					'options'  => array(
						'auto' => esc_html__('Auto', 'manual' ),
						'contain' => esc_html__('Contain', 'manual' ),
						'cover' => esc_html__('Cover', 'manual' ),
						'inherit' => esc_html__('Inherit', 'manual' ),
					),
					'default'  => 'cover',
					'desc'  => 'Carefully select above option because page title background is under "background-repeat:repeat;"',
					'required' => array('manual-header-custom-image','!=',''),
				),
				array(
					'id'       => 'header-opacity-uploadimage-global',
					'type'     => 'checkbox',
					'title'    => esc_html__( 'Apply Background Opacity For the Upload Image', 'manual' ),
					'default'  => '0',
					'required' => array('manual-header-custom-image','!=',''),
				),
				array(
					'id'       => 'header-opacity-uploadimg-bg-color',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Background Opacity Color', 'manual' ),
					'default'  => array(
						'color' => '#000000',
						'alpha' => 0.35,
					),
					'mode'     => 'background',
					'required' => array('header-opacity-uploadimage-global','equals','1'),
				),
				// Header Background Style
				array(
					'id'       => 'theme_header_image_customization',
					'type'     => 'section',
					'title'    => esc_html__( 'Page Title Bar Customization', 'manual' ),
					'indent'   => true, 
				),
				array(
					'id'       => 'default-header-sytle-height',
					'type'     => 'text',
					'title'    => esc_html__( 'Page Title Bar Height', 'manual' ),
					'subtitle' => esc_html__( 'Controls the height of the page title bar. Enter value including any valid CSS unit besides % which does not work for page title bar.', 'manual' ),
					'desc' => __('Example: 120px 0px 120px 0px (top, right, bottom, left) <br><br><strong style="color:#e6614b;">IMPORTANT: Make sure the value of RIGHT, LEFT is always 0px</strong>', 'manual' ),
					'default'  => '120px 0px 120px 0px',
				),
				array(
					'id'       => 'default-header-sytle-responsive-height',
					'type'     => 'text',
					'title'    => esc_html__( 'Responsive Page Title Bar Height', 'manual' ),
					'subtitle'    => esc_html__( 'Controls the height of the page title bar on the responsive layout. Enter value including any valid CSS unit besides % which does not work for page title bar.', 'manual' ),
					'desc' => __('Example: 100px 0px 100px 0px (top, right, bottom, left) <br><br><strong style="color:#e6614b;">IMPORTANT: Make sure the value of RIGHT, LEFT is always 0px</strong>', 'manual' ),
					'default'  => '100px 0px 100px 0px',
				),
				array(
					'id'       => 'default-header-text-align',
					'type'     => 'select',
					'title'    => esc_html__( 'Header Text Align', 'manual' ),
					'options'  => array(
						'left'   => esc_html__('Left', 'manual' ),
						'center' => esc_html__('Center', 'manual' ),
						'right'  => esc_html__('Right', 'manual' ),
					),
					'default'  => 'center'
				),
				// Header Title
				array(
					'id'       => 'theme_header_title_customization',
					'type'     => 'section',
					'title'    => esc_html__( 'Title Font Settings', 'manual' ),
					'indent'   => true, 
				),
				array(
					'id'       => 'default-top-header-title-color',
					'type'     => 'color',
					'title'    => esc_html__( 'Title Color', 'manual' ),
					'default'  => '#3e424c',
				),
				array(
					'id'            => 'default-header-title-font-size',
					'type'          => 'slider',
					'title'         => esc_html__( 'Font Size', 'manual' ),
					'default'       => 36,
					'min'           => 10,
					'step'          => 1,
					'max'           => 75,
					'display_value' => 'label',
					'subtitle'      => esc_html__('Default:36','manual' ),
					'display_value' => 'text', 
				),
				array(
					'id'            => 'default-mobile-header-title-font-size',
					'type'          => 'slider',
					'title'         => esc_html__( 'Mobile - Font Size', 'manual' ),
					'default'       => 30,
					'min'           => 10,
					'step'          => 1,
					'max'           => 75,
					'display_value' => 'label',
					'subtitle'      => esc_html__('Default:30', 'manual' ),
					'display_value' => 'text',
				),
				array(
					'id'       => 'default-header-title-font-weight',
					'type'     => 'select',
					'title'    => esc_html__( 'Font Weight', 'manual' ),
					'options'  => array(
						'100' => esc_html__('100','manual' ),
						'200' => esc_html__('200','manual' ),
						'300' => esc_html__('300','manual' ),
						'400' => esc_html__('400','manual' ),
						'500' => esc_html__('500','manual' ),
						'600' => esc_html__('600','manual' ),
						'700' => esc_html__('700','manual' ),
						'800' => esc_html__('800','manual' ),
						'900' => esc_html__('900','manual' ),
					),
					'default'  => '600',
					'subtitle' => esc_html__('Default:600 (based on default selected Typography)','manual' ),
				),
				array(
					'id'       => 'default-header-title-text-transform',
					'type'     => 'select',
					'title'    => esc_html__( 'Text Transform', 'manual' ),
					'options'  => array(
						'none' => esc_html__('none', 'manual' ),
						'capitalize' => esc_html__('Capitalize', 'manual' ),
						'uppercase' => esc_html__('Uppercase', 'manual' ),
						'lowercase' => esc_html__('Lowercase', 'manual' ),
					),
					'default'  => 'capitalize'
				),
				array(
					'id'            => 'default-header-title-font-letter-spacing',
					'type'          => 'text',
					'title'         => esc_html__( 'Letter Spacing', 'manual' ),
					'default'       => 0,
					'subtitle'      => esc_html__( 'Example:0 (omit using px)','manual' ),
				),
				array(
					'id'            => 'default-header-title-font-line-height-spacing',
					'type'          => 'text',
					'title'         => esc_html__( 'Line Height', 'manual' ),
					'subtitle'      => esc_html__( 'Example:30px', 'manual' ),
				),
				array(
					'id'            => 'default-mobile-header-title-font-line-height-spacing',
					'type'          => 'text',
					'title'         => esc_html__( 'Mobile - Line Height', 'manual' ),
					'subtitle'      => esc_html__( 'Example:35px', 'manual' ),
					'default'       => '35px', 
				),
				// Header Sub-Title
				array(
					'id'       => 'theme_header_subtitle_customization',
					'type'     => 'section',
					'title'    => esc_html__( 'Sub Title Font Settings', 'manual' ),
					'indent'   => true, 
				),
				array(
					'id'       => 'default-top-header-subtitle-color',
					'type'     => 'color',
					'title'    => esc_html__( 'Title Color', 'manual' ),
					'default'  => '#666970',
				),
				array(
					'id'            => 'default-header-subtitle-font-size',
					'type'          => 'slider',
					'title'         => esc_html__( 'Font Size', 'manual' ),
					'default'       => 18,
					'min'           => 10,
					'step'          => 1,
					'max'           => 75,
					'display_value' => 'label',
					'subtitle'      => esc_html__('Default:18','manual' ),
					'display_value' => 'text',
				),
				array(
					'id'       => 'default-header-subtitle-font-weight',
					'type'     => 'select',
					'title'    => esc_html__( 'Font Weight', 'manual' ),
					'options'  => array(
						'100' => esc_html__('100','manual' ),
						'200' => esc_html__('200','manual' ),
						'300' => esc_html__('300','manual' ),
						'400' => esc_html__('400','manual' ),
						'500' => esc_html__('500','manual' ),
						'600' => esc_html__('600','manual' ),
						'700' => esc_html__('700','manual' ),
						'800' => esc_html__('800','manual' ),
						'900' => esc_html__('900','manual' ),
					),
					'default'  => '400',
					'subtitle' => esc_html__('Default:400','manual' ),
				),
				array(
					'id'       => 'default-header-subtitle-text-transform',
					'type'     => 'select',
					'title'    => esc_html__( 'Text Transform', 'manual' ),
					'options'  => array(
						'none' => esc_html__('none', 'manual' ),
						'capitalize' => esc_html__('Capitalize', 'manual' ),
						'uppercase' => esc_html__('Uppercase', 'manual' ),
						'lowercase' => esc_html__('Lowercase', 'manual' ),
					),
					'default'  => 'none'
				),
				array(
					'id'            => 'default-header-subtitle-font-letter-spacing',
					'type'          => 'text',
					'title'         => esc_html__( 'Letter Spacing', 'manual' ),
					'default'       => 0,
					'subtitle'      =>  esc_html__('Example:0 (omit using px)','manual' ),
					'display_value' => 'text',
				),
				// Breadcurmb
				array(
					'id'       => 'theme_header_breadcrumb_customization',
					'type'     => 'section',
					'title'    => esc_html__( 'Breadcrumb Link', 'manual' ),
					'indent'   => true, 
				),
				array(
					'id'       => 'default-top-header-breadcrumb-color',
					'type'     => 'color',
					'title'    => esc_html__( 'Text Color', 'manual' ),
					'default'  => '#919191',
				),
				array(
					'id'       => 'default-top-header-breadcrumb-link-color',
					'type'     => 'link_color',
					'title'    => esc_html__( 'Link Color', 'manual' ),
					'active'    => false, 
					'visited'   => false, 
					'default'  => array(
						'regular' => '#919191',
						'hover'   => '#636363',
						'active'  => '#ccc',
					),
				),	
				array(
					'id'       => 'default-header-breadcrumb-text-transform',
					'type'     => 'select',
					'title'    => esc_html__( 'Text Transform', 'manual' ),
					'options'  => array(
						'none' => esc_html__('none', 'manual' ),
						'capitalize' => esc_html__('Capitalize', 'manual' ),
						'uppercase' => esc_html__('Uppercase', 'manual' ),
						'lowercase' => esc_html__('Lowercase', 'manual' ),
					),
					'default'  => 'capitalize'
				),
				array(
					'id'            => 'default-header-breadcrumb-letter-spacing',
					'type'          => 'text',
					'title'         => esc_html__( 'Letter Spacing', 'manual' ),
					'default'       => 0,
					'subtitle'      => esc_html__('Example:0 (omit using px)','manual' ),
				),
				array(
					'id'            => 'default-header-breadcrumb-font-size',
					'type'          => 'slider',
					'title'         => esc_html__( 'Font Size', 'manual' ),
					'default'       => 14,
					'min'           => 6,
					'step'          => 1,
					'max'           => 18,
					'display_value' => 'label',
					'subtitle'      => esc_html__('Default:14','manual' ),
					'display_value' => 'text',
				),
				array(
					'id'       => 'default-header-breadcrumb-font-weight',
					'type'     => 'select',
					'title'    => esc_html__( 'Font Weight', 'manual' ),
					'options'  => array(
						'100' => esc_html__('100','manual' ),
						'200' => esc_html__('200','manual' ),
						'300' => esc_html__('300','manual' ),
						'400' => esc_html__('400','manual' ),
						'500' => esc_html__('500','manual' ),
						'600' => esc_html__('600','manual' ),
						'700' => esc_html__('700','manual' ),
						'800' => esc_html__('800','manual' ),
						'900' => esc_html__('900','manual' ),
					),
					'default'  => '400',
					'subtitle' => esc_html__('Default:400','manual' ),
				),
				array(
					'id'            => 'default-header-breadcrumb-padding',
					'type'          => 'slider',
					'title'         => esc_html__( 'Padding Top', 'manual' ),
					'default'       => 0,
					'min'           => 0,
					'step'          => 1,
					'max'           => 30,
					'display_value' => 'label',
					'subtitle'      => esc_html__('Gap between "header title/header sub-title" and breadcurmb','manual' ),
					'display_value' => 'text',
				),
				// Treanding Search
				array(
					'id'       => 'theme_header_treanding_search_customization',
					'type'     => 'section',
					'title'    => esc_html__( 'Trending Search', 'manual' ),
					'indent'   => true, 
				),
				array(
					'id'       => 'theme_header_treanding_search_color',
					'type'     => 'color',
					'title'    => esc_html__( 'Text Color', 'manual' ),
					'default'  => '#444444',
				),
				array(
					'id'       => 'theme_header_treanding_search_link_color',
					'type'     => 'link_color',
					'title'    => esc_html__( 'Link Color', 'manual' ),
					'active'    => false, 
					'visited'   => false, 
					'hover'   => false, 
					'default'  => array(
						'regular' => '#666666',
						'hover'   => '#888F9E',
					),
				),	
		
		)
		) );
		
		
if ( class_exists( 'bbPress' ) ) {		
		// BBPRESS CUSTOM HEADER
        Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Bbpress/Forum Pages', 'manual' ),
        'id'               => 'bbpres-header-design',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
				array(
					'id'    => 'bbpress-header-allpage-info',
					'type'  => 'info',
					'style' => 'info',
					'notice' => false,
					'title' => esc_html__( 'IMPORTANT NOTE', 'manual' ),
					'desc'  => __( '<br>This is just \'bbpress/forum pages title bar\' control. For more \'bbpress/forum pages\' control please go to "Manual Options > Forum"', 'manual' )
				),	
				// -------------- Page Title Bar Controls --------------
				array(
					'id'       => 'bbpress_search_status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Search Box', 'manual' ),
					'subtitle' => esc_html__( 'Display search box on the forum page', 'manual' ),
					'default'  => true,
					'on' => esc_html__( 'Enable', 'manual' ),
					'off' => esc_html__( 'Disable', 'manual' ),
				),
				array(
					'id'       => 'bbpress-searchbox-display-position',
					'type'     => 'select',
					'title'    => esc_html__( 'Search Box Display Column Layout', 'manual' ),
					'options'  => array(
						'center' => esc_html__('Exact Center','manual' ),
						'6' => esc_html__('50% Width','manual' ),
						'7' => esc_html__('58% Width','manual' ),
						'8' => esc_html__('66% Width','manual' ),
						'9' => esc_html__('75% Width','manual' ),
						'10' => esc_html__('83% Width','manual' ),
						'11' => esc_html__('91% Width','manual' ),
						'12' => esc_html__('100% Width','manual' ),
					),
					'default'  => 'center',
					'required' => array('bbpress_search_status','equals','1'),
				),  
				array(
					'id'       => 'bbpress_breadcrumb_status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Breadcrumb', 'manual' ),
					'subtitle' => esc_html__( 'Breadcrumb on the forum pages', 'manual' ),
					'default'  => true,
					'on' => esc_html__( 'Enable', 'manual' ),
					'off' => esc_html__( 'Disable', 'manual' ),
				),
				array(
					'id'       => 'bbpress_breadcrumb',
					'type'     => 'switch',
					'title'    => esc_html__( 'Include "Forum Root" slug name, inside breadcrumb', 'manual' ),
					'default'  => false,
					'on' => esc_html__( 'Enable', 'manual' ),
					'off' => esc_html__( 'Disable', 'manual' ),
				),
				array(
					'id'       => 'bbpress-header-height',
					'type'     => 'text',
					'title'    => esc_html__( 'Header Height', 'manual' ),
					'subtitle' => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
					'desc'     => __('Example: 120px 0px 120px 0px (top, right, bottom, left) <br><br><strong style="color:#e6614b;">IMPORTANT: Make sure the value of RIGHT, LEFT is always 0px</strong>','manual' ),
					'default'  => '',
				),
				array(
					'id'       => 'bbpress-responsive-header-height',
					'type'     => 'text',
					'title'    => esc_html__( 'Re-adjust Responsive Header Height', 'manual' ),
					'subtitle' => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
					'desc'     => __( 'Example: 100px 0px 100px 0px (top, right, bottom, left) <br><br><strong style="color:#e6614b;">IMPORTANT: Make sure the value of RIGHT, LEFT is always 0px</strong>', 'manual' ), 
					'default'  => '',
				),
				array(
					'id'       => 'bbpress-header-text-align',
					'type'     => 'select',
					'title'    => esc_html__( 'Header Text Align', 'manual' ),
					'options'  => array(
						'left'   => esc_html__('Left', 'manual' ),
						'center' => esc_html__('Center', 'manual' ),
						'right'  => esc_html__('Right', 'manual' ),
					),
					'default'  => 'center'
				),
				// -------------- Page Title Controls --------------
				array(
					'id'       => 'bbpress-title-section-global',
					'type'     => 'section',
					'title'    => esc_html__( 'Title Text', 'manual' ),
					'indent'   => true, 
				),
				array(
					'id'       => 'manual-forum-title',
					'type'     => 'text',
					'title'    => esc_html__( 'Title Text', 'manual' ),
					'desc'     => esc_html__( 'Will appear on the top bar', 'manual' ),
					'default'  => 'Community Forum',
				),
				array(
					'id'       => 'bbpress_header_title_font_size',
					'type'     => 'text',
					'title'    => esc_html__( 'Font Size', 'manual' ),
					'desc'     => esc_html__('Example 30px', 'manual' ),
					'default'  => '',
					'subtitle'    => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
				),
				array(
					'id'       => 'bbpress_header_title_line_height',
					'type'     => 'text',
					'title'    => esc_html__( 'Line Height', 'manual' ),
					'desc'     => esc_html__('Example 30px','manual' ),
					'default'  => '',
					'subtitle'    => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
				),
				array(
					'id'       => 'bbpress_header_title_font_weight',
					'type'     => 'select',
					'title'    => esc_html__( 'Font Weight', 'manual' ),
					'options'  => array(
						'default' => esc_html__('Default','manual' ),
						'100' => esc_html__('100','manual' ),
						'200' => esc_html__('200','manual' ),
						'300' => esc_html__('300','manual' ),
						'400' => esc_html__('400','manual' ),
						'500' => esc_html__('500','manual' ),
						'600' => esc_html__('600','manual' ),
						'700' => esc_html__('700','manual' ),
						'800' => esc_html__('800','manual' ),
						'900' => esc_html__('900','manual' ),
					),
					'default'  => 'default',
					'subtitle'    => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
				),
				array(
					'id'       => 'bbpress-subtitle-section-global',
					'type'     => 'section',
					'title'    => esc_html__( 'Sub-title Text', 'manual' ),
					'indent'   => true, 
				),
				array(
					'id'       => 'manual-forum-subtitle',
					'type'     => 'text',
					'title'    => esc_html__( 'Sub-title Text', 'manual' ),
					'desc'     => esc_html__( 'forum sub-title', 'manual' ),
					'default'  => 'receive professional support and assistance with any issues',
				),
				// -------------- Page Title Bar Background Controls --------------
				array(
					'id'       => 'bbpress-header-bg-section-global',
					'type'     => 'section',
					'title'    => esc_html__( 'Background Image', 'manual' ),
					'indent'   => true, 
				),
				array(
					'id'       => 'bbpress-header-image',
					'type'     => 'media',
					'title'    => esc_html__( 'Background Image', 'manual' ),
					'url' => false,
					'subtitle' => esc_html__('Choose header background image for the forum pages', 'manual'),
				),
				array(
					'id'       => 'manual_bbpress_background_color',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Background Color', 'manual' ),
					'subtitle' => esc_html__( 'Effective when upload transparent (.png) image', 'manual' ),
					'default'  => array(
									'color' => '#f5f5f5',
								),
					'required' => array('bbpress-header-image','!=',''),
				),
				array(
					'id'       => 'bbpress_plx_bg_image',
					'type'     => 'switch',
					'title'    => esc_html__( 'Apply Parallax Effect For the Upload Image', 'manual' ),
					'subtitle' => esc_html__( 'If checked, Parallax effect will activate', 'manual' ),
					'default'  => false,
					'on' => esc_html__( 'Enable', 'manual' ),
					'off' => esc_html__( 'Disable', 'manual' ),
					'required' => array('bbpress-header-image','!=',''),
				),
				array(
					'id'       => 'bbpress-header-background-position',
					'type'     => 'select',
					'title'    => esc_html__( 'Header Background Position', 'manual' ),
					'options'  => array(
						'center top' => esc_html__('Center Top', 'manual' ),
						'center center' => esc_html__('Center Center', 'manual' ),
						'center bottom' => esc_html__('Center Bottom', 'manual' ),
					),
					'default'  => 'center center', 
					'required' => array('bbpress-header-image','!=',''),
				),
				array(
					'id'       => 'bbpress-apply-nav-background',
					'type'     => 'checkbox',
					'title'    => esc_html__( 'Add Nav Background', 'manual' ),
					'default'  => '0',
					'subtitle' => esc_html__('If checked, transparent background will be added on header nav bar','manual' ),
					'required' => array('bbpress-header-image','!=',''),
					'desc' => __('<strong style="color:blue;">Works ONLY...</strong> if "Main Menu Style ==  Transparent" <br>(Manual Options > Menu > Main Menu - Style > Main Menu - Style)','manual' ),
				),
				array(
					'id'       => 'bbpress-apply-nav-border-btm',
					'type'     => 'checkbox',
					'title'    => esc_html__( 'Add Nav Border Bottom', 'manual' ),
					'default'  => '',
					'subtitle' => esc_html__('If checked, transparent border will be added on the header nav bar','manual' ),
					'required' => array('bbpress-header-image','!=',''),
				),
				array(
					'id'       => 'bbpress-apply-nav-border-btm-color',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Border Bottom Color', 'manual' ),
					'default'  => array(
						'color' => '#b0b0b0',
						'alpha' => '0.6'
					),
					'mode'     => 'background',
					'required' => array('bbpress-apply-nav-border-btm','equals','1'),
				),
				array(
					'id'       => 'bbpress-header-opacity-uploadimage-global',
					'type'     => 'checkbox',
					'title'    => esc_html__( 'Apply Background Opacity For the Upload Image', 'manual' ),
					'default'  => '0',
					'required' => array('bbpress-header-image','!=',''),
				),
				array(
					'id'       => 'bbpress-lineargradient-first-color',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Background Opacity Color', 'manual' ),
					'default'  => array(
									'color' => '#000000',
									'alpha' => '0.3'
								),
					'desc' => esc_html__('Default: rgba(0, 0, 0, 0.3)','manual' ),
					'required' => array('bbpress-header-opacity-uploadimage-global','equals','1'),
				),
				array(
					'id'       => 'bbpress-linear-gradient-second-color',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Linear Gradient Background Opacity Color', 'manual' ),
					'required' => array('bbpress-header-opacity-uploadimage-global','equals','1'),
				),
				// -------------- Color Controls --------------
				array(
					'id'       => 'bbpresspages-color-settings',
					'type'     => 'section',
					'title'    => esc_html__( 'Color Control', 'manual' ),
					'indent'   => true, 
					'required' => array('bbpress-header-image','!=',''), 
				),
				array(
					'id'       => 'bbpresspages-title-color',
					'type'     => 'color',
					'title'    => esc_html__( 'Title Text Color', 'manual' ),
					'subtitle' => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
					'default'  => '#ffffff',
				),
				array(
					'id'       => 'bbpresspages-link-color',
					'type'     => 'link_color',
					'title'    => esc_html__( 'Link Regular Color', 'manual' ),
					'active'   => false, 
					'visited'  => false, 
					'hover'    => false, 
					'default'  => array(
					'regular'  => '#f1f1f1',
					)
				),

			)
		) );
}
	   
	    // KNOWLEDGEBASE CUSTOM CAT/TAG HEADER
	    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'KB - Category/Tag Page', 'manual' ),
        'id'               => 'kb_custom_header',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
				array(
					'id'    => 'kb-header-catagpage-info',
					'type'  => 'info',
					'style' => 'info',
					'notice' => false,
					'title' => esc_html__( 'IMPORTANT NOTE', 'manual' ),
					'desc'  => __( '<br>This is just \'knowledgebase category/tag page title bar\' control. For more \'knowledgebase category/tag page\' control please go to "Manual Options > Knowledgebase > Category Page"', 'manual' ),
				),	
				array(
					'id'       => 'onoff-knowledgebase-catag-page-title-bar',
					'type'     => 'switch',
					'title'    => esc_html__('Category/Tag Page Title Bar', 'manual' ),
					'desc' => __('<strong style="color:#e6614b;">IMPORTANT:</strong> Once disable, \'KB - Category/Tag Page\' main menu style will auto switch to \'white header navigation style\'', 'manual'),
					'default'  => true,
					'on'       => esc_html__( 'Enable', 'manual' ),
					'off'      => esc_html__( 'Disable', 'manual' ),
				),
				// -------------- Page Title Bar Controls --------------
				array(
					'id'       => 'kb-cattag-page-title-bar-controls',
					'type'     => 'section',
					'title'    => esc_html__( 'Controls', 'manual' ),
					'indent'   => true, 
					'required' => array('onoff-knowledgebase-catag-page-title-bar','equals','1'),  
				),
				array(
					'id'       => 'kb-cat-header-search-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Search Box', 'manual' ),
					'default'  => false,
					'subtitle' => esc_html__( 'Display search box on the category page', 'manual' ),
					'on' => esc_html__( 'Disable', 'manual' ),
					'off' => esc_html__( 'Enable', 'manual' ),
				),
				array(
					'id'       => 'kbcat-searchbox-display-position',
					'type'     => 'select',
					'title'    => esc_html__( 'Search Box Display Column Layout', 'manual' ),
					'options'  => array(
						'center' => esc_html__('Exact Center','manual' ),
						'6' => esc_html__('50% Width','manual' ),
						'7' => esc_html__('58% Width','manual' ),
						'8' => esc_html__('66% Width','manual' ),
						'9' => esc_html__('75% Width','manual' ),
						'10' => esc_html__('83% Width','manual' ),
						'11' => esc_html__('91% Width','manual' ),
						'12' => esc_html__('100% Width','manual' ),
					),
					'default'  => 'center',
					'required' => array('kb-cat-header-search-status','equals','0'),
				),
				array(
					'id'       => 'kb-cat-header-description-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Category Description', 'manual' ),
					'default'  => false,
					'subtitle' => esc_html__( 'Disable category description', 'manual' ),
					'on' => esc_html__( 'Enable', 'manual' ),
					'off' => esc_html__( 'Disable', 'manual' ),
				),
				array(
					'id'       => 'kb-cat-header-breadcrumb-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Breadcrumb', 'manual' ),
					'default'  => false,
					'subtitle' => esc_html__( 'Disable Breadcrumb from the category page', 'manual' ),
					'on' => esc_html__( 'Disable', 'manual' ),
					'off' => esc_html__( 'Enable', 'manual' ),
				),
				array(
					'id'       => 'kbcat-text-align',
					'type'     => 'select',
					'title'    => esc_html__( 'Header Text Align', 'manual' ),
					'options'  => array(
						'center' => esc_html__('Center','manual' ),
						'left' => esc_html__('Left','manual' ),
						'right' => esc_html__('Right','manual' ),
					),
					'default'  => 'center',
				),
				array(
					'id'       => 'kbcat-header-height',
					'type'     => 'text',
					'title'    => esc_html__( 'Header Height', 'manual' ),
					'subtitle'    => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
					'desc' =>  __('Example: 120px 0px 120px 0px (top, right, bottom, left) <br><br><strong style="color:#e6614b;">IMPORTANT: Make sure the value of RIGHT, LEFT is always 0px</strong>', 'manual' ),
					'default'  => '',
				),
				array(
					'id'       => 'kbcat-responsive-header-height',
					'type'     => 'text',
					'title'    => esc_html__( 'Re-adjust Responsive Header Height', 'manual' ),
					'subtitle' => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
					'desc'     => __( 'Example: 100px 0px 100px 0px (top, right, bottom, left) <br><br><strong style="color:#e6614b;">IMPORTANT: Make sure the value of RIGHT, LEFT is always 0px</strong>', 'manual' ), 
					'default'  => '',
				),
				// -------------- Page Title Controls --------------
				array(
					'id'       => 'kb-cattag-header-bg-text-global',
					'type'     => 'section',
					'title'    => esc_html__( 'Title Text', 'manual' ),
					'indent'   => true, 
					'required' => array('onoff-knowledgebase-catag-page-title-bar','equals','1'),  
				),
				array(
					'id'       => 'kb_cattag_header_title_font_size',
					'type'     => 'text',
					'title'    => esc_html__( 'Font Size', 'manual' ),
					'desc'     => esc_html__('Example 30px','manual' ),
					'default'  => '',
					'subtitle'    => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
				),
				array(
					'id'       => 'kb_cattag_header_title_line_height',
					'type'     => 'text',
					'title'    => esc_html__( 'Line Height', 'manual' ),
					'desc'     => esc_html__('Example 30px','manual' ),
					'default'  => '',
					'subtitle'    => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
				),
				array(
					'id'       => 'kb_cattag_header_title_font_weight',
					'type'     => 'select',
					'title'    => esc_html__( 'Font Weight', 'manual' ),
					'options'  => array(
						'default' => esc_html__('Default','manual' ),
						'100' => esc_html__('100','manual' ),
						'200' => esc_html__('200','manual' ),
						'300' => esc_html__('300','manual' ),
						'400' => esc_html__('400','manual' ),
						'500' => esc_html__('500','manual' ),
						'600' => esc_html__('600','manual' ),
						'700' => esc_html__('700','manual' ),
						'800' => esc_html__('800','manual' ),
						'900' => esc_html__('900','manual' ),
					),
					'default'  => 'default',
					'subtitle'    => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
				),
				// -------------- Page Title Bar Background Controls --------------
				array(
					'id'       => 'kb-cattag-header-bg-section-global',
					'type'     => 'section',
					'title'    => esc_html__( 'Background Image', 'manual' ),
					'indent'   => true, 
					'required' => array('onoff-knowledgebase-catag-page-title-bar','equals','1'),  
				),
				array (
					'subtitle' => esc_html__('Choose header background image for the category/tag page', 'manual'),
					'id' => 'manual-kb-header-background-image',
					'type' => 'media',
					'title' => esc_html__('Background Image', 'manual'),
					'url' => false,
				),
				array(
					'id'       => 'manual_kbcategory_background_color',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Background Color', 'manual' ),
					'subtitle' => esc_html__( 'Effective when upload transparent (.png) image', 'manual' ),
					'default'  => array(
									'color' => '#f5f5f5',
								),
					'required' => array('manual-kb-header-background-image','!=',''),
				),
				array(
					'id'       => 'kbcat-header-background-position',
					'type'     => 'select',
					'title'    => esc_html__( 'Header Background Position', 'manual' ),
					'options'  => array(
						'center top' => esc_html__('Center Top','manual' ),
						'center center' => esc_html__('Center Center','manual' ),
						'center bottom' => esc_html__('Center Bottom','manual' ),
					),
					'default'  => 'center center',
					'required' => array('manual-kb-header-background-image','!=',''),
				),
				array(
					'id'       => 'kbcat-apply-nav-background',
					'type'     => 'checkbox',
					'title'    => esc_html__( 'Add Nav Background', 'manual' ),
					'default'  => '0',
					'subtitle' => esc_html__('If checked, transparent background will be added on header nav bar','manual' ),
					'required' => array('manual-kb-header-background-image','!=',''),
					'desc'     => __('<strong style="color:blue;">Works ONLY...</strong> if "Main Menu Style ==  Transparent" <br>(Manual Options > Menu > Main Menu - Style > Main Menu - Style)','manual' ),
				),
				array(
					'id'       => 'kbcat-apply-nav-border-btm',
					'type'     => 'checkbox',
					'title'    => esc_html__( 'Add Nav Border Bottom', 'manual' ),
					'default'  => '',
					'subtitle' => esc_html__('If checked, transparent border will be added on the header nav bar','manual' ),
					'required' => array('manual-kb-header-background-image','!=',''),
				),
				array(
					'id'       => 'kbcat-apply-nav-border-btm-color',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Border Bottom Color', 'manual' ),
					'default'  => array(
						'color' => '#b0b0b0',
						'alpha' => '0.6'
					),
					'mode'     => 'background',
					'required' => array('kbcat-apply-nav-border-btm','equals','1'),
				),
				array(
					'id'       => 'kbcat-header-opacity-uploadimage-global',
					'type'     => 'checkbox',
					'title'    => esc_html__( 'Apply Background Opacity For the Upload Image', 'manual' ),
					'default'  => '0',
					'required' => array('manual-kb-header-background-image','!=',''),
				),
				array(
					'id'       => 'kbcat-lineargradient-first-color',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Background Opacity Color', 'manual' ),
					'default'  => array(
									'color' => '#000000',
									'alpha' => '0.3'
								),
					'desc' => esc_html__('Default: rgba(0, 0, 0, 0.3)','manual' ),
					'required' => array('kbcat-header-opacity-uploadimage-global','equals','1'),
				),
				array(
					'id'       => 'kbcat-linear-gradient-second-color',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Linear Gradient Background Opacity Color', 'manual' ),
					'required' => array('kbcat-header-opacity-uploadimage-global','equals','1'),
				),
				// -------------- Color Controls --------------
				array(
					'id'       => 'kbcatpage-color-settings',
					'type'     => 'section',
					'title'    => esc_html__( 'Color Control', 'manual' ),
					'indent'   => true, 
					'required' => array( 
										array('manual-kb-header-background-image','!=',''),
										array('onoff-knowledgebase-catag-page-title-bar','equals','1'),
										),
				),
				array(
					'id'       => 'kbcatpage-title-color',
					'type'     => 'color',
					'title'    => esc_html__( 'Title Text Color', 'manual' ),
					'subtitle' => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
					'default'  => '#ffffff',
				),
				array(
					'id'       => 'kbcatpage-link-color',
					'type'     => 'link_color',
					'title'    => esc_html__( 'Link Regular Color', 'manual' ),
					'active'   => false, 
					'visited'  => false, 
					'hover'    => false, 
					'default'  => array(
					'regular'  => '#f1f1f1',
					)
				),	
		
						
			)
		) );
	   
	    // KNOWLEDGEBASE CUSTOM SINGLE PAGE HEADER
	    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'KB - Single Page', 'manual' ),
        'id'               => 'kb_custom_singlepg_header',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
					array(
						'id'    => 'kb-header-singlepage-info',
						'type'  => 'info',
						'style' => 'info',
						'notice' => false,
						'title' => esc_html__( 'IMPORTANT NOTE', 'manual' ),
						'desc'  => __( '<br>This is just \'knowledgebase single page title bar\' control. For more \'knowledgebase single page\' control please go to "Manual Options > Knowledgebase > Single Page"', 'manual' )
					),					
					array(
						'id'       => 'onoff-knowledgebase-single-page-title-bar',
						'type'     => 'switch',
						'title'    => esc_html__('KB - Single Page Title Bar', 'manual' ),
						'desc' => __('<strong style="color:#e6614b;">IMPORTANT:</strong> Once disable, \'KB - Single Page\' main menu style will auto switch to \'white header navigation style\'', 'manual'),
						'default'  => true,
						'on'       => esc_html__( 'Enable', 'manual' ),
						'off'      => esc_html__( 'Disable', 'manual' ),
					),
					// -------------- Page Title Bar Controls --------------
					array(
						'id'       => 'kb-kb-single-page-title-bar-controls',
						'type'     => 'section',
						'title'    => esc_html__( 'Controls', 'manual' ),
						'indent'   => true, 
						'required' => array('onoff-knowledgebase-single-page-title-bar','equals','1'),  
					),
					array(
						'id'       => 'kb-single-pg-title-text-status',
						'type'     => 'switch',
						'title'    => esc_html__( 'Header Title Text', 'manual' ),
						'default'  => true,
						'subtitle' => esc_html__( 'Hide header title text', 'manual' ),
						'on' => esc_html__( 'Disable', 'manual' ),
						'off' => esc_html__( 'Enable', 'manual' ),
					),					
					array(
						'id'       => 'kb-single-pg-header-search-status',
						'type'     => 'switch',
						'title'    => esc_html__( 'Search Box', 'manual' ),
						'default'  => false,
						'subtitle' => esc_html__( 'Display search box on the header', 'manual' ),
						'on' => esc_html__( 'Disable', 'manual' ),
						'off' => esc_html__( 'Enable', 'manual' ),
					),
					array(
						'id'       => 'kbsinglepg-searchbox-display-position',
						'type'     => 'select',
						'title'    => esc_html__( 'Search Box Display Column Layout', 'manual' ),
						'options'  => array(
							'center' => esc_html__('Exact Center', 'manual' ),
							'6' => esc_html__('50% Width', 'manual' ),
							'7' => esc_html__('58% Width', 'manual' ),
							'8' => esc_html__('66% Width', 'manual' ),
							'9' => esc_html__('75% Width', 'manual' ),
							'10' => esc_html__('83% Width', 'manual' ),
							'11' => esc_html__('91% Width', 'manual' ),
							'12' => esc_html__('100% Width', 'manual' ),
						),
						'default'  => 'center',
						'required' => array('kb-single-pg-header-search-status','equals','0'),
					),
					array(
						'id'       => 'kb-single-pg-header-description-status',
						'type'     => 'switch',
						'title'    => esc_html__( 'Category Description', 'manual' ),
						'default'  => false,
						'subtitle' => esc_html__( 'Disable category description', 'manual' ),
						'on' => esc_html__( 'Enable', 'manual' ),
						'off' => esc_html__( 'Disable', 'manual' ),
					),
					array(
						'id'       => 'kb-single-pg-header-breadcrumb-status',
						'type'     => 'switch',
						'title'    => esc_html__( 'Breadcrumb', 'manual' ),
						'default'  => false,
						'subtitle' => esc_html__( 'Disable Breadcrumb on the single KB page', 'manual' ),
						'on' => esc_html__( 'Disable', 'manual' ),
						'off' => esc_html__( 'Enable', 'manual' ),
					),
					array(
						'id'       => 'kbsinglepg-text-align',
						'type'     => 'select',
						'title'    => esc_html__( 'Header Text Align', 'manual' ),
						'options'  => array(
							'center' => esc_html__('Center','manual' ),
							'left' => esc_html__('Left','manual' ),
							'right' => esc_html__('Right','manual' ),
						),
						'default'  => 'center',
					),
					array(
						'id'       => 'kbsinglepg-header-height',
						'type'     => 'text',
						'title'    => esc_html__( 'Header Height', 'manual' ),
						'subtitle'    => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
						'desc' => __('Example: 32px 0px 32px 0px (top, right, bottom, left) <br><br><strong style="color:#e6614b;">IMPORTANT: Make sure the value of RIGHT, LEFT is always 0px</strong>', 'manual' ),
						'default'  => '32px 0px 32px 0px',
					),
					array(
						'id'       => 'kbsinglepg-responsive-header-height',
						'type'     => 'text',
						'title'    => esc_html__( 'Re-adjust Responsive Header Height', 'manual' ),
						'subtitle' => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
						'desc'     => __( 'Example: 100px 0px 100px 0px (top, right, bottom, left) <br><br><strong style="color:#e6614b;">IMPORTANT: Make sure the value of RIGHT, LEFT is always 0px</strong>', 'manual' ), 
						'default'  => '',
					),
					// -------------- Page Title Controls --------------
					array(
						'id'       => 'kbsinglepg-header-bg-text-global',
						'type'     => 'section',
						'title'    => esc_html__( 'Title Text', 'manual' ),
						'indent'   => true, 
						'required' => array( array('onoff-knowledgebase-single-page-title-bar','equals','1'),
										     array('kb-single-pg-title-text-status','=',false)
										    ), 
					),
					array(
						'id'       => 'kbsinglepg_header_title_font_size',
						'type'     => 'text',
						'title'    => esc_html__( 'Font Size', 'manual' ),
						'desc'     => esc_html__('Example 30px','manual' ),
						'default'  => '',
						'subtitle'    => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
					),
					array(
						'id'       => 'kbsinglepg_header_title_line_height',
						'type'     => 'text',
						'title'    => esc_html__( 'Line Height', 'manual' ),
						'desc'     => esc_html__('Example 30px','manual' ),
						'default'  => '',
						'subtitle'    => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
					),
					array(
						'id'       => 'kbsinglepg_header_title_font_weight',
						'type'     => 'select',
						'title'    => esc_html__( 'Font Weight', 'manual' ),
						'options'  => array(
							'default' => esc_html__('Default','manual' ),
							'100' => esc_html__('100','manual' ),
							'200' => esc_html__('200','manual' ),
							'300' => esc_html__('300','manual' ),
							'400' => esc_html__('400','manual' ),
							'500' => esc_html__('500','manual' ),
							'600' => esc_html__('600','manual' ),
							'700' => esc_html__('700','manual' ),
							'800' => esc_html__('800','manual' ),
							'900' => esc_html__('900','manual' ),
						),
						'default'  => 'default',
						'subtitle'    => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
					),
					// -------------- Page Title Bar Background Controls --------------
					array(
						'id'       => 'kb-singlepg-header-bg-section-global',
						'type'     => 'section',
						'title'    => esc_html__( 'Background Image', 'manual' ),
						'indent'   => true, 
						'required' => array('onoff-knowledgebase-single-page-title-bar','equals','1'), 
					),
					array (
						'subtitle' => esc_html__('Choose header background image for the kb single page', 'manual'),
						'id' => 'kbsinglepg-header-background-image',
						'type' => 'media',
						'title' => esc_html__('Background Image', 'manual'),
						'url' => false,
					),
					array(
						'id'       => 'manual_kbsinglepg_background_color',
						'type'     => 'color_rgba',
						'title'    => esc_html__( 'Background Color', 'manual' ),
						'subtitle' => esc_html__( 'Effective when upload transparent (.png) image', 'manual' ),
						'default'  => array(
										'color' => '#f5f5f5',
									),
						'required' => array('kbsinglepg-header-background-image','!=',''),
					),
					array(
						'id'       => 'kbsinglepg-header-background-position',
						'type'     => 'select',
						'title'    => esc_html__( 'Header Background Position', 'manual' ),
						'options'  => array(
							'center top' => esc_html__('Center Top','manual' ),
							'center center' => esc_html__('Center Center','manual' ),
							'center bottom' => esc_html__('Center Bottom','manual' ),
						),
						'default'  => 'center center',
						'required' => array('kbsinglepg-header-background-image','!=',''),
					),
					array(
						'id'       => 'kbsinglepg-apply-nav-background',
						'type'     => 'checkbox',
						'title'    => esc_html__( 'Add Nav Background', 'manual' ),
						'default'  => '0',
						'subtitle' => esc_html__('If checked, transparent background will be added on header nav bar', 'manual' ),
						'required' => array('kbsinglepg-header-background-image','!=',''),
						 'desc' => __('<strong style="color:blue;">Works ONLY...</strong> if "Main Menu Style ==  Transparent" <br>(Manual Options > Menu > Main Menu - Style > Main Menu - Style)','manual' ),
					),
					array(
						'id'       => 'kbsinglepg-apply-nav-border-btm',
						'type'     => 'checkbox',
						'title'    => esc_html__( 'Add Nav Border Bottom', 'manual' ),
						'default'  => '',
						'subtitle' => esc_html__('If checked, transparent border will be added on the header nav bar', 'manual' ),
						'required' => array('kbsinglepg-header-background-image','!=',''),
					),
					array(
						'id'       => 'kbsinglepg-apply-nav-border-btm-color',
						'type'     => 'color_rgba',
						'title'    => esc_html__( 'Border Bottom Color', 'manual' ),
						'default'  => array(
							'color' => '#b0b0b0',
							'alpha' => '0.6'
						),
						'mode'     => 'background',
						'required' => array('kbsinglepg-apply-nav-border-btm','equals','1'),
					),
					array(
						'id'       => 'kbsinglepg-header-opacity-uploadimage-global',
						'type'     => 'checkbox',
						'title'    => esc_html__( 'Apply Background Opacity For the Upload Image', 'manual' ),
						'default'  => '0',
						'required' => array('kbsinglepg-header-background-image','!=',''),
					),
					array(
						'id'       => 'kbsingle-lineargradient-first-color',
						'type'     => 'color_rgba',
						'title'    => esc_html__( 'Background Opacity Color', 'manual' ),
						'default'  => array(
										'color' => '#000000',
										'alpha' => '0.3'
									),
						'desc' => esc_html__('Default: rgba(0, 0, 0, 0.3)', 'manual' ),
						'required' => array('kbsinglepg-header-opacity-uploadimage-global','equals','1'),
					),
					array(
						'id'       => 'kbsingle-linear-gradient-second-color',
						'type'     => 'color_rgba',
						'title'    => esc_html__( 'Linear Gradient Background Opacity Color', 'manual' ),
						'required' => array('kbsinglepg-header-opacity-uploadimage-global','equals','1'),
					),
					// -------------- Color Controls --------------
					array(
						'id'       => 'kbsinglepage-color-settings',
						'type'     => 'section',
						'title'    => esc_html__( 'Color Control', 'manual' ),
						'indent'   => true, 
						'required' => array( 
											array('kbsinglepg-header-background-image','!=',''), 
											array('onoff-knowledgebase-single-page-title-bar','equals','1')
									   ),
					),
					array(
						'id'       => 'kbsinglepage-title-color',
						'type'     => 'color',
						'title'    => esc_html__( 'Title Text Color', 'manual' ),
						'subtitle' => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
						'default'  => '#ffffff',
					),
					array(
						'id'       => 'kbsinglepage-link-color',
						'type'     => 'link_color',
						'title'    => esc_html__( 'Link Regular Color', 'manual' ),
						'active'   => false, 
						'visited'  => false, 
						'hover'    => false, 
						'default'  => array(
						'regular'  => '#f1f1f1',
						)
					),
					
				)
		) );
	   
	    // DOCUMENTATION CUSTOM CAT/SINGLE PAGE HEADER
	    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'DOC - Category/Single Page', 'manual' ),
        'id'               => 'documentation_custom_header',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
									
					array(
						'id'    => 'documentation-cat-single-page-info',
						'type'  => 'info',
						'style' => 'info',
						'notice' => false,
						'title' => esc_html__( 'IMPORTANT NOTE', 'manual' ),
						'desc'  => __( '<br>This is just \'documentation - category/single page title bar\' control. For more \'documentation category/single page\' control please go to "Manual Options > Documentation"', 'manual' )
					),
					array(
						'id'       => 'onoff-documentation-catag-single-page-title-bar',
						'type'     => 'switch',
						'title'    => esc_html__('Doc - Category/Single Page Title Bar', 'manual' ),
						'desc' => __('<strong style="color:#e6614b;">IMPORTANT:</strong> Once disable, \'DOC - Category/Single Page\' main menu style will auto switch to \'white header navigation style\'', 'manual'),
						'default'  => true,
						'on'       => esc_html__( 'Enable', 'manual' ),
						'off'      => esc_html__( 'Disable', 'manual' ),
					),
					// -------------- Page Title Bar Controls --------------
					array(
						'id'       => 'doc-page-title-bar-controls',
						'type'     => 'section',
						'title'    => esc_html__( 'Controls', 'manual' ),
						'indent'   => true, 
						'required' => array('onoff-documentation-catag-single-page-title-bar','equals','1'),  
					),
					array(
						'id'       => 'doc-cat-single-pg-title-text-status',
						'type'     => 'switch',
						'title'    => esc_html__( 'Header Title Text', 'manual' ),
						'default'  => false,
						'subtitle' => esc_html__( 'Hide header title text', 'manual' ),
						'on' => esc_html__( 'Disable', 'manual' ),
						'off' => esc_html__( 'Enable', 'manual' ),
					),
					array(
						'id'       => 'documentation-disable-search-category-page',
						'type'     => 'switch',
						'title'    => esc_html__( 'Search Box', 'manual' ),
						'default'  => false,
						'subtitle' => esc_html__('Display search box on the header', 'manual'),
						'on' => esc_html__( 'Disable', 'manual' ),
						'off' => esc_html__( 'Enable', 'manual' ),
					),
					array(
						'id'       => 'documentation-searchbox-display-position',
						'type'     => 'select',
						'title'    => esc_html__( 'Search Box Display Column Layout', 'manual' ),
						'options'  => array(
							'center' => esc_html__('Exact Center','manual' ),
							'6' => esc_html__('50% Width','manual' ),
							'7' => esc_html__('58% Width','manual' ),
							'8' => esc_html__('66% Width','manual' ),
							'9' => esc_html__('75% Width','manual' ),
							'10' => esc_html__('83% Width','manual' ),
							'11' => esc_html__('91% Width','manual' ),
							'12' => esc_html__('100% Width','manual' ),
						),
						'default'  => 'center',
						'required' => array('documentation-disable-search-category-page','equals','0'),
					), 
					array(
						'id'       => 'documentation-disable-breadcrumb-category-page',
						'type'     => 'switch',
						'title'    => esc_html__( 'Breadcrumb', 'manual' ),
						'default'  => false,
						'subtitle' => esc_html__( 'Display breadcrumb on the documentation area','manual' ),
						'on' => esc_html__( 'Disable', 'manual' ),
						'off' => esc_html__( 'Enable', 'manual' ),
					),
					array(
						'id'       => 'documentation-header-height-category-page',
						'type'     => 'text',
						'title'    => esc_html__( 'Header Height', 'manual' ),
						'subtitle'    => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
						'desc' => __('Example: 120px 0px 120px 0px (top, right, bottom, left) <br><br><strong style="color:#e6614b;">IMPORTANT: Make sure the value of RIGHT, LEFT is always 0px</strong>', 'manual' ),
						'default'  => '',
					),
					array(
						'id'       => 'documentation-responsive-header-height-category-page',
						'type'     => 'text',
						'title'    => esc_html__( 'Re-adjust Responsive Header Height', 'manual' ),
						'subtitle' => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
						'desc'     => __( 'Example: 100px 0px 100px 0px (top, right, bottom, left) <br><br><strong style="color:#e6614b;">IMPORTANT: Make sure the value of RIGHT, LEFT is always 0px</strong>', 'manual' ), 
						'default'  => '',
					),
					array(
						'id'       => 'doc-header-text-align',
						'type'     => 'select',
						'title'    => esc_html__( 'Header Text Align', 'manual' ),
						'options'  => array(
							'left' => esc_html__('Left', 'manual' ),
							'center' => esc_html__('Center', 'manual' ),
							'right' => esc_html__('Right', 'manual' ),
						),
						'default'  => 'center'
					),
					// -------------- Page Title Controls --------------
					array(
						'id'       => 'doc-header-bg-text-global',
						'type'     => 'section',
						'title'    => esc_html__( 'Title Text', 'manual' ),
						'indent'   => true, 
						'required' => array( array('onoff-documentation-catag-single-page-title-bar','equals','1'),
										     array('doc-cat-single-pg-title-text-status','=',false)
										    ),
					),
					array(
						'id'       => 'doc_header_title_font_size',
						'type'     => 'text',
						'title'    => esc_html__( 'Font Size', 'manual' ),
						'desc'     => esc_html__('Example 30px', 'manual' ),
						'default'  => '',
						'subtitle'    => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
					),
					array(
						'id'       => 'doc_header_title_line_height',
						'type'     => 'text',
						'title'    => esc_html__( 'Line Height', 'manual' ),
						'desc'     => esc_html__('Example 30px','manual' ),
						'default'  => '',
						'subtitle'    => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
					),
					array(
						'id'       => 'doc_header_title_font_weight',
						'type'     => 'select',
						'title'    => esc_html__( 'Font Weight', 'manual' ),
						'options'  => array(
							'default' => esc_html__('Default', 'manual' ),
							'100' => esc_html__('100', 'manual' ),
							'200' => esc_html__('200', 'manual' ),
							'300' => esc_html__('300', 'manual' ),
							'400' => esc_html__('400', 'manual' ),
							'500' => esc_html__('500', 'manual' ),
							'600' => esc_html__('600', 'manual' ),
							'700' => esc_html__('700', 'manual' ),
							'800' => esc_html__('800', 'manual' ),
							'900' => esc_html__('900', 'manual' ),
						),
						'default'  => 'default',
						'subtitle'    => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
					),
					// -------------- Page Title Bar Background Controls --------------
					array(
						'id'       => 'doc-header-bg-section-global',
						'type'     => 'section',
						'title'    => esc_html__( 'Background Image', 'manual' ),
						'indent'   => true, 
						'required' => array('onoff-documentation-catag-single-page-title-bar','equals','1'),
					),
					array (
						'subtitle' => esc_html__('Choose header background image for the documentation category/single pages', 'manual'),
						'id' => 'manual-documentation-header-background-image',
						'type' => 'media',
						'title' => esc_html__('Background Image', 'manual'),
						'url' => false,
					),
					array(
						'id'       => 'manual_documentation_bgcolor',
						'type'     => 'color_rgba',
						'title'    => esc_html__( 'Background Color', 'manual' ),
						'subtitle' => esc_html__( 'Effective when upload transparent (.png) image', 'manual' ),
						'default'  => array(
										'color' => '#f5f5f5',
									),
						'required' => array('manual-documentation-header-background-image','!=',''),
					),
					array(
						'id'       => 'doc-header-background-position',
						'type'     => 'select',
						'title'    => esc_html__( 'Header Background Position', 'manual' ),
						'options'  => array(
							'center top' => esc_html__('Center Top','manual' ),
							'center center' => esc_html__('Center Center','manual' ),
							'center bottom' => esc_html__('Center Bottom','manual' ),
						),
						'default'  => 'center center',
						'required' => array('manual-documentation-header-background-image','!=',''),
					),
					array(
						'id'       => 'documentation-apply-nav-background-category-page',
						'type'     => 'checkbox',
						'title'    => esc_html__( 'Add Nav Background', 'manual' ),
						'default'  => '0',
						'subtitle' => esc_html__('If checked, transparent background will be added on header nav bar','manual' ),
						'required' => array('manual-documentation-header-background-image','!=',''),
						'desc' => __('<strong style="color:blue;">Works ONLY...</strong> if "Main Menu Style ==  Transparent" <br>(Manual Options > Menu > Main Menu - Style > Main Menu - Style)','manual' ),
					),
					array(
						'id'       => 'documentation-apply-nav-border-btm',
						'type'     => 'checkbox',
						'title'    => esc_html__( 'Add Nav Border Bottom', 'manual' ),
						'default'  => '',
						'subtitle' => esc_html__('If checked, transparent border will be added on the header nav bar','manual' ),
						'required' => array('manual-documentation-header-background-image','!=',''),
					),
					array(
						'id'       => 'documentation-apply-nav-border-btm-color',
						'type'     => 'color_rgba',
						'title'    => esc_html__( 'Border Bottom Color', 'manual' ),
						'default'  => array(
							'color' => '#b0b0b0',
							'alpha' => '0.6'
						),
						'mode'     => 'background',
						'required' => array('documentation-apply-nav-border-btm','equals','1'),
					),
					array(
						'id'       => 'documentation-header-opacity-uploadimage-global-category-page',
						'type'     => 'checkbox',
						'title'    => esc_html__( 'Apply Background Opacity For the Upload Image', 'manual' ),
						'default'  => '0',
						'required' => array('manual-documentation-header-background-image','!=',''),
					),
					array(
						'id'       => 'documentation-lineargradient-first-color',
						'type'     => 'color_rgba',
						'title'    => esc_html__( 'Background Opacity Color', 'manual' ),
						'default'  => array(
										'color' => '#000000',
										'alpha' => '0.3'
									),
						'desc' => esc_html__('Default: rgba(0, 0, 0, 0.3)','manual' ),
						'required' => array('documentation-header-opacity-uploadimage-global-category-page','equals','1'),
					),
					array(
						'id'       => 'documentation-linear-gradient-second-color',
						'type'     => 'color_rgba',
						'title'    => esc_html__( 'Linear Gradient Background Opacity Color', 'manual' ),
						'required' => array('documentation-header-opacity-uploadimage-global-category-page','equals','1'),
					),
					// -------------- Color Controls --------------
					array(
						'id'       => 'documentation-catsinglepage-color-settings',
						'type'     => 'section',
						'title'    => esc_html__( 'Color Control', 'manual' ),
						'indent'   => true, 
						'required' => array( 
											array('manual-documentation-header-background-image','!=',''), 
											array('onoff-documentation-catag-single-page-title-bar','equals','1')
									   ),
					),
					array(
						'id'       => 'documentation-catsinglepage-title-color',
						'type'     => 'color',
						'title'    => esc_html__( 'Title Text Color', 'manual' ),
						'subtitle' => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
						'default'  => '#ffffff',
					),
					array(
						'id'       => 'documentation-catsinglepage-link-color',
						'type'     => 'link_color',
						'title'    => esc_html__( 'Link Regular Color', 'manual' ),
						'active'   => false, 
						'visited'  => false, 
						'hover'    => false, 
						'default'  => array(
						'regular'  => '#f1f1f1',
						)
					),
					
				)
		) );
	   
	    // FAQ CATEGORY CUSTOM HEADER   
	    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'FAQ - Category/Single Page', 'manual' ),
        'id'               => 'faq_cat_on_off_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
								array(
									'id'    => 'faq-header-cat-single-pg-info',
									'type'  => 'info',
									'style' => 'info',
									'notice' => false,
									'title' => esc_html__( 'IMPORTANT NOTE', 'manual' ),
									'desc'  => __( '<br>This is just \'FAQ - category/single page title bar\' control. For more \'FAQ - category/single page\' control please go to "Manual Options > FAQ"', 'manual' )
								),
								array(
									'id'       => 'onoff-faq-catag-single-page-title-bar',
									'type'     => 'switch',
									'title'    => esc_html__('FAQ - Category/Single Page Title Bar', 'manual' ),
									'desc' => __('<strong style="color:#e6614b;">IMPORTANT:</strong> Once disable, \'FAQ - Category/Single Page\' main menu style will auto switch to \'white header navigation style\'', 'manual'),
									'default'  => true,
									'on'       => esc_html__( 'Enable', 'manual' ),
									'off'      => esc_html__( 'Disable', 'manual' ),
								),
								// -------------- Page Title Bar Controls --------------
								array(
									'id'       => 'faq-page-title-bar-controls',
									'type'     => 'section',
									'title'    => esc_html__( 'Controls', 'manual' ),
									'indent'   => true, 
									'required' => array('onoff-faq-catag-single-page-title-bar','equals','1'),  
								),
								array(
									'id'       => 'faq-cat-header-search-status',
									'type'     => 'switch',
									'title'    => esc_html__( 'Search Box', 'manual' ),
									'default'  => false,
									'subtitle' => esc_html__('Display search box on the header', 'manual'),
									'on' => esc_html__( 'Disable', 'manual' ),
									'off' => esc_html__( 'Enable', 'manual' ),
								),
								array(
									'id'       => 'faq-searchbox-display-position',
									'type'     => 'select',
									'title'    => esc_html__( 'Search Box Display Column Layout', 'manual' ),
									'options'  => array(
										'center' => esc_html__('Exact Center', 'manual' ),
										'6' => esc_html__('50% Width', 'manual' ),
										'7' => esc_html__('58% Width', 'manual' ),
										'8' => esc_html__('66% Width', 'manual' ),
										'9' => esc_html__('75% Width', 'manual' ),
										'10' => esc_html__('83% Width', 'manual' ),
										'11' => esc_html__('91% Width', 'manual' ),
										'12' => esc_html__('100% Width', 'manual' ),
									),
									'default'  => 'center',
									'required' => array('faq-cat-header-search-status','equals','0'),
								),
								array(
									'id'       => 'faq-cat-header-breadcrumb-status',
									'type'     => 'switch',
									'title'    => esc_html__( 'Breadcrumb', 'manual' ),
									'default'  => false,
									'subtitle' => esc_html__( 'Display breadcrumb on FAQ area', 'manual' ),
									'on'       => esc_html__( 'Disable', 'manual' ),
									'off'      => esc_html__( 'Enable', 'manual' ),
								),	
								array(
									'id'       => 'faq-header-height-category-page',
									'type'     => 'text',
									'title'    => esc_html__( 'Header Height', 'manual' ),
									'subtitle' => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
									'desc'     => __('Example: 120px 0px 120px 0px (top, right, bottom, left) <br><br><strong style="color:#e6614b;">IMPORTANT: Make sure the value of RIGHT, LEFT is always 0px</strong>', 'manual' ), 
									'default'  => '',
								),
								array(
									'id'       => 'faq-responsive-header-height-category-page',
									'type'     => 'text',
									'title'    => esc_html__( 'Re-adjust Responsive Header Height', 'manual' ),
									'subtitle' => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
									'desc'     => __( 'Example: 100px 0px 100px 0px (top, right, bottom, left) <br><br><strong style="color:#e6614b;">IMPORTANT: Make sure the value of RIGHT, LEFT is always 0px</strong>', 'manual' ), 
									'default'  => '',
								),
								array(
									'id'       => 'faq-header-text-align',
									'type'     => 'select',
									'title'    => esc_html__( 'Header Text Align', 'manual' ),
									'options'  => array(
										'left' => esc_html__('Left','manual' ),
										'center' => esc_html__('Center','manual' ),
										'right' => esc_html__('Right','manual' ),
									),
									'default'  => 'center'
								),
								// -------------- Page Title Controls --------------
								array(
									'id'       => 'faq-header-bg-text-global',
									'type'     => 'section',
									'title'    => esc_html__( 'Title Text', 'manual' ),
									'indent'   => true, 
									'required' => array('onoff-faq-catag-single-page-title-bar','equals','1'),
								),
								array(
									'id'       => 'faq_header_title_font_size',
									'type'     => 'text',
									'title'    => esc_html__( 'Font Size', 'manual' ),
									'desc'     => esc_html__('Example 30px','manual' ),
									'default'  => '',
									'subtitle' => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
								),
								array(
									'id'       => 'faq_header_title_line_height',
									'type'     => 'text',
									'title'    => esc_html__( 'Line Height', 'manual' ),
									'desc'     => esc_html__('Example 30px','manual' ),
									'default'  => '',
									'subtitle' => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
								),
								array(
									'id'       => 'faq_header_title_font_weight',
									'type'     => 'select',
									'title'    => esc_html__( 'Font Weight', 'manual' ),
									'options'  => array(
										'default' => esc_html__('Default','manual' ),
										'100' => esc_html__('100','manual' ),
										'200' => esc_html__('200','manual' ),
										'300' => esc_html__('300','manual' ),
										'400' => esc_html__('400','manual' ),
										'500' => esc_html__('500','manual' ),
										'600' => esc_html__('600','manual' ),
										'700' => esc_html__('700','manual' ),
										'800' => esc_html__('800','manual' ),
										'900' => esc_html__('900','manual' ),
									),
									'default'  => 'default',
									'subtitle' => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
								),
								// -------------- Page Title Bar Background Controls --------------
								array(
									'id'       => 'faq-header-bg-section-global',
									'type'     => 'section',
									'title'    => esc_html__( 'Background Image', 'manual' ),
									'indent'   => true, 
									'required' => array('onoff-faq-catag-single-page-title-bar','equals','1'),
								),
								array (
									'subtitle' => esc_html__('Choose header background image for the FAQ pages', 'manual'),
									'id' => 'manual-faq-header-background-image',
									'type' => 'media',
									'title' => esc_html__('Background Image', 'manual'),
									'url' => false,
								),
								array(
									'id'       => 'manual_FAQpage_background_color',
									'type'     => 'color_rgba',
									'title'    => esc_html__( 'Background Color', 'manual' ),
									'subtitle' => esc_html__( 'Effective when upload transparent (.png) image', 'manual' ),
									'default'  => array(
													'color' => '#f5f5f5',
												),
									'required' => array('manual-faq-header-background-image','!=',''),
								),
								array(
									'id'       => 'header-faq-background-position',
									'type'     => 'select',
									'title'    => esc_html__( 'Header Background Position', 'manual' ),
									'options'  => array(
										'center top' => esc_html__('Center Top', 'manual' ),
										'center center' => esc_html__('Center Center', 'manual' ),
										'center bottom' => esc_html__('Center Bottom', 'manual' ),
									),
									'default'  => 'center center',
									'required' => array('manual-faq-header-background-image','!=',''),
								),
								array(
									'id'       => 'faq-apply-nav-background-category-page',
									'type'     => 'checkbox',
									'title'    => esc_html__( 'Add Nav Background', 'manual' ),
									'default'  => '0',
									'subtitle' => esc_html__('If checked, transparent background will be added on header nav bar', 'manual' ),
									'desc'     => __('<strong style="color:blue;">Works ONLY...</strong> if "Main Menu Style ==  Transparent" <br>(Manual Options > Menu > Main Menu - Style > Main Menu - Style)', 'manual' ),
									'required' => array('manual-faq-header-background-image','!=',''),
								),
								array(
									'id'       => 'faq-apply-nav-border-btm',
									'type'     => 'checkbox',
									'title'    => esc_html__( 'Add Nav Border Bottom', 'manual' ),
									'default'  => '',
									'subtitle' => esc_html__('If checked, transparent border will be added on the header nav bar', 'manual' ),
									'required' => array('manual-faq-header-background-image','!=',''),
								),
								array(
									'id'       => 'faq-apply-nav-border-btm-color',
									'type'     => 'color_rgba',
									'title'    => esc_html__( 'Border Bottom Color', 'manual' ),
									'default'  => array(
										'color' => '#b0b0b0',
										'alpha' => '0.6'
									),
									'mode'     => 'background',
									'required' => array('faq-apply-nav-border-btm','equals','1'),
								),
								array(
									'id'       => 'faq-header-opacity-uploadimage-global-category-page',
									'type'     => 'checkbox',
									'title'    => esc_html__( 'Apply Background Opacity For the Upload Image', 'manual' ),
									'default'  => '0',
									'required' => array('manual-faq-header-background-image','!=',''),
								),
								array(
									'id'       => 'faq-lineargradient-first-color',
									'type'     => 'color_rgba',
									'title'    => esc_html__( 'Background Opacity Color', 'manual' ),
									'default'  => array(
													'color' => '#000000',
													'alpha' => '0.3'
												),
									'desc' => esc_html__('Default: rgba(0, 0, 0, 0.3)','manual' ),
									'required' => array('faq-header-opacity-uploadimage-global-category-page','equals','1'),
								),
								array(
									'id'       => 'faq-linear-gradient-second-color',
									'type'     => 'color_rgba',
									'title'    => esc_html__( 'Linear Gradient Background Opacity Color', 'manual' ),
									'required' => array('faq-header-opacity-uploadimage-global-category-page','equals','1'),
								),
								// -------------- Color Controls --------------
								array(
									'id'       => 'faq-catsinglepage-color-settings',
									'type'     => 'section',
									'title'    => esc_html__( 'Color Control', 'manual' ),
									'indent'   => true, 
									'required' => array( 
														array('manual-faq-header-background-image','!=',''), 
														array('onoff-faq-catag-single-page-title-bar','equals','1')
												   ),
								),
								array(
									'id'       => 'faq-catsinglepage-title-color',
									'type'     => 'color',
									'title'    => esc_html__( 'Title Text Color', 'manual' ),
									'subtitle' => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
									'default'  => '#ffffff',
								),
								array(
									'id'       => 'faq-catsinglepage-link-color',
									'type'     => 'link_color',
									'title'    => esc_html__( 'Link Regular Color', 'manual' ),
									'active'   => false, 
									'visited'  => false, 
									'hover'    => false, 
									'default'  => array(
									'regular'  => '#f1f1f1',
									)
								),
				
			)
		) );
	 
	    // 404 CUSTOM HEADER
	    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( '404 Page', 'manual' ),
        'id'     => 'theme_404_section',
		'subsection'       => true,
        'fields' => array(
						array(
							'id'     => '404-header-page-info',
							'type'   => 'info',
							'style'  => 'info',
							'notice' => false,
							'title'  => esc_html__( 'IMPORTANT NOTE', 'manual' ),
							'desc'   => __( '<br>This is just \'404 page title bar\' control. For more \'404 page\' control please go to "Manual Options > 404 Page"', 'manual' )
						),
						array(
							'id'       => 'onoff-404-page-hrader',
							'type'     => 'switch',
							'title'    => esc_html__( '404 Page Header', 'manual' ),
							'subtitle' => esc_html__('Display page header', 'manual'),
							'default'  => true,
							'on'       => esc_html__( 'Enable', 'manual' ),
							'off'      => esc_html__( 'Disable', 'manual' ),
						),
						// -------------- 404 Title Bar Controls --------------
						array(
							'id'       => '404-pageheader-normal-settings',
							'type'     => 'section',
							'title'    => esc_html__( 'Normal Header Settings', 'manual' ),
							'indent'   => true, 
							'required' => array('onoff-404-page-hrader','equals',true),
						),
						array(
							'id'       => 'home-404-search-bar-status',
							'type'     => 'switch',
							'title'    => esc_html__( 'Search Box', 'manual' ),
							'subtitle' => esc_html__('Display search box on the header', 'manual'),
							'default'  => false,
							'on'       => esc_html__( 'Disable', 'manual' ),
							'off'      => esc_html__( 'Enable', 'manual' ),
						),
						array(
							'id'       => 'home-404-searchbox-display-position',
							'type'     => 'select',
							'title'    => esc_html__( 'Search Box Display Column Layout', 'manual' ),
							'options'  => array(
								'center' => esc_html__('Exact Center','manual' ),
								'6' => esc_html__('50% Width','manual' ),
								'7' => esc_html__('58% Width','manual' ),
								'8' => esc_html__('66% Width','manual' ),
								'9' => esc_html__('75% Width','manual' ),
								'10' => esc_html__('83% Width','manual' ),
								'11' => esc_html__('91% Width','manual' ),
								'12' => esc_html__('100% Width','manual' ),
							),
							'default'  => 'center',
							'required' => array('home-404-search-bar-status','equals','0'),
						),
						array(
							'id'       => '404-header-height',
							'type'     => 'text',
							'title'    => esc_html__( 'Header Height', 'manual' ),
							'subtitle' => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
							'desc'     => __( 'Example: 120px 0px 120px 0px (top, right, bottom, left) <br><br><strong style="color:#e6614b;">IMPORTANT: Make sure the value of RIGHT, LEFT is always 0px</strong>', 'manual' ),
							'default'  => '',
						),
						array(
							'id'       => '404-responsive-header-height',
							'type'     => 'text',
							'title'    => esc_html__( 'Re-adjust Responsive Header Height', 'manual' ),
							'subtitle' => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
							'desc'     => __( 'Example: 100px 0px 100px 0px (top, right, bottom, left) <br><br><strong style="color:#e6614b;">IMPORTANT: Make sure the value of RIGHT, LEFT is always 0px</strong>', 'manual' ), 
							'default'  => '',
						),
						array(
							'id'       => '404-header-text-align',
							'type'     => 'select',
							'title'    => esc_html__( 'Header Text Align', 'manual' ),
							'options'  => array(
											'left' => esc_html__('Left', 'manual' ),
											'center' => esc_html__('Center', 'manual' ),
											'right' => esc_html__('Right', 'manual' ),
							),
							'default'  => 'center'
						),
						// -------------- Page Title Controls --------------
						array(
							'id'       => 'home-404-header-bg-text-global',
							'type'     => 'section',
							'title'    => esc_html__( 'Title Text', 'manual' ),
							'indent'   => true, 
							'required' => array('onoff-404-page-hrader','equals',true),
						),
						array(
							'id'       => 'home-404-main-title',
							'type'     => 'text',
							'title'    => esc_html__( 'Title', 'manual' ),
							'subtitle' => esc_html__( 'Enter header title', 'manual' ),
							'default'  => '404 - Page NOT Found',
						),
						array(
							'id'       => 'home_404_header_title_font_size',
							'type'     => 'text',
							'title'    => esc_html__( 'Font Size', 'manual' ),
							'desc'     =>esc_html__( 'Example 40px','manual' ),
							'default'  => '',
							'subtitle'    => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
						),
						array(
							'id'       => 'home_404_header_title_line_height',
							'type'     => 'text',
							'title'    => esc_html__( 'Line Height', 'manual' ),
							'desc'     => esc_html__('Example 45px','manual' ),
							'default'  => '',
							'subtitle' => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
						),
						array(
							'id'       => 'home_404_header_title_font_weight',
							'type'     => 'select',
							'title'    => esc_html__( 'Font Weight', 'manual' ),
							'options'  => array(
											'default' => esc_html__('Default','manual' ),
											'100' => esc_html__('100','manual' ),
											'200' => esc_html__('200','manual' ),
											'300' => esc_html__('300','manual' ),
											'400' => esc_html__('400','manual' ),
											'500' => esc_html__('500','manual' ),
											'600' => esc_html__('600','manual' ),
											'700' => esc_html__('700','manual' ),
											'800' => esc_html__('800','manual' ),
											'900' => esc_html__('900','manual' ),
							),
							'default'  => 'default',
							'subtitle'    => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
						),
						// -------------- Page Title Bar Background Controls --------------
						array(
							'id'       => '404-header-control',
							'type'     => 'section',
							'title'    => esc_html__( 'Background Image', 'manual' ),
							'indent'   => true,
							'required' => array('onoff-404-page-hrader','equals',true),
						),
						array(
							'id'       => '404-page-header-background-img',
							'type'     => 'media',
							'url'      => false,
							'title'    => esc_html__( 'Background Image', 'manual' ),
							'subtitle'    => esc_html__( 'Choose header background image for the 404 page', 'manual' ),
							'compiler' => 'true',
						),
						array(
							'id'       => 'manual_404page_background_color',
							'type'     => 'color_rgba',
							'title'    => esc_html__( 'Background Color', 'manual' ),
							'subtitle' => esc_html__( 'Effective when upload transparent (.png) image', 'manual' ),
							'default'  => array(
											'color' => '#f5f5f5',
										),
							'required' => array('404-page-header-background-img','!=',''),
						),
						array(
							'id'       => '404-header-background-position',
							'type'     => 'select',
							'title'    => esc_html__( 'Header Background Position', 'manual' ),
							'options'  => array(
								'center top' => esc_html__('Center Top','manual' ),
								'center center' => esc_html__('Center Center','manual' ),
								'center bottom' => esc_html__('Center Bottom','manual' ),
							),
							'default'  => 'center center',
							'required' => array('404-page-header-background-img','!=',''),
						),
						array(
								'id'       => '404-apply-nav-background',
								'type'     => 'checkbox',
								'title'    => esc_html__( 'Add Nav Background', 'manual' ),
								'default'  => '0',
								'subtitle' => esc_html__('If checked, transparent background will be added on header nav bar', 'manual' ),
								'desc'     => __('<strong style="color:blue;">Works ONLY...</strong> if "Main Menu Style ==  Transparent" <br>(Manual Options > Menu > Main Menu - Style > Main Menu - Style)', 'manual' ),
								'required' => array('404-page-header-background-img','!=',''),
						),
						array(
							'id'       => '404-apply-nav-border-btm',
							'type'     => 'checkbox',
							'title'    => esc_html__( 'Add Nav Border Bottom', 'manual' ),
							'default'  => '',
							'subtitle' => esc_html__('If checked, transparent border will be added on the header nav bar','manual' ),
							'required' => array('404-page-header-background-img','!=',''),
						),
						array(
							'id'       => '404-apply-nav-border-btm-color',
							'type'     => 'color_rgba',
							'title'    => esc_html__( 'Border Bottom Color', 'manual' ),
							'default'  => array(
								'color' => '#b0b0b0',
								'alpha' => '0.6'
							),
							'mode'     => 'background',
							'required' => array('404-apply-nav-border-btm','equals','1'),
						),
						array(
							'id'       => '404-header-opacity-uploadimage-global',
							'type'     => 'checkbox',
							'title'    => esc_html__( 'Apply Background Opacity For the Upload Image', 'manual' ),
							'default'  => '',
							'required' => array('404-page-header-background-img','!=',''),
						),
						array(
							'id'       => '404-lineargradient-first-color',
							'type'     => 'color_rgba',
							'title'    => esc_html__( 'Background Opacity Color', 'manual' ),
							'default'  => array(
											'color' => '#000000',
											'alpha' => '0.3'
										),
							'desc'     => esc_html__('Default: rgba(0, 0, 0, 0.3)','manual' ),
							'required' => array('404-header-opacity-uploadimage-global','equals','1'),
						),
						array(
							'id'       => '404-linear-gradient-second-color',
							'type'     => 'color_rgba',
							'title'    => esc_html__( 'Linear Gradient Background Opacity Color', 'manual' ),
							'required' => array('404-header-opacity-uploadimage-global','equals','1'),
						),
						// -------------- Color Controls --------------
						array(
							'id'       => '404page-color-settings',
							'type'     => 'section',
							'title'    => esc_html__( 'Color Control', 'manual' ),
							'indent'   => true, 
							'required' => array('404-page-header-background-img','!=',''), 
						),
						array(
							'id'       => '404page-title-color',
							'type'     => 'color',
							'title'    => esc_html__( 'Title Text Color', 'manual' ),
							'subtitle' => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
							'default'  => '#ffffff',
						),
						array(
							'id'       => '404page-link-color',
							'type'     => 'link_color',
							'title'    => esc_html__( 'Link Regular Color', 'manual' ),
							'active'   => false, 
							'visited'  => false, 
							'hover'    => false, 
							'default'  => array(
							'regular'  => '#f1f1f1',
							)
						),
	
			)
		) );
	
		// BLOG POST - SINGLE PAGE HEADER
	    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Blog Single Post', 'manual' ),
        'id'     => 'theme_blog_singlepg_section',
		'subsection'       => true,
        'fields' => array(
						array(
							'id'     => 'blog-header-singlepost-info',
							'type'   => 'info',
							'style'  => 'info',
							'notice' => false,
							'title'  => esc_html__( 'IMPORTANT NOTE', 'manual' ),
							'desc'   => __( '<br>This is just \'blog single post title bar\' control. For more \'blog single post page\' control please go to "Manual Options > Blog"', 'manual' )
						),
						// -------------- Page Title Bar Controls --------------
						array(
							'id'       => 'blog-header-height',
							'type'     => 'text',
							'title'    => esc_html__( 'Header Height', 'manual' ),
							'subtitle' => __( '\'Default - Theme Title Bar\' settings will be default. <b> Re-adjust ONLY if required </b>', 'manual' ),
							'desc'     => __('Example: 135px 0px 135px 0px (top, right, bottom, left) <br><br><strong style="color:#e6614b;">IMPORTANT: Make sure the value of RIGHT, LEFT is always 0px</strong>', 'manual' ),
							'default'  => '',
						),
						array(
							'id'       => 'blog-responsive-header-height',
							'type'     => 'text',
							'title'    => esc_html__( 'Re-adjust Responsive Header Height', 'manual' ),
							'subtitle' => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
							'desc'     => __( 'Example: 100px 0px 100px 0px (top, right, bottom, left) <br><br><strong style="color:#e6614b;">IMPORTANT: Make sure the value of RIGHT, LEFT is always 0px</strong>', 'manual' ), 
							'default'  => '',
						),
						array(
							'id'       => 'blog_single_post_display_search',
							'type'     => 'switch',
							'title'    => esc_html__('Search Box', 'manual' ),
							'subtitle' => esc_html__('Display search box on the header', 'manual'),
							'default'  => false,
							'on'       => esc_html__( 'Enable', 'manual' ),
							'off'      => esc_html__( 'Disable', 'manual' ),
						),
						array(
							'id'       => 'blog-single-searchbox-display-position',
							'type'     => 'select',
							'title'    => esc_html__( 'Search Box Display Column Layout', 'manual' ),
							'options'  => array(
								'center' => esc_html__('Exact Center','manual' ),
								'6'  => esc_html__('50% Width','manual' ),
								'7'  => esc_html__('58% Width','manual' ),
								'8'  => esc_html__('66% Width','manual' ),
								'9'  => esc_html__('75% Width','manual' ),
								'10' => esc_html__('83% Width','manual' ),
								'11' => esc_html__('91% Width','manual' ),
								'12' => esc_html__('100% Width','manual' ),
							),
							'default'  => 'center',
							'required' => array('blog_single_post_display_search','equals','1'),
						), 
						array(
							'id'       => 'blog_single_breadcrumb_on_header',
							'type'     => 'switch',
							'title'    => esc_html__( 'Breadcrumb', 'manual' ),
							'subtitle' => esc_html__('Display breadcrumb on the header', 'manual'),
							'default'  => true,
							'on'       => esc_html__( 'Enable', 'manual' ),
							'off'      => esc_html__( 'Disable', 'manual' ),
						),
						array(
							'id'         => 'blog-header-text-align',
							'type'       => 'select',
							'title'      => esc_html__( 'Header Text Align', 'manual' ),
							'options'    => array(
								'left'   => esc_html__('Left','manual' ),
								'center' => esc_html__('Center','manual' ),
								'right'  => esc_html__('Right','manual' ),
							),
							'default'    => 'center'
						),
						// -------------- Page Title Controls --------------
						array(
							'id'       => 'blog-header-bg-text-global',
							'type'     => 'section',
							'title'    => esc_html__( 'Title Text', 'manual' ),
							'indent'   => true, 
						),
						array(
							'id'       => 'blog_single_title_on_header',
							'type'     => 'switch',
							'title'    => esc_html__( 'Blog Title On The Header', 'manual' ),
							'subtitle' => esc_html__('Display title on the header bar', 'manual'),
							'default'  => true,
						),
						array(
								'id'       => 'blog_header_title_font_size',
								'type'     => 'text',
								'title'    => esc_html__( 'Font Size', 'manual' ),
								'desc'     => esc_html__('Example 30px', 'manual' ),
								'default'  => '',
								'subtitle' => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
								'required' => array('blog_single_title_on_header','equals',true),
						),
						array(
								'id'       => 'blog_header_title_line_height',
								'type'     => 'text',
								'title'    => esc_html__( 'Line Height', 'manual' ),
								'desc'     => esc_html__('Example 30px', 'manual' ),
								'default'  => '',
								'subtitle' => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
								'required' => array('blog_single_title_on_header','equals',true),
						),
						array(
								'id'       => 'blog_header_title_font_weight',
								'type'     => 'select',
								'title'    => esc_html__( 'Font Weight', 'manual' ),
								'options'  => array(
									'default' => esc_html__('Default','manual' ),
									'100' => esc_html__('100','manual' ),
									'200' => esc_html__('200','manual' ),
									'300' => esc_html__('300','manual' ),
									'400' => esc_html__('400','manual' ),
									'500' => esc_html__('500','manual' ),
									'600' => esc_html__('600','manual' ),
									'700' => esc_html__('700','manual' ),
									'800' => esc_html__('800','manual' ),
									'900' => esc_html__('900','manual' ),
								),
								'default'  => 'default',
								'subtitle' => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
								'required' => array('blog_single_title_on_header','equals',true),
						),
						// -------------- Page Title Bar Background Controls --------------	
						array(
							'id'       => 'blog-header-bg-background-settings',
							'type'     => 'section',
							'title'    => esc_html__( 'Background Image', 'manual' ),
							'indent'   => true, 
						),
						array(
							'id'       => 'blog_featured_image_on_the_header',
							'type'     => 'switch',
							'title'    => esc_html__( 'Featured Image On The Header', 'manual' ),
							'subtitle' => esc_html__('Display Featured Image on the header (will removed featured image from the post area)', 'manual'),
							'default'  => true,
						),
					    array(
							'id'       => 'blog-apply-nav-background',
							'type'     => 'checkbox',
							'title'    => esc_html__( 'Nav Background', 'manual' ),
							'default'  => '1',
							'subtitle' => esc_html__('If checked, transparent background will be added on header nav bar','manual' ),
							'desc'     => __('<strong style="color:blue;">Works ONLY...</strong> if "Main Menu Style ==  Transparent" <br>(Manual Options > Menu > Main Menu - Style > Main Menu - Style)','manual' ),
							'required' => array('blog_featured_image_on_the_header','equals',true), 
						),
						array(
							'id'       => 'blog-apply-nav-border-btm',
							'type'     => 'checkbox',
							'title'    => esc_html__( 'Add Nav Border Bottom', 'manual' ),
							'default'  => '',
							'subtitle' => esc_html__('If checked, transparent border will be added on the header nav bar', 'manual' ),
							'required' => array('blog_featured_image_on_the_header','equals',true),
						),
						array(
							'id'        => 'blog-apply-nav-border-btm-color',
							'type'      => 'color_rgba',
							'title'     => esc_html__( 'Border Bottom Color', 'manual' ),
							'default'   => array(
								'color' => '#b0b0b0',
								'alpha' => '0.6'
							),
							'mode'      => 'background',
							'required'  => array('blog-apply-nav-border-btm','equals','1'),
						),
						array(
							'id'       => 'blog-header-opacity-uploadimage-global',
							'type'     => 'checkbox',
							'title'    => esc_html__( 'Apply Background Opacity', 'manual' ),
							'default'  => '1',
							'required' => array('blog_featured_image_on_the_header','equals',true),
						),
						array(
							'id'       => 'blog-lineargradient-first-color',
							'type'     => 'color_rgba',
							'title'    => esc_html__( 'Background Opacity Color', 'manual' ),
							'default'  => array(
											'color' => '#000000',
											'alpha' => '0.3'
										),
							'desc'     => esc_html__('Default: rgba(0, 0, 0, 0.3)','manual' ),
							'required' => array('blog-header-opacity-uploadimage-global','equals','1'),
						),
						array(
							'id'       => 'blog-linear-gradient-second-color',
							'type'     => 'color_rgba',
							'title'    => esc_html__( 'Linear Gradient Background Opacity Color', 'manual' ),
							'required' => array('blog-header-opacity-uploadimage-global','equals','1'),
						),
						// -------------- Color Controls --------------
						array(
							'id'       => 'blog-singlepage-color-settings',
							'type'     => 'section',
							'title'    => esc_html__( 'Color Control', 'manual' ),
							'indent'   => true, 
							'required' => array('blog_featured_image_on_the_header','equals',true), 
						),
						array(
							'id'       => 'blog-singlepage-title-color',
							'type'     => 'color',
							'title'    => esc_html__( 'Title Text Color', 'manual' ),
							'subtitle' => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
							'default'  => '#ffffff',
						),
						array(
							'id'       => 'blog-singlepage-link-color',
							'type'     => 'link_color',
							'title'    => esc_html__( 'Link Regular Color', 'manual' ),
							'active'   => false, 
							'visited'  => false, 
							'hover'    => false, 
							'default'  => array(
							'regular'  => '#f1f1f1',
							)
						),
			  )
		) );
		
		// SEARCH PAGE
	    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Search Page', 'manual' ),
        'id'     => 'site_search_page_section',
		'subsection'       => true,
        'fields' => array(
						array(
							'id'     => 'search-headerpage-info',
							'type'   => 'info',
							'style'  => 'info',
							'notice' => false,
							'title'  => esc_html__( 'IMPORTANT NOTE', 'manual' ),
							'desc'   => __( '<br>This is just \'search page title bar\' control. For more \'search page\' control please go to "Manual Options > Search > Search Page"', 'manual' )
						),
						array(
							'id'       => 'onoff-search-page-title-bar',
							'type'     => 'switch',
							'title'    => esc_html__('Search Page Title Bar', 'manual' ),
							'desc' => __('<strong style="color:#e6614b;">IMPORTANT:</strong> Once disable, \'Search Page\' main menu style will auto switch to \'white header navigation style\'', 'manual'),
							'default'  => true,
							'on'       => esc_html__( 'Enable', 'manual' ),
							'off'      => esc_html__( 'Disable', 'manual' ),
						),
						// -------------- Page Title Bar Controls --------------
						array(
							'id'       => 'search-page-title-bar-controls',
							'type'     => 'section',
							'title'    => esc_html__( 'Controls', 'manual' ),
							'indent'   => true, 
							'required' => array('onoff-search-page-title-bar','equals','1'),  
						),
						array(
							'id'       => 'search-page-header-search-bar-status',
							'type'     => 'switch',
							'title'    => esc_html__( 'Search Box', 'manual' ),
							'default'  => true,
							'subtitle' => esc_html__('Display search box on the header', 'manual'),
							'on'       => esc_html__( 'Enable', 'manual' ),
							'off'      => esc_html__( 'Disable', 'manual' ),
						),
						array(
							'id'       => 'search-page-searchbox-display-position',
							'type'     => 'select',
							'title'    => esc_html__( 'Search Box Display Column Layout', 'manual' ),
							'options'  => array(
								'center' => esc_html__('Exact Center','manual' ),
								'6'  => esc_html__('50% Width','manual' ),
								'7'  => esc_html__('58% Width','manual' ),
								'8'  => esc_html__('66% Width','manual' ),
								'9'  => esc_html__('75% Width','manual' ),
								'10' => esc_html__('83% Width','manual' ),
								'11' => esc_html__( '91% Width','manual' ),
								'12' => esc_html__('100% Width','manual' ),
							),
							'default'  => 'center',
							'required' => array('search-page-header-search-bar-status','equals','1'),
						), 
						array(
							'id'       => 'search-header-height',
							'type'     => 'text',
							'title'    => esc_html__( 'Re-adjust Header Height', 'manual' ),
							'subtitle' => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
							'desc'     => __( 'Example: 120px 0px 120px 0px (top, right, bottom, left)<br><br><strong style="color:#e6614b;">IMPORTANT: Make sure the value of RIGHT, LEFT is always 0px</strong>', 'manual' ), 
							'default'  => '',
						),
						array(
							'id'       => 'search-responsive-header-height',
							'type'     => 'text',
							'title'    => esc_html__( 'Re-adjust Responsive Header Height', 'manual' ),
							'subtitle' => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
							'desc'     => __( 'Example: 100px 0px 100px 0px (top, right, bottom, left)<br><br><strong style="color:#e6614b;">IMPORTANT: Make sure the value of RIGHT, LEFT is always 0px</strong>', 'manual' ), 
							'default'  => '',
						),
						array(
							'id'       => 'search-header-text-align',
							'type'     => 'select',
							'title'    => esc_html__( 'Header Text Align', 'manual' ),
							'options'  => array(
								'left'   => esc_html__('Left','manual' ),
								'center' => esc_html__('Center','manual' ),
								'right'  => esc_html__('Right','manual' ),
							),
							'default'  => 'center'
						),
						// -------------- Page Title Controls --------------	
						array(
							'id'       => 'searchpage-bg-text-global',
							'type'     => 'section',
							'title'    => esc_html__( 'Title Text', 'manual' ),
							'indent'   => true, 
							'required' => array('onoff-search-page-title-bar','equals','1'),
						),
						array(
							'id'       => 'search-page-header-title',
							'type'     => 'text',
							'title'    => esc_html__( 'Title Text', 'manual' ),
							'subtitle' => esc_html__( 'Page title text', 'manual' ),
							'default'  => 'Search Results',
						),
						array(
							'id'       => 'search_page_header_title_font_size',
							'type'     => 'text',
							'title'    => esc_html__( 'Font Size', 'manual' ),
							'subtitle' => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
							'desc'     => esc_html__('Example 30px','manual' ),
							'default'  => '',
						),
						array(
							'id'       => 'search_page_header_title_line_height',
							'type'     => 'text',
							'title'    => esc_html__( 'Line Height', 'manual' ),
							'subtitle' => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
							'desc'     => esc_html__('Example 30px','manual' ),
							'default'  => '',
						),
						array(
							'id'       => 'search_page_header_title_font_weight',
							'type'     => 'select',
							'title'    => esc_html__( 'Font Weight', 'manual' ),
							'subtitle' => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
							'options'  => array(
								'default' => esc_html__('Default', 'manual' ),
								'100' => esc_html__('100', 'manual' ),
								'200' => esc_html__('200', 'manual' ),
								'300' => esc_html__('300', 'manual' ),
								'400' => esc_html__('400', 'manual' ),
								'500' => esc_html__('500', 'manual' ),
								'600' => esc_html__('600', 'manual' ),
								'700' => esc_html__('700', 'manual' ),
								'800' => esc_html__('800', 'manual' ),
								'900' => esc_html__('900', 'manual' ),
							),
							'default'  => 'default',
						),
						// -------------- Page Sub Title Controls --------------	
						array(
							'id'       => 'searchpage-subtext-text',
							'type'     => 'section',
							'title'    => esc_html__( 'Sub Title Text', 'manual' ),
							'indent'   => true, 
							'required' => array('onoff-search-page-title-bar','equals','1'),
						),
						array(
							'id'       => 'search-page-header-sub-title',
							'type'     => 'text',
							'title'    => esc_html__( 'Sub Title', 'manual' ),
							'subtitle' => esc_html__( 'Sub title text', 'manual' ),
							'default'  => 'your search of',
						),
						// -------------- Page Title Bar Background Controls --------------	
						array(
							'id'       => 'searchpage-bg-background-settings',
							'type'     => 'section',
							'title'    => esc_html__( 'Background Image', 'manual' ),
							'indent'   => true, 
							'required' => array('onoff-search-page-title-bar','equals','1'),
						),
						array(
							'id'       => 'search-page-header-background-img',
							'type'     => 'media',
							'url'      => false,
							'title'    => esc_html__( 'Background Image', 'manual' ),
							'compiler' => 'true',
							'subtitle' => esc_html__( 'Choose header background image for the search page', 'manual' ),
						),
						array(
							'id'       => 'manual_searchpage_background_color',
							'type'     => 'color_rgba',
							'title'    => esc_html__( 'Background Color', 'manual' ),
							'subtitle' => esc_html__( 'Effective when upload transparent (.png) image', 'manual' ),
							'default'  => array(
											'color' => '#f5f5f5',
										),
							'required' => array('search-page-header-background-img','!=',''),
						),
						array(
							'id'       => 'search-header-background-position',
							'type'     => 'select',
							'title'    => esc_html__( 'Header Background Position', 'manual' ),
							'options'  => array(
								'center top' => esc_html__('Center Top','manual' ),
								'center center' => esc_html__('Center Center','manual' ),
								'center bottom' => esc_html__('Center Bottom','manual' ),
							),
							'default'  => 'center center',
							'required' => array('search-page-header-background-img','!=',''),
						),
						array(
								'id'       => 'search-apply-nav-background',
								'type'     => 'checkbox',
								'title'    => esc_html__( 'Add Nav Background', 'manual' ),
								'default'  => '0',
								'subtitle' => esc_html__('If checked, transparent background will be added on header nav bar','manual' ),
								'desc'     => __('<strong style="color:blue;">Works ONLY...</strong> if "Main Menu Style ==  Transparent" <br>(Manual Options > Menu > Main Menu - Style > Main Menu - Style)', 'manual' ),
								'required' => array('search-page-header-background-img','!=',''),
						),
						array(
							'id'       => 'search-header-apply-nav-border-btm',
							'type'     => 'checkbox',
							'title'    => esc_html__( 'Add Nav Border Bottom', 'manual' ),
							'default'  => '',
							'subtitle' => esc_html__( 'If checked, transparent border will be added on the header nav bar', 'manual' ),
							'required' => array('search-page-header-background-img','!=',''),
						),
						array(
							'id'       => 'search-header-apply-nav-border-btm-color',
							'type'     => 'color_rgba',
							'title'    => esc_html__( 'Border Bottom Color', 'manual' ),
							'default'  => array(
								'color' => '#b0b0b0',
								'alpha' => '0.6'
							),
							'mode'     => 'background',
							'required' => array('search-header-apply-nav-border-btm','equals','1'),
						),
						array(
							'id'       => 'search-header-opacity-uploadimage-global',
							'type'     => 'checkbox',
							'title'    => esc_html__( 'Apply Background Opacity For the Upload Image', 'manual' ),
							'default'  => '',
							'required' => array('search-page-header-background-img','!=',''),
						),
						array(
							'id'       => 'search-header-lineargradient-first-color',
							'type'     => 'color_rgba',
							'title'    => esc_html__( 'Background Opacity Color', 'manual' ),
							'default'  => array(
											'color' => '#000000',
											'alpha' => '0.3'
										),
							'desc' => esc_html__('Default: rgba(0, 0, 0, 0.3)','manual' ),
							'required' => array('search-header-opacity-uploadimage-global','equals','1'),
						),
						array(
							'id'       => 'search-header-linear-gradient-second-color',
							'type'     => 'color_rgba',
							'title'    => esc_html__( 'Linear Gradient Background Opacity Color', 'manual' ),
							'required' => array('search-header-opacity-uploadimage-global','equals','1'),
						),	
						// -------------- Color Controls --------------
						array(
							'id'       => 'searchpage-header-color-settings',
							'type'     => 'section',
							'title'    => esc_html__( 'Color Control', 'manual' ),
							'indent'   => true, 
							'required' => array( 
									array('search-page-header-background-img','!=',''), 
									array('onoff-search-page-title-bar','equals','1')
							   ),
						),
						array(
							'id'       => 'search-pageheader-title-color',
							'type'     => 'color',
							'title'    => esc_html__( 'Title Text Color', 'manual' ),
							'subtitle' => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
							'default'  => '#ffffff',
						),
						array(
							'id'       => 'search-pageheader-link-color',
							'type'     => 'link_color',
							'title'    => esc_html__( 'Link Regular Color', 'manual' ),
							'active'   => false, 
							'visited'  => false, 
							'hover'    => false, 
							'default'  => array(
							'regular'  => '#f1f1f1',
							)
						),
									
				  )
		) );
		
		if(class_exists( 'LearnPress' )) {
			// LEARNPRESS SINGLE PAGE PAGE TILE BAR
			Redux::setSection( $opt_name, array(
				'title'            => esc_html__( 'LearnPress - Single Page', 'manual' ),
				'id'               => 'learnpress_custom_singlepg_header',
				'subsection'       => true,
				'customizer_width' => '450px',
				'fields'           => array(
										array(
											'id'       => 'onoff-learnpress-single-page-title-bar',
											'type'     => 'switch',
											'title'    => esc_html__('Single Page Title Bar', 'manual' ),
											'desc' => __('<strong style="color:#e6614b;">IMPORTANT:</strong> Once disable, \'LearnPress - Single Page\' main menu style will auto switch to \'white header navigation style\'', 'manual'),
											'default'  => true,
											'on'       => esc_html__( 'Enable', 'manual' ),
											'off'      => esc_html__( 'Disable', 'manual' ),
										),	
										// -------------- Page Title Bar Controls --------------
										array(
											'id'       => 'learnpress-single-page-title-bar-controls',
											'type'     => 'section',
											'title'    => esc_html__( 'Controls', 'manual' ),
											'indent'   => true, 
											'required' => array('onoff-learnpress-single-page-title-bar','equals','1'),  
										),
										array(
											'id'       => 'learnpress-single-pg-title-text-status',
											'type'     => 'switch',
											'title'    => esc_html__( 'Header Title Text', 'manual' ),
											'default'  => true,
											'subtitle' => esc_html__( 'Enable/Disable header title text', 'manual' ),
											'on' => esc_html__( 'Enable', 'manual' ),
											'off' => esc_html__( 'Disable', 'manual' ),
										),
										array(
											'id'       => 'learnpress-single-pg-header-search-status',
											'type'     => 'switch',
											'title'    => esc_html__( 'Search Box', 'manual' ),
											'default'  => false,
											'subtitle' => esc_html__( 'Display search box on the header', 'manual' ),
											'on' => esc_html__( 'Enable', 'manual' ),
											'off' => esc_html__( 'Disable', 'manual' ),
										),
										array(
											'id'       => 'learnpress-searchbox-display-position',
											'type'     => 'select',
											'title'    => esc_html__( 'Search Box Display Column Layout', 'manual' ),
											'options'  => array(
												'center' => esc_html__('Exact Center', 'manual' ),
												'6' => esc_html__('50% Width', 'manual' ),
												'7' => esc_html__('58% Width', 'manual' ),
												'8' => esc_html__('66% Width', 'manual' ),
												'9' => esc_html__('75% Width', 'manual' ),
												'10' => esc_html__('83% Width', 'manual' ),
												'11' => esc_html__('91% Width', 'manual' ),
												'12' => esc_html__('100% Width', 'manual' ),
											),
											'default'  => 'center',
											'required' => array('learnpress-single-pg-header-search-status','equals','1'),
										),
										array(
											'id'       => 'learnpress-single-pg-header-breadcrumb-status',
											'type'     => 'switch',
											'title'    => esc_html__( 'Breadcrumb', 'manual' ),
											'default'  => true,
											'subtitle' => esc_html__( 'Enable/Disable Breadcrumb on the single KB page', 'manual' ),
											'on' => esc_html__( 'Enable', 'manual' ),
											'off' => esc_html__( 'Disable', 'manual' ),
										),
										array(
											'id'       => 'learnpress-singlepg-text-align',
											'type'     => 'select',
											'title'    => esc_html__( 'Header Text Align', 'manual' ),
											'options'  => array(
												'center' => esc_html__('Center','manual' ),
												'left' => esc_html__('Left','manual' ),
												'right' => esc_html__('Right','manual' ),
											),
											'default'  => 'left',
										),
										array(
											'id'       => 'learnpress-singlepg-header-height',
											'type'     => 'text',
											'title'    => esc_html__( 'Header Height', 'manual' ),
											'subtitle'    => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
											'desc' => __('Example: 132px 0px 32px 0px (top, right, bottom, left) <br><br><strong style="color:#e6614b;">IMPORTANT: Make sure the value of RIGHT, LEFT is always 0px</strong>', 'manual' ),
											'default'  => '',
										),
										array(
											'id'       => 'learnpress-responsive-singlepg-header-height',
											'type'     => 'text',
											'title'    => esc_html__( 'Re-adjust Responsive Header Height', 'manual' ),
											'subtitle' => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
											'desc'     => __( 'Example: 100px 0px 100px 0px (top, right, bottom, left)<br><br><strong style="color:#e6614b;">IMPORTANT: Make sure the value of RIGHT, LEFT is always 0px</strong>', 'manual' ), 
											'default'  => '',
										),
										// -------------- Page Title Controls --------------
										array(
											'id'       => 'learnpress-singlepg-header-bg-text-global',
											'type'     => 'section',
											'title'    => esc_html__( 'Title Text', 'manual' ),
											'indent'   => true, 
											'required' => array( array('onoff-learnpress-single-page-title-bar','equals','1'),
																 array('learnpress-single-pg-title-text-status','=',true)
																), 
										),
										array(
											'id'       => 'learnpress_singlepg_header_title_font_size',
											'type'     => 'text',
											'title'    => esc_html__( 'Font Size', 'manual' ),
											'desc'     => esc_html__('Example 30px','manual' ),
											'default'  => '',
											'subtitle'    => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
										),
										array(
											'id'       => 'learnpress_singlepg_header_title_line_height',
											'type'     => 'text',
											'title'    => esc_html__( 'Line Height', 'manual' ),
											'desc'     => esc_html__('Example 30px','manual' ),
											'default'  => '',
											'subtitle'    => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
										),
										array(
											'id'       => 'learnpress_singlepg_header_title_font_weight',
											'type'     => 'select',
											'title'    => esc_html__( 'Font Weight', 'manual' ),
											'options'  => array(
												'default' => esc_html__('Default','manual' ),
												'100' => esc_html__('100','manual' ),
												'200' => esc_html__('200','manual' ),
												'300' => esc_html__('300','manual' ),
												'400' => esc_html__('400','manual' ),
												'500' => esc_html__('500','manual' ),
												'600' => esc_html__('600','manual' ),
												'700' => esc_html__('700','manual' ),
												'800' => esc_html__('800','manual' ),
												'900' => esc_html__('900','manual' ),
											),
											'default'  => 'default',
											'subtitle'    => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
										),
										// -------------- Page Title Bar Background Controls --------------
										array(
											'id'       => 'learnpress-singlepg-header-bg-section-global',
											'type'     => 'section',
											'title'    => esc_html__( 'Background Image', 'manual' ),
											'indent'   => true, 
											'required' => array('onoff-learnpress-single-page-title-bar','equals','1'), 
										),
										array(
											'id'       => 'learnpress_featured_image_on_the_header',
											'type'     => 'switch',
											'title'    => esc_html__( 'Featured Image On The Header', 'manual' ),
											'subtitle' => esc_html__('Display Featured Image on the header', 'manual'),
											'default'  => true,
										),
										array(
											'id'       => 'learnpress-apply-nav-background',
											'type'     => 'checkbox',
											'title'    => esc_html__( 'Nav Background', 'manual' ),
											'default'  => '1',
											'subtitle' => esc_html__('If checked, transparent background will be added on header nav bar','manual' ),
											'desc'     => __('<strong style="color:blue;">Works ONLY...</strong> if "Main Menu Style ==  Transparent" <br>(Manual Options > Menu > Main Menu - Style > Main Menu - Style)','manual' ),
											'required' => array('learnpress_featured_image_on_the_header','equals',true), 
										),
										array(
											'id'       => 'learnpress-apply-nav-border-btm',
											'type'     => 'checkbox',
											'title'    => esc_html__( 'Add Nav Border Bottom', 'manual' ),
											'default'  => '',
											'subtitle' => esc_html__('If checked, transparent border will be added on the header nav bar', 'manual' ),
											'required' => array('learnpress_featured_image_on_the_header','equals',true),
										),
										array(
											'id'        => 'learnpress-apply-nav-border-btm-color',
											'type'      => 'color_rgba',
											'title'     => esc_html__( 'Border Bottom Color', 'manual' ),
											'default'   => array(
												'color' => '#b0b0b0',
												'alpha' => '0.6'
											),
											'mode'      => 'background',
											'required'  => array('learnpress-apply-nav-border-btm','equals','1'),
										),
										array(
											'id'       => 'learnpress-header-opacity-uploadimage-global',
											'type'     => 'checkbox',
											'title'    => esc_html__( 'Apply Background Opacity', 'manual' ),
											'default'  => '1',
											'required' => array('learnpress_featured_image_on_the_header','equals',true),
										),
										array(
											'id'       => 'learnpress-lineargradient-first-color',
											'type'     => 'color_rgba',
											'title'    => esc_html__( 'Background Opacity Color', 'manual' ),
											'default'  => array(
															'color' => '#000000',
															'alpha' => '0.3'
														),
											'desc'     => esc_html__('Default: rgba(0, 0, 0, 0.3)','manual' ),
											'required' => array('learnpress-header-opacity-uploadimage-global','equals','1'),
										),
										array(
											'id'       => 'learnpress-linear-gradient-second-color',
											'type'     => 'color_rgba',
											'title'    => esc_html__( 'Linear Gradient Background Opacity Color', 'manual' ),
											'required' => array('learnpress-header-opacity-uploadimage-global','equals','1'),
										),
										// -------------- Color Controls --------------
										array(
											'id'       => 'learnpress-singlepage-color-settings',
											'type'     => 'section',
											'title'    => esc_html__( 'Color Control', 'manual' ),
											'indent'   => true, 
											'required' => array( array('onoff-learnpress-single-page-title-bar','equals','1'),
																 array('learnpress_featured_image_on_the_header','equals',true)
																),  
										),
										array(
											'id'       => 'learnpress-singlepage-title-color',
											'type'     => 'color',
											'title'    => esc_html__( 'Title Text Color', 'manual' ),
											'subtitle' => esc_html__( '\'Default - Theme Title Bar\' settings will be default. Re-adjust ONLY if required', 'manual' ),
											'default'  => '#ffffff',
										),
										array(
											'id'       => 'learnpress-singlepage-link-color',
											'type'     => 'link_color',
											'title'    => esc_html__( 'Link Regular Color', 'manual' ),
											'active'   => false, 
											'visited'  => false, 
											'hover'    => false, 
											'default'  => array(
											'regular'  => '#f1f1f1',
											)
										),
							  )
			) );
		}
		
		
		// DISPLAY SEARCH BOX ON THE TITLE BAR BASED ON TARGATED POST TYPE
		Redux::setSection( $opt_name, array(
				'title'  => esc_html__( 'Post Type Target - Search Box', 'manual' ),
				'id'     => 'manual-theme-header-search-display',
				'subsection'       => true,
				'fields' => array(
								array(
									'id'    => 'target-search-bar-display-on-the-header-info',
									'type'  => 'info',
									'style' => 'info',
									'notice' => false,
									'title' => esc_html__( 'IMPORTANT NOTE', 'manual' ),
									'desc'  => __('<br>If you are planning to display <strong>live search box on the page title bar, on any custom post type EXCEPT,</strong> post type: knowledgebase, FAQ, Documenation etc.. provided by the theme then, you can use this section.', 'manual'),
								),
								array(
									'id'       => 'activate-search-bar-on-the-header',
									'type'     => 'switch',
									'title'    => esc_html__( 'Activate Search Box', 'manual' ),
									'default'  => false,
									'subtitle' => esc_html__('On activation, the search box will appear on the header bar.', 'manual' ),
								), 
								array(
									'id'       => 'target-search-bar-display-on-the-header',
									'type'     => 'select',
									'data'     => 'post_type',
									'multi'    => true,
									'sortable' => true,
									'title'    => esc_html__( 'Target Search Box Display', 'manual' ),
									'subtitle' => esc_html__( 'Targer Search Box Display to the selected post type', 'manual' ),
									'default'  => '',
									'required' => array('activate-search-bar-on-the-header','equals',true),
								),	
				)
		) );


/*************************************
*******  START - FOOTER SECTION  *****
**************************************/

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Footer', 'manual' ),
        'id'               => 'theme-footer',
        'customizer_width' => '400px',
        'icon'             => 'el el-arrow-down'
    ) );
	
	// Footer Style
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Footer Styling', 'manual' ),
        'id'               => 'footer-design-type-settings',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
									
				array(
					'id'       => 'theme-footer-type',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Footer Style Type', 'manual' ),
					'subtitle' => esc_html__( 'Settings will effect globally', 'manual' ),
					'options'  => array(
						'1' => array( 'img' => trailingslashit(get_template_directory_uri()) .'framework/ReduxCore/manual/footer1.jpg' ),
						'2' => array( 'img' => trailingslashit(get_template_directory_uri()) .'framework/ReduxCore/manual/footer2.jpg' ),
					),
					'default'  => '2',
				),	
				
				array(
					'id'       => 'footer-social-copyright-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Footer Area', 'manual' ),
					'default'  => false,
					'required' => array('theme-footer-type','equals','2'),
					'subtitle' => esc_html__( 'This section includes social section and menu plus copyright section', 'manual' ),
					'on' => esc_html__( 'Disable', 'manual' ),
					'off' => esc_html__( 'Enable', 'manual' ),
				),
				
				array(
					'id'       => 'footer-disable-copyright-section',
					'type'     => 'switch',
					'title'    => esc_html__( 'Menu + Copyright Section', 'manual' ),
					'default'  => false,
					'required' => array( 
									array('theme-footer-type','equals','2'),
									array('footer-social-copyright-status','equals','0')
							   ),
					'subtitle' => esc_html__( 'This section includes menu links and copyright text', 'manual' ),
					'on' => esc_html__( 'Disable', 'manual' ),
					'off' => esc_html__( 'Enable', 'manual' ),
				),
				
				array(
					'id'       => 'footer-disable-social-icons',
					'type'     => 'switch',
					'title'    => esc_html__( 'Social Icons', 'manual' ),
					'subtitle' => esc_html__( 'Make your visitors find you socially', 'manual' ),
					'default'  => true,
					'required' => array( 
									array('theme-footer-type','equals','2'),
									array('footer-social-copyright-status','equals','0')
							   ),
					'on' => esc_html__( 'Disable', 'manual' ),
					'off' => esc_html__( 'Enable', 'manual' ),
				),
				
				// FOOTER WIDGET AREA
				array(
					'id'       => 'footer_widget_extra_settings',
					'type'     => 'section',
					'title'    => esc_html__( 'Widget Area', 'manual' ),
					'indent'   => true,
					'required' => array('theme-footer-type','equals','2'),
				),
				
				array(
					'id'       => 'footer-widget-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Widget Area', 'manual' ),
					'subtitle' => esc_html__( 'Control your widget area display', 'manual' ),
					'default'  => false,
					'required' => array('theme-footer-type','equals','2'),
					'on' => esc_html__( 'Disable', 'manual' ),
					'off' => esc_html__( 'Enable', 'manual' ),
				),
				
				array(
					'id'            => 'theme_footer_noof_section_widget_area',
					'type'          => 'slider',
					'title'         => esc_html__( 'Number of Footer Columns', 'manual' ),
					'subtitle'      => esc_html__( 'Control number of widget blocks you like to display.', 'manual' ),
					'default'       => 4,
					'min'           => 1,
					'step'          => 1,
					'max'           => 4,
					'display_value' => 'label',
					'display_value' => 'text',
					'required' => array('footer-widget-status','equals',false),
				),
				
				array(
					'id'    => 'info_warning',
					'type'  => 'info',
					'title' => esc_html__('IMPORTANT! Adjust, \'Widget Area\' based to the \'Number of Footer Columns\' chosen above', 'manual'),
					'style' => 'critical',
					'desc'  => __('<br>1. If selected \'Footer Columns\' == 4, the <strong>total sum (Block One + Block Two + Block Three + Block Four)</strong> must be equal to 12<br> 2. If selected \'Footer Columns\' == 3, the <strong>total sum (Block One + Block Two + Block Three )</strong> must be equal to 12 <br> 3. If selected \'Footer Columns\' == 2, the <strong>total sum (Block One + Block Two)</strong> must be equal to 12 <br> 4. If selected \'Footer Columns\' == 1, the <strong>Block One</strong> value must be 12', 'manual'),					
					'required' => array('footer-widget-status','equals',false),
				),
				
				array(
					'id'            => 'footer_one_widget_column',
					'type'          => 'slider',
					'title'         => esc_html__( 'Widget Block One', 'manual' ),
					'default'       => 3,
					'min'           => 0,
					'step'          => 1,
					'max'           => 12,
					'display_value' => 'label',
					'display_value' => 'text',
					'required' => array('footer-widget-status','equals',false),
				),
				
				array(
					'id'            => 'footer_two_widget_column',
					'type'          => 'slider',
					'title'         => esc_html__( 'Widget Block Two', 'manual' ),
					'default'       => 3,
					'min'           => 0,
					'step'          => 1,
					'max'           => 12,
					'display_value' => 'label',
					'display_value' => 'text',
					'required' => array('footer-widget-status','equals',false),
				),
			
				array(
					'id'            => 'footer_three_widget_column',
					'type'          => 'slider',
					'title'         => esc_html__( 'Widget Block Three', 'manual' ),
					'default'       => 3,
					'min'           => 0,
					'step'          => 1,
					'max'           => 12,
					'display_value' => 'label',
					'display_value' => 'text',
					'required' => array('footer-widget-status','equals',false),
				),
			
				array(
					'id'            => 'footer_four_widget_column',
					'type'          => 'slider',
					'title'         => esc_html__( 'Widget Block Four', 'manual' ),
					'default'       => 3,
					'min'           => 0,
					'step'          => 1,
					'max'           => 12,
					'display_value' => 'label',
					'display_value' => 'text',
					'required' => array('footer-widget-status','equals',false),
				),
									
	  )
    ) );
	
	// FOOTER Design Control
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Footer Design Control', 'manual' ),
		'id'     => 'manual-theme-footer-style',
		'subsection'  => true,
		'fields' => array(
		
			array(
				'id'       => 'theme_footer_title_tag',
				'type'     => 'select',
				'title'    => esc_html__( 'Title Tag', 'manual' ),
				'options'  => array(
					'h4' => esc_html__('h4','manual' ),
					'h5' => esc_html__('h5','manual' ),
					'h6' => esc_html__('h6','manual' ),
				),
				'default'  => 'h5', 
			),
			
			array(
                'id'       => 'theme_footer_widget_bg_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Background Color', 'manual' ),
                'default'  => '#101010',
            ),
			
			array(
				'id'       => 'theme_footer_widget_bg_image',
				'type'     => 'media',
				'title'    => esc_html__( 'Background Image', 'manual' ),
				'url' => false,
				'subtitle' => esc_html__('Choose background image for the footer section', 'manual'),
			),
			
			array(
				'id'       => 'theme_footer_widget_bg_image_position',
				'type'     => 'select',
				'title'    => esc_html__( 'Background Image Position', 'manual' ),
				'options'  => array(
					'center top' => esc_html__('Center Top','manual'),
					'center center' => esc_html__('Center Center','manual'),
					'center bottom' => esc_html__('Center Bottom','manual'),
				),
				'default'  => 'center center',
				'required' => array('theme_footer_widget_bg_image','!=',''),  
			),
			
			array(
				'id'       => 'theme_footer_widget_bg_image_opacity_apply',
				'type'     => 'checkbox',
				'title'    => esc_html__( 'Apply Background Opacity For the Upload Image', 'manual' ),
				'default'  => '0',
				'required' => array('theme_footer_widget_bg_image','!=',''),
			),
			
			array(
				'id'       => 'theme_footer_widget_bg_image_opacity_first_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Background Opacity Color', 'manual' ),
				'default'  => array(
								'color' => '#000000',
								'alpha' => '0.3'
							),
				'desc' => esc_html__('Default: rgba(0, 0, 0, 0.3)','manual' ),
				'required' => array('theme_footer_widget_bg_image_opacity_apply','equals','1'),
			),
			
			array(
                'id'       => 'theme_footer_widget_title_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Widget Title Color', 'manual' ),
                'default'  => '#DDDDDD',
            ),
			
			array(
                'id'       => 'theme_footer_widget_text_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Widget Text Color', 'manual' ),
                'default'  => '#919191',
            ),
			
			array(
                'id'       => 'theme_footer_widget_text_link_color',
                'type'     => 'link_color',
                'title'    => esc_html__( 'Link Color', 'manual' ),
                'active'    => false, 
                'visited'   => false, 
                'default'  => array(
                    'regular' => '#919191',
                    'hover'   => '#BEBCBC',
                    'active'  => '#ccc',
                )
            ),
			
			array(
                'id'       => 'theme_footer_social_redesign_start',
                'type'     => 'section',
                'title'    => esc_html__( 'Design Footer Social/Copyright Area', 'manual' ),
                'indent'   => true, 
            ),
			
			array(
                'id'       => 'theme_footer_social_bg_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Background Color', 'manual' ),
                'default'  => '#080808',
            ),
			
			array(
                'id'       => 'theme_footer_social_text_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Text Color', 'manual' ),
                'default'  => '#828282',
            ),
			
			array(
                'id'       => 'theme_footer_social_link_color',
                'type'     => 'link_color',
                'title'    => esc_html__( 'Link Color', 'manual' ),
                'active'    => false, 
                'visited'   => false, 
                'default'  => array(
                    'regular' => '#9E9D9D',
                    'hover'   => '#C4C4C4',
                    'active'  => '#ccc',
                )
            ),	
			
			array(
                'id'       => 'theme_footer_social_icon_link_color',
                'type'     => 'link_color',
                'title'    => esc_html__( 'Icon Link Color', 'manual' ),
                'active'    => false, 
                'visited'   => false, 
                'default'  => array(
                    'regular' => '#7E7E7E',
                    'hover'   => '#FFFFFF',
                    'active'  => '#ccc',
                )
            ),			
		
			)
		) );

	// Social Icons
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Social Icons', 'manual' ),
        'id'               => 'footer-copyright-social-bar',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
			array(
                'id'       => 'footer-social-facebook',
                'type'     => 'text',
                'title'    => esc_html__( 'Facebook URL', 'manual' ),
            ),
			
			array(
                'id'       => 'footer-social-twitter',
                'type'     => 'text',
                'title'    => esc_html__( 'Twitter URL', 'manual' ),
            ),
			
			array(
                'id'       => 'footer-social-youtube',
                'type'     => 'text',
                'title'    => esc_html__( 'Youtube URL', 'manual' ),
            ),
			
			array(
                'id'       => 'footer-social-google',
                'type'     => 'text',
                'title'    => esc_html__( 'Google URL', 'manual' ),
            ),
			
			array(
                'id'       => 'footer-social-instagram',
                'type'     => 'text',
                'title'    => esc_html__( 'Instagram URL', 'manual' ),
            ),
			
			array(
                'id'       => 'footer-social-linkedin',
                'type'     => 'text',
                'title'    => esc_html__( 'Linkedin URL', 'manual' ),
            ),
			
			array(
                'id'       => 'footer-social-pinterest',
                'type'     => 'text',
                'title'    => esc_html__( 'Pinterest URL', 'manual' ),
            ),
			
			array(
                'id'       => 'footer-social-vimo',
                'type'     => 'text',
                'title'    => esc_html__( 'vimo URL', 'manual' ),
            ),
			
			array(
                'id'       => 'footer-social-tumblr',
                'type'     => 'text',
                'title'    => esc_html__( 'Tumblr URL', 'manual' ),
            ),
			
			array(
                'id'       => 'footer-social-whatsapp',
                'type'     => 'text',
                'title'    => esc_html__( 'WhatsApp URL', 'manual' ),
            ),
			
        )
    ) );




/**********************************************
*******  START  SEARCH       *****
***********************************************/

	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Search', 'manual' ),
        'id'               => 'theme_search_section',
        'customizer_width' => '400px',
        'icon'             => 'el el-search-alt'
    ) );

	// SEARCH BOX STYLE
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Search Box Design', 'manual' ),
		'id'     => 'theme-search-box-style',
		'subsection'  => true,
		'fields' => array(
						  
						  
				array(
					'id'    => 'manual-live-search-design-info',
					'type'  => 'info',
					'style' => 'info',
					'notice' => false,
					'title' => esc_html__( 'IMPORTANT NOTE', 'manual' ),
					'desc'  => __( '<br>Below design settings just control search box that appear <strong>inside \'Page Title Bar\'</strong> section.', 'manual' )
				),			  
						  
				array(
					'id'       => 'manual-live-search-design-style',
					'type'     => 'select',
					'title'    => esc_html__( 'Design Style', 'manual' ),
					'subtitle' => esc_html__( 'Select live search box design style', 'manual' ),
					'options'  => array(
						'1' => esc_html__('Style 1','manual' ),
						'2' => esc_html__('Style 2','manual' ),
					),
					'default'  => '1'
				),	
				
				array(
					'id'       => 'manual-live-search-icon-bouncein',
					'type'     => 'switch',
					'title'    => esc_html__( 'Search Icon BounceIn', 'manual' ),
					'subtitle' => esc_html__('Icon BounceIn CSS effect', 'manual'),
					'default'  => false,
					'on' => esc_html__( 'Enable', 'manual' ),
					'off' => esc_html__( 'Disable', 'manual' ),
				),	
				
				array(
					'id'       => 'theme_search_box_search_bottom',
					'type'     => 'switch',
					'title'    => esc_html__( 'Submit Buttom', 'manual' ),
					'default'  => false,
					'on' => esc_html__( 'Disable', 'manual' ),
					'off' => esc_html__( 'Enable', 'manual' ),
					'subtitle' => esc_html__('Choose whether you can to show/hide submit button', 'manual'),
				),
				
				array(
					'id'       => 'manual-live-search-design-otherdesign-settings',
					'type'     => 'section',
					'title'    => esc_html__( 'Search Box Settings', 'manual' ),
					'indent'   => true, 
				),
				
				array(
					'id'            => 'theme_search_box_radius',
					'type'          => 'slider',
					'title'         => esc_html__( 'Search Box Radius', 'manual' ),
					'default'       => 4,
					'min'           => 1,
					'step'          => 1,
					'max'           => 45,
					'display_value' => 'label',
					'subtitle' => esc_html__( 'Default: 4px', 'manual' ),
					'display_value' => 'text',
				),
		
				array(
					'id'       => 'theme_search_box_border_color',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Box Border Color', 'manual' ),
					'default'  => array(
						'color' => '#E9E9E9',
						'alpha' => '0.9'
					),
					'mode'     => 'background',
				),
				 
				 array(
					'id'       => 'theme_search_box_icon_color',
					'type'     => 'color',
					'title'    => esc_html__( 'Search Icon Color', 'manual' ),
					'default'  => '#47c494',
					'transparent' => false,
				 ),
				 
				 array(
					'id'       => 'theme_search_box_placeholder_text_color',
					'type'     => 'color',
					'title'    => esc_html__( 'Placeholder Text Color', 'manual' ),
					'default'  => '#888888',
					'transparent' => false,
				 ), 
				 
				  array(
					'id'       => 'manual-live-search-box-shadow-input-box',
					'type'     => 'switch',
					'title'    => esc_html__( 'Box Shadow', 'manual' ),
					'subtitle' => esc_html__('Apply Box Shadow', 'manual'),
					'default'  => false,
					'on' => esc_html__( 'Enable', 'manual' ),
					'off' => esc_html__( 'Disable', 'manual' ),
				 ),
				 
				 array(
					'id'       => 'manual-live-search-transparent-input-box',
					'type'     => 'switch',
					'title'    => esc_html__( 'Transparent Box', 'manual' ),
					'subtitle' => esc_html__('Make text box transparent', 'manual'),
					'default'  => false,
					'on' => esc_html__( 'Enable', 'manual' ),
					'off' => esc_html__( 'Disable', 'manual' ),
				 ),
				 
				 array(
					'id'       => 'manual-live-search-transparent-bg-color',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Transparent Background Color', 'manual' ),
					'default'  => array(
						'color' => '#ffffff',
						'alpha' => '0.18'
					),
					'mode'     => 'background',
					'required' => array('manual-live-search-transparent-input-box','equals','1'),
				),
				 
				array(
					'id'       => 'manual-live-search-transparent-input-box-textcolor',
					'type'     => 'color',
					'title'    => esc_html__( 'Transparent Box Text Color', 'manual' ),
					'subtitle'    => esc_html__( 'Works then cursor is focusout', 'manual' ),
					'default'  => '#888888',
					'transparent' => false, 
					'required' => array('manual-live-search-transparent-input-box','equals','1'),
				 ),
				
				array(
					'id'       => 'manual-live-search-design-text-settings',
					'type'     => 'section',
					'title'    => esc_html__( 'Search Box Text Settings', 'manual' ),
					'indent'   => true, 
				),
				
				array(
					'id'            => 'theme_search_btm_font_size',
					'type'          => 'slider',
					'title'         => esc_html__( 'Search Button Font Size', 'manual' ),
					'default'       => 14,
					'min'           => 10,
					'step'          => 1,
					'max'           => 18,
					'display_value' => 'label',
					'subtitle' => esc_html__( 'Default: 14px', 'manual' ),
					'display_value' => 'text',
					'required' => array('manual-live-search-design-style','equals','2'), 
				),
				
				array(
					'id'            => 'theme_search_font_size',
					'type'          => 'slider',
					'title'         => esc_html__( 'Font Size', 'manual' ),
					'default'       => 17,
					'min'           => 1,
					'step'          => 1,
					'max'           => 30,
					'display_value' => 'label',
					'subtitle' => esc_html__( 'Default: 17px', 'manual' ),
					'display_value' => 'text',
				),
				
				
				array(
					'id'       => 'theme_search_font_weight',
					'type'     => 'select',
					'title'    => esc_html__( 'Font Weight', 'manual' ),
					'options'  => array(
						'100' => esc_html__( '100','manual' ),
						'200' => esc_html__( '200','manual' ),
						'300' => esc_html__( '300','manual' ),
						'400' => esc_html__( '400','manual' ),
						'500' => esc_html__( '500','manual' ),
						'600' => esc_html__( '600','manual' ),
						'700' => esc_html__( '700','manual' ),
						'800' => esc_html__( '800','manual' ),
						'900' => esc_html__( '900','manual' ),
					),
					'default'  => '500',
					'subtitle' => esc_html__('Default: 500','manual' ),
				),
		
		)
		) );
		
	// LIVE SEARCH
	Redux::setSection( $opt_name, array(
        'title'        => esc_html__( 'Live Search', 'manual' ),
        'id'           => 'theme_live_search_section',
		'subsection'   => true,
        'fields' => array(
						  
				array(
					'id'       => 'manual-live-search-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Live Search', 'manual' ),
					'subtitle' => esc_html__('Globally enable/disable live search', 'manual'),
					'default'  => true,
					'on' => esc_html__( 'Enable', 'manual' ),
					'off' => esc_html__( 'Disable', 'manual' ),
				),
				
				array(
					'id'       => 'manual-live-search-post-navigation-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Post Navigation/Breadcrumb inside Live Search', 'manual' ),
					'subtitle' => __('Live search will display post Navigation for the; Post, FAQ, Documenation & Knowledge Base', 'manual' ),
					'default'  => true,
					'on' => esc_html__( 'Enable', 'manual' ),
					'off' => esc_html__( 'Disable', 'manual' ),
				),
				
				array(
					'id'       => 'manual-live-search-post-type-private-records',
					'type'     => 'switch',
					'title'    => esc_html__( 'Private Records', 'manual' ),
					'subtitle' => __('<span style="color:orange;">Allow all private records to appear on the live search.</span>', 'manual' ),
					'default'  => false,
					'on' => esc_html__( 'Enable', 'manual' ),
					'off' => esc_html__( 'Disable', 'manual' ),
				),
				
				array(
					'id'       => 'global-search-text-paceholder',
					'type'     => 'text',
					'title'    => esc_html__( 'Search Placeholder Text', 'manual' ),
					'default'  => 'Have a question? Ask or enter a search term.',
				),
				
				 array(
					'id'       => 'global-flip-search-text-paceholder',
					'type'     => 'text',
					'title'    => esc_html__( 'Flip Search Placeholder Text', 'manual' ),
					'default'  => 'Please Let Us Know Your Problem',
				),
				
				array(
					'id'       => 'global-buttom-search-text-paceholder',
					'type'     => 'text',
					'title'    => esc_html__( 'Search Buttom Text', 'manual' ),
					'default'  => 'Search',
				),
				
				array(
					'id'       => 'global-showall-search-text-paceholder',
					'type'     => 'text',
					'title'    => esc_html__( 'Show All Results Text', 'manual' ),
					'default'  => 'Show All Results',
				),
				
				array(
					'id'       => 'global-noresult-search-text-paceholder',
					'type'     => 'text',
					'title'    => esc_html__( 'No Results Text', 'manual' ),
					'default'  => 'No Results',
				),
				
		 )
    ) );
	
	// TRENDING SEARCH
	Redux::setSection( $opt_name, array(
        'title'        => esc_html__( 'Trending Search', 'manual' ),
        'id'           => 'theme_trending_search_section',
		'subsection'   => true,
        'fields' => array(
				
				array(
					'id'       => 'manual-trending-live-search-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Trending Search', 'manual' ),
					'subtitle' => esc_html__('Globally enable/disable trending searches ', 'manual'),
					'default'  => false,
					'on' => esc_html__( 'Enable', 'manual' ),
					'off' => esc_html__( 'Disable', 'manual' ),
				),
				
				array(
					'id'       => 'manual-trending-text',
					'type'     => 'text',
					'title'    => esc_html__( 'Text', 'manual' ),
					'subtitle' => esc_html__( 'Short message words', 'manual'),
					'desc'     => esc_html__( 'Default: Popular Search', 'manual' ),
					'default'  => 'Popular Search:',
				),
				
				array(
					'id'       => 'manual-three-trending-search-text',
					'type'     => 'sortable',
					'title'    => esc_html__( 'Trending Search keyword', 'manual' ),
					'subtitle' => esc_html__( 'Include 3 search term that is trending ex: installation, demo data etc...', 'manual' ),
					'label'    => true,
					'options'  => array(
						'Search keyword 1'  => '',
						'Search keyword 2'  => '',
						'Search keyword 3'  => '',
					)
				),
				
		 )
    ) );
	
	// TARGET POST TYPE SEARCH
	Redux::setSection( $opt_name, array(
        'title'        => esc_html__( 'Target Post Type Search', 'manual' ),
        'id'           => 'theme_target_post_type_search_section',
		'subsection'   => true,
        'fields' => array(
				
				array(
					'id'       => 'manual-trending-post-type-search-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Dropdown Target Search', 'manual' ),
					'subtitle' => esc_html__('Globally enable/disable target search', 'manual'),
					'default'  => true,
					'on' => esc_html__( 'Enable', 'manual' ),
					'off' => esc_html__( 'Disable', 'manual' ),
				),
				
				array(
					'id'       => 'manual-dropdown-target-search-margin-right',
					'type'     => 'text',
					'title'    => esc_html__( 'Dropdown Target Search Box Margin Right', 'manual' ),
					'subtitle' => esc_html__( 'Adjust dropdown box design, if creating any space', 'manual' ),
					'desc' => esc_html__( 'Example: 0px, -10px, 20px', 'manual' ),
					'default'  => '0px',
				),
				
				array(
					'id'       => 'manual-trending-post-type-search-status-on-forum-pages',
					'type'     => 'switch',
					'title'    => esc_html__( 'Activate Dropdown Target Search on the Forum (bbpress) Section', 'manual' ),
					'subtitle' => esc_html__('Globally enable/disable post type search ', 'manual'),
					'default'  => false,
					'on' => esc_html__( 'Enable', 'manual' ),
					'off' => esc_html__( 'Disable', 'manual' ),
				),
				
				array(
					'id'       => 'manual-search-post-type-multi-select',
					'type'     => 'select',
					'data'     => 'post_type',
					'multi'    => true,
					'sortable' => true,
					'title'    => esc_html__( 'Target Search (Dropdown list)', 'manual' ),
					'subtitle' => __('While performing search if selected any post type, <strong>the live/normal search results are targeted to only chosen post type</strong>', 'manual' ),
					'desc'     => __( '<strong style="color:red;">NOTE: Post Type: "Courses, Lession & Quizzes" will not work</strong> and will not list on the target search although selected above. <br><br> <strong>NOTE 2:</strong> Post Type: "Replies and Topics" will not list on the target search although selected on list above.', 'manual' ),
					'default'  => array('post','page','manual_kb','manual_faq','manual_portfolio','manual_documentation')
				),
				
				array(
					'id'       => 'manual_dropdown_value_section',
					'type'     => 'section',
					'title'    => esc_html__( 'Target Search Dropdown Text', 'manual' ),
					'indent'   => true,
					'subtitle' => esc_html__('If selected post type keyword matches from the "Target Search (Dropdown list)" above, it will be replace by below text','manual' ),
				),
				
				array(
					'id'       => 'manual-post-type-search-text-inital',
					'type'     => 'text',
					'title'    => esc_html__( 'Default', 'manual' ),
					'subtitle' => esc_html__( 'Default display text', 'manual' ),
					'default'  => 'All Site',
				),
				
				array(
					'id'       => 'manual-post-type-search-dropdown-kb',
					'type'     => 'text',
					'title'    => esc_html__( 'Knowledge Base', 'manual' ),
					'subtitle' => esc_html__( 'Dropdown Knowledge Base Text', 'manual' ),
					'default'  => 'Knowledge Base',
				),
				
				array(
					'id'       => 'manual-post-type-search-dropdown-documentation',
					'type'     => 'text',
					'title'    => esc_html__( 'Documentation', 'manual' ),
					'subtitle' => esc_html__( 'Dropdown Documentation Text', 'manual' ),
					'default'  => 'Documentation',
				),
				
				array(
					'id'       => 'manual-post-type-search-dropdown-portfolio',
					'type'     => 'text',
					'title'    => esc_html__( 'Portfolio', 'manual' ),
					'subtitle' => esc_html__( 'Dropdown Portfolio Text', 'manual' ),
					'default'  => 'Portfolio',
				),
				
				array(
					'id'       => 'manual-post-type-search-dropdown-faq',
					'type'     => 'text',
					'title'    => esc_html__( 'FAQs', 'manual' ),
					'subtitle' => esc_html__( 'Dropdown FAQs Text', 'manual' ),
					'default'  => 'FAQs',
				),
				
				array(
					'id'       => 'manual-post-type-search-dropdown-forums',
					'type'     => 'text',
					'title'    => esc_html__( 'Forums', 'manual' ),
					'subtitle' => esc_html__( 'Dropdown Forums Text', 'manual' ),
					'default'  => 'Forums',
				),
				
				array(
					'id'       => 'manual-post-type-search-dropdown-media',
					'type'     => 'text',
					'title'    => esc_html__( 'Media', 'manual' ),
					'subtitle' => esc_html__( 'Dropdown Media Text', 'manual' ),
					'default'  => 'Media',
				),
				
				array(
					'id'       => 'manual-post-type-search-dropdown-page',
					'type'     => 'text',
					'title'    => esc_html__( 'Page', 'manual' ),
					'subtitle' => esc_html__( 'Dropdown Page Text', 'manual' ),
					'default'  => 'Page',
				),
				
				array(
					'id'       => 'manual-post-type-search-dropdown-post',
					'type'     => 'text',
					'title'    => esc_html__( 'Post', 'manual' ),
					'subtitle' => esc_html__( 'Dropdown Post Text', 'manual' ),
					'default'  => 'Post',
				),
				
				
		 )
    ) );
	
	// SEARCH PAGE
	Redux::setSection( $opt_name, array(
	'title'        => esc_html__( 'Search Page', 'manual' ),
	'id'           => 'theme_target_post_type_search_page_section',
	'subsection'   => true,
	'fields' => array(
					  
					array(
						'id'       => 'searchpg-post-type-private-records',
						'type'     => 'switch',
						'title'    => esc_html__( 'Private Records', 'manual' ),
						'subtitle' => __('<span style="color:orange;">Allow all private records to appear on the search page.</span>', 'manual' ),
						'default'  => false,
						'on' => esc_html__( 'Enable', 'manual' ),
						'off' => esc_html__( 'Disable', 'manual' ),
					),  
					  
					array(
						'id'       => 'searchpg-sidebar',
						'type'     => 'switch',
						'title'    => esc_html__( 'Sidebar', 'manual' ),
						'subtitle' => esc_html__( 'Make search content - full width', 'manual' ),
						'default'  => true,
						'on' => esc_html__( 'Enable', 'manual' ),
						'off' => esc_html__( 'Disable', 'manual' ),
					),
					
					array(
						'id'       => 'searchpg-records-post-type-tag',
						'type'     => 'switch',
						'title'    => esc_html__( 'Post Type Tag', 'manual' ),
						'default'  => true,
						'subtitle' => esc_html__( 'Turn Off; to remove post type tag from the post title', 'manual' ),
						'on' => esc_html__( 'Enable', 'manual' ),
						'off' => esc_html__( 'Disable', 'manual' ),
					),
	
					array(
						'id'       => 'searchpg-records-publish-date',
						'type'     => 'switch',
						'title'    => esc_html__( 'Post Publish Date', 'manual' ),
						'default'  => true,
						'subtitle' => esc_html__( 'Turn Off; to remove post publish date from the post title', 'manual' ),
						'on' => esc_html__( 'Enable', 'manual' ),
						'off' => esc_html__( 'Disable', 'manual' ),
					),
					
					array(
						'id'       => 'searchpg-records-author-name',
						'type'     => 'switch',
						'title'    => esc_html__( 'Author', 'manual' ),
						'default'  => true,
						'subtitle' => esc_html__('Turn Off; to remove author name from the post title', 'manual' ),
						'on' => esc_html__( 'Enable', 'manual' ),
						'off' => esc_html__( 'Disable', 'manual' ),
					),
					
					array(
						'id'       => 'searchpg-records-post-user-name',
						'type'     => 'select',
						'title'    => esc_html__( 'Author Name By', 'manual' ),
						'subtitle' => esc_html__( 'Will appear under title i.e aricle display by', 'manual' ),
						'options'  => array(
							'user_login' => esc_html__('User Login','manual' ),
							'user_nicename' => esc_html__('User Nicename','manual' ),
							'user_registered' => esc_html__('User Registered','manual' ),
							'display_name' => esc_html__('Display Name','manual' ),
							'first_name' => esc_html__('First Name','manual' ),
							'user_firstname' => esc_html__('User Firstname','manual' ),
						),
						'default'  => 'user_nicename',
						'required' => array('searchpg-records-author-name','equals','1'),
					),
					
					array(
						'id'            => 'searchpg-records-per-page',
						'type'          => 'slider',
						'title'         => esc_html__( 'Search Records Per Page', 'manual' ),
						'default'       => 10,
						'min'           => 5,
						'step'          => 1,
						'max'           => 20,
						'display_value' => 'label',
						'subtitle' => esc_html__( 'Default: 10', 'manual' ),
						'display_value' => 'text',
					),
					
					array(
						'id'       => 'manual_searchpg_no_result_text_section',
						'type'     => 'section',
						'title'    => esc_html__( 'No Search Result Text', 'manual' ),
						'indent'   => true,
					),
					
					array(
						'id'       => 'manual_searchpg_no_result_text_message',
						'type'     => 'text',
						'title'    => esc_html__( 'Sorry!! nothing found Text', 'manual' ),
						'subtitle' => esc_html__( 'Display text if no any search result found', 'manual' ),
						'default'  => 'Sorry!! nothing found related to your search topic, please try search again.',
					),
					
					array(
						'id'       => 'searchpg-order-search-result-section',
						'type'     => 'section',
						'title'    => esc_html__( 'Order Search Result', 'manual' ),
						'indent'   => true,
					),
					
					array(
						'id'       => 'searchpg-result-display-order',
						'type'     => 'select',
						'title'    => esc_html__( 'Search Records Display Order', 'manual' ),
						'subtitle' => esc_html__( 'Display order ', 'manual' ),
						'options'  => array(
							'ASC' => esc_html__( 'Ascending Order (ASC)','manual' ),
							'DESC' => esc_html__( 'Descending Order (DESC)','manual' ),
						),
						'default'  => 'DESC'
					),
					
					array(
						'id'       => 'searchpg-result-display-orderby',
						'type'     => 'select',
						'title'    => esc_html__( 'Search Records Display Order By', 'manual' ),
						'subtitle' => esc_html__( 'Display order by', 'manual' ),
						'options'  => array(
							'ID' => esc_html__('Order by post id','manual' ),
							'title' => esc_html__('Order by title','manual' ),
							'date' => esc_html__('Order by date','manual' ),
							'modified' => esc_html__('Order by last modified date','manual' ),
							'rand' => esc_html__('Order by Random','manual' ),
							'comment_count' => esc_html__('Order by number of comment','manual' ),
							'relevance' => esc_html__('Order by relevance','manual' ),
							'none' => esc_html__('None','manual' ),
						),
						'default'  => 'relevance'
					),
					
					
					array(
						'id'       => 'searchpg-post-content-section',
						'type'     => 'section',
						'title'    => esc_html__( 'Post Content - will display below headline', 'manual' ),
						'indent'   => true,
					),
					
					array(
						'id'       => 'searchpg-display-post-content',
						'type'     => 'switch',
						'title'    => esc_html__( 'Article - Post Excerpt', 'manual' ),
						'default'  => true,
						'subtitle' => esc_html__('Enable/Disable post excerpt that appear below post title', 'manual' ),
						'on' => esc_html__( 'Enable', 'manual' ),
						'off' => esc_html__( 'Disable', 'manual' ),
					),
					
					array(
						'id'       => 'searchpg-display-post-content-on-post-type',
						'type'     => 'select',
						'data'     => 'post_type',
						'multi'    => true,
						'sortable' => true,
						'title'    => esc_html__( 'Target Post Type - Article Post Excerpt', 'manual' ),
						'subtitle' => esc_html__('System will only display post excerpt only for the selected post type','manual' ),
						'desc'     => __( '<strong>NOTE:</strong> If no any post type selected, system will just display title', 'manual' ),
						'default'  => array('manual_kb','manual_documentation'),
						'required' => array('searchpg-display-post-content','equals','1'),
					),
					
					array(
						'id'       => 'searchpg-display-post-content-character',
						'type'     => 'text',
						'title'    => esc_html__( 'Articles Excerpt Length', 'manual' ),
						'subtitle' => esc_html__( 'By default excerpt length is set to 200 character. Use this excerpt length filter to change excerpt length to X character', 'manual' ),
						'desc' => esc_html__( 'Default Character: 200 character', 'manual' ),
						'required' => array('searchpg-display-post-content','equals','1'),
						'default'  => '200',
					),					
					
			 )
    ) );
	
	
	
	
	
	
	// ADVANCE SEARCH
	Redux::setSection( $opt_name, array(
        'title'        => esc_html__( 'Advance Search', 'manual' ),
        'id'           => 'advance_search_option',
		'subsection'   => true,
        'fields' => array(
						  
						  
						  array(
								'id'       => 'manual-default-search-type-multi-select',
								'type'     => 'select',
								'data'     => 'post_type',
								'multi'    => true,
								'sortable' => true,
								'title'    => esc_html__( 'Post Types Target Search', 'manual' ),
								'subtitle' => __('Search will <strong style="color:orange;">only display results</strong> from the selected post types while performing live/normal search. <br>','manual' ),
								'desc'     => __( '<strong>NOTE:</strong> If <strong style="color:orange;">no any post type selected</strong> above, search will <strong>display results from all the available post type</strong>.', 'manual' ),
						 ),
						  
						  
						  array(
								'id'       => 'general_livesearch_settings',
								'type'     => 'checkbox',
								'title'    => esc_html__('General Search Settings', 'manual'), 
								'options'  => array(
									'1' => esc_html__('Search in Title (DEFAULT, will always active)','manual'),
									'2' => esc_html__('Search in Content','manual'),
									'3' => esc_html__('Search in Excerpt','manual'),
								),
								'default' => array(
									'1' => '1', 
								)
							),
						  
						    array(
								'id'       => 'multi_texonomies_livesearch_settings',
								'type'     => 'select',
								'data'     => 'taxonomies',
								'title'    => esc_html__('Search in Taxonomies', 'manual'),
								'multi'    => true,
								'args'  => array( 'public' => true, 'show_ui' => true, ), 
							),
						   
						    array(
								'id'       => 'advance-livesearch-in-authors',
								'type'     => 'switch',
								'title'    => esc_html__('Authors', 'manual' ),
								'subtitle' => esc_html__('Search author display name and display the posts created by that author', 'manual'),
								'default'  => false,
								'on' => esc_html__( 'Enable', 'manual' ),
								'off' => esc_html__( 'Disable', 'manual' ),
							),
						   
						   array(
								'id'       => 'advance-search-misc-section',
								'type'     => 'section',
								'title'    => esc_html__( 'Miscellaneous Settings', 'manual' ),
								'indent'   => true,
						   ),
						   
						   array(
								'id'          => 'advance-search-exclude-older-result',
								'type'        => 'date',
								'title'       => esc_html__('Exclude Older Search Results', 'manual'), 
								'subtitle'    => esc_html__('Will not appear in search results older than selected date', 'manual'),
								'placeholder' => esc_html__('Select Date', 'manual'),
								'desc'    => esc_html__('Leave empty to disable', 'manual'),
						   ),
						   
						   array(
								'id'       => 'adv-search-terms-relation-type',
								'type'     => 'select',
								'title'    => esc_html__( 'Terms Relation Type', 'manual' ),
								'subtitle' => esc_html__( 'Type of query relation between search terms.', 'manual' ),
								'desc' => esc_html__( 'e.g. if someone searches for "getting started" then define the relation between "getting" and "started". The default value is AND.', 'manual' ),
								'options'  => array(
									'AND' => esc_html__('AND','manual' ),
									'OR' => esc_html__('OR','manual' ),
								),
								'default'  => 'AND'
						  ),
						   
						  array(
								'id'       => 'adv-search-match-exact-type',
								'type'     => 'select',
								'title'    => esc_html__( 'Match the Search Term Exactly', 'manual' ),
								'subtitle' => esc_html__( 'Whether to match search term exactly or partially.', 'manual' ),
								'desc' => esc_html__( 'e.g. If someone search "Word" it will display items matching "WordPress" or "Word" but if you select Yes then it will display items only matching "Word". The default value is No.', 'manual' ),
								'options'  => array(
									'yes' => esc_html__('YES', 'manual' ),
									'no' => esc_html__('NO', 'manual' ),
								),
								'default'  => 'no'
						  ),
						  
						   
					)
    ) );

		
/**********************************************
*******  START  KNOWLEDGEBASE       *****
***********************************************/

	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Knowledgebase', 'manual' ),
        'id'               => 'theme_knowledgebase_section',
        'customizer_width' => '400px',
        'icon'             => 'el el-file-edit'
    ) );
	
	// GLOBAL
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Global Settings', 'manual' ),
        'id'               => 'knowledgebase_global_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
				
			   
			   array(
					'id'       => 'hide-private-kb-articles-globally',
					'type'     => 'switch',
					'title'    => esc_html__( 'Hide All Private KB Articles', 'manual' ),  
					'default'  => false,
					'desc' => esc_html__( 'Visible to only respective users', 'manual' ),
					'subtitle' => esc_html__( '	
Does not work on page-builder KB shortcodes & search,  all shortcodes & search (manual options > search) have their own content privacy settings.','manual' ),
					'off' => esc_html__( 'Disable', 'manual' ),
					'on' => esc_html__( 'Enable', 'manual' ),
			   ),
				
			   array(
					'id'       => 'kb-hide-notification-bar',
					'type'     => 'switch',
					'title'    => esc_html__( 'Notification Bar', 'manual' ),
					'default'  => true,
					'subtitle' => esc_html__( 'Notification bar for will appear for the post type "knowledge base" (applied for both category and single page)', 'manual' ),
					'on' => esc_html__( 'Disable', 'manual' ),
					'off' => esc_html__( 'Enable', 'manual' ),
				),
									
									
					)
    ) );
	
	
	// CUSTOM SLUG NAME
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Post Type & Breadcrumb Settings', 'manual' ),
        'id'               => 'knowledgebase_slug_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
				array(
					'id'       => 'kb-post-type-has-archive',
					'type'     => 'switch',
					'title'    => esc_html__( 'Has Archive', 'manual' ),
					'subtitle' => esc_html__( 'If left default, the archive slug will default to the post type slug', 'manual' ),
					'desc'     => __( '(default: false) Whether or not the post type will have a post type archive URL', 'manual' ),
					'on' => esc_html__( 'True', 'manual' ),
					'off' => esc_html__( 'False', 'manual' ),
					'default'  => false,
				),
				
				array(
					'id'       => 'kb-slug-name',
					'type'     => 'text',
					'title'    => esc_html__( 'Single Post - Slug Name', 'manual' ),
					'subtitle' => esc_html__( 'Give custom single post slug name for your knowledge base', 'manual' ),
					'desc'     => __( '<strong>Will appear as: </strong> http://domain.com/<strong>knowledgebase</strong>/creating-new-kb-post/ <br><br> <div style="color: #D01B0B;"><strong>WARNING:</strong> Knowledge Base single post slug name <strong>MUST BE</strong> different from the page name used to display Knowledge Base. If same name provided system will show 404 on the different cases. </div>', 'manual' ),
					'default'  => 'knowledgebase',
				),
				
			   array(
					'id'       => 'kb-cat-slug-name',
					'type'     => 'text',
					'title'    => esc_html__( 'Category - Slug Name', 'manual' ),
					'subtitle' => esc_html__( 'Give custom category slug name for your knowledge base', 'manual' ),
					'desc'     => __( '<strong>Will appear as: </strong> http://domain.com/<strong>kb</strong>/customization/ <br><br> <div style="color: #D01B0B;"><strong>WARNING:</strong> Category Slug Name <strong>MUST BE</strong> different from the <strong>Knowledge Base Single Post (Slug Name)</strong> and the page name used to display Knowledge Base. 404 error page will appear if name matched on the different cases. <br><br> <strong>If possible do not change category slug name once set</strong>, if changed frequently it will show broken link and will also effect  search. </div>', 'manual' ),
					'default'  => 'kb',
				),
				
				array(
					'id'       => 'kb-tag-slug-name',
					'type'     => 'text',
					'title'    => esc_html__( 'Tag Post - Slug Name', 'manual' ),
					'subtitle' => esc_html__( 'Give custom tag post slug name for your knowledge base', 'manual' ),
					'desc'     => __( '<strong>Will appear as: </strong> http://domain.com/<strong>kb-tag</strong>/kb-post-slug-name/ <br><br></strong> Custom slug name for your knowledge base tag.', 'manual' ),
					'default'  => 'kb-tag',
				),
				
			   array(
					'id'       => 'kb-breadcrumb-name',
					'type'     => 'text',
					'title'    => esc_html__( 'Breadcrumb Name', 'manual' ),
					'subtitle' => esc_html__( 'Custom breadcrumb name for your knowledge base', 'manual' ),
					'desc'     => __( '<strong>Will appear as:</strong>  Home / <strong>Knowledge Base</strong> / Customization /', 'manual' ),
					'default'  => 'Knowledge Base',
				),
				
				array(
					'id'       => 'kb-breadcrumb-custom-home-url',
					'type'     => 'text',
					'title'    => esc_html__( 'Knowledge Base Home Page URL', 'manual' ),
					'desc'     => __( '<strong>Will link breadcrumb as:</strong>  Home / <a href="">Knowledge Base</a> / Customization /', 'manual' ),
					'subtitle' => __( 'Custom home page URL for your Knowledge Base', 'manual' ),
					'default'  => '',
				),
	
		)
    ) );
	
	
	// CATEGORY SETTINGS
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Category Page', 'manual' ),
        'id'               => 'knowledgebase_records_order_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
									
				array(
					'id'       => 'kb-noof-subcat-records-percat',
					'type'     => 'text',
					'title'    => esc_html__( 'Number Of Sub Category Records', 'manual' ),
					'default'  => '5',
					'desc' => esc_html__( 'Value "-1" will display all the results', 'manual' ),
				),					
									
				array(
					'id'       => 'kb-noof-records-catper-page',
					'type'     => 'text',
					'title'    => esc_html__( 'Number Of Records Per Page', 'manual' ),
					'default'  => '-1',
					'desc' => esc_html__( 'Value "-1" will display all the results i.e no pagination will appear', 'manual' ),
				),

				array(
					'id'       => 'kb-cat-display-order',
					'type'     => 'select',
					'title'    => esc_html__( 'Records Display Order', 'manual' ),
					'subtitle' => esc_html__( 'Display order ', 'manual' ),
					'options'  => array(
						'ASC' => esc_html__('Ascending Order (ASC)','manual' ),
						'DESC' => esc_html__('Descending Order (DESC)','manual' ),
					),
					'default'  => 'ASC'
				),
			
				array(
					'id'       => 'kb-cat-display-order-by',
					'type'     => 'select',
					'title'    => esc_html__( 'Records Display Order By', 'manual' ),
					'subtitle' => esc_html__( 'Display order by', 'manual' ),
					'options'  => array(
						'ID' => esc_html__('Order by post id','manual' ),
						'title' => esc_html__('Order by title','manual' ),
						'name' => esc_html__('Order by post name','manual' ),
						'date' => esc_html__('Order by date','manual' ),
						'modified' => esc_html__('Order by last modified date','manual' ),
						'rand' => esc_html__('Order by Random','manual' ),
						'comment_count' => esc_html__('Order by number of comment','manual' ),
						'menu_order' => esc_html__('Page Order','manual' ),
						'none' => esc_html__('None','manual' ),
					),
					'default'  => 'date'
				),
				
				array(
					'id'       => 'all-child-cat-post-in-root-category',
					'type'     => 'switch',
					'title'    => esc_html__( 'Display All Child Category Records Inside Parent Category', 'manual' ),
					'default'  => false,
					'subtitle' => esc_html__( 'Display all child category records under root category', 'manual' ),
					'desc' => esc_html__( 'Off ==  disable','manual' ),
				),
				
				array(
					'id'       => 'kb-cat-sidebar-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Remove Sidebar', 'manual' ),
					'default'  => false,
					'subtitle' => esc_html__( 'Make content - full width', 'manual' ),
					'desc' => esc_html__('Off ==  disable','manual' ),
				),
				
				
				array(
					'id'       => 'kb-cat-sidebar-position',
					'type'     => 'select',
					'title'    => esc_html__( 'Sidebar Position', 'manual' ),
					'options'  => array(
						'left' => esc_html__('Left', 'manual' ),
						'right' => esc_html__('Right', 'manual' ),
					),
					'default'  => 'right',
					'required' => array('kb-cat-sidebar-status','equals','0'),
				),
				
				array(
					'id'       => 'kb-cat-content-center',
					'type'     => 'switch',
					'title'    => esc_html__( 'Content Column Layout', 'manual' ),
					'default'  => false,
					'subtitle' => esc_html__( 'Make content exact center', 'manual' ),
					'desc' =>  esc_html__('On ==  Enable','manual' ),
					'required' => array('kb-cat-sidebar-status','equals','1'),
				),
				
				
				// DESIGN SETTINGS
				array(
					'id'       => 'kb-other-category-settings',
					'type'     => 'section',
					'title'    => esc_html__( 'Design Settings', 'manual' ),
					'indent'   => true, 
				),
				
				array(
					'id'       => 'kb-catpg-display-style',
					'type'     => 'select',
					'title'    => esc_html__( 'Category Page Design Style', 'manual' ),
					'subtitle' => esc_html__( 'Select category page design style', 'manual' ),
					'options'  => array(
						'1' => esc_html__('Style 1','manual' ),
						'2' => esc_html__('Style 2','manual' ),
					),
					'default'  => '1'
				),
				
				array(
					'id'       => 'kb-catpg-display-style-one-col-layout',
					'type'     => 'select',
					'title'    => esc_html__( 'Sub category column layout', 'manual' ),
					'subtitle' => esc_html__( 'Select column layout', 'manual' ),
					'options'  => array(
						'1' => esc_html__('1 Column','manual' ),
						'2' => esc_html__('2 Columns','manual' ),
					),
					'default'  => '2',
					'required' => array('kb-catpg-display-style','equals','1'),
				),
				
				array(
					'id'       => 'kb-catpg-display-style-one-col-layout-li-applyborder',
					'type'     => 'switch',
					'title'    => esc_html__('Apply Border for each Sub Category Records', 'manual' ),
					'subtitle' => esc_html__('Apply border', 'manual'),
					'default'  => false,
					'desc' => esc_html__('Off ==  disable','manual'),
					'required' => array('kb-catpg-display-style-one-col-layout','equals','1'),
				),
				
				array(
					'id'       => 'kb-catpg-display-style-one-col-layout-grid-style',
					'type'     => 'switch',
					'title'    => esc_html__('Display Records Under Sub Category in Grid Style', 'manual' ),
					'subtitle' => esc_html__('Sub Category in Grid Style', 'manual'),
					'default'  => false,
					'desc' => esc_html__('Off ==  disable','manual'),
					'required' => array('kb-catpg-display-style-one-col-layout','equals','1'),
				),
				
				array(
					'id'       => 'knowledgebase-cat-quick-stats-under-title-appear-right',
					'type'     => 'switch',
					'title'    => esc_html__( 'Align Right - Post Views and Date', 'manual' ),
					'subtitle' => esc_html__('Display post views and data on the right section', 'manual'),
					'default'  => false,
					'desc' => esc_html__('Off ==  disable','manual'),
					'required' => array('kb-catpg-display-style','equals','1'),
				),
				
				// Group 2 - Inital Appear Options
				array(
					'id'       => 'kb-cat-design2-aitc-text',
					'type'     => 'text',
					'title'    => esc_html__('Articles in This Collection Text', 'manual'),
					'default'  => 'articles in this collection',
					'required' => array('kb-catpg-display-style','equals','2'),
				),
				
				array(
					'id'       => 'kb-cat-design2-wby-text',
					'type'     => 'text',
					'title'    => esc_html__('Written by Text', 'manual'),
					'default'  => 'Written by',
					'required' => array('kb-catpg-display-style','equals','2'),
				),
				
				// GROUP - 1
				array(
					'id'       => 'kb-cat-design2-icon-color',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Category Icon Color', 'manual' ),
					'subtitle'    => esc_html__( 'Icon that appear before category title', 'manual' ),
					'default'  => array(
									'color' => '#46b289',
									'alpha' => '.9'
								),
				),
				 
				array(
					'id'       => 'knowledgebase-remove-subcategory-description',
					'type'     => 'switch',
					'title'    => esc_html__( 'Sub-Category Description Text', 'manual' ),
					'subtitle' => esc_html__('Turn On, to remove category description that appear under the category name', 'manual'),
					'default'  => false,
					'desc' => esc_html__('On ==  disable','manual'),
				),
				
				array(
					'id'       => 'knowledgebase-remove-subcategory-readmore',
					'type'     => 'switch',
					'title'    => esc_html__( 'Sub-Category Read More Text', 'manual' ),
					'subtitle' => esc_html__('Turn On, to remove read more text that appear below sub category records', 'manual'),
					'default'  => false,
					'desc' => esc_html__('On ==  disable','manual'),
					'required' => array('kb-catpg-display-style','equals','1'),
				),
				
				array(
					'id'       => 'knowledgebase-cat-quick-stats-under-title',
					'type'     => 'switch',
					'title'    => esc_html__( 'Article - Post Views and Date', 'manual' ),
					'subtitle' => esc_html__('Turn On, to remove post views and date from the post title', 'manual'),
					'default'  => false,
					'desc' => esc_html__('On ==  disable', 'manual'),
					'required' => array('kb-catpg-display-style','equals','1'),
				),
				
				array(
					'id'       => 'knowledgebase-cat-style1-post-excerpt',
					'type'     => 'switch',
					'title'    => esc_html__( 'Article - Post Excerpt', 'manual' ),
					'subtitle' => esc_html__('Turn On, to enable post excerpt that appear below post title', 'manual'),
					'default'  => false,
					'desc' => esc_html__('On ==  enable', 'manual'),
				),
				
				array(
					'id'       => 'kb-cat-design2-articles-excerpt-trim',
					'type'     => 'text',
					'title'    => esc_html__('Articles Excerpt Length', 'manual'),
					'subtitle' => esc_html__( 'By default excerpt length is set to 25 words. Use this excerpt length filter to change excerpt length to X words', 'manual' ),
					'default'  => '25',
					'required' =>  array('knowledgebase-cat-style1-post-excerpt','equals','1'),
				),
				
				array(
					'id'       => 'kb-cat-design2-articles-excerpt-color',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Excerpt Text Color', 'manual' ),
					'subtitle'    => esc_html__( 'Define excerpt color', 'manual' ),
					'default'  => array(
									'color' => '#777777',
									'alpha' => '.9'
								),
					'required' =>  array('knowledgebase-cat-style1-post-excerpt','equals','1'),
				),
				
				// GROUP - 2
				array(
					'id'       => 'kb-cat-design2-articleboxbg-color',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Article Box Background Color', 'manual' ),
					'subtitle' => esc_html__( 'Article Box Color', 'manual' ),
					'default'  => array(
									'color' => '#f9f9f9',
									'alpha' => '.6'
								),
					'required' => array('kb-catpg-display-style','equals','2'),
				),
				
				array(
					'id'       => 'kb-cat-design2-metabox-color',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Meta Color', 'manual' ),
					'subtitle' => esc_html__( 'Article Meta Color (article written by and date color)', 'manual' ),
					'default'  => array(
									'color' => '#808080',
									'alpha' => '.9'
								),
					'required' => array('kb-catpg-display-style','equals','2'),
				),
	
		)
    ) );
	
	
	// SINGLE PAGE SETTINGS
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Single Page', 'manual' ),
        'id'               => 'kb_single_records_on_off_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
				
				array(
					'id'       => 'kb-toc-inside-post',
					'type'     => 'switch',
					'title'    => __('<span style="color:orange;">Table Of Content</span>','manual'),
					'subtitle' => esc_html__('Display table of content (TOC) inside knowledgebase article', 'manual'),
					'desc' => esc_html__('Please make sure the widget (Appearance > Widgets) TOC is not active on the sidebar. Also, if post using wpBakery or Elementor the TOC will not work.', 'manual'),
					'default'  => false,
					'on' => esc_html__( 'Enable', 'manual' ),
					'off' => esc_html__( 'Disable', 'manual' ),
				),
				array(
					'id'       => 'kb-singlepg-title-tag',
					'type'     => 'select',
					'title'    => esc_html__( 'Title Tag', 'manual' ),
					'options'  => array(
						'h2' => esc_html__('h2','manual' ),
						'h1' => esc_html__('h1','manual' ),
					),
					'default'  => 'h1', 
				),
				array(
					'id'       => 'kb-comment-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Allow Comments', 'manual' ),
					'subtitle' => esc_html__( 'Allow comments on each articles', 'manual' ),
					'default'  => false,
					'desc' => esc_html__('Off ==  disable', 'manual' ),
				),
				array(
					'id'       => 'kb-comment-box-on-thumbsdown',
					'type'     => 'switch',
					'title'    => __('<span style="color:orange;font-weight:bold;">Onclick Thumbs Down - Display Comment Box</span>','manual' ),
					'subtitle' => esc_html__( 'Display comment box, when user click on the thumbs down icon (red buttom)', 'manual' ),
					'default'  => false,
					'desc' => esc_html__('Off ==  disable', 'manual' ),
					'required' => array('kb-comment-status','equals','1'),
				),
				array(
					'id'       => 'kb-cat-sidebar-singlepg-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Remove Sidebar', 'manual' ),
					'default'  => false,
					'subtitle' => esc_html__( 'Make content - full width', 'manual' ),
					'desc' => esc_html__('Off ==  disable','manual' ),
				),
				array(
					'id'       => 'kb-single-page-content-center',
					'type'     => 'switch',
					'title'    => esc_html__( 'Content Column Layout', 'manual' ),
					'default'  => false,
					'subtitle' => esc_html__( 'Make content exact center', 'manual' ),
					'desc' => esc_html__('On ==  Enable', 'manual' ),
					'required' => array('kb-cat-sidebar-singlepg-status','equals','1'),
				),
				array(
					'id'       => 'kb-single-page-sidebar-position',
					'type'     => 'select',
					'title'    => esc_html__( 'Sidebar Position', 'manual' ),
					'subtitle' => esc_html__( 'Sidebar display position', 'manual' ),
					'options'  => array(
						'left' => esc_html__('Left','manual' ),
						'right' => esc_html__('Right','manual' ),
					),
					'default'  => 'right',
					'required' => array('kb-cat-sidebar-singlepg-status','equals','0'),
				),
				array(
					'id'       => 'knowledgebase-social-share-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Social Share', 'manual' ),
					'subtitle' => esc_html__('Allow article sharing using different social newtwork', 'manual'),
					'default'  => false,
					'desc' => esc_html__('On ==  disable','manual'),
				),
				array(
					'id'       => 'knowledgebase-voting-login-users',
					'type'     => 'switch',
					'title'    => __('<span style="color:orange;font-weight:bold;">Login Users - Allow Voting</span>','manual'),
					'subtitle' => esc_html__('Allow article voting for ONLY login users', 'manual'),
					'default'  => false,
					'desc' => esc_html__('Off ==  disable','manual'),
				),
				array(
					'id'       => 'knowledgebase-voting-buttons-status',
					'type'     => 'switch',
					'title'    => esc_html__('Post Voting', 'manual' ),
					'subtitle' => esc_html__('Improve your content quality using article voting', 'manual'),
					'default'  => false,
					'desc' => esc_html__('On ==  disable','manual'),
				),
				array(
					'id'       => 'kb-related-post-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Related Posts', 'manual' ),
					'subtitle' => esc_html__( 'Introducing your readers to other relevant content', 'manual' ),
					'default'  => true,
					'desc' => esc_html__('Off ==  disable','manual' ),
				),
				array(
					'id'       => 'kb-related-post-per-page',
					'type'     => 'text',
					'title'    => esc_html__( 'Number Of Related Post', 'manual' ),
					'subtitle' => esc_html__( 'Display X number of related posts', 'manual' ),
					'default'  => '6',
					'required' => array('kb-related-post-status','equals','1'),
				),
				
				
				// DESIGN KB SINGLE PAGE
				array(
					'id'       => 'kb-singlepage-design-settings',
					'type'     => 'section',
					'title'    => esc_html__( 'Design Settings', 'manual' ),
					'indent'   => true, 
				),
				
				array(
					'id'       => 'kb-singlepg-display-style',
					'type'     => 'select',
					'title'    => esc_html__( 'KB Single Page Design Style', 'manual' ),
					'subtitle' => esc_html__( 'Select single page design style', 'manual' ),
					'options'  => array(
						'1' => esc_html__('Style 1','manual' ),
						'2' => esc_html__('Style 2','manual' ),
					),
					'default'  => '1'
				),
				
				array(
					'id'       => 'kb-singlepg-design2-wby-text',
					'type'     => 'text',
					'title'    => esc_html__('Written by Text', 'manual'),
					'default'  => 'Written by',
					'required' => array('kb-singlepg-display-style','equals','2'),
				),
				
				array(
					'id'       => 'kb-singlepg-design2-metabox-color',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Meta Color', 'manual' ),
					'subtitle' => esc_html__( 'Article Meta Color (article written by and date color)', 'manual' ),
					'default'  => array(
									'color' => '#808080',
									'alpha' => '.9'
								),
					'required' => array('kb-singlepg-display-style','equals','2'),
				),
				
				array(
					'id'       => 'kb-remove-article-title-icon',
					'type'     => 'switch',
					'title'    => esc_html__( 'Title Icon', 'manual' ),
					'default'  => true,
					'subtitle' => esc_html__( 'Turn Off; to remove title icon from the post title', 'manual' ),
					'desc' => esc_html__('Off ==  disable','manual' ),
					'required' => array('kb-singlepg-display-style','equals','1'),
				),
				
				array(
					'id'       => 'kb-single-pg-print-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Print', 'manual' ),
					'default'  => true,
					'subtitle' => esc_html__( 'Turn Off; to remove article print feature from the post', 'manual' ),
					'desc' => esc_html__('Off ==  disable','manual' ),
				),
				
				array(
					'id'       => 'knowledgebase-quick-stats-under-title',
					'type'     => 'switch',
					'title'    => esc_html__( 'Impression and Like Count', 'manual' ),
					'subtitle' => esc_html__('Turn On; to remove total views and post like count from the post title', 'manual'),
					'default'  => false,
					'desc' => esc_html__('On == disable','manual' ),
				),
				
				array(
					'id'       => 'kb-singlepg-publish-date-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Post Publish Date', 'manual' ),
					'default'  => true,
					'subtitle' => esc_html__( 'Turn Off; to remove post publish date from the post title', 'manual' ),
					'desc' => esc_html__('Off ==  disable', 'manual' ),
					'required' => array('kb-singlepg-display-style','equals','1'),
				),
				
				array(
					'id'       => 'kb-singlepg-modified-date-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Post Modified Date', 'manual' ),
					'default'  => true,
					'subtitle' => esc_html__( 'Turn Off; to remove post modifed date from the post title', 'manual' ),
					'desc' => esc_html__('Off ==  disable', 'manual' ),
					'required' => array('kb-singlepg-display-style','equals','1'),
				),
				
				array(
					'id'       => 'kb-disable-doc-author-name',
					'type'     => 'switch',
					'title'    => esc_html__( 'Author', 'manual' ),
					'default'  => true,
					'subtitle' => esc_html__('Turn Off; to remove author name from the post title', 'manual' ),
					'desc' => esc_html__('Off ==  disable','manual' ),
					'required' => array('kb-singlepg-display-style','equals','1'),
				),
				
				array(
					'id'       => 'kb-single-post-user-name',
					'type'     => 'select',
					'title'    => esc_html__( 'Author Name By', 'manual' ),
					'subtitle' => esc_html__( 'Will appear under title i.e aricle display by', 'manual' ),
					'options'  => array(
						'user_login' => esc_html__('User Login','manual' ),
						'user_nicename' => esc_html__('User Nicename','manual' ),
						'user_registered' => esc_html__('User Registered','manual' ),
						'display_name' => esc_html__('Display Name','manual' ),
						'first_name' => esc_html__('First Name','manual' ),
						'user_firstname' => esc_html__('User Firstname','manual' ),
					),
					'default'  => 'user_nicename',
					'required' => array('kb-disable-doc-author-name','equals','1'),
				),
				
		)
    ) );
	
	
	// Gutenberg Editor
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Gutenberg Editor', 'manual' ),
        'id'               => 'kb_gutenberg_editor_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
				array(
					'id'       => 'kb-gutenberg-editor-onoff',
					'type'     => 'switch',
					'title'    => esc_html__( 'Enable Gutenberg Editor', 'manual' ),
					'subtitle' => esc_html__( 'Change classic editor to gutenberg editor for the post type knowledge base', 'manual' ),
					'default'  => false,
					'desc'     => esc_html__('Off == disable','manual' ),
				),
				
		)
    ) );			
	
	
/**********************************************
*******  // EOF  KNOWLEDGEBASE //   *****
***********************************************/
	
	
	
		
		
/**********************************************
*******  START  DOCUMENTATION       *****
***********************************************/
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Documentation', 'manual' ),
        'id'               => 'theme_documentation_section',
        'customizer_width' => '400px',
        'icon'             => 'el el-folder-open'
    ) );
	
	// CUSTOM SLUG NAME
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Post Type & Breadcrumb Settings', 'manual' ),
        'id'               => 'documentation_slug_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
			  array(
					'id'       => 'doc-slug-name',
					'type'     => 'text',
					'title'    => esc_html__( 'Single Post - Slug Name', 'manual' ),
					'subtitle'    => esc_html__( 'Give custom single post slug name for your documentation', 'manual' ),
					'desc'     => __( '<strong>Will appear as: </strong> http://domain.com/<strong>documentation</strong>/new-doc-post/ <br><br> <div style="color: #D01B0B;"><strong>WARNING:</strong> Documentation single post slug name <strong>MUST BE</strong> different from the page name used to display documentation. If same name provided system will show 404 on the different cases. </div>', 'manual' ),
					'default'  => 'documentation',
				),
				
			   array(
					'id'       => 'doc-cat-slug-name',
					'type'     => 'text',
					'title'    => esc_html__( 'Category - Slug Name', 'manual' ),
					'subtitle'    => esc_html__( 'Give custom category slug name for your documentation', 'manual' ),
					'desc'     => __( '<strong>Will appear as: </strong> http://domain.com/<strong>doc</strong>/product-name/ <br><br> <div style="color: #D01B0B;"><strong>WARNING:</strong> Category Slug Name <strong>MUST BE</strong> different from the <strong>Documentation Single Post (Slug Name)</strong> and the page name used to display documentation. 404 error page will appear if name matched on the different cases. <br><br> <strong>If possible do not change category slug name once set</strong>, if changed frequently it will show broken link and will also effect  search. </div>', 'manual' ),
					'default'  => 'doc',
				),
			   
			   array(
					'id'       => 'doc-tag-slug-name',
					'type'     => 'text',
					'title'    => esc_html__( 'Tag Post - Slug Name', 'manual' ),
					'subtitle' => esc_html__( 'Give custom tag post slug name for your documentation', 'manual' ),
					'desc'     => __( '<strong>Will appear as: </strong> http://domain.com/<strong>doc-tag</strong>/doc-post-slug-name/ <br><br></strong> Custom slug name for your documentation tag.', 'manual' ),
					'default'  => 'doc-tag',
				),
				
				array(
					'id'       => 'doc-breadcrumb-name',
					'type'     => 'text',
					'title'    => esc_html__( 'Breadcrumb Name', 'manual' ),
					'subtitle'    => esc_html__( 'Custom breadcrumb name for your documentation', 'manual' ),
					'desc'     => __( '<strong>Will appear as:</strong>  Home / <strong>Documentation</strong> / product-name /', 'manual' ),
					'default'  => 'Documentation',
				),
				
				array(
					'id'       => 'doc-breadcrumb-custom-home-url',
					'type'     => 'text',
					'title'    => esc_html__( 'Documentation Home Page URL', 'manual' ),
					'desc'     => __( '<strong>Will link breadcrumb as:</strong>  Home / <a href="">Documentation</a> / product-name /', 'manual' ),
					'subtitle' => esc_html__( 'Custom home page URL for your Documentation', 'manual' ),
					'default'  => '',
				),
		
		)
    ) );
	
	// RECORDS ORDER SECTION
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Tree Menu', 'manual' ),
        'id'               => 'documentation_records_order_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
									
				array(
					'id'       => 'documentation-tree-menu-display-style',
					'type'     => 'select',
					'title'    => esc_html__( 'Design Style', 'manual' ),
					'subtitle' => esc_html__( 'Select documentation tree menu design style', 'manual' ),
					'options'  => array(
						'1' => esc_html__('Style 1','manual' ),
						'2' => esc_html__('Style 2','manual' ),
					),
					'default'  => '1'
				),
				array(
					'id'       => 'documentation-responsive-tree-menu',
					'type'     => 'switch',
					'title'    => esc_html__( 'Responsive Tree Menu', 'manual' ),
					'subtitle' => __( 'Replace the site main menu with the documentation tree menu when switching to responsive layout <br><br>NOTE: only the page that contains the documentation tree menu will be replaced', 'manual' ),
					'default'  => true,
					'on' => esc_html__( 'Enable', 'manual' ),
					'off' => esc_html__( 'Disable', 'manual' ),
				),
				array(
					'id'       => 'documentation-tree-menu-other-settings',
					'type'     => 'section',
					'title'    => esc_html__( 'Other Settings', 'manual' ),
					'indent'   => true, 
				),
				array(
					'id'       => 'documentation-tree-menu-expand',
					'type'     => 'switch',
					'title'    => esc_html__( 'Expand Tree Menu By Default', 'manual' ),
					'subtitle' => esc_html__( 'Make documentation page tree menu expand by default', 'manual' ),
					'default'  => false,
					'on' => esc_html__( 'Enable', 'manual' ),
					'off' => esc_html__( 'Disable', 'manual' ),
				),
				array(
					'id'       => 'documentation-tree-menu-expand-collapse-text-on-off',
					'type'     => 'switch',
					'title'    => esc_html__( 'Expand/Collapse Text', 'manual' ),
					'subtitle' => esc_html__( 'Show/hide collapse/expand text globally', 'manual' ),
					'default'  => false,
					'on' => esc_html__( 'Hide', 'manual' ),
					'off' => esc_html__( 'Show', 'manual' ),
				),
		
				array(
					'id'       => 'documentation-record-display-order',
					'type'     => 'select',
					'title'    => esc_html__( 'Display Order', 'manual' ),
					'subtitle' => esc_html__( 'Records display order ', 'manual' ),
					'options'  => array(
						'ASC' => esc_html__('Ascending Order (ASC)','manual' ),
						'DESC' => esc_html__('Descending Order (DESC)','manual' ),
					),
					'default'  => 'ASC'
				),
				
				array(
					'id'       => 'documentation-record-display-order-by',
					'type'     => 'select',
					'title'    => esc_html__( 'Display Order By', 'manual' ),
					'subtitle' => esc_html__( 'Records display order by', 'manual' ),
					'desc'     => __( 'Find how orderby works <a href="https://codex.wordpress.org/Template_Tags/get_posts" target="_blank">https://codex.wordpress.org/Template_Tags/get_posts</a>', 'manual' ),
					'options'  => array(
						'title' => esc_html__('Order by Title','manual' ),
						'rand' => esc_html__('Order by Random','manual' ),
						'menu_order' => esc_html__('Page Order','manual' ),
						'date' => esc_html__('Order By Date','manual' ),
						'modified' => esc_html__('Order By Last Modified Date','manual' ),
						'none' => esc_html__('None','manual' ),
					),
					'default'  => 'menu_order'
				),
				
				
				array(
					'id'       => 'documentation-menu-scroller-status',
					'type'     => 'switch',
					'title'    => esc_html__('Tree Menu Scroller', 'manual' ),
					'subtitle' => esc_html__('Turn On, to appear scrollbar after certain tree menu height', 'manual'),
					'default'  => false,
					'on' => esc_html__( 'Enable', 'manual' ),
					'off' => esc_html__( 'Disable', 'manual' ),
				),
				
				array(
					'id'            => 'documentation-scroll-after-menu-height-new',
					'type'          => 'slider',
					'title'         => esc_html__( 'Display Scrollbar After Height', 'manual' ),
					'subtitle'      => esc_html__( 'Scrollbar will appear after exceeding define tree menu height', 'manual' ),
					'default'       => 401,
					'min'           => 1,
					'step'          => 1,
					'max'           => 1200,
					'display_value' => 'label',
					'display_value' => 'text',
					'required' => array('documentation-menu-scroller-status','equals','1'),
				),
				
				array(
					'id'       => 'documentation-menu-scroller-design',
					'type'     => 'select',
					'title'    => esc_html__( 'Menu Scroller Design', 'manual' ),
					'options'  => array(
						'default' => esc_html__('Default','manual' ),
						'dark' => esc_html__('Dark','manual' ),
						'light-3' => esc_html__('Light 3','manual' ),
						'dark-3' => esc_html__('Dark 3','manual' ),
						'dark-thick' => esc_html__('Dark Thick','manual' ),
						'dark-thin' => esc_html__('Dark Thin','manual' ),
						'inset' => esc_html__('Inset','manual' ),
						'inset-dark' => esc_html__('Inset Dark','manual' ),
						'inset-2-dark' => esc_html__('Inset 2 Dark','manual' ),
						'inset-3' => esc_html__('Inset 3','manual' ),
						'inset-3-dark' => esc_html__('Inset 3 Dark','manual' ),
						'rounded-dark' => esc_html__('Rounded Dark','manual' ),
						'rounded-dots-dark' => esc_html__('Rounded Dots Dark','manual' ),
						'3d' => esc_html__('3D','manual' ),
						'3d-dark' => esc_html__('3D Dark','manual' ),
						'3d-thick' => esc_html__('3D Thick','manual' ),
						'3d-thick-dark' => esc_html__('3D Thick Dark','manual' ),
					),
					'default'  => 'default',
					'required' => array('documentation-menu-scroller-status','equals','1'),
				),
				

		)
    ) );
	
	// SINGLE POST ON/OFF
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Single/Category Page', 'manual' ),
        'id'               => 'documentation_single_records_on_off_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
									
				array(
					'id'       => 'documentation-toc-inside-post',
					'type'     => 'switch',
					'title'    => __('<span style="color:orange;">Table Of Content</span>','manual'),
					'subtitle' => esc_html__('Display table of content (TOC) inside documentation article', 'manual'),
					'desc' => esc_html__('Please make sure the widget (Appearance > Widgets) TOC is not active on the sidebar. Also, if post using wpBakery or Elementor the TOC will not work.', 'manual'),
					'default'  => false,
					'on' => esc_html__( 'Enable', 'manual' ),
					'off' => esc_html__( 'Disable', 'manual' ),
				),
				array(
					'id'       => 'documentation-singlepg-title-tag',
					'type'     => 'select',
					'title'    => esc_html__( 'Title Tag', 'manual' ),
					'options'  => array(
						'h2' => esc_html__('h2', 'manual' ),
						'h1' => esc_html__('h1', 'manual' ),
					),
					'default'  => 'h2', 
				),
				array(
					'id'       => 'documentation-comment-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Allow Comments', 'manual' ),
					'subtitle' => esc_html__( 'Allow comments on each articles', 'manual' ),
					'default'  => false,
					'description' => __('<span style="color:red">ONLY WORK IF, ajax load article is turned OFF</span>','manual' ),
				),
				array(
					'id'       => 'documentation-sidebar-position',
					'type'     => 'select',
					'title'    => esc_html__( 'Sidebar Position', 'manual' ),
					'subtitle' => esc_html__( 'Tree Menu sidebar display position', 'manual' ),
					'options'  => array(
						'left' => esc_html__('Left','manual' ),
						'right' => esc_html__('Right','manual' ),
					),
					'default'  => 'left'
				),
				array(
					'id'       => 'documentation-row-layout',
					'type'     => 'select',
					'title'    => esc_html__( 'Row Layout', 'manual' ),
					'subtitle' => esc_html__( 'Select page row layout from predefined options.', 'manual' ),
					'options'  => array(
						'1' => esc_html__('col-3 | col-9', 'manual' ),
						'2' => esc_html__('col-4 | col-8', 'manual' ),
						'3' => esc_html__('col-3 | col-6 | col-3 (with sidebar)', 'manual' ),
						'4' => esc_html__('col-2 | col-8 | col-2 (with sidebar)', 'manual' ),
					),
					'default'  => '2'
				),
				array(
					'id'       => 'documentation-social-share-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Social Share', 'manual' ),
					'subtitle'     => esc_html__('Allow article sharing using different social newtwork', 'manual'),
					'default'  => false,
					'on' => esc_html__( 'Disable', 'manual' ),
					'off' => esc_html__( 'Enable', 'manual' ),
				),
				array(
					'id'       => 'documentation-voting-login-users',
					'type'     => 'switch',
					'title'    => __('<span style="color:orange;font-weight:bold;">Login Users - Allow Voting</span>','manual'),
					'subtitle' => esc_html__('Allow article voting for ONLY login users', 'manual'),
					'default'  => false,
					'on' => esc_html__( 'Enable', 'manual' ),
					'off' => esc_html__( 'Disable', 'manual' ),
				),
				array(
					'id'       => 'documentation-voting-buttons-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Post Voting', 'manual' ),
					'subtitle' => esc_html__('Improve your content quality using article voting', 'manual'),
					'default'  => false,
					'on' => esc_html__( 'Disable', 'manual' ),
					'off' => esc_html__( 'Enable', 'manual' ),
				),
				array(
					'id'       => 'documentation-related-post-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Related Posts', 'manual' ),
					'subtitle' => esc_html__('Introducing your readers to other relevant content', 'manual'),
					'default'  => true,
					'on' => esc_html__( 'Enable', 'manual' ),
					'off' => esc_html__( 'Disable', 'manual' ),
				),
				array(
					'id'       => 'documentation-related-post-per-page',
					'type'     => 'text',
					'title'    => esc_html__( 'Number Of Related Post', 'manual' ),
					'subtitle' => esc_html__('Display X number of related posts', 'manual'),
					'default'  => '6',
					'required' => array('documentation-related-post-status','equals','1'),
				),
				array(
					'id'       => 'documentation-notification-bar-global',
					'type'     => 'switch',
					'title'    => esc_html__( 'Hide Notification Bar', 'manual' ),
					'default'  => true,
					'subtitle' => esc_html__( 'Hide notification bar for the post type "documentation" (applied for both category and single page)', 'manual' ),
					'on' => esc_html__( 'Disable', 'manual' ),
					'off' => esc_html__( 'Enable', 'manual' ),
				),
				
				// DESIGN SETTINGS
				array(
					'id'       => 'doc-feature-onoff-settings',
					'type'     => 'section',
					'title'    => esc_html__( 'Design Settings', 'manual' ),
					'indent'   => true, 
				),
				array(
					'id'       => 'doc-global-arcile-display-style',
					'type'     => 'select',
					'title'    => esc_html__( 'Design Style', 'manual' ),
					'subtitle' => esc_html__( 'Select page design style', 'manual' ),
					'options'  => array(
						'1' => esc_html__('Style 1','manual' ),
						'2' => esc_html__('Style 2','manual' ),
					),
					'default'  => '1'
				),
				array( 
					'id'       => 'documentation-pg-title-icon',
					'type'     => 'switch',
					'title'    => esc_html__( 'Title Icon', 'manual' ),
					'subtitle' => esc_html__( 'Will display before the title', 'manual' ),
					'default'  => true,
					'on' => esc_html__( 'Enable', 'manual' ),
					'off' => esc_html__( 'Disable', 'manual' ),
					'required' => array('doc-global-arcile-display-style','equals','1'),
				),
				array( 
					'id'       => 'doc-global-design2-author',
					'type'     => 'switch',
					'title'    => esc_html__( 'Author', 'manual' ),
					'subtitle' => esc_html__( 'Enable/Disable author', 'manual' ),
					'default'  => true,
					'on' => esc_html__( 'Enable', 'manual' ),
					'off' => esc_html__( 'Disable', 'manual' ),
					'required' => array('doc-global-arcile-display-style','equals','2'),
				),
				array(
					'id'       => 'doc-global-design2-wby-text',
					'type'     => 'text',
					'title'    => esc_html__('Written by Text', 'manual'),
					'default'  => 'Written by',
					'required' => array(
								  array('doc-global-arcile-display-style','equals','2'),
								  array('doc-global-design2-author','equals',true),
								  ),
				),
				array( 
					'id'       => 'documentation-pg-content-box-shadow',
					'type'     => 'switch',
					'title'    => esc_html__( 'Content - White Background', 'manual' ),
					'subtitle' => esc_html__( 'White background with specific content padding will be applied', 'manual' ),
					'default'  => false,
					'on' => esc_html__( 'Enable', 'manual' ),
					'off' => esc_html__( 'Disable', 'manual' ),
					'required' => array('doc-global-arcile-display-style','equals','2'),
				),
				array(
					'id'       => 'doc-global-page-bg-color',
					'type'     => 'color',
					'title'    => esc_html__( 'Page Background Color', 'manual' ),
					'subtitle' => esc_html__( 'Background color', 'manual' ),
					'default'  => '#f1f1f1',
					'transparent' => false,
					'required' => array( array('doc-global-arcile-display-style','equals','2'),
										 array('documentation-pg-content-box-shadow','equals',true)
										),
					'desc'  => esc_html__('Default: #f1f1f1','manual' ),
				),
				array(
					'id'       => 'doc-global-design2-content-box-margin-zero',
					'type'     => 'switch',
					'title'    => esc_html__( 'Container Row Zero Margin', 'manual' ),
					'default'  => false,
					'subtitle' => esc_html__( 'Make container row top & bottom margin zero', 'manual' ),
					'on' => esc_html__( 'Enable', 'manual' ),
					'off' => esc_html__( 'Disable', 'manual' ),
					'required' => array( array('doc-global-arcile-display-style','equals','2'),
										 array('documentation-pg-content-box-shadow','equals',true)
										),
				),
				array(
					'id'       => 'doc-global-design2-metabox-color',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Meta Color', 'manual' ),
					'subtitle' => esc_html__( 'Article Meta Color (article written by and date color)', 'manual' ),
					'default'  => array(
									'color' => '#808080',
									'alpha' => '.9'
								),
					'required' => array('doc-global-arcile-display-style','equals','2'),
				),
				array(
					'id'       => 'documentation-single-pg-print-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Print', 'manual' ),
					'default'  => true,
					'subtitle' => esc_html__( 'Turn Off; to remove article print feature from the post', 'manual' ),
					'on' => esc_html__( 'Enable', 'manual' ),
					'off' => esc_html__( 'Disable', 'manual' ),
				),
				array(
					'id'       => 'documentation-quick-stats-under-title',
					'type'     => 'switch',
					'title'    => esc_html__( 'Impression and Like Count', 'manual' ),
					'subtitle'     => esc_html__('Turn On; to remove total views and post like count from the post title', 'manual'),
					'default'  => false,
					'on' => esc_html__( 'Disable', 'manual' ),
					'off' => esc_html__( 'Enable', 'manual' ),
				),
				array(
					'id'       => 'documentation-singlepg-publish-date-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Post Publish Date', 'manual' ),
					'default'  => true,
					'subtitle' => esc_html__( 'Turn Off; to remove post publish date from the post title', 'manual' ),
					'on' => esc_html__( 'Enable', 'manual' ),
					'off' => esc_html__( 'Disable', 'manual' ),
					'required' => array('doc-global-arcile-display-style','equals','1'),
				),
				array(
					'id'       => 'documentation-singlepg-modified-date-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Post Modified Date', 'manual' ),
					'default'  => true,
					'subtitle' => esc_html__( 'Turn Off; to remove post modifed date from the post title', 'manual' ),
					'on' => esc_html__( 'Enable', 'manual' ),
					'off' => esc_html__( 'Disable', 'manual' ),
					'required' => array('doc-global-arcile-display-style','equals','1'),
				),
				array(
					'id'       => 'documentation-disable-doc-author-name',
					'type'     => 'switch',
					'title'    => esc_html__( 'Author', 'manual' ),
					'default'  => true,
					'subtitle' => esc_html__( 'Turn Off; to remove author name from the post title','manual' ),
					'on' => esc_html__( 'Enable', 'manual' ),
					'off' => esc_html__( 'Disable', 'manual' ),
					'required' => array('doc-global-arcile-display-style','equals','1'),
				),
				array(
					'id'       => 'documentation-single-post-user-name',
					'type'     => 'select',
					'title'    => esc_html__( 'Author Name By', 'manual' ),
					'subtitle' => esc_html__( 'Will appear under title i.e aricle display by', 'manual' ),
					'options'  => array(
						'user_login' => esc_html__('User Login','manual' ),
						'user_nicename' => esc_html__('User Nicename','manual' ),
						'user_registered' => esc_html__('User Registered','manual' ),
						'display_name' => esc_html__('Display Name','manual' ),
						'first_name' => esc_html__('First Name','manual' ),
						'user_firstname' => esc_html__('User Firstname','manual' ),
					),
					'default'  => 'user_nicename',
					'required' => array('documentation-disable-doc-author-name','equals','1'),
				),
		)
    ) );
	
	
	// SEARCH HANDLER 
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Ajax Page Load', 'manual' ),
        'id'               => 'documentation_ajaxload_settings_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
									
				array(
					'id'       => 'documentation-disable-ajaxload-content',
					'type'     => 'switch',
					'title'    => esc_html__('Ajax Load Article On|Off', 'manual' ),
					'subtitle' => esc_html__('System will perform normal content load', 'manual'),
					'default'  => false,
					'on' => esc_html__( 'Disable', 'manual' ),
					'off' => esc_html__( 'Enable', 'manual' ),
				),
				array(
					'id'       => 'doc_auto_scroll_screen_section',
					'type'     => 'section',
					'title'    => esc_html__( 'Auto-scroll web page while loading documentation post via ajax', 'manual' ),
					'indent'   => true, 
					'required' => array('documentation-disable-ajaxload-content','equals','0'),
				),
				array(
					'id'       => 'documentation-disable-autoscroll-content-article-title',
					'type'     => 'switch',
					'title'    => esc_html__('Disable auto-scroll web page to the documentation title', 'manual' ),
					'subtitle' => esc_html__('The web page will STOP auto-scrolls to the documentation title, while loading doc article via ajax', 'manual'),
					'default'  => false,
					'on' => esc_html__( 'Disable', 'manual' ),
					'off' => esc_html__( 'Enable', 'manual' ),
				),
				array(
					'id'       => 'doc_calljs_after_pageload_via_ajax_section',
					'type'     => 'section',
					'title'    => esc_html__( 'Call Javascript after documentation article is loaded via AJAX', 'manual' ),
					'indent'   => true, 
					'required' => array('documentation-disable-ajaxload-content','equals','0'),
				),
				array(
					'id'       => 'activate_js_call_after_ajax_page_load',
					'type'     => 'switch',
					'title'    => esc_html__( 'Trigger JavaScript Code', 'manual' ),
					'subtitle' => esc_html__('Run ANY JavaScript code globally when documenation article loaded via AJAX', 'manual'),
					'default'  => false,
					'on' => esc_html__( 'Enable', 'manual' ),
					'off' => esc_html__( 'Disable', 'manual' ),
				),
				array(
					'id'       => 'js_code_call_after_ajax_page_load',
					'type'     => 'ace_editor',
					'title'    => esc_html__( 'JS Code', 'manual' ),
					'subtitle' => esc_html__( 'Paste your JS code here.', 'manual' ),
					'required' => array('activate_js_call_after_ajax_page_load','equals','1'),
					'mode'     => 'javascript',
					'theme'    => 'chrome',
					'default'  => '
jQuery( document ).on("executeJSCodeOnAjaxCallDocPost", function(event, data){
		  
	// Unique Documentation Post ID
	postID = data.post_id;
	
	"use strict";
	
	// YOUR JS CODE OVER HERE.
		  
}); '
				),
				
				// Troubleshoot
				array(
					'id'       => 'doc_ajaxload_troubleshoot_section',
					'type'     => 'section',
					'title'    => esc_html__( 'Troubleshoot', 'manual' ),
					'indent'   => true, 
					'required' => array('documentation-disable-ajaxload-content','equals','0'),
				),
				array(
					'id'       => 'fix_documentation_busted_msg',
					'type'     => 'switch',
					'title'    => esc_html__('Fix "Busted!" message','manual' ),
					'subtitle' => esc_html__('when you trying to access specific documentation article and see the text message "Busted!"','manual' ),
					'default'  => false,
					'on' => esc_html__( 'Enable', 'manual' ),
					'off' => esc_html__( 'Disable', 'manual' ),
				),
				array(
					'id'       => 'activate-vc-inside-ajax-load-page-doc',
					'type'     => 'switch',
					'title'    => esc_html__( 'Activate VC Inside Documentation Page', 'manual' ),
					'subtitle' => esc_html__( 'allow visual composer inside ajax load documentation pages', 'manual' ),
					'desc' =>  __( '<strong style="color:red">ALERT:</strong> Documentation records are based on the ajax call request leading to block VC shortcode that fully depend on JQuery or Javascript function <br><br> <strong style="color:green">SOLUTION:</strong> Call ANY JavaScript or JQuery function on AJAX page load, from the section <strong>"Manual Options -> Documentation -> Call Javascript on AJAX Page Load"</strong>', 'manual' ),
					'default'  => false,
					'on' => esc_html__( 'Enable', 'manual' ),
					'off' => esc_html__( 'Disable', 'manual' ),
				),
		)
    ) );		
	
	
	// Gutenberg Editor
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Gutenberg Editor', 'manual' ),
        'id'               => 'doc_gutenberg_editor_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
				array(
					'id'       => 'doc-gutenberg-editor-onoff',
					'type'     => 'switch',
					'title'    => esc_html__( 'Enable Gutenberg Editor Inside Documentation Post', 'manual' ),
					'default'  => false,
					'on' => esc_html__( 'Enable', 'manual' ),
					'off' => esc_html__( 'Disable', 'manual' ),
				),
				
		)
    ) );
	
	
	// Page Template - "Documenation - Home" Settings
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Page Template - "Documenation - Home" Settings', 'manual' ),
        'id'               => 'documentation_pagetemplate_dochome_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
									
							array(
								'id'       => 'documentation-category-record-display-order',
								'type'     => 'select',
								'title'    => esc_html__( 'Display Order', 'manual' ),
								'subtitle' => esc_html__( 'Category records display order ', 'manual' ),
								'options'  => array(
									'ASC' => esc_html__('Ascending Order (ASC)','manual' ),
									'DESC' => esc_html__('Descending Order (DESC)','manual' ),
								),
								'default'  => 'ASC'
							),
							
							array(
								'id'       => 'documentation-category-record-display-order-by',
								'type'     => 'select',
								'title'    => esc_html__( 'Display Order By', 'manual' ),
								'subtitle' => esc_html__( 'Category records display order by', 'manual' ),
								'options'  => array(
									'id' => esc_html__('Order By ID','manual' ),
									'count' => esc_html__('Order By Count','manual' ),
									'name' => esc_html__('Order By Name ','manual' ),
									'slug' => esc_html__('Order By Slug ','manual' ),
									'none' => esc_html__('None','manual' ),
								),
								'default'  => 'name'
							),		
									
		)
    ) );
		

/**********************************************
*******  START  FAQ       *****
***********************************************/


	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'FAQ', 'manual' ),
        'id'               => 'theme_faq',
        'customizer_width' => '400px',
        'icon'             => 'el el-question-sign'
    ) );
	
	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Post Type & Breadcrumb Settings', 'manual' ),
        'id'               => 'faq_slug_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
				
				array(
					'id'       => 'faq-slug-name',
					'type'     => 'text',
					'title'    => esc_html__( 'FAQ Single Post (Slug Name)', 'manual' ),
					'desc'     => __( '<strong>Will appear as: </strong> http://domain.com/<strong>faqs</strong>/creating-new-kb-post/ <br><br> <div style="color: #D01B0B;"><strong>WARNING:</strong> FAQ single post slug name <strong>MUST BE</strong> different from the page name used to display FAQ. If same name provided system will show 404 on the different cases. </div>', 'manual' ),
					'default'  => 'faqs',
				),
				
			   array(
					'id'       => 'faq-cat-slug-name',
					'type'     => 'text',
					'title'    => esc_html__( 'FAQ Category (Slug Name)', 'manual' ),
					'desc'     => __( '<strong>Will appear as: </strong> http://domain.com/<strong>faq</strong>/customization/ <br><br> <div style="color: #D01B0B;"><strong>WARNING:</strong> Category Slug Name <strong>MUST BE</strong> different from the <strong>FAQ Single Post (Slug Name)</strong> and the page name used to display FAQ. 404 error page will appear if name matched on the different cases. <br><br> <strong>If possible do not change category slug name once set</strong>, if changed frequently it will show broken link and will also effect  search. </div>', 'manual' ),
					'default'  => 'faq',
				),
				
			   array(
					'id'       => 'faq-breadcrumb-name',
					'type'     => 'text',
					'title'    => esc_html__( 'FAQ Breadcrumb Name', 'manual' ),
					'desc'     => __( '<strong>Will appear as:</strong>  Home / <strong>FAQ</strong> / Customization /', 'manual' ),
					'default'  => 'FAQ',
				),
				
				array(
					'id'       => 'faq-breadcrumb-custom-home-url',
					'type'     => 'text',
					'title'    => esc_html__( 'FAQ Home Page URL', 'manual' ),
					'desc'     => __( '<strong>Will link breadcrumb as:</strong>  Home / <a href="">FAQ</a> / Customization /', 'manual' ),
					'subtitle' => esc_html__( 'Custom home page URL for your FAQ', 'manual' ),
					'default'  => '',
				),
	
		)
    ) );

	
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Category Page', 'manual' ),
        'id'     => 'theme_faq_section',
	    'subsection' => true,
        'fields' => array(
		
			array(
					'id'       => 'faq-display-order',
					'type'     => 'select',
					'title'    => esc_html__( 'Records Display Order', 'manual' ),
					'subtitle' => esc_html__( 'FAQ records order', 'manual' ),
					'options'  => array(
						'1' => esc_html__('Ascending Order (ASC)','manual' ),
						'2' => esc_html__('Descending Order (DESC)','manual' ),
					),
					'default'  => '2'
			),
			
			array(
				'id'       => 'faq-display-order-by',
				'type'     => 'select',
				'title'    => esc_html__( 'FAQ Display Order By', 'manual' ),
				'subtitle' => esc_html__( 'FAQ records order by', 'manual' ),
				'options'  => array(
					'date' => esc_html__('Order By Date','manual' ),
					'modified' => esc_html__('Order By Last Modified Date','manual' ),
					'title' => esc_html__('Order By Title','manual' ),
					'rand' => esc_html__('Order By Random','manual' ),
					'menu_order' => esc_html__('Order By Page Order','manual' ),
					'comment_count' => esc_html__('Order By Number of Comments','manual' ),
					'none' => esc_html__('None','manual' ),
				),
				'default'  => 'date'
			),
			
			array(
                'id'       => 'faq-display-sidebar-status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Disable Sidebar', 'manual' ),
                'subtitle' => esc_html__( 'If checked FAQ sidebar will disable', 'manual' ),
                'default'  => false,
            ),
			
			
			array(
				'id'       => 'faq-sidebar-display-position',
				'type'     => 'select',
				'title'    => esc_html__( 'Sidebar Position', 'manual' ),
				'options'  => array(
					'left' => esc_html__('Left','manual' ),
					'right' => esc_html__('Right','manual' ),
				),
				'default'  => 'left'
			),
			
			array(
                'id'       => 'faq-display-social-share',
                'type'     => 'switch',
                'title'    => esc_html__( 'Social Share', 'manual' ),
                'subtitle' => esc_html__( 'show hide social share inside FAQ blocks', 'manual' ),
                'default'  => true,
				'desc'    => esc_html__( 'On == Enable', 'manual' ),
            ),
			
			array(
                'id'       => 'faq-ed-expandcollapse',
                'type'     => 'switch',
                'title'    => esc_html__( '"Expand / Collapse All" Text', 'manual' ),
                'subtitle' => esc_html__( 'Disable/Enable "Expand / Collapse All" ', 'manual' ),
                'default'  => true,
				'desc'    => esc_html__( 'Off == Disable', 'manual' ),
            ),
			
		
		)
    ) );
	
	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Category Page - Custom Title', 'manual' ),
        'id'               => 'faq_custom_title_design_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
					array(
						'id'       => 'faq-typography-title-overwrite',
						'type'     => 'switch',
						'title'    => esc_html__( 'Overwrite <h5> Title Tag', 'manual' ),
						'default'  => false,
						'subtitle' => esc_html__( 'Enabling this feature will overwrite <h5> tag', 'manual' ),
					),
		
					array(
					'id'       => 'faq-custom-title-font-weight',
					'type'     => 'select',
					'title'    => esc_html__( 'Font Weight', 'manual' ),
					'options'  => array(
						'100' => esc_html__('100','manual' ),
						'200' => esc_html__('200','manual' ),
						'300' => esc_html__('300','manual' ),
						'400' => esc_html__('400','manual' ),
						'500' => esc_html__('500','manual' ),
						'600' => esc_html__('600','manual' ),
						'700' => esc_html__('700','manual' ),
						'800' => esc_html__('800','manual' ),
						'900' => esc_html__('900','manual' ),
					),
					'default'  => '600',
					'subtitle' => esc_html__('Font weight totally depens on type of google "font family" you had choose from the "Typography" section','manual' ),
					'required' => array('faq-typography-title-overwrite','equals','1'), 
				),
                
                
                array(
					'id'            => 'faq-custom-title-font-size',
					'type'          => 'slider',
					'title'         => esc_html__( 'Font Size', 'manual' ),
					'default'       => 19,
					'min'           => 1,
					'step'          => 1,
					'max'           => 50,
					'display_value' => 'label',
					'desc' => esc_html__('Default: 19px','manual' ),
					'display_value' => 'text',
					'required' => array('faq-typography-title-overwrite','equals','1'), 
				),
                
                array(
					'id'       => 'faq-custom-title-text-transform',
					'type'     => 'select',
					'title'    => esc_html__( 'Text Transform', 'manual' ),
					'options'  => array(
						'none' => esc_html__('none','manual' ),
						'capitalize' => esc_html__('Capitalize','manual' ),
						'uppercase' => esc_html__('Uppercase','manual' ),
						'lowercase' => esc_html__('Lowercase','manual' ),
					),
					'default'  => 'none',
					'required' => array('faq-typography-title-overwrite','equals','1'), 
				),
		
	  )
    ) );
	
	
	// Search Handler
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Search Settings', 'manual' ),
        'id'               => 'faq_search_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
				
				array(
					'id'       => 'faq-hash-search-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Hash Search', 'manual' ),
					'subtitle' => esc_html__('If disable, system will redirect to the single FAQ page', 'manual'),
					'default'  => true,
				),
		
		)
    ) );	


	
/**********************************************
*******  START  PORTFOLIO       *****
***********************************************/

		Redux::setSection( $opt_name, array(
			'title'            => esc_html__( 'Portfolio', 'manual' ),
			'id'               => 'theme_portfolio_section',
			'customizer_width' => '400px',
			'icon'             => 'el el-picture'
		) );
		
		 Redux::setSection( $opt_name, array(
			'title'      => esc_html__( 'Post Type & Breadcrumb Settings', 'manual' ),
			'id'         => 'manual-portfolio-settings',
			'subsection' => true,
			'fields'     => array(
			
			   array(
					'id'       => 'portfolio-slug-name',
					'type'     => 'text',
					'title'    => esc_html__( 'Portfolio Single Post (Slug Name)', 'manual' ),
					'desc'     => __( '<strong>Will appear as: </strong> http://domain.com/<strong>work</strong>/single-portfolio-record/ <br><br>  <div style="color: #D01B0B;"><strong>WARNING:</strong> Single post portfolio <strong>Slug Name</strong> must be different from the page name used to display portfolio</strong>. If same name provided system will show 404 error page when used Portfolio pagination. ', 'manual' ),
					'default'  => 'work',
				),
				
			   array(
					'id'       => 'portfolio-cat-slug-name',
					'type'     => 'text',
					'title'    => esc_html__( 'Portfolio Category (Slug Name)', 'manual' ),
					'desc'     => __( '<strong>Will appear as: </strong> http://domain.com/<strong>pfocat</strong>/themes/ <br><br> <div style="color: #D01B0B;"><strong>WARNING:</strong> Category Slug Name must be different from the <strong>Portfolio Single Post (Slug Name)</strong>. If same name provided system will show 404 error page when click on the Portfolio category link. <br><br> <strong>If possible do not change category slug name once set</strong>, if changed frequently it will show broken link and will also effect search. </div>', 'manual' ),
					'default'  => 'pfocat',
				),
				
				array(
					'id'       => 'portfolio-breadcrumb-name',
					'type'     => 'text',
					'title'    => esc_html__( 'Portfolio Breadcrumb Name', 'manual' ),
					'desc'     => __( '<strong>Will appear as:</strong>  Home / <strong>Portfolio</strong> / Customization /', 'manual' ),
					'default'  => 'Portfolio',
				),
				
				array(
					'id'       => 'portfolio-breadcrumb-custom-home-url',
					'type'     => 'text',
					'title'    => esc_html__( 'Portfolio Home Page URL', 'manual' ),
					'desc'     => __( '<strong>Will link breadcrumb as:</strong>  Home / <a href="">Portfolio</a> / Customization /', 'manual' ),
					'subtitle' => esc_html__( 'Custom home page URL for your Portfolio', 'manual' ),
					'default'  => '',
				),
				
			)
		) );
		
		
		Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Single Page Settings', 'manual' ),
        'id'               => 'portfolio_single_page_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
									
						array(
							'id'       => 'portfolio-comment-status',
							'type'     => 'switch',
							'title'    => esc_html__( 'Activate Comment Box', 'manual' ),
							'subtitle' => esc_html__('Allow comments on each portfolio article', 'manual'),
							'default'  => false,
						),
						
						array(
							'id'       => 'portfolio-next-previous-status',
							'type'     => 'switch',
							'title'    => esc_html__('Deactivate Next/Previous Link ', 'manual' ),
							'subtitle' => esc_html__('Disable previous / next link at the bottom of the portfolio single page', 'manual'),
							'default'  => false,
						),			
									
			)
		) );
		
		
		
		
		
/**********************************************
*******  START BLOG       *****
***********************************************/

	Redux::setSection( $opt_name, array(
			'title'            => esc_html__( 'Blog', 'manual' ),
			'id'               => 'theme_blog_section',
			'customizer_width' => '400px',
			'icon'             => 'el el-file-edit'
	) );
	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Blog Home Settings', 'manual' ),
        'id'               => 'blog_home_settings',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
				array(
					'id'       => 'blog_home_sidebar',
					'type'     => 'switch',
					'title'    => esc_html__( 'Sidebar', 'manual' ),
					'subtitle' => esc_html__('on/off sidebar from the blog home page','manual' ),
					'default'  => true,
				),
		)
    ) );
	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Custom Breadcrumb', 'manual' ),
        'id'               => 'blog_breadcrumb_settings',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
									
				array(
					'id'       => 'blog-breadcrumb-name',
					'type'     => 'text',
					'title'    => esc_html__( 'Custom Breadcrumb Name', 'manual' ),
					'desc'     => __( '<strong>Will appear as:</strong>  Home / <strong>{BLOG CUSTOM NAME}</strong> / Category Name / Latest News /', 'manual' ),
					'default'  => '',
					'subtitle' => esc_html__( 'Will replace blog page name', 'manual' ),
				),
				
				array(
					'id'       => 'remove_blog_breadcrumb_name',
					'type'     => 'switch',
					'title'    => esc_html__( 'Remove Custom/Category Name from the Breadcrumb', 'manual' ),
					'desc'     => __('<strong>Will appear as:</strong>  Home / Latest News /','manual' ),
					'default'  => false,
					'subtitle' => esc_html__( 'On == Disable', 'manual' ),
				),
									
									
		)
    ) );	
	

    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Blog Post Settings', 'manual' ),
        'id'     => 'theme_blog_section_singlepg',
        'subsection' => true,
        'fields' => array(

				array(
					'id'       => 'blog_single_page_global_header_settings',
					'type'     => 'switch',
					'title'    => esc_html__( 'Apply "Front Post Page" Header Settings To All The Blog Area', 'manual' ),
					'subtitle' => __('<strong style="color:#11d62b;">Applyed to all the blog area (i.e Categories, Archives, Tag pages) but, EXCEPT single blog post.</strong>', 'manual' ),
					'default'  => false,
					'desc'    => esc_html__( 'Off == Disable', 'manual' ),
				),
				
				array(
					'id'       => 'manual_blog_single_page_settings',
					'type'     => 'section',
					'title'    => esc_html__( 'Blog Single Page Settings', 'manual' ),
					'indent'   => true,
				),
				
				array(
					'id'       => 'blog_single_title_on_content_area',
					'type'     => 'switch',
					'title'    => esc_html__( 'Blog Title', 'manual' ),
					'subtitle' => __('<strong>on/off blog title from the page content</strong>','manual' ),
					'default'  => false,
					'desc'    => esc_html__( 'Off == Disable', 'manual' ),
				),
				
				array(
					'id'       => 'blog_single_page_icon_format',
					'type'     => 'switch',
					'title'    => esc_html__( 'Format Icon', 'manual' ),
					'subtitle' => esc_html__('remove icon format from the single post','manual' ),
					'default'  => true,
					'desc'    => esc_html__( 'On == Disable', 'manual' ),
				),
				
				array(
					'id'       => 'blog_single_social_share_status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Social Share', 'manual' ),
					'subtitle' => esc_html__('on/off social share from the blog post', 'manual'),
					'default'  => true,
					'desc'    => esc_html__( 'Off == Disable', 'manual' ),
				),
				
				array(
					'id'       => 'blog_single_sidebar_status',
					'type'     => 'switch',
					'title'    => esc_html__('Sidebar', 'manual'),
					'subtitle' => esc_html__('on/off sidebar from the blog post', 'manual'),
					'default'  => true,
					'desc'    => esc_html__( 'Off == Disable', 'manual' ),
				),
				
				array(
					'id'       => 'blog_single_page_sidebar_center_content',
					'type'     => 'switch',
					'title'    => esc_html__('Apply Center Content', 'manual'),
					'subtitle' => '<strong style="color:#11d62b;">Feature work, when single page sidebar is OFF</strong>',
					'default'  => false,
					'desc'    => esc_html__( 'Off == Disable', 'manual' ),
				),

		)
    ) );	
		
		
		
/*************************************
*******  404 Page Content  *****
**************************************/
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( '404 Page', 'manual' ),
        'id'               => '404-pagecontent',
        'customizer_width' => '450px',
		'icon'             => 'el el-error',
        'fields'           => array(
									
					array(
						'id'       => '404-page-background-color',
						'type'     => 'color',
						'title'    => esc_html__( 'Page Background Color', 'manual' ),
						'subtitle' => esc_html__( 'Background color', 'manual' ),
						'default'  => '#FFFFFF',
						'transparent' => false,
						'desc'  => esc_html__('Default: #FFFFFF', 'manual' ),
					),
						
					array(
						'id'       => '404-disable-page-search',
						'type'     => 'switch',
						'title'    => esc_html__( 'Search Box', 'manual' ),
						'subtitle'    => esc_html__( 'Display search box inside page content', 'manual' ),
						'default'  => false,
						'on' => esc_html__( 'Enable', 'manual' ),
						'off' => esc_html__( 'Disable', 'manual' ),
					),
					
					array(
						'id'       => '404-disable-page-contnet',
						'type'     => 'switch',
						'title'    => esc_html__( 'Page Content', 'manual' ),
						'subtitle'    => esc_html__( 'Control page content display', 'manual' ),
						'default'  => true,
						'on' => esc_html__( 'Enable', 'manual' ),
						'off' => esc_html__( 'Disable', 'manual' ),
					),
					
					array(
						'id'       => '404-pagetitme',
						'type'     => 'text',
						'title'    => esc_html__( 'Title Text', 'manual' ),
						'default'  => '404',
						'required' => array('404-disable-page-contnet','equals','1'),
					),
					
					array(
						'id'       => '404-sustitle',
						'type'     => 'text',
						'title'    => esc_html__( 'Sub-title Text', 'manual' ),
						'default'  => esc_html__('Oops! That page can\'t be found','manual' ),
						'required' => array('404-disable-page-contnet','equals','1'),
					),
					
					array(
						'id'       => '404-contenttext',
						'type'     => 'text',
						'title'    => esc_html__( 'Body Content Text', 'manual' ),
						'default'  => esc_html__('The link BROKEN, or the page has been REMOVED. Try search our site.','manual' ),
						'required' => array('404-disable-page-contnet','equals','1'),
					),
					
					array(
						'id'       => '404-title-text-color',
						'type'     => 'color',
						'title'    => esc_html__( 'Title Text Color', 'manual' ),
						'default'  => '#002e5b',
						'transparent' => false,
					),
					
					array(
						'id'       => '404-subtitle-text-color',
						'type'     => 'color',
						'title'    => esc_html__( 'Sub Title Text Color', 'manual' ),
						'default'  => '#363d40',
						'transparent' => false,
					),
					
					array(
						'id'       => '404-contenttext-color',
						'type'     => 'color',
						'title'    => esc_html__( 'Content Text Color', 'manual' ),
						'default'  => '#002e5b',
						'transparent' => false,
					),
					
									
		)
	) );		
		
		
		
/**********************************************
*******  //  FORUM SECTION  //     *****
***********************************************/
if ( class_exists( 'bbPress' ) ) {

	 Redux::setSection( $opt_name, array(
			'title'      => esc_html__( 'Forum', 'manual' ),
			'id'         => 'theme-forum-settings',
			'icon'       => 'el el-comment-alt',
			'fields'     => array(					  
			
           array(
                'id'       => 'manual-forum-yes-no-sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Forum Section "with or without sidebar"', 'manual' ),
                'options'  => array(
                    '1' => array(
                        'alt' => '1 Column',
                        'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                    ),
                    '2' => array(
                        'alt' => '2 Column Right',
                        'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                    ),
                    
                ),
                'default'  => '2'
            ),
			
			array(
                'id'      => 'manual-forum-message',
                'type'    => 'editor',
                'title'   => esc_html__( 'User Alert Message', 'manual' ),
				'subtitle' => esc_html__( 'Qill appear ONLY on the forum home page', 'manual' ),
                'default' => '',
                'args'    => array(
                    'wpautop'       => false,
                    'media_buttons' => false,
                    'textarea_rows' => 5,
                    'teeny'         => false,
                    'quicktags'     => false,
                )
            ),
			
			array(
				'id'       => 'bbpress-forum-header-settings',
				'type'     => 'section',
				'title'    => esc_html__( 'Forum Header - Design Control', 'manual' ),
				'indent'   => true, 
			),
			
			array(
				'id'       => 'bbpress-forum-header-height',
				'type'          => 'slider',
				'title'         => esc_html__( 'Forum Header Height', 'manual' ),
				'default'       => 8,
				'min'           => 6,
				'step'          => 1,
				'max'           => 20,
				'display_value' => 'label',
				'subtitle' => esc_html__('Default:8','manual' ),
				'display_value' => 'text', 
			),
			
			array(
               'id'       => 'bbpress-forum-header-background-color',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Background Color', 'manual' ),
                'default'  => array(
                    'color' => '#efefef',
                    'alpha' => '0.9'
                ),
                'mode'     => 'background',
            ),
			
			array(
				'id'       => 'bbpress-forum-header-background-text-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Text Color', 'manual' ),
				'transparent' => false,
			),
			
			array(
				'id'       => 'bbpress-forum-header-font-size',
				'type'          => 'slider',
				'title'         => esc_html__( 'Font Size', 'manual' ),
				'default'       => 13,
				'min'           => 8,
				'step'          => 1,
				'max'           => 18,
				'display_value' => 'label',
				'subtitle' => esc_html__('Default:13', 'manual' ),
				'display_value' => 'text', 
			),
			
			array(
				'id'       => 'bbpress-forum-header-font-weight',
				'type'     => 'select',
				'title'    => esc_html__( 'Font Weight', 'manual' ),
				'options'  => array(
					'' => esc_html__('Default','manual' ),
					'100' => esc_html__('100','manual' ),
					'200' => esc_html__('200','manual' ),
					'300' => esc_html__('300','manual' ),
					'400' => esc_html__('400','manual' ),
					'500' => esc_html__('500','manual' ),
					'600' => esc_html__('600','manual' ),
					'700' => esc_html__('700','manual' ),
					'800' => esc_html__('800','manual' ),
					'900' => esc_html__('900','manual' ),
				),
				'default'  => '',
			),
			
			array(
				'id'       => 'bbpress-forum-header-border-top-height',
				'type'          => 'slider',
				'title'         => esc_html__( 'Forum Header Border Top Height', 'manual' ),
				'default'       => 1,
				'min'           => 1,
				'step'          => 1,
				'max'           => 8,
				'display_value' => 'label',
				'subtitle' => esc_html__( 'Default:1', 'manual' ),
				'display_value' => 'text', 
			),
			
			array(
               'id'       => 'bbpress-forum-header-border-top-color',
               'type'     => 'color_rgba',
               'title'    => esc_html__( 'Border Color', 'manual' ),
               'mode'     => 'background',
            ),
			
			
			array(
				'id'       => 'bbpress-forum-container-settings',
				'type'     => 'section',
				'title'    => esc_html__( 'Forum Container - Design Control', 'manual' ),
				'indent'   => true, 
			),
			
			array(
				'id'       => 'bbpress-forum-container-description-fontsize',
				'type'          => 'slider',
				'title'         => esc_html__( 'Forum Description Font Size', 'manual' ),
				'default'       => 13,
				'min'           => 10,
				'step'          => 1,
				'max'           => 18,
				'display_value' => 'label',
				'subtitle' => esc_html__('Default:13', 'manual' ),
				'display_value' => 'text', 
			),
			
			
        )
    ) );
	 
}

/*************************************
*******  LEARNPRESS - SETTINGS  *****
**************************************/
if(class_exists( 'LearnPress' )) {
	
	 Redux::setSection( $opt_name, array(
			'title'      => esc_html__( 'LearnPress', 'manual' ),
			'id'         => 'learnpress_settings',
			'icon'       => 'el el-star',
			'fields'     => array(
						array(
							'id'       => 'learnpress_display_feature_image',
							'type'     => 'switch',
							'title'    => esc_html__( 'Feature Image', 'manual' ),
							'subtitle' => esc_html__( 'Display feature image at the top of the single page content area', 'manual' ),
							'default'  => false,
						),
						// Archive Page
						array(
							'id'       => 'learnpress_archive_pg_customization',
							'type'     => 'section',
							'title'    => esc_html__( 'Archive Page', 'manual' ),
							'indent'   => true, 
						),
						array(
							'id'       => 'learnpress_archive_pg_course_column',
							'type'     => 'select',
							'title'    => esc_html__( 'Course Columns', 'manual' ),
							'subtitle' => esc_html__( 'Course display column', 'manual' ),
							'options'  => array(
								'6' => esc_html__('2 Columns','manual' ),
								'4' => esc_html__('3 Columns','manual' ),
								'3' => esc_html__('4 Columns','manual' ),
							),
							'default'  => '3'
						),
						array(
							'id'       => 'learnpress_archive_pg_course_titletag',
							'type'     => 'select',
							'title'    => esc_html__( 'Title Tag', 'manual' ),
							'options'  => array(
								'h3' => esc_html__('h3', 'manual' ),
								'h4' => esc_html__('h4', 'manual' ),
								'h5' => esc_html__('h5', 'manual' ),
								'h6' => esc_html__('h6', 'manual' ),
							),
							'default'  => 'h5', 
						),
						array(
							'id'       => 'learnpress_archive_post_course_price_titletag',
							'type'     => 'select',
							'title'    => esc_html__( 'Price Tag', 'manual' ),
							'options'  => array(
								'h4' => esc_html__('h4', 'manual' ),
								'h5' => esc_html__('h5', 'manual' ),
								'h6' => esc_html__('h6', 'manual' ),
							),
							'default'  => 'h5', 
						),
						// Related Post
						array(
							'id'       => 'learnpress_related_post_customization',
							'type'     => 'section',
							'title'    => esc_html__( 'Related Course', 'manual' ),
							'indent'   => true, 
						),
						array(
							'id'       => 'learnpress_related_post_course_column',
							'type'     => 'select',
							'title'    => esc_html__( 'Related Post Columns', 'manual' ),
							'subtitle' => esc_html__( 'Related post course column', 'manual' ),
							'options'  => array(
								'4' => esc_html__('3 Columns','manual' ),
								'3' => esc_html__('4 Columns','manual' ),
							),
							'default'  => '3'
						),
						array(
							'id'       => 'learnpress_related_post_course_titletag',
							'type'     => 'select',
							'title'    => esc_html__( 'Title Tag', 'manual' ),
							'options'  => array(
								'h3' => esc_html__('h3', 'manual' ),
								'h4' => esc_html__('h4', 'manual' ),
								'h5' => esc_html__('h5', 'manual' ),
								'h6' => esc_html__('h6', 'manual' ),
							),
							'default'  => 'h5', 
						),
						array(
							'id'       => 'learnpress_related_post_course_price_titletag',
							'type'     => 'select',
							'title'    => esc_html__( 'Price Tag', 'manual' ),
							'options'  => array(
								'h4' => esc_html__('h4', 'manual' ),
								'h5' => esc_html__('h5', 'manual' ),
								'h6' => esc_html__('h6', 'manual' ),
							),
							'default'  => 'h5', 
						),
			 )
    ) );
}
	 
/*************************************
*******  WOOCOMMERCE - SETTINGS  *****
**************************************/
	
global $woocommerce;
if ($woocommerce) {
	
	 Redux::setSection( $opt_name, array(
			'title'      => esc_html__( 'WooCommerce', 'manual' ),
			'id'         => 'theme_woocommerce',
			'icon'       => 'el el-shopping-cart',
			'fields'     => array(
		
				array(
					'id'       => 'woo_column_product_listing',
					'type'     => 'select',
					'title'    => esc_html__( 'Number Of Columns', 'manual' ),
					'subtitle' => esc_html__( 'Choose number of columns for product listing', 'manual' ),
					'options'  => array(
						'3' => esc_html__('3 Columns','manual' ),
						'4' => esc_html__('4 Columns','manual' ),
					),
					'default'  => '3'
				),
				
				array(
					'id'       => 'woo_display_sidebar_on_product_listing_page',
					'type'     => 'switch',
					'title'    => esc_html__( 'Display Sidebar', 'manual' ),
					'subtitle' => esc_html__( 'Display sidebar on the product listing page i.e on default shop page', 'manual' ),
					'default'  => true,
				),
				
				array(
					'id'       => 'woo_no_of_related_products',
					'type'     => 'select',
					'title'    => esc_html__( 'Number Of Related Products', 'manual' ),
					'subtitle' => esc_html__( 'Choose number of related products', 'manual' ),
					'options'  => array(
						'3' => '3 Columns',
						'4' => '4 Columns',
					),
					'default'  => '4'
				),
				
		 )
    ) );
	
}

		
/********************************************************
*******  START - PAGE TEMPLATE "Home Page" SETTINGS *****
*********************************************************/
	 
	Redux::setSection( $opt_name, array(
		'title'            => esc_html__( 'Page Template "Home Page" Settings', 'manual' ),
		'id'               => 'homeconfg',
		'desc'             => esc_html__( 'These are really basic fields!', 'manual' ),
		'customizer_width' => '400px',
		'icon'             => 'el el-home'
	) );
		
	// Help Section	
	Redux::setSection( $opt_name, array(
		'title'            => esc_html__( 'Home Help Block', 'manual' ),
		'id'               => 'help-section',
		'subsection'       => true,
		'customizer_width' => '450px',
		'fields'           => array(
		
		
			array(
				'id'    => 'home-help-section-info',
				'type'  => 'info',
				'style' => 'info',
				'notice' => false,
				'title' => esc_html__( 'IMPORTANT NOTE', 'manual' ),
				'desc'  => __( '<br>Please go to <strong>"Home Help Blocks -> Add New Block"</strong> to add new blocks on the Help Section', 'manual' )
			),
		
			array(
				'id'       => 'home-help-section-status',
				'type'     => 'switch',
				'title'    => esc_html__( 'Activate Home Help Block', 'manual' ),
				'default'  => true,
			),
			
			array(
				'id'       => 'home-help-section-mindisplay-blocks',
				'type'     => 'select',
				'title'    => esc_html__( 'Display Minimum "X" no of Help Blocks', 'manual' ),
				'subtitle' => esc_html__( 'Choose minimum number of help blocks to display', 'manual' ),
				'options'  => array(
					'3' => esc_html__('Block 3','manual' ),
					'4' => esc_html__('Block 4','manual' ),
				),
				'default'  => '4'
			),
			
			array(
				'id'       => 'home-help-section-title-main',
				'type'     => 'text',
				'title'    => esc_html__( 'Title Text', 'manual' ),
				'subtitle' => esc_html__( 'Main title text', 'manual' ),
				'default'  => 'Help Desk',
			),
		
		    array(
				'id'      => 'home-help-section-msg-short',
				'type'    => 'textarea',
				'title'   => esc_html__( 'Sub Title', 'manual' ),
				'default' => esc_html__('Easily create Documentation, Knowledge-base, FAQ, Forum and more using page layouts and the tools we provide.','manual' ),
			),
			
		)
	) );
	
	// Testimonials	
	Redux::setSection( $opt_name, array(
		'title'            => esc_html__( 'Testimonials', 'manual' ),
		'id'               => 'home-testimonials-section',
		'subsection'       => true,
		'customizer_width' => '450px',
		'fields'           => array(
									
			array(
				'id'    => 'home-testimonials-info',
				'type'  => 'info',
				'style' => 'info',
				'notice' => false,
				'title' => esc_html__( 'IMPORTANT NOTE', 'manual' ),
				'desc'  => __( '<br>Please click to <strong>"Testimonial -> Add New Block"</strong> to add new Testimonials', 'manual' )
			),						
			array(
				'id'       => 'home-testimonials-status',
				'type'     => 'switch',
				'title'    => esc_html__( 'Testimonial Display Status', 'manual' ),
				'default'  => true,
			),
			array(
				'id'       => 'testimonials-plx-url',
				'type'     => 'media',
				'title'    => esc_html__( 'Testimonial Parallax Image', 'manual' ),
			),
			
		)
	) );
	
	// Organization Blocks	
	Redux::setSection( $opt_name, array(
		'title'            => esc_html__( 'Home Org Blocks', 'manual' ),
		'id'               => 'home-org-blocks-section',
		'subsection'       => true,
		'customizer_width' => '450px',
		'fields'           => array(
									
			array(
				'id'    => 'home-org-help-section-info',
				'type'  => 'info',
				'style' => 'info',
				'notice' => false,
				'title' => esc_html__( 'IMPORTANT NOTE', 'manual' ),
				'desc'  => __( '<br>Please click to <strong>"Home Org Blocks -> Add New Block"</strong> to add new blocks', 'manual' )
			),						
		
			array(
				'id'       => 'home-org-block-status',
				'type'     => 'switch',
				'title'    => esc_html__( 'Home Org Blocks Display Status', 'manual' ),
				'default'  => true,
			),
			
			 array(
				'id'       => 'home-org-block-background-url',
				'type'     => 'media',
				'title'    => esc_html__( 'Sidebar Image', 'manual' ),
			),
			
			array(
				'id'       => 'home-org-block-main-title',
				'type'     => 'text',
				'title'    => esc_html__( 'Title Text', 'manual' ),
				'subtitle' => esc_html__( 'Main title text', 'manual' ),
				'default'  => 'Why People Love Us',
			),
			
		   array(
				'id'      => 'home-org-block-sub-title',
				'type'    => 'textarea',
				'title'   => esc_html__( 'Sub Title', 'manual' ),
				'default' => 'Loaded with awesome features like Documentation, Knowledgebase, Forum & more!',
			),
			
			
		)
	) );
		
	// Message Bar	
	Redux::setSection( $opt_name, array(
		'title'            => esc_html__( 'Message Bar', 'manual' ),
		'id'               => 'home-message-bar-section',
		'subsection'       => true,
		'customizer_width' => '450px',
		'fields'           => array(
		
			array(
				'id'       => 'de-message-bar',
				'type'     => 'switch',
				'title'    => esc_html__( 'Message Bar Display Status', 'manual' ),
				'default'  => true,
			),
			
			array(
				'id'       => 'message-bar-main-title',
				'type'     => 'text',
				'title'    => esc_html__( 'Title Text', 'manual' ),
				'subtitle' => esc_html__( 'Main title text', 'manual' ),
				'default'  => 'Didn\'t find the question you were searching?',
			),
			
		   array(
				'id'      => 'message-bar-sub-title',
				'type'    => 'textarea',
				'title'   => esc_html__( 'Sub Title', 'manual' ),
				'default' => 'Loaded with awesome features like Documentation, Knowledgebase, Forum & more!',
			),
			
			array(
				'id'       => 'message-bar-bottom-display-text',
				'type'     => 'text',
				'title'    => esc_html__( 'Bottom Text', 'manual' ),
				'subtitle' => esc_html__( 'Bottom display text', 'manual' ),
				'default'  => 'Go To Live Chat',
			),
		
			array(
				'id'       => 'message-bar-bottom-url',
				'type'     => 'text',
				'title'    => esc_html__( 'Bottom Url', 'manual' ),
				'default' => '#',
			),
		
			
			
		)
	) );
	 
	// Fun Act
	Redux::setSection( $opt_name, array(
		'title'            => esc_html__( 'Fun Act', 'manual' ),
		'id'               => 'home-funact-section',
		'subsection'       => true,
		'customizer_width' => '450px',
		'fields'           => array(
		
			array(
				'id'       => 'home-funact-status',
				'type'     => 'switch',
				'title'    => esc_html__( 'Fun Act Display Status', 'manual' ),
				'default'  => true,
			),
			
			 array(
			'id'       => 'funact-plx-url',
			'type'     => 'media',
			'title'    => esc_html__( 'Fun Act Parallax Image', 'manual' ),
			),
			
			array(
				'id'       => 'home-funact-main-title',
				'type'     => 'text',
				'title'    => esc_html__( 'Title Text', 'manual' ),
				'subtitle' => esc_html__( 'Main title text', 'manual' ),
				'default'  => 'Something you dont know...',
			),
			
		   array(
				'id'      => 'home-funact-sub-title',
				'type'    => 'textarea',
				'title'   => esc_html__( 'Sub Title', 'manual' ),
				'default' => 'Loaded with awesome features like Documentation, Knowledgebase, Forum & more!',
			),
			
			array(
			'id'       => 'home-funact-sortable',
			'type'     => 'sortable',
			'title'    => esc_html__( 'Fun Act', 'manual' ),
			'subtitle' => esc_html__( 'Define organization fun act.', 'manual' ),
			'label'    => true,
			'options'  => array(
				'Text One'   => esc_html__('Happy Customers','manual' ),
				'Text Two'   => esc_html__('Projects','manual' ),
				'Text Three' => esc_html__('Satisfied Clients','manual' ),
				'Text Four' => esc_html__('Problem Solved','manual' ),
				)
			 ),
			 
			array(
			'id'       => 'home-funact-no-sortable',
			'type'     => 'sortable',
			'title'    => esc_html__( 'Fun Act Number', 'manual' ),
			'subtitle' => __( 'Define organization fun act Number.', 'manual' ),
			'label'    => true,
			'options'  => array(
				'Text One'   => '',
				'Text Two'   => '',
				'Text Three' => '',
				'Text Four' => '',
				)
			 ),
			
		)
	) );
		

/*************************************
*******  START - NOTIFICATION BAR  *****
**************************************/

	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Notification Bar', 'manual' ),
        'id'               => 'footer-notification-bar',
        'customizer_width' => '450px',
		'icon'             => 'el el-bullhorn',
        'fields'           => array(
		
			array(
				'id'       => 'footer-notification-status',
				'type'     => 'switch',
				'title'    => esc_html__( 'Notification Bar Display Status', 'manual' ),
				'default'  => true,
			),
			
			array(
                'id'       => 'footer-notification-bar-bg-color',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Background Color', 'manual' ),
                'default'  => array(
                    'color' => '#5AA773',
                    'alpha' => '1'
                ),
                'mode'     => 'background',
				'required' => array('footer-notification-status','equals',true),
            ),
			
			array(
                'id'       => 'footer-notification-bar-linear-gradient-color',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Linear Gradient Background Color', 'manual' ),
                'mode'     => 'background',
				'required' => array('footer-notification-status','equals',true),
            ),
			
			array(
                'id'       => 'footer-notification-bar-background-img',
                'type'     => 'media',
                'url'      => false,
                'title'    => esc_html__( 'Background Image', 'manual' ),
                'compiler' => 'true',
				'required' => array('footer-notification-status','equals',true),
            ),
			
			array(
                'id'            => 'footer-notification-bar-text-margin',
                'type'          => 'slider',
                'title'         => esc_html__( 'Text Margin Top/Bottom', 'manual' ),
                'default'       => 1,
                'min'           => 1,
                'step'          => 1,
                'max'           => 200,
                'display_value' => 'label',
				'display_value' => 'text',
				'required' => array('footer-notification-status','equals',true),
            ),
		
			array(
                'id'      => 'footer-text',
                'type'    => 'editor',
                'title'   => esc_html__( 'Message', 'manual' ),
				'required' => array('footer-notification-status','equals',true),
                'args'    => array(
                    'wpautop'       => false,
                    'media_buttons' => false,
                    'textarea_rows' => 5,
                    'teeny'         => false,
                    'quicktags'     => true,
                )
            ),
			
        )
    ) );
	


/*******************************************
*******  THEME OPTIONS  - CUSTOM STYLE *****
********************************************/

		Redux::setSection( $opt_name, array(
			'title'            => esc_html__( 'Extra', 'manual' ),
			'id'               => 'manual-theme-custom-style',
			'customizer_width' => '400px',
			'icon'             => 'el el-cogs'
		) );
					
		// GO UP ARROW
		Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Go Up Arrow Styling', 'manual' ),
		'id'     => 'manual-theme-go-up-style',
		'subsection'  => true,
		'fields' => array(
				// start
				array(
					'id'            => 'go_up_arrow_font_size',
					'type'          => 'slider',
					'title'         => esc_html__( 'Font Size', 'manual' ),
					'default'       => 24,
					'min'           => 1,
					'step'          => 1,
					'max'           => 60,
					'display_value' => 'label',
					'subtitle' => esc_html__( 'Default: 24px', 'manual' ),
					'display_value' => 'text',
				),
				
				array(
					'id'       => 'go_up_arrow_icon_style',
					'type'     => 'text',
					'title'    => esc_html__( 'Icon Name', 'manual' ),
					'desc'     => __( 'Enter <a href=\'http://fortawesome.github.io/Font-Awesome/icons/\' target=\"_blank\">fontawesome</a> name (eg: fa fa-file-o) -OR- <br>Enter <a href=\'https://www.elegantthemes.com/blog/resources/elegant-icon-font\' target=\"_blank\">elegant icon font</a> name -OR- <br>Enter <a href=\'http://demo.wpsmartapps.com/themes/manual/et-line-font/\' target=\"_blank\">et line font</a> name', 'manual' ),
					'default'  => 'far fa-arrow-alt-circle-up',
					'subtitle' => esc_html__( 'Default: far fa-arrow-alt-circle-up', 'manual' ),
				),
				
				array(
					'id'       => 'manual-go-up-icon-color',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Go Up Icon Color', 'manual' ),
					'default'  => array(
						'color' => '#3e51e4',
						'alpha' => '1'
					),
					'mode'     => 'background',
				),
				// eof section
			)
		) );
		
		// SOCIAL SHARE
		Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Article Social Share', 'manual' ),
        'id'     => 'manual-theme-general-social-share',
		'subsection'  => true,
        'fields' => array(
		
		
		    array(
				'id'    => 'social-box-global-message',
				'type'  => 'info',
				'style' => 'info',
				'notice' => false,
				'desc'  => esc_html__( 'seprate ON|OFF feature provided to disable "Social Share" on the blog, knowledge-base, and Documentation section.', 'manual' )
			),	
		
			array(
				'id'       => 'theme-social-box',
				'type'     => 'switch',
				'title'    => esc_html__( 'Social Share Buttons', 'manual' ),
				'default'  => true,
				'subtitle' => esc_html__( 'Enable or disable the social share buttons at the end of each post (Global Effect)', 'manual' ),
			),
			
			array (
				'subtitle' => esc_html__('This subject will act as default when visitors try to send favourite read post via email to there friends', 'manual'),
				'id' => 'theme-social-box-mailto-subject',
				'type' => 'text',
				'title' => esc_html__('Social Share eMail Button', 'manual'),
				'default' => esc_html__('Awesome Post', 'manual'),
				'required' => array('theme-social-box','equals',true),
			),
			
			array(
                'id'       => 'theme-social-share-displaycrl-status',
                'type'     => 'sortable',
				'mode'     => 'checkbox',
                'title'    => esc_html__( 'Social Share Display Control', 'manual' ),
                'subtitle' => esc_html__( 'Sortable/Control social share display', 'manual' ),
				'required' => array('theme-social-box','equals',true),
				'options'  => array(
                    'twitter' => esc_html__('Twitter','manual' ),
                    'facebook' => esc_html__('Facebook','manual' ),
                    'pinterest' => esc_html__('Pinterest','manual' ),
                    'google-plus' => esc_html__('Google Plus','manual' ),
                    'email' => esc_html__('Email','manual' ),
                    'linkedin' => esc_html__('LinkedIn','manual' ),
                ),
                'default'  => array(
                    'twitter' => true,
                    'facebook' => true,
                    'pinterest' => true,
                    'google-plus' => true,
                    'email' => true,
                    'linkedin' => false,
                )
            ),
			
		)
	) );



/********************************************
*******  START - CUSTOM CODE  SECTION   *****
*********************************************/

	 Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Custom Code', 'manual' ),
        'id'         => 'manual-editor',
        'subsection' => false,
		'icon'       => 'el el-css',
        'fields'     => array(
							  
            array(
                'id'       => 'manual-editor-css',
                'type'     => 'ace_editor',
                'title'    => esc_html__( 'CSS Custom Code', 'manual' ),
                'subtitle' => esc_html__( 'Change theme design using your own custom code', 'manual' ),
                'mode'     => 'css',
                'theme'    => 'monokai',
            ),
			
            array(
                'id'       => 'manual-editor-js',
                'type'     => 'ace_editor',
                'title'    => esc_html__( 'JS Code', 'manual' ),
                'subtitle' => esc_html__( 'Paste your JS code here.', 'manual' ),
                'mode'     => 'javascript',
                'theme'    => 'chrome',
            ),
			
        )
    ) );


/**********************************************
*******  //  END OF - THEME OPTIONS  //   *****
***********************************************/
	 
	/*
     * <--- END SECTIONS
     */
 
    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $return['error'] = $field;
                $field['msg']    = 'your custom error message';
            }

            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = 'your custom warning message';
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'manual' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'manual' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }
?>