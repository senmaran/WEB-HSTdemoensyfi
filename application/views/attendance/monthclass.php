<div class="main-panel">
   <div class="content">
      <div class="col-md-12">

         <div class="card">
            <div class="content">
					<div class="header">  
						<h4 class="title"> Monthwise Class Attendance</h4>
						</div>
                     <hr>
               <div class="row">
                  <div class="col-md-12">


                          
                           <div class="fresh-datatables">
                              <table id="example" class="table">
                                 <thead>
                                    <th data-field="id">S.No</th>
                                    <th data-field="year">Class Name</th>
                                    <th data-field="status">Class Strength</th>
                                    <th data-field="Section">Actions</th>
                                 </thead>
                                 <tbody>
                                    <?php
                                       $i=1;
                                       foreach ($res as $rows) {
                                       ?>
                                    <tr>
                                       <td><?php echo $i; ?></td>
                                       <td><?php echo $rows->class_name.'&nbsp;'.$rows->sec_name; ?></td>
                                       <td><?php echo $rows->total_count;  ?></td>
                                       <td><a href="<?php echo base_url(); ?>adminattendance/month_view_class/<?php echo $rows->class_id;  ?>" class="btn btn-default">VIEW</a></td>
                                    </tr>
                                    <?php $i++; } ?>
                                 </tbody>
                              </table>


                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
         $('#attend').addClass('collapse in');
         $('#attendance').addClass('active');
         $('#attend2').addClass('active');
		 
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
					{ "width": "30%" },
					{ "width": "30%" },
					{ "width": "33%" }
				  ]
         }); 
</script>
