<?php

class register_wid extends WP_Widget {
	
	public function __construct() {
		parent::__construct(
	 		'register_wid',
			'Registration Widget',
			array( 'description' => __( 'This is a simple user registration form in the widget.', 'wp-register-profile-with-shortcode' ), )
		);
	 }

	public function widget( $args, $instance ) {
		extract( $args );
		if( is_user_logged_in() ){
			return;
		}
		
		$wid_title = apply_filters( 'widget_title', $instance['wid_title'] );
		
		echo $args['before_widget'];
		if ( ! empty( $wid_title ) )
			echo $args['before_title'] . $wid_title . $args['after_title'];
			$this->registerForm();
		echo $args['after_widget'];
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['wid_title'] = sanitize_text_field( $new_instance['wid_title'] );
		return $instance;
	}

	public function form( $instance ) {
		$wid_title = '';
		if(!empty($instance[ 'wid_title' ])){
			$wid_title = $instance[ 'wid_title' ];
		}
		?>
		<p><label for="<?php echo $this->get_field_id('wid_title'); ?>"><?php _e('Title','wp-register-profile-with-shortcode'); ?> </label>
		<input class="widefat" id="<?php echo $this->get_field_id('wid_title'); ?>" name="<?php echo $this->get_field_name('wid_title'); ?>" type="text" value="<?php echo $wid_title; ?>" />
		</p>
        <p><?php _e( 'Registration form will not be displayed if user is Logged In', 'wp-register-profile-with-shortcode' );?></p>
		<?php 
	}
	
	public function registerForm(){
		start_session_if_not_started();
		global $post;
		$wprp_p = new wprp_register_process;
		$default_registration_form_hooks = get_option('default_registration_form_hooks'); 
		
		if(!is_user_logged_in()){
			if(get_option('users_can_register')) { 
			$this->load_script(); 
		?>
        <div id="reg_forms" class="reg_forms">
        
        <?php do_action('wprp_before_register_form_start');?>
        
        <?php $this->error_message();?>
        
		<form name="register" id="register" method="post" action="" <?php do_action('wprp_register_form_tag');?>>
		<input type="hidden" name="option" value="afo_user_register" />
        <input type="hidden" name="redirect" value="<?php echo sanitize_text_field( wprp_register_process::curPageURL() ); ?>" />
			
            <?php if($wprp_p->is_field_enabled('username_in_registration')){ ?>
            <div class="reg-form-group">
				<!--<label for="username"><?php _e('Username','wp-register-profile-with-shortcode');?> </label>-->
				<input type="text" name="user_login" placeholder="Name*" value="<?php echo sanitize_text_field(@$_SESSION['wp_register_temp_data']['user_login']);?>" required placeholder="<?php _e('Username','wp-register-profile-with-shortcode');?>" <?php do_action( 'wprp_user_login_field' );?>/>
			</div>
			<?php } ?>
            
			<div class="reg-form-group">
				<!--<label for="useremail"><?php _e('User Email','wp-register-profile-with-shortcode');?> </label>-->
				<input type="email" name="user_email" placeholder="Email*" value="<?php echo sanitize_text_field(@$_SESSION['wp_register_temp_data']['user_email']);?>" required placeholder="<?php _e('User Email','wp-register-profile-with-shortcode');?>" <?php do_action( 'wprp_user_email_field' );?>/>
			</div>
			
			<?php if($wprp_p->is_field_enabled('password_in_registration')){ ?>
			<div class="reg-form-group">
			<label for="password"><?php _e('Password','wp-register-profile-with-shortcode');?> </label>
			<input type="password" name="new_user_password" required placeholder="<?php _e('Password','wp-register-profile-with-shortcode');?>" <?php do_action( 'wprp_new_user_password_field' );?>/>
			</div>
			
			<div class="reg-form-group">
			<label for="retypepassword"><?php _e('Retype Password','wp-register-profile-with-shortcode');?> </label>
			<input type="password" name="re_user_password" required placeholder="<?php _e('Retype Password','wp-register-profile-with-shortcode');?>" <?php do_action( 'wprp_re_user_password_field' );?>/>
			</div>
			<?php } ?>
			
			<?php if($wprp_p->is_field_enabled('firstname_in_registration')){ ?>
			<div class="reg-form-group">
			<label for="firstname"><?php _e('First Name','wp-register-profile-with-shortcode');?> </label>
			<input type="text" name="first_name" value="<?php echo sanitize_text_field(@$_SESSION['wp_register_temp_data']['first_name']);?>" <?php echo $wprp_p->is_field_required('is_firstname_required');?> placeholder="<?php _e('First Name','wp-register-profile-with-shortcode');?>" <?php do_action( 'wprp_first_name_field' );?>/>
			</div>
			<?php } ?>
			
			<?php if($wprp_p->is_field_enabled('lastname_in_registration')){ ?>
			<div class="reg-form-group">
			<label for="lastname"><?php _e('Last Name','wp-register-profile-with-shortcode');?> </label>
			<input type="text" name="last_name" value="<?php echo sanitize_text_field(@$_SESSION['wp_register_temp_data']['last_name']);?>" <?php echo $wprp_p->is_field_required('is_lastname_required');?> placeholder="<?php _e('Last Name','wp-register-profile-with-shortcode');?>" <?php do_action( 'wprp_last_name_field' );?>/>
			</div>
			<?php } ?>
			
			<?php if($wprp_p->is_field_enabled('displayname_in_registration')){ ?>
			<div class="reg-form-group">
			<label for="displayname"><?php _e('Display Name','wp-register-profile-with-shortcode');?> </label>
			<input type="text" name="display_name" value="<?php echo sanitize_text_field(@$_SESSION['wp_register_temp_data']['display_name']);?>" <?php echo $wprp_p->is_field_required('is_displayname_required');?> placeholder="<?php _e('Display Name','wp-register-profile-with-shortcode');?>" <?php do_action( 'wprp_display_name_field' );?>/>
			</div>
			<?php } ?>
			
			<?php if($wprp_p->is_field_enabled('userdescription_in_registration')){ ?>
			<div class="reg-form-group">
			<label for="aboutuser"><?php _e('About User','wp-register-profile-with-shortcode');?> </label>
			<textarea name="description" <?php echo $wprp_p->is_field_required('is_userdescription_required');?> <?php do_action( 'wprp_description_field' );?>><?php echo sanitize_text_field(@$_SESSION['wp_register_temp_data']['description']);?></textarea>
			</div>
			<?php } ?>
			
			<?php if($wprp_p->is_field_enabled('userurl_in_registration')){ ?>
			<div class="reg-form-group">
			<label for="website"><?php _e('Website','wp-register-profile-with-shortcode');?> </label>
			<input type="url" name="user_url" value="<?php echo sanitize_text_field(@$_SESSION['wp_register_temp_data']['user_url']);?>" <?php echo $wprp_p->is_field_required('is_userurl_required');?> placeholder="<?php _e('Website','wp-register-profile-with-shortcode');?>" <?php do_action( 'wprp_user_url_field' );?>/>
			</div>
			<?php } ?>
			
			<?php do_action('wp_register_profile_subscription'); ?>
            
            <?php if($wprp_p->is_field_enabled('captcha_in_registration')){ ?>
			<div class="reg-form-group">
			<label for="captcha"><?php _e('Captcha','wp-register-profile-with-shortcode');?> </label>
            <?php $this->captchaImage();?>
			<input type="text" name="user_captcha" required <?php do_action( 'wprp_user_captcha_field' );?>/>
			</div>
			<?php } ?>
            
            <?php $default_registration_form_hooks == 'Yes'?do_action('register_form'):'';?>
            
            <?php do_action('wp_register_profile_form');?>
			
			<div class="reg-form-group"><input name="register" class="btn-rectangle" type="submit" value="<?php _e('Register','wp-register-profile-with-shortcode');?>" <?php do_action( 'wprp_register_form_submit_tag' );?>/></div>
			<p><a href="#" id="log_in" class="sign-up">Log In ? </a></p>

		</form>
        
         <?php do_action('wprp_after_register_form_end');?>
        
		</div>
		<?php 
		} else {
			echo '<div id="reg_forms" class="reg_forms"><p>' . apply_filters( 'wprp_registration_disabled_text', __('Sorry. Registration is not allowed in this site.','wp-register-profile-with-shortcode') ) . '</p></div>';
		}
		}
	}
	
	public function load_script(){ ?>
		<script type="text/javascript">
			jQuery(document).ready(function () {
				jQuery('#register').validate({ errorClass: "rw-error" });
			});
		</script>
	<?php }
	
	public function captchaImage(){
	?>
	<div class="reg-captcha">
    <img src="<?php echo plugins_url( WPRPWS_DIR_NAME . '/captcha/captcha.php' ); ?>" id="captcha">
	<br /><a href="javascript:refreshCaptcha();"><?php _e('Reload Image','wp-register-profile-with-shortcode');?></a>
	</div>
    <script type="application/javascript">
	function refreshCaptcha(){ document.getElementById('captcha').src = '<?php echo plugins_url( WPRPWS_DIR_NAME . '/captcha/captcha.php' );?>?rand='+Math.random(); }
	</script>
    <?php
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

