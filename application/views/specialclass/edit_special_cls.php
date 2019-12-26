<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-clockpicker.min.css">
<script src="<?php echo base_url(); ?>assets/js/jquery-clockpicker.min.js"></script>
<style>
.popover.clockpicker-popover.top.clockpicker-align-left {
    top: 130px !important;
}
 .clockpicker-popover {
 z-index: 100000 !important;
 }
</style>
<div class="main-panel">
<div class="content">
       <div class="container-fluid">
           <div class="row">
               <div class="col-md-12">
                   <div class="card">
                       <div class="header">
                           <h4 class="title">Edit Special Class</h4>
                       </div>
					<?php foreach($edit as $res){}	?>
                       <div class="content">
                             <form method="post" action="<?php echo base_url(); ?>specialclass/update_special_cls" class="form-horizontal" enctype="multipart/form-data" id="specialclasssection" name="specialclasssection">
                       
					   <fieldset>
                           <div class="form-group">
                              <label class="col-sm-2 control-label">Class <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4">
                                 <select  name="class_name" id="multiple-class" onchange="checksubject(this.value)" class="selectpicker" data-menu-style="dropdown-blue">
                                          <?php foreach ($getall_class as $rows) {  ?>
                                          <option value="<?php echo $rows->class_sec_id; ?>"><?php echo $rows->class_name; ?>&nbsp; - &nbsp;<?php echo $rows->sec_name; ?></option>
                                          <?php      } ?>
                                 </select>
								  <script language="JavaScript">
                        			document.specialclasssection.class_name.value="<?php echo $res->class_master_id; ?>";
                        		</script>
                              </div>
                              <label class="col-sm-2 control-label">Teacher <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4">
                                <select  name="teacher" class="selectpicker form-control"  id="multiple-teacher"  data-menu-style="dropdown-blue" >
                                          <?php foreach ($teacher as $rows) { ?>
                                          <option value="<?php echo $rows->teacher_id;  ?>"><?php echo $rows->name; ?></option>
                                          <?php  }?>
                                   </select>
								   <script language="JavaScript">
                        			document.specialclasssection.teacher.value="<?php echo $res->teacher_id; ?>";
                        		</script>
                              </div>
                           </div>
                        </fieldset>
                       
					   <fieldset>
                           <div class="form-group">
                              <label class="col-sm-2 control-label">Subject <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4">
							   <select  name="subject_name" class="form-control" id="ajaxres">
									<option value="<?php echo $res->subject_id;  ?>"><?php echo $res->subject_name; ?></option>
							   </select>
                              </div>
                              <label class="col-sm-2 control-label">Topic <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4">
                                 <input type="text" name="sub_topic" required class="form-control" value="<?php echo $res->subject_topic;?>" maxlength="30" />
								 <input type="hidden" name="id" required class="form-control" value="<?php echo $res->id;?>"  />
                              </div>
                           </div>
                        </fieldset>
						
						 <fieldset>
                           <div class="form-group">
                              <label class="col-sm-2 control-label">Date <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4">
							
                                 <input type="text" name="spe_date" required class="form-control datepicker" value="<?php $date=date_create($res->special_class_date); echo date_format($date,"d-m-Y");  ?>">
                              </div>
                              <label class="col-sm-2 control-label">Start Time <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4  clockpicker">
                                 <input type="text" name="stime" id="stime" value="<?php echo $res->start_time;?>"  class="form-control"  />
                              </div>
                           </div>
                        </fieldset>
						
						 <fieldset>
                           <div class="form-group">
                              <label class="col-sm-2 control-label">End Time <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4 clockpicker">
                                 <input type="text" name="etime" id="etime" value="<?php echo $res->end_time;?>" class="form-control" >
                              </div>
                              <label class="col-sm-2 control-label">Status <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4">
                                <select name="status"  class="selectpicker form-control"  data-style="btn-default btn-block" data-menu-style="dropdown-blue">
								  <option value="Active">Active</option>
								  <option value="Deactive">Inactive</option>
							  </select>
							  <script language="JavaScript">
                        			document.specialclasssection.status.value="<?php echo $res->status; ?>";
                        		</script>
                              </div>
                           </div>
                        </fieldset>
						
						<fieldset>
                        <div class="form-group">
                           <label class="col-sm-2 control-label">&nbsp;</label>
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

<script type="text/javascript">
      $().ready(function(){
       /*  $('#mastersmenu').addClass('collapse in');
        $('#master').addClass('active');
        $('#masters2').addClass('active') */;
		
		 $('#specialclasssection').validate({ // initialize the plugin
        rules: {
            class_name:{required:true },
			teacher:{required:true },
			sub_topic:{required:true },
			spe_date:{required:true },
			stime:{required:true },
			etime:{required:true },
			status:{required:true },
			
        },
        messages: {
			
				class_name: "Please choose an option!",
				teacher: "Please choose an option!",
				sub_topic: "This field cannot be empty!",
				spe_date: "Please choose an option!",
				stime: "Please choose an option!",
				etime: "Please choose an option!",
				status: "Please choose an option!"
            }
    });

			
  
      });
	  
	  function checksubject(cid) {
			$.ajax({
			type: 'post',
			url: '<?php echo base_url(); ?>specialclass/checker',
			data: {
				classid:cid
			},
			dataType: "JSON",
			//cache: false,
			success: function(test1) {
				 if (test1.status=='Success') {
					   var sub = test1.subject_name;
					   //alert(sub.length);
					   var sub_id=test1.subject_id;
					   var len=sub.length;
					   //alert(len);
					   var i;
					   var name='';
					   for (i = 0; i < len; i++) {
						   name +='<option value="'+sub_id[i]+'">'+sub[i]+'</option>';
						  $("#ajaxres").html(name);
						  $("#msg1").html('');
					   }
				   } else {
						$('#msg1').html('<span style="color:red;text-align:center;">Subject Not Found</p>');
						$("#ajaxres").html('');
				   }
			}
		});
	}
	
	$('#stime').clockpicker({ placement: 'top', align: 'left', donetext: 'Done',twelvehour: true});
    $('#etime').clockpicker({ placement: 'top', align: 'left', donetext: 'Done',twelvehour: true});
  </script>
