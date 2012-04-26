<?php
	
	if (! defined('BASEPATH')) exit('No direct script access');
	
	class Main extends CI_Controller {
	
		//php 5 constructor
		function __construct() {
			parent::__construct();
			$this->view_data['base_url'] = base_url();
		}
		
		function index() {
			/** Get the URLs from database and give them to main view */
			$this->view_data['title'] = "URL library";
			$this->view_helper->viewPage($this->view_data, 'main');
		}
	
	}

?>