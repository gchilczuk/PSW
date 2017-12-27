<?php
include "db_const.php";
session_start();



$login = isset($_POST['login']) ? $_POST['login'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
$lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$antyspam = isset($_POST['antyspam']) ? $_POST['antyspam'] : '';

$fields = array('login', 'password', 'firstName', 'lastName', 'email', 'phone');
$iserror = false;


if (isset($_POST["submit"])) {
    // check if correct

    if (!$iserror) {  // if correct
        if ($password != '') {
            $password = hash('sha256', $password);
        }

        if (isset($_SESSION['user'])) { // change data
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
                if ($$field != ''){
                    $insert_names[] = $field;
                    $insert_values[] = $$field;
                }
            }
            $query = "INSERT INTO users (".join(', ', $insert_names).
                ") VALUES ('".join("', '", $insert_values)."');";

            $message = "Rejestracja przebiegła pomyślnie";
        }

        // conect to db and execute query
        if (!($database = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD))) {
            die("Connection failed: " . mysqli_error($database));
        }
        if (!(mysqli_select_db($database, DB_NAME))) {
            die("Database selection failed: " . mysqli_error($database));
        }
        print ($query.'<br>');
        if (!($result = mysqli_query($database, $query))) {
            die("Query execution failed: " . mysqli_error($database));
        }

        mysqli_close($database);
        print("<p>$message</p>");



    }
}