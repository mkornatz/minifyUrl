The files in this directory represent a default setup of minifyUrl for
ModX Evolution (http://modx.com/evolution/). A copy of minify is also included
(http://code.google.com/p/minify/).

DESCRIPTION

	This snippet makes it possible to use minify with ModX Evolution (ModX Revolution
	is not currently supported). It also supports file versioning within the url
	which is based on file modification times in order to prevent annoying browser
	caching of js and css files.

	Example:
		<script src="/assets/js/example.js"></script>

		becomes...

		<script src="/min/?_v=1234567890&f=assets/js/example.js"></script>

SETUP

	* Copy assets/snippets/minifyurl to your snippets directory in your ModX
	installation.

	* Modify your .htaccess file in the webroot directory using the "# Minify URLs"
	rules in the ht.access file. A full default .htaccess file is included, but
	only 2 rules are necessary to be added for MinifyUrl to work correctly.

	* Add the snippet code from minifyurl.snippet.php to a new snippet in the
	ModX manager.

USAGE

	For css files:
		<link href="[!MinifyUrl? &files=`assets/css/style.css`]" rel="stylesheet" type="text/css" />

	For js files:
		<script src="[!MinifyUrl? &files=`assets/js/jquery.js`!]" type="text/javascript" charset="utf-8"></script>

	To include multiple files, just deliminate files with a comma:
		<script src="[!MinifyUrl? &files=`assets/js/jquery.js,assets/js/jquery.innerfade.js`!]" type="text/javascript" charset="utf-8"></script>

  Params:
	&fileVersions - Turn on/off versioning for files (defaults to on)
	&groups - Which minify groups to include in the url
	&files - Which files to include in the url
	&minPath - The path of the minify directory (defaults to '/min')

UPGRADING

  Upgrading minify should be fairly straightforward. You should be able to just
	replace the /min directory in the webroot. There is no guarantees though. Be
	careful to test everything yourself or check for updated versions of MinifyUrl.

LIMITATIONS

	Because there really isn't a way to "version" minify groups, versioning is
	not supported for groups, only files. Read more about minify at http://code.google.com/p/minify/.
