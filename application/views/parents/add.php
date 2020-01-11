
<div class="main-panel">
    <div class="content">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Parent Details</h4>
					<h5>For parents whose children are currently studying here, fetch the details from "Exisiting Profile".</h5>
                </div>
                <div class="content">
                    <ul role="tablist" class="nav nav-tabs">
                        <li role="presentation" class="active">
                            <a href="#agency" data-toggle="tab">New Profile</a>
                        </li>
                        <li>
                            <a href="#company" data-toggle="tab">Existing Profile</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="agency" class="tab-pane active">
                            <?php if($this->session->flashdata('msg')): ?>
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                        ×</button>
                                    <?php echo $this->session->flashdata('msg'); ?>
                                </div>
                                <?php endif; ?>
                                    <div class="content">
                                        <form method="post" action="<?php echo base_url(); ?>parents/create" class="form-horizontal" enctype="multipart/form-data" id="parentform" onsubmit="return validates()">
                                            <div class="content">
                                                <ul role="tablist" class="nav nav-tabs" style="border-bottom: none;padding-left:05px;">
                                                    <li role="presentation" class="active">
                                                        <a href="#father" class="btn btn-info btn-fill" style="border-bottom-color:#976dea;cursor: pointer;" data-toggle="tab">Father</a>
                                                    </li>
                                                    <li>
                                                        <a href="#mothers" class="btn btn-info btn-fill" style="border-bottom-color:#976dea;cursor: pointer;" data-toggle="tab">Mother</a>
                                                    </li>
                                                    <li>
                                                        <a href="#guardian" class="btn btn-info btn-fill" style="border-bottom-color:#976dea;cursor: pointer;" data-toggle="tab">Guardian</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <p id="erid" style="color:red;"></p>
                                            <input type="hidden" name="admission_no" class="form-control" value="<?php echo $result; ?>">
                                            <div class="tab-content">
                                                <div id="father" class="tab-pane active">
                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Father Name <span class="mandatory_field">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" name="fname" id="fname" placeholder="Father Name" class="form-control" value="" maxlength="30">
                                                            </div>
                                                            <label class="col-sm-2 control-label">Login Access  <span class="mandatory_field">*</span></label>
                                                            <div class="col-sm-4">
                                                                <select name="flogin" id="flogin" class="selectpicker form-control">
                                                                    <option value="Yes">Enabled</option>
                                                                    <option value="No">Disabled</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </fieldset>

                                                    <fieldset>
                                                        <div class="form-group">
                                                          <label class="col-sm-2 control-label">Email ID <span class="mandatory_field">*</span></label>
                                                          <div class="col-sm-4">
                                                              <input type="text" name="fpemail" id="fpemail" class="form-control" placeholder="Email ID"  maxlength="30" />
                                                          </div>
                                                          <label class="col-sm-2 control-label">Alternate Email</label>
                                                          <div class="col-sm-4">
                                                              <input type="text" name="fsemail" id="fsemail" class="form-control " id="email" placeholder="Alternate Email ID"  maxlength="30" />
                                                          </div>
                                                        </div>
                                                    </fieldset>


                                                    <fieldset>
                                                        <div class="form-group">
                                                          <label class="col-sm-2 control-label">Mobile Number <span class="mandatory_field">*</span></label>
                                                          <div class="col-sm-4">
                                                              <input type="text" placeholder="Mobile Number" name="fpmobile" id="fpmobile" class="form-control"  maxlength="10">
                                                          </div>
                                                          <label class="col-sm-2 control-label">Alternate Mobile</label>
                                                          <div class="col-sm-4">
                                                              <input type="text" placeholder="Alternate Mobile Number" name="fsmobile" id="fsmobile"class="form-control"  maxlength="10">
                                                          </div>

                                                        </div>
                                                    </fieldset>

                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Occupation</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" name="foccupation" id="foccupation" placeholder="Occupation" class="form-control" value=""  maxlength="30">
                                                            </div>
                                                            <label class="col-sm-2 control-label">Income</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" placeholder="Income" name="fincome" id="fincome" class="form-control" maxlength="10">
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Residential Address</label>
                                                            <div class="col-sm-4">
                                                                <textarea name="fhaddress" id="fhaddress" MaxLength="150" placeholder="Maximum 150 characters" class="form-control" rows="4" cols="80"></textarea>
                                                            </div>
															 <label class="col-sm-2 control-label">Office Address</label>
                                                            <div class="col-sm-4">
                                                                <textarea name="foffice_address" id="foffice_address" MaxLength="150" placeholder="Maximum 150 characters" class="form-control" rows="4" cols="80"></textarea>
                                                            </div>
                                                            

                                                        </div>
                                                    </fieldset>

                                                    <fieldset>
                                                        <div class="form-group">
                                                           <label class="col-sm-2 control-label">Telephone</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" placeholder="Telephone" name="fhome_phone" id="fhome_phone" class="form-control" maxlength="14">
                                                            </div>

                                                            <label class="col-sm-2 control-label">Office Phone</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" placeholder="Office Phone" name="foffice_phone" class="form-control"  maxlength="14">
                                                                  <input type="hidden" placeholder="Office Phone" name="frelationship" class="form-control" value="Father">
                                                            </div>

                                                        </div>
                                                    </fieldset>
                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label"> Profile Picture</label>
                                                            <div class="col-sm-4">
                                                                <input type="file" name="father_pic" id="fpic" class="form-control" onchange="loadFile(event)" accept="image/*">
                                                            </div>
                                                            <label class="col-sm-2 control-label"></label>
                                                            <div class="col-sm-4">
                                                                <img id="output" class="img-responsive" style="width:110px;">
                                                            </div>
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
                                                            </div>
                                                        </div>
                                                    </fieldset>

                                                </div>


                                                <!-- Mother-->
                                                <div id="mothers" class="tab-pane">
                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Mother Name <span class="mandatory_field">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" name="mname" id="mname" placeholder="Mother Name" class="form-control" value="" maxlength="30">
                                                            </div>
                                                            <label class="col-sm-2 control-label">Login Access <span class="mandatory_field">*</span></label>
                                                            <div class="col-sm-4">
                                                                <select name="mlogin" id="mlogin" class="selectpicker form-control">
                                                                    <option value="Yes">Enabled </option>
                                                                    <option value="No">Disabled</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </fieldset>

                                                    <fieldset>
                                                        <div class="form-group">
                                                          <label class="col-sm-2 control-label">Email ID <span class="mandatory_field">*</span></label>
                                                          <div class="col-sm-4">
                                                              <input type="text" name="mpemail" id="mpemail" class="form-control" placeholder="Email ID"  maxlength="30"/>
                                                          </div>
                                                          <label class="col-sm-2 control-label">Alternate Email</label>
                                                          <div class="col-sm-4">
                                                              <input type="text" name="msemail" id="msemail" class="form-control "placeholder="Alternate Email ID" maxlength="30" />
                                                          </div>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset>
                                                        <div class="form-group">
                                                          <label class="col-sm-2 control-label">Mobile Number <span class="mandatory_field">*</span></label>
                                                          <div class="col-sm-4">
                                                              <input type="text" placeholder="Mobile Number" name="mpmobile" id="mpmobile" class="form-control"  maxlength="10">
                                                          </div>

                                                          <label class="col-sm-2 control-label">Alternate Mobile</label>
                                                          <div class="col-sm-4">
                                                              <input type="text" placeholder="Alternate Mobile Number" name="msmobile" id="msmobile" class="form-control" maxlength="10">
                                                          </div>
                                                        </div>
                                                    </fieldset>

                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Occupation</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" name="moccupation" id="moccupation" placeholder="Occupation" class="form-control" value="" maxlength="30">
                                                            </div>
                                                            <label class="col-sm-2 control-label">Income</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" placeholder="Income" name="mincome" id="mincome" class="form-control" maxlength="10">
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Residential Address</label>
                                                            <div class="col-sm-4">
                                                                <textarea name="mhaddress" id="mhaddress" MaxLength="150" placeholder="Maximum 150 characters" class="form-control" rows="4" cols="80"></textarea>
                                                            </div>
															  <label class="col-sm-2 control-label">Office Address</label>
                                                            <div class="col-sm-4">
                                                                <textarea name="moffice_address" id="moffice_address" MaxLength="150" placeholder="Maximum 150 characters" class="form-control" rows="4" cols="80"></textarea>
                                                            </div>
                                                            

                                                        </div>
                                                    </fieldset>


                                                    <fieldset>
                                                        <div class="form-group">
                                                          
															<label class="col-sm-2 control-label">Telephone</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" placeholder="Telephone" name="mhome_phone" id="mhome_phone" class="form-control" maxlength="14">
                                                            </div>
                                                            <label class="col-sm-2 control-label">Office Phone</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" placeholder="Office Phone" name="moffice_phone" class="form-control" maxlength="14">
                                                              <input type="hidden" placeholder="Office Phone" name="mrelationship" class="form-control" value="Mother">
                                                            </div>

                                                        </div>
                                                    </fieldset>
                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Profile Picture</label>
                                                            <div class="col-sm-4">
                                                                <input type="file" name="mother_pic" id="mpic" class="form-control" onchange="loadFile1(event)" accept="image/*">
                                                            </div>
                                                            <label class="col-sm-2 control-label"></label>
                                                            <div class="col-sm-4">
                                                                <img id="output1" class="img-responsive" style="width:110px;">
                                                            </div>
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
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>

                                                <!-- Guardian -->
                                                <div id="guardian" class="tab-pane">

                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Guardian Name <span class="mandatory_field">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" name="gname" id="gname" placeholder="Guardian Name" class="form-control" value="" maxlength="30">
                                                            </div>
                                                            <label class="col-sm-2 control-label">Login Access <span class="mandatory_field">*</span></label>
                                                            <div class="col-sm-4">
                                                                <select name="glogin" id="glogin" class="selectpicker form-control">
                                                                    <option value="Yes">Enabled</option>
                                                                    <option value="No">Disabled</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </fieldset>

                                                    <fieldset>
                                                        <div class="form-group">
                                                          <label class="col-sm-2 control-label">Email ID <span class="mandatory_field">*</span></label>
                                                          <div class="col-sm-4">
                                                              <input type="text" name="gpemail" id="gpemail" class="form-control" placeholder="Email ID"  maxlength="30" />
                                                          </div>
                                                          <label class="col-sm-2 control-label">Alternate Email</label>
                                                          <div class="col-sm-4">
                                                              <input type="text" name="gsemail" class="form-control " id="gsemail" placeholder="Alternate Email ID" maxlength="30" />
                                                          </div>

                                                        </div>
                                                    </fieldset>
                                                    <fieldset>
                                                        <div class="form-group">
                                                          <label class="col-sm-2 control-label">Mobile Number <span class="mandatory_field">*</span></label>
                                                          <div class="col-sm-4">
                                                              <input type="text" placeholder="Mobile Number" name="gpmobile" id="gpmobile" class="form-control" maxlength="10">
                                                          </div>
                                                          <label class="col-sm-2 control-label">Alternate Mobile</label>
                                                          <div class="col-sm-4">
                                                              <input type="text" placeholder="Alternate Mobile Number" name="gsmobile" id="gsmobile" class="form-control" maxlength="10">
                                                          </div>


                                                        </div>
                                                    </fieldset>


                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Occupation</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" name="goccupation" id="goccupation" placeholder="Occupation" class="form-control" value=""  maxlength="30">
                                                            </div>
                                                            <label class="col-sm-2 control-label">Income</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" placeholder="Income" name="gincome" id="gincome" class="form-control" maxlength="10">
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Residential Address</label>
                                                            <div class="col-sm-4">
                                                                <textarea name="ghaddress" id="ghaddress" MaxLength="150" placeholder="Maximum 150 characters" class="form-control" rows="4" cols="80"></textarea>
                                                            </div>
                                                            <label class="col-sm-2 control-label">Office Address</label>
                                                            <div class="col-sm-4">
                                                                <textarea name="goffice_address" id="goffice_address" MaxLength="150" placeholder="Maximum 150 characters" class="form-control" rows="4" cols="80"></textarea>
                                                            </div>
                                                        </div>
                                                    </fieldset>

                                                    <fieldset>
                                                        <div class="form-group">
														<label class="col-sm-2 control-label">Telephone</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" placeholder="Telephone" name="ghome_phone" id="ghome_phone" class="form-control" maxlength="14">
                                                            </div>
                                                            

                                                            <label class="col-sm-2 control-label">Office Phone</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" placeholder="Office Phone" name="goffice_phone" class="form-control" maxlength="14">
                                                                  <input type="hidden" placeholder="Office Phone" name="grelationship" class="form-control" value="Guardian">
                                                            </div>

                                                        </div>
                                                    </fieldset>
                                                    <fieldset>
                                                        <div class="form-group">

                                                            <label class="col-sm-2 control-label">Profile Picture</label>
                                                            <div class="col-sm-4">
                                                                <input type="file" name="guardian_pic" id="gpic" class="form-control" onchange="loadFile2(event)" accept="image/*">
                                                            </div>
                                                            <label class="col-sm-2 control-label"></label>
                                                            <div class="col-sm-4">
                                                                <img id="output2" class="img-responsive" style="width:110px;">
                                                            </div>
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
                                                            </div>


                                                        </div>
                                                    </fieldset>

                                                   
                                                </div>
                                                <!-- Guardian -->
                                            </div>
                                            <fieldset style="background-color: rgba(237, 237, 242, 0.68);padding-top: 18px;">
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">&nbsp;</label>
                                                    <div class="col-sm-4">
														<input type="submit" id="save" class="btn btn-info btn-fill center" value="CREATE">
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                        </div>
                        <!-- Existing-->
                        <div id="company" class="tab-pane">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="content">
                                            <form method="post" action="<?php echo base_url(); ?>parents/search" class="form-horizontal" enctype="multipart/form-data" id="old_parentform" name="old_parentform">
                                                <fieldset>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Mobile Number</label>
                                                        <div class="col-sm-5">
                                                            <input type="hidden" name="admission_no" class="form-control" placeholder="" value="<?php echo $result; ?>">
                                                            <input type="text" required name="cell" placeholder="Parent's number" class="form-control" onblur="checkcellfun(this.value)" value="">
                                                            <p id="msg1"> </p>
                                                        </div>
                                                        <div class="col-sm-4">
															<input type="submit" id="save" class="btn btn-info btn-fill center" value="SEARCH">
                                                        
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- Existing -->

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function validates() { //alert("hi");
     /*    var fname = document.getElementById("fname").value;
        var mname = document.getElementById("mname").value;
        var gname = document.getElementById("gname").value;

        var foccupation = document.getElementById("foccupation").value;
        var moccupation = document.getElementById("moccupation").value;
        var goccupation = document.getElementById("goccupation").value;

        var fincome = document.getElementById("fincome").value;
        var mincome = document.getElementById("mincome").value;
        var gincome = document.getElementById("gincome").value;

        var fhaddress = document.getElementById("fhaddress").value;
        var mhaddress = document.getElementById("mhaddress").value;
        var ghaddress = document.getElementById("ghaddress").value;

        var fstatus = document.getElementById("fstatus").value;
        var mstatus = document.getElementById("mstatus").value;
        var gstatus = document.getElementById("gstatus").value;

        var fpmobile = document.getElementById("fpmobile").value;
        var mpmobile = document.getElementById("mpmobile").value;
        var gpmobile = document.getElementById("gpmobile").value;

        var frelationship = document.getElementById("frelationship").value;
        var mrelationship = document.getElementById("mrelationship").value;
        var grelationship = document.getElementById("grelationship").value;

        var flogin = document.getElementById("flogin").value;
        var mlogin = document.getElementById("mlogin").value;
        var glogin = document.getElementById("glogin").value; */

        // if (fname == "" && mname == "" && gname == "") {
        //     $("#erid").html("Please Enter anyone Name");
        //     return false;
        // }
        // if (foccupation == "" && moccupation == "" && goccupation == "") {
        //     $("#erid").html("Please Enter Occupation");
        //     return false;
        // }
        //
        // if (fpmobile == "" && mpmobile == "" && gpmobile == "") {
        //     $("#erid").html("Please select priority for login");
        //     return false;
        // }
        // if (frelationship == "" && mrelationship == "" && grelationship == "") {
        //     $("#erid").html("Please select Relationship Of Students");
        //     return false;
        // }
        //
        // if (fincome == "" && mincome == "" && gincome == "") {
        //     $("#erid").html("Please Enter Income");
        //     return false;
        // }
        // if (fhaddress == "" && mhaddress == "" && ghaddress == "") {
        //     $("#erid").html("Please select Home Address");
        //     return false;
        // }
        // if (fstatus == "" && mstatus == "" && gstatus == "") {
        //     $("#erid").html("Please select Status");
        //     return false;
        // }
        //
        // if (flogin == "" && mlogin == "" && glogin == "") {
        //     $("#erid").html("Please select priority for login");
        //     return false;
        // }

    }

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
</script>
<script type="text/javascript">
      $(function() {
        $("#choose").change(function() {
            if ($(this).val() == "parents") {
                $("#stuparents").show();
                $("#stuguardian").hide();

            } else {
                $("#stuguardian").show();
                $("#stuparents").hide();
            }
        });
    });

	$.validator.addMethod("alphabetsnspace", function(value, element) {
       return this.optional(element) || /^[a-zA-Z\. ]*$/.test(value);
    });
	
$('#parentform').validate({
        rules: {
            
			fname:{required:true,alphabetsnspace: true }, 
			mname:{required:true,alphabetsnspace: true }, 
			gname:{required:true,alphabetsnspace: true }, 
			//fsmobile:{required:false,maxlength:10,minlength:10,number:true},
			fincome:{required:false,maxlength:10,number:true},
			fhome_phone:{required:false,maxlength:14,minlength:6,number:true},
			foffice_phone:{required:false,maxlength:14,minlength:6,number:true},
			foccupation:{required:false,alphabetsnspace: true }, 
			//msmobile:{required:false,maxlength:10,minlength:10,number:true},
			mincome:{required:false,maxlength:10,number:true},
			mhome_phone:{required:false,maxlength:14,minlength:6,number:true},
			moffice_phone:{required:false,maxlength:14,minlength:6,number:true},
			moccupation:{required:false,alphabetsnspace: true }, 
			//gsmobile:{required:false,maxlength:10,minlength:10,number:true},
			gincome:{required:false,maxlength:10,number:true},
			ghome_phone:{required:false,maxlength:14,minlength:6,number:true},
			goffice_phone:{required:false,maxlength:14,minlength:6,number:true},
			goccupation:{required:false,alphabetsnspace: true }, 
			fpmobile:{required:true,maxlength:10,minlength:10,number:true,
				remote: {
				 url: "<?php echo base_url(); ?>parents/check_fpmobile_number/",
				 type: "post"
				}
			},
			fsmobile:{required:false,maxlength:10,minlength:10,number:true,notEqualTo: "#fpmobile"},
			mpmobile:{required:true,maxlength:10,minlength:10,number:true,
				remote: {
				 url: "<?php echo base_url(); ?>parents/check_mpmobile_number/",
				 type: "post"
				}
			},
			msmobile:{required:false,maxlength:10,minlength:10,number:true,notEqualTo: "#mpmobile"},
			gpmobile:{required:true,maxlength:10,minlength:10,number:true,
				remote: {
				 url: "<?php echo base_url(); ?>parents/check_gpmobile_number/",
				 type: "post"
				}
			},
			gsmobile:{required:false,maxlength:10,minlength:10,number:true, notEqualTo: "#gpmobile"},
			fpemail:{required:true,email:true,
				remote: {
				 url: "<?php echo base_url(); ?>parents/check_fpemail_id/",
				 type: "post"
				}
			},
			fsemail:{required:false, email:true,notEqualTo: "#fpemail"},
			mpemail:{required:true,email:true,
				remote: {
				 url: "<?php echo base_url(); ?>parents/check_mpemail_id/",
				 type: "post"
			  }
			},
			msemail:{required:false, email:true,notEqualTo: "#mpemail"},
			gpemail:{required:true,email:true,
				remote: {
					 url: "<?php echo base_url(); ?>parents/check_gpemail_id/",
					 type: "post"
				  }
				},
			gsemail:{required:false, email:true,notEqualTo: "#gpemail"}
        },
        messages: {
          fname: {
			  required: "This field cannot be empty!",
			  alphabetsnspace: "Please enter only alphabet"
			},
		  mname: {
			  required: "This field cannot be empty!",
			  alphabetsnspace: "Please enter only alphabet"
			},
		  gname: {
			  required: "This field cannot be empty!",
			  alphabetsnspace: "Please enter only alphabet"
			},
          fpmobile:{required:"This field cannot be empty!",remote:"Mobile number already exist"},
		  fsmobile:{notEqualTo : "Please check your mobile"},
          mpmobile:{required:"This field cannot be empty!",remote:"Mobile number already exist"},
		  msmobile:{notEqualTo : "Please check your mobile"},
          gpmobile:{required:"This field cannot be empty!",remote:"Mobile number already exist"},
		  gsmobile:{notEqualTo : "Please check your mobile"},
          fpemail:{required:"This field cannot be empty!",remote:"Email already exist"},
		  fsemail:{notEqualTo : "Please check your email"},
          mpemail:{required:"This field cannot be empty!",remote:"Email already exist"},
		  msemail:{notEqualTo : "Please check your email"},
          gpemail:{required:"This field cannot be empty!",remote:"Email already exist"},
		  gsemail:{notEqualTo : "Please check your email"},
		  foccupation: {
			  alphabetsnspace: "Please enter only alphabet"
			},
		  moccupation: {
			  alphabetsnspace: "Please enter only alphabet"
			},
		  goccupation: {
			  alphabetsnspace: "Please enter only alphabet"
			},
         }
    });
	
    $('#old_parentform').validate({
        rules: {
            cell:{required:true,number:true,maxlength:10,minlength:10,}
        },
        messages: {
			cell:{required:"This field cannot be empty!",maxlength:"Max 10 Digits",minlength:"Min 10 Digits",number:"Only numbers"}
            }
    });


	
</script>
