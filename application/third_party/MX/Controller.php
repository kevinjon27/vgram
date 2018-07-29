<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/** load the CI class for Modular Extensions **/
require dirname(__FILE__).'/Base.php';

/**
 * Modular Extensions - HMVC
 *
 * Adapted from the CodeIgniter Core Classes
 * @link	http://codeigniter.com
 *
 * Description:
 * This library replaces the CodeIgniter Controller class
 * and adds features allowing use of modules and the HMVC design pattern.
 *
 * Install this file as application/third_party/MX/Controller.php
 *
 * @copyright	Copyright (c) 2015 Wiredesignz
 * @version 	5.5
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 **/
class MX_Controller 
{
	public $autoload = array();
	
	public function __construct() 
	{
		FAKE();

		$class = str_replace(CI::$APP->config->item('controller_suffix'), '', get_class($this));
		log_message('debug', $class." MX_Controller Initialized");
		Modules::$registry[strtolower($class)] = $this;	
		
		/* copy a loader instance and initialize */
		$this->load = clone load_class('Loader');
		$this->load->initialize($this);	
		
		$CI = &get_instance();
		$MAXIMUM_ACCOUNT = 0;
		$settings = $CI->db->select("*")->get(SETTINGS_TB)->row();
		if(!empty($settings)){
			if(!defined('LOGO'))
				define("LOGO", BASE.$settings->logo);

			if(!defined('TITLE'))
				define("TITLE", $settings->title);

			if(!defined('DESCRIPTION'))
				define("DESCRIPTION", $settings->description);

			if(!defined('KEYWORDS'))
				define("KEYWORDS", $settings->keywords);

			if(!defined('THEME'))
				define("THEME", $settings->theme);

			if(!defined('AUTO_ACTIVE_USER'))
				define("AUTO_ACTIVE_USER", $settings->auto_active_user);

			if(!defined('REGISTER_ALLOWED'))
				define("REGISTER_ALLOWED", $settings->register);

			if(!defined('TIMEZONE'))
				define("TIMEZONE", $settings->default_timezone);

			if(!defined('LANGUAGE'))
				define("LANGUAGE", session('lang')?session('lang'):$settings->default_language);

			if(!defined('DEFAULT_DEPLAY'))
				define("DEFAULT_DEPLAY", $settings->default_deplay);

			if(!defined('MINIMUM_DEPLAY'))
				define("MINIMUM_DEPLAY", $settings->minimum_deplay);

			if(!defined('FACEBOOK_ID'))
				define("FACEBOOK_ID", $settings->facebook_id);

			if(!defined('FACEBOOK_SECRET'))
				define("FACEBOOK_SECRET", $settings->facebook_secret); 

			if(!defined('GOOGLE_ID'))
				define("GOOGLE_ID", $settings->google_id);

			if(!defined('GOOGLE_SECRET'))
				define("GOOGLE_SECRET", $settings->google_secret);

			if(!defined('TWITTER_ID'))
				define("TWITTER_ID", $settings->twitter_id);

			if(!defined('TWITTER_SECRET'))
				define("TWITTER_SECRET", $settings->twitter_secret);

			$CI->input->set_cookie('uploadMaxSize', $settings->upload_max_size, 86400);

			date_default_timezone_set(TIMEZONE);

			$MAXIMUM_ACCOUNT = $settings->maximum_account;
		}

		if(!defined('NOW'))
			define("NOW",date("Y-m-d H:i:s"));

		if(!session('uid') 
			&& segment(1) != "" 
			&& segment(1) != 'openid' 
			&& segment(1) != 'cronjob' 
			&& segment(1) != 'cronjob2' 
			&& segment(1) != 'cronjob3' 
			&& segment(1) != 'cronjob4' 
			&& segment(1) != 'cronjob5' 
			&& segment(1) != 'cronjob6' 
			&& segment(1) != 'cronjob7' 
			&& segment(1) != 'verify' 
			&& segment(2) != 'ajax_verify' 
			&& segment(2) != 'ajax_login' 
			&& segment(2) != 'ajax_register' 
			&& segment(2) != 'setLang'){
			redirect(PATH);
		}

		$users = $CI->db->select("*")->where('id', session('uid'))->get(USERS_TB)->row();
		if(!empty($users)){
			$accounts = $CI->db->select("*")->where('uid', session('uid'))->get(INSTAGRAM_ACCOUNT_TB)->result();

			if(!defined('COUNT_ACCOUNT'))
				define("COUNT_ACCOUNT", count($accounts));

			$MAXIMUM_ACCOUNT = $users->maximum_account;
			
		}

		if(!defined('MAXIMUM_ACCOUNT'))
			define("MAXIMUM_ACCOUNT", $MAXIMUM_ACCOUNT);

		/* autoload module items */
		$this->load->_autoloader($this->autoload);
	}
	
	public function __get($class) 
	{
		return CI::$APP->$class;
	}
}