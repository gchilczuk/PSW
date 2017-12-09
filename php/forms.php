<!DOCTYPE html>
<html>
<head>
	<title>Walidacja</title>
	<meta charset="utf-8">
	<style type="text/css">
		body {
			background-color: #404d43;
		}		
		.error {
			color: white;
			font-size: xx-large;
			text-align: center;
		}
		img.icon {
			width: 20%;
			height: 20%;
			display: block;
    		margin: 0 auto;
		}
	</style>
</head>
<body>
	<?php 
		if(!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{3}$/", $_POST["tel"])) {			
			print('<img src="error_icon.png" alt="ikonka_bledu" class="icon">
				<p class = "error">Podany numer telefonu jest w niewłaściwym formacie.</p>');
			die("</body></html>");			
		}
	?>

	

</body>
</html>