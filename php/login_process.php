<?php
session_start();

$users = array('admin' => 'admin', 'user1' => 'password1');
$username = $_POST['username'];
$password = $_POST['password'];

if (!isset($users[$username]) || $password != $users[$username]){
    $_SESSION['logfail'] = $_POST['username'];
    header('location:login.php');
} else {
    unset($_SESSION['logfail']);
    $_SESSION['user'] = $username;
    $back_to = '../';
    if (isset($_SESSION['back_to'])){
        $back_to .= $_SESSION['back_to'];
        unset($_SESSION['back_to']);
    } else {
        $back_to .= 'index.html';
    }
    header('location:'.$back_to);
}

