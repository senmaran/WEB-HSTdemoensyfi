<div class="main-panel">
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="header">
							<h4 class="title">Edit Academic Year</h4>
						</div>
						<?php foreach($res as $row){}	?>
						<div class="content">
							<form method="post" action="<?php echo base_url(); ?>years/update_year" class="form-horizontal" enctype="multipart/form-data" name="myformsection" id="myformsection">
								<input type="hidden" name="year_id" class="form-control" value="<?php echo $row->year_id; ?>">
								
								<fieldset>
								 <div class="form-group">
									<label class="col-sm-2 control-label">From <span class="mandatory_field">*</span></label>
									<div class="col-sm-4">
									  <input type="text" name="from_month" id="from_year" class="form-control datepicker" value="<?php $date=date_create($row->from_month); echo date_format($date,"d-m-Y");?>">
									</div>
									<div class="col-sm-6"></div>
								 </div>
							  </fieldset>
							<fieldset>
								 <div class="form-group">
									<label class="col-sm-2 control-label">To <span class="mandatory_field">*</span></label>
									<div class="col-sm-4">
									  <input type="text" name="end_month" id="to_year" class="form-control datepicker" value="<?php $date=date_create($row->to_month); echo date_format($date,"d-m-Y");?>"  />
									</div>
									<div class="col-sm-6"></div>
								 </div>
							  </fieldset>
							  <fieldset>
								 <div class="form-group">
									<label class="col-sm-2 control-label">Status <span class="mandatory_field">*</span></label>
									<div class="col-sm-4">
									    <select name="status"  class="selectpicker form-control">
										  <option value="Active">Active</option>
										  <option value="Deactive">Inactive</option>
										</select><script language="JavaScript">document.myformsection.status.value="<?php echo $row->status; ?>"</script>
									</div>
									<div class="col-sm-6"></div>
								 </div>
							  </fieldset>
							   <fieldset>
								 <div class="form-group">
									<label class="col-sm-2 control-label"></label>
									<div class="col-sm-4">
										<input type="submit" id="save" class="btn btn-info btn-fill center" value="SAVE">
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
<?php 
$min_date = date('Y-m-d', strtotime('-100 year')); 
$max_date = date('Y-m-d', strtotime('+5 year')); 
?>
<script type="text/javascript">
 $('#myformsection').validate({ // initialize the plugin
     rules: {
         from_month:{required:true },
		 end_month:{required:true }
     },
     messages: {
           from_month:"This field cannot be empty!",
		   end_month:"This field cannot be empty!"
         }
 });

  $('#bootstrap-table').DataTable();
</script>
<script type="text/javascript">
      $().ready(function(){
        $('#mastersmenu').addClass('collapse in');
        $('#master').addClass('active');
        $('#masters1').addClass('active');
		
        $('.datepicker').datetimepicker({
          format: 'DD-MM-YYYY',
		  minDate: new Date('<?php echo $min_date; ?>'),
		  maxDate: new Date('<?php echo $max_date; ?>'),
          icons: {
              time: "fa fa-clock-o",
              date: "fa fa-calendar",
              up: "fa fa-chevron-up",
              down: "fa fa-chevron-down",
              previous: 'fa fa-chevron-left',
              next: 'fa fa-chevron-right',
              today: 'fa fa-screenshot',
              clear: 'fa fa-trash',
              close: 'fa fa-remove'
          }
       });
      });
 </script>
