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
    define("MIN_AGE", 13);
    $antyspam = $_POST["antyspam"];
    settype($antyspam, "int");

    $result = false;

		if($_POST["tel"] != "" && !preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{3}$/", $_POST["tel"])) {

			$result = 'Podany numer telefonu jest w niewłaściwym formacie!';

		} elseif ($antyspam != 4){
		    $result = 'Niepoprawna odpowiedź na filtr antyspamowy!';

        } elseif ($_POST["byear"] != "" && (int) date("Y") - (int) $_POST["byear"] < MIN_AGE){
		    $result = 'Musisz mieć conajmniej 13 lat aby moć zarejestrować sie w serwisie.';
        }

        if (!$result){
		    print ('<img src="php_imgs/ok_icon.png" alt="ikonka_ok" class="icon">');
        }
        else{
		    print('<img src="php_imgs/error_icon.png" alt="ikonka_bledu" class="icon">
				<p class = "registerText">'.$result.'</p>');
            die("</body></html>");
        }

	?>

	<?php		
		$name = $_POST["first_name"];
		print("<p class = \"registerText\">Witaj $name, zostałeś zarejestrowany pomyślnie!</p>");
		$ip = $_SERVER['REMOTE_ADDR'] ;
        $method = $_SERVER['REQUEST_METHOD'] ;
        print('<p class="detailsText">Twoje żądanie zostało wysłane do nas za pomocą metody '.$method.' z adresu ip o numerze '.$ip.'</p>');
    ?>

    <?php    	
    	foreach ($_POST as $key => $val) {
    		$input_names[] = $key;
    	}
    	
    	$aliases_names = array("Imię", "Nazwisko", "Dzień", "Miesiąc", "Rok", "Email", "Telefon");

    	for($i = 0; $i < count($input_names) - 1; ++$i) {
    		$aliases[$input_names[$i]] = $aliases_names[$i]; 
    	}   	
    	
        print("<p class=\"detailsText\">Podczas rejestracji podałeś nam następujące dane:</br>");
        for( reset($_POST); $element = key($_POST); next($_POST)){ 
        	if(strcmp($_POST[$element], "") != 0 && $element != "antyspam" && $element != "email") {
        		print("$aliases[$element] : $_POST[$element]</br>");
        	} elseif ($element == "email") {
        	    print ("$aliases[$element] : ". preg_replace("/@/", " (at) ", $_POST[$element])."</br>");
            }
        } 	        
        print("</br>Nie przejmuj się jeżeli pomyliłeś się podczas rejestracji. Zawsze możesz zmienić część swoich danych w ustawieniach konta!</p>");	
        die("</body></html>");
	?>





</body>
</html>