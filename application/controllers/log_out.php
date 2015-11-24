<?php 
class Log_out extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->database();
		$this->load->library('session');
	}
	public function out()
	{
		$this->session->unset_userdata('user_info');
		$url=base_url();
		header("Location: $url");
	}
}	
?>