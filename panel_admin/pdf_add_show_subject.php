<?php
$course_name=$_REQUEST['course_name'];
$course_part=$_REQUEST['course_part'];
?>

   <?php
         include "../connection/connection.php";
         
         $sql ="SELECT * FROM tbl_courses_subject WHERE course_name='$course_name' AND course_part='$course_part'"; 
         $rs_result=$objCon->query($sql);
          if($rs_result->num_rows>0)
          {
          
            while ($row=$rs_result->fetch_array()) 
            {
                $subject_name=ucwords($row['subject_name']);
                echo "<option>$subject_name</option>";
                 
            } 
         }
         else
         {
                    echo "<option value=' '>No Subject Found</option>";

         }

          $objCon->close();
?>