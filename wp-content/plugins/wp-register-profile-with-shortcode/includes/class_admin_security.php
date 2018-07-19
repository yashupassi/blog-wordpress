<?php

class register_admin_security {
	
	public function __construct() {
		if( in_array( $GLOBALS['pagenow'], array( 'wp-login.php' ) ) ){
			add_action( 'register_form', array( $this, 'display_captcha_admin_registration' ) );
			add_action( 'registration_errors', array( $this, 'validate_captcha_admin_registration' ), 10, 3 );
		}
	}
	
	public function is_field_enabled($value){
		$data = get_option( $value );
		if($data === 'Yes'){
			return true;
		} else {
			return false;
		}
	}
	
	public function display_captcha_admin_registration() {
		?>
		 <?php if($this->is_field_enabled('captcha_in_wordpress_default_registration')){ ?>
			<p>
                <label for="captcha"><?php _e('Captcha','wp-register-profile-with-shortcode');?>
                <?php $this->captchaImage();?><br>
                <input type="text" name="admin_captcha" class="input" required size="20" <?php do_action( 'wprp_admin_captcha_field' );?>/>
                </label>
            </p>
			<?php } ?>
	<?php
	}
	
	public function captchaImage(){
		echo '<img src="'.plugins_url( WPRPWS_DIR_NAME . '/captcha/captcha_admin.php' ).'" id="captcha" style="float:right;">';
	}
	
	public function validate_captcha_admin_registration($errors, $sanitized_user_login, $user_email) {
		start_session_if_not_started();
		if($this->is_field_enabled('captcha_in_wordpress_default_registration')){ 
			if ( sanitize_text_field($_POST['admin_captcha']) != $_SESSION['captcha_code_admin'] ){
				$errors->add( 'invalid_captcha', '<strong>ERROR</strong>: Security code do not match!');
			}
		}
		return $errors;
	}
	
}