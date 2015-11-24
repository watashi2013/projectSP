<?php
class RegiterController extends CI_Controller, IRegister
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->database();
		$this->load->library('session');
	}
	
	public function form_register()
	{
		if($this->session->userdata('user_info')!=NULL)
		{
			$url=base_url();
			header("Location: $url");
		}
		else
		{
			$temp['title']="Register"; 
			$temp['template']='form_register'; 
			$this->load->view("view",$temp);
		}	
	}
		
	public function Register()
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST') 
		{
			// Bat dau xu ly form
            $errors = array();
            // Mac dinh cho cac truong nhap lieu la FALSE
            $fn = $ln = $e = $p = FALSE;
            
            if(strip_tags(trim($_POST['first_name']))) 
			{
                $fn = mysql_real_escape_string(trim($_POST['first_name']));
            } 
			else 
			{
                $errors[] = 'first name';
            }
			
			if(strip_tags(trim($_POST['last_name']))) 
			{
                $ln =mysql_real_escape_string(trim($_POST['last_name']));
            } 
			else 
			{
                $errors[] = 'last name';
            }
                      
			
			// Kiem tra xem email co hop le voi bieu thuc chinh quy
            if(preg_match('/^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$/', trim($_POST['email']))) 
			{
                $e = mysql_real_escape_string(trim($_POST['email']));
            }
			else 
			{
                $errors[] = 'email';
            }
			
			if(preg_match('/^[\w\'.-]{4,20}$/', trim($_POST['password1']))) 
			{
                if($_POST['password1'] == $_POST['password2']) {
                    // Neu mat khau mot phu hop voi mat khau hai, thi luu vao csdl
                    $p = mysql_real_escape_string(trim($_POST['password1']));
                } 
				else 
				{
                    // Neu mat khau khong phu hop voi nhau
                    $errors[] = "password not match";
                }
            } 
			else 
			{
                $errors[] = 'password';
            }
			
			if($fn && $ln && $e && $p) 
			{
				$this->load->Model("Mdangki");
				$result  = $this->Mdangki->select_mail($e);
				if($result>0)
				{	
					$message = "<p class='label label-warning'>The email was already used previously. Please use another email address.</p>";
					$temp['message'] = $message;
					$temp['template']='form_register';
					$this->load->view("view",$temp);
				}
				else
				{
					$this->Mdangki->insert($fn,$ln,$e,$p);
					$message = "<p class='label label-success'>Registered Successfully!</p>";
					$temp['message'] = $message;
					$temp['template']='form_register';
					$_POST = array();
					$this->load->view("view",$temp);
				}
			}
			else 
			{
                // Neu mot trong cac truong bi thieu gia tri
                $message = "<p class='label label-warning'>Please fill in all the required fields.</p>";
				$temp['title']="Dang ki"; 
				$temp['template']='form_register';
				$temp['message'] = $message;
				$temp['errors']	= $errors;
				
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