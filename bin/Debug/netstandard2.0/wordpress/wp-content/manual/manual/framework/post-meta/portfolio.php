<?php 
/**
 * PORTFOLIO :: ADD - 1
 */
add_filter( 'cmb2_admin_init', 'manual_portfolio_page_initial_metaboxes' );
function manual_portfolio_page_initial_metaboxes() {
	$prefix = '_manual_';
	$cmb = new_cmb2_box( array(
        'id'            => 'portfolio_page_redirect_options',
        'title'         => esc_html__( 'Portfolio :: Redirect', 'manual' ),
        'object_types'  => array( 'manual_portfolio', ), 
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
		'closed'     => false,
    ) );
	$cmb->add_field( array(
		'name' => esc_html__( 'Custom Redirect Link URL', 'manual' ),
		'desc' => esc_html__( 'Custom redirect link to the portfolio details page', 'manual' ),
		'id'   => $prefix .'portfolio_redirect_link_url',
		'type' => 'text'
	) );
}

/**
 * PORTFOLIO :: ADD - 2
 */
add_filter( 'cmb2_admin_init', 'manual_portfolio_page_metaboxes' );
function manual_portfolio_page_metaboxes() {
	$prefix = '_manual_';
	$cmb = new_cmb2_box( array(
        'id'            => 'portfolio_page_display_options',
        'title'         => esc_html__( 'Portfolio :: Page Display Option', 'manual' ),
        'object_types'  => array( 'manual_portfolio', ), 
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
		'closed'     => false,
    ) );
	$cmb->add_field( array(
		'name' => esc_html__( 'Page Template', 'manual' ),
		'desc' => esc_html__( 'Select an option', 'manual' ),
		'id'   => $prefix .'portfolio_page_type',
		'options' => array(
					'1' => __( 'Full Width', 'manual' ),
					'2' => __( 'Sidebar Right', 'manual' ),
					'3' => __( 'Sidebar Left', 'manual' ),
					'4' => __( 'Full Width (VC Page Builder)', 'manual' ),
				),
		'default' => '2',		
		'type' => 'select'
	) );
}

/**
 * PORTFOLIO :: ADD - 3
 */
add_filter( 'cmb2_admin_init', 'manual_portfolio_two_metaboxes' );
function manual_portfolio_two_metaboxes() {
	$prefix = '_manual_';
	$cmb = new_cmb2_box( array(
        'id'            => 'portfolio_extra_controls',
        'title'         => esc_html__( 'Portfolio :: Display Control', 'manual' ),
        'object_types'  => array( 'manual_portfolio', ), 
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
		'closed'     => false,
    ) );
	$cmb->add_field( array(
		'name' => esc_html__( 'Activate  Like/Dislike', 'manual' ),
		'desc' => esc_html__( 'Display visitors control like/dislike post', 'manual' ),
		'id'   => $prefix .'portfolio_like_dislike_post',
		'type' => 'select',
		'options' => array(
					'1' => __( 'ON', 'manual' ),
					'2' => __( 'OFF', 'manual' ),
					),
		'default' => '2',
	) );
	$cmb->add_field( array(
		'name' => esc_html__( 'Activate Post Infomation', 'manual' ),
		'desc' => esc_html__( 'Display (post views, post date, author, likes) Stats', 'manual' ),
		'id'   => $prefix .'portfolio_stats_status',
		'type' => 'select',
		'options' => array(
					'1' => __( 'ON', 'manual' ),
					'2' => __( 'OFF', 'manual' ),
					),
		'default' => '2',
	) );
	$cmb->add_field( array(
		'name' => esc_html__( 'Activate Social Share', 'manual' ),
		'desc' => esc_html__( 'Display post social share', 'manual' ),
		'id'   => $prefix .'portfolio_social_share_status',
		'type' => 'select',
		'options' => array(
					'1' => __( 'ON', 'manual' ),
					'2' => __( 'OFF', 'manual' ),
					),
		'default' => '1',
	) );
	$cmb->add_field( array(
		'name' => esc_html__( 'Disable Social Share & Naviagtion Section', 'manual' ),
		'desc' => esc_html__( 'Disable footer social share and navigation section', 'manual' ),
		'id'   => $prefix .'portfolio_social_share_and_links_status',
		'type' => 'select',
		'options' => array(
					'1' => __( 'ON', 'manual' ),
					'2' => __( 'OFF', 'manual' ),
					),
		'default' => '2',
	) );
}

/**
 * PORTFOLIO :: ADD - 4
 */
add_filter( 'cmb2_admin_init', 'manual_portfolio_desc_and_link_metaboxes' );
function manual_portfolio_desc_and_link_metaboxes() {
	$prefix = '_manual_';
	$cmb = new_cmb2_box( array(
        'id'            => 'portfolio_desc_and_link',
        'title'         => esc_html__( 'Portfolio :: Description and Link', 'manual' ),
        'object_types'  => array( 'manual_portfolio', ), 
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
		'closed'     => false,
    ) );
	$cmb->add_field( array(
		'name' => esc_html__( 'Disable Feature', 'manual' ),
		'desc' => esc_html__( 'If checked current section (Portfolio :: Description and Link) will go inactive', 'manual' ),
		'id'   => $prefix .'portfolio_desc_and_link_status',
		'type' => 'checkbox'
	) );
	$cmb->add_field( array(
		'name' => esc_html__( 'Text Title', 'manual' ),
		'desc' => esc_html__( 'Will appear as title on the sidebar section or at the top based on the choosen page template.', 'manual' ),
		'id'   => $prefix .'portfolio_widget_title',
		'type' => 'text'
	) );
	$cmb->add_field( array(
		'name' => esc_html__( 'Description', 'manual' ),
		'desc' => esc_html__( 'Your short description', 'manual' ),
		'id'   => $prefix .'portfolio_widget_description',
		'type' => 'textarea'
	) );
	$cmb->add_field( array(
		'name' => esc_html__( 'Link Button Text', 'manual' ),
		'desc' => esc_html__( 'Your link URL text (example: DOWNLOAD NOW)', 'manual' ),
		'id'   => $prefix .'portfolio_widget_link_button_text',
		'type' => 'text'
	) );
	$cmb->add_field( array(
		'name' => esc_html__( 'Link URL', 'manual' ),
		'id'   => $prefix .'portfolio_widget_link_url',
		'type' => 'text_url'
	) );
}

/**
 * PORTFOLIO :: ADD - 5
 */
add_filter( 'cmb2_admin_init', 'manual_portfolio_four_metaboxes' );
function manual_portfolio_four_metaboxes() {
	$prefix = '_manual_';
	$cmb = new_cmb2_box( array(
        'id'            => 'portfolio_add_images',
        'title'         => esc_html__( 'Portfolio :: Images', 'manual' ),
        'object_types'  => array( 'manual_portfolio', ), 
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
		'closed'     => false,
    ) );
	$group_inside_portfolio_img = $cmb->add_field( array(
		'id'          => $prefix . 'portfolio_images',
		'type'        => 'group',
		'options'     => array(
			'group_title'   => __( 'Image {#}', 'manual' ), 
			'add_button'    => __( 'Add Another Image', 'manual' ),
			'remove_button' => __( 'Remove Image', 'manual' ),
			'sortable'      => true, 
		),
	) );
	$cmb->add_group_field( $group_inside_portfolio_img, array(
		'name' => esc_html__( 'Image URL', 'manual' ),
		'id'   => 'image',
		'type' => 'file',
	) );
}
?>