<?php
if(session_id()){}  else  {  session_start(); }
if (isset($_SESSION["varSesUserType"]) AND $_SESSION["varSesUserType"]=="LoginSuccessAdmin")
{
include "../connection/connection.php"; 
include('connectionmanager.php');
		 if(isset($_POST['btnDel']))
		  {
			$varStudentID=$_GET['studentid'];
		    $sqlStudentDel = "SELECT * FROM tbl_registration_student WHERE id='$varStudentID'";  
		    $resultStudentDel=$objCon->query($sqlStudentDel);
		    $rowStudentDel=$resultStudentDel->fetch_assoc();
 			
		    $addedPhoto="../".$rowStudentDel['photo'];
 
		    $resultDelete = $con->deletewh('tbl_registration_student',"id='{$varStudentID}'");
		    
				if($resultDelete)
				{
 				      unlink($addedPhoto);
			 
			echo "<script>location='manage_student.php'</script>";

				}
		   }
}
else
{
      echo "<script>location='manage_student.php'</script>";

}
?>