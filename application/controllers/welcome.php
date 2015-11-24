<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct()
	{
        parent::__construct();
		$this->load->helper("url");
        $this->load->database();
		$this->load->library('session');
    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->Model("Mdefault");
		$result1  = $this->Mdefault->featured_products();
		$result2 = $this->Mdefault->last_products();
		$temp['featured_products'] = $result1;
		$temp['last_products'] = $result2;
		$this->load->view("view",$temp);
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */