<?php

class Mlist_products extends CI_Model
{
	public function __construct()
	{
        parent::__construct();
        $this->load->database();
    }
	
	public function get_last_products($cat_id)
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE cat_id={$cat_id} ORDER BY post_on DESC ");
		return $result = $query->result_array();			
	}
	
	public function get_products_az($cat_id)
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE cat_id={$cat_id} ORDER BY product_name ASC ");
		return $result = $query->result_array();			
	}
	
	public function get_products_za($cat_id)
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE cat_id={$cat_id} ORDER BY product_name DESC ");
		return $result = $query->result_array();			
	}
	
	/* public function get_products_buy($cat_id)
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE (cat_id={$cat_id} AND purpose=1 ) ORDER BY post_on DESC ");
		return $result = $query->result_array();			
	}
	
	public function get_products_exchange($cat_id)
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE (cat_id={$cat_id} AND purpose=2 ) ORDER BY post_on DESC ");
		return $result = $query->result_array();			
	} */
	
	public function get_category_name($cat_id)
	{
		$query = $this->db->query("SELECT cat_name FROM categories WHERE cat_id={$cat_id} LIMIT 1 ");
		return $cat_name = $query->row_array();			
	}
	
}

?>