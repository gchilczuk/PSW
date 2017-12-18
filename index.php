<?php
session_start();
?>
<!DOCTYPE html>

<html>
	<head>
		<meta charset = "utf-8">
		<title>Serwis kulinarny</title>
		<meta name = "keywords" content = "kitchen, cooking, recipe, main, page, 
			kuchnia, gotowanie, przepis, strona, glowna">
		<meta name = "description" content = "Main page of serwis. Strona główna serwisu.">

		<link rel="stylesheet" type="text/css" href="css/text_styles.css">
		<link rel="stylesheet" type="text/css" href="css/styles.css">
		<link rel="stylesheet" type="text/css" href="css/background.css">
		<link rel="stylesheet" type="text/css" href="css/form_styles.css">
		<link rel="stylesheet" type="text/css" href="css/table_styles.css">
		<link rel="stylesheet" type="text/css" href="css/l4_5-6.css">
		<link rel="stylesheet" type="text/css" href="css/l4_animation.css">		
		<link rel="stylesheet" type="text/css" href="styles.php" />

		<!-- <script src="js/dom4_events_coords.js"></script> -->
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
			<a href="register.html">Rejestracja</a>
		</nav>

		<section id="1">			
			<div class="multi-background">				
				<h2>Ostatnio dodane przepisy:</h2>
				<figure>
					<a href="recipe1.html"><img class="rotated-and-scaled" src="imgs/lasagne.jpg" width = "65" height = "50" 
						alt = "Lasagne1 - miniaturka przepisu"></a>
					<figcaption>Lasagne bolognese v1</figcaption>
				</figure>
				<figure>
					<a href="recipe2.html"><img class="rotated-and-scaled" src="imgs/lasagne.jpg" width = "65" height = "50" 
						alt = "Lasagne2 - miniaturka przepisu"></a>
					<figcaption>Lasagne bolognese v2</figcaption>
				</figure>
				<figure>
					<a href="recipe3.html"><img class="rotated-and-scaled" src="imgs/lasagne.jpg" width = "65" height = "50" 
						alt = "Lasagne2 - miniaturka przepisu"></a>
					<figcaption>Lasagne bolognese v3</figcaption>
				</figure>	
			</div>				
		</section>		

		<div id="coords"></div>
		<footer>
			<hr>
			<span>&copy; H&amp;G</span>
		</footer>		
	</body>
</html>