<?php 
	
	if (! defined('BASEPATH')) exit('No direct script access');
	
	class Url_Model extends CI_Model {
	
		//php 5 constructor
		function __construct() {
			parent::__construct();
			$this->load->library('session');
			$this->load->library('view_helper');
		}
		
		function saveUrl($url, $description) {
			$short_url_code = random_string(10);
			$userid = $this->session->userdata('userid');
			$insert_statement = "INSERT INTO tbl_url (url, shorturl_code, description, user_id) VALUES (?, ?, ?, ?)";
			$this->db->query($insert_statement, array($url, $short_url_code, $description, $userid));
			if(!$this->db->_error_message()) return $short_url_code;
			else return FALSE;
		}
	}

?>
