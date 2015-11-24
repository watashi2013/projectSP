<?php
class Profile_user extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->database();
		$this->load->library('session');
	}
	
	public function view_profile()
	{	
		if($this->session->userdata('user_info')!=NULL)
		{
			$this->load->Model("Mprofile_user");
			$result  = $this->Mprofile_user->get_profile($this->session->userdata('user_info')['user_id']);
			if(count($result['profile'])==0)
			{	
				$url=base_url();
				header("Location: $url");
			}
			else
			{						
				$temp['profile']=$result['profile'];
				$temp['products']=$result['products'];
				$temp['title']=$result['profile']['name'];
				$temp['template']='view_profile_user'; 
				$this->load->view("view",$temp);
				
			}
		}
		else
		{
			$url=base_url();
			header("Location: $url");
		}	
	}
	
	
}
?>	