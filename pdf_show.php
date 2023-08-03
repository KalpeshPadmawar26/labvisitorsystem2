<?php date_default_timezone_set("Asia/Kolkata"); ?>

<?php
  $currentTimezone = new DateTimeZone("Asia/Kolkata" );
    $currentDate = new DateTime();
    $currentDate->setTimezone($currentTimezone);
 
    $currentDateTime= $currentDate->format( 'g:i A l jS F Y');
    $currentDateTime= $currentDate->format( 'g:i A l jS F Y');
    $currentDateYMD= $currentDate->format( 'Y-m-d');
    $currentDateYMD1= $currentDate->format( 'd-F-Y h:i:s A');
?>
<?php
     include "connection/connection.php";
     $varUnique=$_GET["unum"];
     $sql = "SELECT * FROM tbl_pdf WHERE id='$varUnique'";  
     $rs_result=$objCon->query($sql);
     $rowXX=$rs_result->fetch_assoc();
     extract($rowXX); 
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
  
<style type="text/css">
 
  body
  {
    padding: 0px;
  }
  .form-groupFG
  {
    padding: 0px;
    margin:0px;
  }
  MARQUEE
  {
     display: none;
  }

</style>
</head>
<body>
<header>
 


 <?php
 $pageName="forgotPassword";
  include "Head1NavigationTop.php";
  include "Head2Site.php";
  include "Head3NavigationBelow.php";
?> 

</header>


<div class="container-fluid">
  <div class="row">
  <!-- Raj Coloumn Start -->
    <div class="col-md-2 col-sm-2"></div>
    <div class="col-md-8 col-sm-8">
       <h1 class="modal-title" id="myModalLabel"><center>PDF Details</center></h1>
       <table class="table table-responsive">
         
         <tr>
           <th>Department</th>
           <td><?php echo $department; ?></td>
         </tr>

         <tr>
           <th>Part/Semester</th>
           <td><?php echo $pdf_course; ?></td>
         </tr>

         <tr>
           <th>Subject</th>
           <td><?php echo $pdf_subject; ?></td>
         </tr>

         <tr>
           <th>Type</th>
           <td><?php echo $location; ?></td>
         </tr>

         <tr>
           <th>Year</th>
           <td><?php echo $year; ?></td>
         </tr>

         <tr>
           <th>Title</th>
           <td><?php echo $details; ?></td>
         </tr>

         <tr>
           <th>Description</th>
           <td><?php echo $description; ?></td>
         </tr>

         <tr>
           <th>Add Date/Time</th>
           <?php
            $OriginalDate=$created;
            $convertedDate = date('d-F-Y h:i:s A', strtotime($OriginalDate))


           ?>
           <td><?php echo $convertedDate; ?></td>
         </tr>

         <tr>
           <th>Action</th>
           <td><a href="<?php echo "images/$image_name"; ?>" download="">Click Here To Download <?php echo "$event_name"; ?> PDF</a></td>
         </tr>


       </table>

   <iframe src='<?php echo "images/$image_name"; ?>' style="width:100%; height:800px;" frameborder="0"></iframe>
 
    </div>
  </div>
</div>

<?php
 include "footer.php";
?>


   <script src="bootstrap37/js/bootstrap.min.js"></script>
 
  <script src='bootstrap37/validation/bootstrapvalidator_0.5.2_js_bootstrapValidator.min.js'></script>

 


</body>
</html>