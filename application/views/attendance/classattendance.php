<div class="main-panel">
   <div class="content">
      <div class="container-fluid">

         <div class="card">
            <div class="content">

                <h4 class="title">  List of Record in <?php foreach($get_name_class as $rows){} echo $rows->class_name; echo "-";echo $rows->sec_name;  ?> </h4>
                  <p class="pull-right"> <button onclick="history.go(-1);" class="btn btn-wd btn-default">Go Back</button></p>



               <div class="fresh-datatables">
                  <table id="bootstrap-table" class="table">
                     <thead>
                        <th data-field="id" class="text-center">S.No</th>
                        <th data-field="date" class="text-center" data-sortable="true">Date</th>
                        <th data-field="year" class="text-center" data-sortable="true">Total Students </th>
                        <th data-field="no" class="text-center" data-sortable="true">No.Of.Present</th>
                        <th data-field="name" class="text-center" data-sortable="true">no.Of.Absent</th>
                        <th data-field="taken" class="text-center" data-sortable="true">Attendance Taken by</th>
                        <th data-field="Section" class="text-center" data-sortable="true">View Absent</th>
                     </thead>
                     <tbody>
                        <?php
                           $i=1;
                           foreach ($result as $rows) {

                           ?>
                        <tr>
                           <td><?php echo $i; ?></td>
                           <td><?php  $dateTime = new DateTime($rows->created_at); echo   $cur_d=$dateTime->format("d-m-Y :A");  ?></td>
                           <td><?php echo $rows->class_total; ?></td>
                           <td><?php echo $rows->no_of_present; ?></td>
                           <td><?php echo $rows->no_of_absent; ?></td>
                           <td><?php echo $rows->name; ?></td>
                           <td>
                              <a href="<?php echo base_url(); ?>adminattendance/view_all/<?php echo $rows->at_id; ?>/<?php echo $rows->class_id; ?>" rel="tooltip" title="View Attendance " class="btn btn-simple btn-warning btn-icon edit"><i class="fa fa-list-ol" aria-hidden="true"></i></a>
                              <a href="<?php echo base_url(); ?>adminattendance/edit_class_attendance/<?php echo $rows->at_id; ?>/<?php echo $rows->class_id; ?>" rel="tooltip" title="Update Attendance " class="btn btn-simple btn-warning btn-icon edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                           </td>
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
   </div>
</div>
</div>
<script type="text/javascript">
$('#attend').addClass('collapse in');
$('#attendance').addClass('active');
$('#attend1').addClass('active');
$('#bootstrap-table').DataTable();
</script>
