<?php 
include('connectionmanager.php');

echo $id=$_GET['id'];
echo $evtid=$_GET['evtid'];
$result = $con->deletewh('tbl_events',"id='{$id}'");

//$result = $con->deletewh('tbl_events',$id);

if($result)
{
		redirect('service_rows.php?eventname='.$evtid);
}

?>