<?php
include "db_const.php";
session_start();


$fields = array('login', 'password', 'firstName', 'lastName', 'email', 'phone');
$newuser = !isset($_SESSION['user']);
$iserror = false;
$formerrors = array("loginerror" => false, "passworderror" => false, "emailerror" => false, "phoneerror" => false);


if (isset($_POST["submit"])) {
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
        if ($row[0] == $login){
            $formerrors["loginerror"] = true;
            $iserror = true;
        }
        $row = mysqli_fetch_row($result);
    }
    mysqli_close($database);

    if (!preg_match("/^(?=.{8})(?=.*[A-Z])(?=.*[a-z])(?=.*\d)/", $password)) {
        $formerrors["passworderror"] = true;
        $iserror = true;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $formerrors["emailerror"] = true;
        $iserror = true;
    }
    if ($phone != '' && !preg_match("/^[0-9]{9}$/", $phone)) {
        $formerrors["phoneerror"] = true;
        $iserror = true;
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

    if (!$iserror){  // if correct
        if ($password != '') {
            $password = hash('sha256', $password);
        }

        if (!$newuser) { // change data
            $query = "UPDATE users SET ";
            if ($password != '') {
                $query = $query . 'password = ' . $password;
            }

            foreach (array('FirstName', 'LastName', 'Email', 'Phone') as $element) {
                $query .= ", $element = " . quotemeta($$element);
            }

            $query .= "WHERE login = $login;";

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