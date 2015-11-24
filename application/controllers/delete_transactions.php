<?php
class Delete_transactions extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->database();
		$this->load->library('session');
	}
	
	public function delete()//for deleting the user
	  {
		if(isset($_GET['tran_id']) && filter_var($_GET['tran_id'],FILTER_VALIDATE_INT,array('min_range'=>1)))
		{
			if($this->session->userdata('user_info')!=NULL)
			{
				$this->load->Model('Mdelete_transactions');
				$result = $this->Mdelete_transactions->check($_GET['tran_id']);
				if($result==1)
				{
					$result = $this->Mdelete_transactions->delete_tran($_GET['tran_id']);
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