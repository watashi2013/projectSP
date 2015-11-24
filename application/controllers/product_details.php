<?php
class Product_details extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->database();
		$this->load->library('session');
	}
	
	
	public function form_product_details()
	{	
		if(isset($_GET['p_id']) && filter_var($_GET['p_id'],FILTER_VALIDATE_INT,array('min_range'=>1)))
		{
			$this->load->Model("Mproduct_details");
			$results  = $this->Mproduct_details->get_product_details($_GET['p_id']);
			if($results['rows']==0)
			{	
				$url=base_url();
				header("Location: $url");
			}
			else
			{						
				$temp['product_details']=$results['result'];
				$temp['title']=$results['result']['product_name'];
				$temp['template']='form_product_details'; 
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