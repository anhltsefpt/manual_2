<?php
/**
 * Template for displaying students of single course.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/single-course/students.php.
 *
 * @author   ThimPress
 * @package  Learnpress/Templates
 * @version  3.0.0
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit();

$course = learn_press_get_course();

// Do not show if course is no require enrollment
if ( ! $course || ! $course->is_required_enroll() ) {
	return;
}

$count = intval( $course->count_students() );
?>

<li class="meta-lectures">
    <i class="icon_id-2"></i>
    <span class="label"><?php esc_html_e( 'Students', 'manual' ); ?></span>
    <span class="value"><?php echo esc_html( $count ); ?></span>
</li>