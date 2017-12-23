<?php
session_start();
?>
<!DOCTYPE html>

<html>
	<head>
		<meta charset = "utf-8">
		<title>Przepisy</title>
		<meta name = "keywords" content = "kitchen, cooking, recipes, kuchnia, gotowanie, przepisy">
		<meta name = "description" content = "Lista przepisów. Recipes list.">

		<link rel="stylesheet" type="text/css" href="css/text_styles.css">
		<link rel="stylesheet" type="text/css" href="css/styles.css">
		<link rel="stylesheet" type="text/css" href="css/background.css">
		<link rel="stylesheet" type="text/css" href="css/form_styles.css">
		<link rel="stylesheet" type="text/css" href="css/table_styles.css">
		<link rel="stylesheet" type="text/css" href="css/l4_5-6.css">
		<link rel="stylesheet" type="text/css" href="css/l4_animation.css">

		<script type="text/javascript">
            "use strict";
			function printRecipes() {
				var recent = document.getElementById("recentRecipes");
				var recipes = recent.getElementsByTagName("li");
				var i = 0;
				var output = "";
				while(i < recipes.length) {
					output += recipes[i].innerHTML + "<br>";
					i+=1;
				}
				document.writeln(output);
			}
            function init(){
                document.getElementById("printButton").addEventListener("click", printRecipes);
            }

            window.addEventListener("load", init);


		</script>
	</head>

	<body id="center-radial-gradient">
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

		<form action="add_recipe.html">
			<input type="submit" name="add_button" value="Zaproponuj swój przepis!">
		</form>				

		<section id="1">
			<h2>Przepisy</h2>
			<div id="cover">			
				<<img class="top" src="imgs/lasagne.jpg" width = "195" height = "150" 
						alt = "Lasagne - propozycja podania">
				<img class="bottom" src="imgs/lasagne2.jpg" width = "195" height = "150" 
						alt = "Lasagne - propozycja podania">

				<div id="cover2">
					<ul id="recentRecipes">
						<li><a href="recipe1.html">Lasagne bolognese v1</a></li>
						<li><a href="recipe2.html">Lasagne bolognese v2</a></li>
						<li><a href="recipe3.html">Lasagne bolognese v3</a></li>
					</ul>

					<p><a href="ftp://sunsite.icm.edu.pl/pub/music/demos/music/compos/chill11/ch11_rul.txt" download>ftp example</a></p>
					<p><input id="printButton" type="submit" value="Pokaż ostatnie przepisy"></p>
                    <a href="diet.php">Znajdź dietę jaka Ci odpowiada!</a>

                </div>

			</div>

		</section>

	</body>
</html>