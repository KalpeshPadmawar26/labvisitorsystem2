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

        if(isset($_SESSION['varSesLogin']) OR isset($_SESSION["varSesUserType"]))
        {
          session_destroy();
        }
      
       echo "<script>location='admin_login_registration.php'</script>";         

?>

