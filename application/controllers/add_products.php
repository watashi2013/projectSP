<?php
class Add_products extends CI_Controller
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
	
	public function form_add_products()
	{
		//make link to module "dangnhap"
		$this->GetUserState();
		
		$temp['title']="Add products"; 
		$temp['template']='form_add_products';

		$this->load->view("view",$temp);
	}
	
	public function check()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')     // Gia tri ton tai, xu li form.
		{
			$errors  = array();
			
			// Kiem tra ten cua product_name
			if(empty($_POST['product_name']))
			{
				$errors[]= 'product_name';
			}
			else 
			{
				$product_name = mysql_real_escape_string(strip_tags(trim($_POST['product_name'])));
			}
			
			// nhan va category
			$category = $_POST['category'];
			
			// Nhan vao situation
			$situation = $_POST['situation'];
			
			// Nhan vao purpose
			$purpose = 2;
			
			//Kiem tra price
			if(!empty($_POST['price']))
			{
				if(filter_var($_POST['price'],FILTER_VALIDATE_INT))
				{
					if($_POST['price']>=0)
						$price = $_POST['price'];
					else
						$errors[] = 'price';
				}
				else
				{
					$errors[] = 'price';				
				}
			}
			else
			{
				$price = NULL;
			}
			
			// check image
			if($_FILES['image']['size']==0)
			{
				$errors[] = 'image';
			}
			
			// Kiem tra desciption
			if(!empty($_POST['description']))
				$description = $_POST['description'];
			else
				$errors[]= 'description';
			
			// Neu khong co loi(nhap du thong tin, thi chen du lieu vao CSDL)
			if(empty($errors)) 
			{
				$this->load->Model("Madd_products");
				if($_FILES['image']['size']!=0)
				{
					$result  = $this->Madd_products->do_upload();
					if(is_array($result))
					{
						$temp['title']="Add products"; 
						$temp['template']='form_add_products';
						$temp['result']	= $result;
							
						
							
						$this->load->view("view",$temp);
					}
					else
					{	
						$file_name = $result;
						$this->Madd_products->insert($product_name,$category,$situation,$purpose,$price,$file_name,$description);
						$message = "<p class='label label-success'>Add Product Successfully!</p>";
						$temp['title']="Add products"; 
						$temp['message'] = $message;
						$temp['template']='form_add_products';
						$_POST = array();
						
						
						$this->load->view("view",$temp);
					}
				}
				else
				{
						$file_name = NULL;
						$this->Madd_products->insert($product_name,$category,$situation,$purpose,$price,$file_name,$description);
						$message = "<p class='label label-success'>Add Product Successfully!</p>";
						$temp['title']="Add products"; 
						$temp['message'] = $message;
						$temp['template']='form_add_products';
						$_POST = array();
						
						$this->load->view("view",$temp);
				}
				
				//
			}
			//Neu nhap thieu thong tin, thong bao cho nguoi dung biet	
			else  
			{
				// Neu mot trong cac truong bi thieu gia tri
                $message = "<p class='label label-warning'>Please fill in all the required fields.</p>";
				$temp['title']="Add products"; 
				$temp['template']='form_add_products';
				$temp['message'] = $message;
				$temp['errors']	= $errors;
				
				
				$this->load->view("view",$temp);
			}
			
		} /* END main submit condition */
	}
}
?>	