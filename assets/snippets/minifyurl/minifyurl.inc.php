<?php

/**
 * Minify snippet with versioning
 * @version 1.0
 * @author Matt Kornatz mkornatz.com
 * @date Jan 2, 2012
 */

	//Variables
	$groups = isset($groups) ? explode(',', $groups) : array();
	$files = isset($files) ? explode(',', $files) : array();

	$useVersion = isset($useVersion) ? $useVersion : true; //default to true
	if($useVersion == 0 || $useVersion == 'false'){
		$useVersion = false;
	}

	//If no files or groups specified, don't do anything
	if(empty($files) && empty($groups)){
		echo '#';
	}

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
