<?php
	header('Content-Type: text/css');

	if(isset($_COOKIE['theme'])) {
		$theme = $_COOKIE['theme'];
		switch($theme) {
			case 'default':
				$bg_color = "inherit";				
				$font_color = "inherit";
				break;
			case 'dark':
				$bg_color = "#1f1f2e";				
				$font_color = "#f0f0f5";
				break;
			case 'bright':
				$bg_color = "#66ffff";				
				$font_color = "fuchsia";
				break;
			case 'light':
				$bg_color = "#ffcccc";				
				$font_color = "#800000";
				break;
		}	
	}
?>

body {
   background-color: <?=$bg_color?>;   
   color : <?=$font_color?>;
}

input[type=submit] {
	background-color: <?=$font_color?>;	
	color: <?=$bg_color?>;
	text-align: center;	
	display: inline-block;
	text-decoration: none;
}