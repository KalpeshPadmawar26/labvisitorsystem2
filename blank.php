<?php
if(session_id())
{

}
else
{
  session_start();
} 
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <title>
    <?php
        include "sitedetails.php";
        echo $SiteTitle;
    ?>
  </title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="bootstrap37/css/bootstrap.min.css">
  <script src="css/toggle_button_script.js" type="text/javascript"></script>
  <link href="css/dcstyle.css" rel="stylesheet" type="text/css" />


    <link href="bootstrap37/datepicker/bootstrap-datepicker.css" rel="stylesheet">  
    <script src="bootstrap37/datepicker/jquery.js"></script>  
    <script src="bootstrap37/datepicker/bootstrap-datepicker.js"></script> 
    
<?php
   include "styles.php";
?>
</head>
<body>
 
<?php
   include "Head2Site.php";
?>

   

  <!-- Page Content -->
  <div class="container">

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4">
      <h1 class="display-3">A Warm Welcome!</h1>
      <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
      <a href="#" class="btn btn-primary btn-lg">Call to action!</a>
    </header>

     
 

  </div>
  <!-- /.container -->
 





 

<?php
 include "footer.php";
?>


   <script src="bootstrap37/js/bootstrap.min.js"></script>
 
  <script src='bootstrap37/validation/bootstrapvalidator_0.5.2_js_bootstrapValidator.min.js'></script>

 


</body>
</html>