<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Boot
{
	protected $app_config = FCPATH.'app.config';
	/**
	 * constructor class
	*/
	public function __construct()
	{

	}

	/**
	 * Site Data Fodler
	 * @method auto create site data folder at application root
	 * @return null
	 * @author Agung Dirgantara <iam@agungdirgantara.id>
	*/
	public function SiteDataFolder()
	{
		if(file_exists($this->app_config))
		{
			$decode_content = json_decode(file_get_contents($this->app_config));
		}

		$object = (isset($decode_content))?$decode_content:(object) array();

		// Set Site Folder If Not Exsist
		if(!isset($object->site_folder))
		{
			$object->site_folder = 'site_data_'.time();
			(!is_dir(FCPATH.$object->site_folder))?mkdir(FCPATH.$object->site_folder,0777,TRUE):FALSE;
			$object->site_folder = realpath($object->site_folder);
			file_put_contents($this->app_config, json_encode($object,JSON_PRETTY_PRINT));
		}
	}

	/**
	 * Site Path
	 * @method create site path for webpack site_path
	 * @return null
	 * @author Agung Dirgantara <iam@agungdirgantara.id>
	*/
	public function SitePath()
	{
		if(file_exists($this->app_config))
		{
			$decode_content = json_decode(file_get_contents($this->app_config));
		}

		$object = (isset($decode_content))?$decode_content:(object) array();

		// Set Site Folder If Not Exsist
		if(!isset($object->site_path))
		{
			$object->site_path = (isset(parse_url(BASE_URL)['path']))?parse_url(BASE_URL)['path']:'/';
			file_put_contents($this->app_config, json_encode($object,JSON_PRETTY_PRINT));
		}
	}
}

/* End of file Boot.php */
/* Location: ./application/hooks/Boot.php */
