<?php 

class Mmessages extends CI_Model
{
	public function __construct()
	{
        parent::__construct();
        $this->load->database();
    }
	
	public function get_messages($u_id)
	{
		$q = "SELECT tran_id,u_id1,u_id2,view FROM transactions WHERE (  (u_id2={$u_id})  OR (u_id1={$u_id})    ) ORDER BY tran_id DESC";
		$query = $this->db->query($q);
		$result = $query->result_array();
		return $result;
	}
	
	public function get_time($tran_id)
	{
		$q = "SELECT post_on FROM messages WHERE (tran_id = {$tran_id} AND mess_id =( SELECT MAX(mess_id) FROM messages WHERE tran_id = {$tran_id}) )";
		$query = $this->db->query($q);
		$result = $query->row_array();
		return $result;
	}
	
	public function get_last_mesg($tran_id)
	{
		$q = "SELECT content,u_id FROM messages WHERE (tran_id = {$tran_id} AND mess_id =( SELECT MAX(mess_id) FROM messages WHERE tran_id = {$tran_id}) )";
		$query = $this->db->query($q);
		$result = $query->row_array();
		return $result;
	}
	
	public function get_name($u_id)
	{
		$query = $this->db->query("SELECT first_name FROM users WHERE user_id={$u_id}");
		$result = $query->row_array();
		return $result;
	}
	
}

?>