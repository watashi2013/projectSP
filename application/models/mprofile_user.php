<?php

class Mprofile_user extends CI_Model
{
	public function __construct()
	{
        parent::__construct();
        $this->load->database();
    }
	
	public function get_profile($u_id)
	{
			
		$q1 = " SELECT p.product_id, p.product_name,p.picture "; 
		$q1 .= " FROM products AS p ";
		$q1 .= " INNER JOIN users AS u ";
		$q1 .= " USING (user_id) ";
		$q1 .= " WHERE u.user_id={$u_id}";
		$q1 .= " ORDER BY post_on DESC";	
		$query1 = $this->db->query($q1);
		$products = $query1->result_array();
		
		
		$q2 = " SELECT CONCAT_WS(' ', u.first_name, u.last_name) AS name, u.mark,u.people,u.email,u.phone,u.address "; 
		$q2 .= " FROM users AS u ";
		$q2 .= " WHERE u.user_id={$u_id} LIMIT 1";
		$query2 = $this->db->query($q2);
		$profile = $query2->row_array();
		
		$result['products'] = $products;
		$result['profile'] = $profile;
		return $result;
	}
	
	
}

?>