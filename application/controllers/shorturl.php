<?php
	
	if (! defined('BASEPATH')) exit('No direct script access');
	
	class Shorturl extends CI_Controller {
		function __construct() {
			parent::__construct();
			$this->view_data['base_url'] = base_url();
			$this->load->model('User_Model');
			$this->load->model('Url_Model');
		}
	
		function decode_url() {
			$shorturl = $this->uri->segment(3);
			$url = $this->Url_Model->decodeUrl($shorturl);

			redirect($url);
		}
	}
?>
