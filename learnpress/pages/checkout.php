<?php
/**
 * Template for displaying content of page for processing checkout feature.
 *
 * @author   ThimPress
 * @package  LearnPress/Templates
 * @version  4.0.1
 */
defined( 'ABSPATH' ) or die;

get_header();

do_action( 'learnpress/template/pages/checkout/before-content' );
?>

<div class="container content-wrapper body-content">
  <div class="row margin-top-btm-50 page-default">
    <div class="col-md-12 col-sm-12 clearfix">

	<div id="learn-press-checkout">
		<?php
		/**
		 * LP Hook
		 *
		 * @since 4.0.0
		 */
		do_action( 'learn-press/before-checkout-page' );

		// Shortcode for displaying checkout form
		echo do_shortcode( '[learn_press_checkout]' );

		/**
		 * LP Hook
		 *
		 * @since 4.0.0
		 */
		do_action( 'learn-press/after-checkout-page' );
		?>

	 </div>


    </div>
  </div>
</div>
<?php
do_action( 'learnpress/template/pages/checkout/after-content' );

get_footer();
