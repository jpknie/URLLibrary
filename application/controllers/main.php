<?php
	
	if (! defined('BASEPATH')) exit('No direct script access');
	
	class Main extends CI_Controller {
	
		//php 5 constructor
		function __construct() {
			parent::__construct();
			$this->view_data['base_url'] = base_url();
			$this->load->model('User_Model');
			$this->load->model('Url_Model');
		}
		
		function index() {
			$this->view_data['title'] = "URL library";
			$users = $this->User_Model->getUsers();
			/** Get the URLs from database and give them to main view */
			if($users) {
				$links_by_user = array();
				foreach($users->result() as $user) {
					$links_by_user[$user->username] = array();
					$links = $this->Url_Model->getUrlsForUser($user->user_id);
					if($links) {
						foreach($links->result() as $link) {
							array_push($links_by_user[$user->username], $link);
						}
					}
				}
			}
			$this->view_data['loginfo'] = $this->session->userdata('userid'); 
			$this->view_data['links'] = $links_by_user;
			$this->view_helper->viewPage($this->view_data, 'main');
		}
	
	}
?>
