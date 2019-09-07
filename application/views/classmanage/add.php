<div class="main-panel">
<div class="content">
       <div class="container-fluid">
         <div class="col-md-12">


					
					   
                        <div class="card">
						<div class="header">
                           <h4 class="title">Create Subject</h4>
						   <h5>Allocating Section for Class</h5>
                       </div>

                            <div class="content">
                              <br>
                                <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>classmanage/assign" enctype="multipart/form-data" id="myformclassmange">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Class</label>
                                        <div class="col-md-6">
                                          <select name="class_name" class="selectpicker" data-title="Select Class" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                                  <?php foreach ($class as $clas) {  ?>
                                              <option value="<?php  echo $clas->class_id; ?>"><?php  echo $clas->class_name; ?></option>
                                              <?php } ?>

                                          </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Section</label>
                                        <div class="col-md-6">
                                          <select name="section_name" class="selectpicker" data-title="Select Section " data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                                  <?php foreach ($sec as $section) {  ?>
                                              <option value="<?php  echo $section->sec_id; ?>"><?php  echo $section->sec_name; ?></option>
                                              <?php } ?>

                                          </select>
                                        </div>
                                    </div>

									<div class="form-group">
									<label class="col-sm-2 control-label">Status</label>
                                          <div class="col-sm-6">
										   <select name="status"  class="selectpicker form-control">
												  <option value="Active">Active</option>
												  <option value="Deactive">Inactive</option>
											</select>
                                          </div>
										</div>


                                    <div class="form-group">
                                        <!-- <label class="col-md-3"></label> -->
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-fill btn-info">ALLOCATE</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div> <!-- end card -->

                    </div>

					<?php
						   if($this->session->flashdata('msg')): ?>
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
                           <h4 class="title">Classes</h4>
                       </div>
                       <div class="content">
                           <div class="fresh-datatables">
                      <table id="bootstrap-table" class="table">
                          <thead>

                            <th data-field="id" class="text-left">S.No</th>
                            <th data-field="name" class="text-left" data-sortable="true">Class</th>
                            <th data-field="Section" class="text-left" data-sortable="true">Section</th>
							               <th data-field="status" class="text-left" data-sortable="true">status</th>
                            <th data-field="actions" class="td-actions text-left" data-events="operateEvents">Actions</th>
                          </thead>
                          <tbody>
                            <?php $i=1; foreach ($getall_class as $rowsclass) { $sta=$rowsclass->status; ?>
                              <tr>
                                 <td><?php echo $i;  ?></td>
                                <td><?php echo $rowsclass->class_name;  ?></td>
                                <td><?php echo $rowsclass->sec_name;  ?></td>
                                 <td>
                    									<?php
                    									if($sta=='Active'){?>
                    									<button class="btn btn-success btn-fill btn-wd">Active</button>
                    									<?php  }else{?>
                    									<button class="btn btn-danger btn-fill btn-wd">Inactive</button>
                    									<?php } ?>
                    								</td>
                                <td>
                                  <a rel="tooltip" title="Edit" class="btn btn-simple btn-warning btn-icon table-action edit" href="<?php echo base_url(); ?>classmanage/editcs/<?php  echo $rowsclass->class_sec_id; ?>">
                                     <i class="fa fa-edit"></i></a>

                                     <a rel="tooltip" href="<?php echo base_url(); ?>classmanage/view_subjects/<?php echo $rowsclass->class_sec_id; ?>"  title="Add/View Subjects" class="open-AddBookDialog btn btn-simple btn-warning btn-icon edit">
                                     <i class="fa fa-th">  </i></a>

                                </td>

                              </tr>

                              <?php $i++;  }  ?>

                          </tbody>
                      </table>
                    </div><!-- end content-->
                </div><!--  end card  -->
            </div> <!-- end col-md-12 -->
        </div> <!-- end row -->
      </div><!--  end card  -->
  </div> <!-- end col-md-12 -->
</div> <!-- end row -->









       </div>


   </div>


</div>

<script type="text/javascript">


 $('#bootstrap-table').DataTable();


$(document).ready(function () {
  $('#mastersmenu').addClass('collapse in');
  $('#master').addClass('active');
  $('#masters5').addClass('active');

 $('#myformclassmange').validate({ // initialize the plugin
     rules: {

          class_name:{required:true },
         section_name:{required:true },
     },
     messages: {
           class_name: "Please choose an option!",
           section_name:"Please choose an option!"


         }
 });
});




</script>
