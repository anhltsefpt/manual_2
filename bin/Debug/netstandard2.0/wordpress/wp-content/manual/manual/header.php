<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=9" />
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php 
$global_website_presentation = manual__website_global_design_control();
if( isset($global_website_presentation) && $global_website_presentation != '' ) { 
	echo '<div class="theme_box_wrapper">'; 
} 
?>
<!-- NAVIGATION -->
<nav class="navbar navbar-inverse"> <?php manual__theme_header_control(); ?> </nav>
<!-- MOBILE MENU -->
<div class="mobile-menu-holder"><?php manual__theme_mobile_menu_holder(); ?></div>
<!-- HEADER CONTROL -->
<?php  manual_header_display_control_check(); ?>