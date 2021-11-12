<?php
/**
 * Template for displaying description of lesson.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/content-lesson/description.php.
 *
 * @author   ThimPress
 * @package  Learnpress/Templates
 * @version  4.0.0
 */

defined( 'ABSPATH' ) || exit();

$content = $lesson->get_content();

if ( ! $content ) {
	$message = esc_html__( 'Lesson content is empty.', 'manual' );

	if ( $lesson->current_user_can_edit() ) {
		$message .= sprintf( '<a href="%s" class="edit-content">%s</a>', $lesson->get_edit_link(), esc_html__( 'Edit', 'manual' ) );
	}

	learn_press_display_message( $message, 'notice' );
	return;
}
?>

<div class="entry-content clearfix">
	<div class="wrap-lession-content"><?php echo $content; ?></div>
</div>