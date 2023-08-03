<div class="zed-loginInstrunctions" style="border: 1px solid grey;border-radius: 25px;padding: 10px 10px 10px 10px; background-color: #f4f4f4">
                                
                                
                                 <p>
<form class="form-horizontal" method="post" id="login_form" enctype="multipart/form-data">
                                             
                                    

                              <div class="form-group">
                                <label class="col-md-4 col-sm-4 control-label">Username</label>

                                 <div class="col-md-8 col-sm-8 inputGroupContainer">
                                  <div class="input-group">
            <input name="username" id="username" placeholder="username" class="form-control"  type="text" minlength="12" maxlength="12" size="20" style="border:3px solid grey;box-shadow: 10px 10px 5px grey"/>
                                  </div>
                                </div>
                              </div>



                            <div class="form-group">
                              <label class="col-md-4 col-sm-4 control-label">Password</label>

                               <div class="col-md-8 col-sm-8 inputGroupContainer">
                                <div class="input-group">
                                  <input name="password" placeholder="password" type="password" class="form-control" style="border:3px solid grey;box-shadow: 10px 10px 5px grey"/> 
                                </div>
                              </div>
                            </div>
                            <style type="text/css">
                               .btn, .btn-xs {
                                padding: .50rem .8rem;
                                font-size: 1.6rem;
                                line-height: 1.0;
                                border-radius: .4rem;
                              }
                            </style>

                              <!-- Button -->
                           <div class="row">
                            
                           	<div class="col-md-12 col-sm-12 text-right">
                              
                             		<button type="submit" class="btn btn-info btn-xs" name="btnlogin">
                                   <strong style="color: white;font-weight: bold;">Login</strong> 
                                   <span class="glyphicon glyphicon-send"></span>


                                </button>
                               
                           	</div>
                           </div>
                               
                             
                            



     
     </form>
                                </p>

                                <p>
                                       <center><h3>
                                              <?php
  error_reporting(E_ALL);
  include 'connection/connection.php';
 if (isset($_POST['btnlogin']))
 {
      $varUserName=trim($_POST['username']);
      $varPassword=trim($_POST['password']);
 

           
                     
   $varCheckUserQuery="SELECT * FROM tbl_registration_student WHERE user_name='$varUserName' AND status='1'";
  
  $tbl_login=$objCon->query($varCheckUserQuery);
  
  $varFind=$tbl_login->num_rows;
    
    if($varFind>0)
    {

            while ($row=$tbl_login->fetch_array()) 
            {
                    $varLoginUserName=trim($row['user_name']);
                    $varLoginPassword=trim($row['password']);
                    $varLoginDesignation=trim($row['designation']);
            }
         
 
            
            if(($varPassword==$varLoginPassword) AND ($varLoginUserName==$varUserName))
            {

                         $_SESSION["varSesLoginP"]="LoginSuccess";
                         $_SESSION["varSesUserType"]="LoginSuccessStudent";
                         $_SESSION["varSesDesignation"]=$varLoginDesignation;
                         $_SESSION["adhar_card"]=$varLoginUserName;
                         $_SESSION["year"]=$currentDateY;
                         $_SESSION["course"]=$varLoginCourse;

                        echo "<script>location='panel_student/index.php'</script>";
               
            }
            else
            {
               echo "<span style='color:red'>Please Enter Correct Password</span>";
            }

    }
    else
    {
       echo "<span style='color:red'>Please Enter Correct Username</span>";
    }

 
 
  }
 ?>


                                       

  </h3></center>
                               </p>
                 
                              
                            </div>