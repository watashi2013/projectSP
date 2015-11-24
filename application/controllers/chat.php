<?php
class Chat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->database();
		$this->load->library('session');
	}
	
	public function sys_error()
	{
		$mess1 = "<span class='label label-warning'>Cannot send message due to a system error!</span>";			
		$this->session->set_userdata('mess1', $mess1);
		$url=$_SERVER['HTTP_REFERER'];
		header("Location: $url");
	}
	
	public function redirect()
	{
		$url=$_SERVER['HTTP_REFERER']."#chat";
		header("Location: $url");
	}
	
	public function send()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')    // Gia tri ton tai, xu li form.
			{
				$errors  = array();
				
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
					$this->load->Model("Mchat");
					$result1 = $this->Mchat->insert_mess($_GET['tran_id'],$_POST['message'],$this->session->userdata('user_info')['user_id']);
					if($result1==1)
					{
						$u_ids = $this->Mchat->get_uids_view($_GET['tran_id']);
						
						if(($this->session->userdata('user_info')['user_id']==$u_ids['u_id1']) && ($u_ids['view']!=2) )
							{
								$result_update = $this->Mchat->update_view2($_GET['tran_id']);
								if($result_update!=1)
								{
									$this->sys_error();
								}
								else		
								{
									$this->redirect();
								}		
							}
						if(($this->session->userdata('user_info')['user_id']==$u_ids['u_id2']) && ($u_ids['view']!=1) )
							{
								$result_update = $this->Mchat->update_view1($_GET['tran_id']);
								if($result_update!=1)
								{
									$this->sys_error();
								}
								else
								{
									$this->redirect();
								}
							}
						$this->redirect();	
					}
					else
					{
						$this->sys_error();
					}
				}
				//Neu nhap thieu thong tin, thong bao cho nguoi dung biet	
				else  
				{
					// Neu mot trong cac truong bi thieu gia tri
					if(isset($errors) && in_array('message',$errors))
					{
						$mess1 = "<span class='label label-warning'>Please fill in the message!</span>";			
						$this->session->set_userdata('mess1', $mess1);
					}	
					$url=$_SERVER['HTTP_REFERER'];
					header("Location: $url");	
				}
				
			} /* END main submit condition */
	}
}
?>	