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
                    <h4 class="title">Parents Details
                      <button style="float: right;" onclick="history.go(-1);" class="btn btn-wd btn-default">Go Back</button></h4>
                </div>
                <br>
                <?php if($this->session->flashdata('msg')): ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            ×</button>
                        <?php echo $this->session->flashdata('msg'); ?>
                    </div>
                    <?php endif; ?>


                          <?php
                          if(empty($editres)){
                            echo "No result found";
                          }else{
                            foreach($editres as $rows){} ?>
                              <div class="content">
                                <form method="post" action="<?php echo base_url(); ?>parents/update_exiting_parents_assign" class="form-horizontal" enctype="multipart/form-data" id="parentform">

                                    <input type="hidden" name="admission_id" id="admission_id" class="form-control" value="<?php echo $ad_id;?>">
                                      <input type="hidden" name="id" id="id" class="form-control" value="<?php echo $rows->id;?>">
                                      <input type="hidden" name="parnt_guardn_id" id="parnt_guardn_id" class="form-control" value="<?php echo $rows->admission_id;?>,<?php echo $ad_id;?>">


                                                <fieldset>
                                                    <div class="form-group">
                                                    <label class="col-sm-2 control-label">Relationship</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="relationship" id="relationship" class="form-control" value="<?php echo $rows->relationship;?>" readonly>
                                                    </div>


                                                      <label class="col-sm-2 control-label">Name</label>
                                                      <div class="col-sm-4">
                                                          <input type="text" name="name" placeholder="Enter Name" class="form-control" value="<?php echo $rows->name;?>" readonly>
                                                      </div>

                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="form-group">
                                                      <label class="col-sm-2 control-label">Primary Email</label>
                                                      <div class="col-sm-4">
                                                          <input type="text" name="pemail" id="pemail" class="form-control" placeholder="Email Address" value="<?php echo $rows->email;?>" readonly />
                                                      </div>
                                                      <label class="col-sm-2 control-label">Primary Mobile</label>
                                                      <div class="col-sm-4">
                                                          <input type="text" placeholder="Mobile Number" name="pmobile" maxlength="10" class="form-control" value="<?php echo $rows->mobile;?>" readonly>
                                                      </div>

                                                    </div>
                                                </fieldset>

                                                <fieldset>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Occupation</label>
                                                        <div class="col-sm-4">
                                                            <input type="text" name="occupation" placeholder="Occupation" class="form-control" value="<?php echo $rows->occupation;?>" readonly >
                                                        </div>
                                                        <label class="col-sm-2 control-label">Income</label>
                                                        <div class="col-sm-4">
                                                            <input type="text" placeholder="Income" name="income" class="form-control" value="<?php echo $rows->income;?>" readonly>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Address</label>
                                                        <div class="col-sm-4">
                                                            <textarea readonly rows="5" class="form-control"><?php echo $rows->home_address;?></textarea>
                                                        </div>

                                                    </div>
                                                </fieldset>



                                                <fieldset>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">&nbsp;</label>
                                                        <div class="col-sm-4">
                                                            <button type="submit" id="save" class="btn btn-info btn-fill center">Assign Here</button>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                </form>
                                  </div>
                        <?php  } ?>


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
                pemail:{required:true,email:true
                      },
                //home_phone:{required:true },
                //office_phone:{required:true },
                pmobile: {
                    required: true,maxlength:10,minlength:10,number:true
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
                admission_no: "Enter Admission No",
                name: "Enter Name",
                occupation: "Enter Occupation",
                income: "Enter Income",
                haddress: "Enter Home Address",
                //office_address: "Enter Office Address",
                pemail: {
                  required:"Enter Primary Email Address",
                  remote:"Email id Already exist"
                },
                //home_phone: "Enter the Home Phone",
                //office_phone:"Enter the Office Phone",
                relationship:{
                  required: "Select the relationship"

                },
                community_class: "Enter the Community Class",
                pmobile: {
                  required:"Enter The Primary Mobile Number",
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


  $('#admissionmenu').addClass('collapse in');
  $('#admission').addClass('active');
  $('#admission2').addClass('active');

</script>
