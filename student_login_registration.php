<?php
$navPage='studentlogin';
if(session_id())
{

}
else
{
  session_start();
   
}

 ?>

<?php
if (isset($_SESSION["varSesUserType"]) AND $_SESSION["varSesUserType"]=="LoginSuccessStudent")
{
     echo "<script>location='student_otp.php'</script>";
}
else
{

?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <title>
    <?php
    $SiteTitle= '';
        include "sitedetails.php";
        echo $SiteTitle;
    ?>
  </title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="bootstrap37/css/bootstrap.min.css">
  <script src="css/toggle_button_script.js" type="text/javascript"></script>
  <link href="css/dcstyle.css" rel="stylesheet" type="text/css" />


    <link href="bootstrap37/datepicker/bootstrap-datepicker.css" rel="stylesheet">  
    <script src="bootstrap37/datepicker/jquery.js"></script>  
    <script src="bootstrap37/datepicker/bootstrap-datepicker.js"></script> 
    
<?php
   include "styles.php";
?>
  
<style type="text/css">
 
  body
  {
    padding: 0px;
  }
  .form-groupFG
  {
    padding: 0px;
    margin:0px;
  }
  MARQUEE
  {
     display: none;
  }

</style>
</head>
<body>
<header>
 


 <?php
 $pageName="forgotPassword";
  include "Head2Site.php";
  include "Head3NavigationBelow.php";
?> 

</header>


<div class="container-fluid">
  <div class="row">
  
   
<div class="col-md-7 col-sm-7">

  <div class="row">
       <div class="col-md-12 col-sm-12">
        <div style="border: 2px solid grey; border-radius: 25px;padding: 15px 15px 15px 15px;margin: 10px 10px 10px 10px">
            <div class="row">
              <div class="col-md-12 col-sm-12">
                <h3 style="color: #0388d3">Create New Account For Student</h3>
                <?php include "student_reg_form.php"; ?>  
              </div>
            </div>
        </div>
          
      </div>
        
      </div>
  


</div>

    <div class="col-md-5 col-sm-5">
      <div class="row">
       <div class="col-md-12 col-sm-12">
		    <div style="border: 2px solid grey; border-radius: 25px;padding: 15px 15px 15px 15px;margin: 10px 10px 10px 10px">
		      	<div class="row">
		      		<div class="col-md-12 col-sm-12">
		      			<h3 style="color: #0388d3">Student Login</h3>
		      			<p class="text-justify">Use a valid username and password to gain access to the Student backend.</p>
		      		</div>
		      	</div>

		      	<div class="row">
		      		<div class="col-md-3 col-sm-3">
		      			<br><center>
		      			<img src="images/fiximages/student_login.png" class="img img-responsive" width="120px">
		      			
		      			
		      			</center>

		      		</div>
		      		<div class="col-md-9 col-sm-9">
		      			<?php include "student_login_form.php"; ?>	
		      		</div>
		      	</div>
		    </div>
      		
      </div>
        
      </div>

 


 
      
    </div>
    
  </div>
  
</div>   



    </div>
  </div>
</div>

<?php
 include "footer.php";
?>


   <script src="bootstrap37/js/bootstrap.min.js"></script>
 
  <script src='bootstrap37/validation/bootstrapvalidator_0.5.2_js_bootstrapValidator.min.js'></script>

  


<script type="text/javascript">
 
   $(document).ready(function() {
    $('#login_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {

      password: {
                validators: {
                        notEmpty: {
                        message: 'Please supply your password'
                    },
                  
                }
            },

                      gender: {
                    validators: {
                        notEmpty: {
                        message: 'Please supply Gender'
                      }
                       

                    }
                },
 
                username: {
                    validators: {
                        notEmpty: {
                        message: 'Please supply username'
                      },
                      regexp: {
                        regexp: /^[0-9a-z]+$/,
                        message: 'username can only consist of alphabets and digits'
                        },
                        stringLength: {
                        min: 6,
                        max: 12,
                        message: 'The length of username must be between %s and %s'
                    },

                    }
                },
                 
            
                 
            coursesubjectcode: {
                validators: 
                {
                        stringLength:
                        {
                          min: 2,
                        },
                        notEmpty:
                        {
                            message: 'Please supply your Subject Code name for example 1ST1'
                        },
                regexp: {
                        regexp: /^[a-zA-Z0-9]+$/,
                        message: 'The subject Code can only consist of letters and digits'
                        }
                }

       },
             
            coursesubjectname: {
                validators: {
                        stringLength: {
                        min: 3,
                    },
                        notEmpty: {
                        message: 'Please supply your Subject full name for example English'
                    },
                
                }

       },
       
            
            }
        })
    
  
});



 </script>


<script type="text/javascript">

$(document).ready(function() {
$('#reg_form').bootstrapValidator({

fields: {

    firstname: {
            validators: {
                notEmpty: {
                message: 'Please supply First Name'
                },
                regexp: {
                regexp: /^[a-zA-Z]+$/,
                message: 'First Name can only consist of Alphabets'
                }
            }
        },

        fathername: {
            validators: {
                notEmpty: {
                message: 'Please supply Father Name'
                },
                regexp: {
                regexp: /^[a-zA-Z]+$/,
                message: 'Father Name can only consist of Alphabets'
                }
            }
        },

        mothername: {
            validators: {
                notEmpty: {
                message: 'Please supply Mother Name'
                },
                regexp: {
                regexp: /^[a-zA-Z]+$/,
                message: 'Mother Name can only consist of Alphabets'
                }
            }
        },

        surname: {
            validators: {
                notEmpty: {
                message: 'Please supply Last Name'
                },
                regexp: {
                    regexp: /^[a-zA-Z]+$/,
                    message: 'Last Name can only consist of Alphabets'
                }
            }
        },

         project_url: {
            validators: {
                notEmpty: {
                message: 'Please Provide project_url'
                },
                 uri: {
                        message: 'The website(project_url) address is not valid'
                    }
            }
        },

        lastqualification: {
            validators: {
                notEmpty: {
                message: 'Please supply Last Qualification'
                },
                regexp: {
                    regexp: /^[a-zA-Z ]+$/,
                    message: 'Last Qualification can only consist of Alphabets'
                }
            }
        },

        laststream: {
            validators: {
                notEmpty: {
                message: 'Please supply Last Stream'
                },
                regexp: {
                    regexp: /^[a-zA-Z]+$/,
                    message: 'Last Stream can only consist of Alphabets'
                }
            }
        },

        lastcollege: {
            validators: {
                notEmpty: {
                message: 'Please supply Last College with City'
                },
                regexp: {
                    regexp: /^[a-zA-Z ]+$/,
                    message: 'Last College with City can only consist of Alphabets'
                }
            }
        },

        gender: {
            validators: {
                notEmpty: {
                message: 'Please supply Gender'
                },
                 regexp: {
                    regexp: /^[a-zA-Z]+$/,
                    message: 'Gender can only consist of Alphabets'
                }
            }
        },

         department: {
            validators: {
                notEmpty: {
                message: 'Please supply department'
                },
            }
        },

         faculty: {
            validators: {
                notEmpty: {
                message: 'Please supply Part/Year'
                },
            }
        },


        admissionfor: {
            validators: {
                notEmpty: {
                message: 'Please supply Addmission Course'
                },
                 regexp: {
                    regexp: /^[a-zA-Z ]+$/,
                    message: 'Admission for can only consist of Alphabets'
                }
            }
        },


        admissionin: {
            validators: {
                notEmpty: {
                message: 'Please supply Addmission Part/Year'
                },
                 regexp: {
                    regexp: /^[a-zA-Z ]+$/,
                    message: 'Addmission Part/Year can only consist of Alphabets'
                }
            }
        },

         castcategory: {
            validators: {
                notEmpty: {
                message: 'Please supply Cast Category'
                },
                 regexp: {
                    regexp: /^[a-zA-Z_]+$/,
                    message: 'Cast Category can only consist of Alphabets'
                }
            }
        },

        dateofbirth: {
            validators: {
                notEmpty: {
                message: 'Please supply Date of Birth'
                }
            }
        },

        studusername: {
            validators: {
                notEmpty: {
                message: 'Please supply username'
                },
                

            }
        },

        selfmobile: {
            validators: {
                notEmpty: {
                message: 'Please supply Your mobile No.'
                },
                regexp: {
                regexp: /^[0-9]+$/,
                message: 'Your Mobile can only consist of digits'
                },
                stringLength: {
                min: 10,
                max: 10,
                message: 'Your Mobile must be 10 Digit No.'
            },

            }
        },

        parentmobile: {
            validators: {
                notEmpty: {
                message: 'Please supply Parent mobile'
                },
                regexp: {
                regexp: /^[0-9]+$/,
                message: 'Parent Mobile can only consist of digits'
                },
                stringLength: {
                min: 10,
                max: 10,
                message: 'Parent Mobile must be 10 Digit No.'
            },

            }
        },

        whatsappmobile: {
            validators: {
                notEmpty: {
                message: 'Please supply WhatsApp No.'
                },
                regexp: {
                regexp: /^[0-9]+$/,
                message: 'WhatsApp No. can only consist of digits'
                },
                stringLength: {
                min: 10,
                max: 10,
                message: 'Your WhatsApp No. must be 10 Digit No.'
            },

            }
        },

        adharcard: {
            validators: {
                notEmpty: {
                message: 'Please supply adharcard No.'
                },
                regexp: {
                regexp: /^[0-9]+$/,
                message: 'adharcard No. can only consist of digits'
                },
                stringLength: {
                min: 12,
                max: 12,
                message: 'Your adharcard No. must be 12 Digit No.'
            },

            }
        },

    streetaddress: {
            validators: {
                notEmpty: {
                message: 'Please supply Street Address'
                },
                 regexp: {
                    regexp: /^[a-zA-Z0-9, ]+$/,
                    message: 'Street Address can only consist of Alphabets'
                }
            }
        },

        education: {
            validators: {
                notEmpty: {
                message: 'Please supply education'
                },
                 regexp: {
                    regexp: /^[a-zA-Z0-9, ]+$/,
                    message: 'education can only consist of Alphabets'
                }
            }
        },
        country: {
            validators: {
                notEmpty: {
                message: 'Please supply country'
                },
                 regexp: {
                    regexp: /^[a-zA-Z]+$/,
                    message: 'country can only consist of Alphabets'
                }
            }
        },

        state: {
            validators: {
                notEmpty: {
                message: 'Please supply state'
                },
                 regexp: {
                    regexp: /^[a-zA-Z]+$/,
                    message: 'state can only consist of Alphabets'
                }
            }
        },

        pincode: {
            validators: {
                notEmpty: {
                message: 'Please supply pincode'
                },
                 regexp: {
                    regexp: /^[0-9]+$/,
                    message: 'pincode can only consist of Alphabets'
                },
                stringLength: {
                min: 6,
                max: 6,
                message:'pincode at least %s digit'
              }
            }
        },



        city: {
            validators: {
                notEmpty: {
                message: 'Please supply City'
                },
                 regexp: {
                    regexp: /^[a-zA-Z]+$/,
                    message: 'City can only consist of Alphabets'
                }
            }
        },

         district: {
            validators: {
                notEmpty: {
                message: 'Please supply district'
                },
                 regexp: {
                    regexp: /^[a-zA-Z]+$/,
                    message: 'district can only consist of Alphabets'
                }
            }
        },



        tahsil: {
            validators: {
                notEmpty: {
                message: 'Please supply tahsil'
                },
                 regexp: {
                    regexp: /^[a-zA-Z]+$/,
                    message: 'tahsil can only consist of Alphabets'
                }
            }
        },

        comments: {
        validators: {
              stringLength: {
                min: 10,
                max: 250,
                message:'comments at least %s characters and no more than %s'
            },
            notEmpty: {
                message: 'Please supply a comments'
            }
            }
         }, 
email: {
        validators: {
            notEmpty: {
                message: 'Please supply your email address'
            },
            emailAddress: {
                message: 'Please supply a valid email address'
            }
        }
    },

    paymentmode: {
            validators: {
                notEmpty: {
                message: 'Please supply payment mode'
                },
                 regexp: {
                    regexp: /^[a-zA-Z]+$/,
                    message: 'payment mode can only consist of Alphabets'
                }
            }
        },
        transactionid: {
            validators: {
                notEmpty: {
                message: 'Please supply transactionid'
                } 
            }
        },

        paidamount: {
            validators: {
                notEmpty: {
                message: 'Please supply payment ammount'
                },
                 regexp: {
                    regexp: /^[0-9]+$/,
                    message: 'payment ammount can only consist of Alphabets'
                }
            }
        },

    password: {
    validators: {
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
 
    externalpassing: {
        validators: {
            between: {
                min: 0,
                max: 'externaltotal',
                message: 'The number of External Passing Marks must be between %s and %s'
            },
            notEmpty: {
                message: 'Please supply External Passing Marks'
                }
        }
    },
    age: {
        validators: {
            between: {
                min: 20,
                max: 50,
                message: 'The number of age must be between %s and %s'
            },
            notEmpty: {
                message: 'Please supply age'
                }
        }
    },
     internalpassing : {
        validators: {
            between: {
                min: 0,
                max: 'internaltotal',
                message: 'The number of Internal Passing Marks must be between %s and %s'
            },
            notEmpty: {
                message: 'Please supply Internal Passing Marks'
                }
        }
    },
     practicaltotal : {
        validators: {
            between: {
                min: 0,
                max: 200,
                message: 'The number of Practical Total Marks must be between %s and %s'
            },
            notEmpty: {
                message: 'Please supply Practical Total Marks'
                }
        }
    },

     practicalpassing : {
        validators: {
            between: {
                min: 0,
                max: 'practicaltotal',
                message: 'The number of Practical Passing Marks must be between %s and %s'
            },
            notEmpty: {
                message: 'Please supply Practical Passing Marks'
                }
        }
    },

      xyz: {
        validators: {
          stringLength: {
                min: 1,
                max: 10,
                message:'%s to %s Charector'
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
                message: 'Please select an Applicant Photos'
            },
            file: {
                extension: 'jpeg,jpg',
                type: 'image/jpeg',
                maxSize: 2097152,   // 2048 * 102
                message: 'The selected file is not valid only valid .jpeg,.jpg file which is smaller than 2MB'
            }
        }
    },
    fileUpload2: {
        validators: {
            notEmpty: {
                message: 'Please select an Transaction Photos'
            },
            file: {
                extension: 'jpeg,jpg',
                type: 'image/jpeg',
                maxSize: 2097152,   // 2048 * 102
                message: 'The Transaction file is not valid only valid .jpeg,.jpg file which is smaller than 2MB'
            }
        }
    },
                slipamount: {
                validators: {
                    notEmpty: {
                        message: 'Please Uploade Your Slip'
                    },

                    file: {
                        extension: 'pdf',
                        type: 'application/pdf',
                        //maxSize: 2097152,   // 2048 * 1024  = 2MB
                        message: 'The selected file is not valid only valid .pdf file'
                    }
                }
            },


    Secret_code: {
        validators: {
                stringLength: {
                min: 5,
            },
                notEmpty: {
                message: 'Please supply your first name'
            }
        }
    },
       
         
    coursesubjectcode: {
        validators: 
        {
                stringLength:
                {
                  min: 2,
                },
                notEmpty:
                {
                    message: 'Please supply your Subject Code name for example 1ST1'
                },
        regexp: {
                regexp: /^[a-zA-Z0-9]+$/,
                message: 'The subject Code can only consist of letters and digits'
                }
        }

},
     
    coursesubjectname: {
        validators: {
                stringLength: {
                min: 3,
            },
                notEmpty: {
                message: 'Please supply your Subject full name for example English'
            },
        
        }

},
coursetotalmarks: {
        validators: {
                stringLength: {
                min: 1,
                max:3,
                },

                notEmpty: {
                message: 'Please supply your Subject Total marks'
                },

                between: {
                    min: 2,
                    max: 100,
                    message: 'Total Marks must be between %s and %s'
                },

                regexp: {
                regexp: /^[0-9]+$/,
                message: 'The subject marks only consist of Digit'
                }
        }

},

 

    
    }
})


});
</script>









<script>  
$(document).ready(function(){

  $image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width:200,
      height:200,
      type:'square' //circle
    },
    boundary:{
      width:300,
      height:300
    }
  });

  $('#upload_image').on('change', function(){
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');
  });

  $('.crop_image').click(function(event){
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
      $.ajax({
        url:"upload.php",
        type: "POST",
        data:{"image": response},
        success:function(data)
        {
          $('#uploadimageModal').modal('hide');
          $('#uploaded_image').html(data);
        }
      });
    })
  });

});  
</script>







</body>
</html>




<?php
 

}
?>