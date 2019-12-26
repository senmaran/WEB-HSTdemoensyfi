<div class="main-panel">

<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="card">
   <div class="header">
	   <h4 class="title">Create Leave</h4>
   </div>
   <div class="content">
	   <form method="post" action="<?php echo base_url(); ?>userleavemaster/create_leave" class="form-horizontal" enctype="multipart/form-data" id="leaveformsection" name="leaveformsection">
	   
	    <fieldset>
				  <div class="form-group">
					  <label class="col-sm-2 control-label">Category <span class="mandatory_field">*</span></label>
					  <div class="col-sm-4">
					   <select name="leave_type"  class="selectpicker form-control" data-title="Leave Type" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
							  <option value="1">Leave</option>
							  <option value="0">Permission</option>
						</select>
					  </div>
					   <div class="col-sm-6"></div>
				  </div>
			  </fieldset>
			  
			 <fieldset>
				  <div class="form-group">
					  <label class="col-sm-2 control-label">Title <span class="mandatory_field">*</span></label>
					  <div class="col-sm-4">
						<input type="text" name="leave_name" class="form-control"  value="" maxlength="30">
					  </div>
					  <div class="col-sm-6"></div>
				  </div>
			  </fieldset>
			  
			  
			  
				<fieldset>
					<div class="form-group">
					 <label class="col-sm-2 control-label">Status <span class="mandatory_field">*</span></label>
					  <div class="col-sm-4">
					   <select name="status"  class="selectpicker form-control" data-title="Status" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
							  <option value="Active">Active</option>
							  <option value="Deactive">Inactive</option>
						</select>
					  </div>
					   <div class="col-sm-6"></div>
					</div>
			   </fieldset>
			   
			   <fieldset>
					<div class="form-group">
					<label class="col-sm-2 control-label">&nbsp;</label>
						<div class="col-sm-4">
							<input type="submit" id="save" class="btn btn-info btn-fill center"  value="CREATE">
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
<?php if($this->session->flashdata('msg')): ?>
<div class="alert alert-success">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
×</button> <?php echo $this->session->flashdata('msg'); ?>
</div>

<?php endif; ?>
<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
	<div class="card">
	 <div class="header">
	   <h4 class="title">List Leaves</h4>
   </div>
		<div class="content">
			<div class="fresh-datatables">
	  <table id="example" class="table">
		  <thead>
			<th>S.no</th>
			<th>Category </th>
			<th>Title</th>
			<th>Status</th>
			<th class="disabled-sorting text-right">Actions</th>
		  </thead>
		  <tbody>
			<?php
			  $i=1;
			  foreach($result as $rows){$stu=$rows->status;$per=$rows->leave_type;
			?>
			  <tr>
				<td><?php  echo $i; ?></td>
				<td><?php if($per==0){ echo "Permission"; }else { echo "Leave"; }?></td>
				<td><?php  echo $rows->leave_title; ?></td>
				 <td><?php
					  if($stu=='Active'){?>
						<button class="btn btn-success btn-fill btn-wd">Active</button>
					 <?php  }else{?>
					  <button class="btn btn-danger btn-fill btn-wd">InActive</button>
					  <?php } ?></td>
				<td class="text-right">
				  <a href="<?php echo base_url(); ?>userleavemaster/edit_leave/<?php echo $rows->id; ?>" class="btn btn-simple btn-warning btn-icon edit" rel="tooltip" title="Edit" style="font-size:20px;"><i class="fa fa-edit"></i></a>
				</td>
			  </tr>
						  <?php $i++;   } ?>
		  </tbody>
	  </table>
	</div>
		</div><!-- end content-->
	</div><!--  end card  -->
</div> <!-- end col-md-12 -->
</div> <!-- end row -->
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

 $('#example').DataTable({
            dom: 'lBfrtip',
            buttons: [
                 {
                     extend: 'excelHtml5',
                     exportOptions: {
                     columns: ':visible'
                     }
                 },
                 {
                     extend: 'pdfHtml5',
                     exportOptions: {
                     columns: ':visible'
                     }
                 }
             ],
             "pagingType": "full_numbers",
			 "ordering": false,
             "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
             responsive: true,
             language: {
				 search: "_INPUT_",
				 searchPlaceholder: "Search Leaves",
             },
			 "bAutoWidth": false,
			"columns": [
					{ "width": "7%" },
					{ "width": "30%%" },
					{ "width": "35%%" },
					{ "width": "25%" },
					{ "width": "8%" }
				  ]
         }); 
</script>
