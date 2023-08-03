<?php 
include('connectionmanager.php');

echo $id=$_GET['id'];
echo $event_name=$_GET['enm'];

     include "../connection/connection.php";
     $sql = "SELECT * FROM tbl_pdf WHERE id='$id'";  
     $rs_result=$objCon->query($sql);
     $rowXX=$rs_result->fetch_assoc();
     extract($rowXX); 

$location_name=$location;
$added_for=$added_for;

$result = $con->deletewh('tbl_pdf',"id='{$id}'");

//$result = $con->deletewh('tbl_events',$id);

if($result)
{
		redirect("pdf_add_events_rows.php?ptype=$location_name&pfor=$added_for");
}

?>