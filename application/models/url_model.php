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

		function updateUrl($shortcode, $url, $description) {
			$update_statement = "UPDATE tbl_url SET url=?, description=? WHERE shorturl_code=?";
			$this->db->query($update_statement, array($url, $description, $shortcode));
			if(!$this->db->_error_message()) return TRUE;
			else return FALSE;
		}

		function deleteUrl($shortcode) {
			$delete_statement = "DELETE FROM tbl_url WHERE shorturl_code = ?";
			$this->db->query($delete_statement, $shortcode);
			if(!$this->db->_error_message()) return TRUE;
			else return FALSE;
		}
	
		function getUrlsForUser($userid) {
			$get_urls = "SELECT * FROM tbl_url WHERE user_id = ?";
			$results = $this->db->query($get_urls, $userid);
			if($results->num_rows() == 0) return FALSE;
			return $results;
		}

		function decodeUrl($shortcode) {
			$get_url = "SELECT url FROM tbl_url WHERE shorturl_code = ?";
			$results = $this->db->query($get_url, $shortcode);
			if($results->num_rows() == 0) return FALSE;
			return $results->row(0)->url; 
		}

		function getUrlData($shortcode) {
			$get_url = "SELECT * FROM tbl_url WHERE shorturl_code = ?";
			$results = $this->db->query($get_url, $shortcode);
			if($results->num_rows() == 0) return FALSE;
			return $results->row(0); 
		}
	}

?>
