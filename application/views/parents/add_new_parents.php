<style>
#msg{
  color: red;
  font-size: 14px;
}
</style>
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

                                <form method="post" action="<?php echo base_url(); ?>parents/create_new_parents" class="form-horizontal" enctype="multipart/form-data" id="parentform">

                                    <input type="hidden" name="admission_id" id="stuid" class="form-control" value="<?php echo $aid;?>">
                                    <?php if($eid==0){
					                                 foreach($alldetails as $all) {}  $asid=$all->admission_id;?>
                                        <input type="hidden" name="insertadmission_no" class="form-control" value="<?php echo $asid;?>">
                                        <?php }else{?>
                                            <input type="hidden" name="insertadmission_no" class="form-control" value="<?php echo $eid;?>,<?php echo $aid;?>">
                                            <?php }?>
                                                <fieldset>
                                                    <div class="form-group">

                                                        <label class="col-sm-2 control-label">Relationship</label>
                                                        <!-- <?php print_r($relation); ?> -->
                                                        <div class="col-sm-4">
                                        <?php foreach($relation as $rows_relation){

                                       } ?>

                                       <span id="msg"></span>
                              <select name="relationship" id="relationship" class="selectpicker form-control" onchange="checkrelationfun(this)"/>
                              <option value="">--Select--</option>
                              <option value="Father">Father</option>
                              <option value="Mother">Mother</option>
                              <option value="Guardian">Guardian</option>
                              </select>

                                                        </div>


                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="form-group">
                                                      <label class="col-sm-2 control-label">Name</label>
                                                      <div class="col-sm-4">
                                                          <input type="text" name="name" placeholder="Enter Name" class="form-control" value="">
                                                      </div>
                                                      <label class="col-sm-2 control-label">Login Access</label>
                                                      <div class="col-sm-4">
                                                          <select name="priority" class="selectpicker form-control">
                                                              <option value="Yes">Need</option>
                                                              <option value="No">No Need</option>
                                                          </select>
                                                      </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="form-group">
                                                      <label class="col-sm-2 control-label">Email ID</label>
                                                      <div class="col-sm-4">
                                                          <input type="text" name="pemail" id="pemail" class="form-control" placeholder="Email ID"  />
                                                      </div>
                                                      <label class="col-sm-2 control-label">Alternate Email ID</label>
                                                      <div class="col-sm-4">
                                                          <input type="text" name="semail" class="form-control " id="email" placeholder="Secondary Email ID" />
                                                      </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Mobile Number</label>
                                                        <div class="col-sm-4">
                                                            <input type="text" placeholder="Mobile Number" name="pmobile" maxlength="10" class="form-control">
                                                        </div>
                                                        <label class="col-sm-2 control-label"> Alternate Mobile Number</label>
                                                        <div class="col-sm-4">
                                                            <input type="text" placeholder="Mobile Number" pattern="[1-9]{1}[0-9]{9}" maxlength="10" name="smobile" class="form-control">
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Occupation</label>
                                                        <div class="col-sm-4">
                                                            <input type="text" name="occupation" placeholder="Occupation" class="form-control" value="">
                                                        </div>
                                                        <label class="col-sm-2 control-label">Income</label>
                                                        <div class="col-sm-4">
                                                            <input type="text" placeholder="Income" name="income" class="form-control">
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Residential Address</label>
                                                        <div class="col-sm-4">
                                                            <textarea name="haddress" MaxLength="150" placeholder="MaxCharacters 150" class="form-control" rows="4" cols="80"></textarea>
                                                        </div>
                                                        <label class="col-sm-2 control-label">Office Address</label>
                                                        <div class="col-sm-4">
                                                            <textarea name="office_address" MaxLength="150" placeholder="MaxCharacters 150" class="form-control" rows="4" cols="80"></textarea>
                                                        </div>

                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="form-group">
                                                      <label class="col-sm-2 control-label">Telephone</label>
                                                      <div class="col-sm-4">
                                                          <input type="text" placeholder="Telephone" name="home_phone" class="form-control">
                                                      </div>
                                                        <label class="col-sm-2 control-label">Office Phone</label>
                                                        <div class="col-sm-4">
                                                            <input type="text" placeholder="Office Phone" name="office_phone" class="form-control">
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="form-group">

                                                        <label class="col-sm-2 control-label">Profile Picture</label>
                                                        <div class="col-sm-4">
                                                            <input type="file" name="parents_picture" id="pic" class="form-control" onchange="loadFile(event)" accept="image/*">
                                                        </div>
                                                        <label class="col-sm-2 control-label"></label>
                                                        <div class="col-sm-4">
                                                            <img id="output" class="img-circle" style="width:110px;">
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Status</label>
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
                                                        <label class="col-sm-2 control-label">&nbsp;</label>
                                                        <div class="col-sm-4">
                                                            <button type="submit" id="save" class="btn btn-info btn-fill center">SUBMIT</button>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                </form>
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
    $(document).ready(function() {

        $('#parentform').validate({ // initialize the plugin
            rules: {
                admission_no: {
                    required: true,
                    number: true
                },
                name: {
                    required: true
                },
                occupation: {
                    required: false
                },
                income: {
                    required: false
                },
                haddress: {
                    required: false
                },
                //office_address:{required:true},
                pemail:{required:true,email:true,
                  remote: {
                           url: "<?php echo base_url(); ?>parents/check_pemail_id/",
                           type: "post"
                        }
                      },
                //home_phone:{required:true },
                //office_phone:{required:true },
                pmobile: {
                    required: true,maxlength:10,minlength:10,number:true,
                    remote: {
                             url: "<?php echo base_url(); ?>parents/check_pmobile_number/",
                             type: "post"
                          }
                },
                relationship:{
                  required: true
                },
                status: {
                    required: true
                },
                priority: {
                    required: true
                },
            },
            messages: {
                admission_no: "This field cannot be empty!",
                name: "This field cannot be empty!",
                occupation: "This field cannot be empty!",
                income: "This field cannot be empty!",
                haddress: "This field cannot be empty!",
                //office_address: "Enter Office Address",
                pemail: {
                  required:"This field cannot be empty!",
                  remote:"Email id Already exist"
                },
                //home_phone: "Enter the Home Phone",
                //office_phone:"Enter the Office Phone",
                relationship:{
                  required: "Please choose an option!"

                },
                community_class: "Enter the Community Class",
                pmobile: {
                  required:"This field cannot be empty!",
                  remote:"Mobile Number Already exist"
                },
                status: "Select Status",
                priority: "Select Priority"
            }
        });
    });
</script>
<script type="text/javascript">
    function checkrelationfun() {
        var val=$('#relationship').val();

        var sid = document.getElementById('stuid').value;
        $.ajax({
            type: 'post',
            url: '<?php echo base_url(); ?>/parents/checkrelation',
            data: 'relation=' + val + '&aid=' + sid,
            success: function(test) {
                if (test == "Relation already Added") {
                    $("#msg").html(test);

                } else {
                    $("#msg").html(test);

                }

            }
        });
    }




</script>
