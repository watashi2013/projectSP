<?php 
class LogoutController extends CI_Controller, ILogout
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->database();
		$this->load->library('session');
	}
	public function Logout()
	{
		$this->session->unset_userdata('user_info');
		$url=base_url();
		header("Location: $url");
	}
}	
?>