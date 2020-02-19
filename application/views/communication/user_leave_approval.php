<div class="main-panel">
   <div class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <?php if($this->session->flashdata('msg')): ?>
               <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                  ×</button> <?php echo $this->session->flashdata('msg'); ?>
               </div>
               <?php endif; ?>
               <div class="card">
                  <div class="header">
                     <legend>Staff Leave Details</legend>
                  </div>
                  <div class="content">
                     <form method="post" class="form-horizontal" enctype="multipart/form-data" id="myformsection" name="myformsection">
					   <?php
                           foreach($res as $row){
                           $id=$row->leave_id;
                           $date1=date_create($row->from_leave_date);
                           $leave=$row->type_leave;
                           $cell=$row->phone;
						   $tleave_date = $row->to_leave_date;
                           } ?>
                        <fieldset>
                           <div class="form-group">
                              <label class="col-sm-2 control-label">Title</label>
                              <div class="col-sm-4">
                                 <input type="text" name="leaves_type" id="leaves_type" readonly value="<?php echo  $row->leave_title; ?>" class="form-control">
                              </div>
                              <label class="col-sm-2 control-label">From Date</label>
                              <div class="col-sm-4">
                                 <input type="text" name="leave_date" readonly value="<?php $date1=date_create($row->from_leave_date);
                                    echo date_format($date1,"d-m-Y"); ?>" class="form-control">
                                 <input type="hidden" name="leave_id" value="<?php echo $id;?>" class="form-control">
                                 <input type="hidden" name="cell" value="<?php echo $cell;?>" class="form-control">
                              </div>
                           </div>
                        </fieldset>
                        <?php if($leave==0){?>
                        <fieldset>
                           <div class="form-group">
                              <label class="col-sm-2 control-label">Time</label>
                              <div class="col-sm-2">
                                 <input type="text" disabled class="form-control timepicker" value="<?php echo $row->frm_time;?>" name="frm_time" placeholder="From Time"/>
                              </div>
                              <div class="col-sm-2">
                                 <input type="text" disabled name="to_time" value="<?php echo $row->to_time;?>" class="form-control timepicker" placeholder="To Time"/>
                              </div>
                           </div>
                        </fieldset>
                        <?php }?>
                        <br/>
                        <fieldset>
                           <div class="form-group">
                              <label class="col-sm-2 control-label">To Date</label>
                              <div class="col-sm-4">
                                 <input type="text" name="tleave_date" readonly value="<?php if ($tleave_date!="") { $date= date_create($row->to_leave_date); echo date_format($date,"d-m-Y"); }?>" class="form-control">
                              </div>
                              <label class="col-sm-2 control-label">Status <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4">
                                 <select class="form-control" name="status" id="choose" >
                                    <option value="Pending">Pending</option>
                                    <option value="Approved">Approved</option>
                                    <option value="Rejected">Reject</option>
                                 </select>
                                 <script language="JavaScript">document.myformsection.status.value="<?php echo $row->status; ?>";</script>
                              </div>
                           </div>
                        </fieldset>
                        <fieldset>
                           <div class="form-group">
                              <label class="col-sm-2 control-label">Description</label>
                              <div class="col-sm-4">
                                 <textarea name="leave_description" disabled class="form-control"  rows="4" cols="80"><?php echo $row->leave_description;?></textarea>
                              </div>
                              <label class="col-sm-2 control-label">&nbsp;</label>
                              <div class="col-sm-4">
                                 <button type="submit" id="save" class="btn btn-info btn-fill center" style="cursor:pointer">SAVE</button>
                              </div>
                           </div>
                        </fieldset>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
   $(document).ready(function () {
    $('#teachermenu').addClass('collapse in');
    $('#teacher').addClass('active');
    $('#teacher3').addClass('active');
	
	
		$('#myformsection').validate({ // initialize the plugin
    rules: {
		status:{required:true }
     },
   messages: {
		status:"Select Status"
          },

   submitHandler: function(form) {
   swal({
           title: "Are you sure?",
           text: "You Want Confirm this form",
           type: "success",
           showCancelButton: true,
           confirmButtonColor: '#DD6B55',
           confirmButtonText: 'Yes',
           cancelButtonText: "No",
           closeOnConfirm: false,
           closeOnCancel: false
     },
     function(isConfirm) {
        if (isConfirm) {
			$.ajax({
				 url: "<?php echo base_url(); ?>communication/update_status",
				 type:'POST',
				 data: $('#myformsection').serialize(),
				 success: function(response) {
					 //alert (response);
				if(response=="success")
				{
					swal({
						 title: "Done!",
						 text: "Status Updated!",
						 type: "success"
					  },
					function(){
					 window.location = "<?php echo base_url(); ?>communication/view_user_leaves";
					});
				}else{
					sweetAlert("Oops...", "Something went wrong!", "error");
				}
         }
     });
   }else{
       swal("Cancelled", "Process Cancel :)", "error");
   }
   });
   }
  });
	
  });

</script>
