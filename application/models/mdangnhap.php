<?php 

class Mdangnhap extends CI_Model
{
	public function __construct()
	{
        parent::__construct();
        $this->load->helper("url");
		$this->load->database();
		$this->load->library('session');
    }
	
	public function check_login($e,$p)
	{
		$query = $this->db->query("SELECT user_id,first_name,level FROM users WHERE (email = '{$e}' AND password = '{$p}' )");
		$result = $query->row_array();
		$rows = $query->num_rows();
		$results['result'] = $result;
		$results['rows'] = $rows;
		return $results;
	}
	
	public function GetUserState()
	{
		if($this->session->userdata('user_info')==NULL )
		{
			$this->session->set_userdata('error_addProduct', "<p class='label label-warning'>Please login before add product</p>");
			$url= base_url()."index.php/dangnhap/form_login";
			header("Location: $url");
		}
		else
		{
			$query = $this->db->query("SELECT user_id,first_name,level FROM users WHERE user_id = '{$this->session->userdata('user_info')['user_id']}'");
			$result = $query->row_array();
			$this->session->set_userdata('user_info', $result);
		}
	}
}
?>