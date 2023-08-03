<?php
$navPage='Out Time';
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

     $varOldPhotoUrl="$photo";
   

    
    
    
?>
 
 <?php 
 


    $currentTimezone = new DateTimeZone("Asia/Kolkata" );
    $currentDate = new DateTime();
    $currentDate->setTimezone($currentTimezone);
 
    $currentDateTime= $currentDate->format( 'g:i A l jS F Y');
    $currentDateTime= $currentDate->format( 'g:i A l jS F Y');
    $currentDateYMD= $currentDate->format( 'Y-m-d');
    $vcurrent_date= $currentDate->format( 'd-F-Y');


    include('connectionmanager.php');
    $resultEvents=$con->selectdistinctWhere('tbl_visitor','remark,student_id,vcurrent_date,vcurrent_time',"vcurrent_date='$vcurrent_date' ORDER BY created DESC");
    include('ssn.php');

?>

 
                          <?php include("add_page_top_link.php"); ?>  
        

 

    <link href="../bootstrap37/datepicker/bootstrap-datepicker.css" rel="stylesheet">  
    <script src="../bootstrap37/datepicker/jquery.js"></script>  
    <script src="../bootstrap37/datepicker/bootstrap-datepicker.js"></script> 

        
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
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

                        
                        <div class="row">
                            <div class="col-md-6">



                                
                                <form class="form-horizontal" method="post" name="reg_form" id="reg_form" enctype="multipart/form-data">
                                    <div class="panel panel-danger" style="box-shadow: 10px 10px 10px grey; ">
                                        <div class="panel-heading">
                                             
                                            <h4 class="panel-title">Add <?php echo ucfirst($navPage);?></h4>
                                           
                                        </div>
                                        <div class="panel-body">
                                           
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Student Username:</label>
                                                <div class="col-sm-8">
                                                    <input name="student_id"  id="student_id" class="form-control"  placeholder="Adharcard Number" size="100%" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type = "number" maxlength = "12"   required/>
                                                </div>
                                            </div><!-- form-group -->
                                            
                                            
                                            
                                            
 
                                        </div><!-- panel-body -->
                                        <div class="panel-footer text-center">
                                             <button type="reset" class="btn btn-default">Reset</button>
                                            <input type="submit" name="sub" value="Add <?php echo $navPage; ?>" class="btn btn-primary">
                                        </div>
                                    </div>
                                </form>

                                

                            </div>



  <?php

ini_set("max_execution_time", 3000); 
include_once("connectionmanager.php");
include('ssn.php');

if(isset($_POST["sub"]))
{
     
    $student_id = $_POST["student_id"];
    $currentTimezone = new DateTimeZone("Asia/Kolkata" );
    $currentDate = new DateTime();
    $currentDate->setTimezone($currentTimezone);
 
    $currentDateTime= $currentDate->format( 'g:i A l jS F Y');
    $currentDateTime= $currentDate->format( 'g:i A l jS F Y');
    $currentDateYMD= $currentDate->format( 'Y-m-d');
    $vcurrent_date= $currentDate->format( 'd-F-Y');
    $vcurrent_time= $currentDate->format( 'h:i:s A');

    $remark = "$navPage";
    
    
    
            
      

        $varQueryInsert="INSERT INTO tbl_visitor(student_id, vcurrent_date, vcurrent_time, remark) VALUES('$student_id', '$vcurrent_date', '$vcurrent_time', '$remark');";

        if($objCon->query($varQueryInsert)===true)
        {
            echo "<script>alert('Out Time Added Successfully')</script>";
            echo "<script>location='computer_lab_in.php'</script>";
        }
        else
        {
            echo "<script>alert('Faile To Added')</script>";
            $varStatusMsg="<span style='font-size: 10px;font-weight: bold;color:red'>Error: $varQueryInsert - - > $objCon->error</span>";
        } 
 
}
 
?>



                               <div class="col-md-6">
                                <div class="table-responsive">
                                    <table class="table table-primary mb30">
                                        <thead>
                                          <tr>
                                            <th>Sr. No.</th>
                                            <th>Student Name</th>
                                            <th>Out Date</th>
                                            <th>Out Time</th>
                                            <th>Remark</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                         <?php
                                         $i=1;  
                                            while($row=mysqli_fetch_assoc($resultEvents))
                                            {
                                                    
                                         ?>  
                                          <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $row['student_id']; ?></td>
                                            <td><?php echo $row['vcurrent_date']; ?></td>
                                            <td><?php echo $row['vcurrent_time']; ?></td>
                                            <td><?php echo $row['remark']; ?></span></a></td>

                                             
                                            
                                          </tr>
                                        <?php $i++;} ?>
                                        </tbody>
                                    </table>
                                </div><!-- table-responsive -->
                            </div>
                            <!-- col-md-6 -->
                        </div>
                         
                      <div class="row"><!-- col-md-6 --><!-- col-md-6 --> 
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

          course_type: {
                    validators: {
                        notEmpty: {
                        message: 'Please Select Course Type'
                      }
                       

                    }
               },

 


         


               student_id: {
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

            fees: {
                    validators: {
                        notEmpty: {
                        message: 'Please supply Fees'
                      },
                      regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'Fees can only consist of digits'
                        },
                        stringLength: {
                        min: 1,
                        max: 15,
                        message: 'The digit of Fees must be between %s and %s'
                    },

                    }
                },
 

            subjectcode: {
                    validators: {
                        notEmpty: {
                        message: 'Please supply subjectcode'
                      }

                    }
               },


            longname: {
                    validators: {
                        notEmpty: {
                        message: 'Please supply longname'
                      }

                    }
               },

              shortname: {
                    validators: {
                        notEmpty: {
                        message: 'Please supply Short Name'
                      },
                      regexp: {
                        regexp: /^[0-9a-zA-Z_]+$/,
                        message: 'Short Name can not consist of white space'
                        },
                         

                    }
                },

            event_name: {
                    validators: {
                        notEmpty: {
                        message: 'Please supply coursename'
                      }

                    }
               },

            sessionname: {
                    validators: {
                        notEmpty: {
                        message: 'Please supply sessionname'
                      }

                    }
               },


            coursename: {
                    validators: {
                        notEmpty: {
                        message: 'Please supply coursename'
                      }

                    }
               },

            pagename: {
                    validators: {
                        notEmpty: {
                        message: 'Please supply pagename'
                      }
                       

                    }
               },

            pdf_subject: {
                    validators: {
                        notEmpty: {
                        message: 'Please supply subject'
                      }
                       

                    }
               },

            qualification: {
                    validators: {
                        notEmpty: {
                        message: 'Please supply qualification'
                      }
                       

                    }
               },

              

              
              


              
                             joining_date: {
                    validators: {
                        notEmpty: {
                        message: 'Please Select Joining Date'
                      },
                      date: 
                       {
                        format:'YYYY-MM-DD',
                        message:'Date is not valid'
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
                        max: 14,
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
             

            fileUpload: {
                validators: {
                    notEmpty: {
                        message: 'Please Uploade Your pdf'
                    },
                    file: {
                        extension: 'pdf',
                        type: 'application/pdf',
                        //maxSize: 2097152,   // 2048 * 1024  = 2MB
                        message: 'The selected file is not valid only valid .pdf file'
                    }
                }
            },
 
    
         
       
            
            }
        })
    
  
});



 </script>

 
<script>
 

function preview_image() 
{
 var total_file=document.getElementById("upload_file").files.length;
 for(var i=0;i<total_file;i++)
 {
  $('#image_preview').append("<img width=200 height=200 src='"+URL.createObjectURL(event.target.files[i])+"'> ");
 }
}
</script>


 <?php
        include "add_page_bottom_link.php";
       ?>
       

<?php
}
else
{
      echo "<script>location='index.php'</script>";

}
?>
