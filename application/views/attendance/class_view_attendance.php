<div class="main-panel">
   <div class="content">
      <div class="container-fluid">
         <div class="col-md-12">
            <div class="">
               <div class="card">
                  <div class="content">

                     <h4 class="title"><?php foreach($get_name_class as $rows){} echo $rows->class_name; echo "-";echo $rows->sec_name;  ?> Attendance Details</h4>
                     <p class="pull-right"> <button onclick="history.go(-1);" class="btn btn-wd btn-default">BACK</button></p>
						
                     <div class="fresh-datatables">
                        <table id="example" class="table">
                           <thead>
                              <th data-field="id">S.No</th>
                              <th data-field="date">Name</th>
                              <th data-field="year">Status </th>
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
                              </tr>
                              <?php $i++;  }  ?>
                           </tbody>
                        </table>
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
					{ "width": "80%" },
					{ "width": "13%" }
				  ]
         }); 
</script>
