<div class="main-panel">
<div class="content">
       <div class="container-fluid">
         <div class="col-md-8">
				<?php  if($status=="success"){ ?>
                   <div class="card">
                       <div class="header"> Students</div>
                       <?php
                        if(empty($res)){   ?>
                           <p class="text-center" style="margin-top:20px;">No Record Found</p> <style>#submit{display: none;}</style>
                      <?php }else{ ?>
                     <div class="fresh-datatables">
                         <form action="" method="post" enctype="multipart/form-data" id="take_attendance">
                           <input type="hidden" name="a_period" value="<?php echo $session_id; ?>">
                            <input type="hidden" name="abs_date" value="<?php echo $abs_date; ?>">
                           <table class="table table-striped">
                               <thead>
                                   <tr>
                                       <th>S.No</th>
                                       <th>Name</th>
                                       <th>Status</th>
                                   </tr>
                               </thead>
                               <tbody>
                                 <?php  $i=1;
                                 foreach($res as $rows){
                                    ?>
                                   <tr>
                                       <td><?php echo $i;  ?></td>
										<input type="hidden" name="student_count" value="<?php echo count($res); ?>">
                                        <td ><?php echo $rows->name;  ?>
                                         <input type="hidden" name="enroll_id[]" value="<?php echo $rows->enroll_id; ?>">
                                         <input type="hidden" name="class_id" value="<?php echo $class_id; ?>">
                                       </td>
                                       <td>
                                         <select name="attendence_val[]">
                                         <option value="P">Present</option>
                                        <option value="A">Absent</option>
                                        <option value="L">Leave</option>
                                        <option value="OD">On Duty</option>
                                       </select>
                                       </td>

                                   </tr>

                            <?php
                            $i++; } }

                            ?>

                               </tbody>

                           </table>
                          <button type="button" class="btn btn-warning btn-fill btn-wd pull-right"  id="submit" style="margin-top:20px;" onclick="submitAttendence()">SUBMIT</button>
                         </form>

                       </div>
                   </div>
                   <?php  } else{  ?>
                     <div class="card-header" data-background-color="purple">
	                        <h4 class="title">Sorry</h4>
	                        <p class="category"><?php echo $status; ?> </p>
	                    </div>

                  <button onclick="history.go(-1);" class="btn btn-wd btn-default pull-right" style="margin-top:-10px;">Go Back</button>
                  <?php  } ?>


               </div>
            </div>
        </div>
     </div>


<script type="text/javascript">
$('#attend').addClass('collapse in');
$('#attendance').addClass('active');
$('#attend1').addClass('active');

function submitAttendence(){
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
           url: "<?php echo base_url(); ?>adminattendance/update_attendance_admin",
            type:'POST',
           data: $('#take_attendance').serialize(),
           success: function(response) {

               if(response=="success"){
                //  swal("Success!", "Thanks for Your Note!", "success");
                  $('#take_attendance')[0].reset();
                  swal({
           title: "Success!",
           text: "Attendance saved",
           type: "success"
       }, function() {
           window.location = "<?php echo base_url(); ?>adminattendance/home";
       });
               }else{
                 sweetAlert("Oops...", response, "error");
               }
           }
       });
     }else{
         swal("Cancelled", "Process Cancel :)", "error");
     }
   });


}
</script>
