<?php
class Profile extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->database();
		$this->load->library('session');
	}
	
	public function rate($u_id)
	{	
			if($_SERVER['REQUEST_METHOD']=='POST')    // Gia tri ton tai, xu li form.
			{
				if($this->session->userdata('user_info')!=NULL)
				{
					if($this->session->userdata('user_info')['user_id'] != $u_id)
					{
						if(empty($_POST['rating2']))				
						{	
							$mess = "<span class='label label-warning'>You must select the stars!</span>";
							return $mess;
						}
						else
						{
							$this->load->Model("Mprofile");
							$mess = $this->Mprofile->mrate($_POST['rating2'],$u_id);
							return $mess;	
						}
					}
					else
					{
						$mess = "<span class='label label-warning'>Sorry, You can't vote for yourself!</span>";
						return $mess;
					}	
				}
				else
				{
					$mess = "<span class='label label-warning'>You must login to rate!</span>";
					return $mess;
				}	
			}
			else
			{
				$mess = "";
				return $mess;
			}	
			
	}
	
	public function view_profile()
	{	
		if(isset($_GET['u_id']) && filter_var($_GET['u_id'],FILTER_VALIDATE_INT,array('min_range'=>1)))
		{
			//
			$mess = $this->rate($_GET['u_id']);
			//
			$this->load->Model("Mprofile");
			$result  = $this->Mprofile->get_profile($_GET['u_id']);
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
				$temp['mess'] = $mess;
				$temp['template']='view_profile'; 
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