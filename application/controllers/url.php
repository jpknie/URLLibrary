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
	
			$this->form_validation->set_rules('url', 'URL', 
									'trim|required|callback_valid_url');
			$this->form_validation->set_rules('description', 'Description', 
									'xss_clean|min_length[6]|trim|required');
			$urlref = $this->input->post('url');
			
			if($this->form_validation->run() == FALSE) {
				$this->view_helper->viewPage($this->view_data, 'createurl');
			}
			else {
				/** Save URL to DB and display success page etc */
			}
		}

		function valid_url($url) {
			if(filter_var($url, FILTER_VALIDATE_URL)) {
				return TRUE;
			}
			else {
				$this->form_validation->set_message('valid_url', 'URL needs to be valid.');
				return FALSE;
    		}
		}
	}
?>
