<?php
class register_settings {
	
	public static $wprw_success_msg = 'You are successfully registered to the site. Please check your email for login details.';
	
	public function __construct() {
		$this->load_settings();
	}
	
	public function register_widget_afo_save_settings(){
		if(isset($_POST['option']) and sanitize_text_field($_POST['option']) == "register_widget_afo_save_settings"){
			start_session_if_not_started();
			global $wprp_default_options_data;
			
			if ( ! isset( $_POST['register_widget_afo_save_action_field'] ) || ! wp_verify_nonce( $_POST['register_widget_afo_save_action_field'], 'register_widget_afo_save_action' ) ) {
			   wp_die( 'Sorry, your nonce did not verify.');
			} 
			
			if( is_array($wprp_default_options_data) ){
				foreach( $wprp_default_options_data as $key => $value ){
					if ( !empty( $_REQUEST[$key] ) ) {
						
						if( $value['sanitization'] == 'sanitize_text_field' ){
							update_option( $key, sanitize_text_field($_REQUEST[$key]) );
						} elseif( $value['sanitization'] == 'esc_html' ){
							update_option( $key, esc_html($_REQUEST[$key]) );
						} elseif( $value['sanitization'] == 'esc_textarea' ){
							update_option( $key, esc_textarea($_REQUEST[$key]) );
						} elseif( $value['sanitization'] == 'sanitize_text_field_array' ){
						 	update_option( $key, array_filter( $_REQUEST[$key], 'sanitize_text_field' ) );
						} else {
							update_option( $key, sanitize_text_field($_REQUEST[$key]) );
						}
					} else {
						delete_option( $key );
					}
				}
			}
			
			$_SESSION['msg'] = 'Plugin data updated successfully.';
			$_SESSION['msg_class'] = 'updated';
		}
	}
	
	private function error_message(){
		start_session_if_not_started();
		if(isset($_SESSION['msg']) and $_SESSION['msg']){
			echo '<div class="'.$_SESSION['msg_class'].'"><p>'.$_SESSION['msg'].'</p></div>';
			unset($_SESSION['msg']);
			unset($_SESSION['msg_class']);
		}
	}
	
	public static function removeslashes($string){
		$string=implode("",explode("\\",$string));
		return stripslashes(trim($string));
	}
	
	public function register_widget_afo_options () {
	echo '<div class="wrap">';
	global $wpdb;
	
	$thank_you_page_after_registration_url = get_option('thank_you_page_after_registration_url');
	
	$username_in_registration = get_option( 'username_in_registration' );
	
	$password_in_registration = get_option( 'password_in_registration' );
	
	$firstname_in_registration = get_option( 'firstname_in_registration' );
	$firstname_in_profile = get_option( 'firstname_in_profile' );
	$is_firstname_required = get_option( 'is_firstname_required' );
	
	$lastname_in_registration = get_option( 'lastname_in_registration' );
	$lastname_in_profile = get_option( 'lastname_in_profile' );
	$is_lastname_required = get_option( 'is_lastname_required' );
	
	$displayname_in_registration = get_option( 'displayname_in_registration' );
	$displayname_in_profile = get_option( 'displayname_in_profile' );
	$is_displayname_required = get_option( 'is_displayname_required' );
	
	$userdescription_in_registration = get_option( 'userdescription_in_registration' );
	$userdescription_in_profile = get_option( 'userdescription_in_profile' );
	$is_userdescription_required = get_option( 'is_userdescription_required' );
	
	$userurl_in_registration = get_option( 'userurl_in_registration' );
	$userurl_in_profile = get_option( 'userurl_in_profile' );
	$is_userurl_required = get_option( 'is_userurl_required' );
	
	$wprw_success_msg = $this->removeslashes(get_option( 'wprw_success_msg' ));
	
	$wprw_admin_email = get_option( 'wprw_admin_email' );
	$wprw_from_email = get_option( 'wprw_from_email' );
	$new_user_register_mail_subject = $this->removeslashes(get_option('new_user_register_mail_subject'));
	$new_user_register_mail_body = $this->removeslashes(get_option('new_user_register_mail_body'));
	
	$captcha_in_registration = get_option( 'captcha_in_registration' );
	$captcha_in_wordpress_default_registration = get_option( 'captcha_in_wordpress_default_registration' );
	$force_login_after_registration = get_option( 'force_login_after_registration' );
	
	$default_registration_form_hooks = get_option( 'default_registration_form_hooks' );
	
	$enable_cfws_newsletter_subscription = get_option( 'enable_cfws_newsletter_subscription' );
	
	$this->error_message();
	
	$this->help_support();
	$this->login_sidebar_widget_add();
	
	form_class::form_open();
	wp_nonce_field( 'register_widget_afo_save_action', 'register_widget_afo_save_action_field' );
    form_class::form_input('hidden','option','','register_widget_afo_save_settings');
	?>
  <table width="100%" border="0" class="ap-table">
    <tr>
      <td><h3><?php _e('WP Register Profile With Shortcode Settings', 'wp-register-profile-with-shortcode');?></h3></td>
    </tr>
    <tr>
      <td><div class="ap-tabs">
          <div class="ap-tab">
            <?php _e('Form Fields','wp-register-profile-with-shortcode');?>
          </div>
          <div class="ap-tab">
            <?php _e('Other Settings','wp-register-profile-with-shortcode');?>
          </div>
          <div class="ap-tab">
            <?php _e('Message','wp-register-profile-with-shortcode');?>
          </div>
          <div class="ap-tab">
            <?php _e('Email Settings','wp-register-profile-with-shortcode');?>
          </div>
          <div class="ap-tab">
            <?php _e('Shortcodes','wp-register-profile-with-shortcode');?>
          </div>
          <?php do_action('wprp_custom_settings_tab');?>
        </div>
        <div class="ap-tabs-content">
          <div class="ap-tab-content">
            <table width="100%" border="0" class="field_form_table">
              <tr style="background-color:#FFFFFF;">
                <td colspan="4"><h3><?php _e('Enable / Disable Registration and Profile Form Fields', 'wp-register-profile-with-shortcode');?></h3></td>
              </tr>
              <tr style="background-color:#F1F1F1;">
                <td width="10%"><strong><?php _e('Field', 'wp-register-profile-with-shortcode');?></strong></td>
                <td width="10%"><strong><?php _e('Required', 'wp-register-profile-with-shortcode');?></strong></td>
                <td width="40%"><strong><?php _e('Show In Registration', 'wp-register-profile-with-shortcode');?></strong></td>
                <td width="40%"><strong><?php _e('Show In Profile', 'wp-register-profile-with-shortcode');?></strong></td>
              </tr>
              <tr style="background-color:#FFFFFF;">
                <td><strong><?php _e('User Name', 'wp-register-profile-with-shortcode');?></strong></td>
                <td align="center"><?php  form_class::form_checkbox('','','','','','',true,true);?></td>
                <td>
                <?php 
                $username_in_registration_status = ($username_in_registration == 'Yes'?true:false);
                form_class::form_checkbox('username_in_registration','',"Yes",'','','',$username_in_registration_status);
                ?><span><?php _e('If unchecked then <strong>User Email</strong> will be used as <strong>User Name</strong>.', 'wp-register-profile-with-shortcode');?></span></td>
                <td><span><?php _e('This field cannot be updated.', 'wp-register-profile-with-shortcode');?></span></td>
              </tr>
              <tr style="background-color:#F1F1F1;">
                <td><strong><?php _e('User Email', 'wp-register-profile-with-shortcode');?></strong></td>
                <td align="center"><?php  form_class::form_checkbox('','','','','','',true,true);?></td>
                <td><span><?php _e('This field is required and cannot be removed.', 'wp-register-profile-with-shortcode');?></span></td>
                <td><span><?php _e('This field can be updated.', 'wp-register-profile-with-shortcode');?></span></td>
              </tr>
              <tr style="background-color:#FFFFFF;">
                <td><strong><?php _e('Password Field', 'wp-register-profile-with-shortcode');?> </strong></td>
                <td align="center"><?php  form_class::form_checkbox('','','','','','',true,true);?></td>
                <td><?php 
                $password_in_registration_status = ($password_in_registration == 'Yes'?true:false);
                form_class::form_checkbox('password_in_registration','',"Yes",'','','',$password_in_registration_status);
                ?><span><?php _e('Check this to enable password field in registration form. Otherwise the password will be auto generated and Emailed to user.', 'wp-register-profile-with-shortcode');?></span></td>
                <td><span><?php _e('Password can be updated from update password page. Use this shortcode <strong>[rp_update_password]', 'wp-register-profile-with-shortcode');?></strong></span></td>
              </tr>
              <tr style="background-color:#F1F1F1;">
                <td><strong><?php _e('First Name', 'wp-register-profile-with-shortcode');?> </strong></td>
                <td align="center"><?php 
                $is_firstname_required_status = ($is_firstname_required == 'Yes'?true:false);
                form_class::form_checkbox('is_firstname_required','',"Yes",'','','',$is_firstname_required_status);
                ?></td>
                <td><?php 
                $firstname_in_registration_status = ($firstname_in_registration == 'Yes'?true:false);
                form_class::form_checkbox('firstname_in_registration','',"Yes",'','','',$firstname_in_registration_status);
                ?><span><?php _e('Check this to enable first name in registration form.', 'wp-register-profile-with-shortcode');?></span></td>
                <td><?php 
                $firstname_in_profile_status = ($firstname_in_profile == 'Yes'?true:false);
                form_class::form_checkbox('firstname_in_profile','',"Yes",'','','',$firstname_in_profile_status);
                ?><span>Check this to enable first name in profile form.</span></td>
              </tr>
              <tr style="background-color:#FFFFFF;">
                <td><strong><?php _e('Last Name', 'wp-register-profile-with-shortcode');?> </strong></td>
                <td align="center"><?php 
                $is_lastname_required_status = ($is_lastname_required == 'Yes'?true:false);
                form_class::form_checkbox('is_lastname_required','',"Yes",'','','',$is_lastname_required_status);
                ?></td>
                <td><?php 
                $lastname_in_registration_status = ($lastname_in_registration == 'Yes'?true:false);
                form_class::form_checkbox('lastname_in_registration','',"Yes",'','','',$lastname_in_registration_status);
                ?><span><?php _e('Check this to enable last name in registration form.', 'wp-register-profile-with-shortcode');?></span></td>
                <td><?php 
                $lastname_in_profile_status = ($lastname_in_profile == 'Yes'?true:false);
                form_class::form_checkbox('lastname_in_profile','',"Yes",'','','',$lastname_in_profile_status);
                ?><span><?php _e('Check this to enable last name in profile form.', 'wp-register-profile-with-shortcode');?></span></td>
              </tr>
              <tr style="background-color:#F1F1F1;">
                <td><strong><?php _e('Display Name', 'wp-register-profile-with-shortcode');?> </strong></td>
                <td align="center"><?php 
                $is_displayname_required_status = ($is_displayname_required == 'Yes'?true:false);
                form_class::form_checkbox('is_displayname_required','',"Yes",'','','',$is_displayname_required_status);
                ?></td>
                <td><?php 
                $displayname_in_registration_status = ($displayname_in_registration == 'Yes'?true:false);
                form_class::form_checkbox('displayname_in_registration','',"Yes",'','','',$displayname_in_registration_status);
                ?><span><?php _e('Check this to enable display name in registration form.', 'wp-register-profile-with-shortcode');?></span></td>
                <td><?php 
                $displayname_in_profile_status = ($displayname_in_profile == 'Yes'?true:false);
                form_class::form_checkbox('displayname_in_profile','',"Yes",'','','',$displayname_in_profile_status);
                ?><span><?php _e('Check this to enable display name in profile form.', 'wp-register-profile-with-shortcode');?></span></td>
              </tr>
              <tr style="background-color:#FFFFFF;">
                <td><strong><?php _e('About User', 'wp-register-profile-with-shortcode');?> </strong></td>
                <td align="center"><?php 
                $is_userdescription_required_status = ($is_userdescription_required == 'Yes'?true:false);
                form_class::form_checkbox('is_userdescription_required','',"Yes",'','','',$is_userdescription_required_status);
                ?></td>
                <td><?php 
                $userdescription_in_registration_status = ($userdescription_in_registration == 'Yes'?true:false);
                form_class::form_checkbox('userdescription_in_registration','',"Yes",'','','',$userdescription_in_registration_status);
                ?><span><?php _e('Check this to enable about user in registration form.', 'wp-register-profile-with-shortcode');?></span></td>
                <td><?php 
                $userdescription_in_profile_status = ($userdescription_in_profile == 'Yes'?true:false);
                form_class::form_checkbox('userdescription_in_profile','',"Yes",'','','',$userdescription_in_profile_status);
                ?><span><?php _e('Check this to enable about user in profile form.', 'wp-register-profile-with-shortcode');?></span></td>
              </tr>
              <tr style="background-color:#F1F1F1;">
                <td><strong><?php _e('User Url', 'wp-register-profile-with-shortcode');?></strong></td>
                <td align="center"><?php 
                $is_userurl_required_status = ($is_userurl_required == 'Yes'?true:false);
                form_class::form_checkbox('is_userurl_required','',"Yes",'','','',$is_userurl_required_status);
                ?></td>
                <td><?php 
                $userurl_in_registration_status = ($userurl_in_registration == 'Yes'?true:false);
                form_class::form_checkbox('userurl_in_registration','',"Yes",'','','',$userurl_in_registration_status);
                ?><span><?php _e('Check this to enable user url in registration form.', 'wp-register-profile-with-shortcode');?></span></td>
                <td><?php 
                $userurl_in_profile_status = ($userurl_in_profile == 'Yes'?true:false);
                form_class::form_checkbox('userurl_in_profile','',"Yes",'','','',$userurl_in_profile_status);
                ?><span><?php _e('Check this to enable user url in profile form.', 'wp-register-profile-with-shortcode');?></span></td>
              </tr>
              <tr>
                <td colspan="4"><?php form_class::form_input('submit','submit','',__('Save','wp-register-profile-with-shortcode'),'button button-primary button-large','','','','','',false,'');?></td>
              </tr>
              <tr style="background-color:#FFFFFF;">
                <td colspan="4">Use <a href="https://www.aviplugins.com/wp-register-profile-pro/" target="_blank">PRO</a> version to create additional custom fields with Sorting option using Drag & Drop</td>
              </tr>
            </table>
          </div>
          <div class="ap-tab-content">
          	<table width="100%" border="0" class="ap-table">
              <tr>
                <td valign="top"><strong><?php _e('Thank You Page', 'wp-register-profile-with-shortcode');?></strong></td>
                <td><?php
					$args = array(
					'depth'            => 0,
					'selected'         => $thank_you_page_after_registration_url,
					'echo'             => 1,
					'show_option_none' => '--',
					'id' 			   => 'thank_you_page_after_registration_url',
					'name'             => 'thank_you_page_after_registration_url'
					);
					wp_dropdown_pages( $args ); 
				?>
                  <i><?php _e('If selected user will be redirected to this page after successful registration', 'wp-register-profile-with-shortcode');?></i></td>
              </tr>
            </table>
            <table width="100%" border="0" class="ap-table">
              <tr>
                <td><?php _e('Make User Logged-In after successful registration', 'wp-register-profile-with-shortcode');?>
                <?php 
                $force_login_after_registration_status = ($force_login_after_registration == 'Yes'?true:false);
                form_class::form_checkbox('force_login_after_registration','',"Yes",'','','',$force_login_after_registration_status);
                ?>
                  </td>
              </tr>
            </table>
            <table width="100%" border="0" class="ap-table">
              <tr>
                <td><?php _e('Use CAPTCHA in Registration Form', 'wp-register-profile-with-shortcode');?>
                <?php 
                $captcha_in_registration_status = ($captcha_in_registration == 'Yes'?true:false);
                form_class::form_checkbox('captcha_in_registration','',"Yes",'','','',$captcha_in_registration_status);
                ?>
                  </td>
              </tr>
            </table>
            <table width="100%" border="0" class="ap-table">
              <tr>
                <td><?php _e('Use CAPTCHA in WordPress Default Registration Form', 'wp-register-profile-with-shortcode');?>
                <?php 
                $captcha_in_wordpress_default_registration_status = ($captcha_in_wordpress_default_registration == 'Yes'?true:false);
                form_class::form_checkbox('captcha_in_wordpress_default_registration','',"Yes",'','','',$captcha_in_wordpress_default_registration_status);
                ?>
                  </td>
              </tr>
            </table>
            <table width="100%" border="0" class="ap-table">
              <tr>
                <td><strong><?php _e('Enable default WordPress registration form hooks', 'wp-register-profile-with-shortcode');?></strong>
                <?php 
                $default_registration_form_hooks_status = ($default_registration_form_hooks == 'Yes'?true:false);
                form_class::form_checkbox('default_registration_form_hooks','',"Yes",'','','',$default_registration_form_hooks_status);
                ?>
                  <p>Check to <strong>Enable</strong> default WordPress registration form hooks. This will make the registration form compatible with other plugins. For example <strong>Enable</strong> this if you want to use CAPTCHA on registration, from another plugin. <strong>Disable</strong> this so that no other plugins can interfere with your registration process.</p></td>
              </tr>
            </table>
            <table width="100%" border="0" class="ap-table">
              <tr>
                <td><strong><?php _e('Enable Newsletter Subscription', 'wp-register-profile-with-shortcode');?></strong>
                <?php 
                $enable_cfws_newsletter_subscription_status = ($enable_cfws_newsletter_subscription == 'Yes'?true:false);
                form_class::form_checkbox('enable_cfws_newsletter_subscription','',"Yes",'','','',$enable_cfws_newsletter_subscription_status);
                ?>
                  <p>Check to <strong>Enable</strong> Newsletter subscription at the time of Registration. To enable this feature you must Install <a href="https://wordpress.org/plugins/contact-form-with-shortcode/" target="_blank">Contact Form With Shortcode</a> plugin.</p></td>
              </tr>
            </table>
            <table width="100%" border="0">
            <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><?php form_class::form_input('submit','submit','',__('Save','wp-register-profile-with-shortcode'),'button button-primary button-large','','','','','',false,'');?></td>
              </tr>
            </table>
          </div>
          <div class="ap-tab-content">
          	<table width="100%" border="0">
              <tr>
                <td valign="top" width="300"><strong><?php _e('Success Message', 'wp-register-profile-with-shortcode');?></strong></td>
                <td>
                <?php form_class::form_input('text','wprw_success_msg','',$wprw_success_msg,'','','','','50','',false,__('You are successfully registered','wp-register-profile-with-shortcode'));?>
                  <br><i><?php _e('Message to display after successful registration.', 'wp-register-profile-with-shortcode');?></i>
                  <br><br><strong>Default Message</strong> "<?php echo self::$wprw_success_msg;?>"
                  </td>
              </tr>
            </table>
            <table width="100%" border="0">
            	<tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><?php form_class::form_input('submit','submit','',__('Save','wp-register-profile-with-shortcode'),'button button-primary button-large','','','','','',false,'');?></td>
              </tr>
            </table>
          </div>
          <div class="ap-tab-content">
            <table width="100%" border="0">
              <tr>
                <td width="300"><strong><?php _e('Admin Email', 'wp-register-profile-with-shortcode');?></strong></td>
                <td><?php form_class::form_input('text','wprw_admin_email','',$wprw_admin_email,'','','','','40','',false,__('admin@example.com','wp-register-profile-with-shortcode'));?>
                  <i><?php _e('Admin Email notification will be sent to this email address when new user do registration in the site', 'wp-register-profile-with-shortcode');?></i></td>
              </tr>
              <tr>
                <td colspan="2">&nbsp;</td>
              </tr>
              <tr>
                <td><strong><?php _e('From Email', 'wp-register-profile-with-shortcode');?></strong></td>
                <td><?php form_class::form_input('text','wprw_from_email','',$wprw_from_email,'','','','','40','',false,__('no-reply@example.com','wp-register-profile-with-shortcode'));?>
                  <i><?php _e('This will make sure the emails are not treated as SPAM', 'wp-register-profile-with-shortcode');?></i></td>
              </tr>
              <tr>
                <td colspan="2">&nbsp;</td>
              </tr>
              <tr>
                <td valign="top"><strong><?php _e('New User Registration Email Subject', 'wp-register-profile-with-shortcode');?></strong></td>
                <td><?php form_class::form_input('text','new_user_register_mail_subject','',$new_user_register_mail_subject,'','','','','40');?></td>
              </tr>
              <tr>
                <td colspan="2">&nbsp;</td>
              </tr>
              <tr>
                <td valign="top"><strong><?php _e('New User Registration Email Body', 'wp-register-profile-with-shortcode');?></strong>
                  <p><i><?php _e('This mail will be sent to the user who make registration in the site. HTML tags are allowed.', 'wp-register-profile-with-shortcode');?></i></p></td>
                <td><?php form_class::form_textarea('new_user_register_mail_body','',$new_user_register_mail_body,'','','','','','','','','height:200px; width:100%;');?>
                  <p>Shortcodes: #site_name#, #user_name#, #user_password#, #site_url#</p></td>
              </tr>
              <tr>
                <td colspan="2"><strong>Note**</strong> When new user make registration in the site, Admin and User both will get a notification email.</td>
              </tr>
            </table>
            <table width="100%" border="0">
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><?php form_class::form_input('submit','submit','',__('Save','wp-register-profile-with-shortcode'),'button button-primary button-large','','','','','',false,'');?></td>
              </tr>
            </table>
          </div>
          <div class="ap-tab-content">
            <table width="100%" border="0">
              <tr>
                <td><strong>1.</strong> Use this <span style="color:#000066;">[rp_register_widget]</span> shortcode to display registration form in post or page.<br />
              Example: <span style="color:#000066;">[rp_register_widget title="User Registration"]</span> <br />
              <br />
              <strong>2.</strong> Use this shortcode for user profile page <span style="color:#000066;">[rp_profile_edit]</span> Logged in users can edit profile data from this page. <br />
              <br />
              <strong>3.</strong> Use this shortcode to display Update Password form <span style="color:#000066;">[rp_update_password]</span> Logged in users can update password from this page. <br />
              <br />
              <strong>4.</strong> Use This shortcode to retrieve user data <span style="color:#000066;">[rp_user_data field="first_name" user_id="2"]</span> user_id can be blank. if blank then the data is retrieve from currently loged in user. Or else you can use this function in your template file. <span style="color:#000066;">&lt;?php rp_user_data_func("first_name","2"); ?&gt;</span> <br /></td>
              </tr>
            </table>
          </div>
          
          <?php do_action('wprp_custom_settings_tab_content');?>
        </div></td>
    </tr>
  </table>
	<?php
	form_class::form_close();
	$this->wp_register_pro_add();
	$this->wp_user_subscription_add();
	$this->donate();
	
	echo '</div>';
	}
	
	public function register_widget_afo_menu () {
		add_options_page( 'Register Widget', 'WP Register Settings', 'activate_plugins', 'register_widget_afo', array( $this,'register_widget_afo_options' ));
	}
	
	public function load_settings(){
		add_action( 'admin_menu' , array( $this, 'register_widget_afo_menu' ) );
		add_action( 'admin_init', array( $this, 'register_widget_afo_save_settings' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'register_plugin_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'register_plugin_styles_admin' ) );
	}
	
	public function register_plugin_styles_admin() {
		wp_enqueue_style( 'style_register_widget', plugins_url( WPRPWS_DIR_NAME . '/css/style_register_widget.css' ) );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'jquery.cookie', plugins_url( WPRPWS_DIR_NAME . '/js/jquery.cookie.js' ) );
		wp_enqueue_script( 'ap-tabs', plugins_url( WPRPWS_DIR_NAME . '/js/ap-tabs.js' ) );
	}
	
	public function register_plugin_styles() {
		wp_enqueue_style( 'style_register_widget', plugins_url( WPRPWS_DIR_NAME . '/css/style_register_widget.css' ) );		
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'jquery.validate.min', plugins_url( WPRPWS_DIR_NAME . '/js/jquery.validate.min.js' ) );
		wp_enqueue_script( 'additional-methods', plugins_url( WPRPWS_DIR_NAME . '/js/additional-methods.js' ) );
	}
	
	public function help_support(){ ?>
<table width="100%" border="0" class="ap-table">
  <tr>
    <td align="right"><a href="https://www.aviplugins.com/support.php" target="_blank">Help and Support</a> <a href="https://www.aviplugins.com/rss/news.xml" target="_blank"><img src="<?php echo  plugins_url( WPRPWS_DIR_NAME . '/images/rss.png' );?>" style="vertical-align: middle;" alt="RSS"></a></td>
  </tr>
</table>
<?php
	}

	public function login_sidebar_widget_add(){ ?>
<table width="100%" border="0" class="ap-table">
  <tr>
    <td><p><strong>WP Register Profile With Shortcode</strong> recommends you to download and activate <a href="https://wordpress.org/plugins/login-sidebar-widget/" target="_blank">Login Widget With Shortcode</a> from <a href="https://wordpress.org/" target="_blank">wordpress.org</a> or <a href="https://www.aviplugins.com/fb-login-widget-pro/" target="_blank">Facebook Login Widget (PRO)</a>, so that users can login after successful registration. This will enable user login widget for your site. <a href="https://www.aviplugins.com/fb-login-widget-pro/" target="_blank">Facebook Login Widget (PRO)</a> has social login features, users will be able to login using <strong>Facebook, Google, Twitter, LinkedIn, Microsoft and Yahoo</strong> accounts.</p></td>
  </tr>
</table>
<?php }
	
	public function wp_register_pro_add(){ ?>
<table width="100%" border="0" class="ap-table">
  <tr>
    <td><strong>WP Register Profile PRO</strong>
      <p>The PRO version of this plugin supports <strong>Custom Fields</strong> in user <strong>Registration/ Profile</strong> form. Let user upload their own <strong>Profile Image</strong>. This image will be used as User <strong>Avatar</strong>. User can upload additional <strong>Files</strong> when they register. Admin can check uploaded files from WordPress admin panel. <a href="https://www.aviplugins.com/wp-register-profile-pro/" target="_blank">Upgrade to PRO version</a> with <strong>USD 2.00</strong> </p></td>
  </tr>
</table>
<?php }
	
	public function wp_user_subscription_add(){ ?>
<table width="100%" border="0" class="ap-table">
  <tr>
    <td><strong>WP User Subscription</strong>
      <p>Get <strong>Paid</strong> when new users make registration in your site. Create <strong>Subscription</strong> packages. Restrict page/ post contents from general members of the site. Configure payment options. <strong>PayPal Standard, PayPal Advanced (Credit/ Debit Card)</strong> payment methods are available by default. Get <a href="https://www.aviplugins.com/wp-user-subscription/" target="_blank">WP User Subscription</a> with <strong>USD 2.50</strong></p></td>
  </tr>
</table>
<?php }
	
	public function donate(){	?>
<table width="100%" border="0" class="ap-table">
  <tr>
    <td align="right"><a href="https://www.aviplugins.com/donate/" target="_blank">Donate</a> <img src="<?php echo plugins_url( WPRPWS_DIR_NAME . '/images/paypal.png' );?>" style="vertical-align: middle;" alt="PayPal"></td>
  </tr>
</table>
<?php
	}
}
