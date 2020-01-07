<div class="main-panel">
   <div class="content">
      <div class="col-md-12">
         <div class="card">
            <div class="header">
			   <h4 class="title">Edit Staff </h4>

            </div>
			<hr>
            <?php if($this->session->flashdata('msg')): ?>
            <div class="alert alert-success">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
               ×</button> <?php echo $this->session->flashdata('msg'); ?>
            </div>
            <?php endif; ?>
            <?php foreach ($res as $rows) { } ?>
            <div class="content">
               <form method="post" action="<?php echo base_url(); ?>teacher/save" class="form-horizontal" enctype="multipart/form-data" id="admissionform" name="teacherform">
                 <fieldset>
                    <div class="form-group">
                       <label class="col-sm-2 control-label">Role <span class="mandatory_field">*</span></label>
                       <div class="col-sm-4">
                          <select name="role_type_id" id="role_type_id" class="selectpicker form-control"  data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                            <?php foreach($res_user_role as $res_user_role_name){ ?>
                               <option value="<?php echo $res_user_role_name->role_id; ?>"><?php echo $res_user_role_name->user_type_name; ?></option>
                          <?php   } ?>
                            </select>
                             <script language="JavaScript">document.teacherform.role_type_id.value="<?php echo $rows->role_type_id; ?>";</script>
                       </div>
                    </div>
                 </fieldset>
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Name <span class="mandatory_field">*</span></label>
                        <div class="col-sm-4">
                           <input type="text" name="name" class="form-control" value="<?php echo $rows->name; ?>" maxlength="30">
                           <input type="hidden" placeholder="Community" name="teacher_id" class="form-control" value="<?php echo $rows->teacher_id; ?>">
                        </div>
                        <label class="col-sm-2 control-label">Email ID <span class="mandatory_field">*</span></label>
                        <div class="col-sm-4">
                           <input type="text" name="email" required  class="form-control" id="email" value="<?php echo $rows->email; ?>" maxlength="30"/>
                        </div>
                     </div>
                  </fieldset>
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Gender <span class="mandatory_field">*</span></label>
                        <div class="col-sm-4">
                           <select name="sex" class="selectpicker form-control"  data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                           </select>
                           <script language="JavaScript">document.teacherform.sex.value="<?php echo $rows->sex; ?>";</script>
                        </div>
                        <label class="col-sm-2 control-label">Mobile <span class="mandatory_field">*</span></label>
                        <div class="col-sm-4">
                           <input type="text" placeholder="Mobile Number" name="mobile" class="form-control" value="<?php echo $rows->phone; ?>" maxlength="10">
                        </div>
                     </div>
                  </fieldset>
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Alternate Email ID</label>
                        <div class="col-sm-4">
                           <input type="text" name="sec_email" placeholder="Email Address" class="form-control" value="<?php echo $rows->sec_email;?>" maxlength="30">
                        </div>
                        <label class="col-sm-2 control-label">Alternate Mobile </label>
                        <div class="col-sm-4">
                           <input type="text" name="sec_phone" value="<?php echo $rows->sec_phone;?> " class="form-control" placeholder="Mobile Number"  maxlength="10" />
                        </div>
                     </div>
                  </fieldset>
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Date of Birth <span class="mandatory_field">*</span></label>
                        <div class="col-sm-4">
                           <input type="text" name="dob" id="dob" class="form-control datepicker" placeholder="Date of Birth " value="<?php echo $rows->dob; ?>"/>
                        </div>
                        <label class="col-sm-2 control-label">Nationality <span class="mandatory_field">*</span></label>
                        <div class="col-sm-4">
                           <input type="text" placeholder="Nationality" name="nationality" class="form-control"  value="<?php echo $rows->nationality; ?>" maxlength="30">
                        </div>
                     </div>
                  </fieldset>
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Age</label>
                        <div class="col-sm-4">
                           <input type="text" placeholder="Age" name="age" id="age" class="form-control"  value="<?php echo $rows->age; ?>" maxlength="5">
                        </div>
                        <label class="col-sm-2 control-label">Religion <span class="mandatory_field">*</span></label>
                        <div class="col-sm-4">
                           <input type="text" placeholder="Religion" name="religion" class="form-control"  value="<?php echo $rows->religion; ?>" maxlength="30">
                        </div>
                     </div>
                  </fieldset>
                  <fieldset>
                     <div class="form-group">
					  <label class="col-sm-2 control-label">Community <span class="mandatory_field">*</span></label>
                        <div class="col-sm-4">
                           <input type="text" placeholder="Community" name="community" class="form-control" value="<?php echo $rows->community; ?>" maxlength="30">
                           <input type="hidden" placeholder=" " name="old_pic" class="form-control" value="<?php echo $rows->profile_pic; ?>">
                        </div>
                        <label class="col-sm-2 control-label">Community Class <span class="mandatory_field">*</span></label>
                        <div class="col-sm-4">
                           <input type="text" placeholder="Community Category" name="community_class" class="form-control"  value="<?php echo $rows->community_class; ?>" maxlength="30">
                        </div>
                       
                     </div>
                  </fieldset>
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Address <span class="mandatory_field">*</span></label>
                        <div class="col-sm-4">
                           <textarea name="address" MaxLength="150" class="form-control" rows="4" cols="80" placeholder="Max Characters 150"><?php echo $rows->address; ?></textarea>
                        </div>
                        <label class="col-sm-2 control-label">Subject Taught</label>
                        <div class="col-sm-4">
                           <select   name="subject" id="subject_id" class="selectpicker" data-style="btn-block" onchange="getListClass()"  data-menu-style="dropdown-blue">
                              <?php foreach ($resubject as $rows3) {  ?>
                              <option value="<?php echo $rows3->subject_id; ?>"><?php echo $rows3->subject_name; ?></option>
                              <?php      } ?>
                           </select>
                           <script language="JavaScript">document.teacherform.subject.value="<?php echo $rows->subject; ?>";</script>
                        </div>
                     </div>
                  </fieldset>
				   <fieldset>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Qualification <span class="mandatory_field">*</span></label>
                        <div class="col-sm-4">
                           <input type="text" value="<?php echo $rows->qualification; ?>" name="qualification" class="form-control" maxlength="30">
                        </div>

                        <div id="class_tutor_teacher">
                        <label class="col-sm-2 control-label">Class Teacher For</label>
                        <div class="col-sm-4">
                           <select   name="class_teacher"  class="selectpicker" data-style="btn-block"  data-menu-style="dropdown-blue">
                             <option value="">None</option>
                              <?php foreach ($getall_class as $rows2) {  ?>
                              <option value="<?php echo $rows2->class_sec_id; ?>"><?php echo $rows2->class_name; ?>&nbsp; - &nbsp;<?php echo $rows2->sec_name; ?></option>
                              <?php      } ?>
                           </select>
                           <script language="JavaScript">document.teacherform.class_teacher.value="<?php echo $rows->class_teacher; ?>";</script>
                        </div>
                      </div>


                     </div>
                  </fieldset>

                  <fieldset>
                     <div class="form-group">

                        <label class="col-sm-2 control-label">House</label>
                        <div class="col-sm-4">
                           <select name="groups_id" class="selectpicker form-control"  data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                              <?php foreach ($groups as $row2) {  ?>
                              <option value="<?php echo $row2->id; ?>"><?php echo $row2->group_name; ?></option>
                              <?php      } ?>
                           </select>
                           <script language="JavaScript">document.teacherform.groups_id.value="<?php echo $rows->house_id; ?>";</script>
                        </div>
                     </div>
                  </fieldset>
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Co-curricular Activity</label>
                        <div class="col-sm-4">
                           <select name="activity_id[]" multiple="multiple" class="selectpicker form-control"  data-style="btn-default btn-block" data-menu-style="dropdown-blue">
							  <?php
                                 $activity_id=$rows->extra_curicullar_id;
                                 $Query = "SELECT * FROM edu_extra_curricular";
                                 $obj=$this->db->query($Query);
                                 //print_r($objRs);
                                 $row=$obj->result();
                                 foreach ($row as $rows1)
                                 {
                                 $aid= $rows1->id;
                                 $activityname=$rows1->extra_curricular_name;
                                 $arryPlatform = explode(",", $activity_id);
                                 $sPlatform_id  = trim($aid);

                                 if (in_array($sPlatform_id, $arryPlatform )) {
                                 ?>
                              <?php
                                 echo "<option  value=\"$sPlatform_id\" selected />$activityname</option>";
                                 ?>
                              <?php }
                                 else {
                                 echo "<option value=\"$sPlatform_id\"/>$activityname</option>";
                                 }
                                     }
                                       ?>
                           </select>
                           <!-- <script language="JavaScript">document.teacherform.activity_id.value="<?php echo $rows->extra_curicullar_id; ?>";</script> -->
                        </div>
                        <label class="col-sm-2 control-label">Status <span class="mandatory_field">*</span></label>
                        <div class="col-sm-4">
                           <select name="status" class="selectpicker form-control"  data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                              <option value="Active">Active</option>
                              <option value="Deactive">Inactive</option>
                           </select>
                           <script language="JavaScript">document.teacherform.status.value="<?php echo $rows->status; ?>";</script>
                        </div>
                     </div>
                  </fieldset>
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Current Pic</label>
                        <div class="col-sm-4">
                          <?php if(empty($rows->profile_pic)){?>
                          <img src="<?php echo base_url(); ?>assets/noimg.png" class="img-circle" style="width:110px;">
                        <?php }else{ ?>
                           <img src="<?php echo base_url(); ?>assets/teachers/<?php echo $rows->profile_pic; ?>" class="img-responsive" style="width:150px;">
                          <?php } ?>

                        </div>
                     </div>
                  </fieldset>
                  <fieldset>
                     <div class="form-group">
                       <label class="col-sm-2 control-label">Profile Picture</label>
                       <div class="col-sm-4">
                          <input type="file" name="teacher_pic" class="form-control" onchange="loadFile(event)" accept="image/*" >
                       </div>
                       <label class="col-sm-2 control-label">&nbsp;</label>
                       <div class="col-sm-4">
                          <img  id="output" class="img-responsive" style="width:100px; margin-top: -25px;">
                       </div>
                     </div>
                   </fieldset>
                  <fieldset>
                     <div class="form-group">

                        <!-- <label class="col-sm-2 control-label">&nbsp;</label> -->
                        <div class="text-center">
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
   function getListClass(){

   var subject_id=$('#subject_id').val();
   //alert(subject_id);
   $.ajax({
   url:'<?php echo base_url(); ?>classmanage/getListClass',
   method:"POST",
   data:{subject_id:subject_id},
   dataType: "JSON",
   cache: false,
   success:function(data)
   {
   var stat=data.status;
   $("#multiple-class").empty();
   if(stat=="success"){
   var res=data.res;
   //alert(res.length);
   var len=res.length;

   for (i = 0; i < len; i++) {

   $('<option>').val(res[i].class_sec_id).text(res[i].class_name + res[i].sec_name).appendTo('#multiple-class');
   }

   }else{
   $("#multiple-class").empty();
   }



   }
   });

   }
   var loadFile = function(event) {
   var output = document.getElementById('output');
   output.src = URL.createObjectURL(event.target.files[0]);
   };


   $(document).ready(function () {

   $('#teachermenu').addClass('collapse in');
   $('#teacher').addClass('active');
   $('#teacher2').addClass('active');
   $('#admissionform').validate({ // initialize the plugin
   rules: {

   name:{required:true }, address:{required:true },
   email:{required:true,email:true,  remote: {
                url: "<?php echo base_url(); ?>teacher/email_checker/<?php echo $rows->teacher_id; ?>",
                type: "post"
             }
           },
   sex:{required:true },
   dob:{required:true },
   age:{required:true,number:true,maxlength:2 },
   nationality:{required:true },
   "class_name[]":{required:true },
   religion:{required:true },
   community_class:{required:true },
   community:{required:true },
   status:{required:true },
   mobile:{required:true,
     remote: {
                  url: "<?php echo base_url(); ?>teacher/mobile_exist_checker/<?php echo $rows->teacher_id; ?>",
                  type: "post"
               }
              }

   },
   messages: {

   address: "This field cannot be empty!",
   admission_date: "This field cannot be empty!",
   name: "This field cannot be empty!",
   "class_name[]":"This field cannot be empty!",
   email:{
         required: "This field cannot be empty!",
         email: "Please enter a valid email address.",
         remote: "Email already in use!"
   },
   sex: "Please choose an option!",
   dob: "This field cannot be empty!",
   age: "This field cannot be empty!",
   nationality: "This field cannot be empty!",
   religion: "This field cannot be empty!",
   community:"This field cannot be empty!",
   community_class:"This field cannot be empty!",
   mother_tongue:"This field cannot be empty!",
   mobile:{
     required: "This field cannot be empty!",
     mobile: "Please enter a valid mobile Number.",
     remote: "Mobile Number already in use!"
   },
   status:"Please choose an option!"

   }
   });
   });



</script>
