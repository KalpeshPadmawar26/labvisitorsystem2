<?php
$navPage='Thumbnails';
$varFormTitle="Thumbnails";
$classIcon="glyphicon glyphicon-cog";
if(session_id()){} else { session_start(); }
?>

<?php
if (isset($_SESSION["varSesUserType"]) AND $_SESSION["varSesUserType"]=="LoginSuccessAdmin")
{
 
include('connectionmanager.php');
$added_for="thumbnails";
$resultEvents=$con->selectdistinctWhere('tbl_events','event_name,details',"added_for='{$added_for}'");
include('ssn.php');

                $idcount=0;
                $resma = $con->selectmax("tbl_events","evtid");
                $resmax=mysqli_fetch_assoc($resma);
                $idcount=$resmax["maximum"]+1;

    $currentTimezone = new DateTimeZone("Asia/Kolkata" );
    $currentDate = new DateTime();
    $currentDate->setTimezone($currentTimezone);
 
    $currentDateTime= $currentDate->format( 'g:i A l jS F Y');
    $currentDateTime= $currentDate->format( 'g:i A l jS F Y');
    $currentDateYMD= $currentDate->format( 'Y-m-d');

?> 


<?php include("add_page_top_link.php"); ?>  

<script type="text/javascript" src="nicEdit.js"></script>
    <script type="text/javascript">
      bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
    </script>
         
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
            
<style type="text/css">
.help-block {
    color: #E74C3C;
}
</style>


                        <div class="row">
                            <div class="col-md-7">
                                <form class="form-horizontal" method="post" name="reg_form" id="reg_form" enctype="multipart/form-data">
                                    <div class="panel panel-default" style="border:2px solid #430c54; box-shadow: 10px 10px 10px #430c54;">
                                        <div class="panel-heading" style="border-bottom:1px solid #430c54;">
                                             
                                            <h3 class="panel-title">Add New <strong><?php echo $varFormTitle; ?></strong></h3>
                                           
                                        </div>
                                        <div class="panel-body">

 <div class="form-group">
    <label class="col-sm-4 control-label"><?php echo ucwords($varFormTitle); ?>  Category:</label>
    <div class="col-sm-8">
    <select name="categoryname" class="form-control selectpicker" onchange="addSubCategory()" id="categoryname" required>

            <option value=" " >Select Category</option>
             <?php
include "connection/connection.php";
$sqlSite1 = "SELECT * FROM tbl_categories WHERE showhide='1'";  
$rs_Site1=$objCon->query($sqlSite1);
$varSite1=$rs_Site1->num_rows;

while($tbl_categories=$rs_Site1->fetch_assoc())
{
$varCategoryName = $tbl_categories['name'];
$varCategoryCode = $tbl_categories['code'];
?>

             <option value="<?php echo $varCategoryCode; ?>"><?php echo $varCategoryName; ?></option>


<?php      
     }

      
$objCon->close();

   ?>
          


          </select> 
    </div>
</div><!-- form-group -->




          <script>

  function addSubCategory()

  {

    varCategoryName=document.getElementById('categoryname');

     txtCategoryName=varCategoryName.value;

        //alert(txtCategoryName);

          $.post("findsubcategoryname.php?find="+txtCategoryName,

        function(pagedata, pagestatus)

        {

          if(pagestatus=="success")

          {

                //alert("Data: " + pagedata + " And Status: " + pagestatus);

                $("#subcategoryname").html(pagedata);



          }

        }

        );



   }

</script>



<div class="form-group">
    <label class="col-sm-4 control-label"><?php echo ucwords($varFormTitle); ?>  Sub Category:</label>
    <div class="col-sm-8">
    <select name="subcategoryname" class="form-control selectpicker" id="subcategoryname" required>

                <option value=" ">Select SubCategory</option>

                <option value=" ">Select SubCategory</option>

               

              </select>
    </div>
</div><!-- form-group -->



  


<div class="form-group">
    <label class="col-sm-4 control-label"><?php echo ucwords($varFormTitle); ?>  For:</label>
    <div class="col-sm-8">
    <select name="thumbnailsfor" class="form-control selectpicker" id="thumbnailsfor" required>

                <option value=" ">Select For</option>
                <option>Our Main Slider (1680x320)</option>
                <option>Our Main Categories (223x223)</option>
                <option>Our Single Banner (1240x150)</option>
                <option>Our Main Adds</option>
                <option>Best Main Categories</option>

                <option>Offers on Services</option>
                <option>Our Main Adds Footer</option>
                <option>Best Main Categories</option>


               

              </select>
    </div>
</div><!-- form-group -->










                                            <div class="form-group">
                                                    <label class="col-sm-4 control-label">Upload <?php echo ucwords($varFormTitle); ?> Pic:</label>
                                                        <div class="col-sm-8">
                                                        <input type="file" id="fileUpload" name="fileUpload[]" class="fileUpload form-control" accept="image/*" onchange="preview_image()"/>
                                                    </div>
                                            </div><!-- form-group -->

                                            
                                            <!-- <div class="form-group">
                                                <label class="col-sm-4 control-label"><?php// echo ucwords($varFormTitle); ?> Name:</label>
                                                <div class="col-sm-8">
                                
                                <input type="text"  placeholder="<?php// echo ucwords($varFormTitle); ?> Short Name" name="event_name" class="form-control" onkeyup="this.value = this.value.toUpperCase();" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))' required/>

                                                </div>
                                            </div>  -->
                                  
                                             
                                             <input type="hidden" value="<?php echo $added_for; ?>" name="added_for" class="datepicker form-control" />

                                            <!--  <div class="form-group">
                                                <label class="col-sm-4 control-label"><?php //echo ucwords($varFormTitle); ?> Details:</label>
                                                <div class="col-sm-8">
                                                   
                                                    <textarea name="details"  id="details" class="form-control"  placeholder="<?php //echo ucwords($varFormTitle); ?> Long Name" required> </textarea>
                                                </div>
                                            </div>  -->
                                                    
                                            <!--  <div class="form-group">
                                                <label class="col-sm-4 control-label"><?php //echo ucwords($varFormTitle); ?> Location:</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="locations" value="Yavatmal" class="form-control" readonly />
                                                </div>
                                            </div>  -->
                                            
                                            
                                            
                                          
                                            
                                            
 
                                        </div><!-- panel-body -->
                                        <div class="panel-footer text-center">
                                             <button type="reset" class="btn btn-default">Reset</button>
                                            <input type="submit" name="sub" value="Add <?php echo $varFormTitle; ?>" class="btn btn-primary">
                                        </div><!-- panel-footer -->
                                    </div><!-- panel-default -->
                                </form>
                            </div><!-- col-md-6 -->
                               <div class="col-md-5">
                                <div class="table-responsive">
                                    <table class="table table-primary mb30">
                                        <thead>
                                          <tr>
                                            <th>Sr No.</th>
                                            <th>Sub Category Name</th>
                                            <th>Category Code</th>
                                            <th>Update</th>
                                            <th>Add <?php echo ucwords($varFormTitle); ?> </th>
                                          <!--   <th>Delete</th> -->
                                            
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
                                            <td><?php echo $row['event_name']; ?></td>
                                            <td><?php echo $row['details']; ?></td>
                                            <td><a href="service_rows.php?event_name=<?php echo $row['event_name']; ?>&details=<?php echo $row['details']; ?>"> <span class="fa  fa-eye"></span></a></td>
                                            <th><a href="service_add_sub.php?q=SERVICE<?php echo $row['evtid']; ?>">Add
                                            </a></th>
                                            
                                            <!-- <td><a href="event_delete.php?id=<?php //echo $row['id'];?>&enm=<?php //echo $row['event_name'];?>" onclick="return confirm('Are you sure you want to Delete event?');"><span class="fa fa-trash-o"></span></a></td> -->

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

    jQuery('.datepicker').datepicker({dateFormat:"yy-mm-dd"});
                jQuery('#datepicker').datepicker();
                jQuery('#datepicker-inline').datepicker();
                jQuery('#datepicker-multiple').datepicker({
                    numberOfMonths: 3,
                    showButtonPanel: true
                });


    $("#reg_form").bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
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
             last_name: {
                validators: {
                     stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Please supply your last name'
                    }
                }
            },
           
          event_name: {
                validators: {
                  stringLength: {
                        min: 2,                       
                        message:'Enter Minimum %s Charector'
                    },
                        notEmpty: {
                        message: 'Please supply Name'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'The Name can only consist of letters'
                        }
                }
            },

            locations: {
                validators: {
                  stringLength: {
                        min: 2,                       
                        message:'Enter Minimum %s Charector'
                    },
                        notEmpty: {
                        message: 'Please supply name'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'The Location can only consist of letters'
                        }
                }
            },

            details: {
                validators: {
                      stringLength: {
                        min: 3,
                        message:'Please enter at least %s'
                    },
                    notEmpty: {
                        message: 'Please supply a details'
                    }
                    }
                 }, 

            centerName: {
                validators: {
                     stringLength: {
                        min: 8,
                    },
                    notEmpty: {
                        message: 'Please supply Exam center Name'
                    }
                }
            },
            city: {
                validators: {
                     stringLength: {
                        min: 4,
                    },
                    notEmpty: {
                        message: 'Please supply your city'
                    }
                }
            },
          event_date: {
                    validators: {
                        notEmpty: {
                        message: 'Please Select Date'
                      },
                      date: 
                       {
                        format:'YYYY-MM-DD',
                        message:'Date is not valid'
                       }

                    }
               },
                  fileUpload: {
                        selector: '.fileUpload',
                        validators: {
                                notEmpty: {
                                    message: 'Please select an Service Photos'
                                },
                                file: {
                                    extension: 'jpeg,jpg',
                                    type: 'image/jpeg',
                                   // maxSize: 2097152,   // 2048 * 102
                                    message: 'The selected file is not valid only valid .jpeg,.jpg file'
                                }
                            }
                    },

                fileUpxxload: {
                validators: {
                    notEmpty: {
                        message: 'Please select an Event Photos'
                    },
                    file: {
                        extension: 'jpeg,jpg',
                        type: 'image/jpeg',
                       // maxSize: 2097152,   // 2048 * 102
                        message: 'The selected file is not valid only valid .jpeg,.jpg file'
                    }
                }
            },

             myClassx: {
            selector: '.myClassx',
            validators: {
                notEmpty: {
                    message: 'required'
                }
            }
        },
             Name_of_Exam: {
                validators: {
                    notEmpty: {
                        message: 'Please select Name of Exam'
                    }
                }
            },

            Exam_Semester: {
                validators: {
                    notEmpty: {
                        message: 'Please select Exam Semester'
                    }
                }
            },
            centerCode: {
                validators: {
                     stringLength: {
                        min: 3,
                        max: 3,
                    },
                    digits:
                    {
                        message: 'Please supply a minimum or maximum 3 digit'
                    },
                    notEmpty: {
                        message: 'Please supply a valid 3 Digit Exam Center Code'
                    }
                }
            },

           Course_Part: {
                validators: {
                    notEmpty: {
                        message: 'Please select Exam Year'
                    }
                }
            },
            Exam_Session: {
                validators: {
                    notEmpty: {
                        message: 'Please select Exam Session'
                    }
                }
            },
            Exam_Medium: {
                validators: {
                    notEmpty: {
                        message: 'Please select Exam Medium'
                    }
                }
            },
               
            /*zip: {
               validators: {
                    notEmpty: {
                        message: 'Please supply your zip code'
                    },
                    zipCode: {
                        country: 'IN',
                        message: 'Please supply a vaild zip code'
                    }
                }
            },*/

            eyear: {
                validators: {
                     stringLength: {
                        min: 4,
                        max: 4,
                    },
                    digits:
                    {
                        message: 'Please supply a digit'
                    },
                    notEmpty: {
                        message: 'Please supply a valid year'
                    }
                }
            },
            sheetattach: {
                validators: {
                    notEmpty: {
                        message: 'Please select an CSV File Sheet(Excelsheet)'
                    },
                    /*file: {
                        extension: '.csv',
                       // type: 'application/csv',
                        //maxSize: 2097152,   // 2048 * 102
                        message: 'The selected file is not valid only valid .csv file'
                    }*/
                }
            },
            applicantphoto: {
                validators: {
                    notEmpty: {
                        message: 'Please select an Applicant Photos'
                    },
                    file: {
                        extension: 'jpeg,jpg',
                        type: 'image/jpeg',
                        //maxSize: 2097152,   // 2048 * 102
                        message: 'The selected file is not valid only valid .jpeg,.jpg file'
                    }
                }
            },
                      applicantsign: {
                validators: {
                    notEmpty: {
                        message: 'Please select an Applicant Signature'
                    },
                    file: {
                        extension: 'jpeg,jpg',
                        type: 'image/jpeg',
                        //maxSize: 2097152,   // 2048 * 102
                        message: 'The selected file is not valid only valid .jpeg,.jpg file'
                    }
                }
            },
    comment: {
                validators: {
                      stringLength: {
                        min: 10,
                        max: 200,
                        message:'Please enter at least 10 characters and no more than 200'
                    },
                    notEmpty: {
                        message: 'Please supply a description about yourself'
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
          
  password: {
            validators: {
                identical: {
                    field: 'confirmPassword',
                    message: 'Confirm your password below - type same password please'
                }
            }
        },
            applicantphoto: {
                validators: {
                    notEmpty: {
                        message: 'Please select an Applicant Photos'
                    },
                    file: {
                        extension: 'jpeg,jpg',
                        type: 'image/jpeg',
                       // maxSize: 2097152,   // 2048 * 102
                        message: 'The selected file is not valid only valid .jpeg,.jpg file'
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
 var total_file=document.getElementById("fileUpload").files.length;
 for(var i=0;i<total_file;i++)
 {
  $('#image_preview').append("<img width=200 height=200 src='"+URL.createObjectURL(event.target.files[i])+"'> ");
 }
}
</script>


 <?php include "add_page_bottom_link.php";  ?>
       

<?php
}
else
{
      echo "<script>location='index.php'</script>";

}
?>


<?php
ini_set("max_execution_time", 3000); 
   include "../connection/connection.php";

include_once("connectionmanager.php");
include('ssn.php');
   include "../connection/connection.php";

if(isset($_POST["sub"]))
{
    $varLoginUserName=$_SESSION["u_name"];    
    $event_name = mysqli_real_escape_string($objCon,$_POST["subcategoryname"]);
    $typeofdata = mysqli_real_escape_string($objCon,$_POST["thumbnailsfor"]);
    $details = mysqli_real_escape_string($objCon,$_POST["categoryname"]);
    
    $created = date("d-m-y");

    //$event_date = $_POST['event_date'];

    $event_date = $created;
    $event_added_for = $_POST['added_for'];

    
    //***** Fetch Max event_id to count *****//
                $idcount=0;
                $resma = $con->selectmax("tbl_events","evtid");
                $resmax=mysqli_fetch_assoc($resma);
                $idcount=$resmax["maximum"]+1;

    for($i=0;$i<count($_FILES["fileUpload"]["name"]);$i++)
    {
        if(trim($_FILES["fileUpload"]["tmp_name"][$i]) != "")
        {
                $images = $_FILES["fileUpload"]["tmp_name"][$i];
                $images1 = $_FILES["fileUpload"]["tmp_name"][$i];
                
                /***New Image Name***/
                    $new_images = "big_".date("y_m_d_h_m_s").$_FILES["fileUpload"]["name"][$i];
                    $new_imagesone = "thumb_".date("y_m_d_h_m_s").$_FILES["fileUpload"]["name"][$i];
                    
                copy($_FILES["fileUpload"]["tmp_name"][$i],"../uploads/".$_FILES["fileUpload"]["name"][$i]);
                
                //*** Fix Width & Heigh ***//
                    $width=1024;    $height=576;
                    $width1=553;    $height1=311;
                if($typeofdata=="Our Main Slider (1680x320)")
                {
                    $width=1024;    $height=576;
                    $width1=1680;    $height1=320;
                }
                else if($typeofdata=="Our Main Categories (223x223)")
                {
                    $width=1024;    $height=576;
                    $width1=223;    $height1=223;
                }
                else if($typeofdata=="Our Single Banner (1240x150)")
                {
                    $width=1024;    $height=576;
                    $width1=223;    $height1=223;
                }

                /***Heigh (Auto caculate)***/
                                //$height=round($width*$size[1]/$size[0]);
                                        
                /***To Get The Size of Image ***/
                    $size=GetimageSize($images);
                    
                /***To Create Image String***/
                    $images_orig = ImageCreateFromJPEG($images);
                    $images_orig1 = ImageCreateFromJPEG($images1);
                    
                /***To Calculate X and Y Co-ordinate of Image***/
                    $photoX = ImagesX($images_orig);
                    $photoY = ImagesY($images_orig);
                    $photoX1 = ImagesX($images_orig1);
                    $photoY1 = ImagesY($images_orig1);
                                
                /***Create New Image***/
                    $images_fin = ImageCreateTrueColor($width, $height);
                    ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);       
                    
                    $images_fin1 = ImageCreateTrueColor($width1, $height1);
                    ImageCopyResampled($images_fin1, $images_orig1, 0, 0, 0, 0, $width1+1, $height1+1, $photoX1, $photoY1); 
                    
                /***To Save New Resized Image***/
                    ImageJPEG($images_fin,"../uploads/".$new_images);
                    ImageJPEG($images_fin1,"../uploads/".$new_imagesone);
                    ImageDestroy($images_orig);
                    ImageDestroy($images_orig1);
                    ImageDestroy($images_fin);
                    ImageDestroy($images_fin1);      

                    echo "Resize Successful.<br>";
                 
                $result = mysqli_query($con->dbconnect(),"SHOW TABLE STATUS LIKE 'tbl_events'");
                $row = mysqli_fetch_array($result);
                $sequence = $row['Auto_increment'];   
                


        //*** Insert Record ***//
        $fields = array('sequence','evtid','event_name','location','details','event_date','image_name','thumb_name','added_for','added_by','typeofdata');

        $values = array($sequence,$idcount,$event_name,$locations,$details,$event_date,$new_images,$new_imagesone,$event_added_for,$varLoginUserName,$typeofdata); 

        $res = $con->insert($fields, $values, 'tbl_events');
        if($res)
          echo "<script>alert('Thumbnails Added Successful')</script>";
        else
          echo "<script>alert('Thumbnails Not Added')</script>";

          echo "<script>location='thumbnails_add.php'</script>";      
        
        }
    }

//$navPage=$_SERVER['HTTP_REFERER'];
//redirect("$navPage");
}
 
?>