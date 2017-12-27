<?php
session_start();
?>

<!DOCTYPE html>

<html>

	<head>
		<meta charset = "utf-8">
		<title>Rejestracja</title>
		
		<link rel="stylesheet" type="text/css" href="css/text_styles.css">
		<link rel="stylesheet" type="text/css" href="css/styles.css">
		<link rel="stylesheet" type="text/css" href="css/background.css">
		<link rel="stylesheet" type="text/css" href="css/form_styles.css">
		<link rel="stylesheet" type="text/css" href="css/table_styles.css">
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
			<h2>Rejestracja</h2> 
			<p>
			<form autocomplete="on" method="post" action="php/register.php">
				<p>
					<label> Login
						<input type="text" name="login" size="32" maxlength="32"
						<?php if (isset($_SESSION['user'])) { print('disabled');} ?> autofocus required/>
					</label>
				</p>
				<p>
					<label> Hasło
						<input type="password" name="password" size="32"  required/>
					</label> (min 8 znaków)
				</p>
				<p>
					<label> Imię
						<input type="text" name="firstName" size="32" maxlength="32" />
					</label>
				</p>
				<p>
					<label> Nazwisko
						<input type="text" name="lastName" size="32" maxlength="64">
					</label>
				</p>
				

				<p>
					<label>E-mail
						<input type="email" name="email" size="32" maxlength="255" required>
					</label>
				</p>
				<p>
					<label>Numer telefonu
						<input type="tel" name="phone" size="32" >
					</label>
				</p>
				<p>
                    <br>Filtr antyspamowy
                    <label>Podaj wyni: 2+2=
                        <input type="text" name="antyspam" required>
                    </label>
                </p>
				<p>
					<input id="submitButton" name="submit" type="submit" value="Wyślij" >
				</p>

			</form>
		</section>
		
		<footer>
			<hr>
			<span>&copy; H&amp;G </span>
		</footer>		
	</body>



</html>