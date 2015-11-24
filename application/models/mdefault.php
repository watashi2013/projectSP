<?php

class Mdefault extends CI_Model
{
	public function __construct()
	{
        parent::__construct();
        $this->load->database();
    }
	
	public function featured_products()
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,situation FROM products WHERE purpose=2 ORDER BY RAND() LIMIT 0, 8 ");
		return $result = $query->result_array();	
	}
	public function last_products()
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,situation  FROM products ORDER BY post_on DESC LIMIT 0, 6 ");
		return $result = $query->result_array();	
	}
}

?>