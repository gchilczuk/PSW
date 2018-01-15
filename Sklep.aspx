<%@ Page Language="C#" AutoEventWireup="true" CodeFile="Sklep.aspx.cs" Inherits="Sklep" %>

<!DOCTYPE html>
<script runat="server">

    protected void category_list_SelectedIndexChanged(object sender, EventArgs e)
    {

    }
</script>


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
            <section id="1">
            <asp:RadioButtonList ID="category_list" runat="server"  AutoPostBack="True"> </asp:RadioButtonList>
      
            <p>Liczba produktów w koszyku: <asp:Label ID="number_of_products" runat="server"></asp:Label></p>
            
            <p>
                <asp:CheckBoxList ID="fruits_list" runat="server" ></asp:CheckBoxList>    
            </p>

            <p>
                <asp:CheckBoxList ID="wegetables_list" runat="server" ></asp:CheckBoxList>
            </p>

            <p>
                <asp:CheckBoxList ID="others_list" runat="server" ></asp:CheckBoxList>
            </p>


            <p><asp:Button ID="buy_button" Text="Dodaj zaznaczone do koszyka" runat="server" OnClick="Buy_button_Click" /></p>

            
            <p><asp:HyperLink ID="link" runat="server" Text="Przejdź do podsumowania" NavigateUrl="Summary.aspx"></asp:HyperLink></p>

            <p><asp:Button ID="clear" Text="Wyczyść koszyk" runat="server" OnClick="clear_Click" AutoPostBack = "true" /></p>

            </section>
        </div>
    </form>
    <footer>
        <hr>
        <span>&copy; H&amp;G</span>
    </footer>
</body>
</html>
