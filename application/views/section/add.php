<div class="main-panel">
<div class="content">

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="header">
							<h4 class="title">Create Section</h4>
							<p class="pull-right btn btn-wd" style="margin-top:-30px;">
								<a href="
									<?php echo base_url(); ?>classadd/addclass">Add / View Classes
								</a>
							</p>
						</div>
						<div class="content">
							 <form action="<?php echo base_url(); ?>sectionadd/createsection" method="post" enctype="multipart/form-data" id="myformsection">
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>Section <span class="mandatory_field">*</span></label>
											<input type="text" class="form-control"  placeholder="" name="sectionname" id="sectionname" value="" maxlength="15">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Status <span class="mandatory_field">*</span></label>
												<select name="status"  class="selectpicker form-control">
													<option value="Active">Active</option>
													<option value="Deactive">Inactive</option>
												</select>
											</div>
										</div>
                    <div class="col-md-4">

                    	<div class="form-group">
                          	<label class="col-sm-2 control-label">&nbsp;</label><br>
							<input type="submit" id="save" class="btn btn-info btn-fill center" value="CREATE">

                      </div>
                    </div>
									</div>

									<div class="clearfix"></div>
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
							<h4 class="title">Sections</h4>
						</div>
                            <div class="content">

                                <div class="fresh-datatables">



                          <table id="bootstrap-table" class="table">
                              <thead>

                                <th>S.No</th>
                                <th>Section</th>
                                <th>Status</th>
                                <th>Actions</th>

                              </thead>
                              <tbody>
                                <?php
                                $i=1;
                                foreach ($result as $rows) { $sta=$rows->status;
                                ?>
                                  <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $rows->sec_name; ?></td>
									<td>
										<?php
										if($sta=='Active'){?>
										<button class="btn btn-success btn-fill btn-wd">Active</button>
										<?php  }else{?>
										<button class="btn btn-danger btn-fill btn-wd">Inactive</button>
										<?php } ?>
								  </td>

                                    <td>

                                      <a rel="tooltip" title="Edit" href="<?php echo base_url();  ?>sectionadd/updatesection/<?php echo $rows->sec_id; ?>" class="btn btn-simple btn-warning btn-icon edit" style="font-size:20px;"><i class="fa fa-edit"></i></a>
                                      </td>
                                  </tr>
                                  <?php $i++;  }  ?>
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
</div>

<script type="text/javascript">

$(document).ready(function () {
  $('#mastersmenu').addClass('collapse in');
  $('#master').addClass('active');
  $('#masters3').addClass('active');



 $('#myformsection').validate({ // initialize the plugin
     rules: {
         sectionname:{required:true },
     },
     messages: {
           sectionname: "This field cannot be empty!"
         }
 });
});

  $('#bootstrap-table').DataTable( {
    //"ordering": false
  } );

</script>
