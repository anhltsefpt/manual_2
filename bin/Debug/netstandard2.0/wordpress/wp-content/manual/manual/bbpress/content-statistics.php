<?php

/**
 * Statistics Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

// Get the statistics
$stats = bbp_get_statistics(); ?>

<dl role="main" class="bbpress_statistics">

	<?php do_action( 'bbp_before_statistics' ); ?>

	<dt><?php _e( 'Registered Users', 'manual' ); ?></dt>
	<dd>
		<strong><?php echo esc_html( $stats['user_count'] ); ?></strong>
	</dd>

	<dt><?php _e( 'Forums', 'manual' ); ?></dt>
	<dd>
		<strong><?php if( isset($stats['forum_count']) && $stats['forum_count'] != '' ) echo esc_html( $stats['forum_count'] ); ?></strong>
	</dd>

	<dt><?php _e( 'Topics', 'manual' ); ?></dt>
	<dd>
		<strong><?php if( isset($stats['topic_count']) && $stats['topic_count'] != '' ) echo esc_html( $stats['topic_count'] ); ?></strong>
	</dd>

	<dt><?php _e( 'Replies', 'manual' ); ?></dt>
	<dd>
		<strong><?php if( isset($stats['reply_count']) && $stats['reply_count'] != '' ) echo esc_html( $stats['reply_count'] ); ?></strong>
	</dd>


	<?php do_action( 'bbp_after_statistics' ); ?>

</dl>

<?php unset( $stats );