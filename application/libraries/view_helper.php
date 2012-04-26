<?php

	class View_Helper {
		
		public function viewPage($data, $content_view_name) {
				$CI =& get_instance();
				$CI->load->view('header', $data);
				$CI->load->view($content_view_name . '_view', $data);
				$CI->load->view('footer', $data);
		}
	}

?>