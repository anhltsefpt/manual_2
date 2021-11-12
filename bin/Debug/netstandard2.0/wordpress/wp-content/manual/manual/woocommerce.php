<?php 
/**
 * woo page
 */
 
get_header();

global $theme_options;
$md_sm_12 = '12';
if( $theme_options['woo_display_sidebar_on_product_listing_page'] == true && ( is_shop() || is_product_category() || is_product_tag() || is_product() ) ) {
	$md_sm = 9;
	$sidebar_woo = true;
} else {
	$md_sm = 12;
	$sidebar_woo = false;
}
?>

<!-- /start container -->
<div class="container content-wrapper body-content">
<div class="row margin-top-btm-50">

<?php if( $sidebar_woo == true ) { ?>
<!--sidebar-->
<aside class="col-md-3 col-sm-12 woosidebar" id="sidebar-box">
  <div class="custom-well custom-well-fix sidebar-nav blankbg">
    <?php 
    if ( is_active_sidebar( 'manual-woocommerce-widget' ) ) : 
		dynamic_sidebar( 'manual-woocommerce-widget' ); 
    endif; 
	?>
  </div>
</aside>
<!--eof sidebar-->
<?php } ?>

<div class="col-md-<?php echo esc_attr($md_sm); ?> col-sm-12">
  <?php woocommerce_content(); ?>
  <div class="clearfix"></div>
</div>


</div>
</div>
<?php get_footer(); ?>