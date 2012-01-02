<?php

/**
 * Minify snippet with versioning
 * @version 1.0
 * @author Matt Kornatz mkornatz.com
 * @date Jan 2, 2012
 * @description
 *
 * Example request that is built (requres .htaccess to be modified. See ht.access file)
 * /min/?_v=1234567890&f=assets/css/style.css
 */

	$groups = isset($groups) ? explode(',', $groups) : array();
	$files = isset($files) ? explode(',', $files) : array();

	//If no files or groups specified, don't do anything
	if(empty($files) && empty($groups)){
		echo '#';
	}

	//Variables
	$useVersion = isset($useVersion) ? $useVersion : true; //default to true

	//Core class
	include_once dirname(__FILE__) . '/core/minifyurl.class.php';

	//Prepare config
	$config = array('minPath' => '/min/',
									'baseFilePath' => $modx->config['base_path'],
									'useVersion' => $useVersion);

	//Set config options
	$minifyUrl = new MinifyUrl($config);

	$minifyUrl->addFiles($files);
	$minifyUrl->addGroups($groups);

	//Render output
	$output = $minifyUrl->render();

?>
