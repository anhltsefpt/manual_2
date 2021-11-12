<?php

/**
 * Forums Loop
 *
 * @package bbPress
 * @subpackage Theme
 */
global $theme_options;
?>

<?php do_action( 'bbp_template_before_forums_loop' ); ?>

<ul id="forums-list-<?php bbp_forum_id(); ?>" class="bbp-forums">
	
    <li class="bbp-header">
		<ul class="forum-titles">
			<li class="bbp-topic-title">
				<?php 
				if( isset($theme_options['bbpress-directory-text']) && $theme_options['bbpress-directory-text'] != ''  ) {
					echo esc_html($theme_options['bbpress-directory-text']);
				}
				?>
            </li>
			<li class="bbp-topic-voice-count">
			<?php 
				if( isset($theme_options['bbpress-topic-text']) && $theme_options['bbpress-topic-text'] != ''  ) {
					echo esc_html($theme_options['bbpress-topic-text']);
				}
			?>
            </li>
			<li class="bbp-topic-reply-count">
			<?php 
				if( isset($theme_options['bbpress-posts-text']) && $theme_options['bbpress-posts-text'] != ''  ) {
					echo esc_html($theme_options['bbpress-posts-text']);
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
    

<?php if (is_single()) { ?>
<li class="bbp-forum-header">
		<div class="bbp-forum-title"><?php the_title(); ?></div>
        <div class="bbp-forum-content"><?php bbp_forum_content(); ?></div>
</li>
<?php } ?>    
    
	<li class="bbp-body">
		<?php while ( bbp_forums() ) : bbp_the_forum(); ?>
			<?php bbp_get_template_part( 'loop', 'single-forum' ); ?>
		<?php endwhile; ?>
	</li><!-- .bbp-body -->

</ul><!-- .forums-directory -->

<?php do_action( 'bbp_template_after_forums_loop' ); ?>
