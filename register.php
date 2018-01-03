<?php
include "php/db_const.php";
session_start();


$fields = array('login', 'password', 'firstName', 'lastName', 'email', 'phone');
$newuser = !isset($_SESSION['user']);
$iserror = false;
$formerrors = array("loginerror" => false, "passworderror" => false, "emailerror" => false, "phoneerror" => false);
$issubmited = isset($_POST["submit"]);
$formlabels = array(
    'login' => 'Login',
    'password' => 'Hasło',
    'firstName' => 'Imię',
    'lastName' => 'Nazwisko',
    'email' => 'E-mail',
    'phone' => 'telefon'
);
$formattributes = array(
    'login' => "type='text' maxlength='32' required autofocus",
    'password' => "type='password'" . ($newuser ? "required" : ''),
    'firstName' => "type='text' maxlength='32'",
    'lastName' => "type='text' maxlength='64'",
    'email' => "type='email' maxlength='255' required",
    'phone' => "type='tel' maxlength='9'"
);
?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
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
if (isset($_SESSION['user'])) {
    print (
        '<div align="right" style="padding-right: 15px; font-size: small; font-family: cursive, courier, sans-serif;">
                        Zalogowany jako: '
        . $_SESSION['user'] .
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
    <?php
    if ($issubmited) {
        // get data
        $login = isset($_POST['login']) ? $_POST['login'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
        $lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';

        // check if correct
        // check login
        if (!($database = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME))) {
            die("Connection failed: " . mysqli_error($database));
        }
        $query = 'SELECT login FROM users';
        if (!($result = mysqli_query($database, $query))) {
            die("Query execution failed: " . mysqli_error($database));
        }

        $row = mysqli_fetch_row($result);
        while ($row != null && !$iserror) {
            if ($row[0] == $login) {
                $formerrors["loginerror"] = true;
                $iserror = true;
            }
            $row = mysqli_fetch_row($result);
        }
        mysqli_close($database);

        // check password
        if (!preg_match("/^(?=.{8})(?=.*[A-Z])(?=.*[a-z])(?=.*\d)/", $password)) {
            if ($newuser || $password != '') {
                $formerrors["passworderror"] = true;
                $iserror = true;
            }
        }

        // check email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $formerrors["emailerror"] = true;
            $iserror = true;
        }

        // check phone
        if ($phone != '' && !preg_match("/^[0-9]{9}$/", $phone)) {
            $formerrors["phoneerror"] = true;
            $iserror = true;
        }

        if (!$iserror) {  // if correct
            if ($password != '') {
                $password = hash('sha256', $password);
            }

            if (!$newuser) {
                $set_attributes = array();
                foreach ($fields as $field) {
                    if ($field != 'login' && $$field != '') {
                        $set_attributes[] = $field;
                    }
                }
                $query = "UPDATE users SET ";
                $to_update = array();
                foreach ($set_attributes as $element) {
                    $to_update[] = "$element = '" .$$element . "'";
                }

                $query .= join(', ', $to_update) . " WHERE login = '" . $_SESSION['user'] ."';";

                $message = "Dane zostały zmienione pomyślnie";
            } else {  // new user
                $insert_names = array();
                $insert_values = array();
                foreach ($fields as $field) {
                    if ($$field != '') {
                        $insert_names[] = $field;
                        $insert_values[] = $$field;
                    }
                }
                $query = "INSERT INTO users (" . join(', ', $insert_names) .
                    ") VALUES ('" . join("', '", $insert_values) . "');";

                $message = "Rejestracja przebiegła pomyślnie";
            }

            // conect to db and execute query
            if (!($database = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME))) {
                die("Connection failed: " . mysqli_error($database));
            }
            if (!($result = mysqli_query($database, $query))) {
                die("Query execution failed: " . mysqli_error($database));
            }

            mysqli_close($database);
            print("<p>$message</p>");
        }
    }

    if ($iserror) {
        $error_message = "<p class='error'>DANE REJESTRACJI NIEPOPRAWNE!</p> <p class='error'>";
        if ($formerrors["loginerror"]) {
            $error_message .= 'Login jest już zajęty!<br>';
        }
        if ($formerrors["passworderror"]) {
            $error_message .= 'Hasło musi mieć conajmniej 8 znaków, zawierać jedną małą i dużą literę oraz cyfrę!<br>';
        }
        if ($formerrors["emailerror"]) {
            $error_message .= 'Podany adres email jest niepoprawny!<br>';
        }
        if ($formerrors["phoneerror"]) {
            $error_message .= 'Telefon jest niepoprawny!<br>';
        }
        $error_message .= '</p>';
        print ($error_message);
    }
    if (!$issubmited || $iserror) { // not submited

        if ($newuser){
            $login = isset($_POST['login']) ? $_POST['login'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';
            $firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
            $lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        } else {
            if (!($database = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME))) {
                die("Connection failed: " . mysqli_error($database));
            }
            $query = "SELECT * FROM users WHERE login = '" . $_SESSION['user'] . "';";
            if (!($result = mysqli_query($database, $query))) {
                die("Query execution failed: " . mysqli_error($database));
            }
            $row = mysqli_fetch_row($result);
            $login = isset($_POST['login']) ? $_POST['login'] : $row[1];
            $firstName = isset($_POST['firstName']) ? $_POST['firstName'] : $row[3];
            $lastName = isset($_POST['lastName']) ? $_POST['lastName'] : $row[4];
            $email = isset($_POST['email']) ? $_POST['email'] : $row[5];
            $phone = isset($_POST['phone']) ? $_POST['phone'] : $row[6];
        }

        print('<form autocomplete="on" method="post" action="register.php">');
        foreach ($fields as $field) {
            print("<p><label> $formlabels[$field]");
            $cell = "<input name='$field' size='32' $formattributes[$field] ";
            if ($field != 'password') {
                $cell .= "value=" . $$field . " ";
            }
            if ($field == 'login' && !$newuser){
                $cell .= 'disabled';
            }
            print ($cell . '>');
            print("</label></p>");
        }
        print("<p><input id='submitButton' name='submit' type='submit' value='Zatwierdź'></p>");
        print('</form>');
        print("<form method='post' action='php/db_show.php'><input id='submitButton' type='submit' value='Pokaż użytkowników'></form>");
    }
    ?>
</section>

<footer>
    <hr>
    <span>&copy; H&amp;G </span>
</footer>
</body>


</html>