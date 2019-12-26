<div class="main-panel">
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="header">
							<h4 class="title">Create Academic Year</h4>
						</div>
						<div class="content">
							<form method="post" action="
								<?php echo base_url(); ?>years/create" class="form-horizontal" enctype="multipart/form-data" id="myformsection">
								
							<fieldset>
								 <div class="form-group">
									<label class="col-sm-2 control-label">From <span class="mandatory_field">*</span></label>
									<div class="col-sm-4">
									  <input type="text" name="from_month" id="from_year" class="form-control datepicker" required value="">
									</div>
									<div class="col-sm-6"></div>
								 </div>
							  </fieldset>
							<fieldset>
								 <div class="form-group">
									<label class="col-sm-2 control-label">To <span class="mandatory_field">*</span></label>
									<div class="col-sm-4">
									  <input type="text" name="end_month" id="to_year" required class="form-control datepicker"  />
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
				</div>
				<?php if($this->session->flashdata('msg')): ?>
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
       ×</button>
					<?php echo $this->session->flashdata('msg'); ?>
				</div>
				<?php endif; ?>
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="content">
									<h4 class="title">Academic Years</h4><br>
									<div class="fresh-datatables">
										<table id="bootstrap-table" class="table">
											<thead>
												<th>S.No</th>
												<th>From</th>
												<th>To</th>
												<th>Status</th>
												<th>Actions</th>
											</thead>
											<tbody>
												<?php
                                $i=1;
                                foreach ($result as $rows)
								{ $sta=$rows->status;
								 $yrdata=$rows->from_month;
                                 $month= strtotime($yrdata);
								 $endmonth=$rows->to_month;
								 $month1= strtotime($endmonth);
                                 ?>
												<tr>
													<td>
														<?php  echo $i; ?>
													</td>
													<td>
														<?php  echo date('M-Y',$month); ?>
													</td>
													<td>
														<?php echo date('M-Y',$month1); ?>
													</td>
													<td>
														<?php

										  if($sta=='Active'){?>
														<button class="btn btn-success btn-fill btn-wd">Active</button>
														<?php  }else{?>
														<button class="btn btn-danger btn-fill btn-wd">Inactive</button>
														<?php } ?>
													</td>
													<td>
														<a rel="tooltip" title="Edit" href="<?php echo base_url(); ?>years/edit_years/<?php echo $rows->year_id; ?>" class="btn btn-simple btn-warning btn-icon edit" style="font-size:20px;">
														<i class="fa fa-edit"></i>
														</a>
													</td>
												</tr>
												<?php $i++;  }  ?>
											</tbody>
										</table>
									</div>
								</div>
								<!-- end content-->
							</div>
							<!--  end card  -->
						</div>
						<!-- end col-md-12 -->
					</div>
					<!-- end row -->
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
         from_year:{required:true },
		 end_month:{required:true }
     },
     messages: {
           from_year:"This field cannot be empty!",
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
