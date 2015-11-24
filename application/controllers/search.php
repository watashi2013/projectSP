<?php
class Search extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->database();
		$this->load->library('session');
	}
	
	
	public function search_product()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')    // Gia tri ton tai, xu li form.
		{
			if(empty($_POST['product_name']) && empty($_POST['cat_id']))
			{
				$url=base_url();
				header("Location: $url");
			}	
			
			if(!empty($_POST['product_name']) && empty($_POST['cat_id']))
			{
				$product_name = mysql_real_escape_string(strip_tags(trim($_POST['product_name'])));
				$this->load->Model("Msearch");
				$products  = $this->Msearch->search_name($product_name);
				$temp['products'] = $products;
				$temp['template'] = 'view_search';
				$temp['title'] = 'search';
				$this->load->view('view',$temp);
				
			}
			if(empty($_POST['product_name']) && !empty($_POST['cat_id']))
			{
				$this->load->Model("Msearch");
				$products  = $this->Msearch->search_cat($_POST['cat_id']);
				$temp['products'] = $products;
				$temp['template'] = 'view_search';
				$temp['title'] = 'Search';
				$this->load->view('view',$temp);
			}
			if(!empty($_POST['product_name']) && !empty($_POST['cat_id']))
			{
				$product_name = mysql_real_escape_string(strip_tags(trim($_POST['product_name'])));
				$this->load->Model("Msearch");
				$products  = $this->Msearch->search_both($product_name,$_POST['cat_id']);
				$temp['products'] = $products;
				$temp['template'] = 'view_search';
				$temp['title'] = 'search';
				$this->load->view('view',$temp);
			}
			
			
		}
		else
		{
			$url=base_url();
			header("Location: $url");
		}
	}
	
	public function search_advanced()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')    // Gia tri ton tai, xu li form.
		{
			/////1
			if(empty($_POST['product_name']) && empty($_POST['cat_id']) && empty($_POST['purpose']) && empty($_POST['price']))
			{
				$url=base_url();
				header("Location: $url");
			}	
			///2
			if(!empty($_POST['product_name']) && empty($_POST['cat_id'])&& empty($_POST['purpose']) && empty($_POST['price']))
			{
				$product_name = mysql_real_escape_string(strip_tags(trim($_POST['product_name'])));
				$this->load->Model("Msearch");
				$products  = $this->Msearch->search_name($product_name);
				$temp['products'] = $products;
				$temp['template'] = 'view_search';
				$temp['title'] = 'search';
				$this->load->view('view',$temp);
				
			}
			///3
			if(empty($_POST['product_name']) && !empty($_POST['cat_id'])&& empty($_POST['purpose']) && empty($_POST['price']))
			{
				$this->load->Model("Msearch");
				$products  = $this->Msearch->search_cat($_POST['cat_id']);
				$temp['products'] = $products;
				$temp['template'] = 'view_search';
				$temp['title'] = 'search';
				$this->load->view('view',$temp);
				
			}
			/////////////////
			if(empty($_POST['product_name']) && empty($_POST['cat_id'])&& !empty($_POST['purpose']) && empty($_POST['price']))
			{
				$this->load->Model("Msearch");
				$products  = $this->Msearch->search_purpose($_POST['purpose']);
				$temp['products'] = $products;
				$temp['template'] = 'view_search';
				$temp['title'] = 'search';
				$this->load->view('view',$temp);
				
			}
			//-------------------------------
			if(empty($_POST['product_name']) && empty($_POST['cat_id'])&& empty($_POST['purpose']) && !empty($_POST['price']))
			{
				$this->load->Model("Msearch");
				if($_POST['price']==1)
					$products  = $this->Msearch->search_price1();
				if($_POST['price']==2)
					$products  = $this->Msearch->search_price2();
				if($_POST['price']==3)
					$products  = $this->Msearch->search_price3();
				if($_POST['price']==4)
					$products  = $this->Msearch->search_price4();
				
				$temp['products'] = $products;
				$temp['template'] = 'view_search';
				$temp['title'] = 'search';
				$this->load->view('view',$temp);
				
			}
			//-------------------------------
			if(!empty($_POST['product_name']) && !empty($_POST['cat_id'])&& empty($_POST['purpose']) && empty($_POST['price']))
			{
				$product_name = mysql_real_escape_string(strip_tags(trim($_POST['product_name'])));
				$this->load->Model("Msearch");
				$products  = $this->Msearch->search_both($product_name,$_POST['cat_id']);
				$temp['products'] = $products;
				$temp['template'] = 'view_search';
				$temp['title'] = 'search';
				$this->load->view('view',$temp);
				
			}
			//-------------------------------
			if(!empty($_POST['product_name']) && empty($_POST['cat_id'])&& !empty($_POST['purpose']) && empty($_POST['price']))
			{
				$product_name = mysql_real_escape_string(strip_tags(trim($_POST['product_name'])));
				$this->load->Model("Msearch");
				$products  = $this->Msearch->search_name_purpose($product_name,$_POST['purpose']);
				$temp['products'] = $products;
				$temp['template'] = 'view_search';
				$temp['title'] = 'search';
				$this->load->view('view',$temp);
				
			}
			//-------------------------------
			if(!empty($_POST['product_name']) && empty($_POST['cat_id'])&& empty($_POST['purpose']) && !empty($_POST['price']))
			{
				$product_name = mysql_real_escape_string(strip_tags(trim($_POST['product_name'])));
				$this->load->Model("Msearch");
				if($_POST['price']==1)
					$products  = $this->Msearch->search_name_price1($product_name);
				if($_POST['price']==2)
					$products  = $this->Msearch->search_name_price2($product_name);
				if($_POST['price']==3)
					$products  = $this->Msearch->search_name_price3($product_name);
				if($_POST['price']==4)
					$products  = $this->Msearch->search_name_price4($product_name);	
				$temp['products'] = $products;
				$temp['template'] = 'view_search';
				$temp['title'] = 'search';
				$this->load->view('view',$temp);
				
			}
			//-------------------------------
			if(empty($_POST['product_name']) && !empty($_POST['cat_id'])&& !empty($_POST['purpose']) && empty($_POST['price']))
			{
				$this->load->Model("Msearch");
				$products  = $this->Msearch->search_cat_id_purpose($_POST['cat_id'],$_POST['purpose']);
				$temp['products'] = $products;
				$temp['template'] = 'view_search';
				$temp['title'] = 'search';
				$this->load->view('view',$temp);
				
			}
			//-------------------------------
			if(empty($_POST['product_name']) && !empty($_POST['cat_id'])&& empty($_POST['purpose']) && !empty($_POST['price']))
			{
				$this->load->Model("Msearch");
				if($_POST['price'] == 1)
					$products  = $this->Msearch->search_cat_id_price1($_POST['cat_id']);
				if($_POST['price'] == 2)
					$products  = $this->Msearch->search_cat_id_price2($_POST['cat_id']);
				if($_POST['price'] == 3)
					$products  = $this->Msearch->search_cat_id_price3($_POST['cat_id']);
				if($_POST['price'] == 4)
					$products  = $this->Msearch->search_cat_id_price4($_POST['cat_id']);	
				$temp['products'] = $products;
				$temp['template'] = 'view_search';
				$temp['title'] = 'search';
				$this->load->view('view',$temp);
				
			}
			//-------------------------------gfh
			if(empty($_POST['product_name']) && empty($_POST['cat_id'])&& !empty($_POST['purpose']) && !empty($_POST['price']))
			{
				$this->load->Model("Msearch");
				if($_POST['price']==1)
					$products  = $this->Msearch->search_purpose_price1($_POST['purpose']);
				if($_POST['price']==2)
					$products  = $this->Msearch->search_purpose_price2($_POST['purpose']);
				if($_POST['price']==3)
					$products  = $this->Msearch->search_purpose_price3($_POST['purpose']);
				if($_POST['price']==4)
					$products  = $this->Msearch->search_purpose_price4($_POST['purpose']);	
				$temp['products'] = $products;
				$temp['template'] = 'view_search';
				$temp['title'] = 'search';
				$this->load->view('view',$temp);
				
			}
			//-------------------------------
			if(!empty($_POST['product_name']) && !empty($_POST['cat_id'])&& !empty($_POST['purpose']) && empty($_POST['price']))
			{
				$product_name = mysql_real_escape_string(strip_tags(trim($_POST['product_name'])));
				$this->load->Model("Msearch");
				$products  = $this->Msearch->search_name_cat_id_purpose($product_name,$_POST['cat_id'],$_POST['purpose']);
				$temp['products'] = $products;
				$temp['template'] = 'view_search';
				$temp['title'] = 'search';
				$this->load->view('view',$temp);
				
			}
			//-------------------------------avdvs
			if(!empty($_POST['product_name']) && empty($_POST['cat_id'])&& !empty($_POST['purpose']) && !empty($_POST['price']))
			{
				$product_name = mysql_real_escape_string(strip_tags(trim($_POST['product_name'])));
				$this->load->Model("Msearch");
				if($_POST['price']==1)
					$products  = $this->Msearch->search_name_purpose_price1($product_name,$_POST['purpose']);
				if($_POST['price']==2)
					$products  = $this->Msearch->search_name_purpose_price2($product_name,$_POST['purpose']);
				if($_POST['price']==3)
					$products  = $this->Msearch->search_name_purpose_price3($product_name,$_POST['purpose']);
				if($_POST['price']==4)
					$products  = $this->Msearch->search_name_purpose_price4($product_name,$_POST['purpose']);		
				$temp['products'] = $products;
				$temp['template'] = 'view_search';
				$temp['title'] = 'search';
				$this->load->view('view',$temp);
				
			}
			//-------------------------------
			if(empty($_POST['product_name']) && !empty($_POST['cat_id'])&& !empty($_POST['purpose']) && !empty($_POST['price']))
			{
				$this->load->Model("Msearch");
				if($_POST['price']==1)
					$products  = $this->Msearch->search_cat_id_purpose_price1($_POST['cat_id'],$_POST['purpose']);
				if($_POST['price']==2)
					$products  = $this->Msearch->search_cat_id_purpose_price2($_POST['cat_id'],$_POST['purpose']);
				if($_POST['price']==3)
					$products  = $this->Msearch->search_cat_id_purpose_price3($_POST['cat_id'],$_POST['purpose']);
				if($_POST['price']==4)
					$products  = $this->Msearch->search_cat_id_purpose_price4($_POST['cat_id'],$_POST['purpose']);			
				$temp['products'] = $products;
				$temp['template'] = 'view_search';
				$temp['title'] = 'search';
				$this->load->view('view',$temp);
				
			}
			//-------------------------------avd
			if(!empty($_POST['product_name']) && !empty($_POST['cat_id'])&& empty($_POST['purpose']) && !empty($_POST['price']))
			{
				$product_name = mysql_real_escape_string(strip_tags(trim($_POST['product_name'])));
				$this->load->Model("Msearch");
				if($_POST['price']==1)
					$products  = $this->Msearch->search_name_name_cat_id_price1($product_name,$_POST['cat_id']);
				if($_POST['price']==2)
					$products  = $this->Msearch->search_name_name_cat_id_price2($product_name,$_POST['cat_id']);
				if($_POST['price']==3)
					$products  = $this->Msearch->search_name_name_cat_id_price3($product_name,$_POST['cat_id']);
				if($_POST['price']==4)
					$products  = $this->Msearch->search_name_name_cat_id_price4($product_name,$_POST['cat_id']);	
				$temp['products'] = $products;
				$temp['template'] = 'view_search';
				$temp['title'] = 'search';
				$this->load->view('view',$temp);
				
			}
			//-------------------------------
			if(!empty($_POST['product_name']) && !empty($_POST['cat_id'])&& !empty($_POST['purpose']) && !empty($_POST['price']))
			{
				$product_name = mysql_real_escape_string(strip_tags(trim($_POST['product_name'])));
				$this->load->Model("Msearch");
				if($_POST['price']==1)
					$products  = $this->Msearch->search_name_cat_id_purpose_price1($product_name,$_POST['cat_id'],$_POST['purpose']);
				if($_POST['price']==2)
					$products  = $this->Msearch->search_name_cat_id_purpose_price2($product_name,$_POST['cat_id'],$_POST['purpose']);
				if($_POST['price']==3)
					$products  = $this->Msearch->search_name_cat_id_purpose_price3($product_name,$_POST['cat_id'],$_POST['purpose']);
				if($_POST['price']==4)
					$products  = $this->Msearch->search_name_cat_id_purpose_price4($product_name,$_POST['cat_id'],$_POST['purpose']);	
				$temp['products'] = $products;
				$temp['template'] = 'view_search';
				$temp['title'] = 'search';
				$this->load->view('view',$temp);
				
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