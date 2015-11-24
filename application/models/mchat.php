<?php 

class Mchat extends CI_Model
{
	public function __construct()
	{
        parent::__construct();
        $this->load->database();
    }
	
	public function get_uids_view($tran_id)
	{
		$query = $this->db->query("SELECT u_id1,u_id2,view FROM transactions WHERE tran_id = {$tran_id}");
		$result = $query->row_array();
		return $result;
	}
	
	public function insert_mess($tran_id,$content,$u_id)
	{
		$data['tran_id'] = $tran_id;
		$data['content'] = $content;
		$data['u_id'] = $this->session->userdata('user_info')['user_id'];
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$data['post_on'] = date("Y-m-d H:i:s", time());
		$query = $this->db->insert("messages",$data);
		$result = $this->db->affected_rows();
		return $result;	
	}
	public function update_view1($tran_id)
	{
		$q = "UPDATE transactions SET view=1 WHERE tran_id={$tran_id}";
		$query = $this->db->query($q);
		$result = $this->db->affected_rows();
		return $result;
	}
	public function update_view2($tran_id)
	{
		$q = "UPDATE transactions SET view=2 WHERE tran_id={$tran_id}";
		$query = $this->db->query($q);
		$result = $this->db->affected_rows();
		return $result;
	}
	
}

?>