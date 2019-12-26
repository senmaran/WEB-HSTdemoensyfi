<div class="main-panel">
   <div class="content">
      <div class="container-fluid">
         <div class="col-md-12">
            <div class="card">
               <div class="">

                  <div class="content">
                    <h4 class="title"> Date and Class View</h4>
                    <hr>
                     <form action="<?php echo base_url(); ?>adminattendance/get_class_date" method="post" class="form-horizontal" id="select_class_day">
                       <fieldset>
                          <div class="form-group">
                             <label class="col-sm-2 control-label">Select Classes <span class="mandatory_field">*</span></label>
                             <div class="col-sm-4">
                                 <select multiple name="select_classes[]" id="select_classes" data-title="Select Classes" class="selectpicker form-control">
								  <?php
										foreach ($res as $rows) {
                                 ?>
								  <option value="<?php echo $rows->class_id; ?>"><?php echo $rows->class_name; ?> <?php echo $rows->sec_name; ?></option>
										<?php } ?>
                                  </select> 
                             </div>
							  <div class="col-sm-4"></div>
                          </div>
                       </fieldset>
                        <fieldset>
                           <div class="form-group">
                              <label class="col-sm-2 control-label">Select Date <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4">
                                <input type="text" name="select_date" id="select_date" class="form-control datepicker valid" placeholder="Select Date">
                              </div>
							   <div class="col-sm-4"></div>
                           </div>
                        </fieldset>
                        <fieldset>
                           <div class="form-group">
                              <label class="col-sm-2 control-label"></label>
                              <div class="col-sm-4">
							  <input type="submit" id="save" class="btn btn-info btn-fill center"  value="SEARCH">
                              
                              </div>
							   <div class="col-sm-4"></div>
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
</div>
</div>
<script type="text/javascript">

   $('#select_class_day').validate({ // initialize the plugin
       rules: {
		   'select_classes[]': {required: true},
           select_date:{required:true }

       },
       messages: {
            'select_classes[]': {required: "Please select classes"},
             select_date: "Select date"

           }
   });

  $('#attend').addClass('collapse in');
  $('#attendance').addClass('active');
  $('#attend3').addClass('active');
</script>
