                <option value=" ">Select SubCategory</option>

<?php
$varCategoryCode=$_REQUEST['find'];
 
?>
  <?php
   include "../connection/connection.php";
     $sqlSite2 = "SELECT * FROM tbl_subcategories WHERE categorycode='$varCategoryCode' && showhide='1'";  
     $rs_Site2=$objCon->query($sqlSite2);
     $varSite2=$rs_Site2->num_rows;

     while($tbl_subcategories=$rs_Site2->fetch_assoc())
     {
      $varSubCategoryName = $tbl_subcategories['name'];
 
?>
             <option value="<?php echo $varSubCategoryName; ?>"><?php echo $varSubCategoryName; ?></option>
      
      <?php      
     }

      
 
   ?>
      