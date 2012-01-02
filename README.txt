The files in this directory represent a default setup of minifyUrl for
ModX Evolution (http://modx.com/evolution/).

THIS SNIPPET IS NOT SUPPORTED BY MODX REVOLUTION. Feel free to modify it for use
with ModX Revolution.

SETUP

	* Copy assets/snippets/minifyurl to your snippets directory in your ModX
		installation.

	* Modify your .htaccess file in the webroot directory using the rules in
		assets/snippets/minifyurl/ht.access

	* Add the snippet code from minifyurl.snippet.php to a new snippet in the
		ModX manager.

USAGE

	For css files:
		<link href="[!MinifyUrl? &files=`assets/css/style.css`]" rel="stylesheet"
			type="text/css" />

	For js files:
		<script src="[!MinifyUrl? &files=`assets/js/jquery.js`!]"
			type="text/javascript" charset="utf-8"></script>

	To include multiple files, just deliminate files with a comma:
		<script src="[!MinifyUrl? &files=`assets/js/jquery.js,assets/js/jquery.innerfade.js`!]"
			type="text/javascript" charset="utf-8"></script>

LIMITATIONS

	Because there really isn't a way to "version" minify groups, versioning is
	not supported for groups, only files.
