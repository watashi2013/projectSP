<?php

class Mprofile extends CI_Model
{
	public function __construct()
	{
        parent::__construct();
        $this->load->database();
    }
	
	public function get_profile($u_id)
	{
			
		$q1 = " SELECT p.product_id, p.product_name, p.purpose,p.picture,p.situation "; 
		$q1 .= " FROM products AS p ";
		$q1 .= " INNER JOIN users AS u ";
		$q1 .= " USING (user_id) ";
		$q1 .= " WHERE u.user_id={$u_id}";
		$q1 .= " ORDER BY post_on DESC";	
		$query1 = $this->db->query($q1);
		$products = $query1->result_array();
		
		
		$q2 = " SELECT CONCAT_WS(' ', u.first_name, u.last_name) AS name, u.mark,u.email,u.phone,u.address "; 
		$q2 .= " FROM users AS u ";
		$q2 .= " WHERE u.user_id={$u_id} LIMIT 1";
		$query2 = $this->db->query($q2);
		$profile = $query2->row_array();
		
		$result['products'] = $products;
		$result['profile'] = $profile;
		return $result;
	}
	
	public function mrate($rating,$u_id)
	{
		$query = $this->db->query("SELECT users.mark,users.people 	FROM users WHERE user_id={$u_id} LIMIT 1");
		$user = $query->row_array();
		
		$new_rate = ($user['mark']*$user['people']+$rating)/($user['people']+1);
		$new_people = $user['people'] + 1;
		
		$query = $this->db->query("UPDATE users SET mark='{$new_rate}',people={$new_people} WHERE user_id={$u_id} LIMIT 1");
		
		if($this->db->affected_rows() == 1)
		{
			$mess = "<span class='label label-success'>Thanks for rating!</span>";
			return $mess;
		}
		else
		{
			$mess = "<span class='label label-warning'>Could not rate due to a system error!</span>";
			return $mess;
		}
	}
	
}

?>