<?php
class Add_categories extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->database();
		$this->load->library('session');
	}
	
	public function form_add_categories()
	{
		$this->is_admin();
		$temp['title']="Add categories"; 
		$temp['template']='form_add_categories'; 
		$this->load->view("view",$temp);
	}
	
	public function check()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')    // Gia tri ton tai, xu li form.
		{
			$errors  = array();
			
			// Kiem tra ten cua category
			if(empty($_POST['category']))
			{
				$errors[]= 'category';
			}
			else 
			{
				$cat_name = mysql_real_escape_string(strip_tags(trim($_POST['category']))); //mysql_real_escape_string khong duoc ho tro sau nay, nen su dung ham escape cua codeigniter !!!
			}
			
			// Neu khong co loi(nhap du thong tin, thi chen du lieu vao CSDL)
			if(empty($errors)) 
			{
				$this->load->Model("Madd_categories");
				$result  = $this->Madd_categories->insert($cat_name);
				$message = "<p class='label label-success'>Add category Successfully!</p>";
				$temp['title']="Add categories"; 
				$temp['message'] = $message;
				$temp['template']='form_add_categories';
				$_POST = array();
				$this->load->view("view",$temp);
			}
			//Neu nhap thieu thong tin, thong bao cho nguoi dung biet	
			else  
			{
				// Neu mot trong cac truong bi thieu gia tri
                $message = "<p class='label label-warning'>Please fill in all the required fields.</p>";
				$temp['title']="Add categories"; 
				$temp['template']='form_add_categories';
				$temp['message'] = $message;
				$temp['errors']	= $errors;
				
				$this->load->view("view",$temp);
			}
			
		} /* END main submit condition */
	}
}
?>	