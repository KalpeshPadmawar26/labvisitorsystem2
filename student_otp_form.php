<div class="zed-loginInstrunctions" style="border: 1px solid grey;border-radius: 25px;padding: 10px 10px 10px 10px; background-color: #f4f4f4">
                                

                                
                                 <p>
                                  <form class="form-horizontal" method="post" id="login_form" enctype="multipart/form-data">
                                             
                                    

                              <div class="form-group">
                                <label class="col-md-4 control-label">Username</label>

                                 <div class="col-md-8  inputGroupContainer">
                                  <div class="input-group">
            <input name="username" id="username" placeholder="username" class="form-control"  type="text" minlength="6" maxlength="12" size="20" style="border:3px solid green;box-shadow: 10px 10px 5px grey" value="<?php echo $varSesUsername; ?>" readonly/>
                                  </div>
                                </div>
                              </div>



                            <div class="form-group">
                              <label class="col-md-4 control-label">Enter OTP</label>

                               <div class="col-md-8  inputGroupContainer">
                                <div class="input-group">
                                  <input name="password" placeholder="One Time Password" type="password" class="form-control" style="border:3px solid green;box-shadow: 10px 10px 5px grey"/> 
                                </div>
                              </div>
                            </div>


							<!-- Button -->
                           <div class="row">
                           	<div class="col-md-6 col-sm-6">
                           		<a href="student_otp.php" onclick="alert('OTP Resend Successfully')"> Resend OTP?</a>
                           	</div>
                           	<div class="col-md-6 col-sm-6">
                           		<button type="submit" class="btn btn-sm btn-success" name="btnlogin">
                                 <strong style="color: white;font-weight: bold;">Verify & Login</strong> 
                                 <span class="glyphicon glyphicon-send"></span>
                              </button>
                           	</div>
                           </div>


                            <div class="form-group">
                              <label class="col-md-4 control-label"> </label>

                               <div class="col-md-8  inputGroupContainer">
                                <center>
                                <div class="input-group">
                                  
                               <br><br>
                              
                                </div>
                                </center>
                              </div>
                            </div>


                              <!-- Button -->
                           
                              
                             
                            



     
     </form>
                                </p>

                                <p>
                                       <center><h3>
                                              <?php
  error_reporting('all');
  include 'connection/connection.php';
 if (isset($_POST['btnlogin']))
 {
      $varUserName=trim($_POST['username']);
      echo $varPassword=trim($_POST['password']); 
      echo "==";
 

           
                     
   $varCheckUserQuery="SELECT * FROM tbl_otp WHERE username='$varUserName'";
  
  $tbl_login=$objCon->query($varCheckUserQuery);
  
  $varFind=$tbl_login->num_rows;
    
    if($varFind>0)
    {

            while ($row=$tbl_login->fetch_array()) 
            {
                         $varOTPUserName=trim($row['username']);
                        echo $varOTPPassword=trim($row['passwordotp']);
            }
         
 
            
            if(($varPassword==$varOTPPassword) AND ($varUserName==$varOTPUserName))
            {
 
                         $_SESSION["otp_user"]=$varOTPUserName;
                         $_SESSION["otp_pass"]=$varOTPPassword;
                         $_SESSION["otp_enter"]=$varPassword;

                         /*INSERT*/

                              $remark = "Machine In Time";
                              $student_id = $_SESSION["otp_user"];
                              $currentTimezone = new DateTimeZone("Asia/Kolkata" );
                              $currentDate = new DateTime();
                              $currentDate->setTimezone($currentTimezone);
                           
                              $currentDateTime= $currentDate->format( 'g:i A l jS F Y');
                              $currentDateTime= $currentDate->format( 'g:i A l jS F Y');
                              $currentDateYMD= $currentDate->format( 'Y-m-d');
                              $vcurrent_date= $currentDate->format( 'd-F-Y');
                              $vcurrent_time= $currentDate->format( 'h:i:s A');

                              $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                              $hosts = gethostbynamel(gethostbyaddr($_SERVER['REMOTE_ADDR']));
                              $arrLength = count($hosts);
                              if ($arrLength>1) 
                                $pc_ip=$hosts[2]; 
                              else 
                                $pc_ip=$hosts[0]; 



                         $varQueryInsertMachine="INSERT INTO tbl_visitor(student_id, vcurrent_date, vcurrent_time, remark, pc_ip) VALUES('$student_id', '$vcurrent_date', '$vcurrent_time', '$remark', '$pc_ip');";

        if($objCon->query($varQueryInsertMachine)===true)
        {
            echo "<script>location='panel_student/index.php'</script>";
        }
        else
        {
            echo "<span style='color:red'>Please Re-Enter Credentials</span>";
            $varStatusMsg="<span style='font-size: 10px;font-weight: bold;color:red'>Error: $varQueryInsert - - > $objCon->error</span>";
        } 







               //echo "<span style='color:green'>Login Success</span>";
            }
            else
            {
               echo "<span style='color:red'>Please Enter Correct OTP Password</span>";
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