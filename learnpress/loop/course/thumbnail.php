<?php
/**
 * Template for displaying thumbnail of course within the loop.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/loop/course/thumbnail.php.
 *
 * @author   ThimPress
 * @package  Learnpress/Templates
 * @version  3.0.0
 */

defined( 'ABSPATH' ) || exit();

$course = learn_press_get_course();
if ( ! $course ) {
	return;
}

$course_id = get_the_ID();
$check_feature_img = has_post_thumbnail($course_id);

if( $check_feature_img == true  ) {
?>
    <div class="course-thumbnail wrap-image">
        <a href="<?php the_permalink(); ?>" class="course-permalink">
               <?php echo $course->get_image( 'course_thumbnail' ); ?>
        </a>
    </div>
<?php } ?>