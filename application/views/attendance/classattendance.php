<div class="main-panel">
   <div class="content">
      <div class="container-fluid">

         <div class="card">
            <div class="content">

                <h4 class="title">Attendance for <?php foreach($get_name_class as $rows){} echo $rows->class_name; echo "-";echo $rows->sec_name;  ?> <p class="pull-right"> <button onclick="history.go(-1);" class="btn btn-wd btn-default">BACK</button></p></h4>
                  
<hr>


               <div class="fresh-datatables">
                  <table id="example" class="table">
                     <thead>
                        <th data-field="id">S.No</th>
                        <th data-field="date">Date</th>
                        <th data-field="year">Total Students </th>
                        <th data-field="no">Present Students</th>
                        <th data-field="name">Absent Students</th>
                        <th data-field="taken">Attendance By</th>
                        <th data-field="Section">Actions</th>
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
                              <a href="<?php echo base_url(); ?>adminattendance/view_all/<?php echo $rows->at_id; ?>/<?php echo $rows->class_id; ?>" rel="tooltip" title="Attendance Details" class="btn btn-simple btn-warning btn-icon edit" style="font-size:20px;"><i class="fa fa-list-ol" aria-hidden="true"></i></a>
                              <a href="<?php echo base_url(); ?>adminattendance/edit_class_attendance/<?php echo $rows->at_id; ?>/<?php echo $rows->class_id; ?>" rel="tooltip" title="Edit Attendance" class="btn btn-simple btn-warning btn-icon edit" style="font-size:20px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
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

$('#example').DataTable({
            dom: 'lBfrtip',
            buttons: [
                 {
                     extend: 'excelHtml5',
                     exportOptions: {
                     columns: ':visible'
                     }
                 },
                 {
                     extend: 'pdfHtml5',
                     exportOptions: {
                     columns: ':visible'
                     }
                 }
             ],
             "pagingType": "full_numbers",
			 "ordering": false,
             "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
             responsive: true,
             language: {
				 search: "_INPUT_",
				 searchPlaceholder: "Search",
             },
			 "bAutoWidth": false,
			"columns": [
					{ "width": "7%" },
					{ "width": "15%" },
					{ "width": "15%" },
					{ "width": "15%" },
					{ "width": "15%" },
					{ "width": "25%" },
					{ "width": "8%" }
				  ]
         }); 
</script>
