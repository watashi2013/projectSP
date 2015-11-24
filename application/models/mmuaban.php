<?php
class Mmuaban extends CI_Model
{
    public function __construct()
	{
        parent::__construct();
        $this->load->database();
    }
	public function listall()
	{
		$data = array();
		$query = $this->db->query("SELECT * FROM users WHERE user_id=1");
		return $result = $query->row_array();
    }
}