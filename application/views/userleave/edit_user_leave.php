<div class="main-panel">
<div class="content">
	<div class="container-fluid">
	<div class="row">
	<div class="col-md-12">
	<div class="card">

	<div class="header"> 
	   <h4 class="title">Edit Leave</h4>
	</div>
	<?php foreach ($edit as  $res) { } ?>
	<div class="content">
   <form method="post" action="<?php echo base_url(); ?>userleavemaster/update_leave" class="form-horizontal" enctype="multipart/form-data" id="leaveformsection" name="leaveformsection">
   
			<fieldset>
				  <div class="form-group">
					  <label class="col-sm-2 control-label">Category <span class="mandatory_field">*</span></label>
					  <div class="col-sm-4">
					   <select name="leave_type"  class="selectpicker form-control" data-menu-style="dropdown-blue">
							  <option value="1">Leave</option>
							  <option value="0">Permission</option>
						</select><script language="JavaScript">document.leaveformsection.leave_type.value="<?php echo $res->leave_type; ?>";</script>
					  </div>
					  <div class="col-sm-6"></div>
				  </div>
			  </fieldset>
			<fieldset>
				  <div class="form-group">
					  <label class="col-sm-2 control-label">Title <span class="mandatory_field">*</span></label>
					  <div class="col-sm-4">
						<input type="text" name="leave_name" class="form-control"  value="<?php echo $res->leave_title; ?>" maxlength="30" >
					  </div>
					  <div class="col-sm-6"></div>
				  </div>
			  </fieldset>
			  
			  
				<fieldset>
					<div class="form-group">
					 <label class="col-sm-2 control-label">Status <span class="mandatory_field">*</span></label>
					  <div class="col-sm-4">
					   <select name="status"  class="selectpicker form-control" data-menu-style="dropdown-blue">
							  <option value="Active">Active</option>
							  <option value="Deactive">Inactive</option>
						</select><script language="JavaScript">document.leaveformsection.status.value="<?php echo $res->status; ?>";</script>
					  </div>
					  <div class="col-sm-6"></div>
					</div>
			   </fieldset>
			   
			   <fieldset>
					<div class="form-group">
					<label class="col-sm-2 control-label">&nbsp;</label>
						<div class="col-sm-4">
							<input type="hidden" name="id" class="form-control"  value="<?php echo $res->id; ?>">
							<input type="submit" id="save" class="btn btn-info btn-fill center"  value="SAVE">
						</div>
						<div class="col-sm-6"></div>
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
	$('#leaveformsection').validate({ // initialize the plugin
		rules: {
			leave_name:{required:true },
			leave_type:{required:true },
			status:{required:true }
		},
		messages: {
			leave_name:"This field cannot be empty!",
			leave_type:"Please choose an option!",
			status:"Please choose an option!"
		}
	});
});

</script>
