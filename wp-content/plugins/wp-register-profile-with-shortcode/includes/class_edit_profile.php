<?php

class profile_edit_afo{

	 public function __construct() {
		add_action( 'init', array($this, 'edit_profile_validate' ) );
	 }
	 	 
	 public function is_field_enabled($value){
		$data = get_option( $value );
		if($data == 'Yes'){
			return true;
		} else {
			return false;
		}
	}
	
	public function is_field_required($value){
		$data = get_option( $value );
		if($data == 'Yes'){
			return 'required="required"';
		} else {
			return '';
		}
	}
	
	
	public function edit_profile_validate(){
		
		if(isset($_POST['option']) and sanitize_text_field($_POST['option']) == "afo_user_edit_profile"){
			start_session_if_not_started();
			global $post;
			$error = false;
			
			if(!is_user_logged_in()){
				$msg = __('Login to update profile!','wp-register-profile-with-shortcode');
				$error = true;
			}
			
			/*if( email_exists( sanitize_text_field($_POST['user_email']) )) {
				$msg = __('Email already exists. Please use a different one!','wp-register-profile-with-shortcode');
				$error = true;
			}*/
			
			$userdata = array();
			
			if( $this->is_field_enabled('firstname_in_profile') ){
				if( $this->is_field_enabled('is_firstname_required') and sanitize_text_field($_POST['first_name']) == '' ){
					$msg .= __('Please enter first name','wp-register-profile-with-shortcode');
					$msg .= '</br>';
					$error = true;
				} else {
					$userdata['first_name'] = sanitize_text_field($_POST['first_name']);
				}
			}
			
			if($this->is_field_enabled('lastname_in_profile')){
				if( $this->is_field_enabled('is_lastname_required') and sanitize_text_field($_POST['last_name']) == '' ){
					$msg .= __('Please enter last name','wp-register-profile-with-shortcode');
					$msg .= '</br>';
					$error = true;
				} else {
					$userdata['last_name'] = sanitize_text_field($_POST['last_name']);
				}
			}
			
			if($this->is_field_enabled('displayname_in_profile')){
				if( $this->is_field_enabled('is_displayname_required') and sanitize_text_field($_POST['display_name']) == '' ){
					$msg .= __('Please enter display name','wp-register-profile-with-shortcode');
					$msg .= '</br>';
					$error = true;
				} else {
					$userdata['display_name'] = sanitize_text_field($_POST['display_name']);
				}
			}
			
			if($this->is_field_enabled('userdescription_in_profile')){
				if( $this->is_field_enabled('is_userdescription_required') and sanitize_text_field($_POST['description']) == '' ){
					$msg .= __('Please enter description','wp-register-profile-with-shortcode');
					$msg .= '</br>';
					$error = true;
				} else {
					$userdata['description'] = sanitize_text_field($_POST['description']);
				}
			}
			
			if($this->is_field_enabled('userurl_in_profile')){
				if( $this->is_field_enabled('is_userurl_required') and sanitize_text_field($_POST['user_url']) == '' ){
					$msg .= __('Please enter description','wp-register-profile-with-shortcode');
					$msg .= '</br>';
					$error = true;
				} else {
					$userdata['user_url'] = sanitize_text_field($_POST['user_url']);
				}
			}
			
			if(!$error){
				$user_id = get_current_user_id();
				$userdata['ID'] = $user_id;
				$userdata['user_email'] = sanitize_text_field($_POST['user_email']);
				
				// update user profile in db //
					$user_id = wp_update_user( $userdata );
				// update user profile in db //
				
				// check for any errors //
				if ( is_wp_error( $user_id ) ) {
					$msg = $user_id->get_error_message();
					$_SESSION['reg_error_msg'] = $msg;
					$_SESSION['reg_msg_class'] = 'reg_error';
					if(!empty($_POST['redirect'])){
						$redirect =  sanitize_text_field($_POST['redirect']);
						wp_redirect($redirect);
						exit;
					} else {
						wp_redirect(get_permalink());
						exit;
					}
				}
				// check for any errors //
				
				$_SESSION['reg_error_msg'] = __('Profile data updated successfully.','wp-register-profile-with-shortcode');
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
	 
	 
	public function profileEdit(){
		global $post;
		if(is_user_logged_in()){
      	$current_user = wp_get_current_user();
		$user_id = get_current_user_id();
		$this->load_script();
		?>
        <div id="reg_forms" class="reg_forms">
        
        <?php do_action('wprp_before_profile_form_start');?>
        
        <?php $this->error_message(); ?>
        
		<form name="profile" id="profile" method="post" <?php do_action('wprp_profile_form_tag');?>>
		<input type="hidden" name="option" value="afo_user_edit_profile" />
        <input type="hidden" name="redirect" value="<?php echo sanitize_text_field( register_wid::curPageURL() ); ?>">
		
			<div class="reg-form-group">
			<label for="name"><?php _e('Username','wp-register-profile-with-shortcode');?> </label>
			<input type="text" required value="<?php echo $current_user->user_login;?>" disabled <?php do_action( 'wprp_profile_user_login_field' );?>/>
			</div>
			
			<div class="reg-form-group">
			<label for="name"><?php _e('User Email','wp-register-profile-with-shortcode');?> </label>
			<input type="email" name="user_email" value="<?php echo $current_user->user_email;?>" required <?php do_action( 'wprp_profile_user_email_field' );?>/>
			</div>
		
			<?php if($this->is_field_enabled('firstname_in_profile')){ ?>
			<div class="reg-form-group">
			<label for="name"><?php _e('First Name','wp-register-profile-with-shortcode');?> </label>
			<input type="text" name="first_name" <?php echo $this->is_field_required('is_firstname_required');?> placeholder="First Name" value="<?php echo $current_user->first_name;?>" <?php do_action( 'wprp_profile_first_name_field' );?>/>
			</div>
			<?php } ?>
			
			<?php if($this->is_field_enabled('lastname_in_profile')){ ?>
			<div class="reg-form-group">
			<label for="name"><?php _e('Last Name','wp-register-profile-with-shortcode');?> </label>
			<input type="text" name="last_name" <?php echo $this->is_field_required('is_lastname_required');?> placeholder="Last Name" value="<?php echo $current_user->last_name;?>" <?php do_action( 'wprp_profile_last_name_field' );?>/>
			</div>
			<?php } ?>
			
			<?php if($this->is_field_enabled('displayname_in_profile')){ ?>
			<div class="reg-form-group">
			<label for="name"><?php _e('Display Name','wp-register-profile-with-shortcode');?> </label>
			<input type="text" name="display_name" <?php echo $this->is_field_required('is_displayname_required');?> placeholder="Display Name" value="<?php echo $current_user->display_name;?>" <?php do_action( 'wprp_profile_display_name_field' );?>/>
			</div>
			<?php } ?>
			
			<?php if($this->is_field_enabled('userdescription_in_profile')){ ?>
			<div class="reg-form-group">
			<label for="name"><?php _e('About User','wp-register-profile-with-shortcode');?> </label>
			<textarea name="description" <?php echo $this->is_field_required('is_userdescription_required');?> <?php do_action( 'wprp_profile_description_field' );?>><?php echo get_the_author_meta( 'description', $user_id );?></textarea>
			</div>
			<?php } ?>
			
			<?php if($this->is_field_enabled('userurl_in_profile')){ ?>
			<div class="reg-form-group">
			<label for="name"><?php _e('Website','wp-register-profile-with-shortcode');?> </label>
			<input type="url" name="user_url" <?php echo $this->is_field_required('is_userurl_required');?> placeholder="User URL" value="<?php echo get_the_author_meta( 'user_url', $user_id );?>" <?php do_action( 'wprp_profile_user_url_field' );?>/>
			</div>
			<?php } ?>
			
			<div class="reg-form-group">
			<input name="profile" type="submit" value="<?php _e('Update','wp-register-profile-with-shortcode');?>" <?php do_action( 'wprp_profile_form_submit_tag' );?>/>
			</div>		
		</form>
        
        <?php do_action('wprp_after_profile_form_end');?>
        
        </div>
		<?php 
		} 
	}
	
	public function load_script(){?>
		<script type="text/javascript">
			jQuery(document).ready(function () {
				jQuery('#profile').validate({ errorClass: "rw-error" });
			});
		</script>
	<?php }
	
	public function error_message(){
		start_session_if_not_started();
		
		if(isset($_SESSION['reg_error_msg']) and $_SESSION['reg_error_msg']){
			echo '<div class="'.$_SESSION['reg_msg_class'].'">'.$_SESSION['reg_error_msg'].'</div>';
			unset($_SESSION['reg_error_msg']);
			unset($_SESSION['reg_msg_class']);
		}
	}
		
}
