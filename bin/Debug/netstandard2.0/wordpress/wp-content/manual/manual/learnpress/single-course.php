<?php
/**
 * Template for displaying content of single course.
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 4.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Header for page
 */
get_header( 'course' );
?>
<div class="container content-wrapper body-content">
  <div class="row margin-top-btm-50 page-default">
    <div class="blog uniquepage learnpress_manual" id="<?php the_ID(); ?>">
    	<div class="entry-content clearfix">
            <div id="lp-single-course" class="lp-single-course">
			<?php 
				while ( have_posts() ) {
					the_post();
					learn_press_get_template( 'content-single-course' );
				}
            ?>
        </div>
	  </div>
    </div>
  </div>
</div>
<?php
/**
 * Footer for page
 */
get_footer( 'course' );