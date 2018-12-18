<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Site extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->config->set_item('base_template','site/reactjs/views/base_template');
		$this->config->set_item('content_template','site/reactjs/views/');
	}

	public function index()
	{
		$data['elapsed_time'] = $this->benchmark->elapsed_time();
		$this->template->load('welcome',$data);
	}

	public function software()
	{
		$this->template->load('welcome');
	}
}

/* End of file Site.php */
/* Location: ./application/modules/site/controllers/Site.php */