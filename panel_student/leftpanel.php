<?php
include('ssn.php');
include("../sitedetails.php");
include "../connection/connection.php";
$varLoginUserName=$_SESSION["u_name"];
$sql = "SELECT * FROM tbl_registration_student WHERE user_name='$varLoginUserName'";  
$rs_result=$objCon->query($sql);
$rowXX=$rs_result->fetch_assoc();
extract($rowXX); 
?>

<?php 
error_reporting(0);
session_start();
?>

<?php
  include "../connection/connection.php";
  $varLoginUserName=$_SESSION["u_name"];
  $sql = "SELECT * FROM tbl_registration_student WHERE user_name='$varLoginUserName'";
  $rs_result=$objCon->query($sql);
  $row=$rs_result->fetch_assoc();
  extract($row);
  $varPassword=$password;
  $varOldPhotoUrl="$photo";
?>
<div class="media profile-left">
        <a class="pull-left profile-thumb" target="_blank" href="../<?php echo $photo; ?>">
            <img class="img-circle" src="../<?php echo $photo; ?>" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading"><?php echo ucwords("$first_name $mid_name $last_name "); ?></h4>
            <small class="text-muted"><strong><?php echo ucwords($designation); ?></strong></small>
        </div>
    </div><!-- media -->
    
    <h5 class="leftpanel-title" style="font-weight: bold;color: grey">Navigation <span> Session <?php echo $varCurrentSessionYear; ?></span> </h5>
    <ul class="nav nav-pills nav-stacked">




       

        <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> <strong style="color: red">Sign Out</strong></a></li>
        <li class="active"><a href="index.php"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>


      <li class="parent"><a href="#"><i class="fa fa-bars"></i> <span>Profile Setup</span></a>
            <ul class="children">
              <li class="<?php if($navPage=='profile'){echo 'bg-success';} ?>"><a href="profile_update.php"><i class="glyphicon glyphicon-cog"></i> <span>Profile Settings</span></a></li>

              


            </ul>
        </li>


<!--                         <li class=" "><a href="profile_update.php"><span class="pull-right badge">0</span><i class="fa fa-envelope-o"></i> <span>Account Settings</span></a></li>
-->


   <li class="parent"><a href="#"><i class="glyphicon glyphicon-file"></i> <span>Notes</span></a>
            <ul class="children">
                <li class="<?php if($navPage=='PDF Download'){echo 'bg-success';} ?>">   <a href="pdf_show.php"> <i class="glyphicon glyphicon-indent-right"></i> Download Notes</a></li>


            </ul>
        </li>

 

        

     
<li class="parent"><a href="#"><i class="fa fa-bars"></i> <span>Report</span></a>
            <ul class="children">
              <li class="<?php if($navPage=='All Visits Entries'){echo 'bg-success';} ?>"><a href="my_lab_time.php"><i class="glyphicon glyphicon-cog"></i> <span>Self In-Out Report</span></a></li>

              

            </ul>
        </li>




 

        
    </ul>



