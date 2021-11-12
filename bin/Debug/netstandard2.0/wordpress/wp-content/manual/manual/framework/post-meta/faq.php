<?php

/** Add Custom Field To Category Form */
add_action( 'manualfaqcategory_add_form_fields', 'manual_faq_category_field_add', 10 );
add_action( 'manualfaqcategory_edit_form_fields', 'manual_faq_category_field_edit', 10, 2 );
 
function manual_faq_category_field_add( $taxonomy ) {
	global $wp_roles;
?>
<div style="background: #F8F7F7; border: 1px solid #E4E4E4;  padding: 8px 5px 5px 20px; margin:20px 0px;">
  <h3><?php echo esc_html__('Faq Access Control', 'manual' ); ?></h3>
  <div class="form-field">
    <input type="checkbox" name="doc_cat_check_login" id="doc_cat_check_login" value="1" />
    <span><strong><?php echo esc_html__('Allow access only for the login users', 'manual' ); ?></strong></span>
    <p class="description"><?php echo esc_html__('Only login users can have access', 'manual' ); ?></p>
  </div>
  <div class="form-field">
    <div><strong><?php echo esc_html__('User Role', 'manual' ); ?></strong></div>
    <?php 
$wp_roles = new WP_Roles();
$roles = $wp_roles->get_names();
foreach ($roles as $role_value => $role_name) {
	echo '<p><input type="checkbox" name="user_role['.$role_value.']" id="user_role['.$role_value.']" value="' . $role_value . '">'.$role_name.'</p>';
}
?>
    <br>
    <p class="description"><?php echo esc_html__('Faq will limit to above define user roles', 'manual' ); ?></p>
  </div>
  <div class="form-field"> <span><strong><?php echo esc_html__('Login Message', 'manual' ); ?></strong></span>
    <input type="text" name="doc_cat_login_message" id="doc_cat_login_message" />
  </div>
</div>
<?php
}

function manual_faq_category_field_edit( $tag, $taxonomy ) {
	global $wp_roles;
	
    $option_name = 'doc_cat_check_login_' . $tag->term_id;
    $category_custom_order = get_option( $option_name );
	
	$option_role = 'doc_cat_user_role_' . $tag->term_id;
    $accessby_user_role = get_option( $option_role );
	
    $option_name_msg = 'doc_cat_login_message_' . $tag->term_id;
    $category_custom_login_message = get_option( $option_name_msg );

?>
<tr class="form-field">
  <th scope="row" valign="top"><label for="category_custom_order"><?php echo esc_html__('Category access', 'manual' ); ?></label></th>
  <td><input type="checkbox" name="doc_cat_check_login" id="doc_cat_check_login" value="1" <?php echo esc_attr( $category_custom_order == 1 ) ? 'checked' : ''; ?> />
    <span class="description"><?php echo esc_html__('Only for the login users', 'manual' ); ?></span></td>
</tr>
<tr class="form-field">
  <th scope="row" valign="top"><label for="category_user_access"><?php echo esc_html__('User Role', 'manual' ); ?></label></th>
  <td><?php 
	$wp_roles = new WP_Roles();
	$roles = $wp_roles->get_names();
	$current_value = unserialize($accessby_user_role);
	foreach ($roles as $role_value => $role_name) {
		if ( $current_value != '' && in_array($role_value, $current_value)) $checked = 'checked';
		else $checked = '';
		echo '<p><input type="checkbox" '.$checked.' name="user_role['.$role_value.']" id="user_role['.$role_value.']" value="' . $role_value . '">'.$role_name.'</p>';
  	}
	?></td>
</tr>
<tr class="form-field">
  <th scope="row" valign="top"><label for="category_login_message"><?php echo esc_html__('Login Message', 'manual' ); ?></label></th>
  <td><input type="text" name="doc_cat_login_message" id="doc_cat_login_message" value="<?php echo esc_html($category_custom_login_message); ?>" /></td>
</tr>
<?php
}
 
/** Save Custom Field Of Category Form */
add_action( 'created_manualfaqcategory', 'manual_faq_category_field_save', 10, 2 ); 
add_action( 'edited_manualfaqcategory', 'manual_faq_category_field_save', 10, 2 );
 
function manual_faq_category_field_save( $term_id, $tt_id ) {
	$option_name = 'doc_cat_check_login_' . $term_id;
	$option_role = 'doc_cat_user_role_' . $term_id;
	$option_login_message = 'doc_cat_login_message_' . $term_id;
	
	if ( isset( $_POST['doc_cat_check_login'] ) && $_POST['doc_cat_check_login'] != '' ) {           
        update_option( $option_name, $_POST['doc_cat_check_login'] );
    } else {
        update_option( $option_name, '' );
	}
	
	if ( isset( $_POST['user_role'] ) && $_POST['user_role'] != '' ) {           
        update_option( $option_role, serialize($_POST['user_role']) );
    } else {
        update_option( $option_role, '' );
	}
	
    if ( isset( $_POST['doc_cat_login_message'] ) && $_POST['doc_cat_login_message'] != '' ) {           
        update_option( $option_login_message, stripslashes($_POST['doc_cat_login_message']) );
    } else {
        update_option( $option_login_message, '' );
	}
}
?>
