<?php 
$navPage='services';
$varFormTitle="Service";
$indid = array();
$indsq = array();

include('connectionmanager.php');
$eventname=$_GET['eventname'];
include('ssn.php');
//$result = $con->select('tbl_events',"event_name='{$eventname}'");

$result = $con->selectsort('tbl_events',"added_for='{$eventname}'",'sequence');
$resultdialogs = $con->select('tbl_events',"added_for='{$eventname}' limit 0,1");


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
       


       <?php include("add_page_top_link.php"); ?>  
         
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
                        
							    
                            
                                                
                              <div class="col-md-12">
                                <div class="table-responsive">
                                <p></p>
                                    <table class="table table-primary mb30">
                                        <thead>
                                          <tr>
                                          
                                            <th>Sr. No.</th>
                                            <th><?php echo ucwords($varFormTitle); ?> Short Name</th>
                                            <th><?php echo ucwords($varFormTitle); ?> Long Name</th>
                                            <th><?php echo ucwords($varFormTitle); ?> Thumbnail</th>
                                            <th><?php echo ucwords($varFormTitle); ?> Location</th>
                                            <th><?php echo ucwords($varFormTitle); ?> Code</th>
                                                                              	
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
                                            <td><?php echo $row['event_name'];?></td>
                                             
                                            <td><?php echo $row['details'];?></td>
                                            <td><img src="../uploads/<?php echo $row['thumb_name'];?>" height="60px" width="90px"></td>
                                            <td><?php echo $row['location'];?></td>
                                            <td><?php echo "SERVICE".$row['evtid'];?></td>
                                             

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
                        
                      
                
               


         <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/jquery-migrate-1.2.1.min.js"></script>
        <script src="js/jquery-ui-1.10.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
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
                            url:'service_sortable.php?rowsqArray='+rowsq+'&orderArray='+order,
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

			<?php 
			include_once('service_edit_dialog.php');
			?>
    </body>

<!-- Mirrored from themepixels.com/demo/webpage/chain/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 21 Aug 2014 17:22:52 GMT -->
</html>
