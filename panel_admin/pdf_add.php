<?php
$navPage='uploaddata';
$classIcon="fa fa-file";

if(session_id()){}  else  {  session_start(); }
?>

<?php
if (isset($_SESSION["varSesUserType"]) AND $_SESSION["varSesUserType"]=="LoginSuccessAdmin")
{
?>


<?php 
 include('ssn.php');

include('connectionmanager.php');
$added_for="addpdf";
                           $varLoginUserName=$_SESSION["u_name"];

$resultEvents=$con->selectdistinctWhere('tbl_pdf','location',"username='{$varLoginUserName}' and added_for='{$added_for}'");


    $currentTimezone = new DateTimeZone("Asia/Kolkata" );
    $currentDate = new DateTime();
    $currentDate->setTimezone($currentTimezone);
 
    $currentDateTime= $currentDate->format( 'g:i A l jS F Y');
    $currentDateTime= $currentDate->format( 'g:i A l jS F Y');
    $currentDateYMD= $currentDate->format( 'Y-m-d');

?>


<?php
     include "../connection/connection.php";

                           $varLoginUserName=$_SESSION["u_name"];
                        

     $sql = "SELECT * FROM tbl_registration_admin WHERE user_name='$varLoginUserName'";  
     $rs_result=$objCon->query($sql);
     $rowXX=$rs_result->fetch_assoc();
     extract($rowXX);
     $varPassword=$password;

     $varOldPhotoUrl="$photo";
   

    
?>





  <?php include("add_page_top_link.php"); ?>  
  <script src="../bootstrap37/datepicker/jquery.js"></script>  


  <div class="row">
       <div class="col-md-12">
<!-- xxxx -->

 

<style type="text/css">
.help-block {
    color: #E74C3C;
} 
.form-group
{
  margin-bottom: 0px;
}
</style>

 

                         <div class="row">
                            <div class="col-md-6">
                                <form class="form-horizontal" method="post" name="reg_form" id="reg_form" enctype="multipart/form-data">
                                    <div class="panel panel-danger" style="box-shadow: 10px 10px 10px grey;">
                                        <div class="panel-heading">
                                             
                                            <h4 class="panel-title">Add PDF</h4>
                                           
                                        </div>
                                        <div class="panel-body">

                                            <div class="form-group">
                                                    <label class="col-sm-4 control-label">Upload File:</label>
                                                        <div class="col-sm-8">
                                                        <input type="file" id="upload_file" name="fileUpload" class="fileUpload form-control" accept="application/pdf"/>
                                                    </div>
                                            </div><!-- form-group -->

                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Choose Department:</label>
                                                <div class="col-sm-8">
                                                <select name="pdf_department" id="pdf_department" class="form-control selectpicker" onchange="addSubject()" required>
                                                        <option value=" ">Select Department</option>
                                                        <?php
                                                                     include "../connection/connection.php";
                                                                     $sql ="SELECT DISTINCT course_name FROM tbl_courses_subject"; 
                                                                     $rs_result=$objCon->query($sql);
                                                                      if($rs_result->num_rows>0)
                                                                      {
                                                                      
                                                                        while ($rowY=$rs_result->fetch_array()) 
                                                                        {
                                                                            $course_name=strtoupper($rowY['course_name']);
                                                                            if(strlen($course_name)!=0)
                                                                            {
                                                                               echo "<option>$course_name</option>";   
                                                                            }
                                                                        } 
                                                                     }
                                                                   // echo "<option>None of This </option>";
                                                                      $objCon->close();
                                                            ?>


                                                      </select>                                                </div>
                                            </div><!-- form-group -->

                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Choose Part/Semester:</label>
                                                <div class="col-sm-8">
                                                <select name="pdf_part" class="form-control selectpicker" id="pdf_part" onchange="addSubject()" required>
                                                        <option value=" ">Select Part/Semester</option>
                                                        <?php
                                                                     include "../connection/connection.php";
                                                                     $sql ="SELECT DISTINCT course_part FROM tbl_courses_subject"; 
                                                                     $rs_result=$objCon->query($sql);
                                                                      if($rs_result->num_rows>0)
                                                                      {
                                                                      
                                                                        while ($rowY=$rs_result->fetch_array()) 
                                                                        {
                                                                            $course_part=strtoupper($rowY['course_part']);
                                                                            if(strlen($course_part)!=0)
                                                                            {
                                                                               echo "<option>$course_part</option>";   
                                                                            }
                                                                        } 
                                                                     }
                                                                   // echo "<option>None of This </option>";
                                                                      $objCon->close();
                                                            ?>


                                                      </select>                                                </div>
                                            </div><!-- form-group -->


<script>
  function addSubject()
  {
    vpdf_part=document.getElementById('pdf_part');
    vpdf_department=document.getElementById('pdf_department');
    
    tpdf_part=vpdf_part.value;
    tpdf_department=vpdf_department.value;
         //alert(tpdf_part+tpdf_department);
        $.post("pdf_add_show_subject.php?course_part="+tpdf_part+"&course_name="+tpdf_department,
        function(pagedata, pagestatus)
        {
          if(pagestatus=="success")
          {
                //alert("Data: " + pagedata + " And Status: " + pagestatus);
                $("#pdf_subject").html(pagedata);
          }
        }
        );
   }
</script>





                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Choose Course:</label>
                                                <div class="col-sm-8">
                                                <select name="pdf_subject" id="pdf_subject" class="form-control selectpicker" required>
                                                        <option value=" ">Select Subject</option>
                                                        <option value=" ">Select Subject</option>


                                                      </select>                                                
                                                  </div>
                                            </div><!-- form-group -->

                                            
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Choose Type:</label>
                                                <div class="col-sm-8">
                                                <select name="pdf_type" class="form-control selectpicker" required>
                                                        <option value=" " >Select Type</option>
                                                         <option>Notes</option>


                                                      </select>                                                
                                                  </div>
                                            </div><!-- form-group -->
                                  
                                               <div class="form-group">
                                                <label class="col-sm-4 control-label">Choose Year:</label>
                                                <div class="col-sm-8">
                                                <select name="pdf_year" class="form-control selectpicker" required>
                                                        <option value=" " >Select Year</option>
                                                        <?php
                                                                     include "../connection/connection.php";
                                                                     $sql ="SELECT * FROM tbl_list_year WHERE status = '1'"; 
                                                                     $rs_result=$objCon->query($sql);
                                                                      if($rs_result->num_rows>0)
                                                                      {
                                                                      
                                                                        while ($rowY=$rs_result->fetch_array()) 
                                                                        {
                                                                            $listyear=strtoupper($rowY['listyear']);
                                                                            if(strlen($listyear)!=0)
                                                                            {
                                                                               echo "<option>$listyear</option>";   
                                                                            }
                                                                        } 
                                                                     }
                                                                   // echo "<option>None of This </option>";
                                                                      $objCon->close();
                                                            ?>


                                                      </select>                                                </div>
                                            </div><!-- form-group -->

                                             <input type="hidden" value="<?php echo $added_for; ?>" name="added_for" class="datepicker form-control" />
                                                    
                                             <div class="form-group">
                                                <label class="col-sm-4 control-label">Title:</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="pdf_title" class="form-control"/>
                                                </div>
                                            </div><!-- form-group -->

                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Short Description:</label>
                                                <div class="col-sm-8">
                                                    <textarea name="pdf_descr" class="form-control" required></textarea> 
                                                </div>
                                            </div><!-- form-group -->
                                            
                                           
                                          
                                            
                                            
 
                                        </div><!-- panel-body -->
                                        <div class="panel-footer text-center">
                                             <button type="reset" class="btn btn-default">Reset</button>
                                            <input type="submit" name="sub" value="Add PDF" class="btn btn-primary">
                                        </div><!-- panel-footer -->
                                    </div><!-- panel-default -->
                                </form>
                            </div><!-- col-md-6 -->







                               <div class="col-md-6">
                                <div class="table-responsive">
                                    <table class="table table-primary mb30">
                                        <thead>
                                          <tr>
                                            <th>Sr No.</th>
                                            <th>Type</th>
                                            <th>Update</th>
                                             
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
                                            <td><?php echo $row['location']; ?></td>
                                             <td><a href="pdf_add_events_rows.php?ptype=<?php echo $row['location']; ?>&pfor=<?php echo $added_for; ?>"> <span class="fa  fa-eye"></span></a></td>
                                             

                                             
                                            
                                          </tr>
                                        <?php $i++;} ?>
                                        </tbody>
                                    </table>
                                </div><!-- table-responsive -->
                            </div>
                            <!-- col-md-6 -->
                        </div>
                      <!-- Row End -->
                       



<!-- xxx -->
       </div>
  </div>
  








  
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


               pdf_descr: {
                    validators: {
                        notEmpty: {
                        message: 'Please supply Description'
                      },
                        stringLength: {
                        min: 1,
                        max: 120,
                        message: 'The Description must be between %s and %s Charectors'
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
 

            pdf_type: {
                    validators: {
                        notEmpty: {
                        message: 'Please supply pdf type'
                      }

                    }
               },

               pdf_department: {
                    validators: {
                        notEmpty: {
                        message: 'Please supply Department'
                      }

                    }
               },

                pdf_part: {
                    validators: {
                        notEmpty: {
                        message: 'Please supply course part'
                      }

                    }
               },

               pdf_subject: {
                    validators: {
                        notEmpty: {
                        message: 'Please supply course subject'
                      }

                    }
               },


            pdf_year: {
                    validators: {
                        notEmpty: {
                        message: 'Please supply PDF Year'
                      }

                    }
               },


            pdf_title: {
                    validators: {
                        notEmpty: {
                        message: 'Please supply PDF Title'
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

            faculty: {
                    validators: {
                        notEmpty: {
                        message: 'Please supply faculty'
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


<?php        include "add_page_bottom_link.php";       ?>






















<?php

ini_set("max_execution_time", 3000); 
include_once("connectionmanager.php");

if(isset($_POST['sub']))
{

                $idcount=0;
                $resma = $con->selectmax("tbl_pdf","evtid");
                $resmax=mysqli_fetch_assoc($resma);
                $idcount=$resmax["maximum"]+1;
                $result = mysqli_query($con->dbconnect(),"SHOW TABLE STATUS LIKE 'tbl_pdf'");
                $row77 = mysqli_fetch_array($result);
                $sequence = $row77['Auto_increment']; 
            
                 include "../connection/connection.php";


                $varType = mysqli_real_escape_string($objCon,strtoupper(trim($_POST['pdf_type'])));
                $varYear = mysqli_real_escape_string($objCon,strtoupper(trim($_POST['pdf_year'])));
                $varTitle = mysqli_real_escape_string($objCon,trim($_POST['pdf_title']));
                                $course_name = mysqli_real_escape_string($objCon,trim($_POST['pdf_department']));
                                $course_part = mysqli_real_escape_string($objCon,trim($_POST['pdf_part']));
                                $subject_name = mysqli_real_escape_string($objCon,trim($_POST['pdf_subject']));

                $varAddedFor = mysqli_real_escape_string($objCon,strtolower(trim($_POST['added_for'])));
                $varDescription = mysqli_real_escape_string($objCon,trim($_POST['pdf_descr']));

                $varAddedBy="$first_name $mid_name $last_name";
                $varDepartment="$course_name";

    $msg="";
    $newfilename="$varType $varTitle $varYear";

        $folder="impnotes/$newfilename";
     
     $uploadfile=$_FILES["fileUpload"]["tmp_name"];
     $uploadfileAs="$folder".$_FILES["fileUpload"]["name"];

     $varExtension="$uploadfileAs";
     //$varExtension=end(explode('.', $varExtension));
     $varExtension=pathinfo($varExtension, PATHINFO_EXTENSION);
     $varExtensionSmall=strtolower($varExtension);

     $uploadfileAs="$folder".".".$varExtension;

        if($varExtensionSmall=="pdf")
        {
            $varCheckUserQuery="SELECT * FROM tbl_pdf WHERE image_name = '$uploadfileAs'";
            $tbl_login=$objCon->query($varCheckUserQuery);
            $varFind=$tbl_login->num_rows;
            if($varFind>0)
            {
                    $msg="File Already Uploaded";
            }
            else
            {
                  if(move_uploaded_file($uploadfile, "../images/".$uploadfileAs))
                    {
                        $msg="File Uploaded";
                         $varQuery="INSERT INTO tbl_pdf(sequence, evtid, event_name, location, details, description, event_date, image_name, thumb_name, added_by, added_for, department, year, username, pdf_course, pdf_subject) VALUES('$sequence','$idcount','$newfilename','$varType','$varTitle','$varDescription','$currentDateYMD','$uploadfileAs','$uploadfileAs','$varAddedBy','$varAddedFor','$varDepartment','$varYear','$varLoginUserName','$course_part','$subject_name')";

    
                          if($objCon->query($varQuery)===true)
                          {
                                      //   echo "<script>location='add_pdf.php'</script>";     
                          }

                    }
                    else
                    {
                        $msg="File not Uploaded";   
                    }
            }


                   
        }
        else
        {
             $msg="Please Provide PDF File Only";
        }
        echo "<script>alert('$msg')</script>";
    
        redirect('pdf_add.php');

    exit();
}
?>

<?php
}
else
{
      echo "<script>location='index.php'</script>";

}
?>