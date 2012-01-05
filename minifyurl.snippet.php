<?php

/**
 * MinifyUrl - v1.0b
 * 2 Jan 2012
 * Written by Matt Kornatz (mkornatz.com)
 *
 * Description:
 *    Generate url for minify script and allow for versioning of files
 */

 include($modx->config['base_path'] . 'assets/snippets/minifyurl/model/minifyurl.class.php');

 $scriptProperties = array(
	'groups' => isset($groups) ? explode(',', $groups) : array(),
	'files' => isset($files) ? explode(',', $files) : array(),
	'minPath' => isset($minPath) ? $minPath : '/min/',
	'fileVersions' => isset($fileVersions) ? $fileVersions : 'on',
	'baseFilePath' => isset($baseFilePath) ? $baseFilePath : $modx->config['base_path'],
 );

 $m = new MinifyUrl($modx, $scriptProperties);

 return $m->run();

?>
