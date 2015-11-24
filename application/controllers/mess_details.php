<?php
class Mess_details extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->database();
		$this->load->library('session');
	}
	
	public function sys_err()
	{
		$url=base_url();
		header("Location: $url");
	}
	
	public function view_buy($tran_id)
	{
		$results = $this->Mmess_details->get_mess($tran_id);
		$temp['mail_header'] = $results['mail_header'];
		$temp['conversation'] = $results['conversation'];
		$temp['template'] = 'view_mess_details_buy';
		$this->load->view('view',$temp);
		/* echo "<pre>";
		print_r ($results);
		echo "</pre>"; */
	}
	
	public function view_ex($tran_id)
	{
		$results = $this->Mmess_details->get_mess($tran_id);
		$ex_products = $this->Mmess_details->get_ex_products($tran_id);
		$temp['ex_products'] = $ex_products;
		$temp['mail_header'] = $results['mail_header'];
		$temp['conversation'] = $results['conversation'];
		$temp['template'] = 'view_mess_details_ex';
		$this->load->view('view',$temp);
		/* echo "<pre>";
		print_r ($result);
		echo "</pre>"; */
	}
	
	public function view_details()
	{
		if($this->session->userdata('user_info')==NULL )
		{	
			$this->sys_err();
		}
		else
		{
			if(isset($_GET['tran_id']) && filter_var($_GET['tran_id'],FILTER_VALIDATE_INT,array('min_range'=>1)))
			{
				$this->load->Model("Mmess_details");
				$purpose_view = $this->Mmess_details->get_purpose_view($_GET['tran_id'],$this->session->userdata('user_info')['user_id']);
				if(count($purpose_view)==0) // neu tran_id va session(user_id) khonng cung xuat hien tren 1 hang thi count(result)=0
				{
					$this->sys_err();
				}
				else
				{
					$sender_id = $this->Mmess_details->get_sender_id($_GET['tran_id']);
					if($sender_id['u_id']!= $this->session->userdata('user_info')['user_id'])
					{	
						if($purpose_view['view']!=0)
						{
							$update_view = $this->Mmess_details->update_view($_GET['tran_id']);
							if($update_view!=1)
								$this->sys_err();
						}	
					}
					if($purpose_view['purpose']==1)
						$this->view_buy($_GET['tran_id']);
					else
						$this->view_ex($_GET['tran_id']);					
				}
			}
			else
			{
				$this->sys_err();
			}	
		}	
	}
}
?>	