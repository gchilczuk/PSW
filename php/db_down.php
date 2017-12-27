<?php

include "db_const.php";

if (!($database = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD))) {
    die("Connection failed: " . mysqli_error($database));
}
print("Connection created<br>");

// clear
$query = "DROP DATABASE IF EXISTS ".DB_NAME.";";
if (!($result = mysqli_query($database, $query))) {
    die("'DROP DATABASE' execution failed: " . mysqli_error($database));
}
print("Database droppped (if existed)<br>");

mysqli_close($database);
die("Full success!");