<?php
$navPage='profile';
$classIcon="glyphicon glyphicon-cog";

if(session_id())
{

}
else
{
  session_start();
}

 ?>

<?php
if (isset($_SESSION["varSesUserType"]) AND $_SESSION["varSesUserType"]=="LoginSuccessAdmin")
{
?>


<?php


    $currentTimezone = new DateTimeZone("Asia/Kolkata" );
    $currentDate = new DateTime();
    $currentDate->setTimezone($currentTimezone);
 
    $currentDateTime= $currentDate->format( 'g:i A l jS F Y');
    $currentDateTime= $currentDate->format( 'g:i A l jS F Y');
    $currentDateYMD= $currentDate->format( 'Y-m-d');
    $currentDateY=$currentDate->format('Y');
    $varJoiningDate=$currentDateYMD;

     include "../connection/connection.php";
     $varLoginUserName=$_SESSION["u_name"];
     $sql = "SELECT * FROM tbl_registration_admin WHERE user_name='$varLoginUserName'";  
     $rs_result=$objCon->query($sql);
     $row=$rs_result->fetch_assoc();
     extract($row);
     $varPassword=$password;

  
    
?>
 
 
                          <?php include("add_page_top_link.php"); ?>  
        

 

    <link href="../bootstrap37/datepicker/bootstrap-datepicker.css" rel="stylesheet">  
    <script src="../bootstrap37/datepicker/jquery.js"></script>  
    <script src="../bootstrap37/datepicker/bootstrap-datepicker.js"></script> 

        
      
        <style type="text/css">
            .form-group
            {
                margin: 0px;
                padding: 0px;
            }
        </style>
           
                        <div class="row">
                            <div class="col-md-12">

<style type="text/css">
.help-block {
    color: #E74C3C;
}
</style>

<form class="form-horizontal" method="post"  id="reg_form" enctype="multipart/form-data">

      <div class="panel panel-danger" style="box-shadow: 10px 10px 10px grey"><!-- panel-Main -->
 
        
        <div class="panel-body">
                      

   <div class="form-groupFG col-md-12">

         <div class="col-md-4  inputGroupContainer"><strong>First Name</strong>
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input name="firstname" placeholder="First Name" class="form-control"  type="text" value="<?php echo strtoupper($first_name); ?>" />
          </div>
        </div>
      
         <div class="col-md-4  inputGroupContainer"><strong>Middle Name</strong>
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input name="middlename" placeholder="Middle Name" class="form-control"  type="text" value="<?php echo strtoupper($mid_name); ?>" />
          </div>
        </div>
      
         <div class="col-md-4  inputGroupContainer"><strong>Last Name</strong>
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input name="lastname" placeholder="Last Name" class="form-control"  type="text" value="<?php echo strtoupper($last_name); ?>" />
          </div>
        </div>
 
 
        
         <div class="col-md-4  inputGroupContainer"><strong>Mobile Number</strong>
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
            <input name="mobile" placeholder="Mobile Number" class="form-control"  type="text" maxlength="10" value="<?php echo strtoupper($contact); ?>" />
          </div>
        </div>
      
         <div class="col-md-4  inputGroupContainer"><strong>Adhar Number / Username</strong>
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input name="username1" id="username1" placeholder="Adhar Card Number" class="form-control"  type="text" maxlength="12" value="<?php echo strtoupper($user_name); ?>" readonly/>
          </div><span id="idUsernameMsg1"></span>
        </div>


        <div class="col-md-4 selectContainer"><strong>Gender</strong>
            <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-hand-right"></i></span>
              <select name="gender" class="form-control selectpicker" >
                <option><?php echo strtoupper($gender); ?></option>
                <option>Female</option>
                <option>Male</option> 
              </select>
            </div>
          </div>

<div class="col-md-12"> 
   
</div>
           

  


         <div class="col-md-4  inputGroupContainer"><strong>Birth Date</strong>
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                <input name="birth_date" placeholder="Birth Date (yyyy-mm-dd)" class="form-control"  type="text"  id="birth_date" value="<?php echo strtoupper($birth_date); ?>" readonly/>
              </div>
         </div>

         <script type="text/javascript">
            
            $(document).ready(function () {
                
                $('#birth_date').datepicker({
                      autoclose: true,
                         
                                endDate: new Date(),

                    format: "yyyy-mm-dd"
                });  
            
            });
        </script>


         <div class="col-md-4  inputGroupContainer"><strong>Email</strong>
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            <input name="email" placeholder="E-Mail Address" class="form-control"  type="text" value="<?php echo strtolower($email); ?>"/>
          </div>
        </div>

        <div class="col-md-4 inputGroupContainer"><strong>Password</strong>
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-cog"></i></span>
            <input name="password" minlength="8" placeholder="Password" class="form-control"  type="password" value="<?php echo $varPassword; ?>" onclick="this.type='text'"  onmouseout="this.type='password'"/>
          </div>
        </div>


        <div class="col-md-12  inputGroupContainer"><h2>Site Title</h2>
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-cloud"></i></span>
            <input name="sitetitlename" placeholder="Site Title" class="form-control"  type="text" value="<?php echo $sitetitle; ?>" />
          </div>
        </div>

 
         <div class="col-md-12 inputGroupContainer" >
            <label class="control-label"> <strong>Description</strong></label>

        <script type="text/javascript" src="editor/nicEdit.js"></script>
        <script type="text/javascript">
            bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
        </script>       
             <textarea name="details" class="form-control"></textarea>


              
        </div>
  
      
 
      </div>


              
               
              
        </div> 


        <div class="panel-footer">
           <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                              <button type="submit" class="btn btn-warning" name="btnRegisterStaffUpdate"  id="btnRegisterStaff">
                                 <strong style="color: white;font-weight: bold;">Update</strong> 
                                 <span class="glyphicon glyphicon-edit"></span>
                              </button>
                            </div>
                          </div>


     
        </div> 


        
      </div>
                           
      
                </form> 
           


                            </div>
                               
                            
                        </div>
                         
                      <div class="row"> 
                        <div class="col-md-12">
                             <div id="image_preview"></div>

                        </div>
                      </div><!-- row -->
                    
 
         

  
  <script src='../bootstrap37/validation/bootstrapvalidator_0.5.2_js_bootstrapValidator.min.js'></script>

<script type="text/javascript">
 
   $(document).ready(function() {
    $('#reg_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {

          usertype: {
                    validators: {
                        notEmpty: {
                        message: 'Please Select User Type'
                      }
                       

                    }
               },

               username: {
                    validators: {
                        notEmpty: {
                        message: 'Please supply Adhar Card Number'
                      },
                      regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'Adhar Card can only consist of digits'
                        },
                        stringLength: {
                        min: 12,
                        max: 12,
                        message: 'The digit of Adhar Card must be between %s and %s'
                    },

                    }
                },


                 firstname: {
                validators: {
                  stringLength: {
                        min: 2,                       
                        message:'Enter Minimum %s Charector'
                    },
                        notEmpty: {
                        message: 'Please supply First Name'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z.]+$/,
                        message: 'The First Name can only consist of letters'
                        }
                }
            },

               middlename: {
                validators: {
                  stringLength: {
                        min: 2,                       
                        message:'Enter Minimum %s Charector'
                    },
                        notEmpty: {
                        message: 'Please supply Middle Name'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: 'The Middle Name can only consist of letters'
                        }
                }
            },

               lastname: {
                validators: {
                  stringLength: {
                        min: 2,                       
                        message:'Enter Minimum %s Charector'
                    },
                        notEmpty: {
                        message: 'Please supply Last Name'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: 'The Last Name can only consist of letters'
                        }
                }
            },

   email: {
                validators: {
                    notEmpty: {
                        message: 'Please supply your email address'
                    },
                    emailAddress: {
                        message: 'Please supply a valid Email address'
                    }
                }
            },

            mobile: {
                    validators: {
                        notEmpty: {
                        message: 'Please supply Mobile Number'
                      },
                      regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'Mobile can only consist of digits'
                        },
                        stringLength: {
                        min: 10,
                        max: 10,
                        message: 'The digit of Mobile must be between %s and %s'
                    },

                    }
                },

                 details: {
                validators: {
                      stringLength: {
                        min: 3,
                        max: 200,
                        message:'Please enter at least %s characters and no more than %s'
                    },
                    notEmpty: {
                        message: 'Please supply a Designation '
                    }
                    }
                 }, 

               

                           birth_date: {
                    validators: {
                        notEmpty: {
                        message: 'Please Select Birth Date'
                      },
                      date: 
                       {
                        format:'YYYY-MM-DD',
                        message:'Date is not valid'
                       }

                    }
               },

               password: {
                validators: {
                  stringLength: {
                        min: 8,
                        max: 10,
                        message:'Enter %s to %s Charector'
                    },
                        notEmpty: {
                        message: 'Please supply your password'
                    },
                    regexp: {
                        regexp: /^[\S]+$/,
                        message: 'The password can not contain any whitespaces'
                        },
                    identical: {
                    field: 'confirmPassword',
                    message: 'Confirm your password below - type same password please'
                }
                
                }
            },

          confirmPassword: {
            validators: {
                identical: {
                    field: 'password',
                    message: 'Confirm your password below - type same password please'
                }
            }
        },
            
            gender: {
                    validators: {
                        notEmpty: {
                        message: 'Please supply Gender'
                      }
                       

                    }
               },

              
             
            
      
              xyz: {
                validators: {
                  stringLength: {
                        min: 1,
                        max: 10,
                        message:'Enter %s to %s Charector'
                    },
                        notEmpty: {
                        message: 'Please supply your namesss'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'The xyz can only consist of letters and digits'
                        }
                }
            },
             

            resumeupload: {
                validators: {
                    notEmpty: {
                        message: 'Please Uploade Your Resume'
                    },
                    file: {
                        extension: 'pdf',
                        type: 'application/pdf',
                        
                        message: 'The selected file is not valid only valid .pdf file'
                    }
                }
            },
 
    
         
       
            
            }
        })
    
  
});



 </script>

<script type="text/javascript">
    
     $(document).ready(function()

{

    $("#username").focusout(function(){

             funUsernameCheck();

    });    

    $("#btnRegisterStaff").mousemove(function( event )

    {

       funUsernameCheck();


    });

});



function funUsernameCheck()

{

       var txtuser=$("#username").val();

       $.post("../checkusername.php?qs="+txtuser, function(pagedata, status)
       {  

         if(pagedata==0)
         {   

          

            $("#idUsernameMsg").html("");

         }
         else
         {
          

            $("#idUsernameMsg").html("<span style='color:red'><span class='glyphicon glyphicon-remove'></span>Adharcard Already Taken</span>");

            $("#username").val("");
           

         }

        });

}

</script>

<?php
        include "add_page_bottom_link.php";
       ?>
       
  
 <?php
        include "../../connection/connection.php";
          if(isset($_POST['btnRegisterStaffUpdate']))
          {
 

            $varFirstName = mysqli_real_escape_string($objCon,strtolower(trim($_POST['firstname'])));
            $varMiddleName = mysqli_real_escape_string($objCon,strtolower(trim($_POST['middlename'])));
            $varLastName = mysqli_real_escape_string($objCon,strtolower(trim($_POST['lastname'])));
            $varMobileNumber = mysqli_real_escape_string($objCon,strtolower(trim($_POST['mobile'])));
            $varAdharNumber = mysqli_real_escape_string($objCon,strtolower(trim($_POST['username1'])));
            $varUserName = mysqli_real_escape_string($objCon,strtolower(trim($_POST['username1'])));
            $varGender = mysqli_real_escape_string($objCon,strtolower(trim($_POST['gender'])));
             $varBirthDate = mysqli_real_escape_string($objCon,strtolower(trim($_POST['birth_date'])));
            $varEmail = mysqli_real_escape_string($objCon,strtolower(trim($_POST['email'])));
        
            $varSiteTitle = mysqli_real_escape_string($objCon,trim($_POST['sitetitlename']));
            $varPasswordF = mysqli_real_escape_string($objCon,trim($_POST['password']));
    
    
   
  
  
 


      $varUpdateQ="UPDATE tbl_registration_admin SET first_name ='$varFirstName',mid_name ='$varMiddleName',last_name ='$varLastName',email ='$varEmail',contact ='$varMobileNumber',birth_date ='$varBirthDate',user_name ='$varUserName',gender ='$varGender', password='$varPasswordF', sitetitle='$varSiteTitle'  WHERE user_name='$varLoginUserName'";


      if($objCon->query($varUpdateQ)===true)
      {
           echo "<script>alert('Profile Data Updated')</script>";
          echo "<script>location='profile_update.php'</script>";     
      }
      else
      {
          echo "<script>alert('Profile Data Not Updated')</script>";
          echo "<script>alert('Error: " . $sql . " - - > " . $objCon->error."')</script>";
          echo "<script>location='profile_update.php'</script>";     
      }

 
    }     
  ?>


<?php
}
else
{
      echo "<script>location='index.php'</script>";

}
?>
