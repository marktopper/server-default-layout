<?php

$env = [];

if (file_exists(__DIR__.'/../.env')) {
	$content = file_get_contents(__DIR__.'/../.env');
	$lines = explode("\n", $content);

	foreach ($lines AS $line) {
		$parts = explode('=', $line);

		if (isset($parts[1])) {
			$env[$parts[0]] = $parts[1];
			$title = $parts[1];
		}
	}
}

$title = isset($env['TITLE']) ? $env['TITLE'] : null;
$redirect = isset($env['REDIRECT']) ? $env['REDIRECT'] : null;
$redirectPermanent = isset($env['REDIRECT_PERMANENT']) ? $env['REDIRECT_PERMANENT'] : false;

if (!is_null($redirect)) {
	header('Location: ' . $redirect, true, $redirectPermanent ? 301 : 302);
	exit;
}

if (!$title) {
	$title = $_SERVER['HTTP_HOST'];
}

?><!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $title ?></title>
	<style>
	* { -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; }
	
	html, body{
		background: #45f7ba;
		background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzQ1ZjdiYSIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiM3ZGI5ZTgiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
		background: -moz-linear-gradient(top,  #45f7ba 0%, #7db9e8 100%);
		background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#45f7ba), color-stop(100%,#7db9e8));
		background: -webkit-linear-gradient(top,  #45f7ba 0%,#7db9e8 100%);
		background: -o-linear-gradient(top,  #45f7ba 0%,#7db9e8 100%);
		background: -ms-linear-gradient(top,  #45f7ba 0%,#7db9e8 100%);
		background: linear-gradient(to bottom,  #45f7ba 0%,#7db9e8 100%);
		
		height: 100%;
		width: 100%;
		margin: 0px;
		display:table;
	}
	
	div{
		width: 100%;
		height: 100%;
		display:table-cell;
		vertical-align:middle;
		text-align: center;
		
		-webkit-font-smoothing: antialiased;
		font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
		font-weight: 100;
		font-size: 70px;
		
		color: #fff;

	}
	</style>
</head>
<body>
	<div><?php echo $title ?></div>
</body>
</html>
