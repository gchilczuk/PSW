<!DOCTYPE html>
<html>
   <head>      
      <title>Ciasteczka</title>
      <meta charset = "utf-8">
      <link rel="stylesheet" type="text/css" href="styles.php" />
      <style type="text/css">
      	.detailsText {			
			font-size: x-large;
			text-align: center;			
		}
		img.icon {
			width: 20%;
			height: 20%;
			display: block;
    		margin: 0 auto;
		}
      </style>
      
<?php 
   define( "MINUTE", 60  );   
   setcookie( "theme", $_POST["theme"], time() + MINUTE );  
?>
   </head>
   <body>
   	  <img src="php/php_imgs/cookie.png" alt="ciastek" class="icon">				
      <p class="detailsText">Zapisano ciasteczko</p>
      <p class="detailsText">Pokaż zapisane <a href = "php/read_cookies.php">ciasteczka</a></p>
   <p class="detailsText"> <a href="settings.html">Powrót</a> </p>
   </body>
</html>

