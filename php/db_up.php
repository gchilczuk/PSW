<?php
include "db_var.php";

// Create connection
if (!($database = new mysqli($servername, $username, $password))) {
    die("Connection failed: " . mysqli_error($database));
}
print("Connection created<br>");

// clear
$query = "DROP DATABASE IF EXISTS $db_name;";
if (!($result = mysqli_query($database, $query))) {
    die("'DROP TABLE' execution failed: " . mysqli_error($database));
}

// Create database
$query = "CREATE DATABASE $db_name;";
if (!($result = mysqli_query($database, $query))) {
    die("Database creation failed: " . mysqli_error($database));
}
print("Database created<br>");

// Set default database
if (!(mysqli_select_db($database, $db_name))) {
    die("Database selection failed: " . mysqli_error($database));
}

// Create table
$query = "
CREATE TABLE users(
  ID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Login varchar(32) NOT NULL,
  Password_hash varchar(64) NOT NULL,
  FirstName varchar(32),
  LastName varchar(64),
  Email varchar(255),
  Phone varchar(14)
)";

if (!($result = mysqli_query($database, $query))) {
    die("Table creation failed: " . mysqli_error($database));
}
print("Table created<br>");

die("Full success!");
