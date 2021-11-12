<?php
/**
 * Template for displaying instructor of single course.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/single-course/instructor.php.
 *
 * @author   ThimPress
 * @package  Learnpress/Templates
 * @version  3.3.0
 */

defined( 'ABSPATH' ) || exit();

$course     = LP_Global::course();
$instructor = $course->get_instructor();
$instructor_id = $instructor->get_id();
?>

<div class="course-author content">
	
	<?php do_action( 'learn-press/before-single-course-instructor' ); ?>
    
    <div class="author-avatar">
		<?php echo '' . $course->get_instructor()->get_profile_picture( '', 270 ); ?>
	</div>

    <div class="author-content">
		<div class="author-meta">
			<h5 class="author-name">
				<?php echo wp_kses( $course->get_instructor_html(), 'manual-a' ); ?>
			</h5>
			<?php Manual__IP_Course::get__extra_userinfo_career(); ?>
		</div>

		<div class="author-bio"><?php echo esc_html( $course->get_author()->get_description() ); ?></div>

		<?php Manual__IP_Course::get__extra_userinfo_socials( $instructor_id ); ?>
	</div>

	<?php do_action( 'learn-press/after-single-course-instructor' ); ?>

</div>