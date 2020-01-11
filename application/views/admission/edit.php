

<div class="main-panel">
   <div class="content">
      <div class="col-md-12">
         <div class="card">
            <div class="header">
               <legend>Admission</legend>
            </div>
            <?php if($this->session->flashdata('msg')): ?>
            <div class="alert alert-success">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
               ×</button> <?php echo $this->session->flashdata('msg'); ?>
            </div>
            <?php endif; ?>
            <?php foreach ($res as $rows) {
               } ?>
            <div class="content">
               <form method="post" action="<?php echo base_url(); ?>admission/save_ad" class="form-horizontal" enctype="multipart/form-data" id="admissionform" name="formadmission">
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Admission Year</label>
                        <div class="col-sm-4">
                           <input type="text" class="form-control" name="admission_year" id="admission_year" value="<?php echo $rows->admisn_year; ?>" readonly>
                        </div>
                        <label class="col-sm-2 control-label">Admission Number</label>
                        <div class="col-sm-4">
                           <input type="text" class="form-control" name="admission_no" id="admission_no" value="<?php echo $rows->admisn_no; ?>" maxlength="10">
                           <input type="hidden" class="form-control" name="admission_id" id="admission_no" value="<?php echo $rows->admission_id; ?>" readonly>
                        </div>
                     </div>
                  </fieldset>
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Admission Date</label>
                        <div class="col-sm-4">
						<?php
						$oDate = new DateTime($rows->admisn_date);
						$sDate = $oDate->format("d-m-Y");
						?>
						 
                           <input type="text" name="admission_date" class="form-control datepicker" value="<?php echo $sDate; ?>"  placeholder="Admission Date "/>
                        </div>
						<label class="col-sm-2 control-label">EMIS Number</label>
                        <div class="col-sm-4">
                           <input type="text" name="emsi_num" value="<?php echo $rows->emsi_num; ?>" class="form-control" maxlength="15" />
                        </div>
                       
                     </div>
                  </fieldset>
				  
				  <fieldset>
					<div class="form-group">
                        <label class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-4">
                           <input type="text" name="name" class="form-control"  value="<?php echo $rows->name; ?>" maxlength="30">
                        </div>
                        <label class="col-sm-2 control-label">Gender</label>
                        <div class="col-sm-4">
                           <select name="sex" class="selectpicker form-control" data-style="btn-default btn-block" >
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                           </select>
                           <script language="JavaScript">document.formadmission.sex.value="<?php echo $rows->sex; ?>";</script>
                        </div>
                     </div>
                  </fieldset>
				  
                  <fieldset>
                     <div class="form-group">
					  <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-4">
                           <input type="text" name="email" class="form-control " placeholder="Email Address" value="<?php echo $rows->email; ?>" maxlength="30"/>
                        </div>
						<label class="col-sm-2 control-label">Mobile</label>
                        <div class="col-sm-4">
                           <input type="text" placeholder="Mobile Number" name="mobile" class="form-control" value="<?php echo $rows->mobile; ?>" maxlength="10">
                        </div>
					</div>
					</fieldset>
					
					
				  
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Date of birth</label>
                        <div class="col-sm-4">
						<?php
						$pDate = new DateTime($rows->dob);
						$qDate = $pDate->format("d-m-Y");
						?>
                           <input type="text" name="dob" class="form-control datepicker" placeholder="Date of Birth " value="<?php echo $qDate; ?>"/>
                        </div>
                        <label class="col-sm-2 control-label">Age</label>
                        <div class="col-sm-4">
                           <input type="text" placeholder="Age" name="sage" class="form-control" value="<?php echo $rows->age; ?>">
                        </div>
                     </div>
                  </fieldset>
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Nationality</label>
                        <div class="col-sm-4">
                           <!-- <input type="text" placeholder="Nationality" name="nationality" class="form-control" value="<?php echo $rows->nationality; ?>"> -->
                           <select name="nationality" class="selectpicker form-control">
                              <option value="Indian">Indian</option>
                              <option value="Others">Others</option>
                           </select>
                           <script>$('#mother_tongue').val('<?php echo $rows->nationality; ?>');</script>
                        </div>
                        <label class="col-sm-2 control-label">Religion</label>
                        <div class="col-sm-4">
                           <input type="text" placeholder="Religion" name="religion" class="form-control" value="<?php echo $rows->religion; ?>" maxlength="30">
                        </div>
                     </div>
                  </fieldset>
                  <fieldset>
                     <div class="form-group">
                        
                        <label class="col-sm-2 control-label">Community</label>
                        <div class="col-sm-4">
                           <input type="text" placeholder="Community" name="community" class="form-control" value="<?php echo $rows->community; ?>" maxlength="30">
                        </div>
						<label class="col-sm-2 control-label">Community Class</label>
                        <div class="col-sm-4">
                           <input type="text" placeholder="Community Class" name="community_class" class="form-control" value="<?php echo $rows->community_class; ?>" maxlength="10">
                        </div>
                     </div>
                  </fieldset>
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Mother Tongue</label>
                        <div class="col-sm-4">
                           <select name="mother_tongue" id="mother_tongue" class="selectpicker form-control">
                              <option value="Tamil">Tamil</option>
                              <option value="English">English</option>
                              <option value="French">French</option>
                              <option value="French">Hindi</option>
                              <option value="Malayalam">Malayalam</option>
                              <option value="Telegu">Telegu</option>
                              <option value="Kanaada">Kanaada</option>
                           </select>
                           <script>$('#mother_tongue').val('<?php echo $rows->mother_tongue; ?>');</script>
                        </div>
                         <label class="col-sm-2 control-label">Second Language</label>
                        <div class="col-sm-4">
                           <select name="lang" class="selectpicker" data-style="btn-default btn-block" >
						   <option value="">Select</option>
                             <?php foreach($lang as $res){ ?>
                              <option value="<?php echo $res->subject_id;?>"><?php echo $res->subject_name;?></option>
                              <?php } ?>
                           </select>
                           <script language="JavaScript">document.formadmission.lang.value="<?php echo $rows->language; ?>";</script>
                        </div>
                     </div>
                  </fieldset>
              
                  <fieldset>
                     <div class="form-group">
					 
					    <label class="col-sm-2 control-label">Blood Group</label>
                        <div class="col-sm-4">
                           <select name="blood_group" class="selectpicker" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
						   <option value="">Select</option>
                            <?php foreach($blood as $res){ ?>
                              <option value="<?php echo $res->id;?>"><?php echo $res->blood_group_name;?></option>
                              <?php } ?>
                           </select>
                            <script language="JavaScript">document.formadmission.blood_group.value="<?php echo $rows->blood_group; ?>";</script>
                        </div>
						
                          <label class="col-sm-2 control-label">Previous School</label>
                            <div class="col-sm-4">
                               <input type="text" name="sch_name" value="<?php echo $rows->last_sch_name; ?>" class="form-control" maxlength="30">
                            </div>
											
                     </div>
                  </fieldset>
               

                  <fieldset>
                     <div class="form-group">
                        
						<label class="col-sm-2 control-label">Qualified Grade</label>
                            <div class="col-sm-4">
								<select name="class_name" class="selectpicker" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
								<option value="">Select</option>
                                 <?php foreach ($class as $clas) {  ?>
                                 <option value="<?php  echo $clas->class_id; ?>"><?php  echo $clas->class_name; ?></option>
                                 <?php } ?>
                              </select><script language="JavaScript">document.formadmission.class_name.value="<?php echo $rows->last_studied; ?>";</script>
                            </div>	

						<label class="col-sm-2 control-label">Qualified promotion</label>
                            <div class="col-sm-4">
                              <select name="qual" class="selectpicker" >
								<option value="">Select</option>
                                 <option value="1">Yes</option>
                                 <option value="0">No</option>
                              </select>
                              <script language="JavaScript">document.formadmission.qual.value="<?php echo $rows->qualified_promotion; ?>";</script>
                            </div>
						
					</fieldset>
				  
				  <fieldset>
                     <div class="form-group">
					 <label class="col-sm-2 control-label">Current  Pic</label>
                       <div class="col-sm-4">
                          <input type="hidden" name="user_pic_old" class="form-control" value="<?php echo $rows->student_pic; ?>">
                          <?php $spic=$rows->student_pic;
                             if(empty($spic)){?>
                          <img src="<?php echo base_url(); ?>assets/noimg.png" class="img-circle" style="width:110px;">
                          <?php }else{?>
                          <img src="<?php echo base_url(); ?>assets/students/<?php echo $rows->student_pic; ?>" class="" style="width:110px;">
                          <?php }?>
                       </div>
					   
					   	<label class="col-sm-2 control-label">Certificates</label>
						 <?php 
							   $t = $rows->transfer_certificate;
							   $s = $rows->record_sheet;
							   $tccopy = $rows->tccopy;
                           ?>
                           <div class="col-sm-4" style="padding-top:10px;">
							 <input type="hidden" name="user_tc_old" class="form-control" value="<?php echo $rows->tccopy; ?>">
							 <?php if ($t=='1') {?>
                                <input type="checkbox" name="trn_cert" value="1" id="trn_cert" checked>
								<?php if ($tccopy !='') { ?><a href="<?php echo base_url(); ?>assets/students/tccopy/<?php echo $tccopy; ?>" target="_blank">Transfer Certificate</a> <?php } else { ?> Transfer Certificate <?php } ?>
							 <?php } else { ?>
								 <input type="checkbox" name="trn_cert" value="1" id="trn_cert">Transfer Certificate
							 <?php } ?>
								&nbsp;&nbsp;
							 <?php if ($s=='1') {?>
								<input type="checkbox" name="rec_sheet" value="1"  checked>Record Sheet
								<?php } else { ?>
								<input type="checkbox" name="rec_sheet" value="1">Record Sheet
								<?php } ?>

								<div id="answer" style="font-size:normal;padding-top:15px;">
									<input type="file" name="tc_copy" class="form-control">
								</div>
									
                           </div>
                     </div>
                  </fieldset>
                  
				  <fieldset>
                     <div class="form-group">
						<label class="col-sm-2 control-label">Student New Picture</label>
                        <div class="col-sm-4">
                           <input type="file" name="student_pic" class="form-control"  accept="image/*" >
						   <a href="<?php echo base_url(); ?>admission/camera_access" onclick="return popitup('<?php echo base_url(); ?>admission/camera_access')">Open Camera</a>
                        </div>
						
						<label class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-4">
                           <select name="status" class="selectpicker form-control" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                              <option value="Active">Active</option>
                              <option value="Deactive">Inactive</option>
                           </select>
                           <script language="JavaScript">document.formadmission.status.value="<?php echo $rows->status; ?>";</script>
                        </div>
                     </div>
                  </fieldset>
				  
				   <fieldset>
                     <div class="form-group">
                       <div class="col-sm-4">
                       </div>
                       <div class="col-sm-4">
                        <input type="submit" id="save" class="btn btn-info btn-fill center" value="SAVE">
                          
                        </div>
                     </div>
                       

                  </fieldset>
				  
               </form>
            </div>
         </div>
         <!-- end card -->
      </div>
   </div>
</div>
<script type="text/javascript">
  /*  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
   }; */

   $(document).ready(function () {
   jQuery('#admissionmenu').addClass('collapse in');
   $('#admission').addClass('active');
   $('#admission2').addClass('active');
 

  <?php if ($t=='') {?>
		$("#answer").hide();
  <?php } ?>

$("#trn_cert").click(function() {
    if($(this).is(":checked")) {
        $("#answer").show();
    } else {
        $("#answer").hide();
    }
});
 
 
  $('#student_pic').on('change', function() {
	  var f=this.files[0]
	  var actual=f.size||f.fileSize;
	  var orgi=actual/1024;
		if(orgi<1024){
		  $("#preview").html('');
		  //$("#preview").html('<img src="<?php echo base_url(); ?>assets/loader.gif" alt="Uploading...."/>');
		  $("#eventform").ajaxForm({
			  target: '#preview'
		  }).submit();
		}else{
		  //$("#preview").html('File Size Must be  Lesser than 1 MB');
		  //alert("File Size Must be  Lesser than 1 MB");
		  return false;
		}
	});


$('#tc_copy').on('change', function() {
	  var f=this.files[0]
	  var actual=f.size||f.fileSize;
	  var orgi=actual/1024;
		if(orgi<1024){
		  $("#preview").html('');
		  //$("#preview").html('<img src="<?php echo base_url(); ?>assets/loader.gif" alt="Uploading...."/>');
		  $("#eventform").ajaxForm({
			  target: '#preview'
		  }).submit();
		}else{
		  //$("#preview").html('File Size Must be  Lesser than 1 MB');
		  //alert("File Size Must be  Lesser than 1 MB");
		  return false;
		}
	});


  $.validator.addMethod('filesize', function (value, element, param) {
      return this.optional(element) || (element.files[0].size <= param)
  }, 'File size must be less than 1 MB');

	$.validator.addMethod("alphabetsnspace", function(value, element) {
       return this.optional(element) || /^[a-zA-Z\. ]*$/.test(value);
    });

    $('#admissionform').validate({ // initialize the plugin
        rules: {
            admission_no:{required:true, number: true,maxlength:9,
              remote: {
                        url: "<?php echo base_url(); ?>admission/check_admission_number_exist/<?php echo $rows->admission_id;  ?>",
                        type: "post"
                     }
                    },
            admission_year:{required:true },
            admission_date:{required:true },
            name:{required:true,alphabetsnspace: true }, 
            email:{required:true,email:true,
              remote: {
                       url: "<?php echo base_url(); ?>admission/check_email_id_exist/<?php echo $rows->admission_id;  ?>",
                       type: "post"
                    }
                  },
            emsi_num:{required:true,
              remote: {
                       url: "<?php echo base_url(); ?>admission/check_emsi_num_exist/<?php echo $rows->admission_id;  ?>",
                       type: "post"
                    }
                   },
            sex:{required:true },
            dob:{required:true },
            sage:{required:true, number:true, maxlength:2},
            nationality:{required:true },
            religion:{required:true,alphabetsnspace: true },
            community_class:{required:true,alphabetsnspace: true },
            community:{required:true,alphabetsnspace: true },
			mother_tongue:{required:true },
			sch_name:{required:false,alphabetsnspace: true },
			blood_group:{required:true },
            mobile:{required:false,maxlength:10,minlength:10,remote:{
              url: "<?php echo base_url(); ?>admission/check_mobile_number_exist/<?php echo $rows->admission_id;  ?>",
              type: "post"
            }},
			student_pic:{accept: "jpg,jpeg,png", filesize: 1048576 },
			tc_copy:{required:false,accept: "jpg,jpeg,png", filesize: 1048576 }

        },
        messages: {
			admission_no:{
				required:"This field cannot be empty!",
				remote:"Admission number already exist!"
			},
			//  minlength:"Enter the Number 6 to 9 Digits",
			admission_year: "This field cannot be empty!",
			admission_date: "This field cannot be empty!",
			name: {
			  required: "This field cannot be empty!",
			  alphabetsnspace: "Please enter only alphabet"
			},
			email:{
				 required:"This field cannot be empty!",
				 remote:"Email ID already exist!"
			},
			sex: "Please choose an option!",
			dob: "Please choose an option!",
			emsi_num:{
				required:"This field cannot be empty!",
				remote:" EMSI number already exist!"
			},
			age: "This field cannot be empty!",
			nationality: "This field cannot be empty!",
			religion: {
			  required: "This field cannot be empty!",
			  alphabetsnspace: "Please enter only alphabet"
			},
			community: {
			  required: "This field cannot be empty!",
			  alphabetsnspace: "Please enter only alphabet"
			},
			community_class: {
			  required: "This field cannot be empty!",
			  alphabetsnspace: "Please enter only alphabet"
			},
			sch_name: {
			  alphabetsnspace: "Please enter only alphabet"
			},
			blood_group:"Please choose an option!",
			mobile:{
				required:"This field cannot be empty!",
				remote:"Mobile number already exist!"
			},
			student_pic:{
			  accept:"Please upload .jpg or .png .",
			  fileSize:"File must be JPG or PNG, less than 1MB"
			},
			tc_copy:{
			  accept:"Please upload .jpg or .png .",
			  fileSize:"File must be JPG or PNG, less than 1MB"
			}
		}
    });
   });


 $().ready(function(){

     $('.datepicker').datetimepicker({
       format: 'DD-MM-YYYY',
	   maxDate: new Date(),
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

   $('.datepicker1').datetimepicker({
       format: 'YYYY',
		maxDate: new Date(),
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
   
   function popitup(url) {
		camWindow=window.open(url,'camWindow','height=450,width=450');
		if (window.focus) {camWindow.focus()}
		return false;
	}
</script>
