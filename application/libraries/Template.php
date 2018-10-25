<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Template
{
	protected $ci;
	public function __construct()
	{
		// Codeigniter Instance
        $this->ci =& get_instance();

        // Load Twig Config
        $this->ci->load->config('twig');

        // Set Twig Load Location
        $this->ci->config->set_item('twig.locations',
        	array_merge($this->ci->config->item('twig.locations'),[
        		sys_get_temp_dir() => sys_get_temp_dir(),
        		FCPATH.'assets/templates/' => FCPATH.'assets/templates/'
        	])
    	);
    	// Load Twig Library
        $this->ci->load->library('twig','Twig-1.35.2');
        // Set Twog File Extension
        $this->ci->config->set_item('twig.extension', '.html');
	}

	/* Site Template */
	public function load($page,$content_data=array(),$template_data=array())
	{
		$template['content'] = (!empty($page))?$this->ci->twig->parse($this->ci->config->item('content_template').$page,$content_data,TRUE):FALSE;
		$this->ci->twig->parse($this->ci->config->item('base_template'),array_merge($template,$template_data));
	}
}

/* End of file Template.php */
/* Location: ./application/libraries/Template.php */
