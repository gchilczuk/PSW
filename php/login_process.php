<?php
include "db_const.php";
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

if (!($database = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME))) {
    die("Connection failed: " . mysqli_error($database));
}
$query = "SELECT password FROM users WHERE login = '$username'";
if (!($result = mysqli_query($database, $query))) {
    print ($query.'<br>');
    die("Query execution failed: " . mysqli_error($database));
}

$row = mysqli_fetch_row($result);

if ($row == null || hash('sha256', $password) != $row[0]){
    $_SESSION['logfail'] = $_POST['username'];
    mysqli_close($database);
    header('location:login.php');
} else {
    unset($_SESSION['logfail']);
    $_SESSION['user'] = $username;
    $back_to = '../';
    if (isset($_SESSION['back_to'])){
        $back_to .= $_SESSION['back_to'];
        unset($_SESSION['back_to']);
    } else {
        $back_to .= 'index.php';
    }
    mysqli_close($database);
    header('location:'.$back_to);
}

