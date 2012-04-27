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

		function getUserData($userid) {
			$get_user_data = "SELECT username, realname, email FROM tbl_user WHERE user_id=? LIMIT 1";
			$results = $this->db->query($get_user_data, $userid);
			return $results->row_array();			
		}
	
		function validLogin($username, $password) {
			$this->load->helper('security');
			$get_user_data = "SELECT user_id FROM tbl_user WHERE username=? and password=?";
			$hashpass = do_hash($password);
			$results = $this->db->query($get_user_data, array($username, $hashpass));
			if ($results->num_rows() == 1) return $results->row(0)->user_id;
			else return false;
		}

	}

?>
