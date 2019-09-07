<div class="main-panel">
<div class="content">
       <div class="container-fluid">
           <div class="row">
               <div class="col-md-12">
                   <div class="card">
                       <div class="header">
                           <h4 class="title">Create Subject</h4>

                       </div>

                       <div class="content">
                           <form action="<?php echo base_url(); ?>subjectadd/createsubject" method="post" enctype="multipart/form-data" id="myformsub">
                               <div class="row">
                                   <div class="col-md-4">
                                       <div class="form-group">
                                           <label>Subject</label>
                                           <input type="text" class="form-control"  placeholder="" name="subjectname" id="subjectname" value="">

                                       </div>
                                   </div>
								                   <div class="col-md-4">
                                       <div class="form-group">
  <label class="col-sm-2 control-label">Status</label>
                  										   <select name="status"  class="selectpicker form-control">
                  												  <option value="Active">Active</option>
                  												  <option value="Deactive">Inactive</option>
                  											</select>
                                      </div>
                                    </div>
                                    <div class="col-md-4">

                                      <div class="form-group"><br>
                                          <label class="col-sm-2 control-label"></label>
                                        <label><input type="checkbox" name="is_preferred_lang" value="1" style="margin-right:10px;">Set as second language</label>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="text-center">

                                         <button type="submit" class="btn btn-info btn-fill">CREATE</button>
                                     </div>
                               </div>

                               <div class="clearfix"></div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
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
                            <div class="content">
                                <h4 class="title">Subjects</h4> <br>
                                <div class="fresh-datatables">
                          <table id="bootstrap-table" class="table">
                              <thead>
                                <th>S.No</th>
                                <th>Subjects</th>
                                  <th>Second Language?</th>
								  <th>Status</th>
                                <th>Actions</th>
                              </thead>
                              <tbody>
                                <?php
                                $i=1;
                                foreach ($result as $rows) {
                                ?>
                                  <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $rows->subject_name; ?></td>
                                    <td><?php if($rows->is_preferred_lang) echo "<i class='fa fa-check'></i>"; ?></td>
                                   <td>
										<?php $sta=$rows->status;
										if($sta=='Active'){?>
										<button class="btn btn-success btn-fill btn-wd">Active</button>
										<?php  }else{?>
										<button class="btn btn-danger btn-fill btn-wd">Inactive</button>
										<?php } ?>
									</td>
                                    <td>
                                      <a rel="tooltip" title="Edit" href="<?php echo base_url();  ?>subjectadd/updatesubject/<?php echo $rows->subject_id; ?>" class="btn btn-simple btn-warning btn-icon edit"><i class="fa fa-edit"></i></a>
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

<script type="text/javascript">

$(document).ready(function () {
  $('#mastersmenu').addClass('collapse in');
  $('#master').addClass('active');
  $('#masters4').addClass('active');


 $('#myformsub').validate({ // initialize the plugin
     rules: {
         subjectname:{required:true },
     },
     messages: {
           subjectname: "This field cannot be empty!"
         }
 });
});


$('#bootstrap-table').DataTable();

</script>
