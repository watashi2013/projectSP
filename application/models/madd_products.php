<?php 
class Madd_products extends CI_Model
{
	protected $_gallery_path = "";
	protected $_gallery_url = "";
	
	public function __construct()
	{
        parent::__construct();
        $this->load->database();
		
		//Lấy đường dẫn url của thư mục chứa hình ảnh được upload
		$this->_gallery_url = base_url()."public/images/";
		//Lấy đường dẫn vật lý của thư mục chứa hình ảnh đươc upload
		$this->_gallery_path = realpath(APPPATH. "../public/images");
    }
	
	
	//hàm thực hiện công việc upload và resize lại hình ảnh
	public function do_upload()
	{
		$config = array('upload_path'   => $this->_gallery_path,
						'allowed_types' => 'gif|jpg|png|jpeg',
						'max_size'      => '2000');
		$this->load->library("upload",$config);
		if(!$this->upload->do_upload("image"))
		{
			$error = array($this->upload->display_errors());
			return $error;
		}
		else
		{
			$image_data = $this->upload->data();
			//kết thúc công đoạn upload hình ảnh
			
			//resize lại hình ảnh	
			$config = array("source_image" => $image_data['full_path'],
						"new_image" => $this->_gallery_path,
						"maintain_ration" => true,
						"width" => '160',
						"height" => "160");
			$this->load->library("image_lib",$config);
			$this->image_lib->resize();
			return $image_data['file_name'];
		}					
	}
	
	
	
	public function insert($product_name,$category,$situation,$purpose,$price,$file_name,$description)
	{
		
		$data = array();
		$data['product_name'] = $product_name;
		$data['cat_id'] = $category;
		$data['user_id'] = $this->session->userdata('user_info')['user_id'];
		$data['description'] = $description;
		$data['situation'] = $situation;
		$data['purpose'] = $purpose;
		$data['picture'] = $file_name;
		$data['price'] = $price;
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$data['post_on'] = date("Y-m-d H:i:s", time());
		
		$query = $this->db->insert("products",$data);
	}
	
	
	
}	
?>