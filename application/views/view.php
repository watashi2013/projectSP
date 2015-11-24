<?php 
$categories  = $this->get_category();
$temp['categories'] = $categories;
if($this->session->userdata('user_info')!=NULL)
{
	$num_msg = $this->count_msg($this->session->userdata('user_info')['user_id']);
	$temp['num_msg'] = $num_msg['num_msg'];
}		
$this->load->view("header",$temp);
?>
<?php $this->load->view("sidebar");?>
<?php 
if(isset($template))
	{
		$this->load->view($template);
	}
else
	{
		$temp['featured_products'] = $featured_products;
		$temp['last_products'] = $last_products;
		$this->load->view("form_index",$temp); 
	}
?>
<?php $this->load->view("footer");?>