<?php
class Sort_datetime_in_array extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->database();
		$this->load->library('session');
	}
	
	public function test()
	{
		$a=array(
		  0 => 
			array(
			  'post_id' => '1',
			  'user_id' => '3',
			  'post' => 'this is a post',
			  'created' => '2012-04-05 20:11:35'
			  ),
		 1 => 
			array(
			  'post_id' => '2',
			  'user_id' => '2',
			  'post' => 'this is a post',
			  'created' => '2012-04-05 20:11:39'
			  ),
		 2 => 
			array(
			  'post_id' => '3',
			  'user_id' => '5',
			  'post' => 'this is a post',
			  'created' => '2012-04-05 20:11:38'
			  )
		);
		
		function cmp($a,$b)
		{
			return strtotime($a['created'])<strtotime($b['created'])?1:-1;
		};

		uasort($a,'cmp');
		echo "<pre>";
		print_r($a);
		echo "</pre>";
	}
		
}
?>	