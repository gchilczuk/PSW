<%@ Page Language="C#" AutoEventWireup="true" CodeFile="Register.aspx.cs" Inherits="Register" %>

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
        <a href="">Rejestracja</a>
    </nav>
    <form id="regform" runat="server">
        <div>
            <p>
                <label>
                    Login:
                    <asp:TextBox ID="login" runat="server" Width="300px"></asp:TextBox>
                </label>
            </p>
            <p>
                <asp:RequiredFieldValidator ID="loginRequiredValidator" runat="server"
                    ControlToValidate="login" Display="Dynamic"
                    ErrorMessage="Login nie może być pusty!" ForeColor="Red"></asp:RequiredFieldValidator>
            </p>
            
            <p>
                <label>
                    Hasło:
                    <asp:TextBox ID="password" TextMode="Password" runat="server" Width="300px"></asp:TextBox>
                </label>
            </p>
            <p>
                <asp:RequiredFieldValidator ID="passwordRequiredValidator" runat="server"
                    ControlToValidate="password" Display="Dynamic"
                    ErrorMessage="Hasło nie może być puste!" ForeColor="Red"></asp:RequiredFieldValidator>
            </p>
            <p>
                <label>
                    Email:
                    <asp:TextBox ID="email" runat="server" Width="300px"></asp:TextBox>
                </label>
            </p>
            <p>
                <asp:RequiredFieldValidator ID="emailRequiredValidator" runat="server"
                    ControlToValidate="email" Display="Dynamic"
                    ErrorMessage="Email nie może być pusty!" ForeColor="Red"></asp:RequiredFieldValidator>
                <asp:RegularExpressionValidator ID="emailRegularExpressionValidator" 
                   runat="server" ControlToValidate="email" Display="Dynamic" 
                   ErrorMessage="Adres email jest niepoprawny" ForeColor="Red" 
                   ValidationExpression="\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*"></asp:RegularExpressionValidator>
            </p>
            <p>
                <label>
                    Imię i nazwisko:
                    <asp:TextBox ID="name" runat="server" Width="300px"></asp:TextBox>
                </label>
            </p>
            <p>
                <label>
                    Tel:
                    <asp:TextBox ID="phone" runat="server" Width="300px"></asp:TextBox>
                </label>
            </p>

            <p>
                <asp:Button ID="submit" runat="server" Text="Zarejestruj" />
            </p>

        </div>
    </form>
    <footer>
        <hr>
        <span>&copy; H&amp;G</span>
    </footer>
</body>
</html>
