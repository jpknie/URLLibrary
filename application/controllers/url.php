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
			$description = $this->input->post('description');
			
			if($this->form_validation->run() == FALSE) {
				$this->view_helper->viewPage($this->view_data, 'createurl');
			}
			else {
				/** Save URL to DB and display success page etc */
				if($shorturlcode = $this->Url_Model->saveUrl($urlref, $description)) {
					$this->view_data['title'] = 'URL saved successfully';
					$this->view_data['shorturlcode'] = $shorturlcode;
					$this->view_data['urlref'] = $urlref;
					$this->view_data['description'] = $description;
					$this->view_helper->viewPage($this->view_data, 'urlsaved_success');
				}
				else die("Could not save url!");
			}
		}

		function editLink() {
			
			$shorturl = $this->uri-segment(3);
			$urldata = $this->Url_Model->getUrlData($shorturl);
			$this->view_data['title'] = 'Edit URL';
			$this->view_data['urldata'] = $urldata;

		}

		function deleteLink() {
			$shorturl = $this->uri->segment(3);
			$this->view_data['title'] = 'You have deleted the URL';
			$this->Url_Model->deleteUrl($shorturl);
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
