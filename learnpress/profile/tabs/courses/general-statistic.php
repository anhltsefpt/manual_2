<?php
/**
 * Template for displaying general statistic in user profile overview.
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 4.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( empty( $statistic ) ) {
	return;
}

$user = LP_Profile::instance()->get_user();
?>

<div id="dashboard-general-statistic">

	<?php do_action( 'learn-press/before-profile-dashboard-general-statistic-row' ); ?>

	<div class="dashboard-general-statistic__row">

		<?php do_action( 'learn-press/before-profile-dashboard-user-general-statistic' ); ?>
		
        <div class="col-md-4 col-sm-6">
            <div class="userdash-box-wrap success courses-completed">
                <h3><?php echo str_pad( $statistic['enrolled_courses'], 2, '0', STR_PAD_LEFT ); ?></h3>
                <h5><?php esc_html_e( 'Enrolled Courses', 'manual' ); ?></h5>
            </div>   
		</div>
        
        <div class="col-md-4 col-sm-6">
            <div class="userdash-box-wrap success courses-completed">
                <h3><?php echo str_pad( $statistic['active_courses'], 2, '0', STR_PAD_LEFT ); ?></h3>
                <h5><?php esc_html_e( 'Active Courses', 'manual' ); ?></h5>
            </div>   
		</div>
        
        <div class="col-md-4 col-sm-6">
            <div class="userdash-box-wrap success courses-completed">
                <h3><?php echo str_pad( $statistic['completed_courses'], 2, '0', STR_PAD_LEFT ); ?></h3>
                <h5><?php esc_html_e( 'Completed Courses', 'learnpress' ); ?></h5>
            </div>   
		</div>

		<?php do_action( 'learn-press/after-profile-dashboard-user-general-statistic' ); ?>
	</div>

	<?php do_action( 'learn-press/profile-dashboard-general-statistic-row' ); ?>

	<?php if ( $user->can_create_course() ) : ?>

		<div class="dashboard-general-statistic__row">

			<?php do_action( 'learn-press/before-profile-dashboard-instructor-general-statistic' ); ?>
            
			<div class="col-md-6 col-sm-6">
                <div class="userdash-box-wrap success courses-completed">
                    <h3><?php echo str_pad( $statistic['total_courses'], 2, '0', STR_PAD_LEFT ); ?></h3>
                    <h5><?php esc_html_e( 'Total Courses', 'manual' ); ?></h5>
                </div>   
            </div>
            
            <div class="col-md-6 col-sm-6">
                <div class="userdash-box-wrap success courses-completed">
                    <h3><?php echo str_pad( $statistic['total_users'], 2, '0', STR_PAD_LEFT ); ?></h3>
                    <h5><?php esc_html_e( 'Total Students', 'manual' ); ?></h5>
                </div>   
            </div>

			<?php do_action( 'learn-press/after-profile-dashboard-instructor-general-statistic' ); ?>
		</div>

	<?php endif; ?>

	<?php do_action( 'learn-press/after-profile-dashboard-general-statistic-row' ); ?>
</div>
