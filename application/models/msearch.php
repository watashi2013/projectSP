<?php

class Msearch extends CI_Model
{
	public function __construct()
	{
        parent::__construct();
        $this->load->database();
    }
	
	public function search_name($product_name)
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE product_name LIKE '%{$product_name}%' ORDER BY post_on DESC ");
		return $result = $query->result_array();	
	}
	
	public function search_cat($cat_id)
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE cat_id = {$cat_id} ORDER BY post_on DESC ");
		return $result = $query->result_array();	
	}
	
	public function search_both($product_name,$cat_id)
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE ((product_name LIKE '%{$product_name}%') AND ( cat_id = {$cat_id} )) ORDER BY post_on DESC ");
		return $result = $query->result_array();	
	}
	
	/* public function search_purpose($purpose)
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE purpose = {$purpose} ORDER BY post_on DESC ");
		return $result = $query->result_array();	
	}
	
	public function search_price1()
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE (price < 1000000) ORDER BY post_on DESC ");
		return $result = $query->result_array();	
	}
	
	public function search_price2()
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE ((1000000 <= price) AND (price <= 3000000)) ORDER BY post_on DESC ");
		return $result = $query->result_array();	
	}
	
	public function search_price3()
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE ((3000000 <= price) AND (price <= 5000000)) ORDER BY post_on DESC ");
		return $result = $query->result_array();	
	}
	
	public function search_price4()
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE (price > 5000000) ORDER BY post_on DESC ");
		return $result = $query->result_array();	
	}
	
	public function search_name_purpose($product_name,$purpose)
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE ((product_name LIKE '%{$product_name}%') AND ( purpose = {$purpose} )) ORDER BY post_on DESC ");
		return $result = $query->result_array();
	}
	
	public function search_name_price1($product_name)
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE ((product_name LIKE '%{$product_name}%') AND ( (price < 1000000) )) ORDER BY post_on DESC ");
		return $result = $query->result_array();
	}
	
	public function search_name_price2($product_name)
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE ((product_name LIKE '%{$product_name}%') AND ( (1000000 <= price) AND (price <= 3000000) )) ORDER BY post_on DESC ");
		return $result = $query->result_array();
	}
	
	public function search_name_price3($product_name)
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE ((product_name LIKE '%{$product_name}%') AND ( (3000000 <= price) AND (price <= 5000000) )) ORDER BY post_on DESC ");
		return $result = $query->result_array();
	}
	
	public function search_name_price4($product_name)
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE ((product_name LIKE '%{$product_name}%') AND ( (price > 5000000) )) ORDER BY post_on DESC ");
		return $result = $query->result_array();
	}
	public function search_cat_id_purpose($cat_id,$purpose)
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE ((purpose = {$purpose}) AND ( cat_id = {$cat_id} )) ORDER BY post_on DESC ");
		return $result = $query->result_array();
	}
	
	public function search_cat_id_price1($cat_id)
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE ((cat_id = {$cat_id}) AND ( (price < 1000000) )) ORDER BY post_on DESC ");
		return $result = $query->result_array();
	}
	
	public function search_cat_id_price2($cat_id)
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE ((cat_id = {$cat_id}) AND ( (1000000 <= price) AND (price <= 3000000) )) ORDER BY post_on DESC ");
		return $result = $query->result_array();
	}
	
	public function search_cat_id_price3($cat_id)
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE ((cat_id = {$cat_id}) AND ( (3000000 <= price) AND (price <= 5000000) )) ORDER BY post_on DESC ");
		return $result = $query->result_array();
	}
	
	public function search_cat_id_price4($cat_id)
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE ((cat_id = {$cat_id}) AND ( 5000000 < price  )) ORDER BY post_on DESC ");
		return $result = $query->result_array();
	}
	
	public function search_purpose_price1($purpose)
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE ((purpose = {$purpose}) AND ( (price < 1000000) )) ORDER BY post_on DESC ");
		return $result = $query->result_array();
	}
	
	public function search_purpose_price2($purpose)
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE ((purpose = {$purpose}) AND ( (1000000 <= price) AND (price <= 3000000) )) ORDER BY post_on DESC ");
		return $result = $query->result_array();
	}
	
	public function search_purpose_price3($purpose)
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE ((purpose = {$purpose}) AND ( (3000000 <= price) AND (price <= 5000000) )) ORDER BY post_on DESC ");
		return $result = $query->result_array();
	}
	
	public function search_purpose_price4($purpose)
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE ((purpose = {$purpose}) AND ( 5000000 < price )) ORDER BY post_on DESC ");
		return $result = $query->result_array();
	}
	
	public function search_name_cat_id_purpose($product_name,$cat_id,$purpose)
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE ((product_name LIKE '%{$product_name}%') AND ( cat_id = {$cat_id} ) AND ( purpose = {$purpose} ) ) ORDER BY post_on DESC ");
		return $result = $query->result_array();
	}
	
	public function search_name_purpose_price1($product_name,$purpose)
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE ((product_name LIKE '%{$product_name}%') AND ( purpose = {$purpose} ) AND ( (price < 1000000) )) ORDER BY post_on DESC ");
		return $result = $query->result_array();
	}
	
	public function search_name_purpose_price2($product_name,$purpose)
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE ((product_name LIKE '%{$product_name}%') AND ( purpose = {$purpose} ) AND ( (1000000 <= price) AND (price <= 3000000) )) ORDER BY post_on DESC ");
		return $result = $query->result_array();
	}
	
	public function search_name_purpose_price3($product_name,$purpose)
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE ((product_name LIKE '%{$product_name}%') AND ( purpose = {$purpose} ) AND ( (3000000 <= price) AND (price <= 5000000))) ORDER BY post_on DESC ");
		return $result = $query->result_array();
	}
	
	public function search_name_purpose_price4($product_name,$purpose)
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE ((product_name LIKE '%{$product_name}%') AND ( purpose = {$purpose} ) AND ( 5000000 < price )) ORDER BY post_on DESC ");
		return $result = $query->result_array();
	}
	
	public function search_cat_id_purpose_price1($cat_id,$purpose)
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE ((cat_id ={$cat_id}) AND ( purpose = {$purpose} ) AND ( (price < 1000000) )) ORDER BY post_on DESC ");
		return $result = $query->result_array();
	}
	
	public function search_cat_id_purpose_price2($cat_id,$purpose)
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE ((cat_id ={$cat_id}) AND ( purpose = {$purpose} ) AND ( (1000000 <= price) AND (price <= 3000000) )) ORDER BY post_on DESC ");
		return $result = $query->result_array();
	}
	
	public function search_cat_id_purpose_price3($cat_id,$purpose)
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE ((cat_id ={$cat_id}) AND ( purpose = {$purpose} ) AND ( (3000000 <= price) AND (price <= 5000000) )) ORDER BY post_on DESC ");
		return $result = $query->result_array();
	}
	
	public function search_cat_id_purpose_price4($cat_id,$purpose)
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE ((cat_id ={$cat_id}) AND ( purpose = {$purpose} ) AND ( 5000000 < price )) ORDER BY post_on DESC ");
		return $result = $query->result_array();
	}
	
	public function search_name_name_cat_id_price1($product_name,$cat_id)
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE ((product_name LIKE '%{$product_name}%') AND ( cat_id = {$cat_id} ) AND ( (price < 1000000) )) ORDER BY post_on DESC ");
		return $result = $query->result_array();
	}
	
	public function search_name_name_cat_id_price2($product_name,$cat_id)
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE ((product_name LIKE '%{$product_name}%') AND ( cat_id = {$cat_id} ) AND ( (1000000 <= price) AND (price <= 3000000) )) ORDER BY post_on DESC ");
		return $result = $query->result_array();
	}
	
	public function search_name_name_cat_id_price3($product_name,$cat_id)
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE ((product_name LIKE '%{$product_name}%') AND ( cat_id = {$cat_id} ) AND ( (3000000 <= price) AND (price <= 5000000) )) ORDER BY post_on DESC ");
		return $result = $query->result_array();
	}
	
	public function search_name_name_cat_id_price4($product_name,$cat_id)
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE ((product_name LIKE '%{$product_name}%') AND ( cat_id = {$cat_id} ) AND ( 5000000 < price )) ORDER BY post_on DESC ");
		return $result = $query->result_array();
	}
	
	public function search_name_cat_id_purpose_price1($product_name,$cat_id,$purpose)
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE ((product_name LIKE '%{$product_name}%') AND ( cat_id = {$cat_id} ) AND ( purpose = {$purpose} ) AND ( (price < 1000000) )) ORDER BY post_on DESC ");
		return $result = $query->result_array();
	}
	
	public function search_name_cat_id_purpose_price2($product_name,$cat_id,$purpose)
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE ((product_name LIKE '%{$product_name}%') AND ( cat_id = {$cat_id} ) AND ( purpose = {$purpose} ) AND (  (1000000 <= price) AND (price <= 3000000)  )) ORDER BY post_on DESC ");
		return $result = $query->result_array();
	}
	
	public function search_name_cat_id_purpose_price3($product_name,$cat_id,$purpose)
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE ((product_name LIKE '%{$product_name}%') AND ( cat_id = {$cat_id} ) AND ( purpose = {$purpose} ) AND ( (3000000 <= price) AND (price <= 5000000) )) ORDER BY post_on DESC ");
		return $result = $query->result_array();
	}
	
	public function search_name_cat_id_purpose_price4($product_name,$cat_id,$purpose)
	{
		$query = $this->db->query("SELECT product_id,product_name,picture,purpose,price,description,situation FROM products WHERE ((product_name LIKE '%{$product_name}%') AND ( cat_id = {$cat_id} ) AND ( purpose = {$purpose} ) AND ( 5000000 < price )) ORDER BY post_on DESC ");
		return $result = $query->result_array();
	} */
	
}

?>