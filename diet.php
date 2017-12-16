<?php
session_start();

if (!isset($_SESSION['user'])){
    $_SESSION['back_to'] = 'diet.php';
    header('location:php/login.php');
}

?>

<!DOCTYPE html>

<html>
<head>
    <meta charset = "utf-8">
    <title>Kontakt</title>
    <meta name = "keywords" content = "kitchen, cooking, recipe, diet, diets,
			kuchnia, gotowanie, przepis, dieta, diety">
    <meta name = "description" content = "Diet. Dieta.">
    <link rel="stylesheet" type="text/css" href="css/text_styles.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/background.css">
    <link rel="stylesheet" type="text/css" href="css/form_styles.css">
    <link rel="stylesheet" type="text/css" href="css/table_styles.css">
    <!--<link rel="stylesheet" type="text/css" href="css/l4_5-6.css">-->
    <link rel="stylesheet" type="text/css" href="css/l4_animation.css">
    <link rel="stylesheet" type="text/css" href="styles.php" />


    <script src="js/dom23.js"></script>
    <style type="text/css">
        @font-face {
            font-family: 'Inconsolata';
            font-style: normal;
            font-weight: 400;
            src: local('Inconsolata Regular'), local('Inconsolata-Regular'), url(https://fonts.gstatic.com/s/inconsolata/v16/BjAYBlHtW3CJxDcjzrnZCCYE0-AqJ3nfInTTiDXDjU4.woff2) format('woff2');
            unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
        }
        /* latin */
        @font-face {
            font-family: 'Inconsolata';
            font-style: normal;
            font-weight: 400;
            src: local('Inconsolata Regular'), local('Inconsolata-Regular'), url(https://fonts.gstatic.com/s/inconsolata/v16/BjAYBlHtW3CJxDcjzrnZCI4P5ICox8Kq3LLUNMylGO4.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;
        }

        /* latin-ext */
        @font-face {
            font-family: 'Lobster';
            font-style: normal;
            font-weight: 400;
            src: local('Lobster Regular'), local('Lobster-Regular'), url(https://fonts.gstatic.com/s/lobster/v20/9NqNYV_LP7zlAF8jHr7f1vY6323mHUZFJMgTvxaG2iE.woff2) format('woff2');
            unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
        }
        /* latin */
        @font-face {
            font-family: 'Lobster';
            font-style: normal;
            font-weight: 400;
            src: local('Lobster Regular'), local('Lobster-Regular'), url(https://fonts.gstatic.com/s/lobster/v20/cycBf3mfbGkh66G5NhszPQ.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;
        }

        /* latin-ext */
        @font-face {
            font-family: 'Anton';
            font-style: normal;
            font-weight: 400;
            src: local('Anton Regular'), local('Anton-Regular'), url(https://fonts.gstatic.com/s/anton/v9/KgPSGrLwjoSLN4ZBWvXSfQ.woff2) format('woff2');
            unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
        }
        /* latin */
        @font-face {
            font-family: 'Anton';
            font-style: normal;
            font-weight: 400;
            src: local('Anton Regular'), local('Anton-Regular'), url(https://fonts.gstatic.com/s/anton/v9/o-91-t7-bPc7W26HmS2N4Q.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;
        }

        h3, p, img{
            padding: 0 4em 0 1em
        }
    </style>
</head>

<body id="center-radial-gradient">
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
    <a href="settings.html">Ustawienia</a>
    <a href="contact.html">Kontakt</a>
    <a href="register.html">Rejestracja</a>
</nav>



<section id="spis">

</section>

<form>
    <input type="submit" id="switchImageButton" value="Ukryj obrazki">
</form>

<section>
    <div>
        <br><img width="10%" height="10%" src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c5/Foods.jpg/800px-Foods.jpg">
        <h3><a name="wegetarianizm" id="wegetarianizm">Wegetarianizm</a></h3>
        <p>
            Jest to dieta pozbawiona mięsa, w tym ryb i owoców morza oraz
            innych produktów pochodzenia zwierzęcego, w szczególności pochodzących z uboju, takich jak smalec lub żelatyna
            <br> <a name="wegeta" href="https://pl.wikipedia.org/wiki/Wegetarianizm">więcej</a>
        </p>
    </div>
    <div>
        <br><img width="10%" height="10%" src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/60/Vegan_patties_with_potatoes_and_salad.jpg/220px-Vegan_patties_with_potatoes_and_salad.jpg">
        <h3><a name="weganizm" id="weganizm">Weganizm</a></h3>
        <p>
            Jest to dieta, podobnie jak wegetariańska, pozbawiona mięsa Dodatkowo pozbawiona również produktów,
            których wytwarzanie wiąże się z eksploatacją zwierząt, takich jak: nabiał (w tym jajka) oraz (zazwyczaj) miód
            <br> <a name="wege" href="https://pl.wikipedia.org/wiki/Weganizm">więcej</a>
        </p>
    </div>
    <div>
        <br><img width="10%" height="10%" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/54/Flickr_-_cyclonebill_-_Gr%C3%A6sk_salat.jpg/220px-Flickr_-_cyclonebill_-_Gr%C3%A6sk_salat.jpg">
        <h3><a name="srodziemnomorska" id="srodziemnomorska">Dieta śródziemnomorska</a></h3>
        <p>
            Do typowych składników diety śródziemnomorskiej należą ryby i owoce morza, różne rodzaje warzyw i owoców, oliwa z oliwek wykorzystywana zarówno do smażenia. Mięso gra rolę drugoplanową, zazwyczaj jest grillowane. Podstawowym napojem towarzyszącym posiłkom jest wino.
            <br> <a name="srod" href="https://pl.wikipedia.org/wiki/Kuchnia_%C5%9Br%C3%B3dziemnomorska">więcej</a>
        </p>
    </div>
    <div>
        <br><img width="10%" height="10%" src="https://images.duckduckgo.com/iu/?u=http%3A%2F%2Ftylkodukan.pl%2Fimg%2Fdieta-dukana-banner.jpg&f=1">
        <h3><a name="protein" id="protein">Dieta proteinowa</a></h3>
        <p>
            Jest to dieta odchudzająca, której główną zasadą jest zwiększenie spożycia białek podczas jednoczesnego ograniczenia spożywania węglowodanów i tłuszczów.
            <br> <a name="prot" href="https://pl.wikipedia.org/wiki/Dieta_proteinowa">więcej</a>
        </p>
    </div>
</section>
<div id="source"></div>
<div>
    <h3>Dostosuj stronę do własnych wymagań</h3>
    <form id="colors">
        <p>
            <label> Wybierz kolor tła strony
                <input type="color" id="background_color">
            </label>
        </p>
        <p>
            <label> Wybierz kolor tekstu
                <select id="text_color">
                <option>czarny</option>
                <option>biały</option>
                <option>czerwony</option>
                <option>zielony</option>
                <option>niebieski</option>
                </select>
            </label>
        </p>
        <p></p>

    </form>
    <form id="fonts">
        <p>
            <label> Wybierz font
                <select id="font_type">
                <option>Helvetica</option>
                <option>Lobster</option>
                <option>Inconsolata</option>
                <option>Anton</option>
                </select>
            </label>
        </p>
        <p></p>

    </form>
    <form>
        <input type="submit" id="changeViewButton" value="zastosuj zmiany">
    </form>

</div>

<footer>
    <hr>
    <span>&copy; H&amp;G</span>

</footer>
</body>
</html>