using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class Register : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        if (IsPostBack)
        {
            Validate();
            if(IsValid)
            {
                string login = loginTextBox.Text;
                string password = passwordTextBox.Text;                
                string email = emailTextBox.Text;
                string name = nameTextBox.Text;
                string lastname = lastnameTextBox.Text;
                string age = ageTextBox.Text;
                string phone = phoneTextBox.Text;

                outputLabel.Text = "Dziękujemy za rejestrację!<br/>Oto Twoje dane:<br/><br/>";
                outputLabel.Text += String.Format("Login: {0}{1}Hasło: {2}{1}E-mail: {3}{1}Imię: {4}{1}Nazwisko: {5}{1}Wiek: {6}{1}Telefon: {7}{1}",
                    login, "<br/>", password, email, name, lastname, age, phone);
                outputLabel.Visible = true;
            }
        }

    }
}