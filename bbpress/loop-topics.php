<?php

/**
 * Topics Loop
 *
 * @package bbPress
 * @subpackage Theme
 */
global $theme_options;
?>

<?php do_action( 'bbp_template_before_topics_loop' ); ?>

<ul id="bbp-forum-<?php bbp_forum_id(); ?>" class="bbp-topics">

	<li class="bbp-header">

		<ul class="forum-titles">
			<li class="bbp-topic-title">
            <?php 
				if( isset($theme_options['bbpress-topic-text']) && $theme_options['bbpress-topic-text'] != ''  ) {
					echo esc_html($theme_options['bbpress-topic-text']);
				}
			?>
            </li>
			<li class="bbp-topic-voice-count">
			<?php 
				if( isset($theme_options['bbpress-voices-text']) && $theme_options['bbpress-voices-text'] != ''  ) {
					echo esc_html($theme_options['bbpress-voices-text']);
				}
			?>
			</li>
			<li class="bbp-topic-reply-count">
			<?php
			if( bbp_show_lead_topic() ) {
				_e( 'Replies', 'manual' );
			} else {
				if( isset($theme_options['bbpress-posts-text']) && $theme_options['bbpress-posts-text'] != ''  ) {
					echo esc_html($theme_options['bbpress-posts-text']);
				}
			}
			?>
			</li>
			<li class="bbp-topic-freshness">
            <?php 
				if( isset($theme_options['bbpress-lastpost-text']) && $theme_options['bbpress-lastpost-text'] != ''  ) {
					echo esc_html($theme_options['bbpress-lastpost-text']);
				}
			?>
            </li>
		</ul>

	</li>

	<li class="bbp-body">

		<?php while ( bbp_topics() ) : bbp_the_topic(); ?>

			<?php bbp_get_template_part( 'loop', 'single-topic' ); ?>

		<?php endwhile; ?>

	</li>

	<li class="bbp-footer">

		<div class="tr">
			<p>
				<span class="td colspan<?php echo ( bbp_is_user_home() && ( bbp_is_favorites() || bbp_is_subscriptions() ) ) ? '5' : '4'; ?>">&nbsp;</span>
			</p>
		</div><!-- .tr -->

	</li>

</ul><!-- #bbp-forum-<?php bbp_forum_id(); ?> -->

<?php do_action( 'bbp_template_after_topics_loop' ); ?>
