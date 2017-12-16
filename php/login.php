<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../styles.php">
</head>
<body>
<div class = "page-content">

    <?php if (isset($_SESSION['logfail'])){
        print ("<p> Login lub hasło nieprawidłowe! </p>");
    }?>
    <form id="log-form" method="post" action="login_process.php">
        <h4></h4>
        <p><label>Login:
                <input name = "username" type = "text"
                       value="<?php print(isset($_SESSION['logfail']) ? $_SESSION['logfail'] : "") ?>" required>
            </label></p>

        <p><label>Hasło:
                <input name="password" type = "password" required>
            </label></p>

        <p>
            <input name="login" type = "submit" value = "Wyślij">
        </p>
    </form>
</div>


</body>
</html>