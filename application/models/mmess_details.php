<?php 

class Mmess_details extends CI_Model
{
	public function __construct()
	{
        parent::__construct();
        $this->load->database();
    }
	
	public function get_purpose_view($tran_id,$user_id)
	{
		$q = "SELECT p.purpose,t.view FROM products AS p INNER JOIN transactions AS t USING (product_id) WHERE (  (t.tran_id={$tran_id})  AND ((t.u_id1={$user_id}) OR (t.u_id2={$user_id}))    ) LIMIT 1";
		$query = $this->db->query($q);
		$result = $query->row_array();
		return $result;
	}
	
	public function get_sender_id($tran_id)
	{
		$q = "SELECT u_id FROM messages WHERE (tran_id = {$tran_id} AND mess_id =( SELECT MAX(mess_id) FROM messages WHERE tran_id = {$tran_id}) )";
		$query = $this->db->query($q);
		$result = $query->row_array();
		return $result;
	}
	
	public function update_view($tran_id)
	{
		$q = "UPDATE transactions SET view=0 WHERE tran_id={$tran_id}";
		$query = $this->db->query($q);
		$result = $this->db->affected_rows();
		return $result;
	}
	
	public function get_name($u_id)
	{
		$query = $this->db->query("SELECT first_name FROM users WHERE user_id={$u_id}");
		$result = $query->row_array();
		return $result;
	}
	
	public function get_mess($tran_id)
	{
		$q1= " SELECT t.u_id1,t.u_id2,t.method,t.product_id,p.product_name,p.picture
				FROM transactions AS t 
				INNER JOIN products AS p 
				USING (product_id) 
				WHERE t.tran_id={$tran_id}";
		$query1 = $this->db->query($q1);
		$result1 = $query1->row_array();
		
		$result1['u_id1_name']=$this->get_name($result1['u_id1'])['first_name'];
		$result1['u_id2_name']=$this->get_name($result1['u_id2'])['first_name'];
		
		$q2 = "SELECT content, u_id, post_on FROM messages WHERE tran_id ={$tran_id} ORDER BY post_on ASC";
		$query2 = $this->db->query($q2);
		$result2 = $query2->result_array();
		for($i=0;$i<count($result2);$i++)
		{	
			$result2[$i]['sender']=$this->get_name($result2[$i]['u_id'])['first_name'];
		}
		$results['mail_header'] = $result1;
		$results['conversation'] = $result2;
		return $results;
	}
	
	public function get_ex_products($tran_id)
	{
		$q = "SELECT p.product_id,p.product_name,p.picture FROM products AS p INNER JOIN exchange_products USING (product_id) WHERE tran_id = {$tran_id}";
		$query = $this->db->query($q);
		$result = $query->result_array();
		return $result;
	}
	
}

?>