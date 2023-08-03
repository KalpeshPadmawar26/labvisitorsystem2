<?php 
$indid = array();
$indsq = array();

include('connectionmanager.php');
$course_part=$_GET['course_part'];
include('ssn.php');
//$result = $con->select('tbl_payment_courses',"course_year='{$course_year}'");

$result = $con->selectsort('tbl_courses_subject',"course_part='{$course_part}'",'subject_name');
  

$rowdialogs=mysqli_fetch_assoc($resultdialogs);

function js_str($s) 
{ 
    return '"' . addcslashes ($s, "\0..\37\"\\") . '"'; 
}
function js_array($array) 
{
     $temp = array_map ('js_str', $array); 
     return '[' . implode(',', $temp) . ']'; 
} 

?>
 <?php
$navPage='Subject';
$classIcon="fa fa-home";

if(session_id()){}  else  {  session_start(); }
?>

<?php
if (isset($_SESSION["varSesUserType"]) AND $_SESSION["varSesUserType"]=="LoginSuccessAdmin")
{
?>
  <?php include("add_page_top_link.php"); ?>  
  <script src="../bootstrap37/datepicker/jquery.js"></script>  


                        
                        <div class="row">

                           <div class="col-md-6">
                               <a  class="btn btn-primary mr5" href="subject_add.php">Return Back</a>
                           </div>
							    
                            
                                                
                              <div class="col-md-12">
                                <div class="table-responsive">
                                <p></p>
                                    <table class="table table-primary mb30">
                                        <thead>
                                          <tr>
                                          
                                            <th>Sr. No.</th>
                                            <th>Course Name</th>
                                            <th>Course Part</th>
                                            <th>Subject Name</th>
                                             
                                            <th>Delete</th>                                            	
                                          </tr>
                                        </thead>
                                        <tbody id="gallary">
                                        
                                        <?php 
										$i=1;
										
										while($row=mysqli_fetch_array($result))
                                        {
                                                $indid[$i]=$row['id'];
                                                $indsq[$i]=$row['sequence'];

                                            ?>
                                          <tr id="recordsArray_<?php echo $row['id']; ?>">
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $row['course_name'];?></td>
                                            <td><?php echo $row['course_part'];?></td>
                                            <td><?php echo $row['subject_name'];?></td>

                                             
 
                                            <td><?php /*?><a href="edit_events.php?id=<?php echo $row['id'];?>"><span class="fa fa-edit"></span></a> | <?php */?>
                                            <a href="subject_add_one_delete.php?id=<?php echo $row['id'];?>&course_part=<?php echo $row['course_part'];?>" onclick="return confirm('Are you sure you want to Delete?');"><span class="fa fa-trash-o"></span></a></td>
                                          </tr>
                                         <?php 
                                                    $i++;       }
                                                    ?>
                                        </tbody>
                                         </table>
                                        <br/>
                                                    <?php 

                                                    echo "<script>".'var rowsq = ', js_array ($indsq), ';'."</script>";
                                                    
                                                    ?>
                                                    
                                </div><!-- table-responsive -->
                            </div>  <!-- col-md-6 -->
                            
                            <!-- col-md-6 -->
                        </div>
                        
                      <div class="row"><!-- col-md-6 --><!-- col-md-6 --> 
                      </div><!-- row -->
                    


         <script src="js/jquery-migrate-1.2.1.min.js"></script>
        <script src="js/jquery-ui-1.10.3.min.js"></script>
         <script src="js/modernizr.min.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/retina.min.js"></script>
        <script src="js/jquery.cookies.js"></script>
        
        <script src="js/jquery.autogrow-textarea.js"></script>
        <script src="js/jquery.mousewheel.js"></script>
        <script src="js/jquery.tagsinput.min.js"></script>
        <script src="js/toggles.min.js"></script>
        <script src="js/bootstrap-timepicker.min.js"></script>
        <script src="js/jquery.maskedinput.min.js"></script>
        <script src="js/select2.min.js"></script>
        <script src="js/colorpicker.js"></script>
        <script src="js/dropzone.min.js"></script>
		<script src="js/upload.js"></script>
        <script src="js/custom.js"></script>
		        <script>
            jQuery(document).ready(function() {
                $('#gallary').sortable({
                    opacity:0.6,
                    cursor:'move',
                    update:function(){
                        var order = $(this).sortable("serialize");
                        $.ajax({
                            type:'GET',
                            url:'course_sort_update.php?rowsqArray='+rowsq+'&orderArray='+order,
                            success:function(theResponse){
                                //alert(theResponse);
                            }
                        })
                    }
                })
                
                // Tags Input
                jQuery('#tags').tagsInput({width:'auto'});
                 
                // Textarea Autogrow
                jQuery('#autoResizeTA').autogrow();
                
                // Spinner
                var spinner = jQuery('#spinner').spinner();
                spinner.spinner('value', 0);
                
                // Form Toggles
                jQuery('.toggle').toggles({on: true});
                
                // Time Picker
				jQuery('.timepicker').timepicker({showMeridian: false,minuteStep: 15});
                jQuery('#timepicker').timepicker({defaultTIme: false});
                jQuery('#timepicker2').timepicker({showMeridian: false});
                jQuery('#timepicker3').timepicker({minuteStep: 15});
                
                // Date Picker
				jQuery('.datepicker').datepicker({dateFormat:"yy-mm-dd"});
                jQuery('#datepicker').datepicker();
                jQuery('#datepicker-inline').datepicker();
                jQuery('#datepicker-multiple').datepicker({
                    numberOfMonths: 3,
                    showButtonPanel: true
                });
                
                // Input Masks
                jQuery("#date").mask("99/99/9999");
                jQuery("#phone").mask("(999) 999-9999");
                jQuery("#ssn").mask("999-99-9999");
                
				////create organization
//				 $("div#createorg").hide();
//				 $("div#tabledata").show();
//				 	$("#create").click(function(){
//					$("div#org").hide();	
//   					 $("div#createorg").show();
//					  $("div#tabledata").hide();
//  					});
				
                // Select2
                jQuery("#select-basic, #select-multi").select2();
                jQuery('#select-search-hide').select2({
                    minimumResultsForSearch: -1
                });
                
                function format(item) {
                    return '<i class="fa ' + ((item.element[0].getAttribute('rel') === undefined)?"":item.element[0].getAttribute('rel') ) + ' mr10"></i>' + item.text;
                }
                
                // This will empty first option in select to enable placeholder
             //   jQuery('select option:first-child').text('');
                
                jQuery("#select-templating").select2({
                    formatResult: format,
                    formatSelection: format,
                    escapeMarkup: function(m) { return m; }
                });
                
                // Color Picker
                if(jQuery('#colorpicker').length > 0) {
                    jQuery('#colorSelector').ColorPicker({
			onShow: function (colpkr) {
			    jQuery(colpkr).fadeIn(500);
                            return false;
			},
			onHide: function (colpkr) {
                            jQuery(colpkr).fadeOut(500);
                            return false;
			},
			onChange: function (hsb, hex, rgb) {
			    jQuery('#colorSelector span').css('backgroundColor', '#' + hex);
			    jQuery('#colorpicker').val('#'+hex);
			}
                    });
                }
  
                // Color Picker Flat Mode
                jQuery('#colorpickerholder').ColorPicker({
                    flat: true,
                    onChange: function (hsb, hex, rgb) {
			jQuery('#colorpicker3').val('#'+hex);
                    }
                });
                
                
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