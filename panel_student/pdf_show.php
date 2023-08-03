<?php date_default_timezone_set("Asia/Kolkata"); ?>
<?php
$navPage='PDF Download';
$classIcon="fa fa-file";

if(session_id()){}  else  {  session_start(); }
?>

<?php
if (isset($_SESSION["varSesUserType"]) AND $_SESSION["varSesUserType"]=="LoginSuccessStudent")
{

     include "../connection/connection.php";
     $varFieldNames="*";
     $varTableName="tbl_pdf";
     $varLoginID=$_SESSION['u_name'];


     		 $sqlSDPD = "SELECT * FROM tbl_registration_student WHERE user_name ='$varLoginID'";
             $rsSDPD=$objCon->query($sqlSDPD);
             $rowSDPD=$rsSDPD->fetch_assoc();
             extract($rowSDPD);




     $sqlRE = "SELECT $varFieldNames FROM $varTableName WHERE department='$department' AND pdf_course='$qualification'  AND year='$year' ORDER BY created DESC";     
     $rsRE=$objCon->query($sqlRE);
     $varRE=$rsRE->num_rows;
     $count=1;
?>
  <?php include("add_page_top_link.php"); ?>  
  <script src="../bootstrap37/datepicker/jquery.js"></script>  

 
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">

  <div class="row">
       <div class="col-md-12">
            <table id="example" class="table table-striped table-bordered table-responsive" style="width:100%">
        <thead>
            <tr>
                <th>Topic</th>
                <th>Class</th>
                <th>Subject</th>
                <th>View</th> 
                <th>Added Time</th> 
            </tr>
        </thead>
        <tbody>
        <?php
         while($rowRE=$rsRE->fetch_assoc())
         {
             extract($rowRE);

             $OriginalDate=$created;
             $convertedDate = date('d-F-Y h:i:s A', strtotime($OriginalDate));
 			 $pdflink = "../pdf_show.php?unum=$id";
  

        ?>  
            <tr>
                <td><?php echo $event_name; ?></td>
                <td><?php echo $pdf_course."($department)"; ?></td>
                 

                <td><?php echo $pdf_subject; ?></td>
                <td style="text-align: center;"><a href="<?php echo $pdflink; ?>" target="_blank">Click To Show</a></td>
                <td><?php echo $convertedDate; ?></td>

             
            </tr>
        <?php
        }
        ?>    
        </tbody>
        <tfoot>
            <tr>
                <th>Topic</th>
                <th>Class</th>
                <th>Subject</th>
                <th>View</th>
                <th>Added Time</th> 

            </tr>
        </tfoot>
    </table>


 

 

       </div>
  </div>
  

<?php        include "add_page_bottom_link.php";       ?>
<?php
}
else
{
      echo "<script>location='index.php'</script>";

}
?>