<?php
$navPage='Dashboard';
$classIcon="fa fa-home";

if(session_id()){}  else  {  session_start(); }
?>

<?php
if (isset($_SESSION["varSesUserType"]) AND $_SESSION["varSesUserType"]=="LoginSuccessAdmin")
{
?>
  <?php include("add_page_top_link.php"); ?>  
  <script src="../bootstrap37/datepicker/jquery.js"></script>  


  <div class="row">
       <div class="col-md-12">


       </div>
  </div>
  










<?php        include "add_page_bottom_link.php";       ?>
<?php
}
else
{
      echo "<script>location='index.php'</script>";

}
?>