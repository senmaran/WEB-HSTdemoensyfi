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
            <div class="content">
               <form method="post" action="<?php echo base_url(); ?>admission/create" class="form-horizontal" enctype="multipart/form-data" id="admissionform">
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Admission Year</label>
                        <div class="col-sm-4">
                           <input type="text" name="admission_year"  class="form-control datepicker1" placeholder="Select Admission Year"/>
                        </div>
                        <label class="col-sm-2 control-label">Admission No</label>
                        <div class="col-sm-4">
                           <input type="text" class="form-control"  name="admission_no" id="admission_no">

                        </div>
                     </div>
                  </fieldset>
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Admission Date</label>
                        <div class="col-sm-4">
                           <input type="text" name="admission_date" class="form-control datepicker" placeholder="Admission Date "/>
                        </div>
                        <label class="col-sm-2 control-label">EMSI Number</label>
                        <div class="col-sm-4">
                           <input type="text" name="emsi_num" class="form-control" placeholder="Enter EMSI Number "/>
                        </div>
                     </div>
                  </fieldset>
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-4">
                           <input type="text" name="email"  class="form-control"  id="email" placeholder="Email Address" />

                        </div>
                        <label class="col-sm-2 control-label">Mobile</label>
                        <div class="col-sm-4">
                           <input type="text" placeholder="Mobile Number" name="mobile" class="form-control">

                        </div>
                        <!-- <label class="col-sm-2 control-label">Secondary-Email</label>
                        <div class="col-sm-4">
                           <input type="text" name="sec_email" class="form-control " id="sec_email" placeholder="Secondary Email Address" />
                        </div> -->
                     </div>
                  </fieldset>
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-4">
                           <input type="text" name="name" class="form-control" value="">
                        </div>
                        <label class="col-sm-2 control-label">Gender</label>
                        <div class="col-sm-4">
                           <select name="sex" class="selectpicker form-control" data-title="Select Gender" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                           </select>
                        </div>
                     </div>
                  </fieldset>
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Date of birth</label>
                        <div class="col-sm-4">
                           <input type="text" name="dob" class="form-control datepicker" placeholder="Date of Birth "/>
                        </div>
                        <label class="col-sm-2 control-label">Age</label>
                        <div class="col-sm-4">
                           <input type="text" placeholder="Age" name="age" class="form-control">
                        </div>
                     </div>
                  </fieldset>
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Nationality</label>
                        <div class="col-sm-4">
                           <!-- <input type="text" placeholder="Nationality" name="nationality" class="form-control"> -->
                           <select name="nationality" class="selectpicker form-control">
                              <option value="Indian">Indian</option>
                              <option value="Others">Others</option>
                           </select>
                        </div>
                        <label class="col-sm-2 control-label">Religion</label>
                        <div class="col-sm-4">
                           <input type="text" placeholder="Religion" name="religion" class="form-control">
                        </div>
                     </div>
                  </fieldset>
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Community Class</label>
                        <div class="col-sm-4">
                           <input type="text" placeholder="Community Class" name="community_class" class="form-control">
                        </div>
                        <label class="col-sm-2 control-label">Community</label>
                        <div class="col-sm-4">
                           <input type="text" placeholder="Community" name="community" class="form-control">
                        </div>
                     </div>
                  </fieldset>
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Mother Tongue</label>
                        <div class="col-sm-4">
                           <!-- <input type="text" placeholder="Mother Tongue" name="mother_tongue" class="form-control"> -->
                           <select name="mother_tongue" class="selectpicker form-control">
                              <option value="Tamil">Tamil</option>
                              <option value="English">English</option>
                              <option value="French">French</option>
                              <option value="French">Hindi</option>
                              <option value="Malayalam">Malayalam</option>
                              <option value="Telegu">Telegu</option>
                              <option value="Kanaada">Kanaada</option>
                           </select>
                        </div>
                        <label class="col-sm-2 control-label">Language Proposed</label>
                        <div class="col-sm-4">
                           <select name="lang" class="selectpicker" data-title="Language Proposed" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
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
                        <label class="col-sm-2 control-label">Student Picture</label>
                        <div class="col-sm-4">
                           <input type="file" name="student_pic" class="form-control" onchange="loadFile(event)" accept="image/*" >
                        </div>
                        <label class="col-sm-2 control-label">Blood Group</label>
                        <div class="col-sm-4">
                           <select name="blood_group" class="selectpicker" data-title="Select Blood Group" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                            <?php foreach($blood as $rows){ ?>
                              <option value="<?php echo $rows->id;?>"><?php echo $rows->blood_group_name;?></option>
                              <?php } ?>
                           </select>
                        </div>

                     </div>
                  </fieldset>
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">School Studied</label>
                          <div class="col-sm-4">
                           <input type="text" name="sch_name" placeholder="Previous School" class="form-control">
                          </div>

                          <label class="col-sm-2 control-label">School Studied</label>
                            <div class="col-sm-4">
                              <select name="class_name" class="selectpicker" data-title="Pass Out From" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                 <?php foreach ($class as $clas) {  ?>
                                 <option value="<?php  echo $clas->class_id; ?>"><?php  echo $clas->class_name; ?></option>
                                 <?php } ?>
                              </select>
                            </div>


                     </div>
                  </fieldset>



                      <fieldset>
                           <div class="form-group">
                               <label class="col-sm-2 control-label">Qualified for promotion</label>
                               <div class="col-md-4">
                                <select name="qual" class="selectpicker" data-title="Qualified for promotion" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                   <option value="1">Yes</option>
                                   <option value="0">No</option>
                                </select>
                             </div>
                             <label class="col-sm-2 control-label">Certificates</label>
                             <div class="col-sm-4">
                                <label class="checkbox checkbox-inline">
                                <input type="checkbox" data-toggle="checkbox" name="trn_cert" value="1">Transfer Certificate
                                </label>
                                <label class="checkbox checkbox-inline">
                                <input type="checkbox" data-toggle="checkbox" name="rec_sheet" value="1">Record Sheet
                                </label>
                             </div>
                           </div>
                      </fieldset>


                  <fieldset>
                     <div class="form-group">

                        <label class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-4">
                           <select name="status" class="selectpicker form-control" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                              <option value="Active">Active</option>
                              <option value="Deactive">DeActive</option>
                           </select>
                        </div>
                     </div>
                  </fieldset>
                  <fieldset>
                     <div class="form-group">

                        <div class="text-center">
                           <button type="submit" id="save" class="btn btn-info btn-fill center">Save </button>
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
   var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
   };

   $(document).ready(function () {

   jQuery('#admissionmenu').addClass('collapse in');
   $('#admission').addClass('active');
   $('#admission1').addClass('active');

      $('#admissionform').validate({ // initialize the plugin
        rules: {
            admission_no:{required:true, number: true,  // will count space
               maxlength: 9,  remote: {
                         url: "<?php echo base_url(); ?>admission/check_admission_number",
                         type: "post"
                      }
                     },
            admission_year:{required:true },
            admission_date:{required:true },
            name:{required:true },
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
            age:{required:true,number:true,maxlength:2 },
            nationality:{required:true },
            religion:{required:true },
            community_class:{required:true },
            community:{required:true },
            blood_group:{required:true },
            mobile:{required:false,maxlength:10,minlength:10,remote:{
              url: "<?php echo base_url(); ?>admission/check_mobile_number",
              type: "post"
            } },
            //student_pic:{required:true }
        },
        messages: {
              admission_no:{
                required:"Enter the Admission Number max length 9 Digits",
                remote:"Admission Number Already Exist"
              },
             //  minlength:"Enter the Number 6 to 9 Digits",
              admission_year: "Enter Admission Year",
              admission_date: "Select Admission Date",
              name: "Enter Name",
               email:{
                 required:"Enter Email Address",
                 remote:"Email Already Exist"
               },
              //sec_email:"Enter Email Address",

              sex: "Select Gender",
              dob: "Select Date of Birth",
              emsi_num:{
                required:"Enter EMSI Number",
                remote:" EMSI Number Already Exist"
              },
              age: "Enter AGE",
              nationality: "Nationality",
              religion: "Enter the Religion",
              community:"Enter the Community",
              community_class:"Enter the Community Class",
              blood_group:"Select Blood Group",
              mobile:{
                required:"Enter mobile number",
                remote:"Mobile number Already Exist"
              }
             // student_pic:"Enter the Student Picture"
            }

    });
   });



   $().ready(function(){

     $('.datepicker').datetimepicker({
       format: 'DD-MM-YYYY',
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
</script>
