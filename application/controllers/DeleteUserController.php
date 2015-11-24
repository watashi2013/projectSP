<?php
class DeleteUserController extends CI_Controller, IGetUserState, IDeleteUser
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->database();
		$this->load->library('session');
	}
	
	public function GetUserState()
	{
		$this->load->Model("Mdangnhap");
		$results  = $this->Mdangnhap->GetUserState();
	}
	
	public function DeleteUser()
	{
		if(isset($_GET['user_id']) && filter_var($_GET['user_id'],FILTER_VALIDATE_INT,array('min_range'=>1)))
		{
			if($this->session->userdata('user_info')!=NULL)
			{
				$this->load->Model('Mdelete_user');
				$result = $this->Mdelete_user->check($_GET['user_id']);
				if($result==1)
				{
					$result = $this->Mdelete_user->delete_user($_GET['user_id']);
					if($result==1)
					{
						$url=$_SERVER['HTTP_REFERER'];
						header("Location: $url");
					}
					else
					{	
						echo "Sorry, can not delete row due to a system error!";
						echo "<a href='".base_url()."'>Home</a>";
					}
				}
				else
				{
					$url=base_url();
					header("Location: $url");
				}
			}
			else
			{
				$url=base_url();
				header("Location: $url");
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