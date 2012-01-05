<?php

/**
 * MinifyUrl - v1.0
 * 2 Jan 2012
 * Written by Matt Kornatz (mkornatz.com)
 *
 * Description:
 *    Generate url for minify script and allow for versioning of files
 *
 * Params:
 *    &files [string] - Which files to minify (e.g. &files=`assets/css/style.css,assets/css/style1.css`)
 *    &groups [string] - Which groups to minify
 *    &useVersion [bool] - Use file versioning to prevent browser using cached files
 */

 include($modx->config['base_path'] . 'assets/snippets/minifyurl/minifyurl.inc.php');

 return $output;

?>
