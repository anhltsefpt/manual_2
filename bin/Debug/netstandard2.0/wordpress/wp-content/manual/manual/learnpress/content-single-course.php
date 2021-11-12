<?php
/**
 * Template for displaying content of course without header and footer
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 4.0.0
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit();

/**
 * If course has set password
 */
if ( post_password_required() ) {
	echo get_the_password_form();
	return;
}

/**
 * LP Hook
 */
do_action( 'learn-press/before-single-course' );
?>

<div class="single_pg_title_course clearfix">
    <div class="col-md-9 col-sm-12">
        <div class="course-single">
            <div class="course-meta">
                <?php do_action( 'manual__single_course_meta' );?>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-12 fixlayout-left">
    <div class="wishlist-wrap"> <?php do_action( 'manual__course_single_pg_wishlist' ); ?></div>
     <div class="course-payment">
            <?php
			do_action( 'manual__course_payment' );
			?>
        </div>
    </div>
</div>

<div id="learnpress-course" class="course-summary clearfix">
    <div class="col-md-9 col-sm-12 margin-15">
            <?php do_action( 'learn-press/single-course-summary' ); ?>
            
    </div>
    
    <div id="sidebar-box" class="col-md-3 col-sm-12 margin-15">
        <div class="course-quick-info">
            <ul><?php do_action( 'manual__learnpress_course_shortinfo' ); ?></ul>
        </div>
        <div class="lession_singlepg_social_share"><?php Manual__IP_Course::instance()->learnpress_entry_sharing();  ?></div>
    </div>
    
</div>

<div class="related_course">
	<?php Manual__IP_Course::instance()->manual__learnpress_related_courses(); ?>
</div>

<?php     
/**
 * LP Hook
 */
do_action( 'learn-press/after-single-course' );