﻿<%@ Page Language="C#" AutoEventWireup="true" CodeFile="Default.aspx.cs" Inherits="_Default" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Serwis kulinarny</title>
    <link rel="stylesheet" type="text/css" href="css/text_styles.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/background.css">
    <link rel="stylesheet" type="text/css" href="css/form_styles.css">
    <link rel="stylesheet" type="text/css" href="css/table_styles.css">
    <link rel="stylesheet" type="text/css" href="css/l4_5-6.css">
    <link rel="stylesheet" type="text/css" href="css/l4_animation.css">
</head>
<body>
    <header>
        <h1 class="tf-title">Serwis kulinarny</h1>
    </header>
    <nav>
        <a href="Default.aspx">Start</a>
        <a href="">Przepisy</a>
        <a href="">Przelicznik</a>
        <a href="Onas.aspx">O nas</a>
        <a href="Register.aspx">Rejestracja</a>
    </nav>
    <form id="form1" runat="server">
        <div>
            <section id="1">
                <div class="multi-background">
                    <h2>Ostatnio dodane przepisy:</h2>
                    <figure>
                        <a href="">
                            <img class="rotated-and-scaled" src="imgs/lasagne.jpg" width="65" height="50"
                                alt="Lasagne1 - miniaturka przepisu"></a>
                        <figcaption>Lasagne bolognese v1</figcaption>
                    </figure>
                    <figure>
                        <a href="">
                            <img class="rotated-and-scaled" src="imgs/lasagne.jpg" width="65" height="50"
                                alt="Lasagne2 - miniaturka przepisu"></a>
                        <figcaption>Lasagne bolognese v2</figcaption>
                    </figure>
                    <figure>
                        <a href="">
                            <img class="rotated-and-scaled" src="imgs/lasagne.jpg" width="65" height="50"
                                alt="Lasagne2 - miniaturka przepisu"></a>
                        <figcaption>Lasagne bolognese v3</figcaption>
                    </figure>
                </div>
            </section>
        </div>
    </form>
    <footer>
        <hr>
        <span>&copy; H&amp;G</span>
    </footer>
</body>
</html>
