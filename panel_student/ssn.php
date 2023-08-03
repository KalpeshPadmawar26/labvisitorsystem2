<?php
if(session_id())
 {
      // session has been started
 }
 else
 {
      // session has NOT been started
      session_start();
 }
if(!isset($_SESSION['u_name'])) 
{
	echo "<script>location='index.php';</script>";
} 

 
?>