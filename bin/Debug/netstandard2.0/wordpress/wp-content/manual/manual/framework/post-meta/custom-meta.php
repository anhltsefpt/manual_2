<?php 

/*KNOWLEDGEBASE*/
function manual_kb_article_access( $post_type, $post ) {
    add_meta_box( 
        'kb-single-article-acssess',
        esc_html__( 'KB Article Access Control' , 'manual' ),
        'documentation_fields_meta_box',
        'manual_kb',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'manual_kb_article_access', 10, 2 );


/*DOCUMENTATION*/
function manual_doc_article_access( $post_type, $post ) {
    add_meta_box( 
        'doc-single-article-acssess',
        esc_html__( 'Documentation Article Access Control' , 'manual' ),
        'documentation_fields_meta_box',
        'manual_documentation',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'manual_doc_article_access', 10, 2 );


function documentation_fields_meta_box() {
	global $post; 
	$meta = get_post_meta( $post->ID, 'doc_single_article_access', true );
	$current_value = get_post_meta( $post->ID, 'doc_single_article_user_access', true );
?>
<div style="padding: 15px 10px;">
  <div class="form-field">
    <input type="checkbox" name="doc_article_access[login]" id="doc_article_access[login]" value="1" <?php if( isset($meta['login']) && $meta['login'] == 1 ) echo 'checked'; ?> />
    <span><strong><?php echo esc_html__( 'Allow access only for the login users' , 'manual' ); ?></strong></span>
    <p class="description"><?php echo esc_html__( 'Only login users can have access' , 'manual' ); ?></p>
  </div>
  <br>
  <br>
  <div class="form-field">
    <div><strong><?php echo esc_html__('User Role' , 'manual' ); ?></strong></div>
    <?php 
$wp_roles = new WP_Roles();
$roles = $wp_roles->get_names();
foreach ($roles as $role_value => $role_name) {
	if ( $current_value != '' && in_array($role_value, $current_value)) $checked = 'checked';
	else $checked = '';
	echo '<p><input type="checkbox" '.$checked.' name="doc_article_user_access['.$role_value.']" id="doc_article_user_access['.$role_value.']" value="' . $role_value . '">'.$role_name.'</p>';
}
?>
    <p class="description"><?php echo esc_html__( 'Publish Article will limit to above define user roles' , 'manual' ); ?></p>
  </div>
  <br>
  <br>
  <div class="form-field"> <span><strong><?php echo esc_html__( 'Login Message' , 'manual' ); ?></strong></span>
    <input type="text" name="doc_article_access[message]" id="doc_article_access[message]" value="<?php if(isset($meta['message']) && $meta['message'] != '' ) echo esc_html($meta['message']); ?>" />
  </div>
</div>
<?php	
}

function manual_doc_article_save( $post_id ) {  
	if( isset($_POST['doc_article_access']) )  update_post_meta( $post_id, 'doc_single_article_access', $_POST['doc_article_access'] );
	if ( isset( $_POST['doc_article_user_access'] ) && $_POST['doc_article_user_access'] != '' ) {           
        update_post_meta( $post_id, 'doc_single_article_user_access', $_POST['doc_article_user_access']);
    } else {
        update_post_meta( $post_id, 'doc_single_article_user_access', '');
	}
}
add_action( 'save_post', 'manual_doc_article_save' );
?>
