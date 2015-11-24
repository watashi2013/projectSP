<?php

class Mdelete_product extends CI_Model
{
	public function __construct()
	{
        parent::__construct();
        $this->load->database();
    }
	
	public function check($product_id)
	{
		$query = $this->db->query("SELECT product_id FROM products WHERE ((product_id = {$product_id}) AND ( user_id = {$this->session->userdata('user_info')['user_id']} ))");
		$result = $query->num_rows();
		return $result;	
	}
	
	public function delete_product($product_id)
	{
		$query = $this->db->query("DELETE FROM `products` WHERE `product_id` = {$product_id}");
		$result = $this->db->affected_rows();
		return $result;	
	}
}

?>