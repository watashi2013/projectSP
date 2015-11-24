<?php
class List_products extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->database();
		$this->load->library('session');
	}
	
	public function show_list_products()
	{
		if(isset($_GET['cat_id']) && filter_var($_GET['cat_id'],FILTER_VALIDATE_INT,array('min_range'=>1)))
		{
			if(isset($_POST['sort']))
			{
				switch ($_POST['sort'])
						{	
							case 'last_products':
								$this->load->Model("Mlist_products");
								$result  = $this->Mlist_products->get_last_products($_GET['cat_id']);
								$cat_name = $this->Mlist_products->get_category_name($_GET['cat_id']);
								$temp['title'] = $cat_name['cat_name'];
								$temp['products']=$result;
								$temp['template']="show_list_products";
								$this->load->view("view",$temp);
							break;	
							
							case 'az':
								$this->load->Model("Mlist_products");
								$result  = $this->Mlist_products->get_products_az($_GET['cat_id']);
								$cat_name = $this->Mlist_products->get_category_name($_GET['cat_id']);
								$temp['title'] = $cat_name['cat_name'];
								$temp['products']=$result;
								$temp['template']="show_list_products";
								$this->load->view("view",$temp);
							break;
						
							case 'za':
								$this->load->Model("Mlist_products");
								$result  = $this->Mlist_products->get_products_za($_GET['cat_id']);
								$cat_name = $this->Mlist_products->get_category_name($_GET['cat_id']);
								$temp['title'] = $cat_name['cat_name'];
								$temp['products']=$result;
								$temp['template']="show_list_products";
								$this->load->view("view",$temp);
							break;
						
						
							default:								
								$this->load->Model("Mlist_products");
								$result  = $this->Mlist_products->get_last_products($_GET['cat_id']);
								$cat_name = $this->Mlist_products->get_category_name($_GET['cat_id']);
								$temp['title'] = $cat_name['cat_name'];
								$temp['products']=$result;
								$temp['template']="show_list_products";
								$this->load->view("view",$temp);							
							break;
						}  //END SWITCH	
			}
			else
			{
				$this->load->Model("Mlist_products");
				$result  = $this->Mlist_products->get_last_products($_GET['cat_id']);
				$cat_name = $this->Mlist_products->get_category_name($_GET['cat_id']);
				$temp['title'] = $cat_name['cat_name'];
				$temp['products']=$result;
				$temp['template']="show_list_products";
				$this->load->view("view",$temp);
			}	
		}
		else
		{
			$url=base_url();
			header("Location: $url");
		}
	}		
	
	//Cat chu~ de hien thi thanh doan van ngan.
	public function the_excerpt($text,$string)
	{
		if(strlen($text)>$string)
		{
			$cutString = substr($text,0,$string);
			$words1 = substr($text, 0, strrpos($cutString, ' '));
			$words2 = substr($text, 0, strrpos($words1, '>'));
			return $words2;
		}
		else
			return $text;
	}// End the_excerpt
	
}
?>