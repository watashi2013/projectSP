<?php
class Delete_product extends CI_Controller
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
		if(isset($_GET['product_id']) && filter_var($_GET['product_id'],FILTER_VALIDATE_INT,array('min_range'=>1)))
		{
			if($this->session->userdata('user_info')!=NULL)
			{
				$this->load->Model('Mdelete_product');
				$result = $this->Mdelete_product->check($_GET['product_id']);
				if($result==1)
				{
					$result = $this->Mdelete_product->delete_product($_GET['product_id']);
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