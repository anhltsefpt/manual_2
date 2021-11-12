<?php
/**
 * Template for displaying template of login form.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/global/form-login.php.
 *
 * @author  ThimPress
 * @package  Learnpress/Templates
 * @version  4.0.0
 */

defined( 'ABSPATH' ) || exit();
?>

<div class="learn-press-form-login learn-press-form col-md-5 col-sm-12">

	<h3><?php echo esc_html_x( 'Login', 'login-heading', 'manual' ); ?></h3>

	<?php do_action( 'learn-press/before-form-login' ); ?>

	<form name="learn-press-login" method="post" action="">

		<?php do_action( 'learn-press/before-form-login-fields' ); ?>

		<ul class="form-fields">
			<li class="form-field">
				<label for="username"><?php esc_html_e( 'Username or email', 'manual' ); ?>&nbsp;<span class="required">*</span></label>
				<input type="text" name="username" id="username" placeholder="<?php esc_attr_e( 'Email or username', 'manual' ); ?>" autocomplete="username" />
			</li>
			<li class="form-field">
				<label for="password"><?php esc_html_e( 'Password', 'manual' ); ?>&nbsp;<span class="required">*</span></label>
				<input type="password" name="password" id="password" placeholder="<?php esc_attr_e( 'Password', 'manual' ); ?>" autocomplete="current-password" />
			</li>
		</ul>

		<?php do_action( 'learn-press/after-form-login-fields' ); ?>
		<p>
			<label>
				<input type="checkbox" name="rememberme"/>
				<?php esc_html_e( 'Remember me', 'manual' ); ?>
			</label>
		</p>
		<p>
			<input type="hidden" name="learn-press-login-nonce" value="<?php echo wp_create_nonce( 'learn-press-login' ); ?>">
			<button type="submit"><?php esc_html_e( 'Login', 'manual' ); ?></button>
		</p>
		<p>
			<a href="<?php echo wp_lostpassword_url(); ?>"><?php esc_html_e( 'Lost your password?', 'manual' ); ?></a>
		</p>
	</form>

	<?php do_action( 'learn-press/after-form-login' ); ?>

</div>
