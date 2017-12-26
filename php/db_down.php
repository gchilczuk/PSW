<?php

include "db_var.php";

if (!($database = new mysqli($servername, $username, $password))) {
    die("Connection failed: " . mysqli_error($database));
}
print("Connection created<br>");

// clear
$query = "DROP DATABASE IF EXISTS $db_name;";
if (!($result = mysqli_query($database, $query))) {
    die("'DROP DATABASE' execution failed: " . mysqli_error($database));
}
print("Database droppped (if existed)<br>");

die("Full success!");