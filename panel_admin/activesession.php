<?php
     include "../connection/connection.php";
     $sqlCurrentSession1 = "SELECT * FROM tbl_list_year WHERE status='1'";  
     $rs_CurrentSession1=$objCon->query($sqlCurrentSession1);
     $rowCurrentSession1=$rs_CurrentSession1->fetch_assoc();

     $varCurrentSession1=$rowCurrentSession1['listyear'];

$navPage='Active Session';
$classIcon="glyphicon glyphicon-time";

if(session_id()){}  else  {  session_start(); }

?>

<?php
if (isset($_SESSION["varSesUserType"]) AND $_SESSION["varSesUserType"]=="LoginSuccessAdmin")
{
?>
  <?php include("add_page_top_link.php"); ?>  
  <script src="../bootstrap37/datepicker/jquery.js"></script>  

   <div class="row">
  <!-- Raj Coloumn Start -->
     <div class="col-md-12 col-sm-12 col-lg-12" style="border: 1px solid grey">
  <h2><?php echo ucwords($navPage)," $varCurrentSession1"; ?></h2>
  <p>Choose Year from Below for <?php echo ucwords($navPage); ?></p> 
  <hr style="border:1px solid black">
  <form class="form-horizontal" method="post" name="reg_form" id="reg_form" enctype="multipart/form-data">

        



			
 
                 
 
         <?php
         include "../connection/connection.php";
         $sqlpagename ="SELECT * FROM tbl_list_year ORDER BY listyear ASC"; 
         $rs_resultpagename=$objCon->query($sqlpagename);
          if($rs_resultpagename->num_rows>0)
          {
            while ($rowpagename=$rs_resultpagename->fetch_array()) 
            {
                $sessionYear=$rowpagename['listyear'];
                $sessionId=$rowpagename['id'];
                $sessionStatus=$rowpagename['status'];
                if($sessionStatus=='1')
                {          
              ?>
<div class="form-check">
  <input class="form-check-input" type="radio" name="frmlistyear" id="frmlistyear" value="<?php echo $sessionId; ?>" checked onchange="addCourse()">
  <label class="form-check-label" for="exampleRadios1">
    <?php echo $sessionYear; ?>
  </label>
</div>

                <?php
                  }
                  else
                  {
                    ?>

<div class="form-check">
  <input class="form-check-input" type="radio" name="frmlistyear" id="frmlistyear" value="<?php echo $sessionId; ?>" onchange="addCourse()">
  <label class="form-check-label" for="exampleRadios1">
    <?php echo $sessionYear; ?>
  </label>
</div>

 


              <?php
              }/*Else End*/
            } 
         }
         $objCon->close();
    ?>

                        
  
  

   




          <script>

            $('input[type=radio][name=frmlistyear]').change(function() {

            listid=this.value;


            $.post("activesession_update.php?listid="+listid, function(pagedata, pagestatus)
          {
          if(pagestatus=="success")
          {
                //alert("Data: " + pagedata + " And Status: " + pagestatus);
                if(pagedata==1)
                {
                  alert('Session Year Updated');  
                  location.reload();                 }
                else
                {
                 alert('Session Year Not Updated');   
                  location.reload(); 
                }
                
          }
        }
        );

   
    

});
 

</script>

               
       
               
  
  

   




                                 

 
	  </form>
 


 <?php
  if(isset($_POST['btnActive']))
  {
  
		include "../connection/connection.php";
    include_once("../connectionmanager.php");
    
    $varSelectCourseID = trim(strtolower($_POST['select_course']));
    $sqlIDC ="SELECT * FROM tbl_courses WHERE id='$varSelectCourseID'"; 
    $rs_resultIDC=$objCon->query($sqlIDC);
    $rowIDC=$rs_resultIDC->fetch_array();

    $varSelectCourse = trim(strtolower($rowIDC['coursename']));
    $varSelectSubject = trim(strtoupper($_POST['select_subject']));
    $varSelectYear = trim($_POST['select_year']);
    $varSelectUser =$_POST['updateStatus'];
  
   $sql1 ="SELECT * FROM tbl_subjectincharge WHERE coursename='$varSelectCourse' AND subjectname='$varSelectSubject' AND foryear='$varSelectYear' AND username='$varSelectUser'";
   $rs_result1=$objCon->query($sql1);

   $sql2 ="SELECT * FROM tbl_subjectincharge WHERE coursename='$varSelectCourse' AND subjectname='$varSelectSubject' AND foryear='$varSelectYear'";
   $rs_result2=$objCon->query($sql2);

  if($rs_result1->num_rows>0)
  {
          echo "<script>alert('Subject Incharge Already Updated')</script>";
  }
  elseif($rs_result2->num_rows>0)
  {
     $sqlUpadate="UPDATE tbl_subjectincharge SET username='$varSelectUser' WHERE coursename='$varSelectCourse' AND subjectname='$varSelectSubject' AND foryear='$varSelectYear'";
    
      if($objCon->query($sqlUpadate)===true)
      {
          echo "<script>alert('Subject Incharge Updated')</script>";
      }
      else
      {
          echo "<script>alert('Subject Incharge Not Updated')</script>";
          echo "Error: " . $sqlUpadate . " - - > " . $objCon->error;
      }
  }
  else
  {
     $sqlInsert="INSERT INTO tbl_subjectincharge(username, coursename, subjectname, foryear) VALUES('$varSelectUser', '$varSelectCourse', '$varSelectSubject', '$varSelectYear')";
    
      if($objCon->query($sqlInsert)===true)
      {
          echo "<script>alert('Subject Incharge Added')</script>";
      }
      else
      {
          echo "<script>alert('Subject Incharge Not Added')</script>";
          echo "Error: " . $sqlInsert . " - - > " . $objCon->error;
      }
  }


  }

?>

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
 

            select_course: {
                    validators: {
                        notEmpty: {
                        message: 'Please supply select_course'
                      }

                    }
               },


            select_year: {
                    validators: {
                        notEmpty: {
                        message: 'Please supply select_year'
                      }

                    }
               },

            pdf_course: {
                    validators: {
                        notEmpty: {
                        message: 'Please supply pdf_course'
                      }

                    }
               },

            pdf_title: {
                    validators: {
                        notEmpty: {
                        message: 'Please supply pdf_title'
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

            select_subject: {
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




<?php        include "add_page_bottom_link.php";       ?>
<?php
}
else
{
      echo "<script>location='index.php'</script>";

}
?>