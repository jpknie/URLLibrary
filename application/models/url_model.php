<?php 
	
	if (! defined('BASEPATH')) exit('No direct script access');
	
	class Url_Model extends CI_Model {
	
		//php 5 constructor
		function __construct() {
			parent::__construct();
		}
		
		function saveUrl($url, $description) {
			$shortUrlCode = $this->str_helper->random_string(10);
			
		}
	
	}

?>
