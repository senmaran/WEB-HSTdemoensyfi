<style>
   .tablwidth{
   margin-right: 16px;
   border:1px solid grey;
   }
   .table{
     border:2px solid #212f35;
   }
   .table > thead > tr > th{
     color: #000;
   }
   .box{
     background-color: #cc521d;
   }
   .period{
     background-color: #cecfcf;
   }
   .btn-day{
     margin-bottom: 10px;
     margin-top: 10px;
   }
</style>
<div class="main-panel">
   <div class="content">
      <div class="col-md-12">
         <?php if($this->session->flashdata('msg')): ?>
         <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            ×</button> <?php echo $this->session->flashdata('msg'); ?>
         </div>
         <?php endif; ?>
      </div>


      <div class="card">
        <div class="header">
           <legend>Teachers' Weekly Schedule <button onclick="history.go(-1);" class="btn btn-wd btn-default pull-right" style="margin-top:-10px;">BACK</button> </legend>
        </div>
      <div class="content">
         <div class="row">
            <div class="col-md-12">
              <div class="col-md-4">
                <center><span class="btn btn-primary btn-day">Monday</span></center>
                <table id="" class="table" >
                   <thead>
                      <th data-field="Monday" class="text-center" data-sortable="true">Class</th>
                      <th data-field="Monday" class="text-center" data-sortable="true">Timing</th>
                      <th data-field="Monday" class="text-center" data-sortable="true">Subject</th>
                   </thead>
                   <tbody>
                      <?php
                      $i=1;
                         foreach($restime as $rows){
                           $day=$rows->day_id;
                           //echo $day;
                           if($day=="1"){
                             if($rows->is_break==1){
                               echo "<tr class='box'  style='color:#fff;'>";
                             } else{ ?>
                               <tr class="period">
                           <?php  }?>


                         <td>  <?php echo $rows->class_name; ?>&nbsp; - &nbsp;<?php echo $rows->sec_name; ?>  </td>
                         <td>  <?php echo  date("g:i a", strtotime($rows->from_time)).'-'.date("g:i a", strtotime($rows->to_time));  ?></td>
                         <td>
                           <?php if($rows->is_break==1){
                           echo "Break";
                         } else{ ?>
                     <?php    echo $rows->subject_name; ?>
    <a href="#myModal" data-toggle="modal" data-target="#myModal" data-class-id="<?php echo $rows->class_id; ?>"
      data-from-id="<?php echo $rows->from_time; ?>" data-to-id="<?php echo $rows->to_time; ?>"
      data-subject-id-id="<?php echo $rows->subject_id; ?>"  data-subject-name-id="<?php echo $rows->subject_name; ?>" data-timetable-id-id="<?php echo $rows->table_id; ?>"
                        style="color:#000;" title="Add Review"><i class="fa fa-plus-square" aria-hidden="true"></i>
 </a>

                        <?php  }?></td>
                      </tr>
                      <?php  $i++; }else{
                         }

                         }
                         ?>
                   </tbody>
                </table>
              </div>
              <div class="col-md-4">
                <center><span class="btn btn-primary btn-day">Tuesday</span></center>
                <table id="" class="table" >
                   <thead>
                      <th data-field="Monday" class="text-center" data-sortable="true">Class</th>
                      <th data-field="Monday" class="text-center" data-sortable="true">Timing</th>
                      <th data-field="Monday" class="text-center" data-sortable="true">Subject</th>
                   </thead>
                   <tbody>
                      <?php
                      $i=1;
                         foreach($restime as $rows){
                           $day=$rows->day_id;
                           //echo $day;
                           if($day=="2"){
                             if($rows->is_break==1){
                               echo "<tr class='box'  style='color:#fff;'>";
                             } else{ ?>
                               <tr  class="period">
                           <?php  }?>


                      <td>  <?php echo $rows->class_name; ?>&nbsp; - &nbsp;<?php echo $rows->sec_name; ?>  </td>
                         <td>  <?php echo  date("g:i a", strtotime($rows->from_time)).'-'.date("g:i a", strtotime($rows->to_time));  ?></td>
                         <td>
                           <?php if($rows->is_break==1){
                           echo "Break";
                         } else{
                           echo $rows->subject_name;
                           ?>
                            <a href="#myModal" data-toggle="modal" data-target="#myModal" data-class-id="<?php echo $rows->class_id; ?>"
                   data-from-id="<?php echo $rows->from_time; ?>" data-to-id="<?php echo $rows->to_time; ?>" data-subject-id-id="<?php echo $rows->subject_id; ?>"  data-subject-name-id="<?php echo $rows->subject_name; ?>"
                             style="color:#000;" title="Add Review"><i class="fa fa-plus-square" aria-hidden="true"></i>
      </a>
                             <?php
                          }?></td>
                      </tr>
                      <?php  $i++; }else{
                         }

                         }
                         ?>
                   </tbody>
                </table>
              </div>
              <div class="col-md-4">
                <center><span class="btn btn-primary btn-day">Wednesday</span></center>
                <table id="" class="table" >
                   <thead>
                      <th data-field="Monday" class="text-center" data-sortable="true">Class</th>
                      <th data-field="Monday" class="text-center" data-sortable="true">Timing</th>
                      <th data-field="Monday" class="text-center" data-sortable="true">Subject</th>
                   </thead>
                   <tbody>
                      <?php
                      $i=1;
                         foreach($restime as $rows){
                           $day=$rows->day_id;
                           //echo $day;
                           if($day=="3"){
                             if($rows->is_break==1){
                               echo "<tr class='box'  style='color:#fff;'>";
                             } else{ ?>
                               <tr  class="period">
                           <?php  }?>


                      <td>  <?php echo $rows->class_name; ?>&nbsp; - &nbsp;<?php echo $rows->sec_name; ?>  </td>
                         <td>  <?php echo  date("g:i a", strtotime($rows->from_time)).'-'.date("g:i a", strtotime($rows->to_time));  ?></td>
                         <td>
                           <?php if($rows->is_break==1){
                           echo "Break";
                         } else{
                           echo $rows->subject_name; ?>
                             <a href="#myModal" data-toggle="modal" data-target="#myModal" data-class-id="<?php echo $rows->class_id; ?>"
                    data-from-id="<?php echo $rows->from_time; ?>" data-to-id="<?php echo $rows->to_time; ?>" data-subject-id-id="<?php echo $rows->subject_id; ?>"  data-subject-name-id="<?php echo $rows->subject_name; ?>"
                              style="color:#000;" title="Add Review"><i class="fa fa-plus-square" aria-hidden="true"></i>
       </a>
                              <?php
                          }?></td>
                      </tr>
                      <?php  $i++; }else{
                         }

                         }
                         ?>
                   </tbody>
                </table>
              </div>
              <div class="clearfix"></div>
              <div class="col-md-4">
                <center><span class="btn btn-primary btn-day">Thursday</span></center>
                <table id="" class="table" >
                   <thead>
                      <th data-field="Monday" class="text-center" data-sortable="true">Class</th>
                      <th data-field="Monday" class="text-center" data-sortable="true">Timing</th>
                      <th data-field="Monday" class="text-center" data-sortable="true">Subject</th>
                   </thead>
                   <tbody>
                      <?php
                      $i=1;
                         foreach($restime as $rows){
                           $day=$rows->day_id;
                           //echo $day;
                           if($day=="4"){
                             if($rows->is_break==1){
                               echo "<tr class='box'  style='color:#fff;'>";
                             } else{ ?>
                               <tr  class="period">
                           <?php  }?>


                         <td>  <?php echo $rows->class_name; ?>&nbsp; - &nbsp;<?php echo $rows->sec_name; ?>  </td>
                         <td>  <?php echo  date("g:i a", strtotime($rows->from_time)).'-'.date("g:i a", strtotime($rows->to_time));  ?></td>
                         <td>
                           <?php if($rows->is_break==1){
                           echo "Break";
                         } else{
                           echo $rows->subject_name;
                           ?>
                             <a href="#myModal" data-toggle="modal" data-target="#myModal" data-class-id="<?php echo $rows->class_id; ?>"
                    data-from-id="<?php echo $rows->from_time; ?>" data-to-id="<?php echo $rows->to_time; ?>" data-subject-id-id="<?php echo $rows->subject_id; ?>"  data-subject-name-id="<?php echo $rows->subject_name; ?>"
                              style="color:#000;" title="Add Review"><i class="fa fa-plus-square" aria-hidden="true"></i>
       </a>
                              <?php
                          }?></td>
                      </tr>
                      <?php  $i++; }else{
                         }

                         }
                         ?>
                   </tbody>
                </table>
              </div>
              <div class="col-md-4">
                <center><span class="btn btn-primary btn-day">Friday</span></center>
                <table id="" class="table" >
                   <thead>
                      <th data-field="Monday" class="text-center" data-sortable="true">Class</th>
                      <th data-field="Monday" class="text-center" data-sortable="true">Timing</th>
                      <th data-field="Monday" class="text-center" data-sortable="true">Subject</th>
                   </thead>
                   <tbody>
                      <?php
                      $i=1;
                         foreach($restime as $rows){
                           $day=$rows->day_id;
                           //echo $day;
                           if($day=="5"){
                             if($rows->is_break==1){
                               echo "<tr class='box'  style='color:#fff;'>";
                             } else{ ?>
                               <tr  class="period">
                           <?php  }?>


                         <td>  <?php echo $rows->class_name; ?>&nbsp; - &nbsp;<?php echo $rows->sec_name; ?>  </td>
                         <td>  <?php echo  date("g:i a", strtotime($rows->from_time)).'-'.date("g:i a", strtotime($rows->to_time));  ?></td>
                         <td>
                           <?php if($rows->is_break==1){
                           echo "Break";
                         } else{
                           echo $rows->subject_name;?>
                             <a href="#myModal" data-toggle="modal" data-target="#myModal" data-class-id="<?php echo $rows->class_id; ?>"
                    data-from-id="<?php echo $rows->from_time; ?>" data-to-id="<?php echo $rows->to_time; ?>" data-subject-id-id="<?php echo $rows->subject_id; ?>"  data-subject-name-id="<?php echo $rows->subject_name; ?>"
                              style="color:#000;" title="Add Review"><i class="fa fa-plus-square" aria-hidden="true"></i>
       </a>
                              <?php
                          }?></td>
                      </tr>
                      <?php  $i++; }else{
                         }

                         }
                         ?>
                   </tbody>
                </table>
              </div>
              <div class="col-md-4">
                <center><span class="btn btn-primary btn-day">Saturday</span></center>
                <table id="" class="table" >
                   <thead>
                      <th data-field="Monday" class="text-center" data-sortable="true">Class</th>
                      <th data-field="Monday" class="text-center" data-sortable="true">Timing</th>
                      <th data-field="Monday" class="text-center" data-sortable="true">Subject</th>
                   </thead>
                   <tbody>
                      <?php
                      $i=1;
                         foreach($restime as $rows){
                           $day=$rows->day_id;
                           //echo $day;
                           if($day=="6"){
                             if($rows->is_break==1){
                               echo "<tr class='box'  style='color:#fff;'>";
                             } else{ ?>
                               <tr  class="period">
                           <?php  }?>


                         <td>  <?php echo $rows->class_name; ?>&nbsp; - &nbsp;<?php echo $rows->sec_name; ?>  </td>
                         <td>  <?php echo  date("g:i a", strtotime($rows->from_time)).'-'.date("g:i a", strtotime($rows->to_time));  ?></td>
                         <td>
                           <?php if($rows->is_break==1){
                           echo "Break";
                         } else{
                           echo $rows->subject_name; ?>
                             <a href="#myModal" data-toggle="modal" data-target="#myModal" data-class-id="<?php echo $rows->class_id; ?>"
                    data-from-id="<?php echo $rows->from_time; ?>" data-to-id="<?php echo $rows->to_time; ?>" data-subject-id-id="<?php echo $rows->subject_id; ?>"  data-subject-name-id="<?php echo $rows->subject_name; ?>"
                              style="color:#000;" title="Add Review"><i class="fa fa-plus-square" aria-hidden="true"></i>
       </a>
                              <?php
                          }?></td>
                      </tr>
                      <?php  $i++; }else{
                         }

                         }
                         ?>
                   </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

   </div>
</div>
<div id="myModal" class="modal fade open-AddBookDialog" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"> Review <span id="subject_name"></span></h4>
         </div>
         <div class="modal-body">
            <form action="" method="post" class="form-horizontal" id="timetablereviewform">
              <fieldset>
              <div class="form-group">
                 <label class="col-sm-4 control-label">Timing</label>
                 <div class="form-group">

                    <div class="col-md-6">
                    <input type="text" placeholder="" name="cur_date" class="form-control" value="<?php $date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
                       echo $date->format('d-m-Y h:i:s'); ?>" readonly="">
                    <input type="hidden" placeholder="" name="class_id" id="class_id" class="form-control" value="">
                    <input type="hidden" placeholder="" name="from_time" id="from_time" class="form-control" value="">
                    <input type="hidden" placeholder="" name="to_time" id="to_time" class="form-control" value="">
                    <input type="hidden" placeholder="" name="timetable_id" id="timetable_id" class="form-control" value="">
                    <input type="hidden" placeholder="" name="subject_id" id="subject_id" class="form-control" value="">
                    <input type="hidden" placeholder="" name="user_id" class="form-control" value="<?php echo $user_id; ?>">
                    <input type="hidden" placeholder="" name="user_type" class="form-control" value="<?php echo $user_type; ?>">
                  </div>
                 </div>

              </div>

                </fieldset>
               <fieldset>

                  <div class="form-group" >
                     <label class="col-sm-4 control-label">Comments</label>
                     <div class="col-sm-6 clockpicker">
                        <textarea id="comments" name="comments" class="form-control"></textarea>
                     </div>
                  </div>



                  <div class="form-group">
                     <label class="col-sm-4 control-label">&nbsp;</label>
                     <div class="col-sm-6">
                        <button type="submit" id="save" class="btn btn-info btn-fill center">SUBMIT</button>
                     </div>
                  </div>
               </fieldset>
            </form>
         </div>
        
      </div>
   </div>
</div>

<script>
   $('#timetablemenu').addClass('collapse in');
   $('#timetable').addClass('active');
   $('#timetable1').addClass('active');



   $('#myModal').on('show.bs.modal', function(e) {
       var bookId = $(e.relatedTarget).data('class-id');
       $(e.currentTarget).find('input[name="class_id"]').val(bookId);
       var from_time = $(e.relatedTarget).data('from-id');
       $(e.currentTarget).find('input[name="from_time"]').val(from_time);
       var to_time = $(e.relatedTarget).data('to-id');
       $(e.currentTarget).find('input[name="to_time"]').val(to_time);
       var subject_id = $(e.relatedTarget).data('subject-id-id');
       $(e.currentTarget).find('input[name="subject_id"]').val(subject_id);
       var subject_name = $(e.relatedTarget).data('subject-name-id');
       $(e.currentTarget).find('#subject_name').html(subject_name);
       var timetable_id = $(e.relatedTarget).data('timetable-id-id');
       $(e.currentTarget).find('#timetable_id').val(timetable_id);
   });
   $('#timetablereviewform').validate({ // initialize the plugin
       rules: {
           comments:{required:true },
       },
       messages: {
             comments: "This field cannot be empty!"

           },
         submitHandler: function(form) {
           //alert("hi");
           swal({
                         title: "Are you sure?",
                         text: "You Want Confirm this form",
                         type: "success",
                         showCancelButton: true,
                         confirmButtonColor: '#DD6B55',
                         confirmButtonText: 'Yes',
                         cancelButtonText: "No!",
                         closeOnConfirm: false,
                         closeOnCancel: false
                     },
                     function(isConfirm) {
                         if (isConfirm) {
          $.ajax({
              url: "<?php echo base_url(); ?>teachertimetable/review",
               type:'POST',
              data: $('#timetablereviewform').serialize(),
              success: function(response) {
                  if(response=="success"){
                   //  swal("Success!", "Thanks for Your Note!", "success");
                     $('#timetablereviewform')[0].reset();
                     swal({
              title: "Success!",
              text: "Review saved!",
              type: "success"
          }, function() {
              window.location = "<?php echo base_url(); ?>teachertimetable/reviewview";
          });
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

</script>
