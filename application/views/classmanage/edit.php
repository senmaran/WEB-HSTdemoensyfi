<div class="main-panel">
<div class="content">
       <div class="container-fluid">
	   
	   
           <div class="row">
              <div class="col-md-12">
                <?php foreach ($res as $rows) { } ?>

                <div class="card">
                   <div class="header">
                           <h4 class="title">Class Management</h4>
						   <h5>Edit Section Allocation</h5>
                   </div>
				   
                    <div class="content">
                        <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>classmanage/update_cs" name="edit_cs" enctype="multipart/form-data" id="myformclassmange">
                           
						   <div class="form-group">
                                <label class="col-md-2 control-label">Class <span class="mandatory_field">*</span></label>
                                <div class="col-md-4">
                                  <input type="hidden" name="class_sec_id" value="<?php echo $rows->class_sec_id; ?>">
                                  <select name="class_name" class="selectpicker" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                    <?php   foreach ($clas as $row) {  ?>
                                      <option value="<?php  echo $row->class_id; ?>"><?php  echo $row->class_name; ?></option>
                                <?php     } ?>
                                  </select>
                                  <script language="JavaScript">document.edit_cs.class_name.value="<?php echo $rows->class_id; ?>";</script>
                                </div>
								<div class="col-md-6"></div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-2 control-label">Section <span class="mandatory_field">*</span></label>
                                <div class="col-md-4">
                                  <select name="section_name" class="selectpicker"  data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                      <?php   foreach ($sec as $rows1) {  ?>
                                        <option value="<?php  echo $rows1->sec_id; ?>"><?php  echo $rows1->sec_name; ?></option>
                                  <?php     } ?>
                                </select>
                                <script language="JavaScript">document.edit_cs.section_name.value="<?php echo $rows->sec_id; ?>";</script>
                                </div>
								<div class="col-md-6"></div>
                            </div>
                           

					  <div class="form-group">
                                <label class="col-md-2 control-label">Status <span class="mandatory_field">*</span></label>
                                <div class="col-md-4">
                                 <select name="status" class="selectpicker form-control">
									  <option value="Active">Active</option>
									  <option value="Deactive">Inactive</option>
								</select>
                                <script language="JavaScript">document.edit_cs.status.value="<?php echo $rows->	status; ?>";</script>
                                </div>
								<div class="col-md-6"></div>
                            </div>

						<div class="form-group">
							<label class="col-sm-2 control-label"></label>
							<div class="col-sm-4"><input type="submit" id="save" class="btn btn-info btn-fill center" value="SAVE"></div>
							<div class="col-md-6"></div>
						</div>
									

                        </form>
                    </div>
                </div> <!-- end card -->


                  <!--  end card  -->
              </div> <!-- end col-md-12 -->
          </div> <!-- end row -->
		  
		  
       </div>
   </div>
</div>
<script type="text/javascript">
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

</script>
