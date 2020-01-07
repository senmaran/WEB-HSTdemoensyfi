<div class="main-panel">
   <div class="content">
      <div class="container-fluid">
         <div class="col-md-8">

               <div class="card">
                  <div class="content">
						<div class="header">  
						<h4 class="title"> Edit Attendance for <?php foreach($get_name_class as $rows){} echo $rows->class_name; echo "-";echo $rows->sec_name;  ?>
							<button onclick="history.go(-1);" class="btn btn-wd btn-default pull-right" >BACK</button>  </h4>
						</div>
                     <hr>
                     <div class="fresh-datatables">
                       <form action="" method="post" enctype="multipart/form-data" name="attendanceform" id="update_attendance">
                         <input type="hidden" name="attend_id" value="<?php echo $attend_id; ?>">
                        <table id="bootstrap-table" class="table table-striped">
                           <thead>
                              <th data-field="id">S.No</th>
                              <th data-field="date" >Name</th>
                              <th data-field="year">Status </th>
                              <th data-field="Status">Edit Status</th>
                           </thead>
                           <tbody>
                              <?php
                                 $i=1;
                                 foreach ($result as $rows) {

                                 ?>
                              <tr>
                                 <td><?php echo $i;  ?></td>
                                 <td><?php echo $rows->name; ?></td>
                                 <td><?php $stat=$rows->a_status;
                                    if($stat=="OD"){ ?>
                                    <button class="btn btn-info btn-fill btn-wd">OD</button>
                                    <?php }else if($stat=="A"){ ?>
                                    <button class="btn btn-danger btn-fill btn-wd">ABSENT</button>
                                    <?php }
                                       else if($stat=="L"){ ?>
                                    <button class="btn btn-warning btn-fill btn-wd">LEAVE</button>
                                    <?php }
                                       else{  ?>
                                    <button class="btn btn-success btn-fill btn-wd">PRESENT</button>
                                    <?php  }
                                       ?>
                                 </td>

                                   <td>
                                     <select name="attendence_val[]">
                                     <option value="P" <?php if($stat=="P") echo 'selected="selected"'; ?>>Present</option>
                                    <option value="A"  <?php if($stat=="A") echo 'selected="selected"'; ?>>Absent</option>
                                    <option value="L" <?php if($stat=="L") echo 'selected="selected"'; ?>>Leave</option>
                                    <option value="OD" <?php if($stat=="OD") echo 'selected="selected"'; ?>>On Duty</option>
                                   </select>
                                   <input type="hidden" name="enroll_id[]" value="<?php echo $rows->enroll_id; ?>">
                                   <input type="hidden" name="class_id" value="<?php  echo $class_id;; ?>">
                                   		<!-- <script language="JavaScript">document.attendanceform.attendence_val.value="<?php echo $stat; ?>";</script> -->
                                   </td>


                              </tr>
                              <?php $i++;  }  ?>
                           </tbody>

                        </table>
                        <button type="button"   class="btn btn-warning btn-fill btn-wd pull-right"  id="submit" style="margin-top:20px;" onclick="submitAttendence()">SAVE</button>
                      </form>
                     </div>
                  </div>
                  <!-- end content-->
               </div>
               <!--  end card  -->
               </tbody>
               </table>
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
                    url: "<?php echo base_url(); ?>adminattendance/update_attendance",
                     type:'POST',
                    data: $('#update_attendance').serialize(),
                    success: function(response) {

                        if(response=="success"){
                         //  swal("Success!", "Thanks for Your Note!", "success");
                           $('#update_attendance')[0].reset();
                           swal({
                    title: "Done!",
                    text: "Changes made are saved",
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
