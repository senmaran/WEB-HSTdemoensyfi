<div class="main-panel">
<div class="content">
  <div class="content">
     <div class="container-fluid">
         <div class="row">
             <div class="col-md-12">
                 <div class="card">
				 
                   <?php if($this->session->flashdata('msg')): ?>
                     <div class="alert alert-success">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                   ×</button> <?php echo $this->session->flashdata('msg'); ?>
                 </div>
                 <?php endif; ?>
				 
                     <div class="content">
					  <legend style="padding-bottom:15px;">Reviews <button onclick="history.go(-1);" class="btn btn-wd btn-default pull-right" style="margin-top:-10px;">BACK</button></legend>
                  <div class="fresh-datatables">
                   <table id="example" class="table">
                       <thead>
							<th data-field="id">S.no</th>
							<th data-field="name">Class/Section</th>
							<th data-field="username">Name</th>
							<th data-field="Subject">Subject</th>
							<th data-field="comments">Comments</th>
							<th data-field="DateTime">Date | time</th>
							<!--<th data-field="Remarks">Remarks</th>-->
							<th data-field="Action">Action</th>
                       </thead>
                       <tbody>
                         <?php
                         $i=1;
                         foreach ($res as $rows) {
                         ?>
                           <tr>
                             <td><?php echo $i; ?></td>
                             <td><?php echo $rows->class_name; echo "-"; echo $rows ->sec_name; ?> </td>
                               <td><?php echo $rows->name; ?></td>
                           <td><?php echo $rows->subject_name; ?></td>
                            <!--<td><?php echo $rows->period_id; ?></td>-->
                            <td><?php echo $rows->comments; ?></td>
                              <td><?php $cls_date = new DateTime($rows->time_date);
echo $cls_date->format('d-m-Y H:i A');  ?></td>
                             <!--<td><?php echo $rows->remarks; ?></td>-->
                              <td>  <a href="<?php echo base_url(); ?>timetable/edit_review/<?php echo $rows->timetable_id; ?>" rel="tooltip" title="Edit" class="btn btn-simple btn-warning btn-icon edit"><i class="fa fa-edit" style="font-size:20px;"></i></a>
              </td>
                           </tr>
                           <?php $i++;  }  ?>
                       </tbody>
                   </table>

                 </div>
                     </div><!-- end content-->
                 </div><!--  end card  -->
             </div> <!-- end col-md-12 -->
         </div> <!-- end row -->

     </div>
 </div>
</div>
</div>

<script>

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
				 searchPlaceholder: "Search Staffs",
             },
			 "bAutoWidth": false,
			"columns": [
					{ "width": "7%" },
					{ "width": "10%%" },
					{ "width": "20%%" },
					{ "width": "20%" },
					{ "width": "20%" },
					{ "width": "15%" },
					{ "width": "8%" }
				  ]
         }); 
</script>
<script>
jQuery('#timetablemenu').addClass('collapse in');
$('#time').addClass('active');
$('#time2').addClass('active');
</script>
