<?php 
	
	if (! defined('BASEPATH')) exit('No direct script access');
		
	class User extends CI_Controller {
	
		//php 5 constructor
		function __construct() {
			parent::__construct();
			$this->view_data['base_url'] = base_url();
			$this->load->model('User_Model');
			$this->load->model('Url_Model');
			$this->load->library('session');
		}
		
		function index() {
			$logged = $this->session->userdata('logged');
			/** Show user data if user is logged in */
			if($logged)	$this->userData();
			else $this->login();
		}
	
		function login() {
			$this->view_data['title'] = 'Login page';
			$this->form_validation->set_rules('username', 'Username', 
									'xss_clean|min_length[6]|max_length[20]|trim|required|alpha_numeric');
			$this->form_validation->set_rules('password', 'Password', 
									'xss_clean|trim|required');
			if($this->form_validation->run() == FALSE) {
				$this->view_helper->viewPage($this->view_data, 'login');
			}

			else {
				$username = $this->input->post('username');
				$password = $this->input->post('password');

				$user = $this->User_Model->validLogin($username, $password);
				if($user) {
					$this->session->set_userdata('userid', $user);
					$this->session->set_userdata('logged', TRUE);
					$this->userData();
				}
				else {
					$this->loginError();	
				}
			}
		}

		function loginError() {
			$this->view_data['title'] = 'Login Error';
			$this->view_helper->viewPage($this->view_data, 'loginerror');
		}

		function logout() {
			$this->session->unset_userdata('user_id'); 
			$this->session->sess_destroy();
			redirect(base_url());
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
			$this->form_validation->set_rules('confirm_pass', 
						'Confirm Password','xss_clean|min_length[6]|trim|required|matches[password]');
			if($this->form_validation->run() == FALSE) {
				$this->view_helper->viewPage($this->view_data,'register');
			}
			else {
				$username = $this->input->post('username');
				$realname = $this->input->post('realname');
				$password = $this->input->post('password');
				$email = $this->input->post('email');
				$this->User_Model->saveUser($username, $realname, $email, $password);
			}
		}
		
		/** Returns view with user data and links the user has shared */
		function userData() {
			$this->view_data['title'] = 'User page';
			$loggeduser = $this->session->userdata('userid');
			$userdata = $this->User_Model->getUserData($loggeduser);
			if(!$userdata) die("No results for this user!");
			
			$urls = $this->Url_Model->getUrlsForUser($loggeduser);
			
			/** Get the URLs from database and give them to main view */
			$links_by_user = array();
			if($urls != FALSE) {
				foreach($urls->result() as $url) {
					array_push($links_by_user, $url);
				}
			}
			$this->view_data['links'] = $links_by_user;
			$this->view_data['userdata'] = $userdata;
			$this->view_helper->viewPage($this->view_data, 'user');
		}
	
	}
?>
