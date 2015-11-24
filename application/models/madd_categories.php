<?php

class Madd_categories extends CI_Model
{
	public function __construct()
	{
        parent::__construct();
        $this->load->database();
    }
	
	public function insert($cat_name)
	{
		$data['cat_name'] = $cat_name;
		$query = $this->db->insert("categories",$data);		
		// phai tra ve gia tri affected_row cua db, sau do tra ve controller, 
		// trong controller kiem tra gia tri do, neu bang 1 thi insert thang cong, 
		// nguoc lai thi thong bao khong insert duoc do loi cua he thong!
	}
}

?>