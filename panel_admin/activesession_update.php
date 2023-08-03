<?php
  include "../connection/connection.php";
  $varSessionID=$_REQUEST['listid']; 
  $varUpdateQ="UPDATE tbl_list_year SET status ='1' WHERE id='$varSessionID'";

  if($objCon->query($varUpdateQ)===true)
  {
       $varUpdateQ1="UPDATE tbl_list_year SET status ='0' WHERE id!='$varSessionID'";
       if($objCon->query($varUpdateQ1)===true)
       {
           echo "1";
       }
  }
  else
  {
  	echo "0";
	/*
		  echo "<script>alert('Session Data Not Updated')</script>";
	      echo "<script>alert('Error: " . $sql . " - - > " . $objCon->error."')</script>";
	      echo "<script>location='activesession.php'</script>";     
	*/    
  }



?>

    