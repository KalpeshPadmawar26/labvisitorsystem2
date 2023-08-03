<?php
$data=$_GET['rowsqArray'];
$order=$_GET['recordsArray'];
$data2=$_GET['orderArray'];
$rowsq = preg_split("/[\s,]+/", $data);
$x=count($rowsq);

print_r($rowsq);
//echo $x;
                
include_once('connectionmanager.php');


	
	for($i=0;$i<=$x;$i++)
	{
		if($i==0)
		{
			$sq=$rowsq[$i];
			$id=$data2[15].$data2[16].$data2[17];
		}
		else
		{
			$sq=$rowsq[$i];
			$id=$order[$i-1];
		}
		
		
	
		
		
	//$query = "UPDATE slide SET sequence = " . $sq . " WHERE id = " . $id.";";
		$res = $con->update("sequence='{$sq}'","id='{$id}'",'tbl_events');
		if($res)
		{
			echo $id." ".$sq."\n";
		}
		else
		{
			echo $res;
		}
		
	}
	
	//echo $query;
	//echo '<pre>';
	//print_r($updateRecordsArray);
	//echo '</pre>';
	//echo 'If you refresh the page, you will see that records will stay just as you modified.';
//}*/
?>
