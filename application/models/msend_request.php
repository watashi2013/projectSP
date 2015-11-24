<?php

class Msend_request extends CI_Model
{
	public function __construct()
	{
        parent::__construct();
        $this->load->database();
    }
	
	public function get_products($u_id)
	{
		$q1 = " SELECT p.product_id, p.product_name, p.picture "; 
		$q1 .= " FROM products AS p ";
		$q1 .= " INNER JOIN users AS u ";
		$q1 .= " USING (user_id) ";
		$q1 .= " WHERE (u.user_id={$u_id} AND p.purpose=2) ";
		$q1 .= " ORDER BY post_on DESC";	
		$query1 = $this->db->query($q1);
		$products = $query1->result_array();
		return $products;
	}
	
	public function check1($u_id,$p_id)
	{
		$query1 = $this->db->query("SELECT product_id FROM products WHERE (product_id={$p_id} AND user_id={$u_id} AND purpose=1) LIMIT 1");
		$result = $query1->row_array();
		return $result;	
	}
	
	public function check2($u_id,$p_id)
	{
		$query1 = $this->db->query("SELECT product_id FROM products WHERE (product_id={$p_id} AND user_id={$u_id} AND purpose=2) LIMIT 1");
		$result = $query1->row_array();
		return $result;	
	}
	
	public function select($u_id1,$u_id2,$product_id)
	{
		$query = $this->db->query("SELECT tran_id FROM transactions WHERE ( (u_id1 = {$u_id1}) AND (u_id2 = {$u_id2}) AND (product_id = {$product_id}) ) LIMIT 1");
		$result = $query->row_array();
		return $result;
	}	
	
	public function insert_tran($u_id1,$u_id2,$method,$product_id)
	{
		$data['u_id1'] = $u_id1;
		$data['u_id2'] = $u_id2;
		$data['method'] = $method;
		$data['view'] = 2;
		$data['product_id'] = $product_id;
		$query = $this->db->insert("transactions",$data);
		$result = $this->db->affected_rows();
		return $result;
	}
	
	public function insert_mess($tran_id,$message,$u_id)  // u_id la user_id cua nguoi gui
	{
		$data['tran_id'] = $tran_id;
		$data['content'] = $message;
		$data['u_id'] = $u_id;
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$data['post_on'] = date("Y-m-d H:i:s", time());
		$query = $this->db->insert("messages",$data);
		$result = $this->db->affected_rows();
		return $result;
	}
	
	public function insert_ex_product($tran_id,$ex_product)
	{
		$data['tran_id'] = $tran_id;
		$data['product_id'] = $ex_product;
		$query = $this->db->insert("exchange_products",$data);
		$result = $this->db->affected_rows();
		return $result;
	}
	
}

?>