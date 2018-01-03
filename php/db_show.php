<!DOCTYPE html>
<html>
<head>
	<title>Baza użytkowników</title>
	<meta charset="utf-8">

	<style type = "text/css">
         table { 
         	background-color: lightgrey; 
            border: 1px solid black; 
            border-collapse: collapse; 
         }
         th, td { 
         	padding: 5px; 
         	border: 1px solid black; 
         }
         tr:nth-child(even) { 
         	background-color: white; 
         }
         th { 
         	background-color: grey; 
         }
         caption {
         	font-weight: bold;
         	font-size: large;
         	padding-bottom: 10px;
         }
      </style>
</head>
<body>	
	<?php  
		include "db_const.php";
		$fields = array('id', 'login', 'password', 'firstName', 'lastName', 'email', 'phone');
		$base_query = "SELECT " . join(", ", $fields) . " FROM Users";
		$formlabels = array(
			'ID' => 'Id',
		    'login' => 'Login',
		    'password' => 'Hasło',
		    'firstName' => 'Imię',
		    'lastName' => 'Nazwisko',
		    'email' => 'E-mail',
		    'phone' => 'Telefon'
		);

		print("<form method = 'post' action = 'db_show.php'><h3>Filtruj użytkowników</h3>");
		print("<p><label>Login: </label><input type='text' name='login'/></p>");
		print("<p><label>Imie: </label><input type='text' name='firstname'/></p>");
		print("<p><label>Nazwisko: </label><input type='text' name='lastname'/></p>");
		print("<p><input type='submit' name='submit' value='Filtruj'></p>");
		print("</form>");

		$login = "";
		$firstname = "";
		$lastname = "";


		if(isset($_POST["login"])) {
			$login = $_POST["login"];
			print("Login: $login<br>");
		}
		if(isset($_POST["firstname"])) {
			$firstname = $_POST["firstname"];
			print("Imię: $firstname<br>");
		}
		if(isset($_POST["lastname"])) {
			$lastname = $_POST["lastname"];
			print("Nazwisko: $lastname<br>");
		}		

		$query = "";
		if($login == "" && $firstname == "" && $lastname == "") {
			$query = $base_query;
		}
		else if($login != "" && $firstname == "" && $lastname == "") {
			$query = $base_query . " WHERE login = '$login'";
		}
		else if($login != "" && $firstname != "" && $lastname == "") {
			$query = $base_query . " WHERE login = '$login' AND firstName = '$firstname'";
		}
		else if($login != "" && $firstname == "" && $lastname != "") {
			$query = $base_query . " WHERE login = '$login' AND lastName = '$lastname'";
		}		
		else if($login == "" && $firstname != "" && $lastname == "") {
			$query = $base_query . " WHERE firstName = '$firstname'";
		}		
		else if($login == "" && $firstname != "" && $lastname != "") {
			$query = $base_query . " WHERE firstName = '$firstname' AND lastName = '$lastname'";
		}
		else if($login == "" && $firstname == "" && $lastname != "") {
			$query = $base_query . " WHERE lastName = '$lastname'";
		}		
		else if($login != "" && $firstname != "" && $lastname != "") {
			$query = $base_query . " WHERE login = '$login' AND firstName = '$firstname' AND lastName = '$lastname'";
		}	

		if (!($database = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME))) {
            die("Connection failed: " . mysqli_error($database));
        }
        if (!($result = mysqli_query($database, $query))) {
            die("Query execution failed: " . mysqli_error($database));
        }	

        print('<table>');
        print('<caption>Baza użytkowników</caption>');
        print('<tr>');

        foreach ($formlabels as $value) {
        	print("<th>$value</th>");
        }

        print('</tr>');

        while($row = mysqli_fetch_row($result)) {
        	print("<tr>");

            foreach ($row as $key => $value) 
                print("<td>$value</td>");

            print("</tr>");
        } 
    ?>
</body>
</html>