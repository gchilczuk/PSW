﻿<%@ Page Language="C#" AutoEventWireup="true" CodeFile="Summary.aspx.cs" Inherits="Summary" %>


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
        <a href="Sklep.aspx">Sklep</a>
        <a href="Onas.aspx">O nas</a>
        <a href="Register.aspx">Rejestracja</a>
    </nav>
    <form id="form1" runat="server">
        <div>
          <p><asp:ListBox ID="order" runat="server" Width="270px" Height="100px" ></asp:ListBox>
              <br />
              <asp:Button ID="addOrder" runat="server" Text="Dodaj produkt" OnClick="addItem_Click" />
              <asp:Button ID="clearItem" runat="server" Text="Usuń produkt" OnClick="clearItem_Click" />
              <br />
              <asp:Button ID="clearButton" runat="server" Text="Wyczyść koszyk" OnClick="clearButton_Click" />
          </p>
            <p>Łączna cena produktów:
                <asp:Label ID="productsPriceLabel" runat="server"></asp:Label>         
          </p>            
            <p>
                Forma dostawy
                <br />

                <asp:RadioButtonList ID="receiptRbList" runat="server" AutoPostBack="True">
                </asp:RadioButtonList>

            </p>
            <p>
                Łączna wartość całego zamówienia:
                <asp:Label ID="orderPriceLabel" runat="server"></asp:Label>
            </p>
            <p>
                <asp:Button ID="orderButton" runat="server" Text="Zamawiam!" PostBackUrl="~/Confirmation.aspx" />
            </p>
            <p>
                <asp:HyperLink ID="productListHyperLink" runat="server" NavigateUrl="~/Sklep.aspx">Powrót do listy produktów</asp:HyperLink>
            </p>
          
        </div>
    </form>
    <footer>
        <hr>
        <span>&copy; H&amp;G</span>
    </footer>
</body>
</html>
