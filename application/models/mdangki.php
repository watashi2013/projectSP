<?php

class Mdangki extends CI_Model
{
	public function __construct()
	{
        parent::__construct();
        $this->load->database();
    }
	
	public function select_mail($e)
	{		
		$query = $this->db->query("SELECT user_id FROM users WHERE email = '{$e}'");
		return $result = $query->num_rows();
    }
	public function insert($fn,$ln,$e,$p)
	{
		$data['first_name'] = $fn;
		$data['last_name'] = $ln;
		$data['email'] = $e;
		$data['password'] = md5($p);
		$data['mark'] = 2.5;
		$data['people'] = 1;
		$data['level'] = 0;
		$data['register_time'] = date("Y-m-d H:i:s", time());
		$query = $this->db->insert("users",$data);		
	}
}

?>