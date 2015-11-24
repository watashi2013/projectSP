<?php

class Mproduct_details extends CI_Model
{
	public function __construct()
	{
        parent::__construct();
        $this->load->database();
    }
	
	public function get_product_details($p_id)
	{
		$q = " SELECT p.product_id, p.product_name, p.description,p.purpose,p.price,p.picture,p.situation, "; 
		$q .= " DATE_FORMAT(p.post_on, '%b %d %Y %h:%i %p') AS date, ";
		$q .= " CONCAT_WS(' ', u.first_name, u.last_name) AS name, u.user_id,u.mark ";
		$q .= " FROM products AS p ";
		$q .= " INNER JOIN users AS u ";
		$q .= " USING (user_id) ";
		$q .= " WHERE p.product_id={$p_id}";
		$q .= " LIMIT 1";	
		$query = $this->db->query($q);

		$result = $query->row_array();
		$rows = $query->num_rows();
		$results['result'] = $result;
		$results['rows'] = $rows;
		
		return $results;
	}
	
}

?>