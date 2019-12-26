<div class="main-panel">

<div class="content">
       <div class="container-fluid">
           <div class="row">
               <div class="col-md-12">
                   <div class="card">
                       <div class="header">
                           <h4 class="title">Create Quota</h4>
                       </div>
                       <div class="content">
                           <form method="post" action="<?php echo base_url(); ?>quota/create_quota" class="form-horizontal" enctype="multipart/form-data" id="feesformsection" name="feesformsection">
                                 <fieldset>
                                      <div class="form-group">
                                          <label class="col-sm-2 control-label">Quota <span class="mandatory_field">*</span></label>
                                          <div class="col-sm-4">
										    <input type="text" name="quota_name" class="form-control"  value="" maxlength="30">
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
                                          <label class="col-sm-2 control-label"></label>
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
                            <div class="content">
                              <h4 class="title">List of Quota </h4><br>
                                <div class="fresh-datatables">
                          <table id="example" class="table">
                              <thead>
                                <th>S.no</th>
                                <th>Quota</th>
								                <th>Status</th>
                                <th class="disabled-sorting text-right">Actions</th>
                              </thead>
                              <tbody>
                                <?php
                                  $i=1;
                                  foreach($result as $rows){$stu=$rows->status;
                                ?>
                                  <tr>
                                    <td><?php  echo $i; ?></td>
                                    <td><?php  echo $rows->quota_name; ?></td>

									<td><?php
										  if($stu=='Active'){?>
											<button class="btn btn-success btn-fill btn-wd">Active</button>
										 <?php  }else{?>
										  <button class="btn btn-danger btn-fill btn-wd">Inactive</button>
										  <?php } ?></td>


                                    <td class="text-right">
                                      <a href="<?php echo base_url(); ?>quota/edit_quota/<?php echo $rows->id; ?>" class="btn btn-simple btn-warning btn-icon edit" rel="tooltip" title="Edit" style="font-size:20px;"><i class="fa fa-edit"></i></a>
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

       $('#feesmenu').addClass('collapse in');
        $('#payment').addClass('active');
        $('#fees2').addClass('active');

   $('#feesformsection').validate({ // initialize the plugin
       rules: {
           quota_name:{required:true },
  		     status:{required:true }
       },
       messages: {
             quota_name:"This field cannot be empty!",
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
				 searchPlaceholder: "Search",
             },
			 "bAutoWidth": false,
			"columns": [
					{ "width": "7%" },
					{ "width": "70%" },
					{ "width": "15%%" },
					{ "width": "8%" }
				  ]
         }); 

</script>
