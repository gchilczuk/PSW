<?php
session_start();

if (!isset($_SESSION['user'])){
    $_SESSION['back_to'] = 'converter.php';
    header('location:php/login.php');
}

?>
<!DOCTYPE html>

<html>

	<head>
		<meta charset = "utf-8">
		<title>Serwis kulinarny</title>
		<meta name = "keywords" content = "kitchen, cooking, converter, volume, weight">
		<meta name = "description" content = "Przelicznik objętości na wagę. Converter from volume to weight.">

		<link rel="stylesheet" type="text/css" href="css/text_styles.css">
		<link rel="stylesheet" type="text/css" href="css/styles.css">
		<!-- <link rel="stylesheet" type="text/css" href="css/background.css"> -->
		<link rel="stylesheet" type="text/css" href="css/form_styles.css">
		<link rel="stylesheet" type="text/css" href="css/tables.css">
		<link rel="stylesheet" type="text/css" href="css/l4_animation.css">

    </head>

	<body>

		<header>
			<h1 class="tf-title">Serwis kulinarny</h1>
		</header>

        <div align="right" style="padding-right: 15px; font-size: small; font-family: cursive, courier, sans-serif;">
        Zalogowany jako: <?php print($_SESSION['user']) ?>
            <a style="color: black; font-weight: normal"
               href="php/logout_process.php" ><u>wyloguj</u></a>
        </div>
		<nav>
			<a href="index.php">Start</a>
			<a href="recipes.php">Przepisy</a>
			<a href="converter.php">Przelicznik</a>
			<a href="settings.php">Ustawienia</a>
			<a href="contact.html">Kontakt</a>
			<a href="register.html">Rejestracja</a>

        </nav>


		<section id="1">
			<h2 class="subtitle">Przelicznik produktów</h2>
			<img id="calc" src="imgs/calculator-icon.png" width="32" height="32">
			<figure>
				<table class="center">
				<caption><strong>Przelicznik miar</strong></caption>

				<thead>
					<tr>
						<th>Produkt</th>

						<th>Szklanka</th>
						<th>Łyżka stołowa</th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<th>Mąka</th>
						<td>
							<table class="nested n1">
								<tr>
									<th>nazwa</th>
									<th>typ</th>
									<th>wartość</th>
								</tr>
								<tr>
									<td>krupczatka</td>
									<td>500</td>
									<td>150 g</td>
								</tr>
								<tr>
									<td>pszenna</td>
									<td>550</td>
									<td>105 g</td>
								</tr>
								<tr>
									<td>żytnia</td>
									<td>720</td>
									<td>270 g</td>
								</tr>
								<tr>
									<td>orkiszowa</td>
									<td>2000</td>
									<td>200 g</td>
								</tr>
							</table>
						</td>
						<td>
							<table class="nested n2">
								<tr>
									<th>nazwa</th>
									<th>typ</th>
									<th>wartość</th>
								</tr>
								<tr>
									<td>krupczatka</td>
									<td>500</td>
									<td>150 g</td>
								</tr>
								<tr>
									<td>pszenna</td>
									<td>550</td>
									<td>105 g</td>
								</tr>
								<tr>
									<td>żytnia</td>
									<td>720</td>
									<td>270 g</td>
								</tr>
								<tr>
									<td>orkiszowa</td>
									<td>2000</td>
									<td>200 g</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<th>Skrobia ziemniaczana</th>
						<td>180 g</td>
						<td>12 g</td>
					</tr>
					<tr>
						<th>Cukier</th>
						<td>
							<table class="nested n3">
								<tr>
									<th>rodzaj</th>
									<th>wartość</th>
								</tr>
								<tr>
									<td>biały</td>
									<td>210 g</td>
								</tr>
								<tr>
									<td>trzcinowy</td>
									<td>210 g</td>
								</tr>
								<tr>
									<td>puder</td>
									<td>160 g</td>
								</tr>
							</table>
						</td>
						<td>
							<table class="nested n4">
								<tr>
									<th>rodzaj</th>
									<th>wartość</th>
								</tr>
								<tr>
									<td>biały</td>
									<td>10 g</td>
								</tr>
								<tr>
									<td>trzcinowy</td>
									<td>10 g</td>
								</tr>
								<tr>
									<td>puder</td>
									<td>9 g</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<th>Masło</th>
						<td>240 g</td>
						<td>20 g</td>
					</tr>
					<tr>
						<th>Płatki owsiane</th>
						<td>130 g</td>
						<td>8 g</td>
					</tr>
				</tbody>

				</table>
			</figure>
		</section>

		<footer>
			<hr>
			<span>&copy; H&amp;G</span>
		</footer>		
	</body>

</html>