<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Site extends CI_Controller
{
	public function index()
	{
		$this->load->view('welcome');	
	}
}

/* End of file Site.php */
/* Location: ./application/modules/site/controllers/Site.php */