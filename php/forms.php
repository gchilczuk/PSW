<!DOCTYPE html>
<html>
<head>
	<title>Walidacja</title>
	<meta charset="utf-8">
	<style type="text/css">
		body {
			background-color: #404d43;
		}		
		.registerText {
			color: white;
			font-size: xx-large;
			text-align: center;
		}
		.detailsText {
			color: white;
			font-size: x-large;
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
			print('<img src="php_imgs/error_icon.png" alt="ikonka_bledu" class="icon">
				<p class = "registerText">Podany numer telefonu jest w niewłaściwym formacie!</p>');
			die("</body></html>");			
		}
	?>

	<?php		
		$name = $_POST["first_name"];
		print("<img src=\"php_imgs/ok_icon.png\" alt=\"ikonka_ok\" class=\"icon\">
				<p class = \"registerText\">Witaj $name, zostałeś zarejestrowany pomyślnie!</p>");	
		$ip = $_SERVER['REMOTE_ADDR'] ;
        $method = $_SERVER['REQUEST_METHOD'] ;
        print('<p class="detailsText">Twoje żądanie zostało wysłane do nas za pomocą metody '.$method.' z adresu ip o numerze '.$ip.'</p>');
    ?>

    <?php
        print("<p class=\"detailsText\">Podczas rejestracji podałeś nam następujące dane:</br>");
        for( reset($_POST); $element = key($_POST); next($_POST)){ 
        	if(strcmp($_POST[$element], "") != 0) {
        		print("$element : $_POST[$element]</br>");
        	}            
        } 	        
        print("</br>Nie przejmuj się jeżeli pomyliłeś się podczas rejestracji. Zawsze możesz zmienić część swoich danych w ustawieniach konta!</p>");	
        die("</body></html>");
	?>

</body>
</html>