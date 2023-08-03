<?php 
include('connectionmanager.php');

$id=$_GET['id'];
$course_part=$_GET['course_part'];
$result = $con->deletewh('tbl_courses_subject',"id='{$id}'");

//$result = $con->deletewh('tbl_events',$id);

if($result)
{
		redirect('subject_add_rows_year.php?course_part='.$course_part);
}

?>