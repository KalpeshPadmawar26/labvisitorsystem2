<?php 
  include '../connection/connection.php';

include('connectionmanager.php');
if(session_id())
 {
      
 }
 else
 {
      
      session_start();
 }



$remark = "Machine Out Time";
                              $student_id = $_SESSION["u_name"];
                              $currentTimezone = new DateTimeZone("Asia/Kolkata" );
                              $currentDate = new DateTime();
                              $currentDate->setTimezone($currentTimezone);
                           
                              $currentDateTime= $currentDate->format( 'g:i A l jS F Y');
                              $currentDateTime= $currentDate->format( 'g:i A l jS F Y');
                              $currentDateYMD= $currentDate->format( 'Y-m-d');
                              $vcurrent_date= $currentDate->format( 'd-F-Y');
                              $vcurrent_time= $currentDate->format( 'h:i:s A');

                              $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                              $hosts = gethostbynamel(gethostbyaddr($_SERVER['REMOTE_ADDR']));
                              $arrLength = count($hosts);
                              if ($arrLength>1) 
                                $pc_ip=$hosts[2]; 
                              else 
                                $pc_ip=$hosts[0]; 



                         $varQueryInsertMachine="INSERT INTO tbl_visitor(student_id, vcurrent_date, vcurrent_time, remark, pc_ip) VALUES('$student_id', '$vcurrent_date', '$vcurrent_time', '$remark', '$pc_ip');";

        if($objCon->query($varQueryInsertMachine)===true)
        {
        	session_destroy();
			redirect("../student_logout.php");     
        }
        else
        {
			redirect("index.php");     
        } 










?>