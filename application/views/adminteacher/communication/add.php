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
              <legend>Leave Application</legend>
            </div>
            <div class="content">
              <form method="post" action="" class="form-horizontal" enctype="multipart/form-data" id="myformsection">
               
			   <fieldset>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Type of Leave</label>
                    <div class="col-sm-4">
                      <select class="selectpicker form-control" data-title="Select Type Of Leave" name="leave_type" id="choose" onChange="changefunction()">
                        <?php foreach($leave as $row){?>
                        <option value="<?php echo $row->leave_type; ?>-<?php echo $row->id; ?>">
                        <?php  echo $row->leave_title; ?>
                        </option>
                        <?php } ?>
                      </select>
                    </div>
					
					<div id="permissiontime" style="display: none;" class="form-group col-sm-6">
						  <label class="col-sm-3 control-label">Time</label>
						   <div class="col-sm-3 clockpicker" >
								<input type="text" name="stime" id="stime" required class="form-control"/>
							</div>
							<div class="col-sm-3 clockpicker" >
								<input type="text" name="etime" id="etime" required class="form-control"/>
							</div>
					</div>
					</div>
        
                </fieldset>
				
				<fieldset>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">From Date</label>
                    <div class="col-sm-4">
                      <input type="text" name="leave_date" class="form-control datepicker" placeholder="Enter Date" >
                    </div>
					<div class="col-sm-6"></div>

                  </div>
                </fieldset>
				
                

                <fieldset>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">To Date</label>
                    <div class="col-sm-4">
                      <input type="text" name="to_leave_date" class="form-control datepicker" placeholder="Enter Date" >
                    </div>
                    <div class="col-sm-6"></div>

                  </div>
                </fieldset>


                <fieldset>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Leave Description</label>
                    <div class="col-sm-4">
                      <textarea name="leave_description" MaxLength="300" placeholder="MaxCharacters 300" class="form-control"  rows="4" cols="80"></textarea>
                    </div>
					<div class="col-sm-6"></div>
                  </div>
                </fieldset>

                <fieldset>
                  <div class="form-group">
                    <!-- <label class="col-sm-2 control-label">&nbsp;</label> -->
                    <div class="text-center">
                      <button type="submit" id="save" class="btn btn-info btn-fill center">Save</button>
                    </div>
                  </div>
                </fieldset>


              </form>
            </div>
          </div>
        </div>
      </div>
	  
      <?php if($this->session->flashdata('msg')): ?>
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> ×</button>
        <?php echo $this->session->flashdata('msg'); ?> </div>
      <?php endif; ?>
	  
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="content">
              <h4 class="title">List of Leave Applied</h4><hr>
              <div class="fresh-datatables">
                <table id="bootstrap-table" class="table">
                  <thead>
                  <th>S.no</th>
                    <th>Leave Type</th>
                    <th>From Leave Date</th>
                    <th>To Leave Date</th>
                    <th>Leave Description</th>
                    <th>Status</th>
                    <th></th>
                    </thead>
                  <tbody>
                    <?php
                     $i=1;
						 foreach($result as $rows)
						 { 
							$status=$rows->status;
							$type=$rows->type_leave;
							$tleave_date = $rows->to_leave_date;
                    ?>
                    <tr>
                      <td><?php   echo $i; ?></td>
                      <td><?php echo $rows->leave_title; /* if($type==0)
									 {echo "Permission";}else{echo"Leave";} */?></td>
                      <td><?php $date=date_create($rows->from_leave_date); echo date_format($date,"d-m-Y");
						if($type==0){
                        echo $rows->frm_time;  echo $rows->to_time; 
                       }?></td>
                      <td><?php if ($tleave_date!="") { $date= date_create($rows->to_leave_date); echo date_format($date,"d-m-Y"); }?></td>
                      <td><?php echo $rows->leave_description; ?></td>
                      <td><?php if($status=='Pending'){ ?>
                        <button class="btn btn-warning btn-fill btn-wd" style="background-color:#E8BE1F;">Pending</button>
                        <?php }elseif($status=='Rejected'){?>
                        <button class="btn btn-danger btn-fill btn-wd" >Reject</button>
                        <?php }else{ ?>
                        <button class="btn btn-success btn-fill btn-wd">Approval</button>
                        <?php }?></td>
                      <td><!-- <a href="<?php echo base_url();?>teachercommunication/edit/<?php echo $rows->leave_id; ?>" title="Edit Details" rel="tooltip" class="btn btn-simple btn-warning btn-icon edit"><i class="fa fa-edit" aria-hidden="true"></i> --></td>
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
    </div>
  </div>
</div>
<script type="text/javascript">
  function changefunction()
  {
	   var a=document.getElementById('choose').value ;
	   var numbers = a.split('-',true);
	   if (numbers==0) {
			$("#permissiontime").show();
		} else {
	   $("#permissiontime").hide();
		}
  }

$(document).ready(function () {

    $('#myformsection').validate({ // initialize the plugin
       rules: {
         leave_type:{required:true },
   		 leave_date:{required:true },
   		 leave_description:{required:true },
        },
        messages: {
              leave_type:"Please choose an option!",
              leave_date:"This field cannot be empty!",
              leave_description:"This field cannot be empty!",
            },

		submitHandler: function(form) {
	        swal({
	                      title: "Are you sure?",
	                      text: "You Want Confirm this form",
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
					   url: "<?php echo base_url(); ?>teachercommunication/create",
						type:'POST',
					   data: $('#myformsection').serialize(),
					   success: function(response) {
						   alert(response);
						   if(response=="success"){
							//  swal("Success!", "Thanks for Your Note!", "success");
							  $('#myformsection')[0].reset();
							  swal({
					   title: "Success!",
					   text: "Leave Application Submited!",
					   type: "success"
				   }, function() {
					   window.location = "<?php echo base_url(); ?>teachercommunication/home";
				   });
						   }else if(response=="exist"){
							   sweetAlert("Oops...", "Leave Date Already Exist", "error");
						   }else{
							 sweetAlert("Oops...", "Something went wrong!", "error");
						   }
					   }
				   });
				 }else{
					 swal("Cancelled", "Process Cancel :)", "error");
				 }
			   });
		}
	});

});


	$('#bootstrap-table').DataTable();
   
	$('#stime').clockpicker({ placement: 'top', align: 'left', donetext: 'Done',twelvehour: true});
	$('#etime').clockpicker({ placement: 'top', align: 'left', donetext: 'Done',twelvehour: true});
</script>
