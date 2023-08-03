<?php 
	include('connectionmanager.php');
	
	if(isset($_POST['submit'])){
	$event_id = $_POST['event_id'];
	
	$start_time = $_POST['start_time'];
	$end_time = $_POST['end_time'];
	$locations = $_POST['locations'];
	$event_name = mysqli_real_escape_string($objCon,$_POST["event_name"]);
	$details = mysqli_real_escape_string($objCon,$_POST["details"]);
	$event_date = $_POST['event_date'];
	$evtid=$_POST['event_evtid'];
	//`event_name`, `start_time`, `end_time`, `location`, `details`, `event_date`, `image_name`, `thumb_name`,
	
			$result=$con->update("event_name='{$event_name}',start_time='{$start_time}',end_time='{$end_time}',location='{$locations}',details='{$details}',event_date='{$event_date}'","evtid='{$evtid}'",'tbl_events');
			}
			
			if(isset($_POST['upload'])){
	$event_id = $_POST['event_id'];
	$start_time = $_POST['start_time'];
	$end_time = $_POST['end_time'];
	$locations = $_POST['location'];
	$event_name = mysqli_real_escape_string($objCon,$_POST["event_name"]);
	$details = mysqli_real_escape_string($objCon,$_POST["details"]);
	$event_date = $_POST['event_date'];
	$event_added_for = $_POST['event_added_for'];
	$evtid=$_POST['event_evtid'];

	$created = date('y-m-d');

	for($i=0;$i<count($_FILES["fileUpload"]["name"]);$i++)
	{
		if(trim($_FILES["fileUpload"]["tmp_name"][$i]) != "")
		{
				$images = $_FILES["fileUpload"]["tmp_name"][$i];
				$images1 = $_FILES["fileUpload"]["tmp_name"][$i];
				
				/***New Image Name***/
					$new_images = "big_".date("y_m_d_h_m_s").$_FILES["fileUpload"]["name"][$i];
					$new_imagesone = "thumb_".date("y_m_d_h_m_s").$_FILES["fileUpload"]["name"][$i];
					
				copy($_FILES["fileUpload"]["tmp_name"][$i],"../uploads/".$_FILES["fileUpload"]["name"][$i]);
				
				//*** Fix Width & Heigh ***//
					$width=1024;	$height=576;
					$width1=553;	$height1=311;
								/***Heigh (Auto caculate)***/
								//$height=round($width*$size[1]/$size[0]);
										
				/***To Get The Size of Image ***/
					$size=GetimageSize($images);
					
				/***To Create Image String***/
					$images_orig = ImageCreateFromJPEG($images);
					$images_orig1 = ImageCreateFromJPEG($images1);
					
				/***To Calculate X and Y Co-ordinate of Image***/
					$photoX = ImagesX($images_orig);
					$photoY = ImagesY($images_orig);
					$photoX1 = ImagesX($images_orig1);
					$photoY1 = ImagesY($images_orig1);
								
				/***Create New Image***/
					$images_fin = ImageCreateTrueColor($width, $height);
					ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);		
					
					$images_fin1 = ImageCreateTrueColor($width1, $height1);
					ImageCopyResampled($images_fin1, $images_orig1, 0, 0, 0, 0, $width1+1, $height1+1, $photoX1, $photoY1);	
					
				/***To Save New Resized Image***/
					ImageJPEG($images_fin,"../uploads/".$new_images);
					ImageJPEG($images_fin1,"../uploads/".$new_imagesone);
					ImageDestroy($images_orig);
					ImageDestroy($images_orig1);
					ImageDestroy($images_fin);
					ImageDestroy($images_fin1);		 
				echo "Resize Successful.<br>";
				 
		//*** Insert Record ***//
		$fields = array('event_name','start_time','end_time','location','details','event_date','image_name','thumb_name','created','evtid','added_for');
		 $values = array($event_name,$start_time,$end_time,$locations,$details,$event_date,$new_images,$new_imagesone,$created,$evtid,$event_added_for); 
		echo $res = $con->insert($fields, $values, 'tbl_events');

		
		}
	}
}

			
			redirect('service_rows.php?eventname='.$event_id);

?>