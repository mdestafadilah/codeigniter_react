<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/

/**
 * Application Booting
 * @author Agung Dirgantara <iam@agungdirgantara.id>
*/
$hook['pre_system'] =
[
	[
		'class'    => 'Boot',
		'function' => 'SiteDataFolder',
		'filename' => 'Boot.php',
		'filepath' => 'hooks',
		'params'   => array()
	],
	[
		'class'    => 'Boot',
		'function' => 'SitePath',
		'filename' => 'Boot.php',
		'filepath' => 'hooks',
		'params'   => array()
	]
];
