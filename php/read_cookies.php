<?php
session_start();

if (isset($_SESSION['user'])){

print('
<!DOCTYPE html>

<html>
<head>
    <meta charset = "utf-8">
    <title>read cookies</title>
    <link rel="stylesheet" type="text/css" href="../styles.php" />
</head>
<body>');

foreach ($_COOKIE as $key => $value )
    print( "<p>$key: $value</p>" );

print('</body>
</html>');

}



?>
