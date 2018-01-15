<%@ Page Language="C#" AutoEventWireup="true" CodeFile="Confirmation.aspx.cs" Inherits="Confirmation" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Potwierdzenie zamówienia</title>
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
        <a href="Sklep.aspx">Sklep</a>
        <a href="Onas.aspx">O nas</a>
        <a href="Register.aspx">Rejestracja</a>
    </nav>
    <form id="form1" runat="server">
        <div>   
            <p>
                Dziękujemy za złożenie zamówienia w naszym sklepie!
                <br />
                Opłata za nie wyniosła 
                <asp:Label ID="orderPriceLabel" runat="server"></asp:Label>
                złotych.</p>
            <p>
                <asp:HyperLink ID="productListHyperLink" runat="server" NavigateUrl="~/Sklep.aspx">Powrót do listy produktów</asp:HyperLink>
&nbsp;</p>       
            
        </div>
    </form>
    <footer>
        <hr>
        <span>&copy; H&amp;G</span>
    </footer>
</body>
</html>
