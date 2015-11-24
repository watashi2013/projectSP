<?php

class Mupdate_info extends CI_Model
{
	public function __construct()
	{
        parent::__construct();
        $this->load->database();
    }
	
	public function update($phone,$address)
	{
		$query = $this->db->query("UPDATE users SET phone='{$phone}',address='{$address}' WHERE user_id={$this->session->userdata('user_info')['user_id']}");
		$result = $this->db->affected_rows();
		return $result;	
	}
}

?>