<?php
$color1="orange";
?>	
<style type="text/css">
  .submenu {min-height:30px}
.submenu .navbar-brand,
.submenu .navbar-nav>li>a {padding-top:5px; padding-bottom:5px}
.submenu .navbar-brand {height: 30px}
.submenu .navbar-toggle {margin: 3px 9px 3px 0px; padding: 4px 4px 4px 4px;}
.submenu .navbar-toggle .icon-bar {width: 16px;}
</style>


 <style>
.dropdown-submenu {
    position: relative;
}

.dropdown-submenu .dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -1px;
}
</style>
 <script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>

<script>
$(document).ready(function(){
  $('.dropdown-submenu a.test1').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>
<!-- Sub Menu End-->

<div style="color: white;background-color: ;margin-top: -10px">
	<nav class="navbar submenu" style="background-color: ;color: white;margin-bottom: 0px;" >
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon">Menu <span class="caret"></span> </span>
                        
      </button>
     </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php"> <span class="glyphicon glyphicon-home"></span> Home</a></li>
  
 
     
      </ul>



    </div>

  </div>


</nav>


</div>
	




 










     
                                         
 
 
 