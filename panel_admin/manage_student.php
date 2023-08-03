<?php date_default_timezone_set("Asia/Kolkata"); ?>
<?php
$navPage='students';
$classIcon="fa fa-user";

if(session_id()){}  else  {  session_start(); }
?>

<?php
if (isset($_SESSION["varSesUserType"]) AND $_SESSION["varSesUserType"]=="LoginSuccessAdmin")
{

     include "../connection/connection.php";
     $varFieldNames="*";
     $varTableName="tbl_registration_student";
     $varLoginID=$_SESSION['u_name'];
     $TodayDate = date('d-F-Y');

     $sqlRE = "SELECT $varFieldNames FROM $varTableName";

     
     
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
                <th>ID</th>
                <th>Full Name</th>
                <th>Class</th>
                 
                <th>Delete</th>
                <th>Date</th>
 
            </tr>
        </thead>
        <tbody>
        <?php
         while($rowRE=$rsRE->fetch_assoc())
         {
             extract($rowRE);

              
 
             $OriginalDate=$created;
             $convertedDate = date('d-F-Y h:i:s A', strtotime($OriginalDate));
 

  

        ?>  
            <tr>
                <td><?php echo $user_name; ?></td>
                <td><?php echo $rowRE['first_name']; ?> <?php echo $rowRE['mid_name']; ?> <?php echo $rowRE['last_name']; ?></td>
                
                <td><?php echo $rowRE['qualification']; ?> (<?php echo $rowRE['department']; ?>)</td>
                
                   
                  <td align="center">
                    <form method="post">
                    <button type="submit" formaction="student_one_delete.php?studentid=<?php echo $rowRE['id']; ?>" class="btn btn-link" onclick="return confirm('Are you sure you want to Delete Student Permanatly?');" name="btnDel"> <span class="fa fa-trash-o"></span> Delete
                    </button>
                    </form>
                  </td>

                <td><?php echo $convertedDate; ?></td>
                
             
            </tr>
        <?php
        }
        ?>    
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Class</th>
                 
                <th>Delete</th>
                <th>Date</th>
 
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