<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Site extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->config->set_item('base_template','site/default/views/base_template');
		$this->config->set_item('content_template','site/default/views/');
	}

	public function index()
	{
		// $this->load->view('welcome_message');
		$this->template->load('welcome');
	}
}

/* End of file Site.php */
/* Location: ./application/modules/site/controllers/Site.php */