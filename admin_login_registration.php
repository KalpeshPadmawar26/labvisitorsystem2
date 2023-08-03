<?php
$navPage='adminlogin';
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
     echo "<script>location='admin_otp.php'</script>";
}
else
{

?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <title>
    <?php
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
  <!-- Raj Coloumn Start -->
   
<div class="col-md-2 col-sm-2"></div>
    <div class="col-md-8 col-sm-8">
      <div class="row">

      
      <div class="col-md-2 col-sm-2"></div>
      <div class="col-md-8 col-sm-8">
		  <div style="border: 2px solid grey; border-radius: 25px;padding: 15px 15px 15px 15px;margin: 10px 10px 10px 10px">
		      	<div class="row">
		      		<div class="col-md-12 col-sm-12">
		      			<h3 style="color: #0388d3">Administration Login</h3>
		      			<p class="text-justify">Use a valid username and password to gain access to the administrator backend.</p>
		      		</div>
		      	</div>

		      	<div class="row">
		      		<div class="col-md-3 col-sm-3">
		      			<br>
		      			<img src="images/fiximages/admin_login.png" class="img img-responsive" width="120px">
		      			<br><br>

		      		</div>
		      		<div class="col-md-9 col-sm-9">
		      			<?php include "admin_login_form.php"; ?>	
                
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
<br><br>
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
                comment: {
                validators: {
                      stringLength: {
                        min: 10,
                        max: 200,
                        message:'Please enter at least %s characters and no more than %s'
                    },
                    notEmpty: {
                        message: 'Please supply a description about yourself'
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