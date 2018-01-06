<%@ Page Language="C#" AutoEventWireup="true" CodeFile="Onas.aspx.cs" Inherits="Onas" %>

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
        <a href="">Rejestracja</a>
    </nav>
    <form id="form1" runat="server">
        <div>
            <section id="1">
                <h2>O co tyle hałasu?</h2>
                Nasz wyjątkowy serwis kulinarny powstał aby każdy kucharz miał swoje miejsce w Internecie!
                <br />
                <small>(i żebyśmy zaliczyli PSW)</small>
            </section>
            <section id="2">
                <h2>Kontakt</h2>
                <p>Masz jakieś pytanie? A może chciałbyś podzielić się swoim przepisem? Skontaktuj się z nami!</p>
                <p>Grzegorz Chilczuk: <a href="mailto:grzegorz.chilczuk@student.pwr.edu.pl">grzegorz.chilczuk@student.pwr.edu.pl</a></p>
                <p>Hubert Kościelski: <a href="mailto:huberto1010@op.pl">huberto1010@op.pl</a></p>
            </section>
        </div>
    </form>
    <footer>
        <hr>
        <span>&copy; H&amp;G</span>
    </footer>
    <figure class="abs_img">
        <a href="https://pl-pl.facebook.com/">
            <img src="imgs/FB-Icon.png" width="25" height="25"
                alt="Znajdź nas na Facebooku"></a>
    </figure>
</body>
</html>
