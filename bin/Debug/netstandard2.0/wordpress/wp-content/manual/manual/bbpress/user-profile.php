<?php

/**
 * User Profile
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

	<?php do_action( 'bbp_template_before_user_profile' ); ?>

	<div id="bbp-user-profile" class="bbp-user-profile">
		<h2 class="singlepg-font-blog"><?php _e( 'Profile', 'manual' ); ?></h2>
		<div class="bbp-user-profile-section">

			<?php if ( bbp_get_displayed_user_field( 'description' ) ) : ?>

				<p class="bbp-user-description"><?php bbp_displayed_user_field( 'description' ); ?></p>

			<?php endif; ?>
            <div class="profile">
            
            	<div class="wrap">
                    <div class="section_one"><?php  echo __( 'Forum Role:','manual' ); ?></div>
                    <div class="section_two"><?php  echo bbp_get_user_display_role(); ?></div>
                </div>
            
            	<div class="wrap">
                    <div class="section_one"><?php  echo __( 'Topics Started:','manual' ); ?></div>
                    <div class="section_two"><?php  echo bbp_get_user_topic_count_raw(); ?></div>
                </div>
            
            	<div class="wrap" style="border-bottom:none;">
                    <div class="section_one"><?php  echo __( 'Replies Created:','manual' ); ?></div>
                    <div class="section_two"><?php  echo bbp_get_user_reply_count_raw(); ?></div>
                </div>
                
            </div>
		</div>
	</div><!-- #bbp-author-topics-started -->

	<?php do_action( 'bbp_template_after_user_profile' ); ?>
