<?php 
include('connectionmanager.php');
if(session_id())
 {
      // session has been started
 }
 else
 {
      // session has NOT been started
      session_start();
 }

session_destroy();
  redirect("../admin_logout.php");     

?>