<?php
 		include('register.class.php');//Database prototype and Queried
 		require("../connection/connection.php");

 		 
        $con = new DataBase();//database Object
 
        $con->connect("$servername", "$username", "$password", "$dbname");//Connection String
		
		//function for redirecting the page on perticular URL.
		function redirect($url)
		{
			if (!headers_sent())
			{    
				header('Location: '.$url);
				exit;
			}
			else
			{  
				echo '<script type="text/javascript">';
				echo 'window.location.href="'.$url.'";';
				echo '</script>';
				echo '<noscript>';
				echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
				echo '</noscript>'; exit;
			}
		}
?>
