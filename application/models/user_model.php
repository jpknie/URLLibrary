<?php 
	
	if (! defined('BASEPATH')) exit('No direct script access');
	
	class User_Model extends CI_Model {
	
		//php 5 constructor
		function __construct() {
			parent::__construct();
		}
		
		function saveUser($username, $realname, $email, $password) {
			$this->load->helper('security');
			$hashpass = do_hash($password);
			$insert_statement = "INSERT INTO tbl_user (username, realname, email, password) VALUES (?, ?, ?, ?)";
			$this->db->query($insert_statement, array($username, $realname, $email, $hashpass));
		}
	
	}

?>