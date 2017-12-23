<?php
session_start();

$login = isset($_POST['login']) ? $_POST['login'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
$lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$antyspam = isset($_POST['antyspam']) ? $_POST['antyspam'] : '';