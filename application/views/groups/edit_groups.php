<div class="main-panel">
<div class="content">

       <div class="container-fluid">
           <div class="row">
               <div class="col-md-12">
                   <div class="card">
                       <div class="header">
                           <h4 class="title">Edit House</h4>
                       </div>
                       <?php foreach ($edit as  $res) { } ?>
                       <div class="content">
                           <form method="post" action="<?php echo base_url(); ?>groups/update_groups" class="form-horizontal" enctype="multipart/form-data" id="feesformsection" name="feesformsection">
						        <div class="form-group">
									  <label class="col-sm-2 control-label">House Name <span class="mandatory_field">*</span></label>
									  <div class="col-sm-3">
											<input type="text" name="groups_name" class="form-control"  value="<?php echo $res->group_name; ?>" maxlength="30">
											<input type="hidden" name="id" class="form-control"  value="<?php echo $res->id; ?>">
									  </div>
									  
									  <label class="col-sm-2 control-label">Status <span class="mandatory_field">*</span></label>
									  <div class="col-sm-3">
									   <select name="status"  class="selectpicker form-control" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
										  <option value="Active">Active</option>
										  <option value="Deactive">Inactive</option>
										</select><script language="JavaScript">document.feesformsection.status.value="<?php echo $res->status; ?>";</script>
									  </div>
									  
									<div class="col-sm-2">
										<input type="submit" id="save" class="btn btn-info btn-fill center"  value="SAVE">
									</div>
                                 </div>
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
  $('#mastersmenu').addClass('collapse in');
  $('#master').addClass('active');
$('#curricular2').addClass('active');

   $('#feesformsection').validate({ // initialize the plugin
       rules: {
           groups_name:{required:true },
  		     status:{required:true }
       },
       messages: {
             groups_name:"This field cannot be empty!",
  		       status:"Please choose an option!"
          }
   });
});

</script>
