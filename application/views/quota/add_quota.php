<div class="main-panel">

<div class="content">
       <div class="container-fluid">
           <div class="row">
               <div class="col-md-12">
                   <div class="card">
                       <div class="header">
                           <h4 class="title">Add Quota</h4>
                       </div>
                       <div class="content">
                           <form method="post" action="<?php echo base_url(); ?>quota/create_quota" class="form-horizontal" enctype="multipart/form-data" id="feesformsection" name="feesformsection">
                                 <fieldset>
                                      <div class="form-group">
                                          <label class="col-sm-2 control-label">Quota</label>
                                          <div class="col-sm-4">
										                         <input type="text" name="quota_name" class="form-control"  value="">
                                          </div>
                                          <label class="col-sm-2 control-label">Status</label>
                                          <div class="col-sm-4">
                      										   <select name="status"  class="selectpicker form-control" data-title="Status" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                        											  <option value="Active">Active</option>
                        											  <option value="Deactive">De-Active</option>
                      											</select>
                                          </div>
                                      </div>
                                  </fieldset>
								                   <fieldset>
                                        <div class="form-group">
										                      	<!-- <label class="col-sm-2 control-label">&nbsp;</label> -->
                                            <div class="text-center">
											                         <input type="submit" id="save" class="btn btn-info btn-fill center"  value="Save">
                                            </div>
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
                          <table id="bootstrap-table" class="table">
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
										  <button class="btn btn-danger btn-fill btn-wd">De Active</button>
										  <?php } ?></td>


                                    <td class="text-right">
                                      <a href="<?php echo base_url(); ?>quota/edit_quota/<?php echo $rows->id; ?>" class="btn btn-simple btn-warning btn-icon edit"><i class="fa fa-edit"></i></a>
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
             quota_name:"Please Enter Quota Name",
  		       status:"select Status"
          }
   });
});

 $('#bootstrap-table').DataTable();

</script>