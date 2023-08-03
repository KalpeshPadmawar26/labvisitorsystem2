<?php
$navPage='uploaddata';
$classIcon="fa fa-home";

if(session_id()){}  else  {  session_start(); }
?>

<?php
if (isset($_SESSION["varSesUserType"]) AND $_SESSION["varSesUserType"]=="LoginSuccessAdmin")
{
?>

<?php 
$indid = array();
$indsq = array();

include('connectionmanager.php');
$location=$_GET['ptype'];
$added_for=$_GET['pfor'];
include('ssn.php');
//$result = $con->select('tbl_events',"event_name='{$eventname}'");
                           $varLoginUserName=$_SESSION["u_name"];

$result = $con->selectsort('tbl_pdf',"location='{$location}' and username='{$varLoginUserName}' and added_for='{$added_for}'",'sequence');
$resultdialogs = $con->select('tbl_pdf',"location='{$location}' limit 0,1");


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
  <script src="../bootstrap37/datepicker/jquery.js"></script>  


  <div class="row">
       <div class="col-md-12">
            <div class="table-responsive">
                                <p></p>
                                    <table class="table table-primary mb30 table-hover">
                                        <thead>
                                          <tr>
                                          
                                            <th>Sr. No.</th>
                                            <th>Type</th>
                                            <th>Course</th>
                                            <th>Part/Sem</th>
                                            <th>Title</th>
                                            <th>Year</th>
                                            <th>Added By</th>
                                            <th>Show PDF</th>                                            
                                            <th>Delete PDF</th>                                             
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
                                            <td><?php echo ucwords($row['location']);?></td>
                                            <td><?php echo ucwords($row['department']);?></td>
                                            <td><?php echo ucwords($row['pdf_course']);?></td>
                                            <td><?php echo ucwords($row['location']);?></td>
                                            <td><?php echo ucwords($row['details']);?></td>
                                            <td><?php echo $row['year'];?></td>

                                             
                                             
                                             <td><a href="../pdf_show.php?unum=<?php echo $row['id']; ?>" target="_blank"> <span class="fa  fa-eye"></span></a></td>


                                            <td><?php ?>
                                            <a href="pdf_delete.php?id=<?php echo $row['id'];?>&ptype=<?php echo $row['location'];?>&pfor=<?php echo $row['added_for'];?>" onclick="return confirm('Are you sure you want to Delete this PDF?');"><span class="fa fa-trash-o"></span></a></td>
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

       </div>
  </div>
  



         <script src="js/jquery-ui-1.10.3.min.js"></script>
          
  
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
                            url:'pdfUpdateAfterSort.php?rowsqArray='+rowsq+'&orderArray='+order,
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