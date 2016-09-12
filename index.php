<?php
	$zip = $_SERVER['REQUEST_URI'];
	
	$zip = substr($zip,1);
	
	$xml = simplexml_load_file('http://www.google.com/ig/api?weather='.$zip) or die("Can't load file.");
	
	$temp = $xml->weather->current_conditions->temp_f->attributes()->data;

	switch ($temp) {
		case $temp > 100:
			$word = "hot enough to melt you";
			$color = "#FF0000";
		case $temp > 75:
			$word = "hot";
			$color = "#FF7B1A";
		break;
		case $temp > 60:
			$word = "warm";
			$color = "#FFFF00";
		break;  
		case $temp > 40:
			$word = "balmy";
			$color = "#BBBBBB";
		break;
		case $temp > 32:
			$word = "cold";
			$color = "#CEE7F2";
		break;
		case $temp > -10:
			$word = "freezing";
			$color = "#00CCFF";
		break;
		case $temp > -100:
			$word = "so cold it doesn't even matter anymore";
			$color = "#0000FF";
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>It's ________ outside.</title>
	<style type="text/css">
		#main_text {
			font-size: 100pt;
			font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
			text-align: center;
		}
		#conditions {
			display:inline-block;
			color: <?=$color?>;
			font-weight: bold;
			border-bottom: 12px solid #000;
			padding: 0 12px;
			height: 140px;
			letter-spacing: -5px;
		}
	</style>
</head>
<body>
	<div id="main_text">It's <div id="conditions"><?=$word?></div> outside.</div>
</body>
</html>