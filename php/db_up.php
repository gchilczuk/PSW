<?php
include "db_const.php";

// Create connection
if (!($database = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD))) {
    die("Connection failed: " . mysqli_error($database));
}
print("Connection created<br>");

// clear
$query = "DROP DATABASE IF EXISTS ".DB_NAME.";";
if (!($result = mysqli_query($database, $query))) {
    die("'DROP TABLE' execution failed: " . mysqli_error($database));
}

// Create database
$query = "CREATE DATABASE ".DB_NAME.";";
if (!($result = mysqli_query($database, $query))) {
    die("Database creation failed: " . mysqli_error($database));
}
print("Database created<br>");

// Set default database
if (!(mysqli_select_db($database, DB_NAME))) {
    die("Database selection failed: " . mysqli_error($database));
}

// Create table
$query = "
CREATE TABLE users(
  ID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  login varchar(32) NOT NULL,
  password varchar(64) NOT NULL,
  firstName varchar(32),
  lastName varchar(64),
  email varchar(255),
  phone varchar(14)
)";

if (!($result = mysqli_query($database, $query))) {
    die("Table creation failed: " . mysqli_error($database));
}
print("Table created<br>");

// Insert sample user
$admin_hash = hash('sha256', 'admin');
$query = "INSERT INTO users (login, password) VALUES('admin', '$admin_hash');";

if (!($result = mysqli_query($database, $query))) {
    die("Table insertion failed: " . mysqli_error($database));
}
print("Data inserted<br>");

mysqli_close($database);
die("Full success!");
