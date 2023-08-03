<?php date_default_timezone_set("Asia/Kolkata"); ?>
<?php
$navPage='Todays Visits Entries';
$classIcon="fa fa-user";

if(session_id()){}  else  {  session_start(); }
?>

<?php
if (isset($_SESSION["varSesUserType"]) AND $_SESSION["varSesUserType"]=="LoginSuccessAdmin")
{

     include "../connection/connection.php";
     $varFieldNames="*";
     $varTableName="tbl_visitor";
     $varLoginID=$_SESSION['u_name'];
     $TodayDate = date('d-F-Y');

     $sqlRE = "SELECT $varFieldNames FROM $varTableName WHERE vcurrent_date='$TodayDate'";

     
     
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
                <th>My ID</th>
                <th>Entry Type</th>
                <th>Full Name</th>
                <th>Class</th>
                <th>Time</th>
                <th>PC IP</th>
 
            </tr>
        </thead>
        <tbody>
        <?php
         while($rowRE=$rsRE->fetch_assoc())
         {
             extract($rowRE);

              
 
             $OriginalDate=$created;
             $convertedDate = date('d-F-Y h:i:s A', strtotime($OriginalDate));

             $sqlSD = "SELECT * FROM tbl_registration_student WHERE user_name ='$student_id'";
             $rsSD=$objCon->query($sqlSD);
             $rowSD=$rsSD->fetch_assoc();

  

        ?>  
            <tr>
                <td><?php echo $student_id; ?></td>
                <td><?php echo $remark; ?></td>
                <td><?php echo $rowSD['first_name']; ?> <?php echo $rowSD['mid_name']; ?> <?php echo $rowSD['last_name']; ?></td>
                
                <td><?php echo $rowSD['qualification']; ?> (<?php echo $rowSD['department']; ?>)</td>
                <td><?php echo $convertedDate; ?></td>
                <td><?php echo $rowRE['pc_ip']; ?></td>
             
            </tr>
        <?php
        }
        ?>    
        </tbody>
        <tfoot>
            <tr>
                <th>My ID</th>
                <th>Entry Type</th>
                <th>Full Name</th>
                <th>Class</th>
                <th>Time</th>
                <th>PC IP</th>
 
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