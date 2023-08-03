<?php
include('ssn.php');
include("../sitedetails.php");
include "../connection/connection.php";
$varLoginUserName=$_SESSION["u_name"];
$sql = "SELECT * FROM tbl_registration_admin WHERE user_name='$varLoginUserName'";  
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
  $sql = "SELECT * FROM tbl_registration_admin WHERE user_name='$varLoginUserName'";
  $rs_result=$objCon->query($sql);
  $row=$rs_result->fetch_assoc();
  extract($row);
  $varPassword=$password;
  $varOldPhotoUrl="$photo";
?>
<div class="media profile-left">
        
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



   <li class="parent"><a href="#"><i class="fa fa-bars"></i> <span>About Institute</span></a>
            <ul class="children">
              <li class="<?php if($navPage=='profile'){echo 'bg-success';} ?>"><a href="profile_update.php"><i class="glyphicon glyphicon-cog"></i> <span>Profile Settings</span></a></li>

              <li class="<?php if($navPage=='Active Session'){echo 'bg-success';} ?>">   <a href="activesession.php"> <i class="glyphicon glyphicon-thumbs-up"></i> Active Session</a></li>


              <li class="<?php if($navPage=='subject'){echo 'bg-success';} ?>">   <a href="subject_add.php"> <i class="glyphicon glyphicon-indent-left"></i> Add New Subject</a></li>


              <li class="<?php if($navPage=='uploaddata'){echo 'bg-success';} ?>">   <a href="pdf_add.php"> <i class="glyphicon glyphicon-indent-right"></i> Add Notes</a></li>

              <li class="<?php if($navPage=='students'){echo 'bg-success';} ?>">   <a href="manage_student.php"> <i class="glyphicon glyphicon-indent-right"></i> Manage Students</a></li>





            </ul>
        </li>



      <li class="parent"><a href="#"><i class="fa fa-spinner" aria-hidden="true"></i> <span>Computer Lab Setup</span></a>
            <ul class="children">

            <li class="<?php if($navPage=='In Time'){echo 'bg-success';} ?>">   <a href="computer_lab_in.php"> <i class="glyphicon glyphicon-indent-right"></i> In Student </a></li>
            <li class="<?php if($navPage=='Out Time'){echo 'bg-success';} ?>">   <a href="computer_lab_out.php"> <i class="glyphicon glyphicon-indent-right"></i> Out Student</a></li>


            </ul>
        </li>
        

        

     
<li class="parent"><a href="#"><i class="fa fa-bars"></i> <span>Report</span></a>
            <ul class="children">
              <li class="<?php if($navPage=='report'){echo 'bg-success';} ?>"><a href="my_lab_time.php"><i class="glyphicon glyphicon-cog"></i> <span>Student In-Out Report</span></a></li>

              <li class="<?php if($navPage=='report'){echo 'bg-success';} ?>"><a href="my_lab_time_today.php"><i class="glyphicon glyphicon-cog"></i> <span>Student Today Report</span></a></li>

              

            </ul>
        </li>




 

        
    </ul>