<?php
/**
 * Template for displaying title of course within the loop.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/loop/course/title.php.
 *
 * @author  ThimPress
 * @package  Learnpress/Templates
 * @version  3.0.0
 */

defined( 'ABSPATH' ) || exit();
global $theme_options;
?>
<<?php echo $theme_options['learnpress_archive_pg_course_titletag']; ?> class="course-title"><a href="<?php the_permalink(); ?>" class="course-permalink"><?php the_title(); ?></a></<?php echo $theme_options['learnpress_archive_pg_course_titletag'] ?>>
