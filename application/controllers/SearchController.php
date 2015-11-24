<?php 
abstract class SearchAbs
{
	abstract protected function search();
}

class SearchName extends SearchAbs
{
	public function search()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')    // Gia tri ton tai, xu li form.
		{
			$product_name = mysql_real_escape_string(strip_tags(trim($_POST['product_name'])));
			
			$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE product_name LIKE '%{$product_name}%' ORDER BY post_on DESC ");
			return $result = $query->result_array();	
		}
		
	}
}

class SearchCatName extends SearchAbs
{
	public function search()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')    // Gia tri ton tai, xu li form.
		{
			$products  = $this->Msearch->search_cat($_POST['cat_id']);
			
			$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE product_name LIKE '%{$product_name}%' ORDER BY post_on DESC ");
			return $result = $query->result_array();	
		}
	}
}

class SearchBoth extends SearchAbs
{
	public function search()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')    // Gia tri ton tai, xu li form.
		{
			$products  = $this->Msearch->search_cat($_POST['cat_id']);
			$product_name = mysql_real_escape_string(strip_tags(trim($_POST['product_name'])));
			
			$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE product_name LIKE '%{$product_name}%' ORDER BY post_on DESC ");
			return $result = $query->result_array();	
		}
	}
}

class SearchManager
{
	public function search(SearchAbs msearch)
	{
		msearch.search();
	}
}

class SearchController extends CI_Controller
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
				//$product_name = mysql_real_escape_string(strip_tags(trim($_POST['product_name'])));
				// $this->load->Model("Msearch");
				// $products  = $this->Msearch->search_name($product_name);
				SearchManager searchManager = new SearchManager();
				searchManager.search(new SearchName());
				
				$temp['products'] = $products;
				$temp['template'] = 'view_search';
				$temp['title'] = 'search';
				$this->load->view('view',$temp);
				
			}
			if(empty($_POST['product_name']) && !empty($_POST['cat_id']))
			{
				// $this->load->Model("Msearch");
				// $products  = $this->Msearch->search_cat($_POST['cat_id']);
				SearchManager searchManager = new SearchManager();
				searchManager.search(new SearchCatName());
				
				$temp['products'] = $products;
				$temp['template'] = 'view_search';
				$temp['title'] = 'Search';
				$this->load->view('view',$temp);
			}
			if(!empty($_POST['product_name']) && !empty($_POST['cat_id']))
			{
				//$product_name = mysql_real_escape_string(strip_tags(trim($_POST['product_name'])));
				
				// $this->load->Model("Msearch");
				// $products  = $this->Msearch->search_both($product_name,$_POST['cat_id']);
				
				SearchManager searchManager = new SearchManager();
				searchManager.search(new SearchBoth());
				
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