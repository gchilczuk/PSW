<?php
session_start(); ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>show session</title>
</head>
<body>
<?php
foreach ($_SESSION as $key => $value){
    print ("<p>$key : $value </p>");
}
?>

<form action="logout_process.php">
    <input type = "submit" value = "Wyczyść sesję">
</form>
</body>
</html>
