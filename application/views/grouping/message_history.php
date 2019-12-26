<div class="main-panel">
   <div class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <div class="card">
                  <div class="content">
                     <div class="header">
					 
					 <h4 class="title" style="padding-bottom:10px;">Message History
                           <a href="<?php echo base_url(); ?>grouping/send" class="btn btn pull-right">Send Message</a>
                             <hr>
                     </div>
                  
                  <table id="example" class="table">
                     <thead>
                        <th data-field="id" class="text-center">S.No</th>
                        <th data-field="name" class="text-center" data-sortable="true">Group Name</th>
                        <th data-field="Section" class="text-center" data-sortable="true">Type</th>
                        <!--<th data-field="actions" class="td-actions text-left" data-events="operateEvents">Notes</th>-->
                        <th data-field="sent" class="td-actions text-left" data-events="operateEvents">Sent By</th>
                     </thead>
                     <tbody>
                        <?php $i=1; foreach ($list_of_message as $rowsclass) {  ?>
                        <tr>
                           <td><?php echo $i;  ?></td>
                           <td><?php echo $rowsclass->group_title;  ?><br><small><?php echo $new_date = date('d-m-Y H:i:s', strtotime($rowsclass->created_at));  ?></small></td>
                           <td><?php echo $rowsclass->notification_type;  ?></td>
                           <!--<td><?php echo $rowsclass->notes;  ?></td>-->
                           <td><?php echo $rowsclass->name;  ?></td>
                        </tr>
                        <?php $i++;  }  ?>
                     </tbody>
                  </table>
				  </div>
               </div>
               <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
	jQuery('#groupingmenu').addClass('collapse in');
	$('#grouping').addClass('active');
	$('#group2').addClass('active');

       
	 $(document).on("click", ".open-AddBookDialog", function () {
		  var eventId = $(this).data('id');
		  $(".modal-body #group_id").val( eventId );
	 });
	 
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
           },
  
       ],
       "pagingType": "full_numbers",
       "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
       responsive: true,
       language: {
       search: "_INPUT_",
       searchPlaceholder: "Search records",
       }
         });



</script>
