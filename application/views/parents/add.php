
<div class="main-panel">
    <div class="content">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Parents Details</h4>
                </div>
                <div class="content">
                    <ul role="tablist" class="nav nav-tabs">
                        <li role="presentation" class="active">
                            <a href="#agency" data-toggle="tab">New</a>
                        </li>
                        <li>
                            <a href="#company" data-toggle="tab">Existing</a>
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
                                                        <a href="#father" class="btn btn-info btn-fill" style="border-bottom-color:#976dea;" data-toggle="tab">Father</a>
                                                    </li>
                                                    <li>
                                                        <a href="#mothers" class="btn btn-info btn-fill" style="border-bottom-color:#976dea;" data-toggle="tab">Mother</a>
                                                    </li>
                                                    <li>
                                                        <a href="#guardian" class="btn btn-info btn-fill" style="border-bottom-color:#976dea;" data-toggle="tab">Guardian</a>
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
                                                                <input type="text" name="fname" id="fname" placeholder="Enter Name" class="form-control" value="">
                                                            </div>
                                                            <label class="col-sm-2 control-label">Login <span class="mandatory_field">*</span></label>
                                                            <div class="col-sm-4">
                                                                <select name="flogin" id="flogin" class="selectpicker form-control" data-title="Select Login Priority">
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </fieldset>

                                                    <fieldset>
                                                        <div class="form-group">
                                                          <label class="col-sm-2 control-label">Primary Email <span class="mandatory_field">*</span></label>
                                                          <div class="col-sm-4">
                                                              <input type="text" name="fpemail" id="fpemail" class="form-control" placeholder="Email Address"  />
                                                          </div>
                                                          <label class="col-sm-2 control-label">Secondary Email</label>
                                                          <div class="col-sm-4">
                                                              <input type="text" name="fsemail" class="form-control " id="email" placeholder="Email Address" />
                                                          </div>
                                                        </div>
                                                    </fieldset>


                                                    <fieldset>
                                                        <div class="form-group">
                                                          <label class="col-sm-2 control-label">Primary Mobile <span class="mandatory_field">*</span></label>
                                                          <div class="col-sm-4">
                                                              <input type="text" placeholder="Mobile Number" name="fpmobile" id="fpmobile" class="form-control" >
                                                          </div>
                                                          <label class="col-sm-2 control-label">Secondary Mobile</label>
                                                          <div class="col-sm-4">
                                                              <input type="text" placeholder="Mobile Number" name="fsmobile" class="form-control">
                                                          </div>

                                                        </div>
                                                    </fieldset>

                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Occupation</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" name="foccupation" id="foccupation" placeholder="Occupation" class="form-control" value="">
                                                            </div>
                                                            <label class="col-sm-2 control-label">Income</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" placeholder="Income" name="fincome" id="fincome" class="form-control">
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Home Address</label>
                                                            <div class="col-sm-4">
                                                                <textarea name="fhaddress" id="fhaddress" MaxLength="150" placeholder="MaxCharacters 150" class="form-control" rows="4" cols="80"></textarea>
                                                            </div>
                                                            <label class="col-sm-2 control-label">Home Phone</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" placeholder="Home Phone" name="fhome_phone" id="fhome_phone" class="form-control">
                                                            </div>

                                                        </div>
                                                    </fieldset>

                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Office Address</label>
                                                            <div class="col-sm-4">
                                                                <textarea name="foffice_address" id="foffice_address" MaxLength="150" placeholder="MaxCharacters 150" class="form-control" rows="4" cols="80"></textarea>
                                                            </div>

                                                            <label class="col-sm-2 control-label">Office Phone</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" placeholder="Office Phone" name="foffice_phone" class="form-control">
                                                                  <input type="hidden" placeholder="Office Phone" name="frelationship" class="form-control" value="Father">
                                                            </div>

                                                        </div>
                                                    </fieldset>
                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Father Pic</label>
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
                                                                    <option value="Deactive">Deactive</option>
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
                                                                <input type="text" name="mname" id="mname" placeholder="Enter Name" class="form-control" value="">
                                                            </div>
                                                            <label class="col-sm-2 control-label">Login <span class="mandatory_field">*</span></label>
                                                            <div class="col-sm-4">
                                                                <select name="mlogin" id="mlogin" class="selectpicker form-control" data-title="Select Login Priority">
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </fieldset>

                                                    <fieldset>
                                                        <div class="form-group">
                                                          <label class="col-sm-2 control-label">Primary Email <span class="mandatory_field">*</span></label>
                                                          <div class="col-sm-4">
                                                              <input type="text" name="mpemail" id="mpemail" class="form-control" placeholder="Email Address" />
                                                          </div>
                                                          <label class="col-sm-2 control-label">Secondary Email</label>
                                                          <div class="col-sm-4">
                                                              <input type="text" name="msemail" class="form-control " id="email" placeholder="Email Address" />
                                                          </div>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset>
                                                        <div class="form-group">
                                                          <label class="col-sm-2 control-label">Primary Mobile <span class="mandatory_field">*</span></label>
                                                          <div class="col-sm-4">
                                                              <input type="text" placeholder="Mobile Number" name="mpmobile" id="mpmobile" class="form-control" >
                                                          </div>

                                                          <label class="col-sm-2 control-label">Secondary Mobile</label>
                                                          <div class="col-sm-4">
                                                              <input type="text" placeholder="Mobile Number" name="msmobile" class="form-control">
                                                          </div>
                                                        </div>
                                                    </fieldset>

                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Occupation</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" name="moccupation" id="moccupation" placeholder="Occupation" class="form-control" value="">
                                                            </div>
                                                            <label class="col-sm-2 control-label">Income</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" placeholder="Income" name="mincome" id="mincome" class="form-control">
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Home Address</label>
                                                            <div class="col-sm-4">
                                                                <textarea name="mhaddress" id="mhaddress" MaxLength="150" placeholder="MaxCharacters 150" class="form-control" rows="4" cols="80"></textarea>
                                                            </div>
                                                            <label class="col-sm-2 control-label">Home Phone</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" placeholder="Home Phone" name="mhome_phone" id="mhome_phone" class="form-control">
                                                            </div>

                                                        </div>
                                                    </fieldset>


                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Office Address</label>
                                                            <div class="col-sm-4">
                                                                <textarea name="moffice_address" id="moffice_address" MaxLength="150" placeholder="MaxCharacters 150" class="form-control" rows="4" cols="80"></textarea>
                                                            </div>

                                                            <label class="col-sm-2 control-label">Office Phone</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" placeholder="Office Phone" name="moffice_phone" class="form-control">
                                                              <input type="hidden" placeholder="Office Phone" name="mrelationship" class="form-control" value="Mother">
                                                            </div>

                                                        </div>
                                                    </fieldset>
                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Mother Pic</label>
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
                                                                    <option value="Deactive">DeActive</option>
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
                                                                <input type="text" name="gname" id="gname" placeholder="Enter Name" class="form-control" value="">
                                                            </div>
                                                            <label class="col-sm-2 control-label">Login <span class="mandatory_field">*</span></label>
                                                            <div class="col-sm-4">
                                                                <select name="glogin" id="glogin" class="selectpicker form-control" data-title="Select Login Priority">
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </fieldset>

                                                    <fieldset>
                                                        <div class="form-group">
                                                          <label class="col-sm-2 control-label">Primary Email <span class="mandatory_field">*</span></label>
                                                          <div class="col-sm-4">
                                                              <input type="text" name="gpemail" id="gpemail" class="form-control" placeholder="Email Address"  />
                                                          </div>
                                                          <label class="col-sm-2 control-label">Secondary Email</label>
                                                          <div class="col-sm-4">
                                                              <input type="text" name="gsemail" class="form-control " id="email" placeholder="Email Address" />
                                                          </div>

                                                        </div>
                                                    </fieldset>
                                                    <fieldset>
                                                        <div class="form-group">
                                                          <label class="col-sm-2 control-label">Primary Mobile <span class="mandatory_field">*</span></label>
                                                          <div class="col-sm-4">
                                                              <input type="text" placeholder="Mobile Number" name="gpmobile" id="gpmobile" class="form-control">
                                                          </div>
                                                          <label class="col-sm-2 control-label">Secondary Mobile</label>
                                                          <div class="col-sm-4">
                                                              <input type="text" placeholder="Mobile Number" name="gsmobile" class="form-control">
                                                          </div>


                                                        </div>
                                                    </fieldset>


                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Occupation</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" name="goccupation" id="goccupation" placeholder="Occupation" class="form-control" value="">
                                                            </div>
                                                            <label class="col-sm-2 control-label">Income</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" placeholder="Income" name="gincome" id="gincome" class="form-control">
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Home Address</label>
                                                            <div class="col-sm-4">
                                                                <textarea name="ghaddress" id="ghaddress" MaxLength="150" placeholder="MaxCharacters 150" class="form-control" rows="4" cols="80"></textarea>
                                                            </div>
                                                            <label class="col-sm-2 control-label">Home Phone</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" placeholder="Home Phone" name="ghome_phone" id="ghome_phone" class="form-control">
                                                            </div>
                                                        </div>
                                                    </fieldset>

                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Office Address</label>
                                                            <div class="col-sm-4">
                                                                <textarea name="goffice_address" id="goffice_address" MaxLength="150" placeholder="MaxCharacters 150" class="form-control" rows="4" cols="80"></textarea>
                                                            </div>

                                                            <label class="col-sm-2 control-label">Office Phone</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" placeholder="Office Phone" name="goffice_phone" class="form-control">
                                                                  <input type="hidden" placeholder="Office Phone" name="grelationship" class="form-control" value="Guardian">
                                                            </div>

                                                        </div>
                                                    </fieldset>
                                                    <fieldset>
                                                        <div class="form-group">

                                                            <label class="col-sm-2 control-label">Guardian Pic</label>
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
                                                                    <option value="Deactive">DeActive</option>
                                                                </select>
                                                            </div>


                                                        </div>
                                                    </fieldset>

                                                    <fieldset>
                                                        <div class="form-group">

                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <!-- Guardian -->
                                            </div>
                                            <fieldset style="background-color: rgba(237, 237, 242, 0.68);padding-top: 18px;">
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">&nbsp;</label>
                                                    <div class="col-sm-4">
                                                        <button type="submit" id="save1" class="btn btn-info btn-fill center">Submit</button>
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
                                            <form method="post" action="<?php echo base_url(); ?>parents/search" class="form-horizontal" enctype="multipart/form-data" id="parentform">
                                                <fieldset>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Mobile</label>
                                                        <div class="col-sm-4">
                                                            <input type="hidden" name="admission_no" class="form-control" placeholder="" value="<?php echo $result; ?>">
                                                            <input type="text" required name="cell" placeholder="Enter Your Mobile Number" class="form-control" onblur="checkcellfun(this.value)" value="">
                                                            <p id="msg1"> </p>
                                                        </div>
                                                        <label class="col-sm-2 control-label">&nbsp;</label>
                                                        <div class="col-sm-4">
                                                            <button type="submit" id="save" class="btn btn-info btn-fill center">Search </button>
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
        var fname = document.getElementById("fname").value;
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
        var glogin = document.getElementById("glogin").value;

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


    $('#parentform').validate({
        rules: {
            fname:{required:true},
            mname:{required:true},
            gname:{required:true},
            fpmobile:{required:true,maxlength:10,minlength:10,number:true,
              remote: {
                     url: "<?php echo base_url(); ?>parents/check_fpmobile_number/",
                     type: "post"
                  }
                },
            mpmobile:{required:true,maxlength:10,minlength:10,
              remote: {
                     url: "<?php echo base_url(); ?>parents/check_mpmobile_number/",
                     type: "post"
                  }
                },
            gpmobile:{required:true,maxlength:10,minlength:10,
              remote: {
                     url: "<?php echo base_url(); ?>parents/check_gpmobile_number/",
                     type: "post"
                  }
                },
            fpemail:{required:true,email:true,
            remote: {
                     url: "<?php echo base_url(); ?>parents/check_fpemail_id/",
                     type: "post"
                  }
                },
                mpemail:{required:true,email:true,
                remote: {
                         url: "<?php echo base_url(); ?>parents/check_mpemail_id/",
                         type: "post"
                      }
                    },
                    gpemail:{required:true,email:true,
                    remote: {
                             url: "<?php echo base_url(); ?>parents/check_gpemail_id/",
                             type: "post"
                          }
                        }

        },
        messages: {
          fname:{required:"Enter the father name"},
          mname:{required:"Enter the mother name"},
          gname:{required:"Enter the Guardian name"},
          fpmobile:{required:"Enter the mobile number",maxlength:"Max 10 Digits",minlength:"Min 10 Digits",number:"Only numbers",remote:"Mobile Number Already Exist"},
          mpmobile:{required:"Enter the mobile number",maxlength:"Max 10 Digits",minlength:"Min 10 Digits",number:"Only numbers",remote:"Mobile Number Already Exist"},
          gpmobile:{required:"Enter the mobile number",maxlength:"Max 10 Digits",minlength:"Min 10 Digits",number:"Only numbers",remote:"Mobile Number Already Exist"},
          fpemail:{required:"Enter Email Address",remote:"Email Already Exist"},
          mpemail:{required:"Enter Email Address",remote:"Email Already Exist"},
          gpemail:{required:"Enter Email Address",remote:"Email Already Exist"}

            }
    });

</script>
