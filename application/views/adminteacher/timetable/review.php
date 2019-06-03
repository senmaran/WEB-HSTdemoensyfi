<div class="main-panel">
   <div class="content">
      <div class="content">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-12">
                  <div class="card">
                     <div class="content">
                        <div class="header">
                           <legend>Time Table Reivew<button onclick="history.go(-1);" class="btn btn-wd btn-default pull-right" style="margin-top:-10px;">Go Back</button> </legend>
                        </div>
                        <div class="fresh-datatables">
                           <table id="bootstrap-table" class="table">
                              <thead>
                                 <th data-field="id" class="text-center">S.no</th>
                                 <th data-field="name" class="text-center" data-sortable="true">Class/Section</th>
                                 <th data-field="Subject" class="text-center" data-sortable="true">Subject</th>
                                 <th data-field="Period" class="text-center" data-sortable="true">Period</th>
                                 <th data-field="comments" class="text-center" data-sortable="true">Comments</th>
                                 <th data-field="DateTime" class="text-center" data-sortable="true">DateTime</th>
                                 <th data-field="Remarks" class="text-center" data-sortable="true">Remarks</th>
                              </thead>
                              <tbody>
                                 <?php
                                    $i=1;
                                    foreach ($res as $rows) {
                                    ?>
                                 <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $rows->class_name; echo "-"; echo $rows ->sec_name; ?> </td>
                                    <td><?php echo $rows->subject_name; ?></td>
                                    <td><?php echo $rows->from_time.'-'.$rows->to_time; ?></td>
                                    <td><?php echo $rows->comments; ?></td>
                                    <td><?php $cls_date = new DateTime($rows->time_date);
                                       echo $cls_date->format('d-m-Y H:i A');  ?></td>
                                    <td><?php echo $rows->remarks; ?></td>
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
            <!-- end row -->
         </div>
      </div>
   </div>
</div>
<script>
   $('#timetablemenu').addClass('collapse in');
   $('#timetable').addClass('active');
   $('#timetable3').addClass('active');
   $('#bootstrap-table').DataTable();
</script>
