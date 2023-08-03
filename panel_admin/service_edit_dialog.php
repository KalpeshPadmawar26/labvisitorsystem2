 <script type="text/javascript" src="nicEdit.js"></script>
    <script type="text/javascript">
      bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
    </script>

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Edit Details</h4>
            </div>
            <form action="service_events_update.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
            <div class="modal-body col-lg-offset-2">
                
                    <div class="row">
                    	<div class="form-group">
                    <label class="col-lg-3 control-label"><?php echo ucwords($varFormTitle); ?> Name:</label>
                    <div class="col-lg-6">
                        <input type="text"  name="event_name" value="<?php echo htmlentities($rowdialogs['event_name']); ?>" class="form-control" onkeyup="this.value = this.value.toUpperCase();" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122))' required/>
                    </div>
	                </div><!-- form-group -->
                    <div class="form-group">
<!--                     <label class="col-lg-3 control-label">Start Time</label>            
 -->                    <div class="input-group">
                    <div class="bootstrap-timepicker">
                        <div class="col-lg-6">    
                            <input type="hidden" name="start_time" value="<?php echo $rowdialogs['start_time']; ?>" class="timepicker form-control tmpckr" />
                        </div>
                        </div>
                        </div>
                    </div><!-- form-group -->
														
                                                        
                    <div class="form-group">
<!--                                             <label class="col-lg-3 control-label">End Time</label>            
 -->                                            <div class="input-group">
                                            <div class="bootstrap-timepicker">
                                                <div class="col-lg-6">    
                                                	<input type="hidden" value="<?php echo $rowdialogs['end_time']; ?>" name="end_time" class="timepicker form-control tmpckr" />
                                                    <input type="hidden" value="<?php echo $_GET['eventname']; ?>" name="event_id" />
                                                </div>
                                                </div>
                                                </div>
                                            </div><!-- input-group -->



                          <div class="form-group">
                            <label class="col-lg-3 control-label"><?php echo ucwords($varFormTitle); ?> Long Name:</label>
                            <div class="col-lg-6">
                                
                                <textarea name="details"  id="details" class="form-control"  placeholder="<?php echo ucwords($varFormTitle); ?> Long Name" required> <?php echo htmlentities($rowdialogs['details']); ?> </textarea>
                                

                                


                            </div>
                        </div><!-- form-group -->
													
                    <div class="form-group">
                                                <label class="col-lg-3 control-label"><?php echo ucwords($varFormTitle); ?> Locations:</label>
                                                <div class="col-lg-6">
                                                    <input type="text" name="locations" value="<?php echo $rowdialogs['location']; ?>" class="form-control" readonly/>
                                                </div>
                                            </div><!-- form-group -->
                                            
                  
                                            
                    <div class="form-group">
                                                	 
														<div class="col-lg-6">
                                                        <input type="hidden" value="<?php echo $rowdialogs['event_date']; ?>" name="event_date"  class="datepicker form-control" readonly/>
                                                        <input type="hidden" value="<?php echo $rowdialogs['evtid']; ?>" name="event_evtid"/>
													</div>
											</div><!-- form-group -->
                                      
                    </div><!-- row -->
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
            </div>
       
        </form>
         </div>
  

<div class="modal fade" id="editimage" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog modal-vertical-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Upload New Photo</h4>
            </div>
            <div class="modal-body col-lg-offset-2">
                <form action="service_events_update.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                    <div class="row">
                    <input type="hidden" value="<?php echo $_GET['eventname']; ?>" name="event_id" />
                    <input type="hidden" name="event_name" value="<?php echo htmlentities($rowdialogs['event_name']); ?>">
                    <input type="hidden" name="start_time" value="<?php echo $rowdialogs['start_time']; ?>">
                    <input type="hidden" name="end_time" value="<?php echo $rowdialogs['end_time']; ?>">
                    <input type="hidden" name="event_date" value="<?php echo $rowdialogs['event_date']; ?>">
                    <input type="hidden" name="location" value="<?php echo $rowdialogs['location']; ?>">
                    <input type="hidden" name="details" value="<?php echo htmlentities($rowdialogs['details']); ?>">
                    <input type="text" name="event_evtid" value="<?php echo $rowdialogs['evtid']; ?>">
                    <input type="hidden" name="event_added_for" value="<?php echo $rowdialogs['added_for']; ?>">
                    
                    
                        <div class="form-group">
                            <label class="col-lg-3 control-label">upload photo</label>
                            <div class="col-lg-6">
                                <input type="file" name="fileUpload[]" class="form-control fileInput" accept="image/*">
                            </div>
                        </div><!-- form-group -->
                       
                    </div><!-- row -->
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="upload">Upload</button>
            </div>
        </div>
         </form>
    </div>
</div>