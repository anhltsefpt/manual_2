<?php
/**
 * Template for displaying profile header.
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 4.0.0
 */

defined( 'ABSPATH' ) || exit;

$profile = LP_Profile::instance();
$user    = $profile->get_user();
$user_id = $user->get_id();

if ( ! isset( $user ) ) {
	return;
}

$phone_number = get_the_author_meta( 'phone_number', $user_id );
$email_address = get_the_author_meta( 'email_address', $user_id );
?>
<div class="lp-profile-header clearfix">
    <div class="col-md-2 col-sm-12">
        <div class="lp-profile-cover"> 
			<?php 
			echo $user->get_profile_picture('', 100 ); 
			Manual__IP_Course::get__extra_userinfo_career();
			?> 
        </div>
    </div>
    <div class="col-md-7 col-sm-12 lp-profile-info-wrapper">
        <div class="lp-profile-info">
            <?php 
             echo '<h3>' . $user->get_display_name() . '</h3>'; 
             echo '<div class="author-bio">' . $user->get_description() . '</div>'; 
             ?>
        </div>
        <?php Manual__IP_Course::get__extra_userinfo_socials( $user_id ); ?>
    </div>
    <?php  if ( !empty( $phone_number ) || !empty( $email_address ) ) {  ?>
    <div class="col-md-3 col-sm-12">
        <div class="lp-profile-extra"> 
            <h5 class="profile-contactinfo"><?php esc_html_e( 'Contact', 'manual' ); ?></h5>
            <table class="table">
                <tbody>
                	<?php  if ( ! empty( $phone_number ) ) { ?>
                    <tr>
                      <th scope="row"><i class="fas fa-phone-alt"></i></th>
                      <td><?php echo esc_html( $phone_number ); ?></td>
                    </tr>
                    <?php } ?>
                    <?php  if ( ! empty( $email_address ) ) { ?>
                    <tr>
                      <th scope="row"><i class="far fa-envelope"></i></th>
                      <td><?php echo esc_html( $email_address ); ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php } ?>
</div>
