<?php
$navPage='Dashboard';
$classIcon="fa fa-home";

if(session_id()){}  else  {  session_start(); }
?>

<?php
if (isset($_SESSION["varSesUserType"]) AND $_SESSION["varSesUserType"]=="LoginSuccessStudent")
{

     include "../sitedetails.php";
?>




  <?php include("add_page_top_link.php"); ?>  
  <script src="../bootstrap37/datepicker/jquery.js"></script>  
<style type="text/css">
 
  element {
    margin-top: 0px;
    margin-bottom: 0px;
}
.featured-boxes .featured-box {
    margin-bottom: 15px;
    margin-top: 23px;
}
.featured-box, .icon-featured {
    position: relative;
    text-align: center;
     
}
.featured-box:hover {
 	box-shadow: 10px 10px 5px grey;
	transform: scale(1.2);
	z-index: 1;
		color: orange;
	}
.featured-box {
    background: #fff;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    border-radius: 2px;
    border-color: #dfdfdf #ececec;
    border-style: solid;
    border-width: 1px;
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.04);
    margin: 20px auto;
        margin-top: 20px;
        margin-bottom: 20px;
    border-radius: 3px;
    padding: 20px;
}
* {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
body, html {
    color: #4e4e4e;
    font-family: Segoe UI,Tahoma,sans-serif;
    line-height: 22px;
}
body {
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 14px;
    line-height: 1.42857143;
    color: #333;
}
html {
    font-size: 10px;
}
html {
    font-family: sans-serif;
    -webkit-text-size-adjust: 100%;}

 
 
</style>
<div class="jumbotron">
	<div class="featured-boxes">

<div class="row">
         
  

 
  

   




   


  </div><!-- ROW END -->



  <div class="row">
        <div class="col-md-3 col-sm-3 col-lg-3">
        	<a href="my_lab_time.php">
          <div class="featured-box">
            <div class="box-content">
             <div class="row">
             	<div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
             		<div class="icon-featured">
                		<center><img src="../images/education/png/calendar.png" alt="HTML examples" class="img img-responsive" width="70%"></center>
              		</div>	
             	</div>

             	<div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
             		<h4><?php echo "$varCurrentSession"; ?></h4>
					<span class="badge"><?php echo "$varCurrentTotalStudent"; ?>
					</span>
             		
             	</div>

             	<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
             		<h4 class="text-uppercase"><strong>My Visit Report</strong></h4>
             	</div>
             </div>
             
              
            </div>
          </div>
          </a>
        </div>
  


   <div class="col-md-3 col-sm-3 col-lg-3">
        	<a href="pdf_show.php">
          <div class="featured-box">
            <div class="box-content">
             <div class="row">
             	<div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
             		<div class="icon-featured">
                		<center><img src="../images/education/png/presentation.png" alt="HTML examples" class="img img-responsive" width="70%"></center>
              		</div>	
             	</div>

             	<div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
             		<h4><?php echo "$varCurrentSession"; ?></h4>
					<span class="badge"><?php echo "$varCurrentTotalStaff"; ?>
					</span>
             	</div>
             	<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
             		<h4 style="font-size: 120%" class="text-uppercase"><strong>Notes</strong></h4>
             	</div>
             </div>
             
              
            </div>
          </div>
          </a>
        </div>
  

   




   <div class="col-md-3 col-sm-3 col-lg-3">
        	<a href="profile_update.php">
          <div class="featured-box">
            <div class="box-content">
             <div class="row">
             	<div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
             		<div class="icon-featured">
                		<center><img src="../images/education/png/mouse.png" alt="HTML examples" class="img img-responsive" width="70%"></center>
              		</div>	
             	</div>

             	<div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
             		<h4><?php echo "$varCurrentSession"; ?></h4>
					<span class="badge"><?php echo "$varCurrentTotalStaff"; ?>
					</span>
              	</div>

              	<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
             		<h4 class="text-uppercase"><strong>Update Profile</strong></h4>
             	</div>
             </div>
             
              
            </div>
          </div>
          </a>
        </div>


  </div><!-- ROW END -->
  </div><!-- featured-boxes End -->
</div><!-- jumbotron End -->









<?php        include "add_page_bottom_link.php";       ?>
<?php
}
else
{
      echo "<script>location='index.php'</script>";

}
?>