<?php
class Messages extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->database();
		$this->load->library('session');
	}
	
	public function view_mess()
	{
		if($this->session->userdata('user_info')==NULL )
		{	
			$url=base_url();
			header("Location: $url");
		}
		else
		{
			$this->load->Model("Mmessages");
			$messages = $this->Mmessages->get_messages($this->session->userdata('user_info')['user_id']);
			for($i=0;$i<count($messages);$i++)
			{
				$result1 = $this->Mmessages->get_last_mesg($messages[$i]['tran_id']);
				$messages[$i]['content'] = $result1['content'];
				$messages[$i]['u_id_send'] = $result1['u_id'];
				
				$result2 = $this->Mmessages->get_name($messages[$i]['u_id1']);
				$messages[$i]['u_id1_name'] = $result2['first_name'];
				
				$result3 = $this->Mmessages->get_name($messages[$i]['u_id2']);
				$messages[$i]['u_id2_name'] = $result3['first_name'];
				
				$result4 = $this->Mmessages->get_time($messages[$i]['tran_id']);
				$messages[$i]['post_on'] = $result4['post_on'];
			}
	
			
			////// sap xep lai mang theo thu tu thoi gian gan nhat
			function cmp($messages,$b)
			{
				return strtotime($messages['post_on'])<strtotime($b['post_on'])?1:-1;
			};

			uasort($messages,'cmp');
			//////
			
			$temp['template'] = 'view_messages';
			$temp['messages'] = $messages;
			$this->load->view('view',$temp);
		}
	}
}
?>	