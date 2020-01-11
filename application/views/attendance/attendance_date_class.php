<div class="main-panel">
   <div class="content">
      <div class="container-fluid">
	  <div class="row">
         <div class="col-md-12">
            <div class="card">
						<div class="header">
							<h4 class="title">Take Attendance</h4>
						</div>
                  <div class="content">
                     <form action="<?php echo base_url(); ?>adminattendance/attendance_on_class" method="post" class="form-horizontal" id="select_month">
                       
					   <fieldset>
                          <div class="form-group">
                             <label class="col-sm-2 control-label">Date <span class="mandatory_field">*</span></label>
                             <div class="col-sm-4">
                               <input type="text" class="form-control datepicker " name="attendance_date" id="attendance_date">
                             </div>
                             <div class="col-sm-6"></div>
                          </div>
                       </fieldset>
					   
					   <fieldset>
                          <div class="form-group">
                             <label class="col-sm-2 control-label">Session <span class="mandatory_field">*</span></label>
                             <div class="col-sm-4">
                               <select class="form-control" name="session_id">
                                 <option value="0">AM</option>
                                 <option value="1">PM</option>
                               </select>
                             </div>
							  <div class="col-sm-6"></div>
                          </div>
                       </fieldset>

                        <fieldset>
                           <div class="form-group">
                              <label class="col-sm-2 control-label">Class <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4">
                                <select class="form-control" name="class_id">
                                  <?php foreach($res as $rows){ ?>
                                  <option value="<?php echo $rows->class_id; ?>"><?php echo $rows->class_name;echo "-"; echo $rows->sec_name;  ?></option>
                                <?php } ?>
                                </select>
                              </div>
							  <div class="col-sm-6"></div>
                           </div>
                        </fieldset>
                        <fieldset>
                           <div class="form-group">
                              <label class="col-sm-2 control-label">&nbsp;</label>
                              <div class="col-sm-4">
                                 <button type="submit" class="btn btn-info btn-fill center" style="cursor:pointer;">NEXT</button>
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
if(!empty($ace_months)){
	foreach($ace_months as $rows) { 
		 $from_month = $rows->from_month;
		 $to_month = date('Y-m-d');
	}
} else {
		$from_month = date('Y-m-d'); 
		$to_month = date('Y-m-d');
}
?>
<script type="text/javascript">
	$('#attend').addClass('collapse in');
	$('#attendance').addClass('active');
	$('#attend1').addClass('active');
		  
   $('#select_month').validate({ // initialize the plugin
       rules: {
           attendance_date:{required:true },
           month_id:{required:true }
       },
       messages: {
             attendance_date: "This field cannot be empty!",
             month_id: "Select Month"
           }
   });
</script>
<script type="text/javascript">
      $().ready(function(){
        $('#mastersmenu').addClass('collapse in');
        $('#master').addClass('active');
        $('#masters1').addClass('active');
		
        $('.datepicker').datetimepicker({
          format: 'DD-MM-YYYY',
		  minDate: new Date('<?php echo $from_month; ?>'),
		  maxDate: new Date('<?php echo $to_month; ?>'),
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
