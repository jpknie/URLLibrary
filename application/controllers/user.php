<?php 
	
	if (! defined('BASEPATH')) exit('No direct script access');
	
	class User extends CI_Controller {
	
		//php 5 constructor
		function __construct() {
			parent::__construct();
			$this->view_data['base_url'] = base_url();
		}
		
		function index() {
			$this->register();
		}
		
		function register() {
			$this->view_data['title'] = 'User Registration';
			$this->form_validation->set_rules('username', 'Username',
			 	'xss_clean|min_length[6]|max_length[20]|trim|required|alpha_numeric');
			$this->form_validation->set_rules('realname', 'Realname',
				'xss_clean|required');
			$this->form_validation->set_rules('email', 'Email',
				'xss_clean|valid_email|required');
			$this->form_validation->set_rules('password', 'Password', 
				'xss_clean|min_length[6]|trim|required');
			$this->form_validation->set_rules('confirm_pass', 'Confirm Password','xss_clean|min_length[6]|trim|required|matches[password]');
			if($this->form_validation->run() == FALSE) {
				$this->view_helper->viewPage($this->view_data,'register');	
			}
			else {
				
			}
		}
		
		/** Returns view with user data and links the user has shared */
		function userData() {
			
		}
	
	}
?>