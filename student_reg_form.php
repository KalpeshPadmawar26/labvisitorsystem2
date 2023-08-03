<div class="zed-loginInstrunctions" style="">
                <style type="text/css">
                  #reg_form .form-group
                  {
                    margin-right: 10px;
                  }
                </style>                
                                
                                 <p>
<form class="form-horizontal" method="post" id="reg_form" enctype="multipart/form-data">

<h5 style="border-bottom: 1px solid orange;border-top: 1px solid orange;padding: 10px;color: orange">Personal Details : </h5>
 
<div class="form-group col-xs-4 col-md-4">
  <label for="name" class="control-label">Adharcard Number</label>
  <input name="adharcard"  id="adharcard" class="form-control"  placeholder="Adharcard Number" size="100%" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type = "number" maxlength = "12" onkeyup="this.value = this.value.toUpperCase();" onkeypress='return ((event.charCode >= 48 && event.charCode <= 57))' required/>
</div>
    
<div class="form-group col-xs-4 col-md-4">
  <label for="name" class="control-label">Mobile Number</label>
  <input name="selfmobile"  id="selfmobile" class="form-control"  placeholder="Mobile Number" size="100%" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type = "number" maxlength = "10" onkeyup="this.value = this.value.toUpperCase();" onkeypress='return ((event.charCode >= 48 && event.charCode <= 57))' required/>
</div>

<div class="form-group col-xs-4 col-md-4">
  <label for="name" class="control-label">Gender</label>
  <select name="gender" class="form-control selectpicker" required>
    <option value=" ">Select Gender</option>
    <option>FEMALE</option>
    <option>MALE</option> 
    <option>TRANSGENDER</option> 
  </select>
</div>

<div class="form-group col-xs-4 col-md-4">
  <label for="name" class="control-label">First Name</label>
  <input name="firstname"  type="text" id="firstname" class="form-control"  placeholder="First Name" size="100%" onkeyup="this.value = this.value.toUpperCase();" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122))' required/> 
</div>

<div class="form-group col-xs-4 col-md-4">
  <label for="name" class="control-label">Father Name</label>
  <input name="fathername"  type="text" id="fathername" class="form-control"  placeholder="Father Name" size="100%" onkeyup="this.value = this.value.toUpperCase();" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122))' required/> 
</div>

<div class="form-group col-xs-4 col-md-4">
  <label for="name" class="control-label">Surname</label>
  <input name="surname"  type="text" id="surname" class="form-control"  placeholder="Surname" size="100%" onkeyup="this.value = this.value.toUpperCase();" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122))' required/> 
</div>
                                 
<div class="form-group col-xs-3 col-md-3">
  <label for="name" class="control-label">Department</label>
  <select name="department" class="form-control selectpicker" required>
    <option value=" ">Select Department</option>
    <option>Poly in CS</option>
  </select>
</div>


<div class="form-group col-xs-3 col-md-3">
  <label for="name" class="control-label">Part/Year</label>
  <select name="faculty" class="form-control selectpicker" required>
    <option value=" ">Select Part</option>
    <option>PART I</option>
    <option>PART II</option>
    <option>PART III</option>
  </select>
</div>

<div class="form-group col-xs-4 col-md-4">
  <label for="name" class="control-label">Email ID</label>
  <input name="email"  type="email" id="email" class="form-control"  placeholder="Email ID" size="100%" onkeyup="this.value = this.value.toLowerCase();" required/> 
</div>

<style type="text/css">
 .btn, .btn-xs {
  padding: .50rem .8rem;
  font-size: 1.6rem;
  line-height: 1.0;
  border-radius: .4rem;
}
</style>

<div class="form-group col-xs-2 col-md-2">
  <label for="name" class="control-label">Click</label>
  <button type="submit" class="btn btn-success btn-xs" name="btnReg">
   <strong style="color: white;font-weight: bold;">Register</strong> 
   <span class="glyphicon glyphicon-send"></span>
  </button>
</div>

                           <div class="row">
                            
                           	<div class="col-md-12 col-sm-12 text-right">
                              
                             		
                               
                           	</div>
                           </div>
   
     </form>
                                </p>

                                <p>
                                       <center><h3>
                                              <?php
  error_reporting(E_ALL);
  include 'connection/connection.php';
 if (isset($_POST['btnReg']))
 {
      $varUserName=trim($_POST['adharcard']);

      $contact=trim($_POST['selfmobile']);
      $gender=trim($_POST['gender']);
      $first_name=trim($_POST['firstname']);
      $mid_name=trim($_POST['fathername']);
      $last_name =trim($_POST['surname']);
      $user_name =trim($_POST['adharcard']);
 
      $department =trim($_POST['department']);
      $faculty =trim($_POST['faculty']);
      $email =trim($_POST['email']);

           
                     
   $varCheckUserQuery="SELECT * FROM tbl_registration_student WHERE user_name='$varUserName'";
  
  $tbl_login=$objCon->query($varCheckUserQuery);
  
  $varFind=$tbl_login->num_rows;
    
    if($varFind>0)
    {
       echo "<span style='color:red'>User, $user_name Already Register</span>";        
    }
    else
    {

      $varQueryInsertMachine="INSERT INTO tbl_registration_student(contact, gender, first_name, last_name, user_name, department, faculty, email, mid_name) VALUES('$contact', '$gender', '$first_name', '$last_name', '$user_name', '$department', '$faculty', '$email', '$mid_name');";

        if($objCon->query($varQueryInsertMachine)===true)
        {
         echo "<span style='color:green'>User, $user_name Register Sucessfully</span>";
        }
        else
        {
            echo "<span style='color:orange'>User, $user_name Register Fail</span>";
            $varStatusMsg="<span style='font-size: 10px;font-weight: bold;color:orange'>Error: $varQueryInsert - - > $objCon->error</span>";
        } 


    }

 
 
  }
 ?>


                                       

                                       </h3></center>
                               </p>
                 
                              
                            </div>