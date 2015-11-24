<?php
class Update_info extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->database();
		$this->load->library('session');
	}
	
	public function update()
	  {
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			if($this->session->userdata('user_info')!=NULL)
			{
				$this->load->Model('Mupdate_info');
				$this->Mupdate_info->update($_POST['phone'],$_POST['address']);
				$mess = "<span class='label label-success'>Update sucess</span>";
				$this->session->set_userdata('mess', $mess);
				$url=$_SERVER['HTTP_REFERER'];
				header("Location: $url");
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