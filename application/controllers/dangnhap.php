<?php
class Dangnhap extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->database();
		$this->load->library('session');
	}
	
	public function form_login()
	{
		if(isset($_SERVER['HTTP_REFERER']))
			$this->session->set_userdata('previous_link', $_SERVER['HTTP_REFERER']);
		if($this->session->userdata('user_info')!=NULL)
		{
			$url=base_url();
			header("Location: $url");
		}
		else
		{
			$temp['title']="Login"; 
			$temp['template']='form_login'; 
			$this->load->view("view",$temp);
		}
	}
	
	public function check()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')
		{  // Bat dau xu ly form. Tao bien $errors
			$errors = array();
			
			if(!empty($_POST['email']) && preg_match('/^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$/', trim($_POST['email'])))
			{	
				$e = mysql_real_escape_string(trim($_POST['email']));
			}
			else
			{
				$errors[]='email';
			}
			
			if(!empty($_POST['password']) && preg_match('/^[\w\'.-]{4,20}$/', trim($_POST['password'])))
			{	
				$p = mysql_real_escape_string(trim($_POST['password']));
			}
			else
			{
				$errors[]='password';
			}
		
			if(empty($errors))
			{				
				$p1 = md5($p);
				$this->load->Model("Mdangnhap");
				$results  = $this->Mdangnhap->check_login($e,$p1);
				if($results['rows'] ==1 )
				{	
					
					$this->session->set_userdata('user_info', $results['result']);
					$_POST = array();					
					
					if($this->session->userdata('previous_link')==NULL )
						$url = base_url();
					else		
						$url=$this->session->userdata('previous_link');
					header("Location: $url");	
				}
				else
				{
					$message = "<p class='error'>The email or password do not match those on file. Or you have not activated your account.</p>";
					$temp['message'] = $message;
					$temp['template']='form_login';
					$this->load->view("view",$temp);
				}
			}
			else
			{
				$message = "<p class='label label-warning'>Please fill in all the required fields.</p>";
				$temp['title']="Dang nhap"; 
				$temp['template']='form_login';
				$temp['message'] = $message;
				$temp['errors']	= $errors;				
				$this->load->view("view",$temp);
			}
		
		}
	}
	
}

?>