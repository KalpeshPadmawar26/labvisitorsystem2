 <?php
if(session_id())
{

}
else
{
  session_start();
} 
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
  /*include "Head1NavigationTop.php";*/
  include "Head2Site.php";
  include "Head3NavigationBelow.php";
?> 

</header>

<style type="text/css">
  element {
    margin-top: 0px;
    margin-botton: 0px;
}
.featured-boxes .featured-box {
    margin-bottom: 30px;
    margin-top: 45px;
}
.featured-box, .icon-featured {
    position: relative;
    text-align: center;
    z-index: 1;
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
    padding: 30px;
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
    -webkit-text-size-adjust: 100%;
</style>


<div class="container">
    <div class="featured-boxes">
      <div class="row">
        <div class="col-md-3 col-sm-6">
         
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="featured-box" style="margin-top:0px;margin-botton:0px">
            <div class="box-content">
              <div class="icon-featured">                <center><img src="images/education/png/conference.png" alt="HTML examples" class="img img-responsive" width="50%"></center>
</div>
              <h4 class="text-uppercase"><strong>Admin Section</strong></h4>
              <p>
              </p><br><p><a href="panel_admin" class="lnk-primary learn-more">
              Click Here To Login <i class="fa fa-angle-right">&nbsp;</i></a></p>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="featured-box" style="margin-top:0px;margin-botton:0px">
            <div class="box-content">
              <div class="icon-featured">                <center><img src="images/education/png/id-card.png" alt="HTML examples" class="img img-responsive" width="50%"></center>
</div>
              <h4 class="text-uppercase"><strong>Student Section</strong></h4>
              <p> 
              </p><br><p><a href="panel_student" class="lnk-primary learn-more">
              Click Here To Login <i class="fa fa-angle-right">&nbsp;</i></a></p>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
           
        </div>
     
   
       
     
        
        
        
      </div>
    </div>
  </div>


 

<?php
 include "footer.php";
?>


   <script src="bootstrap37/js/bootstrap.min.js"></script>
 
  <script src='bootstrap37/validation/bootstrapvalidator_0.5.2_js_bootstrapValidator.min.js'></script>

 


</body>
</html>