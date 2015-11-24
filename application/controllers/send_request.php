<?php
class Send_request extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->database();
		$this->load->library('session');
	}
	
	public function get_products()
	{
		if($this->session->userdata('user_info')==NULL )
		{	
			$url=base_url();
			header("Location: $url");
		}
		else
		{
			$u_id = $this->session->userdata('user_info')['user_id'];
			$this->load->Model("Msend_request");
			$products = $this->Msend_request->get_products($u_id);
			return $products;
		}	
	}
	
	public function form_buy()
	{	
		if((isset($_GET['p_id']) && filter_var($_GET['p_id'],FILTER_VALIDATE_INT,array('min_range'=>1))) && (isset($_GET['u_id']) && filter_var($_GET['u_id'],FILTER_VALIDATE_INT,array('min_range'=>1))))
		{
			if($this->session->userdata('user_info')==NULL ) // kiem tra da dang nhap chua, neu chua thi thong bao khong cho send_request
			{	 
				$mess = "<span class='label label-warning'>You must login to send request!</span>";
				$this->session->set_userdata('mess', $mess);
				$url=$_SERVER['HTTP_REFERER'];
				header("Location: $url");	
			}
			else // neu da dang nhap roi
			{
				// kiem tra p_id co dung do u_id post hay khong va p_id co phai de ban hay khong
				$this->load->Model("Msend_request");
				$result = $this->Msend_request->check1($_GET['u_id'],$_GET['p_id']);
				if(count($result)==0) // neu khong phai, dieu huong ve trang chu
				{
					$url = base_url();
					header("Location: $url");
				}
				else //neu dung p_id do u_id post
				{
					// neu nguoi dang va nguoi an send-request la 1 thi in thong bao khong cho phep
					if($_GET['u_id'] == $this->session->userdata('user_info')['user_id'])
					{
						$mess = "<span class='label label-warning'>You can't send request to yourself!</span>";
						$this->session->set_userdata('mess', $mess);
						$url=$_SERVER['HTTP_REFERER'];
						header("Location: $url");
					}
					else // neu 2 nguoi do khac nhau thi hien ra form send_request
					{					
						$temp['user_id'] = $_GET['u_id'];
						$temp['product_id'] = $_GET['p_id'];
						$temp['title'] = "Send request buy";
						$temp['template'] = "send_request_buy_form";
						$this->load->view("view",$temp);
					}					
				}
				
				
			}
		}
		else  // neu cac bien GET khong hop le, dieu huong ve trang chu
		{
			$url = base_url();
			header("Location: $url");
		}	
		
	}
	
	public function form_exchange()
	{
		if((isset($_GET['p_id']) && filter_var($_GET['p_id'],FILTER_VALIDATE_INT,array('min_range'=>1))) && (isset($_GET['u_id']) && filter_var($_GET['u_id'],FILTER_VALIDATE_INT,array('min_range'=>1))))
		{
			if($this->session->userdata('user_info')==NULL ) // kiem tra da dang nhap chua, neu chua thi thong bao khong cho send_request
			{	 
				$mess = "<span class='label label-warning'>You must login to send request!</span>";
				$this->session->set_userdata('mess', $mess);
				$url=$_SERVER['HTTP_REFERER'];
				header("Location: $url");	
			}
			else // neu da dang nhap roi
			{
				// kiem tra p_id co dung do u_id post hay khong, va p_id co phai de trao doi hay khong
				$this->load->Model("Msend_request");
				$result = $this->Msend_request->check2($_GET['u_id'],$_GET['p_id']);
				if(count($result)==0) // neu khong phai, dieu huong ve trang chu
				{
					$url = base_url();
					header("Location: $url");
				}
				else //neu dung p_id do u_id post
				{
					// neu nguoi dang va nguoi an send-request la 1 thi in thong bao khong cho phep
					if($_GET['u_id'] == $this->session->userdata('user_info')['user_id'])
					{
						$mess = "<span class='label label-warning'>You can't send request to yourself!</span>";
						$this->session->set_userdata('mess', $mess);
						$url=$_SERVER['HTTP_REFERER'];
						header("Location: $url");
					}
					else // neu 2 nguoi do khac nhau thi hien ra form send_request
					{
						$products = $this->get_products();				
						$temp['products'] = $products;
						$temp['user_id'] = $_GET['u_id'];
						$temp['product_id'] = $_GET['p_id'];
						$temp['title'] = "Send request exchange";
						$temp['template'] = "send_request_exchange_form";
						$this->load->view("view",$temp);
					}					
				}
				
				
			}
		}
		else  // neu cac bien GET khong hop le, dieu huong ve trang chu
		{
			$url = base_url();
			header("Location: $url");
		}	
	}
	
	public function warning()
	{
		// in ra thong bao loi cua he thong, khong gui yeu cau duoc!
		$error = "<p class='label label-warning'>You have already sent requests!</p>";
		$this->session->set_userdata('error', $error);
		$url=$_SERVER['HTTP_REFERER'];
		header("Location: $url");
	}
	
	public function sys_err()
	{
		// in ra thong bao loi cua he thong, khong gui yeu cau duoc!
		$error = "<p class='label label-warning'>Counld not insert due to a system error. Try again!.</p>";
		$this->session->set_userdata('error', $error);
		$url=$_SERVER['HTTP_REFERER'];
		header("Location: $url");
	}	
	
	public function success()
	{
		// in ra thong bao gui thanh cong
		$ok = "<p class='label label-success'>Send request successfully!</p>";
		$this->session->set_userdata('ok', $ok);
		$url=$_SERVER['HTTP_REFERER'];
		header("Location: $url");
	}
	
	public function send_buy()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')    // Gia tri ton tai, xu li form.
		{
			$errors  = array();
			
			$method = $_POST['method'];
			
			if(empty($_POST['message']))
			{
				$errors[]= 'message';
			}
			else 
			{
				$message = $_POST['message']; //mysql_real_escape_string khong duoc ho tro sau nay, nen su dung ham escape cua codeigniter !!!
			}
			
			// Neu khong co loi(nhap du thong tin, thi chen du lieu vao CSDL)
			if(empty($errors)) 
			{				
				$this->load->Model("Msend_request");
				$result0 = $this->Msend_request->select($this->session->userdata('user_info')['user_id'],$_GET['u_id'],$_GET['p_id']);
				if(count($result0)!=0)
				{
					$this->warning();
				}
				else
				{
					$result1  = $this->Msend_request->insert_tran($this->session->userdata('user_info')['user_id'],$_GET['u_id'],$method,$_GET['p_id']);
					if($result1==1)
					{
						$result2  = $this->Msend_request->select($this->session->userdata('user_info')['user_id'],$_GET['u_id'],$_GET['p_id']);
						if(count($result2)==1)
						{
							$result3  = $this->Msend_request->insert_mess($result2['tran_id'],$message,$this->session->userdata('user_info')['user_id']);
							if($result3==1)
							{
								$this->success();
							}
							else
							{
								$this->sys_err();
							}
						}
						else
						{
							$this->sys_err();
						}	
					}
					else
					{
						$this->sys_err();
					}
				}
			}
			//Neu nhap thieu thong tin, thong bao cho nguoi dung biet	
			else  
			{
				// Neu mot trong cac truong bi thieu gia tri
                $mess1 = "<span class='label label-warning'>Please fill in all the required fields.</span>";
				$this->session->set_userdata('mess1', $mess1);
                if(isset($errors) && in_array('message',$errors))
				{
					$mess2 = "<span class='label label-warning'>Please fill in the message!</span>";			
					$this->session->set_userdata('mess2', $mess2);
				}	
				$url=$_SERVER['HTTP_REFERER'];
				header("Location: $url");	
			}
			
		} /* END main submit condition */
	}
	
	
	public function send_exchange()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')    // Gia tri ton tai, xu li form.
		{
			$errors  = array();
			
			$method = $_POST['method'];			
		
			if(!isset($_POST['ex_products']))
			{
				$errors[]= 'ex_products';
			}
			else 
			{
				$ex_products = $_POST['ex_products']; //mysql_real_escape_string khong duoc ho tro sau nay, nen su dung ham escape cua codeigniter !!!
			}
		
			if(empty($_POST['message']))
			{
				$errors[]= 'message';
			}
			else 
			{
				$message = $_POST['message']; //mysql_real_escape_string khong duoc ho tro sau nay, nen su dung ham escape cua codeigniter !!!
			}			
			
			// Neu khong co loi(nhap du thong tin, thi chen du lieu vao CSDL)
			if(empty($errors)) 
			{				
				$this->load->Model("Msend_request");
				$result0 = $this->Msend_request->select($this->session->userdata('user_info')['user_id'],$_GET['u_id'],$_GET['p_id']);
				if(count($result0)!=0)
				{
					$this->warning();
				}
				else
				{
					$result1  = $this->Msend_request->insert_tran($this->session->userdata('user_info')['user_id'],$_GET['u_id'],$method,$_GET['p_id']);
					if($result1==1)
					{
						$result2  = $this->Msend_request->select($this->session->userdata('user_info')['user_id'],$_GET['u_id'],$_GET['p_id']);
						if(count($result2)==1)
						{
							$result3  = $this->Msend_request->insert_mess($result2['tran_id'],$message,$this->session->userdata('user_info')['user_id']);
							if($result3==1)
							{
								for($i=0;$i<count($ex_products);$i++)
								{
									$result4  = $this->Msend_request->insert_ex_product($result2['tran_id'],$ex_products[$i]);
									if($result4 == 1)
									{
										continue;
									}
									else
									{
										$flag = false;
										break;
									}
								}
								
								if($flag = false)
								{	
									$this->sys_err();
								}	
								
								else
								{	
									$this->success();
								}
								
							}
							else
							{
								$this->sys_err();
							}
						}
						else
						{
							$this->sys_err();
						}	
					}
					else
					{
						$this->sys_err();
					}
				}
			}
			//Neu nhap thieu thong tin, thong bao cho nguoi dung biet	
			else  
			{
				// Neu mot trong cac truong bi thieu gia tri              
					$mess1 = "<span class='label label-warning'>Please fill in all the required fields.</span>";
					$this->session->set_userdata('mess1', $mess1);				
				if(isset($errors) && in_array('ex_products',$errors))
				{
					$mess2 = "<span class='label label-warning'>Please select at least one of your products!</span>";
					$this->session->set_userdata('mess2', $mess2);
				}
				if(isset($errors) && in_array('message',$errors))
				{
					$mess3 = "<span class='label label-warning'>Please fill in the message!</span>";			
					$this->session->set_userdata('mess3', $mess3);			
				}
				$url=$_SERVER['HTTP_REFERER'];
				header("Location: $url");	
			}
			
		} /* END main submit condition */
	}
	
	
}
?>	