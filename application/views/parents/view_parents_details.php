<div class="main-panel">
    <div class="content">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Parent Profile</h4>
                </div>
                <?php if($this->session->flashdata('msg')): ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            ×</button>
                        <?php echo $this->session->flashdata('msg'); ?>
                    </div>
                    <?php endif; ?>
                        <div class="content">
                            <!-- <form method="post" action="<?php echo base_url(); ?>parents/update_parents" class="form-horizontal" enctype="multipart/form-data" id="parentform" name="parentform"> -->
                                <div class="content">

                                    <ul role="tablist" class="nav nav-tabs" style="border-bottom: none;padding-left:05px;">
                                        <li role="presentation" class="active">
                                            <a href="#father" class="btn btn-info " style="border-bottom-color:#976dea;cursor: pointer;" data-toggle="tab">Father</a>
                                        </li>
                                        <li>
                                            <a href="#mothers" class="btn btn-info " style="border-bottom-color:#976dea;cursor: pointer;" data-toggle="tab">Mother</a>
                                        </li>
                                        <li>
                                            <a href="#guardian" class="btn btn-info " style="border-bottom-color:#976dea;cursor: pointer;" data-toggle="tab">Guardian</a>
                                        </li>
                                        <?php   $s=count($editres);
 									if($s==3){ }else{
									?>
                                            <li style="margin-left:560px;">
                                                <a href="<?php echo base_url(); ?>parents/create_new_parents_details/<?php echo $sid;?>/<?php echo 0;?>" class="btn btn-info" style="cursor: pointer;">Add More Details </a>
                                            </li>
                                            <?php } ?>
                                    </ul>
                                </div>
                                <p id="erid" style="color:red;"></p>
                                <div class="tab-content">


                                    <div id="father" class="tab-pane active">
                                      <form method="post" action="<?php echo base_url(); ?>parents/update_father_details" class="form-horizontal"
                                        enctype="multipart/form-data" id="father_form" name="parentform">
                                        <?php 	 foreach($editres as $prow){
                              						   $relation1=$prow->relationship;
                              						    if($relation1=="Father"){
                                                if(empty($prow->id)){
                                                  $fid=" ";
                                                }else{
                                                    $fid=$prow->id;
                                                }
                                                ?>
                                            <input type="hidden" name="admission_no" class="form-control" value="<?php echo $sid; ?>">
                                            <input type="hidden" name="oldstu" class="form-control" value="<?php  echo $sid; ?>">
                                            <input type="hidden" name="morestu" class="form-control" value="<?php echo $prow->admission_id; ?>">
                                            <input type="hidden" name="newstu" class="form-control" value="<?php echo $prow->admission_id; ?>">
                                            <input type="hidden" name="fid" id="fid" class="form-control" value="<?php  echo $fid; ?>">
                                            <fieldset>
                                                <div class="form-group">
                                                  <div class="col-md-12">
                                                    <a onclick="remove_parents(<?php  echo $fid; ?>,<?php  echo $sid; ?>)" class="btn pull-right">Remove Parent</a>
                                                  </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>                                                
											<div class="form-group">
                                                    <label class="col-sm-2 control-label">Father Name <span class="mandatory_field">*</span></label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="fname" id="fname" placeholder="Enter Name" class="form-control" value="<?php echo $prow->name; ?>" maxlength="30">
                                                    </div>
                                                    <label class="col-sm-2 control-label">Login <span class="mandatory_field">*</span></label>
                                                    <div class="col-sm-4">
                                                        <select name="flogin" id="flogin" class="selectpicker form-control">
																	<option value="Yes">Enabled</option>
                                                                    <option value="No">Disabled</option>
                                                        </select>
                                                        <script>$('#flogin').val('<?php echo $prow->primary_flag; ?>');</script>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                  <label class="col-sm-2 control-label">Email ID <span class="mandatory_field">*</span></label>
                                                  <div class="col-sm-4">
                                                      <input type="text" name="fpemail" id="fpemail" value="<?php echo $prow->email; ?>" class="form-control" placeholder="Email Address" onblur="checkemailfun(this.value)" maxlength="30" />
                                                  </div>
                                                  <label class="col-sm-2 control-label">Alternate Email ID</label>
                                                  <div class="col-sm-4">
                                                      <input type="text" name="fsemail" id="fsemail" class="form-control" value="<?php echo $prow->sec_email; ?>" id="email" placeholder="Email Address" maxlength="30" />
                                                  </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                  <label class="col-sm-2 control-label">Mobile Number <span class="mandatory_field">*</span></label>
                                                  <div class="col-sm-4">
                                                      <input type="text" placeholder="Mobile Number" value="<?php echo $prow->mobile; ?>" name="fpmobile" id="fpmobile" class="form-control" onblur="fcheckmobilefun(this.value)" maxlength="10">

                                                  </div>
                                                  <label class="col-sm-2 control-label">Alternate Mobile Number</label>
                                                  <div class="col-sm-4">
                                                      <input type="text" placeholder="Mobile Number" value="<?php echo $prow->sec_mobile; ?>" name="fsmobile" id="fsmobile" class="form-control" maxlength="10">
                                                  </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Occupation</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="foccupation" id="foccupation" placeholder="Occupation" class="form-control" value="<?php echo $prow->occupation; ?>" maxlength="30">
                                                    </div>
                                                    <label class="col-sm-2 control-label">Income</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" placeholder="Income" name="fincome" id="fincome" class="form-control" value="<?php echo $prow->income; ?>" maxlength="10">
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Residential Address</label>
                                                    <div class="col-sm-4">
													<textarea name="fhaddress" id="fhaddress" maxlength="150" placeholder="MaxCharacters 150" class="form-control" rows="4" cols="80"><?php echo $prow->home_address; ?></textarea>
                                                    </div>
                                                    <label class="col-sm-2 control-label">Telephone</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" placeholder="Home Phone" value="<?php echo $prow->home_phone; ?>" name="fhome_phone" id="fhome_phone" class="form-control" maxlength="14">
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Office Address</label>
                                                    <div class="col-sm-4">
                                                        <textarea name="foffice_address" id="foffice_address"
                                                       placeholder="MaxCharacters 150" class="form-control" rows="4" cols="80" maxlength="150"><?php echo $prow->office_address; ?></textarea>
                                                    </div>
                                                    <label class="col-sm-2 control-label">Office Phone Number</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" placeholder="Office Phone" value="<?php echo $prow->office_phone; ?>" name="foffice_phone" id="foffice_phone" class="form-control" maxlength="14">
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Profile Picture</label>
                                                    <div class="col-sm-4">
                                                        <input type="file" name="father_pic" id="fpic" class="form-control" onchange="loadFile(event)" accept="image/*">
                                                        <input type="hidden" name="frelationship" value="<?php echo "Father";?>" readonly class="form-control">
                                                    </div>
													<?php if ($prow->user_pic !="") { ?>
													 <label class="col-sm-2 control-label"></label>
                                                    <div class="col-sm-4">
                                                        <img src="<?php echo base_url(); ?>assets/parents/<?php echo $prow->user_pic; ?>" id="output" class="img-responsive" style="width:110px;">
                                                        <input type="hidden" name="old_father_pic" class="form-control" value="<?php echo $prow->user_pic; ?>">
                                                    </div>
													<?php } ?>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Status</label>
                                                    <div class="col-sm-4">
                                                        <select name="fstatus" id="fstatus" class="selectpicker form-control" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                                            <option value="Active">Active</option>
                                                            <option value="Deactive">Inactive</option>
                                                        </select>

                                                          <script>$('#fstatus').val('<?php echo $prow->status; ?>');</script>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">&nbsp;</label>
                                                    <div class="col-sm-4">
                                                        
														<input type="submit" id="save1" class="btn btn-info btn-fill center" value="SAVE">
                                                    </div>
                                                </div>
                                            </fieldset>
<script>
	$.validator.addMethod("alphabetsnspace", function(value, element) {
       return this.optional(element) || /^[a-zA-Z\. ]*$/.test(value);
    });
	
	$('#father_form').validate({
		rules: {
			fname:{required:true,alphabetsnspace: true }, 
			fpmobile:{required:true,maxlength:10,minlength:10,number:true,
				remote: {
				 url: "<?php echo base_url(); ?>parents/check_fpmobile_number_exist/<?php echo $fid; ?>",
				 type: "post"
				}
			},
			fsmobile:{required:false,maxlength:10,minlength:10,number:true,notEqualTo: "#fpmobile"},
			fpemail:{required:true,email:true,
				remote: {
				  url: "<?php echo base_url(); ?>parents/check_fpemail_id_exist/<?php echo $fid; ?>",
				 type: "post"
				}
			},
			fsemail:{required:false, email:true,notEqualTo: "#fpemail"},
			fincome:{required:false,maxlength:10,number:true},
			fhome_phone:{required:false,maxlength:14,minlength:6,number:true},
			foffice_phone:{required:false,maxlength:14,minlength:6,number:true},
			foccupation:{required:false,alphabetsnspace: true }
			},
		messages: {
			 fname: {
				  required: "This field cannot be empty!",
				  alphabetsnspace: "Please enter only alphabet"
				},
			fpmobile:{required:"This field cannot be empty!",remote:"Mobile number already exist"},
			fsmobile:{notEqualTo : "Please check your mobile"},
			fpemail:{required:"This field cannot be empty!",remote:"Email already exist"},
			fsemail:{notEqualTo : "Please check your email"},
			foccupation: {
				  alphabetsnspace: "Please enter only alphabet"
			}
		}
	});
</script>
                                          <?php } } ?>
                                            </form>
                                    </div>

                                    <!-- Mother-->


                                    <div id="mothers" class="tab-pane">
                                      <form method="post" action="<?php echo base_url(); ?>parents/update_mother_details" class="form-horizontal"
                                        enctype="multipart/form-data" id="mother_form" name="mother_form">
                                        <?php foreach($editres as $prow){
                                         $relation=$prow->relationship;
				                                 if($relation=="Mother"){

                                           if(empty($prow->id)){
                                             $mid="0";
                                           }else{
                                               $mid=$prow->id;
                                           }
                                            ?>
                                            <input type="hidden" name="admission_no" class="form-control" value="<?php echo $sid; ?>">
                                            <input type="hidden" name="oldstu" class="form-control" value="<?php  echo $sid; ?>">
                                            <input type="hidden" name="newstu" class="form-control" value="<?php echo $prow->admission_id; ?>">
                                            <input type="hidden" name="morestu" class="form-control" value="<?php echo $prow->admission_id; ?>">
                                            <input type="hidden" name="mid" id="mid" class="form-control" value="<?php echo $mid; ?>">
                                            <fieldset>
                                                <div class="form-group">
                                                  <div class="col-md-12">
                                                    <a onclick="remove_parents(<?php  echo $mid; ?>,<?php  echo $sid; ?>)" class="btn pull-right">Remove Parent</a>
                                                  </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Mother Name <span class="mandatory_field">*</span></label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="mname" id="mname" placeholder="Enter Name" class="form-control" value="<?php echo $prow->name; ?>" maxlength="30">
                                                    </div>
                                                    <label class="col-sm-2 control-label">Login <span class="mandatory_field">*</span></label>
                                                    <div class="col-sm-4">
                                                        <select name="mlogin" id="mlogin" class="selectpicker form-control">
																	<option value="Yes">Enabled</option>
                                                                    <option value="No">Disabled</option>
                                                        </select>
                                                        <script>$('#mlogin').val('<?php echo $prow->primary_flag; ?>');</script>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                  <label class="col-sm-2 control-label">Email ID <span class="mandatory_field">*</span></label>
                                                  <div class="col-sm-4">
                                                      <input type="text" name="mpemail" id="mpemail" value="<?php echo $prow->email; ?>" class="form-control" placeholder="Email Address" onblur="mcheckemailfun(this.value)" maxlength="30" />
                                                  </div>
                                                  <label class="col-sm-2 control-label">Alternate Email ID</label>
                                                  <div class="col-sm-4">
                                                      <input type="text" name="msemail" id="msemail" value="<?php echo $prow->sec_email; ?>" class="form-control" placeholder="Email Address" maxlength="30" />
                                                  </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                  <label class="col-sm-2 control-label">Mobile Number <span class="mandatory_field">*</span></label>
                                                  <div class="col-sm-4">
                                                      <input type="text" placeholder="Mobile Number" value="<?php echo $prow->mobile; ?>" name="mpmobile" id="mpmobile" class="form-control" onblur="mcheckmobilefun(this.value)" maxlength="10">
                                                  </div>
                                                  <label class="col-sm-2 control-label">Alternate Mobile Number</label>
                                                  <div class="col-sm-4">
                                                      <input type="text" placeholder="Mobile Number" value="<?php echo $prow->sec_mobile; ?>" name="msmobile" id="msmobile" class="form-control" maxlength="10">
                                                  </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Occupation</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="moccupation" id="moccupation" placeholder="Occupation" class="form-control" value="<?php echo $prow->occupation; ?>" maxlength="30">
                                                    </div>
                                                    <label class="col-sm-2 control-label">Income</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" placeholder="Income" value="<?php echo $prow->income; ?>" name="mincome" id="mincome" class="form-control" maxlength="10">
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Residential Address</label>
                                                    <div class="col-sm-4">
                                                <textarea name="mhaddress" id="mhaddress" maxlength="150" placeholder="MaxCharacters 150" class="form-control" rows="4" cols="80"><?php echo $prow->home_address; ?></textarea>
                                                    </div>
                                                    <label class="col-sm-2 control-label">Telephone</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" placeholder="Home Phone" maxlength="14" value="<?php echo $prow->home_phone; ?>" name="mhome_phone" id="mhome_phone" class="form-control">
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Office Address</label>
                                                    <div class="col-sm-4">
                                                        <textarea name="moffice_address" id="moffice_address"  placeholder="MaxCharacters 150"
                                                        class="form-control" rows="4" cols="80" maxlength="150"><?php echo $prow->office_address; ?></textarea>
                                                    </div>
                                                    <label class="col-sm-2 control-label"> Office Phone Number</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" placeholder="Office Phone" value="<?php echo $prow->office_phone; ?>" name="moffice_phone" id="moffice_phone" class="form-control" maxlength="14">
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Profile Picture</label>
                                                    <div class="col-sm-4">
                                                        <input type="file" name="mother_pic" id="mpic" class="form-control" onchange="loadFile1(event)" accept="image/*">
                                                        <input type="hidden" placeholder="Office Phone" value="<?php echo $prow->relationship; ?>" name="mrelationship" id="mrelationship" class="form-control">
                                                    </div>
													<?php if ($prow->user_pic !="") { ?>
													 <label class="col-sm-2 control-label"></label>
                                                    <div class="col-sm-4">
                                                        <img src="<?php echo base_url(); ?>assets/parents/<?php echo $prow->user_pic; ?>" id="output" class="img-responsive" style="width:110px;">
                                                        <input type="hidden" name="old_father_pic" class="form-control" value="<?php echo $prow->user_pic; ?>">
                                                    </div>
													<?php } ?>
                                                </div>
                                            </fieldset>

                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Status</label>
                                                    <div class="col-sm-4">
                                                        <select name="mstatus" id="mstatus" class="selectpicker form-control" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                                            <option value="Active">Active</option>
                                                            <option value="Deactive">Inactive</option>
                                                        </select>

                                                        <script>$('#mstatus').val('<?php echo $prow->status; ?>');</script>
                                                    </div>

                                                 </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">&nbsp;</label>
                                                    <div class="col-sm-4">
														<input type="submit" id="save1" class="btn btn-info btn-fill center" value="SAVE">
                                                       
                                                    </div>
                                                </div>
                                            </fieldset>
<script>
	$.validator.addMethod("alphabetsnspace", function(value, element) {
       return this.optional(element) || /^[a-zA-Z\. ]*$/.test(value);
    });
	
	$('#mother_form').validate({
	rules: {
		mid:{required:false},
		mname:{required:true,alphabetsnspace: true }, 
		mpmobile:{required:true,maxlength:10,minlength:10,number:true,
		remote: {
			url: "<?php echo base_url(); ?>parents/check_mpmobile_number_exist/<?php echo $mid; ?>",
			type: "post"
			}
		},
		msmobile:{required:false,maxlength:10,minlength:10,number:true,notEqualTo: "#mpmobile"},
		mpemail:{required:true,email:true,
		remote: {
			url: "<?php echo base_url(); ?>parents/check_mpemail_id_exist/<?php echo $mid; ?>",
			type: "post"
			}
		},
		msemail:{required:false, email:true,notEqualTo: "#mpemail"},
		moccupation:{required:false,alphabetsnspace: true }, 
		mincome:{required:false,maxlength:10,number:true},
		mhome_phone:{required:false,maxlength:14,minlength:6,number:true},
		moffice_phone:{required:false,maxlength:14,minlength:6,number:true},
		},
	messages: {
			 mname: {
				  required: "This field cannot be empty!",
				  alphabetsnspace: "Please enter only alphabet"
				},
			mpmobile:{required:"This field cannot be empty!",remote:"Mobile number already exist"},
			msmobile:{notEqualTo : "Please check your mobile"},
			mpemail:{required:"This field cannot be empty!",remote:"Email already exist"},
			msemail:{notEqualTo : "Please check your email"},
			moccupation: {
				  alphabetsnspace: "Please enter only alphabet"
			}
		}
	});                                        
</script>
                                          <?php }else{

                                          }  } ?>
                                          </form>
                                    </div>

                                    <!-- Guardian -->
                                    <div id="guardian" class="tab-pane">
                                      <form method="post" action="<?php echo base_url(); ?>parents/update_guardian_details" class="form-horizontal"
                                        enctype="multipart/form-data" id="guardian_form" name="guardian_form">
                                        <?php 	foreach($editres as $prow){
                                  					     $relation=$prow->relationship;
                                  						 if($relation=="Guardian"){
                                                 if(empty($prow->id)){
                                                   $gid="0";
                                                 }else{
                                                   $gid=$prow->id;
                                                 }
                                  								?>
                                            <input type="hidden" name="admission_no" class="form-control" value="<?php echo $sid; ?>">
                                            <input type="hidden" name="oldstu" class="form-control" value="<?php  echo $sid; ?>">
                                            <input type="hidden" name="newstu" class="form-control" value="<?php echo $prow->admission_id; ?>">
                                            <input type="hidden" name="morestu" class="form-control" value="<?php echo $prow->admission_id; ?>">
                                            <input type="hidden" name="gid" class="form-control" value="<?php echo $gid; ?>">
                                            <fieldset>
                                                <div class="form-group">
                                                  <div class="col-md-12">
                                                    <a onclick="remove_parents(<?php  echo $gid; ?>,<?php  echo $sid; ?>)" class="btn pull-right">Remove Parent</a>
                                                  </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Guardian Name <span class="mandatory_field">*</span></label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="gname" id="gname" placeholder="Enter Name" class="form-control" value="<?php echo $prow->name; ?>" maxlength="30">
                                                    </div>
                                                    <label class="col-sm-2 control-label">Login <span class="mandatory_field">*</span></label>
                                                    <div class="col-sm-4">
                                                        <select name="glogin" id="glogin" class="selectpicker form-control">
																	<option value="Yes">Enabled</option>
                                                                    <option value="No">Disabled</option>

                                                        </select>

                                                          <script>$('#glogin').val('<?php echo $prow->primary_flag; ?>');</script>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                  <label class="col-sm-2 control-label">Email ID <span class="mandatory_field">*</span></label>
                                                  <div class="col-sm-4">
                                                      <input type="text" name="gpemail" id="gpemail" value="<?php echo $prow->email; ?>" class="form-control" placeholder="Email Address" onblur="gcheckemailfun(this.value)" maxlength="30"/>

                                                  </div>
                                                  <label class="col-sm-2 control-label">Alternate Email ID</label>
                                                  <div class="col-sm-4">
                                                      <input type="text" name="gsemail" value="<?php echo $prow->sec_email; ?>" class="form-control " id="gsemail" placeholder="Email Address" maxlength="30" />
                                                  </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                  <label class="col-sm-2 control-label">Mobile Number <span class="mandatory_field">*</span></label>
                                                  <div class="col-sm-4">
                                                      <input type="text" placeholder="Mobile Number" value="<?php echo $prow->mobile; ?>" name="gpmobile" id="gpmobile" class="form-control" onblur="gcheckmobilefun(this.value)" maxlength="10">
                                                  </div>
                                                  <label class="col-sm-2 control-label">Alternate Mobile Number</label>
                                                  <div class="col-sm-4">
                                                      <input type="text" placeholder="Mobile Number" value="<?php echo $prow->sec_mobile; ?>" name="gsmobile" id="gsmobile" class="form-control" maxlength="10">
                                                  </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Occupation</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="goccupation" id="goccupation" placeholder="Occupation" class="form-control" value="<?php echo $prow->occupation; ?>" maxlength="30">
                                                    </div>
                                                    <label class="col-sm-2 control-label">Income</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" placeholder="Income" value="<?php echo $prow->income; ?>" name="gincome" id="gincome" class="form-control" maxlength="10">
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Residential Address</label>
                                                    <div class="col-sm-4">
                          <textarea name="ghaddress" id="ghaddress"  placeholder="MaxCharacters 150" class="form-control" maxlength="150" rows="4" cols="80"><?php echo $prow->home_address; ?></textarea>
                                                    </div>
                                                    <label class="col-sm-2 control-label">Telephone</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" placeholder="Home Phone" value="<?php echo $prow->home_phone; ?>" name="ghome_phone" id="ghome_phone" class="form-control" maxlength="14">
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Office Address</label>
                                                    <div class="col-sm-4">
                                                        <textarea name="goffice_address" id="goffice_address"
                                                        placeholder="MaxCharacters 150" class="form-control" rows="4" cols="80" maxlength="150"><?php echo $prow->office_address; ?></textarea>
                                                    </div>
                                                    <label class="col-sm-2 control-label">Office Phone Number</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" placeholder="Office Phone" value="<?php echo $prow->office_phone; ?>" name="goffice_phone" id="goffice_phone" class="form-control" maxlength="14">
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Profile Picture</label>
                                                    <div class="col-sm-4">
                                                        <input type="file" name="guardian_pic" id="gpic" class="form-control" onchange="loadFile2(event)" accept="image/*">
                                                          <input type="hidden" placeholder="Office Phone" value="<?php echo $prow->relationship; ?>" name="grelationship" id="grelationship" class="form-control">
                                                    </div>
                                                   <?php if ($prow->user_pic !="") { ?>
													 <label class="col-sm-2 control-label"></label>
                                                    <div class="col-sm-4">
                                                        <img src="<?php echo base_url(); ?>assets/parents/<?php echo $prow->user_pic; ?>" id="output" class="img-responsive" style="width:110px;">
                                                        <input type="hidden" name="old_father_pic" class="form-control" value="<?php echo $prow->user_pic; ?>">
                                                    </div>
													<?php } ?>
                                                </div>
                                            </fieldset>

                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Status</label>
                                                    <div class="col-sm-4">
                                                        <select name="gstatus" id="gstatus" class="selectpicker form-control" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                                            <option value="Active">Active</option>
                                                            <option value="Deactive">Inactive</option>
                                                        </select>

                                                        <script>$('#gstatus').val('<?php echo $prow->status; ?>');</script>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">&nbsp;</label>
                                                    <div class="col-sm-4">
													<input type="submit" id="save1" class="btn btn-info btn-fill center" value="SAVE">
                                                   
                                                    </div>
                                                </div>
                                            </fieldset>
<script>
	$.validator.addMethod("alphabetsnspace", function(value, element) {
       return this.optional(element) || /^[a-zA-Z\. ]*$/.test(value);
    });
	
	$('#guardian_form').validate({
	rules: {
		gid:{required:false},
		gname:{required:true,alphabetsnspace: true }, 
		gpmobile:{required:true,maxlength:10,minlength:10,number:true,
		remote: {
			url: "<?php echo base_url(); ?>parents/check_gpmobile_number_exist/<?php echo $gid; ?>",
			type: "post"
			}
		},
		gsmobile:{required:false,maxlength:10,minlength:10,number:true,notEqualTo: "#gpmobile"},
		gpemail:{required:true,email:true,
		remote: {
			url: "<?php echo base_url(); ?>parents/check_gpemail_id_exist/<?php echo $gid; ?>",
			type: "post"
			}
		},
		gsemail:{required:false, email:true,notEqualTo: "#gpemail"},
		goccupation:{required:false,alphabetsnspace: true }, 
		gincome:{required:false,maxlength:10,number:true},
		ghome_phone:{required:false,maxlength:14,minlength:6,number:true},
		goffice_phone:{required:false,maxlength:14,minlength:6,number:true},
		},
	messages: {
			gname: {
				  required: "This field cannot be empty!",
				  alphabetsnspace: "Please enter only alphabet"
				},
			gpmobile:{required:"This field cannot be empty!",remote:"Mobile number already exist"},
			gsmobile:{notEqualTo : "Please check your mobile"},
			gpemail:{required:"This field cannot be empty!",remote:"Email already exist"},
			gsemail:{notEqualTo : "Please check your email"},
			goccupation: {
				  alphabetsnspace: "Please enter only alphabet"
			}
		}
	});                                        
</script>

                                            <?php }	}?>
              </form>
                                    </div>

                                </div>

                        </div>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };

    var loadFile1 = function(event) {
        var output1 = document.getElementById('output1');
        output1.src = URL.createObjectURL(event.target.files[0]);
    };

    var loadFile2 = function(event) {
        var output2 = document.getElementById('output2');
        output2.src = URL.createObjectURL(event.target.files[0]);
    };


function remove_parents(sel,stu_id){

        swal({
            title: "Are you sure?",
            text: "You want remove this parent",
            type: "success",
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Yes',
            cancelButtonText: "No",
            closeOnConfirm: false,
            closeOnCancel: false
            },
        function(isConfirm) {
            if (isConfirm) {
              $.ajax({
                url: "<?php echo base_url(); ?>parents/remove_parents_from_students",
                type:'POST',
                data: {
                'id': sel,'stu_id':stu_id
                },
                success: function(response) {
                  if(response=="success"){
                    swal({
                    title: "Success!",
                    text: "Removed Successfully!",
                    type: "success"
                    }, function() {
						location.reload();
                    });
                  }else{
                    //alert(response);
                    sweetAlert("Oops...", "Something went wrong!", "error");
                  }
                }
              });
            }else{
				swal("Cancelled", "Process Cancelled", "error");
            }
        });

}
$('#admissionmenu').addClass('collapse in');
$('#admission').addClass('active');
$('#admission2').addClass('active');

</script>
