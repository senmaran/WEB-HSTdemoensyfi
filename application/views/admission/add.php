<div class="main-panel">
   <div class="content">
      <div class="col-md-12">
         <div class="card">
            <div class="header">
               <legend>Create Student Profile</legend>
            </div>
            <?php if($this->session->flashdata('msg')): ?>
            <div class="alert alert-success">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
               ×</button> <?php echo $this->session->flashdata('msg'); ?>
            </div>
            <?php endif; ?>
            <div class="content">
               <form method="post" action="<?php echo base_url(); ?>admission/create" class="form-horizontal" enctype="multipart/form-data" id="admissionform">
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Admission Year <span class="mandatory_field">*</span></label>
                        <div class="col-sm-4">
                           <input type="text" name="admission_year"  class="form-control datepicker1" placeholder="Admission Year"/>
                        </div>
                        <label class="col-sm-2 control-label">Admission Number <span class="mandatory_field">*</span></label>
                        <div class="col-sm-4">
                           <input type="text" class="form-control"  name="admission_no" id="admission_no" placeholder="Admission Number" maxlength="10">
                        </div>
                     </div>
                  </fieldset>
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Admission Date <span class="mandatory_field">*</span></label>
                        <div class="col-sm-4">
                           <input type="text" name="admission_date" class="form-control datepicker" placeholder="Admission Date "/>
                        </div>
                        <label class="col-sm-2 control-label">EMIS Number <span class="mandatory_field">*</span></label>
                        <div class="col-sm-4">
                           <input type="text" name="emsi_num" class="form-control" placeholder="EMIS Number " maxlength="15"/>
                        </div>
                     </div>
                  </fieldset>
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Email ID</label>
                        <div class="col-sm-4">
                           <input type="text" name="email"  class="form-control"  id="email" placeholder="Email ID" maxlength="30" />

                        </div>
                        <label class="col-sm-2 control-label">Mobile</label>
                        <div class="col-sm-4">
                           <input type="text" placeholder="Mobile" name="mobile" class="form-control" maxlength="10">

                        </div>
                        <!-- <label class="col-sm-2 control-label">Secondary-Email</label>
                        <div class="col-sm-4">
                           <input type="text" name="sec_email" class="form-control " id="sec_email" placeholder="Secondary Email Address" />
                        </div> -->
                     </div>
                  </fieldset>
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Name <span class="mandatory_field">*</span></label>
                        <div class="col-sm-4">
                           <input type="text" name="name" class="form-control" value="" placeholder="Name" maxlength="30">
                        </div>
                        <label class="col-sm-2 control-label">Gender <span class="mandatory_field">*</span></label>
                        <div class="col-sm-4">
                           <select name="sex" class="selectpicker form-control" data-title="Gender" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                           </select>
                        </div>
                     </div>
                  </fieldset>
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Date of birth <span class="mandatory_field">*</span></label>
                        <div class="col-sm-4">
                           <input type="text" name="dob" class="form-control datepicker" placeholder="Date of Birth "/>
                        </div>
                        <label class="col-sm-2 control-label">Age <span class="mandatory_field">*</span></label>
                        <div class="col-sm-4">
                           <input type="text" placeholder="Age" name="sage" id="sage" class="form-control" maxlength="2">
                        </div>
                     </div>
                  </fieldset>
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Nationality <span class="mandatory_field">*</span></label>
                        <div class="col-sm-4">
                           <!-- <input type="text" placeholder="Nationality" name="nationality" class="form-control"> -->
						    <select name="nationality" class="selectpicker form-control" data-title="Nationality" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                              <option value="Indian">Indian</option>
                              <option value="Others">Others</option>
                           </select>
                        </div>
                        <label class="col-sm-2 control-label">Religion <span class="mandatory_field">*</span></label>
                        <div class="col-sm-4">
                           <input type="text" placeholder="Religion" name="religion" class="form-control" maxlength="30">
                        </div>
                     </div>
                  </fieldset>
                  <fieldset>
                     <div class="form-group">
                       
                        <label class="col-sm-2 control-label">Community <span class="mandatory_field">*</span></label>
                        <div class="col-sm-4">
                           <input type="text" placeholder="Community" name="community" class="form-control" maxlength="30">
                        </div>
						 <label class="col-sm-2 control-label">Community Class <span class="mandatory_field">*</span></label>
                        <div class="col-sm-4">
                           <input type="text" placeholder="Community Class" name="community_class" class="form-control" maxlength="10">
                        </div>
                     </div>
                  </fieldset>
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Mother Tongue <span class="mandatory_field">*</span></label>
                        <div class="col-sm-4">
                           <!-- <input type="text" placeholder="Mother Tongue" name="mother_tongue" class="form-control"> -->
						   <select name="mother_tongue" class="selectpicker form-control" data-title="Mother Tongue" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                              <option value="Tamil">Tamil</option>
                              <option value="English">English</option>
                              <option value="French">French</option>
                              <option value="French">Hindi</option>
                              <option value="Malayalam">Malayalam</option>
                              <option value="Telegu">Telegu</option>
                              <option value="Kanaada">Kanaada</option>
                           </select>
                        </div>
                        <label class="col-sm-2 control-label">Second Language</label>
                        <div class="col-sm-4">
                           <select name="lang" class="selectpicker" data-title="Second Language" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                            <?php foreach($lang as $res){ ?>
								<option value="<?php echo $res->subject_id;?>"><?php echo $res->subject_name;?></option>
                              <?php } ?>
                           </select>
                        </div>
                     </div>
                  </fieldset>
                  <!-- <fieldset>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Secondary Mobile</label>
                        <div class="col-sm-4">
                           <input type="text" placeholder="Mobile Number" name="sec_mobile" class="form-control">
                        </div>
                     </div>
                  </fieldset> -->
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Profile Picture</label>
                        <div class="col-sm-4">
                           <input type="file" name="student_pic" class="form-control" accept="image/*" >
						   <a href="<?php echo base_url(); ?>admission/camera_access" onclick="return popitup('<?php echo base_url(); ?>admission/camera_access')">Open Camera</a>
                        </div>
						
                        <label class="col-sm-2 control-label">Blood Group <span class="mandatory_field">*</span></label>
                        <div class="col-sm-4">
                           <select name="blood_group" class="selectpicker" data-title="Blood Group" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                            <?php foreach($blood as $rows){ ?>
                              <option value="<?php echo $rows->id;?>"><?php echo $rows->blood_group_name;?></option>
                              <?php } ?>
                           </select>
                        </div>

                     </div>
                  </fieldset>
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Previous School</label>
                          <div class="col-sm-4">
                           <input type="text" name="sch_name" placeholder="Previous School" class="form-control" maxlength="50">
                          </div>

                          <label class="col-sm-2 control-label">Qualified Grade</label>
                            <div class="col-sm-4">
                              <select name="class_name" class="selectpicker" data-title="Qualified Grade" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                 <?php foreach ($class as $clas) {  ?>
                                 <option value="<?php  echo $clas->class_id; ?>"><?php  echo $clas->class_name; ?></option>
                                 <?php } ?>
                              </select>
                            </div>


                     </div>
                  </fieldset>



                      <fieldset>
                           <div class="form-group">
                              
                             <label class="col-sm-2 control-label">Certificates</label>
                             <div class="col-sm-4" style="padding-top:10px;">
                                <input type="checkbox" name="trn_cert" value="1" id="trn_cert">Transfer Certificate&nbsp;&nbsp;<input type="checkbox" name="rec_sheet" value="1">Record Sheet
                             </div>
							 						<label class="col-sm-2 control-label">Qualified Promotion</label>
                            <div class="col-sm-4">
                              <select name="qual" class="selectpicker" >
								<option value="">Select</option>
                                 <option value="1">Yes</option>
                                 <option value="0">No</option>
                              </select>
                            </div>

							  <!--<label class="col-sm-2 control-label">Mode Of Entry</label>
                               <div class="col-md-4">
                                <select name="qual" class="selectpicker" data-title="Mode Of Entry" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                   <option value="1">Transfer</option>
                                   <option value="0">Promotion</option>
                                </select>
                             </div>-->
                           </div>
                      </fieldset>


                  <fieldset>
                     <div class="form-group">
                      <div id="answer" style="font-size:normal;">
						<label class="col-sm-2 control-label">TC Copy</label>
                        <div class="col-sm-4">
                           <input type="file" name="tc_copy" class="form-control">
                        </div>
					 </div>
					  <label class="col-sm-2 control-label">Status <span class="mandatory_field">*</span></label>
                        <div class="col-sm-4">
                           <select name="status" class="selectpicker form-control" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                              <option value="Active">Active</option>
                              <option value="Deactive">Inactive</option>
                           </select>
                        </div>
					</div>
                  </fieldset>
				  
				  
                  <fieldset>
                     <div class="form-group">

                        <div class="text-center">
                           <button type="submit" id="save" class="btn btn-info btn-fill center" style="cursor: pointer;">NEXT</button>
                        </div>
                        <!-- <div class="col-sm-4">
                           <img  id="output" class="img-circle" style="width:100px;">
                        </div> -->
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

$(document).ready(function () {

   jQuery('#admissionmenu').addClass('collapse in');
   $('#admission').addClass('active');
   $('#admission1').addClass('active');


$("#answer").hide();
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
		   admission_no:{required:true, number:true, maxlength:9,  
		   remote: {
					 url: "<?php echo base_url(); ?>admission/check_admission_number",
					 type: "post"
				  }
			},
			sage:{required:true, number:true, maxlength:2},
            admission_year:{required:true },
            admission_date:{required:true },
            name:{required:true,alphabetsnspace: true }, 
            email:{required:false,email:true,
            remote: {
                       url: "<?php echo base_url(); ?>admission/check_email_id",
                       type: "post"
                    }
            },
            sex:{required:true },
            dob:{required:true },
            emsi_num:{required:true,
            remote: {
                       url: "<?php echo base_url(); ?>admission/check_emsi_num",
                       type: "post"
                    }
            },
           
            nationality:{required:true },
            religion:{required:true,alphabetsnspace: true },
            community_class:{required:true,alphabetsnspace: true },
            community:{required:true,alphabetsnspace: true },
			mother_tongue:{required:true },
			sch_name:{required:false,alphabetsnspace: true },
            blood_group:{required:true },
            mobile:{required:false,maxlength:10,minlength:10,number:true,
			remote:{
					  url: "<?php echo base_url(); ?>admission/check_mobile_number",
					  type: "post"
					} 
			},
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
			
			mother_tongue:"This field cannot be empty!",
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

			//student_pic:"Enter the Student Picture"
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
