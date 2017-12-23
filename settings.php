<?php
session_start();
?>
<!DOCTYPE html>

<html>
	<head>
		<meta charset = "utf-8">
		<title>Ustawienia strony</title>
		<meta name = "keywords" content = "kitchen, cooking, settings, 
			kuchnia, gotowanie, ustawienia">
		<meta name = "description" content = "User design preferences. Dostosuj ustawienia wizualne strony według własnych preferencji.">

		<link rel="stylesheet" type="text/css" href="css/text_styles.css">
		<link rel="stylesheet" type="text/css" href="css/styles.css">
		<link rel="stylesheet" type="text/css" href="css/background.css">
		<link rel="stylesheet" type="text/css" href="css/form_styles.css">
		<link rel="stylesheet" type="text/css" href="css/table_styles.css">
		<link rel="stylesheet" type="text/css" href="css/l4_5-6.css">
		<link rel="stylesheet" type="text/css" href="css/l4_animation.css">		
		<link rel="stylesheet" type="text/css" href="styles.php" />
		
	</head>

	<body>
		
		<header>
			<h1 class="tf-title">Serwis kulinarny</h1>
		</header>
		<?php
        if (isset($_SESSION['user'])){
            print (
                    '<div align="right" style="padding-right: 15px; font-size: small; font-family: cursive, courier, sans-serif;">
		Zalogowany jako: '
		.$_SESSION['user'].
		'<a style="color: black; font-weight: normal" href="php/logout_process.php" ><u>wyloguj</u></a> </div>'
		);
		}
		?>
		
		<nav>
			<a href="index.php">Start</a>
			<a href="recipes.php">Przepisy</a>
			<a href="converter.php">Przelicznik</a>
			<a href="settings.php">Ustawienia</a>
			<a href="contact.html">Kontakt</a>
			<a href="register.php">Rejestracja</a>
		</nav>

		<section id="1">		
			<form method="post" action="settings_confirmed.php">
				<p><label>Ustaw motyw strony							
					<select name="theme">	
						<option selected value="default">Domyślny</option>						
						<option value="dark">Ciemny</option>
						<option value="bright">Jaskrawy</option>
						<option value="light">Jasny</option>
					</select>
				</label></p>
				<p><input type="submit" value="Wybierz"></p>
			</form>							
		</section>			
	</body>
</html>