


<?php
 
     include "connection/connection.php";
     $sqlCurrentSession = "SELECT * FROM tbl_list_year WHERE status='1'";  
     $rs_CurrentSession=$objCon->query($sqlCurrentSession);
     $rowCurrentSession=$rs_CurrentSession->fetch_assoc();
     extract($rowCurrentSession);
     $varCurrentSession=$listyear;
     $varCurrentSessionYear=$listyear;
     $objCon->close();

 if(session_id())
 {
      
    

   include "connection/connection.php";
     $sqlCurrentStudent = "SELECT * FROM tbl_registration_student WHERE status='1' AND joining_date='$varCurrentSession'";  
     $rs_CurrentStudent=$objCon->query($sqlCurrentStudent);
     $varCurrentTotalStudent=$rs_CurrentStudent->num_rows;
   $objCon->close();

    
 }

?> 