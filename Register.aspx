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
                    <asp:TextBox ID="loginTextBox" runat="server" Width="300px"></asp:TextBox>
                </label>
            </p>
            <p>
                <asp:RequiredFieldValidator ID="loginRequiredValidator" runat="server"
                    ControlToValidate="loginTextBox" Display="Dynamic"
                    ErrorMessage="Login nie może być pusty!" ForeColor="Red"></asp:RequiredFieldValidator>
            </p>
            
            <p>
                <label>
                    Hasło:
                    <asp:TextBox ID="passwordTextBox" TextMode="Password" runat="server" Width="300px"></asp:TextBox>
                </label>
            </p>
            <p>
                <asp:RequiredFieldValidator ID="passwordRequiredValidator" runat="server"
                    ControlToValidate="passwordTextBox" Display="Dynamic"
                    ErrorMessage="Hasło nie może być puste!" ForeColor="Red"></asp:RequiredFieldValidator>
            </p>
            <p>
                <label>
                    Powtórz hasło:
                    <asp:TextBox ID="passwordRepeat" TextMode="Password" runat="server" Width="300px"></asp:TextBox>
                </label>
            </p>
            <p>
                
                <asp:CompareValidator ID="passwordRepeatCompareValidator" runat="server" 
                    ControlToValidate="passwordRepeat" Display="Dynamic"
                    ErrorMessage="Wprowadzono inne hasło niż powyżej!" ForeColor="Red" ControlToCompare="passwordTextBox"></asp:CompareValidator>
                
            </p>
            <p>
                <label>
                    Email:
                    <asp:TextBox ID="emailTextBox" runat="server" Width="300px"></asp:TextBox>
                </label>
            </p>
            <p>
                <asp:RequiredFieldValidator ID="emailRequiredValidator" runat="server"
                    ControlToValidate="emailTextBox" Display="Dynamic"
                    ErrorMessage="Email nie może być pusty!" ForeColor="Red"></asp:RequiredFieldValidator>
                <asp:RegularExpressionValidator ID="emailRegularExpressionValidator" 
                   runat="server" ControlToValidate="emailTextBox" Display="Dynamic" 
                   ErrorMessage="Adres email jest niepoprawny" ForeColor="Red" 
                   ValidationExpression="\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*"></asp:RegularExpressionValidator>
            </p>
            <p>
                <label>
                    Imię:
                    <asp:TextBox ID="nameTextBox" runat="server" Width="150px"></asp:TextBox>
                </label>
            </p>
            <p>                
                <label>
                    Nazwisko:
                    <asp:TextBox ID="lastnameTextBox" runat="server" Width="200px"></asp:TextBox>
                </label>
            </p>
            <p>
                <label>
                    Wiek:
                    <asp:TextBox ID="ageTextBox" runat="server" Width="50px" MaxLength="3"></asp:TextBox>
                </label>
            </p>
            <p>
                <asp:RequiredFieldValidator ID="ageRequiredFieldValidator" runat="server" ControlToValidate="ageTextBox" Display="Dynamic" ErrorMessage="Wiek nie może być pusty!" ForeColor="Red"></asp:RequiredFieldValidator>
                <asp:RegularExpressionValidator ID="ageRegularExpressionValidator" runat="server" Display="Dynamic" ErrorMessage="Wiek musi być liczbą!" ControlToValidate="ageTextBox" ForeColor="Red" ValidationExpression="^[0-9]*$"></asp:RegularExpressionValidator>
                <asp:RangeValidator ID="ageRangeValidatorMin" runat="server" ControlToValidate="ageTextBox" Display="Dynamic" ErrorMessage="Podany wiek jest nieprawidłowy!" ForeColor="Red" MaximumValue="150" MinimumValue="16" Type="Integer"></asp:RangeValidator>
            </p>
            
            <p>
                <label>
                    Telefon:
                    <asp:TextBox ID="phoneTextBox" runat="server" Width="200px"></asp:TextBox>
                </label>
            </p>
            <p>
                <asp:RegularExpressionValidator ID="phoneRegularExpressionValidator" runat="server" ControlToValidate="phoneTextBox" Display="Dynamic" ErrorMessage="Podany numer telefonu jest w niepoprawnym formacie!" ForeColor="Red" ValidationExpression="\d{3}-\d{3}-\d{3}"></asp:RegularExpressionValidator>
            </p>

            <p>
                <asp:Button ID="submit" runat="server" Text="Zarejestruj" />
            </p>
            <p>
                <asp:Label ID="outputLabel" runat="server" Visible="False"></asp:Label>
            </p>

        </div>
    </form>
    <footer>
        <hr>
        <span>&copy; H&amp;G</span>
    </footer>
</body>
</html>
