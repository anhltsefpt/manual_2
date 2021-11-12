<?php
/**
 * Template for displaying course content within the loop.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/content-course.php
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 4.0.0
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit();

global $theme_options;

$extra_classes = 'col-md-'.$theme_options['learnpress_archive_pg_course_column'].' col-sm-6 col-xs-12 masonry-item course-wrapper hvr-float archive-pg-course-learnpress';
?>
<div id="post-<?php the_ID(); ?>" <?php post_class( $extra_classes ); ?>>
	<div class="course-box">
	<?php
    // @since 3.0.0
    do_action( 'learn-press/before-courses-loop-item' );
	
    // @since 3.0.0
    do_action( 'learn-press/courses-loop-item-title' );

    // @since 3.0.0
	do_action( 'learn-press/after-courses-loop-item' );
    ?>
	</div>
</div>