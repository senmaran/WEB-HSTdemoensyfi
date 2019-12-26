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
                     <h4 class="title">Create Special Class</h4>
                  </div>
                  <div class="content">
                     <form method="post" action="<?php echo base_url(); ?>specialclass/add_special_cls" class="form-horizontal" enctype="multipart/form-data" id="specialclasssection" name="specialclasssection">
                       
					   <fieldset>
                           <div class="form-group">
                              <label class="col-sm-2 control-label">Class <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4">
                                 <select  name="class_name" id="multiple-class" onchange="checksubject(this.value)" class="selectpicker" data-title="Select Class" data-menu-style="dropdown-blue">
                                          <?php foreach ($getall_class as $rows) {  ?>
                                          <option value="<?php echo $rows->class_sec_id; ?>"><?php echo $rows->class_name; ?>&nbsp; - &nbsp;<?php echo $rows->sec_name; ?></option>
                                          <?php      } ?>
                                 </select>
                              </div>
                              <label class="col-sm-2 control-label">Teacher <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4">
                                <select  name="teacher" class="selectpicker form-control"  id="multiple-teacher" data-title="Select Teacher" data-menu-style="dropdown-blue" >
                                          <?php foreach ($teacher as $rows) { ?>
                                          <option value="<?php echo $rows->teacher_id;  ?>"><?php echo $rows->name; ?></option>
                                          <?php  }?>
                                   </select>
                              </div>
                           </div>
                        </fieldset>
                        
						<fieldset>
                           <div class="form-group">
                              <label class="col-sm-2 control-label">Subject <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4">
							   <select  name="subject_name"  class="form-control" id="ajaxres">
							   </select>
								<div id="msg1"></div>
                              </div>
                              <label class="col-sm-2 control-label">Topic <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4">
                                 <input type="text" name="sub_topic" required class="form-control" maxlength="30"  />
                              </div>
                           </div>
                        </fieldset>
						 
						 <fieldset>
                           <div class="form-group">
                              <label class="col-sm-2 control-label">Date <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4">
                                 <input type="text" name="spe_date" required class="form-control datepicker" value="">
                              </div>
                              <label class="col-sm-2 control-label">Start Time <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4 clockpicker" >
                                 <input type="text" name="stime" id="stime" required class="form-control"/>
                              </div>
                           </div>
                        </fieldset>
						
						<fieldset>
                           <div class="form-group">
                              <label class="col-sm-2 control-label">End Time <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4 clockpicker">
                                 <input type="text" name="etime" id="etime" required class="form-control" >
                              </div>
                              <label class="col-sm-2 control-label">Status <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4">
                                <select name="status"  class="selectpicker form-control" data-title="Status" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
								  <option value="Active">Active</option>
								  <option value="Deactive">Inactive</option>
							  </select>
                              </div>
                           </div>
                        </fieldset>
						
                       <fieldset>
					   <div class="form-group">
                           <label class="col-sm-2 control-label">&nbsp;</label>
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
         ×</button> <?php echo $this->session->flashdata('msg'); ?>
      </div>
      <?php endif; ?>
      <div class="content">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-12">
                  <div class="card">
                     <div class="content">
                        <div class="fresh-datatables">
                           <table id="example" class="table">
                              <thead>
                                 <th>S.No</th>
                                 <th>Class</th>
                                 <th>Teacher</th>
                                 <th>Subject</th>
                                 <th>Date</th>
                                 <th>Start Time</th>
								  <th>End time</th>
                                 <th>Status</th>
								 <th>Actions</th>
                              </thead>
                              <tbody>
                                 <?php
                                    $i=1;
                                    foreach ($result as $rows) { $stu=$rows->status;
                                     ?>
                                 <tr>
                                    <td><?php  echo $i; ?></td>
                                    <td><?php  echo $rows->class_name; ?> - <?php  echo $rows->sec_name; ?> </td>
                                    <td><?php  echo $rows->name; ?></td>
                                    <td><?php  echo $rows->subject_name	; ?></td>
                                    <td><?php $dateTime=new DateTime($rows->special_class_date); $tdate=date_format($dateTime,'d-m-Y' ); echo $tdate; ?></td>
									<td><?php  echo $rows->start_time; ?></td>
									<td><?php  echo $rows->end_time; ?></td>
									<td><?php 
                    									  if($stu=='Active'){?>
                    									   <button class="btn btn-success btn-fill btn-wd">Active</button>
                    									 <?php  }else{?>
                    									  <button class="btn btn-danger btn-fill btn-wd">Inactive</button>
                    									  <?php } ?></td>
                                    <td>
                                       <a rel="tooltip" title="Edit" href="<?php echo base_url();  ?>specialclass/edit_specls/<?php echo $rows->id; ?>" class="btn btn-simple btn-warning btn-icon edit" title="Edit" style="font-size:20px;">
									   <i class="fa fa-edit"></i></a>
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
</div>
<script type="text/javascript">
   $(document).ready(function () {
   /* $('#mastersmenu').addClass('collapse in');
   $('#master').addClass('active');
   $('#masters2').addClass('active'); */
    $('#specialclasssection').validate({ // initialize the plugin
        rules: {
            class_name:{required:true },
			teacher:{required:true },
			sub_topic:{required:true },
			spe_date:{required:true },
			stime:{required:true },
			etime:{required:true },
			status:{required:true }
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
           },
  
       ],
       "pagingType": "full_numbers",
       "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
       responsive: true,
       language: {
       search: "_INPUT_",
       searchPlaceholder: "Search records",
       }
         });
		 
 function checksubject(cid) {
  //alert(cid);//exit;
$.ajax({
	type: 'post',
	url: '<?php echo base_url(); ?>specialclass/checker',
	data: {
		classid:cid
	},
	dataType: "JSON",
	//cache: false,
	success: function(test1) {
		//var test=test1.status;
		//alert(test1);
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
				//alert("Error");
		   }
	}
});
}

		$('#stime').clockpicker({ placement: 'top', align: 'left', donetext: 'Done',twelvehour: true});
        $('#etime').clockpicker({ placement: 'top', align: 'left', donetext: 'Done',twelvehour: true});
</script>


