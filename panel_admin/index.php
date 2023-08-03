<?php
if(session_id())
{

}
else
{
  session_start();
}
if (isset($_SESSION["varSesLoginP"])) 
{
$varUserName=$_SESSION["adhar_card"];
$_SESSION["u_name"]=$varUserName; 	
}


?>

<?php
if (isset($_SESSION["u_name"]) AND isset($_SESSION["varSesUserType"]) AND $_SESSION["varSesUserType"]=="LoginSuccessAdmin")
{
                           echo "<script>location='dashboard.php'</script>";

}
else
{
                            $_SESSION['msg']= 'Invalid Login';

                           echo "<script>location='logout.php'</script>";

}
?>