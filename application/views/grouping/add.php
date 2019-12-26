<div class="main-panel">
<div class="content">
       <div class="container-fluid">
           <div class="row">
               <div class="col-md-12">
                   <div class="card">
                       <div class="header">
                           <h4 class="title">Create Group</h4>
                       </div>

                       <div class="content">
                           <form method="post" action="" class="form-horizontal" enctype="multipart/form-data" id="grouping_form">

                                 <fieldset>
                                      <div class="form-group">
                                          <label class="col-sm-2 control-label">Title <span class="mandatory_field">*</span></label>
                                          <div class="col-sm-4">
                                              <input type="text" name="group_title" class="form-control" value="" maxlength="30">
                                          </div>
										  <div class="col-sm-6"></div>
                                      </div>
									  </fieldset>
									  
									  <fieldset>
                                      <div class="form-group">
                                          <label class="col-sm-2 control-label">Admin <span class="mandatory_field">*</span></label>
                                          <div class="col-sm-4">
                                            <select name="group_lead"  data-title="Select" class="selectpicker form-control">
                                              <?php foreach($list_of_teacher as $rows){ ?>
                                                 <option value="<?php echo $rows->user_id; ?>"><?php echo $rows->name; ?></option>
											  <?php  } ?>
                                           </select>
                                          </div>
										  <div class="col-sm-6"></div>
                                      </div>
									  </fieldset>
									  
									  <fieldset>
                                      <div class="form-group">
                                          <label class="col-sm-2 control-label">Status <span class="mandatory_field">*</span></label>
                                          <div class="col-sm-4">
                                            <select name="status" data-title="Status" class="selectpicker form-control">
                                               <option value="Active">Active</option>
                                               <option value="Deactive">Inactive</option>
                                           </select>
                                          </div>
										<div class="col-sm-6"></div>
                                      </div>
                                  </fieldset>
								  <fieldset>
                                        <div class="form-group">
											<label class="col-sm-2 control-label"></label>
											<div class="col-sm-4">
													<input type="submit" id="save" class="btn btn-info btn-fill center" value="CREATE">
		                                           
                                            </div>
										<div class="col-sm-6"></div>
                                       </div>
                                    </fieldset>

                             </form>
                       </div>
                   </div>
               </div>
           </div>

           <div class="row">
             <div class="col-md-12">
                 <div class="card">
                     <div class="toolbar">
                         <div class="header">List of Groups</div>
                     </div>
					<div class="content">
                     <div class="fresh-datatables">
                     <table id="bootstrap-table" class="table">
                         <thead>

                           <th data-field="id" class="text-left">S.No</th>
                           <th data-field="name" class="text-left" data-sortable="true">Group Name</th>
                           <th data-field="Section" class="text-left" data-sortable="true">Admin</th>
                           <th data-field="status" class="text-left" data-sortable="true">Status</th>
                           <th data-field="actions" class="td-actions text-left" data-events="operateEvents">Action</th>
                         </thead>
                         <tbody>
                           <?php $i=1; foreach ($list_of_grouping as $rowsclass) { $sta=$rowsclass->status; ?>
                             <tr>
                                <td><?php echo $i;  ?></td>
                               <td><?php echo $rowsclass->group_title;  ?></td>
                               <td><?php echo $rowsclass->name;  ?></td>
                                <td>
                                    <?php
                                    if($sta=='Active'){?>
                                    <button class="btn btn-success btn-fill btn-wd">Active</button>
                                    <?php  }else{?>
                                    <button class="btn btn-danger btn-fill btn-wd">Inactive</button>
                                    <?php } ?>
                                  </td>
                               <td>
									<a rel="tooltip" title="Edit" class="btn btn-simple btn-warning btn-icon table-action edit" href="<?php echo base_url(); ?>grouping/edit_group/<?php  echo $rowsclass->id; ?>" style="font-size:20px;"><i class="fa fa-edit"></i></a>

                                    <a rel="tooltip" href="<?php echo base_url(); ?>grouping/view_members/<?php echo  $rowsclass->id; ?>" title="Add/View Members" class="open-AddBookDialog btn btn-simple btn-warning btn-icon edit" style="font-size:20px;"><i class="fa fa-th">  </i></a>
                               </td>
                             </tr>
                             <?php $i++;  }  ?>
                         </tbody>
                     </table>
				</div>
				</div>
              </div><!--  end card  -->
             </div> <!-- end col-md-12 -->
           </div>

       </div>
   </div>
</div>

<script type="text/javascript">

$('#grouping_form').validate({ // initialize the plugin
  rules: {
      group_title:{required:true },
      group_lead:{required:true },
      status:{required:true },
  },
  messages: {
        group_title: "This field cannot be empty!",
        group_lead:"Please choose an option!",
        status:"Please choose an option!"

      },

submitHandler: function(form) {
 //alert("hi");
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
    url: "<?php echo base_url(); ?>grouping/create_group",
     type:'POST',
    data: $('#grouping_form').serialize(),
    success: function(response) {
        if(response=="success"){
         //  swal("Success!", "Thanks for Your Note!", "success");
           $('#grouping_form')[0].reset();
           swal({
    title: "Wow!",
    text: "Group created",
    type: "success"
}, function() {
     location.reload();
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

 $('#bootstrap-table').DataTable();
      jQuery('#groupingmenu').addClass('collapse in');
      $('#grouping').addClass('active');
      $('#group1').addClass('active');
</script>
