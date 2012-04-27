<?php 
	
	if (! defined('BASEPATH')) exit('No direct script access');
	
	class Url extends CI_Controller {
	
		//php 5 constructor
		function __construct() {
			parent::__construct();
			$this->view_data['base_url'] = base_url();
			$this->load->model('Url_Model');
		}
		
		function index() {
			$this->createLink();
		}
		
		function createLink() {
			$this->view_data['title'] = 'Share your link';
			$this->view_helper->viewPage($this->view_data, 'createurl');
		}

		/** Returns view with user data and links the user has shared */
		function userData() {
			
		}
	
	}
?>
