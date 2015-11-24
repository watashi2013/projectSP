<?php

class Mdelete_transactions extends CI_Model
{
	public function __construct()
	{
        parent::__construct();
        $this->load->database();
    }
	
	public function check($tran_id)
	{
		$query = $this->db->query("SELECT tran_id FROM `transactions` WHERE ((tran_id = {$tran_id}) AND ((u_id1 = {$this->session->userdata('user_info')['user_id']}) OR (u_id2 = {$this->session->userdata('user_info')['user_id']})) )");
		$result = $query->num_rows();
		return $result;	
	}
	
	public function delete_tran($tran_id)
	{
		$query = $this->db->query("DELETE FROM `transactions` WHERE `tran_id` = {$tran_id}");
		$result = $this->db->affected_rows();
		return $result;	
	}
}

?>