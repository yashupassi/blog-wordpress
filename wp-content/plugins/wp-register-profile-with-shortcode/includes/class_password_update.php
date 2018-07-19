<?php

class rwws_update_password{

	 public function __construct() {
		add_action( 'init', array($this, 'update_password_validate' ) );
	 }
	 	 

	 public function update_password_validate(){
		if(isset($_POST['option']) and sanitize_text_field($_POST['option']) == "rpws_user_update_password"){
			global $post;
			$error = false;
			
			if(!is_user_logged_in()){
				$msg = __('Login to update profile!','wp-register-profile-with-shortcode');
				$error = true;
			}
			
			if($_POST['user_new_password'] == ''){
				$msg = __('Password can\'t be empty.','wp-register-profile-with-shortcode');
				$error = true;
			}
			
			if(isset($_POST['user_new_password']) and ( $_POST['user_new_password'] != $_POST['user_retype_password'])){
				$msg = __('Your new password don\'t match with retype password!','wp-register-profile-with-shortcode');
				$error = true;
			}
						
			if(!$error){
				$user_id = get_current_user_id();
				wp_set_password( $_POST['user_new_password'], $user_id );
				
				$_SESSION['reg_error_msg'] = __('Your password updated successfully. Please login again.','wp-register-profile-with-shortcode');
				$_SESSION['reg_msg_class'] = 'reg_success';
				
			} else {
				$_SESSION['reg_error_msg'] = $msg;
				$_SESSION['reg_msg_class'] = 'reg_error';
			}
			
			if(!empty($_POST['redirect'])){
				$redirect =  sanitize_text_field($_POST['redirect']);
				wp_redirect($redirect);
				exit;
			}
		}
	 }
	
	
	public function load_script(){?>
		<script type="text/javascript">
			jQuery(document).ready(function () {
				jQuery('#update-password').validate({ errorClass: "rw-error" });
			});
		</script>
	<?php }
	 
	public function updatePasswordForm(){
		global $post;
		
		if(is_user_logged_in()){
		$this->load_script();
		?>
        <div id="reg_forms" class="reg_forms">
        
        <?php do_action('wprp_before_update_pass_form_start');?>
        
        <?php $this->error_message(); ?>
        
		<form name="update-password" id="update-password" method="post" action="" <?php do_action('wprp_update_pass_form_tag');?>>
		<input type="hidden" name="option" value="rpws_user_update_password" />
        <input type="hidden" name="redirect" value="<?php echo sanitize_text_field( register_wid::curPageURL() ); ?>">
		
			
			<div class="reg-form-group">
			<label for="name"><?php _e('New Password','wp-register-profile-with-shortcode');?> </label>
			<input type="password" name="user_new_password" required <?php do_action( 'wprp_update_pass_user_new_password_field' );?>/>
			</div>
			
			<div class="reg-form-group">
			<label for="name"><?php _e('Retype Password','wp-register-profile-with-shortcode');?> </label>
			<input type="password" name="user_retype_password" required <?php do_action( 'wprp_update_pass_user_retype_password_field' );?>/>
			</div>

			<div class="reg-form-group">
			<input name="profile" type="submit" value="<?php _e('Update','wp-register-profile-with-shortcode');?>" <?php do_action( 'wprp_update_pass_form_submit_tag' );?>/>
			</div>	
		</form>
        
         <?php do_action('wprp_after_update_pass_form_end');?>
         
        </div>
		<?php 
		} 
	}
	
	public function error_message(){
		start_session_if_not_started();
		if(isset($_SESSION['reg_error_msg']) and $_SESSION['reg_error_msg']){
			echo '<div class="'.$_SESSION['reg_msg_class'].'">'.$_SESSION['reg_error_msg'].'</div>';
			unset($_SESSION['reg_error_msg']);
			unset($_SESSION['reg_msg_class']);
		}
	}
		
}